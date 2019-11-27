<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\DetailCompany */

$this->title = Yii::t('backend', 'Create Detail Company');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Detail Companies'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detail-company-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
