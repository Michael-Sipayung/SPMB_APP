<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "t_calon_mahasiswa".
 *
 * @property int|null $cis_imported
 * @property int $calon_mahasiswa_id
 * @property int $pendaftar_id
 * @property int $jalur_pendaftaran_id
 * @property int $jurusan_id
 * @property int $user_id
 * @property string|null $nik
 * @property string|null $nisn
 * @property string|null $no_kps
 * @property string|null $nama
 * @property int $jenis_kelamin_id
 * @property int $golongan_darah_id
 * @property string|null $tanggal_lahir
 * @property string|null $tempat_lahir
 * @property int $agama_id
 * @property int|null $anak_ke
 * @property int|null $jumlah_bersaudara
 * @property int|null $jumlah_tanggungan_ortu
 * @property string|null $alamat
 * @property string|null $kode_pos
 * @property string|null $kelurahan
 * @property int|null $alamat_kec
 * @property string|null $no_telepon_rumah
 * @property string|null $no_telepon_mobile
 * @property string|null $email
 * @property string|null $nama_ayah_kandung
 * @property string|null $nama_ibu_kandung
 * @property string|null $nik_ayah
 * @property string|null $nik_ibu
 * @property string|null $tanggal_lahir_ayah
 * @property string|null $tanggal_lahir_ibu
 * @property int|null $pendidikan_ayah_id
 * @property int|null $pendidikan_ibu_id
 * @property string|null $alamat_orang_tua
 * @property string|null $kode_pos_orang_tua
 * @property int|null $pekerjaan_ayah_id
 * @property string|null $keterangan_pekerjaan_ayah
 * @property int|null $pekerjaan_ibu_id
 * @property string|null $keterangan_pekerjaan_ibu
 * @property int|null $penghasilan_ayah
 * @property int|null $penghasilan_ibu
 * @property int|null $penghasilan_total
 * @property string|null $no_telepon_mobile_ayah
 * @property string|null $no_telepon_mobile_ibu
 * @property string|null $nama_wali
 * @property string|null $no_hp_wali
 * @property int|null $pekerjaan_wali_id
 * @property string|null $keterangan_pekerjaan_wali
 * @property int|null $penghasilan_wali
 * @property int $sekolah_id
 * @property string|null $jurusan_sekolah
 * @property int $informasi_del_id
 * @property string|null $informasi_del_lainnya
 * @property int|null $n
 * @property string|null $nim
 * @property int|null $status_pembayaran
 * @property float|null $total_pembayaran
 * @property string|null $virtual_account_number
 * @property string|null $bank_name
 * @property string|null $pas_foto
 * @property string|null $berkas_pendaftaran_ulang
 * @property string|null $u_cr
 * @property string|null $ip_cr
 * @property string|null $d_cr
 * @property string|null $u_up
 * @property string|null $ip_up
 * @property string|null $d_up
 * @property int|null $jurusan_sekolah_id
 * @property string|null $no_hp_orangtua
 * @property int|null $sekolah_dapodik_id
 * @property string|null $created_at
 * @property string|null $created_by
 * @property string|null $updated_at
 * @property string|null $updated_by
 * @property string|null $deleted_at
 * @property string|null $deleted_by
 */
