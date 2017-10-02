<?php
/**
 * Created by PhpStorm.
 * User: Maint
 * Date: 02.10.2017
 * Time: 18:18
 */
use yii\helpers\Html;
/* @var $model \common\models\Product */
?>
<div class="grid">
    <div class="col-md-5">
        <img src="http://fakeimg.pl/150x100/?text=Product-img">
    </div>
    <div class="col-md-7">
        <ul>
            <li><?=Html::a($model->title,'#')?></li>
            <li><?= $model->vendor_code?></li>
            <li><?= $model->color?></li>
            <li><?= $model->size?></li>
        </ul>
    </div>
</div>




