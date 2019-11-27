<?php 
use yii\helpers\Url;
?>
<style>
     .header-top-new {
    background: #f68929;
    height: 30px;
    }

    .header-top-new .container {
        /* display: flex; */
        clear: both;
        padding-top: 6px;
    }

    .txt-lefft {
        float: left;
    }

    .txt-lefft p {
        color: #ffff;
        font-weight: 600;
        font-size: 11pxxx;
    }

    .txt-right {
        float: right;
    }

    .txt-right p {
        color: #ffff;
    }
.txt-right img {width: 17px;margin: 0 5px;}
.contact {
    flex: left;
    display: flex;
}
.header-address span {
  color: #ffff;
  font-weight: bold;
}
.header-address img {
  width: 20px;
  margin: 0;
}

@media only screen and (max-width: 900px) {
  
    .header-top-new{
        display: none;
    }
}
</style>
<div class="header-top-new">
    <div class="container">
        <div class="txt-lefft">
            <p>PHÂN PHỐI SẢN PHẨM ĐIỆN MÁY CÁC HÃNG HÀNG ĐẦU THẾ GIỚI</p>
        </div>
        <div class="txt-right">
            <p><img src="/theme-v2/images/new-design/icon-sdt.png" alt=""><b>Kỹ thuật:0912.543.455</b></p>
        </div>
    </div>
</div>
