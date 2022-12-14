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
        $query = mysqli_query($koneksi, "INSERT INTO usulan SET id_siswa = '$id_siswa', gaji_ortu='$gaji_ortu',jml_keluarga='$jml_keluarga',
        jrk_rmh='$jrk_rmh',trans='$trans',jalur = '$jalur', upload_syarat = '$target_file', send_date = '$jam'");
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

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tambah Usulan</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">

	
		
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
                <div class="panel-body" style="background:  #E6E6FA">
                    <div class="col-md-5">
                        <form role="form" method = "POST" action="" enctype="multipart/form-data">

                            <div class="form-group">
                            <label>Nama Siswa</label>
                            <select class="form-control js-example-basic-single" name="id_siswa">
                            <option value="">Tambahkan Nama</option>
                            <?php
                            
                            $query = mysqli_query($koneksi, "SELECT * from data_siswa");
                            while ($data = mysqli_fetch_array($query)) {
                            ?>
                            <option value="<?= $data['id_siswa'] ?>"><?= $data['nisn'].' / '.$data['nama'] ?></option> 
                           <?php
                           }
                            ?>
                            </select>  
                        </div>

                            <div class="form-group">
                                <label>Gaji Kedua Orang Tua</label>
                               <select name="gaji_ortu" class="form-control">
                               <option value="">Pilih</option>
                                    <option value="9">Kurang dari Rp.1.000.000,-</option>
                                    <option value="8">Rp.1.000.000,- s/d Rp.2.000.000,-</option>
                                    <option value="7">Rp.3.000.000,- s/d Rp.5.000.000,-</option>
                                    <option value="6">Lebih dari Rp.5.000.000,-</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Jumlah Keluarga</label>
                               <select name="jml_keluarga" class="form-control">
                               <option value="">Pilih</option>
                                    <option value="9">Lebih dari 4 Orang</option>
                                    <option value="8">4 Orang</option>
                                    <option value="7">3 Orang</option>
                                    <option value="6">Kurang dari 3 Orang</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Jarak dari Rumah ke Sekolah</label>
                               <select name="jrk_rmh" class="form-control">
                               <option value="">Pilih</option>
                                    <option value="9">Lebih dari 400 m</option>
                                    <option value="8">300 - 400 m</option>
                                    <option value="7">100 - 300 m</option>
                                    <option value="6">Kurang dari 100 m</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Transportasi ke Sekolah</label>
                               <select name="trans" class="form-control">
                               <option value="">Pilih</option>
                                    <option value="9">Jalan Kaki</option>
                                    <option value="8">Sepeda</option>
                                    <option value="7">Motor</option>
                                    <option value="6">Angkot</option>
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
                                <button type="reset" class="btn btn-warning">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- /.panel-->
        </div><!-- /.col-->


