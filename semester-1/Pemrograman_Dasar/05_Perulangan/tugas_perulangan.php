<?php
  echo "Tabel Perkalian" . "<br>";
  $angka = 3;
  for ($i = 1; $i <= 10; $i++) {
    $hasil = $angka * $i;
      echo  $angka . "x" . $i . "=" . $hasil . "<br>";
  }
  echo "<br>" . "Deret Angka" . "<br>";
  $i = 1;
  while ($i <= 10) {
    if ($i % 2 == 0 ) {
      echo  $i . " = Genap ";
    } else {
      echo $i . " = Ganjil ";
    }
    echo "<br>";
    $i++;
  }
  echo "<br>" . "Deret Angka" . "<br>";
  $i = 10;
  do  {
    if ($angka %2 == 0) {
      echo $i . " = Genap ";
    } else {echo $i . " = Ganjil ";
    } 
    echo "<br>";
    $i--;
  }
  while ($i >= 1);

  for ($i = 1; $i <= 5; $i++) {
    echo str_repeat("* ", $i);
    echo "<br>";
    }
?>