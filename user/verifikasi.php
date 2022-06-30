
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../vendor/autoload.php';

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
$id = $row['id_pendaftaran'];

$token=hash('sha256', md5(date('Y-m-d'))) ;
$insert=mysqli_query($conn,"UPDATE tb_pendaftaran SET token_verifikasi='$token' WHERE id_pendaftaran='$id'");


$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'psbtpaassyfa@gmail.com';                 // SMTP username
    $mail->Password = 'dibggwpftsahowbt';                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                    // TCP port to connect to
    //Recipients
    $mail->setFrom('psbtpaassyfa@gmail.com', 'pmbtpaassyfa');
    $mail->addAddress($email, 'rafael');     // Add a recipient
    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Verifikasi Akun, TPA Assyifa';
    $mail->Body    = "Untuk mengaktifkan akun anda silahkan klik link dibawah ini.
    <a href='http://psb.test/user/aktivasi.php?t=".$token."'>http://psb.test/user/aktivasi.php?t=".$token."</a>  ";
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    $mail->send();
    echo "<script>alert('Kode Verifikasi Sudah Terkirim, Mohon cek email Anda')</script>"; 
    echo '<script>window.location="index.php"</script>';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}

?>

