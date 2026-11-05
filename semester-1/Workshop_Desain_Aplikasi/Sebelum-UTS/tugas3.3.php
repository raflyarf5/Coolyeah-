<?php
    $nilai = 86;
    $nama = "Moh Rafly Arifianto";

    if ($nilai >= 85) {
      $grade = "Sangat Baik";
    } elseif ($nilai >= 75) {
      $grade = "Baik";
    } elseif ($nilai >= 60) {
      $grade = "Cukup";
    } elseif ($nilai >= 50) {
      $grade = "kurang";
    } else {
      $grade = "Sangat Kurang";
    }

    echo "Nama :" . $nama . "<br>";
    echo "Nilai :" . $nilai . "<br>";
    echo "Predikat :" . $grade;
?> 