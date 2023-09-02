<?php

require_once __DIR__ . '/vendor/autoload.php';

require 'functions.php';
$riwayat_pembayaran = mysqli_query($db, "SELECT * FROM riwayat_pembayaran");

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
    <link rel="stylesheet" href="css/cetak.css">
    <!-- BS 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>METIK 2023 - Universitas Pancasakti Tegal</title>
</head>

<body>
<!-- Table -->
<div class="table-responsive">
    <table class="table table-sm table-bordered border-primary" border="1" cellpadding="8" cellspacing="0">
        <thead class="table-color">
            <tr>
                <th class="text-center text-light" rowspan="2" style="vertical-align: middle;">Jenis Belanja</th>
                <th class="text-center text-light" rowspan="2" style="vertical-align: middle;">Type</th>
                <th class="text-center text-light" colspan="7">Rincian Biaya</th>
                <th class="text-center text-light" rowspan="2" style="vertical-align: middle;">Jumlah Anggaran</th>
                <th class="text-center text-light" rowspan="4" style="vertical-align: middle;">Update at</th>
                <th class="text-center text-light" rowspan="4" style="vertical-align: middle;">Kwitansi</th>
            </tr>
            <tr>
                <th class="text-center text-light" colspan="2" style="vertical-align: middle;">Volume</th>
                <th class="text-center text-light" colspan="2" style="vertical-align: middle;">Frekuensi</th>
                <th class="text-center text-light" style="vertical-align: middle;">Perhitungan</th>
                <th class="text-center text-light" style="vertical-align: middle;">Sat</th>
                <th class="text-center text-light" style="vertical-align: middle;">Harga Satuan</th>
            </tr>
            <tr>
                <td class="text-center text-light">1</td>
                <td class="text-center text-light">2</td>
                <td class="text-center text-light">3</td>
                <td class="text-center text-light">4</td>
                <td class="text-center text-light">5</td>
                <td class="text-center text-light">6</td>
                <td class="text-center text-light">7<b style="color: red;">*</b></td>
                <td class="text-center text-light">8</td>
                <td class="text-center text-light">9</td>
                <td class="text-center text-light">10<b style="color: red;">**</b></td>
            </tr>
            <tr>
                <td class="text-center text-light"></td>
                <td class="text-center text-light"></td>
                <td class="text-center text-light">Vol</td>
                <td class="text-center text-light">Sat</td>
                <td class="text-center text-light">Vol</td>
                <td class="text-center text-light">Sat</td>
                <td class="text-center text-light"></td>
                <td class="text-center text-light"></td>
                <td class="text-center text-light"></td>
                <td class="text-center text-light"></td>
            </tr>
        </thead>
        
        <tbody class="align-middle">';
        foreach( $riwayat_pembayaran as $row) {
            $html .= '<tr>
                        <td class="text-center" style="vertical-align: middle;">'. $row["jenis_belanja"] .'</td>
                        <td class="text-center" style="vertical-align: middle;">'. $row["type"] .'</td>
                        <td class="text-center" style="vertical-align: middle;">'. $row["volume_vol"] .'</td>
                        <td class="text-center" style="vertical-align: middle;">'. $row["volume_sat"] .'</td>
                        <td class="text-center" style="vertical-align: middle;">'. $row["frekuensi_vol"] .'</td>
                        <td class="text-center" style="vertical-align: middle;">'. $row["frekuensi_sat"] .'</td>
                        <td class="text-center" style="vertical-align: middle;">'. $row["perhitungan"] .'</td>
                        <td class="text-center" style="vertical-align: middle;">'. $row["frekuensi_sat"] .'</td>
                        <td class="text-start" style="vertical-align: middle;">&nbsp; Rp. '. formatUangIndonesia($row["harga_satuan"]) .'</td>
                        <td class="text-start" style="vertical-align: middle;">&nbsp; Rp. '. formatUangIndonesia($row["jml_anggaran"]) .'</td>
                        <td class="text-center" style="vertical-align: middle;">'. $row["date"] .'</td>
                        <td class="text-center"><img src="img/'. $row["gambar"] .'" width="50px"></td>
                    </tr>';
        }

          $html .= '<tr>
                        <td class="text-center" colspan="9" style="vertical-align: middle;"><b>Jumlah Total</b></td>
                        <td class="text-center" style="vertical-align: middle;">Rp. '. $format_jumBiaya .'</td>
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