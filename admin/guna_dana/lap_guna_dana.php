<?php
     $query = mysqli_query($koneksi, "SELECT guna_dana.*, data_siswa.* ,user* FROM guna_dana
     INNER JOIN s_rekom_layak ON guna_dana.id_rekom_layak = s_rekom_layak.id_rekom_layak
     INNER JOIN user ON guna_dana.id_user=user.id_user");
if (isset($_POST['submit'])) {
    # code...
    $daftar_guna = $_POST['daftar_guna'];
    $tahun = $_POST['tahun'];
    $query = mysqli_query($koneksi, "SELECT guna_dana.*,s_rekom_layak .*, data_siswa.* FROM guna_dana
    INNER JOIN s_rekom_layak ON guna_dana.id_rekom_layak = s_rekom_layak.id_rekom_layak
    INNER JOIN data_siswa ON guna_dana.id_siswa = data_siswa.id_siswa
    WHERE s_rekom_layak.tahun= '$tahun'");
}

if (isset($_POST['print'])) {
    # code... 
    $tahun = $_POST['tahun'];
    $daftar_guna = $_POST['daftar_guna'];
    echo "<script> window.open('print/print_guna_dana.php?daftar_guna=".$daftar_guna."&&tahun=".$tahun."');
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
                <label>Kategori Penggunaan Dana</label>
                <select class="form-control" name="daftar_guna">
                <option value="">---</option>
                <option value="Membeli Perlengkapan Sekolah" <?php isset($_POST['daftar_guna']) ? print("selected") : "" ?>>Membeli Perlengkapan Sekolah</option>
                <option value="Sebagai Dana Transportasi dan Uang Saku" <?php isset($_POST['daftar_guna']) ? print("selected") : "" ?>>Sebagai Dana Transportasi dan Uang Saku</option>
                <option value="Biaya Les/Praktik" <?php isset($_POST['daftar_guna'])  ? print("selected") : "" ?>>Biaya Les/Praktik</option>                
                </select>
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
                <th>Dana yang Diterima</th>
                <th>Daftar Penggunaan</th>
                <th>Total Dana yang Digunakan</th>
                <th>Bukti Penggunaan Dana</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = mysqli_query($koneksi, "SELECT * FROM guna_dana
            INNER JOIN data_siswa ON guna_dana.id_siswa = data_siswa.id_siswa
            INNER JOIN sdn_bjb on data_siswa.id_sdn = sdn_bjb.id_sdn
            INNER JOIN layak_pip on guna_dana.id_siswa = layak_pip.id_siswa
            INNER JOIN s_rekom_layak on layak_pip.id_layak_pip = s_rekom_layak.id_layak_pip
            ");
            while($data = mysqli_fetch_array($query)){

            ?>
            <tr>
                <td><?= $data['nisn'] ?></td>
                <td><?= $data['nama'] ?></td> 
                <td><?= $data['kelas'] ?></td>
                <td><?= $data['tahun'] ?></td> 
                <td><?= $data['tahap'] ?></td>
                <td><?= $data['dana'] ?></td>
                <td><?= $data['daftar_guna'] ?></td>
                <td><?= $data['nominal'] ?></td>                
                <td><a href="<?= $data['upload_nota'] ?>"><img src="<?= $data['upload_nota'] ?>" width="50"> </a></td>
                <td>
                <a href="?page=hapus_guna_dana&&id=<?= $data['id_guna_dana']?>" target="_blank" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a></td>
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