<h2>Ubah Buku</h2>

<?php
$ambil = $koneksi->query("SELECT * FROM buku WHERE id_buku = '$_GET[id]'");
$pecah = $ambil->fetch_assoc();

// echo "<pre>";
// print_r($pecah);
// echo "</pre>";
?>

<?php
$datakategori = array();

$ambil = $koneksi->query("SELECT * FROM kategori");
while($tiap = $ambil->fetch_assoc())
{
    $datakategori[] = $tiap;
}

// echo "<pre>";
// print_r($datakategori);
// echo "</pre>";
?>

<form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Kategori</label>
        <select class="form-control" name="id_kategori">
            <option value="">Pilih Kategori</option>
            <?php foreach ($datakategori as $key => $value): ?>
            <option value="<?php echo $value["id_kategori"] ?>" <?php if($pecah["id_kategori"]==$value["id_kategori"]){ echo "selected"; } ?>>
                <?php echo $value["nama_kategori"] ?>

            </option>
            <?php endforeach ?>
        </select>
    </div>
    <div class="form-group">
        <label>Nama Buku</label>
        <input type="text" name="nama" class="form-control" value="<?php echo $pecah['nama_buku']; ?>">
    </div>
    <div class="form-group">
        <label>Harga (Rp)</label>
        <input type="number" class="form-control" name="harga" value="<?php echo $pecah['harga_buku']; ?>">
    </div>
    <div class="form-group">
        <label>Berat (Gr)</label>
        <input type="number" class="form-control" name="berat" value="<?php echo $pecah['berat']; ?>">
    </div>
    <div class="form-group">
        <img src="../foto_buku/<?php echo $pecah['foto_buku'] ?>" width="200">
    </div>
    <div class="form-group">
        <label>Ganti Buku</label>
        <input type="file" class="form-control" name="foto">
    </div>
    <div class="form-group">
        <label>Deskripsi</label>
        <textarea class="form-control" name="deskripsi" rows="10">
            <?php
            echo $pecah['deskripsi_buku'];
            ?>
        </textarea>
    </div>
    <div class="form-group">
        <label>Stok</label>
        <input type="number" class="form-control" name="stok" value="<?php echo $pecah['stok_buku']; ?>">
    </div>
    <button class="btn btn-primary" name="ubah">Ubah</button>
</form>

<?php
if (isset($_POST['ubah']))
{
    $namafoto = $_FILES['foto']['name'];
    $lokasifoto = $_FILES['foto']['tmp_name'];
    //jika foto diubah
    if (!empty($lokasifoto))
    {
        move_uploaded_file($lokasifoto, "../foto_buku/$namafoto");

        $koneksi->query("UPDATE buku SET nama_buku ='$_POST[nama]',
            harga_buku='$_POST[harga]',berat='$_POST[berat]',
            foto_buku='$namafoto',deskripsi_buku='$_POST[deskripsi]',id_kategori='$_POST[id_kategori]',stok_buku='$_POST[stok]'
            WHERE id_buku='$_GET[id]'");
    }
    else
    {
        $koneksi->query("UPDATE buku SET nama_buku ='$_POST[nama]',
            harga_buku='$_POST[harga]',berat='$_POST[berat]',
            deskripsi_buku='$_POST[deskripsi]',id_kategori='$_POST[id_kategori]',stok_buku='$_POST[stok]'
            WHERE id_buku='$_GET[id]'");
    }
    echo "<script>alert('Data Buku Telah Diubah');</script>";
    echo "<script>location='index.php?halaman=buku';</script>";
}