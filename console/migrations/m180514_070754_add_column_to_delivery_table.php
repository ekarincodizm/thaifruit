<?php

use yii\db\Migration;

/**
 * Class m180514_070754_add_column_to_delivery_table
 */
class m180514_070754_add_column_to_delivery_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('delivery_type','delivery_type_id',$this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('delivery_type','delivery_type_id');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180514_070754_add_column_to_delivery_table cannot be reverted.\n";

        return false;
    }
    */
}
