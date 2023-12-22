<?php
namespace app\models;
use Yii;
use yii\base\Model;
use Exception;
class StudentBahasaForm extends Model{
    public $kemampuan_bahasa_inggris; 
    public $bahasa_asing_lainnya;
    public $kemampuan_bahasa_asing_lainnya;
    //rules for handling input data from user
    public function rules(){
        return [
            [['kemampuan_bahasa_inggris'], 'required'],
            [['kemampuan_bahasa_inggris'], 'string', 'max' => 255],
            [['bahasa_asing_lainnya','kemampuan_bahasa_asing_lainnya'], 'string', 'max' => 255],
        ];
    }
    //generate list of english ability
    public static array $english_ability = [
        1 => 'Kurang',
        2 => 'Cukup',
        3 => 'Baik',
    ];
    //populate english ability data from database to form
    public static function english_ability(){
        $sql = "select kemampuan_bahasa_id, `desc` from t_r_kemampuan_bahasa";
        $data = Yii::$app->db->createCommand($sql)->queryAll();
        $data = array_column($data, 'desc', 'kemampuan_bahasa_id');
        return $data;
    }
    //update bahasa to table t_pendaftar
    public function updateBahasa(){
        //update data to table t_pendaftar 
        Yii::$app->db->createCommand()->update('t_pendaftar',[
            'kemampuan_bahasa_inggris'=>$this->kemampuan_bahasa_inggris,
            'bahasa_asing_lainnya'=>$this->bahasa_asing_lainnya,
            'kemampuan_bahasa_asing_lainnya'=>$this->kemampuan_bahasa_asing_lainnya
        ],
        //condition : user_id from the current logged in user using getCurrentUserId() method
        'user_id = '.StudentDataDiriForm::getCurrentUserId())->execute();
    }
    //generate list of non english language
    public static array $non_english_list= [
        'Jerman' => 'Jerman',
        'Jepang' => 'Jepang',
        'Mandarin' => 'Mandarin',
        'Perancis' => 'Perancis',
        'Rusia' => 'Rusia',
        'Spanyol' => 'Spanyol',
        'Lainnya' => 'Lainnya',
    ];
    //insert bahasa data to database
    public function insertBahasaData(){
        //validate the input data
        if($this->validate()){
            try{
                if(!StudentDataDiriForm::userIdExists()){
                    //insert user_id to table t_pendaftar, avoid duplicate since the user_id on t_pendaftar not primary key
                    Yii::$app->db->createCommand()->insert('t_pendaftar', 
                    ['user_id'=>StudentDataDiriForm::getCurrentUserId()])->execute();
                }
                //update bahasa to t_pendaftar
                self::updateBahasa();
                //flash message if the data is successfully inserted to database
                return true;
            }catch(Exception $e) {
                //flash message if the data is failed to be inserted to database
                Yii::$app->session->setFlash('error', "Data Bahasa Gagal Disimpan");
                echo $e->getMessage();
            }
        }
        return false;
        //sql command to insert bahasa data to database
    }
    //function to check if the data bahasa is filled
    public static function isFillDataBahasa(){
        //sql command to check whether the user_id is already exist in the table t_pendaftar
        $sql = "SELECT kemampuan_bahasa_inggris FROM t_pendaftar WHERE user_id = ".StudentDataDiriForm::getCurrentUserId();
        //execute the sql command
        $result = Yii::$app->db->createCommand($sql)->queryOne();
        //if the user_id is already exist, return true
        if($result['kemampuan_bahasa_inggris'] != null){
            return true;
        }
        //if the user_id is not yet exist, return false
        return false;
    }
    //populate data from database to form
    public static function findDataBahasa(){
        $sql = "SELECT * FROM t_pendaftar WHERE user_id = ".StudentDataDiriForm::getCurrentUserId();
        $data = Yii::$app->db->createCommand($sql)->queryOne();
        if($data !== false){
            $model  = new self();
            $model->setAttributes($data, false); //populated the data to the form
            return $model;
        }
        return null;
    }
}

?>