<?php
// Mengkaitkan file koneksi.php untuk menghubungkan database MySQL
include '../config/koneksi.php';

// Membuat session start agar sessionnya berjalan
session_start();

$nama_user = isset($_SESSION['nama']);
$id_pendaftaran = isset($_SESSION['id']);
$email = isset($_SESSION['email']);
$get_pendaftar = mysqli_query($conn, "SELECT * FROM tb_pendaftaran WHERE id_pendaftaran='$id_pendaftaran'");
$row = mysqli_fetch_array($get_pendaftar);
$get_pembayaran = mysqli_query($conn, "SELECT * FROM tb_pembayaran WHERE id_pendaftaran='$id_pendaftaran'");
$bayar = mysqli_fetch_array($get_pembayaran);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran TPA Assyifa</title>
    <!-- My Icon -->
    <link rel="shortcut icon" href="../img/Logo Assyifa2021.png" />
    <!-- My Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- My CSS -->
    <link rel="stylesheet" href="../css/style.css">

</head>

<body>

    <?php include('../_partials/user/navbar.php'); ?>
    <section class="container mb-3 pt-5 mt-5">
        <div class="row g-0 bg-white p-4 shadow">
            <div class="col-md-6 col-xs-8 mx-auto">
                <div class="card border-0">
                    <div class="card-body">
                        <img src="../img/alurpsb.png" class="img-responsive img-fluid" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include('../_partials/user/footer.php'); ?>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="../js/bootstrap.bundle.min.js"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <script src="../js/bootstrap.min.js"></script>

</body>

</html>