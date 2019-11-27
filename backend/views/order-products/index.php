<?php

use common\models\DetailOrder;
use common\models\OrderProducts;
use common\models\query\CatProductsQuery;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel common\models\query\CatProductsQuery */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Nhóm sản phẩm');
$this->params['breadcrumbs'][] = $this->title;
$this->registerJsFile(
    Yii::$app->request->baseUrl . '/js/jquery.timeago.js',
    ['depends' => ['\yii\web\JqueryAsset']]
);
$this->registerJs("jQuery('abbr.timeago').timeago();", \yii\web\View::POS_READY);
?>
<div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">DANH SÁCH ĐƠN HÀNG</h3>
        </div>
        <div class="panel-body">
            <div class="table-responsive table table-striped ">
                <table id="customers2" class="table datatable table table-striped">
                    <thead>
                        <tr>
                            <th>Stt</th>
                            <th>Họ và tên</th>
                            <th>Địa chỉ</th>
                            <th>Số điện thoại</th>
                            <th>Sản phẩm</th>
                            <th>Trạng thái</th>
                            <th>Ngày mua hàng</th>
                            <th>Tài khoản</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (!empty($orderProducts)) {
                            $i = 1;
                            foreach ($orderProducts as $orderProduct) { ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td>
                                        <a href="<?= Url::to(['view', 'id' => $orderProduct->id]) ?>"><?= ucwords($orderProduct->full_name) ?>
                                        </a>
                                    </td>
                                    <td><?= ucwords($orderProduct->address) ?></td>
                                    <td><?= ucwords($orderProduct->cell_phone) ?></td>
                                    <td>
                                        <?php
                                            $chiTietHoaDons = DetailOrder::find()->where(['order_product_id' => $orderProduct->id])->all();
                                            if (!empty($chiTietHoaDons)) {
                                                foreach ($chiTietHoaDons as $chiTietHoaDon) { ?>
                                            <ul>
                                                <li><?= $chiTietHoaDon->products->code?> - <?= $chiTietHoaDon->products->full_name?></li>
                                            </ul>
                                        <?php }
                                        }
                                        ?>

                                    </td>
                                    <td><span class="label label-'<?= OrderProducts::TT_COLOR_ARRAY()[(int)$orderProduct->status]?>"> <?= OrderProducts::TT_ARRAY()[(int)$orderProduct->status]?></span></td>

                                    <td><?= date('H:i:s d-m-Y ', $orderProduct->created_at) ?></td>
                                    <td><?= $orderProduct->user_update ? ucfirst($orderProduct->user->username) : ''?></td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="#" data-toggle="dropdown" class="dropdown-toggle" aria-expanded="true"><i class="glyphicon glyphicon-option-vertical"></i></a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="<?= \yii\helpers\Url::to(['view', 'id' => $orderProduct->id]) ?>">Xem chi tiết</a></li>
                                                <li>
                                                    <form action="<?= \yii\helpers\Url::to(['delete','id'=>$orderProduct->id])?>" method="post">
                                                        <button type="submit" class="btn-submit">Xóa</button>
                                                    </form>
                                                </li>
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
</div>
