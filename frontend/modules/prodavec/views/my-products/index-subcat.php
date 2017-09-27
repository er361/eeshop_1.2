<?php


use yii\helpers\Html;
use yii\helpers\Url;

?>
<div class="post">
    <a class="pjax" onclick="hideModal()" href="<?= Url::to(['/prodavec/my-products/products','id' => $model->id])?>">
        <?= Html::encode($model->name)?>
    </a>
</div>


