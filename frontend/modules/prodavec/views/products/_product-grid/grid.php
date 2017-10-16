<?php
/**
 * Created by PhpStorm.
 * User: Maint
 * Date: 27.09.2017
 * Time: 17:31
 */


use frontend\widgets\ajaxLP\AjaxLinkPager;

use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\web\View;
use yii\widgets\Pjax;
use yii\helpers\Html;
/* @var $this yii\web\View */
?>

    <?echo GridView::widget([
        'id' => 'product_grid_widget',
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'pager' => [
        'class' => AjaxLinkPager::className(),
        'costil' => $subcategory_id,
        'hideOnSinglePage' => false
    ],
    'columns' => [
        [
            'class' => \yii\grid\CheckboxColumn::className()
        ],
        [
            'label' => '№',
            'format' => 'html',
            'value' => function($model,$key,$index){
                    return  '<b>'.($index + 1).'</b>';
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
        [
            'class' => yii\grid\ActionColumn::className(),
            'template' => '{update}',
            'controller' => 'my-products',
            'buttons' => [
              'update' => function($url,$model){
                    return $this->render('_vitrina_status_form',
                    ['model' => $model]);
              }
            ],
            'content' => function($model)
            {
                return $model->vitrina_status;
            }
        ]
    ]
]); ?>

<? $this->registerJs( '$(\'body\').on(\'click\',\'input.select-on-check-all\',function(){
        $(\'input[name = "selection[]"]\').each(function(i,el){
            val = $(el).val();
            if($(el).prop(\'checked\') == false)
                $(el).prop(\'checked\',true);
            else
                $(el).prop(\'checked\',false);
//                console.log($(el).prop(\'checked\'));
        })
    })')?>
<script>
//    $('body').on('click','input.select-on-check-all',function(){
//        $('input[name = "selection[]"]').each(function(i,el){
//            console.log(i);
//        })
//    })
</script>



