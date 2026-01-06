<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM barang WHERE id='$id'");
$d = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Edit Barang</title>
<style>
body {
    background:#f4f6f9;
    font-family:'Segoe UI', sans-serif;
}
.container {
    width:400px;
    margin:80px auto;
    background:white;
    padding:20px;
    border-radius:8px;
    box-shadow:0 5px 10px rgba(0,0,0,0.1);
}
input {
    width:100%;
    padding:10px;
    margin-bottom:10px;
}
button {
    background:#27ae60;
    color:white;
    padding:10px;
    border:none;
    width:100%;
    border-radius:5px;
}
button:hover {
    background:#1e8449;
}
a {
    display:block;
    margin-top:10px;
    text-align:center;
    text-decoration:none;
}
</style>
</head>
<body>

<div class="container">
<h3>Edit Barang</h3>

<form method="post">
    <input type="text" name="nama_barang" value="<?= $d['nama_barang'] ?>" required>
    <input type="number" name="harga" value="<?= $d['harga'] ?>" required>
    <input type="number" name="stok" value="<?= $d['stok'] ?>" required>
    <button type="submit" name="update">Update</button>
</form>

<a href="barang.php">⬅ Kembali</a>
</div>

</body>
</html>

<?php
if (isset($_POST['update'])) {
    $nama = $_POST['nama_barang'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    mysqli_query($conn, "UPDATE barang 
        SET nama_barang='$nama', harga='$harga', stok='$stok'
        WHERE id='$id'");

    echo "<script>
        alert('Data berhasil diupdate');
        window.location='data_barang.php';
    </script>";
}
?>
