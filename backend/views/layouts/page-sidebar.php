<?php

use yii\helpers\Html;
use yii\helpers\Url;
?>
<?php
$id = \Yii::$app->user->identity->id;
$user = \common\models\InfoProfile::find()->where(['user_id'=>$id])->one();
$frontend = \backend\assets\FrontendAsset::register($this);
?>
<?php
$model = \common\models\InfoProfile::find()->where(['user_id'=>Yii::$app->user->identity->id])->one();
?>
<div class="page-sidebar">
    <!-- START X-NAVIGATION -->
    <ul class="x-navigation">
        <li class="xn-logo">
            <a href="<?= Url::to('/site/index')?>">Dienmay.vn</a>
            <a href="#" class="x-navigation-control"></a>
        </li>
        <li class="xn-profile">
            <a href="<?= Url::to(['info-profile/update','id'=>$user->id])?>" class="profile-mini">

                <?php
                if(!empty($model->avatar)){ ?>
                    <?= Html::img(\Yii::$app->request->BaseUrl.'/upload/info-profile/'.$model->avatar,['class'=>'avatar img-circle','id'=>'avatarPro'])?>
                <?php }else{ ?>
                    <img src="https://via.placeholder.com/200x200" id="avatarPro"  class="avatar img-circle " alt="avatar">
                <?php }
                ?>
            </a>
            <div class="profile">
                <div class="profile-image">
                    <a href="<?= Url::to(['info-profile/update','id'=>Yii::$app->user->identity->id])?>">
                        <?php
                        if(!empty($model->avatar)){ ?>
                        <?= Html::img(\Yii::$app->request->BaseUrl.'/upload/info-profile/'.$model->avatar,['class'=>'avatar img-circle','id'=>'avatarPro'])?>
                         <?php }else{ ?>
                            <img src="https://via.placeholder.com/200x200" id="avatarPro"  class="avatar img-circle" alt="avatar">
                        <?php }
                        ?>
                    </a>
                </div>
                <div class="profile-data">

                    <div class="profile-data-name"><?= $user->full_name ?></div>
                    <div class="profile-data-title">Web Developer/Designer</div>
                </div>
                <div class="profile-controls">

                </div>
            </div>
        </li>
        <li class="xn-openable">
            <a href="#"><span class="fa fa-cogs"></span> <span class="xn-text">M00 - Cấu hình phân quyền</span></a>
            <ul>
                <li><a href="<?= Url::to('/rbac/route')?>"><span class="xn-text">RBAC Route</span></a></li>
                <li><a href="<?= Url::to('/rbac/permission')?>"><span class="xn-text">RBAC Permission</span></a></li>
                <li><a href="<?= Url::to('/rbac/role')?>"><span class="xn-text">RBAC Role</span></a></li>
                <li><a href="<?= Url::to('/rbac/assignment')?>"><span class="xn-text">RBAC Assignment</span></a></li>
            </ul>
        </li>
        <li class="xn-openable">
            <a href="#"><span class="fa fa-cogs"></span> <span class="xn-text">M01 - Cấu hình tài khoản</span></a>
            <ul>
                <li><a href="<?= Url::to('/user/index')?>"><span class="xn-text">Tài khoản quản trị</span></a></li>
            </ul>
        </li>

        <li class="xn-openable">
            <a href="#"><span class="fa fa-cogs"></span> <span class="xn-text">M02 - Thiết lập cài đặt</span></a>
            <ul>
                <li><a href="<?= Url::to('/banner/index')?>"><span class="xn-text">Cấu hình banner</span></a></li>
                <li><a href="<?= Url::to('/cat-products/index')?>"><span class="xn-text"></span> Nhóm sản phẩm</a></li>
                <li><a href="<?= Url::to('/detail-company/update?id=1')?>"><span class="xn-text"></span> Giới thiệu công ty</a></li>
                <li><a href="<?= Url::to('/sp-employ/update?id=1')?>"><span class="xn-text"></span> Hỗ trợ khách hàng</a></li>
            </ul>
        </li>
        <?php
        if (\Yii::$app->user->can('Admin')) {?>


        <?php } else {?>

        <?php } ?>
        <li class="xn-openable">
            <a href="#"><span class="fa fa-cogs"></span> <span class="xn-text">M03 - Sản phẩm</span></a>
            <ul>
                <li><a href="<?= Url::to('/products/create')?>">Thêm mới sản phẩm</a></li>
                <li><a href="<?= Url::to('/products/index')?>">Danh sách sản phẩm</a></li>
                <li><a href="<?= Url::to('/products/list-products-export')?>">Import / Export Excel</a></li>
            </ul>
        </li>
        <li class="xn-openable">
            <a href="#"><span class="fa fa-cogs"></span> <span class="xn-text">M04 - Đơn hàng</span></a>
            <ul>
                <li><a href="<?= Url::to('/order-products/create')?>"> Thêm mới đơn hàng</a></li>
                <li><a href="<?= Url::to('/order-products/index')?>"> Danh sách đơn hàng</a></li>
            </ul>
        </li>
        <li class="xn-openable">
            <a href="#"><span class="fa fa-cogs"></span> <span class="xn-text">M05 - Đối tác</span></a>
            <ul>
                <li><a href="<?= Url::to('/brand/index')?>"> Thương hiệu</a></li>
            </ul>
        </li>

        <li class="xn-openable">
            <a href="#"><span class="fa fa-cogs"></span> <span class="xn-text">M06 - Thống kê</span></a>
            <ul>
                <li><a href="<?= Url::to('/brand/index')?>"> Thông kê doanh số theo ngày</a></li>
            </ul>
        </li>
    </ul>
    <!-- END X-NAVIGATION -->
</div>