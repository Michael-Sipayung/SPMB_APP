<html>
<head>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<style> 
.custom-background {
        background-color: #f8f9fa;
        padding: 30px;
        border-radius: 10px;
}
.timeline {
    position: relative;
    max-width: 1200px;
    margin: 0 auto;
}

.timeline::after {
    content: '';
    position: absolute;
    width: 6px;
    background-color: #6c757d;
    top: 0;
    bottom: 0;
    left: 50%;
    margin-left: -3px;
}

.timeline-item {
    padding: 2px 10px; /* Further reduced padding */
    position: relative;
    background-color: inherit;
    width: 50%;
    box-sizing: border-box;
    margin-bottom: 2px; /* Further reduced margin */
}

.timeline-item::before {
    content: ' ';
    position: absolute;
    width: 20px;
    height: 20px;
    right: -10px;
    background-color: white;
    border: 4px solid #6c757d;
    top: 15px;
    border-radius: 50%;
    z-index: 1;
}

.step {
    font-weight: bold;
}

.timeline-item:nth-child(odd) {
    left: 0;
}

.timeline-item:nth-child(even) {
    left: 50%;
}

@media (max-width: 600px) {
    .timeline-item {
        width: 100%;
    }
    .timeline-item:nth-child(odd) {
        left: 0%;
    }
    .timeline-item:nth-child(even) {
        left: 0%;
    }
    .timeline::after {
        content: none;
    }
}
.regpro{
    background-color: white;
    padding: 30px;
    /* border-radius: 10px; */
}
h2{
    text-align: center;
    font-weight: bold;
    color: #0093ad;
}
.row {
        display: flex;
        align-items: center;
    }
    .img-fluid {
        max-width: 80%;
        max-height: 80%;
        object-fit: cover;
    }
    .full-width-btn {
        display: block;
        width: 100%;
    }
    .icon-large {
    font-size: 1.2em; /* Adjust as needed */
    margin-right: 0.5em; /* Add some space to the right of the icon */
    }
    .card {
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    transition: 0.3s;
}

