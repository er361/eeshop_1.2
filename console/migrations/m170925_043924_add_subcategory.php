<?php

use yii\db\Migration;

class m170925_043924_add_subcategory extends Migration
{
    public function safeUp()
    {
        $this->addColumn('subcategory','category_id',$this->integer());
    }

    public function safeDown()
    {
        $this->dropColumn('subcategory','category_id');
        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170925_043924_add_subcategory cannot be reverted.\n";

        return false;
    }
    */
}
