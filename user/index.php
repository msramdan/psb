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
$id_peserta = $row['id_pendaftaran'];
$get_pembayaran = mysqli_query($conn, "SELECT * FROM tb_pembayaran WHERE id_pendaftaran='$id_peserta'");
$bayar = mysqli_fetch_array($get_pembayaran);
$statusbayar = $bayar['status_pembayaran'];
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
            
            <div class="col-md-3">
                <div class="card border-0 mb-2">
                <img src="../img/img1.svg" class="img-fluid rounded-start" alt="...">
                </div>
                
            </div>
            <div class="col-md-9">
            <div class="card border-0">
            <div class="card-body">
            <h4 class="card-title">Kode Pendaftaran : <?php echo $row['id_pendaftaran'];?></h4>
            <?php if($row['status_terima'] == 'Diterima'):?>
            <h5 class="card-title">Terima Kasih telah mendaftar</h5>
            <p class="card-text">Selamat!, Status Pendaftaran anda telah <span class="badge rounded-pill bg-success">Diterima</span>.</p>
            <?php else:?>
            <h5 class="card-title">Terima Kasih telah mendaftar</h5>
            <p class="card-text">Pendaftaran anda <span class="badge rounded-pill bg-success">Sedang direview oleh Admin</span> Tunggu informasi lebih lanjut.</p>
            <?php endif;?>
            <table class="table table-bordered table-responsive mb-3">
                <tr>
                    <td>Nama Peserta</td>
                    <td> <?php echo $row['nm_peserta'];?></td>
                </tr>
            <?php if($row['status_email'] == 1):?>  
                <tr>
                    <td>Email</td>
                    <td> <?php echo $row['email'];?> <span class="badge rounded-pill bg-success">Terverifikasi</span></td>
                </tr>      
            <?php elseif($row['status_email'] == 0):?>
                
                <tr>
                    <td>Email</td>
                    <td> <?php echo $row['email'];?> <span class="badge rounded-pill bg-danger">Belum terverifikasi</span></td>
                </tr>     
            <?php endif;?>
                <td>Tanggal Daftar</td>
                    <td> <?php echo $row['tgl_daftar'];?></td>
                </tr>
                <td>Tahun Ajaran</td>
                    <td> <?php echo $row['th_ajaran'];?></td>
                </tr>
                <td>Jurusan</td>
                    <td> <?php echo $row['jurusan'];?></td>
                </tr>
                
                <td>Berkas Terkumpul</td>
                <td>
                <?php if($row['photo'] > 0):?>  
                    <span class="badge rounded-pill bg-dark">Pas foto</span> 
                <?php endif;?>
                
                <?php if($row['berkas_ijazah_sd'] > 0):?>  
                    <span class="badge rounded-pill bg-danger">Ijazah SD</span> 
                <?php endif;?>
                
                <?php if($row['berkas_ijazah_smp'] > 0):?>  
                    <span class="badge rounded-pill bg-primary">Ijazah SMP</span> 
                <?php endif;?>

                <?php if($row['berkas_ijazah_smk'] > 0):?>  
                    <span class="badge rounded-pill bg-info">Ijazah SMK</span> 
                <?php endif;?>
                
                </td>
                </tr>
                
            <?php if($row['status_terima'] != 'Diterima' ):?>    
                <tr>
                    <td></td>
                    <td>     <a href="form-berkas.php" class="btn btn-sm btn-primary rounded-pill"><i class="bi bi-paperclip"></i> Lengkapi Berkas</a>
                    </td>
                </tr>
            <?php else:?>
                  
                <tr>
                    <td>Status</td>
                    <td><b>Diterima</b>
                    </td>
                </tr>
            <?php endif;?>
            </table>
            <?php if($row['status_email'] == 0):?>            
            <span class="card-text">Agar mempermudah proses review, mohon konfirmasi email</span>
            <p>Mohon cek dan verfikasi email : <b><?php echo $row['email'];?></p></b>
            <p>Klik dilink berikut untuk verifikasi : <span class="badge rounded-pill bg-success"><a href="verifikasi.php" class="text-decoration-none text-white">Kirim Aktivasi</a></span></p>
            <?php endif;?>
            <p class="card-text">Kehadiran Anda sangat berarti untuk meningkatkan Visi & Misi kami dalam membangun karakter yang lebih baik.</p>
            <p class="card-text"><small class="text-muted"><?= "Waktu: " . date("Y-m-d h:i:sa"); ?></small></p>
            <?php if($row['status_terima'] == 'Diterima' ):?>    
                <a class="btn btn-primary mt-3 rounded-pill" href="bukti-pembayaran.php"><i class="bi bi-cloud-arrow-up-fill"></i> Upload Bukti Pembayaran</a>     
            <?php endif;?>          
            <!-- Mengecek Status Pembayaran dan Ada atau tidaknya user di sistem  -->
            <?php if(isset($status_pembayaran) == 1 && $row['status_terima'] == 'Diterima' ):?> 
                    <!-- Mencetak bukti pendaftaran dari id pendaftaran yang dipanggil dan membukanya pada tab browser baru serta bisa di save ke PDF -->
            <a href="cetak-bukti.php?id=<?php echo $row['id_pendaftaran'] ?>" class="btn btn-success mt-3 rounded-pill"><i class="bi bi-printer-fill"></i> Cetak Bukti Daftar</a>
            <?php endif;?>
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