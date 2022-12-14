
        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                <em class="fa fa-home"></em>
            </a></li>
            <li class="active">Detail Data Siswa</li>
        </ol>
    </div><!--/.row-->
    
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Detail Data Siswa</h1>
        </div>
    </div><!--/.row-->
            
            <div class="panel panel-default">
                <div class="panel-heading">Detail Data Siswa</div>
                <div class="panel-body">
                    <div class="col-md-12">
                    <table class="table table-striped table-bordered zero-configuration">
              <?php  
              $id = $_GET['id'];
              
              $sql = mysqli_query($koneksi, "SELECT * FROM data_siswa WHERE id_siswa='$id'");

             
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
                  <td>Jenis Kelamin</td>
                  <td><?=$data['jk'];?></td>
                </tr>
                <tr>
                  <td>Tempat Lahir</td>
                  <td><?=$data['tempat_lahir'];?></td>
                </tr>
                <tr>
                  <td>Tanggal Lahir</td>
                  <td><?=tgl_indo($data['tanggal_lahir']);?></td>
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
                  <td>Nomor HP</td>
                  <td><?=$data['no_hp'];?></td>
                </tr>
                
               
              <?php } ?>
              </tbody>
            </table>
                    </div>
                </div>
            </div><!-- /.panel-->
        </div><!-- /.col-->
  