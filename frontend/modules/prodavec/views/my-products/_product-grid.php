<?php
/**
 * Created by PhpStorm.
 * User: Maint
 * Date: 27.09.2017
 * Time: 17:31
 */

use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */

echo GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        [
            'label' => '№',
            'format' => 'html',
            'value' => function($model,$key,$index){
                    return  '<b>'.$index.'</b>';
            }
        ],
        [
          'attribute' => 'title',
          'format' => 'html',
          'value' => function($model){
             return $this->render('_product_grid_view',['model' => $model]);
          }
        ],
        'price',
        'price_on_website',
        'amount',
        'vitrina_status'
    ]
])?>

