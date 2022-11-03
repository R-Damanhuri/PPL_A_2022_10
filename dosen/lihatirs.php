<?php include("../template/headerdosen.php");

$nimmhs = $_GET['id'];
$nama = $db->query("SELECT nama FROM mahasiswa WHERE NIM = '$nimmhs'")->fetch_object()->nama;
$row = $db->query("SELECT * FROM IRS WHERE NIM = '$nimmhs'")->fetch_object();
$ip = $db->query("SELECT IP_Semester FROM khs WHERE NIM = '$nimmhs'")->fetch_object()->IP_Semester;
if($ip >= 3){
    $sksmax = 24;
}else{
    $sksmax = 22;
}
if(isset($_POST['verif'])){
    if($row->Status == 'Sudah'){
        $db->query("UPDATE irs SET Status = 'Belum' WHERE NIM = '$nimmhs'");
    }else{
        $db->query("UPDATE irs SET Status = 'Sudah' WHERE NIM = '$nimmhs'");
    }
    header("Refresh:0");

}
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4" style="width: 80%;">
            <h3 class="mt-4 mb-4">Verifikasi Berkas -> IRS -> Lihat</h3>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    <b>Status Verifikasi</b>
                    <a class="btn btn-danger float-end" role="button" href="verifirs.php">Back</a>
                </div>
                <div class="card-body">
                    <table class="table" id="datatablesSimple1">
                        <thead class="table-light">
                            <tr>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Status</th>
                                <th>Berkas IRS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo $nimmhs ?></td>
                                <td><?php echo $nama ?></td>
                                <td><?php echo $row->Status ?></td>
                                <td><a href="#" class="btn btn-success" role="button" id="pdf" data-bs-toggle="modal"
                                    data-bs-target="#pdfModal">Lihat</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

                <div class="card mb-4">
                    <div class="row row-cols-2">
                        <div class="col">
                            <div class="card-body">
                                <div class="card-title">
                                    <h5>Semester Aktif</h5>
                                </div>
                                <input type="text" name="input1" id="input1" class="form-control" disabled placeholder="<?php echo $row->Semester_Aktif ?>">
                                <i class="fa fa-circle-info"></i><small> Semester yang ditempuh TP 2022/2023</small>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card-body">
                                <div class="card-title">
                                    <h5>Jumlah SKS yang Diambil</h5>
                                </div>
                                <input type="text" name="input2" id="input2" class="form-control" disabled placeholder="<?php echo $row->Jumlah_SKS ?>">
                                <i class="fa fa-circle-info"></i><small> IP Semester Lalu : <?php echo $ip?> - Maksimum SKS <?php echo $sksmax?></small>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card-body">
                                <?php
                                if($row->Status != 'Sudah'){
                                    echo "<a class='btn btn-primary' data-bs-toggle='modal'
                                    data-bs-target='#verifModal' type='button'>Verify</a>";
                                }else{
                                    echo "<a class='btn btn-danger' data-bs-toggle='modal'
                                    data-bs-target='#verifModal' type='button'>Cancel</a>";
                                }
                                ?>
                                
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </main>

    <!-- Modal -->
    <form method="post">
        <div class="modal fade" id="verifModal" tabindex="-1" role="dialog"
            aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Data Verified</h5>
                    </div>
                    <div class="modal-body">
                        Data updated and verified.
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="verif" name="verif" data-dismiss="modal"  onclick="window.location.href='verifirs.php'"> OK</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <div class="modal fade" id="pdfModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Berkas IRS</h5>
                    <button type="button" class="btn-close" aria-label="Close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <embed src="../Files/contoh.pdf" frameborder="0" width="100%" height="500px">
                </div>
            </div>
        </div>
    </div>

    <?php include("../template/footeruniversal.php")?>