<?php

namespace backend\controllers;

use Yii;
use common\models\LogSystem;
use common\models\query\LogSystemQuery;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LogSystemController implements the CRUD actions for LogSystem model.
 */
class LogSystemController extends Controller
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
     * Lists all LogSystem models.
     * @return mixed
     */
    public function actionIndex()
    {
        $model = LogSystem::find()->orderBy(['id'=>SORT_DESC])->all();

        return $this->render('index', [
            'model' => $model,
        ]);
    }

    /**
     * Displays a single LogSystem model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */


    /**
     * Finds the LogSystem model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return LogSystem the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = LogSystem::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('backend', 'The requested page does not exist.'));
    }
}
