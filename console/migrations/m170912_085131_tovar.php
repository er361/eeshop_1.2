<?php

use yii\db\Migration;

class m170912_085131_tovar extends Migration
{
    public function safeUp()
    {
        $this->createTable('tovar',[
           'id' => $this->primaryKey(),
           'title' => $this->string(),
           'brend_name' => $this->string(),
           'artikyl' => $this->integer(),
           'size' => $this->integer(),
           'color' => $this->string(),
           'prodavec_id' => $this->integer()
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('tovar');
        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170912_085131_tovar cannot be reverted.\n";

        return false;
    }
    */
}
