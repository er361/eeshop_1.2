<?php

use yii\db\Migration;

class m170921_051044_add_column_to_token extends Migration
{
    public function safeUp()
    {
        $this->addColumn('token','status',$this->boolean()->defaultValue(true));
    }

    public function safeDown()
    {
        $this->dropColumn('token','status');
        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170921_051044_add_column_to_token cannot be reverted.\n";

        return false;
    }
    */
}
