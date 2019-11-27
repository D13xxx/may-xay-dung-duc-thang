<?php

use common\models\query\ArticlesQuery;
use dosamigos\tinymce\TinyMce;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\web\View;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel common\models\query\ArticlesQuery */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Banner';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="page-content-wrap">
    <div class="row">
        <div class="col-md-12">
            <?= Html::a('Thêm mới', ['create'], ['class' => 'btn btn-primary']) ?>
            <br>
            <br>
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    [
                        'attribute' => 'image',
                        'format' => 'html',
                        'value' => function ($data) {
                            return Html::img(\Yii::$app->request->BaseUrl.'/upload/banner/'. $data['image'],
                                ['width' => '100px','max-height'=>'100px'],['class'=>'thum-nail']);
                        },
                    ],
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'template'=>'{update}{delete}',
                    ],
                ],
            ]); ?>
        </div>
    </div>
</div>
