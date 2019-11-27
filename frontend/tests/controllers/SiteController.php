<?php
namespace frontend\controllers;

use common\models\Banner;
use common\models\CatInsurrances;
use common\models\CatProducts;
use common\models\DetailCompany;
use common\models\Products;
use common\models\SpEmploy;
use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use common\models\Articles;
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
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
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
//            'pageCache' => [
//                'class' => 'yii\filters\PageCache',
//                'only' => ['index'],
//                'duration' => 60,
//                'variations' => [
//                    \Yii::$app->language,
//                ]
//            ],
        ];
    }


    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        //Danh sách sản phẩm khuyến mại limit 8
        //Danh sách sản phẩm khuyến mại nội bật limit 1 random
        $sanPhamNoiBatKhuyenMai = Products::find()->where(['type'=>Products::T_SANPHAMKHUYENMAI])->orderBy(['id'=>SORT_DESC])->one();

        $sanPhamKhuyenMai = Products::find()->where(['type'=>Products::T_SANPHAMKHUYENMAI])->orderBy(['id'=>SORT_DESC])->limit(6)->all();
        //Danh sách sản phẩm bán chạy limit 8
        //Danh sách sản phẩm bán chạy nội bật limit 1 random
        $sanPhamNoiBatBanChay = Products::find()->where(['type'=>Products::T_SANPHAMBANCHAY])->orderBy(['id'=>SORT_DESC])->one();
        $sanPhamBanChay = Products::find()->where(['type'=>Products::T_SANPHAMBANCHAY])->orderBy(['id'=>SORT_DESC])->limit(6)->all();
        //Danh sách sản phẩm mới limit 8
        //Danh sách sản phẩm mới nội bật limit 1 random
        $sanPhamNoiBatMoi = Products::find()->where(['type'=>Products::T_SANPHAMMOI])->orderBy(['id'=>SORT_DESC])->one();
        $sanPhamMoi = Products::find()->where(['type'=>Products::T_SANPHAMMOI])->orderBy(['id'=>SORT_DESC])->limit(6)->all();
        //Danh sách nhóm sản phẩm parent_id = 0
        $listCat = CatProducts::find()->where(['parent_id'=>null])->all();
        // danh sách slide
        $banners = Banner::find()->where(['status'=>Banner::TT_ACTIVE])->all();
        return $this->render('index',[
            'listCat'=>$listCat,
            'sanPhamMoi'=>$sanPhamMoi,
            'sanPhamNoiBatMoi'=>$sanPhamNoiBatMoi,
            'sanPhamBanChay'=>$sanPhamBanChay,
            'sanPhamNoiBatBanChay'=>$sanPhamNoiBatBanChay,
            'sanPhamKhuyenMai'=>$sanPhamKhuyenMai,
            'sanPhamNoiBatKhuyenMai'=>$sanPhamNoiBatKhuyenMai,
            'banners'=>$banners,
        ]);
    }
    public function actionAboutUs()
    {
        return $this->render('about', [
        ]);
    }

    public function actionHeThongShowroom(){
        $model  = DetailCompany::find()->where(['id'=>1])->one();
        return $this->render('he-thong-showroom',[
            'model'=>$model
        ]);
    }

    public function actionGioiThieuCongTy(){
        $model  = DetailCompany::find()->where(['id'=>1])->one();
        return $this->render('gioi-thieu-cong-ty',[
            'model'=>$model
        ]);
    }

    public function actionTuyenDung(){
        $model  = DetailCompany::find()->where(['id'=>1])->one();
        return $this->render('tuyen-dung',[
            'model'=>$model
        ]);
    }

    public function actionHuongDanThanhToan(){
        $model  = SpEmploy::find()->where(['id'=>1])->one();
        return $this->render('huong-dan-thanh-toan',[
            'model'=>$model
        ]);
    }

    public function actionChinhSachGiaoHang(){
        $model  = SpEmploy::find()->where(['id'=>1])->one();
        return $this->render('chinh-sach-giao-hang',[
            'model'=>$model
        ]);
    }

    public function actionChinhSachDoiTra(){
        $model  = SpEmploy::find()->where(['id'=>1])->one();
        return $this->render('chinh-sach-doi-tra',[
            'model'=>$model
        ]);
    }
    public function actionChinhSachBaoHanh(){
        $model  = SpEmploy::find()->where(['id'=>1])->one();
        return $this->render('chinh-sach-bao-hanh',[
            'model'=>$model
        ]);
    }
    public function actionChinhSachBaoMatThongTin(){
        $model  = SpEmploy::find()->where(['id'=>1])->one();
        return $this->render('chinh-sach-bao-mat-thong-tin',[
            'model'=>$model
        ]);
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post())) {
            if($model->login()){
                return $this->goBack();
            }
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->session->setFlash('success', 'Thank you for registration. Please check your inbox for verification email.');
            return $this->goHome();
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
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
