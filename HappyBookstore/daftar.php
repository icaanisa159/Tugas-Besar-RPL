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
    <link rel="stylesheet" href="admin/assets/css/register.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    
    <!-- Logo Tittle Bar  -->
    <link rel="icon" href="admin/assets/img/icon.png" type="image/x-icon" />

    <title>Happy Bookstore | Register</title>

  </head>
  <body style="background-color: #fffee0;">
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
                <a class="nav-link" href="riwayat.php">History</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="login.php">Login</a>
              </li>
              <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="daftar.php">Register</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout?</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    <!-- end of Navbar -->

    <!-- Register -->
    <br>
    <section class="register">
      <div class="container">
          <div class="row">
              <div class="col">
                  <div class="panel panel-success">
                      <div class="panel-heading">
                          <h3 class="panel-title mb-4" style="font-family: Poppins, sans-serif;">Daftar</h3>
                      </div>
                      <div class="panel-body">
                        <div class="row">
                          <form method="POST" class="form-horizontal">
                              <div class="form-group mb-3">
                                  <label class="control-label col-md-3" style="font-family: Poppins, sans-serif;">Nama Lengkap</label>
                                  <div class="col-md-12">
                                    <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-circle"></i></span>
                                      <input type="text" class="form-control" name="nama" style="font-family: Poppins, sans-serif;" placeholder="Masukkan Nama Lengkap">
                                    </div>
                                  </div>
                              </div>
                              <div class="form-group mb-3">
                                  <label class="control-label col-md-3" style="font-family: Poppins, sans-serif;">Email</label>
                                  <div class="col-md-12">
                                    <div class="input-group mb-3">
                                      <span class="input-group-text" id="basic-addon1"><i class="bi bi-envelope-plus-fill"></i></span>
                                        <input type="email" class="form-control" name="email" style="font-family: Poppins, sans-serif; border-radius: 10px" placeholder="Masukkan Email">
                                    </div>
                                  </div>
                              </div>
                              <div class="form-group mb-3">
                                  <label class="control-label col-md-3" style="font-family: Poppins, sans-serif;">Password</label>
                                  <div class="col-md-12">
                                    <div class="input-group mb-3">
                                      <span class="input-group-text" id="basic-addon1"><i class="bi bi-key-fill"></i></span>
                                        <input type="text" class="form-control" name="password" style="font-family: Poppins, sans-serif; border-radius: 10px" placeholder="Masukkan Password">
                                    </div>
                                  </div>
                              </div>
                              <div class="form-group mb-3">
                                  <label class="control-label col-md-3" style="font-family: Poppins, sans-serif;">Alamat</label>
                                  <div class="col-md-12">
                                    <div class="input-group mb-3">
                                      <span class="input-group-text" id="basic-addon1"><i class="bi bi-house-door-fill"></i></span>
                                        <textarea class="form-control" name="alamat" style="font-family: Poppins, sans-serif; border-radius: 10px" placeholder="Masukkan Alamat Lengkap"></textarea>
                                    </div>
                                  </div>
                              </div>
                              <div class="form-group mb-3">
                                  <label class="control-label col-md-3" style="font-family: Poppins, sans-serif;">Telepon/HP</label>
                                  <div class="col-md-12">
                                    <div class="input-group mb-3">
                                      <span class="input-group-text" id="basic-addon1"><i class="bi bi-telephone-fill"></i></span>
                                        <input type="text" class="form-control" name="telepon" style="font-family: Poppins, sans-serif; border-radius: 10px" placeholder="Masukkan Nomor Telepon">
                                    </div>
                                  </div>
                              </div>
                              <div class="d-grid mt-4">
                                <button class="btn btn-primary textFrom" name="daftar" style="font-family: Poppins, sans-serif; border-radius: 10px">Daftar</button>
                              </div>
                              <div class="mt-2">
                                <label for="ket" style="font-family: Poppins, sans-serif;">Sudah Punya Akun? <a href="login.php">Login disini!</a></label>
                              </div>
                            </div>
                          </form>
                          <?php
                          if (isset($_POST["daftar"]))
                          {
                              $nama = $_POST["nama"];
                              $email = $_POST["email"];
                              $password = $_POST["password"];
                              $alamat = $_POST["alamat"];
                              $telepon = $_POST["telepon"];

                              //cek apakah email sudah digunakan?
                              $ambil = $koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan='$email'");
                              $yangcocok = $ambil->num_rows;
                              if ($yangcocok==1)
                              {
                                  echo "<script>alert('Email Ini Sudah Digunakan');</script>";
                                  echo "<script>location='daftar.php';</script>";
                              }
                              else
                              {
                                  $koneksi->query("INSERT INTO pelanggan (email_pelanggan,password_pelanggan,nama_pelanggan,telepon_pelanggan,alamat)
                                  VALUES('$email', '$password', '$nama', '$telepon', '$alamat')");
                                  
                                  echo "<script>alert('Pendaftarn Sukses, Silahkan Login');</script>";
                                  echo "<script>location='login.php';</script>";
                              }
                          }
                          ?>

                      </div>
                  </div>
              </div>
          </div>
      </div>
    </section>
    <!-- Akhir Register -->
  </body>
</html>