<?php

namespace backend\controllers;

use common\models\CatArticles;
use common\models\Offset;
use Yii;
use common\models\Articles;
use common\models\query\ArticlesQuery;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\data\Pagination;
/**
 * ArticlesController implements the CRUD actions for Articles model.
 */
class MailController extends Controller
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
    public function actionMailLienHe(){
        return $this->render('mail-lien-he');
    }
    public function actionMailBoiHoan(){
        $offsets = Offset::find()->orderBy(['id'=>SORT_DESC])->all();
        return $this->render('mail-boi-hoan',[
            'offsets'=>$offsets,
        ]);
    }
    public function actionViewMailBoiHoan($id){
        $offset = Offset::findOne($id);
        if ($offset->is_viewed == Offset::V_NOTVIEW){
            $offset->is_viewed = Offset::V_VIEWED;
            $offset->save();
        }
        $fileNames = explode(',',$offset->file);
        return $this->render('view-mail-boi-hoan',[
            'offset'=>$offset,
            'fileNames'=>$fileNames,
        ]);
    }
    public function actionXacThucXuLy()
    {
        if (Yii::$app->request->isAjax){
            $offsetId = Yii::$app->request->post('offsetId');
            echo $offsetId;
            die();
        }
    }
    public function actionViewImage($fileName){
        return $this->renderAjax('view-image',[
            'fileName'=>$fileName,
        ]);
    }
    public function actionComposeEmailBoiHoan(){
        return $this->render('compose-email-boi-hoan');
    }
    public function actionKhachHang(){
        return $this->render('khach-hang');
    }
    public function actionThanhVien(){
        return $this->render('thanh-vien');
    }
    public function actionSendMail(){
        $send = Yii::$app->mailer->compose(['html' => '@common/mail/mail'])
            ->setFrom('ngogiadiepit@gmail.com')
            ->setTo('nvdiepse@gmail.com')
            ->setSubject('Test Message')
            ->send();
        if($send){
            echo "Send";
        }
    }
}
