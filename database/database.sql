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
('nhan', 'nhan@gmail.com', '$2y$10$FPxhqC1y4a5wrHOIMuLVnu7NfblijUyzOzO0KE3zZ4z1gpjUI8z8y', '0', '2023-12-06 16:18:07', '2023-12-06 16:18:07'),
('quan', 'quan@gmail.com', '$2y$10$0PhTjj7OnPIQYbx9LP8w9ehSKZOzRh79hSNI.kk9p9Tq9fWu5lWtK', '0', NULL, '2022-06-12 14:02:09');

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
(55, '2023-12-06 16:25:26', 0, 'rất hay', 5, 'trannhan496@gmail.com', NULL),
(58, '2023-12-06 16:36:46', 1, 'hay quá !!!', 4, 'abcadmin@gmail.com', NULL),
(59, '2023-12-06 16:38:19', 1, 'chúc mừng zaloPay', 4, 'abcadmin@gmail.com', NULL),
(63, '2023-12-06 17:01:41', 1, 'ai muốn join team thì ib mình nhé sđt: 012345678', 5, 'trannhan496@gmail.com', NULL),
(66, '2023-12-06 17:03:49', 1, 'ai còn slot liên hệ mình nhé...', 5, 'abcadmin@gmail.com', NULL),
(67, '2023-12-06 17:05:17', 1, 'mình nè bạn ơi!', 5, 'abcadmin@gmail.com', 63),
(68, '2023-12-06 17:05:53', 1, '. hóng', 5, 'abcadmin@gmail.com', 66),
(69, '2023-12-06 17:06:27', 1, '. len top', 5, 'abcadmin@gmail.com', 66),
(70, '2023-12-06 17:06:50', 1, 'và gojek nữa :))', 4, 'abcadmin@gmail.com', 59),
(71, '2023-12-06 17:08:31', 1, 'ib mình nhé :3', 5, 'nhan.tranys3010@hcmut.edu.vn', 63),
(72, '2023-12-06 18:57:09', 1, 'ok', 5, 'nhan.tranys3010@hcmut.edu.vn', 55),
(79, '2023-12-06 19:11:01', 1, 'quá lý tưởng', 1, 'nhan.tranys3010@hcmut.edu.vn', NULL),
(80, '2023-12-06 19:11:26', 1, 'đúng vậy', 1, 'nhan.tranys3010@hcmut.edu.vn', 79),
(81, '2023-12-06 19:12:08', 1, 'đúng vậy', 1, 'nhan.tranys3010@hcmut.edu.vn', 79),
(82, '2023-12-06 19:13:33', 1, 'tuyệt vời', 5, 'nhan.tranys3010@hcmut.edu.vn', NULL),
(83, '2023-12-06 19:14:51', 1, 'quá tự hào', 3, 'nhan.tranys3010@hcmut.edu.vn', NULL),
(84, '2023-12-06 19:16:01', 1, 'ngạo nghễ vn', 3, 'nhan.tranys3010@hcmut.edu.vn', NULL),
(85, '2023-12-06 19:24:13', 1, 'quá ngạo nghễ', 3, 'nhan.tranys3010@hcmut.edu.vn', NULL),
(86, '2023-12-06 19:34:17', 1, 'đúng vậy', 3, 'abcadmin@gmail.com', 85),
(87, '2023-12-06 19:37:00', 1, 'quá đúng!', 3, 'abcadmin@gmail.com', 84),
(88, '2023-12-06 19:39:04', 1, 'tuyệt vời', 4, 'abcadmin@gmail.com', NULL),
(95, '2023-12-06 20:41:05', 1, 'tuyệt vời', 6, 'nhan.tranys3010@hcmut.edu.vn', NULL),
(96, '2023-12-06 20:42:52', 1, 'thích quá', 5, 'nhan.tranys3010@hcmut.edu.vn', NULL),
(98, '2023-12-07 10:37:29', 1, 'ok', 6, 'nhan.tranys3010@hcmut.edu.vn', 95),
(99, '2023-12-07 10:37:34', 1, 'hay quá', 6, 'nhan.tranys3010@hcmut.edu.vn', NULL);

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
(4, 'nhan@gmail.com'),
(5, 'nhan@gmail.com'),
(6, 'quan@gmail.com');

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
(1, 1, '2022-04-05 17:00:00', 'Bán hàng số 1', 'Bán hàng số 1', NULL),
(3, 1, '2023-12-01 05:13:05', 'Bán hàng số 3', 'Bán hàng số 3', NULL),
(4, 1, '2023-12-01 05:13:37', 'Bán hàng số 4', 'Bán hàng số 4', NULL),
(5, 1, '2023-12-01 05:14:23', 'Bán hàng số 5', 'Bán hàng số 5', NULL),
(6, 1, '2023-12-06 01:46:48', 'Bán hàng số 6', 'Bán hàng số 6', NULL);

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
(7, 100000, 'áo polo', 'thoáng mát', 4, '2022-04-05 10:00:00', '1', NULL),
(8, 100000, 'áo hoodie', 'phong cách', 5, '2022-04-05 10:00:00', '1', NULL),
(9, 100000, 'quần short', 'thoải mái', 3, '2022-04-05 10:00:00', '2', NULL),
(10, 100000, 'quần jean', 'thời trang', 4, '2022-04-05 10:00:00', '2', NULL);

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
('abcadmin@gmail.com', 'public/img/user/2023_12_06_10_16_17am.png', 'Levi', 'Captain', 1, 2003, '09001234', '2023-12-05 12:32:27', '2023-12-06 16:07:23', '$2y$10$WRU0UGARBNO6vL5HW77u/u05qJDyfMdontCvz6IrSoYeQXdH9iQGW'),
('nhan.tranys3010@hcmut.edu.vn', 'public/img/user/2023_12_06_10_19_36am.jpg', 'Trần Thiện', 'Nhân', 1, 2003, '0356806508', '2023-11-28 20:31:38', '2023-12-06 16:19:36', '$2y$10$hEdcuxWJsNfmdXv8O5QA7ej91K37oqU23W6ZauTynWxXnEvJJ5u3q'),
('trannhan496@gmail.com', 'public/img/user/2023_12_06_10_23_39am.png', 'Nguyễn Phúc Minh', 'Quân', 1, 2002, '0908599907', '2023-12-01 10:52:40', '2023-12-06 16:23:39', '$2y$10$Ws9rU6WAaCU/UiGud9KSAOXeX8sGPnaggucGn7Q.buPHXXRCwtr3C');

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

