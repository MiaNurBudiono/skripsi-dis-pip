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
                <th>Gaji Ortu</th>
                <th>Jumlah Keluarga</th>
                <th>Jarak Rumah</th>
                <th>Transportasi</th>
                <th>Nilai Kelayakan</th>
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
            <?php
            if ($data['gaji_ortu'] == 6) {
                $gjr = "Lebih dari Rp.5.000.000,-";
            } else if ($data['gaji_ortu'] == 7) {
                $gjr = "Rp.3.000.000,- s/d Rp.5.000.000,";
            } else if ($data['gaji_ortu'] == 8) {
                $gjr = "Rp.1.000.000,- s/d Rp.2.000.000,-";
            } else if ($data['gaji_ortu'] == 9) {
                $gjr = "Kurang dari Rp.1000.000,-";
            }
            ?>
            <?php
            if ($data['jml_keluarga'] == 6) {
                $jmlklg = "Kurang Dari 3 Orang";
            } else if ($data['jml_keluarga'] == 7) {
                $jmlklg = "3 Orang";
            } else if ($data['jml_keluarga'] == 8) {
                $jmlklg = "4 Orang";
            } else if ($data['jml_keluarga'] == 9) {
                $jmlklg = "Lebih dari 4 Orang";
            }
            ?>
            <?php
            if ($data['jrk_rmh'] == 6) {
                $jrkrmh = "Kurang dari 100 m";
            } else if ($data['jrk_rmh'] == 7) {
                $jrkrmh = "100 - 300 m";
            } else if ($data['jrk_rmh'] == 8) {
                $jrkrmh = "300 - 400 m";
            } else if ($data['jrk_rmh'] == 9) {
                $jrkrmh = "Lebih dari 400 m";
            }
            ?>
            <?php
            if ($data['trans'] == 6) {
                $trans = "Angkot";
            } else if ($data['trans'] == 7) {
                $trans = "Motor";
            } else if ($data['trans'] == 8) {
                $trans = "Sepeda";
            } else if ($data['trans'] == 9) {
                $trans = "Jalan Kaki";
            }
            ?>
            <?php 
            $nilailayak = ($data['gaji_ortu'] * 0.3) + ($data['jml_keluarga'] * 0.3) + ($data['jrk_rmh'] * 0.25) + ($data['trans'] * 0.15);
            if ($nilailayak < 7 ) {
                $nlyk = "Kurang";
            } else if ($nilailayak <= 7 ) {
                $nlyk = "Cukup";
            } else if ($nilailayak < 8 ) {
                $nlyk = "Baik";
            } else if ($nilailayak >= 8 ) {
                $nlyk = "Sangat Baik";
            } 
            ?>
                <td><?= $data['nisn'] ?></td>
                <td><?= $data['nama'] ?></td>
                <td><?= $data['jk'] ?></td>
                <td><?= $data['kelas'] ?></td>
                <td><?= $gjr ?></td>
                <td><?= $jmlklg ?></td>
                <td><?= $jrkrmh ?></td>
                <td><?= $trans ?></td>
                <td><?= $nilailayak , " ($nlyk)" ?></td>
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
                <td><a href="<?= $data['upload_syarat'] ?>"><img src="<?= $data['upload_syarat'] ?>" width="40"> </a></td>
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