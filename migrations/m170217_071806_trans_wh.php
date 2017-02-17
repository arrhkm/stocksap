<?php

use yii\db\Migration;

class m170217_071806_trans_wh extends Migration
{
    public function up()
    {
        $this->createTable('trans_wh', [
            'id'=>$this->primaryKey(),
            'date_create'=> $this->date(),
            'trans_code'=>$this->integer(1)->notNull(),
            'trans_qty'=>$this->integer()->notNull(),
            'po_number'=>$this->string(50),
            'location'=>$this->string(225),
            'name_user_take'=>$this->string(225),
            'from_to'=>$this->string(225),
            'grpo_number'=>$this->string(50),
            'item_id'=>$this->integer(),
            'projectsub_id'=>$this->integer(),
        ]);
        
        $this->addForeignKey(
                'fk_trans_wh_item_id', 'trans_wh', 
                'item_id', 'item', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_trans_wh_projectsub_id', 
                'trans_wh', 'projectsub_id', 'projectsub', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        echo "m170217_071806_trans_wh cannot be reverted.\n";

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
