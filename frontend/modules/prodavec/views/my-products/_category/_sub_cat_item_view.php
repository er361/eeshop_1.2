<?php
/**
 * Created by PhpStorm.
 * User: Maint
 * Date: 11.10.2017
 * Time: 18:13
 */
use yii\helpers\Html;
use yii\helpers\Url;

?>

<div class="item_view">
    <a class="pjax"
       onclick="hideModal()"
       href="<?= Url::to(['/prodavec/my-products/products','subcategory_id' => $model->id])?>">
        <?= Html::encode($model->name)?>
    </a>
</div>

