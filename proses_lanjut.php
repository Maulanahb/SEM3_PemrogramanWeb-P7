<?php
$buah = $_POST['buah'] ?? '-';
$warna = $_POST['warna'] ?? [];
$jenis_kelamin = $_POST['jenis_kelamin'] ?? '-';

// Pastikan $warna selalu array, walau cuma satu nilai
if (!is_array($warna)) {
    $warna = [$warna];
}

// Gabungkan warna
$warna_favorit = !empty($warna) ? implode(", ", $warna) : "-";

// Tampilkan hasil
echo "
<h3>Hasil Data Form:</h3>
<table border='1' cellpadding='5' cellspacing='0'>
    <tr><td><strong>Buah Pilihan</strong></td><td>$buah</td></tr>
    <tr><td><strong>Warna Favorit</strong></td><td>$warna_favorit</td></tr>
    <tr><td><strong>Jenis Kelamin</strong></td><td>$jenis_kelamin</td></tr>
</table>
";
?>
