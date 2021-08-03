<?php
// memanggil library FPDF
require('WriteHTML.php');
include 'connection.php';
//connect database
// $connect = mysqli_connect('localhost','root','');
// mysqli_select_db($connect,'kerja_praktek');
//get kerja_praktek data



$id_grup = $_GET['id_grup'];

$query1 = mysqli_query($connect, "SELECT * FROM kelompok_mahasiswa INNER JOIN perusahaan ON kelompok_mahasiswa.id_perusahaan = perusahaan.id_perusahaan INNER JOIN surat ON kelompok_mahasiswa.id_surat = surat.id_surat WHERE id_kelompok = '$id_grup'");
$data = mysqli_fetch_array($query1);




// $id_perusahaan = $data['id_perusahaan'];

// $query2 = mysqli_query($connect, "SELECT * FROM perusahaan WHERE id_perusahaan = '$id_perusahaan'");
// $data = mysqli_fetch_array($query2);

$query3 = mysqli_query($connect, "SELECT * FROM mahasiswa WHERE id_kelompok= '$id_grup'");



// intance object dan memberikan pengaturan halaman PDF
$pdf = new PDF_HTML('P', 'mm', 'A4');
// membuat halaman baru
$pdf->SetMargins(15, 5, 15);
$marginleft = 15;
$pdf->AddPage();
//Memanggil Header Surat
$pdf->Image('image/header_surat.png', 0, 0);
//Membuat Identitas Surat
$pdf->SetFont('Times', '', 10);
//Spacing
$pdf->Cell(10, 7, '', 0, 1);
$pdf->Cell(10, 7, '', 0, 1);
$pdf->Cell(10, 7, '', 0, 1);
$pdf->Cell(10, 7, '', 0, 1);
$pdf->Cell(10, 7, '', 0, 1);

//Identitas Surat
// $data['tanggal_pengajuan'];

$temp_tanggal_approve = $data['tanggal_disetujui'];
$tanggal_approve = explode('-', $temp_tanggal_approve);
$bulan_approve = $tanggal_approve[1];
$tahun_approve = $tanggal_approve[0];
$bulan_romawi = ['I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII', 'IX', 'X', 'XI', 'XII'];


switch ($bulan_approve) {
	case "01":
		$bulan_approve = $bulan_romawi[0];
		break;
	case "02":
		$bulan_approve = $bulan_romawi[1];
		break;
	case "03":
		$bulan_approve = $bulan_romawi[2];
		break;
	case "04":
		$bulan_approve = $bulan_romawi[3];
		break;
	case "05":
		$bulan_approve = $bulan_romawi[4];
		break;
	case "06":
		$bulan_approve = $bulan_romawi[5];
		break;
	case "07":
		$bulan_approve = $bulan_romawi[6];
		break;
	case "08":
		$bulan_approve = $bulan_romawi[7];
		break;
	case "09":
		$bulan_approve = $bulan_romawi[8];
		break;
	case "10":
		$bulan_approve = $bulan_romawi[9];
		break;
	case "11":
		$bulan_approve = $bulan_romawi[10];
		break;
	case "12":
		$bulan_approve = $bulan_romawi[11];
		break;
}




$nim_ketua = $data['ketua_kelompok'];
$result = mysqli_fetch_row(mysqli_query($connect, "SELECT * FROM surat WHERE id_surat=$nim_ketua"));
$no_surat = $result[1];


$kopsurat = ' ' . $no_surat . '/KP/KaProdi-FTIK-IFS1/UNIKOM/' . $bulan_approve . '/' . $tahun_approve;
$pdf->SetXY($marginleft, 44);
$pdf->Cell(190, 7, 'No.', 0, 0);
$pdf->SetXY(40, 44);
$pdf->Cell(190, 7, ':' . $kopsurat, 0, 0);
$pdf->SetXY($marginleft, 49);
$pdf->Cell(190, 7, 'Lampiran', 0, 0);
$pdf->SetXY(40, 49);
$pdf->Cell(190, 7, ': -', 0, 0);
$pdf->SetXY($marginleft, 54);
$pdf->Cell(190, 7, 'Perihal	', 0, 0);
$pdf->SetXY(40, 54);
$pdf->Cell(190, 7, ': Permohonan Kerja Praktek', 0, 0);

//Identitas Perusahaan
$pdf->SetXY($marginleft, 65);
$pdf->SetFont('Times', 'B', 10);
$pdf->Cell(190, 7, 'Kepada Yth.', 0, 0);
$pdf->SetXY($marginleft, 70);
$pdf->Cell(190, 7, $data['nama_perusahaan'], 0, 0);
$pdf->SetXY($marginleft, 75);
$pdf->Cell(190, 7, $data['alamat_perusahaan'], 0, 0);

