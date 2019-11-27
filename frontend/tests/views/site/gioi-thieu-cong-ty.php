<?= $this->render('/layouts/header-center')?>

<?= $this->render('/layouts/header-bottom')?>

<?= $this->render('/layouts/breadcrumb')?>

<section id="main-content">
    <div class="container">
        <div class="content-left">
            <div class="box-content">
                <h1 class="page-title">Giới thiệu về Điện máy Đức Thắng</h1>
                <div class="zing-content">
                    <?= $model->gioi_thieu_cong_ty ? ucwords($model->gioi_thieu_cong_ty) : ''?>
                </div>
            </div>
        </div>
        <!-- slidebar-->
        <?= $this->render('sidebar')?>

    </div>
</section>