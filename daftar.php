<?php
include 'config/koneksi.php';
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
  
    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';
		$redirect = "<script> window.location='konfirmasi_email.php'; </script>";
        date_default_timezone_set('Asia/Jakarta');
       $jam = date('Y-m-d h:i:s');


	//check if button next is clicked
	if(isset($_POST['submit'])){



		//set all name attr and value to created variable
		foreach ($_POST as $key => $val) {
			${$key} = $val;
		}

        $query  =   "SELECT * FROM user WHERE email = '$email'";

        $exac   = mysqli_query($koneksi, $query);
        $email_data = mysqli_fetch_array($exac);

        if ($exac) {
            $email_count = mysqli_num_rows($exac);
            if ($email_count > 0 && $email_data['status'] == 1) {
                echo '<script>alert("Email sudah digunakan, silahkan gunakan Email lain..")</script>';
            }elseif ($email_count > 0 && $email_data['status'] == 0) {
               echo "
               <script>alert('Email sudah Terdaftar, silakan konfirmasi email');
                window.location='konfirmasi_email.php'; </script>";
               $_SESSION['id'] = $email_data['id_user'];
            }
            else{
                $kode = rand(0,1000);
            
                $pass = md5($password);
                 $query = mysqli_query($koneksi ,"INSERT INTO user SET nama= '$nama', email = '$email', PASSWORD= '$pass', level = 1, kode = '$kode', status = 0, send_date = '$jam'");
                //check if session is not empty, then redirect to daftar_data_orangtua.php
                $_SESSION['id'] = $koneksi->insert_id;
                
              $email_pengirim = "rochmatromadhoni5@gmail.com";
              $isi="KODE VERIFIKASI ANDA :".$kode;
              $subjek="Kode Verifikasi Pendaftaran Akun Baru";
              $email_tujuan=$email;
      
              $mail = new PHPMailer(true);
      
              $mail->IsHTML(true);    // set email format to HTML
              $mail->IsSMTP();   // we are going to use SMTP
              $mail->SMTPAuth   = true; // enabled SMTP authentication
              $mail->SMTPSecure = "ssl";  // prefix for secure protocol to connect to the server
              $mail->Host       = "smtp.gmail.com";      // setting GMail as our SMTP server
              $mail->Port       = 465;                   // SMTP port to connect to GMail
              $mail->Username   = $email_pengirim;  // alamat email kamu
              $mail->Password   = "Bonek1927";            // password GMail
              $mail->SetFrom($email_pengirim, 'noreply');  //Siapa yg mengirim email
              $mail->Subject    = $subjek;
              $mail->Body       = $isi;
              $mail->AddAddress($email_tujuan);
      
              if(!$mail->Send()) {
                  echo "Eror: ".$mail->ErrorInfo;
                  exit;
              }else {
                  echo "<div class='alert alert-success'><strong>Berhasil!</strong> Email telah berhasil dikirim.</div>";
              }

                if($query){
                    echo '<script>alert("Akun Berhasil Di Buat ! Silakan Konfirmasi Email Dahulu..")</script>';
                    echo $redirect;
                }else{
                    echo mysqli_errno($koneksi);
                }
              
                   
               
            }
        }else{
            echo mysqli_error($koneksi);
        }   
	   
    }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>REGISTER</title>
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
				<div class="panel-heading">REGISTER</div>
				<div class="panel-body">
					<form role="form" method="post">
						<fieldset>
                        <div class="form-group">
								<input class="form-control" placeholder="Nama" name="nama" type="text" autofocus="">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="E-mail" name="email" type="email" >
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" type="password" value="">
							</div>
							
							<button type="submit" name="submit" class="btn btn-primary pull-right">Daftar <i class="fa fa-arrow-right"></i></button></fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
	

<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
