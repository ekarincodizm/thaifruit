<?php

use yii\db\Migration;

/**
 * Class m180628_142048_add_column_to_purchrec_table
 */
class m180628_142048_add_column_to_purchrec_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
      $this->addColumn('prod_rec','zone_id',$this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
       $this->dropColumn('prod_rec','zone_id');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180628_142048_add_column_to_purchrec_table cannot be reverted.\n";

        return false;
    }
    */
}
