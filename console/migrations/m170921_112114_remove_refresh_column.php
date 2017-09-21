<?php

use yii\db\Migration;

class m170921_112114_remove_refresh_column extends Migration
{
    public function safeUp()
    {
        $this->dropColumn('token','refresh_token');
    }

    public function safeDown()
    {
        $this->addColumn('token','refresh_token','string');
        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170921_112114_remove_refresh_column cannot be reverted.\n";

        return false;
    }
    */
}
