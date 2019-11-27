<?php
use yii\helpers\Url;
$cats = \common\models\CatProducts::find()->where(['parent_id'=> null])->all();
?>
<footer id="footer">
    <div class="footer-top">
        <div class="container">
            <div class="footer-top-left">
                <div class="row">
                    <div class="col-md-4 footer-box">
                        <p class="footer-title">Hỗ trợ khách hàng</p>
                        <div class="footer-sub footer-menu">
                            <ul>
                                <li class="menu-item ">
                                    <a href="<?= Url::to('/site/huong-dan-thanh-toan')?>" rel="follow">Hướng dẫn thanh
                                        toán</a>
                                </li>
                                <li class="menu-item ">
                                    <a href="<?= Url::to('/site/chinh-sach-giao-hang')?>" rel="follow">Chinh sách giao
                                        hàng</a>
                                </li>
                                <li class="menu-item ">
                                    <a href="<?= Url::to('/site/chinh-sach-doi-tra')?>" rel="follow">Chính sách đổi
                                        trả</a>
                                </li>
                                <li class="menu-item ">
                                    <a href="<?= Url::to('/site/chinh-sach-bao-hanh')?>" rel="follow">Chính sách bảo
                                        hành</a>
                                </li>
                                <li class="menu-item ">
                                    <a href="<?= Url::to('/site/chinh-sach-bao-mat-thong-tin')?>" rel="follow">Chính
                                        sách bảo mật thông
                                        tin</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4 footer-box">
                        <p class="footer-title">Điện máy Đức Thắng</p>
                        <div class="footer-sub footer-menu">
                            <ul>
                                <li class="menu-item ">
                                    <a href="<?= Url::to('/site/he-thong-showroom')?>" rel="follow">Hệ thống
                                        Showroom</a>
                                </li>
                                <li class="menu-item ">
                                    <a href="<?= Url::to('/site/gioi-thieu-cong-ty')?>" rel="follow">Giới thiệu về Thành
                                        Lợi</a>
                                </li>
                                <li class="menu-item ">
                                    <a href="<?= Url::to('/site/tuyen-dung')?>" rel="follow">Tuyển dụng</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4 footer-box">
                        <p class="footer-title">Danh mục sản phẩm</p>
                        <div class="footer-sub footer-menu">
                            <ul>
                                <?php
                                if(!empty($cats)){
                                    foreach ($cats as $cat){ ?>
                                <li class="menu-item ">
                                    <a href="<?= \yii\helpers\Url::to(['products/list-products-cat','slug'=>$cat->slug])?>"
                                        rel="follow"><?= ucwords($cat->name)?></a>
                                </li>
                                <?php }
                                    }
                                ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4 footer-box">
                        <div class="footer-sub zing-content">
                            <p><img src="/theme-v2/img/logo.png" alt=""></p>
                            <p><img src="/theme-v2/img/dathongbao.png" alt=""></p>
                        </div>
                    </div>
                    <div class="col-md-8 footer-box">
                        <p class="footer-title footer-small-title">CÔNG TY CP CƠ KHÍ VÀ DỊCH VỤ ĐỨC THẮNG</p>
                        <div class="footer-sub footer-info zing-content">
                            <p>Hotline: 0912.43.455&nbsp; &nbsp;|&nbsp; &nbsp;0985.650.880&nbsp; &nbsp;|&nbsp;
                                &nbsp;0936.564.441</p>
                            <p>Showroom 1: 170A Thạch Bàn - Long Biên - Hà Nội</p>
                            <p>Số điện thoại: 0985.650.880</p>

                            <p>Email: <a href="mailto:dienmaythanhloi@gmail.com">ABC@gmail.com</a></p>
                            <p>STK:&nbsp;1303201050220 - Agribank chi nhánh Hà Thành</p>
                            <p>Chủ tài khoản:&nbsp;CÔNG TY CP CƠ KHÍ VÀ DỊCH VỤ ĐỨC THẮNG</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-top-right">
                <div class="footer-box">
                    <p class="footer-title">Kết nối với chúng tôi</p>
                    <div class="footer-sub social">
                        <a class="social-facebook" href="https://www.facebook.com/http://dienmaythanhloi.com/"
                            target="_blank" title="Facebook" rel="nofollow"><i class="fa fa-facebook"
                                aria-hidden="true"></i></a>
                        <a class="social-google" href="" target="_blank" title="Google+" rel="nofollow"><i
                                class="fa fa-google-plus" aria-hidden="true"></i>
                        </a>
                        <a class="social-twitter" href="" target="_blank" title="Twitter" rel="nofollow"><i
                                class="fa fa-twitter" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
                <div class="footer-box footer-payment-accept">
                    <p class="footer-title">Chấp nhận thanh toán</p>
                    <div class="footer-sub payment-accept-list">
                        <div class="payment-accept-item">
                            <div class="payment-accept-img">
                                <img src="/theme-v2/img/vpbank.png" alt="">
                            </div>
                        </div>
                        <div class="payment-accept-item">
                            <div class="payment-accept-img">
                                <img src="/theme-v2/img/bidv.jpg" alt="">
                            </div>
                        </div>
                        <div class="payment-accept-item">
                            <div class="payment-accept-img">
                                <img src="/theme-v2/img/090617093944.jpg" alt="">
                            </div>
                        </div>
                        <div class="payment-accept-item">
                            <div class="payment-accept-img">
                                <img src="/theme-v2/img/vib.png" alt="">
                            </div>
                        </div>
                        <div class="payment-accept-item">
                            <div class="payment-accept-img">
                                <img src="/theme-v2/img/shb.jpg" alt="">
                            </div>
                        </div>
                        <div class="payment-accept-item">
                            <div class="payment-accept-img">
                                <img src="/theme-v2/img/Techcombank_(1).jpg" alt="">
                            </div>
                        </div>
                        <div class="payment-accept-item">
                            <div class="payment-accept-img">
                                <img src="/theme-v2/img/vietcombank.jpg" alt="">
                            </div>
                        </div>
                        <div class="payment-accept-item">
                            <div class="payment-accept-img">
                                <img src="/theme-v2/img/Maritimebank.jpg" alt="">
                            </div>
                        </div>
                        <div class="payment-accept-item">
                            <div class="payment-accept-img">
                                <img src="/theme-v2/img/agribank.png" alt="">
                            </div>
                        </div>
                        <div class="payment-accept-item">
                            <div class="payment-accept-img">
                                <img src="/theme-v2/img/hdbank.jpg" alt="">
                            </div>
                        </div>
                        <div class="payment-accept-item">
                            <div class="payment-accept-img">
                                <img src="/theme-v2/img/ACB.jpg" alt="">
                            </div>
                        </div>
                        <div class="payment-accept-item">
                            <div class="payment-accept-img">
                                <img src="/theme-v2/img/scb.png" alt="">
                            </div>
                        </div>
                        <div class="payment-accept-item">
                            <div class="payment-accept-img">
                                <img src="/theme-v2/img/VietinBank.png" alt="">
                            </div>
                        </div>
                        <div class="payment-accept-item">
                            <div class="payment-accept-img">
                                <img src="/theme-v2/img/MB.jpg" alt="">
                            </div>
                        </div>
                        <div class="payment-accept-item">
                            <div class="payment-accept-img">
                                <img src="/theme-v2/img/eximbank.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            Giấy chứng nhận ĐKKD/Mã số thuế: 0106926175 - do Sở Kế Hoạch và Đầu Tư TP. Hà Nội cấp </div>
    </div>
</footer>