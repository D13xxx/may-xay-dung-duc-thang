<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\SpEmploy */

$this->title = Yii::t('backend', 'Create Sp Employ');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Sp Employs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sp-employ-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
