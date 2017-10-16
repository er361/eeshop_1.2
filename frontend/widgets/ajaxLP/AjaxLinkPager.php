<?php
/**
 * Created by PhpStorm.
 * User: Maint
 * Date: 12.10.2017
 * Time: 16:50
 */
namespace frontend\widgets\ajaxLP;

use frontend\widgets\pageSizeWd\PageSize;
use yii\helpers\Html;

class AjaxLinkPager extends \yii\widgets\LinkPager
{
    public $costil = false;

    public function init()
    {
        if ($this->pagination === null) {
            throw new InvalidConfigException('The "pagination" property must be set.');
        }
    }
    /**
     * Executes the widget.
     * This overrides the parent implementation by displaying the generated page buttons.
     */
    public function run()
    {
        if ($this->registerLinkTags) {
            $this->registerLinkTags();
        }

        echo Html::beginTag('div',['class' => 'grid']);

            echo Html::beginTag('div',['class' => 'col-md-6']);
                echo $this->renderPageButtons();
            echo Html::endTag('div');

            echo Html::beginTag('div',['class' => 'col-md-4']);
                echo PageSize::widget([
                    'pagination' => $this->pagination,
                    'costil' => $this->costil,
                    'hideOnSinglePage' => $this->hideOnSinglePage
                ]);
            echo Html::endTag('div');

        echo Html::endTag('div');


    }

}