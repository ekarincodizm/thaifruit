<?php

use yii\db\Migration;

/**
 * Handles the creation of table `prod_rec`.
 */
class m180620_045905_create_prod_rec_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('prod_rec', [
            'id' => $this->primaryKey(),
            'journal_no'=>$this->string(),
            'description'=>$this->string(),
            'trans_date'=>$this->integer(),
            'suplier_id'=>$this->integer(),
            'raw_type'=>$this->integer(),
            'qty'=>$this->float(),
            'plan_price'=>$this->float(),
            'qc_note'=>$this->text(),
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
        $this->dropTable('prod_rec');
    }
}
