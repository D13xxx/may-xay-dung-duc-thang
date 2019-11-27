<?php

namespace frontend\controllers;

use common\models\Banner;
use common\models\Brand;
use common\models\CatInsurrances;
use common\models\CatInsurrancesQuestion;
use common\models\CatProducts;
use common\models\DetailOrder;
use common\models\OrderProducts;
use common\models\Parter;
use common\models\Products;
use common\models\QuestionInsurrances;
use frontend\models\Cart;
use Yii;
use common\models\Articles;
use common\models\query\ArticlesQuery;
use yii\base\DynamicModel;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\Pagination;
/**
 * ArticlesController implements the CRUD actions for Articles model.
 */
class ProductsController extends Controller
{
    public $enableCsrfValidation = false;
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }
    /**
     * Lists all Articles models.
     * @return mixed
     */
    public function actionSearchSuggest(){
        if (Yii::$app->request->post()){
            $name = Yii::$app->request->post('name');
            $data =  Products::find()->where(['like', 'full_name', $name])
                ->orWhere(['like', 'code', $name])
                ->orWhere(['like', 'price', $name])
                ->orWhere(['like', 'slug', $name])->all();
            return $data;
        }
    }
    public function actionSearch($key){
        $query = Products::find()->where(['like', 'full_name', $key])
            ->orWhere(['like', 'code', $key])
            ->orWhere(['like', 'price', $key])
            ->orWhere(['like', 'slug', $key]);
        $countQuery = clone $query;
        $pages = new Pagination(['pageSize' => 25,'totalCount' => $countQuery->count()]);
        $models = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        return $this->render('search',[
            'data'=>$models,
            'key'=>$key,
            'pages'=>$pages,
        ]);
    }
    public function actionView($slug){
        $model = Products::find()->where(['slug'=>$slug])->one();

        $query = Products::find()->where(['cat_id'=>$model->cat_id]);
        $countQuery = clone $query;
        $pages = new Pagination(['pageSize' => 25,'totalCount' => $countQuery->count()]);
        $models = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        return $this->render('view',[
            'model'=>$model,
            'models'=>$models,
            'pages'=>$pages,
        ]);
    }
    public function actionListProductsCat($slug=null,$sort=null,$code = null,$priceToPrice= null){

        $brandName = Brand::find()->where(['code'=>$code])->one();
        $cat = CatProducts::find()->where(['slug'=>$slug])->one();
        if (!empty($sort)){
            if ($sort == 'old'){
                $query = Products::find()->where(['cat_id'=>$cat->id])->orderBy(['id'=>SORT_DESC]);
            }elseif($sort == 'new'){
                $query = Products::find()->where(['cat_id'=>$cat->id])->orderBy(['price'=>SORT_ASC]);
            }elseif ($sort == 'price-desc'){
                $query = Products::find()->where(['cat_id'=>$cat->id])->orderBy(['price'=>SORT_DESC]);
            }elseif ($sort == 'price-asc'){
                $query = Products::find()->where(['cat_id'=>$cat->id])->orderBy(['price'=>SORT_ASC]);
            }
        }
        elseif (!empty($brandName)){
            $query = Products::find()->andWhere(['brand'=>$brandName->id])->andWhere(['cat_id'=>$cat->id]);
        }elseif (!empty($priceToPrice)){
            if ($priceToPrice == 'duoi-1-trieu'){
                $query = Products::find()->where(['cat_id'=>$cat->id])->andWhere(['BETWEEN', 'price', "0", "1000000" ]);
            }elseif($priceToPrice == 'tu-1-trieu-den-3-trieu'){
                $query = Products::find()->where(['cat_id'=>$cat->id])->andWhere(['BETWEEN', 'price', "1000000", "3000000" ]);
            }elseif ($priceToPrice == 'tu-3-trieu-den-5-trieu'){
                $query = Products::find()->where(['cat_id'=>$cat->id])->andWhere(['BETWEEN', 'price', "3000000", "5000000" ]);
            }elseif ($priceToPrice == 'tu-5-trieu-den-10-trieu'){
                $query = Products::find()->where(['cat_id'=>$cat->id])->andWhere(['BETWEEN', 'price', "5000000", "10000000" ]);
            }elseif ($priceToPrice == 'tu-10-trieu-den-15-trieu'){
                $query = Products::find()->where(['cat_id'=>$cat->id])->andWhere(['BETWEEN', 'price', "10000000", "1500000" ]);
            }elseif ($priceToPrice == 'tu-15-trieu-den-20-trieu'){
                $query = Products::find()->where(['cat_id'=>$cat->id])->andWhere(['BETWEEN', 'price', "15000000", "20000000" ]);
            }elseif ($priceToPrice == 'tren-20-trieu'){
                $query = Products::find()->where(['cat_id'=>$cat->id])->andWhere(['>=', 'BETWEEN',"20000000" ]);
            }
        }
        else{
            $query = Products::find()->where(['cat_id'=>$cat->id]);
        }

        $countQuery = clone $query;
        $pages = new Pagination(['pageSize' => 25,'totalCount' => $countQuery->count()]);
        $models = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();
        $brands = Brand::find()->all();

        return $this->render('list-products-cat',[
            'models'=>$models,
            'pages' => $pages,
            'cat' => $cat,
            'brands' => $brands
        ]);
    }
    public function actionListProductsType($type,$sort= null){
        if (!empty($sort)){
            if ($sort == 'old'){
                $query = Products::find()->where(['type'=>$type])->orderBy(['id'=>SORT_DESC]);
            }elseif($sort == 'new'){
                $query = Products::find()->where(['type'=>$type])->orderBy(['price'=>SORT_ASC]);
            }elseif ($sort == 'price-desc'){
                $query = Products::find()->where(['type'=>$type])->orderBy(['price'=>SORT_DESC]);
            }elseif ($sort == 'price-asc'){
                $query = Products::find()->where(['type'=>$type])->orderBy(['price'=>SORT_ASC]);
            }
        }else{
            $query = Products::find()->where(['type'=>$type]);
        }
        $countQuery = clone $query;
        $pages = new Pagination(['pageSize' => 25,'totalCount' => $countQuery->count()]);
        $models = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();
        return $this->render('list-products-type',[
            'models'=>$models,
            'pages' => $pages
        ]);
    }

    public function actionAddCartAjax(){
        $session = Yii::$app->session;
        $pid = Yii::$app->request->post('pid');
        if(!empty($pid)){
            $infoPro = Products::find()->where(['id'=>$pid])->one();
            $fullName = $infoPro->full_name;
            $img = $infoPro->avatar;
            $price = $infoPro->price;
            $amount = 1;
        }

        $data = Yii::$app->session->get('cart');

        if($pid != 0){
            if(isset($data[$pid])){
                $amount =  $data[$pid]["amount"] +1;
            }
            $data[$pid]["amount"] = $amount;
            $data[$pid]["fullName"] = $fullName;
            $data[$pid]["price"] = $price;
            $data[$pid]["img"] = $img;
            $data[$pid]["id"] = $pid;
            Yii::$app->session->set('cart',$data);

        }

        if($data != null){
            foreach ($data as $key=>$value){
                $arr_id[] =$key;
            }

        }else{
            $arr_id = array();
        }
        Yii::$app->session->set('cart',$data);
    }

    public function actionUpdateCartPro(){
        $pid = Yii::$app->request->post('pid');
        $amount = Yii::$app->request->post('amount');

        $data = Yii::$app->session->get('cart');

        $data[$pid]["amount"] = $amount;

        Yii::$app->session->set('cart',$data);


    }
    public function actionAddCartPro(){

        $model = new OrderProducts();
        $session = Yii::$app->session;
        $pid = Yii::$app->request->post('pid');
        if(!empty($pid)){
            $infoPro = Products::find()->where(['id'=>$pid])->one();
            $fullName = $infoPro->full_name;
            $img = $infoPro->avatar;
            $price = $infoPro->price;
            $amount = 1;
        }

        $data = Yii::$app->session->get('cart');

        if($pid != 0){
            if(isset($data[$pid])){
                $amount =  $data[$pid]["amount"] +1;
            }
            $data[$pid]["amount"] = $amount;
            $data[$pid]["fullName"] = $fullName;
            $data[$pid]["price"] = $price;
            $data[$pid]["img"] = $img;
            $data[$pid]["id"] = $pid;
            Yii::$app->session->set('cart',$data);

        }

        if($data != null){
            foreach ($data as $key=>$value){
                $arr_id[] =$key;
            }

        }else{
            $arr_id = array();
        }

        if ($model->load(Yii::$app->request->post())) {

            $model->created_at = strtotime('now');
            $model->total =str_replace(",","",$model->total);

            if ($model->save()){
                foreach ($data as $cart){
                    $modelDetail = new DetailOrder();
                    $modelDetail->order_product_id = $model->id;
                    $modelDetail->product_id = $cart["id"];
                    $modelDetail->amount = $cart["amount"];
                    $modelDetail->save();
                }
                Yii::$app->session->destroy();
                Yii::$app->session->setFlash('success', Yii::t('app','Đặt hàng thành công.'));
                return $this->refresh();
            }
        }

        return $this->render('gio-hang',[
            'model'=>$model,
            'data'=>$data
        ]);

    }
    public function actionDestroyPro(){
        if (Yii::$app->request->isAjax){
            $pid = Yii::$app->request->post('pid');
            $session = Yii::$app->session;

            $data = $session['cart'];

            unset($data[$pid]);

            Yii::$app->session->set('cart',$data);

        }
    }
    public function actionDestroy(){
        $model = new OrderProducts();
        $session = Yii::$app->session;
        unset($session["cart"]);

        return $this->render('gio-hang',[
            'model'=>$model
        ]);
    }
    protected function findModel($id)
    {
        if (($model = Products::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
