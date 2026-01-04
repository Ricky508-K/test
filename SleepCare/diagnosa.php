<?php
include 'koneksi.php';
if(!isset($_SESSION['login'])){
    header("location:login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Proses Diagnosa | SleepCare</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
    background:#f4f7fb;
}
.question-card{
    border:0;
    border-left:6px solid #0d6efd;
    border-radius:12px;
}
.option-btn{
    border:1px solid #ced4da;
    border-radius:10px;
    padding:10px;
    cursor:pointer;
}
.option-btn:hover{
    background:#f1f8ff;
}
input[type=radio]{
    display:none;
}
input[type=radio]:checked + .option-btn{
    background:#0d6efd;
    color:white;
    border-color:#0d6efd;
}
</style>
</head>

<body>

<nav class="navbar navbar-dark bg-primary shadow">
<div class="container">
<span class="navbar-brand fw-bold">SleepCare</span>
<a href="dashboard.php" class="btn btn-light btn-sm">Kembali</a>
</div>
</nav>

<div class="container mt-4 mb-5">

<div class="text-center mb-4">
<h3 class="fw-bold">Proses Diagnosa Gangguan Tidur</h3>
<p class="text-muted">
Jawablah setiap pertanyaan sesuai kondisi tidur Anda
</p>
</div>

<!-- Progress Bar (visual saja) -->
<div class="progress mb-4" style="height:8px;">
  <div class="progress-bar bg-success" style="width:50%"></div>
</div>

<form method="POST" action="proses.php">

<?php
$q = mysqli_query($conn,"SELECT * FROM gejala");
$no = 1;
while($g = mysqli_fetch_assoc($q)){
?>

<div class="card question-card shadow-sm mb-3">
<div class="card-body">

<span class="badge bg-primary mb-2">Pertanyaan <?= $no++; ?></span>

<h6 class="fw-semibold mb-3">
<?= $g['nama_gejala']; ?>?
</h6>

<div class="row g-2">
<div class="col-md-6">
<label class="w-100">
<input type="radio" name="jawaban[<?= $g['id_gejala']; ?>]" value="ya">
<div class="option-btn text-center">
✅ Ya
</div>
</label>
</div>

<div class="col-md-6">
<label class="w-100">
<input type="radio" name="jawaban[<?= $g['id_gejala']; ?>]" value="tidak">
<div class="option-btn text-center">
❌ Tidak
</div>
</label>
</div>
</div>

</div>
</div>

<?php } ?>

<button class="btn btn-success btn-lg w-100 shadow">
🧠 Proses Diagnosa
</button>

</form>
</div>

</body>
</html>
