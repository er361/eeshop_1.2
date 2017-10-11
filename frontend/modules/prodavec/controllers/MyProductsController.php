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
    protected $searchModel = null;
    protected $subcategory_id;

    public function behaviors()
    {
        return [
          'verbs' => [
              'class' => \yii\filters\VerbFilter::className(),
              'actions' => [
                  'delete' => ['post']
              ]
          ]
        ];
    }

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


        $subcategory_id = Yii::$app->request->queryParams['id'];

        $this->setSubcategoryId($subcategory_id);

        if(\Yii::$app->request->isPjax){
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->renderPartial('index-product',['dataProvider' => $dataProvider,
                'searchModel' => $searchModel,
                'subcategory_id' => $subcategory_id]);
        }else{
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('index-product',['dataProvider' => $dataProvider,
                'searchModel' => $searchModel,
                'subcategory_id' => $subcategory_id]);
        }



    }

    /**
     * @param mixed $subcategory_id
     */
    public function setSubcategoryId($subcategory_id)
    {
        $this->subcategory_id = isset($subcategory_id) ? $subcategory_id : null;
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

        if(Yii::$app->request->isPjax or Yii::$app->request->queryParams['_pjax']){
            return $this->renderAjax('_product-grid',[
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider
            ]);
        }
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

    public function actionDelete()
    {
        $keys = Yii::$app->request->bodyParams['keys'];
        if(Yii::$app->request->isPost and (count($keys) > 0)){
            foreach ($keys as $key) {
                $row = Product::find()->where(['id' => $key])->one();
                $row->delete();
            }
        }
        $this->redirect(['products','id' => Yii::$app->request->bodyParams['subcategory_id']]);
    }

    public function actionView($id)
    {
        $model = $this->loadModel($id);

        if(Yii::$app->request->isPjax)
            return $this->renderPartial('detail/index',['model' => $model]);

        return $this->render('detail/index',['model' => $model]);
    }

    public function loadModel($id)
    {
        $model = Product::findOne($id);
        return $model;
    }

}
