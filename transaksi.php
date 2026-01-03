<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

if (isset($_POST['jual'])) {
    $harga  = $_POST['harga'];
    $jumlah = $_POST['jumlah'];
    $total  = $harga * $jumlah;

    mysqli_query($conn, "INSERT INTO transaksi VALUES (
        NULL,
        CURDATE(),
        $total
    )");

    header("Location: transaksi.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Transaksi | Sistem Informasi ATK</title>
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

        button {
            width: 100%;
            padding: 10px;
            background: #e67e22;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background: #d35400;
        }

        .total {
            margin-top: 15px;
            font-size: 18px;
            text-align: center;
            color: #27ae60;
        }
    </style>
</head>
<body>

<div class="navbar">
    <h3>🛒 Transaksi</h3>
    <a href="dashboard.php">Dashboard</a>
</div>

<div class="container">
    <h2>Input Transaksi</h2>

    <form method="post">
        <div class="form-group">
            <label>Harga</label>
            <input type="number" id="harga" name="harga" required>
        </div>

        <div class="form-group">
            <label>Jumlah</label>
            <input type="number" id="jumlah" name="jumlah" required>
        </div>

        <div class="total" id="totalText">Total: Rp 0</div>

        <button name="jual">Simpan Transaksi</button>
    </form>
</div>

<script>
    const harga = document.getElementById('harga');
    const jumlah = document.getElementById('jumlah');
    const totalText = document.getElementById('totalText');

    function hitungTotal() {
        const h = harga.value || 0;
        const j = jumlah.value || 0;
        totalText.innerText = "Total: Rp " + (h * j).toLocaleString('id-ID');
    }

    harga.addEventListener('input', hitungTotal);
    jumlah.addEventListener('input', hitungTotal);
</script>

</body>
</html>
