<?php
include 'koneksi.php';

$user = $_POST['username'];
$pass = $_POST['password'];

$q = mysqli_query($conn,
"SELECT * FROM user WHERE username='$user' AND password='$pass'");

if(mysqli_num_rows($q)>0){
    $_SESSION['login'] = true;
    $_SESSION['username'] = $user;
    header("location:dashboard.php");
}else{
    echo "<script>alert('Login gagal');location='login.php';</script>";
}
?>
