<?php

use yii\db\Migration;

/**
 * Class m180619_024817_add_column_wage_to_team_table
 */
class m180619_024817_add_column_wage_to_team_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
      $this->addColumn('team','wage',$this->float());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('team','wage');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180619_024817_add_column_wage_to_team_table cannot be reverted.\n";

        return false;
    }
    */
}
