<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\SpEmploy */

$this->title = Yii::t('backend', 'Cập nhật dịch vụ chăm sóc khách hàng');
?>
<div class="sp-employ-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
