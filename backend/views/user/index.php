<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\query\UserQuery */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Tài khoản hệ thống');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-content-wrap">
    <div class="row">
        <div class="col-md-12">
            <?= Html::a('Tạo tài khoản', ['create'], ['class' => 'btn btn-primary']) ?>
            <br>
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    [
                        'header'=>'Chức năng',
                        'headerOptions' => ['style' => 'width:100px'],
                        'format' => 'raw',
                        'value' => function ($data) {
                            $strButton = '<div class="btn-group">
                                <a href="#" data-toggle="dropdown" class="btn btn-primary dropdown-toggle" aria-expanded="true">Chức năng <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="'.\yii\helpers\Url::to(['rbac/assignment/view','id'=>$data->id]).'" >Phân quyền</a>
                                    </li>
                                    <li><a href="'.\yii\helpers\Url::to(['user/reset-password','id'=>$data->id]).'"  onclick="return confirm(\'Bạn có chắc chắn muốn reset mật khẩu hay không?\');">Reset password</a></li>
                                    <li><a href="'.\yii\helpers\Url::to(['khoa-tai-khoan','id'=>$data->id]).'" onclick="return confirm(\'Bạn có chắc chắn muốn khóa tài khoản này hay không?\');">Khóa tài khoản</a></li>
                                    <li>
                                        <form action="'.\yii\helpers\Url::to(['delete','id'=>$data->id]).'" method="post">
                                            <button type="submit" class="btn-submit">Xóa</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                            ';
                            return 	$strButton;
                        },
                    ],
                    'username',
                    'email:email',
                    [
                        'attribute'=>'status',
                        'format'=>'html',
                        'filter' => \common\models\User::TT_ARRAY(),
                        'value'=>function($data){
                            return \common\models\User::TT_ARRAY()[(int)$data->status];
                        }
                    ],
                ],
            ]); ?>
        </div>
    </div>
</div>

<div class="panel panel-default">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <br>
                <?= Html::a('Quay lại',['/site/index'],['class'=>'btn btn-default pull-right'])?>
                <br>
                <br>
                <br>
            </div>
        </div>
    </div>
</div>
<div class="user-index">
