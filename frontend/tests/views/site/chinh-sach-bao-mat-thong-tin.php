<?= $this->render('/layouts/header-center')?>

<?= $this->render('/layouts/header-bottom')?>

<?= $this->render('/layouts/breadcrumb')?>

<section id="main-content">
    <div class="container">
        <div class="content-left">
            <div class="box-content">
                <h1 class="page-title">Chính sách bảo mật thông tin</h1>
                <div class="zing-content">
                    <?= $model->chinh_sach_bao_mat_thong_tin ? ucwords($model->chinh_sach_bao_mat_thong_tin) : '' ?>
                </div>
            </div>
        </div>
        <?= $this->render('sidebar')?>

    </div>
</section>