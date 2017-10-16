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


    <?php $form = ActiveForm::begin([
            'id' => 'product_form',
        'action' => 'products',
        'method' => 'get',
        'options' => ['data' =>
            ['pjax' => true]
        ]
    ]); ?>
<div class="grid">
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'title') ?>
            <?= $form->field($model, 'brand_name') ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'vendor_code') ?>
            <?= $form->field($model,'color')
                ->dropDownList(Product::getDropDownData('color'),
                    ['prompt' => 'Выберите цвет'])?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model,'brand_name')
                ->dropDownList(Product::getDropDownData('brand_name'),
                    ['prompt' => 'Выберите бренд'])?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model,'category')
                ->dropDownList(BaseArrayHelper::map(Category::find()->all(),'id','name'),
                    ['prompt' => 'Выберите категорию'])?>

<!--            RENDER SUBCAT-->
            <div id="subcat-ajax">
                <?= $this->render('_subCatDropDown')?>
            </div>
<!--            END-->

        </div>
        <div class="col-md-4">
            <?= $form->field($model,'priceTo')?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model,'priceFrom')?>
        </div>
    </div>
            <?=Html::hiddenInput('subcategory_id',$subcategory_id)?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
    </div>
</div>

    <?php ActiveForm::end(); ?>