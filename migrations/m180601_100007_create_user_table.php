<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user`.
 */
class m180601_100007_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'login' => $this->string()->notNull()->unique(),
            'email' => $this->string()->notNull()->unique(),
            'name' => $this->string()->notNull(),
            'surname' => $this->string()->notNull(),
            'sex' => "ENUM('no information', 'male', 'female')",
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'created_at' => 'timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP'
        ]);

        $sql = "ALTER TABLE user ALTER sex SET DEFAULT 'no information'";
        $this->execute($sql);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('user');
    }
}
