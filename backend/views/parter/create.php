<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Parter */

$this->title = Yii::t('backend', 'Thêm mới đối tác');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Parters'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="parter-create">
    <div class="content-frame-top">
        <div class="page-title">
            <h2><span class="fa fa-inbox"></span> <?= $this->title?> </h2>
        </div>
    </div>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
