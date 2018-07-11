<?php

use yii\db\Migration;

/**
 * Class m180711_015521_add_column_to_orchard_table
 */
class m180711_015521_add_column_to_orchard_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
       $this->addColumn('orchard','iscompany',$this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
      $this->dropColumn('orchard','iscompany');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180711_015521_add_column_to_orchard_table cannot be reverted.\n";

        return false;
    }
    */
}
