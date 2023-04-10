<?php include('../lib/connect.php'); 
// error_reporting(0);
ob_start();
session_start();
if(!isset($_SESSION['username'])){
    header('Location: ../index.php');
}
$username = $_SESSION['username'];
$foto = $db->query("SELECT dosen.Foto FROM user,dosen WHERE dosen.username = user.username AND dosen.username = '$username'")->fetch_object()->Foto;
$Nama = $db->query("SELECT dosen.Nama FROM user,dosen WHERE dosen.username = user.username AND dosen.username = '$username'")->fetch_object()->Nama;
$nip_dosen = $db->query("SELECT NIP FROM user WHERE Username = '$username'")->fetch_object()->NIP;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>SIAP Dosen</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="shortcut icon"
        href="https://kulon2.undip.ac.id/pluginfile.php/1/theme_moove/favicon/1660361299/undip.ico" />
    <link href="../css/styles.css" rel="stylesheet" />
    <link href="../css/dosen.css" rel="stylesheet" />
    <link href="../css/header.css" rel="stylesheet" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>

</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="dashboardDSN.php">
            <img src="https://kulon2.undip.ac.id/pluginfile.php/1/theme_moove/favicon/1660361299/undip.ico"
                alt="logo undip" width=40 height=40> <b class="">SIAP Undip</b>
        </a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0 d-flex align-items-center" id="sidebarToggle"
            href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <div class="ms-auto me-0 me-md-3 my-2 my-md-0 d-flex align-items-center">
            <a class="nav-link" id="" href="dashboardDSN.php" role="button" aria-expanded="false">
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
                        <a class="nav-link" href="dashboardDSN.php">
                            <div class="sb-nav-link-icon"><i class="	fas fa-home"></i></div>
                            Dashboard
                        </a>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseVerif"
                            aria-expanded="false" aria-controls="collapseVerif">
                            <div class="sb-nav-link-icon"><i class="fas fa-check"></i></div>
                            Verifikasi Berkas
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseVerif" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="verifirs.php">IRS</a>
                                <a class="nav-link" href="verifkhs.php">KHS</a>
                                <a class="nav-link" href="verifpkl.php">PKL</a>
                                <a class="nav-link" href="verifskripsi.php">Skripsi</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapseProgres" aria-expanded="false" aria-controls="collapseProgres">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Progres Studi
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseProgres" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="individu.php">Individu</a>
                                <a class="nav-link" href="rekapStatus.php">Rekap Status</a>
                                <a class="nav-link" href="rekapPKL.php">Rekap PKL</a>
                                <a class="nav-link" href="rekapSkripsi.php">Rekap Skripsi</a>
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
