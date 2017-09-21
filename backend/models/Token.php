<?php

namespace backend\models;

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
    const EXPIRE_TIME = 60*60*24*7 ;
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
            [['access_token', 'refresh_token'], 'string', 'max' => 255],
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
        if($token and $token->status == 1) {
            $user = User::findOne(['access_token' => $token->id]);
            return $user;
        }
        return null;
    }
}
