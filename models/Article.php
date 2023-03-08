<?php

namespace app\models;

use Yii;
use yii\data\Pagination;

/**
 * This is the model class for table "article".
 *
 * @property int $article_id
 * @property string|null $title
 * @property string|null $description
 * @property string|null $content
 * @property string|null $date
 * @property string|null $image
 * @property int|null $viewed
 * @property int|null $user_id
 * @property int|null $status
 * @property int|null $sport_id
 *
 * @property Comment[] $comments
 * @property Sports $sport
 * @property User $user
 */
class Article extends \yii\db\ActiveRecord
{
    const STATUS_ALLOW = 1;
    const STATUS_DISALLOW = 0;


    public static function tableName()
    {
        return 'article';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description', 'content'], 'string'],
            [['date'], 'safe'],
            [['viewed', 'user_id', 'status', 'sport_id'], 'integer'],
            [['title', 'image'], 'string', 'max' => 255],
            [['title', 'description', 'content', 'sport_id', 'country_id'], 'required'],
            [['sport_id'], 'exist', 'skipOnError' => true, 'targetClass' => Sports::class, 'targetAttribute' => ['sport_id' => 'sport_id']],
            [['country_id'], 'exist', 'skipOnError' => true, 'targetClass' => Country::class, 'targetAttribute' => ['country_id' => 'country_id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'user_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'article_id' => 'ID',
            'title' => 'Название',
            'description' => 'Описание',
            'content' => 'Статья',
            'date' => 'Дата статьи',
            'image' => 'Картинка',
            'viewed' => 'Viewed',
            'user_id' => 'Автор',
            'status' => 'Status',
            'sport_id' => 'Вид спорта',
        ];
    }


    /**
     * Gets query for [[Sport]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSport()
    {
        return $this->hasOne(Sports::class, ['sport_id' => 'sport_id']);
    }
    public function getCountry()
    {
        return $this->hasOne(Country::class, ['country_id' => 'country_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(User::class, ['user_id' => 'user_id']);
    }

    public function saveArticle()
    {
        $this->user_id = Yii::$app->user->id;
        $this->status = 0;
        return $this->save(false);
    }

    public function saveImage($filename)
    {
        $this->image = $filename;
        return $this->save(false);
    }

    public function getImage()
    {
        return ($this->image) ? '/uploads/' . $this->image : '/web/uploads/no-image.jpg';
    }

    public function deleteImage()
    {
        $imageUploadModel = new ImageUpload();
        $imageUploadModel->deleteCurrentImage($this->image);
    }

    public function beforeDelete()
    {
        $this->deleteImage();
        return parent::beforeDelete(); // TODO: Change the autogenerated stub
    }

    public function getDate()
    {
        return Yii::$app->formatter->asDate($this->date);
    }

    public static function getAll($pageSize = 5)
    {
        // build a DB query to get all articles
        $query = Article::find()->where(['status' => 1])->orderBy('date desc');

        // get the total number of articles (but do not fetch the article data yet)
        $count = $query->count();

        // create a pagination object with the total count
        $pagination = new Pagination(['totalCount' => $count, 'pageSize' => $pageSize]);

        // limit the query using the pagination and retrieve the articles
        $articles = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        $data['articles'] = $articles;
        $data['pagination'] = $pagination;

        return $data;
    }
//выбор популярных и недавних статей лимит 3 и 4 штуки соответственно
    public static function getPopular()
    {
        $prov = Article::find()->where(['status' => 1]);
        return $prov->orderBy('viewed desc')->limit(3)->all();
    }

    public static function getRecent()
    {
        $prov = Article::find()->where(['status' => 1]);
        return $prov->orderBy('date desc')->limit(4)->all();
    }

//для комментариев
    public function getComments()
    {
        return $this->hasMany(Comment::class, ['article_id' => 'article_id']);
    }

    public function getArticleComments()
    {
        return $this->getComments()->where(['status' => 1])->all();
    }
//функция счетчик просмотров
    public function viewedCounter()
    {
        $this->viewed += 1;
        return $this->save(false);
    }
//---------------
    public function saveCategory($category_id)
    {
        $category = Sports::findOne($category_id);
        if ($category != null) {
            $this->link('sport', $category);
            return true;
        }
    }
//-Для отображения на сайте (через админку)
    public function isAllowed()
    {
        return $this->status;
    }

    public function allow()
    {
        $this->status = self::STATUS_ALLOW;
        return $this->save(false);
    }

    public function disallow()
    {
        $this->status = self::STATUS_DISALLOW;
        return $this->save(false);
    }

}
