<?php
/**
 * Created by PhpStorm.
 * User: Maint
 * Date: 16.10.2017
 * Time: 17:31
 */
echo \yii\bootstrap\Nav::widget([
    'items' => [
        [
            'label' => 'Личные данные',
            'url' => ['/seller/personal-info/update','id' => Yii::$app->user->id]
        ],
        [
            'label' => 'Мои товары',
            'url' => ['/seller/my-products/index']
        ]
    ],
    'options' => ['class' => 'nav-stacked']
]);
?>

