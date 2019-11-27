<?php

use common\models\Products;
use yii\helpers\Url;
?>
<style>
/* custome */
.fleft.logo {
    max-width: 23%;
}

.fleft.logo img {
    width: 96%;
    height: 40px;;
}

.fleft.sale-logo {
    width: 15%;
    padding: 0px 10px;
}

.fleft.sale-logo img {
    height: 40px;
    max-width: 90%;
    float: right;
}

.fleft.search-box {
    height: 40px;
    width: 40%;
}

form.search-form {
    height: 100%;
    position: relative;
}

input.txt-search {
    height: 100%;
}


p.header-address {
    float: left;
    padding-left: 70px;
    margin: 0;
    padding-top: 10px;
    font-size: 16px;
}
.header-address img {
    width: 20px;
    margin: 0;
    margin-top: -5px;
    margin-right: 4px;
}

p.header-address:last-child {
    padding-left: 130px;
}
.cart-mini {
  display: flex;
  padding: 4px 15px;
  /* border: 1px solid #fff;
  border-radius: 4px; */
  color: #ffff;
}
.cart-mini font {
    padding: 7px 2px 0px 2px;
  font-weight: bold;

}
.cart-mini span {
  color: red;
  margin-top: 5px;
}
.fright.cart-mini-box {
    height: 40px;
    border: 1px solid #ffff;
    border-radius: 4px;
}

a.cart-mini img {
    height: 30px;
}
font:hover {
    color: #ffff !important;
}
a.cart-mini:hover {
    color: #ffff !important;
}
</style>

<div class="header-center">
    <div class="container">
        <div class="fleft logo">
            <a href="<?= \yii\helpers\Url::to('/')?>">
                <img src="/theme-v2/images/new-design/logo-v1.png" alt="logo-v1.png">
            </a>
        </div>
        <div class="fleft sale-logo">
            <a href="<?= Url::to(['products/list-products-type','type'=>Products::T_SANPHAMKHUYENMAI])?>"><img src="/theme-v2/images/new-design/khuyen-mai.png" alt="khuyen-mai.png"></a>
        </div>
        <div class="fleft search-box">
            <form method="GET" action="<?= Url::to(['products/search'])?>" class="search-form">
                <input type="text" name="key" class="txt-search" autocomplete="on" placeholder="Tìm kiếm sản phẩm mong muốn ... ">
                <button type="submit" class="button btn-search"><i class="fa fa-search" aria-hidden="true"></i> Tìm kiếm</button>
            </form>
        </div>
        <div class="fright cart-mini-box">
            <a href="<?= \yii\helpers\Url::to(['products/add-cart-pro'])?>" class="cart-mini">
                <img src="/theme-v2/images/new-design/gio-hang.png" alt="gio-hang.png">
                <font>Giỏ hàng</font>
                <font></font>
                <span>
                <?php
                $session = Yii::$app->session;
                $temp = $session['cart'];
                echo $count = count($temp);
                ?></span>
               
            </a>
        </div>
    </div>
</div>
