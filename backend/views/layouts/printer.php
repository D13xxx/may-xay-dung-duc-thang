<?php /* @var $this Controller */ 
use backend\assets\PrinterAsset;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="vi" lang="vi">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="vi" />	
	<!--link rel="stylesheet" type="text/css" href="<?php echo Yii::$app->request->baseUrl; ?>/css/printreport.css" /-->		
	<?php // $this->registerJsFile(Yii::$app->request->baseUrl.'/js/printreport.js');?>
	<?php $this->head() ?>
	<?php //Yii::app()->bootstrap->register(); ?>		
	<style type="text/css">
	   table.gridPrinttable {
		border-collapse: separate;
		border :  0px solid #000000;
		border-spacing: 0;
		font-size: 12pt;
		width: 100%;
		border-color:  #000000 ;
		border-left: 1px solid;
		}
		table.gridPrinttable tr {
			border-color:  #000000 ;
			border-style: none ;
			border-width: 0 ;
			page-break-inside:avoid; page-break-after:auto
		}
		table.gridPrinttable td {
			border-color:  #000000 ;
			border-right: 1px solid;
			border-bottom:1px solid ;
			padding:4px;
		}

		table.gridPrinttable th {
			border-color:  #000000 ;
			border-right: 1px solid;
			border-top:1px solid ;
			border-bottom:1px solid ;
			padding:5px;
			text-align:center;
		}
		table.gridPrinttable tfoot td {		
			border: 0px solid #000000 ;
		}
		
	</style>
</head>

<?php echo Html::beginTag('body');?>
<?php $this->beginBody() ?>
<div id="page">
	<!--Body content-->
		<?php echo $content; ?>

		<div class="clear"></div>
</div><!-- page -->
<script>
	function printContent(el){
	var restorepage = $('body').html();
	var printcontent = $('#' + el).clone();
	$('body').empty().html(printcontent);
	window.print();
	$('body').html(restorepage);
	}
</script>
<?php $this->endBody() ?>
<?php echo Html::endTag('body') ?>
</html>
<?php $this->endPage() ?>