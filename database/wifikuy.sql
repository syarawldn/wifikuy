-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 06, 2022 at 04:48 AM
-- Server version: 10.5.15-MariaDB-1:10.5.15+maria~focal
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wifikuy`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(40) NOT NULL,
  `nomor` varchar(15) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `nama`, `email`, `nomor`, `alamat`) VALUES
(1, 'adi darmawan', 'adarmawan106@gmail.com', '089508470045', 'kp pengarengan'),
(2, 'Vicky Perwira', 'vickygrs01@gmail.com', '08123675843', 'jl pemuda'),
(3, 'Syara Waldana', 'waldanasyara@gmail.com', '0812345678', 'Jln Tirta Sari No.4'),
(4, 'Safana Arsila', 'safanaarsila17@gmail.com', '0897654324', 'Jln Bambu '),
(5, 'Muhammad Zul Amar', 'amatrulaind@gmail.com', '0821347865', 'Jln Kelapa'),
(7, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `data_rekening`
--

CREATE TABLE `data_rekening` (
  `id` int(11) NOT NULL,
  `kode_bank` varchar(50) NOT NULL,
  `nama_bank` varchar(50) NOT NULL,
  `no_rekening` text NOT NULL,
  `atas_nama` text NOT NULL,
  `photo_bank` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_rekening`
--

INSERT INTO `data_rekening` (`id`, `kode_bank`, `nama_bank`, `no_rekening`, `atas_nama`, `photo_bank`) VALUES
(1, 'BRI001', 'BANK BRI', '333022251123', 'WIFI SKUY', 'assets/images/bank/bri-icon.jpg'),
(4, 'BNI001', 'BANK BNI', '098271932', 'WIFI SKUY', 'assets/images/bank/bni-icon.jpg'),
(5, 'MDR001', 'BANK MANDIRI', '11011234876123', 'WIFI SKUY', 'assets/images/bank/mandiri-icon.jpg'),
(7, 'BCA001', 'BANK BCA', '09823123412', 'WIFI SKUY', 'assets/images/bank/bca-icon.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(10) NOT NULL,
  `code` varchar(50) NOT NULL,
  `user` varchar(50) NOT NULL,
  `metode_pembayaran` varchar(200) NOT NULL,
  `package` varchar(100) NOT NULL,
  `price` int(10) NOT NULL,
  `random_price` int(10) NOT NULL,
  `status` enum('Pending','Success','Error','Unpaid','Paid') NOT NULL,
  `date` date NOT NULL,
  `expdate` datetime NOT NULL,
  `exppay` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `code`, `user`, `metode_pembayaran`, `package`, `price`, `random_price`, `status`, `date`, `expdate`, `exppay`) VALUES
