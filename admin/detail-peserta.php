<?php
// Mengkaitkan file koneksi.php untuk menghubungkan database MySQL
include '../config/koneksi.php';

// Membuat session start agar sessionnya berjalan
session_start();

// Jika session status login tidak sama dengan true / tidak benar
if ($_SESSION['stat_login'] != true) {

    // Maka akan dialihkan ke halaman login kembali
    header("Location: login.php");
    exit;
}

// Menyeleksi data peserta yang telah didapatkan dari tb_pendaftaran
$peserta = mysqli_query($conn, "SELECT * FROM tb_pendaftaran WHERE id_pendaftaran = '" . $_GET['id'] . "' ");

// Kemudian menyimpannya dalam bentuk object mysqli_fetch_object
$p = mysqli_fetch_object($peserta);

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

</head>

<body>

    <!-- Bagian navbar -->
    <nav class="navbar navbar-expand-lg nav-tabs navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="../img/Logo Assyifa2021.png" alt="" width="30" height="24" class="d-inline-block align-text-top">
                TPA Assyifa
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-white" aria-current="page" href="beranda.php"><i class="bi bi-window"></i> Beranda</a>
                    </li>
                    <li class="nav-item">
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="data-peserta.php"><i class="bi bi-bar-chart-fill"></i> Data Peserta</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-fill"></i> <?php echo $_SESSION['nama']; ?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item text-center bi bi-power" href="../user/keluar.php"> Keluar</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Bagian content -->
    <section class="mt-5 mb-5 pt-5">
        <h2 class="text-center pt-5">Detail Peserta</h2>
        <div class="container table-responsive">
            <a href="../user/cetak-bukti.php?id=<?php echo $_GET['id'] ?>" target="_blank" class="btn btn-primary mb-2 rounded-pill"><i class="bi bi-printer-fill"></i> Print</a>
            <a href="../admin/terima.php?id=<?php echo $_GET['id'] ?>"  onclick="return confirm('Yakin Terima Pendaftaran ?')" class="btn btn-success mb-2 rounded-pill"> Terima Pendaftaran</a>
            <a href="../admin/tolak.php?id=<?php echo $_GET['id'] ?>"  onclick="return confirm('Yakin Tolak Pendaftaran?') " class="btn btn-danger mb-2 rounded-pill"> Tolak Pendaftaran</a>

            <table class="table table-borderless table-striped table-light" border="0">
                <tr>
                    <td>Kode Pendaftaran</td>
                    <td>:</td>
                    <!-- Mencetak id pendaftaran -->
                    <td><?php echo $p->id_pendaftaran ?></td>
                </tr>

                <tr>
                    <td>Tahun Ajaran</td>
                    <td>:</td>
                    <!-- Mencetak tahun ajaran -->
                    <td><?php echo $p->th_ajaran ?></td>
                </tr>

                <tr>
                    <td>Jurusan</td>
                    <td>:</td>
                    <!-- Mencetak jurusan -->
                    <td><?php echo $p->jurusan ?></td>
                </tr>

                <tr>
                    <td>Status</td>
                    <td>:</td>

                    <?php if ($p->status_terima == "Sedang direview") { ?>
                        <td><span class="badge rounded-pill bg-black">Sedang direview</span></td>
                    <?php } else if ($p->status_terima == "Diterima") { ?>
                        <td><span class="badge rounded-pill bg-success">Diterima</span></td>
                    <?php } else { ?>
                        <td><span class="badge rounded-pill bg-danger">Tidak Diterima</span></td>
                    <?php } ?>


                </tr>

                <tr>
                    <td>Nama Lengkap</td>
                    <td>:</td>
                    <!-- Mencetak nama lengkap -->
                    <td><?php echo $p->nm_peserta ?></td>
                </tr>

                <tr>
                    <td>Nilai Ijazah SD</td>
                    <td>:</td>
                    <!-- Mencetak nama lengkap -->
                    <td><?php echo $p->nilai_ijazah_sd ?></td>
                </tr>
                
                <tr>
                    <td>Nilai Ijazah SMP</td>
                    <td>:</td>
                    <!-- Mencetak nama lengkap -->
                    <td><?php echo $p->nilai_ijazah_smp ?></td>
                </tr>

                <tr>
                    <td>Nilai Ijazah SMK</td>
                    <td>:</td>
                    <!-- Mencetak nama lengkap -->
                    <td><?php echo $p->nilai_ijazah_smk ?></td>
                </tr>
                <tr>
                    <td>Tempat, Tanggal Lahir</td>
                    <td>:</td>
                    <!-- Mencetak tempat, tanggal lahir -->
                    <td><?php echo $p->tmp_lahir . ', ' . $p->tgl_lahir ?></td>
                </tr>

                <tr>
                    <td>Jenis Kelamin</td>
                    <td>:</td>
                    <!-- Mencetak Jenis Kelamin -->
                    <td><?php echo $p->jk ?></td>
                </tr>

                <tr>
                    <td>Agama</td>
                    <td>:</td>
                    <!-- Mencetak agama -->
                    <td><?php echo $p->agama ?></td>
                </tr>

                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <!-- Mencetak Alamat -->
                    <td><?php echo $p->almt_peserta ?></td>
                </tr>
                <tr>
                    <td>Photo</td>
                    <td>:</td>
                    <!-- Mencetak Alamat -->
                    <td><img src="../foto/<?=$p->photo ?>" width="150" height="auto" /></td>
                </tr>
                <tr>
                    <td>Berkas Ijazah</td>
                    <td>:</td>
                    <!-- Mencetak Alamat -->
                    <td>
                        <?php if($p->berkas_ijazah_sd != NULL):?>
                        <a href="../ijazah/<?= $p->berkas_ijazah_sd ?>">Download</a>
                        <?php else:?>
                            <span class="badge badge-lg rounded-pill bg-danger">Belum Upload </span>
                        <?php endif;?>
                    </td>
                </tr>
            </table>
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
                    <li class="list-group-item">GOJEK</li>
                    <li class="list-group-item">GRAB</li>
                    <li class="list-group-item">JNE</li>
                    <li class="list-group-item">PT. POS Indonesia</li>
                    <li class="list-group-item">TIKI</li>
                </ul>
            </div>
            <div class="col-md-3">
                <ul class="list-group">
                    <li class="list-group-item active bg-secondary">Hubungi Kami</li>
                    <li class="list-group-item">0813 8456 6778</li>
                    <li class="list-group-item">assyifa@gmail.com</li>
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
    <!-- <script src="../js/bootstrap.min.js"></script> -->

</body>

</html>