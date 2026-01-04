<?php
include 'koneksi.php';
if(!isset($_SESSION['login'])){
    header("location:login.php");
    exit;
}

$id_penyakit = $_SESSION['hasil'] ?? null;
$persentase  = $_SESSION['persentase'] ?? 0;
$gejala_cocok = $_SESSION['gejala_cocok'] ?? [];
?>
<!DOCTYPE html>
<html>
<head>
<title>Hasil Diagnosa | SleepCare</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-dark bg-primary">
<div class="container">
<span class="navbar-brand">SleepCare</span>
<a href="dashboard.php" class="btn btn-light btn-sm">Dashboard</a>
</div>
</nav>

<div class="container mt-5">
<div class="card shadow-lg">
<div class="card-body">

<h3 class="mb-3">Hasil Diagnosa Gangguan Tidur</h3>
<hr>

<?php
if(!$id_penyakit){
    echo "<div class='alert alert-warning'>
    Tidak ditemukan gangguan tidur yang sesuai
    </div>
    <a href='diagnosa.php' class='btn btn-primary'>Diagnosa Ulang</a>";
    exit;
}

$p = mysqli_fetch_assoc(mysqli_query($conn,
"SELECT * FROM penyakit WHERE id_penyakit='$id_penyakit'"));
?>

<h4 class="text-danger"><?= $p['nama_penyakit']; ?></h4>

<p class="mt-3">
<b>Deskripsi:</b><br>
<?= $p['deskripsi'] ?? 'Gangguan tidur yang memengaruhi kualitas istirahat.'; ?>
</p>

<p><b>Gejala yang Anda alami:</b></p>
<ul>
<?php foreach($gejala_cocok as $g){ ?>
    <li><?= $g; ?></li>
<?php } ?>
</ul>

<p>
<b>Tingkat Kecocokan:</b><br>
<span class="badge bg-success">
<?= $persentase; ?>%
</span>
</p>

<p><b>Saran & Solusi:</b></p>
<div class="alert alert-info">
<?= nl2br($p['solusi']); ?>
</div>

<div class="alert alert-warning">
<b>Catatan:</b><br>
Hasil diagnosa ini bersifat sebagai informasi awal.
Apabila keluhan berlanjut, silakan konsultasi ke tenaga medis.
</div>

<a href="diagnosa.php" class="btn btn-primary">Diagnosa Ulang</a>
<a href="download_hasil.php" class="btn btn-success">
    Download Hasil Diagnosa (PDF)
</a>

</div>
</div>
</div>

</body>
</html>
