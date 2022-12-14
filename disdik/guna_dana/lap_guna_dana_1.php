<?php
     $query = mysqli_query($koneksi, "SELECT guna_dana.*, data_siswa.* FROM guna_dana
     
     INNER JOIN data_siswa ON guna_dana.id_siswa = data_siswa.id_siswa");
if (isset($_POST['submit'])) {
    # code...
    $status = $_POST['status'];
    $tahun = $_POST['tahun'];
    $query = mysqli_query($koneksi, "SELECT guna_dana.*,s_rekom_layak .*, data_siswa.* FROM guna_dana
    INNER JOIN data_siswa ON guna_dana.id_siswa = data_siswa.id_siswa
    WHERE s_rekom_layak.tahun= '$tahun'");
}

if (isset($_POST['print'])) {
    # code... 
    $tahun = $_POST['tahun'];
    echo "<script> window.open('print/print_guna_dana.php?tahun=".$tahun."');
    </script>";
}
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                <em class="fa fa-home"></em>
            </a></li>
            <li class="active">Laporan Penggunaan Dana Layak PIP</li>
        </ol>
    </div><!--/.row-->
    
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Laporan Penggunaan Dana Layak PIP</h1>
        </div>
    </div><!--/.row-->
            
            <div class="panel panel-default">
                <div class="panel-heading">Laporan Penggunaan Dana Layak PIP</div>
                <div class="panel-body">
                <div class="col-md-3">    
                <form method="POST" action="">
               
               <div class="form-group">
               <label>Opsi Cetak</label>
                <label>Tahun</label>
                <input type="text" value="<?php isset($_POST['tahun'])  ? print($_POST['tahun']) : "" ?>"maxlength="4" name="tahun" class="form-control" required>
           </div>
  
        
           <button type="submit" class="btn btn-primary" name="submit">Submit</button>
           <button type="submit" class="btn btn-warning" name="print">Print</button>

</form>
<hr>
</div>

                    <div class="col-md-12">
                    <a href="?page=tambah_guna" class="btn btn-primary">Tambah</a>
                    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>NISN</th>
                <th>Nama Siswa</th>
                <th>Kelas</th>
                <th>Tahun</th>
                <th>Daftar Penggunaan</th>
                <th>Bukti Pembelian</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = mysqli_query($koneksi, "SELECT guna_dana.*, data_siswa.* FROM guna_dana
            INNER JOIN data_siswa ON guna_dana.id_siswa = data_siswa.id_siswa");
            while($data = mysqli_fetch_array($query)){

            ?>
            <tr>
                <td><?= $data['nisn'] ?></td>
                <td><?= $data['nama'] ?></td> 
                <td><?= $data['kelas'] ?></td>
                <td><?= $data['tahun']?></td>
                <td><?= $data['daftar_guna']?></td>
                <td><a href="<?= $data['upload_nota'] ?>"><img src="<?= $data['upload_nota'] ?>" width="50"> </a></td>
                <td><a href="?page=laporan_usulan&&id=<?//= $data['id_usulan']?>" target="_blank" class="btn btn-sm btn-info">Detail</a></td>
                
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