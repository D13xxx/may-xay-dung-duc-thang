<?php

namespace backend\controllers;

use Yii;
use common\models\CatProducts;
use common\models\query\CatProductsQuery;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CatProductsController implements the CRUD actions for CatProducts model.
 */
class CatProductsController extends Controller
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
     * Lists all CatProducts models.
     * @return mixed
     */
    public function actionIndex()
    {
        $model = new CatProducts();
        $searchModel = new CatProductsQuery();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataCat = $model->getCat();
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'dataCat' => $dataCat,
        ]);
    }

    /**
     * Displays a single CatProducts model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new CatProducts model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CatProducts();
        $dataCat = $model->getCat();
        if ($model->load(Yii::$app->request->post())) {
            $model->status = CatProducts::IS_NEW;
            if(!empty($model->avatar)){
                // convert base64 to image
                $data = $model->avatar;
                $fileName = explode('+', $data);
                $strFileNam = "$fileName[0]+";
                $img = explode($strFileNam, $data);
                $strEx = explode('base64,',$img[1]);
                $imgFile = base64_decode($strEx[1]);
                file_put_contents(Yii::$app->basePath.'/web/upload/cat-products/'.$fileName[0], $imgFile);
                $model->avatar = $fileName[0];
            }
            if ($model->save()){
                Yii::$app->session->setFlash('success', Yii::t('app','Thêm mới thành công.'));
                return $this->redirect('index');
            }
        }
        return $this->render('create', [
            'model' => $model,
            'dataCat' => $dataCat,
        ]);
    }

    /**
     * Updates an existing CatProducts model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $dataCat = $model->getCat();
        $str = $model->avatar;
        if ($model->load(Yii::$app->request->post())) {
            if ($model->avatar == $str){
                $model->avatar = $str;
            }else{
                $data = $model->avatar;
                if(!empty($model->avatar)){
                    $fileName = explode('+', $data);
                    $strFileNam = "$fileName[0]+";
                    $img = explode($strFileNam, $data);
                    $strEx = explode('base64,',$img[1]);
                    $imgFile = base64_decode($strEx[1]);
                    file_put_contents(Yii::$app->basePath.'/web/upload/cat-products/'.$fileName[0], $imgFile);
                    $model->avatar = $fileName[0];
                }
            }
            if ($model->save()){
                Yii::$app->session->setFlash('success', Yii::t('app','Cập nhật thành công.'));
                return $this->redirect(['update','id'=>$model->id]);
            }
        }

        return $this->render('update', [
            'model' => $model,
            'dataCat' => $dataCat,
        ]);

        return $this->render('update', [
            'model' => $model,
            'dataCat' => $dataCat,
        ]);
    }

    /**
     * Deletes an existing CatProducts model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the CatProducts model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CatProducts the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CatProducts::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('backend', 'The requested page does not exist.'));
    }
}
