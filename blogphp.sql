-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 04, 2022 lúc 01:38 PM
-- Phiên bản máy phục vụ: 10.4.17-MariaDB
-- Phiên bản PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `blogphp`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(10) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `parent_id` int(10) DEFAULT NULL COMMENT 'danh mục cha',
  `thumbnail` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `description` mediumtext DEFAULT NULL COMMENT 'Mô tả thể loại',
  `created_at` timestamp NULL DEFAULT current_timestamp() COMMENT 'Ngày tạo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent_id`, `thumbnail`, `slug`, `description`, `created_at`) VALUES
(1, 'Thời sự', NULL, '/thoisu.png', 'thoi-su', 'Chuyên mục thời sự', '2019-08-09 07:53:31'),
(2, 'Tin trong nước', 1, '/tintrongnuoc.png', 'tin-trong-nuoc', 'Chuyện mục thời sự - Tin trong nước', '2019-08-09 07:55:00'),
(3, 'Tin nước ngoài', 1, '/tinnuocngoai.png', 'tin-nuoc-ngoai', 'Chuyện mục thời sự - Tin nước ngoài', '2019-08-09 07:55:31'),
(4, 'Văn hóa - Xã hội', NULL, '/vanhoa.png', 'van-hoa-xa-hoi', 'Chuyên mục văn hóa - xã hội', '2019-08-09 07:56:12'),
(5, 'Công nghệ', NULL, '/congnghe.png', 'cong-nghe', 'Chuyên mục công nghệ', '2019-08-09 07:58:11'),
(6, 'Tin tức lập trình', 5, '/laptrinh.png', 'tin-tuc-lap-trinh', 'Chyện mục công nghệ - tin tức lập trình', '2019-08-09 07:58:50'),
(7, 'Tin tức công nghệ ', 5, '/tintuccongnghe.png', 'tin-tuc-cong-nghe', 'Chyên mục công nghệ - tin tức công nghệ', '2019-08-09 08:00:01'),
(38, 'Tin thể thao', NULL, NULL, NULL, NULL, '2021-12-24 08:27:07');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `id` int(10) NOT NULL,
  `title` varchar(255) DEFAULT NULL COMMENT 'Tiêu đề bài viết',
  `description` text DEFAULT NULL COMMENT 'Mô tả bài viết',
  `thumbnail` varchar(255) DEFAULT NULL COMMENT 'ảnh bài viết',
  `content` text DEFAULT NULL COMMENT 'Nội dung bài viết',
  `slug` varchar(255) DEFAULT NULL,
  `view_count` bigint(20) DEFAULT 0 COMMENT 'số lượng xem',
  `user_id` int(10) DEFAULT NULL COMMENT 'tác giả',
  `category_id` int(10) DEFAULT NULL COMMENT 'Bài post này thuộc danh mục nào',
  `created_at` timestamp NULL DEFAULT current_timestamp() COMMENT 'Ngày tạo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `posts`
--

