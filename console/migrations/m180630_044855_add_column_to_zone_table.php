<?php

use yii\db\Migration;

/**
 * Class m180630_044855_add_column_to_zone_table
 */
class m180630_044855_add_column_to_zone_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
      $this->addColumn('zone','max_qty',$this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('zone','max_qty');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180630_044855_add_column_to_zone_table cannot be reverted.\n";

        return false;
    }
    */
}
