<?php
session_start();
//koneksi ke database
include 'koneksi.php';

if (!isset($_SESSION["pelanggan"]) OR empty($_SESSION["pelanggan"]))
{
    echo "<script>alert('Silahkan Login Terlebih Dahulu');</script>";
    echo "<script>location='login.php';</script>";
    exit();
}

//mendapatkan id_pembelian dari url
$idpem = $_GET["id"];
$ambil = $koneksi->query("SELECT * FROM pembelian WHERE id_pembelian='$idpem'");
$detpem = $ambil->fetch_assoc();

//mendapatkan id_pelanggan yang beli
$id_pelanggan_beli = $detpem["id_pelanggan"];

//mendapatkan id_pelangganyang login
$id_pelanggan_login = $_SESSION["pelanggan"]["id_pelanggan"];

if ($id_pelanggan_login !==$id_pelanggan_beli)
{
    echo "<script>alert('Anda bukan Pemilik Akun Email ini');</script>";
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

    <title>Happy Bookstore | Pembayaran</title>

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

    <br>
    <section class="pembayaran">
    <div class="container mt-2" style="font-family: Poppins, sans-serif;">
        <h2>Konfirmasi Pembayaran</h2>
        <p>Kirim Bukti Pembayaran Anda Disini</p>
        <div class="alert alert-info">Total Tagihan Anda <strong>Rp. <?php echo number_format($detpem["total_pembelian"]) ?></strong></div>
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label>Nama Pembayar</label>
                <input type="text" class="form-control" name="nama">
            </div>
            <div class="form-group">
                <label>Bank</label>
                <input type="text" class="form-control" name="bank">
            </div>
            <div class="form-group">
                <label>Jumlah</label>
                <input type="number" class="form-control" name="jumlah" min="1">
            </div>
            <div class="form-group">
                <label>Foto Bukti</label>
                <input type="file" class="form-control" name="bukti">
                <p class="text-danger">Bukti harus JPG, maksimal 2MB</p>
            </div>
            <button class="btn btn-primary" name="kirim">Kirim</button>
        </form>
    </div>
    </section>

    <?php
    //jika ada tombol kirim
    if (isset($_POST["kirim"]))
    {
        //upload dulu foto bukti
        $namabukti = $_FILES["bukti"]["name"];
        $lokasibukti = $_FILES["bukti"]["tmp_name"];
        $namafiks = date("YmdHis").$namabukti;
        move_uploaded_file($lokasibukti, "bukti_pembayaran/$namafiks");

        $nama = $_POST["nama"];
        $bank = $_POST["bank"];
        $jumlah = $_POST["jumlah"];
        $tanggal = date("Y-m-d");

        //simpan pembayaran
        $koneksi->query("INSERT INTO pembayaran (id_pembelian, nama, bank, jumlah, tanggal, bukti)
        VALUES ('$idpem', '$nama', '$bank', '$jumlah', '$tanggal', '$namafiks')");

        //update data pembelian dari pending menjadi sudah kirim pembayaran
        $koneksi->query("UPDATE pembelian SET status_pembelian = 'Sudah Kirim Pembayaran'
        WHERE id_pembelian = '$idpem'");
        
        echo "<script>alert('Terimakasih Sudah Mengirimkan Bukti Pembayaran');</script>";
        echo "<script>location='riwayat.php';</script>";
    }
    ?>
  </body>
</html>