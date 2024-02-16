<?php

namespace frontend\controllers;

use app\models\Payment;
use app\models\PaymentDetail;
use app\models\Pendaftar;
use app\models\StudentDataDiriForm;
use app\models\UserFinance;
use app\models\UserRegistrationNumber;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

class PendaftarController extends \yii\web\Controller
{
    public function behaviors() //behavior test for logout and profile update, add other behaviors here
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                //only registered users can access the following actions : student-data-diri, student-data-o-tua, student-extra
                'only' => ['view-biaya-pendaftaran'],
                'rules' => [
                    [
                        'actions' => ['view-biaya-pendaftaran'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    // [  //only guests can access the following actions : register-student
                    //     'actions'=>['register-student'],
                    //     'allow'=>true,
                    //     'roles' =>['?'],
                    // ],
                ],
            ],
            'verbs' => [
                'class'=>VerbFilter::class,
                'actions'=> [
                    'logout'=>['post']
                ],
            ],
        ];
    }
    //redirect to the login page if the user is not already logged in
   public function beforeAction($action)
    {
        if (in_array($action->id, ['view-biaya-pendaftaran'])) {
            if (Yii::$app->user->isGuest) {
                return $this->redirect(['student/login']);
            }
        }
        return parent::beforeAction($action);
    }
    public function actionViewBiayaPendaftaran(){
        $pendaftar = Pendaftar::find()->where(['pendaftar_id' => StudentDataDiriForm::getCurrentPendaftarId()])->one();
        
        if($pendaftar->virtual_account === NULL){
            return $this->redirect(['student/student-biaya']);
        }

        $user_reg_number = UserRegistrationNumber::find()->where(['registration_number' => $pendaftar->getKodePendaftaran()])->one();
        $payment = Payment::find()->where(['user_id' => $user_reg_number->user_id, 'is_spmb' => 2, 'deleted' => 0])->one();
        $payment_detail = PaymentDetail::find()->where(['payment_code' => $payment->payment_code])->one();        

        return $this->render('view-biaya-pendaftaran', [
            'payment' => $payment,
            'pendaftar' => $pendaftar,
            'payment_detail' =>  $payment_detail,
        ]);
    }
}
