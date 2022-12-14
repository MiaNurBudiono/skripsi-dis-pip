<?php
// memanggil library FPDF tabel responsiv mengikuti isi teks
require '../fpdf/mc_table.php';
include '../../config/koneksi.php';

//$show = $_GET[''];

// intance object dan memberikan pengaturan halaman PDF
$pdf=new PDF_MC_Table('L','mm','Legal');
$pdf->SetMargins(2,10,2);
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
$pdf->Cell(240,7,'DATA BUKU ',0,2,'C');


// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(5,10,'',0,1);
$pdf->SetFont('Times','',12);
$pdf->SetFont('Times','B',10);
$pdf->Cell(15,10,'',0,0);
$pdf->Cell(7,6, 'NO', 1,0);
$pdf->Cell(100,6,'JUDUL BUKU',1,0);
$pdf->Cell(100,6,'PENGARANG',1,0);
$pdf->Cell(50,6,'PENERBIT',1,0);
$pdf->Cell(50,6,'TAHUN TERBIT',1,1);


$pdf->SetFont('Times','',10);
$query = mysqli_query($koneksi, "SELECT * FROM buku");
$no=0;

//mengatur lebar kolom dalam tabel, berurutan dari awal sampai akhir , 
//isi angka ny sesuaikan dengan jumlah kolom yang di isikan dan ukuran yang di inginkan
$pdf->SetWidths(array(7,100,100,50,50));
while($data = mysqli_fetch_array($query)){
    $no++;
    $pdf->Cell(15,10,'',0,0);
$pdf->Row(array($no,$data['judul_buku'],$data['pengarang'],$data['penerbit'],$data['tahun_terbit']));
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
$pdf->Cell(30,5,'Rumiasih, M.Pd,',0,2,'C');
$pdf->Cell(30,5,'NIP. 19660616 199303 2 005',0,1,'C');
$pdf->Output("data_siswa.pdf","I");

function thousandSparator($number){
	$example = $number;
	$subtotal =  number_format($number, 2, ',', '.');
	return $subtotal;
}

?>
