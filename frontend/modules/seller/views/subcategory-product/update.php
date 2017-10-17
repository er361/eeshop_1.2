<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\modules\seller\models\SubcategoryProduct */

$this->title = 'Update Subcategory Product: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Subcategory Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="subcategory-product-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
