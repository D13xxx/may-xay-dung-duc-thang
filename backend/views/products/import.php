<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel common\models\query\PhongBanQuery */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Sản phẩm: Import Excel');
?>

<div class="col-md-12">
    <?php $form = ActiveForm::begin([
        'options' => ['enctype'=>'multipart/form-data']
    ]); ?>
		
			<div class="alert alert-warning">
				<strong>Lưu ý:</strong> Tệp tin excel để import vào hệ thống phải đúng định dạng hệ thống quy đinh.
				<p>Nếu chưa có vui lòng tải tệp tin mẫu bên dưới và điền dữ liệu để import</p>
				<p>
                    <?php echo Html::a('Tải tệp tin mẫu để import dữ liệu vào hệ thống','/upload/Mau/phong.xlsx')?>
				</p>
			</div>
		
		
        <div class="row">           
            <div class="form-group col-sm-9 col-sm-offset-1">
                <label class="control-label col-sm-3" style="text-align: right">File dữ liệu import:</label>
                <div class="col-sm-9">
                    <?= $form->field($model, 'fileExcel')->fileInput()->label('') ?>
                </div>
            </div>            
        </div>	
		<div class="row"> 
            <div class="form-group col-sm-9 col-sm-offset-1">
                <label class="control-label col-sm-3" style="text-align: right"></label>
                <div class="col-sm-9">
                    <?= Html::submitButton('<i class="glyphicon glyphicon-import"></i>'.'Import', ['class' => 'btn btn-primary']) ?>
					<?= Html::a('<i class="glyphicon glyphicon-share-alt"></i>'. Yii::t('backend', 'Quay lại'),['index'], ['class' => 'btn btn-default']) ?>
                </div>
            </div>
        </div>
   

    <?php ActiveForm::end(); ?>
</div>
