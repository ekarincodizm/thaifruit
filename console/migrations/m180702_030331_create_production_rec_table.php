<?php

use yii\db\Migration;

/**
 * Handles the creation of table `production_rec`.
 */
class m180702_030331_create_production_rec_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('production_rec', [
            'id' => $this->primaryKey(),
            'trans_date'=>$this->integer(),
            'zone_id'=>$this->integer(),
            'zone_date'=>$this->integer(),
            'zone_status'=>$this->integer(),
            'name'=>$this->string(),
            'all_qty'=>$this->float(),
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
        $this->dropTable('production_rec');
    }
}
