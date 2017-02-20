<?php

use yii\db\Migration;

class m170220_072215_transcode extends Migration
{
    public function up()
    {
        $this->createTable('transcode', [
            'id'=>$this->primaryKey(),
            'transcode_name'=>$this->string(100),
            'transcode_dscription'=>$this->text(),
        ]);
    }

    public function down()
    {
        echo "m170220_072215_transcode cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
