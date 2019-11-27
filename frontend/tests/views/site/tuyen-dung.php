<?= $this->render('/layouts/header-center')?>

<?= $this->render('/layouts/header-bottom')?>

<?= $this->render('/layouts/breadcrumb')?>

<section id="main-content">
    <div class="container">
        <div class="content-left">
            <div class="box-content">
                <h1 class="page-title">Tuyển dụng</h1>
                <div class="zing-content">
                    <?= $model->tuyen_dung ? ucwords($model->tuyen_dung) : '' ?>
                </div>
            </div>
        </div>
        <!-- Tuyeen dung-->
        <?= $this->render('sidebar')?>
    </div>
</section>