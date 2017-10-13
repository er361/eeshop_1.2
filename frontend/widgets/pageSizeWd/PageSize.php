<?php
/**
 * Created by PhpStorm.
 * User: Maint
 * Date: 05.10.2017
 * Time: 9:39
 */
namespace frontend\widgets\pageSizeWd;

use function Symfony\Component\Debug\Tests\testHeader;
use Yii;
use yii\base\Widget;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use kartik\select2\Select2;
use yii\widgets\LinkPager;

class PageSize extends Widget
{
    public $pageSizeArray = [5,10,15,20,30,50,100];
    public $action = '#';
    public $id = null;
    public $pagination;
    public $costil = false;

    public function init()
    {
        parent::init();

        $this->id = $this->getId(true);

        $this->pageSizeArray = array_combine($this->pageSizeArray,$this->pageSizeArray);

        //это не костыль просто лень запихивать в отдельный файл
        //но выглядит сука как костыль
        $js ="$('body').on('change','#' + '$this->id',function(event) {
                $(event.target).closest('form').submit();
            })
            ";

        $this->getView()->registerJs($js);
    }

    public function run()
    {
        if($this->pagination->getPageCount() < 2)
            return '';

        return $this->render('index',[
            'widget' => $this,
            'pagination' => $this->pagination
        ]);
    }
}