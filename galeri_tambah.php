
<?php

if (!isset($_SESSION['user'])) {
    header('Location: login.php'); 
    exit;
}

// Ambil userid dari session user
$id_user = $_SESSION['user']['id_user'];

$query_check_user = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user = '$id_user'");
if (mysqli_num_rows($query_check_user) == 0) {
    echo '<script>alert("User tidak ditemukan!");</script>';
    exit; 
}

if (isset($_POST['judul'])) {
    $judul =  $_POST['judul'];
    $deskripsi =  $_POST['deskripsi'];
    $id_album =  $_POST['id_album'];
    $tanggal =  $_POST['tanggal'];
    $id_user = $_SESSION['user']['id_user'];

    $gambar = $_FILES['gambar'];
    $nama_gambar = $gambar['name'];

        move_uploaded_file($gambar['tmp_name'], 'gambar/'.$gambar['name']);
        $query = mysqli_query($koneksi, "INSERT INTO foto (judul, deskripsi, id_album, tanggal, gambar, id_user) VALUES ('$judul', '$deskripsi', '$id_album', '$tanggal', '$nama_gambar', '$id_user')");

        if($query > 0) {
            echo '<script>alert("Tambah Data Berhasil");</script>';
    }else{
            echo '<script>alert("File gagal diupload.");</script>';
    }
}
?>

<div class="container-fluid">
    <br><br>
    <a href="?page=galeri" class="btn btn-danger">Kembali</a>
    <br><br>
    <form method="post" enctype="multipart/form-data">
        <table class="table">
            <tr>
                <td width="150">Judul</td>
                <td width="1">:</td>
                <td><input type="text" name="judul" class="form-control" ></td>
            </tr>
            <tr>
                <td>Deskripsi</td>
                <td>:</td>
                <td><input type="text" name="deskripsi" class="form-control" ></td>
            </tr>
            <tr>
                <td>Album</td>
                <td>:</td>
                <td>
                    <select name="id_album" class="form-select form-control" >
                        <?php
                        $al = mysqli_query($koneksi, "SELECT * FROM album");
                        while ($album = mysqli_fetch_array($al)) {
                            ?>
                            <option value="<?php echo $album['id_album']; ?>"><?php echo $album['nama_album']; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Tanggal</td>
                <td>:</td>
                <td><input type="date" name="tanggal" class="form-control" ></td>
            </tr>
            <tr>
                <td>Gambar</td>
                <td>:</td>
                <td><input type="file" name="gambar" class="form-control"></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    </td>
            </tr>
                    </table >
                  </form>
</div>
                   