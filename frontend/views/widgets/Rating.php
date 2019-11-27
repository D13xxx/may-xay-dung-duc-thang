<?php
namespace app\views\widgets;
use Yii;
use yii\base\Widget;
use yii\helpers\Html;
use app\models\Service;


class Rating extends Widget{
	public $table;
	public $post_id;
	public $href;
	public $images;
	public $name;
	public $description;

	public function init(){
		parent::init();		
	}

	
	public function run(){  
		// 'COUNT(star)', 'SUM(star)',
		$count = (new \yii\db\Query())
		->select('COUNT(client_ip)')->from('rating')
		->where(['table'=>$this->table, 'post_id'=>$this->post_id])->all(); 
		
		$starNumber = (new \yii\db\Query())
		->select('SUM(star)')->from('rating')
		->where(['table'=>$this->table, 'post_id'=>$this->post_id])->all(); 

		// $starNumber = number_format((float)$starNumber[0]["SUM(star)"], 1, '.', '');

		// $realStar = ($starNumber*5) / $totalStar;
		// $realStar = number_format( (float) $realStar, 1, '.', '');

		return $this->render('Rating', 
			[
				'table'=>$this->table,
				'post_id' => $this->post_id, 
				'href' => $this->href, 
				'images' => $this->images, 
				'name' => $this->name,
				'description' => $this->description,
				'count'=>$count, 
				'starNumber'=>$starNumber, 
				// 'realStar'=>$realStar, 
			]);
	}
}

// https://codepen.io/jamesbarnett/pen/vlpkh
// https://www.script-tutorials.com/how-to-create-own-voting-system/
?>