<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%con}}`.
 */
class m230223_095116_create_con_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey(
            'con1','sportsCountry', 'sport_id', 'sports','sport_id', 'CASCADE'
        );
        $this->addForeignKey(
            'con2','sportsCountry', 'country_id', 'country','country_id', 'CASCADE'
        );
        $this->addForeignKey(
            'con3','comment', 'user_id', 'user','user_id', 'CASCADE'
        );
        $this->addForeignKey(
            'con4','comment', 'article_id', 'article','article_id', 'CASCADE'
        );
        $this->addForeignKey(
            'con5','article', 'sport_id', 'sports','sport_id', 'CASCADE'
        );
        $this->addForeignKey(
            'con6','article', 'user_id', 'user','user_id', 'CASCADE'
        );
        $this->addForeignKey(
            'con7','article', 'country_id', 'country','country_id', 'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
//       $this->dropTable('{{%con}}');
        $this->dropForeignKey('con2','sportsCountry');
        $this->dropForeignKey('con1','sportsCountry');
        $this->dropForeignKey('con3','comment');
        $this->dropForeignKey('con4','comment');
        $this->dropForeignKey('con5','article');
        $this->dropForeignKey('con6','article');
        $this->dropForeignKey('con7','article');
    }
}
