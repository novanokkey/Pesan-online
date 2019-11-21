-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Nov 2019 pada 08.54
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `about`
--

CREATE TABLE `about` (
  `id` int(2) UNSIGNED ZEROFILL NOT NULL,
  `nama_instansi` varchar(128) NOT NULL,
  `moto` varchar(128) NOT NULL,
  `no_telp` varchar(128) NOT NULL,
  `no_wa` varchar(128) NOT NULL,
  `no_fax` varchar(128) NOT NULL,
  `map` text NOT NULL,
  `alamat` text DEFAULT NULL,
  `keyword` text DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `onboard` text DEFAULT NULL,
  `logo` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `about`
--

INSERT INTO `about` (`id`, `nama_instansi`, `moto`, `no_telp`, `no_wa`, `no_fax`, `map`, `alamat`, `keyword`, `deskripsi`, `onboard`, `logo`) VALUES
(02, 'ESHOP berkarya', 'selalu berkarya', '08219921', '089384711', '08219921', 'jkt', 'Jakarta utara', NULL, 'Ehop adalah perusahaan yang bergerak di bidang perdangan ecommerse yang baru berdiri tahun2019', '<p>jkyt</p>\r\n', 'logo.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `config`
--

CREATE TABLE `config` (
  `id` int(2) UNSIGNED ZEROFILL NOT NULL,
  `db` varchar(50) NOT NULL DEFAULT '0',
  `user` varchar(50) NOT NULL DEFAULT '0',
  `pass` varchar(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_produk`
--

CREATE TABLE `kategori_produk` (
  `idkatproduk` int(4) UNSIGNED ZEROFILL NOT NULL,
  `nama_kategori` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `kategori_produk`
--

INSERT INTO `kategori_produk` (`idkatproduk`, `nama_kategori`) VALUES
(0001, 'Hotel');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfirmasi_tagihan`
--

CREATE TABLE `konfirmasi_tagihan` (
  `idkonfirmasi` int(4) UNSIGNED NOT NULL,
  `notagihan` varchar(32) DEFAULT NULL,
  `namapengirim` varchar(32) DEFAULT NULL,
  `email` varchar(12) DEFAULT NULL,
  `bankasal` varchar(32) DEFAULT NULL,
  `tgltransfer` varchar(64) DEFAULT NULL,
  `banktujuan` varchar(64) DEFAULT NULL,
  `jumlahtransfer` varchar(64) DEFAULT NULL,
  `pesan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `konfirmasi_tagihan`
--

INSERT INTO `konfirmasi_tagihan` (`idkonfirmasi`, `notagihan`, `namapengirim`, `email`, `bankasal`, `tgltransfer`, `banktujuan`, `jumlahtransfer`, `pesan`) VALUES
(1, '00293', '1212', 'no@gmail.com', 'Bank mandiri', '12/12/2019', 'BCA', '900000002', 'cepat ya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id` int(2) UNSIGNED ZEROFILL NOT NULL,
  `judul` varchar(64) NOT NULL,
  `url` varchar(64) NOT NULL,
  `type` enum('custom','statis') NOT NULL DEFAULT 'statis',
  `status` int(2) DEFAULT 0,
  `posisi` enum('atas','bawah') NOT NULL DEFAULT 'bawah'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id`, `judul`, `url`, `type`, `status`, `posisi`) VALUES
(02, 'Produk', 'produk', 'statis', 1, 'atas'),
(03, 'Registrasi / Login', 'pelanggan', 'statis', 1, 'atas'),
(04, 'Konfirmasi Pembayaran', 'konfirmasi', 'statis', 1, 'atas'),
(05, 'Hubungi Kami', 'hubungikami', 'statis', 1, 'bawah'),
(06, 'Tentang Kami', 'tentangkami', 'statis', 1, 'bawah'),
(07, 'Pusat Bantuan', 'pusatbantuan', 'statis', 1, 'bawah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pages`
--

CREATE TABLE `pages` (
  `id` int(2) UNSIGNED ZEROFILL NOT NULL,
  `judul` varchar(64) NOT NULL,
  `url` varchar(64) NOT NULL,
  `konten_singkat` text DEFAULT NULL,
  `konten` longtext DEFAULT NULL,
  `status` int(2) DEFAULT 0,
  `file` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `pages`
--

INSERT INTO `pages` (`id`, `judul`, `url`, `konten_singkat`, `konten`, `status`, `file`) VALUES
(01, 'Hubungi Kami', 'hubungikami', '<p>Hubungi Kami</p>\r\n', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Why do we use it? It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n', 1, 'page.jpg'),
(02, 'Tentang Kami', 'tentangkami', 'Tentang Kami', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nWhy do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n\r\n', 1, 'page.jpg'),
(03, 'Pusat Bantuan', 'pusatbantuan', 'Pusat Bantuan', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nWhy do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n\r\n', 1, 'page.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `idpelanggan` int(4) UNSIGNED NOT NULL,
  `nama_lengkap` varchar(128) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `kodepos` varchar(8) DEFAULT NULL,
  `nohp` varchar(16) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`idpelanggan`, `nama_lengkap`, `alamat`, `kodepos`, `nohp`, `email`, `password`) VALUES
(2, 'tt', 'tt', 'tt', 'tt', 'tt@gmail.com', '44'),
(6, '12', '89', '8', '89', '98@gmail.com', '9');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `idpesanan` int(4) UNSIGNED NOT NULL,
  `notagihan` varchar(10) DEFAULT NULL,
  `metode_pembayaran` enum('transfer','bayar_ditempat') NOT NULL DEFAULT 'transfer',
  `status_pembayaran` enum('Y','T') NOT NULL DEFAULT 'T',
  `catatan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`idpesanan`, `notagihan`, `metode_pembayaran`, `status_pembayaran`, `catatan`) VALUES
(14, 'INV0014', 'transfer', 'Y', 'io'),
(15, 'INV0015', 'transfer', 'T', '1212'),
(16, 'INV0016', 'transfer', 'T', '1212');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan_detail`
--

CREATE TABLE `pesanan_detail` (
  `idpesanandetail` int(4) UNSIGNED NOT NULL,
  `idpelanggan` varchar(32) DEFAULT NULL,
  `idproduk` int(4) DEFAULT 0,
  `notagihan` varchar(10) DEFAULT NULL,
  `jumlah` varchar(12) DEFAULT NULL,
  `status` enum('0','1') DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `pesanan_detail`
--

INSERT INTO `pesanan_detail` (`idpesanandetail`, `idpelanggan`, `idproduk`, `notagihan`, `jumlah`, `status`) VALUES
(46, '6', 1, 'INV0014', '1', '1'),
(47, '6', 2, 'INV0015', '1', '1'),
(48, '6', 1, 'INV0015', '1', '1'),
(49, '6', 1, 'INV0016', '1', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `idproduk` int(4) UNSIGNED ZEROFILL NOT NULL,
  `idkatproduk` int(4) DEFAULT 0,
  `nama_produk` varchar(128) DEFAULT NULL,
  `deskripsi` longtext DEFAULT NULL,
  `harga` varchar(12) DEFAULT NULL,
  `stok` varchar(12) DEFAULT NULL,
  `gambar1` varchar(255) DEFAULT NULL,
  `gambar2` varchar(255) DEFAULT NULL,
  `gambar3` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`idproduk`, `idkatproduk`, `nama_produk`, `deskripsi`, `harga`, `stok`, `gambar1`, `gambar2`, `gambar3`) VALUES
(0001, 1, 'Grand Tjokro Bandung ya', '<p>Jalan Pelajar Pejuang 45 No. 123, Lengkong, Bandung, Jawa Barat, Indonesia, 40264<br />\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>\r\n', '900000', '2', 'property-1.JPG', 'property-2.JPG', 'property-3.JPG'),
(0002, 1, 'The Trans Luxury Hotel oke banget', '<p>Jl. Gatot Subroto No. 289, Buahbatu, Bandung, Jawa Barat, Indonesia, 40273<br />\r\n<br />\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>\r\n', '1782500', '1', 'property-4.JPG', 'property-5.JPG', 'property-6.JPG'),
(0003, 1, 'Grand Tjokro Bandung', 'Jalan Cihampelas No 211-217 Bandung 40131, Cihampelas, Bandung, Jawa Barat, Indonesia, 40131<br><br>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', '890000', '3', 'property-7.JPG', 'property-8.JPG', 'property-9.JPG'),
(0008, 1, 'wew', '<p>rtttt</p>\r\n', '122', '6', 'banner4.png', 'banner5.png', 'banner6.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `slider`
--

CREATE TABLE `slider` (
  `id` int(2) UNSIGNED ZEROFILL NOT NULL,
  `judul` varchar(64) NOT NULL,
  `url` varchar(64) NOT NULL,
  `file` varchar(256) NOT NULL,
  `konten` text DEFAULT NULL,
  `status` int(2) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `slider`
--

INSERT INTO `slider` (`id`, `judul`, `url`, `file`, `konten`, `status`) VALUES
(01, 'Pilihan terbaik', '#', 'slide-1.jpg', NULL, 1),
(02, 'Banyak bonus semua produk', '#', 'slide-2.jpg', NULL, 1),
(03, 'Promo weekend ', '#', 'slide-3.jpg', NULL, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `iduser` int(4) UNSIGNED NOT NULL,
  `nama_lengkap` varchar(128) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `password` varchar(128) NOT NULL,
  `status` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`iduser`, `nama_lengkap`, `email`, `password`, `status`) VALUES
(1, 'Siganteng Banget', 'admin', '1', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori_produk`
--
ALTER TABLE `kategori_produk`
  ADD PRIMARY KEY (`idkatproduk`);

--
-- Indeks untuk tabel `konfirmasi_tagihan`
--
ALTER TABLE `konfirmasi_tagihan`
  ADD PRIMARY KEY (`idkonfirmasi`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`idpelanggan`);

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`idpesanan`);

--
-- Indeks untuk tabel `pesanan_detail`
--
ALTER TABLE `pesanan_detail`
  ADD PRIMARY KEY (`idpesanandetail`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`idproduk`);

--
-- Indeks untuk tabel `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `about`
--
ALTER TABLE `about`
  MODIFY `id` int(2) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `config`
--
ALTER TABLE `config`
  MODIFY `id` int(2) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kategori_produk`
--
ALTER TABLE `kategori_produk`
  MODIFY `idkatproduk` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `konfirmasi_tagihan`
--
ALTER TABLE `konfirmasi_tagihan`
  MODIFY `idkonfirmasi` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(2) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(2) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `idpelanggan` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `idpesanan` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `pesanan_detail`
--
ALTER TABLE `pesanan_detail`
  MODIFY `idpesanandetail` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `idproduk` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(2) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
