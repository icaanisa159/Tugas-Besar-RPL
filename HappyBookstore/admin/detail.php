<h2>Detail Pembelian</h2>

<?php
$ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan
    ON pembelian.id_pelanggan=pelanggan.id_pelanggan
    WHERE pembelian.id_pembelian= '$_GET[id]'");
$detail = $ambil->fetch_assoc();
?>

<!--<pre>
    <?php
    print_r($detail);
    ?>
</pre>-->

<div class="row">
    <div class="col-md-4">
        <h3>Pembelian</h3>
        <p>
            Tanggal : <?php echo $detail['tanggal_pembelian'];?> <br>
            Total : Rp. <?php echo number_format ($detail['total_pembelian']); ?><br>
            Status: <?php echo $detail["status_pembelian"]; ?>
        </p>
    </div>
    <div class="col-md-4">
        <h3>Pelanggan</h3>
        <strong><?php echo $detail['nama_pelanggan']; ?></strong> <br>
        <p>
            <?php echo $detail['telepon_pelanggan'];?> <br>
            <?php echo $detail['email_pelanggan'];?>
        </p>
    </div>
    <div class="col-md-4">
        <h3>Pengiriman</h3>
        <strong><?php echo $detail["nama_kota"]; ?></strong><br>
        <p>
            Tarif: Rp. <?php echo number_format($detail["tarif"]); ?><br>
            Alamat: <?php echo $detail["alamat"]; ?>
        </p>
    </div>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Buku</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Total Harga</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $nomor = 1;
        ?>
        <?php
        $ambil=$koneksi->query("SELECT * FROM pembelian_buku JOIN 
        buku ON pembelian_buku.id_buku=buku.id_buku
        WHERE pembelian_buku.id_pembelian='$_GET[id]'");
        ?>

        <?php
        while($pecah=$ambil->fetch_assoc()){
        ?>
        <tr>
            <td><?php echo $nomor; ?></td>
            <td><?php echo $pecah['nama_buku']; ?></td>
            <td>Rp. <?php echo number_format($pecah['harga_buku']); ?></td>
            <td><?php echo $pecah['jumlah']; ?></td>
            <td>
                Rp. <?php echo number_format ($pecah['harga_buku'] * $pecah['jumlah']); ?>
            </td>
        </tr>
        <?php
        $nomor++; 
        ?>
        <?php
        }
        ?>
    </tbody>
</table>