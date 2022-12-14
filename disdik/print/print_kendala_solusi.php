<?php
// memanggil library FPDF tabel responsiv mengikuti isi teks
require '../fpdf/mc_table.php';
include '../../config/koneksi.php';
$show = "";

// intance object dan memberikan pengaturan halaman PDF
$pdf=new PDF_MC_Table('L','mm','Legal');
$pdf->SetMargins(10,10,10);
// membuat halaman baru
$pdf->AddPage();
// setting gambar/logo
$pdf->Image('../../assets/sd.png',290,10,30);
$pdf->Image('../../assets/logo_bjb.png',50,10,25);
//setting jenis font yang akan digunakan
$pdf->SetFont('Times','B',14);
// mencetak string KOP Surat
$pdf->Cell(45,20,'',0,0,'L');
$pdf->Cell(240,6,'PEMERINTAH KOTA BANJARBARU',0,2,'C');
$pdf->SetFont('Times','B',12);
$pdf->Cell(240,6,'DINAS PENDIDIKAN',0,2,'C');
$pdf->SetFont('Times','',10);
$pdf->Cell(240,6,'Alamat : JL. Pendidikan Nasional No.01 R.O Ulin-Kel. Loktabat Selatan-Kec. Banjarbaru Selatan',0,2,'C');
$pdf->Cell(240,6,'Kota Banjarbaru-Kalimantan Selatan. Telp.(0511)4772570 Kode Pos 70713',0,2,'C');
//setting garis
$pdf->Line(25,50,320,50);

// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(240,7,'',0,2);
$pdf->SetFont('Times','B',14);
$pdf->Cell(240,7,'LAPORAN KENDALA DAN SOLUSI TERKAIT PIP '.$show,0,2,'C');


// Memberikan space kebawah agar tidak terlalu rapat. Ini buat tabel
$pdf->Cell(10,10,'',0,1);
$pdf->SetFont('Times','',12);
$pdf->SetFont('Times','B',10);
$pdf->Cell(15,10,'',0,0);
$pdf->Cell(7,6, 'NO', 1,0);
$pdf->Cell(30,6,'Tanggal Kendala',1,0);
$pdf->Cell(120,6,'Kendala',1,0);
$pdf->Cell(30,6,'Tanggal Solusi',1,0);
$pdf->Cell(120,6,'Solusi',1,1);


$pdf->SetFont('Times','',10);
$query = mysqli_query($koneksi, "SELECT * FROM kendala_solusi");
$no=0;

//mengatur lebar kolom dalam tabel, berurutan dari awal sampai akhir , 
//isi angka ny sesuaikan dengan jumlah kolom yang di isikan dan ukuran yang di inginkan
$pdf->SetWidths(array(7,30,120,30,120));
while($data = mysqli_fetch_array($query)){
    $no++;
    $pdf->Cell(15,10,'',0,0);
$pdf->Row(array($no,tgl_indo($data['tgl_kendala']),$data['kendala'],tgl_indo($data['tgl_solusi']),$data['solusi'],));
}

// $pdf->Ln(0);
// $pdf->Cell(15,10,'',0,0);
// $pdf->Cell(217,10,'Total :',1,0,'C');
// $pdf->Cell(100,10,$no,1,1,'L');

//Tanda Tangan Kepsek
$pdf->Cell(240,20,'',0,1,'L');
$pdf->Cell(240,10,'',0,0,'L');
$pdf->Cell(30,5,'Banjarbaru, .... ................. 2022',0,2,'C');
$pdf->Cell(30,5,'Kepala Dinas Pendidikan',0,1,'C');
$pdf->Cell(240,20,'',0,1,'L');
$pdf->Cell(240,10,'',0,0,'L');
$pdf->Cell(30,5,'Dedy Sutoyo, S.STP, MM.',0,2,'C');
$pdf->Cell(30,5,'NIP. 19771127 199612 1 001',0,1,'C');
$pdf->Output("ken_sol.pdf","I");

function thousandSparator($number){
	$example = $number;
	$subtotal =  number_format($number, 2, ',', '.');
	return $subtotal;
}

?>
