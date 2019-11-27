<?php

namespace backend\controllers;

use common\models\Brand;
use common\models\CatProducts;
use Yii;
use common\models\Products;
use common\models\query\ProductsQuery;
use common\models\Tags;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use backend\models\ImportForm;

/**
 * ProductsController implements the CRUD actions for Products model.
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
     * Lists all Products models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductsQuery();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->orderBy(['id' => SORT_DESC]);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionListProductsExport()
    {
        $searchModel = new ProductsQuery();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->orderBy(['id' => SORT_DESC]);

        return $this->render('list-products-export', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Products model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($slug)
    {
        $model = Products::find()->where(['slug' => $slug])->one();
        return $this->render('view', [
            'model' => $model,
        ]);
    }
    public function actionDisable($id)
    {
        $model = Products::findOne($id);
        $model->status = Products::IS_DISABLE;
        $model->save();
        Yii::$app->session->setFlash('success', Yii::t('common', 'Tạm ẩn sản phẩm thành công.'));
        return $this->redirect('index');
    }
    public function actionActive($id)
    {
        $model = Products::findOne($id);
        $model->status = Products::IS_ACTIVE;
        $model->save();
        Yii::$app->session->setFlash('success', Yii::t('common', 'Kích hoạt sản phẩm thành công.'));
        return $this->redirect('index');
    }

    /**
     * Creates a new Products model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Products();
        $model->sale_number = 1;
        $dataCat = $model->getCatProducts();
        if ($model->load(Yii::$app->request->post())) {

            $model->created_at = strtotime("now");
            $model->status = Products::IS_ACTIVE;
            // convert base64 to image
            $data = $model->avatar;
            $fileName = explode('+', $data);
            $strFileName = $fileName[0];

            $position = strpos($strFileName, '.', 0);
            $strFileName = substr($strFileName, 0, $position) . strtotime("now") . '.jpeg';

            $strEx = explode('base64,', $data);
            $imgFile = base64_decode($strEx[1]);

            file_put_contents(Yii::$app->basePath . '/web/upload/products/' . $strFileName, $imgFile);
            $model->avatar = $strFileName;

            //img_share 
            $data1 = $model->img_share;
            $fileName1 = explode('+', $data1);
            $strFileName1 = $fileName1[0];

            $position1 = strpos($strFileName1, '.', 0);
            $strFileName1 = substr($strFileName1, 0, $position1) . strtotime("now") . '.jpeg';

            $strEx1 = explode('base64,', $data1);
            $imgFile1 = base64_decode($strEx1[1]);

            file_put_contents(Yii::$app->basePath . '/web/upload/products/img-share/' . $strFileName1, $imgFile1);
            $model->img_share = $strFileName1;

            // $model->img_share = $fileName1[0];

            if ($model->save()) {
                $tagsNames = explode(',', $model->tags);
                if (!empty($tagsNames)) {
                    foreach ($tagsNames as $tagsNames => $values) {
                        $modelTags = new Tags();
                        $modelTags->tag_name = $values;
                        $modelTags->pro_id = $model->id;
                        $modelTags->save();
                    }
                }
                $modelCat = CatProducts::find()->where(['id' => $model->cat_id])->one();
                $modelBrand = Brand::find()->where(['id' => $model->brand])->one();
                if (!$modelCat->status == CatProducts::IS_ACTIVE) {
                    $modelCat->status = CatProducts::IS_ACTIVE;
                    $modelCat->save();
                }
                if (!$modelBrand->status == Brand::TT_HOATDONG) {
                    $modelBrand->status = Brand::TT_HOATDONG;
                    $modelBrand->save();
                }
                Yii::$app->session->setFlash('success', Yii::t('common', 'Thêm mới thành công.'));
                return $this->redirect('index');
            }
        }

        return $this->render('create', [
            'model' => $model,
            'dataCat' => $dataCat,
        ]);
    }

    /**
     * Updates an existing Products model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $str = $model->avatar;
        $imgShare = $model->img_share;
        $dataCat = $model->getCatProducts();
        if ($model->load(Yii::$app->request->post())) {
            $model->updated_at = strtotime("now");
            if ($model->avatar == $str) {
                $model->avatar = $str;
            } else {
                $data = $model->avatar;
                if (!empty($model->avatar)) {
                    $fileName = explode('+', $data);
                    $strFileName = $fileName[0];

                    $position = strpos($strFileName, '.', 0);
                    $strFileName = substr($strFileName, 0, $position) . strtotime("now") . '.jpeg';

                    $strEx = explode('base64,', $data);
                    $imgFile = base64_decode($strEx[1]);

                    file_put_contents(Yii::$app->basePath . '/web/upload/products/' . $strFileName, $imgFile);
                    $model->avatar = $strFileName;
                }
            }
            if ($model->img_share == $imgShare) {
                $model->img_share = $imgShare;
            } else {
                $data2 = $model->img_share;
                if (!empty($model->img_share)) {
                    $fileName1 = explode('+', $data2);
                    $strFileName1 = $fileName1[0];

                    $position1 = strpos($strFileName1, '.', 0);
                    $strFileName1 = substr($strFileName1, 0, $position1) . strtotime("now") . '.png';

                    $strEx1 = explode('base64,', $data2);
                    $imgFile1 = base64_decode($strEx1[1]);

                    file_put_contents(Yii::$app->basePath . '/web/upload/products/img-share/' . $strFileName1, $imgFile1);
                    $model->img_share = $strFileName1;
                }
            }
            if ($model->save()) {
                Yii::$app->db->createCommand("DELETE FROM tags WHERE pro_id =" . $model->id)->query();
                $tagsNames = explode(',', $model->tags);
                if (!empty($tagsNames)) {
                    foreach ($tagsNames as $tagsNames => $values) {
                        $modelTags = new Tags();
                        $modelTags->tag_name = $values;
                        $modelTags->pro_id = $model->id;
                        $modelTags->save();
                    }
                }
                Yii::$app->session->setFlash('success', Yii::t('app', 'Cập nhật thành công.'));
                return $this->redirect('index');
            }
        }

        return $this->render('update', [
            'model' => $model,
            'dataCat' => $dataCat,
        ]);
    }

    /**
     * Deletes an existing Products model.
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


    public function actionImport()
    {
        $model = new ImportForm();
        if ($model->load(Yii::$app->request->post())) {
            //Upload file temp
            $excelFile = \yii\web\UploadedFile::getInstance($model, 'fileExcel');
            $tempPath = Yii::$app->basePath . '/web/upload/excel/' . time() . '_' . $excelFile->name;
            $excelFile->saveAs($tempPath);

            $inputFile =  $tempPath;
            try {
                $inputFileType = \PhpOffice\PhpSpreadsheet\IOFactory::identify($inputFile);
                $objReader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);
                $objPHPExcel = $objReader->load($inputFile);
            } catch (Exception $exc) {
                die('error');
            }
            $sheet = $objPHPExcel->getSheet(0);
            $highestRow = $sheet->getHighestRow();
            $highestColumn = $sheet->getHighestColumn();
            for ($row = 2; $row <= $highestRow; $row++) {
                $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);
                $model = Products::find()->where(['code' => $rowData[0][0]])->one();
                if ($model) {
                    $model->code = (string) $rowData[0][0];
                    $model->full_name = (string) $rowData[0][1];
                    $model->exp_price = $rowData[0][2];
                    $model->price = $rowData[0][3];
                    $sale_number = $rowData[0][2] - $rowData[0][3];
                    $ti_le = floor($sale_number / $rowData[0][2] * 100);
                    $model->sale_number = $ti_le;
                    $model->save();
                }
            }

            return $this->redirect(['list-products-export']);
        } else {
            return $this->render('import', [
                'model' => $model,
            ]);
        }
    }

    
    /**
     * Finds the Products model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Products the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Products::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('backend', 'The requested page does not exist.'));
    }
}
