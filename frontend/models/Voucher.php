<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "t_voucher".
 *
 * @property int $voucher_id
 * @property int $gelombang_pendaftaran_id
 * @property string|null $kode
 * @property float|null $nominal
 * @property string|null $created_at
 * @property string|null $created_by
 * @property string|null $updated_at
 * @property string|null $updated_by
 * @property string|null $deleted_at
 * @property string|null $deleted_by
 */
class Voucher extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 't_voucher';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['gelombang_pendaftaran_id'], 'required'],
            [['gelombang_pendaftaran_id'], 'integer'],
            [['nominal'], 'number'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['kode', 'created_by', 'updated_by', 'deleted_by'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'voucher_id' => 'Voucher ID',
            'gelombang_pendaftaran_id' => 'Gelombang Pendaftaran ID',
            'kode' => 'Kode',
            'nominal' => 'Nominal',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'deleted_at' => 'Deleted At',
            'deleted_by' => 'Deleted By',
        ];
    }
}
