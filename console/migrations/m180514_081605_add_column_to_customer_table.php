<?php

use yii\db\Migration;

/**
 * Class m180514_081605_add_column_to_customer_table
 */
class m180514_081605_add_column_to_customer_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('customer','customer_code',$this->string()->after('id'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
       $this->dropColumn('customer','customer_code');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180514_081605_add_column_to_customer_table cannot be reverted.\n";

        return false;
    }
    */
}
