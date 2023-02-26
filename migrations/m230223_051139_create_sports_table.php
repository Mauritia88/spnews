<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%sports}}`.
 */
class m230223_051139_create_sports_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%sports}}', [
            'sport_id' => $this->primaryKey(),
            'sport'=>$this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%sports}}');
    }
}
