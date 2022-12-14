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
include '../config/menu_admin.php';
?>
 <?php
 if (isset($_SESSION['level']) && $_SESSION['level'] != 0) {
	 echo "<script>
	 alert('Silakan Login Ulang !'); 
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
 case "akun_siswa";
 include "akun/akun_siswa.php";
 break;
 case "tambah_akun";
 include "akun/tambah_akun.php";
 break;

 case "ganti_password";
 include "akun/ganti_password.php";
 break;

 //Untuk data petugas

case "tambah_petugas";
include "petugas/tambah_petugas.php";
break;

case "edit_petugas";
include "petugas/edit_petugas.php";
break;

case "hapus_petugas";
include "petugas/hapus_petugas.php";
break;

case "laporan_petugas";
include "petugas/laporan_petugas.php";
break;


//Untuk buku
case "data_buku";
include "data_buku/data_buku.php";
break;

case "tambah_buku";
include "data_buku/tambah_buku.php";
break;

case "hapus_buku";
include "data_buku/hapus_buku.php";
break;

case "edit_buku";
include "data_buku/edit_buku.php";
break;

case "print_data_buku";
include "data_buku/print_data_buku.php";
break;

//Untuk data siswa 
case "data_siswa";
include "data_siswa/data_siswa.php";
break;

case "tambah_siswa";
include "data_siswa/tambah_siswa.php";
break;

case "detail_siswa";
include "data_siswa/detail_siswa.php";
break;

case "edit_siswa";
include "data_siswa/edit_siswa.php";
break;

case "hapus_siswa";
include "data_siswa/hapus_siswa.php";
break;

case "laporan_siswa";
include "data_siswa/laporan_siswa.php";
break;

 //Untuk data siswa layak pip
case "layak_pip";
include "layak_pip/layak_pip.php";
break;

case "tambah_layak_pip";
include "layak_pip/tambah_layak_pip.php";
break;

case "detail_layak_pip";
include "layak_pip/detail_layak_pip.php";
break;

case "edit_layak_pip";
include "layak_pip/edit_layak_pip.php";
break;

case "hapus_layak_pip";
include "layak_pip/hapus_layak_pip.php";
break;

case "laporan_layak_pip";
include "layak_pip/laporan_layak_pip.php";
break;

//Untuk surat rekomendasi
case "s_rekom_layak";
include "s_rekom_layak/rekom.php";
break;

case "tambah_rekom";
include "s_rekom_layak/tambah_rekom.php";
break;

case "hapus_rekom";
include "s_rekom_layak/hapus_rekom.php";
break;

case "detail_rekom";
include "s_rekom_layak/detail_rekom.php";
break;

case "edit_rekom";
include "s_rekom_layak/edit_rekom.php";
break;

case "kolektif_rekom";
include "s_rekom_layak/kolektif.php";
break;

case "individu_rekom";
include "s_rekom_layak/individu.php";
break;

case "laporan_rekom";
include "s_rekom_layak/laporan_rekom.php";
break;

//Untuk surat rekomendasi
case "s_rekom_usulan";
include "s_rekom_usulan/rekom.php";
break;

case "tambah_rekom";
include "s_rekom_usulan/tambah_rekom.php";
break;

case "hapus_rekom";
include "s_rekom_usulan/hapus_rekom.php";
break;

case "detail_rekom";
include "s_rekom_usulan/detail_rekom.php";
break;

case "edit_rekom";
include "s_rekom_usulan/edit_rekom.php";
break;

case "kolektif_rekom";
include "s_rekom_usulan/kolektif.php";
break;

case "individu_rekom";
include "s_rekom_usulan/individu.php";
break;

case "laporan_rekom";
include "s_rekom_usulan/laporan_rekom.php";
break;

//print
case "print";
include "print/print_rekom_individu.php";
break;

//Untuk laporan pencairan
case "lap_cair";
include "lap_cair/lap_cair_data.php";
break;

case "tambah_cair";
include "lap_cair/tambah_cair.php";
break;

case "hapus_cair";
include "lap_cair/hapus_cair.php";
break;

case "detail_cair";
include "lap_cair/detail_cair.php";
break;

case "edit_data_cair";
include "lap_cair/edit_data_cair.php";
break;

case "sudah";
include "lap_cair/sudah.php";
break;

case "belum";
include "lap_cair/belum.php";
break;

case "laporan_cair";
include "lap_cair/laporan_cair.php";
break;

  //Untuk usulan
  case "usulan";
  include "usulan/usulan.php";
  break;
 
  case "tambah_usulan";
  include "usulan/tambah_usulan.php";
  break;

  case "edit_usulan";
  include "usulan/edit_usulan.php";
  break;

  case "hapus_usulan";
  include "usulan/hapus_usulan.php";
  break;

  case "detail_usulan";
  include "usulan/detail_usulan.php";
  break;

  case "terima_usulan";
  include "usulan/terima.php";
  break;

  case "tolak_usulan";
  include "usulan/tolak.php";
  break;

  case "laporan_usulan";
  include "usulan/laporan_usulan.php";
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

//untuk laporan penggunaan dana
case "guna_dana_data";
include "guna_dana/guna_dana_data.php";
break;
case "tambah_guna";
include "guna_dana/tambah_guna.php";
break;
case "edit_guna_dana";
include "guna_dana/edit_guna_dana.php";
break;
case "lap_guna_dana";
include "guna_dana/lap_guna_dana.php";
break;
case "hapus_guna_dana";
include "guna_dana/hapus_guna_dana.php";
break;

 }

}
 ?>
 
<!-- Disini untuk footer_template.php -->
<?php
include '../config/foot.php';
?>