<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "finc_t_virtual_account_payment".
 *
 * @property int $virtual_account_payment_id
 * @property int $user_id
 * @property int $periode_id
 * @property int|null $total_amount
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property int|null $deleted
 * @property string|null $deleted_at
 * @property string|null $deleted_by
 *
 * @property FincTVirtualAccountPaymentDetail[] $fincTVirtualAccountPaymentDetails
 * @property FincRPeriode $periode
 * @property SysxUser $user
 */
class VirtualAccountPayment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'finc_t_virtual_account_payment';
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
            [['user_id', 'periode_id'], 'required'],
            [['user_id', 'periode_id', 'total_amount', 'deleted'], 'integer'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['created_by', 'updated_by'], 'string', 'max' => 32],
            [['deleted_by'], 'string', 'max' => 323],
            [['periode_id'], 'exist', 'skipOnError' => true, 'targetClass' => FincRPeriode::class, 'targetAttribute' => ['periode_id' => 'periode_id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => SysxUser::class, 'targetAttribute' => ['user_id' => 'user_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'virtual_account_payment_id' => 'Virtual Account Payment ID',
            'user_id' => 'User ID',
            'periode_id' => 'Periode ID',
            'total_amount' => 'Total Amount',
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
     * Gets query for [[FincTVirtualAccountPaymentDetails]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFincTVirtualAccountPaymentDetails()
    {
        return $this->hasMany(FincTVirtualAccountPaymentDetail::class, ['virtual_account_payment_id' => 'virtual_account_payment_id']);
    }

    /**
     * Gets query for [[Periode]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPeriode()
    {
        return $this->hasOne(FincRPeriode::class, ['periode_id' => 'periode_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(SysxUser::class, ['user_id' => 'user_id']);
    }
}
