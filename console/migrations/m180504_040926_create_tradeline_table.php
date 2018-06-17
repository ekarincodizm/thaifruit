<?php

use yii\db\Migration;

/**
 * Handles the creation of table `tradeline`.
 */
class m180504_040926_create_tradeline_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('tradeline', [
            'id' => $this->primaryKey(),
            'tradeid'=> $this->integer(),
            'product_group' => $this->integer(),
            'product_id'=> $this->integer(),
            'from_qty' => $this->float(),
            'to_qty' => $this->float(),
            'price' => $this->float(),
            'discount' => $this->float(),
            'form_date' => $this->integer(),
            'to_data' => $this->integer(),
            'note' => $this->string(),
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
        $this->dropTable('tradeline');
    }
}
