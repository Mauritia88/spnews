<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%country}}`.
 */
class m230223_051126_create_country_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%country}}', [
            'country_id' => $this->primaryKey(),
            'country'=>$this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%country}}');
    }
}
