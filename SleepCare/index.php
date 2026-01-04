<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Sistem Pakar Gangguan Tidur</title>
</head>
<body>

<h2>Diagnosa Gangguan Tidur</h2>
<form method="POST" action="proses.php">
<?php
$q = mysqli_query($conn, "SELECT * FROM gejala");
while ($row = mysqli_fetch_assoc($q)) {
?>
    <input type="checkbox" name="gejala[]" value="<?= $row['id_gejala']; ?>">
    <?= $row['nama_gejala']; ?><br>
<?php } ?>
<br>
<button type="submit">Diagnosa</button>
</form>

</body>
</html>
