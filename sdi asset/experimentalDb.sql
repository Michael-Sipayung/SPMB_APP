create table t_user (
    user_id int not null auto_increment,
    username varchar(255) not null,
    password varchar(255) not null,
    nik varchar(255) not null,
    email varchar(255) not null,
    no_HP varchar(255) not null,
    active int not null default 0,
    primary key (user_id)
);
-- describe t_user structure command
describe t_user;
-- update t_user structure, email column default value is null
alter table t_user alter column email set default 0;
-- add field verf_code to t_user table
alter table t_user add column verf_code varchar(255) not null;
--update t_pendaftar structure, default value of pendaftaran_id 0
alter table t_pendaftar alter column pendaftaran_id set default 0;
-- select specific column from t_pendaftar table
-- tingkat = IPA (MA)
update t_r_jurusan_sekolah set tingkat = 'IPA (MA)' where jurusan_sekolah_id=21;
--remove all data from t_utbk
delete from t_utbk;
CREATE TABLE `t_r_kategori_bidang_utbk` (
  `kategori_bidang_utbk_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(125) NOT NULL,
  `deleted` tinyint(1) DEFAULT '0',
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` varchar(32) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(32) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`kategori_bidang_utbk_id`)
);

CREATE TABLE `t_utbk` (
  `utbk_id` int(11) NOT NULL AUTO_INCREMENT,
  `pendaftar_id` int(11) NOT NULL,
  `no_peserta` bigint(15) NOT NULL,
  `tanggal_ujian` date NOT NULL,
  `file_sertifikat` varchar(125) NOT NULL,
  `deleted` tinyint(1) DEFAULT '0',
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` varchar(32) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(32) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`utbk_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `t_r_bidang_utbk` (
  `bidang_utbk_id` int(11) NOT NULL AUTO_INCREMENT,
  `kategori_bidang_utbk_id` int(11) NOT NULL,
  `name` varchar(125) NOT NULL,
  `deleted` tinyint(1) DEFAULT '0',
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` varchar(32) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(32) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`bidang_utbk_id`),
  KEY `fk_t_r_bidang_utbk_kategori_bidang_utbk` (`kategori_bidang_utbk_id`),
  CONSTRAINT `kategori_bidang_utbk` FOREIGN KEY (`kategori_bidang_utbk_id`) REFERENCES `t_r_kategori_bidang_utbk` (`kategori_bidang_utbk_id`) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE `t_nilai_utbk` (
  `nilai_utbk_id` int(11) NOT NULL AUTO_INCREMENT,
  `bidang_utbk_id` int(11) NOT NULL,
  `utbk_id` int(11) NOT NULL,
  `nilai` int(3) NOT NULL,
  `deleted` tinyint(1) DEFAULT '0',
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` varchar(32) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(32) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`nilai_utbk_id`),
  KEY `fk_t_r_bidang_utbk_bidang_utbk_id` (`bidang_utbk_id`),
  KEY `fk_nilai_utbk_t_utbk` (`utbk_id`),
  CONSTRAINT `fk_bidang_utbk_t_r_bidang_utbk` FOREIGN KEY (`bidang_utbk_id`) REFERENCES `t_r_bidang_utbk` (`bidang_utbk_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_tubk_t_utbk` FOREIGN KEY (`utbk_id`) REFERENCES `t_utbk` (`utbk_id`) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE `t_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `nik` varchar(16) DEFAULT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `verf_code` varchar(128) NOT NULL,
  `u_cr` varchar(128) DEFAULT NULL,
  `ip_cr` varchar(45) DEFAULT NULL,
  `d_cr` datetime DEFAULT NULL,
  `no_HP` varchar(255) NOT NULL,  
  `u_up` varchar(128) DEFAULT NULL,
  `ip_up` varchar(45) DEFAULT NULL,
  `d_up` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`)
);
alter table t_user add column no_hp varchar(255) not null;

