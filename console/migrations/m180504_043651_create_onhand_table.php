<?php

use yii\db\Migration;

/**
 * Handles the creation of table `onhand`.
 */
class m180504_043651_create_onhand_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('onhand', [
            'id' => $this->primaryKey(),
            'product_id'=> $this->integer(),
            'plant_id' => $this->integer(),
            'warehouse_id' => $this->integer(),
            'location_id' => $this->integer(),
            'lot_id' => $this->integer(),
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
        $this->dropTable('onhand');
    }
}
