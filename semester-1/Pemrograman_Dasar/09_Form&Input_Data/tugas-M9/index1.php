<?php
$error = [];
$sukses = false;

$old = [
    'nama' => '', 'email' => '', 'nomor' => '', 'umur' => '',
    'url' => '', 'kategori' => '', 'peserta' => '',
];

$kategoriList = ['WebDev', 'Hackathon', 'Algoritma', 'GameDev', 'MobileDev'];
$pesertaList  = ['Individu', 'Tim'];


function ambil($key) {
    $v = $_POST[$key] ?? '';
    return is_string($v) ? trim($v) : '';
}


function e($s) {
    return htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach ($old as $k => $v) {
        $old[$k] = ambil($k);
    }

    if ($old['nama'] === '') {
        $error['nama'] = "Nama wajib diisi.";
    } elseif (mb_strlen($old['nama']) < 3) {
        $error['nama'] = "Nama minimal 3 karakter.";
    } elseif (mb_strlen($old['nama']) > 50) {
        $error['nama'] = "Nama maksimal 50 karakter.";
    }

    if ($old['email'] === '') {
        $error['email'] = "Email wajib diisi.";
    } elseif (!filter_var($old['email'], FILTER_VALIDATE_EMAIL)) {
        $error['email'] = "Format email tidak valid.";
    }

    if ($old['nomor'] === '') {
        $error['nomor'] = "Nomor HP wajib diisi.";
    } elseif (!preg_match('/^(\+62|62|0)8[0-9]{8,11}$/', $old['nomor'])) {
        $error['nomor'] = "Format nomor HP tidak valid.";
    }

    if ($old['umur'] === '') {
        $error['umur'] = "Umur wajib diisi.";
    } elseif (!ctype_digit($old['umur'])) {
        $error['umur'] = "Umur harus berupa angka bulat.";
    } elseif ((int)$old['umur'] < 17 || (int)$old['umur'] > 19) {
        $error['umur'] = "Peringatan: umur peserta harus antara 17 sampai 19 tahun.";
    }

    if ($old['url'] !== '') {
        if (!filter_var($old['url'], FILTER_VALIDATE_URL)) {
            $error['url'] = "Format URL tidak valid.";
        } else {
            $parts = parse_url($old['url']);
            if (($parts['scheme'] ?? '') !== 'https' || ($parts['host'] ?? '') !== 'github.com') {
                $error['url'] = "URL harus berupa tautan https://github.com/...";
            }
        }
    }

    if (!in_array($old['kategori'], $kategoriList, true)) {
        $error['kategori'] = "Pilih kategori yang valid.";
    }
    if (!in_array($old['peserta'], $pesertaList, true)) {
        $error['peserta'] = "Pilih jenis peserta yang valid.";
    }

    if (empty($error)) {
        $sukses = true;
        $baris = json_encode($old, JSON_UNESCAPED_UNICODE) . PHP_EOL;
file_put_contents(__DIR__ . '/data.txt', $baris, FILE_APPEND | LOCK_EX);
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Registrasi Lomba Coding</title>
    <style>
        body { font-family: sans-serif; max-width: 480px; margin: 30px auto; }
        label { display: block; margin-top: 12px; font-weight: bold; }
        input[type=text], input[type=email], input[type=number], select { width: 100%; padding: 6px; }
        .err { color: #c00; font-size: 0.9em; }
        .ok { background: #dfd; padding: 10px; border: 1px solid #7a7; }
        .radio label { display: inline; font-weight: normal; margin-right: 12px; }
    </style>
</head>
<body>
<h2>Registrasi Lomba Coding</h2>

<?php if ($sukses): ?>
    <div class="ok">Registrasi berhasil! Terima kasih, <?= e($old['nama']) ?>.</div>
<?php endif; ?>

<form method="post" novalidate>
    <label for="nama">Nama</label>
    <input type="text" id="nama" name="nama" value="<?= e($old['nama']) ?>">
    <?php if (isset($error['nama'])): ?><div class="err"><?= e($error['nama']) ?></div><?php endif; ?>

    <label for="email">Email</label>
    <input type="email" id="email" name="email" value="<?= e($old['email']) ?>">
    <?php if (isset($error['email'])): ?><div class="err"><?= e($error['email']) ?></div><?php endif; ?>

    <label for="nomor">Nomor HP</label>
    <input type="text" id="nomor" name="nomor" value="<?= e($old['nomor']) ?>">
    <?php if (isset($error['nomor'])): ?><div class="err"><?= e($error['nomor']) ?></div><?php endif; ?>

    <label for="umur">Umur</label>
    <input type="text" id="umur" name="umur" value="<?= e($old['umur']) ?>">
    <?php if (isset($error['umur'])): ?><div class="err"><?= e($error['umur']) ?></div><?php endif; ?>

    <label for="url">URL Repositori GitHub (opsional)</label>
    <input type="text" id="url" name="url" value="<?= e($old['url']) ?>">
    <?php if (isset($error['url'])): ?><div class="err"><?= e($error['url']) ?></div><?php endif; ?>

    <label for="kategori">Kategori</label>
    <select id="kategori" name="kategori">
        <option value="">-- Pilih --</option>
        <?php foreach ($kategoriList as $k): ?>
            <option value="<?= e($k) ?>" <?= $old['kategori'] === $k ? 'selected' : '' ?>><?= e($k) ?></option>
        <?php endforeach; ?>
    </select>
    <?php if (isset($error['kategori'])): ?><div class="err"><?= e($error['kategori']) ?></div><?php endif; ?>

    <label>Peserta</label>
    <div class="radio">
        <?php foreach ($pesertaList as $p): ?>
            <label>
                <input type="radio" name="peserta" value="<?= e($p) ?>" <?= $old['peserta'] === $p ? 'checked' : '' ?>>
                <?= e($p) ?>
            </label>
        <?php endforeach; ?>
    </div>
    <?php if (isset($error['peserta'])): ?><div class="err"><?= e($error['peserta']) ?></div><?php endif; ?>

    <br>
    <button type="submit">Daftar</button>
</form>
</body>
</html>