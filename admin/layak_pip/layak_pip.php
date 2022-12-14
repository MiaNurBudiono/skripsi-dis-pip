<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                <em class="fa fa-home"></em>
            </a></li>
            <li class="active">Siswa Layak PIP</li>
        </ol>
    </div><!--/.row-->
    
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"> Data Siswa Layak PIP </h1>
        </div>
    </div><!--/.row-->
            
            <div class="panel panel-default">
                <div class="panel-heading">Data Siswa Layak PIP</div>
                <div class="panel-body">
                    <div class="col-md-15">
                    <a href="?page=tambah_layak_pip" class="btn btn-primary">Tambah</a>
                    <table id="example" class="display" style="width:100%">

        <thead>
            <tr>
                <th>NISN</th>
                <th>NIS</th>
                <th>Nama Siswa</th>
                <th>Jenis Kelamin</th>
                <th>Tanggal Lahir</th>
                <th>No.KIP</th>
                <th>Detail</th>
                <th>opsi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = mysqli_query($koneksi, "SELECT * FROM layak_pip INNER JOIN data_siswa ON layak_pip.id_siswa = data_siswa.id_siswa");
            while($data = mysqli_fetch_array($query)){

            ?>
            <tr>
                <td><?= $data['nisn'] ?></td>
                <td><?= $data['nis'] ?></td>
                <td><?= $data['nama'] ?></td>
                <td><?= $data['jk'] ?></td>
                <td><?= tgl_indo($data['tanggal_lahir'])?></td>
                <td><?= $data['no_kip'] ?></td>
                
                <td><a href="?page=detail_layak_pip&&id=<?= $data['id_layak_pip']?>" target="_blank" class="btn btn-sm btn-info">Detail</a></td>
                <td><a href="?page=edit_layak_pip&&id=<?= $data['id_layak_pip']?>" target="_blank" class="btn btn-sm btn-warning">Edit</a>
                    <a href="?page=hapus_layak_pip&&id=<?= $data['id_layak_pip']?>" onclick="return confirm('Anda yakin mau menghapus item ini ?')" class="btn btn-sm btn-danger">Hapus</a></td>
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