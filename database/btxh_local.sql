-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2017 at 05:19 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 7.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `btxh_local`
--

-- --------------------------------------------------------

--
-- Table structure for table `dantoc`
--

CREATE TABLE `dantoc` (
  `id` int(10) UNSIGNED NOT NULL,
  `dantoc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` int(10) UNSIGNED NOT NULL,
  `mahuyen` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tenhuyen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diachi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dienthoai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fax` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thutruong` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ketoan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nguoithuchien` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `mahuyen`, `tenhuyen`, `diachi`, `dienthoai`, `fax`, `email`, `website`, `thutruong`, `ketoan`, `nguoithuchien`, `created_at`, `updated_at`) VALUES
(1, 'QCG', 'Quận Cầu Giấy', 'Quận Cầu Giấy - TP Hà Nội', '09876543', '098765432', '', NULL, NULL, NULL, NULL, '2017-06-28 08:04:43', '2017-06-28 08:04:43'),
(2, 'QHBT', 'Quận Hai Bà Trưng', 'Quận Hai Bà Trưng - TP Hà Nội', '', '', '', NULL, NULL, NULL, NULL, '2017-06-28 08:05:22', '2017-06-28 08:05:22');

-- --------------------------------------------------------

--
-- Table structure for table `dmtrocaptx`
--

CREATE TABLE `dmtrocaptx` (
  `id` int(10) UNSIGNED NOT NULL,
  `pltrocap` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ttqd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dieu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `khoan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `matrocap` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `noidung` text COLLATE utf8_unicode_ci,
  `chitiet` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `heso` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghichu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dmtrocaptx`
--

INSERT INTO `dmtrocaptx` (`id`, `pltrocap`, `ttqd`, `dieu`, `khoan`, `matrocap`, `noidung`, `chitiet`, `heso`, `ghichu`, `created_at`, `updated_at`) VALUES
(1, 'NXH', 'Nghị định 136/2013/NĐ-CP', 'Điều 4', 'Khoản 1', 'NXH1499136699', 'Trẻ em mồ côi ', 'dưới 18 tháng tuổi; từ 18 tháng tuổi trở lên bị nhiễm HIV/AIDS', '2.5', '', '2017-07-04 02:51:39', '2017-07-04 02:51:39'),
(2, 'NXH', 'Nghị định 136/2013/NĐ-CP', 'Điều 4', 'Khoản 1', 'NXH1499136814', 'Trẻ em mồ côi ', 'từ 18 tháng tuổi trở lên', '2', '', '2017-07-04 02:53:34', '2017-07-04 02:53:34'),
(3, 'NXH', 'Nghị định 136/2013/NĐ-CP', 'Điều 4', 'Khoản 1', 'NXH1499136856', 'Trẻ bị nhiễm HIV/AIDS', 'dưới 18 tháng tuổi', '2.5', '', '2017-07-04 02:54:16', '2017-07-04 02:54:16'),
(4, 'NXH', 'Nghị định 136/2013/NĐ-CP', 'Điều 4', 'Khoản 1', 'NXH1499136880', 'Trẻ bị nhiễm HIV/AIDS', 'từ 18 tháng tuổi trở lên', '2', '', '2017-07-04 02:54:40', '2017-07-04 02:54:40'),
(5, 'NXH', 'Nghị định 136/2013/NĐ-CP', 'Điều 4', 'Khoản 2', 'NXH1499136905', 'Người cao tuổi cô đơn thuộc hộ gia đình nghèo', '', '2', '', '2017-07-04 02:55:06', '2017-07-04 02:55:06'),
(6, 'NXH', 'Nghị định 136/2013/NĐ-CP', 'Điều 4', 'Khoản 6', 'NXH1499136931', 'Người nhiễm HIV ko có khả năng lao động thuộc hộ gia đình nghèo', '', '2', '', '2017-07-04 02:55:31', '2017-07-04 02:55:31'),
(7, 'CD', 'Nghị định 136/2013/NĐ-CP', 'Điều 16', 'Khoản 1', 'CD1499137450', 'Người khuyết tật sống tại hộ gia đình', 'Người khuyết tật nặng', '1.5', '', '2017-07-04 03:04:10', '2017-07-04 03:04:10'),
(8, 'CD', 'Nghị định 136/2013/NĐ-CP', 'Điều 16', 'Khoản 1', 'CD1499137502', 'Người khuyết tật sống tại hộ gia đình', 'Người khuyết tật nặng là trẻ em', '2', '', '2017-07-04 03:05:02', '2017-07-04 03:05:02'),
(9, 'CD', 'Nghị định 136/2013/NĐ-CP', 'Điều 16', 'Khoản 1', 'CD1499137573', 'Người khuyết tật sống tại hộ gia đình', 'Người khuyết tật nặng là người cao tuổi', '2', '', '2017-07-04 03:06:13', '2017-07-04 03:06:13'),
(10, 'CD', 'Nghị định 136/2013/NĐ-CP', 'Điều 16', 'Khoản 1', 'NXH1499137595', 'Người khuyết tật sống tại hộ gia đình', 'Người khuyết tật đặc biệt nặng', '2', '', '2017-07-04 03:06:35', '2017-07-04 03:06:43'),
(11, 'CD', 'Nghị định 136/2013/NĐ-CP', 'Điều 16', 'Khoản 1', 'CD1499137667', 'Người khuyết tật sống tại hộ gia đình', 'Người khuyết tật đặc biệt nặng là trẻ em', '2.5', '', '2017-07-04 03:07:47', '2017-07-04 03:07:47'),
(12, 'CD', 'Nghị định 136/2013/NĐ-CP', 'Điều 16', 'Khoản 1', 'CD1499137694', 'Người khuyết tật sống tại hộ gia đình', 'Người khuyết tật đặc biệt nặng là người cao tuổi', '2.5', '', '2017-07-04 03:08:14', '2017-07-04 03:08:14'),
(13, 'CD', 'Nghị định 136/2013/NĐ-CP', 'Điều 17', 'Khoản 1', 'CD1499137818', 'Người khuyết tật sống tại hộ gia đình', 'người khuyết tật nặng đang mang thai hoặc nuôi một con dưới 36 tháng tuổi', '1.5', '', '2017-07-04 03:10:18', '2017-07-04 03:10:18'),
(14, 'CD', 'Nghị định 136/2013/NĐ-CP', 'Điều 17', 'Khoản 1', 'CD1499137869', 'Người khuyết tật sống tại hộ gia đình', 'người khuyết tật nặng đang mang thai và nuôi con dưới 36 tháng tuổi', '2', '', '2017-07-04 03:11:09', '2017-07-04 03:11:09'),
(15, 'CD', 'Nghị định 136/2013/NĐ-CP', 'Điều 17', 'Khoản 1', 'CD1499137913', 'Người khuyết tật sống tại hộ gia đình', 'người khuyết tật nặng đang nuôi từ hai con trở lên dưới 36 tháng tuổi', '2', '', '2017-07-04 03:11:53', '2017-07-04 03:11:53'),
(16, 'CD', 'Nghị định 136/2013/NĐ-CP', 'Điều 17', 'Khoản 1', 'CD1499137972', 'Người khuyết tật sống tại hộ gia đình', 'người khuyết tật đặc biệt nặng đang mang thai hoặc nuôi một con dưới 36 tháng tuổi', '3', '', '2017-07-04 03:12:52', '2017-07-04 03:12:52'),
(17, 'CD', 'Nghị định 136/2013/NĐ-CP', 'Điều 17', 'Khoản 1', 'CD1499138002', 'Người khuyết tật sống tại hộ gia đình', 'người khuyết tật đặc biệt nặng đang mang thai và nuôi con dưới 36 tháng tuổi', '3.5', '', '2017-07-04 03:13:22', '2017-07-04 03:13:58'),
(18, 'CD', 'Nghị định 136/2013/NĐ-CP', 'Điều 17', 'Khoản 1', 'CD1499138026', 'Người khuyết tật sống tại hộ gia đình', 'người khuyết tật đặc biệt nặng đang nuôi từ hai con trở lên dưới 36 tháng tuổi', '3.5', '', '2017-07-04 03:13:47', '2017-07-04 03:13:47'),
(19, 'CD', 'Nghị định 136/2013/NĐ-CP', 'Điều 17', 'Khoản 3', 'CD1499138251', 'Hộ gia đình đang trực tiếp nuôi dưỡng, chăm sóc người khuyết tật đặc biệt nặng', '', '1', '', '2017-07-04 03:17:31', '2017-07-04 03:17:31'),
(20, 'CD', 'Nghị định 136/2013/NĐ-CP', 'Điều 17', 'Khoản 4', 'CD1499138296', 'Người nhận nuôi chăm sóc người khuyết tật đặc biệt nặng', 'Một người', '1.5', '', '2017-07-04 03:18:16', '2017-07-04 03:18:16'),
(21, 'CD', 'Nghị định 136/2013/NĐ-CP', 'Điều 17', 'Khoản 4', 'CD1499138332', 'Người nhận nuôi chăm sóc người khuyết tật đặc biệt nặng', 'Từ 2 người trở lên', '3', '', '2017-07-04 03:18:52', '2017-07-04 03:18:52'),
(22, 'CD', 'Nghị định 136/2013/NĐ-CP', 'Điều 4', 'Khoản 1', 'CD1499138445', 'Trẻ mồ côi hoặc nhiễm HIV/AIDS', 'dưới 18 tháng tuổi bị nhiễm HIV/AIDS', '2', '', '2017-07-04 03:20:45', '2017-07-04 03:22:57'),
(23, 'CD', 'Nghị định 136/2013/NĐ-CP', 'Điều 4', 'Khoản 1', 'CD1499138543', 'Trẻ mồ côi hoặc nhiễm HIV/AIDS', 'dưới 18 tháng tuổi', '1.5', '', '2017-07-04 03:22:23', '2017-07-04 03:22:23'),
(24, 'CD', 'Nghị định 136/2013/NĐ-CP', 'Điều 4', 'Khoản 1', 'CD1499138631', 'Trẻ mồ côi hoặc nhiễm HIV/AIDS', 'từ 18 tháng tuổi trở lên', '1', '', '2017-07-04 03:23:51', '2017-07-04 03:23:51'),
(25, 'CD', 'Nghị định 136/2013/NĐ-CP', 'Điều 4', 'Khoản 5', 'CD1499138663', 'Người mắc bệnh tâm thần thuộc các loại tâm thần phân liệt, rối loạn tâm thần', '', '1', '', '2017-07-04 03:24:23', '2017-07-04 03:24:23'),
(26, 'CD', 'Nghị định 136/2013/NĐ-CP', 'Điều 4', 'Khoản 6', 'CD1499138691', 'Người nhiễm HIV ko có khả năng lao động, thuộc hộ gia đình nghèo', '', '1.5', '', '2017-07-04 03:24:51', '2017-07-04 03:24:51'),
(27, 'CD', 'Nghị định 136/2013/NĐ-CP', 'Điều 4', 'Khoản 7', 'CD1499138754', 'Gia đình, cá nhân nhận nuôi dưỡng trẻ mồ côi', 'dưới 18 tháng tuổi bị khuyết tật hoặc nhiễm HIV/AIDS', '3', '', '2017-07-04 03:25:54', '2017-07-04 03:25:54'),
(28, 'CD', 'Nghị định 136/2013/NĐ-CP', 'Điều 4', 'Khoản 7', 'CD1499138804', 'Gia đình, cá nhân nhận nuôi dưỡng trẻ mồ côi', 'dưới 18 tháng tuổi hoặc từ 18 tháng tuổi trở lên bị khuyết tật hoặc nhiễm HIV/AIDS', '2.5', '', '2017-07-04 03:26:44', '2017-07-04 03:26:44'),
(29, 'CD', 'Nghị định 136/2013/NĐ-CP', 'Điều 4', 'Khoản 7', 'CD1499138864', 'Gia đình, cá nhân nhận nuôi dưỡng trẻ mồ côi', 'từ 18 tháng tuổi trở lên', '2', '', '2017-07-04 03:27:44', '2017-07-04 03:27:44'),
(30, 'CD', 'Nghị định 136/2013/NĐ-CP', 'Điều 4', 'Khoản 9', 'CD1499138935', 'Người đơn thân nuôi con nhỏ', 'dưới 18 tháng tuổi bị khuyết tật hoặc nhiễm HIV/AIDS', '2', '', '2017-07-04 03:28:55', '2017-07-04 03:28:55'),
(31, 'CD', 'Nghị định 136/2013/NĐ-CP', 'Điều 4', 'Khoản 9', 'CD1499138985', 'Người đơn thân nuôi con nhỏ', 'dưới 18 tháng tuổi hoặc từ 18 tháng tuổi trở lên bị khuyết tật hoặc nhiễm HIV/AIDS', '1.5', '', '2017-07-04 03:29:45', '2017-07-04 03:29:45'),
(32, 'CD', 'Nghị định 136/2013/NĐ-CP', 'Điều 4', 'Khoản 9', 'CD1499139016', 'Người đơn thân nuôi con nhỏ', 'từ 18 tháng tuổi trở lên', '1', '', '2017-07-04 03:30:16', '2017-07-04 03:30:16'),
(33, 'CD', 'Nghị định 136/2013/NĐ-CP', 'Điều 6', 'Khoản 2', 'CD1499139117', 'Người cao tuổi', 'từ 60 - 80 tuổi thuộc hộ nghèo không có người chăm sóc, phụng dưỡng nhưng đang hưởng chế độ BTXH hàng tháng', '1', '', '2017-07-04 03:31:57', '2017-07-04 03:31:57'),
(34, 'CD', 'Nghị định 136/2013/NĐ-CP', 'Điều 6', 'Khoản 2', 'CD1499139159', 'Người cao tuổi', 'từ đủ 80 tuổi trở lên hộ nghèo không có người chăm sóc, phụng dưỡng nhưng đang hưởng chế độ BTXH hàng tháng', '1.5', '', '2017-07-04 03:32:39', '2017-07-04 03:32:39'),
(35, 'CD', 'Nghị định 136/2013/NĐ-CP', 'Điều 6', 'Khoản 2', 'CD1499139192', 'Người cao tuổi', 'từ đủ 80 tuổi trở lên có người chăm sóc, phụng dưỡng mà không có lương, trợ cấp bảo hiểm xã hội hàng tháng, trợ cấp xã hội hàng tháng.', '1', '', '2017-07-04 03:33:12', '2017-07-04 03:33:12'),
(36, 'CD', 'Nghị định 136/2013/NĐ-CP', 'Điều 6', 'Khoản 4', 'CD1499139227', 'Người cao tuổi đủ điều kiện tiếp nhận vào sống trong các cơ sở bảo trợ xã hội nhưng có người nhận chăm sóc tại cộng đồng', '', '2', '', '2017-07-04 03:33:47', '2017-07-04 03:34:01'),
(37, 'CS', 'Nghị định 136/2013/NĐ-CP', 'Điều 4', 'Khoản 1', 'CS1499139380', 'Trẻ mồ côi', 'Từ 16 đến 18 tháng tuổi nhưng đang đi học văn hóa, hoặc học nghề', '1', '', '2017-07-04 03:36:20', '2017-07-04 03:36:20'),
(38, 'CS', 'Nghị định 136/2013/NĐ-CP', 'Điều 4', 'Khoản 1', 'CS1499139412', 'Trẻ mồ côi ', 'Từ 18 tháng tuổi trở lên', '2', '', '2017-07-04 03:36:52', '2017-07-04 03:44:20'),
(39, 'CS', 'Nghị định 136/2013/NĐ-CP', 'Điều 4', 'Khoản 1', 'CS1499139448', 'Trẻ mồ côi ', 'dưới 18 tháng tuổi, hoặc từ 18 tháng tuổi trở lên bị khuyết tật hoặc nhiễm HIV/AIDS', '2.5', '', '2017-07-04 03:37:29', '2017-07-04 03:44:28'),
(40, 'CS', 'Nghị định 136/2013/NĐ-CP', 'Điều 4', 'Khoản 2', 'CS1499139476', 'Người cao tuổi cô đơn thuộc hộ gia đình nghèo', '', '2', '', '2017-07-04 03:37:56', '2017-07-04 03:37:56'),
(41, 'CS', 'Nghị định 136/2013/NĐ-CP', 'Điều 4', 'Khoản 6', 'CS1499139515', 'Người bị nhiễm HIV/AIDS không có khả năng lao động thuộc hộ nghèo', '', '2.5', '', '2017-07-04 03:38:35', '2017-07-04 03:38:35'),
(42, 'CS', 'Nghị định 136/2013/NĐ-CP', 'Điều 5', 'Khoản 2', 'CS1499139552', 'các đối tượng xã hội cần sự bảo vệ khẩn cấp: trẻ em bị bỏ rơi, nạn nhân của bạo lực gia đình, nạn nhân bị xâm hại tình dục ….', '', '2', '', '2017-07-04 03:39:12', '2017-07-04 03:39:12'),
(43, 'CS', 'Nghị định 136/2013/NĐ-CP', 'Điều 5', 'Khoản 4', 'CS1499139588', 'Các đối tượng bảo trợ khác do chủ tỉnh Ủy ban nhân dân tỉnh, thành phố trực thuộc trung ương quyết định', '', '2', '', '2017-07-04 03:39:48', '2017-07-04 03:39:48'),
(44, 'CS', 'Nghị định 136/2013/NĐ-CP', 'Điều 6', 'Khoản 3', 'CS1499139623', 'Người cao tuổi thuộc hộ gia đình nghèo không có người có nghĩa vụ và quyền phụng dưỡng, không có điều kiện sống ở cộng đồng, có nguyện vọng và được tiếp nhận vào cơ sở bảo trợ xã hội', '', '2', '', '2017-07-04 03:40:23', '2017-07-04 03:40:23'),
(46, 'CS', 'Nghị định 136/2013/NĐ-CP', 'Điều 18', 'Khoản 1', 'CS1499139722', 'Người khuyết tật đặc biệt nặng', 'Không nơi nương tựa, không tự lo được cuộc sống được tiếp nhận vào nuôi dưỡng trong cơ sở bảo trợ xã hội', '3', '', '2017-07-04 03:42:02', '2017-07-04 03:42:02'),
(47, 'CS', 'Nghị định 136/2013/NĐ-CP', 'Điều 18', 'Khoản 1', 'CS1499139767', 'Người khuyết tật đặc biệt nặng', 'Không nơi nương tựa, không tự lo được cuộc sống được tiếp nhận vào nuôi dưỡng trong cơ sở bảo trợ xã hội là trẻ em hoặc người cao tuổi', '4', '', '2017-07-04 03:42:47', '2017-07-04 03:43:28');

-- --------------------------------------------------------

--
-- Table structure for table `dsdoituongtx`
--

CREATE TABLE `dsdoituongtx` (
  `id` int(10) UNSIGNED NOT NULL,
  `matinh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahuyen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `maxa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trangthaihoso` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lydotralai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ttthaotac` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahoso` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hoten` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaysinh` date DEFAULT NULL,
  `gioitinh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dantoc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quequan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diachi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `socmnd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bhyt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `noikhambenh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qdhuong` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trangthaihuong` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sosotc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pltrocap` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `matrocap` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `heso` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sotientc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngayhuong` date DEFAULT NULL,
  `ngaydunghuong` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qddunghuong` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lydodunghuong` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ipt1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ipf1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ipt2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ipf2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ipt3` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ipf3` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ipt4` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ipf4` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ipt5` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ipf5` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ipt6` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ipf6` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ipt7` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ipf7` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ipt8` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ipf8` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ipt9` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ipf9` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ipt10` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ipf10` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dsdoituongtx`
--

INSERT INTO `dsdoituongtx` (`id`, `matinh`, `mahuyen`, `maxa`, `trangthaihoso`, `lydotralai`, `ttthaotac`, `avatar`, `mahoso`, `hoten`, `ngaysinh`, `gioitinh`, `dantoc`, `quequan`, `diachi`, `socmnd`, `bhyt`, `noikhambenh`, `qdhuong`, `trangthaihuong`, `sosotc`, `pltrocap`, `matrocap`, `heso`, `sotientc`, `ngayhuong`, `ngaydunghuong`, `qddunghuong`, `lydodunghuong`, `ipt1`, `ipf1`, `ipt2`, `ipf2`, `ipt3`, `ipf3`, `ipt4`, `ipf4`, `ipt5`, `ipf5`, `ipt6`, `ipf6`, `ipt7`, `ipf7`, `ipt8`, `ipf8`, `ipt9`, `ipf9`, `ipt10`, `ipf10`, `created_at`, `updated_at`) VALUES
(2, 'LIFE', 'QCG', 'PMD', 'Bị trả lại', 'AVATAR', 'Phường Mai Dịch(phuongmaidich)- Cập nhật', 'LIFEQCGPMDTX2.jpg', 'LIFEQCGPMDTX2', 'Nguyễn Thị Nụ', '2018-12-31', 'Nữ', NULL, NULL, 'Hn', 'A9876543', 'Có', '', '91263w213', 'Đang hưởng', 'sđâs', 'CD', 'CD1499138251', '1', '270000', '1990-09-15', NULL, '', '', 'Đề xuất sửa PM', 'LIFEQCGPMDTX2_1_de_xuat_sua_pm_kntc.docx', 'BB làm việc', 'LIFEQCGPMDTX2_2_bb_lam_viec.doc', 'BC CV Hưởng', 'LIFEQCGPMDTX2_3_bccV-huong.xls', 'CÔNg Bố Giá', 'LIFEQCGPMDTX2_4_cOngbOgIa_.xls', 'BB', 'LIFEQCGPMDTX2_5_bb_lam_viec.doc', 'bb lÀM VIỆC', 'LIFEQCGPMDTX2_6_bien_ban_lam_viec_ngay_13-4-17.doc', 'CTTC2013Rar', 'LIFEQCGPMDTX2_7_cttc2013.rar', 'DÀi Bắc Cao Hùng', 'LIFEQCGPMDTX2_8_daI_bac_daI_tRung_caO_hung_5n4d.doc', 'DÀI LOàn 5N', 'LIFEQCGPMDTX2_9_daI_lOan_5n_kh_25.7.doc', 'CV_Minh', 'LIFEQCGPMDTX2_10_images.jpg', '2017-07-07 03:16:44', '2017-08-02 08:43:47');

-- --------------------------------------------------------

--
-- Table structure for table `general-configs`
--

CREATE TABLE `general-configs` (
  `id` int(10) UNSIGNED NOT NULL,
  `matinh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tentinh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `donviquanly` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `diachitruso` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dienthoai` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fax` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `muctrocapchuan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `thutruong` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ketoan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nguoilapbieu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `setting` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `general-configs`
--

INSERT INTO `general-configs` (`id`, `matinh`, `tentinh`, `donviquanly`, `diachitruso`, `dienthoai`, `fax`, `email`, `muctrocapchuan`, `thutruong`, `ketoan`, `nguoilapbieu`, `setting`, `created_at`, `updated_at`) VALUES
(1, 'LIFE', 'Hà Nội', 'Sở LĐTB-XH Cuộc Sống', 'Hà Nội', '0987654321', '0987654321', '', '270000', 'Nguyễn Thị Minh Tuyết', 'Nguyễn Thị Mỹ Hạnh', 'Nguyễn Thị Mỹ Hường', '{"dttx":{"index":"1"},"dtdx":{"index":"1"},"ctdttx":{"index":"1"},"ctdtdx":{"index":"1"},"baocao":{"index":"1"}}', NULL, '2017-07-14 03:45:02');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2016_10_14_022915_create_general-configs_table', 1),
(3, '2017_06_06_090717_create_districts_table', 1),
(4, '2017_06_06_090904_create_towns_table', 1),
(5, '2017_06_07_095456_create_dantoc_table', 1),
(6, '2017_06_07_095652_create_quoctich_table', 1),
(11, '2017_07_04_092533_create_dmtrocaptx_table', 2),
(13, '2017_07_04_153754_create_dsdoituongtx_table', 3),
(14, '2017_07_05_144124_create_pltrocaptx_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `pltrocaptx`
--

CREATE TABLE `pltrocaptx` (
  `id` int(10) UNSIGNED NOT NULL,
  `maloai` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tenloai` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mota` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pltrocaptx`
--

INSERT INTO `pltrocaptx` (`id`, `maloai`, `tenloai`, `mota`, `created_at`, `updated_at`) VALUES
(1, 'NXH', 'Đối tượng BTXH sống trong nhà xã hội tại cộng đồng do xã, phường quản lý', NULL, NULL, NULL),
(2, 'CD', 'Đối tượng BTXH tại cộng đồng do xã, phường quản lý', NULL, NULL, NULL),
(3, 'CS', 'Đối tượng bảo trợ xã hội sống trong các cơ sở bảo trợ xã hội', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `quoctich`
--

CREATE TABLE `quoctich` (
  `id` int(10) UNSIGNED NOT NULL,
  `quoctich` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `towns`
--

CREATE TABLE `towns` (
  `id` int(10) UNSIGNED NOT NULL,
  `mahuyen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tenhuyen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `maxa` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tenxa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diachi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dienthoai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fax` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thutruong` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ketoan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nguoithuchien` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `towns`
--

INSERT INTO `towns` (`id`, `mahuyen`, `tenhuyen`, `maxa`, `tenxa`, `diachi`, `dienthoai`, `fax`, `email`, `website`, `thutruong`, `ketoan`, `nguoithuchien`, `created_at`, `updated_at`) VALUES
(1, 'QCG', 'Quận Cầu Giấy', 'PMD', 'Phường Mai Dịch', 'Phường Mai Dịch - Quận Cầu Giấy - TP Hà nội', '', '', '', NULL, NULL, NULL, NULL, '2017-06-28 08:05:53', '2017-06-28 08:05:53'),
(2, 'QCG', 'Quận Cầu Giấy', 'PDV', 'Phường Dịch Vọng', 'Phường Dịch Vọng - Quận Cầu Giấy- Tp Hà Nội', '', '', '', NULL, NULL, NULL, NULL, '2017-06-28 08:06:14', '2017-06-28 08:06:14'),
(3, 'QHBT', 'Quận Hai Bà Trưng', 'PTL', 'Phường Thanh Lương', 'Phường Thanh Lương', '', '', '', NULL, NULL, NULL, NULL, '2017-06-28 08:07:02', '2017-06-28 08:07:02'),
(4, 'QHBT', 'Quận Hai Bà Trưng', 'PBK', 'Phường Bách Khoa', 'Phường Bách Khoa - Hai Bà Trưng - TP Hà Nội', '', '', '', NULL, NULL, NULL, NULL, '2017-06-28 08:07:30', '2017-06-28 08:07:30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `maxa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahuyen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `level` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sadmin` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `permission` text COLLATE utf8_unicode_ci,
  `emailxt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `question` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `answer` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `phone`, `email`, `status`, `maxa`, `mahuyen`, `level`, `sadmin`, `permission`, `emailxt`, `question`, `answer`, `created_at`, `updated_at`) VALUES
(1, 'Minh Trần', 'minhtran', '107e8cf7f2b4531f6b2ff06dbcf94e10', NULL, NULL, 'Kích hoạt', NULL, NULL, 'T', 'ssa', NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Quận Cầu Giấy', 'quancaugiay', 'e10adc3949ba59abbe56e057f20f883e', '09876543', '', 'Kích hoạt', NULL, 'QCG', 'H', NULL, '{"dttx":{"index":"1","forward":"1","approve":"1"},"dtdx":{"index":"1","create":"1","edit":"1","delete":"1","forward":"1","approve":"1"},"ctdttx":{"index":"1","create":"1","edit":"1","delete":"1","forward":"1","approve":"1"},"ctdtdx":{"index":"1","create":"1","edit":"1","delete":"1","forward":"1","approve":"1"},"baocao":{"index":"1"}}', NULL, NULL, NULL, '2017-06-28 08:04:43', '2017-07-21 03:04:01'),
(3, 'Quận Hai Bà Trưng', 'quanhaibatrung', 'e10adc3949ba59abbe56e057f20f883e', '', '', 'Kích hoạt', NULL, 'QHBT', 'H', NULL, NULL, NULL, NULL, NULL, '2017-06-28 08:05:22', '2017-06-28 08:05:22'),
(4, 'Phường Mai Dịch', 'phuongmaidich', 'e10adc3949ba59abbe56e057f20f883e', '', '', 'Kích hoạt', 'PMD', 'QCG', 'X', NULL, NULL, NULL, NULL, NULL, '2017-06-28 08:05:53', '2017-06-28 08:05:53'),
(5, 'Phường Dịch Vọng', 'phuongdichvong', 'e10adc3949ba59abbe56e057f20f883e', '', '', 'Kích hoạt', 'PDV', 'QCG', 'X', NULL, NULL, NULL, NULL, NULL, '2017-06-28 08:06:14', '2017-06-28 08:06:14'),
(6, 'Phường Thanh Lương', 'phuongthanhluong', 'e10adc3949ba59abbe56e057f20f883e', '', '', 'Kích hoạt', 'PTL', 'QHBT', 'X', NULL, NULL, NULL, NULL, NULL, '2017-06-28 08:07:02', '2017-06-28 08:07:02'),
(7, 'Phường Bách Khoa', 'phuongbachkhoa', 'e10adc3949ba59abbe56e057f20f883e', '', '', 'Kích hoạt', 'PBK', 'QHBT', 'X', NULL, NULL, NULL, NULL, NULL, '2017-06-28 08:07:30', '2017-06-28 08:07:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dantoc`
--
ALTER TABLE `dantoc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `districts_mahuyen_unique` (`mahuyen`);

--
-- Indexes for table `dmtrocaptx`
--
ALTER TABLE `dmtrocaptx`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dsdoituongtx`
--
ALTER TABLE `dsdoituongtx`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general-configs`
--
ALTER TABLE `general-configs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pltrocaptx`
--
ALTER TABLE `pltrocaptx`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quoctich`
--
ALTER TABLE `quoctich`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `towns`
--
ALTER TABLE `towns`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `towns_maxa_unique` (`maxa`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dantoc`
--
ALTER TABLE `dantoc`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `dmtrocaptx`
--
ALTER TABLE `dmtrocaptx`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `dsdoituongtx`
--
ALTER TABLE `dsdoituongtx`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `general-configs`
--
ALTER TABLE `general-configs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `pltrocaptx`
--
ALTER TABLE `pltrocaptx`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `quoctich`
--
ALTER TABLE `quoctich`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `towns`
--
ALTER TABLE `towns`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
