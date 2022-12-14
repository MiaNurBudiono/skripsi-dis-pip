<?php

if(isset($_GET['id'])){
    $id = $_GET['id'];

$query = mysqli_query($koneksi, "DELETE FROM guna_dana WHERE id_guna_dana = '$id'");

if ($query) {
    echo '<script>alert("Data Berhasil Dihapus");
    window.location="?page=rekap_guna_dana"; </script>';
}
}
?>


        