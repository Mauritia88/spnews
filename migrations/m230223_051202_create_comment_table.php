<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%comment}}`.
 */
class m230223_051202_create_comment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%comment}}', [
            'id' => $this->primaryKey(),
            'text'=>$this->string(),
            'user_id'=>$this->integer(),
            'article_id'=>$this->integer(),
            'status'=>$this->integer()
        ]);

        $this->createIndex(
            'idx-post-user_id',
            'comment',
            'user_id'
        );

        $this->createIndex(
            'idx-article_id',
            'comment',
            'article_id'
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%comment}}');
    }
}
