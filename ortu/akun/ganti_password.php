<?php


if (isset($_POST['submit'])) {
    # code...

   $password = md5($_POST['password']);
    $query = mysqli_query($koneksi, "UPDATE user SET password = '$password' WHERE id_user = '$id_user'");
    if ($query) {
        # code...
        echo "<script> alert('Berhasil Menyimpan Data');
           window.location = '?page=akun';
           </script>";
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
            <h1 class="page-header">Ganti Password</h1>
        </div>
    </div><!--/.row-->
            
            <div class="panel panel-default">
                <div class="panel-heading">Ganti Password</div>
                <div class="panel-body">
            

                    <div class="col-md-6">
                    <form role="form" method ="POST" action="" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>password</label>
                              
                                <input class="form-control" name="password" required >
                            </div>
                          
                        
                                <button type="submit" class="btn btn-primary" name="submit">Edit</button>
                                <button type="reset" class="btn btn-default">Reset</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div><!-- /.panel-->
        </div><!-- /.col-->
  