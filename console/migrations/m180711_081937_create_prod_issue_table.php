<?php

use yii\db\Migration;

/**
 * Handles the creation of table `prod_issue`.
 */
class m180711_081937_create_prod_issue_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('prod_issue', [
            'id' => $this->primaryKey(),
            'issue_no'=>$this->string(),
            'trans_date'=>$this->integer(),
            'section_id'=>$this->integer(),
            'qty'=>$this->integer(),
            'issue_by'=>$this->integer(),
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
        $this->dropTable('prod_issue');
    }
}
