<?php
namespace backend\models;

use common\models\InfoProfile;
use common\models\LogSystem;
use Yii;
use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Tài khoản đã sử dụng vui lòng sử đụng tài khoản khác.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Email này đã sử dụng vui lòng sử dụng email khác.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }

    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     */
   public function signup()
   {
       if (!$this->validate()) {
           return null;
       }

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

           $modelLog = new LogSystem();
           $modelLog->user_id = $user->id;
           $modelLog->created_at = strtotime('now');
           $modelLog->status = LogSystem::TT_TAOTAIKHOAN;
           $modelLog->save();
           $modelInfoProFile->save();
       }
   }
    /**
     * Sends confirmation email to user
     * @param User $user user model to with email should be send
     * @return bool whether the email was sent
     */
    protected function sendEmail($user)
    {
        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'emailVerify-html', 'text' => 'emailVerify-text'],
                ['user' => $user]
            )
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
            ->setTo($this->email)
            ->setSubject('Account registration at ' . Yii::$app->name)
            ->send();
    }
}
