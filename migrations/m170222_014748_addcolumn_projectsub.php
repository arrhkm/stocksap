<?php

use yii\db\Migration;

class m170222_014748_addcolumn_projectsub extends Migration
{
    public function up()
    {
        $this->addColumn('projectsub', 'projectsub_numberid', $this->string()->unique());
    }

    public function down()
    {
        echo "m170222_014748_addcolumn_projectsub cannot be reverted.\n";

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