INSERT INTO `posts` (`id`, `title`, `description`, `thumbnail`, `content`, `slug`, `view_count`, `user_id`, `category_id`, `created_at`) VALUES
(1, 'Hiệp ước INF sụp đổ, Mỹ tuyên bố sớm triển khai tên lửa ở châu Á đối phó Trung Quốc?', 'Ngày 3/8, một ngày sau khi Mỹ chấm dứt Hiệp ước kiểm soát tên lửa tầm trung và tầm ngắn (INF), Bộ trưởng Quốc phòng Mark Esper tuyên bố ủng hộ việc Mỹ sớm triển khai hệ thống tên lửa tầm trung mới ở châu Á.', 'lq.jpg', 'Reuters đưa tin, người đứng đầu Lầu Năm Góc Mark Esper ngày 3/8 tuyên bố ủng hộ việc Mỹ sớm bố trí các tên lửa tầm trung phóng từ mặt đất tại châu Á, một ngày sau khi Mỹ rút khỏi hiệp ước kiểm soát vũ khí quan trọng ký với Nga từ thời Chiến tranh Lạnh.Tuyên bố trên được đưa ra giữa lúc Mỹ ngày càng quan ngại về những ưu thế quân sự của Trung Quốc tại khu vực châu Á- Thái Bình Dương.Phát biểu với báo giới tại Sydney, khi được hỏi liệu Mỹ có cân nhắc triển khai các loại tên lửa tầm trung ở châu Á hay không sau khi Mỹ và Nga đã chấm dứt hiệu lực của Hiệp ước các lực lượng hạt nhân tầm trung và tầm ngắn (INF), ông Esper nói: ', 'hiep-uoc-inf-sup-do-my-tuyen-bo-som-trien-khai-ten-lua-o-chau-a-doi-pho-trung-quoc', 103, 1, 1, '2019-08-09 08:06:10'),
(2, 'Galaxy Note10 có gì hay ho hơn Galaxy S10?', 'Samsung Galaxy Note10 vs Galaxy S10+ có sự khác biệt rõ ràng cả về ngoại hình cũng như các tính năng mới.', 'mèo cào.jpg', 'Galaxy Note10 mới cuối cùng đã xuất hiện chính thức. Theo truyền thống, mỗi năm khi một thiết bị Galaxy Note mới xuất hiện, chúng chắc chắn được so sánh với các flagship mới nhất của Samsung từ dòng Galaxy S. Và năm nay, Galaxy S10+ là phiên bản mà gần nhất với Galaxy Note10 về thông số kỹ thuật và tính năng.Màn hình 1080p trên Galaxy Note10Màn hình của Galaxy Note10 chỉ nhỏ hơn 1 inch so với màn hình trên Galaxy S10 +, đáng chú ý hơn là độ phân giải trên Galaxy Note10 chỉ là 1080x2280 pixel so với 1440x3040 của Galaxy S10 +.', 'galaxy-note10-co-gi-hay-ho-hon-galaxy-s10', 3, 1, 7, '2019-08-09 08:06:13'),
(5, 'Thống kê ấn tượng: Quang Hải tạo ra nhiều cơ hội ghi bàn nhất vòng bảng AFF Cup 2020', 'Theo thống kê từ ban tổ chức, Quang Hải đã tạo ra 12 cơ hội ghi bàn cho các đồng đội ở tuyển Việt Nam sau 4 trận đấu ở vòng bảng AFF Cup 2020. Trung bình mỗi trận Quang Hải có 3 đường chuyền quan trọng tạo cơ hội ghi bàn.Trong 12 lần tạo cơ hội, Quang Hải có được hai kiến tạo. Đầu tiên, Quang Hải giật gót tạo điều kiện cho Công Phượng đi bóng rồi dứt điểm nâng tỷ số lên 2-0 trong trận thắng 3-0 trước Malaysia. Thứ hai, anh chọc khe thuận lợi để Tiến Linh phá bẫy việt vị ghi bàn mở tỷ số ở trận thắng Campuchia 4-0.  Xếp sau Quang Hải về số lần tạo ra cơ hội là đồng đội Lương Xuân Trường và Shahdan Sulaiman (Singapore) với cùng 11 lần.  Con số này của Theerathon Bunmathan (Thái Lan) là 10. Đáng chú ý, Bunmathan là hậu vệ trái và chỉ thi đấu hai trận. Như vậy, trung bình mỗi trận anh tạo ra 5 cơ hội có thể ghi bàn cho đồng đội, nhiều nhất tại giải.    Tiền vệ Nguyễn Hoàng Đức có 8 lần tạo ra cơ hội, ngang bằng với cặp tiền vệ của Philippines là Stephan Schrock và Kevin Ingreso.  Ngoài 2 kiến tạo, Quang Hải ghi được 2 bàn thắng. Anh góp dấu giày vào 4/9 bàn thắng của tuyển Việt Nam, chiếm 44,4%. Trung bình cứ 70 phút có mặt trên sân tại AFF Cup 2020, Quang Hải lại góp công vào 1 bàn thắng của tuyển Việt Nam.  Bên cạnh Quang Hải, tiền đạo Teerasil Dangda (Thái Lan), tiền vệ Safawi Rasid (Malaysia), tiền đạo Bienvenido (Philippines) và tiền vệ Evan Dimas (Indonesia) cũng là những người góp công vào 4 bàn thắng cho đội nhà. Người dẫn đầu là tiền vệ Irfan Jaya (Indonesia) với 3 bàn thắng và 2 kiến tạo.', 'quanghai.jpg', 'Nguyễn Quang Hải sở hữu một thống kê ấn tượng sau vòng bảng AFF Cup 2020.', 'thong-ke-an-tuong-quang-hai-tao-ra-nhieu-co-hoi-ghi-ban-nhat-vong-bang-aff-cup-2020', 8, 1, 2, '2021-12-21 07:42:10'),
(7, 'Becamex Binh Duong announced goodbye to Anh Duc', 'Chuyên mục thời sự123', 'banner-quang-cao-giay.png', 'csgfghfgjkkhldsdsdf', 'becamex-binh-duong-announced-goodbye-to-anh-duc', 6, 15, 4, '2021-12-21 08:49:43'),
(9, 'Những khuyết điểm của ĐT Việt Nam sau vòng bảng AFF Cup 2020', 'Dưới thời HLV Park Hang-seo, nền tảng thể lực của các cầu thủ luôn được đánh giá rất cao mỗi khi bước vào các giải đấu. Dù phải thi đấu với những đội bóng hàng đầu tại Châu Á ở vòng loại thứ 3 World Cup, nhưng thể lực chưa bao giờ trở thành nỗi lo với chúng ta.  Trước khi bước vào AFF Cup cũng vậy, chúng ta đã có quá trình chuẩn bị cho giải đấu khá kĩ càng. Thế nhưng quan sát ĐT Việt Nam ở 4 trận đấu vừa qua, rõ ràng thể lực đang là vấn đề cực lớn ở chặng đường sắp tới tại AFF Cup.  Chắc hẳn khi nhìn \"Những ngôi sao vàng\" thi đấu những phút cuối cùng trận gặp Campuchia, nhiều người sẽ thắc mắc, tại sao chúng ta không đẩy nhanh tốc độ trận đấu nhằm tìm kiếm thêm bàn thắng và giành lấy ngôi đầu bảng. Nhưng nếu quan sát kĩ, thể lực của các cầu thủ đã không còn đảm bảo để chúng ta có thể duy trì một thế trận dồn ép đối phương ở tốc độ cao như những phút đầu của hai hiệp đấu.  Thậm chí khi không còn giữ được thể trạng ở mức sung sức, các học trò của HLV Park Hang-seo thực hiện khá nhiều đường chuyền hỏng giúp đối phương có cơ hội gây nguy hiểm. Không phải chỉ ở trận đấu với Campuchia, ngay cả trận đấu với Indonesia, chúng ta là người kiểm soát hoàn toàn trận đấu, không phải vất vả chống đỡ những tình huống tấn công của đối phương.', 'bongda.jpg', 'Việt Nam đã kết thúc vòng bảng tại AFF Cup với thành tích bất bại và bước vào bán kết bằng ngôi nhì bảng. Ngoài ưu điểm đã thể hiện ở 4 trận đấu đã qua, chắc chắn còn đâu đó những khiếm khuyết mà chúng ta cần khắc phục trước khi bước vào cuộc quyết đấu với đại kình địch Thái Lan.', 'nhung-khuyet-diem-cua-dt-viet-nam-sau-vong-bang-aff-cup-2020', 12, 1, 2, '2021-12-22 04:56:35'),
(14, 'Trọng tài V.League lý giải việc thủ môn Thái Lan chỉ nhận thẻ vàng dù lao ra khỏi vòng cấm để phạm lỗi với Văn Toàn', 'Phút 42 của trận đấu, Văn Toàn có pha tấn công về phía khung thành của tuyển Thái Lan sau khi Việt Nam bị dẫn trước 2-0. Ở tình huống này, thủ môn Chatchai suýt trả giá trong tình huống sai lầm khi rời bỏ khung thành. Thủ môn Thái Lan bị Văn Toàn vượt qua, sau đó chủ động phạm lỗi và phải nhận thẻ vàng.  Sau tình huống này, các tuyển thủ Việt Nam cho rằng Chatchai đáng ra phải nhận thẻ đỏ. Dù vậy, lý giải về quyết định này, trọng tài đang điều khiển tại V.League cho biết:  \"Trong tình huống bóng này, thiếu một yếu tố để xử lý thẻ đỏ là hướng bóng không vào cầu môn. Nếu bóng đi đúng hướng, có thể sẽ khác\".Trận đấu đang diễn ra vô vùng kịch tính, sau hiệp 1 Thái Lan vẫn đang dẫn trước với tỉ số 2-0 nên các cầu thủ Việt Nam đang rất nóng vội gỡ bàn.', 'vantoan.jpg', 'Thủ môn Chatchai chỉ nhận thẻ vàng trong tình huống tranh chấp với Văn Toàn.', 'trong-tai-vleague-ly-giai-viec-thu-mon-thai-lan-chi-nhan-the-vang-du-lao-ra-khoi-vong-cam-de-pham-loi-voi-van-toan', 5, 14, 2, '2021-12-23 14:59:27'),
(18, 'Vụ cướp ngân hàng ở Hải Phòng: Được bạn trai đưa hơn 1,3 tỷ đồng, cô gái cầm đi mua iPhone 13 Pro Max,...', 'Liên quan đến vụ nổ súng cướp trên 3 tỷ đồng trong ngân hàng ở Hải Phòng, ngày 24/1, thông tin từ phòng Cảnh sát hình sự Công an TP Hải Phòng cho biết, đã ra quyết định khởi tố vụ án, khởi tố bị can, bắt tạm giam đối với Nguyễn Văn Nam (SN 1998, trú xã Nghĩa Lộ, huyện Cát Hải, Hải Phòng) về các tội danh Cướp tài sản và Tàng trữ, sử dụng, mua bán trái phép vũ khí quân dụng.  Bên cạnh đó, cơ quan công an cũng ra quyết định khởi tố bị can Trần Thị Thu Thuỷ (SN 2000, trú thị trấn Cát Bà, huyện Cát Hải), là bạn gái của Nam về hành vi Chứa chấp, tiêu thụ tài sản do người khác phạm tội mà có.  Tại cơ quan công an, Thuỷ khai nhận khi nhận được hơn 1,3 tỷ đồng từ Nam, Thủy đã dùng để mua 1 điện thoại iPhone 13 Pro Max với giá 30,9 triệu đồng, 1 Macbook Air với giá 20,5 triệu đồng, 1 sạc iPhone với giá 300 nghìn đồng. Tiếp đó, Thuỷ còn mua 1 vòng đeo tay bằng vàng trắng, 1 nhẫn vàng trắng đính kim cương với giá 28 triệu đồng.', 'vu-dung-sung-cuop-ngan-hang-o-hai-phong-cuop-xong-di-mua-sieu-xe-phan-khoi-lon-sieu-xe-1641713226-616-width660height870-16417144394222066114206.jpg', 'Sau khi cướp được hơn 3 tỷ đồng từ ngân hàng, Nguyễn Văn Nam đã đưa cho bạn gái hơn 1,3 tỷ đồng. Có tiền, cô bạn gái đã đi mua vàng bạc, điện thoại, máy tính...', 'vu-cuop-ngan-hang-o-hai-phong-duoc-ban-trai-dua-hon-13-ty-dong-co-gai-cam-di-mua-iphone-13-pro-max', 11, 14, 4, '2022-01-24 13:08:13');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `avatar` longtext DEFAULT NULL COMMENT 'Đường dẫn ảnh',
  `created_at` timestamp NULL DEFAULT current_timestamp() COMMENT 'Ngày tạo',
  `role` int(11) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `avatar`, `created_at`, `role`, `address`, `phone`) VALUES
