<?php

use yii\db\Migration;

/**
 * Handles the creation of table `quotation`.
 */
class m171201_043749_create_quotation_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('quotation', [
            'id' => $this->primaryKey(),
            'quotation_no'=> $this->string(),
            'require_date' => $this->integer(),
            'customer_id' => $this->integer(),
            'customer_ref' => $this->string(),
            'approve_status'=> $this->integer(),
            'approve_by'=> $this->integer(),
            'approve_date' => $this->integer(),
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
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('quotation');
    }
}
