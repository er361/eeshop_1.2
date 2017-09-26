<?php
/**
 * Created by PhpStorm.
 * User: Maint
 * Date: 26.09.2017
 * Time: 11:56
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\prodavec\models\PostSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-search">
    <?php $form = ActiveForm::begin([
        'action' => ['products?id='.$id],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'title') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::submitButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>