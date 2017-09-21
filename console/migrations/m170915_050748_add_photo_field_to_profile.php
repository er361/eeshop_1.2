<?php

use yii\db\Migration;

class m170915_050748_add_photo_field_to_profile extends Migration
{
    public function safeUp()
    {
        $this->addColumn('prodavec_personal_info','photo_path','string');
    }

    public function safeDown()
    {
        $this->dropColumn('prodavec_personal_info','photo_path');
        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170915_050748_add_photo_field_to_profile cannot be reverted.\n";

        return false;
    }
    */
}
