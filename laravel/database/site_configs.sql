-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 15, 2019 lúc 06:57 PM
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
-- Cơ sở dữ liệu: `bachchien_db`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `site_configs`
--

CREATE TABLE `site_configs` (
  `id` int(10) UNSIGNED NOT NULL,
  `logo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `favicon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `default_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slogan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact` text COLLATE utf8_unicode_ci,
  `footer` text COLLATE utf8_unicode_ci,
  `google_seo` text COLLATE utf8_unicode_ci,
  `google_map` text COLLATE utf8_unicode_ci,
  `mobile` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fb_page` text COLLATE utf8_unicode_ci,
  `twitter` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_keywords` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `site_configs`
--

INSERT INTO `site_configs` (`id`, `logo`, `favicon`, `default_image`, `slogan`, `link`, `title`, `description`, `address`, `contact`, `footer`, `google_seo`, `google_map`, `mobile`, `email`, `facebook`, `fb_page`, `twitter`, `meta_keywords`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, 'zu8X-logo.jpg', 'mYIh-favicon.jpg', 'jNVi-default_image.jpg', 'Bách Chiến - Vật liệu xây dựng hoàn thiện - Thi công tận tâm, chất lượng', 'https://bachchien.com.vn/', 'Công ty Cổ phần Đầu tư Xây dựng và Thương mại Bách Chiến', 'Công ty Cổ phần Đầu tư Xây dựng và Thương mại Bách Chiến', 'Số 2, liền kề 23, khu đô thị Văn Khê, Phường La Khê, Quận Hà Đông, Thành phố Hà Nội', '<div class=\"siteorigin-widget-tinymce textwidget\"><div class=\"info-contacts\"><div class=\"logo-company\"><div class=\"siteorigin-widget-tinymce textwidget\"><div class=\"info-contacts\"><div class=\"logo-company\"><span style=\"font-size: 30px;\">Công ty Cổ phần Đầu tư Xây dựng và Thương mại Bách Chiến</span><br></div></div></div><div class=\"siteorigin-widget-tinymce textwidget\"><div class=\"info-contacts\"><ul><li class=\"i_address\"><p open=\"\" sans\",=\"\" sans-serif;=\"\" font-size:=\"\" 16px;=\"\" background-color:=\"\" rgb(250,=\"\" 250,=\"\" 250);\"=\"\" style=\"color: rgb(89, 89, 89);\"><span class=\"fa fa-building\"></span> Địa chỉ: Số 2, liền kề 23, khu đô thị Văn Khê, Phường La Khê, Quận Hà Đông, Thành phố Hà Nội</p><p open=\"\" sans\",=\"\" sans-serif;=\"\" font-size:=\"\" 16px;=\"\" background-color:=\"\" rgb(250,=\"\" 250,=\"\" 250);\"=\"\" style=\"color: rgb(89, 89, 89);\"><a href=\"http://localhost/luatpjm.vn/lien-he#\" target=\"_blank\" style=\"color: rgb(51, 51, 51);\"><i class=\"directions\"></i></a></p><p open=\"\" sans\",=\"\" sans-serif;=\"\" font-size:=\"\" 16px;=\"\" background-color:=\"\" rgb(250,=\"\" 250,=\"\" 250);\"=\"\" style=\"\"><span style=\"color: rgb(89, 89, 89);\"><span class=\"fa fa-phone\"></span> Điện thoại: </span>0969.17.83.83</p><p open=\"\" sans\",=\"\" sans-serif;=\"\" font-size:=\"\" 16px;=\"\" background-color:=\"\" rgb(250,=\"\" 250,=\"\" 250);\"=\"\" style=\"\"><span class=\"fa fa fa-envelope\" style=\"color: rgb(89, 89, 89);\"></span><font color=\"#595959\"> Email: </font>duybiends68@gmail.com</p></li></ul></div></div></div></div></div>', '<p><span class=\"box-copyright\">\r\n          <span class=\"ft-copyright\">Bản quyền thuộc về Bách Chiến</span>\r\n          <span class=\"sep hidden-xs\"> | </span>\r\n          Nghiêm cấm tái bản khi chưa được sự đồng ý bằng văn bản!</span></p>', '<!-- Global site tag (gtag.js) - Google Analytics -->\r\n<script async src=\"https://www.googletagmanager.com/gtag/js?id=UA-129903164-1\"></script>\r\n<script>\r\n  window.dataLayer = window.dataLayer || [];\r\n  function gtag(){dataLayer.push(arguments);}\r\n  gtag(\'js\', new Date());\r\n\r\n  gtag(\'config\', \'UA-129903164-1\');\r\n</script>\r\n', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3725.422281621472!2d105.76375621435471!3d20.975703286027066!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313453243d5e142f%3A0x9b2b129136d209e3!2zUXXDoW4gaOG7jSBo4bupYQ!5e0!3m2!1svi!2s!4v1543347165586\" width=\"100%\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>', '0969178383', 'duybiends68@gmail.com', 'https://www.facebook.com/bachchien.com.vn', '<div class=\"fb-page\" data-href=\"https://www.facebook.com/luatpjm\" data-tabs=\"timeline\" data-height=\"200\" data-small-header=\"false\" data-adapt-container-width=\"true\" data-hide-cover=\"false\" data-show-facepile=\"true\"><blockquote cite=\"https://www.facebook.com/luatpjm\" class=\"fb-xfbml-parse-ignore\"><a href=\"https://www.facebook.com/luatpjm\">Công ty Luật PJM</a></blockquote></div>', 'https://www.facebook.com/bachchien.com.vn', 'Công ty Cổ phần Đầu tư Xây dựng và Thương mại Bách Chiến', 'Công ty Cổ phần Đầu tư Xây dựng và Thương mại Bách Chiến', '2018-11-07 21:12:47', '2018-12-19 13:24:16');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `site_configs`
--
ALTER TABLE `site_configs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `site_configs`
--
ALTER TABLE `site_configs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
