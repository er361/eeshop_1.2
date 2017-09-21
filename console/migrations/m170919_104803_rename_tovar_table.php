<?php

use yii\db\Migration;

class m170919_104803_rename_tovar_table extends Migration
{
    public function safeUp()
    {
        $this->renameTable('tovar','product');
    }

    public function safeDown()
    {
        echo "m170919_104803_rename_tovar_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170919_104803_rename_tovar_table cannot be reverted.\n";

        return false;
    }
    */
}
