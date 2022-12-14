<?php
 include 'header.php';
 include '../db/koneksi.php';
?>
 <?php
 error_reporting(0);
 // membuat route
 switch($_GET['page'])
 {
 default:
 include "dashboard.php";
 break;

 case "login";
 include "login.php";
 break;

 }
 ?>
 
<!-- Disini untuk footer_template.php -->
<?php include 'footer.php'; ?>