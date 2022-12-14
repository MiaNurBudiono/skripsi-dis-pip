<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                <em class="fa fa-home"></em>
            </a></li>
            <li class="active">Daftar Akun</li>
        </ol>
    </div><!--/.row-->
    
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"> Daftar Akun Pengguna</h1>
        </div>
    </div><!--/.row-->
            
            <div class="panel panel-default">
                <div class="panel-heading">Daftar Akun Pengguna</div>
                <div class="panel-body">
                    <div class="col-md-15">
                    <a href="?page=tambah_akun" class="btn btn-primary">Tambah</a>
                    <table id="example" class="display" style="width:100%">
</div>

        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Asal Sekolah</th>
                <th>Nomor HP</th>
                <th>Email</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $query = mysqli_query($koneksi, "SELECT * FROM user 
            INNER JOIN sdn_bjb ON user.id_sdn=sdn_bjb.id_sdn
            WHERE user.level !=2");
            while($data = mysqli_fetch_array($query)){

            ?>
            <tr>
                <td><?=$no++?></td>
                <td><?= $data['nama'] ?></td>
                <td><?= $data['nama_sdn'] ?></td> 
                <td><?= $data['no_hp'] ?></td>
                <td><?= $data['email'] ?></td>
                
                <td> 
                <a href="?page=ganti_password&&id=<?= $data['id_user']?>" target="_blank" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>|
                <a href="?page=hapus_akun&&id=<?= $data['id_user']?>" target="_blank" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a></td>
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