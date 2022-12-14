<?php
// memanggil library FPDF tabel responsiv mengikuti isi teks
require '../fpdf/mc_table.php';
include '../../config/koneksi.php';
$status = $_GET['status'];
$tahun = $_GET['tahun'];
$show = "";
if ($status == 1) {
    # code...
    $show = "SUDAH CAIR";
}elseif ($status == 2) {
    # code...
    $show = "BELUM CAIR";
}

// intance object dan memberikan pengaturan halaman PDF
$pdf=new PDF_MC_Table('L','mm','Legal');
$pdf->SetMargins(4,10,4);
// membuat halaman baru
$pdf->AddPage();
// setting gambar/logo
$pdf->Image('../../assets/sd.png',290,10,30);
$pdf->Image('../../assets/logo_bjb.png',50,10,25);
//setting jenis font yang akan digunakan
$pdf->SetFont('Times','B',14);
// mencetak string KOP Surat
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
//setting garis
$pdf->Line(25,50,320,50);

// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(240,7,'',0,2);
$pdf->SetFont('Times','B',14);
$pdf->Cell(240,7,'LAPORAN PENCAIRAN DANA PIP TAHUN '.$tahun,0,2,'C');
$pdf->SetFont('Times','',12);
$pdf->Cell(240,7,'Nomor : 421.2/    /SDN-1Gt.Payung/2022',0,2,'C');

// Memberikan space kebawah agar tidak terlalu rapat. Ini buat tabel
$pdf->Cell(10,10,'',0,1);
$pdf->SetFont('Times','',12);
$pdf->SetFont('Times','B',10);
$pdf->Cell(5,10,'',0,0);
$pdf->Cell(7,6, 'NO', 1,0);
$pdf->Cell(45,6,'Nama Siswa',1,0);
$pdf->Cell(20,6,'NISN',1,0);
$pdf->Cell(20,6,'No KIP',1,0);
$pdf->Cell(13,6,'Tahap',1,0);
$pdf->Cell(13,6,'Kelas',1,0);
$pdf->Cell(20,6,'JK',1,0);
$pdf->Cell(25,6,'Tanggal Lahir',1,0);
$pdf->Cell(30,6,'Nama Ayah',1,0);
$pdf->Cell(30,6,'Nama Ibu',1,0);
$pdf->Cell(20,6,'Dana',1,0);
$pdf->Cell(45,6,'Virtual Account',1,0);
$pdf->Cell(30,6,'Nomor Rekening',1,0);
$pdf->Cell(20,6,'Keterangan',1,1);

$pdf->SetFont('Times','',10);
$query = mysqli_query($koneksi, "SELECT *,layak_pip.no_kip FROM lap_cair
INNER JOIN layak_pip on lap_cair.id_siswa = layak_pip.id_siswa
INNER JOIN s_rekom_layak on layak_pip.id_layak_pip = s_rekom_layak.id_layak_pip
INNER JOIN user on lap_cair.id_user = user.id_user
INNER JOIN data_siswa on user.id_siswa = data_siswa.id_siswa
WHERE lap_cair.status_cair = '$status' AND s_rekom_layak.tahun = '$tahun'");
$no=0;

//mengatur lebar kolom dalam tabel, berurutan dari awal sampai akhir , 
//isi angka ny sesuaikan dengan jumlah kolom yang di isikan dan ukuran yang di inginkan
$pdf->SetWidths(array(7,45,20,20,13,13,20,25,30,30,20,45,30,20));
while($data = mysqli_fetch_array($query)){
    $no++;
    $pdf->Cell(5,10,'',0,0);
$pdf->Row(array($no,$data['nama'],$data['nisn'],$data['no_kip'],$data['tahap'],$data['kelas'],$data['jk'],
                tgl_indo($data['tanggal_lahir']),$data['nama_ayah'],$data['nama_ibu'],thousandSparator($data['dana']),$data['vir_akun'],
                $data['no_rek'],tgl_indo($data['tanggal_cair'])));
}

// $pdf->Ln(0);
// $pdf->Cell(15,10,'',0,0);
// $pdf->Cell(217,10,'Total :',1,0,'C');
// $pdf->Cell(100,10,$no,1,1,'L');

//Tanda Tangan Kepsek
$pdf->Cell(240,20,'',0,1,'L');
$pdf->Cell(240,10,'',0,0,'L');
$pdf->Cell(30,5,'Banjarbaru, .... ........ 2022',0,2,'C');
$pdf->Cell(30,5,'Kepala Sekolah',0,1,'C');
$pdf->Cell(240,20,'',0,1,'L');
$pdf->Cell(240,10,'',0,0,'L');
$pdf->Cell(30,5,'Rumiasih, M.Pd,',0,2,'C');
$pdf->Cell(30,5,'NIP. 19660616 199303 2 005',0,1,'C');
$pdf->Output("lap_cair.pdf","I");

function thousandSparator($number){
	$example = $number;
	$subtotal =  number_format($number, 2, ',', '.');
	return $subtotal;
}

?>
