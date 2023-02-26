<?php

namespace app\models;

use Yii;
use yii\data\Pagination;

/**
 * This is the model class for table "sports".
 *
 * @property int $sport_id
 * @property string|null $sport
 *
 * @property Article[] $articles
 * @property SportsCountry[] $sportsCountries
 */
class Sports extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'sports';
    }


    public function rules()
    {
        return [
            [['sport'], 'string', 'max' => 255],
            [['sport'], 'unique'],
            [['sport'], 'filter', 'filter' => 'trim'],
        ];
    }


    public function attributeLabels()
    {
        return [
            'sport_id' => 'ID',
            'sport' => 'Вид спорта',
        ];
    }

    public function getSportsCountries()
    {
        return $this->hasMany(SportsCountry::class, ['sport_id' => 'sport_id']);
    }

    public static function getAll()
    {
        $query = Sports::find()->orderBy('sport asc')->all();
        return $query;
    }

//Подсчитывает количество статей по видам спорта, выводится в sidebar
    public function getArticles()
    {
        return $this->hasMany(Article::class, ['sport_id' => 'sport_id']);
    }

    public function getArticleStatus()
    {
        return $this->getArticles()->where(['status' => 1]);
    }

    public function getArticlesCount()
    {
        return $this->getArticleStatus()->count();
    }

//используется в sitecontroller вывод по категориям статей
    public static function getArticlesBySports($id)
    {
        // build a DB query to get all articles
        $query = Article::find()->where(['status' => 1, 'sport_id' => $id]);

        // get the total number of articles (but do not fetch the article data yet)
        $count = $query->count();

        // create a pagination object with the total count
        $pagination = new Pagination(['totalCount' => $count, 'pageSize' => 6]);

        // limit the query using the pagination and retrieve the articles
        $articles = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        $data['articles'] = $articles;
        $data['pagination'] = $pagination;

        return $data;
    }


}
