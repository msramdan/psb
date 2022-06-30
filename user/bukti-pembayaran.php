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
$verifkasi_email = $row['status_email'];
$get_pembayaran = mysqli_query($conn, "SELECT * FROM tb_pembayaran WHERE id_pendaftaran='$id_pendaftaran'");
$bayar = mysqli_fetch_array($get_pembayaran);
$sts_pembayaran = $bayar['status_pembayaran'];
if($sts_pembayaran == 0){
    $status_pembayaran = 'Belum terverifikasi';
}else{
    $status_pembayaran = 'Selesai';
};

// Jika tombol submit ditekan
if (isset($_POST['submit'])) {

    $rand = rand();
    $ekstensi =  array('png', 'jpg', 'jpeg');
    $filename = $_FILES['bukti_pembayaran']['name'];
    $ukuran = $_FILES['bukti_pembayaran']['size'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    $bukti_pembayaran = $rand.'_'.$filename;

    function cek_bukti_pembayaran($id_pendaftaran, $conn)
    {
        $id = mysqli_real_escape_string($conn, $id_pendaftaran);
        $query = "SELECT * FROM tb_pembayaran WHERE id_pendaftaran = '$id'";
        if ($result = mysqli_query($conn, $query)) return mysqli_num_rows($result);
    }
    if (cek_bukti_pembayaran($id_pendaftaran, $conn) == 0) {
    $sql = "INSERT INTO tb_pembayaran (id_pendaftaran,bukti_pembayaran,status_pembayaran)
    VALUES ( 
        '" . $id_pendaftaran . "',
        '" . $bukti_pembayaran . "',
        '" . 0 . "'
    )";
    
    $input = mysqli_query($conn, $sql);
    if ($input) :
        unlink('../user/bukti_pembayaran/'.$bayar['bukti_pembayaran']);
        move_uploaded_file($_FILES['bukti_pembayaran']['tmp_name'], '../user/bukti_pembayaran/' . $bukti_pembayaran);
        echo '<script>alert("Berhasil Mengupload File");</script>';
        echo '<script>window.location="bukti-pembayaran"</script>';
        // Jika gagal menginsert data siswa maka tampilkan kata huft, dan tampilkan errornya kenapa
    else:
        echo 'Huft ' . mysqli_error($conn);
    endif;
    }else{
        $sql = "UPDATE tb_pembayaran SET bukti_pembayaran='$bukti_pembayaran' WHERE id_pendaftaran='$id_pendaftaran'";
        
        $input = mysqli_query($conn, $sql);
        if ($input) :
            unlink('../user/bukti_pembayaran/'.$bayar['bukti_pembayaran']);
            move_uploaded_file($_FILES['bukti_pembayaran']['tmp_name'], '../user/bukti_pembayaran/'.$rand.'_'. $filename);
            echo '<script>alert("Berhasil Mengupload File");</script>';
            echo '<script>window.location="bukti-pembayaran.php"</script>';
            // Jika gagal menginsert data siswa maka tampilkan kata huft, dan tampilkan errornya kenapa
        else:
            echo 'Huft ' . mysqli_error($conn);
        endif;
    }
}


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
        <div class="row g-0 bg-white p-5">
            <div class="col-md-4">
                <h6 class="card-title">Kode Pendaftaran: <p class="card-text"><?php echo $row['id_pendaftaran']; ?></p>
                </h6>
                <?php if ($row['status_email'] == 0) : ?>
                    <p>Mohon cek dan verfikasi email : <?php echo $row['email']; ?></p>
                <?php endif; ?>
                <h6>Nama Peserta : <?php echo $row['nm_peserta']; ?></h6>
                <h6>Status Pembayaran : <span class="badge bg-success"><?php echo $status_pembayaran; ?></span></h6>
                <img class="img-fluid" src="bukti_pembayaran/<?php echo $bayar['bukti_pembayaran'];?>" alt="<?php echo $bayar['bukti_pembayaran'];?>">
            </div>
            <div class="col-md-8">
                <div class="row ">
                    <div class="col-md-12 p-3">
                        <div class="card-body">
                            <h5 class="card-title">Upload Bukti Pembayaran</h5>
                            <p class="card-text">Upload Bukti Pembayaran pada form berikut ini .</p>
                             <form action="" method="POST" class="mb-3" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-2">
                                        <img style="max-height:300px;" id="preview-upload" />
                                    </div>
                                </div>
                                <div class="form-group">

                                    <label for="bukti_pembayaran">Bukti Pembayaran</label>
                                    <input type="file" name="bukti_pembayaran" class="form-control bukti-upload" autocomplete="on" required id="bukti_pembayaran" accept="image/*" onchange="return validasiEkstensi(event)">
                                    <div id="bukti_pembayaranHelp" class="form-text text-danger">* Format Bukti Pembayaran ( jpg / jpeg / png )</div>
                                </div>
                                <button class="btn btn-primary mt-3 rounded-pill" id="submit" name="submit" type="submit"><i class="bi bi-arrow-up-circle"></i> Upload Bukti Pembayaran</button>
                            </form>
                            <span>Setelah upload hubungi kontak yang tertera dan lakukan konfirmasi, atau tunggu 1x24jam.</span>
                           
                            <p class="card-text"><small class="text-muted"><?= "Waktu: " . date("Y-m-d h:i:sa"); ?></small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include('../_partials/user/footer.php'); ?>


    <script type="text/javascript">
        function previewImage(event) {
            var inputFile = document.getElementsByClassName('bukti-upload');
            var pathFile = inputFile.value;
            var ekstensiOk = /(\.jpg|\.jpeg|\.png)$/i;

            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('preview-upload');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
    <?php
    if ($row['status_email'] == 0) : ?>
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


    <?php endif; ?>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="../js/bootstrap.bundle.min.js"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <script src="../js/bootstrap.min.js"></script>

</body>

</html>