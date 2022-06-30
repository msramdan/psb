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

            <div class="col-md-12 text-center">
                <div class="row">
                    <center>
                    <div class="col-md-2">
                        <div class="card border-0 mx-auto">
                            <img src="../img/Logo Assyifa2021.png" class="img-fluid rounded-start" alt="...">
                        </div>
                    </div>
                </center>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card border-0">
                    <div class="card-body">
                        <?php 

                        $nama_user = $_SESSION['nama'];
                        $id_pendaftaran = $_SESSION['id'];
                        $email = $_SESSION['email'];
                        $get_pendaftar = mysqli_query($conn, "SELECT * FROM tb_pendaftaran WHERE id_pendaftaran='$id_pendaftaran'");
                        $row = mysqli_fetch_array($get_pendaftar);
                        $token=$row['token_verifikasi'];
                        $sql_cek=mysqli_query($conn,"SELECT * FROM tb_pendaftaran WHERE token_verifikasi='".$token."' and status_email='0'");
                        $jml_data=mysqli_num_rows($sql_cek);
                        if ($jml_data>0) {
                            //update data users aktif
                            mysqli_query($conn,"UPDATE tb_pendaftaran SET status_email='1' WHERE token_verifikasi='".$token."' and status_email='0'");
                            echo '<div class="alert alert-success text-center">
                                    Akun sudah aktif, dan email berhasil terverifikasi! <a class="badge bg-success" href="index.php">Kembali Ke Dashboard.</a>
                                    </div>';
                        }elseif($row['status_email'] == 1){
                                //data tidak di temukan
                                    echo '<div class="alert alert-warning text-center">
                                   Akun Sudah Terverifikasi
                                    </div>';
                        }else{
                            echo '<div class="alert alert-warning text-center">
                            Token tidak Berlaku
                             </div>';
                        }
                        ?>
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