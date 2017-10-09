<?php
/**
 * Created by PhpStorm.
 * User: Maint
 * Date: 05.10.2017
 * Time: 10:45
 */

/* @var $this yii\web\View; */
use yii\helpers\Html;
use yii\web\View;

?>

<div class="pull-left">
    <div style="margin-top: 18px;"></div>
    <?=Html::dropDownList('per-page',[],[
        5 => 5,
        10 => 10,
        15 => 15,
        20 => 20,
        50 => 50,
        100 => 100,
    ],['class' => 'pagDynamicSelect']) ?>
</div>

