<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                <em class="fa fa-home"></em>
            </a></li>
            <li class="active">Rekomendasi Penerima PIP</li>
        </ol>
    </div><!--/.row-->
    
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"> Rekomendasi Penerima PIP </h1>
        </div>
    </div><!--/.row-->
            
            <div class="panel panel-default">
                <div class="panel-heading">Rekomendasi Penerima PIP</div>
                <div class="panel-body">
                    <div class="col-md-15">
                    <a href="?page=tambah_rekom" class="btn btn-primary">Tambah</a>
                    <table id="example" class="display" style="width:100%">

        <thead>
            <tr>
                <th>No</th>
                <th>NISN</th>
                <th>Nama Siswa</th>
                <th>Kelas</th>
                <th>Tahun</th>
                <th>Tahap</th>
                <th>Dana</th>
                <th>No. Rekening</th>
                <th>Status</th>
                <th>Detail</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $query = mysqli_query($koneksi, "SELECT s_rekom_layak.*, layak_pip.*, data_siswa.* FROM s_rekom_layak 
            INNER JOIN layak_pip ON s_rekom_layak.id_layak_pip = layak_pip.id_layak_pip
            INNER JOIN data_siswa ON layak_pip.id_siswa = data_siswa.id_siswa");
            while($data = mysqli_fetch_array($query)){

            ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $data['nisn'] ?></td>
                <td><?= $data['nama'] ?></td> 
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

                <td> <a href="?page=kolektif_rekom&&id=<?= $data['id_rekom_layak']?>"  class="btn btn-sm btn-primary">Kolektif</a>|
                <a href="?page=individu_rekom&&id=<?= $data['id_rekom_layak']?>" class="btn btn-sm btn-danger">Individu</a>|
                <a href="?page=edit_rekom&&id=<?= $data['id_rekom_layak']?>" target="_blank" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>|
                <a href="?page=hapus_rekom&&id=<?= $data['id_rekom_layak']?>" target="_blank" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a></td>
                
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