<?php

namespace app\models\auth;

use app\models\User;
use yii\base\Model;

/**
 * Signup form
 */
class SignupForm extends Model
{

    public $login;
    public $name;
    public $surname;
    public $sex;
    public $email;
    public $password;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            //Login
            ['login', 'trim'],
            ['login', 'required'],
            ['login', 'unique', 'targetClass' => '\app\models\User', 'message' => 'This login has already been taken.'],
            ['login', 'string', 'min' => 4, 'max' => 255],
            //Name
            ['name', 'trim'],
            ['name', 'required'],
            ['name', 'match', 'pattern' => '/^[A-Z][a-z_-]{2,19}$/', 'message' => 'First character is uppercase and only characters'],
            //Surname
            ['surname', 'trim'],
            ['surname', 'required'],
            ['surname', 'match', 'pattern' => '/^[A-Z][a-z_-]{2,19}$/', 'message' => 'First character is uppercase and only characters'],
            //Email
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => '\app\models\User'],
            //Password
            ['password', 'trim'],
            ['password', 'required'],
            ['password', 'string', 'min' => 6, 'max' => 255, 'message' => 'Min 6 character'],

        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     * @throws \yii\base\Exception
     */
    public function signup()
    {
        //Validate
        if (!$this->validate()) {
            return null;
        }

        //Create new user
        $user = new User();
            $user->login = $this->login;
            $user->name = $this->name;
            $user->surname = $this->surname;
            $user->email = $this->email;
            $user->sex = $this->sex;
            $user->setPassword($this->password);
        $user->save();

        //Return
        return $user->save() ? $user : null;
    }

}