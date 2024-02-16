<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "t_r_jurusan".
 *
 * @property int $jurusan_id
 * @property int $fakultas_id
 * @property string|null $nama
 * @property string|null $prefix_nim
 * @property int|null $counter_nim
 * @property int $status_active
 * @property string|null $url
 * @property string|null $desc
 * @property int|null $afis_id
 */
class Jurusan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 't_r_jurusan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fakultas_id'], 'required'],
            [['fakultas_id', 'counter_nim', 'status_active', 'afis_id'], 'integer'],
            [['desc'], 'string'],
            [['nama'], 'string', 'max' => 128],
            [['prefix_nim'], 'string', 'max' => 5],
            [['url'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'jurusan_id' => 'Jurusan ID',
            'fakultas_id' => 'Fakultas ID',
            'nama' => 'Nama',
            'prefix_nim' => 'Prefix Nim',
            'counter_nim' => 'Counter Nim',
            'status_active' => 'Status Active',
            'url' => 'Url',
            'desc' => 'Desc',
            'afis_id' => 'Afis ID',
        ];
    }

    public function getFakultas(){
        return $this->hasOne(Fakultas::className(), ['fakultas_id' => 'fakultas_id']);
    }
}
