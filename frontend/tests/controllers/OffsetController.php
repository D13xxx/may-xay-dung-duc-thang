<?php

namespace frontend\controllers;

use Yii;
use common\models\Offset;
use common\models\query\OffsetQuery;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * OffsetController implements the CRUD actions for Offset model.
 */
class OffsetController extends Controller
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
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                // 'type' => 'numbers', // 'numbers', 'letters' or 'default' (contains numbers & letters)
                'minLength' => 4,
                'maxLength' => 4,
                'fontFile'=>'@frontend/web/theme/fonts/UTMHelveBold.ttf'
            ],
        ];
    }


    public function actionIndex()
    {
        $model = new Offset();

        if ($model->load(Yii::$app->request->post()) ) {
            $files = UploadedFile::getInstances($model, 'file');
            if (!empty($files) && $files != '' && $files != null){
                // danh sách ảnh thành chuỗi
                $fileNames = UploadedFile::getInstances($model, 'file');
                $arrayName = array();
                foreach ($fileNames as $fileName){
                    $arrayName[] = strtotime('now').'-'.$fileName->name;
                }
                if ($arrayName > 1){
                    $temp = implode(',',$arrayName);
                    $model->file = $temp;
                }
                // lưu ảnh
                foreach ($files as $file)
                {
                    $tam = strtotime('now').'-'.$file->name;
                    $path = Yii::$app->basePath.'/web/upload/offset/'.$tam;
                    $file->saveAs($path);
                }
            }
            $model->is_viewed = Offset::V_NOTVIEW;
            $model->status = Offset::TT_CHUAXULY;
            $model->created_at = strtotime('now');
            if ($model->save()){
                Yii::$app->session->setFlash('success', Yii::t('app','Gửi yêu cầu thành công.'));
                return $this->redirect('index');
            }
        }

        return $this->render('index', [
            'model' => $model,
        ]);
    }
    public function actionList()
    {
        $searchModel = new OffsetQuery();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('list', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
}
