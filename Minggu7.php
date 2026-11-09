<?php

// 1. Fungsi menghitung nilai akhir
function hitungNilaiAkhir($tugas, $uts, $uas) {
    return ($tugas * 0.30) +
           ($uts * 0.30) +
           ($uas * 0.40);
}
// 2. Fungsi menentukan grade
function tentukanGrade($nilaiAkhir) {
    if ($nilaiAkhir >= 90) {
        return "A";
    } elseif ($nilaiAkhir >= 80) {
        return "B";
    } elseif ($nilaiAkhir >= 70) {
        return "C";
    } elseif ($nilaiAkhir >= 60) {
        return "D";
    } else {
        return "E";
    }
}
// 3. Fungsi menentukan status kelulusan
function tentukanStatus($nilaiAkhir) {
    if ($nilaiAkhir >= 75) {
        return "Lulus";
    } else {
        return "Tidak Lulus";
    }
}

// 4. Fungsi menampilkan hasil
function tampilkanHasil($nama, $tugas, $uts, $uas) {
    $nilaiAkhir = hitungNilaiAkhir($tugas, $uts, $uas);
    $grade = tentukanGrade($nilaiAkhir);
    $status = tentukanStatus($nilaiAkhir);

    echo "<tr>";
    echo "<td>$nama</td>";
    echo "<td>$tugas</td>";
    echo "<td>$uts</td>";
    echo "<td>$uas</td>";
    echo "<td>" . number_format($nilaiAkhir, 2) . "</td>";
    echo "<td>$grade</td>";
    echo "<td>$status</td>";
    echo "</tr>";
}
// Data mahasiswa (bonus)
$mahasiswa = [
    ["nama" => "Fahmi",  "tugas" => 90, "uts" => 85, "uas" => 80],
    ["nama" => "Nur",  "tugas" => 65, "uts" => 70, "uas" => 68],
    ["nama" => "Faizin",  "tugas" => 80, "uts" => 95, "uas" => 75]
];

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pengolahan Nilai Mahasiswa</title>
</head>
<body>
<h2>Program Pengolahan Nilai Mahasiswa</h2>
<table border="1" cellpadding="8" cellspacing="0">
    <tr>
        <th>Nama</th>
        <th>Tugas</th>
        <th>UTS</th>
        <th>UAS</th>
        <th>Nilai Akhir</th>
        <th>Grade</th>
        <th>Status</th>
    </tr>
    <?php
    foreach ($mahasiswa as $m) {
        tampilkanHasil(
            $m["nama"],
            $m["tugas"],
            $m["uts"],
            $m["uas"] );
    }   ?>
</table>
</body>
</html>