<?php include("../template/headerdosen.php");
function mahasiswa_status($status,$tahun){
    global $db;
    global $NIP_dosen;
    $status_mhs = $db->query("SELECT COUNT(mahasiswa.NIM) AS jumlah FROM mahasiswa WHERE mahasiswa.NIP_Doswal =". $NIP_dosen. " AND mahasiswa.Status ='" .$status. "' AND mahasiswa.Angkatan =".$tahun)->fetch_object()->jumlah;
    echo $status_mhs;
}
$NIP_dosen = $db->query("SELECT dosen.NIP AS NIP_dosen FROM dosen,user WHERE dosen.username = user.username AND dosen.username = '$username'")->fetch_object()->NIP_dosen;
$angkatan = array(2016,2017,2018,2019,2020,2021);
                        

?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4" style="width: 80%;">
            <h3 class="mt-4 mb-4">Progres Studi -> Rekap Status</h3>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    <b>Rekap Status Mahasiswa Informatika</b>
                </div>
                <div class="card-body">
                    <div class="row row-cols-9 align-items-center m-2">
                        <div class="col"><b>2016</b></div>
                        <div class="col"><b>2017</b></div>
                        <div class="col"><b>2018</b></div>
                        <div class="col"><b>2019</b></div>
                        <div class="col"><b>2020</b></div>
                        <div class="col"><b>2021</b></div>
                        <div class="col"></div>
                    </div> 
                    <div class="row row-cols-9 align-items-center m-2">
                        <?php
                        foreach ($angkatan as $value){
                            echo '<div class="col"><a style="color: #fff; background-color: #198754;
                            border-color: #198754;" class="btn" role="button" href="#">';
                            echo mahasiswa_status("Aktif",$value);
                            echo '</a></div>';
                        }
                        ?>
                        <div class="col"><a style="color: #fff; background-color: #198754;
                            border-color: #198754;" class="btn" role="button" href="#"></a> Aktif</div>
                    </div>
                    <div class="row row-cols-9 align-items-center m-2">
                    <?php
                        foreach ($angkatan as $value){
                            echo '<div class="col"><a style="color: #fff; background-color: #3697FF;
                            border-color: #3697FF;" class="btn" role="button" href="#">';
                            echo mahasiswa_status("Cuti",$value);
                            echo '</a></div>';
                        }
                        ?>
                        <div class="col"><a style="color: #fff; background-color: #3697FF;
                            border-color: #3697FF;" class="btn" role="button" href="#"></a> Cuti</div>
                    </div>
                    <div class="row row-cols-9 align-items-center m-2">
                    <?php
                        foreach ($angkatan as $value){
                            echo '<div class="col"><a style="color: #fff; background-color: #FFAB00;
                            border-color: #FFAB00;" class="btn" role="button" href="#">';
                            echo mahasiswa_status("Mangkir",$value);
                            echo '</a></div>';
                        }
                        ?>
                        <div class="col"><a style="color: #fff; background-color: #FFAB00;
                            border-color: #FFAB00;" class="btn" role="button" href="#"></a> Mangkir</div>
                    </div>
                    <div class="row row-cols-9 align-items-center m-2">
                        <?php
                        foreach ($angkatan as $value){
                            echo '<div class="col"><a style="color: #fff; background-color: #F35625;
                            border-color: #F35625;" class="btn" role="button" href="#">';
                            echo mahasiswa_status("Drop-out",$value);
                            echo '</a></div>';
                        }
                        ?>
                        <div class="col"><a style="color: #fff; background-color: #F35625;
                            border-color: #F35625;" class="btn" role="button" href="#"></a> Drop Out</div>
                    </div>
                    <div class="row row-cols-9 align-items-center m-2">
                    <?php
                        foreach ($angkatan as $value){
                            echo '<div class="col"><a style="color: #fff; background-color: #AA1212;
                            border-color: #AA1212;" class="btn" role="button" href="#">';
                            echo mahasiswa_status("Undur Diri",$value);
                            echo '</a></div>';
                        }
                        ?>
                        <div class="col"><a style="color: #fff; background-color: #AA1212;
                            border-color: #AA1212;" class="btn" role="button" href="#"></a> Undur Diri</div>
                    </div>
                    <div class="row row-cols-9 align-items-center m-2">
                    <?php
                        foreach ($angkatan as $value){
                            echo '<div class="col"><a style="color: #fff; background-color: #77DEEC;
                            border-color: #77DEEC;" class="btn" role="button" href="#">';
                            echo mahasiswa_status("Lulus",$value);
                            echo '</a></div>';
                        }
                        ?>
                        <div class="col"><a style="color: #fff; background-color: #77DEEC;
                            border-color: #77DEEC;" class="btn" role="button" href="#"></a> Lulus</div>
                    </div>
                    <div class="row row-cols-9 align-items-center m-2">
                    <?php
                        foreach ($angkatan as $value){
                            echo '<div class="col"><a style="color: #fff; background-color: #7D5EFA;
                            border-color: #7D5EFA;" class="btn" role="button" href="#">';
                            echo mahasiswa_status("Meninggal    ",$value);
                            echo '</a></div>';
                        }
                        ?>
                        <div class="col"><a style="color: #fff; background-color: #7D5EFA;
                            border-color: #7D5EFA;" class="btn" role="button" href="#"></a> Meninggal Dunia</div>
                    </div>
                </div>
            </div>
            <div class="card mb-4" id="listStatus"></div>
            <a class="btn btn-primary float-end" role="button" href="verifkhs.php">Cetak</a>

            <!-- Modal -->
            <div class="modal fade" id="verifModal" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Data Verified</h5>
                        </div>
                        <div class="modal-body">
                            Data updated and verified.
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" onclick="window.location.href='verifStatus.php'"
                                data-bs-dismiss="modal"> OK</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="pdfModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Berkas Status</h5>
                            <button type="button" class="btn-close" aria-label="Close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <embed src="../Files/contoh.pdf" frameborder="0" width="100%" height="500px">
                        </div>
                    </div>
                </div>
            </div>
    </main>

    <?php include("../template/footeruniversal.php")?>