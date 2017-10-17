<?php
/**
 * Created by PhpStorm.
 * User: Maint
 * Date: 17.10.2017
 * Time: 9:30
 */
echo \yii\bootstrap\Nav::widget([
   'items' => [
       [
           'label' => 'Категории товаров',
           'url'=> ['/seller/product-category/index']
       ],
       [
           'label' => 'Подкатегория товаров',
           'url' => ['/seller/subcategory-product/index']
       ]
   ]
]);