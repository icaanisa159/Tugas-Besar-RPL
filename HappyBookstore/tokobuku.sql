-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Bulan Mei 2022 pada 14.44
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tokobuku`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_lengkap`) VALUES
(1, 'teamtokobukuku.com', 'teamtokobukuku.com', 'Toko Bukuku');

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `id_kategori` int(5) NOT NULL,
  `nama_buku` varchar(100) NOT NULL,
  `harga_buku` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `foto_buku` varchar(100) NOT NULL,
  `deskripsi_buku` text NOT NULL,
  `stok_buku` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id_buku`, `id_kategori`, `nama_buku`, `harga_buku`, `berat`, `foto_buku`, `deskripsi_buku`, `stok_buku`) VALUES
(1, 5, 'Sejarah Dunia Yang Disembunyikan', 218000, 800, 'Sejarah-Dunia-yang-Disembunyikan.jpg', 'Dalam buku kontroversial yang sangat tersohor ini, Jonathan Black mengupas secara tajam penelusurannya yang brilian tentang misteri sejarah dunia. Dari mitologi Yunani dan Mesir kuno sampai cerita rakyat Yahudi, dari kultus Kristiani sampai Freemason, dari Karel Agung sampai Don Quixote, dari George Washington sampai Hitler, dan dari pewahyuan Muhammad hingga legenda Seribu Satu Malam, Jonathan menunjukkan bahwa pengetahuan sejarah yang terlanjur mapan perlu dipikirkan kembali secara revolusioner. Dengan pengetahuan alternatif ihwal sejarah dunia selama lebih dari 3.000 tahun, dia mengungkap banyak rahasia besar yang selama ini disembunyikan.\r\n\r\nBuku ini akan membuat Anda mempertanyakan kembali segala sesuatu yang telah diajarkan kepada Anda. Dan, berbagai pengetahuan baru yang diungkapkan sang penulis benar-benar akan membuka dan mencerahkan wawasan Anda.      ', 11),
(2, 6, 'SPM Matematika SMA/MA', 85000, 210, 'spm matematika.jpg', 'Buku yang ditujukan untuk peserta didik SMA dan MA ini termasuk seri buku soal dan disusun sebagai persiapan menghadapi ujian nasional. Buku ini terbagi menjadi tiga unit, yaitu: Unit I berisi rangkuman, contoh soal dan pembahasan, dan soal-soal latihan model UN, Unit II berisi soal-soal UN dari tahun-tahun sebelumnya, dan Unit III berisi paket latihan mandiri sebagai prediksi agar peserta didik siap menghadapi UN sesungguhnya.                ', 43),
(3, 2, 'You Are (not) My Bestfriend', 55000, 179, 'notmybestfriend.jpg', 'Mau tahu rasanya jadi murid pindahan yang masuk saattahun ajaran baru sudah berjalan dua setengah bulan? Ituyang dirasakan Ingrid ketika kembali ke Jakarta setelah lima belas tahun tinggal di Kopenhagen.  Peraturan sekolah memaksa Ingrid memilih ekskuljurnalistik. Ekskul ini pula yang menyebabkan Ingrid harus berhadapan dengan Mirabel dan Mita, cewek cantik dengan antek-anteknya yang selalu mencari masalah.  Seiring waktu, kebencian Ingrid terhadap Jakarta dan rasa rindu pada Kopenhagen pelan-pelan terkikis. Tapi misteri kematian seorang siswa baru pada tahun kedua Inggrid di SMA Bhinneka membuatnya ragu apakah Jakarta benar-benar membuatnya betah.', 18),
(4, 4, 'Mantappu Jiwa - Jerome Pollin', 80750, 200, 'mantappujiwa.jpg', 'Buku Mantappu Jiwa karya Jerome Poline ini berisi kisah hidup Jerome sejak dia lahir sampai bisa kuliah di Jepang dan menjadi Youtuber terkenal. Ternyata keinginan Jerome untuk kuliah sudah ada sejak dia Sekolah Dasar. Karena alasan yang sangat sederhana, yaitu dia ingin pergi ke luar negeri seperti teman-temannya.', 62),
(12, 4, 'Kamu Ga Sendiri', 88000, 265, 'Book5.jpg', 'Kita sudah cukup baik membuat orang mengira kita baik-baik saja. Sekarang saatnya jujur, yang kecewa, yang kelelahan, yang gak tahu kapan harus istirahat, kamu boleh marah, boleh menangis, boleh kalau ingin sendiri dulu. Boleh banget untuk perlu bantuan. Kamu gak harus terus baik-baik aja. Gapapa, gapapa, terima, akui, lepasin.', 72),
(13, 2, 'Gadis Kretek', 44000, 100, 'gadis kretek.jpg', 'Novel Gadis Kretek berkisah tentang keluarga Soeraja yang memiliki bisnis kretek bernama Kretek Djagat Raja yang sangat terkenal dari Kudus. Kisah novel ini bergulir saat Pak Radja sekarat dan meminta anaknya untuk mencari di mana kekasihnya dulu, bernama Jeng Yah.', 16),
(14, 1, 'Pride and Prejudice', 100000, 229, 'pride and prejudice.jpeg', 'Pride & Prejudice bercerita tentang lika-liku kisah asmara yang dialami gadis keturunan bangsawan bernama Elizabeth (Keira Knigthley). Berlatar kehidupan bangsawan Inggris pada akhir abad ke-18, Elizabeth merupakan anak dari keluarga Bannet yang tinggal di Longburn, sebuah kawasan peternakan.', 30),
(18, 3, 'Kisah Tanah Jawa', 96000, 300, 'kisahtanahjawa.jpeg', '                        Jawa                ', 5),
(20, 6, 'English in Focus', 128000, 188, 'english.png', '            english        ', 10),
(21, 1, 'Flipped', 58000, 154, 'flipped.jpg', 'Bryce', 20),
(22, 2, 'Yes to Life', 54000, 300, 'yes to life.jpg', '            Sebuah masterpiece yang ditemukan kembali di antara tumpukan karya-karya monumental Viktor Frankl. Karya yang membuat kita melihat kembali harapan meski di saat-saat paling gelap dalam kehidupan kita—melengkapi karya fenomenalnya, Man’s Search for Meaning. Viktor E. Frankl, dikenal sebagai pencetus Logoterapi, demikian gigih menyebarkan gagasan tentang makna hidup, kekuatan semangat manusia, dan pentingnya memeluk bahkan merayakan kehidupan ketika kita dihadapkan pada penderitaan paling suram sekalipun. Gagasan-gagasan ini antara lain disampaikan Frankl dalam serangkaian kuliah umum di Wina, Austria, hanya beberapa bulan setelah dia dibebaskan dari kamp konsentrasi Nazi. Buku Yes to Life adalah kumpulan bahan kuliahnya itu.\r\n\r\n        ', 12),
(23, 4, 'Generasi Langgas', 87000, 300, 'Buku generasi Langgas.jpg', 'Generasi Langgas: Millennials Indonesia - Yoris Sebastian\r\n\r\nBuku ini bercerita tentang generasi millennials di Indonesia. Mereka yang lahir tahun 1980 hingga 2000. Di tangan merekalah, penentuan apakah Indonesia akan mendapatkan bonus demografi di tahun 2020 atau malah sebaliknya.\r\n\r\nGenerasi millennials bisa dibilang sangat berbeda dengan generasi-generasi sebelumnya sehingga baik di lingkup pekerjaan maupun di rumah, suka tidak mudah untuk dipahami. Tidak heran bila millennials sering kali diberi cap yang kurang baik.\r\n\r\nGenerasi instan? Generasi copas? Generasi nggak mau susah?\r\n\r\nBuku ini memberikan pandangan berbeda. Saya percaya bahwa millennials ini bisa menjadi generasi terbaik yang pernah ada di Indonesia. Itu kalau generasi ini mau mengambil inspirasi positif dari berbagai sumber, terutama dari teman-teman mereka yang sama-sama millennials juga.\r\n\r\nLife is not about finding yourself.\r\n\r\nLife is about creating yourself.\r\n\r\n193 hlm        ', 50);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(5) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Romance'),
(2, 'Fiction'),
(3, 'Horror'),
(4, 'Non Fiction'),
(5, 'Sejarah'),
(6, 'Pelajaran');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ongkir`
--

