<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%users_info}}`.
 */
class m230901_095040_create_users_info_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%users_info}}', [
            'info_id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'avatar' => $this->char(100),
            'phone' => $this->char(30),
            'verified' => $this->boolean(),
            'num_of_active_adverts' => $this->integer() ,
            'location' => $this->text(),
        ]);
        $this->addForeignKey(
                'fk-users_info-user_id',
                'users_info',
                'user_id',
                'users',
                'id',
                'CASCADE',
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%users_info}}');
    }
}
