<?php

namespace api\controllers;


use common\models\Products;
use api\modules\user\models\AccountForm;
use CURLFile;
use Lcobucci\JWT\Signer\Hmac\Sha256;
use sizeg\jwt\JwtHttpBearerAuth;
use Yii;
use yii\base\Exception;
use yii\data\Pagination;
use yii\rest\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\web\UploadedFile;
use yii\db\Query;
use yii\helpers\Url;

class ApiController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => JwtHttpBearerAuth::class,
            // 'optional' => [
            //     'login',
            // ],
        ];

        return $behaviors;
    }

    public function actionIndex(){
        $datas = Products::find()->all();

        return $this->asJson([
            'status' => true,
            'code' => 200,
            'data' => $datas
        ]);
    }
}
