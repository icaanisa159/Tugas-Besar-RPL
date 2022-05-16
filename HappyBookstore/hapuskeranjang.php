<?php
session_start();
$id_buku = $_GET["id"];
unset($_SESSION["keranjang"][$id_buku]);

echo "<script>alert('Produk Akan Dihapus Dari Keranjang');</script>";
echo "<script>location='keranjang.php';</script>";
?>