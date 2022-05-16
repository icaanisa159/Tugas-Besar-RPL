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
    <link rel="stylesheet" href="admin/assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    
    <!-- Logo Tittle Bar  -->
    <link rel="icon" href="admin/assets/img/icon.png" type="image/x-icon" />

    <title>Happy Bookstore | Nota</title>

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

    <section class="content" style="font-family: Poppins, sans-serif;">
      <div class="container mt-5">
        <h2>Detail Pembelian</h2>

        <?php
        $ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan
            ON pembelian.id_pelanggan=pelanggan.id_pelanggan
            WHERE pembelian.id_pembelian= '$_GET[id]'");
        $detail = $ambil->fetch_assoc();
        ?>
        <br>

        <div class="row">
            <div class="col-md-4">
                <h4>Pembelian</h4>
                <strong>No. Pembelian: <?php echo $detail['id_pembelian'] ?></strong><br>
                Tanggal : <?php echo $detail['tanggal_pembelian']; ?><br>
                Total : <?php echo number_format($detail['total_pembelian']) ?>
            </div>
                <div class="col-md-4">
                    <h4>Pelanggan</h4>
                    <strong><?php echo $detail['nama_pelanggan']; ?></strong> <br>
                    <p>
                        <?php echo $detail['telepon_pelanggan']; ?> <br>
                        <?php echo $detail['email_pelanggan']; ?>
                    </p>
                </div>
                <div class="col-md-4">
                    <h4>Pengiriman</h4>
                    <strong><?php echo $detail['nama_kota'] ?></strong><br>
                    Ongkos Kirim : Rp. <?php echo number_format($detail['tarif']); ?><br>
                    Alamat : <?php echo $detail['alamat'] ?>
                </div>
        </div>

        <table class="table table-bordered" style="background-color: #ffffff;">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Buku</th>
                    <th>Harga</th>
                    <th>Berat</th>
                    <th>Jumlah</th>
                    <th>Total Berat</th>
                    <th>Total Harga</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $nomor = 1;
                ?>
                <?php
                $ambil=$koneksi->query("SELECT * FROM pembelian_buku WHERE id_pembelian='$_GET[id]'");
                ?>

                <?php
                while($pecah=$ambil->fetch_assoc()){
                ?>
                <tr>
                    <td><?php echo $nomor; ?></td>
                    <td><?php echo $pecah['nama']; ?></td>
                    <td>Rp. <?php echo number_format($pecah['harga']); ?></td>
                    <td><?php echo $pecah['berat']; ?> Gr</td>
                    <td><?php echo $pecah['jumlah']; ?></td>
                    <td><?php echo $pecah['total_berat']; ?> Gr</td>
                    <td>Rp. <?php echo number_format($pecah['total_harga']); ?></td>
                </tr>
                <?php
                $nomor++; 
                ?>
                <?php
                }
                ?>
            </tbody>
        </table>

            <div class="row text-center">
                <div class="col-md-7 offset-3 mt-4">
                    <div class="alert alert-info">
                        <p style="font-size: 18px;">
                            Silahkan melakukan pembayaran Rp. <?php echo number_format($detail['total_pembelian']); ?> ke <br>
                            <strong>BANK MANDIRI 137-001088-3276 AN. TokoBukuku</strong>
                        </p>
                    </div>
                </div>
            </div>
      </div>
    </section>

  </body>
</html>