class CalonMahasiswa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 't_calon_mahasiswa';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cis_imported', 'pendaftar_id', 'jalur_pendaftaran_id', 'jurusan_id', 'user_id', 'jenis_kelamin_id', 'golongan_darah_id', 'agama_id', 'anak_ke', 'jumlah_bersaudara', 'jumlah_tanggungan_ortu', 'alamat_kec', 'pendidikan_ayah_id', 'pendidikan_ibu_id', 'pekerjaan_ayah_id', 'pekerjaan_ibu_id', 'penghasilan_ayah', 'penghasilan_ibu', 'penghasilan_total', 'pekerjaan_wali_id', 'penghasilan_wali', 'sekolah_id', 'informasi_del_id', 'n', 'status_pembayaran', 'jurusan_sekolah_id', 'sekolah_dapodik_id'], 'integer'],
            [['pendaftar_id', 'jalur_pendaftaran_id', 'jurusan_id', 'user_id', 'jenis_kelamin_id', 'golongan_darah_id', 'agama_id', 'sekolah_id', 'informasi_del_id'], 'required'],
            [['tanggal_lahir', 'tanggal_lahir_ayah', 'tanggal_lahir_ibu', 'd_cr', 'd_up', 'created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['alamat', 'alamat_orang_tua', 'informasi_del_lainnya'], 'string'],
            [['total_pembayaran'], 'number'],
            [['nik', 'nik_ayah', 'nik_ibu'], 'string', 'max' => 16],
            [['nisn'], 'string', 'max' => 10],
            [['no_kps', 'virtual_account_number', 'created_by', 'updated_by', 'deleted_by'], 'string', 'max' => 100],
            [['nama', 'tempat_lahir', 'email', 'nama_ayah_kandung', 'jurusan_sekolah', 'pas_foto', 'berkas_pendaftaran_ulang', 'u_cr', 'u_up'], 'string', 'max' => 128],
            [['kode_pos', 'no_telepon_rumah', 'no_telepon_mobile', 'nama_ibu_kandung', 'kode_pos_orang_tua', 'no_telepon_mobile_ayah', 'no_telepon_mobile_ibu', 'nama_wali', 'no_hp_wali', 'nim', 'ip_cr', 'ip_up', 'no_hp_orangtua'], 'string', 'max' => 45],
            [['kelurahan'], 'string', 'max' => 32],
            [['keterangan_pekerjaan_ayah', 'keterangan_pekerjaan_ibu', 'keterangan_pekerjaan_wali'], 'string', 'max' => 255],
            [['bank_name'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'cis_imported' => 'Cis Imported',
            'calon_mahasiswa_id' => 'Calon Mahasiswa ID',
            'pendaftar_id' => 'Pendaftar ID',
            'jalur_pendaftaran_id' => 'Jalur Pendaftaran ID',
            'jurusan_id' => 'Jurusan ID',
            'user_id' => 'User ID',
            'nik' => 'Nik',
            'nisn' => 'Nisn',
            'no_kps' => 'No Kps',
            'nama' => 'Nama',
            'jenis_kelamin_id' => 'Jenis Kelamin ID',
            'golongan_darah_id' => 'Golongan Darah ID',
            'tanggal_lahir' => 'Tanggal Lahir',
            'tempat_lahir' => 'Tempat Lahir',
            'agama_id' => 'Agama ID',
            'anak_ke' => 'Anak Ke',
            'jumlah_bersaudara' => 'Jumlah Bersaudara',
            'jumlah_tanggungan_ortu' => 'Jumlah Tanggungan Ortu',
            'alamat' => 'Alamat',
            'kode_pos' => 'Kode Pos',
            'kelurahan' => 'Kelurahan',
            'alamat_kec' => 'Alamat Kec',
            'no_telepon_rumah' => 'No Telepon Rumah',
            'no_telepon_mobile' => 'No Telepon Mobile',
            'email' => 'Email',
            'nama_ayah_kandung' => 'Nama Ayah Kandung',
            'nama_ibu_kandung' => 'Nama Ibu Kandung',
            'nik_ayah' => 'Nik Ayah',
            'nik_ibu' => 'Nik Ibu',
            'tanggal_lahir_ayah' => 'Tanggal Lahir Ayah',
            'tanggal_lahir_ibu' => 'Tanggal Lahir Ibu',
            'pendidikan_ayah_id' => 'Pendidikan Ayah ID',
            'pendidikan_ibu_id' => 'Pendidikan Ibu ID',
            'alamat_orang_tua' => 'Alamat Orang Tua',
            'kode_pos_orang_tua' => 'Kode Pos Orang Tua',
            'pekerjaan_ayah_id' => 'Pekerjaan Ayah ID',
            'keterangan_pekerjaan_ayah' => 'Keterangan Pekerjaan Ayah',
            'pekerjaan_ibu_id' => 'Pekerjaan Ibu ID',
            'keterangan_pekerjaan_ibu' => 'Keterangan Pekerjaan Ibu',
            'penghasilan_ayah' => 'Penghasilan Ayah',
            'penghasilan_ibu' => 'Penghasilan Ibu',
            'penghasilan_total' => 'Penghasilan Total',
            'no_telepon_mobile_ayah' => 'No Telepon Mobile Ayah',
            'no_telepon_mobile_ibu' => 'No Telepon Mobile Ibu',
            'nama_wali' => 'Nama Wali',
            'no_hp_wali' => 'No Hp Wali',
            'pekerjaan_wali_id' => 'Pekerjaan Wali ID',
            'keterangan_pekerjaan_wali' => 'Keterangan Pekerjaan Wali',
            'penghasilan_wali' => 'Penghasilan Wali',
            'sekolah_id' => 'Sekolah ID',
            'jurusan_sekolah' => 'Jurusan Sekolah',
            'informasi_del_id' => 'Informasi Del ID',
            'informasi_del_lainnya' => 'Informasi Del Lainnya',
            'n' => 'N',
            'nim' => 'Nim',
            'status_pembayaran' => 'Status Pembayaran',
            'total_pembayaran' => 'Total Pembayaran',
            'virtual_account_number' => 'Virtual Account Number',
            'bank_name' => 'Bank Name',
            'pas_foto' => 'Pas Foto',
            'berkas_pendaftaran_ulang' => 'Berkas Pendaftaran Ulang',
            'u_cr' => 'U Cr',
            'ip_cr' => 'Ip Cr',
            'd_cr' => 'D Cr',
            'u_up' => 'U Up',
            'ip_up' => 'Ip Up',
            'd_up' => 'D Up',
            'jurusan_sekolah_id' => 'Jurusan Sekolah ID',
            'no_hp_orangtua' => 'No Hp Orangtua',
            'sekolah_dapodik_id' => 'Sekolah Dapodik ID',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'deleted_at' => 'Deleted At',
            'deleted_by' => 'Deleted By',
        ];
    }

    public function getPendaftar(){
        return $this->hasOne(Pendaftar::className(), ['pendaftar_id' => 'pendaftar_id']);
    }

    public function getJurusan(){
        return $this->hasOne(Jurusan::className(), ['jurusan_id' => 'jurusan_id']);
    }

    public static function getStatusTagihanPenulang(){
        $pendaftar_id = StudentDataDiriForm::getCurrentPendaftarId();
        $calon_mahasiswa = CalonMahasiswa::find()->where(['pendaftar_id' => $pendaftar_id])->one();
        if(isset($calon_mahasiswa)){
            $user_reg_number = UserRegistrationNumber::find()->where(['registration_number' => $calon_mahasiswa->pendaftar->getKodePendaftaran()])->one();
            $payment = Payment::find()->where(['user_id' => $user_reg_number->user_id, 'is_spmb' => 1, 'deleted' => 0])->one();
            if(isset($payment)){
                if($payment->payment_status_key === 'PAID_OFF'){
                    return true;
                }               
            }
        }
        return false;
    }
}
