-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Okt 2021 pada 18.40
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `umkm`
--

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `aa`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `aa` (
`id_pembayaran` bigint(20)
,`id_pesanan` bigint(20)
,`nama` varchar(200)
,`no_transfer` varchar(200)
,`tanggal_transfer` date
,`proof` varchar(200)
,`status` tinyint(4)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_10_03_160249_add_customer_phone_to_users_table', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` bigint(20) NOT NULL,
  `level` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `remember_token` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `customer_id` bigint(20) NOT NULL,
  `level` int(11) NOT NULL,
  `customer_name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `customer_phone` varchar(12) NOT NULL,
  `customer_address` varchar(200) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_customer`
--

INSERT INTO `tbl_customer` (`customer_id`, `level`, `customer_name`, `email`, `password`, `customer_phone`, `customer_address`, `status`) VALUES
(1005, 2, '', 'dandy@gmail.com', '$2y$10$gwduxII.aWPzguQ9P0yRCOEM0/6IVHwL3Fs3ADJsq8RA5pQ2OoQ9y', '087', 'Kota Kuningan', 1),
(1006, 2, '', 'zend@gmail.com', '$2y$10$v0O4Wj5gIB.heaa/gqN5D.bIwu27Hb4AwT2WTVo.F7I4RZkb2lXeq', '08777', 'Kadugede', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` bigint(20) NOT NULL,
  `id_penjual` bigint(20) NOT NULL,
  `nama_kategori` varchar(200) NOT NULL,
  `slug` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `id_penjual`, `nama_kategori`, `slug`) VALUES
(48963, 1004, 'Teknologi', 'teknologi'),
(375206, 1004, 'Fashion', 'fashion'),
(530842, 1007, 'Buah Buahan', 'buah-buahan'),
(639870, 1004, 'Alat Olahraga', 'alat-olahraga'),
(768193, 1007, 'Perlengkapan Sekolah', 'perlengkapan-sekolah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pembayaran`
--

CREATE TABLE `tbl_pembayaran` (
  `id_pembayaran` bigint(20) NOT NULL,
  `id_produk` bigint(20) NOT NULL,
  `id_pesanan` bigint(20) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `no_transfer` varchar(200) NOT NULL,
  `tanggal_transfer` date NOT NULL,
  `proof` varchar(200) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_pembayaran`
--

INSERT INTO `tbl_pembayaran` (`id_pembayaran`, `id_produk`, `id_pesanan`, `nama`, `no_transfer`, `tanggal_transfer`, `proof`, `jumlah`, `subtotal`, `status`) VALUES
(95813, 538902, 946315, 'zend', '222', '2021-10-29', '222', 20, 40000, 3),
(120976, 318406, 105769, 'Dandy', '111', '2021-10-29', '111', 1, 2895000, 2),
(126548, 741286, 802397, 'Dandy', '111', '2021-10-29', '111', 1, 100000, 2),
(208674, 125389, 435167, 'zend', '222', '2021-10-29', '222', 10, 300000, 2),
(309462, 350124, 743059, 'zend', '111', '2021-10-29', '111', 30, 90000, 3),
(390415, 107382, 283579, 'zend', '111', '2021-10-29', '1111', 5, 250000, 3),
(946320, 125389, 780243, 'Dandy', '111', '2021-10-29', '111', 2, 60000, 2);

--
-- Trigger `tbl_pembayaran`
--
DELIMITER $$
CREATE TRIGGER `Update_Penghasilan_Tbl_Produk` AFTER UPDATE ON `tbl_pembayaran` FOR EACH ROW BEGIN
UPDATE tbl_produk SET penghasilan = penghasilan + NEW.subtotal WHERE id_produk = NEW.id_produk;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Update_Status_Menunggu_Verifikasi` AFTER INSERT ON `tbl_pembayaran` FOR EACH ROW BEGIN
UPDATE tbl_pesanan SET status=3 WHERE id_pesanan=NEW.id_pesanan;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Update_Status_Sudah_Bayar` AFTER UPDATE ON `tbl_pembayaran` FOR EACH ROW BEGIN
UPDATE tbl_pesanan SET status=2 WHERE id_pesanan=NEW.id_pesanan;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Update_Terjual_Tbl_Produk` AFTER UPDATE ON `tbl_pembayaran` FOR EACH ROW BEGIN
UPDATE tbl_produk SET terjual = terjual + NEW.jumlah WHERE id_produk = NEW.id_produk;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_penjual`
--

CREATE TABLE `tbl_penjual` (
  `id_penjual` bigint(20) NOT NULL,
  `level` int(11) NOT NULL,
  `penjual_name` text NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(200) NOT NULL,
  `penjual_phone` varchar(12) NOT NULL,
  `penjual_address` varchar(200) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_penjual`
--

INSERT INTO `tbl_penjual` (`id_penjual`, `level`, `penjual_name`, `email`, `password`, `penjual_phone`, `penjual_address`, `status`) VALUES
(1004, 3, '', 'rahmat@gmail.com', '$2y$10$y35wXhgcVzBheujOJ2f8U.nqPL4GcAn3BhtQqrWfQgUOsR1uUgJzi', '081', 'Desa Cipondok', 1),
(1007, 3, '', 'zain@gmail.com', '$2y$10$cdGLgRTElQjw4qeiv2e7Ye.hJka.3vDTQAjyK6m9Wrsu2ANte8Hx2', '083', 'Windujanten', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pesanan`
--

CREATE TABLE `tbl_pesanan` (
  `id_pesanan` bigint(20) NOT NULL,
  `invoice` varchar(200) NOT NULL,
  `customer_id` varchar(200) NOT NULL,
  `customer_name` varchar(200) NOT NULL,
  `customer_phone` varchar(12) NOT NULL,
  `customer_address` varchar(200) NOT NULL,
  `subtotal` int(11) DEFAULT NULL,
  `status` char(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_pesanan`
--

INSERT INTO `tbl_pesanan` (`id_pesanan`, `invoice`, `customer_id`, `customer_name`, `customer_phone`, `customer_address`, `subtotal`, `status`) VALUES
(105769, 'EMT8J2', '1005', 'Dandy', '087', 'Kota Kuningan', 2895000, '2'),
(283579, '2UIZS0', '1006', 'zend', '08777', 'Kadugede', 250000, '3'),
(435167, 'S2UVIM', '1006', 'zend', '08777', 'Kadugede', 300000, '2'),
(613975, 'AI0QB7', '1005', 'Dandy', '087', 'Kota Kuningan', 60000, '0'),
(630729, '0KOADV', '1005', 'Dandy', '087', 'Kota Kuningan', 90000, '1'),
(671485, 'EVYQ6S', '1005', 'Dandy', '087', 'Kota Kuningan', 30000, '0'),
(743059, 'GJ0Q29', '1006', 'zend', '08777', 'Kadugede', 90000, '3'),
(780243, 'ERC4U1', '1005', 'Dandy', '087', 'Kota Kuningan', 60000, '2'),
(802397, 'BVUP9Q', '1005', 'Dandy', '087', 'Kota Kuningan', 100000, '2'),
(946315, 'EF6QW9', '1006', 'zend', '08777', 'Kadugede', 40000, '3');

--
-- Trigger `tbl_pesanan`
--
DELIMITER $$
CREATE TRIGGER `Hapus_Pesanan` AFTER DELETE ON `tbl_pesanan` FOR EACH ROW BEGIN
	DELETE FROM tbl_pesanan_detail WHERE
    id_pesanan=OLD.id_pesanan;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pesanan_detail`
--

CREATE TABLE `tbl_pesanan_detail` (
  `id_pesanan_detail` bigint(20) NOT NULL,
  `id_pesanan` bigint(20) NOT NULL,
  `id_produk` bigint(20) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `berat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_pesanan_detail`
--

INSERT INTO `tbl_pesanan_detail` (`id_pesanan_detail`, `id_pesanan`, `id_produk`, `harga`, `jumlah`, `berat`) VALUES
(780243, 780243, 125389, 30000, 2, 1),
(1005, 802397, 741286, 100000, 1, 3),
(1005, 105769, 318406, 2895000, 1, 1),
(743059, 743059, 350124, 3000, 30, 1),
(1006, 435167, 125389, 30000, 10, 1),
(1006, 946315, 538902, 2000, 20, 1),
(630729, 630729, 125389, 30000, 3, 1),
(1005, 613975, 125389, 30000, 2, 1),
(1005, 671485, 350124, 3000, 10, 1),
(283579, 283579, 107382, 50000, 5, 1);

--
-- Trigger `tbl_pesanan_detail`
--
DELIMITER $$
CREATE TRIGGER `Kurangi_Stok` AFTER INSERT ON `tbl_pesanan_detail` FOR EACH ROW BEGIN
UPDATE tbl_produk SET stok = stok - NEW.jumlah WHERE id_produk = NEW.id_produk;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Tambah_Stok` AFTER DELETE ON `tbl_pesanan_detail` FOR EACH ROW BEGIN
	UPDATE tbl_produk SET stok = stok + OLD.jumlah WHERE id_produk = OLD.id_produk;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_produk`
--

CREATE TABLE `tbl_produk` (
  `id_produk` bigint(20) NOT NULL,
  `id_penjual` bigint(20) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `id_kategori` bigint(20) NOT NULL,
  `deskripsi` varchar(200) NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `stok` int(11) NOT NULL DEFAULT 0,
  `harga` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `terjual` int(11) NOT NULL DEFAULT 0,
  `penghasilan` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_produk`
--

INSERT INTO `tbl_produk` (`id_produk`, `id_penjual`, `nama`, `id_kategori`, `deskripsi`, `gambar`, `stok`, `harga`, `berat`, `status`, `terjual`, `penghasilan`) VALUES
(84569, 1004, 'Sweater', 375206, 'Sweater Hangat Untuk Musim Dingin', '084569.jpg', 200, 20000, 1, 1, 0, 0),
(107382, 1004, 'Flash Disk', 48963, 'Untuk Menyimpan Data', '107382.jpg', 495, 50000, 1, 2, 0, 0),
(125389, 1004, 'T-Shirt Punk', 375206, 'Kaos T-Shirt Anak Punk , Seperti Gelandangan', '125389.jpg', 288, 30000, 1, 2, 12, 360000),
(318406, 1004, 'AMD Ryzen 5 3600', 48963, 'Prosessor AMD Ryzen Untuk Desktop', '318406.jpg', 49, 2895000, 1, 2, 1, 2895000),
(350124, 1007, 'Jeruk', 530842, 'Buah Jeruk Segar Kualitas Tinggi', '350124.jpg', 490, 3000, 1, 2, 0, 0),
(371942, 1004, 'Mouse Gaming', 48963, 'Mouse Untuk Bermain Game Dengan Sensitifitas Tinggi', '371942.jpg', 800, 200000, 2, 1, 0, 0),
(538902, 1007, 'Buku Sekolah', 768193, 'Buku Tulis Untuk Anak Sekolah', '538902.jpg', 1000, 2000, 1, 2, 0, 0),
(741286, 1004, 'Bola Basket Spalding NBA', 639870, 'Bola Basket Dengan Kualitas Bahan Premium', '741286.jpg', 99, 100000, 3, 2, 1, 100000),
(923714, 1007, 'Apel', 530842, 'Buah Apel Segar Kualitas Tinggi', '923714.jpg', 1010, 3000, 1, 2, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `test`
--

CREATE TABLE `test` (
  `test` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `test`
--

INSERT INTO `test` (`test`) VALUES
('0'),
('0'),
('1'),
('1'),
('1'),
('0'),
('1'),
('52941'),
('96813'),
('354809'),
('367584'),
('526103'),
('610583'),
('832960'),
('897031'),
('901765'),
('1'),
('1'),
('1'),
('52941'),
('96813'),
('354809'),
('367584'),
('526103'),
('610583'),
('832960'),
('897031'),
('901765'),
('1'),
('13'),
('13'),
('22'),
('22'),
('1'),
('52941'),
('96813'),
('354809'),
('367584'),
('526103'),
('610583'),
('832960'),
('897031'),
('901765'),
('1'),
('13'),
('13'),
('22'),
('22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_phone` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_address` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `level` int(11) DEFAULT 2,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `customer_phone`, `customer_address`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `level`, `status`) VALUES
(1, 'Dandy Rahmat Zain', '', '', 'dandyrahmatzain21@gmail.com', NULL, '$2y$10$JzqBC/E7V666/B134ZacT.mBCd.SJmFNnfbIDomJ93uvU.6HhIjAC', NULL, '2021-07-14 22:13:58', '2021-07-14 22:13:58', 1, 0),
(1004, 'Rahmat', '081', 'Desa Cipondok', 'rahmat@gmail.com', NULL, '$2y$10$y35wXhgcVzBheujOJ2f8U.nqPL4GcAn3BhtQqrWfQgUOsR1uUgJzi', NULL, '2021-10-14 03:15:49', '2021-10-14 03:15:49', 3, 1),
(1005, 'Dandy', '087', 'Kota Kuningan', 'dandy@gmail.com', NULL, '$2y$10$gwduxII.aWPzguQ9P0yRCOEM0/6IVHwL3Fs3ADJsq8RA5pQ2OoQ9y', NULL, '2021-10-14 03:43:55', '2021-10-14 03:43:55', 2, 1),
(1006, 'zend', '08777', 'Kadugede', 'zend@gmail.com', NULL, '$2y$10$v0O4Wj5gIB.heaa/gqN5D.bIwu27Hb4AwT2WTVo.F7I4RZkb2lXeq', NULL, '2021-10-14 07:40:10', '2021-10-14 07:40:10', 2, 1),
(1007, 'Zain', '083', 'Windujanten', 'zain@gmail.com', NULL, '$2y$10$cdGLgRTElQjw4qeiv2e7Ye.hJka.3vDTQAjyK6m9Wrsu2ANte8Hx2', NULL, '2021-10-14 07:40:55', '2021-10-14 07:40:55', 3, 1);

--
-- Trigger `users`
--
DELIMITER $$
CREATE TRIGGER `Otomatis_Isi_Tbl_Customer_dan_Penjual` AFTER INSERT ON `users` FOR EACH ROW IF New.level=2 THEN 
    INSERT tbl_customer SET customer_id=NEW.id,
    level=NEW.level,
    customer_phone=NEW.customer_phone,
    customer_address=NEW.customer_address,
    email=NEW.email,
    password=NEW.password,
    status=NEW.status;
ELSE
	INSERT tbl_penjual SET id_penjual=NEW.id,
    level=NEW.level,
    penjual_phone=NEW.customer_phone,
    penjual_address=NEW.customer_address,
    email=NEW.email,
    password=NEW.password,
    status=NEW.status;
END IF
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur untuk view `aa`
--
DROP TABLE IF EXISTS `aa`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `aa`  AS SELECT `tbl_pembayaran`.`id_pembayaran` AS `id_pembayaran`, `tbl_pembayaran`.`id_pesanan` AS `id_pesanan`, `tbl_pembayaran`.`nama` AS `nama`, `tbl_pembayaran`.`no_transfer` AS `no_transfer`, `tbl_pembayaran`.`tanggal_transfer` AS `tanggal_transfer`, `tbl_pembayaran`.`proof` AS `proof`, `tbl_pembayaran`.`status` AS `status` FROM `tbl_pembayaran` ORDER BY `tbl_pembayaran`.`status` ASC ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indeks untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indeks untuk tabel `tbl_penjual`
--
ALTER TABLE `tbl_penjual`
  ADD PRIMARY KEY (`id_penjual`);

--
-- Indeks untuk tabel `tbl_pesanan`
--
ALTER TABLE `tbl_pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indeks untuk tabel `tbl_produk`
--
ALTER TABLE `tbl_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `customer_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1007;

--
-- AUTO_INCREMENT untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=974064;

--
-- AUTO_INCREMENT untuk tabel `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  MODIFY `id_pembayaran` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=946321;

--
-- AUTO_INCREMENT untuk tabel `tbl_penjual`
--
ALTER TABLE `tbl_penjual`
  MODIFY `id_penjual` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2007;

--
-- AUTO_INCREMENT untuk tabel `tbl_pesanan`
--
ALTER TABLE `tbl_pesanan`
  MODIFY `id_pesanan` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=946316;

--
-- AUTO_INCREMENT untuk tabel `tbl_produk`
--
ALTER TABLE `tbl_produk`
  MODIFY `id_produk` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=943502;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1008;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
