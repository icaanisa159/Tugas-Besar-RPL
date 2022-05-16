<?php
session_start();
//koneksi ke database
include 'koneksi.php';

if (!isset($_SESSION["pelanggan"]))
{
    echo "<script>alert('Anda Harus Login');</script>";
    echo "<script>location='login.php';</script>";
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
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

    <title>Happy Bookstore | Checkout</title>

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
                <a class="nav-link active" aria-current="page" href="checkout.php">Checkout</a>
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
            <h2>Checkout Buku</h2>
            <hr>
            <table class="table table-bordered" style="background-color: #ffffff;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Buku</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Total Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nomor = 1; ?>
                    <?php $totalbelanja = 0; ?>
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
                    </tr>
                    <?php $nomor++; ?>
                    <?php $totalbelanja+=$totalharga; ?>
                    <?php endforeach ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th colspan="4">Total Belanja</th>
                    <th>Rp. <?php echo number_format($totalbelanja) ?></th>
                  </tr>
                </tfoot>
            </table>
            
            <form method="POST">
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <input type="text" readonly value="<?php echo $_SESSION["pelanggan"]['nama_pelanggan'] ?>" class="form-control">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <input type="text" readonly value="<?php echo $_SESSION["pelanggan"]['telepon_pelanggan'] ?>" class="form-control">
                  </div>
              </div>
              <div class="col-md-4">
              <select class="form-control" name="id_ongkir">
                <option value="">Pilih Ongkos Kirim</option>
                <?php
                $ambil = $koneksi->query("SELECT * FROM ongkir");
                while ($perongkir = $ambil->fetch_assoc()){
                ?>
                <option value="<?php echo $perongkir["id_ongkir"] ?>">
                  <?php echo $perongkir['nama_kota'] ?> -
                  Rp. <?php echo number_format($perongkir['tarif']) ?>
                </option>
                <?php } ?>
              </select>
            </div>
          </div>
          <br>
          <div class="form-group">
            <label>Alamat Lengkap Pengiriman</label>
            <textarea class="form-control" name="alamat" placeholder="Masukkan Alamat Lengkap"></textarea>
          </div>
          <div class="mt-3">
          <button class="btn btn-secondary" name="checkout"><i class="bi bi-wallet2"></i>&nbsp;Bayar</button>
          </div>
        </form>

        <?php
        if (isset($_POST["checkout"]))
        {
          $id_pelanggan = $_SESSION["pelanggan"]["id_pelanggan"];
          $id_ongkir = $_POST["id_ongkir"];
          $tanggal_pembelian = date("Y-m-d");
          $alamat = $_POST['alamat'];

          $ambil = $koneksi->query("SELECT * FROM ongkir WHERE id_ongkir ='$id_ongkir'");
          $arrayongkir = $ambil->fetch_assoc();
          $nama_kota = $arrayongkir['nama_kota'];
          $tarif = $arrayongkir['tarif'];

          $total_pembelian = $totalbelanja + $tarif;

          //1. menyimpan data ke tabel pembelian
          $koneksi->query("INSERT INTO pembelian (id_pelanggan, id_ongkir, tanggal_pembelian, total_pembelian, nama_kota, tarif, alamat)
                    VALUES ('$id_pelanggan', '$id_ongkir', '$tanggal_pembelian', '$total_pembelian', '$nama_kota', '$tarif', '$alamat')");
          
          //mendapatkan id pembelian barusan
          $id_pembelian_barusan = $koneksi->insert_id;

          foreach ($_SESSION["keranjang"] as $id_buku => $jumlah)
          {

            // mendapatkan data buku berasarkan id_buku
            $ambil = $koneksi->query("SELECT * FROM buku WHERE id_buku='$id_buku'");
            $perproduk = $ambil->fetch_assoc();

            $nama = $perproduk['nama_buku'];
            $harga = $perproduk['harga_buku'];
            $berat = $perproduk['berat'];

            $total_berat = $perproduk['berat']*$jumlah;
            $total_harga = $perproduk['harga_buku']*$jumlah;
            $koneksi->query("INSERT INTO pembelian_buku (id_pembelian,id_buku,nama,harga,berat,total_berat,total_harga,jumlah)
            VALUES ('$id_pembelian_barusan', '$id_buku', '$nama', '$harga', '$berat', '$total_berat', '$total_harga', '$jumlah')");

            //skrip update stok
            $koneksi->query("UPDATE buku SET stok_buku=stok_buku - $jumlah
            WHERE id_buku = '$id_buku'");

          }

          //kosongkan keranjang belanja
          unset($_SESSION["keranjang"]);

          // tampilan dialihkan kehalaman nota
          echo "<script>alert('Pembelian Sukses');</script>";
          echo "<script>location='nota.php?id=$id_pembelian_barusan';</script>";
        }
        ?>
      </div>
    </section>

    <!-- <pre><?php print_r($_SESSION['pelanggan']) ?></pre>
    <pre><?php print_r($_SESSION["keranjang"]) ?></pre> -->

  </body>
</html>