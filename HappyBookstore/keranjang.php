<?php
session_start();
include 'koneksi.php';

if(empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"]))
{
  echo "<script>alert('Keranjang Kosong, Silahkan Tambahkan Produk');</script>";
  echo "<script>location='index.php';</script>";
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
    <link rel="stylesheet" href="admin/assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    
    <!-- Logo Tittle Bar  -->
    <link rel="icon" href="admin/assets/img/icon.png" type="image/x-icon" />

    <title>Happy Bookstore | Cart</title>

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
                <a class="nav-link active" aria-current="page"  href="keranjang.php">Cart</a>
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

    <section class="content" style="font-family: Poppins, sans-serif;">
        <div class="container mt-5">
            <h2>Keranjang Belanja</h2>
            <hr>
            <table class="table table-bordered" style="background-color: #ffffff;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Buku</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Total Harga</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nomor = 1; ?>
                    <?php foreach ($_SESSION["keranjang"] as $id_buku => $jumlah): ?>
                    <?php
                    $ambil = $koneksi->query("SELECT * FROM buku WHERE id_buku='$id_buku'");
                    $pecah = $ambil->fetch_assoc();
                    $totalharga = $pecah["harga_buku"]*$jumlah;

                    ?>
                    <tr>
                        <td><?php echo $nomor; ?></td>
                        <td><?php echo $pecah["nama_buku"]; ?></td>
                        <td>Rp. <?php echo number_format($pecah["harga_buku"]); ?></td>
                        <td><?php echo $jumlah; ?></td>
                        <td>Rp. <?php echo number_format($totalharga); ?></td>
                        <td class="text-center">
                          <a href="hapuskeranjang.php?id=<?php echo $id_buku ?>" class="btn btn-danger btn-xs"><i class="bi bi-trash"></i>&nbsp;Hapus</a>
                        </td>
                    </tr>
                    <?php $nomor++; ?>
                    <?php endforeach ?>
                </tbody>
            </table>
            <a href="index.php" class="btn btn-warning"><i class="bi bi-arrow-left-circle-fill"></i>&nbsp;Lanjutkan Belanja</a>
            <a href="checkout.php" class="btn btn-success"><i class="bi bi-cart4"></i>&nbsp;Checkout</a>
        </div>
    </section>



</body>
</html>