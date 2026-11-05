  <?php
    $nilai = 74;
    if ($nilai <0 || $nilai >100) {
  $grade = "Tidak Valid"; 
    } elseif ($nilai >= 90) {   
      $grade = "A";
    } elseif ($nilai >= 80) {
      $grade = "B";
    } elseif ($nilai >= 70) {
      $grade = "C";
    } elseif ($nilai >= 60) {
      $grade = "D";
    } else {
      $grade = "E";
      }
    if ($grade == "Tidak Valid"){
      $status = "Tidak Valid";  
    } elseif ($nilai >= 75) {
    $status = "Lulus";
    } else {
    $status = "Tidak Lulus"; }

    echo "Nilai : " . $nilai . "<br>";
    echo "Grade : " . $grade . "<br>";
    echo "Status : " . $status;
  ?>