create table `t_pendaftar`(
`pendaftar_id` int(11) NOT NULL AUTO_INCREMENT,
  `jalur_pendaftaran_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nik` varchar(16) DEFAULT NULL,
  `nisn` varchar(10) DEFAULT NULL,
  `penerima_kps` int(10) DEFAULT NULL,
  `no_kps` varchar(100) DEFAULT NULL,
  `nama` varchar(128) DEFAULT NULL,
  `jenis_kelamin_id` int(11) NOT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `tempat_lahir` varchar(128) DEFAULT NULL,
  `agama_id` int(11) NOT NULL,
  `alamat` tinytext,
  `kode_pos` varchar(45) DEFAULT NULL,
  `kelurahan` varchar(32) DEFAULT NULL,
  `alamat_kec` int(11) DEFAULT NULL,
  `alamat_kab` int(11) DEFAULT NULL,
  `alamat_prov` int(11) DEFAULT NULL,
  `no_telepon_rumah` varchar(45) DEFAULT NULL,
  `no_telepon_mobile` varchar(45) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `nama_ayah_kandung` varchar(128) DEFAULT NULL,
  `nama_ibu_kandung` varchar(45) DEFAULT NULL,
  `nik_ayah` varchar(16) DEFAULT NULL,
  `nik_ibu` varchar(16) DEFAULT NULL,
  `tanggal_lahir_ayah` date DEFAULT NULL,
  `tanggal_lahir_ibu` date DEFAULT NULL,
  `pendidikan_ayah_id` int(11) DEFAULT NULL,
  `pendidikan_ibu_id` int(11) DEFAULT NULL,
  `alamat_kec_orangtua` int(11) DEFAULT NULL,
  `alamat_kab_orangtua` int(11) DEFAULT NULL,
  `alamat_prov_orangtua` int(11) DEFAULT NULL,
  `alamat_orang_tua` tinytext,
  `kode_pos_orang_tua` varchar(45) DEFAULT NULL,
  `pekerjaan_ayah_id` int(11) DEFAULT NULL,
  `pekerjaan_ibu_id` int(11) DEFAULT NULL,
  `penghasilan_ayah` int(11) DEFAULT NULL,
  `penghasilan_ibu` int(11) DEFAULT NULL,
  `penghasilan_total` int(11) DEFAULT NULL,
  `sekolah_id` int(11) NOT NULL,
  `jurusan_sekolah` varchar(128) DEFAULT NULL,
  `akreditasi_sekolah` varchar(100) DEFAULT NULL,
  `jumlah_pelajaran_sem_1` int(11) DEFAULT NULL,
  `jumlah_nilai_sem_1` int(11) DEFAULT NULL,
  `jumlah_pelajaran_sem_2` int(11) DEFAULT NULL,
  `jumlah_nilai_sem_2` int(11) DEFAULT NULL,
  `jumlah_pelajaran_sem_3` int(11) DEFAULT NULL,
  `jumlah_nilai_sem_3` int(11) DEFAULT NULL,
  `jumlah_pelajaran_sem_4` int(11) DEFAULT NULL,
  `jumlah_nilai_sem_4` int(11) DEFAULT NULL,
  `jumlah_pelajaran_sem_5` int(11) DEFAULT NULL,
  `jumlah_nilai_sem_5` int(11) DEFAULT NULL,
  `jumlah_pelajaran_sem_6` int(11) DEFAULT NULL,
  `jumlah_nilai_sem_6` int(11) DEFAULT NULL,
  `jumlah_pelajaran_un` int(11) DEFAULT NULL,
  `jumlah_nilai_un` int(11) DEFAULT NULL,
  `kemampuan_bahasa_inggris` int(11) DEFAULT NULL,
  `bahasa_asing_lainnya` varchar(45) DEFAULT NULL,
  `kemampuan_bahasa_asing_lainnya` int(11) DEFAULT NULL,
  `informasi_del_id` int(11) NOT NULL,
  `informasi_del_lainnya` tinytext,
  `n` int(11) DEFAULT NULL,
  `tanggal_pendaftaran` date DEFAULT NULL,
  `metode_pembayaran_id` int(11) DEFAULT NULL,
  `file_verifikasi_pembayaran` varchar(128) DEFAULT NULL,
  `pas_foto` varchar(128) DEFAULT NULL,
  `file_nilai_rapor` varchar(128) DEFAULT NULL,
  `file_sertifikat` varchar(128) DEFAULT NULL,
  `file_formulir` varchar(128) DEFAULT NULL,
  `file_rekomendasi` varchar(128) DEFAULT NULL,
  `prefix_kode_pendaftaran` varchar(10) DEFAULT NULL,
  `no_pendaftaran` int(11) DEFAULT NULL,
  `status_pendaftaran_id` int(11) NOT NULL DEFAULT '1',
  `status_adminstrasi_id` int(11) DEFAULT NULL,
  `status_test_akademik_id` int(11) NOT NULL DEFAULT '1',
  `status_test_psikologi_id` int(11) NOT NULL DEFAULT '1',
  `status_kelulusan` int(11) NOT NULL DEFAULT '0',
  `gelombang_pendaftaran_id` int(11) NOT NULL,
  `lokasi_ujian_id` int(11) NOT NULL,
  `kode_ujian` varchar(128) DEFAULT NULL,
  `u_cr` varchar(128) DEFAULT NULL,
  `ip_cr` varchar(45) DEFAULT NULL,
  `d_cr` datetime DEFAULT NULL,
  `u_up` varchar(128) DEFAULT NULL,
  `ip_up` varchar(45) DEFAULT NULL,
  `d_up` datetime DEFAULT NULL,
  `jurusan_sekolah_id` int(11) DEFAULT NULL,
  `sekolah_dapodik_id` int(11) DEFAULT NULL,
  `no_hp_orangtua` varchar(45) DEFAULT NULL,
  `no_npwp` varchar(32) DEFAULT NULL,
  `kebutuhan_khusus_mahasiswa` int(10) DEFAULT NULL,
  `motivasi` text,
  `hobby` varchar(235) DEFAULT NULL,
  `kab_domisili` varchar(100) DEFAULT NULL,
  `virtual_account` varchar(100) DEFAULT NULL,
  `voucher_daftar` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`pendaftar_id`),
  KEY `fk_t_pendaftar_t_user1_idx` (`user_id`),
  KEY `fk_t_pendaftar_t_r_jenis_kelamin1_idx` (`jenis_kelamin_id`),
  KEY `fk_t_pendaftar_t_r_agama1_idx` (`agama_id`),
  KEY `fk_t_pendaftar_t_r_sekolah1_idx` (`sekolah_id`),
  KEY `fk_t_pendaftar_t_r_informasi_del1_idx` (`informasi_del_id`),
  KEY `fk_t_pendaftar_t_r_jalur_pendaftaran1_idx` (`jalur_pendaftaran_id`),
  KEY `fk_t_pendaftar_t_status_pendaftaran1_idx` (`status_pendaftaran_id`),
  KEY `fk_t_pendaftar_t_status_test_akademik1_idx` (`status_test_akademik_id`),
  KEY `fk_t_pendaftar_t_status_test_psikologi1_idx` (`status_test_psikologi_id`),
  KEY `fk_t_pendaftar_t_gelombang_pendaftaran1_idx` (`gelombang_pendaftaran_id`),
  KEY `fk_t_pendaftar_t_r_lokasi_ujian` (`lokasi_ujian_id`)
);