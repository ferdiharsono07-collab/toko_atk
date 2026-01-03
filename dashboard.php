<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Dashboard | Sistem ATK</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Segoe UI', sans-serif;
}

body{
    background:#eef2f7;
}

/* Layout */
.wrapper{
    display:flex;
    min-height:100vh;
}

/* Sidebar */
.sidebar{
    width:260px;
    background:linear-gradient(180deg,#1e3c72,#2a5298);
    color:white;
    padding:20px;
}

.sidebar h2{
    text-align:center;
    margin-bottom:30px;
}

.sidebar a{
    display:block;
    color:white;
    text-decoration:none;
    padding:12px 15px;
    margin-bottom:10px;
    border-radius:8px;
    transition:0.3s;
}

.sidebar a:hover{
    background:rgba(255,255,255,0.2);
}

/* Content */
.content{
    flex:1;
}

/* Navbar */
.navbar{
    background:white;
    padding:15px 25px;
    display:flex;
    justify-content:space-between;
    align-items:center;
    box-shadow:0 2px 8px rgba(0,0,0,0.1);
}

.navbar button{
    background:#1e3c72;
    color:white;
    border:none;
    padding:8px 12px;
    border-radius:6px;
    cursor:pointer;
}

.navbar button:hover{
    background:#16305a;
}

/* Main */
.main{
    padding:30px;
}

.cards{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
    gap:20px;
}

.card{
    background:white;
    padding:25px;
    border-radius:12px;
    box-shadow:0 5px 15px rgba(0,0,0,0.1);
    transition:0.3s;
}

.card:hover{
    transform:translateY(-5px);
}

.card h3{
    color:#1e3c72;
    margin-bottom:10px;
}
</style>
</head>

<body>

<div class="wrapper">

    <!-- Sidebar -->
    <div class="sidebar">
        <h2>📦 ATK PANEL</h2>
        <a href="dashboard.php">🏠 Dashboard</a>
        <a href="barang.php">📋 Data Barang</a>
        <a href="transaksi.php">🛒 Transaksi</a>
        <a href="laporan.php">📊 Laporan</a>
        <a href="logout.php">🚪 Logout</a>
    </div>

    <!-- Content -->
    <div class="content">
        <div class="navbar">
            <h3>Dashboard</h3>
            <button onclick="toggleSidebar()">☰</button>
        </div>

        <div class="main">
            <div class="cards">
                <div class="card">
                    <h3>Data Barang</h3>
                    <p>Kelola barang ATK</p>
                </div>
                <div class="card">
                    <h3>Transaksi</h3>
                    <p>Catat penjualan</p>
                </div>
                <div class="card">
                    <h3>Laporan</h3>
                    <p>Rekap pemasukan</p>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
function toggleSidebar(){
    document.querySelector('.sidebar').classList.toggle('hide');
}
</script>

<style>
.sidebar.hide{
    width:0;
    padding:0;
    overflow:hidden;
}
</style>

</body>
</html>
