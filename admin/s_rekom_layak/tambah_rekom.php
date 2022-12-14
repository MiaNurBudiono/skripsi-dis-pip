<?php 

if (isset($_POST['submit'])) {

  foreach($_POST as $key => $val){
      ${$key} = $val;
    } 

        $query = mysqli_query($koneksi, "INSERT INTO s_rekom_layak
                                         SET id_layak_pip = '$id_layak_pip',tahun = '$tahun',tahap='$tahap',
                                         dana='$dana',vir_akun='$vir_akun',no_rek='$no_rek',ket='$ket'");
       if ($query) {
           echo "<script> alert('Berhasil Menyimpan Data');
           window.location = '?page=s_rekom_layak';
           </script>";
        }else {
            echo "<script>alert('".mysqli_errno($koneksi)."')
            </script>";
        echo "Sorry, there was an error uploading your file.";
      }
  }

?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Form Pengajuan Rekomendasi PIP</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Form Pengajuan Rekomendasi PIP</h1>
			</div>
		</div><!--/.row-->

<div class="col-sm-12 col-lg-12 ">
            
    
    <div class="row">
        <div class="col-lg-15"> 
            <div class="panel panel-default">
                <div class="panel-heading">Form Pengajuan Rekomendasi PIP</div>
                <div class="panel-body" style="background: #F0FFFF">
                    <div class="col-md-6">
                        <form role="form" method = "POST" action="" enctype="multipart/form-data">
                        <div class="form-group">
                        <select class="form-control js-example-basic-single" name="id_layak_pip">
                        <option value="">NISN / Nama</option>
                            <?php
$query = mysqli_query($koneksi, "SELECT layak_pip.* , data_siswa.* from layak_pip 
INNER JOIN data_siswa ON layak_pip.id_siswa = data_siswa.id_siswa");
while ($data = mysqli_fetch_array($query)) {
    # code...
                            ?>
  <option value="<?= $data['id_layak_pip'] ?>"><?= $data['nisn'].' / '.$data['nama'] ?></option>
  <?php
}
  ?>
</select>
</div>
                        <div class="form-group">
                                <label>Tahun SK Nominasi PIP</label>
                                <input class="form-control" placeholder="tahun" name="tahun" required>
                            </div>    
                            <div class="form-group">
                                <label>Tahap</label>
                                <input class="form-control" placeholder="tahap" name="tahap" required>
                            </div>
                          
                            <div class="form-group">
                                <label>Dana</label>
                                <input class="form-control" placeholder="dana" name="dana" required>
                            </div>
                            <div class="form-group">
                                <label>Virtual Account</label>
                                <input class="form-control" placeholder="vir_akun" name="vir_akun" required>
                            </div>
                            <div class="form-group">
                                <label>Nomor Rekening</label>
                                <input class="form-control" placeholder="no_rek" name="no_rek" required>
                            </div>
                            <div class="form-group">
                                <label>Keterangan Siswa</label>
                               <select name="ket" class="form-control">
                               <option value="">Pilih</option>
                                    <option value="aktif">Aktif</option>
                                    <option value="perempuan">Tidak Aktif</option>
                                </select>
                            </div>
                                                   
                                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                <button type="reset" class="btn btn-default">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- /.panel-->
        </div><!-- /.col-->