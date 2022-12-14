<?php 

if (isset($_POST['submit'])) {

$id_siswa = $_POST['id_user'];
$nama = $_POST['nama'];
$target_dir = "../assets/akun/";
$target_file = $target_dir . basename($_FILES["foto"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  foreach($_POST as $key => $val){
      ${$key} = $val;
  }
  $password = md5($_POST['password']); 


  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
    echo "<script> alert('Sorry, only JPG, JPEG, PNG  files are allowed.'); </script>";
  }else {
    if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["foto"]["name"])). " has been uploaded.";
        $query = mysqli_query($koneksi, "INSERT INTO user SET id_siswa = '$id_siswa', nama = '$nama', password = '$password', foto = '$target_file', level = '2'");
       if ($query) {
           echo "<script> alert('Berhasil Menyimpan Data');
           window.location = '?page=akun_siswa';
           </script>";
        }else {
            echo "<script>alert('".mysqli_errno($koneksi)."')
            </script>";
        }

      } else {
        echo "Sorry, there was an error uploading your file.";
      }

  }

}//end cek
?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Form Akun</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Form Tambah Akun</h1>
			</div>
		</div><!--/.row-->

<div class="col-sm-12 col-lg-12 ">
            
    
    <div class="row">
        <div class="col-lg-15"> 
            <div class="panel panel-default">
                <div class="panel-heading">Form Tambah Akun Siswa</div>
                <div class="panel-body" style="background: #F0FFFF">
                    <div class="col-md-6">
                        <form role="form" method = "POST" action="" enctype="multipart/form-data">
                        
                            <div class="form-group">
                            <select class="form-control js-example-basic-single" name="id_user">
                            <option value="">Tambahkan Nama</option>
                            <?php
                            $query = mysqli_query($koneksi, "SELECT * from data_siswa");
                            while ($data = mysqli_fetch_array($query)) {
                            ?>
                            <option value="<?= $data['id_siswa'] ?>"><?= $data['nisn'].' / '.$data['nama'] ?></option> -->
                            <?php
                           }
                            ?>
                            </select>
                        </div>
                        

                            <div class="form-group">
                                <label>Username</label>
                                <input class="form-control" type="text" placeholder="nama" name="nama" required>
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <input class="form-control" type="password" placeholder="password" name="password" required>
                            </div>


                            <div class="form-group">
                                <label>Foto</label>
                                <input type="file" name="foto">
                                <p class="help-block"></p>
                            </div>
                        
                                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                <button type="reset" class="btn btn-default">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- /.panel-->
        </div><!-- /.col-->