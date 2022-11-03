<?php
if(isset($_POST['veri'])){
    $db->query("UPDATE irs SET Status = 'Sudah' WHERE NIM = '$nimmhs'");
}
?>