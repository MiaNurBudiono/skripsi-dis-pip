
        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                <em class="fa fa-home"></em>
            </a></li>
            <li class="active">Detail Solusi</li>
        </ol>
    </div><!--/.row-->
    
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Detail Solusi</h1>
        </div>
    </div><!--/.row-->
            
            <div class="panel panel-default">
                <div class="panel-heading">Detail Solusi</div>
                <div class="panel-body">
                    <div class="col-md-12">
                    <table class="table table-striped table-bordered zero-configuration">
              <?php  
              $id = $_GET['id'];
              
              $sql = mysqli_query($koneksi, "SELECT * FROM kendala_solusi WHERE id_ken_sol='$id'");

             
              while ($data = mysqli_fetch_array($sql)){


              ?>
               <tr>
                  <td>Tanggal Kendala</td>
                  <td><?=$data['tgl_kendala'];?></td>
                </tr>
                <tr>
                  <td>Kendala/Masalah</td>
                  <td><?=$data['kendala'];?></td>
                </tr>
                <tr>
                  <td>Pihak yang Diharapkan Membantu</td>
                  <td><?=$data['pihak'];?></td>
                </tr>
                <tr>
                  <td>Tanggal Solusi</td>
                  <td><?=$data['tgl_solusi'];?></td>
                </tr>
                <tr>
                  <td>Solusi</td>
                  <td><?=$data['solusi'];?></td>
                </tr>
                <tr>
                  <td>Pihak Penindak Lanjut</td>
                  <td><?=$data['pihak_solusi'];?></td>
                </tr>
               
               
              <?php } ?>
              </tbody>
            </table>
                    </div>
                </div>
            </div><!-- /.panel-->
        </div><!-- /.col-->
  