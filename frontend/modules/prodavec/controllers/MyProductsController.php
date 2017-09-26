<?php

namespace frontend\modules\prodavec\controllers;


use frontend\modules\prodavec\models\ProductSearch;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

use common\models\Product;

class MyProductsController extends Controller
{
    public function actionIndex()
    {
        if(\Yii::$app->request->isPjax)
            return $this->renderAjax('index');

        return $this->render('index');
    }


    public function actionProducts($id)
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        if(\Yii::$app->request->isPjax)
            return $this->renderAjax('product',['dataProvider' => $dataProvider,'searchModel' => $searchModel]);

        return $this->render('product',['dataProvider' => $dataProvider,'searchModel' => $searchModel]);
    }
}
