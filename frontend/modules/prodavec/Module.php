<?php

namespace frontend\modules\prodavec;

/**
 * prodavec module definition class
 */
class Module extends \yii\base\Module
{
    public $layout = 'index.php';
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'frontend\modules\prodavec\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
