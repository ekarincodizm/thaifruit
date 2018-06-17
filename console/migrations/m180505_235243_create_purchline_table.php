<?php

use yii\db\Migration;

/**
 * Handles the creation of table `purchline`.
 */
class m180505_235243_create_purchline_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('purchline', [
            'id' => $this->primaryKey(),
            'purch_id' => $this->integer(),
            'product_id' => $this->integer(),
            'qty' => $this->float(),
            'line_price' => $this->float(),
            'line_disc_amt' => $this->float(),
            'line_disc_per' => $this->float(),
            'line_amt' => $this->float(),
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
        $this->dropTable('purchline');
    }
}
