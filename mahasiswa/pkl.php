<?php include("../template/headermahasiswa.php"); 


if (isset($_POST["submit"])){
    $valid = TRUE; 
    $nilai = test_input($_POST["nilai"]);
    if (empty($nilai)){
        $error_nilai = "Score is required";
        $valid = FALSE;
    }
    else if(!filter_var($nilai, FILTER_VALIDATE_FLOAT)){
        $error_nilai = "Format nilai salah, gunakan format decimal 4.00";
        $valid = FALSE;
    }

    $status = $_POST["status"];
    if(!isset($_POST["status"])){
        $error_status = "Status is required";
        $valid = FALSE;
    }

    if (!$_FILES['berkas_pkl']['error']>0){
        $filename = $_FILES["berkas_pkl"]["name"];
        $tempname = $_FILES["berkas_pkl"]["tmp_name"];
        $final_pdf = rand(1000,1000000).$filename;
        $folder = "../assets/pkl/" . $final_pdf;
        $allowed = array('pdf');
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if (!in_array($ext, $allowed)) {
            $error_berkas_pkl = 'Extensi Salah';
            $valid = FALSE;
        }
    }else{
        $error_berkas_pkl = "PKL file is required";
        $valid = FALSE;
    }

    //Add data into database
    if ($valid){
        //assign a query
        $query = "UPDATE `pkl` SET `Nilai`=$nilai,`Berkas_PKL`='$folder', `Status`='$status' WHERE `NIM`='$nim' "; 
        // Execute the query
        $result = $db->query($query);
        if (!$result){
            die ("Could not the query the database: <br />" . $db->error . '<br>Query:' .$query);
        }else{
            move_uploaded_file($tempname, $folder);
            $stat_db = "Berhasil Di Input";
        }
    }else{
        $stat_db = "Gagal Di Input";
    }
}
?>
<div id="layoutSidenav_content">
    <div class="container-fluid px-4" style="width: 40%">
        <h3 class="my-3" style="text-align: center">PKL Mahasiswa</h3>
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
                <div class="card-body">
                    <form class="form-irs" method="post" enctype="multipart/form-data">
                        <div class="form-group mb-3">
                            <label for="">Status</label>
                            <div class="input-group">
                                <select id="status" name="status" type="text" aria-describedby="HelpBlock" class="form-select" required="required" >
                                    <option value="">--Pilih Status--</option>
                                    <option value="Lulus">Lulus</option>
                                    <option value="Sedang Menempuh">Sedang Menempuh</option>
                                    <option value="Belum Aktif">Belum Aktif</option>
                                    <option value="Belum Lulus">Belum Aktif</option>
                                </select>
                            </div>
                            <span id="HelpBlock" class="form-text text-muted"><i class="fa fa-info-circle" aria-hidden="true"></i> Lulus, Sedang Menempuh, Belum Aktif</span>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Nilai</label>
                            <div class="input-group"> 
                                <input id="nilai" name="nilai" type="number" step="0.01" aria-describedby="HelpBlock" required="required" class="form-control">
                            </div>
                            <span id="HelpBlock" class="form-text text-muted"><i class="fa fa-info-circle" aria-hidden="true"></i> Nilai PKL</span>
                            <div class="error"><?php if (isset($error_nilai)) echo $error_nilai ?></div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Berkas Seminar PKL</label>
                            <div class="input-group">
                                <input id="berkas_pkl" name="berkas_pkl" type="file" aria-describedby="HelpBlock" required="required" class="form-control" accept = "application/pdf">
                            </div>
                            <div class="error"><?php if (isset($error_berkas_pkl)) echo $error_berkas_pkl ?></div>
                        </div>
                        <div class="form-group mb-3">
                            <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                            <button name="cancel" type="cancel" class="btn btn-danger">Cancel</button>
                        </div>
                    </form>
                </div>
                <div><h5><?php echo $stat_db ?><h5></div>
            </div>

        </main>
    </div>

    <?php include("../template/footeruniversal.php") ?>
    
    