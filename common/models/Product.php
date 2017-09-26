<?php

namespace common\models;

use Yii;
use Yii\db\Query;

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
 * @property integer $subcategory_id
 * @property integer $price
 * @property integer $price_on_website
 * @property integer $vitrina_status
 * @property integer $amount
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
            [['id', 'vendor_code', 'size', 'prodavec_id', 'subcategory_id', 'price', 'price_on_website', 'vitrina_status', 'amount'], 'integer'],
            [['title', 'brand_name', 'color'], 'string', 'max' => 50],
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
            'subcategory_id' => 'Subcategory ID',
            'price' => 'Price',
            'price_on_website' => 'Price On Website',
            'vitrina_status' => 'Vitrina Status',
            'amount' => 'Amount',
        ];
    }

    public static function getDropDownData($columnName)
    {
        $query = new Query();

        $query->distinct()->select([$columnName])->from('product');
        $query->params = [':columnName' => $columnName];

        $column = $query->column();
        $data = array_combine($column,$column);

        return $data;
    }

}
