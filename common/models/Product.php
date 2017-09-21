<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property integer $id
 * @property string $title
 * @property string $brand_name
 * @property integer $vendor_code
 * @property integer $size
 * @property string $color
 * @property integer $prodavec_id
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vendor_code', 'size', 'prodavec_id'], 'integer'],
            [['title', 'brand_name', 'color'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'brand_name' => 'Brand Name',
            'vendor_code' => 'Vendor Code',
            'size' => 'Size',
            'color' => 'Color',
            'prodavec_id' => 'Prodavec ID',
        ];
    }
}
