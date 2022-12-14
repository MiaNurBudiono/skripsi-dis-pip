<?php

if(isset($_GET['id'])){
    $id = $_GET['id'];

$query = mysqli_query($koneksi, "UPDATE lap_cair SET status_cair = 1 WHERE id_lap_cair = '$id'");
if ($query) {
    echo '<script>alert("Sudah Cair");
    window.location="?page=lap_cair"; </script>';
}
}
?>


        