<?php

namespace backend\models;

use backend\traits\TokenTrait;
use common\models\User;
use Yii;

/**
 * This is the model class for table "token".
 *
 * @property integer $id
 * @property string $access_token
 * @property integer $expire_time
 * @property string $refresh_token
 * @property integer $status
 */
class Token extends \yii\db\ActiveRecord
{
    const EXPIRE_TIME = 30;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'token';
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['expire_time', 'status'], 'integer'],
            [['access_token'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'access_token' => 'Access Token',
            'expire_time' => 'Expire Time',
            'refresh_token' => 'Refresh Token',
            'status' => 'Status',
        ];
    }

    public static function findUserByToken($token)
    {
        $token = Token::findOne(['access_token' => $token]);
        if($token)
            TokenTrait::checkExpireTime($token);
        if($token->status == true ) {
            $user = User::findOne(['access_token' => $token->id]);
            return $user;
        }else{
            $token->delete();
        }
        return null;
    }
}
