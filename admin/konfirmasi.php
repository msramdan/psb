<?php
include '../config/koneksi.php';

$id = $_GET['id'];
$query = mysqli_query($conn, "UPDATE tb_pembayaran SET status_pembayaran='1' where id_pendaftaran='$id'");

if ($query) {
    echo '<script>window.location="data-pembayaran.php"</script>';
} else {
    echo 'Huft ' . mysqli_error($conn);
}