<?php


if (isset($_POST['submit'])) {
    # code...
    if (isset($_FILES['foto'])) {
        # code... 
$target_dir = "../assets/akun";
$target_file = $target_dir . basename($_FILES["foto"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
foreach($_POST as $key => $val){
    ${$key} = $val;
} 
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
    echo "<script> alert('Sorry, only JPG, JPEG, PNG  files are allowed.'); </script>";
  }else {
    if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["foto"]["name"])). " has been uploaded.";
        $query = mysqli_query($koneksi, "UPDATE user SET nama = '$username', foto = '$target_file' WHERE id_user = '$id_user'");
       if ($query) {
           echo "<script> alert('Berhasil Menyimpan Data');
           window.location = '?page=akun';
           </script>";
        }

      } else {
        echo "Sorry, there was an error uploading your file.";
      }

  }

}else{
    foreach($_POST as $key => $val){
        ${$key} = $val;
    } 
    $query = mysqli_query($koneksi, "UPDATE user SET nama = '$username' WHERE id_user = '$id_user'");
    if ($query) {
        # code...
        echo "<script> alert('Berhasil Menyimpan Data');
           window.location = '?page=akun';
           </script>";
    }

}

}
?>
        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                <em class="fa fa-home"></em>
            </a></li>
            <li class="active">Forms</li>
        </ol>
    </div><!--/.row-->
    
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Akun</h1>
        </div>
    </div><!--/.row-->
            
            <div class="panel panel-default">
                <div class="panel-heading">Data User</div>
                
                <div class="panel-body">
                    <div class="col-md-6">
                    <table class="table table-striped table-bordered zero-configuration"> 
                    
              <?php  
             
              $sql = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user='$id_user'");
              $data = mysqli_fetch_array($sql);


              ?>
                <tr>
                  <td>Nama</td>
                  <td><?=$data['nama'];?></td>
                </tr>         
                <tr>
                  <td>Password</td>
                  <td><a href="?page=ganti_password" class="btn btn-sm btn-primary">Ganti Password</a></td>
                </tr>
                <tr>
                  <td> Foto </td>
                  <td><a href="<?= $data['foto'] ?>" target="_blank"> <img src="<?= $data['foto']?>" width="100"></a> </td>
                </tr>
             
             
              </tbody>
            </table>
                    </div>

                    <div class="col-md-6">
                    <form role="form" method ="POST" action="" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Username</label>
                                <input class="form-control" value="<?= $data['nama'] ?>" name="nama" required >
                            </div>
                            
                            <div class="form-group">
                                <label>Foto</label>
                                <input type="file" name="foto">
                                <p class="help-block"></p>
                            </div>
                          
                        
                                <button type="submit" class="btn btn-primary" name="submit">Edit</button>
                                <button type="reset" class="btn btn-default">Reset</button>
                             
                            </div>
                        </form>
                    </div>

                </div>
            </div><!-- /.panel-->
        </div><!-- /.col-->
  