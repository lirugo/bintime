<?php

namespace app\controllers;

use app\models\LoginForm;
use app\models\ContactForm;
use app\models\SignupForm;
use Yii;
use yii\web\Controller;

class SiteController extends Controller
{

    public function actionSignup()
    {
        $model = new SignupForm();

        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

}