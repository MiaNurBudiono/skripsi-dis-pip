<?php
$query = mysqli_query($koneksi, "SELECT * FROM petugas");

if (isset($_POST['print'])) {
    echo "<script> window.open('print/print_petugas.php?');
    </script>";
}
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                <em class="fa fa-home"></em>
            </a></li>
            <li class="active">Data Petugas</li>
        </ol>
    </div><!--/.row-->
    
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Data Petugas PIP</h1>
        </div>
    </div><!--/.row-->
            
            <div class="panel panel-default">
                <div class="panel-heading">Data Petugas PIP</div>
                <div class="panel-body">
                <div class="col-md-15">    
                <form method="POST" action="">
               
               <div class="form-group">
                   
  
        
           
           <button type="submit" class="btn btn-warning" name="print">Print</button>
           
</form>
<hr>
</div>

                    <div class="col-md-12">
                    <a href="?page=tambah_petugas" class="btn btn-primary">Tambah</a>
                    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIP</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Jabatan</th>
                <th>Nomor HP</th>
                <th>Email</th>
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
                <td><?= $data['nama'] ?></td>
                <td><?= $data['nip'] ?></td>
                <td><?= $data['tempat_lahir'] ?></td>
                <td><?= $data['tgl_lahir'] ?></td>
                <td><?= $data['jabatan'] ?></td>
                <td><?= $data['no_hp'] ?></td>
                <td><?= $data['email'] ?></td>
            
                
               
                <td> 
                <a href="?page=edit_petugas&&id=<?= $data['id_petugas']?>" target="_blank" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>|
                <a href="?page=hapus_petugas&&id=<?= $data['id_petugas']?>" target="_blank" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a></td>
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