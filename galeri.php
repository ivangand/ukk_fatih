<div class="container-fluid px-4">
    <h1 class="mt-4 text-secondary">Galeri Foto</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Galeri Foto</li>
    </ol>
    <a href="?page=galeri_tambah" class="btn btn-primary"><i class="fa-solid fa-plus"></i></a>
    <br><br>
    <table class="table table-bordered">
        <tr class="table-dark">
            <th>Foto</th>
            <th>Judul</th>
            <th>Album</th>
            <th>Deskripsi</th>
            <th>Tanggal</th>
            <th>Total Like</th>
            <th>Aksi</th>
        </tr>
        <?php 
        $query = mysqli_query($koneksi, "SELECT foto.*, album.nama_album, foto.id_user FROM foto 
            LEFT JOIN album ON album.id_album = foto.id_album");
        while($data = mysqli_fetch_array($query)) {
            $is_owner = ($data['id_user'] == $_SESSION['user']['id_user']); 
        ?>
        <tr class="table-dark">
            <td>
                <a href="galeri/<?php echo $data['gambar']; ?>" target="_blank">
                    <img src="gambar/<?php echo $data['gambar']; ?>" width="200" alt="gambar">
                </a>
            </td>
            <td><?php echo $data['judul']; ?></td>
            <td><?php echo $data['nama_album']; ?></td>
            <td><?php echo $data['deskripsi']; ?></td>
            <td><?php echo $data['tanggal']; ?></td>
            <td><?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM likefoto WHERE id_foto=" . $data['id_foto'])); ?></td>
            <td>
                <?php 
                if(mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM likefoto WHERE id_foto=" . $data['id_foto'] . " AND id_user=" . $_SESSION['user']['id_user'])) < 1){
                ?>
                    <a href="?page=likefoto&&id=<?php echo $data['id_foto']; ?>" class="btn btn-warning"><i class="fa-solid fa-heart"></i></a>
                <?php
                }
                ?>
                <a href="?page=komentar&&id=<?php echo $data['id_foto']; ?>" class="btn btn-secondary"><i class="fa-solid fa-comment"></i></a>

                <?php if ($is_owner): ?>
                    <a href="?page=galeri_ubah&&id=<?php echo $data['id_foto']; ?>" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                    <a href="?page=galeri_hapus&&id=<?php echo $data['id_foto']; ?>" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></a>
                <?php endif; ?>
            </td>
        </tr>
        <?php
        }
        ?>
    </table>
</div>
