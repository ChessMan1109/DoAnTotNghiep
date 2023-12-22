-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 10, 2023 lúc 03:05 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `good_phone`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `ID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `imageCaterogy` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`ID`, `Name`, `imageCaterogy`) VALUES
(31, 'Điện thoại Iphone', ''),
(32, 'Điện thoại Xiaomi', ''),
(33, 'Điện thoại Samsung', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `ID` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `OrderDate` date DEFAULT NULL,
  `TotalPrice` decimal(10,2) DEFAULT NULL,
  `Status` varchar(50) DEFAULT NULL,
  `CustomerName` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Phone` varchar(20) NOT NULL,
  `Email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_items`
--

CREATE TABLE `order_items` (
  `ID` int(11) NOT NULL,
  `OrderID` int(11) DEFAULT NULL,
  `PhoneID` int(11) DEFAULT NULL,
  `PhoneName` varchar(255) NOT NULL,
  `PhonePrice` decimal(10,2) NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phones`
--

CREATE TABLE `phones` (
  `ID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Color` varchar(100) NOT NULL,
  `Description` text NOT NULL,
  `Price` decimal(10,2) NOT NULL,
  `CategoryID` int(11) NOT NULL,
  `images_phone` varchar(200) NOT NULL,
  `Discount` decimal(10,2) DEFAULT 0.00,
  `CreatedAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phones`
--

INSERT INTO `phones` (`ID`, `Name`, `Color`, `Description`, `Price`, `CategoryID`, `images_phone`, `Discount`, `CreatedAt`) VALUES
(51, 'Điện thoại iPhone 15 Pro Max 1TB', 'Titan xanh lá', 'Trong thế giới công nghệ ngày càng phát triển, iPhone 15 Pro Max 1 TB nổi bật như một điện thoại thông minh hoàn hảo, kết hợp sự mạnh mẽ của công nghệ và sự sáng tạo không giới hạn. Chiếc điện thoại này không chỉ đem lại hiệu năng vượt trội mà còn mang đến khả năng chụp ảnh xuất sắc, tạo nên một trải nghiệm hoàn hảo cho người dùng.', 46990000.00, 31, '', 500000.00, '2023-11-01 12:19:22'),
(52, 'Điện thoại iPhone 14 Pro 128GB', 'Vàng', 'iPhone 14 Pro 128GB - Mẫu smartphone đến từ nhà Apple được mong đợi nhất năm 2022, lần này nhà Táo mang đến cho chúng ta một phiên bản với kiểu thiết kế hình notch mới, cấu hình mạnh mẽ nhờ con chip Apple A16 Bionic và cụm camera có độ phân giải được nâng cấp lên đến 48 MP.', 24390000.00, 31, '', 400000.00, '2023-11-01 12:59:12'),
(53, 'Điện thoại iPhone 13 128GB', 'Hồng', 'Trong khi sức hút đến từ bộ 4 phiên bản iPhone 12 vẫn chưa nguội đi, thì hãng điện thoại Apple đã mang đến cho người dùng một siêu phẩm mới iPhone 13 với nhiều cải tiến thú vị sẽ mang lại những trải nghiệm hấp dẫn nhất cho người dùng.', 16690000.00, 31, '', 600000.00, '2023-11-01 13:00:50'),
(54, 'Điện thoại iPhone 12 64GB', 'Tím', 'Trong những tháng cuối năm 2020, Apple đã chính thức giới thiệu đến người dùng cũng như iFan thế hệ iPhone 12 series mới với hàng loạt tính năng bứt phá, thiết kế được lột xác hoàn toàn, hiệu năng đầy mạnh mẽ và một trong số đó chính là iPhone 12 64GB.', 15490000.00, 31, '', 800000.00, '2023-11-01 13:02:05'),
(55, 'Điện thoại iPhone 11 64GB', 'Trắng', 'Apple đã chính thức trình làng bộ 3 siêu phẩm iPhone 11, trong đó phiên bản iPhone 11 64GB có mức giá rẻ nhất nhưng vẫn được nâng cấp mạnh mẽ như iPhone Xr ra mắt trước đó.', 10890000.00, 31, '', 300000.00, '2023-11-01 13:03:14'),
(56, 'Điện thoại Xiaomi 13T 5G 8GB', 'Xanh dương', 'Xiaomi 13T 5G là một thiết bị độc đáo được ra mắt tại thị trường Việt Nam vào tháng 09/2023. Sản phẩm này đang thu hút sự chú ý lớn từ cộng đồng người dùng, đặc biệt là những người yêu nhiếp ảnh và đang tìm kiếm một trải nghiệm độc đáo với camera nhờ sự hợp tác với Leica, một trong những thương hiệu sản xuất máy ảnh hàng đầu.', 10990000.00, 32, '', 500000.00, '2023-11-01 13:05:50'),
(57, 'Điện thoại Xiaomi 13T Pro 5G', 'Xanh lá', 'Xiaomi 13T Pro 5G là mẫu máy thuộc phân khúc tầm trung đáng chú ý tại thị trường Việt Nam. Điện thoại ấn tượng nhờ được trang bị chip Dimensity 9200+, camera 50 MP có kèm sự hợp tác với Leica cùng kiểu thiết kế tinh tế đầy sang trọng.', 14990000.00, 32, '', 900000.00, '2023-11-01 13:07:22'),
(58, 'Điện thoại Xiaomi Redmi Note 12 (8GB/256GB) ', 'Vàng', 'Redmi Note 12 8GB/256GB - chiếc điện thoại tầm trung mới của hãng điện thoại thông minh Xiaomi được giới thiệu tại Việt Nam. Với vi xử lý Snapdragon 685 mạnh mẽ và camera 50 MP chất lượng cao, chiếc điện thoại này đã thu hút sự chú ý của người dùng trong phân khúc của mình.', 5790000.00, 32, '', 600000.00, '2023-11-01 13:09:02'),
(59, 'Điện thoại Xiaomi Redmi Note 12 Pro 128GB', 'Xanh dương', 'Xiaomi Redmi Note 12 Pro 4G tiếp tục sẽ là mẫu điện thoại tầm trung được nhà Xiaomi giới thiệu đến thị trường Việt Nam trong năm 2023, máy nổi bật với camera 108 MP chất lượng, thiết kế viền mỏng cùng hiệu năng đột phá nhờ trang bị chip Snapdragon 732G.', 6590000.00, 32, '', 300000.00, '2023-11-01 13:10:14'),
(60, 'Điện thoại Xiaomi 12 5G', 'Xám', 'Điện thoại Xiaomi đang dần khẳng định chỗ đứng của mình trong phân khúc flagship bằng việc ra mắt Xiaomi 12 với bộ thông số ấn tượng, máy có một thiết kế gọn gàng, hiệu năng mạnh mẽ, màn hình hiển thị chi tiết cùng khả năng chụp ảnh sắc nét nhờ trang bị ống kính đến từ Sony.', 9990000.00, 32, '', 200000.00, '2023-11-01 13:12:28'),
(61, 'Điện thoại iPhone 15 Pro Max 512GB', 'Titan đen', 'Vào tháng 09/2023, cuối cùng Apple cũng đã chính thức giới thiệu iPhone 15 Pro Max 512 GB tại sự kiện ra mắt thường niên với nhiều điểm đáng chú ý, nổi bật trong số đó có thể kể đến như sự góp mặt của chipset Apple A17 Pro có trên máy, thiết kế khung titan hay cổng Type-C lần đầu có mặt trên điện thoại iPhone.', 40490000.00, 31, '', 500000.00, '2023-11-01 13:14:36'),
(62, 'Điện thoại iPhone 15 Plus 128GB', 'Xanh dương nhạt', 'iPhone 15 Plus thu hút mọi ánh nhìn ngay khi ra mắt nhờ có vẻ ngoài cao cấp, trang bị bộ xử lý mạnh mẽ, cụm camera kép đặc trưng cho khả năng chụp ảnh cực nét cùng màn hình chất lượng cao, để bạn tận hưởng trải nghiệm sử dụng tuyệt vời.', 25490000.00, 31, '', 300000.00, '2023-11-01 13:16:13');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phones_images`
--

CREATE TABLE `phones_images` (
  `ID` int(11) NOT NULL,
  `PhoneID` int(11) NOT NULL,
  `ImageURL` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phones_images`
--

INSERT INTO `phones_images` (`ID`, `PhoneID`, `ImageURL`) VALUES
(90, 52, '../uploads/iphone-14-pro-vang-thumb-600x600.jpg'),
(91, 53, '../uploads/iphone-13-pink-2-600x600.jpg'),
(92, 54, '../uploads/iphone-12-tim-1-600x600.jpg'),
(93, 55, '../uploads/iphone-11-trang-600x600.jpg'),
(94, 56, '../uploads/xiaomi-13-t-xanh-duong-thumb-thumb-600x600.jpg'),
(95, 57, '../uploads/xiaomi-13t-pro-xanh-thumb-600x600.jpg'),
(96, 58, '../uploads/xiaomi-redmi-note-12-vang-1-thumb-momo-600x600.jpg'),
(97, 59, '../uploads/xiaomi-redmi-12-pro-4g-xanh-thumb-600x600.jpg'),
(98, 60, '../uploads/Xiaomi-12-xam-thumb-mau-600x600.jpg'),
(99, 61, '../uploads/iphone-15-pro-max-black-thumbnew-600x600.jpg'),
(100, 62, '../uploads/iphone-15-plus-128gb-xanh-thumb-600x600.jpg'),
(103, 51, '../uploads/iphone-15-pro-max-black-thumbnew-600x600.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `FullName` varchar(100) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `PhoneNumber` varchar(20) NOT NULL,
  `Role` enum('admin','user') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`ID`, `Username`, `Password`, `Email`, `FullName`, `Address`, `PhoneNumber`, `Role`) VALUES
(1, 'admin', '123', '', '', '', '', 'admin'),
(2, 'giang', 'giang1123', 'ntgiang01012023@gmail.com', '', '', '', 'user'),
(3, 'maymay', '123', 'may@gmaul.com', '', '', '', 'user'),
(4, 'giang1', '123', 'giang1@gmail.com', '', '', '', 'user'),
(5, 'test', '123', 'test@gmail.com', '', '', '', 'user'),
(6, 'test1', '123', 'test1@gmail.com', '', '', '', 'user'),
(7, 'test2', '123', 'test2@gmail.com', '', '', '', 'user'),
(8, 'giang3', 'giang3', 'ntgiang01012023@gmail.com', '', '', '', 'user'),
(9, 'aaa', '123', 'g@gmail.com', '', '', '', 'user');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `UserID` (`UserID`);

--
-- Chỉ mục cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `OrderID` (`OrderID`),
  ADD KEY `PhoneID` (`PhoneID`);

--
-- Chỉ mục cho bảng `phones`
--
ALTER TABLE `phones`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_category` (`CategoryID`);

--
-- Chỉ mục cho bảng `phones_images`
--
ALTER TABLE `phones_images`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `PhoneID` (`PhoneID`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT cho bảng `order_items`
--
ALTER TABLE `order_items`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT cho bảng `phones`
--
ALTER TABLE `phones`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT cho bảng `phones_images`
--
ALTER TABLE `phones_images`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`ID`);

--
-- Các ràng buộc cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`OrderID`) REFERENCES `orders` (`ID`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`PhoneID`) REFERENCES `phones` (`ID`);

--
-- Các ràng buộc cho bảng `phones`
--
ALTER TABLE `phones`
  ADD CONSTRAINT `fk_category` FOREIGN KEY (`CategoryID`) REFERENCES `categories` (`ID`);

--
-- Các ràng buộc cho bảng `phones_images`
--
ALTER TABLE `phones_images`
  ADD CONSTRAINT `phones_images_ibfk_1` FOREIGN KEY (`PhoneID`) REFERENCES `phones` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
