
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
            <h1 class="page-header">Detail Usul PIP</h1>
        </div>
    </div><!--/.row-->
            
            <div class="panel panel-default">
                <div class="panel-heading">Detail Usulan Penerima PIP</div>
                <div class="panel-body">
                    <div class="col-md-12">
                    <table class="table table-striped table-bordered zero-configuration">
              <?php  
              $id = $_GET['id'];
              
              $sql = mysqli_query($koneksi, "SELECT usulan.*, data_siswa.* FROM usulan 
              INNER JOIN data_siswa ON usulan.id_siswa = data_siswa.id_siswa WHERE usulan.id_usulan = '$id'");

             
              while ($data = mysqli_fetch_array($sql)){


              ?>
               <tr>
                  <td>NISN</td>
                  <td><?=$data['nisn'];?></td>
                </tr>
                <tr>
                  <td>NIS</td>
                  <td><?=$data['nis'];?></td>
                </tr>
                <tr>
                  <td>Nama</td>
                  <td><?=$data['nama'];?></td>
                </tr>
                <tr>
                  <td>Tempat Lahir</td>
                  <td><?=$data['tempat_lahir'];?></td>
                </tr>
                <tr>
                  <td>Tanggal Lahir</td>
                  <td><?=$data['tanggal_lahir'];?></td>
                </tr>
                <tr>
                  <td>Jenis Kelamin</td>
                  <td><?=$data['jk'];?></td>
                </tr>
                <tr>
                  <td>Kelas</td>
                  <td><?=$data['kelas'];?></td>
                </tr>
                <tr>
                  <td>Nama Ayah</td>
                  <td><?=$data['nama_ayah'];?></td>
                </tr>
                <tr>
                  <td>Nama Ibu</td>
                  <td><?=$data['nama_ibu'];?></td>
                </tr>
                <tr>
                  <td>Pekerjaan Ayah</td>
                  <td><?=$data['pekerjaan_ayah'];?></td>
                </tr>
                <tr>
                  <td>Pekerjaan Ibu</td>
                  <td><?=$data['pekerjaan_ibu'];?></td>
                </tr>
                <tr>
                  <td>Penghasilan Ayah</td>
                  <td><?=$data['penghasilan_ayah'];?></td>
                </tr>
                <tr>
                  <td>Penghasilan Ibu</td>
                  <td><?=$data['penghasilan_ibu'];?></td>
                </tr>
                <tr>
                  <td>Jalur</td>
                  <td><?=$data['jalur'];?></td>
                </tr>
                <tr>
                  <td>Status</td>
                  <td><?php
                  if ($data['status_usulan'] == 0) {
                      # code...
                      echo "Belum Di Konfirmasi";
                  }elseif ($data['status_usulan'] == 1) {
                      # code...
                      echo "usulan Di Terima";
                  }elseif ($data['status_usulan'] == 2) {
                    # code...
                    echo "usulan Di Tolak";
                }
                  ?></td>
                </tr>
                <tr>
                  <td> Syarat</td>
                  <td><a href="<?= $data['upload_syarat'] ?>"> <img src="<?= $data['upload_syarat']?>" width="100"></a> </td>
                </tr>
              <?php } ?>
              </tbody>
            </table>
                    </div>
                </div>
            </div><!-- /.panel-->
        </div><!-- /.col-->
  