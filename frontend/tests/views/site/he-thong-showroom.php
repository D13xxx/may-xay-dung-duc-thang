<?= $this->render('/layouts/header-center')?>

<?= $this->render('/layouts/header-bottom')?>

<?= $this->render('/layouts/breadcrumb')?>

<section id="main-content">
    <div class="container">
        <div class="content-left">
            <div class="box-content">
                <h1 class="page-title">Hệ thống Showroom</h1>
                <div class="zing-content">
                    <?= $model->showroom ? ucwords($model->showroom) : ''?>
                    <div class="map" style="width: 100%;">
                        <?= $model->iframe ? $model->iframe : ''?>
                    </div>

                </div>
            </div>
        </div>
        <?= $this->render('sidebar')?>

    </div>
</section>