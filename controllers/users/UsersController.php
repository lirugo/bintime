<?php

namespace app\controllers\users;

use app\models\User;
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

}
