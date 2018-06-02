<?php

namespace app\models;

use yii\db\ActiveRecord;


/**
 * User model
 *
 * @property integer $id
 * @property string $login
 * @property string $email
 * @property string $name
 * @property string $surname
 * @property string $sex
 * @property string $password_hash
 * @property string $password_reset_token
 */
class Address extends ActiveRecord
{
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}