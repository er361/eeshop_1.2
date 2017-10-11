<?php

/**
 * Created by PhpStorm.
 * User: Maint
 * Date: 22.09.2017
 * Time: 11:36
 */





?>
<?php

use frontend\modules\prodavec\models\Subcategory;
use yii\bootstrap\Modal;
use yii\data\ActiveDataProvider;
use yii\widgets\ListView;

?>
<? Modal::begin([
    'id' => 'modal_'.$model->id,
    'header' => $model->name,
    'toggleButton' => ['label' => $model->name,'tag' => 'a','class' => 'btn']]);

    $query = Subcategory::find()->where(['category_id' => $model->id]);

    $dataProvider = new ActiveDataProvider([
    'query' => $query,
        'pagination' => [
            'pageSize' => 20,
        ]
    ]);

    echo ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => 'index-subcat',
        'viewParams' => ['category_id' => $model->id]
    ]);

Modal::end();?>

