<?php
$query = mysqli_query($koneksi, "SELECT * FROM data_siswa");
if (isset($_POST['submit'])) {
    # code...
    $kelas = $_POST['kelas'];
    $query = mysqli_query($koneksi, "SELECT * FROM data_siswa
                            WHERE data_siswa.kelas = '$kelas'");
}
if (isset($_POST['print'])) {
    $kelas = $_POST['kelas'];
    echo "<script> window.open('print/print_data_siswa.php?kelas=".$kelas."');
    </script>";
}
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                <em class="fa fa-home"></em>
            </a></li>
            <li class="active">Data Siswa</li>
        </ol>
    </div><!--/.row-->
    
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Data Siswa</h1>
        </div>
    </div><!--/.row-->
            
            <div class="panel panel-default">
                <div class="panel-heading">Data Siswa</div>
                <div class="panel-body">
                <div class="col-md-3">    
                <form method="POST" action="">
               
               <div class="form-group">
                <label>Kelas</label>
                <input type="text" value="<?php isset($_POST['kelas'])  ? print($_POST['kelas']) : "" ?>"maxlength="4" name="kelas" class="form-control" required>
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
                <th>NIS</th>
                <th>Nama Siswa</th>
                <th>Jenis Kelamin</th>
                <th>Kelas</th>
                <th>Detail</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            
            while($data = mysqli_fetch_array($query)){

            ?>
            <tr>
                <td><?= $data['nisn'] ?></td>
                <td><?= $data['nis'] ?></td>
                <td><?= $data['nama'] ?></td>
                <td><?= $data['jk'] ?></td>
                <td><?= $data['kelas'] ?></td>
            
                <td><a href="?page=detail_siswa&&id=<?= $data['id_siswa']?>" target="_blank" class="btn btn-sm btn-info">Detail</a></td>
               
                <td> 
                <a href="?page=edit_siswa&&id=<?= $data['id_siswa']?>" target="_blank" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>|
                <a href="?page=hapus_siswa&&id=<?= $data['id_siswa']?>" target="_blank" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a></td>
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