<?php

use yii\db\Migration;

/**
 * Handles the creation of table `zone`.
 */
class m180614_082304_create_zone_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('zone', [
            'id' => $this->primaryKey(),
            'name'=>$this->string(),
            'discription'=>$this->text(),
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
        $this->dropTable('zone');
    }
}
