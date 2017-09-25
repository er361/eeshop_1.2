<?php
/**
 * Created by PhpStorm.
 * User: Maint
 * Date: 15.09.2017
 * Time: 14:08
 * @var $userProfile \app\modules\prodavec\models\ProdavecPersonalInfo
 */


use yii\helpers\Url;
use yii\widgets\Pjax;

?>
<div id="account">
    <img  height="150"
         src=<?= Url::to('@web/uploads/' . $userProfile->photo_path )?>
    >
    <p>
        <?= $userProfile->first_name . ' ' . $userProfile->second_name;?>
        <br>
        ID: <?= $userProfile->id; ?>
    </p>
</div>
