<?php

require_once __DIR__ . '/vendor/autoload.php';

require 'functions.php';
$riwayat_pembayaran = mysqli_query($db, "SELECT * FROM riwayat_pembayaran");

$mpdf = new \Mpdf\Mpdf();



$html = '
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style5.css">
    <!-- BS 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>METIK 2023 - Universitas Pancasakti Tegal</title>
</head>

<body>
<!-- Table -->
<div class="table-responsive">
    <table class="table table-hover table-striped bg-light table-bordered table-sm">
        <thead class="table-color">
            <tr>
                <th class="text-center" rowspan="2" style="vertical-align: middle;">Jenis Belanja</th>
                <th class="text-center" rowspan="2" style="vertical-align: middle;">Type</th>
                <th class="text-center" colspan="7">Rincian Biaya</th>
                <th class="text-center" rowspan="2" style="vertical-align: middle;">Jumlah Anggaran</th>
                <th class="text-center" rowspan="4" style="vertical-align: middle;">Update at</th>
                <th class="text-center" rowspan="4" style="vertical-align: middle;">Kwitansi</th>
            </tr>
            <tr>
                <th class="text-center" colspan="2">Volume</th>
                <th class="text-center" colspan="2">Frekuensi</th>
                <th class="text-center">Perhitungan</th>
                <th class="text-center">Sat</th>
                <th class="text-center">Harga Satuan</th>
            </tr>
            <tr>
                <td class="text-center">1</td>
                <td class="text-center">2</td>
                <td class="text-center">3</td>
                <td class="text-center">4</td>
                <td class="text-center">5</td>
                <td class="text-center">6</td>
                <td class="text-center">7<b style="color: red;">*</b></td>
                <td class="text-center">8</td>
                <td class="text-center">9</td>
                <td class="text-center">10<b style="color: red;">**</b></td>
            </tr>
            <tr>
                <td class="text-center"></td>
                <td class="text-center"></td>
                <td class="text-center">Vol</td>
                <td class="text-center">Sat</td>
                <td class="text-center">Vol</td>
                <td class="text-center">Sat</td>
                <td class="text-center"></td>
                <td class="text-center"></td>
                <td class="text-center"></td>
                <td class="text-center"></td>
            </tr>
        </thead>
        
        <tbody class="align-middle">';
        foreach( $riwayat_pembayaran as $row) {
            $html .= '<tr>
                        <td class="text-center">'. $row["jenis_belanja"] .'</td>
                        <td class="text-center">'. $row["type"] .'</td>
                        <td class="text-center">'. $row["volume_vol"] .'</td>
                        <td class="text-center">'. $row["volume_sat"] .'</td>
                        <td class="text-center">'. $row["frekuensi_vol"] .'</td>
                        <td class="text-center">'. $row["frekuensi_sat"] .'</td>
                        <td class="text-center">'. $row["perhitungan"] .'</td>
                        <td class="text-center">'. $row["frekuensi_sat"] .'</td>
                        <td class="text-start">&nbsp; Rp. '. number_format($row["harga_satuan"]) .'</td>
                        <td class="text-start">&nbsp; Rp. '. number_format($row["jml_anggaran"]) .'</td>
                        <td class="text-center">'. $row["date"] .'</td>
                        <td class="text-center"><img src="img/'. $row["gambar"] .'" width="50px"></td>
                    </tr>';
        }

          $html .= '<tr>
                        <td class="text-center" colspan="9"><b>Jumlah Total</b></td>
                        <td class="text-center">Rp. '. $format_jumBiaya .'</td>
                        <td class="text-center"></td>
                        <td class="text-center"></td>
                    </tr>
        </tbody>
    </table>
</div>
<!-- Table End -->

</body>
</html>';


$mpdf->WriteHTML($html);
$mpdf->Output('Anggaran-dan-bukti-pembayaran.pdf', 'I');

?>