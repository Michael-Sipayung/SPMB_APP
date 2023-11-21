<html lang="">
<head>
<link href="/vendor/twbs/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<!-- css for ruler -->
<style>
    .ruler {
        position: relative;
        text-align: center;
        margin: 20px 0;
    }
    .ruler:before {
        content: "";
        position: absolute;
        top: 50%;
        left: 0;
        right: 0;
        border-top: 1px solid #ccc;
    }
    .ruler span {
        display: inline-block;
        padding: 0 10px;
        background-color: #fff;
        font-weight: bold;
        position: relative;
        top: -10px;
        color: #030303;

    }
    .my-form {
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.1);
        /* box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); */
        color: #000000;
    }
    .my-form .form-control {
        border-radius: 5px;
    }
</style>
</head>
<body>
<?php
//this page is intended to be used as a view for student personal information (data diri)
// Path: views/student/student-data-diri.php
// current status is experimental, need more improvement with the design

use app\models\StudentDataDiri;
use app\models\StudentDataDiriForm;
use app\models\StudentMajorForm;
use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap5\ActiveForm;
use yii\helpers\ArrayHelper; //for using array helper
use yii\bootstrap5\Modal;
$title  = 'Data Diri Mahasiswa';
$this->registerJs('$(document).ready(function(){$("#programModal").modal("show");});');

