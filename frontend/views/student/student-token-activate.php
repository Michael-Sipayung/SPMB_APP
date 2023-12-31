<!DOCTYPE html>
<html>
<head>
    <title>Student Token Activation</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(to right, #3494E6, #EC6EAD);
        }
        .otp-input {
            text-align: center;
            font-size: 20px;
            font-weight: bold;
            border: 2px solid #28a745; /* Add border */
            border-radius: 5px; /* Add border radius */
            background-color: transparent; /* Remove background color */
            color: #28a745; /* Change text color to match border */
            margin-right: 5px;
            margin-left: 5px;
            width: 40px;
            height: 40px; /* sets the height to be the same as the width */
            padding: 10px; /* adds some padding */
        }
        /* media query for mobile */
        @media (max-width: 576px) {
            .otp-input {
                margin-right: 2px;
                margin-left: 2px;
            }
        }

        .otp-input:focus {
            border-color: #dc3545;
            outline: none;
            box-shadow: none;
        }

        .rounded-lg {
            border-radius: 1rem; /* 1rem = 16px */
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.25); /* adds a 3D shadow effect */
        }
        .custom-heading {
            font-size: 2.5rem;
            color: #333;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.1);
        }
        .otp-input::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
            color: #888; /* Change color to a lighter shade of gray */
            opacity: 1; /* Firefox */
        }
        .otp-input:-ms-input-placeholder { /* Internet Explorer 10-11 */
            color: #888;
        }
        .otp-input::-ms-input-placeholder { /* Microsoft Edge */
            color: #888;
        }
</style>
</head>
<body> 
<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap5\Modal;
$this->title = 'Verifikasi Akun';
$this->registerJs('$(document).ready(function(){$("#welcomeModal").modal("show");});');
?>
<div class="text-center mb-2">
    <img src="https://coderassetmiller.s3.amazonaws.com/itdel.jpg" alt="Logo" class="mb-1" width="120">
</div>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card shadow rounded-lg"> <!-- updated the class here -->
                <div class="card-body"><br>
                <h1 class="text-center custom-heading"> 
                     <?= Html::encode($this->title) ?>
                </h1>
                <br>
                    <p class="text-center"> Masukan kode verifikasi yang telah dikirimkan melalui email</p>
                    <br>
                    <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                    
                    <div class="form-group d-flex justify-content-center">
                        <?= $form->field($model, 'code1', ['template' => '{input}{hint}'])->textInput(['maxlength' => 1, 'class' => 'otp-input', 'placeholder' => 'Z'])->label(false) ?>
                        <?= $form->field($model, 'code2', ['template' => '{input}{hint}'])->textInput(['maxlength' => 1, 'class' => 'otp-input', 'placeholder' => 'Y'])->label(false) ?>
                        <?= $form->field($model, 'code3', ['template' => '{input}{hint}'])->textInput(['maxlength' => 1, 'class' => 'otp-input', 'placeholder' => 'Z'])->label(false) ?>
                        <?= $form->field($model, 'code4', ['template' => '{input}{hint}'])->textInput(['maxlength' => 1, 'class' => 'otp-input', 'placeholder' => 'R'])->label(false) ?>
                        <?= $form->field($model, 'code5', ['template' => '{input}{hint}'])->textInput(['maxlength' => 1, 'class' => 'otp-input', 'placeholder' => 'S'])->label(false) ?>
                        <?= $form->field($model, 'code6', ['template' => '{input}{hint}'])->textInput(['maxlength' => 1, 'class' => 'otp-input', 'placeholder' => 'T', 'oninput' => 'if(this.value.length>=1) { this.form.submit(); }'])->label(false) ?>
                    </div>
                    <br>
                    <hr>
                    <p style="font-size: 12px; color: #666; line-height: 1.6;" class="text-center">
                         Sebagai contoh
                        jika kode yang dikirimkan melalui email adalah  <b><i>ZYZRST</i></b>, maka masukan kode tersebut seperti contoh diatas.</p>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

<?php 
Modal::begin([
    'title' => '<h2 style="color: #0093ad;" class="text-center">Instruksi Verifikasi Akun</h2>',
    'id' => 'welcomeModal',
    'options' => ['class' => 'fade modal-dialog-centered'],
    'headerOptions' => ['style' => 'background-color: #f5f5f5;'], // Add this line
]); ?>
<div class="modal-body">
    <p class="text-center"><i class="fas fa-info-circle"></i> Harap memperhatikan instruksi berikut :</p>
    <ul class="list-group list-group-flush">
        <li class="list-group-item"><strong>Token atau Kode Aktivasi:</strong> 
        Masukan 6 digit kode yang telah dikirimkan ke email anda. 
        Tiap digit anda harus memasukan kode yang tepat pada kolom yang tersedia.</li>

    </li>
    </ul>
    <p style="font-size: 14px; color: #666; line-height: 1.6;" class="mt-3">
        Tidak perlu panik jika token tidak muncul pada email. Jika email sudah valid, 
        anda hanya perlu menunggu beberapa menit untuk mendapatkan token. Jika email anda tidak valid,
        silahkan melakukan pendaftaran ulang dengan email yang valid.
    </p>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-primary" style="width: 100%;" data-bs-dismiss="modal">Saya Memahami</button>
</div>
<?php Modal::end(); ?>
