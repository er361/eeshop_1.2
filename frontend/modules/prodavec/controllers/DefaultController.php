<?php

namespace frontend\modules\prodavec\controllers;


use frontend\modules\prodavec\models\ProdavecPersonalInfo;
use yii\web\Controller;

/**
 * Default controller for the `prodavec` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $userProfile = ProdavecPersonalInfo::findOne(['user_id' => \Yii::$app->getUser()->id]) ;
        return $this->render('index',['userProfile' => $userProfile]);
    }

    public function actionAccount()
    {
        $userProfile = ProdavecPersonalInfo::findOne(['user_id' => \Yii::$app->getUser()->id]) ;
        return $this->renderAjax('_account-block.php',['userProfile' => $userProfile]);
    }
}
