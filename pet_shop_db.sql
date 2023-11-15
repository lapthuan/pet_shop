-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 15, 2023 lúc 02:41 PM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `pet_shop_db`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int(30) NOT NULL,
  `client_id` int(30) NOT NULL,
  `inventory_id` int(30) NOT NULL,
  `price` double NOT NULL,
  `quantity` int(30) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id`, `client_id`, `inventory_id`, `price`, `quantity`, `date_created`) VALUES
(21, 1, 7, 150, 1, '2023-11-14 18:02:17'),
(23, 3, 7, 150, 1, '2023-11-14 20:05:47');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(30) NOT NULL,
  `category` varchar(250) NOT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `category`, `description`, `status`, `date_created`) VALUES
(1, 'Thức ăn', '&lt;span style=&quot;color: rgb(209, 213, 219); font-family: S&ouml;hne, ui-sans-serif, system-ui, -apple-system, &amp;quot;Segoe UI&amp;quot;, Roboto, Ubuntu, Cantarell, &amp;quot;Noto Sans&amp;quot;, sans-serif, &amp;quot;Helvetica Neue&amp;quot;, Arial, &amp;quot;Apple Color Emoji&amp;quot;, &amp;quot;Segoe UI Emoji&amp;quot;, &amp;quot;Segoe UI Symbol&amp;quot;, &amp;quot;Noto Color Emoji&amp;quot;; white-space-collapse: preserve; background-color: rgb(68, 70, 84);&quot;&gt;Thức ăn cho th&uacute; cưng đ&oacute;ng vai tr&ograve; quan trọng trong việc duy tr&igrave; sức khỏe v&agrave; hạnh ph&uacute;c của ch&uacute;ng. C&aacute;c loại thức ăn cho th&uacute; cưng thường được thiết kế để đ&aacute;p ứng nhu cầu dinh dưỡng cụ thể của loại động vật đ&oacute;. Đối với ch&oacute; v&agrave; m&egrave;o, v&iacute; dụ, thức ăn thường chứa c&aacute;c th&agrave;nh phần như protein, chất b&eacute;o, vitamin v&agrave; kho&aacute;ng chất để hỗ trợ sự ph&aacute;t triển của cơ bắp, x&acirc;y dựng l&ocirc;ng, cung cấp năng lượng v&agrave; duy tr&igrave; hệ thống miễn dịch.&lt;/span&gt;', 1, '2021-06-21 10:17:41'),
(4, 'Đồ chơi ', '&lt;p style=&quot;border: 0px solid rgb(217, 217, 227); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; margin: 1.25em 0px; color: rgb(209, 213, 219); font-family: S&ouml;hne, ui-sans-serif, system-ui, -apple-system, &amp;quot;Segoe UI&amp;quot;, Roboto, Ubuntu, Cantarell, &amp;quot;Noto Sans&amp;quot;, sans-serif, &amp;quot;Helvetica Neue&amp;quot;, Arial, &amp;quot;Apple Color Emoji&amp;quot;, &amp;quot;Segoe UI Emoji&amp;quot;, &amp;quot;Segoe UI Symbol&amp;quot;, &amp;quot;Noto Color Emoji&amp;quot;; white-space-collapse: preserve; background-color: rgb(68, 70, 84);&quot;&gt;Trong căn ph&ograve;ng nhỏ, &aacute;nh s&aacute;ng v&agrave;ng nhẹ từ cửa sổ rơi v&agrave;o g&oacute;c ph&ograve;ng, tạo n&ecirc;n kh&ocirc;ng gian ấm c&uacute;ng. Một chiếc giường nhỏ bị chiếm lấy bởi một vi&ecirc;n th&uacute; cưng đ&aacute;ng y&ecirc;u. L&ocirc;ng d&agrave;y m&agrave;u trắng mềm mại che phủ to&agrave;n bộ cơ thể n&oacute;, tạo n&ecirc;n vẻ ngo&agrave;i &ecirc;m &aacute;i v&agrave; thoải m&aacute;i. Đ&ocirc;i mắt hồn nhi&ecirc;n m&agrave;u n&acirc;u nhỏ nhắn đầy t&ograve; m&ograve; nh&igrave;n chằm chằm v&agrave;o bạn, như l&agrave; một &aacute;nh sao nhỏ đang tỏa s&aacute;ng trong đ&ecirc;m tĩnh lặng.&lt;/p&gt;&lt;p style=&quot;border: 0px solid rgb(217, 217, 227); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; margin: 1.25em 0px; color: rgb(209, 213, 219); font-family: S&ouml;hne, ui-sans-serif, system-ui, -apple-system, &amp;quot;Segoe UI&amp;quot;, Roboto, Ubuntu, Cantarell, &amp;quot;Noto Sans&amp;quot;, sans-serif, &amp;quot;Helvetica Neue&amp;quot;, Arial, &amp;quot;Apple Color Emoji&amp;quot;, &amp;quot;Segoe UI Emoji&amp;quot;, &amp;quot;Segoe UI Symbol&amp;quot;, &amp;quot;Noto Color Emoji&amp;quot;; white-space-collapse: preserve; background-color: rgb(68, 70, 84);&quot;&gt;N&oacute; đang nằm cuộn tr&ograve;n như một quả cầu nhỏ, đu&ocirc;i nhỏ nhắn vươn ra ph&iacute;a sau. Tiếng r&ecirc;n nhẹ nh&agrave;ng v&agrave; h&ograve;a m&igrave;nh trong kh&ocirc;ng gian như đưa bạn v&agrave;o một thế giới y&ecirc;n b&igrave;nh. Khi bạn chạm nhẹ v&agrave;o l&ocirc;ng n&oacute;, bạn c&oacute; thể cảm nhận được sự ấm &aacute;p v&agrave; sự th&acirc;n thiện từ người bạn nhỏ n&agrave;y. M&ugrave;i hương nhẹ nh&agrave;ng của shampoo th&uacute; cưng nồng n&agrave;n, tạo n&ecirc;n kh&ocirc;ng kh&iacute; thoải m&aacute;i v&agrave; th&acirc;n thiện.&lt;/p&gt;&lt;p style=&quot;border: 0px solid rgb(217, 217, 227); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(69,89,164,.5); --tw-ring-offset-shadow: 0 0 transparent; --tw-ring-shadow: 0 0 transparent; --tw-shadow: 0 0 transparent; --tw-shadow-colored: 0 0 transparent; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; margin: 1.25em 0px 0px; color: rgb(209, 213, 219); font-family: S&ouml;hne, ui-sans-serif, system-ui, -apple-system, &amp;quot;Segoe UI&amp;quot;, Roboto, Ubuntu, Cantarell, &amp;quot;Noto Sans&amp;quot;, sans-serif, &amp;quot;Helvetica Neue&amp;quot;, Arial, &amp;quot;Apple Color Emoji&amp;quot;, &amp;quot;Segoe UI Emoji&amp;quot;, &amp;quot;Segoe UI Symbol&amp;quot;, &amp;quot;Noto Color Emoji&amp;quot;; white-space-collapse: preserve; background-color: rgb(68, 70, 84);&quot;&gt;Với những động t&aacute;c y&ecirc;n b&igrave;nh v&agrave; những bức tranh nhỏ như thế, th&uacute; cưng trở th&agrave;nh một phần quan trọng v&agrave; đ&aacute;ng y&ecirc;u trong cuộc sống h&agrave;ng ng&agrave;y, mang lại niềm vui v&agrave; sự hạnh ph&uacute;c cho gia đ&igrave;nh.&lt;/p&gt;', 1, '2021-06-21 16:34:04');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `clients`
--

CREATE TABLE `clients` (
  `id` int(30) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `lastname` varchar(250) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` text NOT NULL,
  `default_delivery_address` text NOT NULL,
  `status` int(11) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `clients`
