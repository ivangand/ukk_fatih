<?php
include "koneksi.php";

if (isset($_POST["username"])) {
    $nama_lengkap = $_POST['nama_lengkap'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $query = mysqli_query($koneksi, "INSERT INTO user(nama_lengkap,email,alamat,username,password) VALUES('$nama_lengkap', '$email', '$alamat', '$username', '$password')");

    if ($query) {
        echo '<script>alert("pendaftaran berhasil"); location.href="login.php";</script>';
    } else {
        echo '<script>alert("pendaftaran gagal: ' . mysqli_error($koneksi) . '");</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Register Galeri Foto</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body class="bg-secondary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header"><h3 class="text-center font-weight-light my-4">Register</h3></div>
                                <div class="card-body">
                                    <form method="post">
                                        <div class="form-floating mb-3">
                                            <input class="form-control py-4" id="inputUsername" type="text" placeholder="Masukkan Username" name="username" />
                                            <label class="small mb-1" for="inputUsername">Username</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control py-4" type="email" placeholder="Masukkan Email" name="email" required />
                                            <label class="small mb-1">Email</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <textarea name="alamat" class="form-control py-4" rows="5" required></textarea>
                                            <label class="small mb-1">Alamat</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control py-4" id="inputPassword" type="password" placeholder="Masukkan Password" name="password" required />
                                            <label class="small mb-1">Password</label>
                                        </div>
                                        <button class="btn btn-success btn-user btn-block" type="submit">
                                            Register
                                        </button>
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <a class="small" href="login.php">Sudah punya akun?</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
</body>
</html>
