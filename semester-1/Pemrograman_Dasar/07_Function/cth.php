<?php

function hitungNilaiAkhir($tugas, $uts, $uas) {
    return
        ($tugas * 0.30) +
        ($uts * 0.30) +
        ($uas * 0.40);
}

function tentukanGrade($nilai) {
    if ($nilai >= 90) {
        return "A";
    } elseif ($nilai >= 80) {
        return "B";
    } elseif ($nilai >= 70) {
        return "C";
    } elseif ($nilai >= 60) {
        return "D";
    }

    return "E";
}

function tentukanStatus($nilai) {
    return $nilai >= 75
        ? "Lulus"
        : "Tidak Lulus";
}
$tugas = 80;
$uts = 85;
$uas = 90;
$nilai = hitungNilaiAkhir(90, 80, 82);
echo $nilai;