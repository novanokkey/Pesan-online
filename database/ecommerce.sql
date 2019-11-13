-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Nov 2019 pada 09.15
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
-- Struktur dari tabel `kategori_produk`
--

CREATE TABLE `kategori_produk` (
  `idkatproduk` int(4) UNSIGNED ZEROFILL NOT NULL,
  `nama_kategori` varchar(128) NOT NULL
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
  `notagihan` varchar(32) NOT NULL DEFAULT '0',
  `namapengirim` varchar(32) NOT NULL DEFAULT '0',
  `email` varchar(12) NOT NULL,
  `bankasal` varchar(32) NOT NULL DEFAULT '0',
  `tgltransfer` varchar(64) NOT NULL DEFAULT '0',
  `banktujuan` varchar(64) NOT NULL DEFAULT '0',
  `jumlahtransfer` varchar(64) NOT NULL DEFAULT '0',
  `pesan` text NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `idpesanandetail` int(4) UNSIGNED NOT NULL,
  `notagihan` varchar(32) NOT NULL,
  `idpesanan` int(4) NOT NULL DEFAULT 0,
  `metode_pembayaran` enum('transfer','bayar_ditempat') NOT NULL DEFAULT 'transfer',
  `term` enum('Y','T') NOT NULL DEFAULT 'T',
  `nama_awal` varchar(128) NOT NULL,
  `nama_akhir` varchar(128) NOT NULL,
  `idprovinsi` varchar(128) NOT NULL,
  `idkabkota` varchar(128) NOT NULL,
  `idkelurahan` varchar(128) NOT NULL,
  `alamat` text NOT NULL,
  `kodepos` varchar(8) NOT NULL,
  `nohp` varchar(16) NOT NULL,
  `email` varchar(128) NOT NULL,
  `catatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan_detail`
--

CREATE TABLE `pesanan_detail` (
  `idpesanan` int(4) UNSIGNED NOT NULL,
  `idproduk` int(4) NOT NULL DEFAULT 0,
  `notagihan` varchar(32) NOT NULL DEFAULT '0',
  `harga` varchar(12) NOT NULL,
  `jumlah` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `idproduk` int(4) UNSIGNED ZEROFILL NOT NULL,
  `idkatproduk` int(4) NOT NULL DEFAULT 0,
  `nama_produk` varchar(128) NOT NULL,
  `deskripsi` longtext NOT NULL,
  `harga` varchar(12) NOT NULL,
  `stok` varchar(12) NOT NULL,
  `gambar1` varchar(255) NOT NULL,
  `gambar2` varchar(255) NOT NULL,
  `gambar3` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`idproduk`, `idkatproduk`, `nama_produk`, `deskripsi`, `harga`, `stok`, `gambar1`, `gambar2`, `gambar3`) VALUES
(0001, 1, 'Grand Tjokro Bandung', 'Jalan Pelajar Pejuang 45 No. 123, Lengkong, Bandung, Jawa Barat, Indonesia, 40264 <br>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', '400000', '2', 'property-1.JPG', 'property-2.JPG', 'property-3.JPG'),
(0002, 1, 'The Trans Luxury Hotel', 'Jl. Gatot Subroto No. 289, Buahbatu, Bandung, Jawa Barat, Indonesia, 40273<br><br>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', '1782500', '1', 'property-4.JPG', 'property-5.JPG', 'property-6.JPG'),
(0003, 1, 'Grand Tjokro Bandung', 'Jalan Cihampelas No 211-217 Bandung 40131, Cihampelas, Bandung, Jawa Barat, Indonesia, 40131<br><br>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', '890000', '3', 'property-7.JPG', 'property-8.JPG', 'property-9.JPG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tagihan`
--

CREATE TABLE `tagihan` (
  `idtagihan` int(4) UNSIGNED NOT NULL,
  `notagihan` varchar(32) NOT NULL DEFAULT '0',
  `namadepan` varchar(32) NOT NULL DEFAULT '0',
  `namabelakang` varchar(32) NOT NULL DEFAULT '0',
  `provinsi` varchar(64) NOT NULL DEFAULT '0',
  `kota` varchar(64) NOT NULL DEFAULT '0',
  `kelurahan` varchar(64) NOT NULL DEFAULT '0',
  `alamat` text NOT NULL DEFAULT '0',
  `email` varchar(12) NOT NULL,
  `catatan` text NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Indexes for dumped tables
--

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
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`idpesanandetail`);

--
-- Indeks untuk tabel `pesanan_detail`
--
ALTER TABLE `pesanan_detail`
  ADD PRIMARY KEY (`idpesanan`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`idproduk`);

--
-- Indeks untuk tabel `tagihan`
--
ALTER TABLE `tagihan`
  ADD PRIMARY KEY (`idtagihan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kategori_produk`
--
ALTER TABLE `kategori_produk`
  MODIFY `idkatproduk` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `konfirmasi_tagihan`
--
ALTER TABLE `konfirmasi_tagihan`
  MODIFY `idkonfirmasi` int(4) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `idpesanandetail` int(4) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pesanan_detail`
--
ALTER TABLE `pesanan_detail`
  MODIFY `idpesanan` int(4) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `idproduk` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tagihan`
--
ALTER TABLE `tagihan`
  MODIFY `idtagihan` int(4) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
