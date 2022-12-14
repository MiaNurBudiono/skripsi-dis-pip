<?php 

if (isset($_POST['submit'])) {

    
    $target_dir = "../assets/bukti_guna_dana/";
    $target_file = $target_dir . basename($_FILES["bukti"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
      foreach($_POST as $key => $val){
          ${$key} = $val;
      } 
    
      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
        echo "<script> alert('Sorry, only JPG, JPEG, PNG  files are allowed.'); </script>";
      }else {
        if (move_uploaded_file($_FILES["bukti"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["bukti"]["name"])). " has been uploaded.";
            $ids = $_SESSION['id'];
            $daftar_guna=implode(",", $_POST['daftar_guna']);
            $query = mysqli_query($koneksi, "INSERT INTO guna_dana SET id_siswa = '$id_siswa', daftar_guna='$daftar_guna', nominal='$nominal',upload_nota = '$target_file', id_user='$ids'");
           if ($query) {
               echo "<script> alert('Berhasil Menyimpan Data');
               window.location = '?page=guna_dana_data';
               </script>";
            }else {
                echo "<script>alert('".mysqli_errno($koneksi)."')
                </script>";
            }
    
          } else {
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
				<li class="active">Form Laporan Penggunaan Dana PIP</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Form Laporan Penggunaan Dana PIP</h1>
			</div>
		</div><!--/.row-->

<div class="col-sm-12 col-lg-12 ">
            
    
    <div class="row">
        <div class="col-lg-15"> 
            <div class="panel panel-default">
                <div class="panel-heading">Form Laporan Peggunaan Dana PIP</div>
                <div class="panel-body" style="background: #F0FFFF">
                    <div class="col-md-7">
                        <form role="form" method = "POST" action="" enctype="multipart/form-data">
                      
                       
                        <div class="form-group">
                        <label>Nama Siswa</label>
                        <select name="id_siswa" class="form-control" >
                        <?php
                        //Membuat koneksi ke database akademik
                        include '../../config/koneksi.php';
                            
                        //Perintah sql untuk menampilkan semua data pada tabel jurusan
                            $ids = $_SESSION['id'];
                            $sql="SELECT user.id_siswa, data_siswa.nama FROM user 
                            inner join data_siswa on user.id_siswa = data_siswa.id_siswa
                            where user.id_user=$ids";

                            $hasil=mysqli_query($koneksi,$sql);
                            $no=0;
                            while ($data = mysqli_fetch_array($hasil)) {
                            $no++;
                        ?>
                            <option value="<?php echo $data['id_siswa'];?>"><?php echo $data['nama'];?></option>
                        <?php 
                            }
                        ?>
                        </select>
                        </div>
                        <div class="form-group">
                        <label>Pilih Jenis Penggunaan Dana</label><br/>
                        <input type="checkbox" name="daftar_guna[]" value="Membeli Perlengkapan Sekolah">Membeli Perlengkapan Sekolah (Pembelian Buku, Alat Tulis, Seragam, Tas, Sepatu)<br/>
                        <input type="checkbox" name="daftar_guna[]" value="Sebagai Dana Transportasi dan Uang Saku">Sebagai Dana Transportasi dan Uang Saku<br/>
                        <input type="checkbox" name="daftar_guna[]" value="Biaya Les/Praktik">Biaya Les/Praktik<br/>
                        </div>
                    
                    
                        <div class="form-group">
                                <label>Nominal Penggunaan Dana</label>
                                <input class="form-control" placeholder="Rp. ..." name="nominal" required>
                            </div>   
                        <div class="form-group">
                                <label>Upload Bukti Pembelian</label>
                                <input type="file" name="bukti">
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
   
