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

    public function actionProducts()
    {
        if(\Yii::$app->request->isPjax)
            return $this->renderAjax('product');

        return $this->render('product');
    }
}
