<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "t_r_gelombang_pendaftaran".
 *
 * @property int $gelombang_pendaftaran_id
 * @property string|null $tahun
 * @property string|null $desc
 * @property string|null $mulai
 * @property string|null $berakhir
 * @property string|null $prefix_kode_pendaftaran
 * @property int $counter
 * @property int $is_online
 * @property int $is_bayar
 * @property int $jenis_ujian_id
 * @property int $minimum_n
 * @property int $base_n nilai awal jumlah n
 * @property int $multi_n nilai yang akan dikalikan dengan N
 * @property string|null $tanggal_ujian
 * @property string|null $jam_mulai
 * @property string|null $jam_selesai
 */
class GelombangPendaftaran extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 't_r_gelombang_pendaftaran';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tahun', 'mulai', 'berakhir', 'tanggal_ujian', 'jam_mulai', 'jam_selesai'], 'safe'],
            [['counter', 'is_online', 'is_bayar', 'jenis_ujian_id', 'minimum_n', 'base_n', 'multi_n', 'is_reguler'], 'integer'],
            [['desc'], 'string', 'max' => 45],
            [['prefix_kode_pendaftaran'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'gelombang_pendaftaran_id' => 'Gelombang Pendaftaran ID',
            'tahun' => 'Tahun',
            'desc' => 'Desc',
            'mulai' => 'Mulai',
            'berakhir' => 'Berakhir',
            'prefix_kode_pendaftaran' => 'Prefix Kode Pendaftaran',
            'counter' => 'Counter',
            'is_online' => 'Is Online',
            'is_bayar' => 'Is Bayar',
            'jenis_ujian_id' => 'Jenis Ujian ID',
            'minimum_n' => 'Minimum N',
            'base_n' => 'Base N',
            'multi_n' => 'Multi N',
            'tanggal_ujian' => 'Tanggal Ujian',
            'jam_mulai' => 'Jam Mulai',
            'jam_selesai' => 'Jam Selesai',
        ];
    }
}
