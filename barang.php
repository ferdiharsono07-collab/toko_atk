<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Barang | Sistem Informasi ATK</title>
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
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            background: #3498db;
            padding: 8px 15px;
            border-radius: 5px;
        }

        .navbar a:hover {
            background: #2980b9;
        }

        .container {
            padding: 30px;
        }

        h2 {
            margin-bottom: 15px;
            color: #2c3e50;
        }

        .btn {
            display: inline-block;
            margin-bottom: 15px;
            padding: 10px 15px;
            background: #27ae60;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .btn:hover {
            background: #1e8449;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            box-shadow: 0 5px 10px rgba(0,0,0,0.1);
        }

        th, td {
            padding: 12px;
            text-align: center;
        }

        th {
            background: #34495e;
            color: white;
        }

        tr:nth-child(even) {
            background: #f2f2f2;
        }

        tr:hover {
            background: #ecf0f1;
        }

        .back {
            margin-top: 15px;
            display: inline-block;
            color: #2980b9;
            text-decoration: none;
        }

        .back:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="navbar">
    <h3>📋 Data Barang</h3>
    <a href="dashboard.php">Dashboard</a>
</div>

<div class="container">
    <h2>Daftar Barang ATK</h2>
    <a href="tambah_barang.php" class="btn">+ Tambah Barang</a>

    <table>
        <tr>
            <th>Nama Barang</th>
            <th>Harga</th>
            <th>Stok</th>
        </tr>

        <?php
        $data = mysqli_query($conn, "SELECT * FROM barang");
        while ($d = mysqli_fetch_array($data)) {
        ?>
        <tr>
            <td><?= $d['nama_barang'] ?></td>
            <td>Rp <?= number_format($d['harga']) ?></td>
            <td><?= $d['stok'] ?></td>
        </tr>
        <?php } ?>
    </table>

    <a href="dashboard.php" class="back">← Kembali ke Dashboard</a>
</div>

</body>
</html>
