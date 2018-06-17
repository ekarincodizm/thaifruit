<?php

use yii\db\Migration;

/**
 * Class m180505_084911_add_column_to_deliverytype_table
 */
class m180505_084911_add_column_to_deliverytype_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('delivery_type','logo',$this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
       $this->dropColumn('delivery_type','logo');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180505_084911_add_column_to_deliverytype_table cannot be reverted.\n";

        return false;
    }
    */
}
