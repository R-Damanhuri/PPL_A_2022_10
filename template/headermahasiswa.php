<?php include('../lib/connect.php'); 
ob_start();
error_reporting(0);
session_start();
if (!isset($_SESSION['username'])) {
    header('../login.php');
    exit;
}

function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$username = $_SESSION['username'];
$nim = $db->query("SELECT user.nim FROM user WHERE username = '$username'")->fetch_object()->nim;
$foto = $db->query("SELECT mahasiswa.Foto FROM user,mahasiswa WHERE mahasiswa.username = user.username AND mahasiswa.username = '$username'")->fetch_object()->Foto;
$nama_mahasiswa = $db->query("SELECT mahasiswa.nama AS nama_mahasiswa FROM mahasiswa,user WHERE mahasiswa.username = user.username AND mahasiswa.username = '$username'")->fetch_object()->nama_mahasiswa;
$ipquery = "SELECT IP_Semester FROM khs,mahasiswa WHERE mahasiswa.username = '$username' AND khs.nim = mahasiswa.nim";

$ip = $db->query($ipquery)->fetch_object()->IP_Semester;

if($ip >= 3){
    $sksmax = 24;
}else{
    $sksmax = 22;
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>SIAP Mahasiswa</title>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <link rel="shortcut icon" href="https://kulon2.undip.ac.id/pluginfile.php/1/theme_moove/favicon/1660361299/undip.ico" />
        <link href="../css/styles.css" rel="stylesheet" />
        <link href="../css/mahasiswa.css" rel="stylesheet"/>
        <link href="../css/header.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="../mahasiswa/dashboardMHS.php">
              <img src="https://kulon2.undip.ac.id/pluginfile.php/1/theme_moove/favicon/1660361299/undip.ico"  alt="logo undip" width = 40 height = 40> <b class="">SIAP Undip</b>
            </a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0 d-flex align-items-center" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <div class="ms-auto me-0 me-md-3 my-2 my-md-0 d-flex align-items-center">
            <a class="nav-link" id="" href="dashboardMHS.php" role="button" aria-expanded="false">
                <img style="
                    object-fit: cover;
                    border-radius: 50%;
                    margin: 0 auto;
                    width: 40px;
                    height: 40px;
                    border: 1px solid black;
                    display: inline;
                " src="<?php echo $foto ?>" onerror="this.src='../assets/img/default.png'"></a>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Logout</a></li>
                    </ul>
              <div class="flex-grow-1 ms-3 text-light">
              <?php echo $nama_mahasiswa?>
              </div>
            </div>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                          <a class="nav-link" href="../mahasiswa/dashboardMHS.php">
                              <div class="sb-nav-link-icon"><i class="	fas fa-home"></i></div>
                              Dashboard
                          </a>
                          <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                              <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                              Progres Akademik
                              <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                          </a>
                          <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                              <nav class="sb-sidenav-menu-nested nav">
                                  <a class="nav-link" href="irs.php">IRS</a>
                                  <a class="nav-link" href="khs.php">KHS</a>
                                  <a class="nav-link" href="pkl.php">PKL</a>
                                  <a class="nav-link" href="skripsi.php">Skripsi</a>
                              </nav>
                          </div>
                          <a class="nav-link" href="../logout.php">
                              <div class="sb-nav-link-icon"><i class="fa fa-sign-out"></i></div>
                              Keluar
                          </a>
                        </div>
                    </div>
                </nav>
            </div>