<?php
session_start();
$id_buku = $_GET['id'];

if(isset($_SESSION['keranjang'][$id_buku]))
{
    $_SESSION['keranjang'][$id_buku]+=1;
}
else
{
    $_SESSION['keranjang'][$id_buku]=1;
}

//echo "<pre>";
//print_r($_SESSION);
//echo "</pre>";

echo "<script>alert('Produk Telah Masuk ke Keranjang Belanja');</script>";
echo "<script>location='keranjang.php';</script>";
?>