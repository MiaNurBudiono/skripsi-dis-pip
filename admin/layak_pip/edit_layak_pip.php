<?php 
$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM layak_pip INNER JOIN data_siswa 
                                 ON layak_pip.id_siswa = data_siswa.id_siswa 
                                 WHERE layak_pip.id_layak_pip = '$id'");
$data = mysqli_fetch_array($query);

if (isset($_POST['submit'])) {
    $target_dir = "../assets/layak_pip/";
      foreach($_POST as $key => $val){
          ${$key} = $val;
      }
            $query = mysqli_query($koneksi, "UPDATE layak_pip SET no_kip = '$no_kip' WHERE id_layak_pip = '$id'");
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
    
    ?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Form Edit Data Siswa Layak PIP</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Form Edit Data Siswa Layak PIP</h1>
			</div>
		</div><!--/.row-->

<div class="col-sm-12 col-lg-12 ">
            
    
    <div class="row">
        <div class="col-lg-12"> 
            <div class="panel panel-default">
                <div class="panel-heading">Form Edit Data Siswa Layak PIP</div>
                <div class="panel-body" style="background: #F0FFFF">
                    <div class="col-md-6">
                        <form role="form" method = "POST" action="" enctype="multipart/form-data">
                            
                            <div class="form-group">
                                <label>Nomor KIP</label>
                                <input class="form-control" placeholder="no_kip" name="no_kip" value="<?= $data['no_kip'] ?>" required>
                            </div>
                           
                            
                                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                <button type="reset" class="btn btn-default">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- /.panel-->
        </div><!-- /.col-->