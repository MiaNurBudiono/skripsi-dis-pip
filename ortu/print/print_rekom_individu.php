<?php
// memanggil library FPDF tabel responsiv mengikuti isi teks
require '../fpdf/mc_table.php';
include '../../config/koneksi.php';
// $status = $_GET['status'];
// $show = "";
// if ($status == 1) {
//     # code...
//     $show = "Kolektif";
// }elseif ($status == 2) {
//     # code...
//     $show = "";
// }
$id = $_GET['id'];
function bulan($number){
    
    $bulan = substr($number,5,2);
    if ($bulan == "01") {
        # code...
        $bulan = "Januari";
    }elseif ($bulan == "02") {
    # code...
    $bulan = "Febuari";
}elseif ($bulan == "02") {
    # code...
    $bulan = "Febuari";
}elseif ($bulan == "03") {
    # code...
    $bulan = "Maret";
}elseif ($bulan == "04") {
    # code...
    $bulan = "April";
}elseif ($bulan == "05") {
    # code...
    $bulan = "Mei";
}elseif ($bulan == "06") {
    # code...
    $bulan = "Juni";
}elseif ($bulan == "07") {
    # code...
    $bulan = "Juli";
}elseif ($bulan == "08") {
    # code...
    $bulan = "Agustus";
}elseif ($bulan == "09") {
    # code...
    $bulan = "September";
}elseif ($bulan == "10") {
    # code...
    $bulan = "Oktober";
}elseif ($bulan == "11") {
    # code...
    $bulan = "November";
}elseif ($bulan == "12") {
    # code...
    $bulan = "Desember";
}

return $bulan;

}
$tanggal2 = date('Y-m-d');
    $tgl = substr($tanggal2,8,2);
    $thn = substr($tanggal2,0,4);
    $day = date('D', strtotime($tanggal2));
    $dayList = array(
        'Sun' => 'Minggu',
        'Mon' => 'Senin',
        'Tue' => 'Selasa',
        'Wed' => 'Rabu',
        'Thu' => 'Kamis',
        'Fri' => 'Jumat',
        'Sat' => 'Sabtu'
    );
// intance object dan memberikan pengaturan halaman PDF
$pdf=new PDF_MC_Table('P','mm','Legal');
$pdf->SetMargins(10,10,10);
// membuat halaman baru
$pdf->AddPage();
// setting gambar/logo
$pdf->Image('../../assets/sd.png',175,10,30);
$pdf->Image('../../assets/logo_bjb.png',25,10,25);
//setting jenis font yang akan digunakan
$pdf->SetFont('Times','B',14);
// mencetak string KOP Surat
$pdf->Cell(45,10,'',0,0,'L');
$pdf->Cell(120,6,'PEMERINTAH KOTA BANJARBARU',0,2,'C');
$pdf->Cell(120,6,'DINAS PENDIDIKAN',0,2,'C');
$pdf->SetFont('Times','B',12);
$pdf->Cell(120,6,'SDN 1 GUNTUNG PAYUNG',0,2,'C');
$pdf->SetFont('Times','',12);
$pdf->Cell(120,6,'Terakreditasi "A" Berdasarkan Sertifikat BAN-S/D',0,2,'C');
$pdf->Cell(120,6,'NIS: 10112008, NPSN: 30304645, NSS: 101151002010',0,2,'C');
$pdf->SetFont('Times','',10);
$pdf->Cell(120,6,'Alamat : JL. Bina Putra No.01 RT.11/RW.03 Kel. Guntung Payung, Kec. Landasan Ulin',0,2,'C');
//setting garis
$pdf->Line(25,50,200,50);

// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(240,7,'',0,2);
$pdf->SetFont('Times','B',14);
$pdf->Cell(120,7,'SURAT REKOMENDASI',0,2,'C');
$pdf->SetFont('Times','',12);
$pdf->Cell(120,7,'Nomor : 421.2/    /SDN-1Gt.Payung/2022',0,2,'C');

//Bagian Yang Bertanda tangan di bawah ini
$pdf->Cell(15,7,'',0,1);
$pdf->SetFont('Times','',12);
$pdf->Cell(15,7,'',0,0);
$pdf->Cell(120,7,'Yang bertanda tangan di bawah ini :',0,2,'L');
$pdf->Cell(120,7,'Nama              : Hj. Sri Suhartinah K.N, S.Pd.M.M.',0,2,'L');
$pdf->Cell(120,7,'NIP                 : 19680929 198911 2 003',0,2,'L');
$pdf->Cell(120,7,'Pangkat/Gol   : Pembina I Tk.IV/b',0,2,'L');
$pdf->Cell(120,7,'Jabatan           : Kepala Sekolah',0,2,'L');
$pdf->Cell(120,7,'Unit Kerja      : SDN 1 Guntung Payung',0,2,'L');
$pdf->Cell(100,7,'',0,2);
$pdf->SetWidths(array(180));

