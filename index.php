<?php

session_start();
require_once('./lib/connect.php');

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_POST['submit'])) {
    $username = test_input($_POST['username']);
    $password = test_input($_POST['password']);

    $query = "SELECT * FROM user WHERE Username='".$username."' AND Password='".md5($password)."' ";
    $result = $db->query($query);
    if(!$result){
        die ("Couldn't query the database: <br/>".$db->error);
    }else{
        if($result->num_rows>0){
            $row = $result->fetch_object();
            $_SESSION['status'] = "login";
            $_SESSION['username'] = $username;
            if($row->Role == "mahasiswa"){
                header('Location:./mahasiswa/dashboardMHS.php');
            } else if($row->Role == "dosen"){
                header('Location:./dosen/dashboardDSN.php');
            } else if($row->Role == "admin"){
                header('Location: ./admin/dashboardAdmin.php');	
            } else{
                header('Location:./departemen/dashboardDepartemen.php');
            }
            exit;
        }
    }
        $db->close();
}
?>

<!doctype html>
<html lang="en">
  <head>
  	<title>SIAP Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="shortcut icon" href="https://kulon2.undip.ac.id/pluginfile.php/1/theme_moove/favicon/1660361299/undip.ico" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="./css/login.css">

	</head>
	<body class="img js-fullheight" style="background-image: url(./assets/img/bg-undip-besar.jpg);">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Universitas Diponegoro</h2>
					<h2 class="img m-0"><img src="./assets/img/logo-undip.png" style="width:fit-content; height:25vh"></h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
		      	<form method="POST" class="signin-form">
		      		<div class="form-group">
		      			<input type="text" class="form-control" placeholder="Username" name="username" id="username" required>
		      		</div>
	            <div class="form-group">
	              <input id="password-field" type="password" class="form-control" placeholder="Password" name="password" id="password" required>
	              <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
	            </div>
	            <div class="form-group">
	            	<button type="submit" name="submit" class="form-control btn btn-primary submit px-3"><span style="color:white;">Sign In</span></button>
	            </div>
	          </form>
		      </div>
				</div>
			</div>
		</div>
	</section>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="./js/login.js"></script>

	</body>
</html>

