<?php 
error_reporting(0);
include("config/koneksi.php");
if(isset($_POST['submit'])) {
  $_SESSION['submit']='';
}

if(isset($_POST['change']))
{
 $username=$_POST['username'];
 $password=md5($_POST['password']);
 $query=mysqli_query($koneksi,"SELECT * FROM user WHERE nama='$username'");
 $num=mysqli_fetch_array($query);
 if($num>0)
 {
  mysqli_query($koneksi,"update user set password='$password' WHERE nama='$username'");
  $msg="Password Changed Successfully";
}
else
{
    echo '<script>alert("Invalid Username")</script>';
}
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Ganti Password</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Main CSS-->
  <link rel="stylesheet" type="text/css" href="login/css/main.css">
  <!-- Font-icon css-->
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script type="text/javascript">
    function valid()
    {
      if(document.forgot.password.value!= document.forgot.confirmpassword.value)
      {
        alert("Password and Confirm Password Field do not match  !!");
        document.forgot.confirmpassword.focus();
        return false;
      }
      return true;
    }
  </script>
</head>
<body>
<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
			<div style="background: #E6E6FA">
  
        <div class="col-lg-12">
            <h1 class="page-header">Lupa Password</h1>
        </div>
    </div>
  <section class="login-content">
    <div class="login-box">
     <p style="padding-left:20%; color:red;"><?php echo htmlentities($_SESSION['errmsg']); ?><?php echo htmlentities($_SESSION['errmsg']="");?></p>
     
     <p style="padding-left:20%; color:green">
      <?php if($msg){
        echo htmlentities($msg);
      }?></p>
      
      <form class="login-form" name="forgot" method="post">
        <div class="form-group">
            <input class="form-control" type="text" name="username" placeholder="username">
          </div>
          <div class="form-group">
            <input class="form-control" type="password" placeholder="New Password" id="password" name="password">
          </div>
          <div class="form-group">
            <input class="form-control" type="password" placeholder="Confirm Password" id="confirmpassword" name="confirmpassword">
          </div>
          <div class="form-group btn-container">
            <button type="submit" name="change" onclick="return valid();" class="btn btn-primary btn-block"><i class="fa fa-unlock fa-lg fa-fw"></i>RESET PASSWORD</button>
          </div>
        </form>
      </div>
    </section>
    

    <!-- Essential javascripts for application to work-->
    <script src="login/js/jquery-3.2.1.min.js"></script>
    <script src="login/js/popper.min.js"></script>
    <script src="login/js/bootstrap.min.js"></script>
    <script src="login/js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="login/js/plugins/pace.min.js"></script>
    
  </body>
  </html>