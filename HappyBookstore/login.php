<?php
session_start();
//koneksi ke database
include 'koneksi.php';
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

    <!-- CSS -->
    <link rel="stylesheet" href="admin/assets/css/login.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <title>Login</title>
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
                <a class="nav-link" href="riwayat.php">History</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="login.php">Login</a>
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
    
    <!-- Login -->
    <section class="login">
      <div class="d-flex justify-content-center align-items-center" style="min-height: 100vh; background-color: #fffee0; border-radius: 3%;">
        <form class="p-5 rounded shadow" style="max-width: 30rem; width: 100%; background-color: #ffffff;" method="POST">
          <h1 class="text-center display-4 pb-5" style="font-family: Poppins, sans-serif;">LOGIN</h1>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label textFrom"  style="font-family: Poppins, sans-serif;">Email</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" style="font-family: Poppins, sans-serif; border-radius: 10px" placeholder="Masukkan Email">
              </div>
              <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label textFrom" style="font-family: Poppins, sans-serif;">Password</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" name="password" style="font-family: Poppins, sans-serif; border-radius: 10px" placeholder="Masukkan Password">
              </div>
              <div style="margin-top: -13px" class="text-end">
                <a href="#" style="font-family: Poppins, sans-serif;">Lupa Password?</a>
              </div>
              <div class="d-grid mt-5">
              <button class="btn btn-primary textFrom" name="login" style="font-family: Poppins, sans-serif; border-radius: 10px">Login</button>
              </div>
              <div class="mt-2">
                <span class="textFrom" style="font-family: Poppins, sans-serif;">Belum Punya Akun? 
                <a href="daftar.php" class="textFrom" style="font-family: Poppins, sans-serif;">Daftar</a></span>
              </div>
        </form>
      </div>
    </section>
        <?php
        if (isset($_POST['login']))
        {
          $ambil= $koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan='$_POST[email]' AND password_pelanggan='$_POST[password]'");
          $yangcocok = $ambil->num_rows;
          if ($yangcocok==1)
          {
            $_SESSION["pelanggan"]=$ambil->fetch_assoc();
            echo "<div class='alert alert-info'>Login Sukses</div>";

            //jika sudah belanja
            if (isset($_SESSION["keranjang"]) OR !empty($_SESSION["keranjang"]))
            {
              echo "<meta http-equiv='refresh' content='1;url=checkout.php'>";
            }
            else
            {
              echo "<meta http-equiv='refresh' content='1;url=riwayat.php'>";
            }
          }
          else
          {
            echo "<div class='alert alert-danger'>Login Gagal</div>";
            echo "<meta http-equiv='refresh' content='1;url=login.php'>";
          }
        }
        ?>
    </div>

    <!-- Akhir Login -->

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>
