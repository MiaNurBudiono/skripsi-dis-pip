<?php
$query = mysqli_query($koneksi, "SELECT * FROM sdn_bjb");
if (isset($_POST['submit'])) {
    # code...
    
    $kecamatan = $_POST['kecamatan'];
    $query = mysqli_query($koneksi, "SELECT * FROM sdn_bjb
                            WHERE sdn_bjb.kecamatan = '$kecamatan'");
}
if (isset($_POST['print'])) {
    
    $kecamatan = $_POST['kecamatan'];
    echo "<script> window.open('print/print_sd.php?kecamatan=".$kecamatan."');
    </script>";
}
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                <em class="fa fa-home"></em>
            </a></li>
            <li class="active">Data Sekolah</li>
        </ol>
    </div><!--/.row-->
    
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Data Sekolah Dasar</h1>
        </div>
    </div><!--/.row-->
            
            <div class="panel panel-default">
                <div class="panel-heading">Data Sekolah Dasar Negeri</div>
                <div class="panel-body">
                <div class="col-md-3">    
                <form method="POST" action="">
               
               <div class="form-group">
                
                <label>Kecamatan</label>
                <input type="text" value="<?php isset($_POST['kecamatan'])  ? print($_POST['kecamatan']) : "" ?>"maxlength="20" name="kecamatan" class="form-control" required>
                </div>    
  
        
           <button type="submit" class="btn btn-primary" name="submit">Submit</button>
           <button type="submit" class="btn btn-warning" name="print">Print</button>
           
</form>
<hr>
</div>

                    <div class="col-md-12">
                    <a href="?page=tambah_sd" class="btn btn-primary">Tambah</a>
                    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>NPSN</th>
                <th>Nama Sekolah</th>
                <th>Alamat</th>
                <th>Kelurahan</th>
                <th>Kecamatan</th>
                <th>Nama Kepala Sekolah</th>
                <th>Nomor HP</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            
            while($data = mysqli_fetch_array($query)){

            ?>
            <tr>
                <td><?= $data['npsn'] ?></td>
                <td><?= $data['nama_sdn'] ?></td>
                <td><?= $data['alamat'] ?></td>
                <td><?= $data['kelurahan'] ?></td>
                <td><?= $data['kecamatan'] ?></td>
                <td><?= $data['nama_kepsek'] ?></td>
                <td><?= $data['no_hp'] ?></td>
               
                <td> 
                <a href="?page=edit_sd&&id=<?= $data['id_sdn']?>" target="_blank" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>|
                <a href="?page=hapus_sd&&id=<?= $data['id_sdn']?>" target="_blank" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a></td>
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