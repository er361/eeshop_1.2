<?php
namespace backend\controllers;

use common\models\User;
use Yii;
use yii\filters\auth\HttpBasicAuth;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use yii\web\Response;
use yii\web\UnauthorizedHttpException;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error','auth'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actionAuth()
    {
        $request = Yii::$app->request;

        $authPassword = $request->authPassword;
        $authUser = $request->authUser;

        $user = User::findByUsername($authUser);
        if($user && $user->validatePassword($authPassword))
            return 'new token';
        else {
            $response = Yii::$app->response;
            $response->format = Response::FORMAT_JSON;
            $response->setStatusCode(401);
            $response->data = [
                'message' => 'Login required',
                'code' => 401
            ];
        }
    }

    /**
     * @inheritdoc
     */


    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
