<?php
// Mengkaitkan file koneksi.php untuk menghubungkan database MySQL
include '../config/koneksi.php';

// Membuat session start agar sessionnya berjalan
session_start();

if (isset($_SESSION["user_login"]) == false) {
    header("Location: ../user/login.php");
    exit;
}

$nama_user = $_SESSION['nama'];
$id_pendaftaran = $_SESSION['id'];
$email = $_SESSION['email'];
$get_pendaftar = mysqli_query($conn, "SELECT * FROM tb_pendaftaran WHERE id_pendaftaran='$id_pendaftaran'");
$row = mysqli_fetch_array($get_pendaftar);

// Jika tombol submit ditekan
if (isset($_POST['submit'])) {
    // photo
    $rand = rand();
    $ekstensi =  array('png', 'jpg', 'jpeg');
    $filename = $_FILES['foto']['name'];
    $ukuran = $_FILES['foto']['size'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    $photo = $rand . '_' . $filename;

    // ijazah SD
    $rand2 = rand();
    $ekstensi2 =  array('pdf');
    $filename2 = $_FILES['ijazah_sd']['name'];
    $ukuran2 = $_FILES['ijazah_sd']['size'];
    $ext2 = pathinfo($filename2, PATHINFO_EXTENSION);
    $berkas_ijazah_sd = $rand2 . '_' . $filename2;
    $nilai_ijazah_sd = $_POST['nilai_sd'];

    // ijazah SMP
    $rand3 = rand();
    $ekstensi3 =  array('pdf');
    $filename3 = $_FILES['ijazah_smp']['name'];
    $ukuran3 = $_FILES['ijazah_smp']['size'];
    $ext3 = pathinfo($filename3, PATHINFO_EXTENSION);
    $berkas_ijazah_smp = $rand3 . '_' . $filename3;
    $nilai_ijazah_smp = $_POST['nilai_smp'];

    // ijazah SMK
    $rand4 = rand();
    $ekstensi4 =  array('pdf');
    $filename4 = $_FILES['ijazah_smk']['name'];
    $ukuran4 = $_FILES['ijazah_smk']['size'];
    $ext4 = pathinfo($filename4, PATHINFO_EXTENSION);
    $berkas_ijazah_smk = $rand4 . '_' . $filename4;
    $nilai_ijazah_smk = $_POST['nilai_smk'];
    
    if($_FILES['ijazah_sd']['name'] != NULL && $_FILES['ijazah_smp']['name'] != NULL && $_FILES['ijazah_smk']['name'] != NULL){
        // Jika Isi data Lengkap
        //insert data ke database
        $sql = "UPDATE tb_pendaftaran SET photo='$photo', berkas_ijazah_sd='$berkas_ijazah_sd', nilai_ijazah_sd='$nilai_ijazah_sd', berkas_ijazah_smp='$berkas_ijazah_smp', nilai_ijazah_smp='$nilai_ijazah_smp', berkas_ijazah_smk='$berkas_ijazah_smk', nilai_ijazah_smk='$nilai_ijazah_smk' WHERE id_pendaftaran='$id_pendaftaran'";
        $input = mysqli_query($conn, $sql);
        // Jika berhasil menginsert data siswa maka akan masuk kedalam file halaman berhasil.php dan menampilkan generate id yang dibuat
        if ($input) :
            move_uploaded_file($_FILES['foto']['tmp_name'], '../foto/' . $rand . '_' . $filename);
            move_uploaded_file($_FILES['ijazah_sd']['tmp_name'], '../ijazah/' . $rand2 . '_' . $filename2);
            move_uploaded_file($_FILES['ijazah_smp']['tmp_name'], '../ijazah/' . $rand3 . '_' . $filename3);
            move_uploaded_file($_FILES['ijazah_smk']['tmp_name'], '../ijazah/' . $rand4 . '_' . $filename4);
            echo '<script>alert("Berhasil Mengupload File");</script>';
            echo '<script>window.location="index.php"</script>';
            // Jika gagal menginsert data siswa maka tampilkan kata huft, dan tampilkan errornya kenapa
        else:
            echo 'Huft ' . mysqli_error($conn);
        endif;

    }elseif($_FILES['ijazah_sd']['name'] != NULL && $_FILES['ijazah_smp']['name'] == NULL && $_FILES['ijazah_smk']['name'] == NULL){
        // Jika yang di isi ijazah sd saja 
        //insert data ke database
        $sql = "UPDATE tb_pendaftaran SET photo='$photo', berkas_ijazah_sd='$berkas_ijazah_sd', nilai_ijazah_sd='$nilai_ijazah_sd' WHERE id_pendaftaran='$id_pendaftaran'";
        $input = mysqli_query($conn, $sql);
        // Jika berhasil menginsert data siswa maka akan masuk kedalam file halaman berhasil.php dan menampilkan generate id yang dibuat
        if ($input) :
            move_uploaded_file($_FILES['foto']['tmp_name'], '../foto/' . $rand . '_' . $filename);
            move_uploaded_file($_FILES['ijazah_sd']['tmp_name'], '../ijazah/' . $rand2 . '_' . $filename2);
            echo '<script>alert("Berhasil Mengupload File");</script>';
            echo '<script>window.location="index.php"</script>';
            // Jika gagal menginsert data siswa maka tampilkan kata huft, dan tampilkan errornya kenapa
        else:
            echo 'Huft ' . mysqli_error($conn);
        endif;
    }
    elseif($_FILES['ijazah_sd']['name'] != NULL && $_FILES['ijazah_smp']['name'] != NULL && $_FILES['ijazah_smk']['name'] == NULL){
        // Jika yang di isi ijazah sd dan smp saja 
        //insert data ke database
        $sql = "UPDATE tb_pendaftaran SET photo='$photo', berkas_ijazah_sd='$berkas_ijazah_sd', berkas_ijazah_smp='$berkas_ijazah_smp', nilai_ijazah_sd='$nilai_ijazah_sd' WHERE id_pendaftaran='$id_pendaftaran'";
        $input = mysqli_query($conn, $sql);
        // Jika berhasil menginsert data siswa maka akan masuk kedalam file halaman berhasil.php dan menampilkan generate id yang dibuat
        if ($input) :
            move_uploaded_file($_FILES['foto']['tmp_name'], '../foto/' . $rand . '_' . $filename);
            move_uploaded_file($_FILES['ijazah_sd']['tmp_name'], '../ijazah/' . $rand2 . '_' . $filename2);
            move_uploaded_file($_FILES['ijazah_smp']['tmp_name'], '../ijazah/' . $rand2 . '_' . $filename3);
            echo '<script>alert("Berhasil Mengupload File");</script>';
            echo '<script>window.location="index.php"</script>';
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
    <title>Berkas Persyaratan Peserta Santri TPA</title>
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
            <div class="container card table-responsive p-5 mb-5">
                <h4 class="card-title">Formulir Berkas Persyaratan</h4>
                <div class="form-group">
                <div class="row">
                <div class="col-md-12 mb-3">
                    <label for="foto">Pas Foto</label>
                    <input type="file" name="foto" class="form-control" autocomplete="on" required id="foto" onchange="return validasiEkstensi()">
                    <div id="fotoHelp" class="form-text text-danger">* Format pas photo ( jpg / jpeg / png )</div>
                </div>
                </div>    
                <div class="row" id="berkas-sd">
                    <div class="col-md-6 mb-3">
                        <label for="ijazah_sd">Berkas Ijazah SD/MI</label>
                        <input type="file" name="ijazah_sd" class="form-control berkas" autocomplete="on" id="berkas_sd" onchange="return validasiEkstensiIjazahSD()">
                        <div id="ijazahsdHelp" class="form-text text-danger">* Format berkas ijazah ( pdf )</div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="ijazah_sd">Nilai Ijazah SD/MI</label>
                        <input type="number" name="nilai_sd" class="form-control" min="75" max="100" autocomplete="on" id="txtNumber">
                        <div id="nilaiHelp" class="form-text text-danger">* Persyaratan penerimaan pendaftaran, nilai ijazah minimal harus 75 dan maximal 100.</div>
                    </div>
                </div>
                <div class="row" id="berkas-smp">
                    <div class="col-md-6 mb-3">
                        <label for="ijazah_smp">Berkas Ijazah SMP/MTS <span class="text-muted">(Optional)</span></label>
                        <input type="file" name="ijazah_smp" class="form-control berkas" autocomplete="on" id="berkas_smp" onchange="return validasiEkstensiIjazahSMP()">
                        <div id="ijazahsdHelp" class="form-text text-danger">* Format berkas ijazah ( pdf )</div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="ijazah_smp">Nilai Ijazah SMP/MTS  <span class="text-muted">(Optional)</span></label>
                        <input type="number" name="nilai_smp" class="form-control" min="75" max="100" autocomplete="on" id="txtNumber">
                        <div id="nilai_smpHelp" class="form-text text-danger">* Persyaratan penerimaan pendaftaran, nilai ijazah minimal harus 75 dan maximal 100.</div>
                    </div>
                </div>
                <div class="row" id="berkas-smk">
                    <div class="col-md-6 mb-3">
                        <label for="ijazah_smk">Berkas Ijazah SMA/SMK <span class="text-muted">(Optional)</span></label>
                        <input type="file" name="ijazah_smk" class="form-control berkas" autocomplete="on" id="berkas_smk" onchange="return validasiEkstensiIjazah()">
                        <div id="ijazahsdHelp" class="form-text text-danger">* Format berkas ijazah ( pdf )</div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="ijazah_smk">Nilai Ijazah SMA/SMK <span class="text-muted">(Optional)</span></label>
                        <input type="number" name="nilai_smk" class="form-control" min="75" max="100" autocomplete="on" id="txtNumber">
                        <div id="nilai_smkHelp" class="form-text text-danger">* Persyaratan penerimaan pendaftaran, nilai ijazah minimal harus 75 dan maximal 100.</div>
                    </div>
                </div>
                </div>
                    <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-primary " value="Submit"><i class="bi bi-arrow-right-circle"></i> Submit</button>
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
    
    function validasiEkstensiIjazahSD() {
        var inputFile = document.getElementById('berkas_sd');
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

</script>
<script type="text/javascript">
    
    function validasiEkstensiIjazahSMP() {
        var inputFile = document.getElementById('berkas_smp');
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
    
    function validasiEkstensiIjazahSMK() {
        var inputFile = document.getElementById('berkas_smk');
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