--

INSERT INTO `clients` (`id`, `firstname`, `lastname`, `gender`, `contact`, `email`, `password`, `default_delivery_address`, `status`, `date_created`) VALUES
(1, 'John', 'Smith', 'Male', '09123456789', 'jsmith@sample.com', '1254737c076cf867dc53d60a0364f38e', 'Sample Address', 1, '2021-06-21 16:00:23'),
(2, 'Do', 'Thuan', 'Male', '0794355704', 'lapthuan@gmail.com', 'b59c67bf196a4758191e42f76670ceba', '66/23e Đường 14-9, Phường 5, Vĩnh Long, Việt Nam', 0, '2023-11-13 16:52:07'),
(3, 'Do', 'Thuan', 'Nam', '0794355704', 'lapthuan0805@gmail.com', '66089c978df52df8c317ed8accbdb8e6', '66/23e Đường 14-9, Phường 5, Vĩnh Long, Việt Nam', 1, '2023-11-13 18:28:30'),
(4, 'Do', 'Thuan', 'Male', '0794355704', 'lapthuan0805a@gmail.com', '09fb8da84a7668782f46492ce7921beb', '66/23e Đường 14-9, Phường 5, Vĩnh Long, Việt Nam', 0, '2023-11-13 20:22:25'),
(5, 'Do', 'Thuan', 'Male', '0794355704', 'lapthuan111@gmail.com', '202cb962ac59075b964b07152d234b70', '66/23e Đường 14-9, Phường 5, Vĩnh Long, Việt Nam', 0, '2023-11-13 21:24:32'),
(6, 'Do', 'Thuan', 'Female', '0794355704', 'lapthuan08056@gmail.com', '1b3ed76ed6db21576e91e4de42d49ff2', '', 0, '2023-11-14 11:04:49'),
(7, 'Do', 'Thuan', 'Nam', '0794355704', 'lapthuan0805aaa@gmail.com', '1b3ed76ed6db21576e91e4de42d49ff2', 'a', 0, '2023-11-14 11:05:56'),
(8, 'Do', 'Thuan', 'Nam', '0794355704', 'lapthuan1111@gmail.com', '6a1c3b4119200a13866b0dabf30d8835', 'a', 1, '2023-11-14 19:48:32'),
(9, 'Do', 'Thuan', 'Nam', '0794355704', 'lapthuan0805aaaaaa@gmail.com', '6a1c3b4119200a13866b0dabf30d8835', 'aaaa', 1, '2023-11-14 20:02:49');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `inventory`
--

