<?php
// Path: models/StudentDataOForm.php, this file is intended to be used as a model for parent information
// there is a possibility that the data member in this file will be changed in the future
namespace app\models;
use Exception;
use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;
class StudentDataOForm extends Model{
    //current available data members, may be added later
    public $nama_ayah_kandung;public $nama_ibu_kandung;public $nik_ayah;
    public $nik_ibu;public $tanggal_lahir_ayah;public $tanggal_lahir_ibu;
    public $pendidikan_ayah_id;public $pendidikan_ibu_id;public $alamat_orang_tua;
    public $kelurahan;
    public $alamat_prov_orangtua;public $alamat_kab_orangtua;
    public $alamat_kec_orangtua;
    public $kode_pos_orang_tua;public $no_hp_orangtua;
    public $pekerjaan_ayah_id;public $pekerjaan_ibu_id;public $penghasilan_ayah;
    public $penghasilan_ibu;
    //parent education list
    public  static $education = [
        //generate all available education level as key value pair
        1 => 'Tidak Sekolah',
        2 => 'SD',
        3 => 'SMP',
        4 => 'SMA',
        5 => 'D1',
        6 => 'D2',
        7 => 'D3',
        8 => 'D4',
        9 => 'S1',
        10 => 'S2',
        11 => 'S3',
    ];
    //using t_r_pendidikan table to fetch the data
    public static function education(){
        $sql = "SELECT * FROM t_r_jenjang_pendidikan";
        $data = Yii::$app->db->createCommand($sql)->queryAll();
        $data = \yii\helpers\ArrayHelper::map($data, 'jenjang_pendidikan_id', 'name');
        return $data;
    }

