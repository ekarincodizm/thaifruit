<?php

use yii\db\Migration;

/**
 * Handles the creation of table `prod_rec_line`.
 */
class m180703_024501_create_prod_rec_line_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('prod_rec_line', [
            'id' => $this->primaryKey(),
            'prod_rec_id'=>$this->integer(),
            'product_id'=>$this->integer(),
            'zone_id'=>$this->integer(),
            'qty'=>$this->integer(),
            'price'=>$this->float(),
            'lot_no'=>$this->string(),
            'ref_no'=>$this->string(),
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
        $this->dropTable('prod_rec_line');
    }
}
