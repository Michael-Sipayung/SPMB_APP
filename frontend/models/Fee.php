<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "finc_t_fee".
 *
 * @property int $fee_id
 * @property string|null $name
 * @property int|null $fee_reference_id
 * @property string|null $payment_type_key
 * @property int|null $is_fix
 * @property int|null $is_active
 * @property float|null $amount
 * @property int $is_spmb
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property int|null $deleted
 * @property string|null $deleted_at
 * @property string|null $deleted_by
 *
 * @property FincRFeeReference $feeReference
 * @property FincTInstallmentScheme[] $fincTInstallmentSchemes
 * @property FincTPaymentCredit[] $fincTPaymentCredits
 * @property FincTPaymentDetail[] $fincTPaymentDetails
 * @property FincTPaymentScheme[] $fincTPaymentSchemes
 * @property FincRPaymentType $paymentTypeKey
 */
class Fee extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'finc_t_fee';
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
            [['fee_reference_id', 'is_fix', 'is_active', 'is_spmb', 'deleted'], 'integer'],
            [['amount'], 'number'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['name'], 'string', 'max' => 100],
            [['payment_type_key'], 'string', 'max' => 45],
            [['created_by', 'updated_by', 'deleted_by'], 'string', 'max' => 32],
            [['fee_reference_id'], 'exist', 'skipOnError' => true, 'targetClass' => FincRFeeReference::class, 'targetAttribute' => ['fee_reference_id' => 'fee_reference_id']],
            [['payment_type_key'], 'exist', 'skipOnError' => true, 'targetClass' => FincRPaymentType::class, 'targetAttribute' => ['payment_type_key' => 'key']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'fee_id' => 'Fee ID',
            'name' => 'Name',
            'fee_reference_id' => 'Fee Reference ID',
            'payment_type_key' => 'Payment Type Key',
            'is_fix' => 'Is Fix',
            'is_active' => 'Is Active',
            'amount' => 'Amount',
            'is_spmb' => 'Is Spmb',
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
     * Gets query for [[FeeReference]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFeeReference()
    {
        return $this->hasOne(FincRFeeReference::class, ['fee_reference_id' => 'fee_reference_id']);
    }

    /**
     * Gets query for [[FincTInstallmentSchemes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFincTInstallmentSchemes()
    {
        return $this->hasMany(FincTInstallmentScheme::class, ['fee_id' => 'fee_id']);
    }

    /**
     * Gets query for [[FincTPaymentCredits]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFincTPaymentCredits()
    {
        return $this->hasMany(FincTPaymentCredit::class, ['fee_id' => 'fee_id']);
    }

    /**
     * Gets query for [[FincTPaymentDetails]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFincTPaymentDetails()
    {
        return $this->hasMany(FincTPaymentDetail::class, ['fee_id' => 'fee_id']);
    }

    /**
     * Gets query for [[FincTPaymentSchemes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFincTPaymentSchemes()
    {
        return $this->hasMany(FincTPaymentScheme::class, ['fee_id' => 'fee_id']);
    }

    /**
     * Gets query for [[PaymentTypeKey]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPaymentTypeKey()
    {
        return $this->hasOne(FincRPaymentType::class, ['key' => 'payment_type_key']);
    }
}
