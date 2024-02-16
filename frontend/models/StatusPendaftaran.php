<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "t_r_status_pendaftaran".
 *
 * @property int $status_pendaftaran_id
 * @property string|null $desc
 */
class StatusPendaftaran extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 't_r_status_pendaftaran';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['desc'], 'string', 'max' => 128],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'status_pendaftaran_id' => 'Status Pendaftaran ID',
            'desc' => 'Desc',
        ];
    }
}
