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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TPA Assyifa</title>

    <!-- My Icon -->
    <link rel="shortcut icon" href="../img/Logo Assyifa2021.png" />

    <!-- My Jquery Data Tables CSS -->
    <!-- <link rel="stylesheet" href="../css/jquery.dataTables.min.css"> -->

    <!-- My Data Tables Bootstrap CSS -->
    <link rel="stylesheet" href="../css/dataTables.bootstrap5.min.css">
 
    <!-- My Swalert -->
    <link rel="../stylesheet" href="swalert/sweetalert2.min.css">
    <script src="../swalert/sweetalert2.min.js"></script>
    <script src="../swalert/sweetalert2.all.min.js"></script>

    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <!-- Bootstrap CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet" >
</head>

<body>

        <?php include('../_partials/admin/navbar.php');?>

    <!-- Bagian content -->
    <section class="mt-5 mb-5 pt-5">
        <h2 class="text-center pt-5">Data Peserta</h2>
        <div class="container table-responsive">
            <a href="cetak/cetak-peserta.php" target="_blank" class="btn btn-primary mb-2 rounded-pill"><i class="bi bi-printer-fill"></i> Print</a>
            <a href="cetak/cetak-peserta-pdf.php" target="_blank" class="btn btn-primary mb-2 rounded-pill"><i class="bi bi-file-earmark-pdf-fill"></i> PDF</a>
            <!-- form search -->
            <form style="margin: 5px;" method="GET" action="data-peserta.php">
                <div class="row">
                    <div class="col-xs-6 col-md-4">
                        <div class="input-group">
                            <input required type="text" class="form-control" placeholder="Masukan Nama" id="search" name="search" autocomplete="off" <?php if (isset($_GET['search'])) { ?> value="<?= $_GET['search'] ?>" <?php } ?> />
                            <div class="input-group-btn">
                                <button class="btn btn-primary" type="submit">
                                    <i class="bi bi-search"></i>
                                </button>
                                <?php if (isset($_GET['search'])) { ?>
                                    <a href="data-peserta.php" class="btn btn-warning" type="submit">
                                        <i class="bi bi-arrow-repeat"></i>
                                    </a>
                                <?php } ?>

                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!-- end form serch -->

            <table id="example" class="table table-borderless table-dark table-striped table-hover" border="1">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th>ID Pendaftaran</th>
                        <th>Nama</th>
                        <th>Nilai</th>
                        <th>Jenis Kelamin</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    if (isset($_GET['search'])) {
                        $time_start = microtime(true);
                        usleep(100);
                        $string = '';
                        $search = $_GET['search'];
                        $query = mysqli_query($conn, "SELECT nm_peserta FROM tb_pendaftaran order by nm_peserta ASC");
                        

                        while (($data = mysqli_fetch_assoc($query))) {
                            $string .= ' ';
                            $string .= $data['nm_peserta'];
                        }

                        $index = BoyerMoore($string, $search);
                        $list_peserta = mysqli_query($conn, "SELECT * FROM tb_pendaftaran WHERE nm_peserta LIKE '%$search%' ORDER BY nm_peserta ASC");
                        $jml_data = mysqli_num_rows($list_peserta);

                        $time_end = microtime(true);
                        $time = $time_end - $time_start;
                    } else {
                        $list_peserta = mysqli_query($conn, "SELECT * FROM tb_pendaftaran");
                    }
                    // Membuat perulangan while untuk menginputkan table data dan menampilkannya dalam satu list data
                    while ($row = mysqli_fetch_array($list_peserta)) {

                    ?>
                        <tr>
                            <td class="text-center"><?php echo $no++ ?></td>
                            <td><?php echo $row['id_pendaftaran'] ?></td>
                            <td><?php echo $row['nm_peserta'] ?></td>
                            <td><?php echo $row['nilai_ijazah_sd'] ?></td>
                            <td><?php echo $row['jk'] ?></td>
                            <?php if($row['status_terima']=="Sedang direview"){ ?>
                                <td><span class="badge rounded-pill bg-gray">Sedang direview</span></td>
                            <?php }else if($row['status_terima']=="Diterima"){ ?>
                                <td><span class="badge rounded-pill bg-success">Diterima</span></td>
                            <?php }else{ ?>
                                <td><span class="badge rounded-pill bg-danger">Tidak Diterima</span></td>
                            <?php } ?>
                            <td class="d-flex gap-2">
                                <a class="btn btn-warning" href="detail-peserta.php?id=<?php echo $row['id_pendaftaran'] ?>"><i class="bi bi-bookmark-check-fill"></i> Detail</a>
                                <a class="btn btn-danger" href="hapus-peserta.php?id=<?php echo $row['id_pendaftaran'] ?>" onclick="return Swal.fire({
                                                                                                                                                    position: 'top-center',
                                                                                                                                                    icon: 'success',
                                                                                                                                                    title: 'Data berhasil dihapus',
                                                                                                                                                    showConfirmButton: false,
                                                                                                                                                    timer: 2000
                                                                                                                                                }); ">
                                    <i class="bi bi-bookmark-x-fill"></i> Hapus</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <?php
            if (isset($_GET['search'])) { ?>

                <?php if ($jml_data > 0) { ?>
                    <div class="col-md-6">
                        <div class="alert alert-success" role="alert">
                            <h6>Data ditemukan pada index karakter ke : <?= $index ?></h6>
                            <!-- List Data : <?= print_r($string); ?> -->
                            Jumlah data ditemukan : <?= $jml_data ?>
                            <p>Waktu Pencarian : <?= $time ?></p>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="col-md-6">
                        <div class="alert alert-danger" role="alert">
                            <h6>Data tidak ditemukan</h6>
                            List Data : <?= print_r($string); ?>
                            Jumlah data ditemukan : 0
                            <p>Waktu Pencarian : <?= $time ?></p>
                        </div>
                    </div>
                <?php  } ?>

            <?php } ?>
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
                    <li class="list-group-item">BAZNAS BAZIZ</li>
                    <li class="list-group-item">Al-Fauz</li>
                    <li class="list-group-item">Assalafy</li>
                    <li class="list-group-item">As-syafiiyah</li>
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

    <!-- My JQuery Data Tables JS -->
    <script src="../js/jquery-3.5.1.js"></script>
    <script src="../js/jquery.dataTables.min.js"></script>

    <!-- My Data Tables Bootstrap JS -->
    <script src="../js/dataTables.bootstrap5.min.js"></script>

    <!-- My Data Tables -->
    <script src="../js/data-tables.js"></script>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="../js/bootstrap.bundle.min.js"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!-- <script src="../js/bootstrap.min.js"></script> -->

</body>

</html>

<?php


function BoyerMoore($text, $pattern)
{
    $patlen = strlen($pattern);
    $textlen = strlen($text);
    $table = makeCharTable($pattern);

    for ($i = $patlen - 1; $i < $textlen;) {
        $t = $i;
        for ($j = $patlen - 1; $pattern[$j] == $text[$i]; $j--, $i--) {
            if ($j == 0) return $i;
        }
        $i = $t;
        if (array_key_exists($text[$i], $table))
            $i = $i + max($table[$text[$i]], 1);
        else
            $i += $patlen;
    }
    return -1;
}

function makeCharTable($string)
{
    $len = strlen($string);
    $table = array();
    for ($i = 0; $i < $len; $i++) {
        $table[$string[$i]] = $len - $i - 1;
    }
    return $table;
}

?>