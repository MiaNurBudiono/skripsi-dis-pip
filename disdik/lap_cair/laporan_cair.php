<?php
     $query = mysqli_query($koneksi, "SELECT * FROM lap_cair
     INNER JOIN layak_pip on lap_cair.id_siswa = layak_pip.id_siswa
     INNER JOIN s_rekom_layak on layak_pip.id_layak_pip = s_rekom_layak.id_layak_pip
     INNER JOIN user on lap_cair.id_user = user.id_user
     INNER JOIN data_siswa on user.id_siswa = data_siswa.id_siswa
     
     ");
if (isset($_POST['submit'])) {
    # code...
    $status = $_POST['status'];
    $tahun = $_POST['tahun'];
    $query = mysqli_query($koneksi, "SELECT * FROM lap_cair
    INNER JOIN layak_pip on lap_cair.id_siswa = layak_pip.id_siswa
    INNER JOIN s_rekom_layak on layak_pip.id_layak_pip = s_rekom_layak.id_layak_pip
    INNER JOIN user on lap_cair.id_user = user.id_user
    INNER JOIN data_siswa on user.id_siswa = data_siswa.id_siswa
    WHERE lap_cair.status_cair = '$status' AND s_rekom_layak.tahun = '$tahun'");
}

if (isset($_POST['print'])) {
    # code... 
    $status = $_POST['status'];
    $tahun = $_POST['tahun'];
    echo "<script> window.open('print/print_lap_cair.php?status=".$status."&&tahun=".$tahun."');
    </script>";
}
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                <em class="fa fa-home"></em>
            </a></li>
            <li class="active">Laporan Pencairan Dana Layak PIP</li>
        </ol>
    </div><!--/.row-->
    
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Laporan Pencairan Dana Layak PIP</h1>
        </div>
    </div><!--/.row-->
            
            <div class="panel panel-default">
                <div class="panel-heading">Laporan Pencairan Dana Layak PIP</div>
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
                   
                    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>NISN</th>
                <th>Nama Siswa</th>
                <th>Kelas</th>
                <th>Tahun</th>
                <th>Tahap</th>
                <th>Tanggal Cair</th>
                <th>Bukti Cair</th>
                <th>Opsi</th>
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
                <td><?= $data['tahun']?></td>
                <td><?= $data['tahap']?></td>
                
                <td><?= tgl_indo($data['tanggal_cair'])?></td>

                <td><a href="<?= $data['upload_bukti'] ?>"><img src="<?= $data['upload_bukti'] ?>" width="50"> </a></td>
                <td>
                <a href="?page=edit_data_cair&&id=<?= $data['id_lap_cair']?>" target="_blank" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>|
                <a href="?page=hapus_cair&&id=<?= $data['id_lap_cair']?>" target="_blank" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a></td>
                
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