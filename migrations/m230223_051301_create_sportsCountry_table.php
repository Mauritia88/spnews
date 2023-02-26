<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%sportsCountry}}`.
 */
class m230223_051301_create_sportsCountry_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%sportsCountry}}', [
            'id' => $this->primaryKey(),
            'sport_id'=>$this->integer(),
            'country_id' => $this->integer(),
        ]);
        $this->createIndex(
            'idx_1',
            'sportsCountry',
            'sport_id'
        );
        $this->createIndex(
            'idx_2',
            'sportsCountry',
            'country_id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%sportsCountry}}');
    }
}
