<?php

namespace app\models\auth;

use app\models\Address;
use app\models\User;
use yii\base\Model;

/**
 * Signup form
 */
class SignupForm extends Model
{
    // User fields
    public $login;
    public $name;
    public $surname;
    public $sex;
    public $email;
    public $password;

    // Address fields
    public $postcode;
    public $country;
    public $city;
    public $street;
    public $house;
    public $office;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            //User data
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
            //Gender
            ['sex', 'required'],
            //Password
            ['password', 'trim'],
            ['password', 'required'],
            ['password', 'string', 'min' => 6, 'max' => 255, 'message' => 'Min 6 character'],

            //Address data
            //Postcode
            ['postcode', 'trim'],
            ['postcode', 'required'],
            ['postcode', 'match', 'pattern' => '/^\\d{5}$/', 'message' => 'Only 5 numbers'],
            //Country
            ['country', 'trim'],
            ['country', 'required'],
            ['country', 'match', 'pattern' => '/[A-Z]{2}/', 'message' => 'Only 2 uppercase letters'],
            //City
            ['city', 'trim'],
            ['city', 'required'],
            //Street
            ['street', 'trim'],
            ['street', 'required'],
            //House
            ['house', 'trim'],
            ['house', 'required'],
            //Office
            ['office', 'trim'],
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

        //Persist to db
        //Create new user
        $user = new User();
            $user->login = $this->login;
            $user->name = $this->name;
            $user->surname = $this->surname;
            $user->email = $this->email;
            $user->sex = $this->sex;
            $user->setPassword($this->password);
        $user->save();

        //Create address
        $address = new Address();
            $address->user_id = $user->id;
            $address->postcode = $this->postcode;
            $address->country = $this->country;
            $address->city = $this->city;
            $address->street = $this->street;
            $address->house = $this->house;
            $address->office = $this->office;
        $address->save();

        //Return
        return $user->save() ? $user : null;
    }

}