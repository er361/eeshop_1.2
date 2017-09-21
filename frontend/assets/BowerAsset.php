<?php
/**
 * Created by PhpStorm.
 * User: Maint
 * Date: 12.09.2017
 * Time: 19:23
 */

namespace frontend\assets;


use yii\web\AssetBundle;

class BowerAsset extends AssetBundle
{
    public $sourcePath ='@bower/yii2-pjax';
    public $js = [
        'jquery.pjax.js'
    ];
    public $depends = [
        'frontend\assets\AppAsset'
    ];
}