CREATE TABLE `inventory` (
  `id` int(30) NOT NULL,
  `product_id` int(30) NOT NULL,
  `quantity` double NOT NULL,
  `unit` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `size` varchar(250) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `inventory`
--

INSERT INTO `inventory` (`id`, `product_id`, `quantity`, `unit`, `price`, `size`, `date_created`, `date_updated`) VALUES
(1, 1, 50, 'pcs', 250, 'M', '2021-06-21 13:01:30', '2021-06-21 13:05:23'),
(2, 1, 20, 'Sample', 300, 'L', '2021-06-21 13:07:00', NULL),
(3, 4, 150, 'pcs', 500, 'M', '2021-06-21 16:50:37', NULL),
(4, 3, 50, 'pack', 150, 'M', '2021-06-21 16:51:12', NULL),
(5, 5, 30, 'pcs', 50, 'M', '2021-06-21 16:51:35', NULL),
(6, 4, 10, 'pcs', 550, 'L', '2021-06-21 16:51:54', NULL),
(7, 6, 100, 'pcs', 150, 'S', '2021-06-22 15:50:47', NULL),
(8, 6, 150, 'pcs', 180, 'M', '2021-06-22 15:51:13', NULL),
(9, 5, 123, '123', 123123000, 'XL', '2023-11-14 17:46:07', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(30) NOT NULL,
  `client_id` int(30) NOT NULL,
  `delivery_address` text NOT NULL,
  `payment_method` varchar(100) NOT NULL,
  `amount` double NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT 0,
  `paid` tinyint(1) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `client_id`, `delivery_address`, `payment_method`, `amount`, `status`, `paid`, `date_created`, `date_updated`) VALUES
(1, 1, 'Sample Address', 'Online Payment', 1100, 2, 1, '2023-06-22 13:48:54', '2023-11-15 17:24:05'),
(2, 1, 'Sample Address', 'cod', 750, 3, 1, '2023-06-22 15:26:07', '2023-11-15 17:24:09'),
(4, 2, '66/23e Đường 14-9, Phường 5, Vĩnh Long, Việt Nam', 'cod', 300, 3, 0, '2023-11-13 16:55:29', '2023-11-14 17:39:22'),
(5, 2, '66/23e Đường 14-9, Phường 5, Vĩnh Long, Việt Nam', 'cod', 450, 1, 1, '2023-11-13 17:01:03', '2023-11-13 17:15:16'),
(6, 2, '66/23e Đường 14-9, Phường 5, Vĩnh Long, Việt Nam', 'Online Payment', 50, 0, 1, '2023-11-13 18:41:21', NULL),
(7, 4, '66/23e Đường 14-9, Phường 5, Vĩnh Long, Việt Nam', 'Online Payment', 300, 0, 1, '2023-11-13 20:25:13', NULL),
(8, 4, '66/23e Đường 14-9, Phường 5, Vĩnh Long, Việt Nam', 'cod', 50, 0, 0, '2023-11-13 20:25:41', NULL),
(9, 5, '66/23e Đường 14-9, Phường 5, Vĩnh Long, Việt Nam', 'Online Payment', 50, 0, 1, '2023-11-13 21:26:01', NULL),
(10, 5, '66/23e Đường 14-9, Phường 5, Vĩnh Long, Việt Nam', 'cod', 250, 0, 0, '2023-11-13 21:26:56', NULL),
(12, 3, '66/23e Đường 14-9, Phường 5, Vĩnh Long, Việt Nam', 'cod', 400, 1, 1, '2023-11-14 11:55:54', '2023-11-14 12:04:41'),
(13, 3, '66/23e Đường 14-9, Phường 5, Vĩnh Long, Việt Nam', 'cod', 50, 0, 1, '2023-11-14 12:47:46', '2023-11-14 17:42:31'),
(14, 1, '', 'cod', 150, 3, 1, '2023-11-14 17:38:55', '2023-11-14 17:50:54'),
(15, 1, '', 'cod', 150, 1, 1, '2023-11-14 17:40:14', '2023-11-14 17:59:16'),
(16, 1, '', 'cod', 500, 3, 1, '2023-11-14 17:41:44', '2023-11-14 17:42:44'),
(17, 3, '66/23e Đường 14-9, Phường 5, Vĩnh Long, Việt Nam', 'cod', 1000, 0, 0, '2023-11-14 20:05:40', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_list`
--

CREATE TABLE `order_list` (
  `id` int(30) NOT NULL,
  `order_id` int(30) NOT NULL,
  `product_id` int(30) NOT NULL,
  `size` varchar(20) NOT NULL,
  `unit` varchar(50) NOT NULL,
  `quantity` int(30) NOT NULL,
  `price` double NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `order_list`
--

INSERT INTO `order_list` (`id`, `order_id`, `product_id`, `size`, `unit`, `quantity`, `price`, `total`) VALUES
(1, 1, 4, 'L', 'pcs', 2, 550, 1100),
(2, 2, 3, 'M', 'pack', 5, 150, 750),
(5, 4, 3, 'M', 'pack', 2, 150, 300),
(6, 5, 6, 'S', 'pcs', 1, 150, 150),
(7, 5, 1, 'L', 'Sample', 1, 300, 300),
(8, 6, 5, 'M', 'pcs', 1, 50, 50),
(9, 7, 6, 'S', 'pcs', 2, 150, 300),
(10, 8, 5, 'M', 'pcs', 1, 50, 50),
(11, 9, 5, 'M', 'pcs', 1, 50, 50),
(12, 10, 1, 'M', 'pcs', 1, 250, 250),
(14, 12, 1, 'M', 'pcs', 1, 250, 250),
(15, 12, 3, 'M', 'pack', 1, 150, 150),
(16, 13, 5, 'M', 'pcs', 1, 50, 50),
(17, 14, 6, 'S', 'pcs', 1, 150, 150),
(18, 15, 6, 'S', 'pcs', 1, 150, 150),
(19, 16, 4, 'M', 'pcs', 1, 500, 500),
(20, 17, 4, 'M', 'pcs', 2, 500, 1000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(30) NOT NULL,
  `category_id` int(30) NOT NULL,
  `sub_category_id` int(30) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `category_id`, `sub_category_id`, `product_name`, `description`, `status`, `date_created`) VALUES
(1, 1, 1, 'Dog Food 101', '&lt;p&gt;Sample Product&amp;nbsp;&lt;/p&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px;&quot;&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras dolor felis, mattis sit amet turpis eu, porta efficitur arcu. Ut orci est, posuere a mi sed, sollicitudin volutpat nisl. Vestibulum aliquam condimentum dictum. Sed a lobortis dolor, nec molestie nulla. Quisque purus justo, fermentum sed commodo in, hendrerit non nisi. In eleifend diam at pellentesque tempor. Mauris a augue ultrices, vulputate ipsum ac, lobortis eros. Nulla tempor odio sit amet magna finibus dignissim vitae eu turpis.&lt;/p&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px;&quot;&gt;Proin nec semper nisi. Aenean varius purus at eros aliquam, non luctus eros interdum. Etiam non nisl ut lacus semper ornare sed iaculis justo. Mauris justo mauris, faucibus sit amet pharetra at, accumsan quis felis. Nulla gravida elementum porttitor. Vestibulum blandit semper ligula sit amet laoreet. Aliquam a est consectetur, blandit odio ultricies, finibus enim. Sed gravida pretium elit, et bibendum est dignissim sed. Aliquam ultrices felis a arcu feugiat, vel porta neque luctus. Vivamus dignissim porttitor nulla, non pulvinar nulla blandit a. Sed nisi leo, volutpat in nibh sit amet, laoreet semper massa.&lt;/p&gt;', 1, '2021-06-21 11:19:31'),
(3, 1, 3, 'Cat Food 101', '&lt;p&gt;Cat Food 101&lt;/p&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px;&quot;&gt;Sed interdum odio a efficitur volutpat. Etiam porta erat ut quam feugiat iaculis. Nam tincidunt sem metus, quis mattis nisl iaculis id. Aliquam vehicula auctor facilisis. Etiam tincidunt id velit sed pulvinar. Mauris mi est, varius in mauris ut, rhoncus congue nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Fusce mollis arcu mauris, tempor fermentum odio vehicula nec. Morbi sit amet dui mollis, sodales dolor vel, efficitur tortor. Nam vel pretium lectus. Morbi ultricies magna eget libero bibendum posuere. Ut ultrices tellus ac enim egestas feugiat.&lt;/p&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px;&quot;&gt;Mauris faucibus, erat porta auctor porttitor, ligula leo ornare sem, eu dignissim diam massa a purus. Praesent et faucibus metus. Nulla iaculis enim nec efficitur consectetur. Sed vehicula purus neque, quis luctus odio varius non. Sed hendrerit leo et velit ultricies, eget venenatis elit ornare. Pellentesque nec tincidunt nunc. Donec fringilla tristique lectus, vitae malesuada massa mollis ut. Nulla eleifend ac ligula vel rutrum.&lt;/p&gt;', 1, '2021-06-21 16:48:16'),
(4, 4, 4, 'Dog bed', '&lt;p&gt;Sample&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;text-align: justify;&quot;&gt;Proin nec semper nisi. Aenean varius purus at eros aliquam, non luctus eros interdum. Etiam non nisl ut lacus semper ornare sed iaculis justo. Mauris justo mauris, faucibus sit amet pharetra at, accumsan quis felis. Nulla gravida elementum porttitor. Vestibulum blandit semper ligula sit amet laoreet. Aliquam a est consectetur, blandit odio ultricies, finibus enim. Sed gravida pretium elit, et bibendum est dignissim sed. Aliquam ultrices felis a arcu feugiat, vel porta neque luctus. Vivamus dignissim porttitor nulla, non pulvinar nulla blandit a. Sed nisi leo, volutpat in nibh sit amet, laoreet semper massa.&lt;/span&gt;&lt;br&gt;&lt;/p&gt;', 1, '2021-06-21 16:49:07'),
(5, 4, 5, 'Cat  Plates 623', '&lt;p&gt;&lt;span style=&quot;text-align: justify;&quot;&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras dolor felis, mattis sit amet turpis eu, porta efficitur arcu. Ut orci est, posuere a mi sed, sollicitudin volutpat nisl. Vestibulum aliquam condimentum dictum. Sed a lobortis dolor, nec molestie nulla. Quisque purus justo, fermentum sed commodo in, hendrerit non nisi. In eleifend diam at pellentesque tempor. Mauris a augue ultrices, vulputate ipsum ac, lobortis eros. Nulla tempor odio sit amet magna finibus dignissim vitae eu turpis.&lt;/span&gt;&lt;br&gt;&lt;/p&gt;', 1, '2021-06-21 16:50:11'),
(6, 4, 4, 'Dog Belt', '&lt;p style=&quot;margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px;&quot;&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas dui nulla, tincidunt in arcu at, vulputate volutpat velit. Quisque volutpat gravida erat, gravida porttitor magna malesuada sed. Curabitur massa est, ullamcorper a diam vitae, tincidunt sagittis justo. Nam eu orci ligula. Duis ullamcorper dui at nisi consequat, sed suscipit sapien lacinia. Praesent ut lacus id arcu bibendum egestas. Cras ullamcorper dictum mi, non commodo mauris iaculis a. Pellentesque porta sem id dapibus tincidunt. Aenean metus tellus, efficitur ut feugiat in, euismod et arcu. In pharetra, dolor in fermentum facilisis, metus urna lacinia metus, in maximus justo tellus et tortor. Nam pulvinar eu enim auctor pellentesque.&lt;/p&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px;&quot;&gt;Nam ut quam velit. Suspendisse commodo non urna nec dictum. Pellentesque eget enim id velit bibendum auctor vel id lectus. Maecenas dolor nibh, ultricies eget metus vel, efficitur varius tellus. Donec semper eros sit amet urna bibendum scelerisque. Interdum et malesuada fames ac ante ipsum primis in faucibus. Integer cursus est in sapien sodales, quis pulvinar nisl aliquet. Pellentesque blandit diam lobortis pulvinar ornare. Sed venenatis imperdiet massa, ut mollis sapien sagittis a. Nulla dignissim ultrices metus a mattis. Nunc egestas mattis nisl at posuere. Donec malesuada ut justo sed aliquam. Sed venenatis sit amet tortor et semper. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vivamus sit amet massa at massa malesuada volutpat quis nec libero.&lt;/p&gt;', 1, '2021-06-22 15:50:16');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sales`
--

CREATE TABLE `sales` (
  `id` int(30) NOT NULL,
  `order_id` int(30) NOT NULL,
  `total_amount` double NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `sales`
--

INSERT INTO `sales` (`id`, `order_id`, `total_amount`, `date_created`) VALUES
(1, 1, 1100, '2021-06-22 13:48:54'),
(2, 2, 750, '2021-06-22 15:26:07'),
(4, 4, 300, '2023-11-13 16:55:29'),
(5, 5, 450, '2023-11-13 17:01:03'),
(6, 6, 50, '2023-11-13 18:41:21'),
(7, 7, 300, '2023-11-13 20:25:13'),
(8, 8, 50, '2023-11-13 20:25:41'),
(9, 9, 50, '2023-11-13 21:26:01'),
(10, 10, 250, '2023-11-13 21:26:56'),
(12, 12, 400, '2023-11-14 11:55:54'),
(13, 13, 50, '2023-11-14 12:47:46'),
(14, 14, 150, '2023-11-14 17:38:56'),
(15, 15, 150, '2023-11-14 17:40:14'),
(16, 16, 500, '2023-11-14 17:41:44'),
(17, 17, 1000, '2023-11-14 20:05:40');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sizes`
--

CREATE TABLE `sizes` (
  `id` int(30) NOT NULL,
  `size` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `sizes`
--

INSERT INTO `sizes` (`id`, `size`) VALUES
(1, 'xs'),
(2, 's'),
(3, 'm'),
(4, 'l'),
(5, 'xl'),
(6, 'None');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` int(30) NOT NULL,
  `parent_id` int(30) NOT NULL,
  `sub_category` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `parent_id`, `sub_category`, `description`, `status`, `date_created`) VALUES
(1, 1, 'Dog Food', '&lt;p&gt;Sample only&lt;/p&gt;', 1, '2021-06-21 10:58:32'),
(3, 1, 'Cat Food', '&lt;p&gt;Sample&lt;/p&gt;', 1, '2021-06-21 16:34:59'),
(4, 4, 'Dog Needs', '&lt;p&gt;Sample&amp;nbsp;&lt;/p&gt;', 1, '2021-06-21 16:35:26'),
(5, 4, 'Cat Needs', '&lt;p&gt;Sample&lt;/p&gt;', 1, '2021-06-21 16:35:36'),
(6, 1, 'Đồ ăn siêu cấp', '&lt;p&gt;ấđas&lt;/p&gt;', 1, '2023-11-13 20:16:34');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `system_info`
--

CREATE TABLE `system_info` (
  `id` int(30) NOT NULL,
  `meta_field` text NOT NULL,
  `meta_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `system_info`
--

INSERT INTO `system_info` (`id`, `meta_field`, `meta_value`) VALUES
(1, 'name', 'Cửa hàng thú cưng, thức ăn và phụ kiện thú cưng'),
(6, 'short_name', 'Pet Shop'),
(11, 'logo', 'uploads/1699870800_facebook_profile_image.png'),
(13, 'user_avatar', 'uploads/user_avatar.jpg'),
(14, 'cover', 'uploads/1700045220_Orange Brown Cute Pet Shop Banner.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `lastname` varchar(250) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `avatar` text DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 0,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `password`, `avatar`, `last_login`, `type`, `date_added`, `date_updated`) VALUES
(1, 'admins', 'pet shop', 'admin', '202cb962ac59075b964b07152d234b70', 'uploads/1699965120_logo.png', NULL, 1, '2021-01-20 14:02:37', '2023-11-14 19:59:54'),
(4, 'John', 'Smith', 'nhanvien', '6a1c3b4119200a13866b0dabf30d8835', 'uploads/1699885320_logo_transparent.png', NULL, 0, '2021-06-19 08:36:09', '2023-11-14 19:53:42'),
(6, 'Đỗ', 'Thuận', '123', '6a1c3b4119200a13866b0dabf30d8835', 'uploads/1699964340_youtube_profile_image.png', NULL, 1, '2023-11-14 19:19:59', '2023-11-14 19:49:04'),
(7, 'Đỗ', 'Thuận', '1231234', '6a1c3b4119200a13866b0dabf30d8835', 'uploads/1699964460_pinterest_profile_image.png', NULL, 1, '2023-11-14 19:21:05', '2023-11-14 19:49:06'),
(10, 'Đỗ', 'Thuận', 'thuan1234', '81dc9bdb52d04dc20036dbd8313ed055', NULL, NULL, 1, '2023-11-14 19:47:09', '2023-11-14 19:53:03');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_list`
--
ALTER TABLE `order_list`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `system_info`
--
ALTER TABLE `system_info`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `order_list`
--
ALTER TABLE `order_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `system_info`
--
ALTER TABLE `system_info`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
