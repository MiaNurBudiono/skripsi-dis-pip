<?php

if(isset($_GET['id'])){
    $id = $_GET['id'];

$query = mysqli_query($koneksi, "DELETE FROM user WHERE id_user = '$id'");

if ($query) {
    echo '<script>alert("Data Berhasil Dihapus");
    window.location="?page=akun_siswa"; </script>';
}
}
?>


        