<?php

use yii\db\Migration;

/**
 * Handles the creation of table `event`.
 */
class m180618_031431_create_event_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('event', [
            'id' => $this->primaryKey(),
            'title'=>$this->string(),
            'start'=>$this->integer(),
            'end'=>$this->integer(),
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
        $this->dropTable('event');
    }
}
