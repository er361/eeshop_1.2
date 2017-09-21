<?php
/**
 * Created by PhpStorm.
 * User: Maint
 * Date: 21.09.2017
 * Time: 15:03
 */

namespace backend\traits;


trait TokenTrait
{

    public function generateToken($username,$userIP)
    {
        $token = md5($username + $userIP);

        return $token;
    }
}