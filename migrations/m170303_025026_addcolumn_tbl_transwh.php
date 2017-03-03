<?php

use yii\db\Migration;

class m170303_025026_addcolumn_tbl_transwh extends Migration
{
    public function up()
    {
        $this->addColumn('trans_wh', 'pr_number', $this->integer());
    }

    public function down()
    {
        echo "m170303_025026_addcolumn_tbl_transwh cannot be reverted.\n";

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
