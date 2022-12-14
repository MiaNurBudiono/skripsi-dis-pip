<?php 
$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM guna_dana where id_guna_dana = '$id'");
$data = mysqli_fetch_array($query);
$cheked=explode(",",$data['daftar_guna']);




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
            $daftar_guna=implode(",", $_POST['daftar_guna']);
            
            $query = mysqli_query($koneksi, "UPDATE guna_dana SET daftar_guna='$daftar_guna', nominal='$nominal',upload_nota = '$target_file' WHERE id_guna_dana = '$id'");
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
				<li class="active">Form Edit Penggunaan Dana PIP</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Form Edit Penggunaan Dana PIP</h1>
			</div>
		</div><!--/.row-->

<div class="col-sm-12 col-lg-12 ">
            
    
    <div class="row">
        <div class="col-lg-12"> 
            <div class="panel panel-default">
                <div class="panel-heading">Form Edit Penggunaan Dana PIP</div>
                <div class="panel-body" style="background: #F0FFFF">
                    <div class="col-md-10">
                        <form role="form" method = "POST" action="" enctype="multipart/form-data">
                       
                        <div class="form-group">
                        <label>Pilih Jenis Penggunaan Dana</label><br/>
                        <input type="checkbox" name="daftar_guna[]" value="Membeli Perlengkapan Sekolah"<?php in_array ('Membeli Perlengkapan Sekolah',$cheked)?print "cheked":"";?>>Membeli Perlengkapan Sekolah (Pembelian Buku, Alat Tulis, Seragam, Tas, Sepatu)<br/>
                        <input type="checkbox" name="daftar_guna[]" value="Sebagai Dana Transportasi dan Uang Saku"<?php in_array ('Sebagai Dana Transportasi dan Uang Saku',$cheked)?print "cheked":"";?>>Sebagai Dana Transportasi dan Uang Saku<br/>
                        <input type="checkbox" name="daftar_guna[]" value="Biaya Les/Praktik"<?php in_array ('Biaya Les/Praktik',$cheked)?print "cheked":"";?>>Biaya Les/Praktik<br/>
                        </div>   
                        
                             <div class="form-group">
                                <label>Nominal Penggunaan Dana</label>
                                <input class="form-control" placeholder="Rp. ..." name="nominal" value="<?= $data['nominal'] ?>"required>
                            </div>
                            <div class="form-group">
                                <label>Upload Bukti Penggunaan Dana</label>
                                <input type="file" name="bukti" value="<?= $data['upload_nota'] ?>">
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