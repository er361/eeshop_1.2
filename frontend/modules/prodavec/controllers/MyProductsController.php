<?php

namespace frontend\modules\prodavec\controllers;


use frontend\modules\prodavec\models\ProductSearch;
use frontend\modules\prodavec\models\Subcategory;
use Yii;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\data\Pagination;

use common\models\Product;

class MyProductsController extends Controller
{
    protected $searchModel;
    public function actionIndex()
    {
        if(\Yii::$app->request->isPjax)
            return $this->renderAjax('index');

        return $this->render('index');
    }

    protected function getSearchModel()
    {
        if($this->searchModel)
            return $this->searchModel;
        else
            return $this->searchModel = new ProductSearch();
    }

    public function actionProducts()
    {
        $searchModel = $this->getSearchModel();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $subcategory_id = Yii::$app->request->queryParams['id'];

        if(\Yii::$app->request->isPjax)
            return $this->renderPartial('index-product',['dataProvider' => $dataProvider,
                'searchModel' => $searchModel,
                'subcategory_id' => $subcategory_id]);

        return $this->render('index-product',['dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
            'subcategory_id' => $subcategory_id]);
    }

    public function actionSubCat($category_id)
    {
        $subCats = Subcategory::find()->where(['category_id' => $category_id])->all();
        return $this->renderAjax('_subCatDropDown',['subCats' => $subCats]);
    }

    public function actionProductGrid()
    {
        $searchModel = $this->getSearchModel();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        if(Yii::$app->request->isPjax or Yii::$app->request->queryParams['_pjax'])
            return $this->renderPartial('_product-grid',[
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider
            ]);

            return $this->redirect(['products',
                'id' => ArrayHelper::getValue(Yii::$app->request->queryParams,'ProductSearch.subcategory_id')
            ]);
    }

    public function actionVitrinaStatus($id)
    {
        $request = Yii::$app->request;
        if($request->isPjax){
            $model = Product::findOne($id);
            $model->setAttributes(ArrayHelper::getValue($request->post(),'Product'));
            $model->save();
            return $this->renderPartial('_vitrina_status_form',['model' => $model]);
        }
    }

    public function actionProductExcel()
    {
        $file = \Yii::createObject([
            'class' => 'codemix\excelexport\ExcelFile',
            'sheets' => [
                'Product' => [
                    'class' => 'codemix\excelexport\ActiveExcelSheet',
                    'query' => Product::find(),
                ]
            ]
        ]);
        $file->send('product.xlsx');
    }
}
