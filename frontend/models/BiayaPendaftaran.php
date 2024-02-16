<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "t_biaya_pendaftaran".
 *
 * @property int $biaya_pendaftaran_id
 * @property int $gelombang_pendaftaran_id
 * @property float|null $biaya_daftar
 */
class BiayaPendaftaran extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 't_biaya_pendaftaran';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['gelombang_pendaftaran_id'], 'required'],
            [['gelombang_pendaftaran_id', 'fee_id'], 'integer'],
            [['biaya_daftar'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'biaya_pendaftaran_id' => 'Biaya Pendaftaran ID',
            'gelombang_pendaftaran_id' => 'Gelombang Pendaftaran ID',
            'biaya_daftar' => 'Biaya Daftar',
        ];
    }

    public function getGelombangPendaftaran()
    {
        return $this->hasOne(GelombangPendaftaran::className(), ['gelombang_pendaftaran_id' => 'gelombang_pendaftaran_id']);
    }
}
