<?php
$config = mysqli_connect("localhost", "root", "", "remedial");

// Memeriksa koneksi
if (!$config) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>