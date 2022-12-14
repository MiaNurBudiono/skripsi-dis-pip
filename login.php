<?php
include 'config/koneksi.php';
if (isset($_POST["submit"])) {
	$username = mysqli_real_escape_string($koneksi, $_POST['username']);
	$pass = mysqli_real_escape_string($koneksi, md5($_POST['password']));
    
$query = mysqli_query($koneksi,"SELECT * FROM user WHERE nama = '$username' AND password = '$pass'");
$rows = mysqli_num_rows($query);
$data = mysqli_fetch_array($query);

if($rows >0){ 
	if($data['level'] == 0 ){
		$_SESSION['id'] = $data['id_user'];
	 	echo "<script> 
	 	alert('Berhasil Login');
	 	window.location='admin/index.php?page=home'; 
	 	</script>";
	 }elseif($data['level'] == 1 ){
		$_SESSION['id'] = $data['id_user'];
	 	echo "<script> 
	 	alert('Berhasil Login');
	 	window.location='disdik/index.php?page=home'; 
	 	</script>";
	 }elseif($data['level'] == 2 ){
		$_SESSION['id'] = $data['id_user'];
	 	echo "<script> 
	 	alert('Berhasil Login');
	 	window.location='ortu/index.php?page=home'; 
	 	</script>";
	 }else {
	 	echo "<script> 
	 	alert('gagal Login');
	 	window.location='../index.php?page=home'; 
	 	</script>";
	 } 
	
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
	
</head>
<body>
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
			<div style="background: #E6E6FA">
				<div class="panel-heading">Log in</div>
				<div class="panel-body">
				<center>
					<b><p><img src="assets/logo_pip.jpg" width="100" /><br/>APLIKASI PENDISTRIBUSIAN PIP KOTA BANJARBARU</p></b>
	</center>
					<form role="form" method="post">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="username" name="username" type="text" autofocus="">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" type="password" value="">
							</div>

						
                            
							<button type="submit" name="submit" class="btn btn-primary pull-right">Login<i class="fa fa-arrow-right"></i></button>
							<li><a href="lupa_pass.php">Lupa Password ?</a></li>
							</fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
	

<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
