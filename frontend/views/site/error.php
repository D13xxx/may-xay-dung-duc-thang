<?php

use yii\widgets\LinkPager;
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
<style>
    .productsItemType{
        clear: inherit !important;
    }
    .pagination {
        display: flex !important; 
        justify-content: center !important;
    }
</style>
<?= $this->render('/layouts/header-center')?>

<?= $this->render('/layouts/header-bottom')?>

<?= $this->render('/layouts/breadcrumb')?>

<section id="main-content">
    <div class="container">
        <h1 class="page-title text-center">Không có kết quả như bạn mong muốn. Vui lòng quay lại trang chủ.</h1>
    </div>
</section>