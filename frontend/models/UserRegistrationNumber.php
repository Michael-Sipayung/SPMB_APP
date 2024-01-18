<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "spmb_t_user_registration_number".
 *
 * @property int $user_registration_number_id
 * @property string $registration_number
 * @property string|null $nim
 * @property int $user_id
 * @property int|null $periode_id
 * @property int $gelombang_pendaftaran_id
 * @property string $jenjang
 * @property int|null $program_studi_id
 * @property int $n
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property int|null $deleted
 * @property string|null $deleted_at
 * @property string|null $deleted_by
 *
 * @property FincRPeriode $periode
 * @property SpmbTProgramStudi $programStudi
 * @property SysxUser $user
 */
class UserRegistrationNumber extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'spmb_t_user_registration_number';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db_finance');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['registration_number', 'user_id', 'gelombang_pendaftaran_id', 'n'], 'required'],
            [['user_id', 'periode_id', 'gelombang_pendaftaran_id', 'program_studi_id', 'n', 'deleted'], 'integer'],
            [['jenjang', 'created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['registration_number', 'nim'], 'string', 'max' => 45],
            [['jenjang'], 'string', 'max' => 3],
            [['created_by', 'updated_by', 'deleted_by'], 'string', 'max' => 32],
            [['periode_id'], 'exist', 'skipOnError' => true, 'targetClass' => Periode::class, 'targetAttribute' => ['periode_id' => 'periode_id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => UserFinance::class, 'targetAttribute' => ['user_id' => 'user_id']],
            // [['program_studi_id'], 'exist', 'skipOnError' => true, 'targetClass' => SpmbTProgramStudi::class, 'targetAttribute' => ['program_studi_id' => 'program_studi_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'user_registration_number_id' => 'User Registration Number ID',
            'registration_number' => 'Registration Number',
            'nim' => 'Nim',
            'user_id' => 'User ID',
            'periode_id' => 'Periode ID',
            'gelombang_pendaftaran_id' => 'Gelombang Pendaftaran ID',
            'jenjang' => 'Jenjang',
            'program_studi_id' => 'Program Studi ID',
            'n' => 'N',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'deleted' => 'Deleted',
            'deleted_at' => 'Deleted At',
            'deleted_by' => 'Deleted By',
        ];
    }

    /**
     * Gets query for [[Periode]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPeriode()
    {
        return $this->hasOne(Periode::class, ['periode_id' => 'periode_id']);
    }

    /**
     * Gets query for [[ProgramStudi]].
     *
     * @return \yii\db\ActiveQuery
     */
    // public function getProgramStudi()
    // {
    //     return $this->hasOne(SpmbTProgramStudi::class, ['program_studi_id' => 'program_studi_id']);
    // }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(UserFinance::class, ['user_id' => 'user_id']);
    }
}
