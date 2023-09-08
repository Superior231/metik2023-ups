<?php
require_once __DIR__ . '/vendor/autoload.php';

require 'functions.php';
$anggaran = mysqli_query($db, "SELECT * FROM anggaran ORDER BY type ASC");

// Membuat objek Spreadsheet
$spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Style header
$headerStyle = [
    'font' => [
        'bold' => true,
    ],
    'alignment' => [
        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
    ],
    'fill' => [
        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
        'startColor' => [
            'rgb' => 'CCCCCC',
        ],
    ],
];

$sheet->getStyle('A1:F1')->applyFromArray($headerStyle);

// Header kolom
$sheet->setCellValue('A1', 'Nama Barang');
$sheet->setCellValue('B1', 'Type');
$sheet->setCellValue('C1', 'Satuan');
$sheet->setCellValue('D1', 'Jumlah');
$sheet->setCellValue('E1', 'Harga');
$sheet->setCellValue('F1', 'Date');

$row = 2; // Mulai dari baris kedua setelah header
$totalBiaya = 0;

foreach ($anggaran as $row_data) {
    $sheet->setCellValue('A' . $row, $row_data["nama_barang"]);
    $sheet->setCellValue('B' . $row, $row_data["type"]);
    $sheet->setCellValue('C' . $row, 'Rp. ' . ($row_data["satuan"]));
    $sheet->setCellValue('D' . $row, $row_data["jumlah"]);
    $sheet->setCellValue('E' . $row, 'Rp. ' . ($row_data["harga"]));
    $sheet->setCellValue('F' . $row, $row_data["date"]);

    // Menghitung total biaya
    $totalBiaya += $row_data["harga"];
    
    $row++;
}

// Jumlah total biaya
$sheet->setCellValue('A' . $row, 'Jumlah');
$sheet->setCellValue('B' . $row, '');
$sheet->setCellValue('C' . $row, '');
$sheet->setCellValue('D' . $row, '');
$sheet->setCellValue('E' . $row, 'Rp. ' . ($totalBiaya));
$sheet->setCellValue('F' . $row, '');

// Merapikan tabel dengan mengatur lebar kolom
$sheet->getColumnDimension('A')->setWidth(20);
$sheet->getColumnDimension('B')->setWidth(15);
$sheet->getColumnDimension('C')->setWidth(15);
$sheet->getColumnDimension('D')->setWidth(15);
$sheet->getColumnDimension('E')->setWidth(20);
$sheet->getColumnDimension('F')->setWidth(20);

// Menyiapkan header untuk mengunduh file Excel
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Anggaran-dan-bukti-pembayaran.xlsx"');
header('Cache-Control: max-age=0');

// Mengekspor spreadsheet ke format Excel
$writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
$writer->save('php://output');