?>
<?php
//include task navigation component
// include 'TaskNavigation.php';
?>
<div class="shadow-lg p-3 mb-5 bg-body rounded">
<?php $form = ActiveForm::begin(['layout' => 'horizontal', 'options' => ['class' => 'my-form']]); ?>
<?= Html::tag('div', '<span>Form Data Pribadi</span>', ['class' => 'ruler']) ?>
<?php echo $form->field($model_student_data_diri,'nama',
        ['inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-badge" viewBox="0 0 16 16">
        <path d="M6.5 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zM11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
        <path d="M4.5 0A2.5 2.5 0 0 0 2 2.5V14a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2.5A2.5 2.5 0 0 0 11.5 0h-7zM3 2.5A1.5 1.5 0 0 1 4.5 1h7A1.5 1.5 0 0 1 13 2.5v10.795a4.2 4.2 0 0 0-.776-.492C11.392 12.387 10.063 12 8 12s-3.392.387-4.224.803a4.2 4.2 0 0 0-.776.492V2.5z"/>
        </svg></span>{input}</div>'])->label('Nama')
        ->textInput(['placeholder'=>'Contoh: John Doe']); ?>
   <?php
        echo $form->field($model_student_data_diri, 'agama_id',
        [
        'inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmark-plus-fill" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M2 15.5V2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.74.439L8 13.069l-5.26 2.87A.5.5 0 0 1 2 15.5zm6.5-11a.5.5 0 0 0-1 0V6H6a.5.5 0 0 0 0 1h1.5v1.5a.5.5 0 0 0 1 0V7H10a.5.5 0 0 0 0-1H8.5V4.5z"/>
        </svg></span>{input}</div>'])
        ->dropDownList(\app\models\StudentDataDiriForm::$relegion, ['prompt' => 'Pilih Agama'])
        ->label("Agama");
    ?>
<div class="row">
    <div class="col">
    <?php echo $form->field($model_student_data_diri,'nik',
        [
        'template' => '{label}<div class="input-group">{input}</div>',
        'inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill-lock" viewBox="0 0 16 16">
        <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-9 8c0 1 1 1 1 1h5v-1a1.9 1.9 0 0 1 .01-.2 4.49 4.49 0 0 1 1.534-3.693C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Zm7 0a1 1 0 0 1 1-1v-1a2 2 0 1 1 4 0v1a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1v-2Zm3-3a1 1 0 0 0-1 1v1h2v-1a1 1 0 0 0-1-1Z"/>
        </svg></span>{input}</div>'])->label('NIK')->input('number')
        ->textInput(['placeholder' => 'Contoh: 1222031606152635',
        'value'=>StudentDataDiriForm::getNikUser(), 'readonly'=>true])
    ?>
    </div>
    <div class="col">
    <?php echo $form->field($model_student_data_diri,'nisn',
        [
        'template' => '{label}<div class="input-group">{input}</div>',
        'inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill-lock" viewBox="0 0 16 16">
        <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-9 8c0 1 1 1 1 1h5v-1a1.9 1.9 0 0 1 .01-.2 4.49 4.49 0 0 1 1.534-3.693C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Zm7 0a1 1 0 0 1 1-1v-1a2 2 0 1 1 4 0v1a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1v-2Zm3-3a1 1 0 0 0-1 1v1h2v-1a1 1 0 0 0-1-1Z"/>
        </svg></span>{input}</div>'])->label('NISN')->input('number')
        ->textInput(['placeholder' => 'Contoh: 0103292820'])
        ; ?>
    </div>
    <div class="col">
    <?php echo $form->field($model_student_data_diri,'no_kps',
        [
        'template' => '{label}<div class="input-group">{input}</div>',
        'inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill-lock" viewBox="0 0 16 16">
        <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-9 8c0 1 1 1 1 1h5v-1a1.9 1.9 0 0 1 .01-.2 4.49 4.49 0 0 1 1.534-3.693C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Zm7 0a1 1 0 0 1 1-1v-1a2 2 0 1 1 4 0v1a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1v-2Zm3-3a1 1 0 0 0-1 1v1h2v-1a1 1 0 0 0-1-1Z"/>
        </svg></span>{input}</div>'])->label('KPS')->input('number')->textInput(['placeholder'=>'Masukan nomor KPS (bagi penerima KPS)']); ?>
    </div>
</div>
<div class="row">
    <div class="col">    
    <?php
    echo $form->field($model_student_data_diri, 'tanggal_lahir',
    [
        'template' => '<label style="white-space: nowrap;">{label}</label><div class="input-group">{input}</div>',
        'inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-date" 
        viewBox="0 0 16 16"><path d="M6.445 11.688V6.354h-.633A12.6 12.6 0 0 0 4.5 7.16v.695c.375-.257.969-.62 1.258-.777h.012v4.61h.675zm1.188-1.305c.047.64.594 1.406 1.703 1.406 1.258 0 2-1.066 2-2.871 0-1.934-.781-2.668-1.953-2.668-.926 0-1.797.672-1.797 1.809 0 1.16.824 1.77 1.676 1.77.746 0 1.23-.376 1.383-.79h.027c-.004 1.316-.461 2.164-1.305 2.164-.664 0-1.008-.45-1.05-.82h-.684zm2.953-2.317c0 .696-.559 1.18-1.184 1.18-.601 0-1.144-.383-1.144-1.2 0-.823.582-1.21 1.168-1.21.633 0 1.16.398 1.16 1.23z"/><path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/></svg></span>{input}</div>'])
        ->widget(\yii\jui\DatePicker::class, [
        'dateFormat' => 'yyyy-MM-dd',
        'options' => ['class' => 'form-control'],
        'clientOptions' => [
            'changeYear' => true,
            'changeMonth' => true,
            'yearRange' => '-100:+0',
        ],
        //insert placeholder text
    ])->label('Tanggal Lahir')->textInput(['placeholder'=>'Contoh: 2000-01-23']);
    ?>
    </div>
    <div class="col">
    <?php echo $form->field($model_student_data_diri,'tempat_lahir',
        [
        'template' => '<label style="white-space: nowrap;">{label}</label><div class="input-group">{input}</div>',
        'inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-add-fill" viewBox="0 0 16 16">
        <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 1 1-1 0v-1h-1a.5.5 0 1 1 0-1h1v-1a.5.5 0 0 1 1 0Z"/>
        <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5Z"/>
        <path d="m8 3.293 4.712 4.712A4.5 4.5 0 0 0 8.758 15H3.5A1.5 1.5 0 0 1 2 13.5V9.293l6-6Z"/>
        </svg></span>{input}</div>'])->label('Tempat Lahir')->textInput(['placeholder'=>'Contoh: Jakarta']);; 
    ?>
    </div>
    <div class="col">
    <?php
        echo $form->field($model_student_data_diri, 'jenis_kelamin',
        [
            'template' => '<label style="white-space: nowrap;">{label}</label><div class="input-group">{input}</div>',
            'inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill-lock" viewBox="0 0 16 16">
        <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-9 8c0 1 1 1 1 1h5v-1a1.9 1.9 0 0 1 .01-.2 4.49 4.49 0 0 1 1.534-3.693C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Zm7 0a1 1 0 0 1 1-1v-1a2 2 0 1 1 4 0v1a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1v-2Zm3-3a1 1 0 0 0-1 1v1h2v-1a1 1 0 0 0-1-1Z"/>
        </svg></span>{input}</div>'])->dropDownList(\app\models\StudentDataDiriForm::$gen, ['prompt' => 'Pilih Jenis Kelamin']);
    ?>
    </div>
</div>    
<div class="row">
    <div class="col">
    <?php echo $form->field($model_student_data_diri,'alamat',
        [
        'template' => '{label}<div class="input-group">{input}</div>',
        'inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-add-fill" viewBox="0 0 16 16">
        <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 1 1-1 0v-1h-1a.5.5 0 1 1 0-1h1v-1a.5.5 0 0 1 1 0Z"/>
        <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5Z"/>
        <path d="m8 3.293 4.712 4.712A4.5 4.5 0 0 0 8.758 15H3.5A1.5 1.5 0 0 1 2 13.5V9.293l6-6Z"/>
        </svg></span>{input}</div>'])->label('Alamat')->textInput(['placeholder'=>'Contoh: Jl. Jend. Sudirman No. 1']);; 
    ?>
    </div>
    <div class="col">
    <?php echo $form->field($model_student_data_diri,'kelurahan',
        [
        'template' => '{label}<div class="input-group">{input}</div>',
        'inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-add-fill" viewBox="0 0 16 16">
        <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 1 1-1 0v-1h-1a.5.5 0 1 1 0-1h1v-1a.5.5 0 0 1 1 0Z"/>
        <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5Z"/>
        <path d="m8 3.293 4.712 4.712A4.5 4.5 0 0 0 8.758 15H3.5A1.5 1.5 0 0 1 2 13.5V9.293l6-6Z"/>
        </svg></span>{input}</div>'])->label('Kelurahan')->textInput(['placeholder'=>'Contoh: Karet Semanggi']); 
    ?>
    </div>
    <div class="col">
    <?php echo $form->field($model_student_data_diri,'email',
        [
        'template' => '{label}<div class="input-group">{input}</div>',
        'inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-mailbox-flag" viewBox="0 0 16 16">
        <path d="M10.5 8.5V3.707l.854-.853A.5.5 0 0 0 11.5 2.5v-2A.5.5 0 0 0 11 0H9.5a.5.5 0 0 0-.5.5v8h1.5ZM5 7c0 .334-.164.264-.415.157C4.42 7.087 4.218 7 4 7c-.218 0-.42.086-.585.157C3.164 7.264 3 7.334 3 7a1 1 0 0 1 2 0Z"/>
        <path d="M4 3h4v1H6.646A3.99 3.99 0 0 1 8 7v6h7V7a3 3 0 0 0-3-3V3a4 4 0 0 1 4 4v6a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V7a4 4 0 0 1 4-4Zm0 1a3 3 0 0 0-3 3v6h6V7a3 3 0 0 0-3-3Z"/>
        </svg>  </span>{input}</div>'])->label('Email')
        ->textInput(['placeholder'=>'@gmail.com, @yahoo.com', 
        'value'=>StudentDataDiriForm::getEmailUser(), 'readonly'=>true]); 
    ?>
    </div>
</div>    
<div class="row">
<div class="col">
    <?php
    echo $form->field($model_student_data_diri, 'provinsi',
        ['template' => '{label}<div class="input-group">{input}</div>',
        'inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-add-fill" viewBox="0 0 16 16">
        <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 1 1-1 0v-1h-1a.5.5 0 1 1 0-1h1v-1a.5.5 0 0 1 1 0Z"/>
        <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5Z"/>
        <path d="m8 3.293 4.712 4.712A4.5 4.5 0 0 0 8.758 15H3.5A1.5 1.5 0 0 1 2 13.5V9.293l6-6Z"/>
        </svg></span>{input}</div>'])
        ->dropDownList(\app\models\StudentAddress::getProvince(), 
        ['prompt' => 'Pilih Provinsi','id' => 'province-dropdown', 'onchange' => 'this.form.submit();']);
        //bug fixes for generating provinsi and populate kabupaten, onchange event is used to submit form
    ?>
</div>
<div class="col">
    <?php
        echo $form->field($model_student_data_diri, 'kabupaten',
        [
        'template' => '{label}<div class="input-group">{input}</div>',    
        'inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-add-fill" viewBox="0 0 16 16">
        <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 1 1-1 0v-1h-1a.5.5 0 1 1 0-1h1v-1a.5.5 0 0 1 1 0Z"/>
        <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5Z"/>
        <path d="m8 3.293 4.712 4.712A4.5 4.5 0 0 0 8.758 15H3.5A1.5 1.5 0 0 1 2 13.5V9.293l6-6Z"/>
        </svg></span>{input}</div>'])
        ->dropDownList(\app\models\StudentAddress::getKabupaten($model_student_data_diri->provinsi), 
        ['prompt' => 'Pilih Kabupaten/ Kota', 'id' => 'kabupaten-dropdown', 'onchange' => 'this.form.submit();']);
    ?>
</div>
<div class="col">
    <?php echo $form->field($model_student_data_diri,'alamat_kecamatan',
        [
        'template' => '{label}<div class="input-group">{input}</div>',    
        'inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-add-fill" viewBox="0 0 16 16">
        <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 1 1-1 0v-1h-1a.5.5 0 1 1 0-1h1v-1a.5.5 0 0 1 1 0Z"/>
        <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5Z"/>
        <path d="m8 3.293 4.712 4.712A4.5 4.5 0 0 0 8.758 15H3.5A1.5 1.5 0 0 1 2 13.5V9.293l6-6Z"/>
        </svg></span>{input}</div>'])
        ->dropDownList(\app\models\StudentAddress::getKecamatan($model_student_data_diri->kabupaten), 
        ['prompt' => 'Pilih Kecamatan'/*, 'id' => 'kecamatan-dropdown', 'onchange' => 'this.form.submit();'*/])
        ->label("Kecamatan");
    ?>
</div>
</div>
<div class="row">
<div class="col">
    <?php echo $form->field($model_student_data_diri,'kode_pos',
        [   
            'template' => '<label style="white-space: nowrap;">{label}</label><div class="input-group">{input}</div>',
            'inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-code" viewBox="0 0 16 16">
        <path d="M6.646 5.646a.5.5 0 1 1 .708.708L5.707 8l1.647 1.646a.5.5 0 0 1-.708.708l-2-2a.5.5 0 0 1 0-.708l2-2zm2.708 0a.5.5 0 1 0-.708.708L10.293 8 8.646 9.646a.5.5 0 0 0 .708.708l2-2a.5.5 0 0 0 0-.708l-2-2z"/>
        <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z"/>
        </svg></span>{input}</div>'])
        ->label('Kode Pos')->input('number',['placeholder' => 'Contoh: 20154']); 
    ?>
</div>
<div class="col">
    <?php echo $form->field($model_student_data_diri,'no_telepon_rumah',
        [   'template' => '{label}<div class="input-group">{input}</div>',
            'inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-phone" viewBox="0 0 16 16">
        <path d="M11 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h6zM5 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H5z"/>
        <path d="M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/></svg></span>{input}</div>'])
        ->label('Telepon')
        ->textInput(['placeholder'=>'Contoh: 62 21 80643104']); ?>
</div>
<div class="col">        
    <?php echo $form->field($model_student_data_diri,'no_telepon_mobile',
        [
        'template' => '{label}<div class="input-group">{input}</div>',   
        'inputTemplate' => '<div class="input-group"><span class="input-group-text">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-phone" viewBox="0 0 16 16">
        <path d="M11 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h6zM5 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H5z"/>
        <path d="M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
        </svg></span>{input}</div>'])
        ->label('Whatsapp')
        ->textInput(['placeholder' => 'Contoh: 081234567890',
        'value'=>StudentDataDiriForm::getWaUser(), 'readonly'=>true]); ?>
</div>
</div>        

<div class="form-group" style="display: flex; justify-content: flex-end;">
    <?=  Html::resetButton('Reset', ['class' => 'btn btn-primary','style' => 'background-color: #fff; color: #333; margin-right: 10px; width: 100px;']) ?>
    <?= Html::submitButton('Simpan', ['class' => 'btn btn-primary', 'style' => 'background-color: #fff; color: #333; width: 100px;', 'id' => 'my-button']) ?>
</div>
<?php ActiveForm::end(); ?>
</div>
<!-- modal for choosing major and current available .... -->
<?php 
Modal::begin([
    'id' => 'programModal',
    'options' => ['class' => 'fade modal-dialog-centered', 'data-bs-backdrop' => 'static', 'data-bs-keyboard' => 'false'],
    'closeButton' => false,
]); ?>

<div class="modal-header" style="background-color: #f8f9fa;">
    <h2 style="color: #0093ad;" class="text-start">Pilih Program Studi</h2>
</div>

<?php $form = ActiveForm::begin(); ?>

<div class="modal-body">
    <div class="mb-3">
        <label for="waveSelect" class="form-label">
            <i class="bi bi-calendar-event-fill me-2"></i>Silahkan Pilih Gelombang Pendaftaran
        </label>
        <?= $form->field($model_student_major, 'gelombang')
            ->dropDownList(StudentMajorForm::getBatchList(),
            ['prompt' => 'Pilih Gelombang Pendaftaran']
        )->label(false) ?>
    </div>
    <hr> <!-- Horizontal rule -->
    <div class="mb-3">
        <label for="majorSelect" class="form-label">
            <i class="bi bi-person-lines-fill me-2"></i>Silahkan Pilih Jurusan yang Anda Inginkan
        </label>
        <?= $form->field($model_student_major, 'jurusan_main')
            ->dropDownList(StudentMajorForm::getMajorList(),
            ['prompt' => 'Pilih Jurusan Utama']
        )->label(false) ?>
    </div>
    <div class="mb-3">
        <label for="optionalMajorSelect" class="form-label">
            <i class="bi bi-book-half me-2"></i>Pilih Jurusan Opsional
        </label>
        <?= $form->field($model_student_major, 'jurusan_opsional')
            ->dropDownList(StudentMajorForm::getMajorList(),
            ['prompt' => 'Pilih Jurusan Opsional']
        )->label(false) ?>
    </div>
</div>
<div class="modal-footer">
    <?= Html::submitButton('<i class="bi bi-check-circle" style="font-size: 1.2rem;"></i> Simpan', ['class' => 'btn btn-primary w-100']) ?>
</div>

<?php ActiveForm::end(); ?>
<?php Modal::end(); ?>

</body>
</html>

<?php
$script = <<< JS
$('.my-form').on('beforeSubmit', function(event) {
    event.preventDefault();

    // Show the alert
    alert('Data Diri Berhasil Disimpan');

    // Delay the form submission
    setTimeout(function() {
        $('.my-form').yiiActiveForm('submitForm');
    }, 1000);
});
JS;
$this->registerJs($script);
?>

