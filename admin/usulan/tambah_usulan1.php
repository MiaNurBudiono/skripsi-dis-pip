<?php 

if (isset($_POST['submit'])) {

$target_dir = "../assets/usulan/";
$target_file = $target_dir . basename($_FILES["syarat"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  foreach($_POST as $key => $val){
      ${$key} = $val;
  } 
  $cek_siswa = mysqli_query($koneksi, "SELECT id_siswa FROM usulan WHERE id_siswa = '$id_siswa'");
  $num = mysqli_num_rows($cek_siswa);
  if ($num > 0) {
echo '<script>alert("Usulan Gagal !!! Siswa Sudah Di Usulkan....")
</script>';
  }else {
      # code...


  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
    echo "<script> alert('Sorry, only JPG, JPEG, PNG  files are allowed.'); </script>";
  }else {
    if (move_uploaded_file($_FILES["syarat"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["syarat"]["name"])). " has been uploaded.";
        $query = mysqli_query($koneksi, "INSERT INTO usulan SET id_siswa = '$id_siswa', jalur = '$jalur', upload_syarat = '$target_file', send_date = '$jam'");
       if ($query) {
           echo "<script> alert('Berhasil Menyimpan Data');
           window.location = '?page=usulan';
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
}
?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Form Usul PIP</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Form Usul Penerima PIP</h1>
			</div>
		</div><!--/.row-->

<div class="col-sm-12 col-lg-12 ">
            
    
    <div class="row">
        <div class="col-lg-15"> 
            <div class="panel panel-default">
                <div class="panel-heading">Form Usulan PIP</div>
                <div class="panel-body" style="background: #F0FFFF">
                    <div class="col-md-6">
                        <form role="form" method = "POST" action="" enctype="multipart/form-data">
                        <div class="form-group">
                        <select class="form-control js-example-basic-single" name="id_siswa">
                        <option value="">NISN / Nama</option>
                            <?php
$query = mysqli_query($koneksi, "SELECT * from data_siswa");
while ($data = mysqli_fetch_array($query)) {
    # code...
                            ?>
  <option value="<?= $data['id_siswa'] ?>"><?= $data['nisn'].' / '.$data['nama'] ?></option>
  <?php
}
  ?>
</select>
</div>
                            
                            <div class="form-group">
                                <label>Jalur</label>
                               <select name="jalur" class="form-control">
                               <option value="">Pilih</option>
                                    <option value="sktm">SKTM (Surat Keterangan Tidak Mampu)</option>
                                    <option value="pkh">PKH (Program Keluarga Harapan)</option>
                                    <option value="kks">KKS (Kartu Keluarga Sejahtera)</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Upload Syarat</label>
                                <input type="file" name="syarat">
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
