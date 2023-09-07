<?php

require_once __DIR__ . '/vendor/autoload.php';

require 'functions.php';
$anggaran = mysqli_query($db, "SELECT * FROM anggaran ORDER BY type ASC");

$mpdf = new \Mpdf\Mpdf();

function formatUangIndonesia($angka) {
    return number_format($angka, 0, ',', '.');
}

$html = '
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/cetak1.css">
    <!-- BS 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>METIK 2023 - Universitas Pancasakti Tegal</title>
</head>

<body>
<!-- Table -->
<div class="table-responsive">
    <table class="table table-hover table-light table-striped table-bordered table-sm" border="1" cellpadding="8" cellspacing="0">
        <thead class="table-info">
            <tr>
                <th class="text-center text-light">Nama Barang</th>
                <th class="text-center text-light">Type</th>
                <th class="text-center text-light">Satuan</th>
                <th class="text-center text-light">Jumlah</th>
                <th class="text-center text-light">Harga<span style="color: red;">*</span></th>
                <th class="text-center text-light">Date</th>
            </tr>
        </thead>
        
        <tbody>';
        foreach( $anggaran as $row) {
            $html .= '<tr>
                        <td>'. $row["nama_barang"] .'</td>
                        <td>'. $row["type"] .'</td>
                        <td class="text-end">Rp. '. formatUangIndonesia($row["satuan"]) .'</td>
                        <td class="text-end">'. $row["jumlah"] .'</td>
                        <td class="text-end">&nbsp; Rp. '. formatUangIndonesia($row["harga"]) .'</td>
                        <td class="text-center">'. $row["date"] .'</td>
                    </tr>';
        }

$html .='</tbody>
            <tfoot>
                <tr>
                    <th colspan="4" class="text-center">Jumlah</th>
                    <th colspan="1" class="text-end">Rp. '. $format_jumBiaya .'</th>
                    <th></th>
                </tr>
            </tfoot>
    </table>
</div>
<!-- Table End -->

<!-- Information -->
    <div class="informations mt-5">
        <div class="container-information">
        <h4 class="text-dark mb-3">Keterangan</h4>
            <table>
                <tbody class="align-top">
                    <tr class="ket">
                        <td class="ket"><span class="text-dark align-top"><b style="color: red;">*</b></span></td>
                        <td class="ket">&nbsp;</td>
                        <td class="ket"><span class="text-dark">adalah tanda untuk menentukan hasil kali dari Satuan dengan Jumlah.</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
<!-- Information End -->

</body>
</html>';


$mpdf->WriteHTML($html);
$mpdf->Output('Anggaran-dan-bukti-pembayaran.pdf', 'I');

?>