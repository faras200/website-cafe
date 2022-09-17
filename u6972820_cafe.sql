-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Agu 2021 pada 09.33
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u6972820_cafe`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `level`) VALUES
(2, 'admin', '123', 1),
(7, 'tajudin', 'tajudin123', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_detail` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id_diskon` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total_harga` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_detail`, `id_transaksi`, `id_produk`, `id_diskon`, `jumlah`, `total_harga`) VALUES
(71, 63, 4, 0, 1, 26000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `diskon`
--

CREATE TABLE `diskon` (
  `id_diskon` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `nama_diskon` varchar(100) NOT NULL,
  `jumlah_diskon` int(11) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `diskon`
--

INSERT INTO `diskon` (`id_diskon`, `id_produk`, `nama_diskon`, `jumlah_diskon`, `status`) VALUES
(11, 4, 'Diskon Hari Raya', 25, 'aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `kategori_produk` varchar(50) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `detail_produk` varchar(300) NOT NULL,
  `harga_produk` double NOT NULL,
  `foto_produk` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `kategori_produk`, `nama_produk`, `detail_produk`, `harga_produk`, `foto_produk`) VALUES
(4, 'makanan_berat', 'RAMYEON', '', 26000, '60c8463c3fb4c.png'),
(5, 'cofee', 'MACCHIATO', '', 20000, '60c84b643ca84.png'),
(7, 'cofee', 'CAPPUCCINO', '', 23000, '60d948db1311c.png'),
(8, 'paket', 'HARTA TAHTA KARMA ', 'SOSIS, KENTANG, ONIONRING, LEMON TEA 1 PITCHER', 85000, '60f4271345847.jpeg'),
(10, 'paket', 'HARTA TAHTA BERSAMA', '', 105000, '60f426fab707f.jpeg'),
(12, 'makanan_berat', 'NASI GORENG BIASA', '', 20000, '60f428a45b2bc.jpeg'),
(17, 'cofee', 'DANNBAM SIGNATURE', '', 20000, '60f79c7751597.png'),
(18, 'cofee', 'HAZELNAT', '', 23000, '60f7a091a60c2.png'),
(19, 'cofee', 'MOCHACINO', '', 23000, '60f7a0b22427d.png'),
(20, 'cofee', 'BROWN SUGAR', '', 20000, '60f7a0c563d29.png'),
(21, 'cofee', 'RUM COFFEE', '', 23000, '60f7a0eb90381.png'),
(22, 'cofee', 'CARAMEL LATTE', '', 23000, '60f7a10707e06.png'),
(23, 'cofee', 'PANDAN COFFEE', '', 23000, '60f7a124ca113.png'),
(24, 'cofee', 'AMERICANO', '', 20000, '60f7a13597415.png'),
(25, 'cofee', 'LATTE HOT', '', 23000, '60f7a14cafefa.png'),
(26, 'non_coffe', 'RED VELVET', '', 20000, '60f7a1970e3ff.jpg'),
(27, 'non_coffe', 'MATCHA', '', 20000, '60f7a1b31c878.jpg'),
(28, 'non_coffe', 'TARO', '', 20000, '60f7a1c864c9e.jpg'),
(29, 'non_coffe', 'VANILLA', '', 20000, '60f7a1f20b8e6.jpg'),
(30, 'non_coffe', 'MILO', '', 15000, '60f7a287429ed.png'),
(31, 'non_coffe', 'MOJITO', '', 18000, '60f7a22cb9e14.png'),
(32, 'non_coffe', 'BLUE OCEAN', '', 18000, '60f7a248ac5ad.jpg'),
(33, 'non_coffe', 'CHOCOLATE', '', 18000, '60f7a27dbb611.jpg'),
(34, 'softdrink', 'LEMON TEA', '', 7000, '60f7a2a195781.jpg'),
(35, 'softdrink', 'LYCHEE TEA ', '', 15000, '60f7a2b6b8769.png'),
(36, 'softdrink', 'SWEET TEA', '', 5000, '60f7a2c9c794e.jpg'),
(37, 'softdrink', 'PLAIN TEA', '', 3000, '60f7a38c121a8.jpg'),
(38, 'softdrink', 'MINERAL WATER', '', 5000, '60f7a3b0f244d.jpg'),
(39, 'softdrink', 'FANTA', '', 5000, '60f7a3c1ad6c8.jpg'),
(40, 'softdrink', 'COLA', '', 8000, '60f7a3dd2891b.png'),
(41, 'makanan_berat', 'NASI GORENG DANNBAM', '', 25000, '60f7a41d5e62d.jpeg'),
(42, 'makanan_berat', 'NASI GORENG SEAFOOD', '', 30000, '60f7a43873d62.jpeg'),
(43, 'makanan_berat', 'BOLOGNESSE', '', 26000, '60f7a44f0652a.jpg'),
(44, 'makanan_berat', 'CARBONARA', '', 25000, '60f7a46181817.png'),
(45, 'makanan_berat', 'MIE SINGLE', '', 8000, '60f7a5100dc4f.jpg'),
(46, 'makanan_berat', 'MIE DOUBLE', '', 12000, '60f7a523a48bc.jpg'),
(47, 'makanan_berat', 'BURGER HARTA (NO CHESSE)', '', 25000, '60f7a53d709f3.jpeg'),
(48, 'makanan_berat', 'BURGER TAHTA (CHESSE)', '', 29000, '60f7a55268a15.jpeg'),
(49, 'makanan_berat', 'BURGER KARMA (DOUBLE PATTY AND CHESSE)', '', 55000, '60f7a5645e85c.jpeg'),
(50, 'makanan_berat', 'CAPCAY', '', 20000, '60f7a57109d8f.jpg'),
(51, 'makanan_ringan', 'FRENCH FRIES', '', 15000, '60f7a5d515ede.png'),
(52, 'makanan_ringan', 'PISANG GORENG', '', 15000, '60f7a5f69bb99.png'),
(53, 'makanan_ringan', 'OTAK-OTAK', '', 15000, '60f7a60d640b5.png'),
(54, 'makanan_ringan', 'CHICKEN WINGS', '', 25000, '60f7a68581ee1.jpg'),
(55, 'makanan_ringan', 'SOSIS', '', 15000, '60f7a6969f85f.jpg'),
(56, 'makanan_ringan', 'CHICKEN WINGS', '', 25000, '60f7a6b073360.jpg'),
(57, 'makanan_ringan', 'BRULEE BOOM', '', 20000, '60f7a6ca3d2ff.jpeg'),
(58, 'makanan_ringan', 'CIRENG', '', 15000, '60f7a6e0e7b1b.jpg'),
(59, 'makanan_ringan', 'ROTI BAKAR 1 RASA', '', 15000, '60f7a6fb60ef2.jpg'),
(60, 'makanan_ringan', 'ROTI BAKAR 2 RASA', '', 18000, '60f7a70cc0ee0.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_user` varchar(100) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `metode_bayar` varchar(100) NOT NULL,
  `no_meja` int(11) NOT NULL,
  `status_transaksi` varchar(100) NOT NULL,
  `jumlah_transaksi` double NOT NULL,
  `jumlah_dibayar` double NOT NULL,
  `tanggal_transaksi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_user`, `id_admin`, `metode_bayar`, `no_meja`, `status_transaksi`, `jumlah_transaksi`, `jumlah_dibayar`, `tanggal_transaksi`) VALUES
