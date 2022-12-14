<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                <em class="fa fa-home"></em>
            </a></li>
            <li class="active">Daftar Penggunaan Dana PIP</li>
        </ol>
    </div><!--/.row-->
    
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Daftar Penggunaan Dana PIP</h1>
        </div>
    </div><!--/.row-->
            
            <div class="panel panel-default">
                <div class="panel-heading">Daftar Penggunaan Dana PIP</div>
                <div class="panel-body">
                    <div class="col-md-15">
                    <a href="?page=tambah_guna" class="btn btn-primary">Tambah</a>
                    <table id="example" class="display" style="width:100%">

        <thead>
            <tr>
                <th>NISN</th>
                <th>Nama Siswa</th>
                <th>Kelas</th>
                <th>Daftar Penggunaan Dana</th>
                <th>Nominal</th>
                <th>Bukti Cair</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            
            $ids = $_SESSION['id'];
            $query = mysqli_query($koneksi, "SELECT *, user.id_user FROM guna_dana
            INNER JOIN data_siswa on guna_dana.id_siswa = data_siswa.id_siswa
            INNER JOIN user on guna_dana.id_user = user.id_user
            where user.id_user=$ids");
            while($data = mysqli_fetch_array($query)){

            ?>
            <tr>
                <td><?= $data['nisn'] ?></td>
                <td><?= $data['nama'] ?></td> 
                <td><?= $data['kelas']?></td>
                <td><?= $data['daftar_guna'] ?></td>
                <td><?= $data['nominal'] ?></td>
                
                <td><a href="<?= $data['upload_nota'] ?>"><img src="<?= $data['upload_nota'] ?>" width="50"> </a></td>
                <td>
                <a href="?page=edit_guna_dana&&id=<?= $data['id_guna_dana']?>" target="_blank" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>|
                <a href="?page=hapus_guna_dana&&id=<?= $data['id_guna_dana']?>" target="_blank" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a></td>
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