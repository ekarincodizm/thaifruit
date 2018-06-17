<?php

use yii\db\Migration;

/**
 * Class m180506_083632_add_bank_id_column_to_bankaccount
 */
class m180506_083632_add_bank_id_column_to_bankaccount extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('bank_account','bank_id',$this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
       $this->dropColumn('bank_account','bank_id');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180506_083632_add_bank_id_column_to_bankaccount cannot be reverted.\n";

        return false;
    }
    */
}
