<?php

use yii\db\Migration;

/**
 * Handles the creation of table `purchreq`.
 */
class m171201_043708_create_purchreq_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('purchreq', [
            'id' => $this->primaryKey(),
            'purchreq_no'=> $this->string(),
            'require_date' => $this->integer(),
            'request_by' => $this->integer(),
            'reason' => $this->string(),
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
        $this->dropTable('purchreq');
    }
}
