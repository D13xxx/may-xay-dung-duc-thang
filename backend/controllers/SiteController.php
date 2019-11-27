<?php
namespace backend\controllers;

use backend\models\SignupForm;
use common\models\InfoProfile;
use common\models\LogSystem;
use common\models\Parter;
use common\models\User;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResendVerificationEmailForm;
use frontend\models\ResetPasswordForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use common\models\Products;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error','request-password-reset','reset-password'],
                        'allow' => true,
                    ],
                    [
                        'actions' => [
                            'logout',
                            'signup',
                            'index'
                        ],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $totalProduct = Products::find()->select('id')->count();
        $sanPhamBanChays = (new \yii\db\Query())
        ->select(['product_id', 'COUNT(product_id) AS "amount"'])
        ->from('detail_order')
        ->groupBy('product_id')
        ->orderBy(['COUNT(product_id)'=>SORT_DESC])
        ->limit(5)
        ->leftJoin('order_products',[''])
        ->all();
        
        // $sanPhamBanChays = Yii::$app->db->createCommand("
        // SELECT product_id, COUNT(product_id) AS 'amount'
        // FROM detail_order
        // GROUP BY product_id
        // ORDER BY COUNT(product_id) DESC
        // limit 5 
        // ")->execute();
        // echo '<pre>';
        // print_r($sanPhamBanChays);die();
        /*
        SELECT product_id, COUNT(product_id) AS "So_luong"
        FROM detail_order
        GROUP BY product_id
        ORDER BY COUNT(product_id) DESC
        limit 5
        5 sản phẩm mua nhiều nhất
        */
        return $this->render('index',[
            'totalProduct'=>$totalProduct,
            'sanPhamBanChays'=>$sanPhamBanChays
        ]);
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) ) {
            $user = new User();
            $user->username = $this->username;
            $user->email = $this->email;
            $user->status = User::STATUS_ACTIVE;
            $user->setPassword($this->password);
            $user->generateAuthKey();
            $user->generateEmailVerificationToken();
            if ($user->save()){
                // tạo acc inforProfile của tài khoản
                $modelInfoProFile = new InfoProfile();
                $modelInfoProFile->user_id = $user->id;
                $modelInfoProFile->full_name = $user->username;

                $modelLog = new LogSystem();
                $modelLog->user_id = $user->id;
                $modelLog->created_at = strtotime('now');
                $modelLog->status = LogSystem::TT_TAOTAIKHOAN;

                $modelLog->save();
                $modelInfoProFile->save();
            }
            Yii::$app->session->setFlash('success', 'Đăng ký tài khoản thành công.Vui lòng xác thực tài khoản qua email.');
            return $this->redirect('user/index');
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }
//    public function actionSignup()
//    {
//        $model = new SignupForm();
//        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
//            Yii::$app->session->setFlash('success', 'Đăng ký tài khoản thành công.Vui lòng xác thực tài khoản qua email.');
//            return $this->redirect('user/index');
//        }
//
//        return $this->render('signup', [
//            'model' => $model,
//        ]);
//    }
    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Vui lòng kiểm tra Email để được hướng dẫn.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Xin lỗi ,Tài khoản yêu cầu không tồn tại trong hệ thống.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {

        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    /**
     * Verify email address
     *
     * @param string $token
     * @throws BadRequestHttpException
     * @return yii\web\Response
     */
    public function actionVerifyEmail($token)
    {
        try {
            $model = new VerifyEmailForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        if ($user = $model->verifyEmail()) {
            if (Yii::$app->user->login($user)) {
                Yii::$app->session->setFlash('success', 'Your email has been confirmed!');
                return $this->goHome();
            }
        }

        Yii::$app->session->setFlash('error', 'Sorry, we are unable to verify your account with provided token.');
        return $this->goHome();
    }

    /**
     * Resend verification email
     *
     * @return mixed
     */
    public function actionResendVerificationEmail()
    {
        $model = new ResendVerificationEmailForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
                return $this->goHome();
            }
            Yii::$app->session->setFlash('error', 'Sorry, we are unable to resend verification email for the provided email address.');
        }

        return $this->render('resendVerificationEmail', [
            'model' => $model
        ]);
    }
}
