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
                <div class="panel-heading">Detail Rekomendasi Siswa Layak PIP</div>
                <div class="panel-body">
                    <div class="col-md-12">
                    <table class="table table-striped table-bordered zero-configuration">
              <?php  
              $id = $_GET['id'];
              
              $sql = mysqli_query($koneksi, "SELECT s_rekom_layak.*, layak_pip.*, data_siswa.* FROM s_rekom_layak 
              INNER JOIN layak_pip ON s_rekom_layak.id_layak_pip = layak_pip.id_layak_pip
              INNER JOIN data_siswa ON layak_pip.id_siswa = data_siswa.id_siswa WHERE id_rekom_layak='$id'");

             
              while ($data = mysqli_fetch_array($sql)){


              ?>
               <tr>
                  <td>NISN</td>
                  <td><?=$data['nisn'];?></td>
                </tr>
                <tr>
                  <td>NIS</td>
                  <td><?=$data['nis'];//nanti ambil dr tb data_siswa?></td>
                </tr>
                <tr>
                  <td>Nama</td>
                  <td><?=$data['nama'];//nanti ambil dr tb data_siswa?></td>
                </tr>
                <tr>
                  <td>Tempat Lahir</td>
                  <td><?=$data['tempat_lahir'];//nanti ambil dr tb data_siswa?></td>
                </tr>
                <tr>
                  <td>Tanggal Lahir</td>
                  <td><?=$data['tanggal_lahir'];//nanti ambil dr tb data_siswa?></td>
                </tr>
                <tr>
                  <td>Jenis Kelamin</td>
                  <td><?=$data['jk'];//nanti ambil dr tb data_siswa?></td>
                </tr>
                <tr>
                  <td>Kelas</td>
                  <td><?=$data['kelas'];?></td>
                </tr>
                <tr>
                  <td>Tahap</td>
                  <td><?=$data['tahap'];?></td>
                </tr>
                <tr>
                  <td>Nama Ayah</td>
                  <td><?=$data['nama_ayah'];//nanti ambil dr tb layak_pip?></td>
                </tr>
                <tr>
                  <td>Nama Ibu</td>
                  <td><?=$data['nama_ibu'];//nanti ambil dr tb layak_pip?></td>
                </tr>
                <tr>
                  <td>Dana</td>
                  <td><?=$data['dana'];?></td>
                </tr>
                <tr>
                  <td>Virtual Account</td>
                  <td><?=$data['vir_akun'];?></td>
                </tr>
                <tr>
                  <td>Nomor Rekening</td>
                  <td><?=$data['no_rek'];?></td>
                </tr>
                <tr>
                  <td>Status</td>
                  <td><?php
                  if ($data['status_rekom'] == 0) {
                      # code...
                      echo "Belum Di Konfirmasi";
                  }elseif ($data['status_rekom'] == 1) {
                      # code...
                      echo "Surat Rekomendasi Kolektif";
                  }elseif ($data['status_rekom'] == 2) {
                    # code...
                    echo "Surat Rekomendasi Individu";
                }
                  ?></td>
                </tr>
                <tr>
                  <td>Keterangan</td>
                  <td><?=$data['ket'];?></td>
                </tr>
              <?php } ?>
              </tbody>
            </table>
                    </div>
                </div>
            </div><!-- /.panel-->
        </div><!-- /.col-->
  