<?php
/**
 * Created by PhpStorm.
 * User: Maint
 * Date: 21.09.2017
 * Time: 15:03
 */

namespace backend\traits;
/* @var $token Token */

trait TokenTrait
{

    public function generateToken($username,$userIP)
    {
        $token = md5($username + $userIP);

        return $token;
    }

    public static function checkExpireTime($token)
    {
        if(time() > $token->expire_time){
            $token->status = false;
        }
    }
}
use backend\models\Token;