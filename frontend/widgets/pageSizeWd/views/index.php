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
/* @var $widget \frontend\widgets\pageSizeWd\PageSize;
 * @var $pagination yii\data\Pagination;
 */
?>

<div class="form-group" style="width: 280px;margin-top: 20px">
    <?= Html::beginForm($widget->action,'get',['data' => ['pjax' => true],
        'class' => 'underGrid'])?>
        <?=Html::dropDownList('per-page','',$widget->pageSizeArray,[
                'prompt' => 'Количество записай на странице',
                'id' => $widget->id,
        'class' => 'form-control'
        ])?>

    <?= Html::hiddenInput('page',$pagination->getPage() + 1)?>

<!--    Костыль-->
    <?if($widget->costil):?>
        <?= Html::hiddenInput('subcategory_id',$widget->costil); ?>
    <?endif?>
<!--    end-->

    <?= Html::endForm()?>
</div>


