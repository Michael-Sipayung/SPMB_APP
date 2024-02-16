<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
<?php

use app\models\Student;
use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
use yii\helpers\ArrayHelper; //for using array helper
use app\models\StudentAnnouncement;
$title  = 'Announcement Page';
?>
<h1 style="text-align: center;" class="text-center my-5">Pengumuman SPMB IT Del</h1>
<?php
$cards = [
    'Identitas Peserta PMB' => [
        'icon' => 'fas fa-user',
        'details' => [
            'Nama' => ['icon' => 'fas fa-id-card', 'value' => StudentAnnouncement::identityName()],
            'Gelombang' => ['icon' => 'fas fa-wave-square', 'value' => StudentAnnouncement::identityGelombang()],
            'Pilihan 1' => ['icon' => 'fas fa-book', 'value' => StudentAnnouncement::identityMajor1()],
            'Pilihan 2 & 3' => ['icon' => 'fas fa-book-open', 'value' => StudentAnnouncement::identityMajor2(). "\n". 
            StudentAnnouncement::identityMajor3()],
        ]
    ],
    'Status Pendaftaran Peserta' => [
        'icon' => 'fas fa-info-circle',
        'details' => [
            'Status pendaftaran' => ['icon' => 'fas fa-check-circle', 'value' => StudentAnnouncement::identityCurrentStatus()],
            'Tes selanjutnya' => ['icon' => 'fas fa-calendar-check', 'value' => StudentAnnouncement::identityNextTest()],
            'Jadwal pelaksanaan' => ['icon' => 'fas fa-clock', 'value' => StudentAnnouncement::identitySchedule()],
            'Tempat' => ['icon' => 'fas fa-map-marker-alt', 'value' => StudentAnnouncement::identityLocation()]
        ]
    ],
    'Identitas Peserta Ujian' => [
        'icon' => 'fas fa-user-check',
        'details' => [
            'No Peserta' => ['icon' => 'fas fa-id-card', 'value' => StudentAnnouncement::identityPeserta()],
            'Username' => ['icon' => 'fas fa-user', 'value' => StudentAnnouncement::identityUsername()],
            'Password' => ['icon' => 'fas fa-key', 'value' => StudentAnnouncement::identityPassword()],
            'Keterangan' => ['icon' => 'fas fa-exclamation-circle', 'value' => StudentAnnouncement::identityOtherInformation()]
        ]
    ]
];
?>

<div class="row">
    <?php foreach ($cards as $header => $card): ?>
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <i class="<?= $card['icon'] ?>"></i>
                    <?= $header ?>
                </div>
                <div class="card-body text-dark">
                    <table class="table">
                        <?php foreach ($card['details'] as $detail => $icon): ?>
                            <tr>
                                <td><i class="<?= $icon['icon'] ?>"></i> <?= $detail ?></td>
                                <td>:</td>
                                <td><?= $icon['value'] ?></td> <!-- Display the value here -->
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
</body>
</html>