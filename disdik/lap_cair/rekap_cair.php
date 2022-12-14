<?php
$query = mysqli_query($koneksi, "SELECT * FROM rekap_cair
INNER JOIN sdn_bjb ON rekap_cair.id_sdn=sdn_bjb.id_sdn");
if (isset($_POST['submit'])) {
    # code...
    $tahun = $_POST['tahun'];
   
    $query = mysqli_query($koneksi, "SELECT * FROM rekap_cair
    INNER JOIN sdn_bjb ON rekap_cair.id_sdn=sdn_bjb.id_sdn
    WHERE rekap_cair.tahun = '$tahun'");
}

if (isset($_POST['print'])) {
    # code... 
    $tahun = $_POST['tahun'];
    echo "<script> window.open('print/print_rekap_cair.php?tahun=".$tahun."');
    </script>";
}
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                <em class="fa fa-home"></em>
            </a></li>
            <li class="active">Pencairan Dana PIP</li>
        </ol>
    </div><!--/.row-->
    
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Rekap Pencairan Dana PIP</h1>
        </div>
    </div><!--/.row-->
            
            <div class="panel panel-default">
                <div class="panel-heading">Rekap Pencairan Dana PIP</div>
                <div class="panel-body">
                <div class="col-md-3">    
                <form method="POST" action="">
               
               <div class="form-group">
               <label>Tahun</label>
                <input type="text" value="<?php isset($_POST['tahun'])  ? print($_POST['tahun']) : "" ?>"maxlength="4" name="tahun" class="form-control" required>
           </div>
  
        
           <button type="submit" class="btn btn-primary" name="submit">Submit</button>
           <button type="submit" class="btn btn-warning" name="print">Print</button>

</form>
<hr>
</div>

                    <div class="col-md-12">
                    <a href="?page=tambah_rekap_cair" class="btn btn-primary">Tambah</a>
                    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>NPSN</th>
                <th>Nama Sekolah</th>
                <th>Jumlah Siswa Penerima PIP</th>
                <th>Total Dana yang Disalurkan</th>
                <th>Periode</th>
                <th>Tahun</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            <?php
             $no=1;
            $query = mysqli_query($koneksi, "SELECT * FROM rekap_cair
            INNER JOIN sdn_bjb ON rekap_cair.id_sdn=sdn_bjb.id_sdn");
            while($data = mysqli_fetch_array($query)){

            ?>
            <tr>
                <td><?= $no++;?></td>
                <td><?= $data['npsn'] ?></td>
                <td><?= $data['nama_sdn'] ?></td>
                <?php 
                	// mengambil data barang
	            $data_layak= mysqli_query($koneksi,"SELECT * FROM s_rekom_layak");
 
	                // menghitung data barang
	            $jumlah_Layak = mysqli_num_rows($data_layak);
                ?>
                <td><?= $jumlah_Layak ?></td>
                <?php 
                	// mengambil data barang
	            $dana_layak = mysqli_query($koneksi,"SELECT SUM(dana) AS total FROM s_rekom_layak");
 
	                // menghitung data barang
                while($layak = mysqli_fetch_array($dana_layak)){
                ?>
                <td><?= $layak['total'] ?></td>
                <?php 
                }
                ?>
                <td><?= $data['periode'] ?>
                <td><?= $data['tahun'] ?>
                <td><a href="?page=laporan_cair" target="_blank" class="btn btn-sm btn-info">Detail</a>
                <a href="?page=hapus_rekap_cair&&id=<?= $data['id_rekap']?>" target="_blank" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a></td>
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