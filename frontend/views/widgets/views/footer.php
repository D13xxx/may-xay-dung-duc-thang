 <?php
use yii\captcha\Captcha;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use app\models\RegisterForm;

$model = new RegisterForm();
 ?>
 <footer>
      <div class="container">
        <div class="row">
          <div class="col-son-footer-1">
            <div class="image">
            	 <?php if(isset($logo[0])){ ?>
              <img src="<?php echo \Yii::$app->params['mediaUrl'].'uploads/images/logothuonghieufooter.png' ?>" alt="footer-logo.png" class="img-fluid">
               <?php } ?>
            </div>
          </div>
<!--           <div class="col-son-footer-2">
            <p>Trang đăng ký dịch vụ 4G của VinaPhone
              <br> Chi tiết vui lòng liên hệ: 18001091
              
          </div> -->
          <!-- <div class="col-son-footer-3">
            <div class="input-and-follow">
              <div class="input">
                <input type="search" name="" id="" placeholder="Nhập nội dung tìm kiếm" class="form-control">
                <i class="fa fa-search fa-lg" aria-hidden="true"></i>
              </div>
              <div class="follow clearfix">
                <span>Theo dõi chúng tôi</span>
                <ul>
                  <li>
                    <a href="https://www.facebook.com/dichvu4gvinaphone" target="_blank" class="fa fa-facebook" aria-hidden="true">
                    </a>
                  </li>
                  <li>
                    <a href="" class="fa fa-google-plus" aria-hidden="true">
                    </a>
                  </li>
                  <li>
                    <a href="" class="fa fa-twitter" aria-hidden="true">
                    </a>
                  </li>
                  <li>
                    <a href="https://www.youtube.com/channel/UCf_VMBDcYwAB39ABRkNBIAg" target="_blank" class="fa fa-youtube-play" aria-hidden="true">
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div> -->
        </div>
      </div>
    </footer>



<style type="text/css">
  .modal-header{
    padding: 10px !important;
  }
  .info{
    line-height: 1.3em;
    font-size: 14px;
  }
  .dangky{
    background: #00aeef;
    color: #fff;
    border-radius: 5px;
    padding: 8px 20px;
    margin: 5px;
    text-decoration: none;
  }
  .dangky:hover{
    text-decoration: none;
    color: #fff;
  }
  .huybo{
    background: #ddd;
    color: #000;
    border-radius: 5px;
    padding: 8px 20px;
    margin: 5px;
    text-decoration: none;
  }
  .huybo:hover{
    text-decoration: none;
    color: #000;
  }
  .wrapbutton{
    margin-top: 10px;
  }
  .modal .form-control{
    padding: 3px 10px !important;
    margin-top: 10px;
  }
  #w1{
    margin-top: 0;
  }
</style>

  <div class="modal" tabindex="-1" role="dialog" id="modal-register">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">5gvinaphonevn.com
          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <!-- <span aria-hidden="true">&times;</span> -->
          </button>
        </div>
        <div class="modal-body">
            <p class="info" id="info">Vui lòng nhập thông tin xác nhận mua gói cước MIMAX90 (+5GB lưu lượng) với giá 90.000 đồng, sử dụng trong 30 ngày</p>

            <?php $form = ActiveForm::begin([
                'enableClientValidation' => false,
                'enableAjaxValidation' => false,
                 'validateOnChange'=>false,
                'class'=>"register-form",
                'action' => ['/valid'],
            ]); ?>

            <?= $form->field($model, 'phone')->textInput(['id'=>'phone','autofocus' => true,'placeholder'=>'Số điện thoại'])->label(false) ?>

           
            <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                    'template' => '<div class="row" ><div class="col-6">{input}</div><div class="col-6">{image}</div></div>',

                ])->label(false) ?>


            <?= $form->field($model, 'vasid')->hiddenInput(['id'=>'vasid'])->label(false) ?>
            <?= $form->field($model, 'vascode')->hiddenInput(['id'=>'vascode'])->label(false) ?>
            <?= $form->field($model, 'data')->hiddenInput(['id'=>'data'])->label(false) ?>
            <?= $form->field($model, 'price')->hiddenInput(['id'=>'price'])->label(false) ?>

            <?=yii\helpers\Html::hiddenInput(Yii::$app->request->csrfParam, Yii::$app->request->csrfToken)?>
    
            <p id="error-mes" style="color: red; "></p>
            <div id="loading" style="display: none;"><img src="/images/loading.gif" width="30px" height="30px" style="display: block;margin: 0 auto;" /></div>
            <div class="row justify-content-center wrapbutton">
                <a href="#" class="dangky btndangky">Đăng Ký</a>
                <a  onclick="closeModal()" href="javascript:void(0);" class="huybo" >Hủy Bỏ </a>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
      </div>
    </div>
  </div>


  <div class="modal" tabindex="-1" role="dialog" id="modal-return">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">5gvinaphonevn.com
          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <!-- <span aria-hidden="true">&times;</span> -->
          </button>
        </div>
        <div class="modal-body">
            <div id="text-result" style="line-height: 1.3em">
              
            </div>

            <div class="row justify-content-center wrapbutton">
                <a  id="close" onclick="closeModalReturn()" href="javascript:void(0);" class="huybo" >Đóng</a>
            </div>

        </div>
      </div>
    </div>
  </div>



