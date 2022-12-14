<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                <em class="fa fa-home"></em>
            </a></li>
            <li class="active">Pencairan Dana Layak PIP</li>
        </ol>
    </div><!--/.row-->
    
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"> Pencairan Dana Layak PIP </h1>
        </div>
    </div><!--/.row-->
            
            <div class="panel panel-default">
                <div class="panel-heading">Pencairan Dana  Layak PIP</div>
                <div class="panel-body">
                    <div class="col-md-15">
                    <a href="?page=tambah_cair" class="btn btn-primary">Tambah</a>
                    <table id="example" class="display" style="width:100%">

        <thead>
            <tr>
                <th>NISN</th>
                <th>Nama Siswa</th>
                <th>Kelas</th>
                <th>Tahun</th>
                <th>Tahap</th>
                <th>Status</th>
                <th>Detail</th>
                <th>Bukti Cair</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = mysqli_query($koneksi, "SELECT * FROM lap_cair
            INNER JOIN s_rekom_layak ON lap_cair.id_rekom_layak = s_rekom_layak.id_rekom_layak
            INNER JOIN layak_pip ON s_rekom_layak.id_layak_pip = layak_pip.id_layak_pip
            INNER JOIN data_siswa ON layak_pip.id_siswa = data_siswa.id_siswa");
            while($data = mysqli_fetch_array($query)){

            ?>
            <tr>
                <td><?= $data['nisn'] ?></td>
                <td><?= $data['nama'] ?></td> 

                <td><?= $data['kelas']?></td>
                <td><?= $data['tahun'] ?></td>
                <td><?= $data['tahap'] ?></td>
                <td><?php
                  if ($data['status_cair'] == 0) {
                      # code...
                      echo "Belum Di Konfirmasi";
                  }elseif ($data['status_cair'] == 1) {
                      # code...
                      echo "Sudah Cair";
                  }elseif ($data['status_cair'] == 2) {
                    # code...
                    echo "Belum Cair";
                }
                  ?></td>
                <td><a href="?page=detail_cair&&id=<?= $data['id_lap_cair']?>" target="_blank" class="btn btn-sm btn-info">Detail</a></td>
                <td><a href="<?= $data['upload_bukti'] ?>"><img src="<?= $data['upload_bukti'] ?>" width="50"> </a></td>
                <td><a href="?page=sudah&&id=<?= $data['id_lap_cair']?>"class="btn btn-sm btn-primary">Sudah</a>|
                <a href="?page=belum&&id=<?= $data['id_lap_cair']?>" class="btn btn-sm btn-danger">Belum</a>|
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