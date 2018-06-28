<?php

use yii\db\Migration;

/**
 * Handles the creation of table `invoice_line`.
 */
class m180628_062338_create_invoice_line_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('invoice_line', [
            'id' => $this->primaryKey(),
            'invoice_id'=>$this->integer(),
            'product_id'=>$this->integer(),
            'qty'=>$this->integer(),
            'price'=>$this->float(),
            'total'=>$this->float(),
            'note'=>$this->string(),
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
        $this->dropTable('invoice_line');
    }
}
