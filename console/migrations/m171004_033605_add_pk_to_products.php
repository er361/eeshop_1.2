<?php

use yii\db\Migration;

class m171004_033605_add_pk_to_products extends Migration
{
    public function safeUp()
    {
        $this->createTable('product',[
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'brand_name' => $this->string(),
            'vendor_code' => $this->integer(),
            'size' => $this->integer(),
            'color' => $this->string(),
            'prodavec_id' => $this->integer(),
            'subcategory_id' => $this->integer(),
            'price' => $this->float(),
            'price_on_website' => $this->float(),
            'vitrina_status' => $this->integer(),
            'amount' => $this->integer()
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('product');
        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171004_033605_add_pk_to_products cannot be reverted.\n";

        return false;
    }
    */
}
