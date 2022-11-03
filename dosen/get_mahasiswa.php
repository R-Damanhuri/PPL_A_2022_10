<?php
include("../template/headerdosen.php"); 
require_once('../lib/connect.php');

$nama = $db->real_escape_string($_GET['nama']);
$query = " SELECT * FROM `mahasiswa` WHERE Nama LIKE '%$nama%' AND NIP_Doswal = '$nip_dosen'";
$result = $db->query($query);

if (!$result) {
    die("Could not query the database: <br>" . $db->error);
}

$i = 1;
while($row = $result->fetch_object()){
    echo '<tr>';
    echo '<td>'.$i.'</td>';
    echo '<td>'.$row->NIM.'</td>';
    echo '<td>'.$row->Nama.'</td>';
    echo '<td>'.$row->Angkatan.'</td>';
    echo '<td>'.$row->semester.'</td>';
    echo "<td><a class='btn btn-primary' href='lihatMahasiswa.php?id=".$row->NIM."'>Lihat</a></td>";
    $i++;
}
$result-> free();
$db->close();
?>