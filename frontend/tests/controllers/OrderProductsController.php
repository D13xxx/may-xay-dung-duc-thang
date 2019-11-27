<?php

namespace frontend\controllers;

use common\models\Banner;
use common\models\Products;
use Yii;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\Pagination;
/**
 * ArticlesController implements the CRUD actions for Articles model.
 */
class ProductsController extends Controller
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

    /**
     * Lists all Articles models.
     * @return mixed
     */
    public function actionAddCart(){
        $model = new OrderProducts();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['products/add-cart-pro']);
        }

        return $this->render('gio-hang', [
            'model' => $model,
        ]);
    }
}
