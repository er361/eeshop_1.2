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

    <? if(isset($subCats)):?>
        <?= BaseHtml::label('Subcategory','productsearch-subcategory')?>
        <?= BaseHtml::dropDownList('ProductSearch[subcategory_id]',[],
            BaseArrayHelper::map($subCats,'id','name'),
            [
                    'id' => 'sub_cat_id',
                    'prompt' => 'Выберите под категорию',
                'class' => 'form-control'
            ])?>
        <div class="help-block"></div>
    <?endif;?>





