<?php 

if (isset($_POST['submit'])) {

$target_dir = "../assets/layak_pip/";
  foreach($_POST as $key => $val){
      ${$key} = $val;
    }
    $cek_layak = mysqli_query($koneksi, "SELECT id_siswa FROM layak_pip WHERE id_siswa = '$id_siswa'");
    $num_cek = mysqli_num_rows($cek_layak);
    if ($num_cek > 0) {
        # code...
        echo '<script>alert("Usulan Gagal !!! Siswa Sudah Di Layak PIP....")
</script>';
    }else {
        
    
        $query = mysqli_query($koneksi, "INSERT INTO layak_pip SET id_siswa = '$id_siswa', no_kip = '$no_kip'");
       if ($query) {
           echo "<script> alert('Berhasil Menyimpan Data');
           window.location = '?page=layak_pip';
           </script>";
        }else {
            echo "<script>alert('".mysqli_errno($koneksi)."')
            </script>";
        echo "Sorry, there was an error uploading your file.";
      }
    }

}
?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Form Tambah Siswa Layak PIP</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Form Tambah Siswa Layak PIP</h1>
			</div>
		</div><!--/.row-->

<div class="col-sm-12 col-lg-12 ">
            
    
    <div class="row">
        <div class="col-lg-15"> 
            <div class="panel panel-default">
                <div class="panel-heading">Form Tambah Siswa Layak PIP</div>
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
                                <label>Nomor KIP</label>
                                <input class="form-control" placeholder="no kip" name="no_kip" required>
                            </div>
                            
                                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                <button type="reset" class="btn btn-default">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- /.panel-->
        </div><!-- /.col-->