(63, 'ocPxnlN4AxDCnH2GQtsyGDwcrKgRPX7DynYYgnF18Ue9Hbt8yd', 2, 'bank', 2, 'dibayar', 26000, 30000, '2021-08-16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `no` int(11) NOT NULL,
  `id_user` varchar(100) NOT NULL,
  `nama_user` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`no`, `id_user`, `nama_user`) VALUES
(17, 'XtmpPwBAXjc27celqHZzaVwblIChc5ZazWl6K6tmjk2ZDt5pOm', 'Tajuddin'),
(19, 'DxvWJap7ohFVCxOb2ueVRzckANsdU3rKdcwlfKmufxic4yWosR', 'iwal'),
(20, 'rizRU6zgAxTyIDUEf21SG6jYGtNGkehXzQ6aLYdyYIxvizkaG7', 'Dwi'),
(21, 'Q1wmPpzto5om4xWquNYQWuhW7EMTXtY1E3TUlSMu4oU7L8FE4X', 'Dwi'),
(22, '6CbuQYKyupKe99Xo7GtuBxDEsNirZQGabPCzQjqF2gWTMyyuR7', 'oja'),
(23, 'Ce54UsUxWuRAAdDyxZ91gGWt6NtXzo2tmPMR1XT9Ky9psObwaS', 'Dwi'),
(24, 'ftTbSfMO8vGzwq8LTPNsRS2ZzvJ7z9WxWXIIQajWjhR7NF4LgG', 'Dwi'),
(25, 'HIYov1IGUgmr78uZn3dGEiqRKIs1x71WzWtXWOP5ZfRuGRCewt', 'Bintang'),
(26, 'OJp7aAcadqIKs1NBdOaXFAnhXWHvN3rtYsyDKjrqATNzgxNqkO', 'Dwi'),
(27, 'atG2iSeGNkb9mXubJ198OoByN1on4V41mJetagaOe4j2m3FrIF', 'Dwi'),
(28, 'ltjt5Qiu35IDDxS7RpVHjBCcMynawGUGtOu122xGsXAqgkltLQ', 'Neba'),
(29, 'FpkVc49IpIlWu4pCZ2bNbZKMSftcbZyAlTWMzFcJ1IbOyy9p4M', 'septi'),
(30, 'FYwrsXoTxnpavmOHIs7CMKIkd4X8AZeLeY5u8FJcfc48UzH4E8', 'Dwi'),
(31, 'Kk9gxmiCbEq3QHmgg96e5QF2c9S2ywCS74GMWgQZzPEXHKDa39', 'Dwi'),
(32, 'pQG98t57zWHZ4ukDMvqYHoHhSNBeSGEQhNgEBjBwkvJcWu3NtQ', 'Dwi'),
(33, '15uXCs19ZeQYc3NZQH5nt9hbJbxVlh7rWAvJkGkZ14u1gVNtg6', 'Dwi'),
(34, 'IrXLWUqKbdwatqtML1Ol1jY4cSXlcmbkFzl9lCufdzjFBooyiq', 'Dwi'),
(35, 'bcFYNMNDQ63PGEHa1sdqx3AzB9qT3bwOoEZhjZJWNx3zOvpHQD', 'Dwi'),
(36, 'f6Ypxodn6gO6BJKwdod3Fc9cisjwTjVQaOmaflBpKIz7cCULZO', 'Dwi'),
(37, '2T3ONNchMgqznawehQTkunPIzbcZFKZn7BTI3mtwpItMjKDfkV', ''),
(38, 'IVdcznBgWkMYSWi1hFluoVEtrnKMzIPac9uGIAd7zZ5gDb1Otn', ''),
(39, 'QL79Fn25VmhCcrTekcmMHjSLWXyN8VNWH281LVOXwsHJ5NCzD4', ''),
(40, 'AeahlUfXcpeKVkwJIbey5BAlWA4j3GRFv25OU8RgFftdG3PNMj', ''),
(41, 'yRCoQtA24YIbLsK2NZG4jMCnHSklPgSwHrPNLBykYLE5V6OzLr', ''),
(42, 'NxeZgkObkL9djlNp3KJHWHZ9JPsBunO53NgTdt3u4JX25CwZxE', 'Dwi'),
(43, 'Paw9jL33ZCB6DBUWHoDqlHqpUNxMwvHSFiPep4ZRv5eKCYKhFh', 'Dwi'),
(44, 'C7GcG4mLr98zeMIiPjwhphtMT7V6wZOyIR3I9gPwLqust3qist', 'Tajuddin Habimasto'),
(45, 'dDWcBB4WJvhZPJpvxCwO7a2CQwvjx2B119VDku2yX75HsggfW5', 'Tajuddin Habimasto'),
(46, 'NSwX4uSl3rC8VViiL7dffuwi9RiiwdTYksyOrBbcQJuA7H2XV3', '123'),
(47, 'Kjn72nbZuyF9zqb8P7cjoPKsscMD8ronKfIMDaKIUapUB3QzNE', 'Mufida '),
(48, '9OZKe6QbbnSNFPdjV8wMYvAwrNThb4WS2pz6ytNkllVPn7GECR', 'Dwi'),
(49, 'QF4mWiNF6MEUSWkYrgvxOzxA22NIi77PkOomXvLOzQGZbuiJOl', 'rizal'),
(50, 'HuUS6MYjantXuhkmQEntdswUmfzYnhNEyoKQ6uTim5IkZI9grD', 'Dwi'),
(51, 'QbRd8VKXe4SLSvK2Qd3WyusYW5IuhkH752FmUWV1oIRnnNHT7D', 'Tajuddin Habimasto'),
(52, 'hqmcPqbyOiZoKD2A5Ykyaj5ZmDbI3W6GbLbjTv1C6hOl9FOIma', 'Dwi'),
(53, 'ocPxnlN4AxDCnH2GQtsyGDwcrKgRPX7DynYYgnF18Ue9Hbt8yd', 'Aldi');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indeks untuk tabel `diskon`
--
ALTER TABLE `diskon`
  ADD PRIMARY KEY (`id_diskon`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`no`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT untuk tabel `diskon`
--
ALTER TABLE `diskon`
  MODIFY `id_diskon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
