
<?php

use common\models\OrderProducts;
use yii\helpers\Html;
use yii\widgets\DetailView;
use  yii\helpers\Url;
use kartik\grid\GridView;
/* @var $this yii\web\View */
/* @var $model common\models\OrderProducts */

$this->title = 'Thông tin chi tiết đơn hàng.';
$this->params['breadcrumbs'][] = ['label' => 'Order Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$orderProId =  Yii::$app->request->get('id');

$url = Url::to(['order-products/xac-thuc-giao-hang']);
$urlHuyDon = Url::to(['order-products/huy-don-hang']);
$urlDel = Url::to(['order-products/del-san-pham']);
$urlUpdateSoLuong = Url::to(['order-products/update-so-luong']);
$deleteScript = <<< JS
    $("#btnXacThuc").click(function(){ 
        console.log('click');
        $.ajax({
            type: "POST",
            url: '$url', // Your controller action
            data: {
                dataId: $("#btnXacThuc").attr('data-id'),
                txtTotal:  $("#txtTotal").val(),
            },
            success: function(data){
                location.reload();  
            }
        });
    });
    $("#btnHuyDon").click(function(){ 
        $.ajax({
            type: "POST",
            url: '$urlHuyDon', 
            data: {
                dataId: $("#btnHuyDon").attr('data-id'),
            },
            success: function(data){
                location.reload();  
            }
        });
    });

    $(".btnDelete").click(function(){ 
        $.ajax({
            type: "POST",
            url: '$urlDel', 
            data: {
                dataId: $(".btnDelete").attr('delId'),
                orderProId: $orderProId,
            },
            success: function(data){
                // $.pjax.reload({container:"#danhSachSanPham"})
                location.reload();  
            }
        });
    });

    $("body .txtInput").blur(function(){ 
        var thisCtrl = $(this);
        $.ajax({
            type: "POST",
            url: '$urlUpdateSoLuong', 
            data: {
                amount: thisCtrl.val(),
                dataId: thisCtrl.attr('proId'),
                orderProId: $orderProId,
            },
            success: function(data){
                // $.pjax.reload({container:"#danhSachSanPham"})
                // $.pjax.reload({container:".text-right"})
                location.reload();  
            }
        });
    });
    window.gridReload = function(){
    //  $.pjax.reload({container:"#danhSachSanPham"})
        location.reload();  
    }
    var totalStr = document.getElementById('priceTotal').textContent;
    var total = totalStr.replace(/,/g,'');
    document.getElementById('txtTotal').value = total;
JS;
$this->registerJs($deleteScript, \yii\web\View::POS_READY);
?>
<div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-body">
            <h2>THÔNG TIN CHI TIẾT ĐƠN HÀNG</h2>
            <!-- INVOICE -->
            <div class="invoice">
                <div class="row">
                    <div class="col-md-3">

                        <div class="invoice-address">
                            <h5>Tên khách hàng</h5>
                            <h6><?= ucwords($model->full_name)?></h6>
                        </div>

                    </div>
                    <div class="col-md-3">
                        <div class="invoice-address">
                            <h5>Email</h5>
                            <h6><?= ucwords($model->email)?></h6>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="invoice-address">
                            <h5>Số điện thoại</h5>
                            <h6><?= ucwords($model->cell_phone)?></h6>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="invoice-address">
                            <h5>Địa chỉ</h5>
                            <h6><?= ucwords($model->address)?></h6>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="invoice-address">
                            <h5>Thanh toán</h5>
                            <h6>
                                <span class="label label-'<?= OrderProducts::T_COLOR_ARRAY()[(int)$model->type_payment]?>"> <?= OrderProducts::T_ARRAY()[(int)$model->type_payment]?></span>
                           </h6>
                        </div>
                    </div>
                </div>
                <?php 
                if($model->status == OrderProducts::TT_DATHANG){ ?>
                    <?= Html::a('Thêm mới sản phẩm', ['them-moi-san-pham','orderProId'=>$model->id],['class'=>'btn btn-success hmuPopUp'])?>
                <?php }
                ?>
                <br>
                <br>
                <div class="row">
                    <?php echo GridView::widget([
                        'dataProvider' => $dataProvider,
                        'layout'=> "{items}\n{summary}\n{pager}",
                        // 'filterModel'=>$searchModel,
                        'pjax'=>true,
                        'pjaxSettings'=>[
                            'neverTimeout'=>true,
                            'options'=>[
                                'id'=>'danhSachSanPham',
                            ],
                        ],
                        'options' => [
                            'class' => 'grid-view table-responsive',
                        ],
                        'columns' => [
                            ['class'=>'yii\grid\SerialColumn'],
                        
                            [
                                'header'=>'Mã sản phẩm',
                                'format'=>'raw',
                                'value'=>function($data){
                                    return  Html::img(Yii::getAlias('@fakelink/products/'.$data->products->avatar),['class'=>'img-thumbnail','width'=>'50px']);
                                }
                            ],
                            [
                                'header'=>'Mã sản phẩm',
                                'value'=>function($data){
                                    return $data->products->code;
                                }
                            ],               
                            [
                                'header'=>'Tên sản phẩm',
                                'value'=>function($data){
                                    return $data->products->full_name;
                                }
                            ],
                            
                            [
                                'header'=>'Số lượng',
                                'format'=>'raw',
                                'value'=>function($data){
                                    $str= '<input type="text" class="txtInput form-control" name="" proId="'.$data->products->id.'" value="'.$data->amount.'">';
                                    return $str;
                                }
                            ],

                            [
                                'header'=>'Đơn giá',
                                'value'=>function($data){
                                    return number_format($data->don_gia).'VND';
                                }
                            ],
                            [
                                'header'=>'Thành tiền',
                                'value'=>function($data){
                                    return number_format($data->price_pro).'VND';
                                }
                            ],
                            [
                                'class' => 'yii\grid\ActionColumn',
                                'options' => ['style' => 'width: 5%'],
                                'template'=>'{del-delete}',
                                'buttons'=>[
                                    'del-delete'=>function($url,$data){
                                        if($data->orderProducts->status == OrderProducts::TT_DATHANG){
                                            $orderProId =  Yii::$app->request->get('id');
                                            return Html::a('<span class="glyphicon glyphicon-remove"></span>',false,['title'=>'Xóa','orderProId'=>$orderProId,'delId'=>$data->products->id,'class'=>'btnDelete','data-pjax'=>0]);
                                        }
                                        
                                    },
                                ],
                                
                            ],
                        ],
                    ]); ?>
                </div>
                
                <div class="row">
                    <table class="table table-striped">
                        <tbody>
                            <tr class="total">
                                <td>Tổng tiền:</td><td class="text-right"> <p id="priceTotal"><?= $arayPricePro ?  number_format($arayPricePro) : 0?></p> VND</td>
                                <input type="hidden" id="txtTotal">
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END INVOICE -->
        </div>
        <div class="panel-footer">
            <?php 
            if($model->status == OrderProducts::TT_DATHANG){ ?>
                <button id="btnXacThuc" class="btn btn-warning" data-id="<?= $model->id?>">Xác thực đã giao hàng</button>

                <button id="btnHuyDon" class="btn btn-success" data-id="<?= $model->id?>">Hủy đơn</button>

            <?php }
            ?>
            <?= Html::a('In/Xuất hóa đơn',['in-hoa-don','orderId'=>$model->id],['class'=>'btn btn-primary hmuPopUp'])?>
            
            <?= Html::a('Quay lại',['index'],['class'=>'btn btn-default pull-right'])?>
        </div>
    </div>
</div>

