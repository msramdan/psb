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
$verifkasi_email = $row['verifikasi_email'];
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
    <!-- My Swalert -->
    <link rel="../stylesheet" href="swalert/sweetalert2.min.css"> 
    <script src="../swalert/sweetalert2.min.js"></script>
    <script src="../swalert/sweetalert2.all.min.js"></script>
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
        <div class="row g-0 bg-white p-5">
            <div class="col-md-4">
            <h4 class="card-title">Kode Pendaftaran: <p class="card-text"><?php echo $row['id_pendaftaran'];?></p></h4>
            <?php if($row['verifikasi_email'] == 0):?>
            <p>Mohon cek dan verfikasi email : <?php echo $row['email'];?></p>
            <?php endif;?>
               <!-- Mencetak bukti pendaftaran dari id pendaftaran yang dipanggil dan membukanya pada tab browser baru serta bisa di save ke PDF -->
            <a href="cetak-bukti.php?id=<?php echo $row['id_pendaftaran'] ?>" target="_blank" class="btn btn-success mt-3 rounded-pill"><i class="bi bi-printer-fill"></i> Cetak Bukti Daftar</a>
            <a class="btn btn-primary mt-3 rounded-pill" href="bukti-pembayaran.php"><i class="bi bi-cloud-arrow-up-fill"></i> Upload Bukti Pembayaran</a>
            </div>
            <div class="col-md-8">
            <div class="row ">
                <div class="col-md-4">
                    <img src="../img/img1.svg" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8 p-3">
                    <div class="card-body">
                        <h5 class="card-title">Upload Bukti Pembayaran</h5>
                        <p class="card-text">Kode  <span class="badge rounded-pill bg-success">Sedang direview oleh Admin</span>.</p>
                        <p class="card-text">Agar mempermudah proses review, mohon konfirmasi email</p>
                        <p class="card-text">Kehadiran Anda sangat berarti untuk meningkatkan Visi & Misi kami dalam membangun karakter yang lebih baik.</p>
                        <p class="card-text"><small class="text-muted"><?= "Waktu: " . date("Y-m-d h:i:sa"); ?></small></p>
                    </div> 
                </div>
            </div>
            </div>
        </div>
    </section>

    <?php include('../_partials/user/footer.php');?>
<?php 
if ($row['verifikasi_email'] == 0):?>
<script>
    setTimeout(function() {
        Swal.fire({
            title: 'Oops...',
            text: 'Mohon Verifikasi Email terlebih dahulu, Cek email anda untuk memverifikasi akun!',
            icon: 'error',
        }).then(function() {
    window.location = "index.php";
});
    });
</script>
<?php endif;?> 
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="../js/bootstrap.bundle.min.js"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <script src="../js/bootstrap.min.js"></script>

</body>
</html>