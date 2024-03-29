<?php
namespace app\models;
use Yii;
use yii\base\Model;
use Exception;
class StudentMajorForm extends Model
{
    public $gelombang;
    public $jurusan_main;
    public $jurusan_opsional; //todo: add more optional major
    public $jurusan_opsional2;
    public $pas_foto; public $file_photo;
    public function rules()
    {
        return [
            [['gelombang', 'jurusan_main'], 'required'],
            [['jurusan_opsional', 'jurusan_opsional2'], 'required'],
            ['jurusan_main', 'compare', 'compareAttribute' => 'jurusan_opsional', 'operator' => '!=', 
                'message' => 'Jurusan utama dan jurusan opsional tidak boleh sama'],
            ['jurusan_main', 'compare', 'compareAttribute' => 'jurusan_opsional2', 'operator' => '!=', 
                'message' => 'Jurusan utama dan jurusan opsional2 tidak boleh sama'],
            ['jurusan_opsional', 'compare', 'compareAttribute' => 'jurusan_opsional2', 'operator' => '!=', 
                'message' => 'Jurusan opsional 1 dan jurusan opsional 2 tidak boleh sama'],
            //rule for photo, must be image file
            [
                'file_photo',
                'file',
                'skipOnEmpty' => false,
                'extensions' => 'jpg,png,jpeg',
                'maxSize' => 1024*1024*1,
                'tooBig' => 'Ukuran file maksimal 1MB',
                'message' => 'Foto tidak boleh kosong'
            ],
            //rule for file photo 
            ['pas_foto','safe']
        ];
    }
    //fetch the major list from database, t_r_jurusan table
    public static function getMajorList()
    {
        $sql = "SELECT jurusan_id,nama FROM t_r_jurusan";
        $result = Yii::$app->db->createCommand($sql)->queryAll();
        $list = \yii\helpers\ArrayHelper::map($result, 'jurusan_id', 'nama');
        return $list;
    }
    //fetch the batch list from database, t_r_gelombang table
    public static function getBatchList()
    {
        //get current date y-m-d
        $current_date = date('Y-m-d');
        $sql = "SELECT mulai,berakhir,gelombang_pendaftaran_id,`desc` FROM t_r_gelombang_pendaftaran
            where '$current_date' BETWEEN mulai AND berakhir";
        $result = Yii::$app->db->createCommand($sql)->queryAll();
        $list = \yii\helpers\ArrayHelper::map($result, 'gelombang_pendaftaran_id', 'desc');
        return $list;
    }
    //insert the data to database, todo: need to be improved to handle error
    public function insertMajor(){
        if($this->validate())
        {
            try{
                $this->updateGelombang(); //update the gelombang
                $this->updateIndicator(); //update the indicator that the major is filled
                self::insertMajorList(); //insert the major list
                self::updatePasPhoto(); //update the pas photo
                self::counterBatch($this->gelombang); //update the counter
                return true;
            }catch(Exception $e){ //for debugging purpose, todo: need to be improved to handle error
                //flash message, failed to insert data
                Yii::$app->session->setFlash('error', 'Gagal menyimpan data, silahkan coba lagi');
            }
        }
        return false;
    }
    //check if the major is filled or not, make sure the modal dialog
    //only appear if the major is not filled yet, more clean database design!!!!
    public static function isFilledMajor(){
        $sql = "SELECT created_by from t_pendaftar WHERE pendaftar_id = :pendaftar_id";
        $params = [':pendaftar_id' => StudentDataDiriForm::getCurrentPendaftarId()];
        $result = Yii::$app->db->createCommand($sql, $params)->queryOne();        
        if($result['created_by'] == null)
            return false;
        return true;
    }
    //function to update gelombang, the behavior is different from major
    private function updateGelombang(){
        $sql = "UPDATE t_pendaftar SET gelombang_pendaftaran_id = :gelombang WHERE pendaftar_id = :pendaftar_id";
        $params = [':gelombang'=>$this->gelombang,':pendaftar_id'=>StudentDataDiriForm::getCurrentPendaftarId()];
        Yii::$app->db->createCommand($sql)->bindValues($params)->execute();
    }
    //update the indicator that the major is filled or batch is filled
    private function updateIndicator(){
        $sql = "UPDATE t_pendaftar SET created_by = :created_by WHERE pendaftar_id = :pendaftar_id";
        $params = [':created_by'=>Yii::$app->user->identity->username,':pendaftar_id'=>StudentDataDiriForm::getCurrentPendaftarId()];
        Yii::$app->db->createCommand($sql)->bindValues($params)->execute();
    }
    //insert all major list to database, todo: need to be improved to handle error
    private function insertMajorList() {
        $sql = "INSERT INTO t_pilihan_jurusan (pendaftar_id,jurusan_id,prioritas) 
            VALUES (:pendaftar_id,:jurusan_id,:prioritas)";
        $params = [':pendaftar_id'=>StudentDataDiriForm::getCurrentPendaftarId(),
            ':jurusan_id'=>$this->jurusan_main,':prioritas'=>1];
        Yii::$app->db->createCommand($sql)->bindValues($params)->execute();
        //since the jurusan_opsional is optional, we need to check if it is filled or not
        if($this->jurusan_opsional != null){
            $params = [':pendaftar_id'=>StudentDataDiriForm::getCurrentPendaftarId(),
                ':jurusan_id'=>$this->jurusan_opsional,':prioritas'=>2];
            Yii::$app->db->createCommand($sql)->bindValues($params)->execute();
        }
        //since the jurusan_opsional2 is optional, we need to check if it is filled or not
        if($this->jurusan_opsional2 != null){
            $params = [':pendaftar_id'=>StudentDataDiriForm::getCurrentPendaftarId(),
                ':jurusan_id'=>$this->jurusan_opsional2,':prioritas'=>3];
            Yii::$app->db->createCommand($sql)->bindValues($params)->execute();
        }
        //update pas_photo in t_pendaftar table
        $this->updatePasPhoto();
    }
    //update pas_photo in t_pendaftar table
    private function updatePasPhoto(){
        $sql = "UPDATE t_pendaftar SET pas_foto = :pas_foto WHERE pendaftar_id = :pendaftar_id";
        $params = [':pas_foto'=>$this->pas_foto,':pendaftar_id'=>StudentDataDiriForm::getCurrentPendaftarId()];
        Yii::$app->db->createCommand($sql)->bindValues($params)->execute();
    }
    //counterBatch : count total registered student
    private static function counterBatch($choosen_batch){
        $sql  = "SELECT counter from t_r_gelombang_pendaftaran where gelombang_pendaftaran_id = :gelombang_pendaftaran_id"; //get current counter
        $param = [':gelombang_pendaftaran_id'=>$choosen_batch];
        $result  = yii::$app->db->createCommand($sql,$param)->queryOne();
        $curr  = $result['counter'];
        //update no_pendaftaran, no_pendaftaran = counter +1, t_pendaftar
        $sql = "UPDATE t_pendaftar SET no_pendaftaran = :no_pendaftaran WHERE pendaftar_id = :pendaftar_id";
        $param = [':no_pendaftaran'=>$curr+1,':pendaftar_id'=>StudentDataDiriForm::getCurrentPendaftarId()];
        yii::$app->db->createCommand($sql)->bindValues($param)->execute();
        //update counter, counter+=1
        $sql = "UPDATE t_r_gelombang_pendaftaran SET counter = :counter WHERE gelombang_pendaftaran_id = :gelombang_pendaftaran_id";
        $param = [':counter'=>$curr+1,':gelombang_pendaftaran_id'=>$choosen_batch];
        yii::$app->db->createCommand($sql)->bindValues($param)->execute();
    }
}
?>