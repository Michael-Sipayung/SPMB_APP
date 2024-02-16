<?php 
namespace app\models;
use Yii;
use yii\base\Model;
use Exception;
class StudentBiayaForm extends Model{
    public $metode_pembayaran_id;
    public $virtual_account;
    public $voucher;

    public $biaya_awal;
    public $total_bayar;
    public $status_pembayaran;

    public function rules()
    {
        return [
            [['voucher'], 'string', 'max' => 20],
            //minimum voucher length is 8
            [['voucher'], 'string', 'min' => 5],
        ];
    }
    //function to get biaya awal from table
    public function getBiayaAwal(){
        $pendaftar = Pendaftar::find()->where(['pendaftar_id' => StudentDataDiriForm::getCurrentPendaftarId()])->one();
        $biaya = BiayaPendaftaran::find()->where(['gelombang_pendaftaran_id' => $pendaftar->gelombang_pendaftaran_id])->one();
        return $biaya->biaya_daftar; //todo: working with table reference
    }
    // validate voucher from given voucher code, return true if voucher is valid
    public function validateVoucher(): bool{
        //sql command: select from t_voucher where kode = $this->voucher
        $sql=Yii::$app->db->createCommand("SELECT * FROM t_voucher WHERE kode = :kode");
        $params = [
            ':kode' => $this->voucher,
        ];
        $result = $sql->bindValues($params)->queryOne();

        // return true if a row was found, false otherwise
        return $result !== false;
    }
    //total bayar, case  voucher valid, get diskon from t_voucher, case voucher not valid, diskon = 0
    public function getTotalBayar(){
        if($this->validateVoucher()){
            //sql command: select from t_voucher where kode = $this->voucher
            $sql=Yii::$app->db->createCommand("SELECT * FROM t_voucher WHERE kode = :kode");
            $params = [
                ':kode' => $this->voucher,
            ];
            $result = $sql->bindValues($params)->queryOne();
            return $this->getBiayaAwal() - $result['nominal']; //possibly using other operation, like multiplication
        }
        return $this->getBiayaAwal();
    }

    public static function getVa(){
        $pendaftar_id = StudentDataDiriForm::getCurrentPendaftarId();
        $pendaftar = Pendaftar::find()->where(['pendaftar_id' => $pendaftar_id])->one();
        $va = $pendaftar->virtual_account;
        
        if($va != NULL){
            return true;
        }
    }

    //function for get Status Pembayaran from table
    public static function generateVa(){
        $pendaftar_id = StudentDataDiriForm::getCurrentPendaftarId();
        $pendaftar = Pendaftar::find()->where(['pendaftar_id' => $pendaftar_id])->one();
        $prefix = $pendaftar->prefix_kode_pendaftaran;
        $kode_gel = substr($prefix, 0,4);
        $va = '8823399';
        if($kode_gel == 'PMDK'){
            $va .= '01';
        }
        else if($kode_gel == 'JPSN'){
            $va .= '02';
        }
        else if($kode_gel == 'USM1'){
            $va .= '03';
        }
        else if($kode_gel == 'USM2'){
            $va .= '04';
        }
        else if($kode_gel == 'USM3'){
            $va .= '05';
        }
        else if($kode_gel == 'UTBK'){
            $va .= '06';
        }

        $va .= substr($pendaftar->gelombangPendaftaran->tahun, -2);

        $va .= $pendaftar->gelombangPendaftaran->is_reguler;

        $va .= str_pad($pendaftar->no_pendaftaran, 4, '0', STR_PAD_LEFT);
        return $va;
    }   

