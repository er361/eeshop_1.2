<?php

use yii\db\Migration;

class m170913_032357_rename_personal_info extends Migration
{
    public function safeUp()
    {
        $this->renameTable('prodavec_profile','prodavec_personal_info');
        $this->renameColumn('prodavec_personal_info','e-mail','email');
    }

    public function safeDown()
    {
        $this->dropTable('prodavec_personal_info');
        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170913_032357_rename_personal_info cannot be reverted.\n";

        return false;
    }
    */
}
