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
    function actionInit(){

        $auth = Yii::$app->authManager;
        $auth->removeAll();
    }

    function actionAssign($username,$role)
    {
        $auth = Yii::$app->authManager;

        $lRole =  $auth->createRole($role);
        $auth->add($lRole);

        $auth->assign($lRole,User::findByUsername($username)->getId());
    }
}