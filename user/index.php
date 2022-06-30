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
        <div class="row g-0 bg-white p-5">
            <div class="col-md-4">
                <img src="../img/img1.svg" class="img-fluid rounded-start" alt="...">
            </div>
        <div class="col-md-8 p-3">
            <div class="card-body">
                <h5 class="card-title">Terima Kasih telah mendaftar</h5>
                <p class="card-text">Pendaftaran Anda telah <span class="badge rounded-pill bg-success">Sedang direview oleh Admin</span>.</p>
                <p class="card-text">Agar mempermudah proses review, mohon konfirmasi email</p>
                <p class="card-text">Kehadiran Anda sangat berarti untuk meningkatkan Visi & Misi kami dalam membangun karakter yang lebih baik.</p>
                <p class="card-text"><small class="text-muted"><?= "Waktu: " . date("Y-m-d h:i:sa"); ?></small></p>
            </div>
        </div>
    </section>

    <!-- Bagian box formulir -->
    <section class="container card text-center mt-5 mb-5">
        <div class="card-header">
            <h2>Selamat Datang <?php echo $row['nm_peserta'];?></h2>
        </div>

        <!-- Jika pendaftaran siswa berhasil maka kode pendaftaran siswa akan diambil / dipanggil dari data id -->
        <div class="card-body">
            <h4 class="card-title">Kode Pendaftaran Anda adalah: <p class="card-text"><?php echo $row['id_pendaftaran'];?></p></h4>
            <p>Mohon cek dan verfikasi email : <?php echo $row['email'];?></p>
            <!-- Mencetak bukti pendaftaran dari id pendaftaran yang dipanggil dan membukanya pada tab browser baru serta bisa di save ke PDF -->
            <a href="cetak-bukti.php?id=<?php echo $_GET['id'] ?>" target="_blank" class="btn btn-success mt-3 rounded-pill"><i class="bi bi-printer-fill"></i> Cetak Bukti Daftar</a>

        </div>
    </section>

    <footer class="bg-dark text-white p-5">
        <div class="row">
            <div class="col-md-3">
                <ul class="list-group">
                    <li class="list-group-item active bg-secondary">LAYANAN APLIKASI</li>
                    <li class="list-group-item">Pusat Pendaftaran</li>
                    <li class="list-group-item">Cara Pendaftaran</li>
                    <li class="list-group-item">Informasi</li>
                    <li class="list-group-item">Alumni</li>
                </ul>
            </div>
            <div class="col-md-3">
                <ul class="list-group">
                <li class="list-group-item active bg-secondary">TENTANG APLIKASI</li>
                <li class="list-group-item">
                <p>
                    Sistem pembelajaran elektronik atau e-pembelajaran dapat didefinisikan sebagai sebuah bentuk teknologi 
                    informasi yang diterapkan di bidang pendidikan berupa situs web yang dapat diakses di mana saja. E-learning 
                    merupakan dasar dan konsekuensi logis dari perkembangan teknologi informasi dan komunikasi.
                </p>              
                </li>
                </ul>
            </div>
            <div class="col-md-3">
                <ul class="list-group">
                <li class="list-group-item active bg-secondary">Mitra Kerja Sama</li>
                    <li class="list-group-item">Baznas Baziz</li>
                    <li class="list-group-item">AL-Fauz</li>
                    <li class="list-group-item">Assalafy</li>
                    <li class="list-group-item">As-Syafiiyah</li>
                    <li class="list-group-item">PonPes Al-'Itqon</li>
                </ul>
            </div>
            <div class="col-md-3">
                <ul class="list-group">
                    <li class="list-group-item active bg-secondary">Hubungi Kami</li>
                    <li class="list-group-item">0813-8456-6778</li>
                    <li class="list-group-item">tpaassyifa@gmail.com</li>
                </ul>
            </div>
    
            <div class="col-md-3"></div>
            <div class="col-md-3"></div>
            <div class="col-md-3"></div>
        </div>
    </footer>

    <div class="copyright text-center text-white font-weight-bold bg-dark p-2">
        <p>Bahrul Anwar &copy; 2022</p>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="../js/bootstrap.bundle.min.js"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <script src="../js/bootstrap.min.js"></script>

</body>
</html>