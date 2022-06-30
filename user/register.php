<?php
// Mengkaitkan file koneksi.php untuk menghubungkan database MySQL
include '../config/koneksi.php';

// Membuat session start agar sessionnya berjalan
session_start();

if (isset($_SESSION["user_login"])) {
    header("Location: ../user/index.php");
    exit;
}

// Jika tombol submit ditekan
if (isset($_POST['submit'])) {
    // Algorimta boyemore
    // Mengambil 1 id terbesar di kolom id_pendaftaran, lalu mengambil 5 buah karakter yang terhitung dari sebelah kanan ke kiri
    $getMaxId = mysqli_query($conn, "SELECT MAX(RIGHT(id_pendaftaran, 4)) AS id FROM tb_pendaftaran");

    // Kemudian menyimpannya dalam bentuk object mysqli_fetch_object
    $d = mysqli_fetch_object($getMaxId);
    $generateID = 'P' . date('Y') . '-' . sprintf("%04s", $d->id + 1);

    // // photo
    // $rand = rand();
    // $ekstensi =  array('png', 'jpg', 'jpeg');
    // $filename = $_FILES['foto']['name'];
    // $ukuran = $_FILES['foto']['size'];
    // $ext = pathinfo($filename, PATHINFO_EXTENSION);
    // $nama_photo = $rand . '_' . $filename;

    // // ijazah
    // $rand2 = rand();
    // $ekstensi2 =  array('pdf');
    // $filename2 = $_FILES['ijazah']['name'];
    // $ukuran2 = $_FILES['ijazah']['size'];
    // $ext2 = pathinfo($filename2, PATHINFO_EXTENSION);
    // $nama_ijazah = $rand2 . '_' . $filename2;

    // Mengamankan dari SQL Injection
    $email    = stripslashes($_POST['email']);
    $email    = mysqli_real_escape_string($conn, $email);
    $password = stripslashes($_POST['password']);
    $password = mysqli_real_escape_string($conn, $password);

    $repass   = stripslashes($_POST['repass']);
    $repass   = mysqli_real_escape_string($conn, $repass);
    // Pengecekan password dan konfirmasi password jika sama maka
    if ($password == $repass) {
        // Mengubah ke md5
        $pass  = md5($password);

        // Function untuk cek email terdaftar atau tidak 
        function cek_email($email, $conn)
        {
            $useremail = mysqli_real_escape_string($conn, $email);
            $query = "SELECT * FROM tb_pendaftaran WHERE email = '$useremail'";
            if ($result = mysqli_query($conn, $query)) return mysqli_num_rows($result);
        }

        if (cek_email($email, $conn) == 0) {
            //insert data ke database
            $sql = "INSERT INTO tb_pendaftaran (id_pendaftaran,tgl_daftar,th_ajaran,jurusan,nm_peserta,tmp_lahir,tgl_lahir,jk,agama,almt_peserta,status_terima,email,password)
                    VALUES ( 
                        '" . $generateID . "',
                        '" . date('Y-m-d') . "',
                        '" . $_POST['th_ajaran'] . "',
                        '" . $_POST['jurusan'] . "',
                        '" . $_POST['nm'] . "',
                        '" . $_POST['tmp_lahir'] . "',
                        '" . $_POST['tgl_lahir'] . "',
                        '" . $_POST['jk'] . "',
                        '" . $_POST['agama'] . "',
                        '" . $_POST['alamat'] . "',
                        '" . "Sedang direview" . "',
                        '" . $email . "',
                        '" . $pass . "'
                    )";

            $input = mysqli_query($conn, $sql);
            // Jika berhasil menginsert data siswa maka akan masuk kedalam file halaman berhasil.php dan menampilkan generate id yang dibuat
            if ($input) :
                // move_uploaded_file($_FILES['foto']['tmp_name'], '../foto/' . $rand . '_' . $filename);
                // move_uploaded_file($_FILES['ijazah']['tmp_name'], '../ijazah/' . $rand2 . '_' . $filename2);
                echo '<script>alert("Registrasi Berhasil");</script>';
                echo '<script>window.location="berhasil.php?id=' . $generateID . '"</script>';
                // Jika gagal menginsert data siswa maka tampilkan kata huft, dan tampilkan errornya kenapa
            else:
                echo 'Huft ' . mysqli_error($conn);
            endif;

        } else {
            echo '<script>alert("Email telah terdaftar")</script>';
        }
    } else {
        echo '<script>alert("Mohon cek pada bagian Password")</script>';
    };
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Santri TPA</title>

    <!-- My Icon -->
    <link rel="shortcut icon" href="../img/Logo Assyifa2021.png" />
    <!-- My Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <link rel="stylesheet" href="../css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>

    <?php include('../_partials/user/navbar.php'); ?>

    <!-- Bagian box formulir -->
    <section class="pt-5 mt-5 mb-5">
        <!-- Bagian form -->
        <form action="" method="post" enctype="multipart/form-data">
            <div class="container card table-responsive p-5 mt-5 mb-5">
                <h4 class="card-title">Formulir Pendaftaran Peserta</h4>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="tahun_ajaran">Tahun Ajaran</label>
                        <input type="text" name="th_ajaran" class="form-control" value="2022/2023" readonly>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="jurusan">Jurusan</label>
                        <select name="jurusan" id="" class="form-control" required>
                                <option value="">--Pilih--</option>
                                <option value="Fiqih">Fiqih</option>
                                <option value="Tauhid">Tauhid</option>
                                <option value="Al-Quran">Al-Quran</option>
                                <option value="Hadist">Hadist</option>
                                <option value="Ijtihad">Ijtihad</option>
                                <option value="Tawasuf">Tawasuf</option>
                        </select>
                    </div>
                </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="namalengkap">Nama Lengkap</label>
                            <input type="text" name="nm" class="form-control" placeholder="Nama Lengkap" autocomplete="off" required>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input type="text" name="tmp_lahir" class="form-control" autocomplete="off" placeholder="Tempat Lahir" required>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="date" name="tgl_lahir" class="form-control" autocomplete="off" required>
                        </div>
                    </div>

                    <div class="row" id="data-2">
                        <div class="col-md-4 mb-3">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Email Aktif" autocomplete="off" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="password">Password</label>
                            <input type="password" name="password" placeholder="Password" class="form-control" autocomplete="off" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="repass">Konfirmasi Password</label>    
                            <input type="password" name="repass" placeholder="Ulangi Password" class="form-control" autocomplete="off" required>
                       
                        </div>
                    </div>  

                    <div class="row" id="data-3">
                        
                        <div class="col-md-4 mb-3">
                            <label for="alamat">Alamat Lengkap</label>
                            <textarea class="form-control radius-0" style="height:100px" name="alamat" id="alamat" cols="30" rows="10" autocomplete="off" required></textarea>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jk" value="Laki-laki">
                                <label class="form-check-label">
                                    Laki-laki
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jk" value="Perempuan">
                                <label class="form-check-label">
                                    Perempuan
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                        <label for="agama">Agama</label>
                        <input class="form-control" value="Islam" name="agama" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        
                    <button type="submit" name="submit" class="btn btn-primary " value="Daftar Sekarang"><i class="bi bi-arrow-right-circle"></i> Daftar Sekarang</button>
                    <button type="reset" class="btn btn-danger " value="Ulangi"><i class="bi bi-layout-text-sidebar"></i> Ulangi</button>

                    </div>
            </div>
        </form>
    </section>

    <?php include('../_partials/user/footer.php'); ?>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="../js/bootstrap.bundle.min.js"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!-- <script src="../js/bootstrap.min.js"></script> -->

</body>

</html>

<script type="text/javascript">
    function validasiEkstensi() {
        var inputFile = document.getElementById('foto');
        var pathFile = inputFile.value;
        var ekstensiOk = /(\.jpg|\.jpeg|\.png)$/i;
        if (!ekstensiOk.exec(pathFile)) {
            alert('Silakan upload file yang memiliki ekstensi .jpeg/.jpg/.png');
            inputFile.value = '';
            return false;
        } else {
            // Preview photo
            if (inputFile.files && inputFile.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('preview').innerHTML = '<iframe src="' + e.target.result + '" style="height:400px; width:600px"/>';
                };
                reader.readAsDataURL(inputFile.files[0]);
            }
        }
    }
</script>
<script type="text/javascript">
    function validasiEkstensiIjazah() {
        var inputFile = document.getElementById('berkas');
        var pathFile = inputFile.value;
        var ekstensiOk = /(\.pdf)$/i;
        if (!ekstensiOk.exec(pathFile)) {
            alert('Silakan upload file yang memiliki ekstensi .pdf');
            inputFile.value = '';
            return false;
        } else {
            // Preview photo
            if (inputFile.files && inputFile.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('preview').innerHTML = '<iframe src="' + e.target.result + '" style="height:400px; width:600px"/>';
                };
                reader.readAsDataURL(inputFile.files[0]);
            }
        }
    }

    $("#txtNumber").keyup(function() {
        var nilai = $('#txtNumber').val();
        console.log(nilai)
        if (nilai) {
            if ($('#txtNumber').val() < 75 || $('#txtNumber').val() > 100) {
                $('#errorMsg').show();
                alert("Nilai ijazah minimal harus 75 dan maximal 100");
            } else {
                $('#errorMsg').hide();
            }
        }

    });
</script>