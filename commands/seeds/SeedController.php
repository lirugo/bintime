<?php
namespace app\commands\seeds;

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

    }
}