<?php

use yii\db\Migration;

class m170922_112955_add_sub_category extends Migration
{
    public function safeUp()
    {
        $this->createTable('subcategory',[
            'id' => $this->primaryKey(),
            'name' => $this->string()
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('subcategory');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170922_112955_add_sub_category cannot be reverted.\n";

        return false;
    }
    */
}
