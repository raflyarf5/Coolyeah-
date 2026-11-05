<?php
  $tugas = 80;
  $uts = 70;
  $uas = 70;

  $nilaiakhir = 
  ($tugas * 0.30) +
  ($uts * 0.30) +
  ($uas * 0.40);
  echo "Nilai Tugas : " . $tugas . "<br>";
  echo "Nilai UTS : " . $uts . "<br>";
  echo "Nilai UAS : " . $uas . "<br>";
  echo "Rata-rata : " . $nilaiakhir . "<br>";
  echo "NilaiAkhir >=75 ";
  var_dump($nilaiakhir >= 75);
?>