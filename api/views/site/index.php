<?php
use yii\helpers\Url;
use common\models\CanBo;
use common\models\CoiThi;
use common\models\PhongThi;
use common\models\Phong;
use common\models\KyThi;
use common\models\MonThi;
use common\models\BuoiThi;
/* @var $this yii\web\View */
$this->title = Yii::$app->name;
?>
<div class="site-index">
    <div class="ky-thi-index">
        <h4 class="bs-callout bs-callout-warning">Danh sách lịch coi thi</h4>
        <div class="panel panel-default">
            <div class="panel-body">
                <?php \yii\widgets\Pjax::begin(); ?>
                <?= \yii\grid\GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        [
                            'attribute'=>'phongThi.kyThi.monThi.ma',
                            'header'=>'Mã học phần'
                        ],
                        [
                            'attribute'=>'phongThi.kyThi.monThi.ten',
                            'header'=>'Học phần'
                        ],
                        [
                            'attribute'=>'phongThi.kyThi.ngay_thi',
                            'header'=>'Ngày thi',
                            'value'=>function($data)
                            {
                                return Yii::$app->formatter->asDatetime($data->phongThi->kyThi->ngay_thi,'dd/MM/yyyy');
                            }

                        ],
                        [
                            'attribute'=>'phongThi.block_bat_dau',
                            'header'=>'Bắt đầu',
                            'value'=>function($data)
                            {
                                return Yii::$app->formatter->asDatetime($data->phongThi->block_bat_dau,'dd/MM/yyyy');
                            }
                        ],
                        [
                            'attribute'=>'phongThi.block_ket_thuc',
                            'header'=>'Kết thúc',
                            'value'=>function($data)
                            {
                                return Yii::$app->formatter->asDatetime($data->phongThi->block_ket_thuc,'dd/MM/yyyy');
                            }
                        ],

                        [
                            'attribute'=>'phongThi.kyThi.buoiThi.ten',
                            'header'=>'Ca thi'
                        ],
                        [
                            'attribute'=>'phongThi.kyThi.so_luong_tham_gia',
                            'header'=>'Số lượng tham gia'
                        ],
                        [
                            'attribute'=>'phongThi.kyThi.thoi_gian_thi',
                            'header'=>'Thời gian làm bài'
                        ],
                        // [
                            // 'attribute'=>'phongThi.phong.ma',
                            // 'header'=>'Mã phòng'
                        // ],
                        // [
                            // 'attribute'=>'phongThi.phong.ten',
                            // 'header'=>'Phòng'
                        // ],
//                        [
//                            'class' => 'yii\grid\ActionColumn',
//                            'template' => '{view}',
//                        ],
                    ],
                ]); ?>
                <?php \yii\widgets\Pjax::end(); ?>
            </div>
        </div>
    </div>
</div>
