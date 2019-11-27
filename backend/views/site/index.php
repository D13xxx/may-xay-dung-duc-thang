<?php

/* @var $this yii\web\View */

use common\models\Products;
use yii\helpers\Url;

$this->title = 'Mayxaydungducthang.vn - Hệ thống điện máy rẻ nhất hiện nay.';
?>
<div class="row">
    <div class="col-md-3">

        <!-- START WIDGET SLIDER -->
        <div class="widget widget-default widget-carousel">
            <div class="owl-carousel owl-theme" id="owl-example" style="opacity: 1; display: block;">
                <div class="owl-wrapper-outer">
                    <div class="owl-wrapper" style="width: 2166px; left: 0px; display: block; transition: all 400ms ease 0s; transform: translate3d(-361px, 0px, 0px);">
                        <div class="owl-item" style="width: 361px;">
                            <div>
                                <div class="widget-title">Total Visitors</div>
                                <div class="widget-subtitle">27/08/2017 15:23</div>
                                <div class="widget-int">3,548</div>
                            </div>
                        </div>
                        <div class="owl-item" style="width: 361px;">
                            <div>
                                <div class="widget-title">Returned</div>
                                <div class="widget-subtitle">Visitors</div>
                                <div class="widget-int">1,695</div>
                            </div>
                        </div>
                        <div class="owl-item" style="width: 361px;">
                            <div>
                                <div class="widget-title">New</div>
                                <div class="widget-subtitle">Sản phẩm</div>
                                <div class="widget-int">1,977</div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="owl-controls clickable">
                    <div class="owl-pagination">
                        <div class="owl-page"><span class=""></span></div>
                        <div class="owl-page active"><span class=""></span></div>
                        <div class="owl-page"><span class=""></span></div>
                    </div>
                </div>
            </div>
            <div class="widget-controls">
                <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
            </div>
        </div>
        <!-- END WIDGET SLIDER -->

    </div>
    <div class="col-md-3">

        <!-- START WIDGET MESSAGES -->
        <div class="widget widget-default widget-item-icon" onclick="location.href='<?= Url::to('/products/index') ?>';">
            <div class="widget-item-left">
                <span class="fa fa-envelope"></span>
            </div>
            <div class="widget-data">
                <div class="widget-int num-count"><?= $totalProduct ?></div>
                <div class="widget-title">Sản phẩm</div>
                <div class="widget-subtitle">Tổng số lượng sản phẩm</div>
            </div>
            <div class="widget-controls">
                <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
            </div>
        </div>
        <!-- END WIDGET MESSAGES -->

    </div>
    <div class="col-md-3">

        <!-- START WIDGET REGISTRED -->
        <div class="widget widget-default widget-item-icon" onclick="location.href='pages-address-book.html';">
            <div class="widget-item-left">
                <span class="fa fa-user"></span>
            </div>
            <div class="widget-data">
                <div class="widget-int num-count">375</div>
                <div class="widget-title">Registred users</div>
                <div class="widget-subtitle">On your website</div>
            </div>
            <div class="widget-controls">
                <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
            </div>
        </div>
        <!-- END WIDGET REGISTRED -->

    </div>
    <div class="col-md-3">

        <!-- START WIDGET CLOCK -->
        <div class="widget widget-danger widget-padding-sm">
            <div class="widget-big-int plugin-clock">08<span>:</span>52</div>
            <div class="widget-subtitle plugin-date">Wednesday, October 30, 2019</div>
            <div class="widget-controls">
                <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="left" title="Remove Widget"><span class="fa fa-times"></span></a>
            </div>
            <div class="widget-buttons widget-c3">
                <div class="col">
                    <a href="#"><span class="fa fa-clock-o"></span></a>
                </div>
                <div class="col">
                    <a href="#"><span class="fa fa-bell"></span></a>
                </div>
                <div class="col">
                    <a href="#"><span class="fa fa-calendar"></span></a>
                </div>
            </div>
        </div>
        <!-- END WIDGET CLOCK -->

    </div>
