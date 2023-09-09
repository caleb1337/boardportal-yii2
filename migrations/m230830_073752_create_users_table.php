<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%users}}`.
 */
class m230830_073752_create_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%users}}', [
            'id' => $this->primaryKey(),
            'login' => $this->char(30)->unique(),
            'first_name' => $this->string(40),
            'last_name' => $this->string(40),
            'password' => $this->char(60)->notNull(),
            'date_of_registration' => $this->timestamp()->notNull(),
            'role' => $this->string(30),
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%users}}');
    }
}
