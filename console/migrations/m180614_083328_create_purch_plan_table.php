<?php

use yii\db\Migration;

/**
 * Handles the creation of table `purch_plan`.
 */
class m180614_083328_create_purch_plan_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('purch_plan', [
            'id' => $this->primaryKey(),
            'name'=>$this->string(),
            'discription'=>$this->text(),
            'plan_date'=>$this->integer(),
            'product_type'=>$this->integer(),
            'plan_type'=>$this->integer(),
            'plan_qty'=>$this->integer(),
            'received_qty'=>$this->integer(),
            'plan_price'=>$this->float(),
            'note'=>$this->text(),
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
        $this->dropTable('purch_plan');
    }
}
