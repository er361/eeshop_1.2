<?php

namespace frontend\modules\seller;

use yii\filters\AccessControl;
/**
 * seller module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'frontend\modules\seller\controllers';
    public $layout = 'seller_main';
    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['seller']
                    ]
                ]
            ]
        ];
    }
}
