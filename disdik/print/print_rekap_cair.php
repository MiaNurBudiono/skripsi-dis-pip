<?php
// memanggil library FPDF tabel responsiv mengikuti isi teks
require '../fpdf/mc_table.php';
include '../../config/koneksi.php';
ob_end_clean(); //    the buffer and never prints or returns anything.
ob_start();
$tahun = $_GET['tahun'];
$show = "";


// intance object dan memberikan pengaturan halaman PDF
$pdf=new PDF_MC_Table('L','mm','Legal');
$pdf->SetMargins(10,10,10);
// membuat halaman baru
$pdf->AddPage();
// setting gambar/logo
$pdf->Image('../../assets/logo_bjb.png',50,10,20);
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
$pdf->Line(25,40,320,40);

// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(240,20,'',0,2);
$pdf->SetFont('Times','B',14);
$pdf->Cell(240,7,'REKAPITULASI PENCAIRAN DANA PIP TAHUN '.$tahun,0,2,'C');
$pdf->SetFont('Times','',12);
$pdf->Cell(240,7,'Nomor : 420/         /Disdik',0,2,'C');

// Memberikan space kebawah agar tidak terlalu rapat. Ini buat tabel
$pdf->Cell(20,10,'',0,1);
$pdf->SetFont('Times','',12);
$pdf->SetFont('Times','B',10);
$pdf->Cell(5,20,'',20,0);
$pdf->Cell(7,10, 'N0', 1,0);
$pdf->Cell(50,10,'NPSN',1,0);
$pdf->Cell(70,10,'Nama Sekolah',1,0);
$pdf->Cell(55,10,'Jumlah Siswa Penerima PIP',1,0);
$pdf->Cell(55,10,'Total Dana yang Disalurkan',1,0);
$pdf->Cell(50,10,'Periode',1,1);

$pdf->SetFont('Times','',10);
$query = mysqli_query($koneksi, "SELECT * FROM rekap_cair
INNER JOIN sdn_bjb ON rekap_cair.id_sdn=sdn_bjb.id_sdn
WHERE rekap_cair.tahun = '$tahun'");
$no=0;

//mengatur lebar kolom dalam tabel, berurutan dari awal sampai akhir , 
//isi angka ny sesuaikan dengan jumlah kolom yang di isikan dan ukuran yang di inginkan
$pdf->SetWidths(array(7,50,70,55,55,50));
while($data = mysqli_fetch_array($query)){
    $no++;
    $pdf->Cell(5,10,'',0,0);
	
	// mengambil data barang
$data_layak= mysqli_query($koneksi,"SELECT * FROM s_rekom_layak");

	// menghitung data barang
$jumlah_Layak = mysqli_num_rows($data_layak);

	// mengambil data barang
$dana_layak = mysqli_query($koneksi,"SELECT SUM(dana) AS total FROM s_rekom_layak");

	// menghitung data barang
while($layak = mysqli_fetch_array($dana_layak)){

$pdf->Row(array($no,$data['npsn'],$data['nama_sdn'],$jumlah_Layak, thousandSparator($layak['total']),$data['periode']));
}
}
// $pdf->Ln(0);
// $pdf->Cell(15,10,'',0,0);
// $pdf->Cell(217,10,'Total :',1,0,'C');
// $pdf->Cell(100,10,$no,1,1,'L');

//Tanda Tangan Kadisdik
$pdf->Cell(240,20,'',0,1,'L');
$pdf->Cell(240,10,'',0,0,'L');
$pdf->Cell(30,5,'Banjarbaru, .... ................. 2022',0,2,'C');
$pdf->Cell(30,5,'Kepala Dinas Pendidikan',0,1,'C');
$pdf->Cell(240,20,'',0,1,'L');
$pdf->Cell(240,10,'',0,0,'L');
$pdf->Cell(30,5,'Dedy Sutoyo, S.STP, MM.',0,2,'C');
$pdf->Cell(30,5,'NIP. 19771127 199612 1 001',0,1,'C');
$pdf->Output("rekap_cair.pdf","I");
ob_end_flush();

function thousandSparator($number){
	$example = $number;
	$subtotal =  number_format($number, 2, ',', '.');
	return $subtotal;
}

?>
