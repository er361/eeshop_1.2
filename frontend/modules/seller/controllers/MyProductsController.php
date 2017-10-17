<?php

namespace frontend\modules\seller\controllers;

class MyProductsController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}