CREATE TABLE `ongkir` (
  `id_ongkir` int(5) NOT NULL,
  `nama_kota` varchar(100) NOT NULL,
  `tarif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ongkir`
--

INSERT INTO `ongkir` (`id_ongkir`, `nama_kota`, `tarif`) VALUES
(1, 'Blitar', 15000),
(2, 'Jambi', 30000),
(3, 'Jakarta', 15000),
(4, 'Palangkaraya', 35000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `email_pelanggan` varchar(100) NOT NULL,
  `password_pelanggan` varchar(50) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `telepon_pelanggan` varchar(25) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `email_pelanggan`, `password_pelanggan`, `nama_pelanggan`, `telepon_pelanggan`, `alamat`) VALUES
(1, 'anissaseptiani@gmail.com', 'anissa', 'Anissa Septiani', '087123456789', ''),
(2, 'adrianmangatar@gmail.com', 'adrian', 'Adrian Mangatar', '085098765432', ''),
(3, 'fazrinmeilaas9c@gmail.com', 'fazrin', 'Fazrin Meila', '089627598100', 'Karawang'),
(11, 'ica123@gmail.com', 'ica123', 'ica', '083811413306', 'Dimana mana hatiku senang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `bank` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `bukti` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pembelian`, `nama`, `bank`, `jumlah`, `tanggal`, `bukti`) VALUES
(4, 6, 'Fazrin Meila', 'Permata', 233000, '2022-04-26', '20220426201816Screenshot_8.png'),
(5, 31, 'Fazrin Meila', 'Permata', 180000, '2022-04-27', '20220427035519cerita-rakyat-populer-34-provinsi.jpg'),
(6, 32, 'Anissa Septiani', 'Mandiri', 115000, '2022-04-27', '20220427161518Bukti join grup.jpeg'),
(7, 33, 'Fazrin Meila', 'Permata', 103000, '2022-04-27', '20220427175531BookstoreDiagram-Use-case-Diagram.drawio.png'),
(8, 34, 'Anissa Septiani', 'Permata', 100000, '2022-04-28', '20220428145302Bukti join grup (1).jpeg'),
(9, 35, 'Anissa Septiani', 'Permata', 96000, '2022-04-29', '20220429165959flipped.jpg'),
(10, 37, 'Anisa', 'bri', 115000, '2022-05-03', '20220503202425bg-revisi1.png'),
(11, 39, 'Anisa', 'bri', 100000, '2022-05-06', '20220506020727yes to life.jpg'),
(12, 1, '', '', 0, '2022-05-10', '20220510155716');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_ongkir` int(11) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `total_pembelian` int(11) NOT NULL,
  `nama_kota` varchar(100) NOT NULL,
  `tarif` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `status_pembelian` varchar(100) NOT NULL DEFAULT 'pending',
  `resi_pengiriman` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_pelanggan`, `id_ongkir`, `tanggal_pembelian`, `total_pembelian`, `nama_kota`, `tarif`, `alamat`, `status_pembelian`, `resi_pengiriman`) VALUES
(1, 1, 1, '2022-04-11', 75000, '', 0, '', 'Sudah Kirim Pembayaran', ''),
(2, 2, 2, '2022-04-19', 25000, '', 0, '', 'pending', ''),
(3, 1, 2, '2022-04-26', 109000, '', 0, '', 'pending', ''),
(4, 1, 2, '2022-04-26', 109000, '', 0, '', 'pending', ''),
(5, 1, 3, '2022-04-26', 233000, 'Jakarta', 15000, 'Banten Jl.Merak no 10', 'pending', ''),
(6, 3, 1, '2022-04-26', 233000, 'Blitar', 15000, 'Blitar Pohgajih', 'Lunas', '12345'),
(25, 3, 3, '2022-04-26', 103000, 'Jakarta', 15000, 'Jakarta', 'pending', ''),
(26, 3, 1, '2022-04-26', 70000, 'Blitar', 15000, 'Blitar Pohgajih', 'pending', ''),
(27, 1, 4, '2022-04-26', 79000, 'Palangkaraya', 35000, 'Palangkaraya', 'pending', ''),
(28, 3, 2, '2022-04-26', 173000, 'Jambi', 30000, 'Jambi', 'pending', ''),
(33, 3, 1, '2022-04-27', 103000, 'Blitar', 15000, 'Karawang', 'lunas', 'XYZ123'),
(34, 1, 1, '2022-04-28', 100000, 'Blitar', 15000, 'Banten', 'Sudah Kirim Pembayaran', ''),
(36, 1, 3, '2022-05-02', 233000, 'Jakarta', 15000, '', 'pending', ''),
(37, 12, 2, '2022-05-03', 115000, 'Jambi', 30000, '', 'Sudah Kirim Pembayaran', ''),
(38, 12, 0, '2022-05-03', 55000, '', 0, '', 'pending', ''),
(40, 1, 0, '2022-05-10', 218000, '', 0, '', 'pending', ''),
(41, 1, 0, '2022-05-10', 218000, '', 0, '', 'pending', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian_buku`
--

CREATE TABLE `pembelian_buku` (
  `id_pembelian_buku` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `total_berat` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembelian_buku`
--

INSERT INTO `pembelian_buku` (`id_pembelian_buku`, `id_pembelian`, `id_buku`, `jumlah`, `nama`, `harga`, `berat`, `total_berat`, `total_harga`) VALUES
(1, 1, 1, 1, '', 0, 0, 0, 0),
(2, 2, 2, 1, '', 0, 0, 0, 0),
(4, 12, 3, 1, '', 0, 0, 0, 0),
(5, 13, 2, 1, '', 0, 0, 0, 0),
(6, 14, 1, 1, '', 0, 0, 0, 0),
(7, 14, 2, 1, '', 0, 0, 0, 0),
(8, 15, 2, 1, '', 0, 0, 0, 0),
(9, 16, 2, 1, 'SPM Matematika SMA/MA', 85000, 210, 210, 85000),
(10, 16, 3, 1, 'You Are (not) My Bestfriend', 35000, 179, 179, 35000),
(11, 17, 1, 1, 'Sejarah Dunia Yang Disembunyikan', 218000, 800, 800, 218000),
(12, 18, 4, 1, 'Mantappu Jiwa - Jerome Pollin', 80750, 200, 200, 80750),
(13, 19, 3, 1, 'You Are (not) My Bestfriend', 35000, 179, 179, 35000),
(14, 20, 14, 1, 'Pride and Prejudice', 100000, 229, 229, 100000),
(15, 21, 1, 1, 'Sejarah Dunia Yang Disembunyikan', 218000, 800, 800, 218000),
(16, 22, 3, 2, 'You Are (not) My Bestfriend', 55000, 179, 358, 110000),
(17, 23, 1, 1, 'Sejarah Dunia Yang Disembunyikan', 218000, 800, 800, 218000),
(18, 24, 1, 1, 'Sejarah Dunia Yang Disembunyikan', 218000, 800, 800, 218000),
(19, 25, 12, 1, 'Kamu Ga Sendiri', 88000, 265, 265, 88000),
(20, 26, 3, 1, 'You Are (not) My Bestfriend', 55000, 179, 179, 55000),
(21, 27, 13, 1, 'Gadis Kretek', 44000, 100, 100, 44000),
(22, 28, 12, 1, 'Kamu Ga Sendiri', 88000, 265, 265, 88000),
(23, 28, 3, 1, 'You Are (not) My Bestfriend', 55000, 179, 179, 55000),
(24, 29, 2, 2, 'SPM Matematika SMA/MA', 85000, 210, 420, 170000),
(25, 30, 3, 3, 'You Are (not) My Bestfriend', 55000, 179, 537, 165000),
(26, 31, 3, 3, 'You Are (not) My Bestfriend', 55000, 179, 537, 165000),
(27, 32, 14, 1, 'Pride and Prejudice', 100000, 229, 229, 100000),
(28, 33, 12, 1, 'Kamu Ga Sendiri', 88000, 265, 265, 88000),
(29, 34, 2, 1, 'SPM Matematika SMA/MA', 85000, 210, 210, 85000),
(30, 35, 18, 1, 'Kisah Tanah Jawa', 96000, 300, 300, 96000),
(31, 36, 1, 1, 'Sejarah Dunia Yang Disembunyikan', 218000, 800, 800, 218000),
(32, 37, 2, 1, 'SPM Matematika SMA/MA', 85000, 210, 210, 85000),
(33, 38, 3, 1, 'You Are (not) My Bestfriend', 55000, 179, 179, 55000),
(34, 39, 2, 1, 'SPM Matematika SMA/MA', 85000, 210, 210, 85000),
(35, 40, 1, 1, 'Sejarah Dunia Yang Disembunyikan', 218000, 800, 800, 218000),
(36, 41, 1, 1, 'Sejarah Dunia Yang Disembunyikan', 218000, 800, 800, 218000);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indeks untuk tabel `pembelian_buku`
--
ALTER TABLE `pembelian_buku`
  ADD PRIMARY KEY (`id_pembelian_buku`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `id_ongkir` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT untuk tabel `pembelian_buku`
--
ALTER TABLE `pembelian_buku`
  MODIFY `id_pembelian_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
