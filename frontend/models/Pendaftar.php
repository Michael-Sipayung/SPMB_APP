<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "t_pendaftar".
 *
 * @property int $pendaftar_id
 * @property int $jalur_pendaftaran_id
 * @property int $user_id
 * @property string|null $no_peserta
 * @property string|null $nik
 * @property string|null $nisn
 * @property int|null $penerima_kps
 * @property string|null $no_kps
 * @property string|null $nama
 * @property int $jenis_kelamin_id
 * @property string|null $tanggal_lahir
 * @property string|null $tempat_lahir
 * @property int $agama_id
 * @property string|null $alamat
 * @property string|null $kode_pos
 * @property string|null $kelurahan
 * @property int|null $alamat_kec
 * @property int|null $alamat_kab
 * @property int|null $alamat_prov
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
 * @property int|null $alamat_kec_orangtua
 * @property int|null $alamat_kab_orangtua
 * @property int|null $alamat_prov_orangtua
 * @property string|null $alamat_orang_tua
 * @property string|null $kode_pos_orang_tua
 * @property int|null $pekerjaan_ayah_id
 * @property int|null $pekerjaan_ibu_id
 * @property int|null $penghasilan_ayah
 * @property int|null $penghasilan_ibu
 * @property int|null $penghasilan_total
 * @property int $sekolah_id
 * @property string|null $jurusan_sekolah
 * @property string|null $akreditasi_sekolah
 * @property int|null $jumlah_pelajaran_sem_1
 * @property int|null $jumlah_nilai_sem_1
 * @property int|null $jumlah_pelajaran_sem_2
 * @property int|null $jumlah_nilai_sem_2
 * @property int|null $jumlah_pelajaran_sem_3
 * @property int|null $jumlah_nilai_sem_3
 * @property int|null $jumlah_pelajaran_sem_4
 * @property int|null $jumlah_nilai_sem_4
 * @property int|null $jumlah_pelajaran_sem_5
 * @property int|null $jumlah_nilai_sem_5
 * @property int|null $jumlah_pelajaran_sem_6
 * @property int|null $jumlah_nilai_sem_6
 * @property int|null $jumlah_pelajaran_un
 * @property int|null $jumlah_nilai_un
 * @property int|null $kemampuan_bahasa_inggris
 * @property string|null $bahasa_asing_lainnya
 * @property int|null $kemampuan_bahasa_asing_lainnya
 * @property int $informasi_del_id
 * @property string|null $informasi_del_lainnya
 * @property int|null $n
 * @property string|null $tanggal_pendaftaran
 * @property int|null $metode_pembayaran_id
 * @property string|null $file_verifikasi_pembayaran
 * @property string|null $pas_foto
 * @property string|null $file_nilai_rapor
 * @property string|null $file_sertifikat
 * @property string|null $file_formulir
 * @property string|null $file_rekomendasi
 * @property string|null $prefix_kode_pendaftaran
 * @property int|null $no_pendaftaran
 * @property int $status_pendaftaran_id
 * @property int|null $status_wawancara_id
 * @property int|null $status_adminstrasi_id
 * @property int $status_test_akademik_id
 * @property int $status_test_psikologi_id
 * @property int $status_kelulusan
 * @property int $gelombang_pendaftaran_id
 * @property int $lokasi_ujian_id
 * @property int|null $kode_ujian_id
 * @property string|null $u_cr
 * @property string|null $ip_cr
 * @property string|null $d_cr
 * @property string|null $u_up
 * @property string|null $ip_up
 * @property string|null $d_up
 * @property int|null $jurusan_sekolah_id
 * @property int|null $sekolah_dapodik_id
 * @property string|null $no_hp_orangtua
 * @property string|null $no_npwp
 * @property int|null $kebutuhan_khusus_mahasiswa
 * @property string|null $motivasi
 * @property string|null $hobby
 * @property string|null $kab_domisili
 * @property string|null $virtual_account
 * @property string|null $voucher_daftar
 * @property string|null $created_at
 * @property string|null $created_by
 * @property string|null $updated_at
 * @property string|null $updated_by
 * @property string|null $deleted_at
 * @property string|null $deleted_by
 */
