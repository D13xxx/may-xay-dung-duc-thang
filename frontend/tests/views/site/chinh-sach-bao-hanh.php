<?= $this->render('/layouts/header-center')?>

<?= $this->render('/layouts/header-bottom')?>

<?= $this->render('/layouts/breadcrumb')?>

<section id="main-content">
    <div class="container">
        <div class="content-left">
            <div class="box-content">
                <h1 class="page-title">Chính sách bảo hành</h1>
               <?= $model->chinh_sach_bao_hanh ? ucwords($model->chinh_sach_bao_hanh) : '' ?>
            </div>
        </div>
        <?= $this->render('sidebar')?>

    </div>
</section>