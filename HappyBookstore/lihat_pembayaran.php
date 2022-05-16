<?php
session_start();
//koneksi ke database
include 'koneksi.php';

$id_pembelian = $_GET["id"];

$ambil = $koneksi->query("SELECT * FROM pembayaran
  LEFT JOIN pembelian ON pembayaran.id_pembelian = pembelian.id_pembelian
  WHERE pembelian.id_pembelian = '$id_pembelian'");
$detbay = $ambil->fetch_assoc();

if (empty($detbay))
{
  echo "<script>alert('Belum Ada Data Pembayaran');</script>";
  echo "<script>location='riwayat.php';</script>";
  exit();
}

// jika data pelanggan yg bayar tidak sesuai dengan yang login
if ($_SESSION["pelanggan"]['id_pelanggan']!==$detbay["id_pelanggan"])
{
  echo "<script>alert('Anda Tidak Berhak Melihat Pembayaran Orang Lain');</script>";
  echo "<script>location='riwayat.php';</script>";
  exit();
}

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
    <link rel="stylesheet" href="admin/assets/css/pembayaran.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    
    <!-- Logo Tittle Bar  -->
    <link rel="icon" href="admin/assets/img/icon.png" type="image/x-icon" />

    <title>Happy Bookstore | Lihat Pembayaran</title>

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
                <a class="nav-link" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="keranjang.php">Cart</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="checkout.php">Checkout</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="riwayat.php">History</a>
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

    <section class="pembayaran">
    <div class="container mt-5" style="font-family: Poppins, sans-serif;">
        <h2>Lihat Pembayaran</h2>
        <div class="row mt-4">
            <div class="col-md-6">
                <table class="table">
                    <tr>
                        <th>Nama</th>
                        <th><?php echo $detbay["nama"] ?></th>
                    </tr>
                    <tr>
                        <th>Bank</th>
                        <th><?php echo $detbay["bank"] ?></th>
                    </tr>
                    <tr>
                        <th>Tanggal</th>
                        <th><?php echo $detbay["tanggal"] ?></th>
                    </tr>
                    <tr>
                        <th>Jumlah</th>
                        <th>Rp. <?php echo number_format ($detbay["jumlah"]) ?></th>
                    </tr>
                </table>
            </div>
            <div class="col-md-6">
              <img src="bukti_pembayaran/<?php echo $detbay["bukti"] ?>" alt="" class="img-responsive" width="230" height="350">
            </div>
        </div>
    </div>
    </section>

  </body>
</html>