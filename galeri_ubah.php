<?php
include "koneksi.php"; // Pastikan koneksi database sudah terhubung

$id = $_GET['id']; 

// Ambil data foto untuk ditampilkan dalam form
$dataQuery = mysqli_query($koneksi, "SELECT * FROM foto WHERE id_foto = $id");
$data = mysqli_fetch_assoc($dataQuery);

if (isset($_POST['judul'])) {
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];
    $id_album = $_POST['id_album'];
    $tanggal = $_POST['tanggal'];
    $id_user = $_SESSION['user']['id_user'];

    // Update foto
    $query = mysqli_query($koneksi, "UPDATE foto SET judul='$judul', deskripsi='$deskripsi', id_album='$id_album', tanggal='$tanggal', id_user='$id_user' WHERE id_foto=$id");

    $gambar = $_FILES['gambar'];

    if ($gambar['name'] != "") {
        $nama_gambar = $gambar['name'];
        move_uploaded_file($gambar['tmp_name'], 'gambar/' . $nama_gambar);
        $query_gambar = mysqli_query($koneksi, "UPDATE foto SET gambar='$nama_gambar' WHERE id_foto=$id");
    }

    // Cek keberhasilan query
    if ($query && (!isset($query_gambar) || $query_gambar)) {
        echo '<script>alert("Ubah data berhasil"); location.href="?page=galeri";</script>';
    } else {
        echo '<script>alert("Ubah data gagal");</script>';
    }
}
?>

<div class="container-fluid">
    <h1 class="mt-4">Galeri Foto</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Galeri Foto</li>
    </ol>
    <form method="post" enctype="multipart/form-data">
        <table class="table">
            <tr>
                <td width="200">Judul</td>
                <td width="1">:</td>
                <td><input type="text" name="judul" value="<?php echo htmlspecialchars($data['judul']); ?>" class="form-control" required></td>
            </tr>
            <tr>
                <td>Deskripsi</td>
                <td>:</td>
                <td><input type="text" name="deskripsi" value="<?php echo htmlspecialchars($data['deskripsi']); ?>" class="form-control" required></td>
            </tr>
            <tr>
                <td>Album</td>
                <td>:</td>
                <td>
                    <select name="id_album" class="form-select form-control" required>
                        <?php
                        $a1 = mysqli_query($koneksi, "SELECT * FROM album");
                        while ($album = mysqli_fetch_array($a1)) {
                        ?>
                            <option 
                                <?php if ($data['id_album'] == $album['id_album']) echo 'selected'; ?>
                                value="<?php echo $album['id_album']; ?>">
                                <?php echo htmlspecialchars($album['nama_album']); ?>
                            </option>
                        <?php
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Tanggal</td>
                <td>:</td>
                <td><input type="date" name="tanggal" value="<?php echo htmlspecialchars($data['tanggal']); ?>" class="form-control" required></td>
            </tr>
            <tr>
                <td>Gambar</td>
                <td>:</td>
                <td>
                    <input type="file" name="gambar" class="form-control">
                    <br>
                    <a href="galeri/<?php echo htmlspecialchars($data['gambar']); ?>" target="_blank">
                        <img src="gambar/<?php echo htmlspecialchars($data['gambar']); ?>" width="200" alt="gambar">
                    </a>  
                    <br>
                    <i class="text-danger">*Kosongkan saja jika tidak diganti.</i>
                </td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="reset" class="btn btn-danger">Reset</button>
                </td>
            </tr>
        </table>
    </form>
</div>
