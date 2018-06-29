<?php

use yii\db\Migration;

/**
 * Class m180629_035544_add_column_to_product_table
 */
class m180629_035544_add_column_to_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('product','zone_group',$this->integer());
        $this->addColumn('product','zone_qty_per',$this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('product','zone_group');
        $this->dropColumn('product','zone_qty_per');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180629_035544_add_column_to_product_table cannot be reverted.\n";

        return false;
    }
    */
}
