<?php

use yii\db\Migration;

/**
 * Handles the creation of table `purchtable`.
 */
class m180505_235236_create_purchtable_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('purchtable', [
            'id' => $this->primaryKey(),
            'purch_no'=> $this->string(),
            'purch_date'=> $this->string(),
            'vendor_id' => $this->integer(),
            'delivery_to' => $this->integer(),
            'discount_amt' => $this->float(),
            'discount_per' => $this->float(),
            'confirm_status' => $this->integer(),
            'require_date' => $this->integer(),
            'total_amount' => $this->float(),
            'note'=> $this->string(),
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
        $this->dropTable('purchtable');
    }
}
