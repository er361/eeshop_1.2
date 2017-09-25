<?php
/**
 * Created by PhpStorm.
 * User: Maint
 * Date: 25.09.2017
 * Time: 11:50
 * @var $this yii\web\View
 */

use yii\grid\GridView;


?>
<div style="width: 800px;overflow-x: auto">
    <?= GridView::widget([
        'dataProvider' => $dataProvider
    ])?>
</div>


