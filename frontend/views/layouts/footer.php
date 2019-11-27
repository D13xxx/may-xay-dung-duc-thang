<?php
use yii\helpers\Url;
$cats = \common\models\CatProducts::find()->where(['parent_id'=> null])->all();
?>
<style>
.cl-red{
    color:red;
    font-size: 15px;
    font-weight: bold;
    padding:5px 0px;
}
.footer-menu h2{
    margin: 0 !important;
}
.footer-menu span{
    font-size: 11px;
    color:gray;
    padding:5px 0px;
}
.logo-footer {
    width: 100%;
}

.logo-footer img {
    width: 100%;
}

.detail-company {
    width: 100%;
    display: block;
    text-align: left;
}

.detail-company p {
    font-size: 11px;
    padding: 2px 0px;
    margin: 0;
    font-weight: 600;
}

.bank-in {
    width: 100%;
}

.bank-in p {
    margin: 0;
    font-size: 11px;
    font-weight: 600;
    display: block;text-align: left;
}
.giay-trung-nhan {
    width: 100%;
    font-size: 11px;
    font-weight: 600;
    text-align: left;
}

.logo-bo-cong-thuong {
    width: 100%;
}
.footer-box.footer-payment-accept i {
    font-size: 20px;
    padding: 0px 10px;
}

