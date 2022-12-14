<?php 
$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM kendala_solusi where id_ken_sol = '$id'");
$data = mysqli_fetch_array($query);

if (isset($_POST['submit'])) {
   
    $target_dir = "../assets/ken_sol/";  
    foreach($_POST as $key => $val){
          ${$key} = $val;
        }
            $query = mysqli_query($koneksi, "UPDATE kendala_solusi SET tgl_kendala = '$tgl_kendala', kendala = '$kendala', pihak = '$pihak',tgl_solusi = '$tgl_solusi', solusi = '$solusi', pihak_solusi = '$pihak_solusi'WHERE id_ken_sol = '$id'");
           if ($query) {
               echo "<script> alert('Berhasil Menyimpan Data');
               window.location = '?page=ken_sol';
               </script>";
            }else {
                echo "<script>alert('".mysqli_errno($koneksi)."')
                </script>";
          }
        }

    ?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Form Edit Kendala dan Solusi</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Form Edit Kendala dan Solusi</h1>
			</div>
		</div><!--/.row-->

<div class="col-sm-12 col-lg-12 ">
            
    
    <div class="row">
        <div class="col-lg-12"> 
            <div class="panel panel-default">
                <div class="panel-heading">Form Edit Kendala dan Solusi</div>
                <div class="panel-body" style="background: #F0FFFF">
                    <div class="col-md-6">
                        <form role="form" method = "POST" action="" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Tanggal Kendala</label>
                                <input class="form-control" type="date"placeholder="tgl_kendala" name="tgl_kendala" value="<?= $data['tgl_kendala'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Kendala</label>
                                <input class="form-control" placeholder="kendala" name="kendala" value="<?= $data['kendala'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Solusi</label>
                                <input class="form-control" type="date"placeholder="tgl_solusi" name="tgl_solusi" value="<?= $data['tgl_solusi'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Solusi</label>
                                <input class="form-control" placeholder="solusi" name="solusi" value="<?= $data['solusi'] ?>"required>
                            </div>
                            <div class="form-group">
                                <label>Pihak Penindak Lanjut</label>
                                <input class="form-control" placeholder="pihak_solusi" name="pihak_solusi" value="<?= $data['pihak_solusi'] ?>"required>
                            </div>
                                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                <button type="reset" class="btn btn-default">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- /.panel-->
        </div><!-- /.col-->