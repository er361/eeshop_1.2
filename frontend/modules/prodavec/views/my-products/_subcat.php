<?php


use yii\helpers\Html;
use yii\helpers\Url;

?>
<div class="post">
    <a class="pjax" onclick="hideModal()" href="<?= Url::to(['/prodavec/my-products/products','id' => $model->id])?>">
        <?= Html::encode($model->name)?>
    </a>
</div>
<script>
    function hideModal(id){
        $('#modal_' + id).modal('hide');
        $('.modal-backdrop.fade.in').hide();
        $('body.modal-open').removeClass('modal-open');
    }
</script>
