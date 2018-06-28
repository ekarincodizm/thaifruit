<?php

use yii\db\Migration;

/**
 * Handles the creation of table `invoice`.
 */
class m180628_062330_create_invoice_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('invoice', [
            'id' => $this->primaryKey(),
            'invoice_no'=>$this->string(),
            'invoice_date'=>$this->integer(),
            'suplier_id'=>$this->integer(),
            'payment_type'=>$this->integer(),
            'payment_term'=>$this->integer(),
            'delivery_type'=>$this->integer(),
            'note'=>$this->string(),
            'total_amount'=>$this->float(),
            'status'=>$this->integer(),
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
        $this->dropTable('invoice');
    }
}
