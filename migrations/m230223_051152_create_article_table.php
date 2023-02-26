<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%article}}`.
 */
class m230223_051152_create_article_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%article}}', [
            'article_id' => $this->primaryKey(),
            'title'=>$this->string(),
            'description'=>$this->text(),
            'content'=>$this->text(),
            'date'=>$this->date(),
            'image'=>$this->string(),
            'viewed'=>$this->integer(),
            'user_id'=>$this->integer(),
            'status'=>$this->tinyInteger(),
            'sport_id'=>$this->integer(),
            'country_id'=>$this->integer(),
        ]);

        $this->createIndex(
            'idx_3',
            'article',
            'sport_id'
        );

        $this->createIndex(
            'idx_4',
            'article',
            'user_id'
        );

        $this->createIndex(
            'idx_5',
            'article',
            'country_id'
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%article}}');
    }
}
