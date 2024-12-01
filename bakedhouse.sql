-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2023 at 08:05 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bakedhouse`
--

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` int(20) NOT NULL,
  `deskripsi` varchar(500) NOT NULL,
  `gambar` varchar(15) NOT NULL,
  `stok` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `kategori`, `nama`, `harga`, `deskripsi`, `gambar`, `stok`) VALUES
(1, 'donat', 'Avocado Dicapriod', 8000, 'Donat diisi krim alpukat, dicelupkan ke dalam coklat alpukat, dan dihias dengan serpihan coklat hita', 'donat1.png', 37),
(2, 'Donat', 'Berry Spears', 9000, 'Donat diisi dengan krim keju kocok, dicelupkan ke dalam selai stroberi, dan dihias dengan serpihan coklat', 'donat2.png', 51),
(3, 'donat', 'Black Jack', 8500, 'Donat terbungkus seluruhnya dalam coklat hitam.', 'donat3.png', 6),
(4, 'donat', 'Blue Berrymore', 9000, 'Donat diisi dengan krim keju kocok, dicelupkan ke dalam selai blueberry, dan dihias dengan serpihan ', 'donat4.png', 20),
(5, 'donat', 'Caviar Chocolate', 8500, 'Donat dicelupkan ke dalam coklat hazelnut dan ditaburi keripik berlapis coklat hitam.', 'donat5.png', 48),
(6, 'donat', 'Cheese Cakelicious', 9000, 'Donat diisi dengan krim keju kocok, dicelupkan ke dalam coklat putih, di atasnya diberi remahan kue,', 'donat6.png', 30),
(7, 'donat', 'Chocolate Rainbow', 8000, 'Donat dicelupkan ke dalam coklat putih, ditaburi almond panggang yang dihancurkan, dan dihias dengan', 'donat7.png', 20),
(8, 'donat', 'Coco Loco', 8500, 'Donat diisi dengan dark chocolate ganache dan dicelupkan ke dalam dark chocolate.', 'donat8.png', 20),
(9, 'donat', 'Crunchy Crunchy', 9000, 'Donat dicelupkan ke dalam coklat susu dan di atasnya diberi cornflake coklat.', 'donat9.png', 40),
(10, 'donat', 'Copa Banana', 8000, 'Donat diisi krim custard pisang, dicelupkan ke dalam dark chocolate, dan dihias dengan sesendok krim', 'donat10.png', 23),
(11, 'donat', 'Forest Glam', 8500, 'Donat dicelupkan ke dalam coklat black forest, di atasnya diberi dark chocolate flakes, gula icing b', 'donat11.png', 42),
(12, 'donat', 'Don Mochino', 9000, 'Donat diisi krim moka, dicelupkan ke dalam dark chocolate, dan dihias dengan white chocolate.', 'donat12.png', 4),
(13, 'donat', 'Heaven Berry', 8500, 'Donat diisi dengan isian krim stroberi, dicelupkan ke dalam coklat susu stroberi, dan dihias dengan ', 'donat13.png', 50),
(14, 'donat', 'Glazzy', 7500, 'Donat dicelupkan ke dalam glasir madu ringan.', 'donat14.png', 30),
(15, 'donat', 'Meisissippi', 8500, 'Donat dicelupkan ke dalam dark chocolate ganache dan di atasnya diberi taburan coklat.', 'donat15.png', 49),
(16, 'donat', 'Jacky Chunk', 9000, 'Donat berlapis madu yang dicelupkan ke dalam coklat hitam dan di atasnya diberi kacang tanah yang di', 'donat16.png', 50),
(17, 'donat', 'Mr. Green Tea', 9000, 'Donat dicelupkan ke dalam coklat teh hijau dan di atasnya diberi almond panggang yang dihancurkan.', 'donat17.png', 23),
(18, 'donat', 'Mr Mokacha', 8500, 'Donat diisi krim cappuccino, dicelupkan ke dalam coklat cappuccino, dan dihias dengan almond panggan', 'donat18.png', 54),
(19, 'donat', 'Snow White', 8000, 'Donat diisi dengan krim kocok vanilla dan di atasnya diberi gula icing bubuk.', 'donat19.png', 55),
(20, 'donat', 'Oreology', 8500, 'Donat dicelupkan ke dalam coklat putih, di atasnya diberi remahan kue, dan ditaburi coklat putih.', 'donat20.png', 55),
(21, 'minum', 'Green Tea Frappe', 25000, 'Bubuk matcha dan vanila dicampur dengan es nugget, susu segar, dan di atasnya diberi krim kocok.', 'minum1.png', 44),
(22, 'Minum', 'Blueberry Yogurt Fra', 33000, 'Campuran jus berry dicampur dengan es nugget yang diblender, yogurt segar, selai blueberry, di atasnya diberi krim kocok.', 'minum2.png', 32),
(23, 'minum', 'Chocolate Frappe', 30000, 'Coklat dicampur dengan es nugget yang diblender, susu segar, di atasnya diberi krim kocok.', 'minum3.png', 49),
(24, 'minum', 'Oreo Cheesecake Frap', 28000, 'Krim keju, bubuk oreo, dan bubuk vanila dicampur dengan es nugget yang sudah diblender, dan di atasnya diberi krim kocok.', 'minum4.png', 62),
(25, 'minum', 'Strawberry Yogurt Fr', 33000, 'Jus stroberi dicampur dengan es nugget yang diblender, yogurt segar, stroberi segar, di atasnya diberi krim kocok.', 'minum5.png', 20),
(26, 'minum', 'Caramel Frappe', 30000, 'Espresso shot dicampur dengan es nugget, susu segar, sirup karamel, di atasnya diberi krim moka, dan ditaburi saus karamel.', 'minum6.png', 50),
(27, 'minum', 'Mocha Espresso Frapp', 35000, 'Espresso shot dicampur dengan es nugget, susu segar, coklat, di atasnya diberi krim moka, dan ditaburi coklat bubuk.', 'minum7.png', 21),
(28, 'minum', 'Chocomint Frappe', 35000, 'Cokelat dicampur dengan es nugget yang diblender, susu segar, sirup peppermint, di atasnya diberi krim kocok, dan dihias dengan keripik berlapis cokelat.', 'minum8.png', 54),
(29, 'roti', 'Cheezy Rich', 25000, 'Sandwich donat manis dengan keju krim kocok dan isian keju irisan, di atasnya diberi krim kocok dan keju parut.', 'roti1.png', 51),
(30, 'roti', 'Chicken Salami', 30000, 'Sandwich donat gurih dengan salami ayam asap dengan mayones, saus tomat, selada segar, irisan keju, dan tumis zucchini.', 'roti2.png', 31),
(31, 'roti', 'Katsu', 30000, 'Sandwich donat gurih dengan ayam katsu goreng renyah, selada segar, tomat segar, dan saus barbekyu.', 'roti3.png', 55),
(32, 'roti', 'Red Velvet', 35000, 'Sandwich donat manis dengan 2 lapis isian keju krim kocok, remah beludru merah, dan manisan kacang yang renyah.', 'roti4.png', 22),
(33, '', 'ewfwef', 5000, 'ewfwef', 'donat24.png', 0),
(34, '', 'Avocado Dicapriofegr', 9000, 'rweewrwe', 'roti6.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(50) NOT NULL,
  `id_user` int(20) NOT NULL,
  `tanggal` varchar(20) NOT NULL,
  `harga_total` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_user`, `tanggal`, `harga_total`) VALUES
(1, 0, '2023-12-29', '18000'),
(2, 0, '2023-12-29', '180000');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(50) NOT NULL,
  `id_user` int(255) NOT NULL,
  `menu_dibeli` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga_menu` int(50) NOT NULL,
  `harga_total` int(50) NOT NULL,
  `pembeli` varchar(50) NOT NULL,
  `tanggal_pembelian` varchar(50) DEFAULT NULL,
  `harga` int(100) NOT NULL,
  `no_tlp` varchar(20) NOT NULL,
  `id_pembelian` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_user`, `menu_dibeli`, `jumlah`, `harga_menu`, `harga_total`, `pembeli`, `tanggal_pembelian`, `harga`, `no_tlp`, `id_pembelian`) VALUES
(60, 4, 'Berry Spears', 2, 18000, 18000, 'Lee Jeno', '2023-12-29', 9000, '081381334620', 1),
(61, 10, 'Chocolate Frappe', 6, 180000, 180000, 'Ijan', '2023-12-29', 30000, '02157325819', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `email`, `password`, `isAdmin`) VALUES
(4, 'Anandina', 'andkhrnnsa@gmail.com', '$2y$10$yAgw95mfUtNE/K0C2fTOT.BPZVop5qdUweH/QWGEGF/tFpzdPh54q', 0),
(6, 'admin', 'admin@gmail.com', '$2y$10$OEGOxE/QvvFqmrDr1x9GKu5Zhj53BtgdN1PoqbhTiXIzMXepMpYnS', 1),
(8, 'sasa', 'andkhrnnsa@gmail.com', '$2y$10$nNRPg45hysnqV0lHNlgLFexs6Vqg5ah0Q4plKYK4oEfcw175J9EYS', 0),
(9, 'alwin', 'kwyulk5@gmail.com', '$2y$10$knvI4wqhNzZEg6gGnsMYAOarpGwaPJhJChncG1gLWESS7s2ne.ZUq', 0),
(10, 'ijan', 'ijan@gmail.com', '$2y$10$drAw4c8mjso9H.rm0qIo5.t6wIedzXkX4OFabwb5QvIRhfXqNZJx2', 0),
(11, 'Baekhyun', 'dprianwife02@gmail.com', '$2y$10$ndWzq2xqaC1PMvfN4nmLluKPtTQHGPq22z7qXdc6A35lhefMOntia', 0),
(12, 'haechan', 'haechan@gmail.com', '$2y$10$a0Gtgtc1Mx38xs90sgDgnO7lzB1eXdGEnKDAAPV8t6XvaarhbRagC', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
