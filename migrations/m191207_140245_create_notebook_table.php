<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%notebook}}`.
 */
class m191207_140245_create_notebook_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%notebook}}', [
            'id' => $this->primaryKey(),
            'parent_id' => $this->integer()->defaultValue(null),
            'title' => $this->string(255)->notNull(),
            'text' => $this->text(),
            'created_at' => $this->integer()->notNull(),
            'user_id' => $this->integer()->notNull(),
            'calendar_time' => $this->integer()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%notebook}}');
    }
}
