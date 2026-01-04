<?php
include 'koneksi.php';

/* =========================
   PROTEKSI AKSES
========================= */
if (!isset($_SESSION['login'])) {
    header("location:login.php");
    exit;
}

if (!isset($_POST['jawaban'])) {
    echo "<script>
        alert('Silakan lakukan proses diagnosa terlebih dahulu');
        location='diagnosa.php';
    </script>";
    exit;
}

/* =========================
   AMBIL JAWABAN USER
========================= */
$jawaban = $_POST['jawaban'];
$gejala_user = [];

/* Ambil gejala dengan jawaban YA */
foreach ($jawaban as $id_gejala => $nilai) {
    if ($nilai === 'ya') {
        $gejala_user[] = $id_gejala;
    }
}

/* Jika tidak ada gejala */
if (count($gejala_user) === 0) {
    echo "<script>
        alert('Tidak ada gejala yang dipilih');
        location='diagnosa.php';
    </script>";
    exit;
}

/* =========================
   PROSES FORWARD CHAINING
========================= */
$persentase_tertinggi = 0;
$id_penyakit_terpilih = null;
$gejala_cocok = [];

/* Ambil seluruh rule */
$q_rule = mysqli_query($conn, "SELECT * FROM rule");

while ($r = mysqli_fetch_assoc($q_rule)) {

    $id_rule = $r['id_rule'];
    $id_penyakit = $r['id_penyakit'];

    /* Ambil detail gejala rule */
    $q_detail = mysqli_query($conn,
        "SELECT rd.id_gejala, g.nama_gejala
         FROM rule_detail rd
         JOIN gejala g ON rd.id_gejala = g.id_gejala
         WHERE rd.id_rule = '$id_rule'"
    );

    $total_rule = mysqli_num_rows($q_detail);
    $jumlah_cocok = 0;
    $tmp_gejala = [];

    while ($d = mysqli_fetch_assoc($q_detail)) {
        if (in_array($d['id_gejala'], $gejala_user)) {
            $jumlah_cocok++;
            $tmp_gejala[] = $d['nama_gejala'];
        }
    }

    if ($total_rule > 0) {
        $persentase = ($jumlah_cocok / $total_rule) * 100;

        if ($persentase > $persentase_tertinggi) {
            $persentase_tertinggi = $persentase;
            $id_penyakit_terpilih = $id_penyakit;
            $gejala_cocok = $tmp_gejala;
        }
    }
}

/* =========================
   VALIDASI HASIL
========================= */
if ($persentase_tertinggi < 30 || !$id_penyakit_terpilih) {
    $_SESSION['hasil'] = null;
    header("location:hasil.php");
    exit;
}

/* =========================
   SIMPAN KE SESSION
========================= */
$_SESSION['hasil'] = $id_penyakit_terpilih;
$_SESSION['persentase'] = round($persentase_tertinggi);
$_SESSION['gejala_cocok'] = $gejala_cocok;

/* =========================
   SIMPAN RIWAYAT DIAGNOSA
========================= */
$username = $_SESSION['username'] ?? 'Guest';

mysqli_query($conn,
    "INSERT INTO hasil_diagnosa (username, id_penyakit, tanggal)
     VALUES ('$username', '$id_penyakit_terpilih', NOW())"
);

/* =========================
   REDIRECT HASIL
========================= */
header("location:hasil.php");
exit;
