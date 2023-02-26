<?php

namespace app\models;

use Yii;
use yii\data\Pagination;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property integer $user_id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property integer $isAdmin
 * @property string $photo
 *
 * @property Comment[] $comments
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{
    const STATUS_ALLOW = 1;
    const STATUS_DISALLOW = 0;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['isAdmin'], 'integer'],
            [['name', 'email', 'password', 'photo'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'ID',
            'name' => 'Name',
            'email' => 'Email',
            'password' => 'Password',
            'isAdmin' => 'Is Admin',
            'photo' => 'Photo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['user_id' => 'user_id']);
    }

    public static function findIdentity($id)
    {
        return User::findOne($id);
    }
    public function getId()
    {
        return $this->user_id;
    }

    public function getAuthKey()
    {
        // TODO: Implement getAuthKey() method.
    }

    public function validateAuthKey($authKey)
    {
        // TODO: Implement validateAuthKey() method.
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        // TODO: Implement findIdentityByAccessToken() method.
    }

    public static function findByEmail($email)
    {
        return User::find()->where(['email'=>$email])->one();
    }

    public function validatePassword($password)
    {
        return ($this->password == $password) ? true : false;
    }
    
    public function create()
    {
        return $this->save(false);
    }
    
    public function saveFromVk($uid, $name, $photo)
    {
        $user = User::findOne($uid);
        if($user)
        {
            return Yii::$app->user->login($user);
        }
        
        $this->user_id = $uid;
        $this->name = $name;
        $this->photo = $photo;
        $this->create();
        
        return Yii::$app->user->login($this);
    }

    public function getImage()
    {
        return $this->photo;
    }

    public function saveArticle($article, $idUser)
    {
        $this->clearCurrentArticle($article,$idUser);

        $this->link('articles', $article);
    }

    public function clearCurrentArticle( $article,$user)
    {  // var_dump($article->id);die;
        $query = Article::find()->where(['user_id' => $user])->andWhere(['id_article' => $article->article_id])->one();
        // var_dump($query);die;
        if($query != null) {
            $query->delete();
        }
    }


    public static function getFuser($id)
    {
        $query = User::find()->where(['id' => $id])->all();

        return $query[0]->articles;
    }

    public function getArticles()
    {
        return $this->hasMany(Article::class, ['user_id' => 'user_id']);
    }

    public function allow()
    {
        $this->isAdmin = self::STATUS_ALLOW;
        return $this->save(false);
    }

    public function disallow()
    {
        $this->isAdmin = self::STATUS_DISALLOW;
        return $this->save(false);
    }

}
