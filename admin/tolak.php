<?php
include '../config/koneksi.php';
$id = $_GET['id'];

$query = mysqli_query($conn, "UPDATE tb_pendaftaran SET status_terima='Tidak Diterima' WHERE id_pendaftaran='$id'");

if ($query) {
    echo '<script>window.location="data-peserta.php"</script>';
} else {
    echo 'Huft ' . mysqli_error($conn);
}