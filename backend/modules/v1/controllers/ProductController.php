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
            'class' => HttpBasicAuth::className()
        ];
        return $behaviors;
    }
}