<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CatProducts */

$this->title = Yii::t('backend', 'Thêm mới nhóm sản phẩm');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Cat Products'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cat-products-create">

    <?= $this->render('_form', [
        'model' => $model,
        'dataCat' => $dataCat,
    ]) ?>

</div>
