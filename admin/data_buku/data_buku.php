<?php
$query = mysqli_query($koneksi, "SELECT * FROM buku");

if (isset($_POST['print'])) {
    echo "<script> window.open('print/print_data_buku.php');
    </script>";
}
    
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                <em class="fa fa-home"></em>
            </a></li>
            <li class="active">Data Buku</li>
        </ol>
    </div><!--/.row-->
    
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"> Data Buku </h1>
        </div>
    </div><!--/.row-->
            
           

<div class="panel panel-default">
                <div class="panel-heading">Data Buku</div>
                <div class="panel-body">
                <div class="col-md-15">    
                <form method="POST" action=""> 
                <div class="col-md-15">
                    <a href="?page=tambah_buku" class="btn btn-primary">Tambah</a>
                    <table id="example" class="display" style="width:100%">
  
        
           
           <button type="submit" class="btn btn-warning" name="print">Print</button>
           
           

        <thead>
            <tr>
                <th>No</th>
                <th>Judul Buku</th>
                <th>Pengarang</th>
                <th>Penerbit</th>
                <th>Tahun Terbit</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no=1;
            $query = mysqli_query($koneksi, "SELECT * FROM buku");
            while($data = mysqli_fetch_array($query)){

            ?>
            <tr>
                <td><?= $no++;?></td>
                <td><?= $data['judul_buku'] ?></td>
                <td><?= $data['pengarang'] ?></td>
                <td><?= $data['penerbit'] ?></td>
                <td><?= $data['tahun_terbit'] ?></td>
                
                
                <td> 
                <a href="?page=edit_buku&&id=<?= $data['id_buku']?>" target="_blank" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>|
                <a href="?page=hapus_buku&&id=<?= $data['id_buku']?>" target="_blank" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a></td>
            </tr>
            <?php
            }
            ?>
        </tbody>
        
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