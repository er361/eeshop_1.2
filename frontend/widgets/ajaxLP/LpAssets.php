<?php
/**
 * Created by PhpStorm.
 * User: Maint
 * Date: 05.10.2017
 * Time: 18:01
 */

namespace frontend\widgets\ajaxLP;


use yii\web\AssetBundle;

class LpAssets extends AssetBundle
{
    public $sourcePath = '@frontend/widgets/ajaxLP/js';
    public $js = [
        'pageSizeDyn.js'
    ];
    public $depends = [
        'frontend\assets\AppAsset'
    ];
}