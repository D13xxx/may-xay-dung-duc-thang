<?php 
$this->title = 'Máy Xây Dựng - Giao Hàng Nhanh - Thiết Bị Xây Dựng Đức Thắng';
\Yii::$app->view->registerMetaTag([
    'name' => 'title',
    'content' => 'Máy Xây Dựng - Giao Hàng Nhanh - Thiết Bị Xây Dựng Đức Thắng',
  ]);
  \Yii::$app->view->registerMetaTag([
    'name' => 'description',
    'content' => 'Công ty CP Cơ khí và Dịch vụ Đức Thắng chuyên cung cấp và phân phối linh kiện, các sản phẩm điện máy chính hãng, đảm bảo giá rẻ nhất thị trường.',
  ]);
  \Yii::$app->view->registerMetaTag([
    'property' => 'og:title',
    'content' => 'Máy Xây Dựng - Giao Hàng Nhanh - Thiết Bị Xây Dựng Đức Thắng',
  ]);
  \Yii::$app->view->registerMetaTag([
    'property' => 'og:description',
    'content' => 'Công ty CP Cơ khí và Dịch vụ Đức Thắng chuyên cung cấp và phân phối linh kiện, các sản phẩm điện máy chính hãng, đảm bảo giá rẻ nhất thị trường.',
  ]);
\Yii::$app->view->registerMetaTag([
    'property' => 'og:image',
    'content' => 'http://cmsdm.hellomedia.vn/upload/banner/1569750984-tải xuống.jpg',
  ]);
?>

<?= $this->render('/layouts/header-center')?>

<?= $this->render('/layouts/header-bottom')?>

<?= $this->render('/layouts/breadcrumb')?>

<section id="main-content">
    <div class="container">
        <div class="content-left">
            <div class="box-content">
                <h1 class="page-title">Hướng dẫn thanh toán</h1>
                <div class="zing-content">
                 <?= $model->huong_dan_thanh_toan ? $model->huong_dan_thanh_toan : '' ?>
                </div>
            </div>
        </div>
        <?= $this->render('sidebar')?>

    </div>
</section>