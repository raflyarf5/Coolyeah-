<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>

<?php
$data_mahasiswa = [
  ["Nama" => "Rafly", "NIM" => "E1105", "nilai_tugas" => 80, "nilai_uts" => 78, "nilai_uas" => 80],
  ["Nama" => "Arif", "NIM" => "E1106", "nilai_tugas" => 88, "nilai_uts" => 78, "nilai_uas" =>86],
  ["Nama" => "Anto", "NIM" => "E1107", "nilai_tugas" => 85, "nilai_uts" => 77, "nilai_uas" => 77],
  ["Nama" => "Ahmad", "NIM" => "E1108", "nilai_tugas" => 83, "nilai_uts" => 88, "nilai_uas" => 79],
  ["Nama" => "Azril", "NIM" => "E1109", "nilai_tugas" => 80, "nilai_uts" => 78, "nilai_uas" => 86],
  ["Nama" => "Anton", "NIM" => "E1110", "nilai_tugas" => 77, "nilai_uts" => 80,"nilai_uas" => 85] 
];
$jumlah_mahasiswa = count($data_mahasiswa);
echo "Total Mahasiswa" . $jumlah_mahasiswa;
?>
<table>
  <thead>
    <tr>
      <th>No</th>
      <th>Nama</th>
      <th>NIM</th>
      <th>Nilai Tugas</th>
      <th>Nilai UTS</th>
      <th>Nilai UAS</th>
      <th>Nilai Akhir</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $no = 1;
    foreach ($data_mahasiswa as $mhs ) {
      $nilai_akhir = ($mhs ["nilai_tugas"] * 0.3) + ($mhs ["nilai_uts"] * 0.3) + ($mhs ["nilai_uas"] * 0.4);
      echo "<tr>";
      echo "<td>" . $no++ . "</td>";
      echo "<td>" . $mhs["Nama"] . "</td>";
      echo "<td>" . $mhs["NIM"] . "</td>";
      echo "<td>" . $mhs["nilai_tugas"] . "</td>";
      echo "<td>" . $mhs["nilai_uts"] . "</td>";
      echo "<td>" . $mhs["nilai_uas"] . "</td>";
      echo "<td>" . $nilai_akhir . "</td>";
      echo "</tr>";
    }
    ?>
  </tbody>
</table>
</body>
</html>