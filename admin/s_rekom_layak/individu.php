<?php

if(isset($_GET['id'])){
    $id = $_GET['id'];

$query = mysqli_query($koneksi, "UPDATE s_rekom_layak SET status_rekom = 2 WHERE id_rekom_layak = '$id'");
if ($query) {
    echo '<script>alert("Surat Rekomendasi Individu");
    window.location="?page=s_rekom_layak"; </script>';
}
}
?>


        