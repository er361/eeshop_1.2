<?php

use yii\db\Migration;

class m170919_111646_add_access_token_to_user extends Migration
{
    public function safeUp()
    {
        $this->addColumn('user','access_token','string');
    }

    public function safeDown()
    {
        $this->dropColumn('user','access_token');
        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170919_111646_add_access_token_to_user cannot be reverted.\n";

        return false;
    }
    */
}
