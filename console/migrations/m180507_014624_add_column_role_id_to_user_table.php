<?php

use yii\db\Migration;

/**
 * Class m180507_014624_add_column_role_id_to_user_table
 */
class m180507_014624_add_column_role_id_to_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('user','role_id',$this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
       $this->dropColumn('user','role_id');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180507_014624_add_column_role_id_to_user_table cannot be reverted.\n";

        return false;
    }
    */
}
