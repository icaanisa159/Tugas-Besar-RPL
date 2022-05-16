<?php
session_start();
include 'koneksi.php';
?>

<?php
//mendapatkan id_buku dari URL
$id_buku = $_GET["id"];

//query ambil data
$ambil = $koneksi->query("SELECT * FROM buku WHERE id_buku = $id_buku");
$detail = $ambil->fetch_assoc();
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

    <title>Happy Bookstore | Detail Buku</title>

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

    <section class="content" style="font-family: Poppins, sans-serif;">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-6 gx-5 gy-5">
                    <img src="foto_buku/<?php echo $detail["foto_buku"]; ?>" alt="" class="img-responsive" width="350" height="500">
                </div>
                <div class="col-md-6 mb-3 gx-5 gy-5">
                    <h2 class="mb-4"><?php echo $detail["nama_buku"] ?></h2>
                    <h4 class="mb-4">Rp. <?php echo number_format($detail["harga_buku"]); ?></h4>
                    <h5 class="mb-2">Stok Buku: <?php echo $detail['stok_buku'] ?></h5>

                    <form method="POST">
                        <div class="form-group" style="width: 15vw">
                            <div class="input-group">
                                <input type="number" min="1" class="form-control mb-4" name="jumlah" max="<?php echo $detail['stok_buku'] ?>">
                                <div class="input-group-btn">
                                    <button class="btn btn-warning fw-bold" name="buy"><i class="bi bi-bag-plus"></i>&nbsp;Buy Now</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <?php
                    //jika ada tombol beli
                    if (isset($_POST["buy"])){
                        //mendapatkan jumlah yang dibeli
                        $jumlah = $_POST["jumlah"];
                        //masukkan di keranjang belanja
                        $_SESSION["keranjang"][$id_buku] = $jumlah;

                        echo "<script>alert('Buku Sudah Ditambahkan ke Keranjang Belanja');</script>";
                        echo "<script>location='keranjang.php';</script>";
                    }
                    ?>
                    <h5>Deskripsi Buku</h5>
                    <p><?php echo $detail["deskripsi_buku"]; ?></p>
                </div>
            </div>
        </div>
    </section>

  </body>
</html>