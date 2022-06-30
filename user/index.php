<?php
// Mengkaitkan file koneksi.php untuk menghubungkan database MySQL
include '../config/koneksi.php';

// Membuat session start agar sessionnya berjalan
session_start();

// Jika session status login tidak sama dengan true / tidak benar
if ($_SESSION['user_login'] != true) {
    // Maka akan dialihkan ke halaman login kembali
    header("Location: login.php");
    exit;
}

$nama_user = $_SESSION['nama'];
$id_pendaftaran = $_SESSION['id'];
$email = $_SESSION['email'];
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
    <link rel="shortcut icon"  href="../img/Logo Assyifa2021.png" />
    <!-- My Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css"> 
    <!-- My CSS -->
    <link rel="stylesheet" href="../css/style.css">

</head>
<body>
    
    <?php include('../_partials/user/navbar.php');?>
    <section class="container mb-3 pt-5 mt-5">
        <div class="row g-0 bg-white p-4 shadow">
            
            <div class="col-md-4">
                <div class="card border-0">
                <img src="../img/img1.svg" class="img-fluid rounded-start" alt="...">
                </div>
            </div>
            <div class="col-md-8">
            <div class="card border-0">
            <div class="card-body">
            <h4 class="card-title">Kode Pendaftaran : <?php echo $row['id_pendaftaran'];?></h4>
            <?php if(isset($row['photo']) == NULL || isset($row['berkas_ijazah_sd']) == NULL || isset($row['berkas_ijazah_smp']) == NULL || isset($row['berkas_ijazah_smk']) == NULL || isset($row['nilai_ijazah_sd']) == NULL || isset($row['nilai_ijazah_smp']) == NULL || isset($row['nilai_ijazah_smk']) == NULL):?>           
                <h6>Mohon Lengkapi Data diri dan Berkas Persyaratan.</h6>
                 <a href="form-berkas.php" class="btn btn-sm btn-primary rounded-pill"><i class="bi bi-person-fill"></i> Lengkapi Data</a>
                <hr>
            <?php endif;?>
            <h5 class="card-title">Terima Kasih telah mendaftar</h5>
            <p class="card-text">Pendaftaran Anda telah <span class="badge rounded-pill bg-success">Sedang direview oleh Admin</span>.</p>
            <?php if($row['status_email'] == 0):?>            
            <span class="card-text">Agar mempermudah proses review, mohon konfirmasi email</span>
            <p>Mohon cek dan verfikasi email : <b><?php echo $row['email'];?></p></b>
            <p>Klik dilink berikut untuk verifikasi : <span class="badge rounded-pill bg-success"><a href="verifikasi.php" class="text-decoration-none text-white">Kirim Aktivasi</a></span></p>
            <?php endif;?>
            <p class="card-text">Kehadiran Anda sangat berarti untuk meningkatkan Visi & Misi kami dalam membangun karakter yang lebih baik.</p>
            <p class="card-text"><small class="text-muted"><?= "Waktu: " . date("Y-m-d h:i:sa"); ?></small></p>

            <a class="btn btn-primary mt-3 rounded-pill" href="bukti-pembayaran.php"><i class="bi bi-cloud-arrow-up-fill"></i> Upload Bukti Pembayaran</a>
            
            <!-- Mengecek Status Pembayaran dan Ada atau tidaknya user di sistem  -->
            <?php if(isset($bayar['id_pendaftaran']) == 0 || isset($bayar['status_pembayaran']) == 0):?>           
            <?php endif;?>
               <!-- Mencetak bukti pendaftaran dari id pendaftaran yang dipanggil dan membukanya pada tab browser baru serta bisa di save ke PDF -->
            <a href="cetak-bukti.php?id=<?php echo $row['id_pendaftaran'] ?>" class="btn btn-success mt-3 rounded-pill"><i class="bi bi-printer-fill"></i> Cetak Bukti Daftar</a>
                </div>
            </div>
            </div>
        </div>
    </section>

    <?php include('../_partials/user/footer.php');?>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="../js/bootstrap.bundle.min.js"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <script src="../js/bootstrap.min.js"></script>

</body>
</html>