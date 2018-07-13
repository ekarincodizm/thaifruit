<?php

use yii\db\Migration;

/**
 * Class m180713_075120_add_column_to_prodrec_line_table
 */
class m180713_075120_add_column_to_prodrec_line_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('prod_rec_line','orchard',$this->integer());
        $this->addColumn('prod_rec_line','team1',$this->integer());
        $this->addColumn('prod_rec_line','team2',$this->integer());
        $this->addColumn('prod_rec_line','qc_note',$this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('prod_rec_line','orchard');
        $this->dropColumn('prod_rec_line','team1');
        $this->dropColumn('prod_rec_line','team2');
        $this->dropColumn('prod_rec_line','qc_note');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180713_075120_add_column_to_prodrec_line_table cannot be reverted.\n";

        return false;
    }
    */
}
