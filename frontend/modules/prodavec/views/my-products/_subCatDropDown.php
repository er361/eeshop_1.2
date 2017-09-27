<?php
/**
 * Created by PhpStorm.
 * User: Maint
 * Date: 27.09.2017
 * Time: 10:04
 */

use frontend\modules\prodavec\models\Subcategory;
use yii\helpers\BaseHtml;
use yii\helpers\BaseArrayHelper;
?>
<div id="subcat-ajax">
    <? if($subCats):?>
        <?= BaseHtml::label('Subcategory','productsearch-subcategory')?>
        <?= BaseHtml::dropDownList('ProductSearch[subcategory_id]',[],
            BaseArrayHelper::map($subCats,'id','name'),
            [
                    'prompt' => 'Выберите под категорию',
                'class' => 'form-control'
            ])?>
        <div class="help-block"></div>
    <?endif;?>
</div>

<? $this->registerJsFile('@web/js/categoryPjax.js',[
    'depends' => yii\web\JqueryAsset::className()
])?>



