<?php 
namespace app\models;
use Exception;
use Yii;
use yii\base\Model;
class StudentAnnouncement extends Model{
    //populate the data from database, case student nam
    public static function identityName(){
        try{
            $sql = "SELECT nama FROM t_pendaftar WHERE pendaftar_id = :pendaftar_id";
            $params = [':pendaftar_id' => StudentDataDiriForm::getCurrentPendaftarId()];
            $result = Yii::$app->db->createCommand($sql)->bindValues($params)->queryOne();
            return $result ? $result['nama'] : "N/A";
        }catch(Exception $e){
            echo $e->getMessage(); //for debugging purpose, todo: need to be improved to handle error
        }
    }
    //populate the data from database, case student gelombang
    public static function identityGelombang(){
        try{
            $sql = "SELECT gelombang_pendaftaran_id FROM t_pendaftar WHERE pendaftar_id = :pendaftar_id";
            $params = [':pendaftar_id' => StudentDataDiriForm::getCurrentPendaftarId()];
            $result = Yii::$app->db->createCommand($sql)->bindValues($params)->queryOne();
            $sql = "SELECT `desc` FROM t_r_gelombang_pendaftaran WHERE gelombang_pendaftaran_id = :gelombang_pendaftaran_id";
            $params = [':gelombang_pendaftaran_id' => $result['gelombang_pendaftaran_id']];
            $result = Yii::$app->db->createCommand($sql)->bindValues($params)->queryOne();
            return $result ? $result['desc'] : "N/A";
            //return $result ? $result['gelombang_pendaftaran_id'] : "N/A";
        }catch(Exception $e){
            echo $e->getMessage(); //for debugging purpose, todo: need to be improved to handle error
        }
    }
    //populate the data from database, case student major 1
    public static function identityMajor1(){
        try{
            $sql = "SELECT jurusan_id FROM t_pilihan_jurusan WHERE pendaftar_id = :pendaftar_id AND prioritas = 1";
            $params = [':pendaftar_id' => StudentDataDiriForm::getCurrentPendaftarId()];
            $result = Yii::$app->db->createCommand($sql)->bindValues($params)->queryOne();
            $sql = "SELECT nama FROM t_r_jurusan WHERE jurusan_id = :jurusan_id";
            $params = [':jurusan_id' => $result['jurusan_id']];
            $result = Yii::$app->db->createCommand($sql)->bindValues($params)->queryOne();
            return $result ? $result['nama'] : "N/A";
            //return $result ? $result['jurusan_id'] : "N/A";
        }catch(Exception $e){
            echo $e->getMessage(); //for debugging purpose, todo: need to be improved to handle error
        }
    }
    //populate the data from database, case student major 2
    public static function identityMajor2(){
        try{
            $sql = "SELECT jurusan_id FROM t_pilihan_jurusan WHERE pendaftar_id = :pendaftar_id AND prioritas = 2";
            $params = [':pendaftar_id' => StudentDataDiriForm::getCurrentPendaftarId()];
            $result = Yii::$app->db->createCommand($sql)->bindValues($params)->queryOne();
            $sql = "SELECT nama FROM t_r_jurusan WHERE jurusan_id = :jurusan_id";
            $params = [':jurusan_id' => $result['jurusan_id']];
            $result = Yii::$app->db->createCommand($sql)->bindValues($params)->queryOne();
            return $result ? $result['nama'] : "N/A";
            //return $result ? $result['jurusan_id'] : "N/A";
        }catch(Exception $e){
            echo $e->getMessage(); //for debugging purpose, todo: need to be improved to handle error
        }
    }
    //populate the data from database, case student major 3
    public static function identityMajor3(){
        try{
            $sql = "SELECT jurusan_id FROM t_pilihan_jurusan WHERE pendaftar_id = :pendaftar_id AND prioritas = 3";
            $params = [':pendaftar_id' => StudentDataDiriForm::getCurrentPendaftarId()];
            $result = Yii::$app->db->createCommand($sql)->bindValues($params)->queryOne();
            $sql = "SELECT nama FROM t_r_jurusan WHERE jurusan_id = :jurusan_id";
            $params = [':jurusan_id' => $result['jurusan_id']];
            $result = Yii::$app->db->createCommand($sql)->bindValues($params)->queryOne();
            return $result ? $result['nama'] : "N/A";
            //return $result ? $result['jurusan_id'] : "N/A";
        }catch(Exception $e){
            echo $e->getMessage(); //for debugging purpose, todo: need to be improved to handle error
        }
    }
    //populate the data from database, case student status
    public static function identityCurrentStatus(){
        return "N/A";
    }
    //populate the data from database, case student next test
    public static function identityNextTest(){
        return "N/A";
    }
    //populate the data from database, case student schedule
    public static function identitySchedule(){
        return "N/A";
    }
    //populate the data from database, case student location
    public static function identityLocation(){
        return "N/A";
    }
    //populate the data from database, case student username
    public static function identityUsername(){
        return "N/A";
    }
    //populate the data from database, case student password
    public static function identityPassword(){
        return "N/A";
    }
    //populate the data from database, case student other information
    public static function identityOtherInformation(){
        return "N/A";
    }

}