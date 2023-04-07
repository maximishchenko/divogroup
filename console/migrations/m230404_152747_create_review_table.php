<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%review}}`.
 */
class m230404_152747_create_review_table extends Migration
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
        $this->createTable('{{%review}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'review' => $this->text(),
            'image' => $this->string(),
            'review_date' => $this->integer(),
            'sort' => $this->integer(),
            'status' => $this->smallInteger(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
        ], $tableOptions);
        $this->createIndex('idx-review-id', '{{%review}}', 'id');
        $this->createIndex('idx-review-name', '{{%review}}', 'name');
        $this->createIndex('idx-review-image', '{{%review}}', 'image');
        $this->createIndex('idx-review-review_date', '{{%review}}', 'review_date');
        $this->createIndex('idx-review-sort', '{{%review}}', 'sort');
        $this->createIndex('idx-review-status', '{{%review}}', 'status');
        $this->createIndex('idx-review-created_at', '{{%review}}', 'created_at');
        $this->createIndex('idx-review-updated_at', '{{%review}}', 'updated_at');
        $this->createIndex('idx-review-created_by', '{{%review}}', 'created_by');
        $this->createIndex('idx-review-updated_by', '{{%review}}', 'updated_by');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%review}}');
    }
}
