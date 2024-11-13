<?php

include "koneksi.php"; // Pastikan koneksi sudah di-include

$id = $_GET['id'];
$id_user = $_SESSION['user']['id_user'];

// Cek koneksi database
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Cek apakah ID dan User ID valid
if (!isset($id) || !isset($id_user)) {
    echo '<script>alert("ID foto atau User ID tidak valid."); location.href="?page=galeri";</script>';
    exit;
}

// Cek apakah user sudah memberikan like sebelumnya
$checkQuery = mysqli_query($koneksi, "SELECT * FROM likefoto WHERE id_foto='$id' AND id_user='$id_user'");
if (mysqli_num_rows($checkQuery) > 0) {
    // Jika sudah ada, lakukan penghapusan
    $deleteQuery = mysqli_query($koneksi, "DELETE FROM likefoto WHERE id_foto='$id' AND id_user='$id_user'");
    if (!$deleteQuery) {
        echo '<script>alert("GAGAL! Error: ' . mysqli_error($koneksi) . '");</script>';
    } else {
        echo '<script>alert("Foto tidak disukai!");</script>';
    }
} else {
    // Jika belum ada, lakukan insert
    $insertQuery = mysqli_query($koneksi, "INSERT INTO likefoto (id_foto, id_user) VALUES ('$id', '$id_user')");
    if (!$insertQuery) {
        echo '<script>alert("GAGAL! Error: ' . mysqli_error($koneksi) . '");</script>';
    } else {
        echo '<script>alert("Foto disukai!"); location.href="?page=galeri";</script>';
    }
}