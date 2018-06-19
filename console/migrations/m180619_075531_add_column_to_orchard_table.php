<?php

use yii\db\Migration;

/**
 * Class m180619_075531_add_column_to_orchard_table
 */
class m180619_075531_add_column_to_orchard_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
      $this->addColumn('orchard','contact_name',$this->string());
      $this->addColumn('orchard','id_card',$this->string(10));
      $this->addColumn('orchard','latlong',$this->string());
      $this->addColumn('orchard','standard',$this->string());
      $this->addColumn('orchard','attach_file',$this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('orchard','contact_name');
        $this->dropColumn('orchard','id_card');
        $this->dropColumn('orchard','latlong');
        $this->dropColumn('orchard','standard');
        $this->dropColumn('orchard','attach_file');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180619_075531_add_column_to_orchard_table cannot be reverted.\n";

        return false;
    }
    */
}
