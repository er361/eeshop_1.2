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
    public $priceFrom;
    public $priceTo;
    public $category;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title','vendor_code','brand_name','color','priceFrom','priceTo'], 'safe']
        ];
    }
    public function scenarios()
    {
        return yii\base\Model::scenarios();
    }

    /**
     * @inheritdoc
     */

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

            //быстрее работает чем лайк)
            ->andFilterCompare('brand_name', $this->brand_name)
            ->andFilterCompare('color',$this->color)

            //заебашил как боженька
            ->andFilterWhere(['>=','price',$this->priceFrom])
            ->andFilterWhere(['<=','price',$this->priceTo]);

        return $dataProvider;
    }
}
