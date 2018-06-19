<?php

use yii\db\Migration;

/**
 * Class m180618_152332_add_column_to_team_table
 */
class m180618_152332_add_column_to_team_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('team','team_type',$this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
       $this->dropColumn('team','team_type');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180618_152332_add_column_to_team_table cannot be reverted.\n";

        return false;
    }
    */
}