$pdf->SetFont('Times','',12);
$pdf->Cell(120,7,'Memberikan rekomendasi kepada nama murid tersebut di bawah ini untuk mengambil Beasiswa',0,2,'L');
$pdf->Cell(120,7,'pada Bank BRI :',0,2,'L');
// $pdf->Row(array(""));

$query = mysqli_query($koneksi, "SELECT s_rekom_layak.*, layak_pip.*, data_siswa.* FROM s_rekom_layak 
INNER JOIN layak_pip ON s_rekom_layak.id_layak_pip = layak_pip.id_layak_pip
INNER JOIN data_siswa ON layak_pip.id_siswa = data_siswa.id_siswa
WHERE s_rekom_layak.id_rekom_layak = '$id'");
$data = mysqli_fetch_array($query);
// Memberikan space kebawah agar tidak terlalu rapat. Ini buat tabel
$pdf->Cell(10,10,'',0,1);
$pdf->SetFont('Times','',12);
$pdf->Cell(15,10,'',0,0);
$pdf->Cell(30,6,'Nama Siswa',0,0);
$pdf->Cell(30,6,' : '.$data['nama'],0,1);
$pdf->Cell(15,10,'',0,0);
$tgl_lahir = substr($data['tanggal_lahir'],8,2);
$bulan_lahir = bulan($data['tanggal_lahir']);
$thn_lahir = substr($tanggal2,0,4);
$pdf->Cell(30,6,'Tanggal Lahir',0,0);
$pdf->Cell(30,6,' : '.$tgl_lahir.' '.$bulan_lahir.' '.$thn_lahir,0,1);
$pdf->Cell(15,10,'',0,0);
$pdf->Cell(30,6,'NISN',0,0);
$pdf->Cell(30,6,' : '.$data['nisn'],0,1);
$pdf->Cell(15,10,'',0,0);
$pdf->Cell(30,6,'Kelas',0,0);
$pdf->Cell(30,6,' : '.$data['kelas'],0,1);
$pdf->Cell(15,10,'',0,0);
$pdf->Cell(30,6,'Nomor Rekening',0,0);
$pdf->Cell(30,6,' : '.$data['no_rek'],0,1);
$pdf->Cell(15,10,'',0,0);
$pdf->Cell(30,6,'Virtual Account',0,0);
$pdf->Cell(30,6,' : '.$data['vir_akun'],0,1);
$pdf->Cell(15,10,'',0,0);
$pdf->Cell(30,6,'Nama Ayah',0,0);
$pdf->Cell(30,6,' : '.$data['nama_ayah'],0,1);
$pdf->Cell(15,10,'',0,0);
$pdf->Cell(30,6,'Nama Ibu',0,0);
$pdf->Cell(30,6,' : '.$data['nama_ibu'],0,1);



$no=0;

//mengatur lebar kolom dalam tabel, berurutan dari awal sampai akhir , 
//isi angka ny sesuaikan dengan jumlah kolom yang di isikan dan ukuran yang di inginkan
// $pdf->SetWidths(array(180));
// $pdf->row(array("Demikian rekomendasi ini dibuat untuk dibuat sebagaimana mestinya."));


$pdf->Cell(15,50,'',0,0,'L');//15 tu jarak dr kiri
$pdf->SetFont('Times','',12);
$pdf->Cell(100,30,'Demikian rekomendasi ini dibuat untuk dibuat sebagaimana mestinya.',0,2,'L');//30 jarak antara kalimat atas


// $pdf->Ln(0);
// $pdf->Cell(15,10,'',0,0);
// $pdf->Cell(217,10,'Total :',1,0,'C');
// $pdf->Cell(100,10,$no,1,1,'L');

//Tanda Tangan Kepsek
$pdf->Cell(120,20,'',0,1,'L');
$pdf->Cell(120,10,'',0,0,'L');
$pdf->Cell(30,5,'Banjarbaru, '.$dayList[$day].' '.$tgl.' '.bulan($tanggal2).' '.$thn,0,2,'C');
$pdf->Cell(30,5,'Kepala Sekolah',0,1,'C');
$pdf->Cell(120,20,'',0,1,'L');
$pdf->Cell(120,10,'',0,0,'L');
$pdf->Cell(30,5,'Hj. Sri Suhartinah K.N, S.Pd.M.M.',0,2,'C');
$pdf->Cell(30,5,'NIP. 19680929 198911 2 003',0,1,'C');
$pdf->Output("rekom_pip_individu.pdf","I");



?>
