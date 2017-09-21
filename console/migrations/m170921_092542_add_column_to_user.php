<?php

use yii\db\Migration;

class m170921_092542_add_column_to_user extends Migration
{
    public function safeUp()
    {
        $this->alterColumn('user','username',$this->string()->unique());
    }

    public function safeDown()
    {
        echo "m170921_092542_add_column_to_user cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170921_092542_add_column_to_user cannot be reverted.\n";

        return false;
    }
    */
}
