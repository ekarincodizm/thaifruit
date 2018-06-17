<?php

use yii\db\Migration;

/**
 * Handles the creation of table `tradetable`.
 */
class m180504_040918_create_tradetable_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('tradetable', [
            'id' => $this->primaryKey(),
            'journalid' => $this->string(),
            'journaltype' => $this->integer(),
            'transdate' => $this->integer(),
            'note' => $this->string(),
            'status' => $this->integer(),
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
        $this->dropTable('tradetable');
    }
}
