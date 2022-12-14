<?php
$query = mysqli_query($koneksi, "SELECT * FROM guna_dana
INNER JOIN sdn_bjb ON guna_dana.id_sdn=sdn_bjb.id_sdn");
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                <em class="fa fa-home"></em>
            </a></li>
            <li class="active">Penggunaan Dana PIP</li>
        </ol>
    </div><!--/.row-->
    
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Rekap Penggunaan Dana PIP</h1>
        </div>
    </div><!--/.row-->
            
            <div class="panel panel-default">
                <div class="panel-heading">Rekap Penggunaan Dana PIP</div>
                <div class="panel-body">
                <div class="col-md-3">    
                <form method="POST" action="">
               
              

</form>
<hr>
</div>

                    <div class="col-md-12">
                    <a href="?page=tambah_guna" class="btn btn-primary">Tambah</a>
                    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>NPSN</th>
                <th>Nama Sekolah</th>
                <th>Periode</th>
                <th>Tahun</th>
                <th>Total Dana yang Disalurkan</th>
                <th>Total Dana yang Digunakan</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no=1;
            while($data = mysqli_fetch_array($query)){

            ?>
            <tr>
                <td><?= $no++;?></td>
                <td><?= $data['npsn'] ?></td>
                <td><?= $data['nama_sdn'] ?></td>
                <td><?= $data['periode'] ?></td>
                <td><?= $data['tahun'] ?></td>
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
                <?php 
                	// mengambil data barang
	            $dana_guna = mysqli_query($koneksi,"SELECT SUM(nominal) AS total FROM guna_dana");
 
	                // menghitung data barang
                while($guna = mysqli_fetch_array($dana_guna)){
                ?>
                <td><?= $guna['total'] ?></td>
                <?php 
                }
                ?>
                <td><a href="?page=lap_guna_dana" target="_blank" class="btn btn-sm btn-info">Detail</a>
                <a href="?page=hapus_rekap_guna&&id=<?= $data['id_guna_dana']?>" target="_blank" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a></td></td>
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