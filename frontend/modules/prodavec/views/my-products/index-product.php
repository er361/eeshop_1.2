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
    <? Pjax::begin(['id' => 'strangeId','clientOptions' => ['container' => '#product-grid'],
        'enablePushState' => false])?>
        <?= $this->render('index-search', ['model' => $searchModel,'subcategory_id' => $subcategory_id])?>
    <? Pjax::end()?>

    <!--EXCEL-->
        <? Pjax::begin(['enablePushState' => false])?>
            <?= Html::a('Выгрузить в excel','product-excel',['class' => 'btn btn-primary pull-right'])?>
        <? Pjax::end()?>

    <!--RENDER !!!! THIS IS RENDER NOT GRID-->
    <? Pjax::begin(['id' => 'product_grid_pjax', 'formSelector' => false,
        'enablePushState' => true,
        'enableReplaceState' => false,
        'clientOptions' => [
                'container' => '#product-grid',
            'timeout' => 5000
        ]
    ])?>
        <div id="product-grid">
            <?= $this->render('_product-grid',[
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
            ])?>
        </div>
    <? Pjax::end()?>
</div>
<?
$this->registerJs(
    "$('body').on('change','.vitrina-status',function(event){
        $(event.target).closest('form').submit();
    })",View::POS_READY);
?>



