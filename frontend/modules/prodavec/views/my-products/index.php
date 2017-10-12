<?

use frontend\modules\prodavec\models\Category;
use yii\web\View;
use yii\widgets\ListView;
use yii\data\ActiveDataProvider;
use yii\widgets\Pjax;

$dataProvider = new ActiveDataProvider([
    'query' => Category::find(),
    'pagination' => [
        'pageSize' => 20,
    ],
]);
?>
<div id="product-main-container">
    <?echo ListView::widget([
            'dataProvider' => $dataProvider,
            'itemView' => '_category/index-category',
        ]);?>
</div>
<?
/* @var $this yii\web\View; */




