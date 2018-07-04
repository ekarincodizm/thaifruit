<?php

use yii\db\Migration;

/**
 * Class m180703_125031_add_column_to_prod_rec_line_table
 */
class m180703_125031_add_column_to_prod_rec_line_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
      $this->addColumn('prod_rec_line','line_type',$this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
       $this->dropColumn('prod_rec_line','line_type');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180703_125031_add_column_to_prod_rec_line_table cannot be reverted.\n";

        return false;
    }
    */
}
