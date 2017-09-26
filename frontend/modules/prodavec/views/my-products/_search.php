<?php
/**
 * Created by PhpStorm.
 * User: Maint
 * Date: 26.09.2017
 * Time: 11:56
 */

use yii\helpers\BaseArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\prodavec\models\PostSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-search">
    <?php $form = ActiveForm::begin([
            'id' => 'product_form',
        'action' => ['products?id='.$id],
        'method' => 'get',
        'options' => ['data' =>
            ['pjax' => true]
        ]
    ]); ?>

    <?= $form->field($model, 'title') ?>
    <?= $form->field($model, 'brand_name') ?>
    <?= $form->field($model, 'vendor_code') ?>
    <? $colors = Yii::$app->db->createCommand('select distinct color from product')->queryColumn();
    $data = array_combine($colors, $colors);
    ?>
    <?= $form->field($model,'color')->dropDownList($data,['prompt' => 'Выберите цвет'])?>


    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::submitButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>