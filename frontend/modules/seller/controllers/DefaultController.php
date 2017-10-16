<?php

namespace frontend\modules\seller\controllers;

use yii\web\Controller;

/**
 * Default controller for the `seller` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->redirect(['/seller/personal-info/update','id' => \Yii::$app->user->id]);
    }
}
