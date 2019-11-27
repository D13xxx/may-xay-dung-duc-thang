<?php

$this->registerJsFile(
    Yii::$app->request->baseUrl . '/js/jquery.timeago.js',
    ['depends' => ['\yii\web\JqueryAsset']]
);
$this->registerJs("jQuery('abbr.timeago').timeago();", \yii\web\View::POS_READY);

?>
<div class="content-frame-top">
    <div class="page-title">
        <h2><span class="fa fa-inbox"></span> Email bồi hoàn <small>(3 Chưa xem)</small></h2>
    </div>

</div>
<div class="panel-heading">
    <label class="check mail-checkall">
        <div class="icheckbox_minimal-grey" style="position: relative;"><input type="checkbox" class="icheckbox" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
    </label>
<!--    <div class="btn-group">-->
<!--        <button class="btn btn-default"><span class="fa fa-mail-reply"></span></button>-->
<!--        <button class="btn btn-default"><span class="fa fa-mail-reply-all"></span></button>-->
<!--        <button class="btn btn-default"><span class="fa fa-mail-forward"></span></button>-->
<!--    </div>-->
<!--    <div class="btn-group">-->
<!--        <button class="btn btn-default"><span class="fa fa-star"></span></button>-->
<!--        <button class="btn btn-default"><span class="fa fa-flag"></span></button>-->
<!--    </div>-->
<!--    <button class="btn btn-default"><span class="fa fa-warning"></span></button>-->
<!--    <button class="btn btn-default"><span class="fa fa-trash-o"></span></button>-->
<!--    <div class="pull-right" style="width: 150px;">-->
<!--        <div class="input-group">-->
<!--            <div class="input-group-addon"><span class="fa fa-calendar"></span></div>-->
<!--            <input class="form-control datepicker" type="text" data-orientation="left">-->
<!--        </div>-->
<!--    </div>-->
</div>
<div class="panel-body mail">

    <?php
        foreach ($offsets as $offset){
            if ($offset->is_viewed == \common\models\Offset::V_NOTVIEW){?>
                <div class="mail-item mail-unread mail-info">
                    <div class="mail-checkbox">
                        <div class="icheckbox_minimal-grey" style="position: relative;"><input type="checkbox" class="icheckbox" style="position: absolute; opacity: 0;" value="<?= $offset->id ?>"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
                    </div>

                    <div class="mail-user"><a href="<?= \yii\helpers\Url::to(['view-mail-boi-hoan','id'=>$offset->id]) ?>" class="mail-text"><?= ucwords($offset->full_name)?></a></div>
                    <?= $offset->description ? ucwords($offset->description) : '' ?>
                    <div class="mail-date">
                        <abbr class="timeago" title="<?= date('Y-m-d H:i:s',$offset->created_at)?>"></abbr>
                    </div>
                </div>
            <?php }else{?>
                <div class="mail-item mail-success">
                    <div class="mail-checkbox">
                        <div class="icheckbox_minimal-grey" style="position: relative;"><input type="checkbox" class="icheckbox" style="position: absolute; opacity: 0;" value="<?= $offset->id ?>" ><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
                    </div>
                    <div class="mail-user"><a href="<?= \yii\helpers\Url::to(['view-mail-boi-hoan','id'=>$offset->id]) ?>" class="mail-text"><?= ucwords($offset->full_name)?></a></div>
                    <?= $offset->description ? ucwords($offset->description) : '' ?>
                    <div class="mail-date">
                        <abbr class="timeago" title="<?= date('Y-m-d H:i:s',$offset->created_at)?>"></abbr>
                    </div>
                </div>
            <?php }
        }
    ?>

</div>
<div class="clear-fix">
    <br>
    <br>
    <br>
</div>
<div class="panel-footer">
    <ul class="pagination pagination-sm pull-left">
        <li class="disabled"><a href="#">«</a></li>
        <li class="active"><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">»</a></li>
    </ul>
    <br>
    <br>
</div>
