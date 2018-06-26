<?php

use yii\db\Migration;

/**
 * Class m180626_104427_add_column_to_purch_plan_line_table
 */
class m180626_104427_add_column_to_purch_plan_line_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
       $this->addColumn('purch_plan_line','sup_id',$this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
       $this->dropColumn('purch_plan_line','sup_id');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180626_104427_add_column_to_purch_plan_line_table cannot be reverted.\n";

        return false;
    }
    */
}
