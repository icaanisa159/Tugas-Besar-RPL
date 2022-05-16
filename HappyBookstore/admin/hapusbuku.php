<?php
$ambil = $koneksi->query("SELECT * FROM buku WHERE id_buku='$_GET[id]'");
$pecah = $ambil->fetch_assoc();
$fotobuku = $pecah['foto_buku'];
if (file_exists("../foto_buku/$fotobuku"));
{
    unlink("../foto_buku/$fotobuku");
}
$koneksi->query("DELETE FROM buku WHERE id_buku='$_GET[id]'");

echo "<sript>alert('Buku Terhapus');</script>";
echo "<script>location='index.php?halaman=buku';</script>";
?>