<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                <em class="fa fa-home"></em>
            </a></li>
            <li class="active">Data Sekolah</li>
        </ol>
    </div><!--/.row-->
    
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"> Data Sekolah Dasar </h1>
        </div>
    </div><!--/.row-->
            
            <div class="panel panel-default">
                <div class="panel-heading">Data Sekolah Dasar Negeri</div>
                <div class="panel-body">
                    <div class="col-md-15">
                    <a href="?page=tambah_sd" class="btn btn-primary">Tambah</a>
                    <table id="example" class="display" style="width:100%">
</div>

        <thead>
            <tr>
                <th>No</th>
                <th>NPSN</th>
                <th>Nama Sekolah</th>
                <th>Alamat</th>
                <th>Kelurahan</th>
                <th>Kecamatan</th>
                <th>Nama Kepala Sekolah</th>
                <th>Nomor HP</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $query = mysqli_query($koneksi, "SELECT * FROM sdn_bjb");
            while($data = mysqli_fetch_array($query)){

            ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $data['npsn'] ?></td>
                <td><?= $data['nama_sdn'] ?></td>
                <td><?= $data['alamat'] ?></td>
                <td><?= $data['kelurahan'] ?></td>
                <td><?= $data['kecamatan'] ?></td>
                <td><?= $data['nama_kepsek'] ?></td>
                <td><?= $data['no_hp'] ?></td>
                
                <td> 
                <a href="?page=edit_sd&&id=<?= $data['id_sdn']?>" target="_blank" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>|
                <a href="?page=hapus_sd&&id=<?= $data['id_sdn']?>" target="_blank" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a></td>
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