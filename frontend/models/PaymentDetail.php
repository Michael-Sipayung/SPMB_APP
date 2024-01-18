<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "finc_t_payment_detail".
 *
 * @property int $payment_detail_id
 * @property string $payment_code
 * @property int $fee_id
 * @property int|null $order
 * @property float|null $minimum_pay_amount
 * @property string $payment_status_key
 * @property string|null $transferred_to
 * @property string|null $transferred_from
 * @property string|null $voucher_number
 * @property float|null $voucher_amount
 * @property float|null $cash_amount
 * @property float|null $total_amount_paid
 * @property string|null $payment_date
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property int|null $deleted
 * @property string|null $deleted_at
 * @property string|null $deleted_by
 *
 * @property FincTFee $fee
 * @property FincTPayment $paymentCode
 * @property FincRPaymentStatus $paymentStatusKey
 * @property FincTVoucher $voucherNumber
 */
class PaymentDetail extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'finc_t_payment_detail';
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
            [['payment_code', 'fee_id'], 'required'],
            [['fee_id', 'order', 'deleted'], 'integer'],
            [['minimum_pay_amount', 'voucher_amount', 'cash_amount', 'total_amount_paid'], 'number'],
            [['payment_date', 'created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['payment_code', 'payment_status_key', 'transferred_to', 'transferred_from', 'voucher_number'], 'string', 'max' => 45],
            [['created_by', 'updated_by', 'deleted_by'], 'string', 'max' => 32],
            // [['payment_status_key'], 'exist', 'skipOnError' => true, 'targetClass' => FincRPaymentStatus::class, 'targetAttribute' => ['payment_status_key' => 'key']],
            // [['fee_id'], 'exist', 'skipOnError' => true, 'targetClass' => FincTFee::class, 'targetAttribute' => ['fee_id' => 'fee_id']],
            // [['payment_code'], 'exist', 'skipOnError' => true, 'targetClass' => FincTPayment::class, 'targetAttribute' => ['payment_code' => 'payment_code']],
            // [['voucher_number'], 'exist', 'skipOnError' => true, 'targetClass' => FincTVoucher::class, 'targetAttribute' => ['voucher_number' => 'voucher_number']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'payment_detail_id' => 'Payment Detail ID',
            'payment_code' => 'Payment Code',
            'fee_id' => 'Fee ID',
            'order' => 'Order',
            'minimum_pay_amount' => 'Minimum Pay Amount',
            'payment_status_key' => 'Payment Status Key',
            'transferred_to' => 'Transferred To',
            'transferred_from' => 'Transferred From',
            'voucher_number' => 'Voucher Number',
            'voucher_amount' => 'Voucher Amount',
            'cash_amount' => 'Cash Amount',
            'total_amount_paid' => 'Total Amount Paid',
            'payment_date' => 'Payment Date',
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
     * Gets query for [[Fee]].
     *
     * @return \yii\db\ActiveQuery
     */
    // public function getFee()
    // {
    //     return $this->hasOne(FincTFee::class, ['fee_id' => 'fee_id']);
    // }

    /**
     * Gets query for [[PaymentCode]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPaymentCode()
    {
        return $this->hasOne(Payment::class, ['payment_code' => 'payment_code']);
    }

    
    public function getFee()
    {
        return $this->hasOne(Fee::class, ['fee_id' => 'fee_id']);
    }

    

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
     * Gets query for [[VoucherNumber]].
     *
     * @return \yii\db\ActiveQuery
     */
    // public function getVoucherNumber()
    // {
    //     return $this->hasOne(FincTVoucher::class, ['voucher_number' => 'voucher_number']);
    // }
}
