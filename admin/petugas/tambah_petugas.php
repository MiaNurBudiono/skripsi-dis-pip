<?php 

if (isset($_POST['submit'])) {

  foreach($_POST as $key => $val){
      ${$key} = $val;
  } 

  
        $query = mysqli_query($koneksi, "INSERT INTO petugas SET nama='$nama',nip='$nip',tempat_lahir='$tempat_lahir',
        tgl_lahir='$tgl_lahir',jabatan='$jabatan',no_hp = '$no_hp',email='$email'");
       if ($query) {
           echo "<script> alert('Berhasil Menyimpan Data');
           window.location = '?page=laporan_petugas';
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
				<li class="active">Form Data Petugas</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Form Data Petugas PIP</h1>
			</div>
		</div><!--/.row-->

<div class="col-sm-12 col-lg-12 ">
            
    
    <div class="row">
        <div class="col-lg-15"> 
            <div class="panel panel-default">
                <div class="panel-heading">Form Data Petugas PIP</div>
                <div class="panel-body" style="background: #F0FFFF">
                    <div class="col-md-6">
                        <form role="form" method = "POST" action="" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Nama</label>
                                <input class="form-control" placeholder="nama" name="nama" required>
                            </div>
                            <div class="form-group">
                                <label>NIP</label>
                                <input class="form-control" placeholder="nip" name="nip" required>
                            </div>
                            <div class="form-group">
                                <label>Tempat Lahir</label>
                                <input class="form-control" placeholder="tempat_lahir" name="tempat_lahir" required>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Lahir</label>
                                <input class="form-control" type="date" placeholder="tgl_lahir" name="tgl_lahir" required>
                            </div>
                            <div class="form-group">
                                <label>Jabatan</label>
                               <select name="jabatan" class="form-control">
                               <option value="">Pilih</option>
                                    <option value="Tata Usaha">Tata Usaha</option>
                                    <option value="Operator Dapodik">Operator Dapodik</option>
                                    <option value="Guru Kelas">Guru Kelas</option>
                                    <option value="Guru Bidang">Guru Bidang</option>
                                </select>
                            </div>                            
                            <div class="form-group">
                                <label>Nomor HP</label>
                                <input class="form-control" type="number" placeholder="no_hp" name="no_hp" required>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" placeholder="email" name="email" required>
                            </div>
                           
                        
                                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                <button type="reset" class="btn btn-default">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- /.panel-->
        </div><!-- /.col-->