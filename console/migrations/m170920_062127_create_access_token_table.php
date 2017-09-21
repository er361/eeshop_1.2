<?php

use yii\db\Migration;

/**
 * Handles the creation of table `access_token`.
 */
class m170920_062127_create_access_token_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('token', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('access_token');
    }
}
