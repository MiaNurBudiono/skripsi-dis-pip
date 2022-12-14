<?php 

if (isset($_POST['submit'])) {

$target_dir = "../assets/ken_sol/";
  foreach($_POST as $key => $val){
      ${$key} = $val;
    }
        $query = mysqli_query($koneksi, "INSERT INTO kendala_solusi SET tgl_kendala = '$tgl_kendala', kendala = '$kendala', pihak = '$pihak',
        tgl_solusi = '$tgl_solusi', solusi = '$solusi'");
       if ($query) {
           echo "<script> alert('Berhasil Menyimpan Data');
           window.location = '?page=ken_sol';
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
				<li class="active">Form Tambah Kendala dan Solusi</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Form Tambah Kendala dan Solusi</h1>
			</div>
		</div><!--/.row-->

<div class="col-sm-12 col-lg-12 ">
            
    
    <div class="row">
        <div class="col-lg-15"> 
            <div class="panel panel-default">
                <div class="panel-heading">Form Tambah Kendala dan Solusi</div>
                <div class="panel-body" style="background: #F0FFFF">
                    <div class="col-md-6">
                        <form role="form" method = "POST" action="" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Tanggal Kendala</label>
                                <input class="form-control" type="date" placeholder="tgl_kendala" name="tgl_kendala" required>
                            </div>
                            <div class="form-group">
                                <label>Kendala/Masalah</label>
                                <input class="form-control" placeholder="kendala" name="kendala" required>
                            </div>
                            <div class="form-group">
                                <label>Pihak yang Diharapkan dapat Membantu Menyelesaikan</label>
                                <input class="form-control" placeholder="pihak yang membantu" name="pihak" required>
                            </div>
                             
                                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                <button type="reset" class="btn btn-default">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- /.panel-->
        </div><!-- /.col-->