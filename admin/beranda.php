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
    <title>TPA Assyifa </title>

    <!-- My Icon -->
    <link rel="shortcut icon" href="../img/Logo Assyifa2021.png" />

    <!-- My Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="https://code.highcharts.com/modules/drilldown.js"></script>


</head>

<body>

    <?php include('../_partials/admin/navbar.php');?>

    <!-- Bagian content -->
    <div class="mt-5 mb-5 pt-5">
        <!-- <h2 class="text-center pt-5">Beranda</h2> -->
        <div class="container mb-3">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="../img/img3.svg" class="img-fluid rounded-start">
                </div>
                <div class="col-md-8 p-5">
                    <div class="card-body">
                        <h5 class="card-title">Halo <?php echo $_SESSION['nama'] ?>, Selamat Datang di beranda Admin</h5>
                        <p>
                            Bila ada kendala silahkan kontak Pengembang
                        </p>
                        <a class="btn btn-secondary rounded-pill" target="_blank" href="https://api.whatsapp.com/send?phone=6281384566778&text=Permisi%20Kak%20Saya%20butuh%20bantuan%20nih%20...">
                            <i class="bi bi-whatsapp"></i> Pengembang</a>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="container mb-3">
            <center>
                <h3>Statistik Penerimaan Pendaftaran</h3>
            </center>
            <br>
            <div class="row g-0">
                <div class="col-md-4">
                    <div class="card-body">
                        <figure class="highcharts-figure">
                            <div id="container2"></div>
                        </figure>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-body">
                        <figure class="highcharts-figure">
                            <div id="container"></div>
                        </figure>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-body">
                        <figure class="highcharts-figure">
                            <div id="container3"></div>
                        </figure>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="container mb-3">
            <div class="row g-0">
                <div class="col-md-8 p-5">
                    <div class="card-body">
                        <h5 class="text-end">Hai <?php echo $_SESSION['nama'] ?>, Jangan lupa pakai masker</h5>
                        <p class="text-end">Karena jumlah kasus Covid-19 di Indonesia masih meningkat, untuk keselamatan dan kenyamanan dalam bekerja jangan lupa tetap pakai masker dan taati peraturan Prokes yang ada.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <img src="../img/img2.svg" class="img-fluid rounded-start">
                </div>
            </div>
        </div>

    </div>

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
                    <li class="list-group-item">AL-FAUZ</li>
                    <li class="list-group-item">Assalafy</li>
                    <li class="list-group-item">As-Syafiiyah</li>
                    <li class="list-group-item">PonPes Al-'Itqon</li>
                </ul>
            </div>
            <div class="col-md-3">
                <ul class="list-group">
                    <li class="list-group-item active bg-secondary">Hubungi Kami</li>
                    <li class="list-group-item">0813 8456 6778</li>
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

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="../js/bootstrap.bundle.min.js"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!-- <script src="../js/bootstrap.min.js"></script> -->
</body>
<?php

$totalData = "SELECT COUNT(`id_pendaftaran`) AS total FROM `tb_pendaftaran`";
$totalData2 = mysqli_query($conn, $totalData);
$fixTotal = mysqli_fetch_object($totalData2);

$perempuan = "SELECT COUNT(`id_pendaftaran`) AS total FROM `tb_pendaftaran` where jk='Perempuan'";
$resultPerempuan = mysqli_query($conn, $perempuan);
$rowPerempuan = mysqli_fetch_object($resultPerempuan);
$persentaseP = ($rowPerempuan->total /  $fixTotal->total) *100;

$laki = "SELECT COUNT(`id_pendaftaran`) AS total FROM `tb_pendaftaran` where jk='Laki-laki'";
$resultLaki = mysqli_query($conn, $laki);
$rowLaki = mysqli_fetch_object($resultLaki);
$persentaseL = ($rowLaki->total /  $fixTotal->total) *100;



//teriam
$terima = "SELECT COUNT(`id_pendaftaran`) AS total FROM `tb_pendaftaran` where status_terima='Diterima'";
$terimaHasil = mysqli_query($conn, $terima);
$fixTerima = mysqli_fetch_object($terimaHasil);
// tolak
$tolak = "SELECT COUNT(`id_pendaftaran`) AS total FROM `tb_pendaftaran` where status_terima='Tidak Diterima'";
$tolakHasil = mysqli_query($conn, $tolak);
$fixTolak = mysqli_fetch_object($tolakHasil);
// review
$review = "SELECT COUNT(`id_pendaftaran`) AS total FROM `tb_pendaftaran` where status_terima='Sedang direview'";
$reviewHasil = mysqli_query($conn, $review);
$fixReview = mysqli_fetch_object($reviewHasil);

