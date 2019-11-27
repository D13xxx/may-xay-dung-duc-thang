<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\query\SpEmployQuery */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sp-employ-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'huong_dan_thanh_toan') ?>

    <?= $form->field($model, 'chinh_sach_giao_hang') ?>

    <?= $form->field($model, 'chinh_sach_hoi_tra') ?>

    <?= $form->field($model, 'chinh_sach_bao_mat_thong_tin') ?>

    <?= $form->field($model, 'id') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('backend', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('backend', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
