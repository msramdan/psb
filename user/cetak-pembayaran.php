<?php
// Mengkaitkan file koneksi.php untuk menghubungkan database MySQL
include '../config/koneksi.php';

// Membuat variable $peserta untuk mennyeleksi tbl_pendaftaran dari id_pendaftaran
$peserta = mysqli_query($conn, "SELECT * FROM tb_pendaftaran WHERE id_pendaftaran = '" . $_GET['id'] . "' ");
// Kemudian menyimpannya dalam bentuk object mysqli_fetch_object
$p = mysqli_fetch_object($peserta);
$id_peserta = $p->id_pendaftaran;
$get_pembayaran = mysqli_query($conn, "SELECT * FROM tb_pembayaran WHERE id_pendaftaran='$id_peserta'");
$b = mysqli_fetch_array($get_pembayaran);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Bukti</title>

    <!-- My Icon -->
    <link rel="shortcut icon" href="../img/Logo Assyifa2021.png" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">

</head>

<body>
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="../img/Logo Assyifa2021.png" alt="" width="100px" class="d-inline-block align-text-top">
            </a>
            <form class="d-flex">
                <img src="../img/assyifa.png" alt="" width="100px" class="d-inline-block align-text-top">
            </form>
        </div>
    </nav>

    <div class="container">
        <div class="card-body d-flex align-items-center">
            <div class="col-md-5">
                <img src="../img/img1.svg" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="container">
                <h5 class="card-title">Terima Kasih telah mendaftar</h5>
                <p class="card-text">Kehadiran Anda sangat berarti untuk meningkatkan Visi & Misi kami dalam membangun karakter yang lebih baik.</p>
            </div>
        </div>
    </div>
    <h2 class="text-center mt-3">Bukti Pembayaran</h2>
    <table class="table table-borderless table-striped mb-5 table-sm table-light" border="0">
        <tr>
            <td>Kode Pendaftaran</td>
            <td>:</td>
            <!-- Mencetak id pendaftaran -->
            <td><?php echo $p->id_pendaftaran ?></td>
        </tr>

        <tr>
            <td>Status Pembayaran</td>
            <td>:</td>
            <?php if ($b['status_pembayaran'] == 0) { ?>
                <td><span class="badge rounded-pill bg-gray">Belum Selesai</span></td>
            <?php } else if ($b['status_pembayaran'] == 1) { ?>
                <td><span class="badge rounded-pill bg-success">Pembayaran Selesai</span></td>
            <?php } else { ?>
                <td><span class="badge rounded-pill bg-danger">Belum Upload Pembayaran</span></td>
            <?php } ?>
        </tr>


        <tr>
            <td>Tanggal Upload Pembayaran</td>
            <td>:</td>
            <!-- Mencetak tanggal upload -->
            <td><?php echo $b['tanggal_upload'] ?></td>
        </tr>

        <tr>
            <td>Jurusan</td>
            <td>:</td>
            <!-- Mencetak jurusan -->
            <td><?php echo $p->jurusan ?></td>
        </tr>

        <tr>
            <td>Nama Lengkap</td>
            <td>:</td>
            <!-- Mencetak nama lengkap -->
            <td><?php echo $p->nm_peserta ?></td>
        </tr>

        <tr>
            <td>Email</td>
            <td>:</td>
            <!-- Mencetak nama lengkap -->
            <td><?php echo $p->email ?></td>
        </tr>
        <tr>
            <td>Bukti Pembayaran</td>
            <td>:</td>
            <td><img style="max-width:300px" src="bukti_pembayaran/<?php echo isset($b['bukti_pembayaran']); ?>"></td>
        </tr>
    </table>

    <!-- My JS -->
    <script src="../js/cetak-bukti.js"></script>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="../js/bootstrap.bundle.min.js"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <script src="../js/bootstrap.min.js"></script>
</body>

</html>