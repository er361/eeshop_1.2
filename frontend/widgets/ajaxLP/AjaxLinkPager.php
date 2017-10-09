<?php
/**
 * Created by PhpStorm.
 * User: Maint
 * Date: 05.10.2017
 * Time: 9:39
 */
namespace frontend\widgets\ajaxLP;

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use kartik\select2\Select2;
use yii\widgets\LinkPager;

class AjaxLinkPager extends LinkPager
{
    public function init()
    {
        LpAssets::register($this->getView());
        parent::init();
    }

    public function run()
    {
        if ($this->registerLinkTags) {
            $this->registerLinkTags();
        }

        echo Html::beginTag('div',['class' => 'grid']);
        //page buttons
            echo Html::beginTag('div',['class' => 'col-md-11']);
                echo $this->renderPageButtons();
            echo Html::endTag('div');

            //drop down
            echo Html::beginTag('div',['class' => 'col-md-1']);
                echo $this->renderDropDown();
            echo Html::endTag('div');
        echo Html::endTag('div');

    }

    protected function renderPageButtons()
    {
        $pageCount = $this->pagination->getPageCount();
        if ($pageCount < 2 && $this->hideOnSinglePage) {
            return '';
        }
        $buttons = [];
        $currentPage = $this->pagination->getPage();
        // first page
        $firstPageLabel = $this->firstPageLabel === true ? '1' : $this->firstPageLabel;
        if ($firstPageLabel !== false) {
            $buttons[] = $this->renderPageButton($firstPageLabel, 0, $this->firstPageCssClass, $currentPage <= 0, false);
        }
        // prev page
        if ($this->prevPageLabel !== false) {
            if (($page = $currentPage - 1) < 0) {
                $page = 0;
            }
            $buttons[] = $this->renderPageButton($this->prevPageLabel, $page, $this->prevPageCssClass, $currentPage <= 0, false);
        }
        // internal pages
        list($beginPage, $endPage) = $this->getPageRange();
        for ($i = $beginPage; $i <= $endPage; ++$i) {
            $buttons[] = $this->renderPageButton($i + 1, $i, null, $this->disableCurrentPageButton && $i == $currentPage, $i == $currentPage);
        }
        // next page
        if ($this->nextPageLabel !== false) {
            if (($page = $currentPage + 1) >= $pageCount - 1) {
                $page = $pageCount - 1;
            }
            $buttons[] = $this->renderPageButton($this->nextPageLabel, $page, $this->nextPageCssClass, $currentPage >= $pageCount - 1, false);
        }
        // last page
        $lastPageLabel = $this->lastPageLabel === true ? $pageCount : $this->lastPageLabel;
        if ($lastPageLabel !== false) {
            $buttons[] = $this->renderPageButton($lastPageLabel, $pageCount - 1, $this->lastPageCssClass, $currentPage >= $pageCount - 1, false);
        }

        $options = $this->options;
        $tag = ArrayHelper::remove($options, 'tag', 'ul');

        return Html::tag($tag, implode("\n", $buttons), $options);
    }

    protected function renderDropDown()
    {
        echo $this->render('_dropDown');
    }
}