<?php 

if (isset($_POST['submit'])) {

  foreach($_POST as $key => $val){
      ${$key} = $val;
  } 

  
        $query = mysqli_query($koneksi, "INSERT INTO user SET nama = '$nama', tempat_lahir = '$tempat_lahir', tgl_lahir = '$tgl_lahir', 
        jabatan='$jabatan',no_hp = '$no_hp',email='$email',password = '$password'");
       if ($query) {
           echo "<script> alert('Berhasil Menyimpan Data');
           window.location = '?page=akun';
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
                <div class="panel-heading">Form Tambah Akun</div>
                <div class="panel-body" style="background: #F0FFFF">
                    <div class="col-md-6">
                        <form role="form" method = "POST" action="" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Nama</label>
                                <input class="form-control" placeholder="nama" name="nama" required>
                            </div>
                            <div class="form-group">
                                <label>Tempat Lahir</label>
                                <input class="form-control" placeholder="tempat_lahir" name="tempat_lahir" required>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Lahir</label>
                                <input class="form-control" placeholder="tgl_lahir" name="tgl_lahir" required>
                            </div>
                            <div class="form-group">
                                <label>Jabatan</label>
                               <select name="jk" class="form-control">
                               <option value="">Pilih</option>
                                <option value="pengawas">Pengawas Disdik Kota</option>
                                <option value="kepsek">Kepala Sekolah</option>
                                <option value="operator">Operator Dapodik</option>
                                <option value="tata-usaha">Tata Usaha</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nomor Induk Instansi</label>
                                <input class="form-control" placeholder="nomor_induk_instansi" name="" required>
                            </div>
                            <div class="form-group">
                                <label>Nomor HP</label>
                                <input class="form-control" type="number" placeholder="nomor_hp" name="no_hp" required>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" placeholder="email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input class="form-control" placeholder="password" name="password" required>
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