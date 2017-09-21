<?php
namespace backend\controllers;

use backend\models\Token;
use common\models\User;
use Yii;
use yii\filters\auth\HttpBasicAuth;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use yii\web\Request;
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
        $response = Yii::$app->response;

        $authPassword = $request->authPassword;
        $authUser = $request->authUser;

        $user = User::findByUsername($authUser);
        if($user && $user->validatePassword($authPassword)){
            $token = new Token();
            $token->access_token = Yii::$app->security->generateRandomString();
            $token->expire_time = Token::EXPIRE_TIME;
            $token->refresh_token = Yii::$app->security->generateRandomString();

            if($token->save()){
                $user->access_token = $token->primaryKey;

                if($user->save()){
                    $response->format = Response::FORMAT_JSON;
                    // serialize model to json
                    $response->data = $token->toArray(['access_token','expire_time','refresh_token']);
                }else
                    $response->setStatusCode(500);
            }else
                $response->setStatusCode(500);
        } else {
            $response->setStatusCode(401);
            $response->format = Response::FORMAT_JSON;
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