//isi Surat
$pdf->SetFont('Times', '', 10);
$pdf->SetXY($marginleft, 85);
$pdf->Cell(190, 7, 'Dengan Hormat,', 0, 0);
$pdf->SetXY($marginleft, 90);
$pdf->WriteHTML('<br><pre>Sehubungan dengan adanya Matakuliah Kerja Praktek Lapangan, maka kami Program Studi Teknik Informatika UNIKOM bermaksud
mengajukan permohonan kepada Perusahaan / Instansi yang Bapak / Ibu
pimpin untuk dapat kiranya menerima Mahasiswa /I dibawah ini :</pre>');

//Tabel Mahasiswa
$pdf->SetXY($marginleft, 125);
$pdf->SetFont('Times', 'B', 10);
$pdf->Cell(20, 6, 'NO', 1, 0);
$pdf->Cell(40, 6, 'NIM', 1, 0);
$pdf->Cell(67, 6, 'NAMA MAHASISWA', 1, 0);
$pdf->Cell(50, 6, 'PROGRAM STUDI', 1, 1);
$pdf->SetFont('Times', '', 10);
$i = 1;
while ($row = mysqli_fetch_array($query3)) {
	$pdf->Cell(20, 6, $i, 1, 0);
	$pdf->Cell(40, 6, $row['nim_mahasiswa'], 1, 0);
	$pdf->Cell(67, 6, $row['nama_mahasiswa'], 1, 0);
	$pdf->Cell(50, 6, "Teknik Informatika", 1, 1);
	$i++;
}
// $pdf->Cell(20,6,'NO',1,0);
// $pdf->Cell(40,6,$mahasiswa['mahasiswa_nim'],1,0);
// $pdf->Cell(80,6,$mahasiswa['mahasiswa_nama'],1,0);
// $pdf->Cell(50,6,$mahasiswa['mahasiswa_prodi'],1,1);
// $pdf->Cell(20,6,'NO',1,0);
// $pdf->Cell(40,6,$mahasiswa['mahasiswa_nim'],1,0);
// $pdf->Cell(80,6,$mahasiswa['mahasiswa_nama'],1,0);
// $pdf->Cell(50,6,$mahasiswa['mahasiswa_prodi'],1,1);
// $pdf->Cell(20,6,'NO',1,0);
// $pdf->Cell(40,6,$mahasiswa['mahasiswa_nim'],1,0);
// $pdf->Cell(80,6,$mahasiswa['mahasiswa_nama'],1,0);
// $pdf->Cell(50,6,$mahasiswa['mahasiswa_prodi'],1,1);

//penutup surat
$pdf->SetFont('Times', '', 10);
$pdf->SetXY($marginleft, 155);
$pdf->WriteHTML('Untuk melaksanakan Kerja Praktek Lapangan');
$pdf->WriteHTML('<br><br><pre>           Pelaksanaan Kerja Praktek Lapangan Mahasiswa/I Program Studi Teknik Informatika 
UNIKOM disesuaikan dengan jadwal yang ditentukan oleh Perusahaan/Instansi yang Bapak/Ibu pimpin.</pre>');
$pdf->WriteHTML('<br><br>Demikian permohonan kami, atas bantuan dan perhatian Bapak/Ibu kami ucapkan terimakasih.');

//TTD
$pdf->SetFont('Times', '', 10);
$pdf->SetXY(120, 200);
$pdf->WriteHTML(' Bandung, 04 Agustus 2020');
$pdf->SetXY(122, 205);
$pdf->WriteHTML('Hormat Kami,');
$pdf->SetFont('Times', 'B', 10);
$pdf->SetXY(122, 210);
$pdf->WriteHTML('Ketua Program Studi Teknik Informatika');
$pdf->SetXY(122, 215);
$pdf->WriteHTML('Universitas Komputer Indonesia');
$pdf->SetXY(122, 245);
$pdf->WriteHTML('<b><u>Nelly Indriani W, S.Si., M.T.</u></b>');
$pdf->SetXY(122, 250);
$pdf->WriteHTML('<b>NIP. 4127 70 06 122</b>');
$pdf->Image('image/logo.png', 110, 215, 30, 30);
$pdf->Image('image/ttd.png', 120, 215, 30, 30);

//tembusan
$pdf->SetXY($marginleft, 255);
$pdf->Cell(190, 7, 'Tembusan :', 0, 0);
$pdf->SetXY($marginleft, 260);
$pdf->Cell(190, 7, '1. Arsip', 0, 0);
$pdf->SetXY($marginleft, 265);
$pdf->Cell(190, 7, '2.', 0, 0);




$pdf->Output();
