<?php
/**
 * Created by PhpStorm.
 * User: Maint
 * Date: 25.09.2017
 * Time: 11:50
 * @var $this yii\web\View
 */

use nterms\pagesize\PageSize;
use yii\grid\GridView;
use yii\web\View;
use yii\widgets\LinkPager;
use yii\widgets\Pjax;
use yii\helpers\Html;

?>
<div style="width: 800px;overflow-x: auto">
    <!--SEARCH-->
        <? Pjax::begin(['id' => 'strangeId',
            'clientOptions' => [
                'container' => '#product-grid',
                'fragment' => '#product_grid_widget'
        ],
            'enablePushState' => false]) ?>
        <?= $this->render('_search/search', ['model' => $searchModel, 'subcategory_id' => $subcategory_id]) ?>
        <? Pjax::end() ?>

        <!--EXCEL-->
        <? Pjax::begin(['enablePushState' => false,'timeout' => 10000]) ?>
            <?= Html::a('Выгрузить в excel', 'product-excel', ['class' => 'btn btn-primary pull-right']) ?>
        <? Pjax::end() ?>

        <!--RENDER !!!! THIS IS RENDER NOT GRID-->

        <? Pjax::begin([
                'id' => 'product_grid_pjax',
            'formSelector' => '.underGrid',
            'enablePushState' => true,
            'enableReplaceState' => false,
            'clientOptions' => [
                'container' => '#product-grid',
                'fragment' => '#product_grid_widget'
            ]
        ])?>
        <div id="product-grid">
            <?= $this->render('_product-grid/grid', [
                'dataProvider' => $dataProvider,
                'searchModel' => $searchModel,
                'subcategory_id' => $subcategory_id
            ]); ?>
        </div>
        <? Pjax::end() ?>

</div>
<?
$this->registerJs(
    "$('body').on('change','.vitrina-status',function(event){
        $(event.target).closest('form').submit();
    })", View::POS_READY);
?>



