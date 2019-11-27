<?php 
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use app\models\Menu;

 ?>

 <style type="text/css">
  .dropdown-toggle::after {
    color: #009efc;  
  }

  #header .wrap-header-bottom .bottom .tab-content .navbar .navbar-collapse ul li.nav-item .dropdown-menu {
    background: #fff;
  }
  #header .wrap-header-bottom .bottom .tab-content .navbar .navbar-collapse ul li.nav-item .dropdown-menu a {
    border-bottom: solid 1px #fff;
}
  @media (max-width: 1199.98px){
    #header .wrap-header-bottom .bottom .tab-content .navbar .navbar-collapse ul li.nav-item {

    }

    .dropdown-toggle::after {
      color: #009efc;  
      margin-left: 30px;
      font-size: 20px;
    }
  }
 </style>
<div id="wrap">
    <header id="header">

        <!-- wrap-header-top -->

        <div class="wrap-header-top">
            <div class="container">
                <div class="row">
                    <div class="top clearfix w-100">
                        <div class="logo-vinaphone">

                            <h2>

                                <a href="/" class="d-block w-100">
                                    <img src="/images/logo.png" alt="Tổng đài Vinaphone" class="img-fluid">
                                </a>

                            </h2>

                        </div>

                        <div class="search">
                            <?php $form = ActiveForm::begin([
                                'id' => 'form-main-search',
                                'method' => 'GET',
                                'action'=> ['/category/search'],
                                ]); ?>
                            <input type="search" name="keywords" id="" placeholder="Tìm kiếm" class="form-control">
                            <?php ActiveForm::end(); ?>
                        </div>



                    </div>
                </div>
            </div>
        </div>

        <!-- end Top -->

        <div class="wrap-header-bottom w-100">
            <div class="container">
                <div class="row">
                    <div class="bottom w-100">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                                        data-target=".navbarSupportedContent" aria-controls="navbarSupportedContent"
                                        aria-expanded="false" aria-label="Toggle navigation">
                                        <span class="navbar-toggler-icon"></span>
                                    </button>

                                    <?php if($_SESSION['msisdn'] != '') {?>
                                    <div style="float: right; color:#fff; font-size: 13px; font-weight: bold;"> Xin
                                        chào: <b><?=$_SESSION['msisdn']?></b></div>
                                    <?php } ?>

                                    <a href="/" class="sub-logo">
                                        <img src="/images/logo.png" alt="Tổng đài Vinaphone" width="100px"
                                            style="margin-right: 20px" />
                                    </a>

                                    <div class="collapse navbar-collapse navbarSupportedContent" id="">
                                        <ul class="navbar-nav mr-auto">
                                            <li class="nav-item active">
                                                <a class="nav-link active" href="/">Trang chủ
                                                </a>

                                            </li>

                                            <?php
                                                foreach ($data as $value) {
                                                    // var_dump($value); die;
                                                    $cat = Menu::find()->where(['status' => 1,'parent'=>$value->id]);
                                                    
                                                    if($cat->count()==0){
                                            ?>
                                                    <li class="nav-item">
                                                        <img src="http://cms.vinaphonevn.com.vn/<?=$value->images?>"
                                                            alt="iconuser.png" class="iconuser d-block">
                                                        <a class="nav-link" href="<?=$value->link?>"><?=$value->name?></a>

                                                    </li>
                                            <?php
                                                    }else{
                                            ?>  
                                                        <li class="nav-item dropdown">
                                                <img src="http://cms.vinaphonevn.com.vn/<?=$value->images?>"
                                                    alt="iconuser.png" class="iconuser d-block">
                                                <a class="nav-link dropdown-toggle" href="<?=$value->link?>" id="goicuoc" role="button"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                    <?=$value->name?>
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                                   <?php foreach($cat->all() as $value1) {?>
                                                   <a class="dropdown-item" href="<?= $value1->link?>"><?=$value1->name?></a>
                                                   <?php } ?>
                                                </div>  
                                            </li>
                                            <?php
                                                    }
                                            ?>
                                                 
                                            <?php
                                                }
                                            ?>

                                        </ul>
                                        <form class="form-inline my-2 my-lg-0">
                                            <input class="form-control" type="search" placeholder="Tìm kiếm"
                                                aria-label="Search">
                                            <!-- <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button> -->
                                        </form>
                                    </div>

                                </nav>
                            </div>
                            <!-- home-tab -->
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </header>


    <?php 
    if($slug == 3) { ?>
    <style>
        .logo-vinaphone {
            padding-top: 10px
        }
    </style>
    <?php } else if ($slug == 2) { ?>
    <style>
        .logo-vinaphone {
            padding-top: 5px
        }
    </style>
    <?php } ?>