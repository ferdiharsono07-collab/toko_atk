<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

if (isset($_POST['simpan'])) {
    mysqli_query($conn, "INSERT INTO barang VALUES (
        NULL,
        '$_POST[nama]',
        '$_POST[harga]',
        '$_POST[stok]'
    )");
    header("Location: barang.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Barang | Sistem Informasi ATK</title>
    <style>
        body {
            margin: 0;
            background: #f4f6f9;
            font-family: 'Segoe UI', sans-serif;
        }

        .navbar {
            background: #2c3e50;
            color: white;
            padding: 15px 30px;
        }

        .container {
            max-width: 500px;
            margin: 40px auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #2c3e50;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            font-size: 14px;
            color: #555;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .form-group input:focus {
            outline: none;
            border-color: #2980b9;
        }

        button {
            width: 100%;
            padding: 10px;
            background: #27ae60;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background: #1e8449;
        }

        .back {
            text-align: center;
            margin-top: 15px;
        }

        .back a {
            color: #2980b9;
            text-decoration: none;
        }

        .back a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="navbar">
    <h3>➕ Tambah Barang</h3>
</div>

<div class="container">
    <h2>Form Tambah Barang</h2>

    <form method="post">
        <div class="form-group">
            <label>Nama Barang</label>
            <input type="text" name="nama" required>
        </div>

        <div class="form-group">
            <label>Harga</label>
            <input type="number" name="harga" required>
        </div>

        <div class="form-group">
            <label>Stok</label>
            <input type="number" name="stok" required>
        </div>

        <button name="simpan">Simpan</button>
    </form>

    <div class="back">
        <a href="barang.php">← Kembali ke Data Barang</a>
    </div>
</div>

</body>
</html>
