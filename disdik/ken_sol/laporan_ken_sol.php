<?php
$query = mysqli_query($koneksi, "SELECT * FROM kendala_solusi");
if (isset($_POST['print'])) {
    $bulan = $_POST['bulan'];
    $query = mysqli_query($koneksi, "SELECT * FROM kendala_solusi 
    WHERE MONTH(tgl_solusi) = '$bulan'");
}//mau diambil bulannya aja gimana ya?
    
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                <em class="fa fa-home"></em>
            </a></li>
            <li class="active">Daftar Kendala dan Solusi</li>
        </ol>
    </div><!--/.row-->
    
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Daftar Kendala dan Solusi</h1>
        </div>
    </div><!--/.row-->
            
            <div class="panel panel-default">
                <div class="panel-heading">Daftar Kendala dan Solusi</div>
                <div class="panel-body">
                <div class="col-md-3">    
                <form method="POST" action="">
               
                <div class="form-group">
                <label>Bulan</label>
                <select name="bulan" id="bulan">
                <option  value="1">Januari</option>
                <option  value="2">Febuari</option>
                <option  value="3">Maret</option>
                <option  value="4">April</option>
                <option  value="5">Mei</option>
                <option  value="6">Juni</option>
                <option  value="7">Juli</option>
                <option  value="8">Agustus</option>
                <option  value="9">September</option>
                <option  value="10">Oktober</option>
                <option  value="11">November</option>
                <option  value="12">Desember</option>
                </select>
                </div> 
                <button type="submit" class="btn btn-warning" name="print">Print Daftar</button>
</form>
<hr>
</div>

                    <div class="col-md-12">
                    <a href="?page=tambah_kendala" class="btn btn-primary">Tambah</a>
                    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Kendala</th>
                <th>Pihak yang Diharapkan</th>
                <th>Tanggal</th>
                <th>Solusi</th>
                <th>Pihak Penindak Lanjut</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            
            while($data = mysqli_fetch_array($query)){

            ?>
            <tr>
                <td><?= tgl_indo($data['tgl_kendala']) ?></td>
                <td><?= $data['kendala'] ?></td>
                <td><?= $data['pihak'] ?></td>
                <td><?= tgl_indo($data['tgl_solusi']) ?></td>
                <td><?= $data['solusi'] ?></td>
                <td><?= $data['pihak_solusi'] ?></td>

                
                <td><a href="?page=edit_ken_sol&&id=<?= $data['id_ken_sol']?>" target="_blank" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
                    <a href="?page=hapus_ken_sol&&id=<?= $data['id_ken_sol']?>" onclick="return confirm('Anda yakin mau menghapus item ini ?')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a></td>
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