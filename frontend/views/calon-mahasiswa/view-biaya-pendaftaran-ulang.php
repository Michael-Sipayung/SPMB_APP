<?php

use yii\helpers\Html;
use yii\helpers\Url;

use yii\grid\GridView;

use yii\widgets\DetailView;

use common\components\ToolsColumn;

use common\components\banking\Banking;
use backend\modules\finc\models\BniEcollectionApi;

use common\helpers\LinkHelper;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\finc\models\search\PaymentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Payment';
// $this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => Url::to(['index-user-mhs'])];
// $this->params['breadcrumbs'][] = ['label' => $user->name, 'url' => Url::to(['view-user-payment-mhs', 'userId' => $user->user_id])];
// $this->params['breadcrumbs'][] = 'Payment Detail';
$this->params['header'] = 'User Payment : '. $payment->payment_code;
$this->params['header'] = 'Daftar Tagihan/Pembayaran';


?>
<style>
    h4{
        color : #2679b5;
    }
</style>
<!-- <div class="payment-index"> -->

    <?php 
        $i = 0;
        $virtualAccountPayment = $payment->virtualAccountPayment;
        $vaPaymentAmount = 0;
        if ($virtualAccountPayment !== null) {
            $vaPaymentAmount = $virtualAccountPayment->total_amount;
        }
    ?>
    <h3>Biaya Daftar Ulang</h3>
    <table class="table table-condensed">
        <thead>
            <tr class="lead">
                <th><h4><?= $calon_mahasiswa->pendaftar->gelombangPendaftaran->desc ?></h4></th>
                <th class="col-xs-5"><h4><?= $calon_mahasiswa->jurusan->fakultas->nama . ' ' . $calon_mahasiswa->jurusan->nama ?></h4></th>
                <th style="text-align:right"><h4>Virtual Account: <?= $calon_mahasiswa->virtual_account_number ?></h4></th>
            </tr>
        </thead>
    </table>
    <table class="table table-condensed">
        <thead class="">
            <tr class="lead">
                <th>#</th>
                <th>Fee</th>
                <th class="col-xs-5">Payment Detail</th>
                <th class="col-xs-1">Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($payment_detail as $data): ?>
                <?php 
                    $i++ ;
                ?>
                <tr class="lead">
                    <td><?=$i ?></td>
                    <td><?=$data->fee->name ?>  </td>
                    <td class="text-right"><strong><?='Rp. '.number_format($data->total_amount_paid, 2); ?></strong></td>
                    <td>
                        <?= $data->payment_status_key ?>
                    </td>
                </tr>
                <tr>
                    <!-- <td></td> -->
                    <td>
                        <table class="table table-bordered table-condensed text-muted">
                            <tr class="small">
                                <th class="col-xs-4">Total Fee</th>
                            </tr>
                            <tr class="small">
                                <td class="text-right"><?='Rp. '.number_format($data->fee->amount, 2); ?></td>
                            </tr>
                        </table>
                    </td>
                    <td>
                        <table class="table table-bordered table-condensed text-muted">
                            <tr class="small">
                                <th class="col-xs-4">Min Payment</th>
                                <th class="col-xs-4">Voucher</th>
                            </tr class="small">
                            <tr class="small">
                                <td class="text-right"><?='Rp. '.number_format($data->minimum_pay_amount, 2); ?></td>
                                <td class="text-right"><?=($data->voucher_amount > 0)?'<strong><span class="text-success">Rp. '.number_format($data->voucher_amount, 2).'</span></strong>':'-'; ?></td>
                            </tr>
                        </table>

                    </td>
                    <td>
                        <table class="table table-bordered table-condensed text-muted">
                            <tr class="small">
                                <th class="col-xs-4">Cash</th>
                            </tr class="small">
                            <tr class="small">
                                <td class="text-right"><?='Rp. '.number_format($data->cash_amount, 2); ?></td>
                            </tr>
                        </table>

                    </td>
                    <td></td>
                </tr>
            <?php endforeach ?>
                
                <tr class="lead">
                    <td></td>
                    <td><strong class="pull-right">Total Pembayaran:</strong></td>
                    <td><strong class="text-green pull-right"><?='Rp. '.number_format($payment->total_amount_paid, 2)?></strong></td>
                    
                </tr>
                 <?php if ($payment->voucher_amount > 0): ?>
                    <tr class="lead">
                        <td></td>
                        <td><strong class="pull-right">Total Voucher:</strong></td>
                        <td><strong class="text-green pull-right"><?='Rp. '.number_format($payment->voucher_amount, 2)?></strong></td>
                        
                    </tr>
                <?php endif ?>
                <tr class="lead">
                    <td></td>
                    <td><strong class="pull-right">Total Pembayaran Virtual Account:</strong></td>
                    <td><strong class="text-green pull-right"><?='Rp. '.number_format($vaPaymentAmount , 2)?></strong></td>
                    
                </tr>
        </tbody>
    </table>


<!-- </div> -->
