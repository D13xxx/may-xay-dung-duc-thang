<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\DetailCompany */

$this->title = Yii::t('backend', 'Cập nhật công ty');
?>
<div class="detail-company-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
