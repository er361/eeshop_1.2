<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\modules\seller\models\SubcategoryProduct */

$this->title = 'Create Subcategory Product';
$this->params['breadcrumbs'][] = ['label' => 'Subcategory Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subcategory-product-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
