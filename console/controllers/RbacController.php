<?php
/**
 * Created by PhpStorm.
 * User: Maint
 * Date: 12.09.2017
 * Time: 13:38
 */

namespace console\controllers;

use common\models\User;
use Yii;
use yii\console\Controller;

class RbacController extends Controller {

    function actionInit()
    {

        $auth = Yii::$app->authManager;
        $auth->removeAll();
    }

    function actionAssign($username,$role)
    {
        $auth = Yii::$app->authManager;

        if($auth->getRole($role))
            $auth->assign($role, User::findByUsername($username)->getId());
    }

    function actionAddRole($role)
    {
        $manager = Yii::$app->authManager;
        $role1 = $manager->createRole($role);
        $manager->add($role1);
    }
}