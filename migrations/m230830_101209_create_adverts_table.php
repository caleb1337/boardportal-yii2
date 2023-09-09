<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%adverts}}`.
 */
class m230830_101209_create_adverts_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%adverts}}', [
            'advert_id' => $this->primaryKey(),
            'date_of_placement' => $this->timestamp()->notNull(),
            'date_of_update' => $this->timestamp(),
            'title' => $this->string(150),
            'description' => $this->text(),
            'price' => $this->integer(30)->null(),
            'location' => $this->string(150),
            'user_id' => $this->integer()->notNull(),
            'category_id' => $this->integer(),
            'status' => $this->boolean(),
        ]);

        $this->addForeignKey(
            'fk-adverts-user_id',
            'adverts',
            'user_id',
            'users',
            'id',
            'CASCADE',
        );

        $this->addForeignKey(
            'fk-adverts-category_id',
            'adverts',
            'category_id',
            'categories',
            'category_id',
            'CASCADE',
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%adverts}}');
    }
}
