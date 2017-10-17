<?php
/**
 * Created by PhpStorm.
 * User: Maint
 * Date: 16.10.2017
 * Time: 17:31
 * @var $this yii\web\View;
 */
$this->beginContent('@frontend/views/layouts/main.php');?>

<div class="grid">
    <div class="col-md-2">
        <?echo $this->render('_menu');?>
    </div>

    <?if(isset($this->blocks['avatar_block'])):?>
        <?= $this->blocks['avatar_block']?>
    <?endif;?>

    <div class="col-md-8">
        <?= $content?>
    </div>
</div>

<? $this->endContent();?>