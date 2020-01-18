-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 18, 2020 lúc 02:08 PM
-- Phiên bản máy phục vụ: 10.1.38-MariaDB
-- Phiên bản PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `kungfuphp`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `courselist`
--

CREATE TABLE `courselist` (
  `MaHP` varchar(15) NOT NULL,
  `TenHP` varchar(100) DEFAULT NULL,
  `ThoiLuong` varchar(10) DEFAULT NULL,
  `SoTC` int(11) DEFAULT NULL,
  `TChphi` double DEFAULT NULL,
  `Trongso` double DEFAULT NULL,
  `tghoc` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `courselist`
--

INSERT INTO `courselist` (`MaHP`, `TenHP`, `ThoiLuong`, `SoTC`, `TChphi`, `Trongso`, `tghoc`) VALUES
('ED3220', 'Kỹ năng mềm', '2(1-2-0-2)', 2, 3, 0.7, 3.75),
('ED3280', 'Tâm lý học ứng dụng', '2(1-2-0-4)', 2, 3, 0.3, 5.25),
('FL1010', 'Tiếng Anh I', '3(3-2-0-6)', 3, 5, 0.7, 8.25),
('FL1020', 'Tiếng Anh II', '3(3-1-0-6)', 3, 4, 0.7, 7.5),
('FL2010', 'Tiếng Anh KHKT', '2(2-1-0-4)', 2, 3, 0.7, 5.25),
('IT1010', 'Tin học đại cương', '3(3-1-1-6)', 3, 5.5, 0.6, 8.25),
('IT1011', 'Nhập môn CNTT và TT', '2(2-0-0-0)', 2, 2, 0.8, 1.5),
('IT1012', 'Kiến thức máy tính', '2(2-0-0-4)', 2, 2, 0.7, 4.5),
('IT1013', 'Tin học đại cương', '4(3-0-2-6)', 4, 6, 1, 8.25),
('IT1014', 'Tin học đại cương', '3(2-1-2-6)', 3, 6, 0.5, 8.25),
('IT1016', 'Tin học đại cương', '3(2-1-2-6)', 3, 6, 0.8, 8.25),
('IT1020', 'Tin học đại cương', '3(3-1-1-6)', 3, 5.5, 0.6, 8.25),
('IT1110', 'Tin học đại cương', '4(3-1-1-8)', 4, 5.5, 0.5, 9.75),
('IT1120', 'Tin học đại cương', '4(3-1-1-8)', 4, 5.5, 0.6, 9.75),
('IT1130', 'Tin học đại cương', '2(1-0-2-4)', 2, 4, 0.5, 5.25),
('IT1140', 'Tin học đại cương', '4(3-1-1-8)', 4, 5.5, 0.5, 9.75),
('IT2000', 'Nhập môn CNTT và TT', '3(2-0-2-6)', 3, 5, 0.7, 7.5),
('IT2001', 'Nhập môn KTMT & TT', '3(2-0-2-6)', 3, 5, 0.5, 7.5),
('IT2011', 'Nhập môn Công nghệ thông tin và Truyền thông', '3(2-0-2-6)', 3, 5, 0.5, 7.5),
('IT2030', 'Technical Writing and Presentation', '3(2-2-0-6)', 3, 4, 0.7, 7.5),
('IT2110', 'Nhập môn CNTT và TT', '2(2-0-0-4)', 2, 2, 0.8, 4.5),
('IT2120', 'Kiến thức máy tính', '2(0-0-4-4)', 2, 6, 0.6, 6),
('IT2130', 'Tín hiệu và hệ thống', '2(2-1-0-4)', 2, 3, 0.7, 5.25),
('IT3010', 'Cấu trúc dữ liệu và giải thuật', '3(3-1-0-6)', 3, 4, 0.7, 7.5),
('IT3011', 'Cấu trúc dữ liệu và thuật toán', '2(2-1-0-4)', 2, 3, 0.6, 5.25),
('IT3014', 'Cấu trúc dữ liệu và GT', '2(2-1-0-4)', 2, 3, 0.7, 5.25),
('IT3015', 'Cấu trúc dữ liệu và giải thuật (tiếng P)', '3(3-1-0-6)', 3, 4, 0.7, 7.5),
('IT3016', 'Giải thuật & các vấn đề cho kỹ sư', '3(2-1-0-6)', 3, 3, 0.7, 6.75),
('IT3017', 'Cấu trúc dữ liệu và thuật toán', '2(2-1-0-4)', 2, 3, 0.7, 5.25),
('IT3020', 'Toán rời rạc', '3(3-1-0-6)', 3, 4, 0.5, 7.5),
('IT3021', 'Toán rời rạc', '2(2-0-0-4)', 2, 2, 0.7, 4.5),
('IT3022', 'Toán rời rạc', '2(2-0-0-4)', 2, 2, 0.7, 4.5),
('IT3022E', 'Discrete Math', '2(2-0-0-4)', 2, 2, 0.7, 4.5),
('IT3024', 'Toán rời rạc', '2(2-1-0-4)', 2, 3, 0.7, 5.25),
('IT3030', 'Kiến trúc máy tính', '3(3-1-0-6)', 3, 4, 0.7, 7.5),
('IT3031', 'Kiến trúc máy tính', '2(2-0-0-4)', 2, 2, 0.7, 4.5),
('IT3032', 'Thực hành kiến trúc máy tính', '2(0-0-4-4)', 2, 6, 0.7, 6),
('IT3034', 'Kiến trúc máy tính', '3(3-1-0-6)', 3, 4, 0.7, 7.5),
('IT3036', 'Kiến trúc bộ xử lý và hợp ngữ', '3(2-1-0-6)', 3, 3, 0.7, 6.75),
('IT3040', 'Kỹ thuật lập trình', '2(2-0-1-4)', 2, 3.5, 0.6, 5.25),
('IT3043', 'Lập trình C (cơ bản)', '2(0-0-4-4)', 2, 4, 0.8, 6),
('IT3045', 'Kỹ thuật lập trình an toàn', '2(2-1-0-4)', 2, 3, 0.7, 5.25),
('IT3053', 'Tiếng Anh CN CNTT', '3(2-2-0-6)', 3, 4, 0.7, 7.5),
('IT3060', 'Toán chuyên đề', '2(2-0-0-4)', 2, 2, 0.7, 4.5),
('IT3061', 'Quá trình ngẫu nhiên ứng dụng', '2(2-1-0-4)', 2, 3, 0.7, 5.25),
('IT3062', 'Toán chuyên đề', '2(2-1-0-4)', 2, 3, 0.7, 5.25),
('IT3070', 'Nguyên lý hệ điều hành', '3(3-1-0-6)', 3, 4, 0.6, 7.5),
('IT3072', 'Hệ điều hành', '2(2-0-0-4)', 2, 2, 0.7, 4.5),
('IT3072E', 'Operating Systems', '2(2-0-0-4)', 2, 2, 0.7, 4.5),
('IT3077', 'Hệ điều hành', '2(2-1-0-4)', 2, 3, 0.7, 5.25),
('IT3080', 'Mạng máy tính', '3(3-0-1-6)', 3, 4.5, 0.5, 7.5),
('IT3082', 'Mạng máy tính', '2(2-0-0-4)', 2, 2, 0.7, 4.5),
('IT3082E', 'Computer Network', '2(2-0-0-4)', 2, 2, 0.7, 4.5),
('IT3084', 'Mạng máy tính', '2(2-1-0-4)', 2, 3, 0.7, 5.25),
('IT3085', 'Mạng máy tính', '3(3-1-0-6)', 3, 4, 0.7, 7.5),
('IT3087', 'Máy tính và mạng máy tính', '3(2-1-1-6)', 3, 4.5, 0.7, 7.5),
('IT3088', 'Mạng tin học', '3(3-0-1-6)', 3, 4.5, 0.8, 7.5),
('IT3090', 'Cơ sở dữ liệu', '3(2-1-1-6)', 3, 4.5, 0.6, 7.5),
('IT3091', 'Cơ sở dữ liệu', '2(2-0-2-0)', 2, 5, 0.8, 3),
('IT3092', 'Thực hành cơ sở dữ liệu', '4(0-4-0-0)', 4, 4, 0.7, 3),
('IT3094', 'Cơ sở dữ liệu', '3(3-0-1-6)', 3, 4.5, 0.7, 7.5),
('IT3100', 'Lập trình hướng đối tượng', '2(2-1-0-4)', 2, 3, 0.7, 5.25),
('IT3101', 'Lý thuyết và ngôn ngữ hướng đối tượng', '2(2-0-0-4)', 2, 2, 0.7, 4.5),
('IT3102', 'Lý thuyết và ngôn ngữ hướng đối tượng', '3(2-0-2-6)', 3, 5, 0.6, 7.5),
('IT3102E', 'Object-Oriented Language and Theory (Java)', '3(2-0-2-6)', 3, 5, 0.6, 7.5),
('IT3104', 'Kỹ thuật lập trình', '3(2-2-0-6)', 3, 4, 0.6, 7.5),
('IT3110', 'Linux và phần mềm nguồn mở', '2(2-1-0-4)', 2, 3, 0.7, 5.25),
('IT3112', 'Hạ tầng công nghệ thông tin mã nguồn mở', '2(2-1-0-4)', 2, 3, 0.7, 5.25),
('IT3115', 'Linux và phần mềm nguồn mở', '2(2-1-0-4)', 2, 3, 0.7, 5.25),
('IT3120', 'Phân tích và thiết kế hệ thống', '2(2-1-0-4)', 2, 3, 0.6, 5.25),
('IT3124', 'Đồ án tin học: xây dựng phần mềm', '2(1-2-0-4)', 2, 4, 0.5, 5.25),
('IT3130', 'Điện tử số', '3(3-1-0.5-', 3, 5, 0.6, 6.75),
('IT3131', 'Lý thuyết mạch logic', '2(2-0-0-0)', 2, 2, 0.7, 1.5),
('IT3132', 'Thực hành mạch logic', '4(0-4-0-0)', 4, 4, 0.7, 3),
('IT3133', 'Điện tử số', '2(2-1-0-4)', 2, 3, 0.6, 5.25),
('IT3136', 'Cơ sở thiết kế logic', '3(2-1-0-6)', 3, 3, 0.7, 6.75),
('IT3140', 'Điện tử ứng dụng', '3(3-1-0.5-', 3, 5, 0.6, 6.75),
('IT3150', 'Project I', '2(0-0-4-8)', 2, 4, 0.5, 9),
('IT3160', 'Nhập môn Trí tuệ nhân tạo', '3(3-1-0-6)', 3, 4, 0.6, 7.5),
('IT3161', 'Đạo lý máy tính', '2(2-1-0-4)', 2, 2, 0.7, 5.25),
('IT3170', 'Thuật toán ứng dụng', '2(2-0-1-4)', 2, 3.5, 0.6, 5.25),
('IT3180', 'Nhập môn công nghệ phần mềm', '3(2-2-0-6)', 3, 4, 0.6, 7.5),
('IT3190', 'Nhập môn Học máy và khai phá dữ liệu', '3(3-1-0-6)', 3, 4, 0.6, 7.5),
('IT3210', 'C Programming Language', '2(2-0-0-4)', 2, 2, 0.7, 4.5),
('IT3220', 'C Programming (Introduction)', '2(0-0-4-4)', 2, 6, 0.7, 6),
('IT3230', 'Lập trình C cơ bản', '2(0-0-4-4)', 2, 6, 0.7, 6),
('IT3230E', 'Data Structures and Algorithms Basic Lab', '2(0-0-4-4)', 2, 6, 0.7, 6),
('IT3240', 'Lập trình C (nâng cao)', '2(0-0-4-4)', 2, 6, 0.7, 6),
('IT3240E', 'Data Structures and Algorithms Advanced Lab', '2(0-0-4-4)', 2, 6, 0.7, 6),
('IT3250', 'Đạo đức máy tính', '2(2-0-0-4)', 2, 2, 0.7, 4.5),
('IT3250E', 'Computer Ethics', '2(2-0-0-4)', 2, 2, 0.7, 4.5),
('IT3260', 'Lý thuyết mạch logic', '2(2-0-0-4)', 2, 2, 0.7, 4.5),
('IT3260E', 'Logic Circuit', '2(2-0-0-4)', 2, 2, 0.7, 4.5),
('IT3270', 'Thực hành mạch logic', '2(0-0-4-4)', 2, 6, 0.7, 6),
('IT3530', 'Kiến trúc máy tính', '3(3-1-0-6)', 3, 4, 0.7, 7.5),
('IT3540', 'Kỹ thuật lập trình', '3(2-0-2-6)', 3, 5, 0.7, 7.5),
('IT3541', 'Kỹ thuật lập trình', '3(3-1-0-6)', 3, 4, 0.7, 7.5),
('IT3570', 'Hệ điều hành', '3(3-1-0-6)', 3, 4, 0.7, 7.5),
('IT3580', 'Mạng máy tính', '3(3-0-1-6)', 3, 4.5, 0.7, 7.5),
('IT3590', 'Cơ sở dữ liệu', '3(2-1-2-6)', 3, 6, 0.7, 8.25),
('IT3600', 'Lập trình hướng đối tượng', '3(3-0-1-6)', 3, 4.5, 0.7, 7.5),
('IT3620', 'Phân tích và thiết kế hệ thống thông tin', '2(2-1-0-4)', 2, 3, 0.7, 5.25),
('IT3650', 'Lập trình Java', '3(0-0-6-6)', 3, 6, 0.7, 9),
('IT3660', 'Lập trình Android', '3(0-0-6-6)', 3, 6, 0.7, 9),
('IT3670', 'Lập trình ứng dụng Tizen', '3(0-0-6-6)', 3, 6, 0.7, 9),
('IT3680', 'Thuật toán ứng dụng', '3(0-0-6-6)', 3, 9, 0.7, 9),
('IT3804', 'Thực tập doanh nghiệp', '2(0-0-6-4)', 2, 4, 0.7, 7.5),
('IT3900', 'Thực tập cơ sở', '3(0-0-6-12', 3, 6, 0.5, 5.25),
('IT3902', 'Lập trình Java theo chuẩn kỹ năng ITSS', '1(0-0-2-4)', 1, 3, 0.7, 4.5),
('IT3904', 'Thực tập cơ sở', '3(0-0-6-12', 3, 6, 0.5, 5.25),
('IT3910', 'Project I', '3(0-0-6-12', 3, 6, 0.7, 5.25),
('IT3911', 'Đồ án I: Lập trình', '3(0-0-6-6)', 3, 6, 0.7, 9),
('IT3914', 'Đồ án lập trình', '2(0-0-0-4)', 2, 4, 0.7, 3),
('IT3920', 'Project II', '3(0-0-6-12', 3, 6, 0.7, 5.25),
('IT3921', 'Đồ án II: Phân tích thiết kế hệ thống', '3(0-0-6-6)', 3, 6, 0.5, 9),
('IT3930', 'Project II', '2(0-0-4-8)', 2, 4, 0.5, 9),
('IT3931', 'Project II', '2(0-0-4-8)', 2, 4, 0.5, 9),
('IT3932', 'Project II', '3(0-0-6-12', 3, 6, 0, 5.25),
('IT3940', 'Project III', '3(0-0-6-12', 3, 6, 0.5, 5.25),
('IT3941', 'Đồ án 3: Định hướng công nghệ', '3(0-0-6-6)', 3, 6, 0.5, 9),
('IT3942', 'Project III', '3(0-0-6-12', 3, 6, 0, 5.25),
('IT3943', 'Project III', '3(0-0-6-12', 3, 6, 0.5, 5.25),
('IT3xx6', 'Giải thuật & các vấn đề cho kỹ sư', '3(2-1-0-6)', 3, 3, 0.7, 6.75),
('IT3xy6', 'Cơ sở thiết kế logic', '3(2-1-0-6)', 3, 3, 0.7, 6.75),
('IT4010', 'An toàn và bảo mật thông tin', '3(3-1-0-6)', 3, 4, 0.7, 7.5),
('IT4011', 'Bảo mật thông tin', '2(2-0-0-4)', 2, 2, 0.7, 4.5),
('IT4012', 'Bảo mật thông tin', '2(2-0-0-4)', 2, 2, 0.7, 4.5),
('IT4012E', 'Information Security', '2(2-0-0-4)', 2, 2, 0.7, 4.5),
('IT4013', 'An toàn thông tin', '3(3-1-0-6)', 3, 4, 0.7, 7.5),
('IT4015', 'Nhập môn an toàn thông tin', '3(3-1-0-6)', 3, 4, 0.6, 7.5),
('IT4020', 'Nhập môn lý thuyết tính toán', '3(3-1-0-6)', 3, 4, 0.7, 7.5),
('IT4024', 'Mô hình hóa bằng automat', '2(2-1-0-4)', 2, 3, 0.7, 5.25),
('IT4025', 'Mật mã ứng dụng', '3(3-1-0-6)', 3, 4, 0.6, 7.5),
('IT4030', 'Nhập môn hệ quản trị cơ sở dữ liệu', '2(1-2-0-4)', 2, 3, 0.7, 5.25),
('IT4037', 'Hệ quản trị cơ sở dữ liệu', '2(2-1-0-4)', 2, 3, 0.7, 5.25),
('IT4040', 'Trí tuệ nhân tạo', '3(3-1-0-6)', 3, 4, 0.7, 7.5),
('IT4042', 'Trí tuệ nhân tạo', '2(2-0-0-4)', 2, 2, 0.7, 4.5),
('IT4042E', 'Artificial Intelligence', '2(2-0-0-4)', 2, 2, 0.7, 4.5),
('IT4044', 'Trí tuệ nhân tạo', '3(3-0-0-6)', 3, 3, 0.7, 6.75),
('IT4045', 'Trí tuệ nhân tạo', '3(3-1-0-6)', 3, 4, 0.7, 7.5),
('IT4050', 'Thiết kế và phân tích thuật toán', '3(3-1-0-6)', 3, 4, 0.6, 7.5),
('IT4053', 'Phân tích và thiết kế thuật toán', '2(2-1-0-4)', 2, 3, 0.7, 5.25),
('IT4060', 'Lập trình mạng', '2(1-2-0-4)', 2, 3, 0.7, 5.25),
('IT4061', 'Thực hành lập trình mạng', '2(0-0-4-4)', 2, 6, 0.7, 6),
('IT4062', 'Thực hành Lập trình mạng', '2(0-0-4-4)', 2, 6, 0.7, 6),
('IT4062E', 'Network Programming', '2(0-0-4-4)', 2, 6, 0.5, 6),
('IT4070', 'Ngôn ngữ và phương pháp dịch', '3(3-1-0-6)', 3, 4, 0.7, 7.5),
('IT4071', 'Xây dựng chương trình dịch', '2(2-0-0-4)', 2, 2, 0.7, 4.5),
('IT4072', 'Thực hành chương trình dịch', '2(0-0-4-4)', 2, 6, 0.7, 6),
('IT4073', 'Lý thuyết ngôn ngữ và phương pháp dịch', '2(2-1-0-4)', 2, 3, 0.7, 5.25),
('IT4074', 'Lý thuyết ngôn ngữ và phương pháp dịch', '3(3-1-0-6)', 3, 4, 0.5, 7.5),
('IT4075', 'Lý thuyết ngôn ngữ và phương pháp dịch', '2(2-1-0-4)', 2, 3, 0.7, 5.25),
('IT4079', 'Ngôn ngữ và phương pháp dịch', '2(2-1-0-4)', 2, 3, 0.6, 5.25),
('IT4080', 'Nhập môn công nghệ phần mềm', '2(2-1-0-4)', 2, 3, 0.7, 5.25),
('IT4090', 'Xử lý ảnh', '2(2-1-0-4)', 2, 3, 0.7, 5.25),
('IT4091', 'Xử lý ảnh', '2(2-1-0-4)', 2, 3, 0.7, 5.25),
('IT4100', 'Đồ họa và hiện thực ảo', '3(3-1-0-6)', 3, 4, 0.7, 7.5),
('IT4110', 'Tính toán khoa học', '3(3-1-0-6)', 3, 4, 0.7, 7.5),
('IT4120', 'Các hệ cơ sở tri thức', '2(2-1-0-4)', 2, 3, 0.7, 5.25),
('IT4130', 'Lập trình song song', '2(2-1-0-4)', 2, 3, 0.7, 5.25),
('IT4150', 'Kỹ thuật mạng', '2(2-1-0-4)', 2, 3, 0.6, 5.25),
('IT4160', 'Vi xử lý', '3(3-1-0-6)', 3, 4, 0.6, 7.5),
('IT4170', 'Xử lý tín hiệu số', '2(2-1-0-4)', 2, 3, 0.6, 5.25),
('IT4180', 'Chương trình dịch', '2(2-1-0-4)', 2, 3, 0.6, 5.25),
('IT4200', 'Kỹ thuật ghép nối máy tính', '3(3-1-0-6)', 3, 4, 0.6, 7.5),
('IT4210', 'Hệ nhúng', '3(3-0-1-6)', 3, 4.5, 0.6, 7.5),
('IT4240', 'Quản trị dự án công nghệ thông tin', '2(2-1-0-4)', 2, 3, 0.6, 5.25),
('IT4250', 'Thiết kế IC', '2(2-1-0-4)', 2, 3, 0.6, 5.25),
('IT4260', 'An ninh mạng', '2(2-1-0-4)', 2, 3, 0.7, 5.25),
('IT4270', 'Hệ thống máy tính công nghiệp', '2(2-1-0-4)', 2, 3, 0.6, 5.25),
('IT4290', 'Xử lý tiếng nói', '2(2-1-0-4)', 2, 3, 0.6, 5.25),
('IT4300', 'An toàn các hệ thống thông tin', '2(2-1-0-4)', 2, 3, 0.7, 5.25),
('IT4310', 'Cơ sở dữ liệu nâng cao', '3(3-1-0-6)', 3, 4, 0.7, 7.5),
('IT4330', 'Hệ quản trị cơ sở dữ liệu', '3(2-0-2-6)', 3, 5, 0.7, 7.5),
('IT4340', 'Hệ trợ giúp quyết định', '3(3-1-0-6)', 3, 4, 0.7, 7.5),
('IT4360', 'Hệ cơ sở tri thức', '3(3-1-0-6)', 3, 4, 0.7, 7.5),
('IT4370', 'Mô hình các hệ thống phân tán', '3(3-1-0-6)', 3, 4, 0.7, 7.5),
('IT4371', 'Các hệ phân tán', '2(2-1-0-4)', 2, 3, 0.7, 5.25),
('IT4400', 'Công nghệ Web và dịch vụ trực tuyến', '2(2-1-0-4)', 2, 3, 0.7, 5.25),
('IT4404', 'Phát triển Web trên nền tảng mã nguồn mở', '2(2-1-0-4)', 2, 3, 0.7, 5.25),
('IT4409', 'Công nghệ Web và dịch vụ trực tuyến', '3(2-2-0-6)', 3, 4, 0.6, 7.5),
('IT4410', 'Nhập môn tương tác người-máy', '2(2-1-0-4)', 2, 3, 0.6, 5.25),
('IT4430', 'Kỹ thuật phần mềm', '2(2-1-0-4)', 2, 3, 0.7, 5.25),
('IT4440', 'Tương tác Người –Máy', '3(3-1-0-6)', 3, 4, 0.7, 7.5),
('IT4460', 'Phân tích yêu cầu phần mềm', '2(2-1-0-4)', 2, 3, 0.7, 5.25),
('IT4470', 'Đồ họa và hiện thực ảo', '3(3-1-0-6)', 3, 4, 0.7, 7.5),
('IT4480', 'Làm việc nhóm và kỹ năng giao tiếp', '2(2-1-0-4)', 2, 3, 0.6, 5.25),
('IT4490', 'Thiết kế và xây dựng phần mềm', '3(2-1-1-6)', 3, 4.5, 0.5, 7.5),
('IT4500', 'Đảm bảo chất lượng phần mềm', '3(3-1-0-6)', 3, 4, 0.7, 7.5),
('IT4510', 'An toàn phần mềm và hệ thống', '3(3-1-0-6)', 3, 4, 0.7, 7.5),
('IT4520', 'Kinh tế công nghệ phần mềm', '2(2-1-0-4)', 2, 3, 0.7, 5.25),
('IT4530', 'Kỹ năng lập báo cáo kỹ thuật và dự án', '1(1-1-0-2)', 1, 2, 0.7, 3),
('IT4532', 'Đổi mới sáng tạo và khởi nghiệp công nghệ', '2(2-1-0-4)', 2, 3, 0.7, 5.25),
('IT4540', 'Quản lý dự án phần mềm', '3(3-1-0-6)', 3, 4, 0.7, 7.5),
('IT4560', 'Kỹ thuật truyền thông', '3(3-1-0-6)', 3, 4, 0.7, 7.5),
('IT4561', 'Kỹ thuật truyền thông điện tử', '3(3-1-0-6)', 3, 4, 0.7, 7.5),
('IT4590', 'Lý thuyết thông tin', '2(2-1-0-4)', 2, 3, 0.7, 5.25),
('IT4600', 'Thiết bị truyền thông và mạng', '2(2-0-1-4)', 2, 3.5, 0.7, 5.25),
('IT4601', 'Thiết bị truyền thông và mạng', '3(2-1-1-6)', 3, 4.5, 0.7, 7.5),
('IT4610', 'Hệ phân tán', '2(2-1-0-4)', 2, 3, 0.6, 5.25),
('IT4620', 'Xử lý dữ liệu đa phương tiện', '2(2-1-0-4)', 2, 3, 0.7, 5.25),
('IT4650', 'Thiết kế mạng Intranet', '2(2-1-0-4)', 2, 3, 0.7, 5.25),
('IT4660', 'Quản trị cơ sở dữ liệu phân tán', '2(2-0-1-4)', 2, 3.5, 0.7, 5.25),
('IT4670', 'Đánh giá hiệu năng mạng', '2(2-1-0-4)', 2, 3, 0.7, 5.25),
('IT4680', 'Truyền thông đa phương tiện và ứng dụng', '2(2-0-1-4)', 2, 3.5, 0.7, 5.25),
('IT4690', 'Mạng không dây và truyền thông di động', '2(2-1-0-4)', 2, 3, 0.7, 5.25),
('IT4700', 'Các hệ thống thông tin vệ tinh', '2(2-1-0-4)', 2, 3, 0.7, 5.25),
('IT4751', 'Ngôn ngữ mô hình hóa UML', '2(2-1-0-4)', 2, 3, 0.7, 5.25),
('IT4752', 'Tính toán song song', '2(2-1-0-4)', 2, 3, 0.7, 5.25),
('IT4753', 'Nhâp môn học máy', '2(2-1-0-4)', 2, 3, 0.7, 5.25),
('IT4754', 'Tìm kiếm cục bộ dựa trên ràng buộc', '2(2-1-0-4)', 2, 3, 0.6, 5.25),
('IT4755', 'Hệ chuyên gia', '2(2-1-0-4)', 2, 3, 0.7, 5.25),
('IT4756', 'Thương mại điện tử', '2(2-1-0-4)', 2, 3, 0.7, 5.25),
('IT4757', 'Kỹ thuật mô hình hóa và mô phỏng', '2(2-1-0-4)', 2, 3, 0.6, 5.25),
('IT4761', 'Nhập môn khai phá dữ liệu', '2(2-1-0-4)', 2, 3, 0.7, 5.25),
('IT4762', 'Ngữ nghĩa của ngôn ngữ lập trình', '2(2-1-0-4)', 2, 3, 0.7, 5.25),
('IT4763', 'Tối ưu hoá tổ hợp', '2(2-1-0-4)', 2, 3, 0.7, 5.25),
('IT4764', 'Nhập môn hệ trợ giúp quyết định', '2(2-1-0-4)', 2, 3, 0.7, 5.25),
('IT4766', 'Lập trình kịch bản với JavaScript', '2(2-1-0-4)', 2, 3, 0.6, 5.25),
('IT4771', 'Sinh – Tin học', '3(3-1-0-6)', 3, 4, 0.7, 7.5),
('IT4772', 'Xử lý ngôn ngữ tự nhiên', '3(3-1-0-6)', 3, 4, 0.7, 7.5),
('IT4773', 'Cơ sở thuật toán trong trí tuệ nhân tạo', '3(3-1-0-6)', 3, 4, 0.7, 7.5),
('IT4774', 'Nhập môn nén dữ liệu', '3(3-1-0-6)', 3, 4, 0.7, 7.5),
('IT4776', 'Cơ sở thuật toán của lý thuyết mã hoá', '3(3-1-0-6)', 3, 4, 0.7, 7.5),
('IT4777', 'Hình học tính toán', '3(3-1-0-6)', 3, 4, 0.7, 7.5),
('IT4778', 'Lập trình hệ thống', '3(3-1-0-6)', 3, 4, 0.7, 7.5),
('IT4779', 'Xử lý dữ liệu lớn', '2(2-1-0-4)', 2, 3, 0.7, 5.25),
('IT4781', 'Lập trình Windows', '2(2-1-0-4)', 2, 3, 0.6, 5.25),
('IT4782', 'Lập trình .NET', '2(2-0-0-4)', 2, 2, 0.6, 4.5),
('IT4791', 'Công nghệ mạch in', '2(2-1-0-4)', 2, 3, 0.6, 5.25),
('IT4793', 'Phân tích và thiết kế mạch điện tử', '2(2-1-0-4)', 2, 3, 0.6, 5.25),
('IT4795', 'Các công nghệ truyền thông', '2(2-1-0-4)', 2, 3, 0.6, 5.25),
('IT4802', 'Lập trình xử lý tín hiệu số', '2(2-1-0-4)', 2, 3, 0.6, 5.25),
('IT4804', 'Đa phương tiện', '2(2-1-0-4)', 2, 3, 0.6, 5.25),
('IT4805', 'Mạng nơron', '2(2-0-0-4)', 2, 2, 0.6, 4.5),
('IT4807', 'Điều chế tương tự và số', '2(2-1-0-4)', 2, 3, 0.6, 5.25),
('IT4867', 'Xử lý dữ liệu phân tán', '2(2-1-0-4)', 2, 3, 0.6, 5.25),
('IT4868', 'Khai phá Web', '3(3-1-0-6)', 3, 4, 0.6, 7.5),
('IT4912', 'Điện toán đám mây - nguồn mở', '2(2-2-0-4)', 2, 4, 0.7, 6),
('JP1131', 'Tiếng Nhật 3', '4(0-8-0-8)', 4, 8, 0.7, 12),
('ME2010', 'Hình học họa hình', '2(1-1-0-4)', 2, 2, 0.7, 4.5),
('ME2020', 'Vẽ kỹ thuật', '2(1-1-0-4)', 2, 2, 0.7, 4.5),
('MI1010', 'Giải tích I', '3(3-2-0-6)', 3, 5, 0.7, 8.25),
('MI1012', 'Math I', '3(2-2-0-6)', 3, 4, 0.7, 7.5),
('MI1013', 'Giải tích I', '4(3-2-0-8)', 4, 5, 0.7, 9.75),
('MI1014', 'Toán I', '5(5-3-0-10', 5, 8, 0.5, 6.75),
('MI1016', 'Giải tích I', '4(3-2-0-8)', 4, 5, 0.7, 9.75),
('MI1017', 'Toán đại cương I', '2(2-0-0-4)', 2, 2, 0.7, 4.5),
('MI1020', 'Giải tích II', '3(2-2-0-6)', 3, 4, 0.7, 7.5),
('MI1022', 'Math II', '3(2-2-0-6)', 3, 4, 0.7, 7.5),
('MI1023', 'Giải tích II', '3(2-2-0-6)', 3, 4, 0.7, 7.5),
('MI1024', 'Toán II', '5(4-3-0-10', 5, 7, 0.5, 6),
('MI1026', 'Giải tích II', '4(3-2-0-8)', 4, 5, 0.7, 9.75),
('MI1027', 'Toán đại cương II', '2(2-0-0-4)', 2, 2, 0.7, 4.5),
('MI1030', 'Đại số', '3(3-2-0-6)', 3, 5, 0.7, 8.25),
('MI1032', 'Math III', '3(2-2-0-6)', 3, 4, 0.7, 7.5),
('MI1033', 'Đại số', '4(3-2-0-8)', 4, 5, 0.7, 9.75),
('MI1034', 'Toán III', '5(4-3-0-10', 5, 7, 0.5, 6),
('MI1036', 'Đại số', '4(3-2-0-8)', 4, 5, 0.7, 9.75),
('MI1040', 'Phương trình vi phân và chuỗi', '2(2-1-0-4)', 2, 3, 0.7, 5.25),
('MI1043', 'Giải tích III', '3(3-1-0-6)', 3, 4, 0.7, 7.5),
('MI1046', 'Phương trình vi phân và chuỗi', '3(2-2-0-6)', 3, 4, 0.7, 7.5),
('MI1110', 'Giải tích I', '4(3-2-0-8)', 4, 5, 0.7, 9.75),
('MI1111', 'Giải tích I', '4(3-2-0-8)', 4, 5, 0.7, 9.75),
('MI1112', 'Giải tích I', '3(2-2-0-6)', 3, 4, 0.7, 7.5),
('MI1113', 'Giải tích I', '4(3-2-0-8)', 4, 5, 0.7, 9.75),
('MI1120', 'Giải tích II', '3(2-2-0-6)', 3, 4, 0.7, 7.5),
('MI1121', 'Giải tích II', '3(2-2-0-6)', 3, 4, 0.7, 7.5),
('MI1122', 'Giải tích II', '3(2-2-0-6)', 3, 4, 0.7, 7.5),
('MI1127', 'Bài tập toán đại cương II', '1(0-2-0-4)', 1, 2, 0.7, 4.5),
('MI1130', 'Giải tích III', '3(2-2-0-6)', 3, 4, 0.7, 7.5),
('MI1131', 'Giải tích III', '3(2-2-0-6)', 3, 4, 0.7, 7.5),
('MI1132', 'Giải tích III', '3(2-2-0-6)', 3, 4, 0.7, 7.5),
('MI1133', 'Giải tích III', '3(2-2-0-6)', 3, 4, 0.7, 7.5),
('MI1140', 'Đại số', '4(3-2-0-8)', 4, 5, 0.7, 9.75),
('MI1141', 'Đại số', '4(3-2-0-8)', 4, 5, 0.7, 9.75),
('MI1142', 'Đại số', '3(2-2-0-6)', 3, 4, 0.7, 7.5),
('MI1143', 'Đại số', '4(3-2-0-8)', 4, 5, 0.7, 9.75),
('MI1150', 'Đại số đại cương', '3(3-1-0-6)', 3, 4, 0.7, 7.5),
('MI1160', 'Toán rời rạc', '3(3-1-0-6)', 3, 4, 0.7, 7.5),
('MI2000', 'Nhập môn Toán-Tin', '3(2-0-2-6)', 3, 5, 0.7, 7.5),
('MI2001', 'Nhập môn HTTTQL', '3(2-0-2-6)', 3, 5, 0.7, 7.5),
('MI2010', 'Phương pháp tính', '2(2-0-0-4)', 2, 2, 0.7, 4.5),
('MI2013', 'Phương pháp tính', '3(3-0-1-6)', 3, 4.5, 0.7, 7.5),
('MI2020', 'Xác suất thống kê', '3(2-2-0-6)', 3, 4, 0.7, 7.5),
('MI2023', 'Xác suất thống kê', '3(2-2-0-6)', 3, 4, 0.7, 7.5),
('MI2026', 'Xác xuất thống kê', '4(3-2-0-8)', 4, 5, 0.7, 9.75),
('MI2027', 'Lý thuyết xác suất', '2(2-0-0-4)', 2, 2, 0.7, 4.5),
('MI2033', 'Xác suất nâng cao', '2(2-1-0-4)', 2, 3, 0.7, 5.25),
('MI2036', 'Xác suất thống kê và tín hiệu ngẫu nhiên', '3(3-1-0-6)', 3, 4, 0.7, 7.5),
('MI2044', 'Phương pháp tính', '2(2-1-0-4)', 2, 3, 0.5, 5.25),
('MI2047', 'Toán rời rạc', '2(2-0-0-4)', 2, 2, 0.7, 4.5),
('MI2053', 'Đại số hiện đại', '3(3-0-0-6)', 3, 3, 0.7, 6.75),
('MI2060', 'Cơ sở giải tích hàm', '3(3-1-0-6)', 3, 4, 0.7, 7.5),
('MI2063', 'Giải tích hàm', '4(4-1-0-8)', 4, 5, 0.7, 9.75),
('MI2070', 'Toán nâng cao', '2(2-1-0-3)', 2, 3, 0.7, 4.5),
('MI3010', 'Toán rời rạc', '3(3-1-0-6)', 3, 4, 0.7, 7.5),
('MI3014', 'Tối ưu hoá', '2(2-0-0-4)', 2, 2, 0.5, 4.5),
('MI3015', 'Toán ứng dụng', '2(2-1-0-4)', 2, 3, 0.7, 5.25),
('MI3020', 'Giải tích hàm', '3(3-1-0-6)', 3, 4, 0.7, 7.5),
('MI3025', 'Logic học', '2(2-1-0-4)', 2, 3, 0.7, 5.25),
('MI3030', 'Xác suất thống kê', '4(3-2-0-8)', 4, 5, 0.7, 9.75),
('MI3031', 'Suy luận thống kê', '3(2-2-0-6)', 3, 4, 0.7, 7.5),
('MI3034', 'Phép tính hình thức & ứng dụng', '1(1-0-0-2)', 1, 1, 0.5, 2.25),
('MI3040', 'Giải tích số', '4(4-1-0-8)', 4, 5, 0.7, 9.75),
('MI3044', 'Phân tính thống kê & phân tích dữ liệu', '1(1-0-0-2)', 1, 1, 0.5, 2.25),
('MI3050', 'Các phương pháp tối ưu', '4(4-1-0-8)', 4, 5, 0.7, 9.75),
('MI3052', 'Nhập môn các phương pháp tối ưu', '2(2-1-0-4)', 2, 3, 0.7, 5.25),
('MI3054', 'Hàm biến phức và đại số ma trận', '2(2-0-0-4)', 2, 2, 0.5, 4.5),
('MI3130', 'Toán kinh tế', '3(3-1-0-6)', 3, 4, 0.7, 7.5),
('MI3130x', 'Xác suất thống kê và QHTN', '3(3-1-0-6)', 3, 4, 0.7, 7.5),
('MI3131', 'Toán kinh tế', '2(2-1-0-4)', 2, 3, 0.7, 5.25),
('MI3140', 'Toán kinh tế', '3(3-1-0-6)', 3, 4, 0.8, 7.5),
('MI3180', 'Xác suất thống kê và QHTN', '3(3-1-0-6)', 3, 4, 0.7, 7.5),
('MI3310', 'Kỹ thuật lập trình', '2(2-0-1-4)', 2, 3.5, 0.7, 5.25),
('MI3320', 'Các phương pháp tối ưu I', '3(3-1-0-6)', 3, 4, 0.7, 7.5),
('MI3350', 'Lý thuyết xác suất', '3(3-1-0-6)', 3, 4, 0.7, 7.5),
('MI4051', 'Một số phương pháp toán học trong tài chính', '2(2-1-0-4)', 2, 3, 0.7, 5.25),
('MI4052', 'Cơ sở dữ liệu phân tán - Lập trình với cơ sở dữ liệu ORACLE', '2(2-1-0-4)', 2, 3, 0.7, 5.25),
('MI4090', 'Lập trình hướng đối tượng', '3(2-2-0-6)', 3, 4, 0.7, 7.5),
('MI4100', 'Mật mã và độ phức tạp thuật toán', '3(3-1-0-6)', 3, 4, 0.7, 7.5),
('MI4170', 'Các mô hình ngẫu nhiên và ứng dụng', '2(2-1-0-6)', 2, 3, 0.7, 6.75),
('MI4180', 'Các phép biến đổi số và ứng dụng', '3(3-1-0-6)', 3, 4, 0.7, 7.5),
('MI4190', 'Logic thuật toán', '3(3-1-0-6)', 3, 4, 0.7, 7.5),
('MI4200', 'Khai phá dữ liệu', '3(3-1-0-6)', 3, 4, 0.7, 7.5),
('MI4202', 'Khai phá dữ liệu', '3(3-1-0-6)', 3, 4, 0.7, 7.5),
('MI4210', 'Hệ hỗ trợ quyết định', '3(3-1-0-6)', 3, 4, 0.7, 7.5),
('MI4212', 'Kho dữ liệu và kinh doanh thông minh', '3(3-1-0-6)', 3, 4, 0.7, 7.5),
('MI4220', 'Cơ sở trí tuệ nhân tạo và hệ chuyên gia', '3(3-1-0-6)', 3, 4, 0.7, 7.5),
('MI4230', 'Điều khiển tối ưu', '2(2-1-0-4)', 2, 3, 0.7, 5.25),
('MI4250', 'Đồ họa máy tính', '2(2-1-0-4)', 2, 3, 0.7, 5.25),
('MI4253', 'Đồ họa máy tính', '2(2-1-0-4)', 2, 3, 0.7, 5.25),
('MI4260', 'An toàn HTTT', '3(3-1-0-6)', 3, 4, 0.7, 7.5),
('MI4302', 'Hệ thống phân tán', '3(2-0-2-6)', 3, 5, 0.7, 7.5),
('MI4392', 'Công nghệ web và kinh doanh điện tử', '3(2-0-2-6)', 3, 5, 0.7, 7.5),
('MI4402', 'Lập trình mobile', '3(2-0-2-6)', 3, 5, 0.7, 7.5),
('MI4412', 'Quản trị dự án CNTT', '3(2-2-0-6)', 3, 4, 0.7, 7.5),
('MI4422', 'Quản trị quan hệ khách hàng', '3(3-1-0-6)', 3, 4, 0.7, 7.5),
('MI5010', 'Thực tập tốt nghiệp', '4(0-0-8-16', 4, 10, 0.5, 6.75),
('MI5013', 'Thực tập tốt nghiệp', '4(0-0-8-16', 4, 10, 0.5, 6.75),
('MI5110', 'Đồ án tốt nghiệp', '10(0-0-20-', 10, 25, 0.5, 22.5),
('MI5113', 'Đồ án tốt nghiệp', '10(0-0-20-', 10, 25, 0.5, 22.5),
('MIL1010', 'Giáo dục quốc phòng I', '0(1-0-2-0)', 0, 3, 1, 2.25),
('PE1010', 'Giáo dục thể chất A', '0(0-0-2-0)', 0, 1.5, 1, 1.5),
('PE1020', 'Giáo dục thể chất B', '0(0-0-2-0)', 0, 1.5, 1, 1.5),
('PE1030', 'Giáo dục thể chất C', '0(0-0-2-0)', 0, 1.5, 1, 1.5),
('PH1010', 'Vật lý đại cương I', '4(3-2-1-8)', 4, 6.5, 0.7, 10.5),
('SSH1010', 'Triết học Mác-Lênin', '4(3-0-3-6)', 4, 7.5, 0.7, 9),
('SSH1020', 'Kinh tế chính trị', '3(3-0-2-6)', 3, 6, 0.7, 8.25),
('SSH1030', 'Lịch sử Đảng CSVN', '2(2-0-2-4)', 2, 5, 0.7, 6),
('SSH1040', 'CNXH khoa học', '2(2-0-2-4)', 2, 5, 0.7, 6),
('SSH1050', 'Tư tưởng HCM', '2(2-0-0-4)', 2, 2, 0.7, 4.5),
('﻿', '', '', 0, NULL, NULL, NULL),
('﻿MI1010', 'Giải tích I', '3(3-2-0-6)', 3, 5, 0.7, 8.25);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `username` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `note` text,
  `color` varchar(7) DEFAULT NULL,
  `start` datetime NOT NULL,
  `end` datetime DEFAULT NULL,
  `hoanthanh` int(11) DEFAULT '0',
  `thoigian` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `events`
--

INSERT INTO `events` (`id`, `username`, `title`, `note`, `color`, `start`, `end`, `hoanthanh`, `thoigian`) VALUES
(8, '20172017', 'Project I', 'thi', '#40E0D0', '2020-01-09 08:00:00', '2020-01-09 11:00:00', 100, 10800),
(9, '20172017', 'Kỹ năng mềm', '', '#008000', '2020-01-09 12:00:00', '2020-01-09 15:00:00', 75, 8100),
(11, '20172017', 'Kỹ năng mềm', 'thi', '#008000', '2020-01-10 08:30:00', '2020-01-10 10:30:00', 75, 5400),
(12, '20172017', 'Tâm lý học ứng dụng', 'thi ck', '#FFD700', '2020-01-10 11:30:00', '2020-01-10 13:30:00', 50, 3600),
(13, '20172017', 'Project I', '', '#008000', '2020-01-09 16:00:00', '2020-01-09 17:45:00', 75, 4725),
(14, '20172017', 'Project I', 'thi', '#FFD700', '2020-01-13 14:00:00', '2020-01-13 16:00:00', 50, 3600),
(15, '20172017', 'Project I', 'báo cáo', '#40E0D0', '2020-01-13 19:00:00', '2020-01-14 00:00:00', 100, 18000),
(16, '20172017', 'Cơ sở dữ liệu', 'thi', '#FF0000', '2020-01-13 16:30:00', '2020-01-13 18:30:00', 0, 0),
(22, '20172017', 'Nhập môn Trí tuệ nhân tạo', 'thi', '#40E0D0', '2020-01-16 08:00:00', '2020-01-16 11:30:00', 100, 12600),
(28, '20172017', 'Project I', 'thi', '#FF8C00', '2020-01-16 13:30:00', '2020-01-16 15:30:00', 25, 1800),
(29, '20172017', 'Nhập môn công nghệ phần mềm', 'thi', '#40E0D0', '2020-01-16 01:00:00', '2020-01-16 04:00:00', 100, 10800),
(30, '20172017', 'Mạng máy tính', 'báo cáo', '#FF0000', '2020-01-16 17:00:00', '2020-01-16 20:00:00', 0, 0),
(31, '20172017', 'Cơ sở dữ liệu', 'ôn', '#40E0D0', '2020-01-16 21:00:00', '2020-01-17 00:00:00', 100, 10800),
(32, '20172017', 'Lập trình hướng đối tượng', 'game', '#008000', '2020-01-15 09:00:00', '2020-01-15 13:30:00', 75, 12150),
(33, '20172017', 'Nhập môn công nghệ phần mềm', 'thi', '#40E0D0', '2020-01-17 08:00:00', '2020-01-17 11:00:00', 100, 10800);

--
-- Bẫy `events`
--
DELIMITER $$
CREATE TRIGGER `addevent` AFTER INSERT ON `events` FOR EACH ROW insert into sv_history(id, username,action,content) VALUES (new.id, new.username, 'thêm',concat('sự kiện ',new.title,' ngày bắt đầu ',new.start,' ngày kết thúc ',new.end,' với ghi chú ',new.note))
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `color` BEFORE UPDATE ON `events` FOR EACH ROW BEGIN
IF NEW.hoanthanh = 100 THEN
SET NEW.color = '#40E0D0';
SEt new.thoigian=(time_to_sec(datediff(date(old.end),date(old.start)))*24*3600+ time_to_sec(timediff(time(old.end),time(old.start))));
ELSEIF NEW.hoanthanh = 75 THEN
SET NEW.color = '#008000';SEt new.thoigian=0.75*(time_to_sec(datediff(date(old.end),date(old.start)))*24*3600+ time_to_sec(timediff(time(old.end),time(old.start))));
ELSEIF NEW.hoanthanh = 50 THEN
SET NEW.color = '#FFD700';SEt new.thoigian=0.5*(time_to_sec(datediff(date(old.end),date(old.start)))*24*3600+ time_to_sec(timediff(time(old.end),time(old.start))));
ELSEIF NEW.hoanthanh =25 THEN
SET NEW.color = '#FF8C00';SEt new.thoigian=0.25*(time_to_sec(datediff(date(old.end),date(old.start)))*24*3600+ time_to_sec(timediff(time(old.end),time(old.start))));
ELSEIF NEW.hoanthanh = 0 THEN
SET NEW.color = '#FF0000';SEt new.thoigian=0;
END IF;

end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `delete_event` AFTER DELETE ON `events` FOR EACH ROW INSERT INTO `sv_history`( `username`, `action`, `old`) VALUES ( old.username,'xóa' , concat('sự kiện ',old.title,' ngày bắt đầu ',old.start,' ngày kết thúc ',old.end,' với ghi chú ',old.note,',mức độ hoàn thành ',old.hoanthanh))
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_event` AFTER UPDATE ON `events` FOR EACH ROW BEGIN
 IF (NEW.title != OLD.title) 
   

then
INSERT into sv_history (id, username,action,old, content, tencot) VALUES (new.id, new.username, 'cập nhật',old.title,new.title,'Tiêu đề');
end if;
IF (NEW.note != OLD.note) 
   

then
INSERT into sv_history (id, username,action,old, content, tencot) VALUES (new.id, new.username, 'cập nhật',old.note,new.note,'Ghi chú');
end if;
IF (NEW.hoanthanh != OLD.hoanthanh) 
   

then
INSERT into sv_history (id, username,action, old,content, tencot) VALUES (new.id, new.username, 'cập nhật',old.hoanthanh,new.hoanthanh,'Hoàn thành');
end if;
IF (NEW.end != OLD.end) 
   

then
INSERT into sv_history (id, username,action, old,content, tencot) VALUES (new.id, new.username, 'cập nhật',old.end,new.end,'Thời gian kết thúc');
end if;
IF (NEW.start != OLD.start) 
   

then
INSERT into sv_history (id, username,action, old,content, tencot) VALUES (new.id, new.username, 'cập nhật',old.start,new.start,'Thời gian bắt đầu');
end if;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giangvien`
--

CREATE TABLE `giangvien` (
  `username` varchar(20) CHARACTER SET latin1 NOT NULL,
  `magv` varchar(20) NOT NULL,
  `tengv` varchar(50) DEFAULT NULL,
  `mavien` varchar(20) DEFAULT NULL,
  `sdt` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `giangvien`
--

INSERT INTO `giangvien` (`username`, `magv`, `tengv`, `mavien`, `sdt`) VALUES
('ngoclechi', 'MATH1', 'Lê Chí Ngọc', 'sami', '098877777'),
('giangvth', 'SOICT1', 'Vũ Thị Hương Giang', 'soict', '0987654321'),
('tuannm', 'SOICT2', 'Nguyễn Mạnh Tuấn', 'soict', '09887676'),
('tungbt', 'SOICT3', 'Bùi Trọng Tùng', 'soict', '098766255'),
('vuongvd', 'SOICT4', 'Vũ Đức Vượng', 'soict', '098655523'),
('haint', 'SOICT5', 'Nguyễn Tuấn Hải', 'soict', '09887777'),
('huonglt', 'SPKT1', 'Lê Thanh Hương', 'feed', '098877377'),
('lanht', 'SPKT2', 'Hoàng Thị Lan', 'feed', '09123455'),
('thult', 'SPKT3', 'Lê Thanh Thu', 'feed', '0988773737'),
('hanhpt', 'SPKT4', 'Phạm Thị Hạnh', 'feed', '0988773737'),
('hanhph', 'SPKT5', 'Phạm Hồng Hạnh', 'feed', '0983837838');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `history_ct`
--

CREATE TABLE `history_ct` (
  `id` int(11) NOT NULL,
  `username` varchar(20) CHARACTER SET latin1 NOT NULL,
  `loaitien` varchar(20) DEFAULT NULL,
  `tien` int(11) DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  `id_ct` int(11) NOT NULL,
  `note` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `history_ct`
--

INSERT INTO `history_ct` (`id`, `username`, `loaitien`, `tien`, `time`, `id_ct`, `note`) VALUES
(5, '20172017', 'Tiền chu cấp', 1000, '2020-01-05 14:52:25', 15, 'xuanduonghoa'),
(9, '20172017', '2', 30, '2020-01-05 22:04:00', 0, 'ăn'),
(10, '20172017', '2', 200, '2020-01-06 00:36:46', 0, 'đi xe'),
(11, '20172017', '3', 130, '2020-01-06 00:38:04', 0, ''),
(12, '20172017', '3', 130, '2020-01-06 00:42:52', 0, ''),
(13, '20172017', '3', 130, '2020-01-06 00:46:13', 0, ''),
(14, '20172017', '2', 50, '2020-01-10 01:49:52', 0, ''),
(15, '20172017', '2', 50, '2020-01-16 20:47:52', 0, ''),
(16, '20172017', '2', 50, '2020-01-16 20:51:29', 0, ''),
(17, '20172017', '2', 50, '2020-01-16 21:05:15', 0, 'game'),
(18, '20172017', '3', 1000, '2020-01-16 21:06:15', 0, 'lương'),
(19, '20172017', '13', 50, '2020-01-17 08:58:03', 0, 'chơi');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hocki`
--

CREATE TABLE `hocki` (
  `hocki` varchar(10) NOT NULL,
  `ngaybd` date DEFAULT NULL,
  `ngaykt` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `hocki`
--

INSERT INTO `hocki` (`hocki`, `ngaybd`, `ngaykt`) VALUES
('20191', '2019-08-25', '2020-01-20');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hocphi`
--

CREATE TABLE `hocphi` (
  `mavien` varchar(20) NOT NULL,
  `hocki` varchar(10) NOT NULL,
  `sotientc` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `hocphi`
--

INSERT INTO `hocphi` (`mavien`, `hocki`, `sotientc`) VALUES
('bktextline', '20191', 300),
('chemeng', '20191', 340),
('feed', '20191', 300),
('inest', '20191', 340),
('mse', '20191', 300),
('sami', '20191', 340),
('sbft', '20191', 340),
('see', '20191', 360),
('sem', '20191', 360),
('sep', '20191', 300),
('set', '20191', 400),
('sheer', '20191', 340),
('sofl', '20191', 360),
('soict', '20191', 400),
('ste', '20191', 340),
('﻿sme', '20191', 360);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hocphisv`
--

CREATE TABLE `hocphisv` (
  `id` int(11) NOT NULL,
  `username` varchar(20) CHARACTER SET latin1 NOT NULL,
  `hocki` varchar(10) NOT NULL,
  `hocphi` double DEFAULT NULL,
  `hpdanop` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `hocphisv`
--

INSERT INTO `hocphisv` (`id`, `username`, `hocki`, `hocphi`, `hpdanop`) VALUES
(1, '20172017', '20191', 12000, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lichhocloptc`
--

CREATE TABLE `lichhocloptc` (
  `loailop` int(11) NOT NULL,
  `tuan` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `lichhocloptc`
--

INSERT INTO `lichhocloptc` (`loailop`, `tuan`, `id`) VALUES
(1, 2, 1),
(1, 3, 2),
(1, 4, 3),
(1, 5, 4),
(1, 6, 5),
(1, 7, 6),
(1, 8, 7),
(1, 9, 8),
(1, 11, 9),
(1, 12, 10),
(1, 13, 11),
(1, 14, 12),
(1, 15, 13),
(1, 16, 14),
(1, 17, 15),
(1, 18, 16),
(2, 2, 17),
(2, 4, 18),
(2, 6, 19),
(2, 8, 20),
(2, 12, 22),
(2, 14, 23),
(2, 16, 24),
(2, 18, 25),
(3, 3, 26),
(3, 5, 27),
(3, 7, 28),
(3, 9, 29),
(3, 11, 30),
(3, 13, 31),
(3, 15, 32),
(3, 17, 33),
(0, 0, 34);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loptc`
--

CREATE TABLE `loptc` (
  `maloptc` int(11) NOT NULL,
  `mahp` varchar(20) DEFAULT NULL,
  `hocki` varchar(10) DEFAULT NULL,
  `magv` varchar(20) DEFAULT NULL,
  `tgbd` time DEFAULT NULL,
  `tgkt` time DEFAULT NULL,
  `loailop` int(11) DEFAULT NULL,
  `thu` int(11) DEFAULT NULL,
  `phong` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `loptc`
--

INSERT INTO `loptc` (`maloptc`, `mahp`, `hocki`, `magv`, `tgbd`, `tgkt`, `loailop`, `thu`, `phong`) VALUES
(111111, 'MI1010', '20191', 'MATH1', '12:30:00', '15:50:00', 1, 6, 'D9-201'),
(111543, 'IT3090', '20191', 'SOICT1', '12:30:00', '14:55:00', 1, 2, 'TC-407'),
(111544, 'IT3100', '20191', 'SOICT1', '15:05:00', '17:30:00', 1, 3, 'TC-406'),
(111545, 'IT3100', '20191', 'SOICT2', '12:30:00', '14:55:00', 1, 3, 'TC-408'),
(111547, 'IT3180', '20191', 'SOICT2', '14:10:00', '17:30:00', 1, 4, 'TC-209'),
(111548, 'IT3160', '20191', 'SOICT4', '12:30:00', '15:50:00', 1, 5, 'TC-408'),
(111549, 'IT3080', '20191', 'SOICT2', '06:45:00', '09:10:00', 1, 6, 'TC-507'),
(111550, 'IT3080', '20191', 'SOICT3', '09:20:00', '11:45:00', 1, 6, 'TC-209'),
(111552, 'IT3090', '20191', 'SOICT2', '09:20:00', '11:45:00', 1, 6, 'TC-507'),
(111554, 'IT3090', '20191', 'SOICT3', '09:20:00', '11:45:00', 1, 4, 'TC-407'),
(111555, 'IT3100', '20191', 'SOICT3', '06:45:00', '09:10:00', 1, 4, 'TC-208'),
(111556, 'IT3100', '20191', 'SOICT4', '09:20:00', '11:45:00', 1, 4, 'TC-208'),
(111557, 'IT3100', '20191', 'SOICT1', '06:45:00', '09:10:00', 1, 3, 'D3-404'),
(111559, 'IT3180', '20191', 'SOICT3', '06:45:00', '10:05:00', 1, 5, 'TC-212'),
(111560, 'IT3180', '20191', 'SOICT4', '06:45:00', '10:05:00', 1, 3, 'TC-207'),
(111561, 'IT3160', '20191', 'SOICT1', '06:45:00', '10:05:00', 1, 5, 'TC-207'),
(111563, 'IT3080', '20191', 'SOICT4', '09:20:00', '11:45:00', 1, 5, 'TC-211'),
(111565, 'IT3090', '20191', 'SOICT4', '09:20:00', '11:45:00', 1, 3, 'TC-209'),
(111566, 'IT3100', '20191', 'SOICT2', '09:20:00', '11:45:00', 1, 5, 'TC-210'),
(111567, 'IT3100', '20191', 'SOICT3', '06:45:00', '09:10:00', 1, 5, 'TC-211'),
(112326, 'ED3280', '20191', 'SPKT2', '15:05:00', '17:30:00', 1, 2, 'D3-507'),
(112327, 'ED3220', '20191', 'SPKT1', '06:45:00', '09:10:00', 1, 3, 'D3-507'),
(112328, 'ED3220', '20191', 'SPKT2', '09:20:00', '11:45:00', 1, 3, 'D3-507'),
(112329, 'ED3220', '20191', 'SPKT3', '06:45:00', '09:10:00', 1, 5, 'D3-507'),
(112330, 'ED3220', '20191', 'SPKT4', '09:20:00', '11:45:00', 1, 5, 'D3-507'),
(112331, 'ED3220', '20191', 'SPKT5', '06:45:00', '09:10:00', 1, 6, 'D9-204'),
(112332, 'ED3220', '20191', 'SPKT1', '12:30:00', '14:55:00', 1, 4, 'D3-507'),
(112333, 'ED3220', '20191', 'SPKT2', '15:05:00', '17:30:00', 1, 4, 'D3-507'),
(112334, 'ED3220', '20191', 'SPKT3', '12:30:00', '14:55:00', 1, 6, 'D3-507'),
(112335, 'ED3220', '20191', 'SPKT4', '15:05:00', '17:30:00', 1, 6, 'D3-507'),
(112336, 'ED3220', '20191', 'SPKT5', '15:05:00', '17:30:00', 1, 2, 'D5-406'),
(112363, 'ED3220', '20191', 'SPKT1', '09:20:00', '11:45:00', 1, 2, 'TC-507'),
(688082, 'IT3150', '20191', 'SOICT1', NULL, NULL, NULL, NULL, NULL),
(688083, 'IT3150', '20191', 'SOICT2', NULL, NULL, NULL, NULL, NULL),
(688084, 'IT3150', '20191', 'SOICT3', NULL, NULL, NULL, NULL, NULL),
(688085, 'IT3150', '20191', 'SOICT4', NULL, NULL, NULL, NULL, NULL),
(688087, 'IT3150', '20191', 'SOICT5', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quanlychitieusv`
--

CREATE TABLE `quanlychitieusv` (
  `id` int(11) NOT NULL,
  `username` varchar(20) CHARACTER SET latin1 NOT NULL,
  `loaitien` varchar(50) DEFAULT NULL,
  `tongtien` int(11) DEFAULT NULL,
  `loai` int(11) DEFAULT NULL,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `quanlychitieusv`
--

INSERT INTO `quanlychitieusv` (`id`, `username`, `loaitien`, `tongtien`, `loai`, `start`, `end`) VALUES
(2, '20172017', 'Tiền sinh hoạt', 0, -1, '2020-01-05 17:00:00', NULL),
(3, '20172017', 'Tiền làm thêm', NULL, 1, '2020-01-05 21:20:51', NULL),
(4, '20172017', 'Tiền ăn', NULL, -1, '2020-01-16 21:08:08', '2020-01-16 21:10:22'),
(5, '20172017', 'Tiền ăn', NULL, -1, '2020-01-16 21:08:21', NULL),
(6, '20172017', 'Tiền học thêm', NULL, -1, '2020-01-16 21:09:34', '2020-01-16 21:11:15'),
(7, '20172017', 'Tiền học thêm', NULL, -1, '2020-01-16 21:09:58', NULL),
(8, '20172017', 'Tiền học thêm', NULL, -1, '2020-01-16 21:10:04', '2020-01-16 21:15:13'),
(9, '20172017', 'Tiền xe', NULL, -1, '2020-01-16 21:11:28', NULL),
(10, '20172017', 'Tiền xe', NULL, -1, '2020-01-16 21:12:18', '2020-01-16 21:15:07'),
(11, '20172017', '', NULL, -1, '2020-01-16 21:27:40', '2020-01-16 21:28:05'),
(12, '20172017', '', NULL, -1, '2020-01-16 21:28:52', '2020-01-16 21:28:59'),
(13, '20172017', 'Tiền đi chơi với bạn', NULL, -1, '2020-01-16 21:39:51', NULL),
(14, '20172017', 'Tiền đi học', NULL, -1, '2020-01-16 21:41:58', NULL),
(15, '2000', 'tiensinhhoat', NULL, -1, '2020-01-17 00:44:33', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sinhvien`
--

CREATE TABLE `sinhvien` (
  `id` int(11) NOT NULL,
  `username` varchar(20) CHARACTER SET latin1 NOT NULL,
  `mavien` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `sinhvien`
--

INSERT INTO `sinhvien` (`id`, `username`, `mavien`) VALUES
(1, '20172017', 'soict'),
(2, '20173000', 'sami');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `svdk`
--

CREATE TABLE `svdk` (
  `masv` varchar(20) NOT NULL,
  `maloptc` int(11) NOT NULL,
  `diemqt` double DEFAULT NULL,
  `diemck` double DEFAULT NULL,
  `ketqua` double DEFAULT NULL,
  `diemgkmt` double DEFAULT NULL,
  `diemckmt` double DEFAULT NULL,
  `kpigk` double DEFAULT NULL,
  `kpick` double DEFAULT NULL,
  `kpica` double DEFAULT NULL,
  `id` int(11) NOT NULL,
  `tongtghoc` double DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `svdk`
--

INSERT INTO `svdk` (`masv`, `maloptc`, `diemqt`, `diemck`, `ketqua`, `diemgkmt`, `diemckmt`, `kpigk`, `kpick`, `kpica`, `id`, `tongtghoc`) VALUES
('20172017', 111543, 8, 7, 3, 10, 9, NULL, NULL, NULL, 3, 0),
('20172017', 111556, 8, 8, 3.5, 8, 8, NULL, NULL, NULL, 5, 0),
('20172017', 111560, 7, 7.5, 3, 8, 8, NULL, NULL, NULL, 7, 0),
('20172017', 111548, 6.5, 7, 2.5, 8, 8, NULL, NULL, NULL, 8, 0),
('20172017', 111550, 6, 5.5, 2, 7, 8, NULL, NULL, NULL, 9, 0),
('20172017', 112331, 8, 9, 4, 10, 10, NULL, NULL, NULL, 10, 0),
('20172017', 688082, 8, 8, 3.5, 9, 9, NULL, NULL, NULL, 11, 0),
('20172017', 112326, 9, 9, 4, 10, 9.5, NULL, NULL, NULL, 12, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sv_history`
--

CREATE TABLE `sv_history` (
  `data_history_id` int(10) UNSIGNED NOT NULL,
  `id` int(11) DEFAULT NULL,
  `username` varchar(20) CHARACTER SET latin1 NOT NULL,
  `action` varchar(20) DEFAULT NULL,
  `tencot` varchar(100) DEFAULT NULL,
  `old` text,
  `content` text,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `sv_history`
--

INSERT INTO `sv_history` (`data_history_id`, `id`, `username`, `action`, `tencot`, `old`, `content`, `time`) VALUES
(79, NULL, '20172017', 'xóa', NULL, 'sự kiện Cuộc hẹn ngày bắt đầu 2020-01-16 00:00:00 ngày kết thúc 2020-01-17 00:00:00 với ghi chú thi,mức độ hoàn thành 0', NULL, '2020-01-16 13:27:25'),
(81, NULL, '20172017', 'xóa', NULL, 'sự kiện Sự kiện ngày bắt đầu 2020-01-16 13:00:00 ngày kết thúc 2020-01-16 15:00:00 với ghi chú game,mức độ hoàn thành 0', NULL, '2020-01-16 13:29:07'),
(83, NULL, '20172017', 'xóa', NULL, 'sự kiện Mạng máy tính ngày bắt đầu 2020-01-16 13:00:00 ngày kết thúc 2020-01-16 15:30:00 với ghi chú thi,mức độ hoàn thành 0', NULL, '2020-01-16 13:29:29'),
(84, 22, '20172017', 'cập nhật', 'Hoàn thành', '0', '100', '2020-01-16 13:29:48'),
(86, 27, '20172017', 'thêm', NULL, NULL, 'sự kiện Kỹ năng mềm ngày bắt đầu 2020-01-16 16:00:00 ngày kết thúc 2020-01-16 17:00:00 với ghi chú báo cáo', '2020-01-16 13:37:03'),
(87, NULL, '20172017', 'xóa', NULL, 'sự kiện Kỹ năng mềm ngày bắt đầu 2020-01-16 16:00:00 ngày kết thúc 2020-01-16 17:00:00 với ghi chú báo cáo,mức độ hoàn thành 0', NULL, '2020-01-16 13:37:16'),
(88, 26, '20172017', 'cập nhật', 'Hoàn thành', '0', '75', '2020-01-16 13:38:37'),
(89, NULL, '20172017', 'xóa', NULL, 'sự kiện Mạng máy tính ngày bắt đầu 2020-01-16 11:30:00 ngày kết thúc 2020-01-16 14:00:00 với ghi chú thi,mức độ hoàn thành 75', NULL, '2020-01-16 13:38:47'),
(90, 28, '20172017', 'thêm', NULL, NULL, 'sự kiện Project I ngày bắt đầu 2020-01-16 13:30:00 ngày kết thúc 2020-01-16 15:30:00 với ghi chú thi', '2020-01-16 13:45:37'),
(91, 29, '20172017', 'thêm', NULL, NULL, 'sự kiện Nhập môn công nghệ phần mềm ngày bắt đầu 2020-01-16 01:00:00 ngày kết thúc 2020-01-16 04:00:00 với ghi chú thi', '2020-01-16 15:50:27'),
(92, 30, '20172017', 'thêm', NULL, NULL, 'sự kiện Mạng máy tính ngày bắt đầu 2020-01-16 17:00:00 ngày kết thúc 2020-01-16 20:00:00 với ghi chú báo cáo', '2020-01-16 15:50:42'),
(93, 31, '20172017', 'thêm', NULL, NULL, 'sự kiện Cơ sở dữ liệu ngày bắt đầu 2020-01-16 21:00:00 ngày kết thúc 2020-01-17 00:00:00 với ghi chú ôn', '2020-01-16 15:51:07'),
(94, 29, '20172017', 'cập nhật', 'Hoàn thành', '0', '100', '2020-01-16 15:53:46'),
(95, 30, '20172017', 'cập nhật', 'Hoàn thành', '0', '100', '2020-01-16 15:53:54'),
(96, 31, '20172017', 'cập nhật', 'Hoàn thành', '0', '75', '2020-01-16 15:53:58'),
(97, 28, '20172017', 'cập nhật', 'Hoàn thành', '0', '50', '2020-01-16 15:54:06'),
(98, 28, '20172017', 'cập nhật', 'Hoàn thành', '50', '25', '2020-01-16 15:54:12'),
(99, 32, '20172017', 'thêm', NULL, NULL, 'sự kiện Lập trình hướng đối tượng ngày bắt đầu 2020-01-15 09:00:00 ngày kết thúc 2020-01-15 13:30:00 với ghi chú game', '2020-01-16 16:36:38'),
(100, 32, '20172017', 'cập nhật', 'Hoàn thành', '0', '100', '2020-01-16 16:36:44'),
(101, 32, '20172017', 'cập nhật', 'Hoàn thành', '100', '75', '2020-01-16 17:57:31'),
(102, 14, '20172017', 'cập nhật', 'Hoàn thành', '100', '50', '2020-01-16 17:58:11'),
(103, 16, '20172017', 'cập nhật', 'Hoàn thành', '100', '0', '2020-01-16 17:58:23'),
(104, 33, '20172017', 'thêm', NULL, NULL, 'sự kiện Nhập môn công nghệ phần mềm ngày bắt đầu 2020-01-17 08:00:00 ngày kết thúc 2020-01-17 11:00:00 với ghi chú thi', '2020-01-17 01:55:55'),
(105, 33, '20172017', 'cập nhật', 'Hoàn thành', '0', '100', '2020-01-17 01:56:36'),
(106, 31, '20172017', 'cập nhật', 'Hoàn thành', '75', '100', '2020-01-17 03:08:41'),
(107, 30, '20172017', 'cập nhật', 'Hoàn thành', '100', '0', '2020-01-17 03:09:38');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tienchucap`
--

CREATE TABLE `tienchucap` (
  `id` int(11) NOT NULL,
  `username` varchar(20) CHARACTER SET latin1 NOT NULL,
  `sinhvien` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `tien` int(11) DEFAULT NULL,
  `time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tienchucap`
--

INSERT INTO `tienchucap` (`id`, `username`, `sinhvien`, `tien`, `time`) VALUES
(1, 'xuanduonghoa', '20172017', 4000, '2019-12-23 07:42:59'),
(2, 'xuanduonghoa', '20172017', 450, '2019-12-23 07:47:23'),
(3, 'xuanduonghoa', '20172017', 450, '2019-12-23 07:50:43'),
(6, 'xuanduonghoa', '20172017', 2147483647, '2019-12-23 09:36:45'),
(8, 'xuanduonghoa', '20172017', 3000, '2019-12-28 14:35:27'),
(9, 'xuanduonghoa', '20172017', 3000, '2019-12-28 14:36:20'),
(10, 'xuanduonghoa', '20172017', 400, '2019-12-28 14:37:04'),
(11, 'xuanduonghoa', '20172017', 400, '2019-12-28 14:38:40'),
(13, 'xuanduonghoa', '20172017', 1000, '2020-01-05 16:00:00'),
(14, 'xuanduonghoa', '20172017', 1000, '2020-01-05 16:00:00'),
(15, 'xuanduonghoa', '20172017', 1000, '2020-01-05 14:52:25');

--
-- Bẫy `tienchucap`
--
DELIMITER $$
CREATE TRIGGER `add_tienchucap` AFTER INSERT ON `tienchucap` FOR EACH ROW begin
UPDATE vidientu set sodutk=sodutk+new.tien where username=new.sinhvien;
Insert into history_ct (`username`, `loaitien`, `tien`, `time`, `id_ct`, `note`) VALUES (new.sinhvien,'Tiền chu cấp',new.tien, new.time,new.id,new.username);
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `userph`
--

CREATE TABLE `userph` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `sinhvien` varchar(20) DEFAULT NULL,
  `svxacnhan` int(1) NOT NULL,
  `phxacnhan` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `userph`
--

INSERT INTO `userph` (`id`, `username`, `sinhvien`, `svxacnhan`, `phxacnhan`) VALUES
(1, 'xuanduonghoa', '20172017', 1, 1),
(2, 'xuanduonghoa', '20173000', 1, 0),
(3, 'xuanduonghoa', '20172017', 1, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `username` varchar(20) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `gioitinh` varchar(6) NOT NULL,
  `email` varchar(50) NOT NULL,
  `cmt` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` tinyint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`username`, `name`, `gioitinh`, `email`, `cmt`, `password`, `level`) VALUES
('1234', 'Nguyễn Đình Kiên', 'Nam', 'duong.hx173068@sis.hust.edu.vn', '0000000000', '0000', 4),
('2000', 'Nguyễn Đình Kiên', 'Nam', 'duong.hx173068@sis.hust.edu.vn', '0000000000', '1212', 2),
('2017', 'Duong', 'Nam', '', '0000000000', '1111', 1),
('20172017', 'Hoa Xuân Dương', 'Nam', 'hoa@gmail.com', '123', '2017', 2),
('20173000', 'Huy Duy', 'Nam', 'xdh@sis.hust', '033099', '1999', 2),
('giangvth', 'Vũ Thị Hương Giang', 'Nu', 'giangvth@soict.hust', '123321', '2222', 4),
('xuanduonghoa', 'Hoa Văn Hạnh', 'Nam', 'xdh1404@gmail.com', '099999', '1111', 3);

--
-- Bẫy `users`
--
DELIMITER $$
CREATE TRIGGER `add_vidientu` AFTER INSERT ON `users` FOR EACH ROW BEGIN 
INSERT INto vidientu (username, sodutk) VALUES (new.username, 0);

INSERT INTO quanlychitieusv (username,loaitien,loai, start)
VALUES (new.username,'tiensinhhoat',-1,now());
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vidientu`
--

CREATE TABLE `vidientu` (
  `id` int(11) NOT NULL,
  `username` varchar(20) CHARACTER SET latin1 NOT NULL,
  `sodutk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `vidientu`
--

INSERT INTO `vidientu` (`id`, `username`, `sodutk`) VALUES
(1, '20172017', 2000),
(2, '2000', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vien`
--

CREATE TABLE `vien` (
  `mavien` varchar(20) NOT NULL,
  `tenvien` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `vien`
--

INSERT INTO `vien` (`mavien`, `tenvien`) VALUES
('bktextline', 'Dệt may-Da giầy và thời trang'),
('chemeng', 'Kỹ thuật Hóa học'),
('feed', 'Sư phạm Kỹ thuật'),
('inest', 'Khoa học và Công nghệ môi trường'),
('mse', 'Khoa học và Kỹ thuật vật liệu'),
('sami', 'Toán ứng dụng và tin học'),
('sbft', 'Công nghệ sinh học và thực phẩm'),
('see', 'Điện'),
('sem', 'Kinh tế và Quản lý'),
('sep', 'Vật lý Kỹ thuật'),
('set', 'Điện tử viến thông'),
('sheer', 'Khoa học và Công nghệ nhiệt lạnh'),
('sofl', 'Ngoại ngữ'),
('soict', 'Công nghệ thông tin'),
('ste', 'Cơ khí động lực'),
('﻿sme', 'Cơ khí');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `courselist`
--
ALTER TABLE `courselist`
  ADD PRIMARY KEY (`MaHP`);

--
-- Chỉ mục cho bảng `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`);

--
-- Chỉ mục cho bảng `giangvien`
--
ALTER TABLE `giangvien`
  ADD PRIMARY KEY (`magv`),
  ADD KEY `mavien` (`mavien`);

--
-- Chỉ mục cho bảng `history_ct`
--
ALTER TABLE `history_ct`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`);

--
-- Chỉ mục cho bảng `hocki`
--
ALTER TABLE `hocki`
  ADD PRIMARY KEY (`hocki`);

--
-- Chỉ mục cho bảng `hocphi`
--
ALTER TABLE `hocphi`
  ADD PRIMARY KEY (`mavien`,`hocki`);

--
-- Chỉ mục cho bảng `hocphisv`
--
ALTER TABLE `hocphisv`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hocki` (`hocki`),
  ADD KEY `hocphisv_ibfk_2` (`username`);

--
-- Chỉ mục cho bảng `lichhocloptc`
--
ALTER TABLE `lichhocloptc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `loptc`
--
ALTER TABLE `loptc`
  ADD PRIMARY KEY (`maloptc`),
  ADD KEY `mahp` (`mahp`),
  ADD KEY `loailop` (`loailop`),
  ADD KEY `magv` (`magv`),
  ADD KEY `hocki` (`hocki`);

--
-- Chỉ mục cho bảng `quanlychitieusv`
--
ALTER TABLE `quanlychitieusv`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`);

--
-- Chỉ mục cho bảng `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mavien` (`mavien`),
  ADD KEY `username` (`username`);

--
-- Chỉ mục cho bảng `svdk`
--
ALTER TABLE `svdk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `maloptc` (`maloptc`),
  ADD KEY `masv` (`masv`);

--
-- Chỉ mục cho bảng `sv_history`
--
ALTER TABLE `sv_history`
  ADD PRIMARY KEY (`data_history_id`),
  ADD KEY `sv_history_ibfk_1` (`id`),
  ADD KEY `sv_history_ibfk_2` (`username`);

--
-- Chỉ mục cho bảng `tienchucap`
--
ALTER TABLE `tienchucap`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sinhvien` (`sinhvien`),
  ADD KEY `username` (`username`);

--
-- Chỉ mục cho bảng `userph`
--
ALTER TABLE `userph`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sinhvien` (`sinhvien`),
  ADD KEY `username` (`username`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- Chỉ mục cho bảng `vidientu`
--
ALTER TABLE `vidientu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`);

--
-- Chỉ mục cho bảng `vien`
--
ALTER TABLE `vien`
  ADD PRIMARY KEY (`mavien`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT cho bảng `history_ct`
--
ALTER TABLE `history_ct`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `hocphisv`
--
ALTER TABLE `hocphisv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `lichhocloptc`
--
ALTER TABLE `lichhocloptc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `quanlychitieusv`
--
ALTER TABLE `quanlychitieusv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `sinhvien`
--
ALTER TABLE `sinhvien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `svdk`
--
ALTER TABLE `svdk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `sv_history`
--
ALTER TABLE `sv_history`
  MODIFY `data_history_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT cho bảng `tienchucap`
--
ALTER TABLE `tienchucap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `userph`
--
ALTER TABLE `userph`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `vidientu`
--
ALTER TABLE `vidientu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`);

--
-- Các ràng buộc cho bảng `giangvien`
--
ALTER TABLE `giangvien`
  ADD CONSTRAINT `giangvien_ibfk_1` FOREIGN KEY (`mavien`) REFERENCES `vien` (`mavien`);

--
-- Các ràng buộc cho bảng `history_ct`
--
ALTER TABLE `history_ct`
  ADD CONSTRAINT `history_ct_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`);

--
-- Các ràng buộc cho bảng `hocphi`
--
ALTER TABLE `hocphi`
  ADD CONSTRAINT `hocphi_ibfk_1` FOREIGN KEY (`mavien`) REFERENCES `vien` (`mavien`);

--
-- Các ràng buộc cho bảng `hocphisv`
--
ALTER TABLE `hocphisv`
  ADD CONSTRAINT `hocphisv_ibfk_1` FOREIGN KEY (`hocki`) REFERENCES `hocki` (`hocki`),
  ADD CONSTRAINT `hocphisv_ibfk_2` FOREIGN KEY (`username`) REFERENCES `svdk` (`masv`);

--
-- Các ràng buộc cho bảng `loptc`
--
ALTER TABLE `loptc`
  ADD CONSTRAINT `loptc_ibfk_1` FOREIGN KEY (`mahp`) REFERENCES `courselist` (`MaHP`),
  ADD CONSTRAINT `loptc_ibfk_2` FOREIGN KEY (`loailop`) REFERENCES `lichhocloptc` (`id`),
  ADD CONSTRAINT `loptc_ibfk_3` FOREIGN KEY (`magv`) REFERENCES `giangvien` (`magv`),
  ADD CONSTRAINT `loptc_ibfk_4` FOREIGN KEY (`hocki`) REFERENCES `hocki` (`hocki`);

--
-- Các ràng buộc cho bảng `quanlychitieusv`
--
ALTER TABLE `quanlychitieusv`
  ADD CONSTRAINT `quanlychitieusv_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`);

--
-- Các ràng buộc cho bảng `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD CONSTRAINT `sinhvien_ibfk_1` FOREIGN KEY (`mavien`) REFERENCES `vien` (`mavien`),
  ADD CONSTRAINT `sinhvien_ibfk_2` FOREIGN KEY (`username`) REFERENCES `users` (`username`);

--
-- Các ràng buộc cho bảng `svdk`
--
ALTER TABLE `svdk`
  ADD CONSTRAINT `svdk_ibfk_1` FOREIGN KEY (`maloptc`) REFERENCES `loptc` (`maloptc`),
  ADD CONSTRAINT `svdk_ibfk_2` FOREIGN KEY (`masv`) REFERENCES `users` (`username`);

--
-- Các ràng buộc cho bảng `tienchucap`
--
ALTER TABLE `tienchucap`
  ADD CONSTRAINT `tienchucap_ibfk_1` FOREIGN KEY (`sinhvien`) REFERENCES `users` (`username`),
  ADD CONSTRAINT `tienchucap_ibfk_2` FOREIGN KEY (`username`) REFERENCES `users` (`username`);

--
-- Các ràng buộc cho bảng `userph`
--
ALTER TABLE `userph`
  ADD CONSTRAINT `userph_ibfk_1` FOREIGN KEY (`sinhvien`) REFERENCES `users` (`username`),
  ADD CONSTRAINT `userph_ibfk_2` FOREIGN KEY (`username`) REFERENCES `users` (`username`);

--
-- Các ràng buộc cho bảng `vidientu`
--
ALTER TABLE `vidientu`
  ADD CONSTRAINT `vidientu_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
