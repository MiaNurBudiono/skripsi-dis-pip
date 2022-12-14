
        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                <em class="fa fa-home"></em>
            </a></li>
            <li class="active">Data Siswa Layak PIP</li>
        </ol>
    </div><!--/.row-->
    
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Detail Siswa Layak PIP</h1>
        </div>
    </div><!--/.row-->
            
            <div class="panel panel-default">
                <div class="panel-heading">Detail Siswa Layak PIP</div>
                <div class="panel-body">
                    <div class="col-md-12">
                    <table class="table table-striped table-bordered zero-configuration">
              <?php  
              $id = $_GET['id'];
              
              $sql = mysqli_query($koneksi, "SELECT * FROM layak_pip INNER JOIN data_siswa ON layak_pip.id_siswa = data_siswa.id_siswa WHERE layak_pip.id_layak_pip='$id'");

             
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
                  <td>Nomor KIP</td>
                  <td><?=$data['no_kip'];?></td>
                </tr>
                <tr>
                  <td>Nama Ayah</td>
                  <td><?=$data['nama_ayah'];?></td>
                </tr>
                <tr>
                  <td>Nama Ibu</td>
                  <td><?=$data['nama_ibu'];?></td>
                </tr>
                
              <?php } ?>
              </tbody>
            </table>
                    </div>
                </div>
            </div><!-- /.panel-->
        </div><!-- /.col-->
  