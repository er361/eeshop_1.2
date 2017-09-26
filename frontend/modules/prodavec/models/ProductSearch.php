<?php

namespace frontend\modules\prodavec\models;

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
 * @property integer $subcategory_id
 * @property integer $price
 * @property integer $price_on_website
 * @property integer $vitrina_status
 * @property integer $amount
 */
use common\models\Product;
use yii\data\ActiveDataProvider;

class ProductSearch extends Product
{

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title','vendor_code','brand_name'], 'safe']
        ];
    }
    public function scenarios()
    {
        return yii\base\Model::scenarios();
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

    public function search($params)
    {
        $query = Product::find()->where(['subcategory_id' => $params['id'],'prodavec_id' => Yii::$app->user->id]);

        $dataProvider = new ActiveDataProvider([
           'query' => $query
        ]);

        // load the search form data and validate
        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        // adjust the query by adding the filters
        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like','vendor_code', $this->vendor_code])
            ->andFilterWhere(['like','brand_name', $this->brand_name]);

        return $dataProvider;
    }
}
