-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Sep 2022 pada 12.48
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tokoaing`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `baner`
--

CREATE TABLE `baner` (
  `banerid` int(11) UNSIGNED NOT NULL,
  `banernama` varchar(50) NOT NULL,
  `banerjudul` varchar(50) NOT NULL,
  `banersubjudul` varchar(50) NOT NULL,
  `banerdeskripsi` text NOT NULL,
  `banerfoto` varchar(50) NOT NULL,
  `banerbackground` varchar(50) NOT NULL,
  `banerclass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `baner`
--

INSERT INTO `baner` (`banerid`, `banernama`, `banerjudul`, `banersubjudul`, `banerdeskripsi`, `banerfoto`, `banerbackground`, `banerclass`) VALUES
(1, 'VIRAL SERIES', '', '', '', 'banner1.png', 'banner2.jpg', 'active'),
(2, 'Meja Rias', 'MR 2225', 'Graver Meja Rias Minimalis Agusto', 'Keterangan', 'banner_img_01.png', 'kosong.png', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `branch`
--

CREATE TABLE `branch` (
  `branchid` int(11) NOT NULL,
  `branchnama` varchar(50) NOT NULL,
  `branchgambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `branch`
--

INSERT INTO `branch` (`branchid`, `branchnama`, `branchgambar`) VALUES
(1, 'GRAVER', 'logo-graver.jpg'),
(2, 'BENEFIT', 'logo-benefit.jpg'),
(3, 'POPULAR', 'logo-popular.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `katid` int(11) NOT NULL,
  `katnama` varchar(50) NOT NULL,
  `katparent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`katid`, `katnama`, `katparent`) VALUES
(1, 'Meja', 0),
(2, 'Meja Rias', 1),
(3, 'Meja TV', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `levels`
--

CREATE TABLE `levels` (
  `levelid` int(11) UNSIGNED NOT NULL,
  `levelnama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `levels`
--

INSERT INTO `levels` (`levelid`, `levelnama`) VALUES
(1, 'Admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(32, '2022-08-23-073332', 'App\\Database\\Migrations\\Levels', 'default', 'App', 1661324715, 1),
(33, '2022-08-23-073551', 'App\\Database\\Migrations\\Users', 'default', 'App', 1661324715, 1),
(34, '2022-08-23-074237', 'App\\Database\\Migrations\\Perusahaan', 'default', 'App', 1661324716, 1),
(35, '2022-08-23-074606', 'App\\Database\\Migrations\\Sosmed', 'default', 'App', 1661324716, 1),
(36, '2022-08-24-011919', 'App\\Database\\Migrations\\Baner', 'default', 'App', 1661324716, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `perusahaan`
--

CREATE TABLE `perusahaan` (
  `peruid` int(11) UNSIGNED NOT NULL,
  `perunama` varchar(50) NOT NULL,
  `perualamat` text NOT NULL,
  `perualamatlink` text NOT NULL,
  `perutelp` varchar(50) NOT NULL,
  `peruwa` varchar(50) NOT NULL,
  `perufax` varchar(50) NOT NULL,
  `peruemail` varchar(50) NOT NULL,
  `peruicon` varchar(50) NOT NULL,
  `perufoto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `perusahaan`
--

INSERT INTO `perusahaan` (`peruid`, `perunama`, `perualamat`, `perualamatlink`, `perutelp`, `peruwa`, `perufax`, `peruemail`, `peruicon`, `perufoto`) VALUES
(1, 'Graver Furniture', 'Jl. Kapuk Kamal Indah 1 No.Kav 15 - 17', 'https://www.google.com/maps/place/Rackindo+Setara+Perkasa+(GRAVER)/@-6.1014157,106.7102402,19z/data=!4m5!3m4!1s0x2e6a02d9ade5f543:0x8333b9a842148012!8m2!3d-6.1013744!4d106.7094539', '021 5595 1295', '+6285810100913', '021 2255 6109', 'rackindo@gmail.com', 'favicon.png', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `product`
--

CREATE TABLE `product` (
  `prodid` int(11) NOT NULL,
  `prodnama` varchar(50) NOT NULL,
  `prodtype` varchar(50) NOT NULL,
  `prodkat` int(11) NOT NULL,
  `prodbranch` int(11) NOT NULL,
  `proddeskripsi` text NOT NULL,
  `prodharga` double NOT NULL,
  `prodstock` int(11) NOT NULL,
  `prodgambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `product`
--

INSERT INTO `product` (`prodid`, `prodnama`, `prodtype`, `prodkat`, `prodbranch`, `proddeskripsi`, `prodharga`, `prodstock`, `prodgambar`) VALUES
(1, 'Viral Graver Credenza', 'CRD 2182', 3, 1, 'CRD 2182 Viral Graver Credenza Meja Tv Rak Tv Bufet Tv <br>\r\n<br\r\n✓ Produk terbaru, kualitas terbaik dari GRAVER FURNTIURE<br\r\n✓ Ukuran Panjang :120x Lebar : 40 x Tinggi : 60 cm<br\r\n✓ Bahan kayu partikel board campur MDF<br\r\n✓ Warna : Paper Colombia Walnut + Paper Linen<br\r\n✓ Knockdown system,precision maker', 643000, 0, 'CRD 2182.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `productdetail`
--

CREATE TABLE `productdetail` (
  `detid` int(11) NOT NULL,
  `detprodid` int(11) NOT NULL,
  `detprofoto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `productdetail`
--

INSERT INTO `productdetail` (`detid`, `detprodid`, `detprofoto`) VALUES
(1, 1, 'CRD 2182.jpg'),
(2, 1, 'CRD 2186.jpg'),
(3, 1, 'CRD 2189.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sosmed`
--

CREATE TABLE `sosmed` (
  `sosmedid` int(11) UNSIGNED NOT NULL,
  `sosmedlink` text NOT NULL,
  `sosmednama` varchar(100) NOT NULL,
  `sosmedicon` varchar(50) NOT NULL,
  `sosmedperuid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `sosmed`
--

INSERT INTO `sosmed` (`sosmedid`, `sosmedlink`, `sosmednama`, `sosmedicon`, `sosmedperuid`) VALUES
(1, 'https://www.instagram.com/rackindo.idn/?hl=id', '@rackindo.idn', '<i class=\'fab fa-instagram\'></i>', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `userid` varchar(50) NOT NULL,
  `usernama` varchar(50) NOT NULL,
  `userpassword` varchar(50) NOT NULL,
  `userlevel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`userid`, `usernama`, `userpassword`, `userlevel`) VALUES
('sutino.skom@gmail.com', 'Sutino', '123', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `baner`
--
ALTER TABLE `baner`
  ADD PRIMARY KEY (`banerid`);

--
-- Indeks untuk tabel `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`branchid`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`katid`);

--
-- Indeks untuk tabel `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`levelid`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`peruid`);

--
-- Indeks untuk tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`prodid`,`prodkat`,`prodbranch`) USING BTREE,
  ADD KEY `kategori` (`prodkat`),
  ADD KEY `branch` (`prodbranch`);

--
-- Indeks untuk tabel `productdetail`
--
ALTER TABLE `productdetail`
  ADD PRIMARY KEY (`detid`);

--
-- Indeks untuk tabel `sosmed`
--
ALTER TABLE `sosmed`
  ADD PRIMARY KEY (`sosmedid`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `baner`
--
ALTER TABLE `baner`
  MODIFY `banerid` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `branch`
--
ALTER TABLE `branch`
  MODIFY `branchid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `katid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `levels`
--
ALTER TABLE `levels`
  MODIFY `levelid` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `peruid` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `product`
--
ALTER TABLE `product`
  MODIFY `prodid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `productdetail`
--
ALTER TABLE `productdetail`
  MODIFY `detid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `sosmed`
--
ALTER TABLE `sosmed`
  MODIFY `sosmedid` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `branch` FOREIGN KEY (`prodbranch`) REFERENCES `branch` (`branchid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kategori` FOREIGN KEY (`prodkat`) REFERENCES `kategori` (`katid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
