<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CatProducts */

$this->title = Yii::t('backend', 'Cập nhật thông tin nhóm sản phẩm');
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="cat-products-update">

    <?= $this->render('_form', [
        'model' => $model,
        'dataCat' => $dataCat,
    ]) ?>

</div>
