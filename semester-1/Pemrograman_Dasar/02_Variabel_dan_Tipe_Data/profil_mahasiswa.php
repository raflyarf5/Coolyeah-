
<?php
//Data variabel 
$nama = "Moh Rafly Arifianto";
$nim = "E41263041";
$prodi = "Teknik Informatika";
$umur = 19;
$ipk = 3.57;
$status = false;
//Output 
echo "Nama :". $nama . "<br>";
echo "NIM  :" . $nim . "<br>";
echo "Program Studi :" . $prodi . "<br>";
echo "Umur :" . $umur . "<br>";
echo "IPK :" . $ipk . "<br>";
echo "Status :" . ($status ? "Aktif" : "Tidak Aktif") . "<br>";
echo "<br>";
//Hasil dari var_dump()
var_dump($nama);
echo "<br>";
var_dump($nim);
echo "<br>";
var_dump($prodi);
echo "<br>";
var_dump($umur);
echo "<br>";
var_dump($ipk);
echo "<br>";
var_dump($status);
?>