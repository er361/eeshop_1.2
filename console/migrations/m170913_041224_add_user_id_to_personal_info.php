<?php

use yii\db\Migration;

class m170913_041224_add_user_id_to_personal_info extends Migration
{
    public function safeUp()
    {
        $this->addColumn('prodavec_personal_info','user_id','int');
    }

    public function safeDown()
    {
        $this->dropColumn('prodavec_personal_info','user_id');
        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170913_041224_add_user_id_to_personal_info cannot be reverted.\n";

        return false;
    }
    */
}
