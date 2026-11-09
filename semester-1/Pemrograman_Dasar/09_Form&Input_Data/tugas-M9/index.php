<!-- 
 Buat Formulir "Registrasi Lomba Coding"
Form Wajib memiliki elemen:
-  Nama (wajib, 3-50 karakter) dan email
-  Nomor HP dengan REGEXP, 
-  Umur dengan rentang (17-19 tahun), jika diluar rentang ada peringatan dan tidak bisa disimpan
-  URL repositori GitHub (opsional, harus URL valid)
-  Kategori (select) dan peserta (radio) dengan whitelist
-  Pesan error per field dan isian tidak hilang
-  Output aman dengan htmlspecialchars()
 -->
<?php
 $error = [];
 $old = [
  'nama' => '',
  'email' => '',
  'nomor' => '',
  'umur' => '',
  'url' => '',
  'kategori' => '',
  'peserta' => '',
 ];
 $kategoriList = [
'WebDev', 'Hackathon', 'Algoritma', 'GameDev', 'MobileDev'
 ];

 $pesertaList = [
'Individu', 'Tim'
 ];
 if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $old['nama'] = trim($_POST['nama'] ?? '');
    $old['email'] = trim($_POST['email'] ?? '');
    $old['nomor'] = trim($_POST['nomor'] ?? '');
    $old['umur'] = trim($_POST['umur'] ?? '');
    $old['url'] = trim($_POST['url'] ?? '');
    $old['kategori'] = trim($_POST['kategori'] ?? '');
    $old['peserta'] = trim($_POST['peserta'] ?? '');

    if ($old['nama'] === ''){
      $error['nama'] = "Nama wajib diisi.";
 } elseif (mb_strlen($old['nama']) < 3) {
  $error['nama'] = "panjang nama harus lebih atau sama dengan dari 3";
 } elseif (mb_strlen($old['nama']) > 50) {
  $error['nama'] = "panjang nama harus kurang atau sama dengan dari 50";
 }

    if ($old['email'] === ''){
      $error['email'] = "Email Wajib diisi"; 
    } elseif (!filter_var($old['email'], FILTER_VALIDATE_EMAIL)) {
      $error['email'] = 'Format Tidak Valid';
    }

    if($old['nomor'] ===''){
      $error['nomor'] = "Nomor wajib diisi";
    } elseif (!preg_match('/^(\+62|62|0)8[0-9]{8,11}$/', $old['nomor'])) {
      $error['nomor'] = "Format tidak valid";
    }
    
    if($old['umur'] ===''){
      $error['umur'] = 'Umur wajib diisi';
    } elseif (!ctype_digit($old['umur'])) {
      $error['umur'] = "Umur harus berupa angka bulat";
    } elseif ((int)$old['umur'] < 17 || (int)$old['umur'] > 19) {
      $error['umur'] = 'Peringatan : Umur Peserta harus di antara 17-19';
    }

    if($old['url'] !== ''){
      $error['url'] = '';
       if (!filter_var($old['url'], FILTER_VALIDATE_URL)) {
      $error['url'] = 'URL tidak valid';
      } else{
        $parts = parse_url($old['url']);
        if (($parts['scheme'] ?? '') !== 'https' ||($parts['host'] ?? '') !== 'github.com') {
          $error ['url'] = 'URL harus berupa tautan https://github.com/';
        }
      }
    } 
}
?>