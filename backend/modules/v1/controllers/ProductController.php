<?php
/**
 * Created by PhpStorm.
 * User: Maint
 * Date: 19.09.2017
 * Time: 16:42
 */

namespace backend\modules\v1\controllers;


use common\models\User;
use yii\filters\auth\HttpBasicAuth;
use yii\rest\ActiveController;

class ProductController extends ActiveController
{
    public $modelClass = 'common\models\Product';

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => HttpBasicAuth::className(),
            'auth' => function ($username, $password) {
                $user = User::find()->where(['username' => $username])->one();
                if ($user->validatePassword($password)) {
                    return $user;
                }
                return null;
            },
        ];
        return $behaviors;
    }
}