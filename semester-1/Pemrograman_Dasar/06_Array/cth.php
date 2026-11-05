<?php

$mahasiswa = [ [
"nama" => "Andi", "nim" => "E41260001",
"tugas" => 80,
"uts" => 75,
"uas" => 85
], [
"nama" => "Budi", "nim" => "E41260002",
"tugas" => 85,
"uts" => 80,
"uas" => 90
], [
"nama" => "Citra", "nim" => "E41260003",
"tugas" => 90,
"uts" => 85,
"uas" => 88
], [
"nama" => "Dina", "nim" => "E41260004",
"tugas" => 75,
"uts" => 80,
"uas" => 78
], [
"nama" => "Eko",
"nim" => "E41260005",
"tugas" => 88,
"uts" => 90,
"uas" => 92
]
];

?>

<!DOCTYPE html>
<html>
<head>
<title>Daftar Nilai Mahasiswa</title>
</head>
<body>

<h2>Daftar Nilai Mahasiswa</h2>

<table border="1" cellpadding="8" cellspacing="0">
<tr>
<th>No</th>
<th>Nama</th>
<th>NIM</th>
<th>Nilai Tugas</th>
<th>Nilai UTS</th>
<th>Nilai UAS</th>
<th>Nilai Akhir</th>
</tr>

<?php

$no = 1;
$nilai_tertinggi = 0;
$mahasiswa_tertinggi = "";

foreach ($mahasiswa as $mhs) {

$nilai_akhir =
($mhs["tugas"] * 0.30) +
($mhs["uts"] * 0.30) +
($mhs["uas"] * 0.40);

if ($nilai_akhir > $nilai_tertinggi) {
$nilai_tertinggi = $nilai_akhir;
$mahasiswa_tertinggi = $mhs["nama"];
}

?>

<tr>
<td><?php echo $no; ?></td>
<td><?php echo $mhs["nama"]; ?></td>
<td><?php echo $mhs["nim"]; ?></td>
<td><?php echo $mhs["tugas"]; ?></td>
<td><?php echo $mhs["uts"]; ?></td>
<td><?php echo $mhs["uas"]; ?></td>
<td><?php echo $nilai_akhir; ?></td>
</tr>

<?php
$no++;
}
?>

</table>

<p>
Jumlah Mahasiswa:
<?php echo count($mahasiswa); ?>
</p>

<h3>Mahasiswa dengan Nilai Akhir Tertinggi</h3>

<p>
Nama: <b><?php echo $mahasiswa_tertinggi; ?></b><br> Nilai Akhir: <b><?php echo $nilai_tertinggi; ?></b>
</p>

</body>
</html>
