<?php

use yii\db\Migration;

class m170919_102702_rename_coplumns_tovar extends Migration
{
    public function safeUp()
    {
        $this->renameColumn('tovar','brend_name','brand_name');
        $this->renameColumn('tovar','artikyl','vendor_code');
    }

    public function safeDown()
    {
        echo "m170919_102702_rename_coplumns_tovar cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170919_102702_rename_coplumns_tovar cannot be reverted.\n";

        return false;
    }
    */
}
