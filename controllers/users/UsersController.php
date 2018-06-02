<?php

namespace app\controllers\users;

use app\models\User;
use yii\web\Controller;

class UsersController extends Controller
{
    /**
     * Displays user.
     *
     * @return string
     */
    public function actionIndex()
    {
        $users = User::find()->all();
        return $this->render('/users/index', compact('users'));
    }

}
