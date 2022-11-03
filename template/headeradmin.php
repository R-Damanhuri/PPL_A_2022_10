<?php include('../lib/connect.php'); 
session_start();
$username = $_SESSION['username'];
$foto = $db->query("SELECT admin.Foto FROM user,admin WHERE admin.username = user.username AND admin.username = '$username'")->fetch_object()->Foto;
$Nama = $db->query("SELECT admin.Nama FROM user,admin WHERE admin.username = user.username AND admin.username = '$username'")->fetch_object()->Nama;
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>SIAP Admin</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- <link href= "https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" /> -->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/jquery.dataTables.min.css"> 
        <link rel="stylesheet" href="https://cdn.datatables.net/fixedcolumns/3.2.5/css/fixedColumns.dataTables.min.css"> 

        <link rel="shortcut icon" href="https://kulon2.undip.ac.id/pluginfile.php/1/theme_moove/favicon/1660361299/undip.ico" />
        <link href="../css/styles.css" rel="stylesheet" />
        <link href="../css/header.css" rel="stylesheet" />
        <link href="../css/admin.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand ps-3" href="../admin/dashboardAdmin.php">
              <img src="https://kulon2.undip.ac.id/pluginfile.php/1/theme_moove/favicon/1660361299/undip.ico" alt="logo undip" width = 40 height = 40> <b class="">SIAP Undip</b>
            </a>
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0 d-flex align-items-center" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <div class="ms-auto me-0 me-md-3 my-2 my-md-0 d-flex align-items-center">
              <a class="nav-link" id="" href="dashboardAdmin.php" role="button" aria-expanded="false">
                <img style="
                    object-fit: cover;
                    border-radius: 50%;
                    margin: 0 auto;
                    width: 40px;
                    height: 40px;
                    border: 1px solid black;
                    display: inline;
                " src="<?php echo $foto ?>" onerror="this.src='../assets/img/default.png'"></a>
              <div class="flex-grow-1 ms-3 text-light">
                  <?php echo $Nama ?>
              </div>
            </div>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                          <a class="nav-link" href="../admin/dashboardAdmin.php">
                              <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                              Dashboard
                          </a>
                          <a class="nav-link" href="../admin/buatakun.php">
                              <div class="sb-nav-link-icon"><i class="fas fa-solid fa-file"></i></div>
                              Buat Akun Mahasiswa
                          </a>
                          <a class="nav-link" href="../logout.php">
                              <div class="sb-nav-link-icon"><i class="fa fa-sign-out"></i></div>
                              Keluar
                          </a>
                        </div>
                    </div>
                </nav>
            </div>