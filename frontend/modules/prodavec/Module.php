<?php

namespace frontend\modules\prodavec;
use Yii;

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
        Yii::$container->set('yii\widgets\Pjax',['timeout' => 2500]);
        // custom initialization code goes here
    }
}
