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
    <? Pjax::begin()?>
        <?= $this->render('_search', ['model' => $searchModel,'id' => $id]) ?>


        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel
        ])?>

    <? Pjax::end()?>

</div>


