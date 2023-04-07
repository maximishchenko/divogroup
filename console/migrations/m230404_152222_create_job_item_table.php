<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%job_item}}`.
 */
class m230404_152222_create_job_item_table extends Migration
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
        $this->createTable('{{%job_item}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'description' => $this->text(),
            'sort' => $this->integer(),
            'status' => $this->smallInteger(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
        ], $tableOptions);        
        $this->createIndex('idx-job_item-id', '{{%job_item}}', 'id');
        $this->createIndex('idx-job_item-name', '{{%job_item}}', 'name');
        $this->createIndex('idx-job_item-sort', '{{%job_item}}', 'sort');
        $this->createIndex('idx-job_item-status', '{{%job_item}}', 'status');
        $this->createIndex('idx-job_item-created_at', '{{%job_item}}', 'created_at');
        $this->createIndex('idx-job_item-updated_at', '{{%job_item}}', 'updated_at');
        $this->createIndex('idx-job_item-created_by', '{{%job_item}}', 'created_by');
        $this->createIndex('idx-job_item-updated_by', '{{%job_item}}', 'updated_by');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%job_item}}');
    }
}
