<?php

use yii\db\Migration;

/**
 * Class m180710_033454_add_column_to_zone_table
 */
class m180710_033454_add_column_to_zone_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
       $this->addColumn('zone','lock',$this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('zone','lock');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180710_033454_add_column_to_zone_table cannot be reverted.\n";

        return false;
    }
    */
}
