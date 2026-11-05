<?php
  $mahasiswa = ["Andi", "Budi", "Citra"];

  echo "Data Awal <br>";
  echo $mahasiswa[0] . "<br>";
  echo $mahasiswa[1] . "<br>";
  echo $mahasiswa[2] . "<br>";

  $mahasiswa[1] = "Rafly";

  echo "<br> Data setelah dirubah <br>";
  echo $mahasiswa[0] . "<br>";
  echo $mahasiswa[1] . "<br>";
  echo $mahasiswa[2] . "<br>";
?>