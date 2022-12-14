<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                <em class="fa fa-home"></em>
            </a></li>
            <li class="active">Kendala dan Solusi</li>
        </ol>
    </div><!--/.row-->
    
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"> Kendala dan Solusi </h1>
        </div>
    </div><!--/.row-->
            
            <div class="panel panel-default">
                <div class="panel-heading">Kendala dan Solusi</div>
                <div class="panel-body">
                    <div class="col-md-15">
                    <a href="?page=tambah_kendala" class="btn btn-primary">Tambah</a>
                    <table id="example" class="display" style="width:100%">

        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Kendala/Masalah</th>
                <th>Pihak yang Diharapkan Membantu</th>
                <th>Detail Solusi</th>
                <th>Opsi</th>
               
            </tr>
        </thead>
        <tbody>
            <?php
            $query = mysqli_query($koneksi, "SELECT * FROM kendala_solusi");
            while($data = mysqli_fetch_array($query)){

            ?>
            <tr>
                <td><?= tgl_indo($data['tgl_kendala']) ?></td>
                <td><?= $data['kendala'] ?></td>
                <td><?= $data['pihak'] ?></td>
                <td><a href="?page=detail_solusi&&id=<?= $data['id_ken_sol']?>" target="_blank" class="btn btn-sm btn-info">Detail</a></td>
            
                
                
                <td><a href="?page=edit_ken_sol&&id=<?= $data['id_ken_sol']?>" target="_blank" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
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