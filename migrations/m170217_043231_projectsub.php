<?php

use yii\db\Migration;

class m170217_043231_projectsub extends Migration
{
    public function up()
    {
        $this->createTable('projectsub',[
            'id'=>$this->primaryKey(),
            'projectsub_number'=>$this->integer(5)->notNull(),
            'projectsub_dscription'=>$this->string(225),
            'project_id'=>$this->integer(11)
            
        ]);
        
        $this->createIndex('idx_unique_project_id_projectsub',
                'projectsub', 
                ['projectsub_number', 'project_id'], 
                true);
        $this->addForeignKey(
                'fk_project_id', 
                'projectsub', 
                'project_id', 
                'project', 
                'id');
    }

    public function down()
    {
       
       $this->dropTable('projectsub');
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
