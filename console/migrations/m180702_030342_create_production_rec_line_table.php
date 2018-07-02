<?php

use yii\db\Migration;

/**
 * Handles the creation of table `production_rec_line`.
 */
class m180702_030342_create_production_rec_line_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('production_rec_line', [
            'id' => $this->primaryKey(),
            'production_rec_id'=>$this->integer(),
            'emp_id'=>$this->integer(),
            'line_num' => $this->integer(),
            'line_qty' => $this->integer(),
            'case_id' => $this->integer(),
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
        $this->dropTable('production_rec_line');
    }
}
