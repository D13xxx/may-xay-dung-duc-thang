<?= $this->render('/layouts/header-center')?>

<?= $this->render('/layouts/header-bottom')?>

<?= $this->render('/layouts/breadcrumb')?>

<section id="main-content">
    <div class="container">
        <div class="content-left">
            <div class="box-content">
                <h1 class="page-title">Chinh sách giao hàng</h1>
                <div class="zing-content">
                    <?= $model->chinh_sach_giao_hang ? ucwords($model->chinh_sach_giao_hang) : '' ?>
                </div>
            </div>
        </div>
        <?= $this->render('sidebar')?>

    </div>
</section>