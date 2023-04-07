<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%contact}}`.
 */
class m230404_153744_create_contact_table extends Migration
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
        $this->createTable('{{%contact}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'phone' => $this->string(),
            'comment' => $this->text(),
            'created_at' => $this->integer(),
        ], $tableOptions);
        $this->createIndex('idx-contact-id', '{{%contact}}', 'id');
        $this->createIndex('idx-contact-name', '{{%contact}}', 'name');
        $this->createIndex('idx-contact-phone', '{{%contact}}', 'phone');
        $this->createIndex('idx-contact-created_at', '{{%contact}}', 'created_at');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%contact}}');
    }
}
