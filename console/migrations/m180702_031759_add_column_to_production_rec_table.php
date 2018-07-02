<?php

use yii\db\Migration;

/**
 * Class m180702_031759_add_column_to_production_rec_table
 */
class m180702_031759_add_column_to_production_rec_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
      $this->addColumn('production_rec','zone_type',$this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('production_rec','zone_type');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180702_031759_add_column_to_production_rec_table cannot be reverted.\n";

        return false;
    }
    */
}