// Fiqih
$f = "SELECT COUNT(`id_pendaftaran`) AS total FROM `tb_pendaftaran` where jurusan='Fiqih'";
$fi = mysqli_query($conn, $f);
$fiq = mysqli_fetch_object($fi);
// Tauhid
$t = "SELECT COUNT(`id_pendaftaran`) AS total FROM `tb_pendaftaran` where jurusan='Tauhid'";
$ta = mysqli_query($conn, $t);
$tau = mysqli_fetch_object($ta);
// Al-Quran
$a = "SELECT COUNT(`id_pendaftaran`) AS total FROM `tb_pendaftaran` where jurusan='Al-Quran'";
$al = mysqli_query($conn, $a);
$alq = mysqli_fetch_object($al);
// Hadist
$h = "SELECT COUNT(`id_pendaftaran`) AS total FROM `tb_pendaftaran` where jurusan='Hadist'";
$ha = mysqli_query($conn, $h);
$had = mysqli_fetch_object($ha);
// Ijtihad
$i = "SELECT COUNT(`id_pendaftaran`) AS total FROM `tb_pendaftaran` where jurusan='Ijtihad'";
$ij = mysqli_query($conn, $i);
$ijt = mysqli_fetch_object($ij);
// Tawasuf
$w = "SELECT COUNT(`id_pendaftaran`) AS total FROM `tb_pendaftaran` where jurusan='Tawasuf'";
$wa = mysqli_query($conn, $w);
$was = mysqli_fetch_object($wa);




?>

</html>

<script>
    // Radialize the colors
    Highcharts.setOptions({
        colors: Highcharts.map(Highcharts.getOptions().colors, function(color) {
            return {
                radialGradient: {
                    cx: 0.5,
                    cy: 0.3,
                    r: 0.7
                },
                stops: [
                    [0, color],
                    [1, Highcharts.color(color).brighten(-0.3).get('rgb')] // darken
                ]
            };
        })
    });

    // Build the chart
    Highcharts.chart('container', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Berdasarkan Jenis Kelamin'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '{point.percentage:.1f} %',
                    connectorColor: 'silver'
                }
            }
        },

        series: [{
            name: 'Share',
            data: [{
                    name: 'Perempuan',
                    y: <?= $persentaseP?>
                },
                {
                    name: 'Laki-Laki',
                    y: <?= $persentaseL?>
                },

            ]
        }]
    });
</script>


<!-- 2 -->
<script>
    Highcharts.chart('container2', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Bedasarkan Jurusan'
        },
        xAxis: {
            type: 'category',
            labels: {
                rotation: -45,
                style: {
                    fontSize: '13px',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Jumlah Pendaftar'
            }
        },
        legend: {
            enabled: false
        },
        tooltip: {
            pointFormat: '<b>{point.y:.0f} Jumlah Pendaftar</b>'
        },
        series: [{
            name: 'Total',
            data: [
                ['Fiqih', <?= $fiq->total  ?>],
                ['Tauhid', <?= $tau->total  ?>],
                ['Al-Quran', <?= $alq->total  ?>],
                ['Hadist', <?= $had->total  ?>],
                ['Ijtihad', <?= $ijt->total  ?>],
                ['Tawasuf', <?= $was->total  ?>]

            ],
            dataLabels: {
                enabled: true,
                rotation: -90,
                color: '#FFFFFF',
                align: 'right',
                format: '{point.y:.0f}', // one decimal
                y: 10, // 10 pixels down from the top
                style: {
                    fontSize: '13px',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
        }]
    });
</script>
<!-- 3 -->
<script>
    // Create the chart
    Highcharts.chart('container3', {
        chart: {
            type: 'column'
        },
        title: {
            align: 'left',
            text: 'Bedasarkan Status Penerimaan'
        },
        accessibility: {
            announceNewData: {
                enabled: true
            }
        },
        xAxis: {
            type: 'category'
        },
        yAxis: {
            title: {
                text: 'Jumlah Pendaftar'
            }

        },
        legend: {
            enabled: false
        },
        plotOptions: {
            series: {
                borderWidth: 0,
                dataLabels: {
                    enabled: true,
                    format: '{point.y:.0f}'
                }
            }
        },

        tooltip: {
            headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
            pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.0f}</b><br/>'
        },

        series: [{
            name: "Jumlah Pendaftar",
            colorByPoint: true,
            data: [{
                    name: "Diterima",
                    y: <?= $fixTerima->total ?>,
                    drilldown: null
                },
                {
                    name: "Tidak Diterima",
                    y: <?= $fixTolak->total ?>,
                    drilldown: null
                },
                {
                    name: "Sedang direview",
                    y: <?= $fixReview->total ?>,
                    drilldown: null
                }
            ]
        }],
    });
</script>