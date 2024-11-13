<?php
    include "koneksi.php";
    if (!isset($_SESSION['user'])) {
        header('location:login.php');
        exit; // Always call exit after a header redirect
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
    <title>Galeri Foto</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <style>
    body {
      background-image: url('BG 1.jpg');
      background-size: cover;
      background-position: center;
      color: black;
    }
    .navbar, footer {
      background-color: rgba(255, 255, 255, 0.8);
    }
  </style>
</head>
<body class="sb-nav-fixed   ">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand ps-3" href="index.html">Galeri Foto</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
            </div>
        </form>
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Settings</a></li>
                    <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                    <li><hr class="dropdown-divider" /></li>
                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion bg-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu ">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Navigasi</div>
                        <a class="nav-links" href="?">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-house"></i></div>
                            -Dashboard
                        </a>
                        <a class="nav-links" href="?page=galeri">
                            <div class="sb-nav-link-icon"><i class="fas fa-image"></i></div>
                            -Galeri Foto
                        </a><br><br><br>
                        <a class="nav-links" href="logout.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-sign-out-alt"></i></div>
                            -Logout
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer bg-secondary">
                    <div class="small">Logged in as:</div>
                    <?php echo htmlspecialchars($_SESSION['user']['username']); ?>
                </div>
              
            </nav>
        </div>
       
        <div id="layoutSidenav_content">
            <main>
                <?php
                    $page = isset($_GET['page']) ? $_GET['page'] : 'home'; // Correctly handle the page parameter
                    include $page . '.php'; // Ensure this file exists and is secure
                ?>
            </main>
        </div>
        
    </div>
    <style>
        .nav-links {
            display: flex;
            margin-left: 40px;
            padding: 10px;
            text-decoration: none;
            color: white;
        }
        </style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>
</html>
