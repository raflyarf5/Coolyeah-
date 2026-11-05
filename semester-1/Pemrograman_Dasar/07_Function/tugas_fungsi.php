<?php
$dataMahasiswa = [
    ["Nama" => "Rafly", "Tugas" => 90, "uts" => 80, "uas" => 85],
    ["Nama" => "Arif", "Tugas" => 87, "uts" => 90, "uas" => 82],
    ["Nama" => "Anto", "Tugas" => 80, "uts" => 87, "uas" => 89],
];

function hitungNilaiAkhir ($tugas ,$uts ,$uas) {
    $NilaiAKhir = ($tugas * 0.30) + ($uts * 0.30) + ($uas * 0.40);
    return $NilaiAKhir;
}
function tentukanGrade ($NilaiAkhir) {
    if ($NilaiAkhir >= 90) {
        $grade = "A";
    } elseif ($NilaiAkhir >= 80) {
        $grade = "B";
    } elseif ($NilaiAkhir >= 70) {
        $grade = "C";
    } elseif ($NilaiAkhir >= 60) {
        $grade = "D";
    } else {
        $grade = "E";
    }
    return $grade;
}
function tentukanStatus ($NilaiAkhir) {
    if ($NilaiAkhir >= 75) {
        $status = "Lulus";
    } else{
        $status = "Tidak Lulus";
    } 
    return $status;
}

foreach ($dataMahasiswa as $mhs) {
    $NilaiAkhir = hitungNilaiAkhir(
        $mhs ["Tugas"],
        $mhs ["uts"],
        $mhs ["uas"]
    );
    $grade = tentukanGrade($NilaiAkhir);

    $status = tentukanStatus($NilaiAkhir);
    echo "Nama :" . $mhs ["Nama"]  ."<br>";
    echo "Nilai : " . $NilaiAkhir . "<br>";
    echo "Grade :" . $grade . "<br>";
    echo "Status :" . $status . "<br>";
}
?>