@media only screen and (max-width: 1200px) {
    .logo-footer {
        margin: 10px 0px;
    }
    .logo-footer img{
        width: 50%;
        margin: 0 auto;
    }
    .logo-bo-cong-thuong{
        width: 100%;
        
    }
    .logo-bo-cong-thuong img{
        width: 20%;
        margin: 0 auto;
    }
}
@media only screen and (max-width: 900px) {
    .footer-hiden{
        display: none;
    }
}
</style>
<footer id="footer">
    <div class="footer-top">
        <div class="container">
            <div class="footer-top-left">
                <div class="row">
                    <div class="col-md-4 footer-box">
                        <p class="footer-title">Hỗ trợ khách hàng</p>
                        <div class="footer-sub footer-menu">
                            <h2 class="cl-red">Hotline:0985.650.880 | 0912.543.455</h2>
                            <span>(Thời gian: 8-21h kể cả T7,CN)</span>
                            <h2  class="cl-red">Kỹ thuật :0985.650.880</h2>
                            <span>(Thời gian: 8-21h kể cả T7,CN)</span>
                            <ul>
                                <li class="menu-item ">
                                    <a href="<?= Url::to('/huong-dan-thanh-toan.html')?>" rel="follow">Hướng dẫn thanh
                                        toán</a>
                                </li>
                                <li class="menu-item ">
                                    <a href="<?= Url::to('/chinh-sach-giao-hang.html')?>" rel="follow">Chinh sách giao
                                        hàng</a>
                                </li>
                                <li class="menu-item ">
                                    <a href="<?= Url::to('/chinh-sach-doi-tra.html')?>" rel="follow">Chính sách đổi
                                        trả</a>
                                </li>
                                <li class="menu-item ">
                                    <a href="<?= Url::to('/chinh-sach-bao-hanh.html')?>" rel="follow">Chính sách bảo
                                        hành</a>
                                </li>
                                <li class="menu-item ">
                                    <a href="<?= Url::to('/chinh-sach-bao-mat-thong-tin.html')?>" rel="follow">Chính
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
                                    <a href="<?= Url::to('/he-thong-showroom.html')?>" rel="follow">Hệ thống
                                        Showroom</a>
                                </li>
                                <li class="menu-item ">
                                    <a href="<?= Url::to('/gioi-thieu-cong-ty.html')?>" rel="follow">Giới thiệu về Đức Thắng</a>
                                </li>
                                <li class="menu-item ">
                                    <a href="<?= Url::to('/tuyen-dung.html')?>" rel="follow">Tuyển dụng</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4 footer-box footer-hiden">
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
                </div>
            </div>
            <div class="footer-top-right">
                <div class="footer-box">
                    
                    <div class="footer-sub social">
                    <p class="footer-title">Chấp nhận thanh toán</p>
                    <div class="footer-sub payment-accept-list">
                        <div class="payment-accept-item">
                            <div class="payment-accept-img">
                                <img src="/theme-v2/img/vpbank.png" alt="vpbank.png">
                            </div>
                        </div>
                        <div class="payment-accept-item">
                            <div class="payment-accept-img">
                                <img src="/theme-v2/img/bidv.jpg" alt="bidv.jpg">
                            </div>
                        </div>
                        <div class="payment-accept-item">
                            <div class="payment-accept-img">
                                <img src="/theme-v2/img/090617093944.jpg" alt="090617093944.jpg">
                            </div>
                        </div>
                        <div class="payment-accept-item">
                            <div class="payment-accept-img">
                                <img src="/theme-v2/img/vib.png" alt="vib.png">
                            </div>
                        </div>
                        <div class="payment-accept-item">
                            <div class="payment-accept-img">
                                <img src="/theme-v2/img/shb.jpg" alt="shb.jpg">
                            </div>
                        </div>
                        <div class="payment-accept-item">
                            <div class="payment-accept-img">
                                <img src="/theme-v2/img/Techcombank_(1).jpg" alt="Techcombank_(1).jpg">
                            </div>
                        </div>
                        <div class="payment-accept-item">
                            <div class="payment-accept-img">
                                <img src="/theme-v2/img/vietcombank.jpg" alt="vietcombank.jpg">
                            </div>
                        </div>
                        <div class="payment-accept-item">
                            <div class="payment-accept-img">
                                <img src="/theme-v2/img/Maritimebank.jpg" alt="Maritimebank.jpg">
                            </div>
                        </div>
                        <div class="payment-accept-item">
                            <div class="payment-accept-img">
                                <img src="/theme-v2/img/agribank.png" alt="agribank.png">
                            </div>
                        </div>
                        <div class="payment-accept-item">
                            <div class="payment-accept-img">
                                <img src="/theme-v2/img/hdbank.jpg" alt="hdbank.jpg">
                            </div>
                        </div>
                        <div class="payment-accept-item">
                            <div class="payment-accept-img">
                                <img src="/theme-v2/img/ACB.jpg" alt="ACB.jpg">
                            </div>
                        </div>
                        <div class="payment-accept-item">
                            <div class="payment-accept-img">
                                <img src="/theme-v2/img/scb.png" alt="scb.png">
                            </div>
                        </div>
                        <div class="payment-accept-item">
                            <div class="payment-accept-img">
                                <img src="/theme-v2/img/VietinBank.png" alt="VietinBank.png">
                            </div>
                        </div>
                        <div class="payment-accept-item">
                            <div class="payment-accept-img">
                                <img src="/theme-v2/img/MB.jpg" alt="MB.jpg">
                            </div>
                        </div>
                        <div class="payment-accept-item">
                            <div class="payment-accept-img">
                                <img src="/theme-v2/img/eximbank.jpg" alt="eximbank.jpg">
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="clearfix">

                </div>
                <div class="footer-box footer-payment-accept">
                    <p class="footer-title">Kết nối với chúng tôi</p>
                    <a class="social-facebook" href="https://www.facebook.com/MayXayDung.DucThang"
                        target="_blank" title="Facebook" rel="nofollow"><i class="fa fa-facebook"
                            aria-hidden="true"></i></a>
                    <a class="social-youtube" href="" target="_blank" title="Youtube" rel="nofollow"><i
                            class="fa fa-youtube" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <div class="logo-footer">
                        <img src="/theme-v2/images/new-design/logo-v2-cl.png" alt="logo-v2-cl.png">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="detail-company">
                        <p>CÔNG TY CP CƠ KHÍ VÀ DỊCH VỤ ĐỨC THẮNG</p>
                        <p>Showroom 1: 170A Thạch Bàn - Long Biên - Hà Nội</p>
                        <p>Số điện thoại : 0912.543.455</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="bank-in">
                        <p>Email: Dangtranquynh2@gmail.Com</p>
                        <p>STK: 28910000210061  - BIDV chi nhánh Ngọc Khánh – Ba Đình – Hà Nội</p>
                        <p>Chủ tài khoản :Công ty CP cơ khí và dịch vụ Đức Thắng</p>
                    </div>
                </div>
                <div class="col-md-2">
                        <div class="giay-trung-nhan">
                            <p>
                                Giấy chứng nhận ĐKKD/Mã số thuế : 0108654664  - do Sở Kế Hoạch và Đầu Tư TP.Hà Nội cấp
                            </p>
                        </div>
                </div>
                <div class="col-md-1`">
                    <div class="logo-bo-cong-thuong">
                        <img src="/theme-v2/images/new-design/logo-bo-cong-thuong.png" alt="logo-bo-cong-thuong.png">
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>