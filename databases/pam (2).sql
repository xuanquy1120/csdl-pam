-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 21, 2021 lúc 10:55 PM
-- Phiên bản máy phục vụ: 10.4.19-MariaDB
-- Phiên bản PHP: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `pam`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `username` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`username`, `password`, `id`) VALUES
('admin', '123456', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `customer_sendname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_sendtel` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_receivername` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_receivertel` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_sendadr` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_receiveradr` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight` float NOT NULL,
  `fee` float NOT NULL,
  `datesend` date NOT NULL,
  `datereceived` date NOT NULL,
  `id` int(50) NOT NULL,
  `bill_id` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idb` int(10) NOT NULL,
  `status` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unpaid` int(11) NOT NULL,
  `pay` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bill`
--

INSERT INTO `bill` (`customer_sendname`, `customer_sendtel`, `customer_receivername`, `customer_receivertel`, `customer_sendadr`, `customer_receiveradr`, `weight`, `fee`, `datesend`, `datereceived`, `id`, `bill_id`, `idb`, `status`, `unpaid`, `pay`) VALUES
('sadasd', '0349593356', 'sadsd', '0349593356', 'ádasd', 'adasd', 12, 123000, '2021-06-08', '2021-06-08', 1, 'ETH', 14, 'Đã Thanh toán xong', 122888, 112),
('nguyen van a', '0349593356', 'nguyen xuan quy', '0349593356', 'viet nam', 'ha quoc', 12, 123000, '2021-06-08', '2021-06-24', 1, 'et120', 16, 'Đã Thanh toán xong', -555, 123555),
('number', '0349593356', 'number', '0349593356', 'number', 'number', 12, 5000, '2021-06-07', '2021-06-23', 1, 'et3k', 17, 'Đã Thanh toán xong', 4000, 1000),
('nguyen van b', '0349593356', 'nguyen van c', '0349593356', 'viet nam', 'ha quoc', 12, 20000, '2021-06-15', '2021-06-23', 1, 'et1k', 18, 'Đã Thanh toán xong', 10000, 10000),
('number', '0349593356', 'nguyen xuan quy', '0349593356', 'viet nam', 'viet nam', 12, 500, '2021-06-08', '2021-06-23', 1, 'et2k', 19, 'Đã Thanh toán xong', 400, 100),
('Nguyen Van A', '0123456789', 'nguyen xuan quy', '0123456789', 'viet nam', 'ha quoc', 23, 7800, '2021-06-15', '2021-06-23', 1, 'ETH1000', 20, '7000', 7000, 800),
('nguyen van a', '0349593356', 'nguyen van c', '0349593356', 'trung quốc', 'viet nam', 23, 45000, '2021-06-22', '2021-06-30', 3, 'ETH 2000', 22, '', 33000, 12000),
('Nguyen Van b', '0349593356', 'nguyen van f', '0349593356', 'trung quốc', 'viet nam', 23, 50000, '2021-06-15', '0000-00-00', 3, 'ETH 3000', 23, '16000', 16000, 34000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `username` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `phonenumber` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `employee`
--

INSERT INTO `employee` (`id`, `username`, `password`, `name`, `dob`, `phonenumber`, `email`) VALUES
(1, 'admin', 'admin', 'admin', '2021-06-06', '0349593356', 'admin@gmail.com'),
(2, 'test1', 'test1', 'test1', '2021-06-13', '0349593356', 'test1@gmail.com'),
(3, 'xuanquy', 'xuanquy', 'Nguyen Xuan Quy', '2021-06-08', '0349593356', 'xuanquy1120@gmail.com');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`idb`),
  ADD KEY `id-sale` (`id`);

--
-- Chỉ mục cho bảng `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bill`
--
ALTER TABLE `bill`
  MODIFY `idb` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `id-sale` FOREIGN KEY (`id`) REFERENCES `employee` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
