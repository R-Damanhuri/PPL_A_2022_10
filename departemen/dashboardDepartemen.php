<?php 
session_start();
if(!isset($_SESSION['username'])){
    header('Location: ../index.php');
}
include("../template/headerdepartemen.php");
include("../lib/connect.php");
$count_dosen = $db->query("SELECT COUNT(NIP) AS jumlah FROM dosen")->fetch_object()->jumlah;
$count_dosen_aktif = $db->query("SELECT COUNT(NIP) AS jumlah FROM dosen where Status = 'Aktif'")->fetch_object()->jumlah;
$count_dosen_cuti = $db->query("SELECT COUNT(NIP) AS jumlah FROM dosen where Status != 'Aktif'")->fetch_object()->jumlah;

?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4" style="width: 80%">
            <h3 class="mt-4 mb-4">Dashboard Departemen</h3>
            <div class="row">
                <div class="col">
                    <di class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-area me-1"></i>
                            <b>Informasi Operator</b>
                        </div>
                        <div class="row no-gutters">
                            <div class="col-md-4 profil-departemen">
                                <img src="../assets/img/logo-undip.png" class="" alt="ProfilePicture  ">
                            </div>
                            <div class="col-md-8">
                                <div   div class="card-body">
                                    <div class="container overflow-hidden">
                                        <div class="nama-profil-departemen">
                                            <ul class="list-unstyled">
                                                <li><span    
                                                    class="fw-bold">Departemen&emsp;: &emsp;</span>Informatika</li>
                                                <li> <span
                                                    class="fw-bold">Fakultas&emsp;&emsp;&emsp;: &emsp;</span>Sains dan Matematika</li>
                                                <li><span
                                                    class="fw-bold">E-mail&emsp;&emsp;&emsp; &ensp;: &emsp;</span>Informatika@mail.com</li>
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
                            <b>Rekap Status Dosen Informatika</b>
                        </div>
                        <div class="card-body">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                    <div class="card mb-4 border-2 solid border border-dark">  
                                        <div class="card-body">
                                            <div class="card-title">
                                                <h1><?php echo $count_dosen_aktif ?></h1>
                                            </div>
                                            <div class="card-subtitle">
                                                <p>Jumlah Dosen Aktif</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 ">
                                    <div class="card mb-4 border-2 solid border border-dark">
                                        <div class="card-body">
                                            <div class="card-title">
                                                <h1><?php echo $count_dosen_cuti ?></h1>
                                            </div>
                                            <div class="card-subtitle">
                                                <p>Jumlah Dosen Cuti</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                    <div class="card mb-4 border-2 solid border border-dark">
                                        <div class="card-body">
                                            <div class="card-title">
                                                <h1><?php echo $count_dosen ?></h1>
                                            </div>
                                            <div class="card-subtitle">
                                                <p>Jumlah Mata Kuliah</p>
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
            <div class="card mb-4">
            <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    <b>Data Rekap Mahasiswa</b>
                </div>
                <div class="card-body tabel-dosen cell-border">
                    <table id="admin-tabel-mahasiswa" class="cell-border dataTable" cellspacing="1" width="100%" >
                        <thead>
                            <tr>
                                <th>No </th>
                                <th>Nama</th>
                                <th>NIP</th>
                                <th>Email</th>
                                <th>Mengampu</th>
                                <th>Status</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                                $query = "SELECT * FROM dosen   ";
                                $result = $db->query($query);
                                $i = 1;
                                while ($row = $result->fetch_object()) {
                                    echo "<tr>
                                    <td>".$i."</td>
                                    <td>".$row->Nama."</td>
                                    <td>".$row->NIP."</td>
                                    <td>".$row->Email."</td>
                                    <td>".$row->Mengampu."</td>
                                    <td>".$row->Status."</td>";
                                    $i++;
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
    </main>

    <?php include("../template/footeruniversal.php")?>
