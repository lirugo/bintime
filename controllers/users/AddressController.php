<?php

namespace app\controllers\users;

use app\models\Address;
use Yii;
use yii\web\Controller;

class AddressController extends Controller
{

    /**
     * Delete address.
     *
     * @param $id
     * @return string
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function actionDelete($id)
    {
        //Find user by $id
        $address = Address::findOne($id);
        $userId = $address->user_id;
        //If its last address of user abort deleting

        //Delete if exist
        if($address !== NULL)
            $address->delete();

        //Show flash message

        // Redirect back
        Yii::$app->getResponse()->redirect(array('/users/users/update?id='.$userId));
    }

}
