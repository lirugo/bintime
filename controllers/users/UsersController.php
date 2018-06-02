<?php

namespace app\controllers\users;

use app\models\Address;
use app\models\User;
use Yii;
use yii\data\Pagination;
use yii\data\Sort;
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

        //Sorting
        $sort = new Sort([
            'attributes' => [
                'name' => [
                    'asc' => ['name' => SORT_ASC, 'surname' => SORT_ASC],
                    'desc' => ['name' => SORT_DESC, 'surname' => SORT_DESC],
                    'default' => SORT_DESC,
                    'label' => 'By name',
                ],
                'created_at' => [
                    'asc' => ['created_at' => SORT_ASC],
                    'desc' => ['created_at' => SORT_DESC],
                    'default' => SORT_DESC,
                    'label' => 'By creation',
                ],
            ],
        ]);

        //New user first
        $users = $query->orderBy($sort->orders)
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        // Return view with data
        return $this->render('/users/index', [
            'users' => $users,
            'pagination' => $pagination,
            'sort' => $sort,
        ]);
    }

    /**
     * Delete user.
     *
     * @param $id
     * @return string
     * @throws \Throwable
     */
    public function actionUpdate($id)
    {
        //Get user
        $user = User::findOne($id);
        $addresses = $user->addresses;

        //Pagination
        //I know it's very dirty, i will been change it in the near future
        $query = Address::find()->where(['user_id' => $user->id]);
        $countQuery = clone $query;
        $pages = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $countQuery->count()
        ]);
        $addresses = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();



        //Update
        if($user->load(Yii::$app->request->post()) && $user->save())
            return $this->redirect(['/users/users/index']);

        //Return view with data
        return $this->render('/users/update', [
            'user' => $user,
            'addresses' => $addresses,
            'pages' => $pages,
        ]);
    }

    /**
     * Delete user.
     *
     * @param $id
     * @return string
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
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
