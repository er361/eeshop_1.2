<?php

use yii\db\Migration;

class m170912_091716_prodavec_profile extends Migration
{
    public function safeUp()
    {
        $this->createTable('prodavec_profile',[
            'id' => $this->primaryKey(),
            'first_name' => $this->string(),
            'second_name' => $this->string(),
            'company_name' => $this->string(),
            'brands' => $this->string(),
            'e-mail' => $this->string(),
            'phone' => $this->string(),
            'address' => $this->string()
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('prodavec_profile');
        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170912_091716_prodavec_profile cannot be reverted.\n";

        return false;
    }
    */
}
