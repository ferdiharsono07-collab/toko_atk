<?php
session_start();

/*
 |---------------------------------------------------------
 | INDEX SISTEM INFORMASI TOKO ATK
 |---------------------------------------------------------
 | Jika sudah login  → langsung ke dashboard
 | Jika belum login → diarahkan ke halaman login
 |
 */

if (isset($_SESSION['login'])) {
    header("Location: dashboard.php");
    exit;
} else {
    header("Location: login.php");
    exit;
}
