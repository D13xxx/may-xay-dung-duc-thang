<?= $this->render('/layouts/header-center')?>

<?= $this->render('/layouts/header-bottom')?>

<?= $this->render('/layouts/breadcrumb')?>

<section id="main-content">
    <div class="container">
        <div class="content-left">
            <div class="box-content">
                <h1 class="page-title">Chính sách đổi trả</h1>
                <div class="zing-content">
                    <?= $model->chinh_sach_hoi_tra ? ucwords($model->chinh_sach_hoi_tra) : '' ?>
                </div>
            </div>
        </div>
        <?= $this->render('sidebar')?>

    </div>
</section>