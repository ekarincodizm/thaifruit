<?php

use yii\db\Migration;

/**
 * Class m180702_041943_add_column_to_prod_rec_table
 */
class m180702_041943_add_column_to_prod_rec_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
      $this->addColumn('prod_rec','lot_no',$this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
      $this->dropColumn('prod_rec','lot_no');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180702_041943_add_column_to_prod_rec_table cannot be reverted.\n";

        return false;
    }
    */
}
