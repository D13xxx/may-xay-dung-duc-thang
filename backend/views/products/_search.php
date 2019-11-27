<?php

use common\models\query\ArticlesQuery;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\query\ArticlesQuery */
/* @var $form yii\widgets\ActiveForm */
?>
<style>
    a.btn.btn-success.btn-block {
        margin-top: 21px !important;
    }
</style>

            <?php $form = ActiveForm::begin([
                'action' => ['index'],
                'method' => 'get',
            ]); ?>
            <div class="col-md-2">
                <?= $form->field($model, 'code') ?>
            </div>
            <div class="col-md-2">
                <?= $form->field($model, 'full_name') ?>
            </div>
            <div class="col-md-2">
                <?php
                $cat=\common\models\CatProducts::find()->all();
                $listCat=\yii\helpers\ArrayHelper::map($cat,'id','name');
                ?>
                <?= $form->field($model, 'cat_id')->widget(\kartik\select2\Select2::className(),[
                    'data'=>$listCat,
                    'options'=>[
                        'prompt'=>Yii::t('backend','Nhóm sản phẩm....'),
                    ],
                    'pluginOptions'=>['allowClear'=>true]
                ]) ?>
            </div>
            <div class="col-md-2">

                <?= $form->field($model, 'status')->widget(\kartik\select2\Select2::className(),[
                    'data'=>\common\models\Products::TT_ARRAY(),
                    'options'=>[
                        'prompt'=>Yii::t('backend','Trạng thái....'),
                    ],
                    'pluginOptions'=>['allowClear'=>true]
                ]) ?>
            </div>
            <div class="col-md-2" style="padding-top: 4px;">
                <br>
                <?= Html::submitButton('Tìm kiếm', ['class' => 'btn btn-primary btn-block btn-routed']) ?>
            </div>

            <?php ActiveForm::end(); ?>
            <div class="col-md-2">
                <?= Html::a('Thêm mới','create',['class'=>'btn btn-success btn-block'])?>
            </div>
