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
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">DANH SÁCH THƯƠNG HIỆU</h3>
        <?= Html::a('<i class="glyphicon glyphicon-plus"></i> Thêm mới',['create'],['class'=>'btn btn-success pull-right'])?>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table id="customers2" class="table datatable">
                <thead>
                <tr>
                    <th>Mã thương hiệu</th>
                    <th>Tên đầy đủ</th>
                    <th>Trạng thái</th>
                    <th>Chức năng</th>
                </tr>
                </thead>
                <tbody>
                <?php
                if (!empty($models)){
                    foreach ($models as $model){ ?>
                        <tr>
                            <td><?= ucwords($model->code)?></td>
                            <td><?= ucwords($model->name)?></td>
                            <td><?= \common\models\Brand::TT_ARRAY()[(int)$model->status];?></td>
                            <td>
                                <div class="btn-group">
                                    <a href="#" data-toggle="dropdown" class="dropdown-toggle" aria-expanded="true"><i class="glyphicon glyphicon-option-vertical"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="<?= \yii\helpers\Url::to(['update','id'=>$model->id])?>" >Cập nhật chi tiết</a></li>
                                        <?php
                                        if ($model->status == \common\models\Brand::TT_MOI){ ?>
                                            <li>
                                                <form action="<?= \yii\helpers\Url::to(['delete','id'=>$model->id])?>" method="post">
                                                    <button type="submit" class="btn-submit">Xóa</button>
                                                </form>
                                            </li>
                                        <?php }
                                        ?>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    <?php }
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
