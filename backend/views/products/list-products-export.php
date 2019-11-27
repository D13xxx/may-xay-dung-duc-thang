
<?php

use common\models\Articles;
use common\models\query\ArticlesQuery;
use dosamigos\tinymce\TinyMce;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\export\ExportMenu;
use common\models\Products;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel common\models\query\ArticlesQuery */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Danh sách sản phẩm';
$this->params['breadcrumbs'][] = $this->title;

$this->registerJsFile(
    Yii::$app->request->baseUrl . '/js/jquery.timeago.js',
    ['depends' => ['\yii\web\JqueryAsset']]
);
$this->registerJs("jQuery('abbr.timeago').timeago();", \yii\web\View::POS_READY);

?>
<style>
button#w0-cols {
    display: none;
}
</style>

<div class="col-md-12">

<?php   
echo Html::a('<i class="fa  fa-plus"></i> '.Yii::t('backend', 'Import'), ['import'], ['class' => 'btn btn-success pull-right']);
$gridColumns = [
    'code',
    [
        'attribute' => 'full_name',
        'format' => 'html',
        'value' => function ($data) {
            return Html::a(ucwords($data->full_name), ['update','id'=>$data->id]);
        },
    ],
    [
        'attribute' => 'exp_price',
        'format' => 'html',
        'value' => function ($data) {
            return $data->exp_price;
        },
    ],
    [
        'attribute' => 'price',
        'format' => 'html',
        'value' => function ($data) {
            return $data->price;
        },
    ],
    [
        'attribute' => 'sale_number',
        'format' => 'html',
        'value' => function ($data) {
            return $data->sale_number.'%';
        },
    ],
    [
        'attribute' => 'cat_id',
        'format' => 'html',
        'filter' => ArrayHelper::map(Products::find()->all(), 'id', 'full_name'),
        'value' => function ($data) {
            return $data->cat->name;
        },
    ],
    [
        'attribute'=>'status',
        'format'=>'html',
        'filter' => \common\models\Products::TT_ARRAY(),
        'value'=>function($data){
            return '<span class="label label-'.Products::TT_COLOR_ARRAY()[(int)$data->status].'">'.Products::TT_ARRAY()[(int)$data->status].'</span>';
        }
    ],

    [
        'attribute'=>'created_at',
        'format'=>'html',
        'value'=>function($data){
            return '<abbr class="timeago" title="'.date('Y-m-d H:i:s',$data->created_at).'"></abbr>';
        }
    ],
];


 echo ExportMenu::widget([
    'dataProvider' => $dataProvider,
    'columns' => $gridColumns
]);
// You can choose to render your own GridView separately
echo \kartik\grid\GridView::widget([
	'dataProvider' => $dataProvider,		
	'filterModel' => $searchModel,
	'hover'=>true,
	'floatHeader'=>false, 
	'floatOverflowContainer'=>false, 
	'responsive'=>true,
    'panel'=>'',
    'autoXlFormat'=>true,
	'columns' => $gridColumns
]);
  ?>
</div>