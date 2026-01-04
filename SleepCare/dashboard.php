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
<title>Dashboard | SleepCare</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
.hero{
    background: linear-gradient(to right,#4facfe,#00f2fe);
    color:white;
    padding:50px 0;
}
.card-article:hover{
    transform: translateY(-5px);
    transition: .3s;
}
</style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
<div class="container">
<a class="navbar-brand" href="#">SleepCare</a>
<div class="ms-auto">
<span class="text-white me-3">Halo, <?= $_SESSION['username']; ?></span>
<a href="logout.php" class="btn btn-light btn-sm">Logout</a>
</div>
</div>
</nav>

<!-- HERO -->
<div class="hero text-center">
<div class="container">
<h1>Sistem Pakar Gangguan Tidur</h1>
<p class="lead">Kenali gangguan tidur sejak dini dan lakukan diagnosa awal</p>
<a href="diagnosa.php" class="btn btn-light btn-lg mt-3">Mulai Diagnosa</a>
</div>
</div>

<!-- ARTIKEL -->
<div class="container mt-5">
<h3 class="mb-4">Artikel & Edukasi Sleep Disorder</h3>

<div class="row">

<div class="col-md-4">
<div class="card shadow card-article">
<div class="card-body">
<h5 class="card-title">Insomnia</h5>
<p class="card-text">
Insomnia adalah gangguan tidur yang menyebabkan seseorang sulit tidur atau sering terbangun di malam hari.
</p>
</div>
</div>
</div>

<div class="col-md-4">
<div class="card shadow card-article">
<div class="card-body">
<h5 class="card-title">Hipersomnia</h5>
<p class="card-text">
Hipersomnia ditandai dengan rasa kantuk berlebihan di siang hari meskipun waktu tidur malam cukup.
</p>
</div>
</div>
</div>

<div class="col-md-4">
<div class="card shadow card-article">
<div class="card-body">
<h5 class="card-title">Parasomnia</h5>
<p class="card-text">
Parasomnia merupakan gangguan tidur yang memunculkan perilaku abnormal saat tidur, seperti berjalan saat tidur.
</p>
</div>
</div>
</div>

</div>
</div>

</body>
</html>
