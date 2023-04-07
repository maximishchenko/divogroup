<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%stage}}`.
 */
class m230404_154122_create_article_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%article}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'subtitle' => $this->text(),
            'description' => $this->text(),
            'image' => $this->string(),
            'sort' => $this->integer(),
            'status' => $this->smallInteger(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
        ], $tableOptions);
        $this->createIndex('idx-article-id', '{{%article}}', 'id');
        $this->createIndex('idx-article-title', '{{%article}}', 'title');
        $this->createIndex('idx-article-image', '{{%article}}', 'image');
        $this->createIndex('idx-article-sort', '{{%article}}', 'sort');
        $this->createIndex('idx-article-status', '{{%article}}', 'status');
        $this->createIndex('idx-article-created_at', '{{%article}}', 'created_at');
        $this->createIndex('idx-article-updated_at', '{{%article}}', 'updated_at');
        $this->createIndex('idx-article-created_by', '{{%article}}', 'created_by');
        $this->createIndex('idx-article-updated_by', '{{%article}}', 'updated_by');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%article}}');
    }
}
