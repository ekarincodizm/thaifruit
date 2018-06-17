<?php

use yii\db\Migration;

/**
 * Handles the creation of table `vendor_approved`.
 */
class m180530_062617_create_vendor_approved_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('vendor_approved', [
            'id' => $this->primaryKey(),
            'product_id'=>$this->integer(),
            'vendor_id'=>$this->integer(),
            'form_date'=>$this->integer(),
            'to_date'=>$this->integer(),
            'description'=>$this->string(),
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
        $this->dropTable('vendor_approved');
    }
}
