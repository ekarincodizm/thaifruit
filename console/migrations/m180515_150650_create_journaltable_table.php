<?php

use yii\db\Migration;

/**
 * Handles the creation of table `journaltable`.
 */
class m180515_150650_create_journaltable_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('journaltable', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'description'=> $this->string(),
            'account_type' => $this->integer(),
            'account_id' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('journaltable');
    }
}
