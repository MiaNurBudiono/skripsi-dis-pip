<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                <em class="fa fa-home"></em>
            </a></li>
            <li class="active">Usul PIP</li>
        </ol>
    </div><!--/.row-->
    
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"> Usul Penerima PIP </h1>
        </div>
    </div><!--/.row-->
            
            <div class="panel panel-default">
                <div class="panel-heading">Data <?= $title ?></div>
                <div class="panel-body">
                    <div class="col-md-15">
                    <a href="?page=tambah_usulan" class="btn btn-primary">Tambah</a>
                    <table id="example" class="display" style="width:100%">

        <thead>
            <tr>
                <th>NISN</th>
                <th>Nama Siswa</th>
                <th>Jenis Kelamin</th>
                <th>Kelas</th>
                <th>Status</th>
                <th>Detail</th>
                <th>Upload Syarat</th>
                <th>opsi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = mysqli_query($koneksi, "SELECT * FROM usulan 
            INNER JOIN data_siswa ON usulan.id_siswa = data_siswa.id_siswa");
            while($data = mysqli_fetch_array($query)){

            ?>
            <tr>
                <td><?= $data['nisn'] ?></td>
                <td><?= $data['nama'] ?></td>
                <td><?= $data['jk'] ?></td>
                <td><?= $data['kelas'] ?></td>
                <td><?php
                  if ($data['status_usulan'] == 0) {
                      # code...
                      echo "Belum Di Konfirmasi";
                  }elseif ($data['status_usulan'] == 1) {
                      # code...
                      echo "Usulan Di Terima";
                  }elseif ($data['status_usulan'] == 2) {
                    # code...
                    echo "Usulan Di Tolak";
                }
                  ?></td>
                <td><a href="?page=detail_usulan&&id=<?= $data['id_usulan']?>" target="_blank" class="btn btn-sm btn-info">Detail</a></td>
                <td><a href="<?= $data['upload_syarat'] ?>"><img src="<?= $data['upload_syarat'] ?>" width="50"> </a></td>
                <td> <a href="?page=terima_usulan&&id=<?= $data['id_usulan']?>"  class="btn btn-sm btn-primary">Terima</a>|
                <a href="?page=tolak_usulan&&id=<?= $data['id_usulan']?>" class="btn btn-sm btn-danger">Tolak</a>|
                <a href="?page=edit_usulan&&id=<?= $data['id_usulan']?>" target="_blank" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>|
                <a href="?page=hapus_usulan&&id=<?= $data['id_usulan']?>" target="_blank" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a></td>
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