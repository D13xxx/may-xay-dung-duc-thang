<?php

use common\models\CatProducts;
use yii\helpers\Html;
use  yii\helpers\Url;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model common\models\OrderProducts */

$this->title = 'Thông tin chi tiết đơn hàng.';
$this->params['breadcrumbs'][] = ['label' => 'Order Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$orderProId =  Yii::$app->request->get('orderProId');

$url = Url::to(['order-products/up-san-pham']);
$deleteScript = <<< JS
    $( "#btnCancel" ).click(function() {
    window.close();
    });
    
    $( "#btnSubmit" ).click(function() {   
        var keys = $('#grid').yiiGridView('getSelectedRows');      
        if (typeof keys !== 'undefined' && keys.length > 0){
            var dialog = confirm("Bạn có chắc chắn thêm mới những sản phẩm này hay không?");
            if (dialog == true) {               
                $.ajax({
                    type: "POST",
                    url: '$url',
                    data: {
                        keyIds:keys,
                        orderProId: $("#btnSubmit").attr('orderProId'),
                    },
                    success: function(result){
                        window.opener.gridReload();  
                        window.close();
                    }
                });
            }
        } 
    });

    
JS;
$this->registerJs($deleteScript, \yii\web\View::POS_READY);
?>
<div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-body">
            <h2 class="text-center">DANH SÁCH SẢN PHẨM</h2>
            <!-- INVOICE -->
            <div class="invoice">
                <div class="row">
                    <?php echo GridView::widget([
                        'dataProvider' => $dataProvider,
                        "id" => "grid",
                        'layout'=> "{items}\n{summary}\n{pager}",
                        'filterModel'=>$searchModel,
                        'pjax'=>true,
                        'pjaxSettings'=>[
                            'neverTimeout'=>true,
                        ],
                        'options' => [
                            'class' => 'grid-view table-responsive',
                        ],
                        
                        'columns' => [
                            ['class'=>'yii\grid\SerialColumn'],
                            [
                                'class' => 'kartik\grid\CheckboxColumn',
                                'multiple' => true
                            ],
                            [
                                'header'=>'Ảnh sản phẩm',
                                'format'=>'raw',
                                'value'=>function($data){
                                    return  Html::img(Yii::getAlias('@fakelink/products/'.$data->avatar),['class'=>'img-thumbnail','width'=>'50px']);
                                }
                            ],
                            [
                                'attribute'=>'cat_id',
                                'filterType' => GridView::FILTER_SELECT2,
                                'filter' => ArrayHelper::map(CatProducts::find()->all(), 'id', 'name'),
                                'filterWidgetOptions' => [
                                    'pluginOptions' => ['allowClear' => true],
                                ],
                                'filterInputOptions' => ['placeholder' => ''],
                                'header'=>'Nhóm sản phẩm',
                                'value'=>function($data){
                                    return $data->cat->name;
                                }
                            ],   
                            [
                                'attribute'=>'code',
                                'header'=>'Mã sản phẩm',
                                'value'=>function($data){
                                    return $data->code;
                                }
                            ],               
                            [
                                'attribute'=>'full_name',
                                'header'=>'Tên sản phẩm',
                                'value'=>function($data){
                                    return $data->full_name;
                                }
                            ],
                            [
                                'attribute'=>'price',
                                'header'=>'Giá tiền',
                                'value'=>function($data){
                                    return number_format($data->price);
                                }
                            ],
                        ],
                    ]); ?>
                </div>
            </div>
            <!-- END INVOICE -->
        </div>
        <div class="panel-footer">
            <button type="button" id="btnSubmit" orderProId="<?= $orderProId?>" class="btn btn-success pull-left">Thêm sản phẩm</button> &nbsp;
            <button class="btn btn-default " id="btnCancel">Đóng cửa sổ</button>
            <br>
            <br>
        </div>
    </div>
</div>

