<?php
// Mengkaitkan file koneksi.php untuk menghubungkan database MySQL
include '../config/koneksi.php';

// Membuat session start agar sessionnya berjalan
session_start();

// Jika session status login tidak sama dengan true / tidak benar
if ($_SESSION['user_login'] != TRUE) {
    // Maka akan dialihkan ke halaman login kembali
    header("Location: login.php");
    exit;
}

?>