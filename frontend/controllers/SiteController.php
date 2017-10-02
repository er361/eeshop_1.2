<?php
namespace frontend\controllers;

use backend\models\Token;
use common\models\User;
use common\traits\MCrypt;
use common\traits\MJsonHelper;
use Yii;
use yii\base\InvalidParamException;
use Yii\helpers\BaseArrayHelper;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\helpers\Html;

/**
 * Site controller
 */
class SiteController extends Controller
{
    use MJsonHelper;
    public $enableCsrfValidation = false;
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
              'class' => AccessControl::className(),
              'only' => ['test-data'],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['sf']
                    ]
                ]
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                    'registration' => ['post']
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect('/prodavec');
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);

        }

    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionTestData()
    {
        $regStr = [
            "SignupForm" => [
                "username" => "apiTest",
                "password" => "rainboxe361",
                "email" => "api@test.kz",
                "key" => "a0259fe2fa786df53b041dbdbf87cb9d",
                "role" => "seller"
            ]
        ];

        $user = User::findByUsername('apiTest');
        $token = 'Tg7o8p8lFXcNWYj3SfVmdtH45uIn7O0Q';

        $authStr = [
          'username' => 'apiTest',
          'password' => 'rainboxe361',
        ];

        $regJson = json_encode($regStr);

        $authJson = json_encode($authStr);

        echo "reg";
        echo Html::textarea('regData',$this->crypt($regJson,'e'),['rows' => 5,'cols' => 100]);

        echo '<br/>';
        echo  'auth';
        echo Html::textarea('regData',$this->crypt($authJson,'e'),['rows' => 5,'cols' => 100]);

        echo '<br/>';
        echo  'token';
        echo Html::textarea('token',$this->crypt($token,'e'),['rows' => 5,'cols' => 100]);
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionRegistration()
    {
        $response = Yii::$app->response;
        $response->format = yii\web\Response::FORMAT_JSON;

        //raw json data parse
        $payload = $this->getPayload(Yii::$app->request->rawBody);

        $signUpForm = BaseArrayHelper::getValue($payload,'SignupForm');

        $model = new SignupForm();

        if($this->compareKey($signUpForm['key']) and $model->load($payload)){
            if ($user = $model->signup()){
                $manager = Yii::$app->authManager;
                $role = $signUpForm['role'];

                if($role == 'seller' or $role == 'courier' or $role == 'buyer'){
                    $lRole = $manager->getRole($role);
                    if($lRole)
                        $manager->assign($lRole,$user->getId());
                }

                //output data
                $modelArr = $model->toArray(['username', 'email']);
                $modelArr['role'] = $lRole ? $lRole->name : null;

                $response->data = $modelArr;
            } else
                $response->data = $model->getErrors();

            $response->send();
            return;
        }

        $response->data = [
            'error' => 'empty fields or wrong format',
            'format' => 'SignupForm[fieldName]'
        ];
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
}
