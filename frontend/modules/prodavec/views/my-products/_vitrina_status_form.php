<?php
/**
 * Created by PhpStorm.
 * User: Maint
 * Date: 03.10.2017
 * Time: 10:42
 */

use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;
/* @var $this yii\web\View;*/
?>

<? Pjax::begin([
        'id' => 'pjax'.$model->id,
        'clientOptions' => [
            'push' => false,
        ],
        'formSelector' => '#vitrina-status-form_'.$model->id,
    ])?>
    <?
    $form = ActiveForm::begin([
        'id' => 'vitrina-status-form_'.$model->id,
        'action' => 'vitrina-status?id='.$model->id,
        'options' => ['data' => ['pjax' => true],'class' => 'vitrina-status']
    ]);

    echo $form->field($model,'vitrina_status')
        ->dropDownList([0 => 'Выкл', 1 => 'Вкл', 2 => 'Скрыто'],['class' => 'vitrina_status']);

    ActiveForm::end();
    ?>
<? Pjax::end()?>




