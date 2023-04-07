<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%uploads}}`.
 */
class m230406_143710_create_uploads_table extends Migration
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
        $this->createTable('{{%uploads}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'file_ext' => $this->string(),
            'file_size' => $this->string(),
            'file_name' => $this->string(),
            'sort' => $this->integer(),
            'status' => $this->smallInteger(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
        ], $tableOptions);
        $this->createIndex('idx-uploads-id', '{{%uploads}}', 'id');
        $this->createIndex('idx-uploads-name', '{{%uploads}}', 'name');
        $this->createIndex('idx-uploads-file_ext', '{{%uploads}}', 'file_ext');
        $this->createIndex('idx-uploads-file_size', '{{%uploads}}', 'file_size');
        $this->createIndex('idx-uploads-file_name', '{{%uploads}}', 'file_name');
        $this->createIndex('idx-uploads-sort', '{{%uploads}}', 'sort');
        $this->createIndex('idx-uploads-status', '{{%uploads}}', 'status');
        $this->createIndex('idx-uploads-created_at', '{{%uploads}}', 'created_at');
        $this->createIndex('idx-uploads-updated_at', '{{%uploads}}', 'updated_at');
        $this->createIndex('idx-uploads-created_by', '{{%uploads}}', 'created_by');
        $this->createIndex('idx-uploads-updated_by', '{{%uploads}}', 'updated_by');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%uploads}}');
    }
}
