<?php

use yii\db\Migration;

/**
 * Class m180711_014630_add_column_to_prod_rec_table
 */
class m180711_014630_add_column_to_prod_rec_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('prod_rec','orchard_id',$this->integer());
        $this->addColumn('prod_rec','team_id',$this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addColumn('prod_rec','orchard_id');
        $this->addColumn('prod_rec','team_id');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180711_014630_add_column_to_prod_rec_table cannot be reverted.\n";

        return false;
    }
    */
}
