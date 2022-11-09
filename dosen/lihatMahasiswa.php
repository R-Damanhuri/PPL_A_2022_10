<?php 
include("../template/headerdosen.php"); 

$NIM_mahasiswa = $_GET['id'];

$mhs_query = "SELECT * FROM mahasiswa WHERE mahasiswa.NIM = $NIM_mahasiswa";
$nama_dosen = $db->query("SELECT dosen.nama AS nama_dosen FROM dosen, mahasiswa, user WHERE dosen.nip = mahasiswa.nip_doswal AND mahasiswa.NIM = $NIM_mahasiswa")->fetch_object()->nama_dosen;
$NIP_dosen = $db->query("SELECT dosen.nip AS NIP_dosen FROM dosen, mahasiswa, user WHERE dosen.nip = mahasiswa.nip_doswal AND mahasiswa.NIM = $NIM_mahasiswa")->fetch_object()->NIP_dosen;

$email_mahasiswa = $db->query($mhs_query)->fetch_object()->Email;
$nama_mahasiswa = $db->query($mhs_query)->fetch_object()->Nama;
$status_mahasiswa = $db->query("SELECT mahasiswa.status AS status_mahasiswa FROM mahasiswa,user WHERE mahasiswa.username = user.username AND mahasiswa.NIM = $NIM_mahasiswa")->fetch_object()->status_mahasiswa;
$semester_mahasiswa = $db->query("SELECT mahasiswa.semester AS semester_mahasiswa FROM mahasiswa,user WHERE mahasiswa.username = user.username AND mahasiswa.NIM = $NIM_mahasiswa")->fetch_object()->semester_mahasiswa;

$IPK_mahasiswa = $db->query("SELECT khs.ip_kumulatif AS IPK_mahasiswa FROM khs, mahasiswa, user WHERE khs.nim = mahasiswa.nim AND mahasiswa.NIM = $NIM_mahasiswa")->fetch_object()->IPK_mahasiswa;
$SKS_mahasiswa = $db->query("SELECT khs.sks_kumulatif AS SKS_mahasiswa FROM khs, mahasiswa, user WHERE khs.nim = mahasiswa.nim AND mahasiswa.NIM = $NIM_mahasiswa")->fetch_object()->SKS_mahasiswa;
$IPS_mahasiswa = $db->query("SELECT khs.ip_semester AS IPS_mahasiswa FROM khs, mahasiswa, user WHERE khs.nim = mahasiswa.nim AND mahasiswa.NIM = $NIM_mahasiswa")->fetch_object()->IPS_mahasiswa;
$SKSS_mahasiswa = $db->query("SELECT khs.sks_semester AS SKSS_mahasiswa FROM khs, mahasiswa, user WHERE khs.nim = mahasiswa.nim AND mahasiswa.NIM = $NIM_mahasiswa")->fetch_object()->SKSS_mahasiswa;

$KHS_Berkas = $db->query("SELECT khs.berkas_KHS AS KHS_Berkas FROM khs, mahasiswa WHERE khs.nim = mahasiswa.nim AND mahasiswa.NIM = $NIM_mahasiswa")->fetch_object()->KHS_Berkas ;
$IRS_Berkas = $db->query("SELECT irs.berkas_IRS AS IRS_Berkas FROM irs, mahasiswa WHERE irs.nim = mahasiswa.nim AND mahasiswa.NIM = $NIM_mahasiswa")->fetch_object()->IRS_Berkas;
$PKL_Berkas = $db->query("SELECT pkl.berkas_PKL AS PKL_Berkas FROM pkl, mahasiswa WHERE pkl.nim = mahasiswa.nim AND mahasiswa.NIM = $NIM_mahasiswa")->fetch_object()->PKL_Berkas ;
$Skripsi_Berkas = $db->query("SELECT skripsi.berkas_Skripsi AS Skripsi_Berkas FROM skripsi, mahasiswa WHERE skripsi.nim = mahasiswa.nim AND mahasiswa.NIM = $NIM_mahasiswa")->fetch_object()->Skripsi_Berkas;

