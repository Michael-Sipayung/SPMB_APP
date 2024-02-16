<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "t_r_fakultas".
 *
 * @property int $fakultas_id
 * @property string|null $nama
 * @property int|null $afis_programstudi_id
 */
class Fakultas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 't_r_fakultas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['afis_programstudi_id'], 'integer'],
            [['nama'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'fakultas_id' => 'Fakultas ID',
            'nama' => 'Nama',
            'afis_programstudi_id' => 'Afis Programstudi ID',
        ];
    }
}
