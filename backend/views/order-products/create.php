<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Brand */

$this->title = Yii::t('backend', 'Thêm mới đơn hàng');
?>
<div class="brand-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
