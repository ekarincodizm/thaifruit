<?php

use yii\db\Migration;

/**
 * Class m180709_140523_add_column_to_prod_rec_line_table
 */
class m180709_140523_add_column_to_prod_rec_line_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('prod_rec_line','list_qty',$this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('prod_rec_line','list_qty');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180709_140523_add_column_to_prod_rec_line_table cannot be reverted.\n";

        return false;
    }
    */
}
