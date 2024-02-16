<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "finc_t_payment".
 *
 * @property int $payment_id
 * @property string $payment_code
 * @property int $user_id
 * @property int $periode_id
 * @property float|null $total_fee_amount
 * @property float|null $minimum_pay_amount
 * @property string $payment_status_key
 * @property string|null $transferred_to
 * @property string|null $transferred_from
 * @property string|null $payment_date
 * @property string|null $voucher_number
 * @property float|null $voucher_amount
 * @property float|null $cash_amount
 * @property float|null $total_amount_paid
 * @property int $is_spmb
 * @property int $is_fixed
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property int|null $deleted
 * @property string|null $deleted_at
 * @property string|null $deleted_by
 *
 * @property FincTPaymentCredit[] $fincTPaymentCredits
 * @property FincTPaymentDetail[] $fincTPaymentDetails
 * @property FincTPaymentPostpone[] $fincTPaymentPostpones
 * @property FincRPaymentStatus $paymentStatusKey
 * @property FincRPeriode $periode
 * @property SysxUser $user
 * @property FincTVoucher $voucherNumber
 */
class Payment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'finc_t_payment';
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
            [['payment_code', 'user_id', 'periode_id'], 'required'],
            [['user_id', 'periode_id', 'is_spmb', 'is_fixed', 'deleted'], 'integer'],
            [['total_fee_amount', 'minimum_pay_amount', 'voucher_amount', 'cash_amount', 'total_amount_paid'], 'number'],
            [['payment_date', 'created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['payment_code', 'payment_status_key', 'transferred_to', 'transferred_from', 'voucher_number'], 'string', 'max' => 45],
            [['created_by', 'updated_by', 'deleted_by'], 'string', 'max' => 32],
            // [['payment_status_key'], 'exist', 'skipOnError' => true, 'targetClass' => FincRPaymentStatus::class, 'targetAttribute' => ['payment_status_key' => 'key']],
            [['periode_id'], 'exist', 'skipOnError' => true, 'targetClass' => Periode::class, 'targetAttribute' => ['periode_id' => 'periode_id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => UserFinance::class, 'targetAttribute' => ['user_id' => 'user_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'payment_id' => 'Payment ID',
            'payment_code' => 'Payment Code',
            'user_id' => 'User ID',
            'periode_id' => 'Periode ID',
            'total_fee_amount' => 'Total Fee Amount',
            'minimum_pay_amount' => 'Minimum Pay Amount',
            'payment_status_key' => 'Payment Status Key',
            'transferred_to' => 'Transferred To',
            'transferred_from' => 'Transferred From',
            'payment_date' => 'Payment Date',
            'voucher_number' => 'Voucher Number',
            'voucher_amount' => 'Voucher Amount',
            'cash_amount' => 'Cash Amount',
            'total_amount_paid' => 'Total Amount Paid',
            'is_spmb' => 'Is Spmb',
            'is_fixed' => 'Is Fixed',
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
     * Gets query for [[FincTPaymentCredits]].
     *
     * @return \yii\db\ActiveQuery
     */
    // public function getFincTPaymentCredits()
    // {
    //     return $this->hasMany(FincTPaymentCredit::class, ['payment_code' => 'payment_code']);
    // }

    /**
     * Gets query for [[FincTPaymentDetails]].
     *
     * @return \yii\db\ActiveQuery
     */
    // public function getFincTPaymentDetails()
    // {
    //     return $this->hasMany(FincTPaymentDetail::class, ['payment_code' => 'payment_code']);
    // }

    /**
     * Gets query for [[FincTPaymentPostpones]].
     *
     * @return \yii\db\ActiveQuery
     */
    // public function getFincTPaymentPostpones()
    // {
    //     return $this->hasMany(FincTPaymentPostpone::class, ['payment_code' => 'payment_code']);
    // }

    /**
     * Gets query for [[PaymentStatusKey]].
     *
     * @return \yii\db\ActiveQuery
     */
    // public function getPaymentStatusKey()
    // {
    //     return $this->hasOne(FincRPaymentStatus::class, ['key' => 'payment_status_key']);
    // }

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
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(UserFinance::class, ['user_id' => 'user_id']);
    }

    public function getVirtualAccountPayment()
    {
        return $this->hasOne(VirtualAccountPayment::className(), ['user_id' => 'user_id',
                                                                  'periode_id' => 'periode_id']);
    }

    /**
     * Gets query for [[VoucherNumber]].
     *
     * @return \yii\db\ActiveQuery
     */
    // public function getVoucherNumber()
    // {
    //     return $this->hasOne(FincTVoucher::class, ['voucher_number' => 'voucher_number']);
    // }
}
