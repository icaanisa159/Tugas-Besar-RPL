<h2>Data Buku</h2>
<a href="index.php?halaman=tambahbuku" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data</a>
<br><br>

 <table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Kategori</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Berat</th>
            <th>Foto</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $nomor = 1;
        ?>
        <?php
          $ambil = $koneksi->query("SELECT * FROM buku LEFT JOIN kategori ON buku.id_kategori=kategori.id_kategori");
        ?>
        <?php
          while($pecah = $ambil->fetch_assoc()){
        ?>
        <tr>
            <td><?php echo $nomor; ?></td>
            <td><?php echo $pecah['nama_kategori']; ?></td>
            <td><?php echo $pecah['nama_buku']; ?></td>
            <td>Rp. <?php echo number_format($pecah["harga_buku"]) ?></td>
            <td><?php echo $pecah['berat']; ?> Gr</td>
            <td>
                <img src="../foto_buku/<?php echo $pecah['foto_buku']; ?>" width="100">
            </td>
            <td><?php echo $pecah['stok_buku']; ?></td>
            <td>
                <a href="index.php?halaman=hapusbuku&id=<?php echo $pecah['id_buku']; ?>" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i> Hapus</a>
                <a href="index.php?halaman=ubahbuku&id=<?php echo $pecah['id_buku']; ?>" class="btn btn-warning"><i class="glyphicon glyphicon-edit"></i> Edit</a>
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