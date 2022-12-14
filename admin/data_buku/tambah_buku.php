<?php 

if (isset($_POST['submit'])) {

  foreach($_POST as $key => $val){
      ${$key} = $val;
    }
        $query = mysqli_query($koneksi, "INSERT INTO buku SET judul_buku='$judul_buku', pengarang = '$pengarang', penerbit='$penerbit',tahun_terbit='$tahun_terbit'");
       if ($query) {
           echo "<script> alert('Berhasil Menyimpan Data');
           window.location = '?page=data_buku';
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
				<li class="active">Form Tambah Data Buku</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Form Tambah Data Buku</h1>
			</div>
		</div><!--/.row-->

<div class="col-sm-12 col-lg-12 ">
            
    
    <div class="row">
        <div class="col-lg-15"> 
            <div class="panel panel-default">
                <div class="panel-heading">Form Tambah Data Buku</div>
                <div class="panel-body" style="background: #F0FFFF">
                    <div class="col-md-6">
                        <form role="form" method = "POST" action="" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Judul Buku</label>
                                <input class="form-control" placeholder="judul_buku" name="judul_buku" required>
                            </div>
                            <div class="form-group">
                                <label>Pengarang</label>
                                <input class="form-control" placeholder="pengarang" name="pengarang" required>
                            </div>
                            <div class="form-group">
                                <label>Penerbit</label>
                                <input class="form-control" placeholder="penerbit" name="penerbit" required>
                            </div>
                            <div class="form-group">
                                <label>Tahun Terbit</label>
                                <input class="form-control" placeholder="tahun_terbit" type="number" name="tahun_terbit" required>
                            </div>
                            
                             
                                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                <button type="reset" class="btn btn-default">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- /.panel-->
        </div><!-- /.col-->