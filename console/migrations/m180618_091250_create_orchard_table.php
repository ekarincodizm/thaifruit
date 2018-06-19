<?php

use yii\db\Migration;

/**
 * Handles the creation of table `orchard`.
 */
class m180618_091250_create_orchard_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('orchard', [
            'id' => $this->primaryKey(),
            'name'=>$this->string(),
            'description'=>$this->string(),
            'area_size' => $this->float(),
            'type_id' => $this->integer(),
            'team_id' => $this->integer(),
            'wage' => $this->float(),
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
        $this->dropTable('orchard');
    }
}
