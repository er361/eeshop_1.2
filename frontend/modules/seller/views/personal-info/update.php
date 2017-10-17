<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\modules\seller\models\PersonalInfo */

$this->title = 'Personal Info: ' . $model->first_name;

?>
<div class="personal-info-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

    <? $this->beginBlock('avatar_block');?>
        <div class="col-md-2">
            <?echo $this->render('@seller_v/layouts/_avatar_block',['model' => $model]);?>
        </div>
    <? $this->endBlock()?>
</div>
