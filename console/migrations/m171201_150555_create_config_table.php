<?php

use yii\db\Migration;

/**
 * Handles the creation of table `config`.
 */
class m171201_150555_create_config_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('config', [
            'id' => $this->primaryKey(),
            'plant_id' => $this->integer(),
            'is_currency_rate' => $this->integer(),
            'is_auto_backup' => $this->integer(),
            'is_negative_stock' => $this->integer(),
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
        $this->dropTable('config');
    }
}
