<?php
    $ids = $_SESSION['id'];


     $query = mysqli_query($koneksi, "SELECT *, user.id_user FROM lap_cair
     INNER JOIN user on lap_cair.id_user = user.id_user
     INNER JOIN data_siswa on user.id_siswa = data_siswa.id_siswa
     where user.id_user=$ids");
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                <em class="fa fa-home"></em>
            </a></li>
            <li class="active">Laporan Pencairan Dana PIP</li>
        </ol>
    </div><!--/.row-->
    
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Laporan Pencairan Dana PIP</h1>
        </div>
    </div><!--/.row-->
            
            <div class="panel panel-default">
                <div class="panel-heading">Laporan Pencairan Dana PIP</div>
                <div class="panel-body">
                <div class="col-md-3">    
                <form method="POST" action="">
               
              

</form>
<hr>
</div>

                    <div class="col-md-12">
                    <a href="?page=tambah_cair" class="btn btn-primary">Tambah</a>
                    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>NISN</th>
                <th>Nama Siswa</th>
                <th>Kelas</th>
                <th>Tanggal Cair</th>
                <th>Bukti Cair</th>
            </tr>
        </thead>
        <tbody>
            <?php
            
            while($data = mysqli_fetch_array($query)){

            ?>
            <tr>
                <td><?= $data['nisn'] ?></td>
                <td><?= $data['nama'] ?></td> 
                <td><?= $data['kelas'] ?></td>
                <td><?= tgl_indo($data['tanggal_cair'])?></td>
                <td><a href="<?= $data['upload_bukti'] ?>"><img src="<?= $data['upload_bukti'] ?>" width="50"> </a></td>
                
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