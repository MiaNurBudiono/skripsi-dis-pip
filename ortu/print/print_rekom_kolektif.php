<?php
// memanggil library FPDF tabel responsiv mengikuti isi teks
require '../fpdf/mc_table.php';
include '../../config/koneksi.php';
$status = $_GET['status'];
$tahun = $_GET['tahun'];
$show = "";
if ($status == 1) {
    # code...
    $show = "Kolektif";
}elseif ($status == 2) {
    # code...
    $show = "";
}

// intance object dan memberikan pengaturan halaman PDF
$pdf=new PDF_MC_Table('L','mm','Legal');
$pdf->SetMargins(5,1,5);
// membuat halaman baru
$pdf->AddPage();
// setting gambar/logo
$pdf->Image('../../assets/sd.png',290,8,30);
$pdf->Image('../../assets/logo_bjb.png',50,8,25);
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
//setting garis,urutan ke 2 dan 4 jarak dari atas
$pdf->Line(25,40,320,40);

// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(240,7,'',0,2);
$pdf->SetFont('Times','B',14);
$pdf->Cell(240,7,'SURAT REKOMENDASI',0,2,'C');
$pdf->SetFont('Times','',12);
$pdf->Cell(240,5,'Nomor : 421.2/    /SDN-1Gt.Payung/2022',0,2,'C');

//Bagian Yang Bertanda tangan di bawah ini
$pdf->Cell(200,5,'',0,2);
$pdf->SetFont('Times','',12);
$pdf->Cell(240,7,'Yang bertanda tangan di bawah ini :',0,2,'L');
$pdf->Cell(240,7,'Nama              : Hj. Sri Suhartinah K.N, S.Pd.M.M.',0,2,'L');
$pdf->Cell(240,7,'NIP                 : 19680929 198911 2 003',0,2,'L');
$pdf->Cell(240,7,'Pangkat/Gol   : Pembina I Tk.IV/b',0,2,'L');
$pdf->Cell(240,7,'Jabatan           : Kepala Sekolah',0,2,'L');
$pdf->Cell(240,7,'Unit Kerja      : SDN 1 Guntung Payung',0,2,'L');
$pdf->Cell(100,5,'',0,2);
$pdf->Cell(240,1,'Memberikan rekomendasi kepada nama murid tersebut di bawah ini untuk mengambil Beasiswa pada Bank BRI :',0,2,'L');

// Memberikan space kebawah agar tidak terlalu rapat. Ini buat tabel
$pdf->Cell(10,5,'',0,1);
$pdf->SetFont('Times','',12);
$pdf->SetFont('Times','B',10);
$pdf->Cell(15,10,'',0,0);
$pdf->Cell(7,6, 'NO', 1,0);
$pdf->Cell(45,6,'Nama Siswa',1,0);
$pdf->Cell(25,6,'NISN',1,0);
$pdf->Cell(12,6,'NIS',1,0);
$pdf->Cell(15,6,'Kelas',1,0);
$pdf->Cell(25,6,'Jenis Kelamin',1,0);
$pdf->Cell(30,6,'Tanggal Lahir',1,0);
$pdf->Cell(35,6,'Nama Ayah',1,0);
$pdf->Cell(35,6,'Nama Ibu',1,0);
$pdf->Cell(45,6,'Virtual Account',1,0);
$pdf->Cell(30,6,'Nomor Rekening',1,0);
$pdf->Cell(25,6,'Keterangan',1,1);

$pdf->SetFont('Times','',10);
$query = mysqli_query($koneksi, "SELECT s_rekom_layak.*, layak_pip.*, data_siswa.* FROM s_rekom_layak 
INNER JOIN layak_pip ON s_rekom_layak.id_layak_pip = layak_pip.id_layak_pip
INNER JOIN data_siswa ON layak_pip.id_siswa = data_siswa.id_siswa
WHERE s_rekom_layak.status_rekom = '$status' AND s_rekom_layak.tahun = '$tahun'");
$no=0;

//mengatur lebar kolom dalam tabel, berurutan dari awal sampai akhir , 
//isi angka ny sesuaikan dengan jumlah kolom yang di isikan dan ukuran yang di inginkan
$pdf->SetWidths(array(7,45,25,12,15,25,30,35,35,45,30,25));
while($data = mysqli_fetch_array($query)){
    $no++;
    $pdf->Cell(15,10,'',0,0);
$pdf->Row(array($no,$data['nama'],$data['nisn'],$data['nis'],$data['kelas'],$data['jk'],$data['tanggal_lahir'],
                $data['nama_ayah'],$data['nama_ibu'],$data['vir_akun'],$data['no_rek'],$data['ket']));
}

// $pdf->Ln(0);
// $pdf->Cell(15,10,'',0,0);
// $pdf->Cell(217,10,'Total :',1,0,'C');
// $pdf->Cell(100,10,$no,1,1,'L');

//Tanda Tangan Kepsek

$pdf->Cell(240,5,'',0,1,'L');
$pdf->Cell(240,5,'',0,0,'L');
$pdf->Cell(30,5,'Banjarbaru, .... ........ 2022',0,2,'C');
$pdf->Cell(30,5,'Kepala Sekolah',0,1,'C');
$pdf->Cell(240,9,'',0,1,'L');
$pdf->Cell(240,9,'',0,0,'L');
$pdf->Cell(30,5,'Hj. Sri Suhartinah K.N, S.Pd.M.M.',0,2,'C');
$pdf->Cell(30,5,'NIP. 19680929 198911 2 003',0,1,'C');

$pdf->Output("rekom_pip_kolektif.pdf","I");

function thousandSparator($number){
	$example = $number;
	$subtotal =  number_format($number, 2, ',', '.');
	return $subtotal;
}

?>
