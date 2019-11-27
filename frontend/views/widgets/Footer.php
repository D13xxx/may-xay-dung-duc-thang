<?php
namespace app\views\widgets;
use Yii;
use yii\base\Widget;
use yii\helpers\Html;
use app\models\Advertisement;


class Footer extends Widget{

	public function init(){
		parent::init();		
	}
	
	public function run(){   
		$advertisement = new Advertisement();
        $logo = $advertisement->getData(4,Yii::$app->session['cat']);
        return $this->render('footer',['logo'=>$logo]);
	}
}
?>