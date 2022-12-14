<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];

$query = mysqli_query($koneksi, "DELETE FROM rekap_usul WHERE id_rekap = '$id'");

if ($query) {
    echo '<script>alert("Data Berhasil Dihapus");
    window.location="?page=rekap_usul"; </script>';
}
}
?>


        