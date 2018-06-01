<?php

namespace app\controllers\auth;

use app\models\auth\SignupForm;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;

class SignupController extends Controller
{
    public function actionIndex()
    {
        $model = new SignupForm();

        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('/auth/signup', [
            'model' => $model,
        ]);
    }
}
