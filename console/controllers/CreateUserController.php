<?php
/**
 * Created by PhpStorm.
 * User: Maint
 * Date: 13.09.2017
 * Time: 18:37
 */

namespace console\controllers;


use common\models\User;
use yii\console\Controller;

class CreateUserController extends Controller
{
    public function actionIndex($username,$password)
    {
        $user = new User();
        $user->username = $username;
        $user->setPassword($password);
        $user->generateAuthKey();

        return $user->save() ? $user : null;
    }
}