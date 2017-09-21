<?php

namespace frontend\modules\prodavec\models;

use Yii;

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
class ProdavecPersonalInfo extends \yii\db\ActiveRecord
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
            [['first_name','photo_path', 'second_name', 'company_name', 'brands', 'email', 'phone', 'address'], 'string', 'max' => 255],
            ['email','email'],
            ['photo_file','file','skipOnEmpty' => true]
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
            'photo_path' => 'Photo path'
        ];
    }

    public function upload()
    {
        if ($this->validate()) {

            if (!file_exists('uploads/')) {
                mkdir('uploads/', 0777, true);
            }
            $this->setPhotoPath($this->photo_file->baseName);
            $this->photo_file->saveAs('uploads/' . $this->photo_path. '.' . $this->photo_file->extension);
            return true;
        } else {
            return false;
        }
    }

    public function setPhotoPath($strign){
        $what = md5($strign + rand());
        $this->photo_path = $what;
    }

}
