<?php
include 'koneksi.php';

$data = mysqli_query($conn, "
    SELECT 
        detail_transaksi.id,
        detail_transaksi.transaksi_id,
        detail_transaksi.barang_id,
        detail_transaksi.jumlah,
        detail_transaksi.subtotal,
        transaksi.tanggal
    FROM detail_transaksi
    JOIN transaksi ON detail_transaksi.transaksi_id = transaksi.id
");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Detail Transaksi</title>
    <style>
        body{ background:#f4f6f9; font-family:Segoe UI; }
        table{
            width:100%;
            border-collapse:collapse;
            background:white;
        }
        th, td{
            padding:12px;
            border:1px solid #ddd;
            text-align:center;
        }
        th{
            background:#1e3c72;
            color:white;
        }
        .back{
            display:inline-block;
            margin-top:15px;
            text-decoration:none;
            color:#1e3c72;
            font-weight:bold;
        }
    </style>
</head>
<body>

<h2>🧾 Detail Transaksi</h2>

<table>
    <tr>
        <th>ID</th>
        <th>ID Transaksi</th>
        <th>Tanggal</th>
        <th>Barang ID</th>
        <th>Jumlah</th>
        <th>Subtotal</th>
    </tr>

    <?php while ($d = mysqli_fetch_assoc($data)) { ?>
    <tr>
        <td><?= $d['id']; ?></td>
        <td><?= $d['transaksi_id']; ?></td>
        <td><?= $d['tanggal']; ?></td>
        <td><?= $d['barang_id']; ?></td>
        <td><?= $d['jumlah']; ?></td>
        <td>Rp <?= number_format($d['subtotal']); ?></td>
    </tr>
    <?php } ?>
</table>

<a href="dashboard.php" class="back">← Kembali ke Dashboard</a>

</body>
</html>
