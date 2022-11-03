<?php 
include("../template/headermahasiswa.php"); 

$NIM_mahasiswa = $db->query("SELECT mahasiswa.NIM AS NIM_mahasiswa FROM mahasiswa,user WHERE mahasiswa.username = user.username AND mahasiswa.username = '$username'")->fetch_object()->NIM_mahasiswa;
$email_mahasiswa = $db->query("SELECT email FROM user WHERE username = '$username'")->fetch_object()->email;
$nama_dosen = $db->query("SELECT dosen.nama AS nama_dosen FROM dosen, mahasiswa, user WHERE dosen.nip = mahasiswa.nip_doswal AND mahasiswa.username = '$username'")->fetch_object()->nama_dosen;
$NIP_dosen = $db->query("SELECT dosen.nip AS NIP_dosen FROM dosen, mahasiswa, user WHERE dosen.nip = mahasiswa.nip_doswal AND mahasiswa.username = '$username'")->fetch_object()->NIP_dosen;
$status_mahasiswa = $db->query("SELECT mahasiswa.status AS status_mahasiswa FROM mahasiswa,user WHERE mahasiswa.username = user.username AND mahasiswa.username = '$username'")->fetch_object()->status_mahasiswa;
$semester_mahasiswa = $db->query("SELECT mahasiswa.semester AS semester_mahasiswa FROM mahasiswa,user WHERE mahasiswa.username = user.username AND mahasiswa.username = '$username'")->fetch_object()->semester_mahasiswa;
$IPK_mahasiswa = $db->query("SELECT khs.ip_kumulatif AS IPK_mahasiswa FROM khs, mahasiswa, user WHERE khs.nim = mahasiswa.nim AND mahasiswa.username = '$username'")->fetch_object()->IPK_mahasiswa;
$SKS_mahasiswa = $db->query("SELECT khs.sks_kumulatif AS SKS_mahasiswa FROM khs, mahasiswa, user WHERE khs.nim = mahasiswa.nim AND mahasiswa.username = '$username'")->fetch_object()->SKS_mahasiswa;


?>

<body>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4" style="width: 80%;">
                <h1 class="mt-4 mb-4">Dashboard Mahasiswa</h1>
                <div class="row">
                    <div class="col">
                        <di class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-area me-1"></i>
                                <b>Informasi Mahasiswa</b>
                            </div>
                            <div class="row no-gutters">
                                <div class="col-md-4 profil-mahasiswa">
                                    <img src="<?php echo $foto ?>" class="" onerror="this.src='../assets/img/default.png'" alt="">
                                    <span class="caption cap-edit"><a class="btn btn-primary-sm" style="color:blue;" href='editmhsmhs.php'>Edit Data</a></span>
                                </div>
                                <div class="col-md-8">
                                    <div div class="card-body">
                                        <div class="container overflow-hidden">
                                            <div class="nama-profil-mahasiswa">
                                                <ul class="list-unstyled">
                                                    <li><span class="fw-bold">Nama&emsp;&emsp;:
                                                            &emsp;</span><?php echo $nama_mahasiswa?></li>
                                                    <li> <span class="fw-bold">NIM&emsp;&ensp;&ensp;&emsp;:
                                                            &emsp;</span><?php echo $NIM_mahasiswa ?></li>
                                                    <li><span class="fw-bold">Email&emsp; &emsp;:
                                                            &emsp;</span><?php echo $email_mahasiswa ?></li>
                                                    <li><span class="fw-bold">Prodi&ensp;&nbsp;&ensp; &emsp;:
                                                            &emsp;</span>Informatika</li>
                                                    <li><span class="fw-bold">Fakultas&emsp;: &emsp;</span>Sains dan
                                                        Matematika</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card mb-4" style="height: 170px;width: 50%;">
                            <div class="card-header">
                                <i class="fas fa-chart-area me-1"></i>
                                <b>Status Akademik</b>
                            </div>
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="my-0 gap-3"
                                        style="vertical-align: center; text-align:justify'display:inline-block;">
                                        <ul class="list-unstyled">
                                            <li><span class="fw-bold">Status &emsp; &emsp;&emsp;:
                                                    &emsp;</span><?php echo $status_mahasiswa ?></li>
                                            <li> <span class="fw-bold">Dosen Wali &emsp;:
                                                    &emsp;</span><?php echo $nama_dosen ?></li>
                                            <li><span class="fw-bold">NIP &emsp; &emsp; &emsp;&emsp;:
                                                    &emsp;</span><?php echo $NIP_dosen ?></li>
                                            <li><span class="fw-bold">Semester &emsp;&emsp;:
                                                    &emsp;</span><?php echo $semester_mahasiswa ?></li>
                                            <ul>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="card" style="height:170px;width:230px;">
                            <div class="card-header">
                                <i class="fas fa-chart-area me-1"></i>
                                <b>Prestasi Mahasiswa</b>
                            </div>
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="p-2 ">
                                        <div class="d-flex flex-column">
                                            IPK
                                        </div>
                                    </div>
                                    <div class="p-2">
                                        <i class=""><?php echo $IPK_mahasiswa ?></i>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="p-2 ">
                                        <div class="d-flex flex-column">
                                            SKSK
                                        </div>
                                    </div>
                                    <div class="p-2">
                                        <i class=""><?php echo $SKS_mahasiswa ?></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <?php include("../template/footeruniversal.php") ?>