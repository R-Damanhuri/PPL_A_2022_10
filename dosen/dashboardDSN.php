<?php include("../template/headerdosen.php");
$nama_dosen= $db->query("SELECT dosen.nama AS nama_dosen FROM dosen,user WHERE dosen.username = user.username AND dosen.username = '$username'")->fetch_object()->nama_dosen;
$NIP_dosen = $db->query("SELECT dosen.NIP AS NIP_dosen FROM dosen,user WHERE dosen.username = user.username AND dosen.username = '$username'")->fetch_object()->NIP_dosen;
$email_dosen = $db->query("SELECT email FROM user WHERE username = '$username'")->fetch_object()->email;

$count_mhs_wali = $db->query("SELECT COUNT(NIM) AS jumlah FROM mahasiswa WHERE mahasiswa.NIP_Doswal =". $NIP_dosen)->fetch_object()->jumlah;
$count_mhs_wali_aktif = $db->query("SELECT COUNT(NIM) AS jumlah FROM mahasiswa WHERE mahasiswa.NIP_Doswal =". $NIP_dosen. " AND mahasiswa.Status = 'Aktif'")->fetch_object()->jumlah;
$count_mhs_wali_nonaktif = $db->query("SELECT COUNT(NIM) AS jumlah FROM mahasiswa WHERE mahasiswa.NIP_Doswal =". $NIP_dosen. " AND mahasiswa.Status != 'Aktif'")->fetch_object()->jumlah;
$count_mhs_wali_lulus = $db->query("SELECT COUNT(NIM) AS jumlah FROM mahasiswa WHERE mahasiswa.NIP_Doswal =". $NIP_dosen. " AND mahasiswa.Status = 'Lulus'")->fetch_object()->jumlah;
$count_mhs_wali_lulusPKL = $db->query("SELECT COUNT(pkl.NIM) AS jumlah FROM mahasiswa, pkl WHERE mahasiswa.NIM = pkl.NIM AND mahasiswa.NIP_Doswal =". $NIP_dosen. " AND pkl.Status = 'Lulus'")->fetch_object()->jumlah;
$count_mhs_wali_lulusSkripsi = $db->query("SELECT COUNT(skripsi.NIM) AS jumlah FROM mahasiswa, skripsi WHERE mahasiswa.NIM = skripsi.NIM AND mahasiswa.NIP_Doswal =". $NIP_dosen. " AND skripsi.Status = 'Lulus'")->fetch_object()->jumlah;

?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4" style="width: 80%;">
            <h1 class="mt-4 mb-4">Dashboard Dosen</h1>
            <div class="row">
                <div class="col">
                    <di class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-area me-1"></i>
                            <b>Informasi Dosen</b>
                        </div>
                        <div class="row no-gutters">
                            <div class="col-md-6 profil-dosen">
                                <img src="<?php echo $foto ?>" class="" alt="ProfilePicture">
                            </div>
                            <div class="col-md-6">
                                <div div class="card-body">
                                    <div class="container overflow-hidden">
                                        <div class="nama-profil-dosen">
                                            <ul class="list-unstyled">
                                                <li><span class="fw-bold">Nama&emsp;&emsp;:
                                                        &emsp;</span><?php echo $nama_dosen ?></li>
                                                <li> <span class="fw-bold">NIP&emsp; &ensp;&ensp;&emsp;:
                                                        &emsp;</span><?php echo $NIP_dosen ?></li>
                                                <li><span class="fw-bold">Email&emsp; &emsp;:
                                                        &emsp;</span><?php echo $email_dosen ?></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-area me-1"></i>
                            <b>Rekap Status Mahasiswa Informatika</b>
                        </div>
                        <div class="card-body">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                        <div class="card mb-4 border-2 solid border border-dark">
                                            <div class="card-body">
                                                <div class="card-title">
                                                    <h1><?php echo $count_mhs_wali ?></h1>
                                                </div>
                                                <div class="card-subtitle">
                                                    <p>Jumlah Mahasiswa Perwalian</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 ">
                                        <div class="card mb-4 border-2 solid border border-dark">
                                            <div class="card-body">
                                                <div class="card-title">
                                                    <h1><?php echo $count_mhs_wali_aktif ?></h1>
                                                </div>
                                                <div class="card-subtitle">
                                                    <p>Mahasiswa Perwalian Aktif</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                        <div class="card mb-4 border-2 solid border border-dark">
                                            <div class="card-body">
                                                <div class="card-title">
                                                    <h1><?php echo $count_mhs_wali_lulus ?></h1>
                                                </div>
                                                <div class="card-subtitle">
                                                    <p>Mahasiswa Perwalian Lulus</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                        <div class="card mb-4 border-2 solid border border-dark">
                                            <div class="card-body">
                                                <div class="card-title">
                                                    <h1><?php echo $count_mhs_wali_lulusPKL ?></h1>
                                                </div>
                                                <div class="card-subtitle">
                                                    <p>Mahasiswa Perwalian Sudah PKL</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                        <div class="card mb-4 border-2 solid border border-dark">
                                            <div class="card-body">
                                                <div class="card-title">
                                                    <h1><?php echo $count_mhs_wali_lulusSkripsi?></h1>
                                                </div>
                                                <div class="card-subtitle">
                                                    <p>Mahasiswa Perwalian Sudah Skripsi</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                        <div class="card mb-4 border-2 solid border border-dark">
                                            <div class="card-body">
                                                <div class="card-title">
                                                    <h1><?php echo $count_mhs_wali_nonaktif ?></h1>
                                                </div>
                                                <div class="card-subtitle">
                                                    <p>Mahasiswa Perwalian Non-Aktif</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php include("../template/footeruniversal.php")?>