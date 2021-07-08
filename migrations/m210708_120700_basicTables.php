<?php

use yii\db\Migration;

/**
 * Class m210708_120700_basicTables
 */
class m210708_120700_basicTables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $tableOptions = null;

        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci';
        }

        $this->createTable('{{%action%}}',[
            'id'=>$this->primaryKey(),
            'tid'=>$this->bigInteger()->notNull(),
            'sale_id'=>$this->string(255)->null(),
            'status'=>$this->tinyInteger()->defaultValue(0)->notNull(),
            'pub_id'=>$this->integer()->notNull(),
            'date_created'=>$this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'date_closed'=>$this->timestamp()->null(),
            'subid1'=>$this->integer()->null(),
            'subid2'=>$this->integer()->null(),
            'subid3'=>$this->integer()->null(),
            'subid4'=>$this->integer()->null(),
            'subid5'=>$this->integer()->null(),
        ], $tableOptions);

        $this->createIndex('date','action','date_created');
        $this->createIndex('sale','action','sale_id',TRUE);
        $this->createIndex('tid','action','tid',TRUE);

        $this->createTable('{{%subid%}}',[
            'id'=>$this->primaryKey(),
            'pub_id'=>$this->integer()->notNull(),
            'keyword'=>$this->string(255)->notNull(),
            'type'=>$this->tinyInteger(1)->notNull(),
        ],$tableOptions);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%action%}}');
        $this->dropTable('{{%subid%}}');
    }
}
