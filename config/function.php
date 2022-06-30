<?php 



function cek_pendaftar($generateID,$conn){
    $generateID = mysqli_real_escape_string($conn, $generateID);
    $query = "SELECT * FROM id_pendaftaran WHERE id_pendaftaran = '$generateID'";
    if( $input = mysqli_query($conn, $query) ) return mysqli_num_rows($input);
}
?>