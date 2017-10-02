<?php
/**
 * Created by PhpStorm.
 * User: Maint
 * Date: 02.10.2017
 * Time: 10:44
 */

namespace common\traits;


use Yii;
use yii\helpers\BaseArrayHelper;

trait MJsonHelper
{
    use MCrypt;

    function getPayload($rawBody,$asArray = true)
    {
        //raw json data parse
        $bodyObj = json_decode($rawBody);

        $decrypt = $this->crypt($bodyObj->payload, 'd');

        $payload = json_decode($decrypt, $asArray);

        return $payload;
    }
}