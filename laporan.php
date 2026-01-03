<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

$q = mysqli_query($conn, "SELECT * FROM transaksi ORDER BY tanggal DESC");
$sum = 0;
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Penjualan | Sistem Informasi ATK</title>
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

        .total-box {
            background: #27ae60;
            color: white;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-size: 22px;
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
    </style>
</head>
<body>

<div class="navbar">
    <h3>📊 Laporan Penjualan</h3>
    <a href="dashboard.php">Dashboard</a>
</div>

<div class="container">
    <h2>Data Penjualan</h2>

    <div class="total-box">
        Total Pemasukan: Rp <?= number_format($sum) ?>
    </div>

    <table>
        <tr>
            <th>Tanggal</th>
            <th>Total</th>
        </tr>

        <?php while ($d = mysqli_fetch_array($q)) {
            $sum += $d['total'];
        ?>
        <tr>
            <td><?= $d['tanggal'] ?></td>
            <td>Rp <?= number_format($d['total']) ?></td>
        </tr>
        <?php } ?>
    </table>
</div>

</body>
</html>
