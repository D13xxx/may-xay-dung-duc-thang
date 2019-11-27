<?php

namespace backend\controllers;

use common\models\DetailOrder;
use Yii;
use common\models\OrderProducts;
use common\models\Products;
use common\models\query\DetailOrderQuery;
use common\models\query\OrderProductsQuery;
use common\models\query\ProductsQuery;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * OrderProductsController implements the CRUD actions for OrderProducts model.
 */
class OrderProductsController extends Controller
{
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
    public function actionCreate(){
        $model = new OrderProducts();
        if ($model->load(Yii::$app->request->post())) {
            $thanhToan = Yii::$app->request->post('thanhToan');
            $model->type_payment = $thanhToan;
            $model->status = OrderProducts::TT_DATHANG;
            $model->created_at = strtotime('now');
            $model->user_update = Yii::$app->user->id;
            $model->total =0 ;
            if ($model->save()){
                Yii::$app->session->setFlash('success', Yii::t('app','Thêm mới thành công.'));
                return $this->redirect(['view','id'=>$model->id]);
            }
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionThemMoiSanPham($orderProId){

        $this->layout = '@app/views/layouts/base';
        $danhSachSanPhams = DetailOrder::find()->select('product_id')->where(['order_product_id' => $orderProId])
            ->asArray()->column();
        $searchModel = new ProductsQuery();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere(['not in','products.id',$danhSachSanPhams]);
        return $this->render('them-moi-san-pham',[
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    } 

    public function actionUpSanPham(){
        if(Yii::$app->request->isAjax){
            $keyIds = Yii::$app->request->post('keyIds');
            $orderProId = Yii::$app->request->post('orderProId');
            foreach($keyIds as $item){
                $pro = Products::findOne($item);
                $model = new DetailOrder();
                $model->product_id = $item;
                $model->order_product_id = $orderProId;
                $model->amount = 1;
                $model->price_pro = $pro->price;
                $donGia = $pro->price;
                $model->don_gia = $donGia;
                $model->save();
            }
        }
    }

    public function actionDelSanPham(){
        if(Yii::$app->request->isAjax){
            $dataId = Yii::$app->request->post('dataId');
            $orderProId = Yii::$app->request->post('orderProId');
            
            $model= DetailOrder::find()->where(['product_id'=>$dataId])->andWhere(['order_product_id'=>$orderProId])->one();
            $model->delete();
        }
    }

    public function actionUpdateSoLuong(){
        if(Yii::$app->request->isAjax){
            $dataId = Yii::$app->request->post('dataId');
            $orderProId = Yii::$app->request->post('orderProId');
            $amount = Yii::$app->request->post('amount');
            $model= DetailOrder::find()->where(['product_id'=>$dataId])->andWhere(['order_product_id'=>$orderProId])->one();
            $model->amount = $amount;
            $donGia = $model->don_gia;
            $model->price_pro = $amount*$donGia;
            $model->save();
        }
    }

    public function actionIndex(){
        $orderProducts = OrderProducts::find()->orderBy(['id'=>SORT_DESC])->all();

        
        return $this->render('index', [
            'orderProducts' => $orderProducts,
        ]);
    }

    public function actionView($id){
        $detaiOrders = DetailOrder::find()->where(['order_product_id'=>$id])->all();
        $searchModel = new DetailOrderQuery();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->where(['order_product_id'=>$id]);
        $arayPricePro = DetailOrder::find()->where(['order_product_id'=>$id])->sum('price_pro');
      
        return $this->render('view', [
            'model' => $this->findModel($id),
            'detaiOrders' => $detaiOrders,
            'searchModel'=>$searchModel,
            'dataProvider'=>$dataProvider,
            'arayPricePro'=>$arayPricePro
        ]);
    }

    public function actionDelete($id){
        $this->findModel($id)->delete();
        $x = Yii::$app->db->createCommand("
            DELETE FROM detail_order 
            WHERE 	order_product_id = '$id' 
        ")->execute();
        return $this->redirect(['index']);
    }

    public function actionXacThucGiaoHang(){
        if(Yii::$app->request->isAjax){
            $dataId = Yii::$app->request->post('dataId');
            $txtTotal = Yii::$app->request->post('txtTotal');

            $orderProduct = OrderProducts::findOne($dataId);
            $orderProduct->status = OrderProducts::TT_DAGIAOHANG;
            $orderProduct->user_update = Yii::$app->user->id;
            $orderProduct->total = $txtTotal;
            $orderProduct->save();
            $orderProduct->refresh();
        }
    }

    public function actionHuyDonHang(){
        if(Yii::$app->request->isAjax){
            $dataId = Yii::$app->request->post('dataId');
            $orderProduct = OrderProducts::findOne($dataId);
            $orderProduct->status = OrderProducts::TT_HUY;
            $orderProduct->user_update = Yii::$app->user->id;
            $orderProduct->save();
            $orderProduct->refresh();
        }
    }

    public function actionXoaSanPham(){

        if(Yii::$app->request->isAjax){
            $dataId = Yii::$app->request->post('dataId');
            $orderProId = Yii::$app->request->post('orderProId');

            $model  = DetailOrder::find()->where(['order_product_id'=>$orderProId])->andWhere(['product_id'=>$dataId])->one();
            $model->delete();
            $model->refresh();
        }
    }

    public function actionThongKe(){
        if(Yii::$app->request->isAjax){
            $startDate = Yii::$app->request->post('startDate');
            $endDate = Yii::$app->request->post('endDate');
            echo $endDate + $startDate;
            die();
        }
        // $startDate = Yii::$app->request->post('startDate');
        // $endDate = Yii::$app->request->post('endDate');
        // echo $endDate + $startDate;
        // die();
        // $ngayBatDau = Yii::$app->request->get('ngayBatDau');
        // $ngayKetThuc = Yii::$app->request->get('ngayKetThuc');
        // if($ngayBatDau != null && $ngayKetThuc != null ){
        //     $donHangs = OrderProducts::find()->where(['between', 'date', $ngayBatDau, $ngayKetThuc])->all(); 
        //     // tong tiền hóa đơn trong khoảng đã thanh khoản
        //     $arayTotalSuccess = OrderProducts::find()->where(['between', 'date', $ngayBatDau, $ngayKetThuc])->andWhere(['status'=>OrderProducts::TT_DAGIAOHANG])->sum('total');
        //     // Tổng số tiền hóa dơn đã hủy
        //     $arayTotalCancel = OrderProducts::find()->where(['between', 'date', $ngayBatDau, $ngayKetThuc])->andWhere(['status'=>OrderProducts::TT_HUY])->sum('total');
        // }else{
        //     $donHangs = OrderProducts::find()->all(); 
        //     // tong tiền hóa đơn trong khoảng đã thanh khoản
        //     $arayTotalSuccess = OrderProducts::find()->where(['status'=>OrderProducts::TT_DAGIAOHANG])->sum('total');
        //     // Tổng số tiền hóa dơn đã hủy
        //     $arayTotalCancel = OrderProducts::find()->where(['status'=>OrderProducts::TT_HUY])->sum('total');
        // }
        return $this->render('thong-ke', [
            // 'donHangs' => $donHangs,
            // 'arayTotalSuccess' => $arayTotalSuccess,
            // 'arayTotalCancel' => $arayTotalCancel
            
        ]);
    }

    public function actionInHoaDon($orderId){
        $this->layout = '@app/views/layouts/printer';
        $detaiOrders = DetailOrder::find()->where(['order_product_id'=>$orderId])->all();
        $arayPricePro = DetailOrder::find()->where(['order_product_id'=>$orderId])->sum('price_pro');
        return $this->render('in-hoa-don', [
            'model' => $this->findModel($orderId),
            'detaiOrders' => $detaiOrders,
            'arayPricePro' => $arayPricePro,
        ]);
    }

    /**
     * Finds the OrderProducts model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return OrderProducts the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id){
        if (($model = OrderProducts::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
