<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "users".
 *
 * @property int         $id
 * @property string|null $login
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $password
 * @property string $date_of_registration
 * @property string $role
 *
 * @property Advert[] $adverts
 * @property UserInfo[] $usersInfo
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
                [['login'], 'string', 'max' => 30],
                [['login'], 'unique'],
                [['date_of_registration','role'], 'safe'],
                [['first_name', 'last_name','role'], 'string', 'max' => 40],
                [['password'], 'string', 'max' => 60],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
                'id' => 'ID',
                'login' => 'Логин',
                'first_name' => 'Имя',
                'last_name' => 'Фамилия',
                'password' => 'Пароль',
                'date_of_registration' => 'Дата регистрации',
                'role' => 'Привелегии',
        ];
    }

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findByUsername($login)
    {
        return static::findOne(['login' => $login]);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['token' => $token]);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
//        return $this->authKey;
        return true;
    }

    public function validateAuthKey($authKey)
    {
//        return $this->authKey === $authKey;
        return true;
    }

    public function validatePassword($password)
    {
        return \Yii::$app->getSecurity()->validatePassword($password, $this->password);
    }

    /**
     * Gets query for [[Adverts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAdverts()
    {
        return $this->hasMany(Advert::class, ['user_id' => 'id']);
    }

    public function getUsersInfo()
    {
        return $this->hasMany(UserInfo::class, ['user_id' => 'id']);
    }



}

