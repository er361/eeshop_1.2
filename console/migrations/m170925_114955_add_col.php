<?php

use yii\db\Migration;

class m170925_114955_add_col extends Migration
{
    public function safeUp()
    {
        $this->addColumn('product','amount',$this->integer());
    }

    public function safeDown()
    {
        $this->dropColumn('product','amount');
        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170925_114955_add_col cannot be reverted.\n";

        return false;
    }
    */
}
