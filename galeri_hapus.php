<?php
$id = $_GET['id'];

$query = mysqli_query($koneksi, "DELETE FROM foto where id_foto=$id ");

if($query > 0 ) {
    echo '<script>alert("hapus data berhasil"]; location.href:"login.php";</script>';
} else {
    echo '<script>alert("hapus data gagal");</script>';
}
?>