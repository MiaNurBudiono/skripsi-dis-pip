<?php

if(isset($_GET['id'])){
    $id = $_GET['id'];

$query = mysqli_query($koneksi, "UPDATE usulan SET status_usulan = 2 WHERE id_usulan = '$id'");
if ($query) {
    echo '<script>alert("Usulan Di Tolak");
    window.location="?page=usulan"; </script>';
}
}
?>


        