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


    public function actionProducts()
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $id = Yii::$app->request->queryParams['id'];
        if(\Yii::$app->request->isPjax)
            return $this->renderAjax('product',['dataProvider' => $dataProvider,
                'searchModel' => $searchModel,
                'id' => $id]);

        return $this->render('product',['dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
            'id' => $id]);
    }
}
