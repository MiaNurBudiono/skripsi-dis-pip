<?php
$query = mysqli_query($koneksi, "SELECT * FROM usulan 
INNER JOIN data_siswa ON usulan.id_siswa = data_siswa.id_siswa");
if (isset($_POST['submit'])) {
    # code...
    $status = $_POST['status'];
   
    $query = mysqli_query($koneksi, "SELECT * FROM usulan 
    INNER JOIN data_siswa ON usulan.id_siswa = data_siswa.id_siswa
    WHERE usulan.status_usulan = '$status'");
}

if (isset($_POST['print'])) {
    # code... 
    $status = $_POST['status'];
    echo "<script> window.open('print/print_usulan.php?status=".$status."');
    </script>";
}
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                <em class="fa fa-home"></em>
            </a></li>
            <li class="active">Usul PIP</li>
        </ol>
    </div><!--/.row-->
    
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Usul Penerima PIP</h1>
        </div>
    </div><!--/.row-->
            
            <div class="panel panel-default">
                <div class="panel-heading">Data Usul PIP</div>
                <div class="panel-body">
                <div class="col-md-3">    
                <form method="POST" action="">
               
               <div class="form-group">
               <label>Status</label>
              <select class="form-control" name="status">
              <option value="">---</option>
                <option value="1" <?php isset($_POST['status']) && $_POST['status'] == 1 ? print("selected") : "" ?>>Di Terima</option>
                <option value="2" <?php isset($_POST['status']) && $_POST['status'] == 2 ? print("selected") : "" ?>>Di Tolak</option>
                </select>
           </div>
  
        
           <button type="submit" class="btn btn-primary" name="submit">Submit</button>
           <button type="submit" class="btn btn-warning" name="print">Print</button>

</form>
<hr>
</div>

                    <div class="col-md-12">
                    <a href="?page=tambah_usulan" class="btn btn-primary">Tambah</a>
                    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>NISN</th>
                <th>Nama Siswa</th>
                <th>Jenis Kelamin</th>
                <th>Kelas</th>
                <th>Status</th>
                <th>Detail</th>
                <th>Upload Syarat</th>
            </tr>
        </thead>
        <tbody>
            <?php
            
            while($data = mysqli_fetch_array($query)){

            ?>
            <tr>
                <td><?= $data['nisn'] ?></td>
                <td><?= $data['nama'] ?></td>
                <td><?= $data['jk'] ?></td>
                <td><?= $data['kelas'] ?></td>
                <td><?php
                  if ($data['status_usulan'] == 0) {
                      # code...
                      echo "Belum Di Konfirmasi";
                  }elseif ($data['status_usulan'] == 1) {
                      # code...
                      echo "Usulan Di Terima";
                  }elseif ($data['status_usulan'] == 2) {
                    # code...
                    echo "Usulan Di Tolak";
                }
                  ?></td>
                <td><a href="?page=detail_usulan&&id=<?= $data['id_usulan']?>" target="_blank" class="btn btn-sm btn-info">Detail</a></td>
                <td><a href="<?= $data['upload_syarat'] ?>"><img src="<?= $data['upload_syarat'] ?>" width="50"> </a></td>
            </tr>
            <?php
            }
            ?>
        </tbody>
        <tfoot>
            <!-- <tr>
            <th>NISN</th>
                <th>Nama Siswa</th>
                <th>Jenis Kelamin</th>
                <th>Kelas</th>
                <th>Detail</th>
                <th>Upload Syarat</th>
                <th>opsi</th>
            </tr> -->
        </tfoot>
    </table>
                    </div>
                </div>
            </div><!-- /.panel-->
        </div><!-- /.col-->
        <script>
	$(document).ready(function() {
    $('#example').DataTable( {
        autoFill: true
    } );
} );
</script>