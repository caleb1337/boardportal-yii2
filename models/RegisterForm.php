<?php

namespace app\models;

use app\models\User;
use yii\base\Model;
//\app\models\User

/**
 * RegisterForm is the model behind the register form.
 *
 * @property string|null $login
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $password
 */

class RegisterForm extends User
{
//    public $login;
//    public $first_name;
//    public $last_name;
//    public $password;



    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['login', 'password','first_name','last_name'], 'required'],
            [['login'], 'string', 'max' => 30],
            [['login'], 'unique'],
            [['first_name', 'last_name'], 'string', 'max' => 40],
            [['password'], 'string', 'max' => 60],
        ];
    }

    public function attributeLabels()
    {
        return [
            'login' => 'Логин',
            'first_name' => 'Имя',
            'last_name' => 'Фамилия',
            'password' => 'Пароль',
        ];
    }
}
