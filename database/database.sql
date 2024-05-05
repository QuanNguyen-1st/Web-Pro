--
-- Database: web1
--

DROP DATABASE IF EXISTS web1;
CREATE DATABASE IF NOT EXISTS web1 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE web1;
-- --------------------------------------------------------

--
-- Table structure for table admin
--

CREATE TABLE admin (
  username varchar(255) NOT NULL,
  email varchar(255) NOT NULL,
  password varchar(255) DEFAULT NULL,
  role varchar(255) DEFAULT '0',
  createAt datetime DEFAULT NULL,
  updateAt datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table admin
--

INSERT INTO admin (username, email, password, role, createAt, updateAt) VALUES
('admin', 'admin@gmail.com', '$2y$10$0PhTjj7OnPIQYbx9LP8w9ehSKZOzRh79hSNI.kk9p9Tq9fWu5lWtK', '1', NULL, '2022-06-12 14:02:17'),
('khang', 'khang@gmail.com', '$2y$10$FPxhqC1y4a5wrHOIMuLVnu7NfblijUyzOzO0KE3zZ4z1gpjUI8z8y', '0', '2023-12-06 16:18:07', '2023-12-06 16:18:07'),
('sythanh', 'sythanh@gmail.com', '$2y$10$0PhTjj7OnPIQYbx9LP8w9ehSKZOzRh79hSNI.kk9p9Tq9fWu5lWtK', '0', NULL, '2022-06-12 14:02:09');

-- --------------------------------------------------------

--
-- Table structure for table comment
--

CREATE TABLE comment (
  id int(11) NOT NULL,
  date datetime DEFAULT NULL,
  approved tinyint(1) DEFAULT NULL,
  content varchar(10000) DEFAULT NULL,
  news_id int(11) NOT NULL,
  user_id varchar(255) NOT NULL,
  parent int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table comment
--

INSERT INTO comment (id, date, approved, content, news_id, user_id, parent) VALUES
(55, '2023-12-06 16:25:26', 0, 'rất hay', 5, 'phamduchao2k3@gmail.com', NULL),
(58, '2023-12-06 16:36:46', 1, 'hay quá !!!', 4, 'abc@gmail.com', NULL),
(59, '2023-12-06 16:38:19', 1, 'chúc mừng zaloPay', 4, 'abc@gmail.com', NULL),
(63, '2023-12-06 17:01:41', 1, 'ai muốn join team thì ib mình nhé sđt: 012345678', 5, 'phamduchao2k3@gmail.com', NULL),
(66, '2023-12-06 17:03:49', 1, 'ai còn slot liên hệ mình nhé...', 5, 'abc@gmail.com', NULL),
(67, '2023-12-06 17:05:17', 1, 'mình nè bạn ơi!', 5, 'abc@gmail.com', 63),
(68, '2023-12-06 17:05:53', 1, '. hóng', 5, 'abc@gmail.com', 66),
(69, '2023-12-06 17:06:27', 1, '. len top', 5, 'abc@gmail.com', 66),
(70, '2023-12-06 17:06:50', 1, 'và gojek nữa :))', 4, 'abc@gmail.com', 59),
(71, '2023-12-06 17:08:31', 1, 'ib mình nhé :3', 5, 'hao.pham1652003@hcmut.edu.vn', 63),
(72, '2023-12-06 18:57:09', 1, 'ok', 5, 'hao.pham1652003@hcmut.edu.vn', 55),
(79, '2023-12-06 19:11:01', 1, 'quá lý tưởng', 1, 'hao.pham1652003@hcmut.edu.vn', NULL),
(80, '2023-12-06 19:11:26', 1, 'đúng vậy', 1, 'hao.pham1652003@hcmut.edu.vn', 79),
(81, '2023-12-06 19:12:08', 1, 'đúng vậy', 1, 'hao.pham1652003@hcmut.edu.vn', 79),
(82, '2023-12-06 19:13:33', 1, 'tuyệt vời', 5, 'hao.pham1652003@hcmut.edu.vn', NULL),
(83, '2023-12-06 19:14:51', 1, 'quá tự hào', 3, 'hao.pham1652003@hcmut.edu.vn', NULL),
(84, '2023-12-06 19:16:01', 1, 'ngạo nghễ vn', 3, 'hao.pham1652003@hcmut.edu.vn', NULL),
(85, '2023-12-06 19:24:13', 1, 'quá ngạo nghễ', 3, 'hao.pham1652003@hcmut.edu.vn', NULL),
(86, '2023-12-06 19:34:17', 1, 'đúng vậy', 3, 'abc@gmail.com', 85),
(87, '2023-12-06 19:37:00', 1, 'quá đúng!', 3, 'abc@gmail.com', 84),
(88, '2023-12-06 19:39:04', 1, 'tuyệt vời', 4, 'abc@gmail.com', NULL),
(95, '2023-12-06 20:41:05', 1, 'tuyệt vời', 6, 'hao.pham1652003@hcmut.edu.vn', NULL),
(96, '2023-12-06 20:42:52', 1, 'thích quá', 5, 'hao.pham1652003@hcmut.edu.vn', NULL),
(98, '2023-12-07 10:37:29', 1, 'ok', 6, 'hao.pham1652003@hcmut.edu.vn', 95),
(99, '2023-12-07 10:37:34', 1, 'hay quá', 6, 'hao.pham1652003@hcmut.edu.vn', NULL);

-- --------------------------------------------------------

--
-- Table structure for table company
--

-- CREATE TABLE company (
--   id int(11) NOT NULL,
--   name varchar(255) DEFAULT NULL,
--   address varchar(1000) DEFAULT NULL,
--   createAt datetime DEFAULT NULL,
--   updateAt datetime DEFAULT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --
-- -- Dumping data for table company
-- --

-- INSERT INTO company (id, name, address, createAt, updateAt) VALUES
-- (1, 'Chi nhánh TPHCM', '268 Lý Thường Kiệt, Phường 14, Quận 10, TPHCM', NULL, NULL),
-- (2, 'Chi nhánh Đà Nẵng', 'Số 346, đường 2/9,\nQuận Hải Châu,\nThành phố Đà Nẵng', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table creates
--

CREATE TABLE creates (
  news_id int(11) NOT NULL,
  admin_email varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table creates
--

INSERT INTO creates (news_id, admin_email) VALUES
(1, 'admin@gmail.com'),
(3, 'admin@gmail.com'),
(4, 'sythanh@gmail.com'),
(5, 'sythanh@gmail.com'),
(6, 'khang@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table news
--

CREATE TABLE news (
  id int(11) NOT NULL,
  status tinyint(1) DEFAULT NULL,
  date datetime DEFAULT NULL,
  description varchar(1000) DEFAULT NULL,
  content varchar(10000) DEFAULT NULL,
  title varchar(255) DEFAULT NULL,
  img varchar(255) DEFAULT NULL 
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table news
--

INSERT INTO news (id, status, date, description, content, title, img) VALUES
(1, 1, '2022-04-05 17:00:00', 'Khánh thành từ năm 2019, VNG Campus - trụ sở của công ty VNG được xây dựng theo mô hình văn phòng thông minh quốc tế, có không gian làm việc rộng lớn và tích hợp đầy đủ tiện nghi để phục vụ các nhu cầu ăn uống, tập luyện, giải trí, thư giãn, chăm sóc sức khỏe cho các thành viên. Để tìm hiểu rõ hơn về một trong những nơi làm việc tốt nhất châu Á, hãy cùng VNG khám phá bài viết sau đây bạn nhé!', 'Nằm tại Khu chế xuất Tân Thuận (quận 7), VNG Campus là trụ sở chính của VNG, được đưa vào hoạt động từ tháng 9/2019 với tổng diện tích 52.000 m2, diện tích sàn văn phòng hơn 18.000 m2 và sàn lớn nhất lên tới hơn 13.000 m2. VNG Campus có tất cả 3 tầng làm việc với số lượng nhân viên hiện tại là hơn 2000 thành viên với 5 nhóm phòng ban chính gồm nhóm kinh doanh (Business Unit): Trò chơi trực tuyến, Nền tảng kết nối, Thanh toán và tài chính, Chuyển đổi số; và nhóm Hỗ trợ kinh doanh (Back Office).\r\n\r\nNgoài không gian làm việc, VNG Campus còn được thiết kế để thúc đẩy sự cân bằng giữa công việc và cuộc sống, hướng đến sự khỏe mạnh và hạnh phúc cho tất cả thành viên (Starter). Lấy cảm hứng từ các mô hình văn phòng hiện đại đẳng cấp thế giới, VNG Campus được tích hợp thêm các không gian ẩm thực, thư giãn, giải trí, thể thao, thực vật, cảnh quan...\r\n\r\n\r\nVới thiết kế mở, linh hoạt với ít vách ngăn, văn phòng VNG không chỉ tràn ngập cây xanh mà còn tận dụng ánh sáng tự nhiên qua giếng trời để tạo cảm giác thư giãn. VNG muốn tạo ra một nơi làm việc lý tưởng để khuyến khích sự trao đổi và sáng tạo, nâng cao năng suất, tính minh bạch, sự hợp tác và hiểu biết lẫn nhau giữa các thành viên.', 'VNG Campus - mô hình văn phòng thông minh quốc tế có gì?', NULL),
(3, 1, '2023-12-01 05:13:05', 'Được thành lập từ năm 2004, VNG đã nỗ lực vươn lên từ một công ty khởi nghiệp 5 người để trở thành doanh nghiệp kỳ lân đầu tiên của Việt Nam. VNG đặt sứ mệnh “Kiến tạo công nghệ và Phát triển Con người. Từ Việt Nam vươn tầm thế giới\" và có gần 4000 thành viên đang làm việc ở 10 thành phố trên toàn cầu. Để tìm hiểu rõ hơn về hành trình VNG Global, hãy cùng chúng tôi tham khảo chi tiết bài viết sau đây! ', '\"VNG là công ty gì?\" vẫn luôn là câu hỏi nhận được nhiều sự quan tâm từ đông đảo đọc giả. Theo đó, VNG là doanh nghiệp công nghệ sở hữu hệ sinh thái kỹ thuật số hàng đầu tại Việt Nam, với danh mục sản phẩm và dịch vụ đa dạng, bao gồm 4 nhóm chính: Trò chơi trực tuyến, Nền tảng kết nối, Thanh toán điện tử và Chuyển đổi số. Các sản phẩm của VNG đã và đang tạo ra cuộc cách mạng về trải nghiệm cũng như tương tác trên các nền tảng số cho hàng triệu người dùng Việt Nam và thế giới. Từ những sản phẩm công nghệ Việt, VNG “go global\", từng bước tiến ra thị trường toàn cầu.\r\n\r\nTrong bức thư của Nhà sáng lập (Founder Letter) được gửi cùng với hồ sơ F1 đến Ủy ban chứng khoán Mỹ, đội ngũ sáng lập của công ty đã chia sẻ về hành trình vươn ra toàn cầu của mình từ một công ty khởi nghiệp về trò chơi chỉ với 5 người đồng sáng lập.\r\n\r\nThời điểm đó, VNG đã đối mặt với vô vàn thử thách vì thiếu nguồn lực và kinh nghiệm khởi nghiệp. Để chuẩn bị cho việc ra mắt Võ Lâm Truyền Kỳ - PC game đầu tiên tại Việt Nam, các thành viên đã nghiên cứu các tạp chí trò chơi PC và tuyển dụng nhân sự trên các diễn đàn game thủ địa phương, rồi đi dọc khắp các tỉnh thành bằng xe máy để dán áp-phích quảng cáo trên hơn 5,000 quán cà phê Internet.', 'VNG “Go Global\", hành trình vươn ra thế giới', NULL),
(4, 1, '2023-12-01 05:13:37', 'Thành phố Hồ Chí Minh, ngày 14 tháng 11 năm 2023: ZaloPay, nền tảng ví điện tử và hệ thống thanh toán trực tuyến hàng đầu tại Việt Nam và Gojek, nền tảng công nghệ đa dịch vụ theo yêu cầu hàng đầu khu vực Đông Nam Á, hôm nay chính thức công bố hợp tác. Hợp tác này mang đến lựa chọn thanh toán mới, cho phép người dùng sử dụng ZaloPay thanh toán cho dịch vụ giao đồ ăn trực tuyến (GoFood) trên ứng dụng Gojek. Người dùng có thể thanh toán bằng ZaloPay cho các dịch vụ khác trên ứng dụng Gojek như dịch vụ vận chuyển (gọi xe hai bánh GoRide, xe bốn bánh GoCar) và giao hàng (GoSend) từ đầu năm 2024.', 'Thành phố Hồ Chí Minh, ngày 14 tháng 11 năm 2023: ZaloPay, nền tảng ví điện tử và hệ thống thanh toán trực tuyến hàng đầu tại Việt Nam và Gojek, nền tảng công nghệ đa dịch vụ theo yêu cầu hàng đầu khu vực Đông Nam Á, hôm nay chính thức công bố hợp tác. Hợp tác này mang đến lựa chọn thanh toán mới, cho phép người dùng sử dụng ZaloPay thanh toán cho dịch vụ giao đồ ăn trực tuyến (GoFood) trên ứng dụng Gojek. Người dùng có thể thanh toán bằng ZaloPay cho các dịch vụ khác trên ứng dụng Gojek như dịch vụ vận chuyển (gọi xe hai bánh GoRide, xe bốn bánh GoCar) và giao hàng (GoSend) từ đầu năm 2024.\r\n\r\nViệc đưa ZaloPay lên nền tảng Gojek là một phần trong chiến lược của Gojek nhằm cung cấp cho người dùng nhiều lựa chọn hơn về phương thức thanh toán, khi Gojek đang hướng đến mục tiêu mang lại trải nghiệm thanh toán an toàn, liền mạch và thuận tiện trên ứng dụng. Mối quan hệ hợp tác cũng sẽ giúp Gojek phục vụ hệ sinh thái hơn 11,5 triệu người dùng ZaloPay và tiếp cận hàng chục triệu người dùng Zalo.\r\n', 'ZaloPay và Gojek công bố hợp tác, cung cấp thêm lựa chọn thanh toán không tiền mặt cho người dùng tại Việt Nam', NULL),
(5, 1, '2023-12-01 05:14:23', 'Ngày 6.11, Zalo AI Challenge 2023 chính thức trở lại với đề thi Generative AI - một xu hướng công nghệ được quan tâm gần đây và tổng giải thưởng lên đến 15.000 USD.', 'Trải qua 6 lần tổ chức, cuộc thi Zalo AI Challenge luôn được đánh giá cao ở sự đầu tư nghiêm túc, chuyên nghiệp, minh bạch. Thu hút gần 1300 đội tham dự mỗi năm, cuộc thi trở thành đấu trường AI uy tín, lớn nhất Việt Nam và là sân chơi luôn được cộng đồng đam mê AI chờ đón.\r\n\r\nDữ liệu huấn luyện là một phần không thể thiếu để có thể tạo ra các sản phẩm về AI nhưng không phải một tổ chức nào cũng có đủ nguồn lực để tiếp cận vì nguồn lực đầu tư lớn.\r\n\r\nVới việc cung cấp dữ liệu thông qua cuộc thi, Zalo AI đã giúp các bạn sinh viên, các nhóm nghiên cứu nhỏ có thể tiếp cực nguồn dữ liệu quý giá và chất lượng để huấn luyện và cải tiến mô hình của mình, từ đó góp phần thúc đẩy các nghiên cứu về AI ở Việt Nam trên quy mô đại trà.\r\n\r\nÔng Nguyễn Minh Tú - CTO tại Zalo nhận định Zalo AI Challenge là một đấu trường AI được Zalo đầu tư cả về khâu đề bài lẫn bộ dữ liệu huấn luyện. Ông cho biết Zalo luôn chú trọng đến các đề bài có độ khó nhất định nhưng vẫn mang tính thực tiễn cao để thách thức các đội thi. Đồng thời, bộ dữ liệu huấn luyện cho cuộc thi cũng luôn được dành nhiều tâm huyết hoàn thiện, có tính tác động và giúp các nhóm tham dự xây dựng được giải pháp hay.\r\n\r\n“Hy vọng ngoài bộ data lớn và chất lượng, chủ đề thi sắp tới mà kỳ Zalo AI Challenge 2023 đưa ra có tính thử thách cao sẽ là làm tiền đề cho các nghiên cứu chuyên sâu hơn, thúc đẩy cộng đồng đam mê trí tuệ nhân tạo phát triển giải pháp AI từ hàn lâm thành thực tiễn, đi vào phục vụ cuộc sống con người nói chung và người Việt nói riêng”, Ông Tú chia sẻ thêm.\r\n\r\nCuộc thi Zalo AI Challenge 2023 vẫn có sự góp mặt và đồng hành tham gia từ ban cố vấn bao gồm nhân sự cấp cao tại Zalo AI và các giáo sư, tiến sĩ hàng đầu ngành công nghệ AI tại Việt Nam và quốc tế.', 'Zalo AI Challenge 2023 trở lại với đề thi Generative AI', NULL),
(6, 1, '2023-12-06 01:46:48', 'Sự kiện chạy bộ trực tuyến gây quỹ vì cộng đồng UpRace 2023 vừa khép lại sau 24 ngày sôi động (6/10-29/10/2023), với sự tham gia của hơn 620.000 người và ghi nhận gần 7 triệu km chạy, tương đương gần 7 tỷ đồng được quyên góp cho 3 đối tác xã hội.', 'UpRace 2023 tiếp tục ghi nhận kỷ lục mới về số người đăng ký tham gia, lên đến hơn 620.000 người trên khắp 63 tỉnh thành, gần gấp đôi so với năm 2022. Số km hợp lệ ghi nhận từ sự kiện cũng cán mốc 6.866.696km.\r\n\r\nCác doanh nghiệp tài trợ cho UpRace 2023 gồm Quỹ Kiến tạo ước mơ (thuộc VNG), ngân hàng CIMB Việt Nam, Minh Long I, Nutifood, Công ty TNHH Chăm sóc người cao tuổi Hòa Bình, Home Credit, Bitis, Eximbank, UrBox, ASH cùng một số nhà tài trợ khác, sẽ cùng nhau quyên góp số tiền tương đương gần 7 tỷ đồng cho 3 tổ chức xã hội đồng hành: Hội Bảo trợ người khuyết tật và trẻ mồ côi Việt Nam (ASVHO), Quỹ Học bổng Vừ A Dính và Trung tâm Bảo tồn đa dạng sinh học Nước Việt Xanh (GreenViet). Trong đó, VNG vừa là nhà tài trợ chính, vừa bảo trợ kỹ thuật và tài trợ toàn bộ chi phí vận hành cho sự kiện.\r\n\r\nBan tổ chức UpRace và các nhà tài trợ đã chính thức trao quỹ cho 3 tổ chức xã hội vào sáng ngày 1/11/2023. Trong đó, ASVHO là tổ chức nhận được sự ủng hộ và nguồn quỹ cao nhất từ UpRace năm nay với số tiền khoảng 3,5 tỷ đồng. Ông Nguyễn Trọng Đàm, Nguyên Thứ trưởng Bộ Lao động-Thương binh và Xã hội, Chủ tịch ASVHO cho biết: “Đối tượng cần hỗ trợ của Hội đang có 6,2 triệu người khuyết tật, 400.000 trẻ em mồ côi có hoàn cảnh đặc biệt, riêng trẻ mồ côi vì Covid-19 là trên 3.000 cháu. UpRace sẽ góp phần tạo thêm nhiều việc làm cho người khuyết tật và hỗ trợ trẻ em mồ côi, thay thủy tinh thể cho người cao tuổi tại các vùng khó khăn”.\r\n\r\nVới Quỹ Học bổng Vừ A Dính, nguồn quỹ từ UpRace sẽ tiếp sức cho chương trình hỗ trợ 8.000 suất học bổng cho học sinh sinh viên dân tộc thiểu số, trong đó 5.000 suất cho khắp cả nước và 3000 suất riêng cho vùng hải đảo.\r\n\r\nUpRace cũng sẽ giúp GreenViet sớm hiện thực hóa dự án trồng 50 hecta rừng cây gỗ lớn ở xã Hòa Bắc (TP Đà Nẵng), nơi có cộng đồng người Kơ Tu sinh sống.', 'Sự kiện chạy bộ UpRace 2023 gây quỹ gần 7 tỷ đồng cho 3 đối tác xã hội', NULL);

-- --------------------------------------------------------

--
-- Table structure for table product
--

CREATE TABLE product (
  id int(11) NOT NULL,
  price int(11) DEFAULT NULL,
  name varchar(255) DEFAULT NULL,
  description varchar(1000) DEFAULT NULL,
  rating int(11) NOT NULL,
  date datetime DEFAULT NULL,
  feature_id int(11) DEFAULT NULL, 
  default_img varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table product
--

INSERT INTO product (id, price, name, description, rating, date, feature_id, default_img) VALUES
(7, 100000, 'áo polo', 'thoáng mát', 75, '2022-04-05 10:00:00', '1', NULL),
(8, 100000, 'áo hoodie', 'phong cách', 80, '2022-04-05 10:00:00', '1', NULL),
(9, 100000, 'quần short', 'thoải mái', 60, '2022-04-05 10:00:00', '2', NULL),
(10, 100000, 'quần jean', 'thời trang', 70, '2022-04-05 10:00:00', '2', NULL);

-- --------------------------------------------------------

--
-- Table structure for table user
--

CREATE TABLE user (
  email varchar(255) NOT NULL,
  profile_photo varchar(255) DEFAULT NULL,
  fname varchar(255) DEFAULT NULL,
  lname varchar(255) DEFAULT NULL,
  gender tinyint(1) DEFAULT NULL,
  birthday int(11) DEFAULT NULL,
  phone varchar(10) DEFAULT NULL,
  createAt datetime DEFAULT NULL,
  updateAt datetime DEFAULT NULL,
  password varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table user
--

INSERT INTO user (email, profile_photo, fname, lname, gender, birthday, phone, createAt, updateAt, password) VALUES
('abc@gmail.com', 'public/img/user/2023_12_06_10_16_17am.png', 'Ackerman', 'Levi', 1, 2003, '09001234', '2023-12-05 12:32:27', '2023-12-06 16:07:23', '$2y$10$WRU0UGARBNO6vL5HW77u/u05qJDyfMdontCvz6IrSoYeQXdH9iQGW'),
('hao.pham1652003@hcmut.edu.vn', 'public/img/user/2023_12_06_10_19_36am.jpg', 'Pham Duc', 'Hao', 1, 2003, '0356806508', '2023-11-28 20:31:38', '2023-12-06 16:19:36', '$2y$10$hEdcuxWJsNfmdXv8O5QA7ej91K37oqU23W6ZauTynWxXnEvJJ5u3q'),
('phamduchao2k3@gmail.com', 'public/img/user/2023_12_06_10_23_39am.png', 'Phạm Đức', 'Hào', 1, 2002, '0908599907', '2023-12-01 10:52:40', '2023-12-06 16:23:39', '$2y$10$Ws9rU6WAaCU/UiGud9KSAOXeX8sGPnaggucGn7Q.buPHXXRCwtr3C');

--
-- Indexes for dumped tables
--

--
-- Table structure for table stock
--

CREATE TABLE stock (
  id int(11) NOT NULL,
  product_id int(11) DEFAULT NULL,
  size int DEFAULT 1,
  stock_num int(11) NOT NULL,
  img varchar(255) DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Table structure for table cart
--

CREATE TABLE cart (
  id int(11) NOT NULL,
  user_id varchar(255) NOT NULL,
  product_id int(11) DEFAULT NULL,
  size int DEFAULT 1,
  amount int(11) DEFAULT NULL,
  purchase varchar(1) DEFAULT '0',
  datePurchase datetime DEFAULT NULL,
  coupon_id varchar(255) DEFAULT NULL, 
  img varchar(255) DEFAULT NULL,
  PRIMARY KEY (id, user_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Table structure for table feature
--

CREATE TABLE feature (
  id int(11) NOT NULL,
  title varchar(255) DEFAULT NULL,
  createAt datetime DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table feature
--

INSERT INTO feature (id, title, createAt) VALUES
(1, 'áo', '2022-04-05 10:00:00'),
(2, 'quần', '2022-04-05 10:00:00');

--
-- Table structure for table coupon
--

CREATE TABLE coupon (
  stock int(11) DEFAULT NULL,
  coupon_num varchar(255) NOT NULL,
  discount int DEFAULT NULL,
  createAt datetime DEFAULT NULL,
  expireAt datetime DEFAULT NULL,
  PRIMARY KEY (coupon_num)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for table admin
--
ALTER TABLE admin
  ADD PRIMARY KEY (username,email);

--
-- Indexes for table comment
--
ALTER TABLE comment
  ADD PRIMARY KEY (id),
  ADD KEY news_id (news_id),
  ADD KEY user_id (user_id),
  ADD KEY parent (parent);

-- --
-- -- Indexes for table company
-- --
-- ALTER TABLE company
--   ADD PRIMARY KEY (id);

--
-- Indexes for table creates
--
ALTER TABLE creates
  ADD PRIMARY KEY (news_id,admin_email);

--
-- Indexes for table news
--
ALTER TABLE news
  ADD PRIMARY KEY (id);

--
-- Indexes for table product
--
ALTER TABLE product
  ADD PRIMARY KEY (id);

--
-- Indexes for table user
--
ALTER TABLE user
  ADD PRIMARY KEY (email);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table comment
--
ALTER TABLE comment
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

-- --
-- -- AUTO_INCREMENT for table company
-- --
-- ALTER TABLE company
--   MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table news
--
ALTER TABLE news
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table feature
--
ALTER TABLE feature
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table product
--
ALTER TABLE product
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table stock
--
ALTER TABLE stock
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;


--
-- AUTO_INCREMENT for table cart
--
ALTER TABLE cart
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;


--
-- Constraints for dumped tables
--

--
-- Constraints for table comment
--
ALTER TABLE comment
  ADD CONSTRAINT comment_ibfk_1 FOREIGN KEY (news_id) REFERENCES news (id) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT comment_ibfk_2 FOREIGN KEY (user_id) REFERENCES user (email) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT comment_ibfk_3 FOREIGN KEY (parent) REFERENCES comment (id) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

--
-- Constraints for table product
--
ALTER TABLE product
  ADD CONSTRAINT product_ibfk_1 FOREIGN KEY (feature_id) REFERENCES feature (id) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

--
-- Constraints for table stock
--
ALTER TABLE stock
  ADD CONSTRAINT stock_ibfk_1 FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

--
-- Constraints for table cart
--
ALTER TABLE cart
  ADD CONSTRAINT cart_ibfk_1 FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT cart_ibfk_2 FOREIGN KEY (user_id) REFERENCES user (email) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT cart_ibfk_3 FOREIGN KEY (coupon_id) REFERENCES coupon (coupon_num) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

