<?php
            $query = mysqli_query($koneksi, "SELECT s_rekom_layak.*, layak_pip.*, data_siswa.* FROM s_rekom_layak 
            INNER JOIN layak_pip ON s_rekom_layak.id_layak_pip = layak_pip.id_layak_pip
            INNER JOIN data_siswa ON layak_pip.id_siswa = data_siswa.id_siswa");
if (isset($_POST['submit'])) {
    # code...
    $status = $_POST['status'];
    $tahun = $_POST['tahun'];
    $query = mysqli_query($koneksi, "SELECT s_rekom_layak.*, layak_pip.*, data_siswa.* FROM s_rekom_layak 
    INNER JOIN layak_pip ON s_rekom_layak.id_layak_pip = layak_pip.id_layak_pip
    INNER JOIN data_siswa ON layak_pip.id_siswa = data_siswa.id_siswa
    WHERE s_rekom_layak.status_rekom = '$status' AND s_rekom_layak.tahun = '$tahun'");
}

if (isset($_POST['print'])) {
    # code... 
    $status = $_POST['status'];
    $tahun = $_POST['tahun'];
    echo "<script> window.open('print/print_rekom_kolektif.php?status=".$status."&&tahun=".$tahun."');
    </script>";
}
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                <em class="fa fa-home"></em>
            </a></li>
            <li class="active">Rekomendasi Siswa Layak PIP</li>
        </ol>
    </div><!--/.row-->
    
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Rekomendasi Siswa Layak PIP</h1>
        </div>
    </div><!--/.row-->
            
            <div class="panel panel-default">
                <div class="panel-heading">Rekomendasi Siswa Layak PIP</div>
                <div class="panel-body">
                <div class="col-md-3">    
                <form method="POST" action="">
               
               <div class="form-group">
               <label>Opsi Rekomendasi</label>
              <select class="form-control" name="status">
              <option value="">---</option>
                <option value="1" <?php isset($_POST['status']) && $_POST['status'] == 1 ? print("selected") : "" ?>>Kolektif</option>
                <option value="2" <?php isset($_POST['status']) && $_POST['status'] == 2 ? print("selected") : "" ?>>Individu</option>
                </select>
                <label>Tahun</label>
                <input type="text" value="<?php isset($_POST['tahun'])  ? print($_POST['tahun']) : "" ?>"maxlength="4" name="tahun" class="form-control" required>
           </div>
           
  
        
           <button type="submit" class="btn btn-primary" name="submit">Submit</button>
           <button type="submit" class="btn btn-warning" name="print">Print</button>

</form>
<hr>
</div>

                    <div class="col-md-12">
                    <a href="?page=tambah_rekom" class="btn btn-primary">Tambah</a>
                    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>NISN</th>
                <th>Nama Siswa</th>
                <th>Kelas</th>
                <th>Tahun</th>
                <th>Tahap</th>
                <th>Dana</th>
                <th>No. Rekening</th>
                <th>Status</th>
                <th>Detail</th>
                <th>Cetak</th>
            </tr>
        </thead>
        <tbody>
            <?php
            
            while($data = mysqli_fetch_array($query)){

            ?>
            <tr>
                <td><?= $data['nisn'] ?></td>
                <td><?= $data['nama']?></td> 
                <td><?= $data['kelas'] ?></td>
                <td><?= $data['tahun'] ?></td>
                <td><?= $data['tahap'] ?></td>
                <td><?= $data['dana'] ?></td>
                <td><?= $data['no_rek'] ?></td>
                <td><?php
                  if ($data['status_rekom'] == 0) {
                      # code...
                      echo "Belum Di Konfirmasi";
                  }elseif ($data['status_rekom'] == 1) {
                      # code...
                      echo "Kolektif";
                  }elseif ($data['status_rekom'] == 2) {
                    # code...
                    echo "Individu";
                }
                  ?></td>
                <td><a href="?page=detail_rekom&&id=<?= $data['id_rekom_layak']?>" target="_blank" class="btn btn-sm btn-info">Detail</a></td>
               <td>
                   <?php
                if ($data['status_rekom'] == 0) {
                      # code...
                      echo "Belum Di Konfirmasi";
                  }elseif ($data['status_rekom'] == 1) {
                      # code...
                      echo "Kolektif";
                  }elseif ($data['status_rekom'] == 2) {
                    # code...
                    ?> <a href="print/print_rekom_individu.php?id=<?= $data['id_rekom_layak']?>" target="_blank" class="btn btn-sm btn-warning">Print</a>
                    <?php

                }
                ?>
              </td>
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