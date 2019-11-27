<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="/theme-v2/images/new-design/icon.png">
    <meta property="og:type" content="website" />
    <meta name="google-site-verification" content="_bqysHHTpPTW4pUngpx0kZL2EOCcem-_LOc3O38Bw_U" />
    
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v4.0&appId=156105261771811&autoLogAppEvents=1"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-153529312-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-153529312-1');
    </script>
</head>
<body>
<?php $this->beginBody() ?>

    <?= $this->render('/layouts/test')?>

    <?= $this->render('/layouts/header-top')?>
    
    <?= $content ?>
    <!-- footer -->
    <?= $this->render('footer.php')?>
    <div id="fb-root"></div>
<?php $this->endBody() ?>
<script>
    $('#btnSearch').click(function () {
        $('.search-box-pro').toggleClass('search-box-active',500000);
    });
    // creat menu sidebar
    $(".menu-bar-lv-1").each(function(){
        $(this).find(".span-lv-1").click(function(){
            $(this).toggleClass('rotate-menu');
            $(this).parent().find(".menu-bar-lv-2").toggle(500);
        });
    });
    $(".menu-bar-lv-2").each(function(){
        $(this).find(".span-lv-2").click(function(){
            $(this).toggleClass('rotate-menu');
            $(this).parent().find(".menu-bar-lv-3").toggle(500);
        });
    });
    $(".shadow-open-menu").click(function() {
        $('.menu-bar-mobile').fadeOut();
        $(".shadow-open-menu").fadeOut();
        $(".menu-btn-show").toggleClass("active");
    });
    $(".menu-btn-show").click(function() {
        $(this).toggleClass("active");
        $('.menu-bar-mobile').fadeToggle(500);
        $(".shadow-open-menu").fadeToggle(500);
    });
    $(".categories-menu").each(function(){
        $(this).find(".fa-minus").click(function(){
            $(this).toggleClass("fa-plus");
            $(this).parent().parent().find(".group-check-box").toggleClass("active");
        });
    });
    $('.scroll-top-btn').click(function () {
        $('html, body').animate({scrollTop: 0}, 800);
        return false;
    });
    $("#billtoship").click(function () {
        $('.steps-hoso').toggle(500);
    });
    (function ($) {
        $.fn.clickToggle = function (func1, func2) {
            var funcs = [func1, func2];
            this.data('toggleclicked', 0);
            this.click(function () {
                var data = $(this).data();
                var tc = data.toggleclicked;
                $.proxy(funcs[tc], this)();
                data.toggleclicked = (tc + 1) % 2;
            });
            return this;
        };
    }(jQuery));
    $(document).ready(function () {

        $('.dropdown-toggle').clickToggle(function () {
            $(this).next().css('display', 'block');
        }, function () {
            $(this).next().css('display', 'none');
        });
    });
    // end
    
</script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-150292657-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-150292657-1');
</script>

<script type="application/ld+json">
{
  "@context" : "http://schema.org",
  "@type" : "Organization",
  "name" : "máy xây dựng đức thắng",
 "url" : "https://mayxaydungducthang.vn",
 "sameAs" : [
   "https://twitter.com/example",
   "https://www.facebook.com/MayXayDung.DucThang",
   "https://www.instagram.com/example/?hl=en"
   ],
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "170A Thạch Bàn - Long Biên - Hà",
    "addressRegion": "Ha Noi",
    "postalCode": "100000",
    "addressCountry": "Viet Nam"
  }
}
</script>
</body>
</html>
<?php $this->endPage() ?>
