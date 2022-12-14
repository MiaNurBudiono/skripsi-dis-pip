<?php 
$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM s_rekom_layak where id_rekom_layak = '$id'");
$data = mysqli_fetch_array($query);

if (isset($_POST['submit'])) {

    foreach($_POST as $key => $val){
        ${$key} = $val;
    } 
  
          $query = mysqli_query($koneksi, "UPDATE s_rekom_layak SET tahun='$tahun',tahap='$tahap',dana='$dana',
                                          vir_akun='$vir_akun',no_rek='$no_rek' WHERE id_rekom_layak = '$id'");
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
				<li class="active">Form Edit Pengajuan Rekomendasi Layak PIP</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Form Edit Pengajuan Rekomendasi Layak PIP</h1>
			</div>
		</div><!--/.row-->

<div class="col-sm-12 col-lg-12 ">
            
    
    <div class="row">
        <div class="col-lg-12"> 
            <div class="panel panel-default">
                <div class="panel-heading">Form Edit Pengajuan Rekomendasi Layak PIP</div>
                <div class="panel-body" style="background: #F0FFFF">
                    <div class="col-md-6">
                        <form role="form" method = "POST" action="" enctype="multipart/form-data">
                             
                            <div class="form-group">
                                <label>Tahun SK Nominasi PIP</label>
                                <input class="form-control" placeholder="tahun" name="tahun" value="<?= $data['tahun'] ?>" required>
                            </div>    
                            <div class="form-group">
                                <label>Tahap</label>
                                <input class="form-control" placeholder="tahap" name="tahap" value="<?= $data['tahap'] ?>" required>
                            </div>
                            
                            <div class="form-group">
                                <label>Dana</label>
                                <input class="form-control" placeholder="dana" name="dana" value="<?= $data['dana'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Virtual Account</label>
                                <input class="form-control" placeholder="vir_akun" name="vir_akun" value="<?= $data['vir_akun'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Nomor Rekening</label>
                                <input class="form-control" placeholder="no_rek" name="no_rek" value="<?= $data['no_rek'] ?>"required>
                            </div>
                            <div class="form-group">
                                <label>Keterangan Siswa</label>
                               <select name="ket" class="form-control">
                                    <option value="aktif">Aktif</option>
                                    <option value="tidak aktif">Tidak Aktif</option>
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