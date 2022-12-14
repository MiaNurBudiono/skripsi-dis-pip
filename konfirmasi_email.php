<?php  
	//start the session

    
    include 'config/koneksi.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
  
    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';
      //start the session
      date_default_timezone_set('Asia/Jakarta');
      $jam = date('Y-m-d h:i:s');
      $cek_kode = mysqli_query($koneksi, "SELECT email,kode,send_date FROM user WHERE id_user = ".$_SESSION['id']);
      $data_kode = mysqli_fetch_array($cek_kode);
      $email = $data_kode['email'];
     
      $tanggal = $data_kode['send_date'];
      
      $awal  = strtotime($tanggal);
      $akhir =  strtotime("now");
      $diff  = $akhir - $awal;
      
      $jam   = floor($diff / (60 * 60));
      $menit = $diff - ($jam * (60 * 60) );
      $detik = $diff % 60;
      $m = floor($menit / 60);
    if($jam <= 12 && $m >= 5){
        $update_kode = mysqli_query($koneksi, "UPDATE user SET kode = ' ' WHERE id_user =".$_SESSION['id']);
        if ($update_kode) {
            echo '<script> alert("Silakan Kirim Ulang Kode Konfirmasi");
            </script>';
        }
    }
    
      //check if button next is clicked
      if(isset($_POST['submit'])){
          //set all name attr and value to created variable
          
              $kode_verifikasi = $_POST['kode'];
             
  
  if ($kode_verifikasi == $data_kode['kode']){
      $query_berhasil = mysqli_query($koneksi, "UPDATE user SET status = 1 WHERE id_user = ".$_SESSION['id']);
      echo "<script> 
      alert('Berhasil Konfirmasi Email. Silakan Login ...');
      window.location='index.php'; 
      </script>";
      session_destroy();
  }else{
      echo "<script>alert('Gagal Konfirmasi Email'); </script>";
  }
      }
  
      if(isset($_GET['send']) == 1){
          //set all name attr and value to created variable
          $jam = date('Y-m-d h:i:s');
              $kode_verifikasi = rand(0,1000);
              //kirim email
  
              $email_pengirim = "rochmatromadhoni5@gmail.com";
              $isi="KODE VERIFIKASI ANDA :".$kode_verifikasi;
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
              $mail->Password   = "Bonek1927 ";            // password GMail
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
  
              $ganti_kode = mysqli_query($koneksi, "UPDATE user SET kode = '$kode_verifikasi', send_date = '$jam' WHERE id_user = ".$_SESSION['id']);
  
  if ($ganti_kode){
      echo "<script> 
      alert('Berhasil Kirim Ulang Email');
      window.location='konfirmasi_email.php'; 
      </script>";
  }
      }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Verifikasi Email</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
    <script type="text/javascript">
var counter = 10;
function countDown() {
    if(counter>=0) {
        document.getElementById("timer").innerHTML = counter;
    }
    else {
        download();
        return;
    }
    counter -= 1;

    var counter2 = setTimeout("countDown()",1000);
    return;
}
function download() {
    document.getElementById("link").innerHTML = "<a class='btn btn-primary pull-right' href='konfirmasi_email.php?send=1'>Kirim Ulang Kode</a>";
}
</script>
</head>
<body onload="countDown();">
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Verifikasi Email</div>
				<div class="panel-body">
					<form role="form" method="post">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="kode" name="kode" autofocus="">
							</div>
							
							
							<button type="submit" name="submit" class="btn btn-primary pull-right">Lanjut <i class="fa fa-arrow-right"></i></button>
                                <span id="timer"></span>
                                <span id="link"></span>
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
