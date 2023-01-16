-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 18, 2022 lúc 03:13 AM
-- Phiên bản máy phục vụ: 10.4.20-MariaDB
-- Phiên bản PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `php_mvc_pdo_techstore`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `full_name`, `email`, `phone`, `country`, `password`) VALUES
(1, 'Dinh Huu Duc', 'chicandiemA@gmail.com', '0399819699', 'Vietnamese', '827ccb0eea8a706c4c34a16891f84e7b'),
(2, 'Chan Thien', 'diemAnhathay@gmail.com', '0363408110', 'Vietnamese', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category_post`
--

CREATE TABLE `tbl_category_post` (
  `id_category_post` int(11) UNSIGNED NOT NULL,
  `title_category_post` varchar(100) NOT NULL,
  `desc_category_post` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_category_post`
--

INSERT INTO `tbl_category_post` (`id_category_post`, `title_category_post`, `desc_category_post`) VALUES
(9, 'Tiêu dùng công nghệ', 'các sản phẩm sắp ra mắt'),
(10, '24 h công nghệ', 'Tin tức công nghệ 24h');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category_product`
--

CREATE TABLE `tbl_category_product` (
  `id_category_product` int(11) UNSIGNED NOT NULL,
  `title_category_product` varchar(100) NOT NULL,
  `desc_category_product` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_category_product`
--

INSERT INTO `tbl_category_product` (`id_category_product`, `title_category_product`, `desc_category_product`) VALUES
(45, 'OPPO', 'oppo giá tốt'),
(46, 'SAMSUNG', '<p>Sam Sung mới tr&ecirc;n thị trường</p>\r\n'),
(47, 'LAPTOP', 'Laptop giá rẻ'),
(48, 'IPHONE', 'Iphone chính hãng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_customers`
--

CREATE TABLE `tbl_customers` (
  `customers_id` int(11) NOT NULL,
  `customers_name` varchar(200) NOT NULL,
  `customers_phone` varchar(200) NOT NULL,
  `customers_email` varchar(200) NOT NULL,
  `customers_password` varchar(200) NOT NULL,
  `customers_address` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_customers`
--

INSERT INTO `tbl_customers` (`customers_id`, `customers_name`, `customers_phone`, `customers_email`, `customers_password`, `customers_address`) VALUES
(38, 'duc', '114', 'chicanniemtin3101@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Hà Tĩnh'),
(39, 'thien', '113', 'huuducjustneedbelief@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'ha tinh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_code` varchar(100) NOT NULL,
  `order_date` varchar(100) NOT NULL,
  `order_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_order`
--

INSERT INTO `tbl_order` (`order_code`, `order_date`, `order_status`) VALUES
('1391', '15/01/22 02:23:03pm', 0),
('2747', '15/01/22 02:24:41pm', 0),
('3234', '15/01/22 02:21:29pm', 0),
('721', '15/01/22 02:23:24pm', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order_details`
--

CREATE TABLE `tbl_order_details` (
  `order_details_id` int(11) NOT NULL,
  `order_code` varchar(100) NOT NULL,
  `product_id` int(11) UNSIGNED NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `sodienthoai` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `diachi` varchar(200) NOT NULL,
  `noidung` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_order_details`
--

INSERT INTO `tbl_order_details` (`order_details_id`, `order_code`, `product_id`, `product_quantity`, `name`, `sodienthoai`, `email`, `diachi`, `noidung`) VALUES
(46, '3234', 60, 1, 'duc', '114', 'chicanniemtin3101@gmail.com', 'Hà Tĩnh', 'giao hang an toan'),
(47, '3234', 54, 3, 'duc', '114', 'chicanniemtin3101@gmail.com', 'Hà Tĩnh', 'giao hang an toan'),
(48, '1391', 54, 1, 'duc', '114', 'chicanniemtin3101@gmail.com', 'Hà Tĩnh', ''),
(49, '1391', 49, 1, 'duc', '114', 'chicanniemtin3101@gmail.com', 'Hà Tĩnh', ''),
(50, '721', 61, 1, 'duc', '114', 'chicanniemtin3101@gmail.com', 'Hà Tĩnh', ''),
(51, '2747', 61, 6, 'duc', '114', 'chicanniemtin3101@gmail.com', 'Hà Tĩnh', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_post`
--

CREATE TABLE `tbl_post` (
  `id_post` int(11) NOT NULL,
  `title_post` varchar(255) NOT NULL,
  `content_post` text NOT NULL,
  `image_post` varchar(200) NOT NULL,
  `id_category_post` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_post`
--

INSERT INTO `tbl_post` (`id_post`, `title_post`, `content_post`, `image_post`, `id_category_post`) VALUES
(10, 'Top 5 smartphone chuẩn bị ra mat cuối năm 2021 và năm 2022 đáng được kỳ vọng nhất', '<p>Dưới đ&acirc;y ch&iacute;nh l&agrave; danh s&aacute;ch c&aacute;c d&ograve;ng&nbsp;<a href=\"https://didongviet.vn/dien-thoai\" target=\"_blank\">smartphone</a>, điện thoại m&agrave;n h&igrave;nh gập dự kiến sẽ tr&igrave;nh l&agrave;ng v&agrave;o cuối năm 2021 hoặc đầu năm 2022 của c&aacute;c &ocirc;ng lớn c&ocirc;ng nghệ h&agrave;ng đầu tr&ecirc;n thế giới hiện nay. H&atilde;y c&ugrave;ng xem đ&acirc;u l&agrave; 5 c&aacute;i t&ecirc;n s&aacute;ng gi&aacute; nhất được phần lớn người d&ugrave;ng kỳ vọng.</p>\r\n\r\n<p>Năm 2021 đ&atilde; sắp sửa kh&eacute;p lại v&agrave; trong năm nay ch&uacute;ng ta cũng đ&atilde; được chứng kiện sự ra mắt của nhiều mẫu điện thoại v&ocirc; c&ugrave;ng ấn tượng. Ba flagship si&ecirc;u phẩm&nbsp;<strong>Galaxy S21, Galaxy S21 Plus</strong>&nbsp;v&agrave;&nbsp;<strong>Galaxy S21 Ultra</strong>&nbsp;đ&atilde; mở đầu một năm th&agrave;nh c&ocirc;ng của thị trường smartphone v&agrave; cho đến nay c&aacute;c thiết bị n&agrave;y vẫn chưa hết hot.</p>\r\n\r\n<p>Tiếp theo sau đ&oacute;, sự ra đời của những mẫu cao cấp kh&aacute;c như&nbsp;<strong>Xiaomi Mi 11, Oppo Find X3 Pro, Oneplus 9</strong>&nbsp;hay cũng như l&agrave; mẫu sản phẩm gập&nbsp;<strong><a href=\"https://didongviet.vn/galaxy-z-fold3-z-flip3-5g\" target=\"_blank\">Galaxy Z Fold3</a></strong>&nbsp;đầy sự đột ph&aacute; đến từ Samsung đ&atilde; khiến người d&ugrave;ng cực kỳ th&iacute;ch th&uacute;. B&ecirc;n cạnh đ&oacute;, d&ograve;ng&nbsp;<strong><a href=\"https://didongviet.vn/iphone-13\" target=\"_blank\">iPhone 13</a></strong>&nbsp;vừa ra mắt v&agrave;o giữa th&aacute;ng 9 vừa qua cũng đ&atilde; đ&oacute;n nhận được kh&ocirc;ng &iacute;t sự quan t&acirc;m của c&aacute;c t&iacute;n đồ c&ocirc;ng nghệ nhờ sự cải tiến về hiệu năng v&agrave; thiết kế.</p>\r\n\r\n<p>V&agrave;o năm 2022, thị trường smartphone hứa hẹn sẽ cạnh tranh&nbsp;<strong>khốc liệt</strong>&nbsp;v&agrave; c&agrave;ng&nbsp;<strong>b&ugrave;ng nổ</strong>&nbsp;hơn nữa với c&aacute;c xu hướng c&ocirc;ng nghệ mới c&ugrave;ng thiết kế mới được trang bị tr&ecirc;n những d&ograve;ng m&aacute;y cao cấp thuộc c&aacute;c h&atilde;ng đ&igrave;nh đ&aacute;m như Samsung, Apple hay Google. H&atilde;y c&ugrave;ng m&igrave;nh điểm qua top c&aacute;c điện thoại dự kiến sẽ ra mắt trong cuối năm 2021 hoặc năm 2022 đầy tiềm năng.</p>\r\n\r\n<h3>D&ograve;ng smartphone iPhone SE 3</h3>\r\n\r\n<p>Mặc d&ugrave; ch&uacute;ng ta đ&atilde; biết c&oacute; lẽ iPhone 14 c&oacute; lẽ l&agrave; c&aacute;i t&ecirc;n được săn đ&oacute;n nhiều nhất của c&aacute;c sản phẩm đến từ Apple nhưng phi&ecirc;n bản kế nhiệm của d&ograve;ng iPhone SE được c&ocirc;ng ty dự kiến tung ra trong&nbsp;<strong>năm</strong>&nbsp;<strong>2022</strong>&nbsp;cũng c&oacute; độ hot kh&ocirc;ng k&eacute;m.</p>\r\n\r\n<p>Hiện ch&uacute;ng ta c&oacute; kh&aacute; &iacute;t th&ocirc;ng tin về chiếc điện thoại iPhone SE 3 n&agrave;y cho đến nay. Tuy nhi&ecirc;n, nếu smartphone được tr&igrave;nh l&agrave;ng th&igrave; khả năng cao thiết bị sẽ được trang bị con chip&nbsp;<strong>A14 Bionic</strong>&nbsp;hoặc&nbsp;<strong>A15 Bionic</strong>&nbsp;(giống với iPhone 12 v&agrave; iPhone 13 series của Apple).</p>\r\n\r\n<p><img alt=\"\" src=\"https://didongviet.vn/tin-tuc/wp-content/uploads/2021/10/iphone-se-3-didongviet.jpg\" style=\"height:520px; width:780px\" /></p>\r\n\r\n<p>B&ecirc;n cạnh đ&oacute;, smartphone kh&aacute;c mang t&ecirc;n iPhone SE Plus cũng nhận được kh&aacute; nhiều lời đồn đo&aacute;n. Smartphone được cho l&agrave; sở hữu m&agrave;n h&igrave;nh to hớn phi&ecirc;n bản ti&ecirc;u chuẩn d&ograve;ng SE, rơi v&agrave;o khoảng&nbsp;<strong>5.5</strong>&nbsp;hoặc&nbsp;<strong>6.1 inch</strong>.</p>\r\n\r\n<p>Tuy nhi&ecirc;n, nhằm mục đ&iacute;ch giảm thiểu tối đa chi ph&iacute; th&igrave; kh&ocirc;ng r&otilde; l&agrave; liệu Apple c&oacute; giữ lại phong c&aacute;ch thiết kế cũ với&nbsp;<strong>n&uacute;t Home</strong>&nbsp;&ldquo;huyền thoại&rdquo; tr&ecirc;n model SE mới n&agrave;y hay kh&ocirc;ng trong khi kiểu d&aacute;ng n&agrave;y dường như đ&atilde; qu&aacute; lỗi thời so với thị trường hiện nay.</p>\r\n\r\n<h3>Samsung Galaxy S22 series</h3>\r\n\r\n<p>C&oacute; nhiều tin đồn n&oacute;i về việc d&ograve;ng Samsung Galaxy S22 sẽ được ch&iacute;nh thức tr&igrave;nh l&agrave;ng v&agrave;o&nbsp;<strong>th&aacute;ng 1 năm 2022</strong>&nbsp;d&ugrave; cho h&atilde;ng vẫn chưa đưa ra bất kỳ th&ocirc;ng b&aacute;o ch&iacute;nh thức n&agrave;o về d&ograve;ng smartphone si&ecirc;u phẩm n&agrave;y.</p>\r\n\r\n<p>Theo nguồn tin, Galaxy S22 Plus v&agrave; Galaxy S22 Ultra sẽ sở hữu m&agrave;n h&igrave;nh v&agrave; kiểu d&aacute;ng&nbsp;<strong>giống với Galaxy S21 series</strong>&nbsp;nhưng được trang bị con chip hiện đại hơn. Về hiệu năng, d&ograve;ng smartphone n&agrave;y của Samsung sẽ được t&iacute;ch hợp vi xử l&yacute;&nbsp;<strong>Snapdragon</strong>&nbsp;tại hầu hết thị trường do h&atilde;ng đang gặp trục trặc trong kh&acirc;u sản xuất chip Exynos c&acirc;y nh&agrave; l&aacute; vườn.</p>\r\n\r\n<p><img alt=\"\" src=\"https://didongviet.vn/tin-tuc/wp-content/uploads/2021/10/galaxy-s22-didongviet.jpg\" style=\"height:520px; width:780px\" /></p>\r\n\r\n<p>Điểm tạo n&ecirc;n sự kh&aacute;c biệt r&otilde; rệt nhất tr&ecirc;n d&ograve;ng Galaxy S22 ch&iacute;nh l&agrave; camera. Theo một số tin đồn, camera ch&iacute;nh được trang bị tr&ecirc;n phi&ecirc;n bản S22 Ultra sẽ c&oacute; độ ph&acirc;n giải l&ecirc;n tới&nbsp;<strong>200 MP</strong>. Hơn thế nữa, ống k&iacute;nh tele cũng được n&acirc;ng cấp gi&uacute;p c&oacute; thể thay đổi &nbsp;linh hoạt khả năng thu ph&oacute;ng quang học từ&nbsp;<strong>2x đến 10x</strong>&nbsp;thay v&igrave; chỉ c&oacute; thể đổi qua lại giữa 3x hoặc 10x như bản hiện tại.</p>\r\n\r\n<h3>D&ograve;ng smartphone Google Pixel 6</h3>\r\n\r\n<p>D&ograve;ng Pixel 6 n&agrave;y được người d&ugrave;ng v&agrave; nhiều chuy&ecirc;n gia đ&aacute;nh gi&aacute; l&agrave; mẫu smartphone ấn tượng nhất trong những sản phẩm của họ v&agrave; n&oacute; dự kiến sẽ được tr&igrave;nh l&agrave;ng v&agrave;o cuối năm nay.</p>\r\n\r\n<p>B&ecirc;n cạnh thiết kế hấp dẫn, kh&aacute;c biệt với nhiều đối thủ kh&aacute;c tr&ecirc;n thị trường, d&ograve;ng Pixel 6 n&agrave;y c&ograve;n được trang bị vi xử l&yacute; mới do h&atilde;ng tự sản xuất l&agrave; Google Tensor. Về th&ocirc;ng số kỹ thuật, phi&ecirc;n bản Pro sở hữu m&agrave;n h&igrave;nh cong khoảng&nbsp;<strong>6.7 inch</strong>&nbsp;c&ugrave;ng tần số qu&eacute;t&nbsp;<strong>120 Hz</strong>. Trong khi đ&oacute;,&nbsp;<strong>Pixel 6</strong>&nbsp;chỉ c&oacute; m&agrave;n h&igrave;nh tần số qu&eacute;t&nbsp;<strong>90 Hz</strong>.</p>\r\n\r\n<p><img alt=\"\" src=\"https://didongviet.vn/tin-tuc/wp-content/uploads/2021/10/pixel-6-didongviet.jpg\" style=\"height:520px; width:780px\" /></p>\r\n\r\n<p>Ngo&agrave;i ra, điện thoại Pixel 6 Pro c&ograve;n được t&iacute;ch hợp cụm&nbsp;<strong>ba camera</strong>&nbsp;gồm c&oacute; cảm biến ch&iacute;nh, tele v&agrave; si&ecirc;u rộng. Đặc biệt l&agrave; ống k&iacute;nh tele cho khả năng&nbsp;<strong>zoom quang học 4x</strong>. Phi&ecirc;n bản ti&ecirc;u chuẩn sẽ kh&ocirc;ng sở hữu ống k&iacute;nh tele nhưng vẫn sẽ giữ hai cảm biến c&ograve;n lại.</p>\r\n\r\n<p>Ngo&agrave;i c&aacute;c th&ocirc;ng tin kh&aacute; r&otilde; r&agrave;ng tr&ecirc;n th&igrave; đa phần th&ocirc;ng tin về bộ đ&ocirc;i Pixel 6 chỉ dừng ở mức tin đồn. C&aacute;c b&aacute;o c&aacute;o cho rằng Google Pixel 6 Pro sẽ được trang bị camera ch&iacute;nh độ ph&acirc;n giải&nbsp;<strong>50 MP</strong>, camera tele&nbsp;<strong>48 MP</strong>&nbsp;c&ugrave;ng ống k&iacute;nh si&ecirc;u rộng&nbsp;<strong>12 MP</strong>. B&ecirc;n cạnh đ&oacute;, m&aacute;y c&ograve;n c&oacute; vi&ecirc;n pin dung lượng khủng&nbsp;<strong>5.000 mAh</strong>, RAM&nbsp;<strong>12 GB</strong>&nbsp;đi k&egrave;m bộ nhớ trong l&ecirc;n tới&nbsp;<strong>512 GB</strong>. Ngo&agrave;i ra, phi&ecirc;n bản Pixel 6 ti&ecirc;u chuẩn sẽ sở hữu pin&nbsp;<strong>4.614 mAh</strong>, RAM&nbsp;<strong>8 GB</strong>&nbsp;c&ugrave;ng với dung lượng l&ecirc;n tới&nbsp;<strong>256 GB</strong>.</p>\r\n\r\n<h3>Huawei P50</h3>\r\n\r\n<p>Huawei P50 thực sự đ&atilde; c&oacute; những th&ocirc;ng b&aacute;o đầu ti&ecirc;n về ng&agrave;y tr&igrave;nh l&agrave;ng nhưng đ&oacute; chỉ l&agrave; phi&ecirc;n bản d&agrave;nh cho thị trường Trung Quốc. Do đ&oacute;, c&aacute;c th&ocirc;ng tin về việc ch&iacute;nh thức ph&aacute;t h&agrave;nh smartphone n&agrave;y tr&ecirc;n to&agrave;n cầu đang rất được kỳ vọng.</p>\r\n\r\n<p>C&aacute;c th&ocirc;ng số kỹ thuật của chiếc flagship Huawei cực kỳ ấn tượng. Thiết bị P50 Pro sở hữu m&agrave;n h&igrave;nh&nbsp;<strong>OLED 6,6 inch</strong>, độ ph&acirc;n giải&nbsp;<strong>1228 x 2700 pixel</strong>&nbsp;c&ugrave;ng tần số qu&eacute;t&nbsp;<strong>120 Hz</strong>. Ngo&agrave;i ra, m&aacute;y được trang bị con chip&nbsp;<strong>Snapdragon 888</strong>&nbsp;cực khủng v&agrave; đi k&egrave;m với RAM&nbsp;<strong>12 GB</strong>, cụm&nbsp;<strong>4 camera</strong>. Hơn thế nữa, sản phẩm n&agrave;y c&ograve;n sử hữu vi&ecirc;n pin dung lượng&nbsp;<strong>4.360 mAh</strong>&nbsp;v&agrave; được hỗ trợ c&ocirc;ng nghệ sạc nhanh l&ecirc;n đến&nbsp;<strong>66W</strong>.</p>\r\n\r\n<p><img alt=\"\" src=\"https://didongviet.vn/tin-tuc/wp-content/uploads/2021/10/huawei-p50-didongviet.jpg\" style=\"height:520px; width:780px\" /></p>\r\n\r\n<p>Tuy nhi&ecirc;n, P50 Pro c&oacute; một thiệt th&ograve;i kh&ocirc;ng hề nhỏ l&agrave; phải d&ugrave;ng hệ điều h&agrave;nh tự sản xuất&nbsp;<strong>HarmonyOS 2</strong>&nbsp;thay v&igrave; Android 12 mới nhất do đang chịu lệnh cấm vận của Mỹ. B&ecirc;n cạnh đ&oacute;, c&ocirc;ng nghệ 5G cũng kh&ocirc;ng được xuất hiện tr&ecirc;n d&ograve;ng sản phẩm n&agrave;y.</p>\r\n\r\n<h3>Smartphone Nokia 10</h3>\r\n\r\n<p>Nokia 10 hiện đ&atilde; c&oacute; nhiều th&ocirc;ng tin về ng&agrave;y ra mắt từ kh&aacute; l&acirc;u. Chiếc smartphone n&agrave;y ban đầu mang t&ecirc;n Nokia 9.1, tiếp theo lại được đổi th&agrave;nh 9.2, 9.3 rồi cuối c&ugrave;ng được chốt hạ với t&ecirc;n hiện tại. Hơn thế nữa, một nguồn tin cho rằng l&agrave;&nbsp;<strong>X60</strong>&nbsp;mới l&agrave; t&ecirc;n gọi ch&iacute;nh thức của thiết bị n&agrave;y nếu dựa theo kiểu đặt t&ecirc;n mới đến từ Nokia.</p>\r\n\r\n<p><img alt=\"\" src=\"https://didongviet.vn/tin-tuc/wp-content/uploads/2021/10/nokia-10-didongviet.jpg\" style=\"height:520px; width:780px\" /></p>\r\n\r\n<p>Trong khi người d&ugrave;ng vẫn đang hoang mang về t&ecirc;n gọi ch&iacute;nh thức của d&ograve;ng sản phẩm n&agrave;y th&igrave; một gi&aacute;m đốc điều h&agrave;nh của h&atilde;ng cho hay c&oacute; thể điện thoại flagship n&agrave;y sẽ được c&ocirc;ng bố tr&ecirc;n to&agrave;n cầu v&agrave;o&nbsp;<strong>th&aacute;ng 11</strong>&nbsp;sắp tới.</p>\r\n\r\n<p>Dựa tr&ecirc;n c&aacute;c tin đồn, Nokia 10 c&oacute; khả năng cao l&agrave; mẫu flagship mới tiếp theo đến từ Nokia với camera&nbsp;<strong>ẩn b&ecirc;n dưới m&agrave;n h&igrave;nh</strong>, camera ch&iacute;nh độ ph&acirc;n giải&nbsp;<strong>108 MP</strong>&nbsp;hoặc thậm ch&iacute; l&agrave;&nbsp;<strong>200 MP</strong>. B&ecirc;n cạnh đ&oacute;, m&aacute;y cũng sở hữu vi&ecirc;n pin&nbsp;<strong>6.000 mAh</strong>&nbsp;c&ugrave;ng m&agrave;n h&igrave;nh l&agrave;m bằng k&iacute;nh sapphire với tần số qu&eacute;t&nbsp;<strong>144 Hz</strong>.</p>\r\n\r\n<p>Nguồn:&nbsp;<a href=\"https://www.techradar.com/news/upcoming-phones\" target=\"_blank\">TechRadar</a></p>\r\n', 'pixel-6-didongviet1638805436.jpg', 9),
(11, '24h công nghệ có gì HOT 6/12: Tablet màn hình 2K giá dưới 4 triệu, Xiaomi 12 thiếu tính năng thời thượng có trên MIX 4', '<h3>1.&nbsp;Tablet mới ra mắt n&agrave;y c&oacute; m&agrave;n h&igrave;nh 2K m&agrave; gi&aacute; rất rẻ</h3>\r\n\r\n<h3>Sau mẫu&nbsp;<a href=\"https://www.thegioididong.com/may-tinh-bang\" target=\"_blank\">tablet</a>&nbsp;Blackview Tab 10 ra mắt từ hồi th&aacute;ng 6 năm nay, Blackview đ&atilde; giới thiệu Blackview Tab 11 - chiếc tablet mạnh mẽ nhất của h&atilde;ng ở thời điểm hiện tại. Tr&ecirc;n thực tế Tab 11 sở hữu rất nhiều trang bị v&agrave; t&iacute;nh năng nổi bật, như m&agrave;n h&igrave;nh 2K sắc n&eacute;t v&agrave; hệ thống camera Sony chất lượng.</h3>\r\n\r\n<p><img alt=\"Blackview ra mắt máy tính bảng hàng đầu - Tab 11\" src=\"https://cdn.tgdd.vn/Files/2021/12/05/1402382/blackview-tab-11-2_1280x720-800-resize.jpg\" /></p>\r\n\r\n<p>Xem tiếp:&nbsp;<a href=\"https://www.thegioididong.com/tin-tuc/blackview-ra-mat-may-tinh-bang-hang-dau-tab-11-1402382\" target=\"_blank\">Chiếc tablet mới n&agrave;y c&oacute; m&agrave;n h&igrave;nh 2K, camera Sony, gi&aacute; chưa đến 4 triệu</a></p>\r\n\r\n<h3>2.&nbsp;Xiaomi 12 series thiếu một t&iacute;nh năng thời thượng c&oacute; tr&ecirc;n MIX 4</h3>\r\n\r\n<p><img alt=\"Xiaomi 12 series được cho là không dùng camera ẩn dưới màn hình\" src=\"https://cdn.tgdd.vn/Files/2021/12/05/1402373/xiaomi-under-display-camera_1280x720-800-resize.jpg\" /></p>\r\n\r\n<p>Xiaomi&nbsp;dự kiến ​​sẽ ra mắt&nbsp;<a href=\"https://www.thegioididong.com/dtdd/xiaomi-mi-12\" target=\"_blank\">Xiaomi 12</a>&nbsp;series v&agrave;o cuối th&aacute;ng 12 năm nay. C&oacute; nhiều tin đồn cho rằng d&ograve;ng&nbsp;smartphone&nbsp;n&agrave;y sẽ ra mắt v&agrave;o ng&agrave;y 28/12 bao gồm ba phi&ecirc;n bản: Xiaomi 12,&nbsp;<a href=\"https://www.thegioididong.com/dtdd/xiaomi-12x\" target=\"_blank\">Xiaomi 12X</a>&nbsp;v&agrave;&nbsp;<a href=\"https://www.thegioididong.com/dtdd/xiaomi-12x-pro\" target=\"_blank\">Xiaomi 12 Pro</a>. B&acirc;y giờ, trước thời điểm tr&igrave;nh l&agrave;ng, th&ocirc;ng tin về camera của&nbsp;Xiaomi 12 series đ&atilde; bị r&ograve; rỉ.</p>\r\n\r\n<p>Xem tiếp:&nbsp;<a href=\"https://www.thegioididong.com/tin-tuc/xiaomi-12-series-khong-duoc-trang-bi-camera-an-duoi-man-hinh-1402373\" target=\"_blank\">Xiaomi 12 series thiếu 1 t&iacute;nh năng thời thượng c&oacute; tr&ecirc;n MIX 4 nhưng...</a></p>\r\n\r\n<h3>3.&nbsp;T&igrave;nh trạng thiếu chip sẽ k&eacute;o d&agrave;i bao l&acirc;u?</h3>\r\n\r\n<p><img alt=\"Chủ tịch kiêm CEO Qualcomm - Cristiano Amon\" src=\"https://cdn.tgdd.vn/Files/2021/12/05/1402434/cristiano-amon-qualcomm_1280x720-800-resize.jpg\" /></p>\r\n\r\n<p>Kể từ khi đại dịch COVID-19 b&ugrave;ng ph&aacute;t v&agrave;o năm 2020, chuỗi cung ứng lu&ocirc;n bị thiếu hụt v&agrave; kh&oacute; l&ograve;ng sản xuất c&aacute;c bộ phận đ&uacute;ng tiến độ cũng như đủ số lượng. Vậy t&igrave;nh trạng thiếu chip sẽ c&ograve;n k&eacute;o d&agrave;i bao l&acirc;u nữa? Ch&uacute;ng ta h&atilde;y c&ugrave;ng nghe c&aacute;c chuy&ecirc;n gia trong ng&agrave;nh dự đo&aacute;n.</p>\r\n\r\n<p>Xem tiếp:&nbsp;<a href=\"https://www.thegioididong.com/tin-tuc/tinh-trang-thieu-chip-se-keo-dai-bao-lau-1402434\" target=\"_blank\">T&igrave;nh trạng thiếu chip sẽ k&eacute;o d&agrave;i bao l&acirc;u? CEO Qualcomm dự đo&aacute;n rằng...</a></p>\r\n\r\n<h3>4.&nbsp;Tr&ecirc;n tay OPPO A16K</h3>\r\n\r\n<p><img alt=\"OPPO A16K\" src=\"https://cdn.tgdd.vn/Files/2021/12/01/1401676/oppoa16k-32_1280x718-800-resize.jpg\" /></p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/dtdd/oppo-a16k\" target=\"_blank\">OPPO A16K</a>&nbsp;cho cảm gi&aacute;c cầm nắm rất thoải m&aacute;i do m&aacute;y chỉ d&agrave;y 7.85 mm v&agrave; khối lượng l&agrave; 175 gram. Ở c&aacute;c g&oacute;c của m&aacute;y cũng được bo tr&ograve;n v&agrave; hơi cong n&ecirc;n khi cầm m&igrave;nh c&oacute; cảm gi&aacute;c cực kỳ thoải m&aacute;i v&agrave; kh&aacute; chắc chắn d&ugrave; m&igrave;nh c&oacute; d&ugrave;ng bằng một tay.</p>\r\n', 'blackview-tab-11-2_1280x720-800-resize1638805851.jpg', 10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id_product` int(11) UNSIGNED NOT NULL,
  `title_product` varchar(100) NOT NULL,
  `price_product` varchar(100) NOT NULL,
  `desc_product` text NOT NULL,
  `quantity_product` int(11) NOT NULL,
  `image_product` varchar(100) NOT NULL,
  `id_category_product` int(11) UNSIGNED NOT NULL,
  `product_hot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_product`
--

INSERT INTO `tbl_product` (`id_product`, `title_product`, `price_product`, `desc_product`, `quantity_product`, `image_product`, `id_category_product`, `product_hot`) VALUES
(32, 'iPhone 13 256 GB', '25000000', '<p>iPhone 13 Chưa Active Bảo H&agrave;nh 12 Th&aacute;ng</p>\r\n\r\n<p>(H&agrave;ng Nhập Khẩu LL/A)</p>\r\n', 222, 'iphone-13-pink-select-2021-768x9091638775119.png', 48, 1),
(33, 'Iphone 12 tím', '15000000', '<p>M&agrave;u t&iacute;m bắt mắt</p>\r\n\r\n<p>M&agrave;n h&igrave;nh Super Retina</p>\r\n\r\n<p>Ceramic Shield</p>\r\n', 32, 'iphone_12 tim1638775658.jpg', 48, 1),
(34, 'iPhone 11 64GB (Likenew)', '12000111', '<p>Hệ điều h&agrave;nh: iOS 13</p>\r\n\r\n<p>Chipset (h&atilde;ng SX CPU):&nbsp;Apple A13 Bionic</p>\r\n\r\n<p>Tốc độ CPU: Hexa-core</p>\r\n\r\n<p>RAM: 4 GB</p>\r\n\r\n<p>Bộ nhớ trong: 64 GB</p>\r\n', 222, 'apple-iphone-11-tim-didongviet_51638775936.jpg', 48, 0),
(35, 'Oppo A37 - Oppo Neo9', '990000', '<p>Oppo Neo9 2sim mới 99 %</p>\r\n\r\n<p>Camera&nbsp;cảm biến 1/4 inch</p>\r\n\r\n<p>M&agrave;n h&igrave;nh: IPS LCD, 5&quot;, HD</p>\r\n\r\n<p>Hệ điều h&agrave;nh: Android 5.1 (Lollipop)</p>\r\n', 222, 'oppo a371638776215.jfif', 45, 0),
(37, 'Samsung galaxy A22 5G', '5690000', '<p>Độ ph&acirc;n giải: HD+ (720 x 1600 Pixels)</p>\r\n\r\n<p>M&agrave;n h&igrave;nh rộng: 6.4&quot; - Tần số qu&eacute;t 90 Hz</p>\r\n\r\n<p>Độ s&aacute;ng tối đa: 600 nits</p>\r\n\r\n<p>Mặt k&iacute;nh cảm ứng: K&iacute;nh cường lực Corning Gorilla Glass 5</p>\r\n', 32, 'samsung galaxy a22 5g1638776934.jfif', 46, 1),
(38, 'Samsung Galaxy M02', '1252815', '<p>M&agrave;n h&igrave;nh: PLS LCD6.5&quot;HD+</p>\r\n\r\n<p>Hệ điều h&agrave;nh: Android 10</p>\r\n\r\n<p>Chip: MediaTek MT6739W</p>\r\n\r\n<p>RAM: 3 GB</p>\r\n\r\n<p>Bộ nhớ trong: 32 GB</p>\r\n', 32, 'galaxy M021638777935.jfif', 46, 1),
(39, 'Samsung Galaxy A20 E', '2000000', '<p>Thương hiệu: Samsung</p>\r\n\r\n<p>Dung lượng pin 3000mAh</p>\r\n\r\n<p>Bộ xử l&yacute; Exynos 7884 8 nh&acirc;n</p>\r\n\r\n<p>RAM 3GB</p>\r\n\r\n<p>Dung lượng lưu trữ 32GB</p>\r\n', 10, 'galaxya20e1638778091.jfif', 46, 1),
(40, 'Laptop MSI Gaming Pulse', '32290000', '<p>CPU: i711800H2.30 GHz</p>\r\n\r\n<p>RAM: 16 GBDDR4 2 khe (1 khe 8GB + 1 khe 8GB)3200 MHz</p>\r\n\r\n<p>Ổ cứng: 512 GB SSD NVMe PCIe&nbsp;</p>\r\n\r\n<p>M&agrave;n h&igrave;nh: 15.6&quot;Full HD (1920 x 1080)144Hz</p>\r\n\r\n<p>Card m&agrave;n h&igrave;nh: Card rờiRTX 3050Ti 4GB</p>\r\n', 222, 'msi-gaming-pulse-gl66-11udk-i7-816vn-051121-023122-600x6001638778312.jpg', 47, 1),
(41, 'Samsung Galaxy S21', '30990999', '<p>Chipset: Exynos 2100&nbsp;</p>\r\n\r\n<p>RAM: 12 GB</p>\r\n\r\n<p>Bộ nhớ trong: 128 GB</p>\r\n\r\n<p>C&ocirc;̉ng k&ecirc;́t n&ocirc;́i/sạc: USB Type-C</p>\r\n\r\n<p>Dung lượng pin: 5.000 mAh, hỗ trợ sạc nhanh</p>\r\n', 10, 'galaxys211638780203.jfif', 46, 1),
(42, 'SAMSUNG NOTE 20', '15989555', '<p>Bộ nhớ khả dụng (GB) *: 221.7</p>\r\n\r\n<p>RAM (GB): 8 ROM (GB): 256</p>\r\n\r\n<p>Loại CPU: 8 nh&acirc;nTốc độ</p>\r\n\r\n<p>CPU: 2.73GHz, 2.5GHz, 2GHz</p>\r\n', 222, 'vn-galaxy-note20-n980-sm-n980fzngxxv-frontmysticbronze-3208136711638780451.webp', 46, 0),
(43, 'Samsung Galaxy S8', '2497000', '<p>Dung lượng pin 3000mAh</p>\r\n\r\n<p>Bộ xử l&yacute; Exynos 8895 8 nh&acirc;n</p>\r\n\r\n<p>RAM 4GB</p>\r\n\r\n<p>Dung lượng lưu trữ 64GB</p>\r\n', 10, 'ss galaxys81638780672.jfif', 46, 0),
(44, 'Samsung Galaxy Note 8', '3398000', '<p>Dung lượng pin 35000mAh</p>\r\n\r\n<p>Loại bảo h&agrave;nh Bảo h&agrave;nh nh&agrave; cung cấp</p>\r\n\r\n<p>Bộ xử l&yacute; Exynos 8895 8 nh&acirc;n 64-bit</p>\r\n\r\n<p>RAM 6GB</p>\r\n\r\n<p>Dung lượng lưu trữ 64GB</p>\r\n', 222, 'galaxy note 81638780998.jfif', 46, 0),
(45, 'Samsung Galaxy S9 Plus', '3390000', '<p>Dung lượng pin 3500mAh</p>\r\n\r\n<p>Loại bảo h&agrave;nh Bảo h&agrave;nh nh&agrave; cung cấp</p>\r\n\r\n<p>T&igrave;nh trạng T&acirc;n trang lại</p>\r\n\r\n<p>Bộ xử l&yacute; Exynos 9810 8 nh&acirc;n</p>\r\n\r\n<p>RAM 6GB</p>\r\n\r\n<p>Dung lượng lưu trữ 64GB</p>\r\n', 10, 'galaxy note 91638781274.jfif', 46, 0),
(46, 'iPhone 13 Pro Max 256GB', '34490000', '<p>A15 Bionic chip</p>\r\n\r\n<p>Ram 6GB</p>\r\n\r\n<p>Super Retina XDR display with ProMotion</p>\r\n\r\n<p>6.7‑inch (diagonal) all‑screen OLED display<br />\r\n2778‑by‑1284-pixel resolution at 458 ppi</p>\r\n', 10, 'techzones-iphone-13-pro-max-21638781501.jfif', 48, 0),
(47, 'IPhone 12 Pro Max 128GB', '33990000', '<p>K&iacute;ch thước m&agrave;n h&igrave;nh: 6.7 inch</p>\r\n\r\n<p>Bộ nhớ trong: 128 GB</p>\r\n\r\n<p>Độ ph&acirc;n giải m&agrave;n h&igrave;nh:&nbsp;1284 x 2778</p>\r\n', 10, 'avt-iphone-12-pro-graphite1638782174.png', 48, 0),
(48, ' iPhone 13 Pro Max 512GB', '45090000', '<p><strong>C&ocirc;ng nghệ m&agrave;n h&igrave;nh:</strong>&nbsp;OLED</p>\r\n\r\n<p><strong>Độ ph&acirc;n giải:</strong>&nbsp;1284 x 2778 Pixels, 3 camera 12 MP, 12 MP</p>\r\n\r\n<p><strong>Hệ điều h&agrave;nh:</strong>&nbsp;iOS 15</p>\r\n\r\n<p><strong>Chip xử l&yacute; (CPU):</strong>&nbsp;Apple A15 Bionic 6 nh&acirc;n</p>\r\n\r\n<p><strong>Bộ nhớ trong (ROM):</strong>&nbsp;512 GB</p>\r\n\r\n<p><strong>RAM:</strong>&nbsp;6 GB</p>\r\n\r\n<p>&nbsp;</p>\r\n', 222, '13promax 512GB1638782522.jfif', 48, 1),
(49, ' iPhone 13 Pro Max 128GB', '32990000', '<p>K&iacute;ch thước m&agrave;n h&igrave;nh: 6.7 &iacute;nches</p>\r\n\r\n<p>C&ocirc;ng nghệ m&agrave;n h&igrave;nh:&nbsp;OLED</p>\r\n\r\n<p>Camera g&oacute;c rộng: 12MP, &fnof;/1.5<br />\r\nCamera g&oacute;c si&ecirc;u rộng: 12MP, &fnof;/1.8<br />\r\nCamera tele : 12MP, /2.8</p>\r\n', 222, 'ip 13promax 128GB1638783095.jfif', 48, 0),
(50, 'iPhone 13 512GB', '25000000', '<p>GPU: Apple GPU 5 nh&acirc;n<br />\r\nChipset:&nbsp;Apple A14 Bionic (5 nm+)<br />\r\nRAM: 8GB<br />\r\nBộ nhớ trong: 512GB&nbsp;<br />\r\nThẻ SIM: 2&nbsp;Sim (Nano-Sim)<br />\r\nDung lượng pin: mAh</p>\r\n', 10, 'ip13 512gb1638783593.jfif', 48, 0),
(51, 'iPhone 11 Pro Max 512GB', '24555999', '<p>M&agrave;n h&igrave;nh:&nbsp;OLED6.5&quot;Super Retina XDR</p>\r\n\r\n<p>Hệ điều h&agrave;nh:&nbsp;iOS 14</p>\r\n\r\n<p>Chip:&nbsp;Apple A13 Bionic</p>\r\n\r\n<p>RAM:4 GB</p>\r\n\r\n<p>Bộ nhớ trong:&nbsp;&nbsp;512 GB</p>\r\n', 222, 'ip11 promax1638783907.jfif', 48, 0),
(52, 'Laptop MSI Katana Gaming', '28290000', '<p>CPU: i711800H2.30 GHz</p>\r\n\r\n<p>RAM:&nbsp;8 GBDDR4 2 khe (1 khe 8GB + 1 khe rời)3200 MHz</p>\r\n\r\n<p>Ổ cứng:&nbsp;512 GB SSD NVMe PCIeKh&ocirc;ng hỗ trợ khe cắm SSD</p>\r\n', 10, 'Laptop MSI Katana Gaming1638784146.jpg', 47, 0),
(53, 'Laptop GIGABYTE Gaming', '27990000', '<p>CPU:&nbsp;i510500H2.5GHz</p>\r\n\r\n<p>RAM:&nbsp;16 GBDDR4 2 khe (1 khe 8GB + 1 khe 8GB)3200 MHz</p>\r\n\r\n<p>Ổ cứng:&nbsp;Hỗ trợ khe cắm HDD SATA&nbsp; Hỗ trợ th&ecirc;m 1 khe cắm SSD M.2 PCIe mở rộng 512 GB SSD NVMe PCIe</p>\r\n', 222, 'Laptop GIGABYTE Gaming1638784361.jpg', 47, 0),
(54, 'Laptop Dell N5570 i7', '16600000', '<p>CPU:Intel Core i7 _8550U Processor (1.80 GHz, 6M Cache, up to 4.00 GHz)</p>\r\n\r\n<p>RAM: 8Gb DDR4 2400 MHz,2 Slots</p>\r\n\r\n<p>Ổ cứng: 256GB SSD</p>\r\n\r\n<p>M&agrave;n h&igrave;nh: 15.6 inch Full HD (1920 x 1080) TrueLife LED-Backlit Display</p>\r\n', 222, 'Laptop Dell N5570 i71638802169.png', 47, 1),
(55, 'Laptop Dell Vostro V5490 i3', '12990000', '<p>Bộ vi xử l&yacute;: Intel Core i3-10110U (2.1Ghz upto 4.10GHz, 2 Cores, 4 Threads, 4MB Cache)RAM: 4GB DDR4 2666Mhz</p>\r\n\r\n<p>Ổ cứng: SSD 256GB</p>\r\n\r\n<p>Card đồ họa: UHD Graphics 620</p>\r\n\r\n<p>M&agrave;n h&igrave;nh: 14 inch FHD (1920x1080 pixels) + IPS</p>\r\n', 32, 'Dell Vostro V5490 i31638802388.png', 47, 0),
(56, 'Laptop Upler Lim', '4820480464', '<p>model i8 notebook slim 15.6inch 8GB 128GB SSD business camera</p>\r\n\r\n<p>Customized logo（Min.Order:&nbsp;500&nbsp;Pieces）</p>\r\n\r\n<p>Customized packaging（Min.Order:&nbsp;1000&nbsp;Pieces）</p>\r\n', 10, 'Laptop Upler Lim1638802824.png', 47, 1),
(57, 'Điện thoại OPPO A53', '4229000', '<p>M&agrave;n h&igrave;nh:&nbsp;IPS LCD, HD+ (720 x 1600 Pixels), 6.5&quot;</p>\r\n\r\n<p>Hệ điều h&agrave;nh:&nbsp;Android 10</p>\r\n\r\n<p>CPU:&nbsp;Snapdragon 460 8 nh&acirc;n</p>\r\n\r\n<p>RAM: 4GB</p>\r\n\r\n<p>ROM: 128 GB</p>\r\n', 32, 'OPPO A531638803597.png', 45, 0),
(58, 'OPPO Find X2 Pro', '19990000', '<p>M&agrave;n H&igrave;nh 2K 120Hz&nbsp;</p>\r\n\r\n<p>RAM 12GB + ROM 512GB&nbsp;</p>\r\n\r\n<p>Si&ecirc;u Sạc Nhanh 65W</p>\r\n', 222, 'Find X2 Pro-navigation-Black-v21638804122.png', 45, 0),
(59, 'Điện thoại OPPO Reno6 5G', '11590000', '<p>C&ocirc;ng nghệ m&agrave;n h&igrave;nh:&nbsp;AMOLED</p>\r\n\r\n<p>Độ ph&acirc;n giải:&nbsp;Full HD+, Ch&iacute;nh 64 MP &amp; Phụ 8 MP, 2 MP, 32 MP</p>\r\n\r\n<p>M&agrave;n h&igrave;nh rộng:&nbsp;6.43&quot;</p>\r\n\r\n<p>Hệ điều h&agrave;nh:&nbsp;Android 11</p>\r\n\r\n<p>Chip xử l&yacute; (CPU):&nbsp;MediaTek Dimensity 900 5G</p>\r\n\r\n<p>Bộ nhớ trong (ROM):&nbsp;128GB&nbsp;RAM:&nbsp;8GB</p>\r\n', 222, 'OPPO Reno6 5G1638804289.png', 45, 0),
(60, 'OPPO Find X3 Pro 5G', '26990000', '<p>M&agrave;n h&igrave;nh: AMOLED6.7&quot;Quad HD+ (2K+)</p>\r\n\r\n<p>Hệ điều h&agrave;nh: Android 11</p>\r\n\r\n<p>Camera sau: Ch&iacute;nh 50 MP &amp; Phụ 50 MP, 13 MP, 3 MP</p>\r\n\r\n<p>Camera trước: 32 MP</p>\r\n\r\n<p>Chip: Snapdragon 888</p>\r\n\r\n<p>RAM: 12 GB Bộ nhớ trong: 256 GB</p>\r\n', 10, 'OPPO Find X3 Pro 5G1638804505.png', 45, 1),
(61, 'Samsung Galaxy Z Flip', '24990000', '<p>M&agrave;n h&igrave;nh ch&iacute;nh: 6.7&rdquo;, M&agrave;n h&igrave;nh phụ: 1.9&rdquo;, FHD+, Ch&iacute;nh: Dynamic AMOLED, phụ: Super AMOLED, 1080 x 2636 Pixel</p>\r\n\r\n<p>RAM: 8GB ROM:128GB</p>\r\n\r\n<p>CPU:&nbsp;Snapdragon 888</p>\r\n\r\n<p>Hệ điều h&agrave;nh:&nbsp;Android 11</p>\r\n', 5, 'Samsung Galaxy Z Flip1638805176.jfif', 46, 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Chỉ mục cho bảng `tbl_category_post`
--
ALTER TABLE `tbl_category_post`
  ADD PRIMARY KEY (`id_category_post`);

--
-- Chỉ mục cho bảng `tbl_category_product`
--
ALTER TABLE `tbl_category_product`
  ADD PRIMARY KEY (`id_category_product`);

--
-- Chỉ mục cho bảng `tbl_customers`
--
ALTER TABLE `tbl_customers`
  ADD PRIMARY KEY (`customers_id`);

--
-- Chỉ mục cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_code`);

--
-- Chỉ mục cho bảng `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  ADD PRIMARY KEY (`order_details_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `order_code` (`order_code`);

--
-- Chỉ mục cho bảng `tbl_post`
--
ALTER TABLE `tbl_post`
  ADD PRIMARY KEY (`id_post`),
  ADD KEY `id_category_post` (`id_category_post`);

--
-- Chỉ mục cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `id_category_product` (`id_category_product`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tbl_category_post`
--
ALTER TABLE `tbl_category_post`
  MODIFY `id_category_post` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `tbl_category_product`
--
ALTER TABLE `tbl_category_product`
  MODIFY `id_category_product` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT cho bảng `tbl_customers`
--
ALTER TABLE `tbl_customers`
  MODIFY `customers_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT cho bảng `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  MODIFY `order_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT cho bảng `tbl_post`
--
ALTER TABLE `tbl_post`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id_product` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  ADD CONSTRAINT `tbl_order_details_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `tbl_product` (`id_product`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_order_details_ibfk_2` FOREIGN KEY (`order_code`) REFERENCES `tbl_order` (`order_code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_post`
--
ALTER TABLE `tbl_post`
  ADD CONSTRAINT `tbl_post_ibfk_1` FOREIGN KEY (`id_category_post`) REFERENCES `tbl_category_post` (`id_category_post`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD CONSTRAINT `tbl_product_ibfk_1` FOREIGN KEY (`id_category_product`) REFERENCES `tbl_category_product` (`id_category_product`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
