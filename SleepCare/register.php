<!DOCTYPE html>
<html>
<head>
<title>Registrasi | SleepCare</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
body{
    background: linear-gradient(to right,#43e97b,#38f9d7);
}
.register-box{
    margin-top:100px;
}
</style>
</head>
<body>

<div class="container register-box">
<div class="row justify-content-center">
<div class="col-md-4 bg-white p-4 rounded shadow">

<h3 class="text-center mb-3">Registrasi</h3>

<form action="proses_register.php" method="POST">
<input type="text" name="username" class="form-control mb-3" placeholder="Username" required>
<input type="password" name="password" class="form-control mb-3" placeholder="Password" required>
<button class="btn btn-success w-100">Daftar</button>
</form>

<hr>
<p class="text-center">
Sudah punya akun?  
<a href="login.php">Login</a>
</p>

</div>
</div>
</div>

</body>
</html>
