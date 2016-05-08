<?php

use yii\db\Schema;
use yii\db\Migration;

/**
 * Handles the creation for table `shop_tables`.
 */
class m160508_122001_create_shop_tables extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
    	$tableOptions = null;

        if ($this->db->driverName === 'mysql') {         
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        
          $this->createTable(
            '{{%tovar}}',
            [
                'id'    => Schema::TYPE_PK,
                'code'  => Schema::TYPE_INTEGER . ' NOT NULL',
                'name'  => Schema::TYPE_STRING . ' NOT NULL',
                'price' => Schema::TYPE_INTEGER . ' NOT NULL',
            ],
            $tableOptions
        );


          $this->createTable(
            '{{%trash}}',
            [
                'id'      => Schema::TYPE_PK,
                'tovarid' => Schema::TYPE_INTEGER . ' NOT NULL',
                'name'    => Schema::TYPE_STRING . ' NOT NULL',
                'kol'     => Schema::TYPE_INTEGER . ' NOT NULL',
                'price'   => Schema::TYPE_INTEGER . ' NOT NULL',
                'summa'   => Schema::TYPE_INTEGER . ' NOT NULL',
            ],
            $tableOptions
        );          
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%tovar}}');
        $this->dropTable('{{%trash}}');
    }
}
