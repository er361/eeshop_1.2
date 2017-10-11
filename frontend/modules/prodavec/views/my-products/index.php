<?

use frontend\modules\prodavec\models\Category;
use yii\web\View;
use yii\widgets\ListView;
use yii\data\ActiveDataProvider;
use yii\widgets\Pjax;

$dataProvider = new ActiveDataProvider([
    'query' => Category::find(),
    'pagination' => [
        'pageSize' => 20,
    ],
]);
    Pjax::begin([
            'clientOptions' => [
            ]
    ]);
        echo ListView::widget([
            'dataProvider' => $dataProvider,
            'itemView' => '_category',
        ]);
    Pjax::end();
?>
<script>
    function hideModal(id){
        $('#modal_' + id).modal('hide');
        $('.modal-backdrop.fade.in').hide();
        $('body.modal-open').removeClass('modal-open');
    }
</script>
<?
/* @var $this yii\web\View; */




