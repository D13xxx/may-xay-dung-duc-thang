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
$url = Url::to(['order-products/thong-ke']);
$script = <<< JS
    $(function() {
        $('input[name="daterange"]').daterangepicker({
            opens: 'left'
        }, function(start, end) {
            // var startDate = start.format('YYYY-MM-DD');
            // var endDate = end.format('YYYY-MM-DD');
            // console.log(endDate + startDate);
            $.ajax({
                type: "POST",
                url: '$url', 
                data: {
                    startDate: startDate,
                    endDate: endDate,
                },
                success: function(data){

                }
            });
        });
    });
JS;
$this->registerJs($script, \yii\web\View::POS_READY);
?>
<div class="col-md-12">
    <div class="row">
        <form action="<?= Url::to('thong-ke') ?>">
            <div class="col-md-4">
                <input type="text" name="daterange" class="form-control" value="01/01/2018 - 01/15/2018" />
            </div>
            <div class="col-md-1">
                <button class="btn btn-primary" type="submit">Tìm kiếm</button>
            </div>
        </form>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h5>Danh sách liệt kê.</h5>
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
                        <!-- <tr>
                            <td>Stt</td>
                            <td>Họ và tên</td>
                            <td>Địa chỉ</td>
                            <td>Số điện thoại</td>
                            <td>Sản phẩm</td>
                            <td>Trạng thái</td>
                            <td>Ngày mua hàng</td>
                            <td>Tài khoản</td>
                            <td>Chức năng</td>
                        </tr>
                        <tr>
                            <td colspan="7">Tổng tiền thành toán</td>
                            <td colspan="2"><?= number_format(1000000) ?> VND</td>
                        </tr>
                        <tr>
                            <td colspan="7">Tổng hóa đơn hủy</td>
                            <td colspan="2"><?= number_format(1000000) ?> VND</td>
                        </tr> -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>