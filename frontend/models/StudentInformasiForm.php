<?php
namespace app\models;
use Yii;
use yii\base\Model;
use Exception;
class StudentInformasiForm extends Model{
    //todo: public member for information fields
    public $sumber_informasi;
    public $motivasi;
    public $jumlah_n;
    public $agree;

    //rules for validation  
    public function rules(){
        return [
            [['sumber_informasi','motivasi','jumlah_n'], 'required'],
            //[['agree'], 'required', 'requiredValue' => 1, 'message' => 'Anda harus menyetujui pernyataan ini'],
            [['sumber_informasi','motivasi','jumlah_n'], 'string', 'max' => 255],
        ];
    }
    //update data to t_pendaftar table, user_id = getCurrenUserId()
    public function updateData(){
        $user_id =StudentDataDiriForm::getCurrentUserId();
        $sql = "UPDATE t_pendaftar SET informasi_del_id = :sumber_informasi, motivasi = :motivasi, 
        n = :jumlah_n WHERE user_id = :user_id";
        $params = [
            ':sumber_informasi' => $this->sumber_informasi,
            ':motivasi' => $this->motivasi,
            ':jumlah_n' => $this->jumlah_n,
            ':user_id' => $user_id,
        ];
        Yii::$app->db->createCommand($sql)->bindValues($params)->execute();
    }
    //insert or update information to database 
    public function insertInformasiData(){
        if($this->validate()){
            try{
                if(!StudentDataDiriForm::userIdExists()){
                    //insert user_id to table t_pendaftar, avoid duplicate since the user_id on t_pendaftar not primary key
                    Yii::$app->db->createCommand()->insert('t_pendaftar', 
                    ['user_id'=>StudentDataDiriForm::getCurrentUserId()])->execute();
                }
                //update data to t_pendaftar table
                self::updateData();
                //flash message if the data is successfully inserted to database
                return true;
            }catch(Exception $e) {
                //flash message if the data is failed to insert to database
                //echo $e->getMessage();
                Yii::$app->session->setFlash('error', "Data Informasi Gagal Disimpan");
                return false;
            }
        }
        return false;
    }
    //generate jumlah n value (1-10), key value pair, number not text
    public static function get_jumlah_n() {
        $array = [];
        for ($i = 1; $i <= 50; $i++) {
            $array[$i] = $i;
        }
        return $array;
    }
    //generate sumber informasi value, key value pair, from table t_r_informasi_del, 
    //field: informasi_del_id,and desc
    public static function getSumberInformasi(){
        $sumber = Yii::$app->db->createCommand('SELECT informasi_del_id, `desc` FROM t_r_informasi_del')->queryAll();
        $sumber = array_column($sumber, 'desc', 'informasi_del_id');
        return $sumber;
    }
    //generate motivasi value, key value pair, text and text
    public static array $get_motivasi = [
        'Prestasi' => 'Prestasi',
        'Pendidikan' => 'Pendidikan',
        'Pekerjaan' => 'Pekerjaan',
        'Lainnya' => 'Lainnya',
    ];
    //populate motivasi from table t_r_informasi_del as a dropdown list
    public static function get_motivasi(){
        $sql = "SELECT informasi_del_id, `desc` FROM t_r_informasi_del";
        $result = Yii::$app->db->createCommand($sql)->queryAll();
        $result = array_column($result, 'desc', 'informasi_del_id');
        return $result;
    }
    //function to check if the data informasi is filled
    public static function isFillDataInformasi(){
        //sql command to check whether the user_id is already exist in the table t_pendaftar
        $sql = "SELECT motivasi FROM t_pendaftar WHERE user_id = ".StudentDataDiriForm::getCurrentUserId();
        //execute the sql command
        $result = Yii::$app->db->createCommand($sql)->queryOne();
        //if the user_id is already exist, return true
        if($result['motivasi'] != null){
            return true;
        }
        //if the user_id is not yet exist, return false
        return false;
    }
    //getPerlengkapanMahasiswa : get data from table t_r_uang_daftar_ulang
    public static function getPerlengkapanMahasiswa(){
        $sql = "SELECT perlengkapan_mhs FROM t_r_uang_daftar_ulang";
        $result = Yii::$app->db->createCommand($sql)->queryOne();
        return $result['perlengkapan_mhs'];
    }
    //getPerlengkapanMakan : get data from table t_r_uang_daftar_ulang
    public static function getPerlengkapanMakan(){
        $sql = "SELECT perlengkapan_makan FROM t_r_uang_daftar_ulang";
        $result = Yii::$app->db->createCommand($sql)->queryOne();
        return $result['perlengkapan_makan'];
    }
    //getSPP : get data from table t_r_uang_daftar_ulang
    public static function getSPP(){
        $sql = "SELECT spp_tahap_1 FROM t_r_uang_daftar_ulang";
        $result = Yii::$app->db->createCommand($sql)->queryOne();
        return $result['spp_tahap_1'];
    }
    //getMainMajor : get data from table t_pilihan_jurusan
    public static function getMainMajor(){
        $sql = "SELECT * FROM t_pilihan_jurusan WHERE pendaftar_id = ".StudentDataDiriForm::getCurrentPendaftarId()
            ." AND prioritas = 1";
        $result = Yii::$app->db->createCommand($sql)->queryOne();
        $result = $result['jurusan_id'];
        //fecth nama from t_r_jurusan which meet the jurusan_id
        $sql = "SELECT * FROM t_r_jurusan WHERE jurusan_id = ".$result;
        $temp = Yii::$app->db->createCommand($sql)->queryOne();
        return $temp; //for nama just pass ['nama] and for it's id just pass ['jurusan_id']  
    }
    //getSecondMajor : get data from table t_pilihan_jurusan
    public static function getSecondMajor(){
        $sql = "SELECT * FROM t_pilihan_jurusan WHERE pendaftar_id = ".StudentDataDiriForm::getCurrentPendaftarId()
            ." AND prioritas = 2";
        $result = Yii::$app->db->createCommand($sql)->queryOne();
        $result = $result['jurusan_id'];
        //fecth nama from t_r_jurusan which meet the jurusan_id
        $sql = "SELECT * FROM t_r_jurusan WHERE jurusan_id = ".$result;
        $temp = Yii::$app->db->createCommand($sql)->queryOne();
        return $temp; //for nama just pass ['nama] and for it's id just pass ['jurusan_id']  
    }
    //getThirdMajor : get data from table t_pilihan_jurusan
    public static function getThirdMajor(){
        $sql = "SELECT * FROM t_pilihan_jurusan WHERE pendaftar_id = ".StudentDataDiriForm::getCurrentPendaftarId()
            ." AND prioritas = 3";
        $result = Yii::$app->db->createCommand($sql)->queryOne();
        $result = $result['jurusan_id'];
        //fecth nama from t_r_jurusan which meet the jurusan_id
        $sql = "SELECT * FROM t_r_jurusan WHERE jurusan_id = ".$result;
        $temp = Yii::$app->db->createCommand($sql)->queryOne();
        return $temp; //for nama just pass ['nama] and for it's id just pass ['jurusan_id']  
    }
    //choosenBatch : get data from table t_pendaftar
    public static function choosenBatch(){
        $sql = "SELECT gelombang_pendaftaran_id FROM t_pendaftar WHERE pendaftar_id = ".StudentDataDiriForm::getCurrentPendaftarId();
        $result = Yii::$app->db->createCommand($sql)->queryOne();
        return $result['gelombang_pendaftaran_id'];
    }
    //getMainBiayaPembangunan : get data from table t_r_uang_pembangunan
    public static function getMainBiayaPembangunan($choosen_batch=119){
        $sql = "SELECT * FROM t_r_uang_pembangunan where gelombang_pendaftaran_id = :choosen_batch AND jurusan_id = :jurusan_id";
        $result = Yii::$app->db->createCommand($sql, [
            ':choosen_batch' => $choosen_batch,
            ':jurusan_id' => self::getMainMajor()['jurusan_id'],
        ])->queryOne();
        return $result['base_n'] ?? 0;
    }
    //getSecondBiayaPembangunan : get data from table t_r_uang_pembangunan
    public static function getSecondBiayaPembangunan($choosen_batch){
        $sql = "SELECT base_n FROM t_r_uang_pembangunan where gelombang_pendaftaran_id = :choosen_batch AND jurusan_id = :jurusan_id";
        $result = Yii::$app->db->createCommand($sql, [
            ':choosen_batch' => $choosen_batch,
            ':jurusan_id' => self::getSecondMajor()['jurusan_id'],
        ])->queryOne();
        //handling for case null
        return $result['base_n'] ?? 0;
    }
    //getThirdBiayaPembangunan : get data from table t_r_uang_pembangunan
    public static function getThirdBiayaPembangunan($choosen_batch){
        $sql = "SELECT base_n FROM t_r_uang_pembangunan where gelombang_pendaftaran_id = :choosen_batch AND jurusan_id = :jurusan_id";
        $result = Yii::$app->db->createCommand($sql, [
            ':choosen_batch' => $choosen_batch,
            ':jurusan_id' => self::getThirdMajor()['jurusan_id'],
        ])->queryOne();
        return $result['base_n'] ?? 0;
    }

}
?>