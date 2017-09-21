<?php

use yii\db\Migration;

class m170912_083324_order extends Migration
{
    public function safeUp()
    {
        $this->createTable('orders',[
           'id' => $this->primaryKey(),
           'order_number' => $this->string(),
           'pokupatel' => $this->string(),
           'date' => $this->dateTime(),
           'phone' => $this->string(),
           'sum' => $this->float(),
           'status' => $this->boolean()
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('orders');
        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170912_083324_order cannot be reverted.\n";

        return false;
    }
    */
}
