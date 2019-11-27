<?php

use common\models\query\ArticlesQuery;
use dosamigos\tinymce\TinyMce;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\web\View;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel common\models\query\ArticlesQuery */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Đối tác';
$this->params['breadcrumbs'][] = $this->title;
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
                        'header'=>'Chức năng',
                        'format' => 'raw',
                        'value' => function ($data) {
                            $strButton = '<div class="btn-group">
                                <a href="#" data-toggle="dropdown" class="btn btn-primary dropdown-toggle" aria-expanded="true">Chức năng <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="'.\yii\helpers\Url::to(['update','id'=>$data->id]).'">Cập nhật</a></li>
                                    <li><a href="'.\yii\helpers\Url::to(['delete','id'=>$data->id]).'">Xóa</a></li>
                                </ul>
                            </div>
                            ';
                            return  $strButton;
                        },
                    ],
                    'code',
                    'name',
                    [
                        'attribute' => 'avatar',
                        'format' => 'html',
                        'value' => function ($data) {
                            return Html::img(\Yii::$app->request->BaseUrl.'/upload/parter/'. $data['avatar'],
                                ['width' => '100px'],['class'=>'thum-nail']);
                        },
                    ],
                    [
                        'attribute'=>'status',
                        'format'=>'html',
                        'value'=>function($data){
                            return \common\models\Parter::TT_ARRAY()[(int)$data->status];
                        }
                    ],
                    // [
                    //     'class' => 'yii\grid\ActionColumn',
                    //     'template'=>'{update}{delete}',
                    //     'visibleButtons' =>
                    //         [
                    //             'delete' => function ($model) {
                    //                 if ($model->status== \common\models\Parter::TT_HOATDONG)
                    //                 {
                    //                     return true;
                    //                 }
                    //             },
                    //         ]
                    // ],
                ],
            ]); ?>
        </div>
    </div>
</div>