$Status_PKL = $db->query("SELECT pkl.status AS status_pkl FROM pkl, mahasiswa WHERE pkl.nim = mahasiswa.nim AND mahasiswa.NIM = $NIM_mahasiswa")->fetch_object()->status_pkl ;
$Verif_PKL = $db->query("SELECT pkl.status_verif AS verif_pkl FROM pkl, mahasiswa WHERE pkl.nim = mahasiswa.nim AND mahasiswa.NIM = $NIM_mahasiswa")->fetch_object()->verif_pkl ;
$Nilai_PKL = $db->query("SELECT pkl.Nilai AS nilai_pkl FROM pkl, mahasiswa WHERE pkl.nim = mahasiswa.nim AND mahasiswa.NIM = $NIM_mahasiswa")->fetch_object()->nilai_pkl ;
$SMT_Lulus = $db->query("SELECT pkl.Semester_Lulus AS smt_lulus FROM pkl, mahasiswa WHERE pkl.nim = mahasiswa.nim AND mahasiswa.NIM = $NIM_mahasiswa")->fetch_object()->smt_lulus ;

$Status_Skripsi = $db->query("SELECT skripsi.status AS status_skripsi FROM skripsi, mahasiswa WHERE skripsi.nim = mahasiswa.nim AND mahasiswa.NIM = $NIM_mahasiswa")->fetch_object()->status_skripsi ;
$Verif_Skripsi = $db->query("SELECT skripsi.status_verif AS verif_skripsi FROM skripsi, mahasiswa WHERE skripsi.nim = mahasiswa.nim AND mahasiswa.NIM = $NIM_mahasiswa")->fetch_object()->verif_skripsi ;
$Nilai_Skripsi = $db->query("SELECT skripsi.Nilai AS nilai_skripsi FROM skripsi, mahasiswa WHERE skripsi.nim = mahasiswa.nim AND mahasiswa.NIM = $NIM_mahasiswa")->fetch_object()->nilai_skripsi ;
$Lama_Studi = $db->query("SELECT skripsi.Lama_Studi_tahun AS lama_studi FROM skripsi, mahasiswa WHERE skripsi.nim = mahasiswa.nim AND mahasiswa.NIM = $NIM_mahasiswa")->fetch_object()->lama_studi ;
$Tanggal_Sidang = $db->query("SELECT skripsi.Tanggal_Sidang AS tanggal_sidang FROM skripsi, mahasiswa WHERE skripsi.nim = mahasiswa.nim AND mahasiswa.NIM = $NIM_mahasiswa")->fetch_object()->tanggal_sidang ;

?>

