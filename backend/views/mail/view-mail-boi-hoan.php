<?php
use yii\helpers\Url;
$this->registerJsFile(
    Yii::$app->request->baseUrl . '/js/jquery.timeago.js',
    ['depends' => ['\yii\web\JqueryAsset']]
);
$upUrl = Url::to('xac-thuc-xu-ly');
$this->registerJs("jQuery('abbr.timeago').timeago();", \yii\web\View::POS_READY);
$script = <<< JS
$('#btnXacThuc').on('click', function(e) {
    console.log('vao');
});
$('.btnXacThuc').on('click', function(e) {
    console.log('vao');
});
JS;
//$this->registerJs($script, $position);
//$noback = <<< JS
//
// function ajaxXacThuc() {
//    console.log('vao');
// }
//$("button").on("click", function() {
//    krajeeDialog.confirm("Bạn có chắc chắn việc đã xử lý tác vụ này hay chưa?", function (result) {
//        var thisCtrl = $(this);	
//        if (result) {
//            $.ajax({
//                    type: "POST",
//                    url: '$upUrl', // Your controller action
//                    data: {
//                        offsetId = thisCtrl.attr('offsetId')
//                    },
//                    success: function(data){
//                         alert('Xác thực thành công');
//                         location.reload();
//                    }
//                });
//        }
//    });
//    return false;
//});
//JS;
//$this->registerJs($noback, \yii\web\View::POS_READY);

use yii\web\View; ?>

<div class="content-frame-body" style="height: 857px;">

    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="pull-left">
                <img src="/theme/assets/images/users/user2.jpg" class="panel-title-image" alt="John Doe">
                <h3 class="panel-title"><?= ucwords($offset->full_name) ?> <small><?= ucwords($offset->email) ?></small></h3>
            </div>
        </div>
        <div class="panel-body">
            <h3>Thông báo <small class="pull-right text-muted"><span class="fa fa-clock-o"></span>  <abbr class="timeago" title="<?= date('Y-m-d H:i:s',$offset->created_at)?>"></abbr></small></h3>
            <br>
            <p><?= ucwords($offset->description) ?>.</p>
            <p class="text-muted"><strong>Gửi bởi : <br><?= ucwords($offset->full_name) ?></strong></p>
        </div>
        <div class="panel-body panel-body-table">
            <h6>File đính kèm</h6>
            <table class="table table-bordered table-striped">
                <tbody><tr>
                    <th width="50px">STT</th><th>Tên file</th>
                </tr>
                <?php
                if (!empty($fileNames)){
                    $i = 0;
                    foreach ($fileNames as $fileName){ ?>
                        <tr>
                            <td><?= $i++ ?></td><td><a href="<?= \yii\helpers\Url::to(['view-image','fileName'=>$fileName])?>" class="hmuPopUp"><?= $fileName ?></a>
                        </tr>
                    <?php }
                }
                ?>
                </tbody>
            </table>
        </div>
        <div class="panel-footer">
            <?php
            if ($offset->status != \common\models\Offset::TT_DAXULY){ ?>
                <button type="button" class="btn btn-primary btnXacThuc" id="btnXacThuc" offsetId="<?= $offset->id ?>">Xác thực hoàn thành</button>
            <?php }
            ?>
            <a href="<?= \yii\helpers\Url::to('compose-email-boi-hoan')?>" class="btn btn-success pull-right">Phản hồi</a>
        </div>
    </div>
</div>