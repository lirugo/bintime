<?php
namespace app\commands\seeds;

use app\models\Address;
use yii\console\Controller;
use app\models\User;

class SeedController extends Controller
{
    public function actionIndex()
    {
        //Create default user
        $user = new User();
            $user->login = 'login';
            $user->name = 'name';
            $user->surname = 'surname';
            $user->email = 'email@app.com';
            $user->setPassword('password');
        $user->save();

        //Create address for default user
        $address = new Address();
            $address->user_id = 1;
            $address->postcode = '03187';
            $address->country = 'UA';
            $address->city = 'Kiev';
            $address->street = 'Khreshchatyk';
            $address->house = '98';
            $address->office = '22';
        $address->save();

    }
}