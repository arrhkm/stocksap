<?php

use yii\db\Migration;

class m170217_040344_project extends Migration
{
    public function up()
    {
        $this->createTable('project', [
            'id'=>$this->primaryKey(11),
            'project_number'=>$this->string()->notNull()->unique(),
            'project_dscription'=>$this->string(225),
        ]);
    }

    public function down()
    {
        $this->dropTable('project');
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
