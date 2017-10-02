<?php
/**
 * Created by PhpStorm.
 * User: Maint
 * Date: 19.09.2017
 * Time: 16:42
 */

namespace backend\modules\v1\controllers;


use common\models\User;
use backend\components\JsonAuth;
use yii\rest\ActiveController;


class ProductController extends ActiveController
{
    public $modelClass = 'common\models\Product';
    public $enableCsrfValidation = false;

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => JsonAuth::className()
        ];
        return $behaviors;
    }
}