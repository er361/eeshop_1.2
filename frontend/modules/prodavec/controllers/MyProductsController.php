<?php

namespace frontend\modules\prodavec\controllers;


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
        if(\Yii::$app->request->isPjax)
            return $this->renderAjax('product');

        $query = Product::find()->where(['subcategory_id' => $id,'prodavec_id' => Yii::$app->user->id]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query
        ]);

        return $this->render('product',['dataProvider' => $dataProvider]);
    }
}
