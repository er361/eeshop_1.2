<?php

namespace frontend\modules\prodavec\controllers;


use frontend\modules\prodavec\models\ProdavecPersonalInfo;
use yii\web\Controller;
use yii\web\UploadedFile;

class PersonalInfoController extends Controller
{
    public function actionIndex()
    {
        if($this->getModel())
            $model = $this->getModel();
        else
            $model = new ProdavecPersonalInfo();

        if (\Yii::$app->request->isPost){

            $model->load(\Yii::$app->request->post());
            $model->user_id = \Yii::$app->user->getId();

            $uploadedFile = UploadedFile::getInstance($model, 'photo_file');

            if($uploadedFile){
                $model->photo_file = $uploadedFile;

                if($model->upload())
                    $model->photo_path = $model->photo_path . '.' . $model->photo_file->extension;
            }

            if($model->save(false))
                \Yii::$app->session->setFlash('personal_info_success','Успешно сохранено');
        }

        if(\Yii::$app->request->isPjax)
            return $this->renderAjax('index',['model' => $model]);

        return $this->render('index',['model' => $model]);
    }

    public function getModel()
    {
        $model = ProdavecPersonalInfo::findOne(['user_id' => \Yii::$app->user->id]);
        return $model;
    }

}
