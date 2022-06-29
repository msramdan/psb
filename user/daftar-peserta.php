<?php
// Mengkaitkan file koneksi.php untuk menghubungkan database MySQL
include '../config/koneksi.php';
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

    <!-- My Jquery Data Tables CSS -->
    <!-- <link rel="stylesheet" href="../css/jquery.dataTables.min.css"> -->

    <!-- My Data Tables Bootstrap CSS -->
    <link rel="stylesheet" href="../css/dataTables.bootstrap5.min.css">

    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <!-- Bootstrap CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">


</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
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
                        <a class="btn btn-primary bi bi-window rounded-pill" href="../index.php"> Halaman Utama</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Bagian content -->
    <section class="mt-5 mb-5 pt-5">
        <h2 class="text-center pt-5">Daftar Peserta</h2>
        <div class="container table-responsive">

            <!-- form search -->
            <form style="margin: 5px;" method="GET" action="daftar-peserta.php">
                <div class="row">
                    <div class="col-xs-6 col-md-4">
                        <div class="input-group">
                            <input required type="text" class="form-control" placeholder="Masukan Nama" id="search" name="search" autocomplete="off" <?php if (isset($_GET['search'])) { ?> value="<?= $_GET['search'] ?>" <?php } ?> />
                            <div class="input-group-btn">
                                <button class="btn btn-primary" type="submit">
                                    <i class="bi bi-search"></i>
                                </button>
                                <?php if (isset($_GET['search'])) { ?>
                                    <a href="daftar-peserta.php" class="btn btn-warning" type="submit">
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
                        <th>Nilai Ijazah</th>
                        <th>Jurusan</th>
                        <th>Jenis Kelamin</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;

                    // jika ada kata kunci yg ketik
                    if (isset($_GET['search'])) {
                        // start proses microtime
                        $time_start = microtime(true);
                        usleep(100);

                        // proses konvert ke string
                        $string = '';
                        

                        $search = $_GET['search'];
                        
                        $query = mysqli_query($conn, "SELECT nm_peserta FROM tb_pendaftaran order by nm_peserta ASC");

                        while (($data = mysqli_fetch_assoc($query))) {
                            $string .= ' ';
                            $string .= $data['nm_peserta'];
                        }
                        // end proses konvert string

                        // panggil function boyerMoore
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
                            <td><?php echo $row['nilai'] ?></td>
                            <td><?php echo $row['jurusan'] ?></td>
                            <td><?php echo $row['jk'] ?></td>
                            <?php if($row['status_terima']=="Sedang direview"){ ?>
                                <td><span class="badge rounded-pill bg-gray">Sedang direview</span></td>
                            <?php }else if($row['status_terima']=="Diterima"){ ?>
                                <td><span class="badge rounded-pill bg-success">Diterima</span></td>
                            <?php }else{ ?>
                                <td><span class="badge rounded-pill bg-danger">Tidak Diterima</span></td>
                            <?php } ?>
                            
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
                            <!-- List Nama : <?= print_r($string); ?> -->
                            Jumlah data ditemukan : <?= $jml_data ?>
                            <p>Waktu Pencarian : <?= $time ?></p>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="col-md-6">
                        <div class="alert alert-danger" role="alert">
                            <h6>Data tidak ditemukan</h6>
                            <!-- List Nama : <?= print_r($string); ?> -->
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

    <!-- My JQuery Data Tables JS -->
    <script src="../js/jquery-3.5.1.js"></script>
    <script src="../js/jquery.dataTables.min.js"></script>

    <!-- My Data Tables Bootstrap JS -->
    <script src="../js/dataTables.bootstrap5.min.js"></script>

    <!-- My Data Tables -->
    <script src="../js/data-tables.js"></script>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="../js/bootstrap.bundle.min.js"></script>

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