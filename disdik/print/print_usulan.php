<?php
// memanggil library FPDF tabel responsiv mengikuti isi teks
require '../fpdf/mc_table.php';
include '../../config/koneksi.php';
$status = $_GET['status'];
$show = "";
if ($status == 1) {
    # code...
    $show = "DI TERIMA";
}elseif ($status == 2) {
    # code...
    $show = "DI TOLAK";
}
// intance object dan memberikan pengaturan halaman PDF
$pdf=new PDF_MC_Table('L','mm','Legal');
$pdf->SetMargins(10,10,10);
// membuat halaman baru
$pdf->AddPage();
// setting gambar/logo
$pdf->Image('../../assets/sd.png',260,10,30);
$pdf->Image('../../assets/logo_bjb.png',50,10,25);
// setting jenis font yang akan digunakan
$pdf->SetFont('Times','B',14);
// mencetak string
$pdf->Cell(45,10,'',0,0,'L');
$pdf->Cell(240,6,'PEMERINTAH KOTA BANJARBARU',0,2,'C');
$pdf->Cell(240,6,'DINAS PENDIDIKAN',0,2,'C');
$pdf->SetFont('Times','B',12);
$pdf->Cell(240,6,'SDN 1 GUNTUNG PAYUNG',0,2,'C');
$pdf->SetFont('Times','',12);
$pdf->Cell(240,6,'Terakreditasi "A" Berdasarkan Sertifikat BAN-S/D',0,2,'C');
$pdf->Cell(240,6,'NIS: 10112008, NPSN: 30304645, NSS: 101151002010',0,2,'C');
$pdf->SetFont('Times','',10);
$pdf->Cell(240,6,'Alamat : JL. Bina Putra No.01 RT.11/RW.03 Kel. Guntung Payung, Kec. Landasan Ulin',0,2,'C');

$pdf->Line(25,50,320,50);

// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(240,7,'',0,2);
$pdf->SetFont('Times','B',14);
$pdf->Cell(240,7,'LAPORAN SISWA USULAN PIP '.$show,0,2,'C');


// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,10,'',0,1);
$pdf->SetFont('Times','',12);
$pdf->SetFont('Times','B',10);
$pdf->Cell(15,10,'',0,0);
$pdf->Cell(7,6, 'NO', 1,0);
$pdf->Cell(20,6,'NISN',1,0);
$pdf->Cell(15,6,'NIS',1,0);
$pdf->Cell(30,6,'Nama Siswa',1,0);
$pdf->Cell(15,6,'JK',1,0);
$pdf->Cell(30,6,'Nama Ayah',1,0);
$pdf->Cell(30,6,'Nama Ibu',1,0);
$pdf->Cell(30,6,'Pekerjaan Ayah',1,0);
$pdf->Cell(30,6,'Pekerjaan Ibu',1,0);
$pdf->Cell(35,6,'Penghasilan Ayah',1,0);
$pdf->Cell(35,6,'Penghasilan Ibu',1,0);
$pdf->Cell(20,6,'Jalur',1,1);

$pdf->SetFont('Times','',10);
$query = mysqli_query($koneksi, "SELECT * FROM usulan 
    INNER JOIN data_siswa ON usulan.id_siswa = data_siswa.id_siswa
    WHERE usulan.status_usulan = '$status'");
$no=0;

//mengatur lebar kolom dalam tabel, berurutan dari awal sampai akhir , 
//isi angka ny sesuaikan dengan jumlah kolom yang di isikan dan ukuran yang di inginkan
$pdf->SetWidths(array(7,20,15,30,15,30,30,30,30,35,35,20));
while($data = mysqli_fetch_array($query)){
    $no++;
    $pdf->Cell(15,10,'',0,0);
$pdf->Row(array($no,$data['nisn'],$data['nis'],$data['nama'],$data['jk'],$data['nama_ayah'],$data['nama_ibu'],
                $data['pekerjaan_ayah'], $data['pekerjaan_ibu'], thousandSparator($data['penghasilan_ayah']),
                thousandSparator($data['penghasilan_ibu']),$data['jalur']));
}

// $pdf->Ln(0);
// $pdf->Cell(15,10,'',0,0);
// $pdf->Cell(217,10,'Total :',1,0,'C');
// $pdf->Cell(100,10,$no,1,1,'L');

$pdf->Cell(240,20,'',0,1,'L');
$pdf->Cell(240,10,'',0,0,'L');
$pdf->Cell(30,5,'Mengetahui',0,2,'C');
$pdf->Cell(30,5,'Kepala Sekolah',0,1,'C');
$pdf->Cell(240,20,'',0,1,'L');
$pdf->Cell(240,10,'',0,0,'L');
$pdf->Cell(30,5,'Hj. Sri Suhartinah K.N, S.Pd.M.M.',0,2,'C');
$pdf->Cell(30,5,'NIP. 19680929 198911 2 003',0,1,'C');
$pdf->Output("usul_pip.pdf","I");

function thousandSparator($number){
	$example = $number;
	$subtotal =  number_format($number, 2, ',', '.');
	return $subtotal;
}

?>
