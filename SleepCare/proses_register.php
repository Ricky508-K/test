<?php
include 'koneksi.php';

$user = $_POST['username'];
$pass = $_POST['password'];

/* Cek username sudah ada atau belum */
$cek = mysqli_query($conn,"SELECT * FROM user WHERE username='$user'");

if(mysqli_num_rows($cek)>0){
    echo "<script>alert('Username sudah digunakan');location='register.php';</script>";
}else{
    mysqli_query($conn,
    "INSERT INTO user VALUES (NULL,'$user','$pass')");
    echo "<script>alert('Registrasi berhasil, silakan login');location='login.php';</script>";
}
?>
