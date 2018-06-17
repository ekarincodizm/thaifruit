<?php

use yii\db\Migration;

/**
 * Handles the creation of table `lot`.
 */
class m180504_042504_create_lot_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('lot', [
            'id' => $this->primaryKey(),
            'product_id'=>$this->integer(),
            'start_date'=>$this->integer(),
            'expire_date'=> $this->integer(),
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
        $this->dropTable('lot');
    }
}
