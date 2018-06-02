<?php

use yii\db\Migration;

/**
 * Handles the creation of table `address`.
 */
class m180602_090524_create_address_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('address', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'postcode' => $this->string()->notNull(),
            'country' => $this->string()->notNull(),
            'city' => $this->string()->notNull(),
            'street' => $this->string()->notNull(),
            'house' => $this->integer()->notNull(),
            'office' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('address');
    }
}