</div>
<div class="row">
    <div class="col-md-6">

        <!-- START PROJECTS BLOCK -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title-box">
                    <h3>Sản phẩm bán chạy nhất</h3>
                    <span>Theo tổng sản phẩm</span>
                </div>
                <ul class="panel-controls" style="margin-top: 2px;">
                    <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                    <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-cog"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span> Collapse</a></li>
                            <li><a href="#" class="panel-remove"><span class="fa fa-times"></span> Remove</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="panel-body panel-body-table">

                <div class="table-responsive">
                    <table class="table table-condensed table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="5%">Stt</th>
                                <th width="25%">Mã sản phẩm</th>
                                <th width="50%">Tên sản phẩm</th>
                                <th width="20%">Số lượng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($sanPhamBanChays)) {
                                $i = 1;
                                foreach ($sanPhamBanChays as $sanPhamBanChay) {
                                    $product = Products::findOne($sanPhamBanChay["product_id"]); ?>
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td><strong><?= $product->code?></strong></td>
                                        <td><span class="label label-danger"><?= $product->full_name?></span></td>
                                        <td>
                                            <?= $sanPhamBanChay["amount"] ?>
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
        <!-- END PROJECTS BLOCK -->

    </div>

    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title-box">
                    <h3>Visitors</h3>
                    <span>Visitors (last month)</span>
                </div>
                <ul class="panel-controls" style="margin-top: 2px;">
                    <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                    <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-cog"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span> Collapse</a></li>
                            <li><a href="#" class="panel-remove"><span class="fa fa-times"></span> Remove</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="panel-body padding-0">
                <div class="chart-holder" id="dashboard-donut-1" style="height: 200px;"><svg height="200" version="1.1" width="514.984" xmlns="http://www.w3.org/2000/svg" style="overflow: hidden; position: relative; left: -0.96875px;">
                        <desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Created with Raphaël 2.1.2</desc>
                        <defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></defs>
                        <path fill="none" stroke="#33414e" d="M257.492,160A60,60,0,1,0,202.31497794171798,76.43103233529607" stroke-width="2" opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); opacity: 1;"></path>
                        <path fill="#33414e" stroke="#ffffff" d="M257.492,163A63,63,0,1,0,199.5561268388039,75.25258395206087L174.726466912577,64.64654850294411A90,90,0,1,1,257.492,190Z" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
                        <path fill="none" stroke="#3fbae4" d="M202.31497794171798,76.43103233529607A60,60,0,0,0,223.28915422682826,149.2967072025772" stroke-width="2" opacity="0" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); opacity: 0;"></path>
                        <path fill="#3fbae4" stroke="#ffffff" d="M199.5561268388039,75.25258395206087A63,63,0,0,0,221.57901193816969,151.76154256270607L209.0379684880067,169.8370018703177A85,85,0,0,1,179.3245520841005,66.61062914166943Z" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
                        <path fill="none" stroke="#fea223" d="M223.28915422682826,149.2967072025772A60,60,0,0,0,257.4731504443885,159.9999970391187" stroke-width="2" opacity="0" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); opacity: 0;"></path>
                        <path fill="#fea223" stroke="#ffffff" d="M221.57901193816969,151.76154256270607A63,63,0,0,0,257.4722079666079,162.99999689107466L257.4652964628837,184.99999580541817A85,85,0,0,1,209.0379684880067,169.8370018703177Z" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="257.492" y="90" text-anchor="middle" font="10px &quot;Arial&quot;" stroke="none" fill="#000000" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font: 800 15px Arial;" font-size="15px" font-weight="800" transform="matrix(1.6195,0,0,1.6195,-159.7714,-61.0201)" stroke-width="0.6174768518518519">
                            <tspan dy="5.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Returned</tspan>
                        </text><text x="257.492" y="110" text-anchor="middle" font="10px &quot;Arial&quot;" stroke="none" fill="#000000" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font: 14px Arial;" font-size="14px" transform="matrix(1.25,0,0,1.25,-64.4004,-25.5)" stroke-width="0.8">
                            <tspan dy="5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2,513</tspan>
                        </text>
                    </svg></div>
            </div>
        </div>
    </div>
</div>