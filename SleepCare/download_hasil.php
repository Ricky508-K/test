<?php
include 'koneksi.php';

if (!isset($_SESSION['login'])) die("Akses ditolak");

$id_penyakit  = $_SESSION['hasil'];
$persentase   = $_SESSION['persentase'];
$gejala_cocok = $_SESSION['gejala_cocok'];

$p = mysqli_fetch_assoc(mysqli_query($conn,
"SELECT * FROM penyakit WHERE id_penyakit='$id_penyakit'"));
?>
<!DOCTYPE html>
<html>
<head>
<title>Hasil Diagnosa</title>
<style>
body{font-family:Arial;padding:30px}
h2{text-align:center}
</style>
</head>
<body onload="window.print()">

<h2>HASIL DIAGNOSA GANGGUAN TIDUR</h2>

<b>Nama Penyakit:</b><br>
<?= $p['nama_penyakit']; ?><br><br>

<b>Deskripsi:</b><br>
<?= $p['deskripsi']; ?><br><br>

<b>Gejala:</b>
<ul>
<?php foreach($gejala_cocok as $g): ?>
<li><?= $g ?></li>
<?php endforeach ?>
</ul>

<b>Tingkat Kecocokan:</b> <?= $persentase ?>%<br><br>

<b>Saran & Solusi:</b><br>
<?= nl2br($p['solusi']); ?>

</body>
</html>