<body>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4" style="width: 80%;"><a class="btn btn-danger float-end" role="button"
                    href="individu.php">Back</a>
                <h1 class="mt-4 mb-4">Progres Studi Mahasiswa</h1>
                <div class="row">
                    <div class="col">
                        <div class="card mb-4" style="height:210px">
                            <div class="card-header">
                                <i class="fas fa-chart-area me-1"></i>
                                <b>Informasi Mahasiswa</b>
                            </div>
                            <div class="row no-gutters">
                                <!-- <div class="col-md-4 profil-mahasiswa">
                                    <img src="<?php echo $foto ?>" class="" alt="ProfilePicture">
                                </div> -->
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

                    <div class="col">
                        <div class="card mb-4" style="height:210px">
                            <div class="card-header">
                                <i class="fas fa-chart-area me-1"></i>
                                <b>Berkas</b>
                            </div>
                            <div class="card-body">
                                <div>
                                    <ul
                                        style="list-style: none;display:flex;justify-content: center;gap: 50px; margin-right:30px">
                                        <li style="display:flex-row;items-center;">
                                            <p style="margin-bottom: 50px; margin-left:20px">IRS</p>
                                            <a href="<?php echo $IRS_Berkas ?>" download="Berkas_IRS.pdf" type="button"
                                                class="btn btn-primary">Berkas</a>
                                        </li>
                                        <li style="display:flex-row;items-center;x">
                                            <p style="margin-bottom: 50px; margin-left:20px">KHS</p>
                                            <a href="<?php echo $KHS_Berkas ?>" download="Berkas_KHS.pdf" type="button"
                                                class="btn btn-primary">Berkas</a>
                                        </li>
                                        <li style="display:flex-row;items-center;">
                                            <p style="margin-bottom: 50px; margin-left:20px">PKL</p>
                                            <a href="<?php echo $PKL_Berkas ?>" download="Berkas_PKL.pdf" type="button"
                                                class="btn btn-primary">Berkas</a>
                                        </li>
                                        <li style="display:flex-row;items-center;">
                                            <p style="margin-bottom: 50px; margin-left:10px">Skripsi</p>
                                            <a href="<?php echo $Skripsi_Berkas ?>" download="Berkas_Skripsi.pdf"
                                                type="button" class="btn btn-primary">Berkas</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-3">
                        <div class="card mb-4" style="height:200px;width:310px;">
                            <div class="card-header">
                                <i class="fas fa-chart-area me-1"></i>
                                <b>IRS</b>
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
                    <div class="col-3">
                        <div class="card mb-4" style="height:200px;width:310px;">
                            <div class="card-header">
                                <i class="fas fa-chart-area me-1"></i>
                                <b>KHS</b>
                            </div>
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="my-0 gap-3"
                                        style="vertical-align: center; text-align:justify'display:inline-block;">
                                        <ul class="list-unstyled">
                                            <li><span class="fw-bold">IP Kumulatif &emsp;&emsp;:
                                                    &emsp;</span><?php echo $IPK_mahasiswa ?></li>
                                            <li> <span class="fw-bold">SKS Kumulatif &emsp;:
                                                    &emsp;</span><?php echo $SKS_mahasiswa ?></li>
                                            <li><span class="fw-bold">IP Semester &emsp;&emsp;:
                                                    &emsp;</span><?php echo $IPS_mahasiswa ?></li>
                                            <li><span class="fw-bold">SKS Semester &emsp;:
                                                    &emsp;</span><?php echo $SKSS_mahasiswa ?></li>
                                            <ul>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card mb-4" style="height:200px;width:310px;">
                            <div class="card-header">
                                <i class="fas fa-chart-area me-1"></i>
                                <b>PKL</b>
                            </div>
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="my-0 gap-3"
                                        style="vertical-align: center; text-align:justify'display:inline-block;">
                                        <ul class="list-unstyled">
                                            <li><span class="fw-bold">Status &emsp;&emsp; &emsp; &emsp; &emsp;:
                                                    &emsp;</span><?php echo $Status_PKL ?></li>
                                            <li> <span class="fw-bold">Verifikasi Berkas &emsp;:
                                                    &emsp;</span><?php echo $Verif_PKL ?></li>
                                            <li><span class="fw-bold">Nilai &emsp;&emsp;&emsp;&emsp; &emsp; &emsp;:
                                                    &emsp;</span><?php echo $Nilai_PKL ?></li>
                                            <li><span class="fw-bold">Semester Lulus &ensp; &emsp;:
                                                    &emsp;</span><?php echo $SMT_Lulus ?></li>
                                            <ul>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card mb-4" style="height:200px;width:310px;">
                            <div class="card-header">
                                <i class="fas fa-chart-area me-1"></i>
                                <b>Skripsi</b>
                            </div>
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="my-0 gap-3"
                                        style="vertical-align: center; text-align:justify'display:inline-block;">
                                        <ul class="list-unstyled">
                                            <li><span class="fw-bold">Status &emsp;&emsp; &emsp; &emsp; &emsp;:
                                                    &emsp;</span><?php echo $Status_Skripsi ?></li>
                                            <li> <span class="fw-bold">Verifikasi Berkas &emsp;:
                                                    &emsp;</span><?php echo $Verif_Skripsi ?></li>
                                            <li><span class="fw-bold">Nilai &emsp;&emsp;&emsp;&emsp; &emsp; &emsp;:
                                                    &emsp;</span><?php echo $Nilai_Skripsi ?></li>
                                            <li> <span class="fw-bold">Lama Studi &emsp; &emsp; &emsp;:
                                                    &emsp;</span><?php echo $Lama_Studi ?></li>
                                            <li><span class="fw-bold">Tanggal Sidang &emsp;&ensp;:
                                                    &emsp;</span><?php echo $Tanggal_Sidang ?></li>
                                            <ul>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </main>

        <?php include("../template/footeruniversal.php") ?>
