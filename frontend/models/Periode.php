<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "finc_r_periode".
 *
 * @property int $periode_id
 * @property int|null $month
 * @property int|null $year
 * @property int|null $sem
 * @property int $is_active
 * @property int|null $previous_periode_id
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property int|null $deleted
 * @property string|null $deleted_at
 * @property string|null $deleted_by
 *
 * @property FincTPayment[] $fincTPayments
 * @property FincTUserHasPaymentScheme[] $fincTUserHasPaymentSchemes
 * @property FincTVirtualAccountPayment[] $fincTVirtualAccountPayments
 * @property FincTVoucher[] $fincTVouchers
 * @property SpmbTUserRegistrationNumber[] $spmbTUserRegistrationNumbers
 */
class Periode extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'finc_r_periode';
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
            [['month', 'year', 'sem', 'is_active', 'previous_periode_id', 'deleted'], 'integer'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['created_by', 'updated_by', 'deleted_by'], 'string', 'max' => 32],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'periode_id' => 'Periode ID',
            'month' => 'Month',
            'year' => 'Year',
            'sem' => 'Sem',
            'is_active' => 'Is Active',
            'previous_periode_id' => 'Previous Periode ID',
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
     * Gets query for [[FincTPayments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFincTPayments()
    {
        return $this->hasMany(Payment::class, ['periode_id' => 'periode_id']);
    }

    /**
     * Gets query for [[FincTUserHasPaymentSchemes]].
     *
     * @return \yii\db\ActiveQuery
     */
    // public function getFincTUserHasPaymentSchemes()
    // {
    //     return $this->hasMany(FincTUserHasPaymentScheme::class, ['periode_id' => 'periode_id']);
    // }

    /**
     * Gets query for [[FincTVirtualAccountPayments]].
     *
     * @return \yii\db\ActiveQuery
     */
    // public function getFincTVirtualAccountPayments()
    // {
    //     return $this->hasMany(FincTVirtualAccountPayment::class, ['periode_id' => 'periode_id']);
    // }

    /**
     * Gets query for [[FincTVouchers]].
     *
     * @return \yii\db\ActiveQuery
     */
    // public function getFincTVouchers()
    // {
    //     return $this->hasMany(FincTVoucher::class, ['periode_id' => 'periode_id']);
    // }

    /**
     * Gets query for [[SpmbTUserRegistrationNumbers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSpmbTUserRegistrationNumbers()
    {
        return $this->hasMany(UserRegistrationNumber::class, ['periode_id' => 'periode_id']);
    }

    public function getActivePeriodeId(){
        $model = $this->find()->where(['is_active' => 1, 'deleted' => 0])->one();
        if ($model) {
            return $model->periode_id;
        }
        return false;
    }
}
