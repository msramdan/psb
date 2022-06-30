<?php 
    // Mengkaitkan file koneksi.php untuk menghubungkan database MySQL
    include '../config/koneksi.php';

    // Membuat session start agar sessionnya berjalan
    session_start();

    if (isset($_SESSION["user_login"])) {
        header("Location: index.php");
    exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TPA Assyifa</title>

    <!-- My CSS -->
    <link rel="stylesheet" href="../css/style.css">

    <!-- My Icon -->
    <link rel="shortcut icon"  href="../img/Logo Assyifa2021.png" />

    <!-- My Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <!-- My Swalert -->
    <link rel="../stylesheet" href="swalert/sweetalert2.min.css"> 
    <script src="../swalert/sweetalert2.min.js"></script>
    <script src="../swalert/sweetalert2.all.min.js"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">

</head>
<body>

    <?php 
    // Ketika tombol input dari name login ditekan
    if (isset($_POST['login'])) {
        // Mengecek akun admin tersedia atau tidak dan mencari username dari tb_admin yang telah di inputkan kedalam text box user dan password
        // Menggunakan htmlspecialchars untuk mencegah user yang jahil
        $cek = mysqli_query($conn, "SELECT * FROM tb_pendaftaran WHERE email = '".htmlspecialchars($_POST['email'])."' AND password = '".MD5($_POST['password'])."' ");

        // Jika akunnya tersedia maka akan masuk kedalam file halaman beranda.php
        if (mysqli_num_rows($cek) > 0) {
            // Menyimpan data admin yang masuk kedalam object mysqli_fetch_object
            $a = mysqli_fetch_object($cek);
            
            // Membuat session ketika login berhasil
            $_SESSION['user_login'] = TRUE;
            $_SESSION['id'] = $a->id_pendaftaran;
            $_SESSION['nama'] = $a->nm_peserta;
            $_SESSION['email'] = $a->email;
            $_SESSION['status_email'] = $a->status_email;
            echo '<script>window.location="../user/index.php"</script>';

        // Jika akunnya tidak tersedia maka akan mencetak Login Gagal
        } else {
            echo '<script>Swal.fire("Login Gagal", "Email atau password Anda salah", "error")</script>';
        }
    }
    ?>

    <?php include('../_partials/user/navbar2.php');?>
    
    <!-- Bagian main login -->
    <div class="container pt-5 mt-5">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card border-0 shadow rounded-3 my-5">
                    <div class="card-body p-4 p-sm-5">
                        <h5 class="card-title text-center mb-5 fw-light fs-5">LOGIN PESERTA</h5>
                        <form method="post">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="email" id="floatingInput" placeholder="Email" autocomplete="off" required>
                                <label for="floatingInput">Email</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password" autocomplete="off" required>
                                <label for="floatingPassword">Password</label>
                            </div>
                            <div class="d-grid gap-3 mt-5">
                                <button class="btn btn-success btn-login" name="login" value="Login" type="submit"><i class="bi bi-arrow-right-circle"></i> Masuk</button>
                                <a class="btn btn-register border border-dark" href="../user/register.php"><i class="bi bi-layout-text-sidebar"></i> Daftar Peserta</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include('../_partials/user/footer.php');?>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="../js/bootstrap.bundle.min.js"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!-- <script src="../js/bootstrap.min.js"></script> -->
</body>
</html>