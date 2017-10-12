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

<div class="form-group" style="width: 60px;margin-top: 20px">
    <?= Html::beginForm($widget->action,'get',['data' => ['pjax' => true],
        'class' => 'underGrid'])?>
        <?=Html::dropDownList('per-page','',$widget->pageSizeArray,[
                'id' => $widget->id,
        'class' => 'form-control'
        ])?>
    <?=Html::hiddenInput('page',$pagination->getPage() + 1)?>

    <?= Html::endForm()?>
</div>
<?

?>
<?$this->registerJs($js);

