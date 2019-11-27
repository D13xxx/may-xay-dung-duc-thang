<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel common\models\query\CatProductsQuery */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Nhóm sản phẩm');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-content-wrap">
    <?= $this->render('_search',[
        'model'=>$searchModel,
        'dataCat' => $dataCat,
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
                            return Html::img(\Yii::$app->request->BaseUrl.'/upload/cat-products/'. $data['avatar'],
                                ['width' => '100px'],['class'=>'thum-nail']);
                        },
                    ],
                    'name',
                    'slug',
                    [
                        'attribute'=>'parent_id',
                        'value'=>function($data){
                            $name = \common\models\CatProducts::find()->where(['id'=>$data->parent_id])->one();
                            if (!empty($name)){
                                return $name->name;
                            }else{
                                return '';
                            }
                        }
                    ],
                    [
                        'attribute'=>'status',
                        'format'=>'html',
                        'value'=>function($data){
                            return '<span class="label label-'.\common\models\CatProducts::TT_COLOR_ARRAY()[(int)$data->status].'">'.\common\models\CatProducts::TT_ARRAY()[(int)$data->status].'</span>';
                        }
                    ],
                    [
                        'header'=>'Chức năng',
                        'format' => 'raw',
                        'options'=>[
                            'wight'=>'100px'
                        ],
                        'value' => function ($data) {
                            if($data->status == \common\models\CatProducts::IS_NEW){
                                $strButton = '<div class="btn-group">
                                <a href="#" data-toggle="dropdown" class="dropdown-toggle" aria-expanded="true"><i class="glyphicon glyphicon-option-vertical"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="'.\yii\helpers\Url::to(['update','id'=>$data->id]).'">Cập nhật</a></li>
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
                                    </ul>
                                </div>
                                ';
                            }
                            return  $strButton;
                        },
                    ],
                ],
            ]); ?>
        </div>
    </div>
</div>
