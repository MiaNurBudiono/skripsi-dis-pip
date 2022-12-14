<?php

if(isset($_GET['id'])){
    $id = $_GET['id'];

$query = mysqli_query($koneksi, "UPDATE s_rekom_layak SET status_rekom = 1 WHERE id_rekom_layak = '$id'");
if ($query) {
    echo '<script>alert("Surat Rekomendasi Kolektif");
    window.location="?page=s_rekom_layak"; </script>';
}
}
?>


        