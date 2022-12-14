<?php 

if (isset($_POST['submit'])) {

  foreach($_POST as $key => $val){
      ${$key} = $val;
  } 

  
        $query = mysqli_query($koneksi, "INSERT INTO data_siswa SET nisn = '$nisn', nis = '$nis', id_sdn='$id_sdn',
        nama = '$nama', jk = '$jk', tempat_lahir = '$tempat_lahir', tanggal_lahir = '$tanggal_lahir', 
        kelas = '$kelas', nama_ayah = '$nama_ayah', nama_ibu = '$nama_ibu', pekerjaan_ayah = '$pekerjaan_ayah',
        pekerjaan_ibu = '$pekerjaan_ibu', penghasilan_ayah = '$penghasilan_ayah', penghasilan_ibu = '$penghasilan_ibu',no_hp = '$no_hp'");
       if ($query) {
           echo "<script> alert('Berhasil Menyimpan Data');
           window.location = '?page=data_siswa';
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
				<li class="active">Form Data Siswa</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Form Data Siswa</h1>
			</div>
		</div><!--/.row-->

<div class="col-sm-12 col-lg-12 ">
            
    
    <div class="row">
        <div class="col-lg-15"> 
            <div class="panel panel-default">
                <div class="panel-heading">Form Data Siswa</div>
                <div class="panel-body" style="background: #F0FFFF">
                    <div class="col-md-6">
                        <form role="form" method = "POST" action="" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>NISN</label>
                                <input class="form-control" type="number" placeholder="nisn" name="nisn" required>
                            </div>
                            <div class="form-group">
                                <label>NIS</label>
                                <input class="form-control" type="number" placeholder="nis" name="nis" required>
                            </div>
                            <div class="form-group">
                                <label>Nama</label>
                                <input class="form-control" placeholder="nama" name="nama" required>
                            </div>
                            <div class="form-group">
                            <label>Nama SDN</label>
                        <select name="id_sdn" class="form-control">
                        <?php
                        //Membuat koneksi ke database akademik
                        include '../../config/koneksi.php';
                            
                        //Perintah sql untuk menampilkan semua data pada tabel jurusan
                            $sql="SELECT * from sdn_bjb";

                            $hasil=mysqli_query($koneksi,$sql);
                            $no=0;
                            while ($dt = mysqli_fetch_array($hasil)) {
                            $no++;
                        ?>
                            <option value="<?php echo $dt['id_sdn'];?>"><?php echo $dt['nama_sdn'];?></option>
                        <?php 
                            }
                        ?>
                        </select>
                        </div>
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                               <select name="jk" class="form-control">
                               <option value="">Pilih</option>
                                    <option value="laki-laki">Laki-laki</option>
                                    <option value="perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tempat Lahir</label>
                                <input class="form-control" placeholder="tempat_lahir" name="tempat_lahir" required>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Lahir</label>
                                <input class="form-control" type="date" placeholder="tanggal_lahir" name="tanggal_lahir" required>
                            </div>
                            <div class="form-group">
                                <label>Kelas</label>
                                <input class="form-control" placeholder="kelas" name="kelas" required>
                            </div>
                            <div class="form-group">
                                <label>Nama Ayah</label>
                                <input class="form-control" placeholder="nama_ayah" name="nama_ayah" required>
                            </div>
                            <div class="form-group">
                                <label>Nama Ibu</label>
                                <input class="form-control" placeholder="nama_ibu" name="nama_ibu" required>
                            </div>
                            <div class="form-group">
                                <label>Pekerjaan Ayah</label>
                                <input class="form-control" placeholder="pekerjaan_ayah" name="pekerjaan_ayah" required>
                            </div>
                            <div class="form-group">
                                <label>Pekerjaan Ibu</label>
                                <input class="form-control" placeholder="pekerjaan_ibu" name="pekerjaan_ibu" required>
                            </div>
                            <div class="form-group">
                                <label>Penghasilan Ayah</label>
                                <input class="form-control" placeholder="penghasilan_ayah" name="penghasilan_ayah" required>
                            </div>
                            <div class="form-group">
                                <label>Penghasilan Ibu</label>
                                <input class="form-control" placeholder="penghasilan_ibu" name="penghasilan_ibu" required>
                            </div>
                            <div class="form-group">
                                <label>Nomor HP</label>
                                <input class="form-control" type="number" placeholder="no_hp" name="no_hp" required>
                            </div>
                           
                        
                                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                <button type="reset" class="btn btn-default">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- /.panel-->
        </div><!-- /.col-->