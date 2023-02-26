<?php

use yii\db\Migration;

/**
 * Class m230223_102234_add_data_to_comment_table
 */
class m230223_102234_add_data_to_comment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('comment','date', $this->date());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('comment','date');
    }

}