(1, 'Trần Minh Đức', 'ductm.kma@gmail.com', '$2y$10$ogjblHkl8/z5zVVZJj/PbumuFc3jiGZHWqaF5emuVNfPYPBf8nfyW', '', '2019-08-09 07:47:54', 0, NULL, NULL),
(2, 'Vũ Văn Thương', 'thuongvv.hust@gmail.com', '$2y$10$ogjblHkl8/z5zVVZJj/PbumuFc3jiGZHWqaF5emuVNfPYPBf8nfyW', '', '2019-08-09 07:50:10', 0, NULL, NULL),
(4, 'Hoàng Trung Hiếu', 'hieuht@gmail.com', '$2y$10$ogjblHkl8/z5zVVZJj/PbumuFc3jiGZHWqaF5emuVNfPYPBf8nfyW', '', '2019-08-09 07:51:11', 0, NULL, NULL),
(5, 'Nguyễn Hải Anh', 'haianh.bka@gmail.com', '$2y$10$ogjblHkl8/z5zVVZJj/PbumuFc3jiGZHWqaF5emuVNfPYPBf8nfyW', '', '2019-08-09 07:51:45', 0, NULL, NULL),
(14, 'Bùi Xuân Xếp', 'buixuanxep@gmail.com', '96e79218965eb72c92a549dd5a330112', 'xep.jpg', '2021-12-20 14:21:44', 1, 'Ha Noi', '0886832574'),
(15, 'Tran Dinh Nghia', 'trandinhnghia@gmail.com', '96e79218965eb72c92a549dd5a330112', 'dinh nghia giang ho.png', '2021-12-20 14:26:45', 0, NULL, NULL),
(21, 'Trần Sỹ hà', 'transyha@gmail.com', '96e79218965eb72c92a549dd5a330112', 'duc chinh.png', '2021-12-22 13:27:14', 0, 'Dong anh', '0987654321');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`);

--
-- Các ràng buộc cho bảng `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
