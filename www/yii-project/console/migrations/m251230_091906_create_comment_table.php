<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%comment}}`.
 */
class m251230_091906_create_comment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%comment}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'body' =>$this->text(),
            'post_id' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'created_by' => $this->integer()
        ]);
        $this->addForeignKey('FK_comment_post_post_id', '{{%comment}}', 'post_id', '{{%post}}', 'id');
        $this->addForeignKey('FK_comment_user_created_by', '{{%comment}}', 'created_by', '{{%user}}', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('FK_comment_post_post_id', '{{%comment}}');
        $this->dropForeignKey('FK_comment_user_created_by', '{{%comment}}');
        $this->dropTable('{{%comment}}');
    }
}
