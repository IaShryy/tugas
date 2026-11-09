<?php
$mahasiswa = [
    [
        "nama" => "salsa",
        "nim" => "E41260015",
        "tugas" => 85,
        "uts" => 80,
        "uas" => 88 ],
    [
        "nama" => "Revo",
        "nim" => "E41260018",
        "tugas" => 90,
        "uts" => 75,
        "uas" => 82],
    [
        "nama" => "Putri",
        "nim" => "E41260029",
        "tugas" => 78,
        "uts" => 85,
        "uas" => 90],
    [
        "nama" => "Anggi",
        "nim" => "E41260011",
        "tugas" => 88,
        "uts" => 92,
        "uas" => 85 ],
    [
        "nama" => "Hikmawan",
        "nim" => "E41260013",
        "tugas" => 95,
        "uts" => 88,
        "uas" => 91 ]
];

$jumlah_mahasiswa = count($mahasiswa);
?>

<!DOCTYPE html>
<html lang="id">
<head>
 <meta charset="UTF-8">
 <title>Data Nilai Mahasiswa</title>
 <style>
 table {
 width: 100%;
 border-collapse: collapse;
 margin-top: 10px; }
 th, td {
            border: 1px solid #cecbcb;
            padding: 8px 12px;
            text-align: center;
        }
        th {
            background-color: #efefef;
        }
    </style>
</head>
<body>
  <h2>Data Nilai Mahasiswa</h2>

 <p><strong>Total Mahasiswa:</strong> <?= $jumlah_mahasiswa; ?></p>
  <table>
    <thead>
      <tr>
 <th>No</th>
 <th>NIM</th>
 <th>Nama</th>
 <th>Nilai Tugas (30%)</th>
 <th>Nilai UTS (30%)</th>
 <th>Nilai UAS (40%)</th>
 <th>Nilai Akhir</th>
    </tr>
        </thead>
        <tbody>
            <?php 
            $no = 1;
            
            foreach ($mahasiswa as $mhs): 
                $nilai_akhir = ($mhs['tugas'] * 0.3) + ($mhs['uts'] * 0.3) + ($mhs['uas'] * 0.4);
                 ?>
                <tr>
                <td><?= $no++; ?></td>
                 <td><?= $mhs['nim']; ?></td>
                <td style="text-align: left;"><?= $mhs['nama']; ?></td>
                 <td><?= $mhs['tugas']; ?></td>
                    <td><?= $mhs['uts']; ?></td>
                    <td><?= $mhs['uas']; ?></td>
                    <td><strong><?= number_format($nilai_akhir, 2); ?></strong></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>
</html>