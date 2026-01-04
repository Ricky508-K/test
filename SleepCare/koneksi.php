<?php
$conn = mysqli_connect("localhost", "root", "", "sistem_pakar");

if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

session_start();
?>
