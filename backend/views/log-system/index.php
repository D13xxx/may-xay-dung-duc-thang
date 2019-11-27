<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\query\LogSystemQuery */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Log Systems');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-12">
        <div class="timeline-item timeline-main">
           <h1><?= $this->title?></h1>
        </div>
        <div class="timeline timeline-right">
            <?php
                if(!empty($model)){
                    foreach ($model as $data){?>
                        <!-- START TIMELINE ITEM -->
                        <div class="timeline-item timeline-item-right">
                            <div class="timeline-item-info"><?= date(' h:i:s d-m-Y',$data->created_at)?></div>
                            <div class="timeline-item-icon"><span class="fa fa-reply"></span></div>
                            <div class="timeline-item-content">
                                <div class="timeline-heading padding-bottom-0">
                                     <a href="#"><?= $data->user->username ?></a> <?php if($data->status == \common\models\LogSystem::TT_TAOTAIKHOAN) {
                                         echo 'Đã tạo mới tài khoản';
                                     }else{
                                         echo 'Đã bị vô hiệu hóa tài khoản';
                                     }  ?></a>
                                </div>
                            </div>
                        </div>
                        <!-- END TIMELINE ITEM -->
                   <?php }
                }
            ?>
        </div>
    </div>
</div>
