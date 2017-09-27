<?php
/**
 * Created by PhpStorm.
 * User: Maint
 * Date: 27.09.2017
 * Time: 17:31
 */

use yii\grid\GridView;
use yii\widgets\Pjax;


 echo GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel
])?>

