<?php

use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Html;
use yii\helpers\Url;
?>
<style>
    .btnBt {
        width: 100% !important;
        background: none !important;
        border: none !important;
        text-align: left !important;
        color: #ffff !important;
        min-height: 44px !important;
        padding-left: 20px !important;
    }
</style>
<ul class="x-navigation x-navigation-horizontal x-navigation-panel">
    <!-- TOGGLE NAVIGATION -->
    <li class="xn-icon-button">
        <a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
    </li>
    <!-- END TOGGLE NAVIGATION -->

    <!-- POWER OFF -->
    <li class="xn-icon-button pull-right last">
        <a href="#"><span class="fa fa-power-off"></span></a>
        <ul class="xn-drop-left animated zoomIn">
            <li>
                <form action="<?= Url::to('/site/logout')?>" method="post">
                    <?= Html::submitButton('<span class="fa fa-sign-out"></span> Đăng xuất',['class'=>'btnBt'])?>
                </form>
            </li>
        </ul>
    </li> 
    <!-- END POWER OFF -->                    
</ul>