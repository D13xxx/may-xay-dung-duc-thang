
<?php

use common\models\Articles;
use common\models\query\ArticlesQuery;
use dosamigos\tinymce\TinyMce;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Products;
use yii\web\View;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel common\models\query\ArticlesQuery */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Danh sách sản phẩm bảo hiểm';
$this->params['breadcrumbs'][] = $this->title;
$this->registerJsFile(
    Yii::$app->request->baseUrl . '/js/jquery.timeago.js',
    ['depends' => ['\yii\web\JqueryAsset']]
);
$this->registerJs("jQuery('abbr.timeago').timeago();", \yii\web\View::POS_READY);

?>
<div class="page-content-wrap">
    <?= $this->render('_search',[
        'model'=>$searchModel,
    ])?>
</div>
<div class="page-content-wrap">
    <div class="row">
        <div class="col-md-12">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    [
                        'attribute' => 'avatar',
                        'format' => 'html',
                        'value' => function ($data) {
                            return Html::img(\Yii::$app->request->BaseUrl.'/upload/products/'.$data['avatar'],
                                ['width' => '100px'],['class'=>'thum-nail']);
                        },
                    ],
                    'code',
                    [
                        'attribute' => 'full_name',
                        'format' => 'html',
                        'value' => function ($data) {
                            return Html::a(ucwords($data->full_name), ['update','id'=>$data->id]);
                        },
                    ],
                    [
                        'attribute' => 'price',
                        'format' => 'html',
                        'value' => function ($data) {
                            return number_format($data->price);
                        },
                    ],[
                        'attribute' => 'cat_id',
                        'format' => 'html',
                        'value' => function ($data) {
                            return $data->cat->name;
                        },
                    ],
                    //'cat_id',
                    [
                        'attribute'=>'status',
                        'format'=>'html',
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
                    [
                        'header'=>'Chức năng',
                        'format' => 'raw',
                        'options'=>[
                            'wight'=>'100px'
                        ],
                        'value' => function ($data) {
                            if($data->status == Products::IS_ACTIVE){
                                $strButton = '<div class="btn-group">
                                    <a href="#" data-toggle="dropdown" class="dropdown-toggle" aria-expanded="true"><i class="glyphicon glyphicon-option-vertical"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="'.\yii\helpers\Url::to(['update','id'=>$data->id]).'">Cập nhật</a></li>
                                        <li><a href="'.\yii\helpers\Url::to(['disable','id'=>$data->id]).'" onclick="return confirm(\'Bạn có chắc chắn muốn khóa sản phẩm này hay không?\');">Khóa sản phẩm</a></li>
                                        <li>
                                            <form action="'.\yii\helpers\Url::to(['delete','id'=>$data->id]).'" method="post">
                                                <button type="submit" class="btn-submit">Xóa</button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>';
                            }else{
                                $strButton = '<div class="btn-group">
                                    <a href="#" data-toggle="dropdown" class="dropdown-toggle" aria-expanded="true"><i class="glyphicon glyphicon-option-vertical"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="'.\yii\helpers\Url::to(['update','id'=>$data->id]).'">Cập nhật</a></li>
                                        <li><a href="'.\yii\helpers\Url::to(['active','id'=>$data->id]).'" onclick="return confirm(\'Bạn có chắc chắn muốn kích hoạt sản phẩm này hay không?\');">Kích hoạt sản phẩm</a></li>
                                        <li>
                                            <form action="'.\yii\helpers\Url::to(['delete','id'=>$data->id]).'" method="post">
                                                <button type="submit" class="btn-submit">Xóa</button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>';
                            }
                            return  $strButton;
                        },
                    ],
                ],
            ]); ?>
        </div>
    </div>
</div>
