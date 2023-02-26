<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sportsCountry".
 *
 * @property int $id
 * @property int|null $sport_id
 * @property int|null $country_id
 *
 * @property Country $country
 * @property Sports $sport
 */
class SportsCountry extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sportsCountry';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sport_id', 'country_id'], 'integer'],
            [['sport_id'], 'exist', 'skipOnError' => true, 'targetClass' => Sports::class, 'targetAttribute' => ['sport_id' => 'sport_id']],
            [['country_id'], 'exist', 'skipOnError' => true, 'targetClass' => Country::class, 'targetAttribute' => ['country_id' => 'country_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sport_id' => 'Sport ID',
            'country_id' => 'Country ID',
        ];
    }

    /**
     * Gets query for [[Country]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCountry()
    {
        return $this->hasOne(Country::class, ['country_id' => 'country_id']);
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
}
