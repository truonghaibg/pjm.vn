-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 20, 2019 lúc 07:29 PM
-- Phiên bản máy phục vụ: 10.1.31-MariaDB
-- Phiên bản PHP: 7.1.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `duongvuv_db`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banners`
--

CREATE TABLE `banners` (
  `id` int(10) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `banners`
--

INSERT INTO `banners` (`id`, `title`, `image`, `description`, `link`, `status`, `location`, `meta_description`, `meta_keywords`, `created_at`, `updated_at`) VALUES
(1, 'Banner left', 'XLou_testbanner.png', 'abc', 'https://www.facebook.com/luatpjm', 1, 'banner_left', '', '', '2018-11-06 17:17:54', '2018-11-06 17:23:26'),
(2, 'Banner right', 'MnZr_testbanner.png', 'Luật PJM', 'https://www.facebook.com/luatpjm', 1, 'banner_right', 'Luật PJM', 'Luật PJM', '2018-11-06 17:18:09', '2018-11-06 17:23:15'),
(3, 'Home page', 'home-page.png', 'Luật PJM', 'https://www.facebook.com/luatpjm', 1, 'home_page', 'Luật PJM', 'Luật PJM', '2018-11-06 17:30:54', NULL),
(5, 'Hướng dẫn', 'j9Od-huong-dan.png', 'Hướng dẫn', 'https://www.facebook.com/luatpjm', 1, 'banner_trang_luat', 'Hướng dẫn', 'Hướng dẫn', '2018-11-06 17:48:48', '2018-11-24 19:03:05'),
(6, 'Tra cứu', 'tra-cuu.png', 'Tra cứu', 'https://www.facebook.com/luatpjm', 1, 'banner_trang_danh_muc', 'Tra cứu', 'Tra cứu', '2018-11-06 17:49:47', '2018-11-24 19:02:54');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
