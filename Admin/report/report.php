<?php
//menyertakan file fpdf, file fpdf.php di dalam folder FPDF yang diekstrak
include "fpdf.php";

$pdf = new FPDF('p','mm','A4');

$pdf->AddPage();
// menyetel font yang digunakan, font yang digunakan adalah arial, bold dengan ukuran 16
$pdf->SetFont('Arial','B',16);

// judul
$pdf->Cell(190,7,'PORTAL BERITA UNIVERSITAS KATOLIK SANTO THOMAS',0,1,'C');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(190,7,'DAFTAR MAHASISWA',0,1,'C');
 
// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,30,'',0,1);
 
$pdf->SetFont('Arial','B',10);
$pdf->Cell(20,6,'NO',1,0,'C');
$pdf->Cell(100,6,'NAMA MAHASISWA',1,0,'C');
$pdf->Cell(60,6,'NPM ',1,0,'C');


include '../koneksi.php';
$no = 1;
$pdf->SetFont('Arial','',10);
$tampil = mysqli_query($con, "select * from user2");
while ($hasil = mysqli_fetch_array($tampil)){
$pdf->Cell(10,6,'',0,1);
$pdf->Cell(20,6,$no++,1,0,'C');
$pdf->Cell(100,6,$hasil['Nama_mhs'],1,0,'C');
$pdf->Cell(60,6,$hasil['npm'],1,0,'C');
}
 
$pdf->Output();
