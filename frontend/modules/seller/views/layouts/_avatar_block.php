<?php
/**
 * Created by PhpStorm.
 * User: Maint
 * Date: 17.10.2017
 * Time: 9:03
 */

use yii\helpers\Html;

?>
<?= Html::img("uploads/$model->photo_path",['class' => 'img-responsive']);?>
<h4><?=$model->getFullName()?></h4>
<b>ID</b>: <?=$model->id?>


