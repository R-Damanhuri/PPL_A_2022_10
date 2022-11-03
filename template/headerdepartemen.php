<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>SIAP Departemen</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link rel="shortcut icon" href="https://kulon2.undip.ac.id/pluginfile.php/1/theme_moove/favicon/1660361299/undip.ico" />
        <link href="../css/styles.css" rel="stylesheet" />
        <link href="../css/departemen.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="dashboardDepartemen.php">
              <img src="https://kulon2.undip.ac.id/pluginfile.php/1/theme_moove/favicon/1660361299/undip.ico" alt="logo undip" width = 40 height = 40> <b class="">SIAP Undip</b>
            </a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0 d-flex align-items-center" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <div class="ms-auto me-0 me-md-3 my-2 my-md-0 d-flex align-items-center navprofile">
              <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img style="
                    object-fit: cover;
                    border-radius: 50%;
                    margin: 0 auto;
                    width: 40px;
                    height: 40px;
                    border: 1px solid black;
                    display: inline;
                " src="../assets/img/logo-undip.png" onerror="this.src='../assets/img/default.png'">
              </a>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Logout</a></li>
                    </ul>
              <div class="flex-grow-1 text-light">
                  Informatika
              </div>
            </div>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                          <a class="nav-link" href="dashboardDepartemen.php">
                              <div class="sb-nav-link-icon"><i class="	fas fa-home"></i></div>
                              Dashboard
                          </a>
                          <!-- <a class="nav-link" href="dashboardDepartemenRekap.php">
                              <div class="sb-nav-link-icon"><i class="	fas fa-columns"></i></div>
                              Rekap Status Dosen
                          </a> -->
                          <a class="nav-link" href="../logout.php">
                              <div class="sb-nav-link-icon"><i class="fa fa-sign-out"></i></div>
                              Keluar
                          </a>
                        </div>
                    </div>
                </nav>
            </div>