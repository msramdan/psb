<?php 
$stat_login = isset($_SESSION['user_login']);
?>
<?php if($stat_login == TRUE):;?>
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
                <ul class="navbar-nav gap-2">
                    <li class="nav-item">
                        <a class="btn btn-primary bi bi-window rounded-pill" href="../index.php"> Halaman Utama</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-primary bi bi-info-circle rounded-pill" href="../user/informasi-pendaftaran.php"> Informasi Pendaftaran</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-warning bi bi-arrow-left-circle rounded-pill" href="../user/logout.php"> Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<?php else:;?>

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
                <ul class="navbar-nav gap-2">
                    <li class="nav-item">
                        <a class="btn btn-primary bi bi-window rounded-pill" href="../index.php"> Halaman Utama</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-primary bi bi-info-circle rounded-pill" href="../user/informasi-pendaftaran.php"> Informasi Pendaftaran</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-warning bi bi-arrow-right-circle rounded-pill" href="../user/login.php"> Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<?php endif;?>