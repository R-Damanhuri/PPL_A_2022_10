<?php include("../template/headerdosen.php");
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4" style="width: 80%;">
            <h3 class="mt-4 mb-4">Progres Studi -> Individu</h3>
            <div class="card mb-4">
                <div class="card-header">
                    <b>Pencarian Progres Studi Individu</b>
                </div>
                <div class="card-body">
                    <input type="text" name="mhs" id="mhs" class="form-control" oninput="showMahasiswa(this.value)"
                        placeholder=" Masukkan nama mahasiswa ...">
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    <b>Hasil Pencarian</b>
                </div>
                <div class="card-body">
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
                        <tbody id="detailMHS">
                        </tbody>
                    </table>
                </div>
            </div>
    </main>

    <?php include("../template/footeruniversal.php")?>