(1, 'INV-7673282224', 'client1', 'BANK BRI', 'Paket Internet 10Mbps', 100000, 100990, 'Paid', '2022-04-10', '2022-04-20 00:00:00', '11-04-2022 22:50:19'),
(2, 'INV-9341103661', 'client2', '', 'Paket Internet 20Mbps', 150000, 0, 'Paid', '2022-04-10', '2022-04-20 00:00:00', ''),
(3, 'INV-2646419194', 'client2', '', 'Paket Internet 20Mbps', 150000, 0, 'Paid', '2022-04-10', '2022-04-20 00:00:00', ''),
(4, 'INV-7673282314', 'client3', 'BANK BRI', 'Paket Internet 40Mbps', 320000, 320125, 'Paid', '2022-04-18', '2022-04-28 00:00:00', '19-04-2022 22:50:19'),
(5, 'INV-8927507029', 'client1', '', 'Paket Internet 10Mbps', 100000, 0, 'Unpaid', '2022-05-09', '2022-05-19 00:00:00', ''),
(6, 'INV-7147226812', 'client2', '', 'Paket Internet 20Mbps', 150000, 0, 'Unpaid', '2022-05-09', '2022-05-19 00:00:00', ''),
(7, 'INV-4297480061', 'client3', '', 'Paket Internet 40Mbps', 320000, 0, 'Unpaid', '2022-05-09', '2022-05-18 00:00:00', ''),
(8, 'INV-3887233269', 'client4', '', 'Paket Internet 40Mbps', 320000, 0, 'Unpaid', '2022-05-09', '2022-05-18 00:00:00', ''),
(9, 'INV-2037261273', 'client5', '', 'Paket Internet 20Mbps', 150000, 0, 'Unpaid', '2022-05-09', '2022-05-18 00:00:00', ''),
(10, 'INV-5698705661', '', '', 'Paket Internet 10Mbps', 100000, 0, 'Unpaid', '2022-05-10', '2022-05-09 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) NOT NULL,
  `oid` varchar(100) NOT NULL,
  `user` varchar(100) NOT NULL,
  `paket` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `price` int(10) NOT NULL,
  `status` enum('Active','Isolir') NOT NULL,
  `date` date NOT NULL,
  `expdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `oid`, `user`, `paket`, `name`, `password`, `price`, `status`, `date`, `expdate`) VALUES
(1, '524978640347828', 'client1', 'Paket Internet 10Mbps', 'client1', '6952821396', 100000, 'Isolir', '2022-04-01', '2022-05-19 00:00:00'),
(2, '680702596315177', 'client2', 'Paket Internet 20Mbps', 'client2', '6211045839', 150000, 'Isolir', '2022-04-10', '2022-05-19 00:00:00'),
(3, '091281764539818', 'client3', 'Paket Internet 40Mbps', 'client3', 'syarawldn', 320000, 'Isolir', '2022-04-18', '2022-05-18 00:00:00'),
(4, '490151351353609', 'client4', 'Paket Internet 40Mbps', 'client4', 'safana17', 320000, 'Isolir', '2022-04-18', '2022-05-18 00:00:00'),
(5, '244889927506998', 'client5', 'Paket Internet 20Mbps', 'client5', 'amar', 150000, 'Isolir', '2022-04-18', '2022-05-18 00:00:00'),
(7, '052311282249573', '', 'Paket Internet 10Mbps', '', '9540484175', 100000, 'Isolir', '2022-05-09', '2022-05-09 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `id` int(10) NOT NULL,
  `category` enum('Pemasukan','Pengeluaran') NOT NULL,
  `balance` int(10) NOT NULL,
  `asal` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`id`, `category`, `balance`, `asal`, `date`) VALUES
(1, 'Pengeluaran', 200000, 'Beli Router', '2022-03-29'),
(3, 'Pengeluaran', 2000000, 'Pembayaran Bandwith 300Mbps Dedicated', '2022-03-29'),
(4, 'Pengeluaran', 20000000, 'Pembayaran Bandwith 300Mbps Dedicated', '2022-04-04'),
(5, 'Pengeluaran', 200000, 'Beli Router', '2022-04-04');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `paket` varchar(200) NOT NULL,
  `harga` float NOT NULL,
  `status` enum('Tersedia','Tidak Tersedia') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `paket`, `harga`, `status`) VALUES
(1, 'Paket Internet 10Mbps', 100000, 'Tersedia'),
(2, 'Paket Internet 20Mbps', 150000, 'Tersedia'),
(3, 'Paket Internet 40Mbps', 320000, 'Tersedia'),
(4, 'Paket Internet 50Mbps', 450000, 'Tersedia'),
(5, 'Paket Internet 100Mbps', 700000, 'Tersedia'),
(6, 'Paket Internet 200Mbps', 1000000, 'Tersedia'),
(7, 'Paket Internet 300Mbps', 1200000, 'Tersedia');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(10) NOT NULL,
  `code` varchar(50) NOT NULL,
  `user` varchar(50) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `message` text NOT NULL,
  `datetime` datetime NOT NULL,
  `last_update` datetime NOT NULL,
  `status` enum('Pending','Responded','Closed','Waiting') NOT NULL,
  `seen_user` enum('0','1') NOT NULL,
  `seen_admin` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `code`, `user`, `subject`, `message`, `datetime`, `last_update`, `status`, `seen_user`, `seen_admin`) VALUES
(2, '831027312329346', 'client1', 'Error', 'Router saya error', '2022-04-18 05:23:43', '2022-04-26 04:26:02', 'Closed', '0', '0'),
(3, '225853975093561', 'client5', 'error', 'Tolong ya min, mau depo :\')', '2022-04-18 11:23:02', '2022-04-26 03:04:31', 'Responded', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tickets_message`
--

CREATE TABLE `tickets_message` (
  `id` int(10) NOT NULL,
  `ticket_id` int(10) NOT NULL,
  `sender` enum('User','Admin') NOT NULL,
  `user` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tickets_message`
--

INSERT INTO `tickets_message` (`id`, `ticket_id`, `sender`, `user`, `message`, `datetime`) VALUES
(1, 3, 'Admin', 'client5', 'tolol', '2022-04-26 02:32:06'),
(2, 2, 'Admin', 'client1', 'oke teknisi kami akan segera ke tempat anda', '2022-04-26 02:42:13'),
(3, 3, 'Admin', 'client5', 'anda tolol anda ya', '2022-04-26 02:43:57'),
(4, 3, 'Admin', 'client5', 'hadeh blok', '2022-04-26 03:02:01'),
(5, 3, 'Admin', 'client5', 'sukses kah?', '2022-04-26 03:04:31'),
(6, 2, 'User', 'client1', 'oke baik di tunggu, terimakasih', '2022-04-26 03:59:57'),
(7, 2, 'User', 'client1', 'aman mas ?', '2022-04-26 04:07:26'),
(8, 2, 'Admin', 'client1', 'aman', '2022-04-26 04:17:05'),
(9, 2, 'User', 'client1', 'otw kapan ?', '2022-04-26 04:17:32'),
(10, 2, 'Admin', 'client1', 'nanti siang', '2022-04-26 04:18:46'),
(11, 2, 'User', 'client1', 'siap ditunggu', '2022-04-26 04:19:01'),
(12, 2, 'Admin', 'client1', 'oke', '2022-04-26 04:21:23'),
(13, 2, 'User', 'client1', 'okee', '2022-04-26 04:21:38'),
(14, 2, 'Admin', 'client1', 'udah mas ?', '2022-04-26 04:24:09'),
(15, 2, 'User', 'client1', 'bentar mas dicoba', '2022-04-26 04:24:20'),
(16, 2, 'User', 'client1', 'oke aman mas ', '2022-04-26 04:24:49'),
(17, 2, 'Admin', 'client1', 'siap saya close ya mas', '2022-04-26 04:25:50'),
(18, 2, 'User', 'client1', 'oke mas', '2022-04-26 04:26:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(40) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `level` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `nama`, `username`, `password`, `level`) VALUES
(1, 'admin@wifikuy.com', 'admin', 'admin', '$2y$10$9dB9PHk7r.mi8V0yiSmlM.RvJ3iEu4gy836L0XQqEr6KBItM1qVam', 'admin'),
(2, 'adarmawan106@gmail.com', 'Adi Darmawan', 'client1', '$2y$10$NrlkgSZFj.AiAGbJdjlDsu/2hRtgQO62TF4aHCbVHzqNpSR1p0v3C', 'user'),
(3, 'vickygrs01@gmail.com', 'Vicky Perwira', 'client2', '$2y$10$I.AJloGEIidvIt/9edu9tuyUXOAm4iD2zBhnnAyJlvZJv0b8Hj1gS', 'user'),
(4, 'waldanasyara@gmail.com', 'Syara Waldana', 'client3', '$2y$10$F3Q2dZ/edJmCVm9SfzJEyO0FUUepIFvmJUoMIR6Z1t2Q6uxbgsxU6', 'user'),
(5, 'safanaarsila17@gmail.com', 'Safana Arsila', 'client4', '$2y$10$DiyxJr2LvY45WZ.8tSPFU.OjFfTn3rVLr4HXl3AF6j.8lssGMexH.', 'user'),
(6, 'amatrulaind@gmail.com', 'Muhammad Zul Amar', 'client5', '$2y$10$N.Y.zawCY4fpppXqngYDju0QHW0ELcg4VIuqtS.MNiwJ3Ufd2unRm', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_rekening`
--
ALTER TABLE `data_rekening`
  ADD PRIMARY KEY (`id`),
  ADD KEY `atas_nama` (`atas_nama`(768));

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `paket` (`paket`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets_message`
--
ALTER TABLE `tickets_message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nama` (`nama`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `data_rekening`
--
ALTER TABLE `data_rekening`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tickets_message`
--
ALTER TABLE `tickets_message`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`id`) REFERENCES `services` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `data_rekening`
--
ALTER TABLE `data_rekening`
  ADD CONSTRAINT `data_rekening_ibfk_1` FOREIGN KEY (`id`) REFERENCES `invoice` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `invoice_ibfk_1` FOREIGN KEY (`id`) REFERENCES `tickets_message` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id`) REFERENCES `customer` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `report`
--
ALTER TABLE `report`
  ADD CONSTRAINT `report_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_ibfk_1` FOREIGN KEY (`id`) REFERENCES `tickets_message` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id`) REFERENCES `services` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
