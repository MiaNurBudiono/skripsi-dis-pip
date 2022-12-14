<?php

function thousandSparator($number){
	$example = $number;
	$subtotal =  'Rp. '.number_format($number, 2, ',', '.');
	return $subtotal;
}
date_default_timezone_set('Asia/Jakarta');
$jam = date('Y-m-d h:i:s');
include '../config/koneksi.php'; 
$id_user = $_SESSION['id'];
include '../config/header.php';
include '../config/menu_disdik.php';
?>
 <?php
 if (isset($_SESSION['id_user']) && $_SESSION['level'] != 1) {
	 echo "<script>
	 alert('Gagal Login !'); 
	 window.location = '../index.php'; 
	 </script>";
 }
 else{
 // membuat route
 $title = $_GET['page'];
 switch($_GET['page'])
 {
 default:
 include "home.php";
 break;
 case "home";
 include "home.php";
 break;
 

 //Untuk akun
 case "akun";
 include "akun/akun.php";
 break;
 case "ganti_password";
 include "akun/ganti_password.php";
 break;
 case "tambah_akun";
 include "akun/tambah_akun.php";
 break;
 case "data_akun";
 include "akun/data_akun.php";
 break;
 case "hapus_akun";
 include "akun/hapus_akun.php";
 break;

//Untuk data sekolah
case "data_sd";
include "data_sekolah/data_sd.php";
break;

case "tambah_sd";
include "data_sekolah/tambah_sd.php";
break;

case "edit_sd";
include "data_sekolah/edit_sd.php";
break;

case "hapus_sd";
include "data_sekolah/hapus_sd.php";
break;

case "laporan_sd";
include "data_sekolah/laporan_sd.php";
break;

//print
case "print";
include "print/print_rekom_individu.php";
break;

//Untuk laporan pencairan
case "lap_cair";
include "lap_cair/lap_cair_data.php";
break;

case "detail_cair";
include "lap_cair/detail_cair.php";
break;

case "laporan_cair";
include "lap_cair/laporan_cair.php";
break;

case "rekap_cair";
include "lap_cair/rekap_cair.php";
break;

case "tambah_rekap_cair";
include "lap_cair/tambah_rekap_cair.php";
break;
  //Untuk usulan
  case "usulan";
  include "usulan/usulan.php";
  break;
 
  case "detail_usulan";
  include "usulan/detail_usulan.php";
  break;

  case "rekap_usul";
  include "usulan/rekap_usul.php";
  break;

  case "tambah_rekap_usulan";
  include "usulan/tambah_rekap_usulan.php";
  break;

  case "hapus_rekap_usul";
  include "usulan/hapus_rekap_usul.php";
  break;

  case "hapus_rekap_cair";
  include "lap_cair/hapus_rekap_cair.php";
  break;

  case "hapus_rekap_guna";
  include "guna_dana/hapus_rekap_guna.php";
  break;

  case "lap_rekap_guna";
  include "guna_dana/lap_rekap_guna.php";
  break;

  case "laporan_usulan";
  include "usulan/laporan_usulan.php";
  break;

  //Untuk Laporan Penggunaan Dana
  case "edit_guna_dana";
  include "guna_dana/edit_guna_dana.php";
  break;

  case "tambah_guna";
  include "guna_dana/tambah_guna.php";
  break;

  case "hapus_guna_dana";
  include "guna_dana/hapus_guna_dana.php";
  break;

  case "lap_guna_dana";
  include "guna_dana/lap_guna_dana.php";
  break;
  case "rekap_guna_dana";
  include "guna_dana/rekap_guna_dana.php";
  break;


//untuk kendala dan solusi
case "ken_sol";
include "ken_sol/ken_sol_data.php";
break;
case "tambah_kendala";
include "ken_sol/tambah_kendala.php";
break;
case "detail_solusi";
include "ken_sol/detail_solusi.php";
break;
case "edit_ken_sol";
include "ken_sol/edit_ken_sol.php";
break;
case "laporan_ken_sol";
include "ken_sol/laporan_ken_sol.php";
break;
case "hapus_ken_sol";
include "ken_sol/hapus_ken_sol.php";
break;
 }

}
 ?>
 
<!-- Disini untuk footer_template.php -->
<?php
include '../config/foot.php';
?>