    //Generate biaya pendaftaran ke tabel payment di finance
    public static function generateBiayaPendaftaran($user_finance_id){
        $periodeId = (new Periode)->getActivePeriodeId();
        $periode = Periode::findOne($periodeId);

        $payment_status_apply = 'REQUEST';

        $pendaftar_id = StudentDataDiriForm::getCurrentPendaftarId();
        $pendaftar = Pendaftar::find()->where(['pendaftar_id' => $pendaftar_id])->one();

        $biaya_pendaftaran = BiayaPendaftaran::find()->where(['gelombang_pendaftaran_id' => $pendaftar->gelombang_pendaftaran_id])->one();
                        
        $cash_amount = $biaya_pendaftaran->biaya_daftar;
        $voucher_amount = '';
        if($pendaftar->voucher_daftar !== NULL){
            $voucher = Voucher::find()->where(['kode' => $pendaftar->voucher_daftar])->one();
            $voucher_amount = $voucher->nominal;
            $cash_amount = $biaya_pendaftaran->biaya_daftar - $voucher->nominal;
        }

        $monthCode = substr(date("F", mktime(0, 0, 0, $periode->month, 15)), 0, 3);
        $paymentCode = 'PC-'.strtoupper($monthCode.'-'.substr(md5(microtime()),rand(0,26),5)).'-'.$user_finance_id.'-'.$periodeId;
        
        $payment = new Payment();        

        $payment->payment_code = $paymentCode;
        $payment->user_id = $user_finance_id;
        $payment->periode_id = $periodeId;
        $payment->total_fee_amount = $cash_amount;
        $payment->minimum_pay_amount = $cash_amount;
        $payment->payment_status_key = $payment_status_apply;
        $payment->voucher_amount = $voucher_amount;
        $payment->cash_amount = $cash_amount;
        $payment->total_amount_paid = $cash_amount;
        $payment->is_spmb = 2;
        $payment->is_fixed = 1;

        if (!$payment->save()) {
            return false;
        }

        //Data Payment Detail
        $paymentDetail = new PaymentDetail();
        $paymentDetail->payment_code = $payment->payment_code;
        $paymentDetail->fee_id = $biaya_pendaftaran->fee_id;
        $paymentDetail->order = 0;            
        $paymentDetail->minimum_pay_amount = $cash_amount;
        $paymentDetail->payment_status_key = $payment_status_apply;
        $paymentDetail->voucher_amount = $voucher_amount;
        $paymentDetail->cash_amount = $cash_amount;
        $paymentDetail->total_amount_paid = $cash_amount;
        
        if (!$paymentDetail->save()) {
            return false;
        }
        return true;
    }

    //function for get Status Pembayaran from table
    public static function getStatusPembayaran(){        
        $pendaftar_id = StudentDataDiriForm::getCurrentPendaftarId();
        $pendaftar = Pendaftar::find()->where(['pendaftar_id' => $pendaftar_id])->one();
        if(isset($pendaftar)){
            $user_reg_number = UserRegistrationNumber::find()->where(['registration_number' => $pendaftar->getKodePendaftaran()])->one();
            $payment = Payment::find()->where(['user_id' => $user_reg_number->user_id, 'is_spmb' => 2, 'deleted' => 0])->one();
            if(isset($payment)){
                if($payment->payment_status_key === 'PAID_OFF'){
                    return true;
                }               
            }
        }
        return false;
    }
    //function for set status pembayaran
    public function setStatusPembayaran(){
        return self::getStatusPembayaran() ? "Lunas" : "Belum Lunas";
    }

    public function updateData(){
        try{
            $user_id =StudentDataDiriForm::getCurrentUserId();
            $sql = "UPDATE t_pendaftar SET metode_pembayaran_id = :metode_pembayaran_id, virtual_account = :virtual_account,
            voucher_daftar = :voucher_daftar WHERE user_id = :user_id";
            $params = [
                ':metode_pembayaran_id' => 1, //transfer bank, saat generate VA
                ':virtual_account' => $this->generateVa(),
                ':voucher_daftar' => $this->voucher,
                ':user_id' => $user_id,
            ];
            Yii::$app->db->createCommand($sql)->bindValues($params)->execute();
            return true;            
        }catch(Exception $e) {
            //flash message if the data is failed to be inserted to database
            Yii::$app->session->setFlash('error', "Data Biaya Gagal Disimpan");
            echo $e->getMessage();
        }
    }

    public function getGelombangPendaftaran()
    {
        return $this->hasOne(GelombangPendaftaran::className(), ['gelombang_pendaftaran_id' => 'gelombang_pendaftaran_id']);
    }
}

?>