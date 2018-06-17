<?php

use yii\db\Migration;

/**
 * Class m180516_025354_add_column_to_journaltable
 */
class m180516_025354_add_column_to_journaltable extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('journaltable','trans_type',$this->integer()->after('id'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('journaltable','trans_type');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180516_025354_add_column_to_journaltable cannot be reverted.\n";

        return false;
    }
    */
}
