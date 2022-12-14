<?php 
$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM lap_cair where id_lap_cair = '$id'");
$data = mysqli_fetch_array($query);

if (isset($_POST['submit'])) {

    $target_dir = "../assets/bukti_cair/";
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
            $query = mysqli_query($koneksi, "UPDATE lap_cair SET tanggal_cair = '$tanggal_cair', upload_bukti = '$target_file' WHERE id_lap_cair = '$id'");
           if ($query) {
               echo "<script> alert('Berhasil Menyimpan Data');
               window.location = '?page=lap_cair_data';
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
				<li class="active">Form Edit Data Pencairan Dana PIP</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Form Edit Data Pencairan Dana PIP</h1>
			</div>
		</div><!--/.row-->

<div class="col-sm-12 col-lg-12 ">
            
    
    <div class="row">
        <div class="col-lg-12"> 
            <div class="panel panel-default">
                <div class="panel-heading">Form Edit Data Pencairan Dana PIP</div>
                <div class="panel-body" style="background: #F0FFFF">
                    <div class="col-md-6">
                        <form role="form" method = "POST" action="" enctype="multipart/form-data">
                       
                            <div class="form-group">
                                <label>Tanggal Pencairan</label>
                                <input class="form-control" type="date" placeholder="tanggal_cair" name="tanggal_cair" value="<?= tgl_indo($data['tanggal_cair'])?>"required>
                            </div>
                            <div class="form-group">
                                <label>Upload Bukti</label>
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