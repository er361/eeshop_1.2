<?php

namespace frontend\modules\prodavec\controllers;

class MyProductsController extends \yii\web\Controller
{
    public function actionIndex()
    {
        if(\Yii::$app->request->isPjax)
            return $this->renderAjax('index');

        return $this->render('index');
    }
}
