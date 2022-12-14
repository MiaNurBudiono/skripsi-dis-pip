<?php

if(isset($_GET['id'])){
    $id = $_GET['id'];

$query = mysqli_query($koneksi, "DELETE FROM kendala_solusi WHERE id_ken_sol = '$id'");

if ($query) {
    echo '<script>alert("Data Berhasil Dihapus");
    window.location="?page=ken_sol"; </script>';
}
}
?>


        