.card:hover {
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

.nav-pills .nav-link {
    border: 1px solid #ddd;
    border-radius: 10px;
    margin-right: 10px;
}

.nav-pills .nav-link.active {
    background-color: #007bff;
    color: white;
}

.nav-pills .nav-link i {
    margin-right: 5px;
} 
</style>
<script>
    $(document).ready(function() {
    $('#pills-tab a').on('click', function (e) {
        e.preventDefault();
        // Perform additional actions here
        $(this).tab('show');
    });
});
</script>
</head>
<body>                            
<?php
/** @var yii\web\View $this */
use yii\helpers\Html;
use yii\bootstrap5\Modal;

$this->title = 'SPMB App-IT Del';
//$this->registerJs('$(document).ready(function(){$("#developmentModal").modal("show");});');

?>
<div class="site-index">
<div class="regpro">    
<div class="container my-5">
    <div class="row">
        <div class="col-lg-6 order-lg-2">
            <h2 class="display-4">Selamat Datang di Portal Penerimaan Mahasiswa Baru IT Del</h2> <br><br>
            <p class="lead">Portal seleksi penerimaan mahasiswa baru ini merupakan portal informasi  untuk calon mahasiswa baru 
                Institut Teknologi Del. Temukan informasi terkait penerimaan mahasiswa baru di portal ini. </p>
                <br>
                <?= Html::a('Buat Akun', ['register-student'], ['class' => 'btn btn-primary full-width-btn']) ?>
        </div>
        <div class="col-lg-6 order-lg-1">
            <img src="https://coderassetmiller.s3.amazonaws.com/asset_prodi.png" class="img-fluid" alt="Responsive image">
        </div>
    </div>
</div>
</div>
<br>
<div class="regpro">    
<div class="container my-5">
    <div class="row">
        <div class="col-lg-6">
            <h2 class="display-4">Kembangkan Diri dan Berinovasi Untuk Indonesia</h2> <br>
            <p class="lead">IT Del hadir sebagai jawaban untuk kamu yang ingin mengembangkan diri, 
                mendapatkan pengalaman dan berkontribusi langsung menghasilkan karya terbaik bagi bangsa melalui pendidikan, 
                serta membangun networking untuk modal kamu di masa depan. </p>
        </div>
        <div class="col-lg-6">
            <img src="https://coderassetmiller.s3.amazonaws.com/1.jpg" class="img-fluid" alt="Responsive image">
        </div>
    </div>
</div>
</div>
<br>
<div class="regpro">  
<h2>Menjadi Mahasiswa dengan Karakter 3M</h2>  <br>  <br>
<div class="container">    
    <div class="row align-items-start text-center">
        <div class="col">
            <i class="fas fa-cross fa-3x mb-3"></i>
            <h2 class="mb-3">MarTuhan</h2>
            <p>MarTuhan adalah keyakinan akan keberadaan Tuhan dan kesetiaan 
            untuk mengenal dan mengasihi Tuhan, sebagai sambutan atas kasih Tuhan kepada manusia, 
            yang membangkitkan gairah belajar disiplin kontemplatif spiritual yang membentuk pembaharuan 
            budi sehingga menimbulkan kepedulian.</p>
        </div>
        <div class="col">
            <i class="fas fa-heart fa-3x mb-3"></i>
            <h2 class="mb-3">MarRoha</h2>
            <p>MarRoha adalah sikap dalam bertindak berlandaskan pada kerendahan hati dengan 
            penuh tanggung jawab, melakukan apapun dengan hati, dan tunduk pada nilai-nilai moral dalam kaitannya 
            dengan makhluk hidup lainnya. Integritas: kesadaran moral dan etika menuju kebajikan.</p>
        </div>
        <div class="col">
            <i class="fas fa-book fa-3x mb-3"></i>
            <h2 class="mb-3">MarBisuk</h2>
            <p>MarBisuk adalah bijaksana berdasarkan hikmat yang mengedepankan kearifan dan pengertian 
            berdasarkan penguasaan pengetahuan dan kecakapan dalam bekerja dan kesediaan belajar sepanjang hayat. 
            Ilmu: cakap dan berkarya dengan akal budi menuju hikmat.</p>
        </div>
    </div>
</div>
</div> 
<br>
<br>
<div class="position-relative overflow-hidden" style="height: 65vh;">
    <div class="position-absolute w-100 h-100" style="background: url('https://coderassetmiller.s3.amazonaws.com/pmb+new+asset/download+(1)+(1)+(1)+(1).png') no-repeat center center / cover;"></div>
</div>
<br>
<div class="regpro">
    <h2 class="text-center mb-4">Alur Pendaftaran Mahasiswa Baru</h2>
    <div class="container">
        <div class="timeline">
            <div class="timeline-item">
                <span class="step"><i class="fas fa-user-plus"></i> Tahap 1</span>
                <h4>Registrasi Akun</h4>
                <p>Daftarkan diri Anda dengan mengisi form registrasi online yang telah disediakan.</p>
            </div>
            <div class="timeline-item">
                <span class="step"><i class="fas fa-info-circle"></i> Tahap 2</span>
                <h4>Pengisian Data Diri</h4>
                <p>Lengkapi data diri dan pastikan semua informasi yang Anda berikan adalah valid.</p>
            </div>
            <div class="timeline-item">
                <span class="step"><i class="fas fa-upload"></i> Tahap 3</span>
                <h4>Upload Berkas Persyaratan</h4>
                <p>Upload semua berkas yang dibutuhkan seperti ijazah, dan dokumen lainnya.</p>
            </div>
            <div class="timeline-item">
                <span class="step"><i class="fas fa-money-check-alt"></i> Tahap 4</span>
                <h4>Pembayaran Biaya Pendaftaran</h4>
                <p>Lakukan pembayaran biaya pendaftaran melalui metode pembayaran yang telah disediakan.</p>
            </div>
            <div class="timeline-item">
                <span class="step"><i class="fas fa-clipboard-check"></i> Tahap 5</span>
                <h4>Seleksi Administrasi & Akademik</h4>
                <p>Tim kami akan melakukan seleksi administrasi dan akademik.</p>
            </div>
            <div class="timeline-item">
                <span class="step"><i class="fas fa-redo"></i> Tahap 6</span>
                <h4>Pendaftaran Ulang</h4>
                <p>Jika Anda lolos seleksi, Anda akan diminta untuk melakukan pendaftaran ulang.</p>
            </div>
        </div>
    </div>
</div>
<!-- 
<div class="regpro">
    <h2>Alur Pendaftaran Mahasiswa Baru</h2>  <br>  <br>
    <ol class="timeline">
    <li class="timeline-item">
        <strong>Tahap 1:<br></strong> Registrasi Akun
    </li>
    <li class="timeline-item">
        <strong>Tahap 2:<br></strong> Pengisian Data Diri
    </li>
    <li class="timeline-item">
        <strong>Tahap 3:<br></strong> Upload Berkas Persyaratan
    </li>
    <li class="timeline-item">
        <strong>Tahap 4:<br></strong> Pembayaran Biaya Pendaftaran
    </li>
    <li class="timeline-item">
        <strong>Tahap 5:<br></strong> Seleksi Administrasi & Akademik
    </li>
    <li class="timeline-item">
        <strong>Tahap 6:<br></strong> Pendaftaran Ulang
    </li>
    </ol>
    <br> <br>
</div> -->
<br>
<!-- dashboard pmb goes here  -->
<div class="regpro">
    <h2 class="text-center mb-4">Dashboard Program SPMB IT-Del</h2>
    <div class="container mt-5">
    <div class="row row-cols-1 row-cols-md-4 g-4">
        <div class="col">
            <div class="card h-100 bg-primary text-white">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-users"></i> Pendaftar SPMB</h5>
                    <p class="card-text">Total mahasiswa yang telah mendaftar di IT Del : 7000</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100 bg-success text-white">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-user-plus"></i> Mahasiswa Aktif</h5>
                    <p class="card-text">Jumlah mahasiswa aktif yang telah terdaftar di IT Del : 1500</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100 bg-info text-white">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-graduation-cap"></i> Alumni</h5>
                    <p class="card-text">Mahasiswa yang telah menyelesaikan studi : 4500</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100 bg-success text-white">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-award"></i> Penerima Beasiswa</h5>
                    <p class="card-text">Jumlah mahasiswa penerima beasiswa di IT Del : 1000</p>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<!-- galery spmb -->
<div class="container">
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
            <div class="card h-100">
                <img src="https://coderassetmiller.s3.amazonaws.com/1.jpg" class="card-img-top" alt="Image 1">
                <div class="card-body">
                    <h5 class="card-title">Pengukuhan Mahasiswa Baru</h5>
                    <p class="card-text">Pengukuhan dilaksanakan dalan sidang terbuka, oleh rektor IT Del.</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <img src="https://coderassetmiller.s3.amazonaws.com/2.jpg" class="card-img-top" alt="Image 2">
                <div class="card-body">
                    <h5 class="card-title">Pengukuhan Mahasiswa Baru</h5>
                    <p class="card-text">Pengukuhan dilaksanakan dalan sidang terbuka, oleh rektor IT Del.</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <img src="https://coderassetmiller.s3.amazonaws.com/3.jpg" class="card-img-top" alt="Image 2">
                <div class="card-body">
                    <h5 class="card-title">Seleksi Ujian Saringan Masuk</h5>
                    <p class="card-text">Setiap peserta akan mengikuti kegiatan proses seleksi ujian saringan masuk.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- next image galery -->
    <br>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
            <div class="card h-100">
                <img src="https://coderassetmiller.s3.amazonaws.com/pmb+new+asset/9vxxpf7xe85cVOfyllGPEgZwCPqmHOW9.jpg" class="card-img-top" alt="Image 1">
                <div class="card-body">
                    <h5 class="card-title">Upacara Pengukuhan Mahasiswa Baru</h5>
                    <p class="card-text">Setelah Calon Mahasiswa Mengikuti Proses Seleksi Masuk Institut Teknologi Del (IT Del), mereka akan dikukuhkan.</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <img src="https://coderassetmiller.s3.amazonaws.com/pmb+new+asset/fA_SbNfrhQvoLDg3gLvcrv7zUznbY1S3.jpg" class="card-img-top" alt="Image 2">
                <div class="card-body">
                    <h5 class="card-title">Upacara Pengukuhan Mahasiswa Baru</h5>
                    <p class="card-text">Setelah Calon Mahasiswa Mengikuti Proses Seleksi Masuk Institut Teknologi Del (IT Del), mereka akan dikukuhkan.</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <img src="https://coderassetmiller.s3.amazonaws.com/pmb+new+asset/HXqZGFT_48F_gSumeE1_D_EuFWLzQnrP.jpg" class="card-img-top" alt="Image 2">
                <div class="card-body">
                    <h5 class="card-title">Upacara Pengukuhan Mahasiswa Baru</h5>
                    <p class="card-text">Setelah Calon Mahasiswa Mengikuti Proses Seleksi Masuk Institut Teknologi Del (IT Del), mereka akan dikukuhkan.</p>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<br>
<div class="regpro">    
<h2>Timeline SPMB IT Del</h2>
<!-- Registration Timeline Section -->
<section id="registration-timeline" class="my-5">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="pills-registration-tab" data-toggle="pill" href="#pills-registration" role="tab" aria-controls="pills-registration" aria-selected="true">
                    <i class="fa fa-calendar"></i> Jadwal Pendaftaran
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="pills-exam-tab" data-toggle="pill" href="#pills-exam" role="tab" aria-controls="pills-exam" aria-selected="false">
                    <i class="fa fa-pencil-square-o"></i> Jenis Tes
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="pills-location-tab" data-toggle="pill" href="#pills-location" role="tab" aria-controls="pills-location" aria-selected="false">
                    <i class="fa fa-map-marker"></i> Lokasi
                </a>
            </li>
        </ul>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-registration" role="tabpanel" aria-labelledby="pills-registration-tab">
            <div class="card mb-3">
                <div class="card-header bg-primary text-white">
                    <h5 class="card-title"><i class="bi bi-calendar-check-fill"></i> PMDK (Penelusuran Minat dan Kemampuan)</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">
                        Bagi siswa yang tertarik untuk mendaftar melalui jalur PMDK, pendaftaran dibuka secara resmi pada tanggal
                        22 Desember 2024 - 14 Januari 2024. Jika terdapat perubahan akan disampaikan secara resmi melalui portal SPMB IT Del.
                    </p>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-header bg-success text-white">
                    <h5 class="card-title"><i class="bi bi-calendar2-check-fill"></i> USM I (Ujian Saringan Masuk)</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">
                        Bagi siswa yang tertarik untuk mendaftar melalui jalur USM I, pendaftaran dibuka secara resmi pada tanggal
                        10 Januari 2024 - 07 Maret 2024. Jika terdapat perubahan akan disampaikan secara resmi melalui portal SPMB IT Del.
                    </p>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-header bg-success text-white">
                    <h5 class="card-title"><i class="bi bi-calendar2-check-fill"></i> USM II (Ujian Saringan Masuk)</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">
                        Bagi siswa yang tertarik untuk mendaftar melalui jalur USM II, pendaftaran dibuka secara resmi pada tanggal
                        18 Maret 2024 - 08 Mei 2024. Jika terdapat perubahan akan disampaikan secara resmi melalui portal SPMB IT Del.
                    </p>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-header bg-success text-white">
                    <h5 class="card-title"><i class="bi bi-calendar2-check-fill"></i> USM III (Ujian Saringan Masuk)</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">
                        Bagi siswa yang tertarik untuk mendaftar melalui jalur USM III, pendaftaran dibuka secara resmi pada tanggal
                        10 Mei 2024 - 06 Juni 2024. Jika terdapat perubahan akan disampaikan secara resmi melalui portal SPMB IT Del.
                    </p>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-header bg-danger text-white">
                    <h5 class="card-title"><i class="bi bi-calendar2-event-fill"></i> UTBK (Ujian Tulis Berbasis Komputer)</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">
                        Bagi siswa yang tertarik untuk mendaftar melalui jalur UTBK, pendaftaran dibuka secara resmi pada tanggal
                        10 Juni 2024 - 04 Juli 2024. Jika terdapat perubahan akan disampaikan secara resmi melalui portal SPMB IT Del.
                    </p>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="pills-exam" role="tabpanel" aria-labelledby="pills-exam-tab">
            <div class="card mb-3">
                <div class="card-header bg-primary text-white">
                    <h5 class="card-title"><i class="bi bi-file-earmark-text-fill"></i> PMDK (Penelusuran Minat dan Kemampuan)</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">Bagi calon mahasiswa yang mendaftar pada jalur PMDK, komponen penilaian ditentukan berdasarkan nilai rapor,
                        nilai wawancara serta nilai pisikotes.
                    </p>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-header bg-success text-white">
                    <h5 class="card-title"><i class="bi bi-file-earmark-richtext-fill"></i> USM (Ujian Saringan Masuk)</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">Bagi calon mahasiswa yang mendaftar pada jalur USM, komponen penilaian ditentukan berdasarkan nilai akademik,
                        serta nilai pisikotes.
                    </p>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-header bg-danger text-white">
                    <h5 class="card-title"><i class="bi bi-file-earmark-fill"></i> UTBK (Ujian Tulis Berbasis Komputer)</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">Bagi calon mahasiswa yang mendaftar pada jalur UTBK, komponen penilaian ditentukan berdasarkan nilai UTBK,
                        serta nilai pisikotes.
                    </p>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="pills-location" role="tabpanel" aria-labelledby="pills-location-tab">
            <div class="card mb-3">
                <div class="card-header bg-primary text-white">
                    <h5 class="card-title"><i class="bi bi-geo-fill"></i> Lokasi I : Kampus IT Del</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">Setiap peserta ujian yang mendapatkan jadwal ujian dengan lokasi Kampus IT Del, 
                        diharapkan untuk datang tepat waktu dan membawa berkas yang telah ditentukan. 
                        Alamat : Jl. Sisingamangaraja, Sitoluama Laguboti, Toba Samosir Sumatera Utara.
                    </p>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-header bg-success text-white">
                    <h5 class="card-title"><i class="bi bi-geo-fill"></i> Lokasi II : Medan</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">Setiap peserta ujian yang mendapatkan jadwal ujian dengan lokasi Medan, Sumatera Utara, 
                        diharapkan untuk datang tepat waktu dan membawa berkas yang telah ditentukan. 
                        Alamat : Kampus Universitas HKBP Nommensen (Medan), Jl Perintis Kemerdekaan No.23, Perintis, Medan.
                    </p>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-header bg-warning text-dark">
                    <h5 class="card-title"><i class="bi bi-geo-fill"></i> Lokasi III : Jakarta</h5>
                </div>
                <div class="card-body">
                    <p class="card-text">Setiap peserta ujian yang mendapatkan jadwal ujian dengan lokasi Jakarta, 
                        diharapkan untuk datang tepat waktu dan membawa berkas yang telah ditentukan. 
                        Alamat : Sopo Del Office Towers & Lifestyle Tower A Lt. 9, Jl. Mega Kuningan Barat III Lot 10.1-6, 
                        Jakarta Selatan 12950.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
</div>
<br>
<div class="custom-background-remove">
        <h2 style="text-align: center;"> Pertanyaan yang Paling Sering Ditanyakan </h2> <br><br>
        <!-- Add your content here -->
    <div class="accordion accordion-flush custom-accordion" id="accordionFlushExample">  
    <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingOne">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
        <i class="bi bi-question-circle-fill icon-large"></i> Apakah saya bisa mendaftar lebih dari satu jurusan ?
    </button>
    </h2>
    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
    <div class="accordion-body">Setiap peserta diijinkan mendaftar lebih dari satu jurusan, maksimal jurusan yang dapat dipilih adalah sebanyak tiga jurusan.</div>
    </div>
</div>
<div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingTwo">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
        <i class="bi bi-pencil-fill icon-large"></i> Bagaimana cara saya mendaftarkan diri ?
    </button>
    </h2>
    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
    <div class="accordion-body">Silahkan mengunjungi portal resmi pendaftaran mahasiswa baru IT Del. Klik menu buat akun pada portal tersebut kemudian login dengan akun yang telah anda buat.</div>
    </div>
</div>
<div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingThree">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
        <i class="bi bi-exclamation-circle-fill icon-large"></i> Mengapa saya tidak mendapatkan kode verifikasi ?
    </button>
    </h2>
    <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
    <div class="accordion-body">Kode verifikasi dikirimkan secara otomatis melalui sistem, silahkan cek email anda secara berkala atau bertahap dan pastikan email yang anda berikan adalah benar.</div>
    </div>
</div>
<div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingFour">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
        <i class="bi bi-book-fill icon-large"></i> Apa saja program studi yang tersedia di IT Del ?
    </button>
    </h2>
    <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
    <div class="accordion-body">IT Del menyediakan beberapa program studi, diantaranya : manajemen rekayasa, teknik elektro, teknik informatika, teknik bioproses dan beberapa jurusan lainnya.</div>
    </div>
</div>
<div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingFive">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
        <i class="bi bi-key-fill icon-large"></i> Bagaimana jika saya lupa password ?
    </button>
    </h2>
    <div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-headingFive" data-bs-parent="#accordionFlushExample">
    <div class="accordion-body">Silahkan membuka portal SPMB IT Del dan kemudikan memilih menu lupa password, isikan username dan hp anda. Password baru anda akan dikirimkan melalui email, gunakan identitas tersebut untuk login pada portal SPMB.</div>
    </div>
</div>
<div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingSix">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSix" aria-expanded="false" aria-controls="flush-collapseSix">
        <i class="bi bi-folder2-open icon-large"></i> Apa saja berkas yang diperlukan untuk mendaftar ?
    </button>
    </h2>
    <div id="flush-collapseSix" class="accordion-collapse collapse" aria-labelledby="flush-headingSix" data-bs-parent="#accordionFlushExample">
    <div class="accordion-body">Setiap peserta diharapkan telah menyediakan pas photo, file sertifikat, file nilai rapor serta berkas pendukung lainnya.</div>
    </div>
</div>
<div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingSeven">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSeven" aria-expanded="false" aria-controls="flush-collapseSeven">
        <i class="bi bi-question-circle-fill icon-large"></i> Bagaimana jika saya lupa username ?
    </button>
    </h2>
    <div id="flush-collapseSeven" class="accordion-collapse collapse" aria-labelledby="flush-headingSeven" data-bs-parent="#accordionFlushExample">
    <div class="accordion-body">Silahkan periksa email anda, username tersebut dapat ditemukan ketika anda mendaftarkan akun ataupun ketika anda melakukan reset password.</div>
    </div>
</div>
<div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingEight">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseEight" aria-expanded="false" aria-controls="flush-collapseEight">
        <i class="bi bi-upload icon-large"></i> Mengapa file saya tidak bisa diupload ?
    </button>
    </h2>
    <div id="flush-collapseEight" class="accordion-collapse collapse" aria-labelledby="flush-headingEight" data-bs-parent="#accordionFlushExample">
    <div class="accordion-body">Salah satu faktor mengapa file anda tidak dapat diupload adalah dikarenakan file tersebut terlalu besar, atau ukuran file yang anda berikan tidak memenuhi batas maximal yang telah kami tentukan.</div>
    </div>
</div>
<div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingNine">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseNine" aria-expanded="false" aria-controls="flush-collapseNine">
        <i class="bi bi-list-check icon-large"></i> Apa saja yang diperlukan saat melakukan pendaftaran ulang ?
    </button>
    </h2>
    <div id="flush-collapseNine" class="accordion-collapse collapse" aria-labelledby="flush-headingNine" data-bs-parent="#accordionFlushExample">
    <div class="accordion-body">Setiap peserta wajib melakukan pendaftaran ulang dan informasi lebih lanjut mengenai pendaftaran ulang akan disampaikan melalui portal SPMB IT Del.</div>
    </div>  
</div>
</div>
</div>
<!-- Feedback/Testimonials Section -->
<section id="testimonials" class="my-5">
<h2 style="text-align: center;">Testimonial atau ulasan para mahasiswa</h2> <br>    
<div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <i class="fas fa-laptop-code fa-2x mb-3"></i> <!-- Software Developer -->
                    <blockquote class="blockquote mb-0">
                        <p>"Great course! I learned a lot."</p>
                        <footer class="blockquote-footer">John Doe, <cite title="Source Title">Software Developer</cite></footer>
                    </blockquote>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <i class="fas fa-tasks fa-2x mb-3"></i> <!-- Product Manager -->
                    <blockquote class="blockquote mb-0">
                        <p>"I would recommend this to anyone."</p>
                        <footer class="blockquote-footer">Jane Smith, <cite title="Source Title">Product Manager</cite></footer>
                    </blockquote>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <i class="fas fa-chart-line fa-2x mb-3"></i> <!-- Data Analyst -->
                    <blockquote class="blockquote mb-0">
                        <p>"Best learning experience ever."</p>
                        <footer class="blockquote-footer">Bob Johnson, <cite title="Source Title">Data Analyst</cite></footer>
                    </blockquote>
                </div>
            </div>
        </div>
    </div>
</section>

</div>
<!-- develoment status -->
<?php /*Modal::begin([
    'title' => '<h2 class="text-center">Under Development</h2>',
    'id' => 'developmentModal',
    'options' => ['class' => 'fade modal-dialog-centered'],
]); */?>
<!-- <div class="modal-body">
    <p class="text-center">This application is still under development and may contain bugs. We are working hard to improve it. Thank you for your patience and understanding.</p>
</div>
<div class="text-center mt-3">
    <small>Developed by <strong>Michael Sipayung</strong></small>
</div>
<?php //Modal::end(); ?> -->
</body>
</html>
    <!-- ChatWith.io WhatsApp chat widget code -->
<script type="text/javascript">
        (function () {
            var options = {
                whatsapp: "+62-812-9383-0184", // WhatsApp number
                call_to_action: "Message us", // Call to action
                position: "right", // Position may be 'right' or 'left'
            };
            var proto = document.location.protocol, host = "getbutton.io", url = proto + "//static." + host;
            var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
            s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
            var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
        })();
    </script>

