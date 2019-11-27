<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\InfoProfile */

$this->title = 'Create Info Profile';
$this->params['breadcrumbs'][] = ['label' => 'Info Profiles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="info-profile-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
