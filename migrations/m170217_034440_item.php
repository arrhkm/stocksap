<?php

use yii\db\Migration;

class m170217_034440_item extends Migration
{
    public function up()
    {
        $this->createTable('item', [
            'id'=>$this->integer(),
            'itemcode'=>$this->string(20)->notNull()->unique(),
            'item_name'=>$this->string(225),
            'PRIMARY KEY(id)',
        ]);
    }

    public function down()
    {
        $this->dropTable('item');
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
