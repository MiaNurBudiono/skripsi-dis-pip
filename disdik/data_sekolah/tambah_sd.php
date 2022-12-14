<?php 

if (isset($_POST['submit'])) {

  foreach($_POST as $key => $val){
      ${$key} = $val;
  }   
        $query = mysqli_query($koneksi, "INSERT INTO sdn_bjb SET npsn = '$npsn',nama_sdn='$nama_sdn',alamat='$alamat',
        kelurahan='$kelurahan',kecamatan='$kecamatan',nama_kepsek='$nama_kepsek',no_hp='$no_hp' ");
       if ($query) {
           echo "<script> alert('Berhasil Menyimpan Data');
           window.location = '?page=data_sd';
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
				<li class="active">Form Data Sekolah</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Form Tambah Data Sekolah</h1>
			</div>
		</div><!--/.row-->

<div class="col-sm-12 col-lg-12 ">
            
    
    <div class="row">
        <div class="col-lg-15"> 
            <div class="panel panel-default">
                <div class="panel-heading">Form Tambah Data Sekolah Dasar Negeri</div>
                <div class="panel-body" style="background: #F0FFFF">
                    <div class="col-md-6">
                        <form role="form" method = "POST" action="" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>NPSN</label>
                                <input class="form-control" placeholder="npsn" name="npsn" required>
                            </div>
                            <div class="form-group">
                                <label>Nama Sekolah</label>
                                <input class="form-control" placeholder="nama_sdn" name="nama_sdn" required>
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <input class="form-control" placeholder="alamat" name="alamat" required>
                            </div>
                            <div class="form-group">
                                <label>Kelurahan</label>
                                <input class="form-control" placeholder="kelurahan" name="kelurahan" required>
                            </div>
                            <div class="form-group">
                                <label>Kecamatan</label>
                                <input class="form-control" placeholder="kecamatan" name="kecamatan" required>
                            </div>
                           <div class="form-group">
                                <label>Nama Kepala Sekolah</label>
                                <input class="form-control" placeholder="nama_kepsek" name="nama_kepsek" required>
                            </div>
                            <div class="form-group">
                                <label>Nomor HP</label>
                                <input class="form-control" placeholder="no_hp" name="no_hp" required>
                            </div>
                           
                        
                                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                <button type="reset" class="btn btn-default">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- /.panel-->
        </div><!-- /.col-->