class Pendaftar extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 't_pendaftar';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['jalur_pendaftaran_id', 'user_id', 'jenis_kelamin_id', 'agama_id', 'sekolah_id', 'informasi_del_id', 'gelombang_pendaftaran_id', 'lokasi_ujian_id'], 'required'],
            [['jalur_pendaftaran_id', 'user_id', 'penerima_kps', 'jenis_kelamin_id', 'agama_id', 'alamat_kec', 'alamat_kab', 'alamat_prov', 'pendidikan_ayah_id', 'pendidikan_ibu_id', 'alamat_kec_orangtua', 'alamat_kab_orangtua', 'alamat_prov_orangtua', 'pekerjaan_ayah_id', 'pekerjaan_ibu_id', 'penghasilan_ayah', 'penghasilan_ibu', 'penghasilan_total', 'sekolah_id', 'jumlah_pelajaran_sem_1', 'jumlah_nilai_sem_1', 'jumlah_pelajaran_sem_2', 'jumlah_nilai_sem_2', 'jumlah_pelajaran_sem_3', 'jumlah_nilai_sem_3', 'jumlah_pelajaran_sem_4', 'jumlah_nilai_sem_4', 'jumlah_pelajaran_sem_5', 'jumlah_nilai_sem_5', 'jumlah_pelajaran_sem_6', 'jumlah_nilai_sem_6', 'jumlah_pelajaran_un', 'jumlah_nilai_un', 'kemampuan_bahasa_inggris', 'kemampuan_bahasa_asing_lainnya', 'informasi_del_id', 'n', 'metode_pembayaran_id', 'no_pendaftaran', 'status_pendaftaran_id', 'status_wawancara_id', 'status_adminstrasi_id', 'status_test_akademik_id', 'status_test_psikologi_id', 'status_kelulusan', 'gelombang_pendaftaran_id', 'lokasi_ujian_id', 'kode_ujian_id', 'jurusan_sekolah_id', 'sekolah_dapodik_id', 'kebutuhan_khusus_mahasiswa'], 'integer'],
            [['tanggal_lahir', 'tanggal_lahir_ayah', 'tanggal_lahir_ibu', 'tanggal_pendaftaran', 'd_cr', 'd_up', 'created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['alamat', 'alamat_orang_tua', 'informasi_del_lainnya', 'motivasi'], 'string'],
            [['no_peserta', 'kelurahan', 'no_npwp'], 'string', 'max' => 32],
            [['nik', 'nik_ayah', 'nik_ibu'], 'string', 'max' => 16],
            [['nisn', 'prefix_kode_pendaftaran'], 'string', 'max' => 10],
            [['no_kps', 'akreditasi_sekolah', 'kab_domisili', 'virtual_account', 'voucher_daftar', 'created_by', 'updated_by', 'deleted_by'], 'string', 'max' => 100],
            [['nama', 'tempat_lahir', 'email', 'nama_ayah_kandung', 'jurusan_sekolah', 'file_verifikasi_pembayaran', 'pas_foto', 'file_nilai_rapor', 'file_sertifikat', 'file_formulir', 'file_rekomendasi', 'u_cr', 'u_up'], 'string', 'max' => 128],
            [['kode_pos', 'no_telepon_rumah', 'no_telepon_mobile', 'nama_ibu_kandung', 'kode_pos_orang_tua', 'bahasa_asing_lainnya', 'ip_cr', 'ip_up', 'no_hp_orangtua'], 'string', 'max' => 45],
            [['hobby'], 'string', 'max' => 235],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'pendaftar_id' => 'Pendaftar ID',
            'jalur_pendaftaran_id' => 'Jalur Pendaftaran ID',
            'user_id' => 'User ID',
            'no_peserta' => 'No Peserta',
            'nik' => 'Nik',
            'nisn' => 'Nisn',
            'penerima_kps' => 'Penerima Kps',
            'no_kps' => 'No Kps',
            'nama' => 'Nama',
            'jenis_kelamin_id' => 'Jenis Kelamin ID',
            'tanggal_lahir' => 'Tanggal Lahir',
            'tempat_lahir' => 'Tempat Lahir',
            'agama_id' => 'Agama ID',
            'alamat' => 'Alamat',
            'kode_pos' => 'Kode Pos',
            'kelurahan' => 'Kelurahan',
            'alamat_kec' => 'Alamat Kec',
            'alamat_kab' => 'Alamat Kab',
            'alamat_prov' => 'Alamat Prov',
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
            'alamat_kec_orangtua' => 'Alamat Kec Orangtua',
            'alamat_kab_orangtua' => 'Alamat Kab Orangtua',
            'alamat_prov_orangtua' => 'Alamat Prov Orangtua',
            'alamat_orang_tua' => 'Alamat Orang Tua',
            'kode_pos_orang_tua' => 'Kode Pos Orang Tua',
            'pekerjaan_ayah_id' => 'Pekerjaan Ayah ID',
            'pekerjaan_ibu_id' => 'Pekerjaan Ibu ID',
            'penghasilan_ayah' => 'Penghasilan Ayah',
            'penghasilan_ibu' => 'Penghasilan Ibu',
            'penghasilan_total' => 'Penghasilan Total',
            'sekolah_id' => 'Sekolah ID',
            'jurusan_sekolah' => 'Jurusan Sekolah',
            'akreditasi_sekolah' => 'Akreditasi Sekolah',
            'jumlah_pelajaran_sem_1' => 'Jumlah Pelajaran Sem 1',
            'jumlah_nilai_sem_1' => 'Jumlah Nilai Sem 1',
            'jumlah_pelajaran_sem_2' => 'Jumlah Pelajaran Sem 2',
            'jumlah_nilai_sem_2' => 'Jumlah Nilai Sem 2',
            'jumlah_pelajaran_sem_3' => 'Jumlah Pelajaran Sem 3',
            'jumlah_nilai_sem_3' => 'Jumlah Nilai Sem 3',
            'jumlah_pelajaran_sem_4' => 'Jumlah Pelajaran Sem 4',
            'jumlah_nilai_sem_4' => 'Jumlah Nilai Sem 4',
            'jumlah_pelajaran_sem_5' => 'Jumlah Pelajaran Sem 5',
            'jumlah_nilai_sem_5' => 'Jumlah Nilai Sem 5',
            'jumlah_pelajaran_sem_6' => 'Jumlah Pelajaran Sem 6',
            'jumlah_nilai_sem_6' => 'Jumlah Nilai Sem 6',
            'jumlah_pelajaran_un' => 'Jumlah Pelajaran Un',
            'jumlah_nilai_un' => 'Jumlah Nilai Un',
            'kemampuan_bahasa_inggris' => 'Kemampuan Bahasa Inggris',
            'bahasa_asing_lainnya' => 'Bahasa Asing Lainnya',
            'kemampuan_bahasa_asing_lainnya' => 'Kemampuan Bahasa Asing Lainnya',
            'informasi_del_id' => 'Informasi Del ID',
            'informasi_del_lainnya' => 'Informasi Del Lainnya',
            'n' => 'N',
            'tanggal_pendaftaran' => 'Tanggal Pendaftaran',
            'metode_pembayaran_id' => 'Metode Pembayaran ID',
            'file_verifikasi_pembayaran' => 'File Verifikasi Pembayaran',
            'pas_foto' => 'Pas Foto',
            'file_nilai_rapor' => 'File Nilai Rapor',
            'file_sertifikat' => 'File Sertifikat',
            'file_formulir' => 'File Formulir',
            'file_rekomendasi' => 'File Rekomendasi',
            'prefix_kode_pendaftaran' => 'Prefix Kode Pendaftaran',
            'no_pendaftaran' => 'No Pendaftaran',
            'status_pendaftaran_id' => 'Status Pendaftaran ID',
            'status_wawancara_id' => 'Status Wawancara ID',
            'status_adminstrasi_id' => 'Status Adminstrasi ID',
            'status_test_akademik_id' => 'Status Test Akademik ID',
            'status_test_psikologi_id' => 'Status Test Psikologi ID',
            'status_kelulusan' => 'Status Kelulusan',
            'gelombang_pendaftaran_id' => 'Gelombang Pendaftaran ID',
            'lokasi_ujian_id' => 'Lokasi Ujian ID',
            'kode_ujian_id' => 'Kode Ujian ID',
            'u_cr' => 'U Cr',
            'ip_cr' => 'Ip Cr',
            'd_cr' => 'D Cr',
            'u_up' => 'U Up',
            'ip_up' => 'Ip Up',
            'd_up' => 'D Up',
            'jurusan_sekolah_id' => 'Jurusan Sekolah ID',
            'sekolah_dapodik_id' => 'Sekolah Dapodik ID',
            'no_hp_orangtua' => 'No Hp Orangtua',
            'no_npwp' => 'No Npwp',
            'kebutuhan_khusus_mahasiswa' => 'Kebutuhan Khusus Mahasiswa',
            'motivasi' => 'Motivasi',
            'hobby' => 'Hobby',
            'kab_domisili' => 'Kab Domisili',
            'virtual_account' => 'Virtual Account',
            'voucher_daftar' => 'Voucher Daftar',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'deleted_at' => 'Deleted At',
            'deleted_by' => 'Deleted By',
        ];
    }

    public function getGelombangPendaftaran()
    {
        return $this->hasOne(GelombangPendaftaran::className(), ['gelombang_pendaftaran_id' => 'gelombang_pendaftaran_id']);
    }

    // untuk user generation number di finance, HARUS KONFIRMASI ini saat daftar atau daftar ulang
    public function getKodePendaftaran(){
        $suffix = sprintf("%04d", $this->no_pendaftaran);
        return $this->prefix_kode_pendaftaran.$suffix;
    }

    public function getVoucher(){
        return $this->hasOne(Voucher::className(), ['kode' => 'voucher_daftar']);
    }

    public function getStatusPendaftaran(){
        return $this->hasOne(StatusPendaftaran::className(), ['status_pendaftaran_id' => 'status_pendaftaran_id']);
    }
}