    public static function job(){
        $sql = "SELECT * FROM t_r_pekerjaan";
        $data = Yii::$app->db->createCommand($sql)->queryAll();
        $data = \yii\helpers\ArrayHelper::map($data, 'pekerjaan_id', 'nama');
        return $data;
    }
    //parent salary list
    public static $salary =[
        //generate all available salary as key value pair
        500000 => 'Kurang dari Rp. 500.000',
        1000000 => 'Rp. 500.000 - Rp. 999.999',
        2000000 => 'Rp. 1.000.000 - Rp. 1.999.999',
        4000000 => 'Rp. 2.000.000 - Rp. 3.999.999',
        6000000 => 'Rp. 5.000.000 - Rp. 7.000.000',
        10000000 => 'Rp. 7.000.000 - Rp. 10.000.000',
        20000000 => 'Lebih dari Rp. 20.000.000',
    ];
    //rules to validate the data using the above data members
    public function rules() {
        //rules for all data members, need more improvement
        //more test needed to ensure the data is valid
        return [
            [['nama_ayah_kandung','nama_ibu_kandung','tanggal_lahir_ayah','tanggal_lahir_ibu',
                'pendidikan_ayah_id', 'pendidikan_ibu_id','pekerjaan_ayah_id','pekerjaan_ibu_id',
                'penghasilan_ayah','penghasilan_ibu','alamat_prov_orangtua','alamat_kec_orangtua','alamat_kab_orangtua'
                ,'alamat_orang_tua',/*'keluruhan','provinsi','kabupaten','kecamatan,'*/'no_hp_orangtua',], 'required'],

            ['nik_ayah','string','min'=>16 , 'max'=>16,'message'=>'NIK harus 16 digit'],
            ['nik_ibu','string','min'=>16 , 'max'=>16,'message'=>'NIK harus 16 digit'],

            //['tgl_lahir_ayah','date','format'=>'yyyy-mm-dd','message'=>'Format tanggal lahir salah'],
            ['tanggal_lahir_ayah', 'date', 'format' => 'yyyy-mm-dd', 'message' => 'Format tanggal lahir salah'],

            ['tanggal_lahir_ibu','date','format'=>'yyyy-mm-dd','message'=>'Format tanggal lahir salah'],

            ['no_hp_orangtua','match','pattern'=>'/^[0-9]*$/','message'=>'No Telepon tidak boleh mengandung huruf'],
            ['no_hp_orangtua','string','min'=>11,'max'=>13,'message'=>'No Telepon harus 11-13 digit'],

            ['kode_pos_orang_tua','match','pattern'=>'/^[0-9]*$/','message'=>'Kode Pos tidak boleh mengandung huruf'],
            ['kode_pos_orang_tua','string','min'=>5,'max'=>5,'message'=>'Kode Pos harus 5 digit'],

            ['nama_ayah_kandung','match','pattern'=>'/^[a-zA-Z ]*$/','message'=>'Nama tidak boleh mengandung angka'],
            ['nama_ibu_kandung','match','pattern'=>'/^[a-zA-Z ]*$/','message'=>'Nama tidak boleh mengandung angka'],
            //rules for salary
        ];
    }
    //method for saving data personal information to database, todo : exception handler for saving data
    //passing argument $id to this method, this argument is the id of student is mandatory (todo)
    public function insertDataOTua(){
            //check if the user_id already exists in table t_pendaftar
            if($this->validate())
            {
                try{
                    if(!StudentDataDiriForm::userIdExists()){
                        //insert user_id to table t_pendaftar, avoid duplicate since the user_id on t_pendaftar not primary key
                        Yii::$app->db->createCommand()->insert('t_pendaftar',
                            ['user_id'=>StudentDataDiriForm::getCurrentUserId()])->execute();
                    }
                    //update data to table t_pendaftar 
                    Yii::$app->db->createCommand()->update('t_pendaftar',[

                        'nama_ayah_kandung'=>$this->nama_ayah_kandung,
                        'nama_ibu_kandung'=>$this->nama_ibu_kandung,
                        'nik_ayah'=>$this->nik_ayah,
                        'nik_ibu'=>$this->nik_ibu,
                        'tanggal_lahir_ayah'=>$this->tanggal_lahir_ayah,
                        'tanggal_lahir_ibu'=>$this->tanggal_lahir_ibu,

                        'pendidikan_ayah_id'=>$this->pendidikan_ayah_id,
                        'pendidikan_ibu_id'=>$this->pendidikan_ibu_id,
                        'alamat_orang_tua'=>$this->alamat_orang_tua,

                        'kode_pos_orang_tua'=>$this->kode_pos_orang_tua,
                        'pekerjaan_ayah_id'=>$this->pekerjaan_ayah_id,
                        'pekerjaan_ibu_id'=>$this->pekerjaan_ibu_id,
                        'penghasilan_ayah'=>$this->penghasilan_ayah,
                        'penghasilan_ibu'=>$this->penghasilan_ibu,
                        'no_hp_orangtua'=>$this->no_hp_orangtua,
                        
                        'alamat_kec_orangtua'=>$this->alamat_kec_orangtua,
                        'alamat_prov_orangtua'=>$this->alamat_prov_orangtua,

                        //'alamat_kel_orangtua'=>$this->kelurahan,
                        'alamat_kab_orangtua'=>$this->alamat_kab_orangtua,
                    ],
                    //condition : user_id from the current logged in user using getCurrentUserId() method
                    'user_id = '.StudentDataDiriForm::getCurrentUserId())->execute();
                    //Yii::$app->session->setFlash('success', 'Data orang tua berhasil disimpan');
                    self::updateTotalIncome(); //update total income
                    return true;
                }catch(Exception $e){ //for debugging purpose
                    //set error flash message
                    Yii::$app->session->setFlash('error', "Something went wrong, please contact the administrator or try again later");
                    //echo $e->getMessage();
                }
            }
            return false; //return false if validation failed
    }
    public static function isFillDataOTua(){
            //sql command to check whether the user_id is already exist in the table t_pendaftar
        $sql = "SELECT nama_ayah_kandung FROM t_pendaftar WHERE user_id = ".StudentDataDiriForm::getCurrentUserId();
            //execute the sql command
        $result = Yii::$app->db->createCommand($sql)->queryOne();
        //if the user_id is already exist, return true
        if($result['nama_ayah_kandung'] != null){
            return true;
        }
        //if the user_id is not yet exist, return false
        return false;
    }
    //populating the data to the form data orang tua
    public static function findDataOTua(){
        $sql = "SELECT * FROM t_pendaftar WHERE user_id = ".StudentDataDiriForm::getCurrentUserId();
        $data = Yii::$app->db->createCommand($sql)->queryOne();
        if($data !== false){
            $model  = new self();
            $model->setAttributes($data, false); //populated the data to the form
            return $model;
        }
        return null;
    }
    //update total income from parent, total = $father + $mother
    private function updateTotalIncome(){
        $sql = "UPDATE t_pendaftar SET penghasilan_total = penghasilan_ayah + penghasilan_ibu WHERE user_id = 
            ".StudentDataDiriForm::getCurrentUserId();
        Yii::$app->db->createCommand($sql)->execute();
    }

}

?>