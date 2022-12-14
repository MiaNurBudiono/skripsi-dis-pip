<?php

if(isset($_GET['id'])){
    $id = $_GET['id'];

$query = mysqli_query($koneksi, "DELETE FROM petugas WHERE id_petugas = '$id'");

if ($query) {
    echo '<script>alert("Data Berhasil Dihapus");
    window.location="?page=petugas"; </script>';
}
}
?>


        