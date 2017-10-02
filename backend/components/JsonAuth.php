<?php
/**
 * Created by PhpStorm.
 * User: Maint
 * Date: 02.10.2017
 * Time: 13:10
 */

namespace backend\components;

use common\models\User as MUser;
use common\traits\MCrypt;
use common\traits\MJsonHelper;
use yii\base\ActionFilter;
use yii\filters\auth\AuthInterface;
use yii;
use yii\filters\auth\AuthMethod;
use yii\web\IdentityInterface;
use yii\web\Request;
use yii\web\Response;
use yii\web\UnauthorizedHttpException;
use yii\web\User;

class JsonAuth extends AuthMethod
{
    use MCrypt;

    /**
     * Authenticates the current user.
     * @param User $user
     * @param Request $request
     * @param Response $response
     * @return IdentityInterface the authenticated user identity. If authentication information is not provided, null will be returned.
     * @throws UnauthorizedHttpException if authentication information is provided but is invalid.
     */
    public function authenticate($user, $request, $response)
    {
        $cToken = $request->queryParams['token'];
        $dToken = $this->crypt($cToken,'d');

        return MUser::findIdentityByAccessToken($dToken);
    }
}