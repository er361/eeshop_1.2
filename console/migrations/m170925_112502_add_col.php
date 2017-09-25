<?php

use yii\db\Migration;

class m170925_112502_add_col extends Migration
{
    public function safeUp()
    {
        $this->addColumn('product','subcategory_id',$this->integer());
        $this->addColumn('product','price',$this->float());
        $this->addColumn('product','price_on_website',$this->float());
        $this->addColumn('product','vitrina_status',$this->integer());
    }

    public function safeDown()
    {
        $this->dropColumn('product','subcategory_id');
        $this->dropColumn('product','price');
        $this->dropColumn('product','price_on_website');
        $this->dropColumn('product','vitrina_status');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170925_112502_add_col cannot be reverted.\n";

        return false;
    }
    */
}
