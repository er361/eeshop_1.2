<?php

namespace frontend\modules\seller\models;

use Yii;
use yii\helpers\FileHelper;

/**
 * This is the model class for table "prodavec_personal_info".
 *
 * @property integer $id
 * @property string $first_name
 * @property string $second_name
 * @property string $company_name
 * @property string $brands
 * @property string $email
 * @property string $phone
 * @property string $address
 * @property integer $user_id
 * @property string $photo_path
 */
class PersonalInfo extends \yii\db\ActiveRecord
{
    public $photo_file;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'prodavec_personal_info';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'integer'],
            [['first_name', 'second_name', 'company_name', 'brands', 'email', 'phone', 'address', 'photo_path'], 'string', 'max' => 255],
            [['photo_file'],'file','skipOnEmpty' => true, 'mimeTypes' => 'image/*' ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'First Name',
            'second_name' => 'Second Name',
            'company_name' => 'Company Name',
            'brands' => 'Brands',
            'email' => 'Email',
            'phone' => 'Phone',
            'address' => 'Address',
            'user_id' => 'User ID',
            'photo_path' => 'Photo Path',
        ];
    }
    
    public function upload()
    {
        if ($this->validate()) {
            //create dir if not exists
            if(!file_exists('uploads'))
                FileHelper::createDirectory('uploads');

            $this->photo_file->saveAs('uploads/' . md5($this->photo_file->baseName) . '.' . $this->photo_file->extension);
            return true;
        } else {
            return false;
        }
    }
    public function getFullName()
    {
        return $this->first_name . ' ' . $this->second_name;
    }
}
