<?php
include("../template/headermahasiswa.php");
$email_univ = $db->query("SELECT email FROM user WHERE username = '$username'")->fetch_object()->email;
$email_pribadi = $db->query("SELECT mahasiswa.email AS email_mahasiswa FROM mahasiswa,user WHERE mahasiswa.username = user.username AND mahasiswa.username = '$username'")->fetch_object()->email_mahasiswa;
$no_hp = $db->query("SELECT mahasiswa.No_Hp AS HP FROM mahasiswa,user WHERE mahasiswa.username = user.username AND mahasiswa.username = '$username'")->fetch_object()->HP;

if (isset($_POST['verif'])) {
    $valid = TRUE;
    $name = test_input($_POST["upnamamhs"]);
    if (empty($name)) {
        $name = $nama_mahasiswa;
    } elseif (!preg_match("/^[a-zA-Z ]*$/", $name)) {
        $error_name = "Nama hanya dapat berupa alphabet dan spasi!";
        $valid = FALSE;
    }

    $email =  test_input($_POST["upemailmhs"]);
    if ($email == "") {
        $email = $email_pribadi;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_email = "Format email salah";
        $valid = FALSE;
    }

    $nohp = test_input($_POST["upnohpmhs"]);
    if (empty($nohp)) {
        $nohp = $no_hp;
    } elseif (!preg_match("/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/", $nohp)) {
        $error_hp = "No Handphone hanya dapat berupa angka!";
        $valid = FALSE;
    }

    if (!$_FILES['image']['error'] > 0) {
        $filename = $_FILES["image"]["name"];
        $tempname = $_FILES["image"]["tmp_name"];
        $final_image = rand(1000, 1000000) . $filename;
        $folder = "../assets/imginput/" . $final_image;
        $allowed = array('jpeg', 'png', 'jpg', 'pjp', 'pjpeg', 'jfif');
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if (!in_array($ext, $allowed)) {
            $error_berkas_khs = 'Extensi Salah';
            $valid = FALSE;
        }
    } else {
        $folder = $foto;
    }

    //Add data into database
    if ($valid) {
        //assign a query
        $query = "UPDATE mahasiswa SET Nama='$name', Email='$email', No_Hp='$nohp', Foto='$folder' WHERE NIM= '$nim' ";
        // Execute the query
        $result = $db->query($query);
        if (!$result) {
            die("Could not the query the database: <br />" . $db->error . '<br>Query:' . $query);
        } else {
            if(isset($tempname)){
                move_uploaded_file($tempname, $folder);
            }
            $stat_db = "Berhasil Di Input";
        }
    } else {
        $stat_db = "Gagal Di Input";
    }
    header("Refresh:0");
}
?>

<div id="layoutSidenav_content">
    <div class="container-fluid px-4" style="width: 40%">
        <h3 class="my-3" style="text-align: center">Update Mahasiswa</h3>
        <main>
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center; width: 100%; padding-left: 32px; padding-right: 32px; padding-top: 16px; padding-bottom: 16px; background: #586af5;">
                        <div style="display: flex; justify-content: flex-start; align-items: center; flex-grow: 0; flex-shrink: 0; position: relative; gap: 8px;">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" style="flex-grow: 0; flex-shrink: 0; width: 24px; height: 24px; position: relative;" preserveAspectRatio="none">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3ZM1 12C1 5.92487 5.92487 1 12 1C18.0751 1 23 5.92487 23 12C23 18.0751 18.0751 23 12 23C5.92487 23 1 18.0751 1 12Z" fill="#DEE1FD"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M12 7C12.5523 7 13 7.44772 13 8V12C13 12.5523 12.5523 13 12 13C11.4477 13 11 12.5523 11 12V8C11 7.44772 11.4477 7 12 7Z" fill="#DEE1FD"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M11 16C11 15.4477 11.4477 15 12 15H12.01C12.5623 15 13.01 15.4477 13.01 16C13.01 16.5523 12.5623 17 12.01 17H12C11.4477 17 11 16.5523 11 16Z" fill="#DEE1FD"></path>
                            </svg>
                            <p style="flex-grow: 0; flex-shrink: 0; text-align: left; color: #fff;">
                                <span style="flex-grow: 0; flex-shrink: 0; font-size: 16px; font-weight: 500; text-align: left; color: #fff;">Data
                                    yang sudah dimasukkan tidak dapat diubah</span><br /><span style="flex-grow: 0; flex-shrink: 0; font-size: 13px; text-align: left; color: #fff;">Jika ingin
                                    ada perubahan data, hubungi operator program studi segera !</span>
                            </p>
                        </div>
                        <div style="display: flex; justify-content: flex-start; align-items: center; flex-grow: 0; flex-shrink: 0; position: relative; gap: 24px;">
                            <p style="flex-grow: 0; flex-shrink: 0; font-size: 18px; font-weight: 600; text-align: left; color: #fff;">
                            </p>
                        </div>
                    </div>
                </div>
                <form method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="upnamamhs">Nama Lengkap:</label>
                            <input type="text" name="upnamamhs" id="upnamamhs" class="form-control" placeholder="<?php echo $nama_mahasiswa ?>">
                        </div><br />
                        <div class="form-group">
                            <label for="upemail">Email Pribadi:</label>
                            <input type="text" name="upemailmhs" id="upemailmhs" class="form-control" placeholder="<?php echo $email_pribadi ?>"></input>
                        </div><br />
                        <div class="form-group">
                            <label for>No Handphone:</label>
                            <input type="text" name="upnohpmhs" id="upnohpmhs" class="form-control" pattern="[0-9]+" placeholder="<?php echo $no_hp ?>">
                        </div><br />
                        <div class="form-group">
                            <label for="">Email Universitas:</label>
                            <input type="text" name="emailuniv" id="emailuniv" class="form-control" disabled placeholder="<?php echo $email_univ ?>"></input>
                        </div><br />
                        <div class="form-group">
                            <label for="upalamatmhs">Prodi:</label>
                            <input type="text" name="informatika" id="if" class="form-control" placeholder="Informatika S1" disabled></input>
                        </div><br />
                        <div class="form-group">
                            <label for="upalamatmhs">Fakultas:</label>
                            <input type="text" name="" id="" class="form-control" placeholder="Sains dan Matematika" disabled></input>
                        </div><br />
                        <div class="form-group">
                            <label for>Upload Foto:</label>
                            <input id="image" name="image" type="file" class="form-control" accept="image/png, image/jpg, image/jpeg" aria-describedby="HelpBlock">
                        </div>
                        <div>
                            <span id="HelpBlock" class="form-text text-muted"><i class="fa fa-info-circle" aria-hidden="true"></i> Allowed Format 'jpeg', 'png', 'jpg', 'pjp', 'pjpeg', 'jfif'</span><br />
                        </div><br />
                        <div class="form-group mb-3">
                            <button type="submit" class='btn btn-primary' type='button' name="verif" id="verif">Update</button>
                            <button name="cancel" type="button" class="btn btn-danger" onclick="window.location.href='dashboardMHS.php'">Cancel</button>
                        </div>
                    </div>
            </div>
            </form>
            <div>
            </div>
        </main>





    </div>

    <?php include("../template/footeruniversal.php") ?>
