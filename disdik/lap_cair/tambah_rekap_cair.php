<?php 

if (isset($_POST['submit'])) {

  foreach($_POST as $key => $val){
      ${$key} = $val;
  }   
        $query = mysqli_query($koneksi, "INSERT INTO rekap_cair SET id_sdn='$asal', periode = '$periode', tahun='$tahun'");
       if ($query) {
           echo "<script> alert('Berhasil Menyimpan Data');
           window.location = '?page=rekap_cair';
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
				<li class="active">Form Rekap Pencairan Dana PIP</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Form Tambah Rekap Pencairan Dana PIP</h1>
			</div>
		</div><!--/.row-->

<div class="col-sm-12 col-lg-12 ">
            
    
    <div class="row">
        <div class="col-lg-15"> 
            <div class="panel panel-default">
                <div class="panel-heading">Form Rekap Pencairan Dana PIP </div>
                <div class="panel-body" style="background: #F0FFFF">
                    <div class="col-md-6">
                        <form role="form" method = "POST" action="" enctype="multipart/form-data">
                            <div class="form-group">
                            <label>NPSN/Nama Sekolah</label>
                            <select class="form-control js-example-basic-single" name="asal">
                            <option value="">NPSN / Nama Sekolah</option>
                            <?php
                            $query = mysqli_query($koneksi, "SELECT * from sdn_bjb");
                            while ($data = mysqli_fetch_array($query)) {
                            ?>
                            <option value="<?= $data['id_sdn'] ?>"><?= $data['npsn'].' / '.$data['nama_sdn'] ?></option> -->
                            <?php
                           }
                            ?>
                            </select>
                            </div>    
                            
                            <div class="form-group">
                                <label>Periode</label>
                                <input class="form-control" placeholder="periode" name="periode" required>
                            </div>
                           <div class="form-group">
                                <label>Tahun</label>
                                <input class="form-control" placeholder="tahun" name="tahun" required>
                            </div>
                           
                        
                                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                <button type="reset" class="btn btn-default">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- /.panel-->
        </div><!-- /.col-->