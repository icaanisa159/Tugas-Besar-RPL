<?php
session_start();
//koneksi ke database
include 'koneksi.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- My CSS -->
    <link rel="stylesheet" href="style.css" href="admin/assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    
    <!-- Logo Tittle Bar  -->
    <link rel="icon" href="admin/assets/img/icon.png" type="image/x-icon" />

    <title>Happy Bookstore</title>

  </head>
  <body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light sticky-top" style="background-color: #F8DE7E; font-family: Poppins, sans-serif;">
        <div class="container">
          <a class="navbar-brand" href="index.php">
          <img
            src="admin/assets/img/icon.png"
            alt=""
            width="30"
            class="d-inline-block align-text-top me-3"
          />Happy Bookstore</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <br>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <form action="pencarian.php" method="GET" class="d-flex ms-auto my-2">
              <input class="form-control me-2" type="search" placeholder="Cari Judul Buku" aria-label="Search" name="keyword">
              <button class="btn btn-light" type="submit"><i class="bi bi-search"></i></button>
            </form>
            <ul class="navbar-nav ms-auto mb-3 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="keranjang.php">Cart</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="checkout.php">Checkout</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="riwayat.php">History</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="login.php">Login</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="daftar.php">Register</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout?</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    <!-- end of Navbar -->

    <!-- Banner Jumbotron -->
    <div class="container-fluid banner">
      <div class="container banner-content col-lg-6">
          <div class="text-center" style="font-family: Poppins, sans-serif;">
              <p class="fs-1">
                 Happy Bookstore
              </p>
              <p class="fs-2">Find the book you are looking for only in Happy Bookstore</p>
          </div>
      </div>
    </div> 
    <!-- end of Banner Jumbotron  -->

    <!-- Content -->
    <section class="content" style="background-color: #fffee0; font-family: Poppins, sans-serif;">
        <div class="container py-5">
            <br><h1>New Collection Books</h1> <br>
            <div class="row text-center">
                <?php
                $ambil = $koneksi->query("SELECT * FROM buku");
                ?>
                <?php
                while($perproduk = $ambil->fetch_assoc()){
                ?>
                <div class="col-md-3 mb-3 gx-5 gy-5">
                    <div class="card" style="background-color: #F9F6F2;">
                        <img src="foto_buku/<?php echo $perproduk['foto_buku']; ?>" alt="" width="45" height="320" class="card-img-top">
                        <div class="caption mt-3 mb-4">
                            <h4><?php echo $perproduk['nama_buku']; ?></h4>
                            <h5 class="mt-3 mb-3">Rp. <?php echo number_format($perproduk['harga_buku']); ?></h5>
                            <a href="beli.php?id=<?php echo $perproduk['id_buku']; ?>" class="btn btn-warning fw-bold">Add to Cart&nbsp;<i class="bi bi-cart-plus"></i></a>
                            <a href="detail.php?id=<?php echo $perproduk['id_buku']; ?>" class="btn btn-info fw-bold"><i class="bi bi-info-circle"></i>&nbsp;Detail</a>
                        </div>
                    </div>
                </div>
                <?php
                }
                ?>
            </div>
        </div>
    </section>

    <!-- Shop/ Add to Cart -->
    <div class="container-fluid py-5" style="background-color: #fffee0;">
      <div class="container">

        <div class="row">
          <div class="col-6">
            <div class="card ">
              <img src="foto_buku/Book5.jpg" class="card-img-top" alt="Buku baru">
            </div>
        </div>

        <div class="col-6">
          <div class="card ">
            <div class="card-body">
              <h1 class="card-text mb-3">Kamu Ga Sendiri</h1>
              <h5>Oleh Syahid Muhammad</h5>
              <br>
              <p class="mt-5">Harga Saat ini!</p>
              <h5 class="mb-2">Rp. 88.000</h5>
              <br>
              <h6 class="mt-5">Penerbit GRADIEN MEDIATAMA</h6>
              <p>Isbn/Ean : 978-602-208-182-1</p>
              <p>Jumlah Halaman : 340 hlm</p>
              <p class="mt-5" style="text-decoration: underline;"><b>Sinopsis</b></p>
              <p>Kita sudah cukup baik membuat orang mengira kita baik-baik saja. Sekarang saatnya jujur,
                yang kecewa, yang kelelahan, yang gak tahu kapan harus istirahat, kamu boleh marah, boleh
                menangis, boleh kalau ingin sendiri dulu. Boleh banget untuk perlu bantuan. Kamu gak harus
                terus baik-baik aja. Gapapa, gapapa, terima, akui, lepasin.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>