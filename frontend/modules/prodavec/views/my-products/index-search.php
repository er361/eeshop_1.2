<?php
/**
 * Created by PhpStorm.
 * User: Maint
 * Date: 26.09.2017
 * Time: 11:56
 */

use common\models\Product;
use frontend\modules\prodavec\models\Category;
use yii\widgets\Pjax;
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
        'action' => ['product-grid'],
        'method' => 'get',
        'options' => ['data' =>
            ['pjax' => true]
        ]
    ]); ?>

    <?= $form->field($model, 'title') ?>
    <?= $form->field($model, 'brand_name') ?>
    <?= $form->field($model, 'vendor_code') ?>

    <?= $form->field($model,'color')
        ->dropDownList(Product::getDropDownData('color'),
            ['prompt' => 'Выберите цвет'])?>

    <?= $form->field($model,'brand_name')
        ->dropDownList(Product::getDropDownData('brand_name'),
            ['prompt' => 'Выберите бренд'])?>

    <?= $form->field($model,'priceFrom')?>
    <?= $form->field($model,'priceTo')?>


        <?= $form->field($model,'category')
            ->dropDownList(BaseArrayHelper::map(Category::find()->all(),'id','name'),
                ['prompt' => 'Выберите категорию'])?>

    <?= $this->render('_subCatDropDown')?>


    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::submitButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>

