<?php

namespace app\controllers\users;

use app\models\User;
use Yii;
use yii\data\Pagination;
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
        // Get all users
        $query = User::find();

        // Set pagination parameters
        $pagination = new Pagination([
            'defaultPageSize' => 6,
            'totalCount' => $query->count(),
        ]);
        $users = $query->orderBy('created_at')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        // Return view with data
        return $this->render('/users/index', [
            'users' => $users,
            'pagination' => $pagination,
        ]);
    }

    /**
     * Delete user.
     *
     * @return string
     */
    public function actionDelete($id)
    {
        //Find user by $id
        $user = User::find()->where(['id' => $id])->one();

        //Delete if exist
        if($user !== NULL)
            $user->delete();

        //Show flash message

        // Redirect back
        Yii::$app->getResponse()->redirect(array('/users/users/index'));
    }

}
