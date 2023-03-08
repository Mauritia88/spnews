<?php

namespace app\models;

use Yii;
use yii\data\Pagination;

/**
 * This is the model class for table "country".
 *
 * @property int $country_id
 * @property string|null $country
 *
 * @property SportsCountry[] $sportsCountries
 */
class Country extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'country';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['country'], 'string', 'max' => 255],
            [['country'], 'unique'],
            [['country'], 'filter', 'filter' => 'trim'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'country_id' => 'Country ID',
            'country' => 'Страна',
        ];
    }

    /**
     * Gets query for [[SportsCountries]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSportsCountries()
    {
//        return $this->hasMany(SportsCountry::class, ['country_id' => 'country_id']);
        return $this->hasMany(Sports::class, ['sport_id' => 'sport_id'])->viaTable(SportsCountry::class, ['country_id' => 'country_id']);
    }

    public function getArticlesC()
    {
        return $this->hasMany(Article::class, ['country_id' => 'country_id']);
    }

    public function getArticlesCountryCount()
    {
        return $this->getArticlesC()->where(['status' => 1])->count();
    }

    public static function getAll()
    {
        $query = Country::find()->orderBy('country asc')->all();
        return $query;
    }

}
