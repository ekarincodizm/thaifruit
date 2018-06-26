<?php

use yii\db\Migration;

/**
 * Handles the creation of table `table_purch_plan_line`.
 */
class m180626_073509_create_table_purch_plan_line_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('purch_plan_line', [
            'id' => $this->primaryKey(),
            'plan_id'=>$this->integer(),
            'product_type'=>$this->integer(),
            'plan_type'=>$this->integer(),
            'plan_qty'=>$this->integer(),
            'received_qty'=>$this->integer(),
            'plan_price'=>$this->float(),
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
        $this->dropTable('table_purch_plan_line');
    }
}
