<?php

use yii\helpers\Html;
use kartik\widgets\FileInput;

/* @var $this yii\web\View */
/* @var $model common\models\InfoProfile */
?>
<div class="info-profile-update">
    <?= $this->render('_form', [
        'model' => $model,
        'auths' => $auths,
    ]) ?>

</div>
