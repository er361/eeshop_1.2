<?php
/**
 * Created by PhpStorm.
 * User: Maint
 * Date: 25.09.2017
 * Time: 11:50
 * @var $this yii\web\View
 */

use yii\grid\GridView;
use yii\widgets\Pjax;

?>
<div style="width: 800px;overflow-x: auto">

    <? Pjax::begin([
            'clientOptions' => [
                'container' => '#product-grid'
            ]
    ])?>
        <?= $this->render('index-search', ['model' => $searchModel]) ?>
    <? Pjax::end()?>

    <? Pjax::begin()?>
        <div id="product-grid">
            <?= $this->render('_product-grid',[
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel
            ])?>
        </div>
    <? Pjax::end()?>
</div>



