<?php include("../template/headerdosen.php");
function mahasiswa_PKL($status,$tahun){
    global $db;
    global $NIP_dosen;
    $PKL_mhs = $db->query("SELECT COUNT(pkl.NIM) AS jumlah FROM mahasiswa, pkl WHERE mahasiswa.NIM = pkl.NIM AND mahasiswa.NIP_Doswal =". $NIP_dosen. " AND pkl.Status = '".$status."' AND mahasiswa.Angkatan =".$tahun)->fetch_object()->jumlah;
    echo $PKL_mhs;
}
$NIP_dosen = $db->query("SELECT dosen.NIP AS NIP_dosen FROM dosen,user WHERE dosen.username = user.username AND dosen.username = '$username'")->fetch_object()->NIP_dosen;
$angkatan = array(2016,2017,2018,2019,2020,2021);


$NIP_dosen = $db->query("SELECT dosen.NIP AS NIP_dosen FROM dosen,user WHERE dosen.username = user.username AND dosen.username = '$username'")->fetch_object()->NIP_dosen;

?>

<script src="../js/rekap.js"></script>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4" style="width: 80%;">
            <h3 class="mt-4 mb-4">Progres Studi -> Rekap PKL</h3>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    <b>Rekap PKL Mahasiswa Informatika</b>
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
                            echo '<div class="col"><a class="btn btn-success" role="button" onclick="showPKLLulus('.$value.')">';
                            echo mahasiswa_PKL("Lulus",$value);
                            echo '</a></div>';
                        }
                        ?>
                        <div class="col"><a class="btn btn-success" role="button" href="#"></a> Sudah</div>
                    </div>
                    <div class="row row-cols-9 align-items-center m-2">
                        <?php
                        foreach ($angkatan as $value){
                            echo '<div class="col"><a class="btn btn-danger" role="button" onclick="showPKLBelum('.$value.')">';
                            echo mahasiswa_PKL("Belum Lulus",$value);
                            echo '</a></div>';
                        }
                        ?>
                        <div class="col"><a class="btn btn-danger" role="button" href="#"></a> Belum</div>
                    </div>
                </div>
            </div>
            <div class="card mb-4" id="">
                <table class="table" id="">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Angkatan</th>
                            <th>Semester</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="listPKL">
                    </tbody>
                </table>
            </div>
            <a style="color: #fff" class="btn btn-primary float-end" role="button" href="verifkhs.php">Cetak</a>

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
                            <button type="button" class="btn btn-primary" onclick="window.location.href='verifpkl.php'"
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
                            <h5 class="modal-title" id="exampleModalLongTitle">Berkas PKL</h5>
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
