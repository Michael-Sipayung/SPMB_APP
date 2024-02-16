<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sysx_user".
 *
 * @property int $user_id
 * @property string|null $sysx_key
 * @property string|null $virtual_account_number
 * @property string|null $auth_key
 * @property string|null $name
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property int|null $deleted
 * @property string|null $deleted_at
 * @property string|null $deleted_by
 *
 * @property FincTPaymentCredit[] $fincTPaymentCredits
 * @property FincTPaymentPostpone[] $fincTPaymentPostpones
 * @property FincTPayment[] $fincTPayments
 * @property FincTReward[] $fincTRewards
 * @property FincTUserHasPaymentScheme[] $fincTUserHasPaymentSchemes
 * @property FincTVirtualAccountPayment[] $fincTVirtualAccountPayments
 * @property FincTVoucher[] $fincTVouchers
 * @property SpmbTUserRegistrationNumber[] $spmbTUserRegistrationNumbers
 * @property SysxUserHasGroup[] $sysxUserHasGroups
 */
class UserFinance extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sysx_user';
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
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['deleted'], 'integer'],
            [['sysx_key', 'created_by', 'updated_by', 'deleted_by'], 'string', 'max' => 32],
            [['virtual_account_number', 'auth_key', 'name'], 'string', 'max' => 100],
            [['sysx_key'], 'unique'],
            [['virtual_account_number'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'sysx_key' => 'Sysx Key',
            'virtual_account_number' => 'Virtual Account Number',
            'auth_key' => 'Auth Key',
            'name' => 'Name',
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
    //     return $this->hasMany(FincTPaymentCredit::class, ['user_id' => 'user_id']);
    // }

    /**
     * Gets query for [[FincTPaymentPostpones]].
     *
     * @return \yii\db\ActiveQuery
     */
    // public function getFincTPaymentPostpones()
    // {
    //     return $this->hasMany(FincTPaymentPostpone::class, ['user_id' => 'user_id']);
    // }

    /**
     * Gets query for [[FincTPayments]].
     *
     * @return \yii\db\ActiveQuery
     */
    // public function getFincTPayments()
    // {
    //     return $this->hasMany(FincTPayment::class, ['user_id' => 'user_id']);
    // }

    /**
     * Gets query for [[FincTRewards]].
     *
     * @return \yii\db\ActiveQuery
     */
    // public function getFincTRewards()
    // {
    //     return $this->hasMany(FincTReward::class, ['user_id' => 'user_id']);
    // }

    /**
     * Gets query for [[FincTUserHasPaymentSchemes]].
     *
     * @return \yii\db\ActiveQuery
     */
    // public function getFincTUserHasPaymentSchemes()
    // {
    //     return $this->hasMany(FincTUserHasPaymentScheme::class, ['user_id' => 'user_id']);
    // }

    /**
     * Gets query for [[FincTVirtualAccountPayments]].
     *
     * @return \yii\db\ActiveQuery
     */
    // public function getFincTVirtualAccountPayments()
    // {
    //     return $this->hasMany(FincTVirtualAccountPayment::class, ['user_id' => 'user_id']);
    // }

    /**
     * Gets query for [[FincTVouchers]].
     *
     * @return \yii\db\ActiveQuery
     */
    // public function getFincTVouchers()
    // {
    //     return $this->hasMany(FincTVoucher::class, ['user_id' => 'user_id']);
    // }

    /**
     * Gets query for [[SpmbTUserRegistrationNumbers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSpmbTUserRegistrationNumbers()
    {
        return $this->hasMany(UserRegistrationNumber::class, ['user_id' => 'user_id']);
    }

    /**
     * Gets query for [[SysxUserHasGroups]].
     *
     * @return \yii\db\ActiveQuery
     */
    // public function getSysxUserHasGroups()
    // {
    //     return $this->hasMany(SysxUserHasGroup::class, ['user_id' => 'user_id']);
    // }

    public static function createUser($pendaftar_id){
        $pendaftar = Pendaftar::find()->where(['pendaftar_id' => $pendaftar_id])->one();

        $user = new UserFinance();        
        $user->name = $pendaftar->nama;
        $user->virtual_account_number = $pendaftar->virtual_account;
        
    	if (!$user->save()) {
    		return false;
    	}

        $userRegistrationNumber = new UserRegistrationNumber();
        $userRegistrationNumber->registration_number = $pendaftar->getKodePendaftaran();
        $userRegistrationNumber->user_id = $user->user_id;
        $userRegistrationNumber->gelombang_pendaftaran_id = $pendaftar->gelombang_pendaftaran_id;
        $userRegistrationNumber->n = $pendaftar->n;

        if (!$userRegistrationNumber->save()) {
    		return false;
    	}

        return $user->user_id;

    }
}
