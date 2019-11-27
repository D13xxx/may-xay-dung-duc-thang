<?php
use yii\helpers\Url;
$frontend = \backend\assets\FrontendAsset::register($this);
?>

<div class="col-md-12">
    <img src="<?= $frontend->baseUrl.'/offset/'.$fileName;?>" alt="" class="img-thumbnail" style="width: 100%">
</div>