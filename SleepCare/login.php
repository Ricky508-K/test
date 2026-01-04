<!DOCTYPE html>
<html>
<head>
<title>Login | SleepCare</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
body{
    background: linear-gradient(to right,#4facfe,#00f2fe);
}
.login-box{
    margin-top:120px;
}
</style>
</head>
<body>

<div class="container login-box">
<div class="row justify-content-center">
<div class="col-md-4 bg-white p-4 rounded shadow">

<h3 class="text-center mb-3">SleepCare</h3>
<p class="text-center text-muted">Sistem Pakar Gangguan Tidur</p>

<form action="cek_login.php" method="POST">
<input type="text" name="username" class="form-control mb-3" placeholder="Username" required>
<input type="password" name="password" class="form-control mb-3" placeholder="Password" required>
<button class="btn btn-primary w-100">Login</button>
</form>

<hr>
<p class="text-center">
Belum punya akun?  
<a href="register.php">Daftar di sini</a>
</p>

</div>
</div>
</div>

</body>
</html>
