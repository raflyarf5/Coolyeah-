<?php
  $mahasiswa = ["Andi", "budi", "Citra", "Dian", "Eko",];
  foreach ($mahasiswa as $key => $nama) {
    echo "Nama Mahasiswa " . ($key + 1) . " = " . $nama . "<br>";
  }
?>