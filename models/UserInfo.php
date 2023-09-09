<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users_info".
 *
 * @property int $info_id
 * @property int|null $user_id
 * @property string|null $avatar
 * @property string|null $phone
 * @property int|null $verified
 * @property string|null $location
 *
 * @property User $user
 */
class UserInfo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users_info';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'verified'], 'integer'],
            [['location'], 'string'],
            [['avatar'], 'string', 'max' => 100],
            [['phone'], 'string', 'max' => 30],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'info_id' => 'Info ID',
            'user_id' => 'Идентификатор пользователя',
            'avatar' => 'Avatar',
            'phone' => 'Телефон',
            'verified' => 'Verified',
            'location' => 'Местоположение',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
