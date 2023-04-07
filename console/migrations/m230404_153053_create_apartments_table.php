<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%apartments}}`.
 */
class m230404_153053_create_apartments_table extends Migration
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
        $this->createTable('{{%apartments}}', [
            'id' => $this->primaryKey(),
            'address' => $this->string(),
            'image' => $this->string(),
            'price' => $this->decimal(65,2),
            'rooms_amount' => $this->integer(),
            'square' => $this->integer(),
            'sort' => $this->integer(),
            'status' => $this->smallInteger(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
        ], $tableOptions);
        $this->createIndex('idx-apartments-id', '{{%apartments}}', 'id');
        $this->createIndex('idx-apartments-address', '{{%apartments}}', 'address');
        $this->createIndex('idx-apartments-price', '{{%apartments}}', 'price');
        $this->createIndex('idx-apartments-rooms_amount', '{{%apartments}}', 'rooms_amount');
        $this->createIndex('idx-apartments-square', '{{%apartments}}', 'square');
        $this->createIndex('idx-apartments-sort', '{{%apartments}}', 'sort');
        $this->createIndex('idx-apartments-status', '{{%apartments}}', 'status');
        $this->createIndex('idx-apartments-created_at', '{{%apartments}}', 'created_at');
        $this->createIndex('idx-apartments-updated_at', '{{%apartments}}', 'updated_at');
        $this->createIndex('idx-apartments-created_by', '{{%apartments}}', 'created_by');
        $this->createIndex('idx-apartments-updated_by', '{{%apartments}}', 'updated_by');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%apartments}}');
    }
}
