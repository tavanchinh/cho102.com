/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50516
Source Host           : localhost:3306
Source Database       : 2xu_vn

Target Server Type    : MYSQL
Target Server Version : 50516
File Encoding         : 65001

Date: 2015-11-11 00:54:01
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for category
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `position` varchar(255) DEFAULT '888',
  `active` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES ('27', 'Thời trang nam', '0', '2', '1');
INSERT INTO `category` VALUES ('28', 'Thời trang nữ', '0', '3', '1');
INSERT INTO `category` VALUES ('29', 'Mỹ phẩm', '0', '6', '1');
INSERT INTO `category` VALUES ('30', 'Mẹ và bé', '0', '5', '1');
INSERT INTO `category` VALUES ('32', 'Thời trang trẻ em', '0', '4', '1');
INSERT INTO `category` VALUES ('33', 'Áo nữ', '28', '1', '1');
INSERT INTO `category` VALUES ('34', 'Đầm nữ', '33', '2', '1');
INSERT INTO `category` VALUES ('35', 'Chân váy', '28', '3', '1');
INSERT INTO `category` VALUES ('36', 'Đồ lót nữ', '28', '4', '1');
INSERT INTO `category` VALUES ('37', 'Giày dép', '28', '5', '1');
INSERT INTO `category` VALUES ('38', 'Túi ví nữ', '28', '6', '1');
INSERT INTO `category` VALUES ('39', 'Tất nữ', '28', '7', '1');
INSERT INTO `category` VALUES ('40', 'Phụ kiện nữ', '28', '8', '1');
INSERT INTO `category` VALUES ('41', 'Áo', '27', '1', '1');
INSERT INTO `category` VALUES ('42', 'Áo sơ mi', '27', '2', '1');
INSERT INTO `category` VALUES ('43', 'Quần', '27', '3', '1');
INSERT INTO `category` VALUES ('44', 'Đồ lót', '27', '4', '1');
INSERT INTO `category` VALUES ('45', 'Tất', '27', '5', '1');
INSERT INTO `category` VALUES ('46', 'Giày dép', '27', '6', '1');
INSERT INTO `category` VALUES ('47', 'Ví nam', '27', '7', '1');
INSERT INTO `category` VALUES ('48', 'Phụ kiện', '27', '9', '1');
INSERT INTO `category` VALUES ('49', 'Khác', '27', '10', '1');
INSERT INTO `category` VALUES ('50', 'Đầm/váy bé gái', '32', '1', '1');
INSERT INTO `category` VALUES ('51', 'Quần áo bé gái', '32', '2', '1');
INSERT INTO `category` VALUES ('52', 'Giày dép bé gái', '32', '3', '1');
INSERT INTO `category` VALUES ('53', 'Quần áo bé trai', '32', '4', '1');
INSERT INTO `category` VALUES ('54', 'Giày dép bé trai', '32', '5', '1');
INSERT INTO `category` VALUES ('55', 'Phụ kiện', '32', '6', '1');
INSERT INTO `category` VALUES ('56', 'Trang điểm', '29', '1', '1');
INSERT INTO `category` VALUES ('57', 'Chăm sóc mặt', '29', '2', '1');
INSERT INTO `category` VALUES ('58', 'Chăm sóc toàn thân', '29', '3', '1');
INSERT INTO `category` VALUES ('59', 'Chăm sóc tóc', '29', '4', '1');
INSERT INTO `category` VALUES ('60', 'Mỹ phẩm nam', '29', '5', '1');
INSERT INTO `category` VALUES ('61', 'Chăm sóc sức khỏe', '29', '6', '1');
INSERT INTO `category` VALUES ('62', 'Nước hoa', '29', '6', '1');
INSERT INTO `category` VALUES ('63', 'Khác', '29', '7', '1');
INSERT INTO `category` VALUES ('64', 'Tã & Bỉm', '30', '1', '1');
INSERT INTO `category` VALUES ('65', 'Sữa & thức ăn dặm', '30', '2', '1');
INSERT INTO `category` VALUES ('66', 'Đồ dùng cho bé', '30', '3', '1');
INSERT INTO `category` VALUES ('67', 'Dành cho mẹ', '30', '4', '1');
INSERT INTO `category` VALUES ('68', 'Khác', '30', '888', '1');
INSERT INTO `category` VALUES ('69', 'Đồ chơi trẻ em', '0', '8', '1');
INSERT INTO `category` VALUES ('70', 'Đồ chơi em bé', '69', '1', '1');
INSERT INTO `category` VALUES ('71', 'Đồ chơi giáo dục', '69', '2', '1');
INSERT INTO `category` VALUES ('72', 'Ghép hình & xếp hình', '69', '3', '1');
INSERT INTO `category` VALUES ('73', 'Đồ chơi mô hình', '69', '4', '1');
INSERT INTO `category` VALUES ('74', 'Khác', '69', '6', '1');

-- ----------------------------
-- Table structure for city
-- ----------------------------
DROP TABLE IF EXISTS `city`;
CREATE TABLE `city` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `position` int(11) DEFAULT '888',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of city
-- ----------------------------
INSERT INTO `city` VALUES ('1', 'Cao Bằng', '888');
INSERT INTO `city` VALUES ('2', 'Bắc Ninh', '888');
INSERT INTO `city` VALUES ('3', 'Hà Giang', '888');
INSERT INTO `city` VALUES ('4', 'Lai Châu', '888');
INSERT INTO `city` VALUES ('5', 'Lào Cai', '888');
INSERT INTO `city` VALUES ('6', 'Bắc Cạn', '888');
INSERT INTO `city` VALUES ('7', 'Tuyên Quang', '888');
INSERT INTO `city` VALUES ('8', 'Hưng Yên', '888');
INSERT INTO `city` VALUES ('9', 'Phú Yên', '888');
INSERT INTO `city` VALUES ('10', 'Điện Biên', '888');
INSERT INTO `city` VALUES ('11', 'Yên Bái', '888');
INSERT INTO `city` VALUES ('12', 'Thái Nguyên', '888');
INSERT INTO `city` VALUES ('13', 'Sóc Trăng', '888');
INSERT INTO `city` VALUES ('14', 'Lạng Sơn', '888');
INSERT INTO `city` VALUES ('15', 'Vĩnh Phúc', '888');
INSERT INTO `city` VALUES ('16', 'Sơn La', '888');
INSERT INTO `city` VALUES ('17', 'Phú Thọ', '888');
INSERT INTO `city` VALUES ('18', 'Hà Nội', '1');
INSERT INTO `city` VALUES ('19', 'Bắc Giang', '888');
INSERT INTO `city` VALUES ('20', 'Quảng Ninh', '888');
INSERT INTO `city` VALUES ('22', 'Hải Dương', '888');
INSERT INTO `city` VALUES ('23', 'Hòa Bình', '888');
INSERT INTO `city` VALUES ('24', 'Hải Phòng', '888');
INSERT INTO `city` VALUES ('25', 'Hà Nam', '888');
INSERT INTO `city` VALUES ('26', 'Thái Bình', '888');
INSERT INTO `city` VALUES ('27', 'Ninh Bình', '888');
INSERT INTO `city` VALUES ('28', 'Nam Định', '888');
INSERT INTO `city` VALUES ('29', 'Thanh Hóa', '888');
INSERT INTO `city` VALUES ('30', 'Nghệ An', '888');
INSERT INTO `city` VALUES ('31', 'Hà Tĩnh', '888');
INSERT INTO `city` VALUES ('33', 'Quảng Trị', '888');
INSERT INTO `city` VALUES ('34', 'Thừa Thiên Huế', '888');
INSERT INTO `city` VALUES ('35', 'Đà Nẵng', '888');
INSERT INTO `city` VALUES ('36', 'Quảng Nam', '888');
INSERT INTO `city` VALUES ('37', 'Quảng Ngãi', '888');
INSERT INTO `city` VALUES ('38', 'Kon Tum', '888');
INSERT INTO `city` VALUES ('39', 'Bình Định', '888');
INSERT INTO `city` VALUES ('40', 'Gia Lai', '888');
INSERT INTO `city` VALUES ('42', 'Đăk Lăk', '888');
INSERT INTO `city` VALUES ('43', 'Khánh Hòa', '888');
INSERT INTO `city` VALUES ('44', 'Đăk Nông', '888');
INSERT INTO `city` VALUES ('45', 'Bình Phước', '888');
INSERT INTO `city` VALUES ('46', 'Lâm Đồng', '888');
INSERT INTO `city` VALUES ('47', 'Ninh Thuận', '888');
INSERT INTO `city` VALUES ('48', 'Tây Ninh', '888');
INSERT INTO `city` VALUES ('49', 'Bình Dương', '888');
INSERT INTO `city` VALUES ('50', 'Đồng Nai', '888');
INSERT INTO `city` VALUES ('51', 'Bình Thuận', '888');
INSERT INTO `city` VALUES ('52', 'TP. Hồ Chí Minh', '2');
INSERT INTO `city` VALUES ('53', 'Long An', '888');
INSERT INTO `city` VALUES ('54', 'Bà Rịa - Vũng Tàu', '888');
INSERT INTO `city` VALUES ('56', 'An Giang', '888');
INSERT INTO `city` VALUES ('57', 'Đồng Tháp', '888');
INSERT INTO `city` VALUES ('58', 'Tiền Giang', '888');
INSERT INTO `city` VALUES ('59', 'Cần Thơ', '888');
INSERT INTO `city` VALUES ('60', 'Bến Tre', '888');
INSERT INTO `city` VALUES ('61', 'Vĩnh Long', '888');
INSERT INTO `city` VALUES ('62', 'Kiên Giang', '888');
INSERT INTO `city` VALUES ('63', 'Hậu Giang', '888');
INSERT INTO `city` VALUES ('64', 'Trà Vinh', '888');
INSERT INTO `city` VALUES ('65', 'Bạc Liêu', '888');
INSERT INTO `city` VALUES ('68', 'Cà Mau', '888');

-- ----------------------------
-- Table structure for friend
-- ----------------------------
DROP TABLE IF EXISTS `friend`;
CREATE TABLE `friend` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id1` int(11) NOT NULL,
  `user_id2` int(11) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of friend
-- ----------------------------
INSERT INTO `friend` VALUES ('1', '10', '12', '2015-10-17 09:51:01');
INSERT INTO `friend` VALUES ('2', '10', '21', '2015-10-17 09:51:29');
INSERT INTO `friend` VALUES ('3', '12', '21', '2015-10-17 09:51:54');

-- ----------------------------
-- Table structure for member
-- ----------------------------
DROP TABLE IF EXISTS `member`;
CREATE TABLE `member` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `display_name` varchar(50) DEFAULT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `is_admin` tinyint(4) DEFAULT '0' COMMENT 'Xac dinh la user hay admin',
  `address` varchar(150) DEFAULT NULL,
  `status` bit(1) DEFAULT b'0',
  `gender` tinyint(4) DEFAULT '10',
  `birthday` date DEFAULT NULL,
  `createdate` int(11) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of member
-- ----------------------------
INSERT INTO `member` VALUES ('2', 'ChinhTV', 'admin', '2570949c64339542ac0a1068840742e4', 'chinh.tv91@gmail.com', '0974125516', '1', 'Ha Noi', '', '1', '0000-00-00', null, null);

-- ----------------------------
-- Table structure for membergroup
-- ----------------------------
DROP TABLE IF EXISTS `membergroup`;
CREATE TABLE `membergroup` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `group_name` varchar(50) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of membergroup
-- ----------------------------

-- ----------------------------
-- Table structure for news
-- ----------------------------
DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `image` varchar(512) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `sapo` varchar(512) DEFAULT NULL,
  `content` text NOT NULL,
  `active` tinyint(4) DEFAULT '1',
  `hot` tinyint(4) DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modify_date` datetime DEFAULT NULL,
  `view` int(11) DEFAULT NULL,
  `comment` int(11) DEFAULT NULL,
  `count_like` int(11) DEFAULT NULL,
  `has_video` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `cat_id` (`cat_id`),
  CONSTRAINT `news_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `category` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of news
-- ----------------------------

-- ----------------------------
-- Table structure for notification
-- ----------------------------
DROP TABLE IF EXISTS `notification`;
CREATE TABLE `notification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(512) NOT NULL,
  `type` tinyint(4) NOT NULL COMMENT 'Loại thông báo (Yêu cầu kết bạn, Có sản phẩm mới)',
  `product_id` int(11) DEFAULT NULL,
  `create_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of notification
-- ----------------------------
INSERT INTO `notification` VALUES ('1', 'Tạ Văn Chinh đã đăng một sản phẩm mới', '1', '3', '2015-10-17 10:31:42');
INSERT INTO `notification` VALUES ('2', 'Tạ Văn Chinh đã đăng một sản phẩm mới', '1', '4', '2015-10-17 10:35:53');
INSERT INTO `notification` VALUES ('3', 'Tạ Văn Chinh đã đăng một sản phẩm mới', '1', '5', '2015-10-17 10:43:34');
INSERT INTO `notification` VALUES ('4', 'Tạ Văn Chinh đã đăng một sản phẩm mới', '1', '6', '2015-10-17 10:49:06');
INSERT INTO `notification` VALUES ('5', 'Tạ Văn Chinh đã đăng một sản phẩm mới', '1', '7', '2015-10-17 10:54:09');
INSERT INTO `notification` VALUES ('6', 'Tạ Văn Chinh đã đăng một sản phẩm mới', '1', '8', '2015-10-21 20:34:44');
INSERT INTO `notification` VALUES ('7', 'Tạ Văn Chinh đã đăng một sản phẩm mới', '1', '9', '2015-10-21 20:35:55');
INSERT INTO `notification` VALUES ('8', 'Tạ Văn Chinh đã đăng một sản phẩm mới', '1', '10', '2015-10-21 20:38:24');
INSERT INTO `notification` VALUES ('9', 'Tạ Văn Chinh đã đăng một sản phẩm mới', '1', '11', '2015-10-21 20:39:12');
INSERT INTO `notification` VALUES ('10', 'Tạ Văn Chinh đã đăng một sản phẩm mới', '1', '12', '2015-10-21 20:40:11');
INSERT INTO `notification` VALUES ('11', 'Tạ Văn Chinh đã đăng một sản phẩm mới', '1', '13', '2015-10-21 20:41:09');
INSERT INTO `notification` VALUES ('12', 'Tạ Văn Chinh đã đăng một sản phẩm mới', '1', '14', '2015-10-21 20:41:57');
INSERT INTO `notification` VALUES ('13', 'Tạ Văn Chinh đã đăng một sản phẩm mới', '1', '15', '2015-10-21 20:43:26');
INSERT INTO `notification` VALUES ('14', 'Tạ Văn Chinh đã đăng một sản phẩm mới', '1', '16', '2015-10-21 20:44:49');
INSERT INTO `notification` VALUES ('15', 'Tạ Văn Chinh đã đăng một sản phẩm mới', '1', '17', '2015-10-21 20:45:45');
INSERT INTO `notification` VALUES ('16', 'Tạ Văn Chinh đã đăng một sản phẩm mới', '1', '18', '2015-10-21 20:47:13');
INSERT INTO `notification` VALUES ('17', 'Tạ Văn Chinh đã đăng một sản phẩm mới', '1', '19', '2015-10-21 20:48:26');
INSERT INTO `notification` VALUES ('18', 'Tạ Văn Chinh đã đăng một sản phẩm mới', '1', '20', '2015-10-21 20:49:13');
INSERT INTO `notification` VALUES ('19', 'Tạ Văn Chinh đã đăng một sản phẩm mới', '1', '21', '2015-10-21 20:50:38');
INSERT INTO `notification` VALUES ('20', 'Tạ Văn Chinh đã đăng một sản phẩm mới', '1', '22', '2015-10-21 20:52:01');
INSERT INTO `notification` VALUES ('21', 'Tạ Văn Chinh đã đăng một sản phẩm mới', '1', '23', '2015-10-21 20:53:11');
INSERT INTO `notification` VALUES ('22', 'Tạ Văn Chinh đã đăng một sản phẩm mới', '1', '24', '2015-10-21 20:54:06');
INSERT INTO `notification` VALUES ('23', 'Tạ Văn Chinh đã đăng một sản phẩm mới', '1', '25', '2015-10-21 20:55:01');
INSERT INTO `notification` VALUES ('24', 'Tạ Văn Chinh đã đăng một sản phẩm mới', '1', '26', '2015-10-21 20:55:52');

-- ----------------------------
-- Table structure for product
-- ----------------------------
DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `create_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `sale` int(11) DEFAULT NULL,
  `special` tinyint(4) DEFAULT '0',
  `avatar` varchar(255) DEFAULT NULL,
  `des` text NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `user_id` int(11) NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'Cần mua hoặc Cần bán (0:Cần Bán | 1: Cần mua)',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of product
-- ----------------------------
INSERT INTO `product` VALUES ('3', 'Bộ bàn đôi cho học sinh cấp 1,2 oh 502', '1', '30', '2015-10-17 10:31:41', null, '0', 'dodungmevabebobandoichohocsinhcap12-201510470.jpg', 'Bàn học đôi OH 502 dành cho 2 bé ở lứa tuổi tiểu học và trung học\r\n\r\nChất liệu:\r\n\r\nToàn bộ sản phẩm được làm từ ván MFC cao cấp với công nghệ phủ Melamine, bề mặt nhẵn mịn, khó trầy xước, dễ lau chùi, không mùi, không độc hại thân thiện với môi trường.\r\n\r\nTính năng:\r\n\r\nBàn học đôi KD09 được thiết kế rộng rãi, đa năng nhiều tiện ích. Bàn có 3 ngăn kéo sử dụng chung và 2 hệ thống giá sách độc lập. Bé có thể tùy chọn các màu sắc: hồng đậm hồng nhạt, xanh dương, xanh cây, cam để phù hợp với sở thích giới tính. Các góc cạnh xung quanh được vê tròn an toàn cho bé khi sử dụng.\r\n\r\nKích thước:\r\n\r\nChiều cao mặt bàn cao 61-70 cm (tiểu học 61cm, trung học 69cm)\r\n\r\nChiều cao có thể thay đổi trong khoảng tiêu chuẩn để phù hợp với từng lứa tuổi cụ thể.\r\n\r\nLiên hệ đặt hàng để được tư vấn chọn kích thước bàn ghế theo tiêu chuẩn của bộ giáo dục và đào tạo, bộ y tế phù hợp nhất với bé\r\n\r\nChúng tôi xin đảm bảo về chất lượng và bảo hành 3 năm cho tất cả các sản phẩm.', '1', '10', '0');
INSERT INTO `product` VALUES ('4', 'Xe đẩy em bé', '1', '32', '2015-10-17 10:35:53', null, '0', 'xedayembe-201510778.jpg', 'Hi alls,\r\nMình cần để lại xe đẩy hiệu fisherprice, hàng mang từ Châu Âu về. Giá lúc mới mua là hơn gần 300ERO. Giờ mình để lại 1700K', '1', '10', '0');
INSERT INTO `product` VALUES ('6', 'Áo rớt vai', '220000', '28', '2015-10-17 10:49:06', null, '0', 'quanaoaorotvai2518852794-201510438.jpg', 'Áo rớt vai', '1', '10', '0');
INSERT INTO `product` VALUES ('7', 'Sơ Mi nam hiệu NEXT-MANGO-ZARA', '250000', '27', '2015-10-17 10:54:09', null, '0', 'quanaosominamhieunextmangozara2545574526-201510380.jpg', '[ VNXK ]™ ツ✪✪ THU ĐÔNG - ÁO KHOÁC, SƠ MI ✪✪\r\n\r\nⒶ || MANGO || - || ZARA || - || NEXT || - || Baubridge & Kay ||\r\n☞ BẠN.. chọn loại nào???\r\n\r\nSự kết hợp hoàn hảo giữa sơ mi với một chiếc áo khoác nhẹ, sẽ khiến bạn luôn tự tin và sẵn sàng cho con đường phía trước \r\nVới 4 dòng sơ mi chính hãng (VNXK):\r\n\r\n✔ MADE IN VIET NAM (Chuẩn về chất lượng)\r\n✔ Chất vải: (100% ‪#‎cotton‬) mềm và ít nhăn\r\n✔ Color: Tím than, xanh, trắng, xám, caro\r\n✔ Form: (slim fit) S - M - L\r\n✔ Giao hàng toàn quốc (‪#‎Free‬ tại Hà Nội)\r\n\r\n✍ NOTE: Sự tinh tế trong ăn mặc đến từ tổng thể và một chiếc áo sơ mi chất lượng tốt sẽ trở nên linh hoạt hơn rất nhiều khi bạn có thể kết hợp với quần tây hoặc kaki.\r\nVới các dòng áo sơ mi cao cấp, chất liệu cotton luôn được xem là lựa chọn tuyệt vời nhất. Vải cotton thông thoáng, bền chắc và dễ dàng cho việc giặt là. \r\n-----------------------------------------\r\nLIÊN HỆ MUA HÀNG:\r\nAdd : Số 28, Ngõ 1, Nguyễn Thị Định, Cầu Giấy, Hà Nội', '1', '10', '0');
INSERT INTO `product` VALUES ('8', 'quần bò nam size 28-29 áo khoác nam', '150000', '27', '2015-10-21 20:34:44', null, '0', 'quanaoquanbonamsize2829-201510678.jpg', '<p>quần b&ograve; nam size 28-29 &aacute;o kho&aacute;c nam</p>\r\n', '1', '10', '0');
INSERT INTO `product` VALUES ('9', 'Đồng hồ đôi Burberry', '1200000', '31', '2015-10-21 20:35:55', null, '0', 'giaydeptuixachphukiendonghodoiburberry2921990233-201510992.jpg', '<p>M&igrave;nh hiện đang c&oacute; 1 đ&ocirc;i em đồng hồ thương hiệu Burberry, do ko c&oacute; nhu cầu d&ugrave;ng đến em n&oacute; n&ecirc;n m&igrave;nh để lại cho bạn n&agrave;o nhiệt t&igrave;nh mua nh&eacute;! Gi&aacute;: 1.200.000đ<br />\r\nM&igrave;nh ở L&ecirc; Duẩn, bạn n&agrave;o gần đ&oacute; c&oacute; thể qua xem tận nơi.</p>\r\n', '1', '10', '0');
INSERT INTO `product` VALUES ('10', 'Măng tô, vest, len, áo da.... Đã về cực nhiều ae Muôn buôn, mua lẻ qua xem hàng nhé.', '230000', '27', '2015-10-21 20:38:24', null, '0', '20131101091145-201510321.jpg', '<p>C&aacute;c bạn ở&nbsp;<strong>H&agrave; Nội</strong>&nbsp;trực tiếp đến&nbsp;<strong><em>Shop</em></strong>&nbsp;để lựa chọn cho m&igrave;nh những sản phẩm ph&ugrave; hợp.</p>\r\n', '1', '10', '0');
INSERT INTO `product` VALUES ('11', 'Quần legging nỉ h&m thái', '199000', '28', '2015-10-21 20:39:12', null, '0', 'quanaoquanleggingnihmthai2976723636-201510920.jpg', '<div class=\"body_text\" style=\"width: 635px; margin: 4px 0px 0px 3px; text-align: justify;\">QUẦN LEGGING NỈ H&amp;M TH&Aacute;I giữ nhiệt cực tốt, kh&ocirc;ng chỉ dễ mặc, ph&ugrave; hợp với nhiều d&aacute;ng người m&agrave; c&ograve;n rất dễ phối đồ, kh&eacute;o l&eacute;o khoe được đ&ocirc;i ch&acirc;n thon d&agrave;i của của bạn.&nbsp;<br />\r\n- Chất nỉ d&agrave;y dặn, mềm mịn v&agrave; đặc biệt mặc l&ecirc;n form rất đẹp, đường may tỉ mỉ v&agrave; tinh tế gi&uacute;p bạn trở n&ecirc;n tự tin v&agrave; s&agrave;nh điệu.&nbsp;<br />\r\n- M&atilde; n&agrave;y nh&agrave; m&igrave;nh c&oacute; phục vụ th&ecirc;m kh&aacute;ch lẻ cả nh&agrave; nh&eacute;<br />\r\n- M&atilde; sp : QNHM000115&nbsp;<br />\r\nM&agrave;u sắc : Đen, T&iacute;m Than, ghi x&aacute;m v&agrave; ghi<br />\r\nSize : Free size</div>\r\n', '1', '10', '0');
INSERT INTO `product` VALUES ('12', 'Đồng hồ nam mã số M518', '280000', '31', '2015-10-21 20:40:11', null, '0', 'giaydeptuixachphukiendonghonammasom5182973222951-201510624.jpg', '<p>Ảnh chụp bằng điện thoại thật 100%<br />\r\n- Kiểu m&aacute;y: STAINLESS STEEL BACK.<br />\r\n- Loại: QUART.<br />\r\n-D&acirc;y INOX trắng bạc kh&ocirc;ng sợ phai m&agrave;u như d&acirc;y m&agrave;u v&agrave;ng.<br />\r\n- Mặt k&iacute;nh Kho&aacute;ng chống trầy xước, chịu lực va đập cao.<br />\r\n- Chống nước TỐT : Đi mưa, rửa tay, tắm giặt( cho ng&acirc;m nước thoải m&aacute;i trước khi mua)<br />\r\n- Kim số tinh sảo ch&iacute;nh x&aacute;c đến từng gi&acirc;y.<br />\r\n- Lịch ng&agrave;y : C&oacute;.<br />\r\n- C&oacute; hai m&agrave;u l&agrave; mặt đen v&agrave; mặt trắng cho kh&aacute;ch h&agrave;ng lựa chọn.<br />\r\n- Thể hiện đẳng cấp sang trọng mạnh mẽ, dễ phối đồ trong mọi ho&agrave;n cảnh, l&agrave; m&oacute;n qu&agrave; &yacute; nghĩa cho bạn b&egrave; người th&acirc;n trong dịp sinh nhật, kỉ niệm...<br />\r\n- Gi&aacute; chỉ 280k/chiếc cho 10 kh&aacute;ch đặt mua sớm nhất, số lượng c&oacute; hạn.<br />\r\n- Ship v&agrave; cắt mắt cho vừa tay tận nh&agrave; chỉ 10k ( trong H&agrave; Nội).<br />\r\n- Ship h&agrave;ng TO&Agrave;N QUỐC chỉ 1-3 ng&agrave;y l&agrave; c&oacute; h&agrave;ng, kh&aacute;ch h&agrave;ng nhắn tin vui l&ograve;ng ghi r&otilde; họ t&ecirc;n, địa chỉ thật cụ thể (viết c&oacute; dấu) để b&ecirc;n m&igrave;nh gửi h&agrave;ng nhanh nhất. Nhận h&agrave;ng, thanh to&aacute;n tiền cho nh&acirc;n vi&ecirc;n bưu điện ( Bưu t&aacute;).<br />\r\n-Li&ecirc;n hệ thoải m&aacute;i 24/24</p>\r\n', '1', '10', '0');
INSERT INTO `product` VALUES ('13', 'Áo lông khoác', '200000', '28', '2015-10-21 20:41:09', null, '0', 'quanaoaolongkhoac2952126037-201510233.jpg', '<p>Bạn đã có m&ocirc;̣t chi&ecirc;́c áo sang chanh̉ như th&ecirc;́ này chưa,<br />\r\nmi&ecirc;̃n phí Ship toàn qu&ocirc;́c nh&acirc;̣n hàng thanh toán tại nhà</p>\r\n', '1', '10', '0');
INSERT INTO `product` VALUES ('14', 'quần joger', '210000', '27', '2015-10-21 20:41:57', null, '0', 'quanaoquanjoger2945020523-201510779.jpg', '<p>quần joger</p>\r\n', '1', '10', '0');
INSERT INTO `product` VALUES ('15', 'váy xếp ly', '80000', '28', '2015-10-21 20:43:26', null, '0', 'quanaovayxeply2962009419-201510525.jpg', '<div class=\"body_text\" style=\"width: 635px; margin: 4px 0px 0px 3px; text-align: justify;\">chất v&aacute;y đẹp v&agrave; c&oacute; quần b&ecirc;n trong n&ecirc;n c&aacute;c bạn g&aacute;i ko cần lo lắng.))</div>\r\n', '1', '10', '0');
INSERT INTO `product` VALUES ('16', 'Quần áo', '60000', '28', '2015-10-21 20:44:49', null, '0', 'quanaoquanao2934223567-201510283.jpg', '<p>Xả h&agrave;ng đồng gi&aacute; hết.ph&iacute; ship 30k.lh sdt zalo</p>\r\n', '1', '10', '0');
INSERT INTO `product` VALUES ('17', 'dây chuyền khắc tên và nhẫn bạc', '300000', '31', '2015-10-21 20:45:45', null, '0', 'giaydeptuixachphukiendaychuyenkhactenvanhanbac2947352944-201510251.jpg', '<p>Kh&ocirc;ng d&ugrave;ng đến d&acirc;y chuyền bạc khắc t&ecirc;n như h&igrave;nh &gt;4 chỉ v&agrave;, nhẫn bạc ta. Để cho ai quan t&acirc;m. Gi&aacute; cho hai thứ 300k. Qu&aacute; hạt rẻ, xin miễn mặc cả.</p>\r\n', '1', '10', '0');
INSERT INTO `product` VALUES ('18', 'Áo dạ nữ', '500000', '28', '2015-10-21 20:47:13', null, '0', 'quanaoaoda2925301203-201510493.jpg', '<div class=\"body_text\" style=\"width: 635px; margin: 4px 0px 0px 3px; text-align: justify;\">M&igrave;nh c&oacute; em &aacute;o kho&aacute;c dạ mua chưa mặc lần n&agrave;o,vẫn mơi tinh lu&ocirc;n!h&agrave;ng đảm bảo đẹp muốn để lại cho bạn n&agrave;o cần.c&aacute;c bạn c&oacute; thể qua tận nh&agrave; xem em &yacute;.m&igrave;nh c&ograve;n nhiều đồ kh&aacute;c nữa:)))mong mn ủng hộ ạ', '1', '10', '0');
INSERT INTO `product` VALUES ('19', 'sét 3 chi tiết dành cho bé trai', '450000', '32', '2015-10-21 20:48:26', null, '0', 'dodungmevabeset3chitietdanhchobetrai2929549469-201510726.jpg', '<p>Bộ 3 chi tiết d&agrave;nh cho b&eacute; trai. H&agrave;ng chuẩn chất đẹp i h&igrave;nh.<br />\r\nH&agrave;ng c&oacute; sẵn, size cho b&eacute; từ 1-4 tuổi. Mẹ n&agrave;o ưng th&igrave; ibox e ship nh&eacute;.<br />\r\nNhận ship to&agrave;n quốc</p>\r\n', '1', '10', '0');
INSERT INTO `product` VALUES ('20', 'quần áo cho nam', '150000', '27', '2015-10-21 20:49:12', null, '0', 'quanaoquanaochonam1436404334-201510850.jpg', '<p>C&oacute; tất cả c&aacute;c mầu c&aacute;c bạn nh&eacute;. H&agrave;ng vẫn c&ograve;n mới nguy&ecirc;n nh&eacute;. Nếu c&aacute;c bạn lấy lẻ th&igrave; gi&aacute; kh&aacute;c, m&agrave; c&aacute;c bạn lấy nhiều gi&aacute; cũng kh&aacute;c nh&eacute; . Từ 3 c&aacute;i trở l&ecirc;n sẽ được giảm rất nhiều . Nếu ai c&oacute; nhu cầu v&agrave; quan t&acirc;m th&igrave; vui l&ograve;ng li&ecirc;n hệ với m&igrave;nh gi&aacute; cho một c&aacute;i l&agrave; 150k/1 c&aacute;i . Nếu c&aacute;c bạn muốn mua nhiều vui l&ograve;ng li&ecirc;n hệ trực tiếp để tham khảo v&agrave; giảm gia nh&eacute;... C&aacute;m ơn c&aacute;c bạn rất nhiều</p>\r\n', '1', '10', '0');
INSERT INTO `product` VALUES ('21', 'áo da mô tô', '1000000', '27', '2015-10-21 20:50:38', null, '0', 'aodamoto2918810255-201510572.jpg', '<div class=\"body_text\" style=\"width: 635px; margin: 4px 0px 0px 3px; text-align: justify;\">t&ocirc;i muốn b&aacute;n 2 &aacute;o da<br />\r\n1: &aacute;o da xu&ocirc;ng mặc đi chơi tiệc t&ugrave;ng. d&agrave;nh cho bạn n&agrave;o 55 kg cao 165 l&agrave; chuẩn. 1 củ.<br />\r\n2: &aacute;o da chuy&ecirc;n đi đường d&agrave;i. &aacute;o d&ograve;ng harley d&ugrave;ng cho d&acirc;n chơi xe, loại n&agrave;y rất đắt anh em ạ. Ra đi 4 củ rưỡi. nặng 55 đến 62 kg. Cao 165</div>\r\n', '1', '10', '0');
INSERT INTO `product` VALUES ('22', 'Set len Ngọc Anh', '480000', '28', '2015-10-21 20:52:01', null, '0', 'quanaosetlenngocanh2908082381-201510434.jpg', '<p>Chất miễn lu&ocirc;n nh&eacute; :))<br />\r\nC&oacute; sẵn tại số 2 ng&otilde; 562/59 Thuỵ Khu&ecirc;</p>\r\n', '1', '10', '0');
INSERT INTO `product` VALUES ('23', 'Áo khoác len cổ tim', '46000', '28', '2015-10-21 20:53:11', null, '0', 'quanaoaokhoaclencotim2943338772-201510827.jpg', '<div class=\"body_text\" style=\"width: 635px; margin: 4px 0px 0px 3px; text-align: justify;\">&Aacute;o kho&aacute;c len c&oacute; n&uacute;t . Chất len mịn . M&agrave;u sắc đa dạng . Đổ bu&ocirc;n</div>\r\n', '1', '10', '0');
INSERT INTO `product` VALUES ('24', 'Mũ Parental Advisory', '199000', '31', '2015-10-21 20:54:06', null, '0', 'giaydeptuixachphukienmuparentaladvisory2932952201-201510409.jpg', '<div class=\"body_text\" style=\"width: 635px; margin: 4px 0px 0px 3px; text-align: justify;\">mình có thừa 1 chi&ecirc;́c mũ ki&ecirc;̉u dáng hiphop, ko dùng đ&ecirc;́n,tình trạng mới! trước mình mua hơn 300k, giờ đ&ecirc;̉ rẻ cho ae ! ai quan t&acirc;m xin li&ecirc;n h&ecirc;̣ ! xin cảm ơn !</div>\r\n', '1', '10', '0');
INSERT INTO `product` VALUES ('25', 'Áo khoác len', '320000', '28', '2015-10-21 20:55:01', null, '0', 'aokhoaclen2903881559-201510280.jpg', '<div class=\"body_text\" style=\"width: 635px; margin: 4px 0px 0px 3px; text-align: justify;\">&Aacute;o kho&aacute;c len d&agrave;i. Chất len ấm . Đổ bu&ocirc;n</div>\r\n', '1', '10', '0');
INSERT INTO `product` VALUES ('26', 'Quần skinny', '50000', '28', '2015-10-21 20:55:52', null, '0', 'quanaoquanskinny2950745378-201510242.jpg', '<div class=\"body_text\" style=\"width: 635px; margin: 4px 0px 0px 3px; text-align: justify;\">Quần Skinny chất kaki thun d&agrave;y mịn . co gi&atilde;n 4 chiều thoải m&aacute;i . M&agrave;u sắc đa dạng . Th&iacute;ch hợp mọi độ tuổi . Đổ bu&ocirc;n số lượng lớn</div>\r\n', '1', '10', '0');

-- ----------------------------
-- Table structure for province
-- ----------------------------
DROP TABLE IF EXISTS `province`;
CREATE TABLE `province` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `city_id` int(11) NOT NULL DEFAULT '888',
  `position` int(11) DEFAULT '888',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of province
-- ----------------------------
INSERT INTO `province` VALUES ('1', 'Huyện Thạch An', '1', '0');
INSERT INTO `province` VALUES ('2', 'Huyện Trà Lĩnh', '1', '0');
INSERT INTO `province` VALUES ('3', 'Huyện Hạ Lang', '1', '0');
INSERT INTO `province` VALUES ('4', 'Huyện Nguyên Bình', '1', '0');
INSERT INTO `province` VALUES ('5', 'Huyện Bảo Lạc', '1', '0');
INSERT INTO `province` VALUES ('6', 'Huyện Phục Hòa', '1', '0');
INSERT INTO `province` VALUES ('7', 'Huyện Trùng Khánh', '1', '0');
INSERT INTO `province` VALUES ('8', 'Huyện Hòa An', '1', '0');
INSERT INTO `province` VALUES ('9', 'Huyện Quảng Uyên', '1', '0');
INSERT INTO `province` VALUES ('10', 'Huyện Thông Nông', '1', '0');
INSERT INTO `province` VALUES ('11', 'Huyện Bảo Lâm', '1', '0');
INSERT INTO `province` VALUES ('12', 'Thị Xã Cao Bằng', '1', '0');
INSERT INTO `province` VALUES ('13', 'Huyện Hà Quảng', '1', '0');
INSERT INTO `province` VALUES ('14', 'Huyện Lương Tài', '2', '0');
INSERT INTO `province` VALUES ('15', 'Thành Phố Bắc Ninh', '2', '0');
INSERT INTO `province` VALUES ('16', 'Huyện Gia Bình', '2', '0');
INSERT INTO `province` VALUES ('17', 'Huyện Thuận Thành', '2', '0');
INSERT INTO `province` VALUES ('18', 'Huyện Quế Võ', '2', '0');
INSERT INTO `province` VALUES ('19', 'Huyện Yên Phong', '2', '0');
INSERT INTO `province` VALUES ('20', 'Huyện Tiên Du', '2', '0');
INSERT INTO `province` VALUES ('21', 'Thị Xã Từ Sơn', '2', '0');
INSERT INTO `province` VALUES ('22', 'Huyện Hoàng Su Phì', '3', '0');
INSERT INTO `province` VALUES ('23', 'Huyện Mèo Vạc', '3', '0');
INSERT INTO `province` VALUES ('24', 'Huyện Quang Bình', '3', '0');
INSERT INTO `province` VALUES ('25', 'Huyện Quản Bạ', '3', '0');
INSERT INTO `province` VALUES ('26', 'Huyện Vị Xuyên', '3', '0');
INSERT INTO `province` VALUES ('27', 'Huyện Bắc Mê', '3', '0');
INSERT INTO `province` VALUES ('28', 'Huyện Xín Mần', '3', '0');
INSERT INTO `province` VALUES ('29', 'Huyện Bắc Quang', '3', '0');
INSERT INTO `province` VALUES ('30', 'Thị Xã Hà Giang', '3', '0');
INSERT INTO `province` VALUES ('31', 'Huyện Đồng Văn', '3', '0');
INSERT INTO `province` VALUES ('32', 'Huyện Yên Minh', '3', '0');
INSERT INTO `province` VALUES ('33', 'Huyện Tam Đường', '4', '0');
INSERT INTO `province` VALUES ('34', 'Huyện Phong Thổ', '4', '0');
INSERT INTO `province` VALUES ('35', 'Huyện Sìn Hồ', '4', '0');
INSERT INTO `province` VALUES ('36', 'Huyện Than Uyên', '4', '0');
INSERT INTO `province` VALUES ('37', 'Huyện Mường Tè', '4', '0');
INSERT INTO `province` VALUES ('38', 'Thị Xã Lai Châu', '4', '0');
INSERT INTO `province` VALUES ('39', 'Huyện Tân Uyên', '4', '0');
INSERT INTO `province` VALUES ('40', 'Thành Phố Lào Cai', '5', '0');
INSERT INTO `province` VALUES ('41', 'Huyện Sa Pa', '5', '0');
INSERT INTO `province` VALUES ('42', 'Huyện Mường Khương', '5', '0');
INSERT INTO `province` VALUES ('43', 'Huyện Bát Xát', '5', '0');
INSERT INTO `province` VALUES ('44', 'Huyện Bảo Thắng', '5', '0');
INSERT INTO `province` VALUES ('45', 'Huyện Văn Bàn', '5', '0');
INSERT INTO `province` VALUES ('46', 'Huyện Bắc Hà', '5', '0');
INSERT INTO `province` VALUES ('47', 'Huyện Si Ma Cai', '5', '0');
INSERT INTO `province` VALUES ('48', 'Huyện Bảo Yên', '5', '0');
INSERT INTO `province` VALUES ('49', 'Huyện Chợ Mới', '6', '0');
INSERT INTO `province` VALUES ('50', 'Huyện Chợ đồn', '6', '0');
INSERT INTO `province` VALUES ('51', 'Huyện Ngân Sơn', '6', '0');
INSERT INTO `province` VALUES ('52', 'Thị Xã Bắc Kạn', '6', '0');
INSERT INTO `province` VALUES ('53', 'Huyện Pắc Nặm', '6', '0');
INSERT INTO `province` VALUES ('54', 'Huyện Na Rì', '6', '0');
INSERT INTO `province` VALUES ('55', 'Huyện Bạch Thông', '6', '0');
INSERT INTO `province` VALUES ('56', 'Huyện Ba Bể', '6', '0');
INSERT INTO `province` VALUES ('57', 'Thành phố Tuyên Quang', '7', '0');
INSERT INTO `province` VALUES ('58', 'Huyện Yên Sơn', '7', '0');
INSERT INTO `province` VALUES ('59', 'Huyện Hàm Yên', '7', '0');
INSERT INTO `province` VALUES ('60', 'Huyện Sơn Dương', '7', '0');
INSERT INTO `province` VALUES ('61', 'Huyện Chiêm Hóa', '7', '0');
INSERT INTO `province` VALUES ('62', 'Huyện Nà Hang', '7', '0');
INSERT INTO `province` VALUES ('63', 'Huyện Phù Cừ', '8', '0');
INSERT INTO `province` VALUES ('64', 'Huyện Văn Lâm', '8', '0');
INSERT INTO `province` VALUES ('65', 'Huyện Khoái Châu', '8', '0');
INSERT INTO `province` VALUES ('66', 'Huyện Yên Mỹ', '8', '0');
INSERT INTO `province` VALUES ('67', 'Huyện Ân Thi', '8', '0');
INSERT INTO `province` VALUES ('68', 'Thị Xã Hưng Yên', '8', '0');
INSERT INTO `province` VALUES ('69', 'Huyện Văn Giang', '8', '0');
INSERT INTO `province` VALUES ('70', 'Huyện Mỹ Hào', '8', '0');
INSERT INTO `province` VALUES ('71', 'Huyện Kim Động', '8', '0');
INSERT INTO `province` VALUES ('72', 'Huyện Tiên Lữ ', '8', '0');
INSERT INTO `province` VALUES ('73', 'Huyện Phú Hòa', '9', '0');
INSERT INTO `province` VALUES ('74', 'Thị Xã Sông Cầu', '9', '0');
INSERT INTO `province` VALUES ('75', 'Huyện Tuy An', '9', '0');
INSERT INTO `province` VALUES ('76', 'Huyện Sông Hinh', '9', '0');
INSERT INTO `province` VALUES ('77', 'Huyện Tây Hòa', '9', '0');
INSERT INTO `province` VALUES ('78', 'Huyện Đông Hòa', '9', '0');
INSERT INTO `province` VALUES ('79', 'Thành Phố Tuy Hòa', '9', '0');
INSERT INTO `province` VALUES ('80', 'Huyện Sơn Hòa', '9', '0');
INSERT INTO `province` VALUES ('81', 'Huyện Đồng Xuân', '9', '0');
INSERT INTO `province` VALUES ('82', 'Thành Phố Điện Biên Phủ', '10', '0');
INSERT INTO `province` VALUES ('83', 'Huyện Điện Biên', '10', '0');
INSERT INTO `province` VALUES ('84', 'Huyện Điện Biên Đông', '10', '0');
INSERT INTO `province` VALUES ('85', 'Thị Xã Mường Lay', '10', '0');
INSERT INTO `province` VALUES ('86', 'Huyện Tủa Chùa', '10', '0');
INSERT INTO `province` VALUES ('87', 'Huyện Mường Nhé', '10', '0');
INSERT INTO `province` VALUES ('88', 'Huyện Mường Chà', '10', '0');
INSERT INTO `province` VALUES ('89', 'Huyện Mường Áng', '10', '0');
INSERT INTO `province` VALUES ('90', 'Huyện Tuần Giáo', '10', '0');
INSERT INTO `province` VALUES ('91', 'Huyện Văn Chấn', '11', '0');
INSERT INTO `province` VALUES ('92', 'Huyện Văn Yên', '11', '0');
INSERT INTO `province` VALUES ('93', 'Huyện Trấn Yên', '11', '0');
INSERT INTO `province` VALUES ('94', 'Huyện Yên Bình', '11', '0');
INSERT INTO `province` VALUES ('95', 'Huyện Trạm Tấu', '11', '0');
INSERT INTO `province` VALUES ('96', 'Huyện Lục Yên', '11', '0');
INSERT INTO `province` VALUES ('97', 'Thị Xã Nghĩa Lộ', '11', '0');
INSERT INTO `province` VALUES ('98', 'Thành Phố Yên Bái', '11', '0');
INSERT INTO `province` VALUES ('99', 'Huyện Mù Căng Chải', '11', '0');
INSERT INTO `province` VALUES ('100', 'Huyện Phổ Yên', '12', '0');
INSERT INTO `province` VALUES ('101', 'Huyện Phú Lương ', '12', '0');
INSERT INTO `province` VALUES ('102', 'Huyện Võ Nhai', '12', '0');
INSERT INTO `province` VALUES ('103', 'Thành Phố Thái Nguyên', '12', '0');
INSERT INTO `province` VALUES ('104', 'Huyện Phú Bình', '12', '0');
INSERT INTO `province` VALUES ('105', 'Huyện Đồng Hỷ', '12', '0');
INSERT INTO `province` VALUES ('106', 'Huyện Đại Từ', '12', '0');
INSERT INTO `province` VALUES ('107', 'Huyện Định Hóa', '12', '0');
INSERT INTO `province` VALUES ('108', 'Thị Xã Sông Công', '12', '0');
INSERT INTO `province` VALUES ('109', 'Huyện Long Phú', '13', '0');
INSERT INTO `province` VALUES ('110', 'Thị Xã Vĩnh Châu', '13', '0');
INSERT INTO `province` VALUES ('111', 'Huyện Thạnh Trị', '13', '0');
INSERT INTO `province` VALUES ('112', 'Huyện Châu Thành', '13', '0');
INSERT INTO `province` VALUES ('113', 'Huyện Ngã Năm', '13', '0');
INSERT INTO `province` VALUES ('114', 'Huyện Kế Sách', '13', '0');
INSERT INTO `province` VALUES ('115', 'Huyện Cù Lao Dung', '13', '0');
INSERT INTO `province` VALUES ('116', 'Thành Phố Sóc Trăng', '13', '0');
INSERT INTO `province` VALUES ('117', 'Huyện Mỹ Xuyên', '13', '0');
INSERT INTO `province` VALUES ('118', 'Huyện Mỹ Tú', '13', '0');
INSERT INTO `province` VALUES ('119', 'Huyện Văn Quan', '14', '0');
INSERT INTO `province` VALUES ('120', 'Huyện Hữu Lũng', '14', '0');
INSERT INTO `province` VALUES ('121', 'Huyện Chi Lăng', '14', '0');
INSERT INTO `province` VALUES ('122', 'Thành Phố Lạng Sơn', '14', '0');
INSERT INTO `province` VALUES ('123', 'Huyện Bắc Sơn', '14', '0');
INSERT INTO `province` VALUES ('124', 'Huyện Văn Lãng', '14', '0');
INSERT INTO `province` VALUES ('125', 'Huyện Bình Gia', '14', '0');
INSERT INTO `province` VALUES ('126', 'Huyện Tràng Định', '14', '0');
INSERT INTO `province` VALUES ('127', 'Huyện Lộc Bình', '14', '0');
INSERT INTO `province` VALUES ('128', 'Huyện Cao Lộc', '14', '0');
INSERT INTO `province` VALUES ('129', 'Huyện Đình Lập', '14', '0');
INSERT INTO `province` VALUES ('130', 'Thị Xã Phúc Yên', '15', '0');
INSERT INTO `province` VALUES ('131', 'Huyện Vĩnh Tường', '15', '0');
INSERT INTO `province` VALUES ('132', 'Thành Phố Vĩnh Yên', '15', '0');
INSERT INTO `province` VALUES ('133', 'Huyên Yên Lạc', '15', '0');
INSERT INTO `province` VALUES ('134', 'Huyện Lập Thạch', '15', '0');
INSERT INTO `province` VALUES ('135', 'Huỵên Tam Đảo', '15', '0');
INSERT INTO `province` VALUES ('136', 'Huyện Tam Dương', '15', '0');
INSERT INTO `province` VALUES ('137', 'Huyện Bình Xuyên', '15', '0');
INSERT INTO `province` VALUES ('138', 'Huyện Sông Lô', '15', '0');
INSERT INTO `province` VALUES ('139', 'Huyện Quỳnh Nhai', '16', '0');
INSERT INTO `province` VALUES ('140', 'Huyện Mường La', '16', '0');
INSERT INTO `province` VALUES ('141', 'Huyện Sông Mã', '16', '0');
INSERT INTO `province` VALUES ('142', 'Thị Xã Sơn La', '16', '0');
INSERT INTO `province` VALUES ('143', 'Huyện Mai Sơn', '16', '0');
INSERT INTO `province` VALUES ('144', 'Huyện Phù Yên', '16', '0');
INSERT INTO `province` VALUES ('145', 'Huyện Sốp Cộp', '16', '0');
INSERT INTO `province` VALUES ('146', 'Huyện Thuận Châu', '16', '0');
INSERT INTO `province` VALUES ('147', 'Huyện Bắc Yên', '16', '0');
INSERT INTO `province` VALUES ('148', 'Huyện Mộc Châu', '16', '0');
INSERT INTO `province` VALUES ('149', 'Huyện Yên Châu', '16', '0');
INSERT INTO `province` VALUES ('150', 'Thi Xã Phú Thọ', '17', '0');
INSERT INTO `province` VALUES ('151', 'Huyện Thanh Ba', '17', '0');
INSERT INTO `province` VALUES ('152', 'Thành Phố Việt Trì', '17', '0');
INSERT INTO `province` VALUES ('153', 'Huyện Đoan Hùng', '17', '0');
INSERT INTO `province` VALUES ('154', 'Huyện Thanh Thủy', '17', '0');
INSERT INTO `province` VALUES ('155', 'Huyện Phù Ninh', '17', '0');
INSERT INTO `province` VALUES ('156', 'Huyện Thanh Sơn', '17', '0');
INSERT INTO `province` VALUES ('157', 'Huyện Tân Sơn', '17', '0');
INSERT INTO `province` VALUES ('158', 'Huyện Yên Lập', '17', '0');
INSERT INTO `province` VALUES ('159', 'Huyện Cẩm Khê', '17', '0');
INSERT INTO `province` VALUES ('160', 'Huyện Tam Nông', '17', '0');
INSERT INTO `province` VALUES ('161', 'Huyện Lâm Thao', '17', '0');
INSERT INTO `province` VALUES ('162', 'Huyện Hạ Hòa', '17', '0');
INSERT INTO `province` VALUES ('163', 'Quận Hoàn Kiếm', '18', '0');
INSERT INTO `province` VALUES ('164', 'Huyện Ba Vì', '18', '0');
INSERT INTO `province` VALUES ('165', 'Huyện Từ Liêm', '18', '0');
INSERT INTO `province` VALUES ('166', 'Huyện Hoài Đức', '18', '0');
INSERT INTO `province` VALUES ('167', 'Quận Hoàng Mai', '18', '0');
INSERT INTO `province` VALUES ('168', 'Huyện Thạch Thất', '18', '0');
INSERT INTO `province` VALUES ('169', 'Huyện Chương Mỹ', '18', '0');
INSERT INTO `province` VALUES ('170', 'Quận Hà Đông', '18', '0');
INSERT INTO `province` VALUES ('171', 'Huyện Sóc Sơn', '18', '0');
INSERT INTO `province` VALUES ('172', 'Huyện Gia Lâm', '18', '0');
INSERT INTO `province` VALUES ('173', 'Quận Hai Bà Trưng', '18', '0');
INSERT INTO `province` VALUES ('174', 'Quận Tây Hồ', '18', '0');
INSERT INTO `province` VALUES ('175', 'Huyện Mê Linh', '18', '0');
INSERT INTO `province` VALUES ('176', 'Huyện Thanh Trì', '18', '0');
INSERT INTO `province` VALUES ('177', 'Huyện Ứng Hòa', '18', '0');
INSERT INTO `province` VALUES ('178', 'Quận Cầu Giấy', '18', '0');
INSERT INTO `province` VALUES ('179', 'Huyện Phúc Thọ', '18', '0');
INSERT INTO `province` VALUES ('180', 'Huyện Thanh Oai', '18', '0');
INSERT INTO `province` VALUES ('181', 'Huyện Thường Tín', '18', '0');
INSERT INTO `province` VALUES ('182', 'Huyện Mỹ Đức', '18', '0');
INSERT INTO `province` VALUES ('183', 'Thị Xã Sơn Tây', '18', '0');
INSERT INTO `province` VALUES ('184', 'Huyện Phú Xuyên', '18', '0');
INSERT INTO `province` VALUES ('185', 'Huyện Đan Phượng', '18', '0');
INSERT INTO `province` VALUES ('186', 'Quận Long Biên', '18', '0');
INSERT INTO `province` VALUES ('187', 'Huyện Quốc Oai', '18', '0');
INSERT INTO `province` VALUES ('188', 'Huyện Đông Anh', '18', '0');
INSERT INTO `province` VALUES ('189', 'Quận Ba Đình', '18', '0');
INSERT INTO `province` VALUES ('190', 'Quận Thanh Xuân', '18', '0');
INSERT INTO `province` VALUES ('191', 'Quận Đống Đa', '18', '0');
INSERT INTO `province` VALUES ('192', 'Thành Phố Bắc Giang', '19', '0');
INSERT INTO `province` VALUES ('193', 'Huyện Hiệp Hòa', '19', '0');
INSERT INTO `province` VALUES ('194', 'Huyện Việt Yên', '19', '0');
INSERT INTO `province` VALUES ('195', 'Huyện Sơn Động', '19', '0');
INSERT INTO `province` VALUES ('196', 'Huyện Yên Thế', '19', '0');
INSERT INTO `province` VALUES ('197', 'Huyện Yên Dũng', '19', '0');
INSERT INTO `province` VALUES ('198', 'Huyện Lục Ngạn', '19', '0');
INSERT INTO `province` VALUES ('199', 'Huyện Lục Nam', '19', '0');
INSERT INTO `province` VALUES ('200', 'Huyện Lạng Giang', '19', '0');
INSERT INTO `province` VALUES ('201', 'Huyện Tân Yên', '19', '0');
INSERT INTO `province` VALUES ('202', 'Huyện Tiên Yên', '20', '0');
INSERT INTO `province` VALUES ('203', 'Thị Xã Uông Bí', '20', '0');
INSERT INTO `province` VALUES ('204', 'Huyện Yên Hưng', '20', '0');
INSERT INTO `province` VALUES ('205', 'Huyện Đông Triều', '20', '0');
INSERT INTO `province` VALUES ('206', 'Huyện Ba Chẽ', '20', '0');
INSERT INTO `province` VALUES ('207', 'Huyện Bình Liêu', '20', '0');
INSERT INTO `province` VALUES ('208', 'Huyện Đầm Hà', '20', '0');
INSERT INTO `province` VALUES ('209', 'Huyện Hoành Bồ', '20', '0');
INSERT INTO `province` VALUES ('210', 'Huyện Vân Đồn', '20', '0');
INSERT INTO `province` VALUES ('211', 'Thị Xã Cẩm Phả', '20', '0');
INSERT INTO `province` VALUES ('212', 'Huyện Cô Tô', '20', '0');
INSERT INTO `province` VALUES ('213', 'Thành Phố Móng Cái', '20', '0');
INSERT INTO `province` VALUES ('214', 'Huyện Hải Hà', '20', '0');
INSERT INTO `province` VALUES ('215', 'Thành Phố Hạ Long', '20', '0');
INSERT INTO `province` VALUES ('216', 'Thành Phố Hải Dương', '22', '0');
INSERT INTO `province` VALUES ('217', 'Huyện Ninh Giang', '22', '0');
INSERT INTO `province` VALUES ('218', 'Huyện Tứ Kỳ', '22', '0');
INSERT INTO `province` VALUES ('219', 'Huyện Thanh Hà ', '22', '0');
INSERT INTO `province` VALUES ('220', 'Huyện Cẩm Giàng', '22', '0');
INSERT INTO `province` VALUES ('221', 'Huyện Kim Thành ', '22', '0');
INSERT INTO `province` VALUES ('222', 'Huyện Thanh Miện', '22', '0');
INSERT INTO `province` VALUES ('223', 'Huyện Nam Sách', '22', '0');
INSERT INTO `province` VALUES ('224', 'Huyện Kinh Môn', '22', '0');
INSERT INTO `province` VALUES ('225', 'Thị Xã Chí Linh', '22', '0');
INSERT INTO `province` VALUES ('226', 'Huyện Bình Giang', '22', '0');
INSERT INTO `province` VALUES ('227', 'Huyện Gia Lộc', '22', '0');
INSERT INTO `province` VALUES ('228', 'Huyện Kỳ Sơn', '23', '0');
INSERT INTO `province` VALUES ('229', 'Huyện Đà Bắc', '23', '0');
INSERT INTO `province` VALUES ('230', 'Huyện Lạc Thủy', '23', '0');
INSERT INTO `province` VALUES ('231', 'Huyện Kim Bôi', '23', '0');
INSERT INTO `province` VALUES ('232', 'Huyện Tân Lạc', '23', '0');
INSERT INTO `province` VALUES ('233', 'Huyện Lạc Sơn', '23', '0');
INSERT INTO `province` VALUES ('234', 'Huyện Lương Sơn', '23', '0');
INSERT INTO `province` VALUES ('235', 'Huyện Mai Châu', '23', '0');
INSERT INTO `province` VALUES ('236', 'Huyện Yên Thủy', '23', '0');
INSERT INTO `province` VALUES ('237', 'Thành Phố Hòa Bình', '23', '0');
INSERT INTO `province` VALUES ('238', 'Huyện Cao Phong', '23', '0');
INSERT INTO `province` VALUES ('239', 'Quận Hồng Bàng', '24', '0');
INSERT INTO `province` VALUES ('240', 'Quận Đồ Sơn', '24', '0');
INSERT INTO `province` VALUES ('241', 'Quận Lê Chân', '24', '0');
INSERT INTO `province` VALUES ('242', 'Huyện An Dương', '24', '0');
INSERT INTO `province` VALUES ('243', 'Huyện Đảo Bạch Long Vĩ', '24', '0');
INSERT INTO `province` VALUES ('244', 'Huyện Kiến Thụy', '24', '0');
INSERT INTO `province` VALUES ('245', 'Quận Hải An', '24', '0');
INSERT INTO `province` VALUES ('246', 'Quận Dương Kinh', '24', '0');
INSERT INTO `province` VALUES ('247', 'Huyện An Lão', '24', '0');
INSERT INTO `province` VALUES ('248', 'Huyện Vĩnh Bảo', '24', '0');
INSERT INTO `province` VALUES ('249', 'Quận Kiến An', '24', '0');
INSERT INTO `province` VALUES ('250', 'Huyện Đảo Cát Hải', '24', '0');
INSERT INTO `province` VALUES ('251', 'Huyện Thủy Nguyên', '24', '0');
INSERT INTO `province` VALUES ('252', 'Quận Ngô Quyền', '24', '0');
INSERT INTO `province` VALUES ('253', 'Huyện Tiên Lãng', '24', '0');
INSERT INTO `province` VALUES ('254', 'Huyện Duy Tiên', '25', '0');
INSERT INTO `province` VALUES ('255', 'Huyện Kim Bảng', '25', '0');
INSERT INTO `province` VALUES ('256', 'Huyện Lý Nhân', '25', '0');
INSERT INTO `province` VALUES ('257', 'Huyện Bình Lục', '25', '0');
INSERT INTO `province` VALUES ('258', 'Thành Phố Phủ Lý', '25', '0');
INSERT INTO `province` VALUES ('259', 'Huyện Thanh Liêm', '25', '0');
INSERT INTO `province` VALUES ('260', 'Huyện Thái Thụy', '26', '0');
INSERT INTO `province` VALUES ('261', 'Huyện Vũ Thư', '26', '0');
INSERT INTO `province` VALUES ('262', 'Huyện Quỳnh Phụ', '26', '0');
INSERT INTO `province` VALUES ('263', 'Huyện Hưng Hà', '26', '0');
INSERT INTO `province` VALUES ('264', 'Huyện Quỳnh Côi', '26', '0');
INSERT INTO `province` VALUES ('265', 'ThàNh Phố Thái Bình', '26', '0');
INSERT INTO `province` VALUES ('266', 'Huyện Đông Hưng', '26', '0');
INSERT INTO `province` VALUES ('267', 'Huyện Tiền Hải', '26', '0');
INSERT INTO `province` VALUES ('268', 'Huyện Kiến Xương', '26', '0');
INSERT INTO `province` VALUES ('269', 'ThàNh Phố Ninh Bình', '27', '0');
INSERT INTO `province` VALUES ('270', 'Thị Xã Tam điệp', '27', '0');
INSERT INTO `province` VALUES ('271', 'Huyện Kim Sơn', '27', '0');
INSERT INTO `province` VALUES ('272', 'Huyện Nho Quan', '27', '0');
INSERT INTO `province` VALUES ('273', 'Huyện Gia Viễn', '27', '0');
INSERT INTO `province` VALUES ('274', 'Huyện Hoa Lư', '27', '0');
INSERT INTO `province` VALUES ('275', 'Huyện Yên Mô', '27', '0');
INSERT INTO `province` VALUES ('276', 'Huyện Ý Yên', '27', '0');
INSERT INTO `province` VALUES ('277', 'Huyện Yên Khánh', '27', '0');
INSERT INTO `province` VALUES ('278', 'Huyện Ý Yên', '28', '0');
INSERT INTO `province` VALUES ('279', 'Huyện Nam Trực', '28', '0');
INSERT INTO `province` VALUES ('280', 'Huyện Trực Ninh', '28', '0');
INSERT INTO `province` VALUES ('281', 'Huyện Mỹ Lộc', '28', '0');
INSERT INTO `province` VALUES ('282', 'Huyện Xuân Trường', '28', '0');
INSERT INTO `province` VALUES ('283', 'Huyện Giao Thủy', '28', '0');
INSERT INTO `province` VALUES ('284', 'Huyện Nghĩa Hưng', '28', '0');
INSERT INTO `province` VALUES ('285', 'Thành Phố Nam định', '28', '0');
INSERT INTO `province` VALUES ('286', 'Huyện Hải Hậu', '28', '0');
INSERT INTO `province` VALUES ('287', 'Huyện Vụ Bản', '28', '0');
INSERT INTO `province` VALUES ('288', 'Huyện Ngọc Lặc', '29', '0');
INSERT INTO `province` VALUES ('289', 'Huyện Hoằng Hóa', '29', '0');
INSERT INTO `province` VALUES ('290', 'Huyện Quan Sơn', '29', '0');
INSERT INTO `province` VALUES ('291', 'Huyện Thọ Xuân', '29', '0');
INSERT INTO `province` VALUES ('292', 'Huyện Thạch Thành', '29', '0');
INSERT INTO `province` VALUES ('293', 'Thị Xã Sầm Sơn', '29', '0');
INSERT INTO `province` VALUES ('294', 'Huyện Quảng Xương', '29', '0');
INSERT INTO `province` VALUES ('295', 'Huyện Nga Sơn', '29', '0');
INSERT INTO `province` VALUES ('296', 'Huyện Đông Sơn', '29', '0');
INSERT INTO `province` VALUES ('297', 'Huyện Vĩnh Lộc', '29', '0');
INSERT INTO `province` VALUES ('298', 'Huyện Lang Chánh', '29', '0');
INSERT INTO `province` VALUES ('299', 'Thành Phố Thanh Hóa', '29', '0');
INSERT INTO `province` VALUES ('300', 'Huyện Triệu Sơn', '29', '0');
INSERT INTO `province` VALUES ('301', 'Huyện Nông Cống', '29', '0');
INSERT INTO `province` VALUES ('302', 'Huyện Tĩnh Gia', '29', '0');
INSERT INTO `province` VALUES ('303', 'Huyện Thường Xuân', '29', '0');
INSERT INTO `province` VALUES ('304', 'Huyện Yên định', '29', '0');
INSERT INTO `province` VALUES ('305', 'Huyện Như Xuân', '29', '0');
INSERT INTO `province` VALUES ('306', 'Huyện Bá Thước', '29', '0');
INSERT INTO `province` VALUES ('307', 'Huyện Hậu Lộc', '29', '0');
INSERT INTO `province` VALUES ('308', 'Huyện Như Thanh', '29', '0');
INSERT INTO `province` VALUES ('309', 'Thị Xã Bỉm Sơn', '29', '0');
INSERT INTO `province` VALUES ('310', 'Huyện Hà Trung', '29', '0');
INSERT INTO `province` VALUES ('311', 'Huyện Thiệu Hóa', '29', '0');
INSERT INTO `province` VALUES ('312', 'Huyện Mường Lát', '29', '0');
INSERT INTO `province` VALUES ('313', 'Huyện Cẩm Thủy', '29', '0');
INSERT INTO `province` VALUES ('314', 'Huyện Quan Hóa', '29', '0');
INSERT INTO `province` VALUES ('315', 'Huyện Anh Sơn', '30', '0');
INSERT INTO `province` VALUES ('316', 'Huyện Thanh Chương', '30', '0');
INSERT INTO `province` VALUES ('317', 'Huyện Quỳnh Lưu', '30', '0');
INSERT INTO `province` VALUES ('318', 'Huyện Quỳ Hợp', '30', '0');
INSERT INTO `province` VALUES ('319', 'Huyện Con Cuông', '30', '0');
INSERT INTO `province` VALUES ('320', 'Huyện Hưng Nguyên', '30', '0');
INSERT INTO `province` VALUES ('321', 'Huyện Nghĩa Đàn', '30', '0');
INSERT INTO `province` VALUES ('322', 'Thị Xã Thái Hòa', '30', '0');
INSERT INTO `province` VALUES ('323', 'Huyện Quỳ Châu', '30', '0');
INSERT INTO `province` VALUES ('324', 'Thị Xã Cửa Lò', '30', '0');
INSERT INTO `province` VALUES ('325', 'Huyện Tương Dương', '30', '0');
INSERT INTO `province` VALUES ('326', 'Huyện Quế Phong', '30', '0');
INSERT INTO `province` VALUES ('327', 'Huyện Nam Đàn', '30', '0');
INSERT INTO `province` VALUES ('328', 'Huyện Tân Kỳ', '30', '0');
INSERT INTO `province` VALUES ('329', 'Huyện Diễn Châu', '30', '0');
INSERT INTO `province` VALUES ('330', 'Huyện Kỳ Sơn', '30', '0');
INSERT INTO `province` VALUES ('331', 'ThàNh Phố Vinh', '30', '0');
INSERT INTO `province` VALUES ('332', 'Huyện Đô Lương', '30', '0');
INSERT INTO `province` VALUES ('333', 'Huyện Nghi Lộc', '30', '0');
INSERT INTO `province` VALUES ('334', 'Huyện Yên Thành', '30', '0');
INSERT INTO `province` VALUES ('335', 'Huyện Vũ Quang', '31', '0');
INSERT INTO `province` VALUES ('336', 'Huyện Đức Thọ', '31', '0');
INSERT INTO `province` VALUES ('337', 'Huyện Can Lộc', '31', '0');
INSERT INTO `province` VALUES ('338', 'Huyện Lộc Hà', '31', '0');
INSERT INTO `province` VALUES ('339', 'Thị Xã Hồng Lĩnh', '31', '0');
INSERT INTO `province` VALUES ('340', 'Huyện Nghi Xuân', '31', '0');
INSERT INTO `province` VALUES ('341', 'Huyện Hương Sơn', '31', '0');
INSERT INTO `province` VALUES ('342', 'Huyện Hương Khê', '31', '0');
INSERT INTO `province` VALUES ('343', 'Huyện Cẩm Xuyên', '31', '0');
INSERT INTO `province` VALUES ('344', 'Huyện Kỳ Anh', '31', '0');
INSERT INTO `province` VALUES ('345', 'Thành Phố Hà Tĩnh', '31', '0');
INSERT INTO `province` VALUES ('346', 'Huyện Thạch Hà', '31', '0');
INSERT INTO `province` VALUES ('354', 'Huyện Triệu Phong', '33', '0');
INSERT INTO `province` VALUES ('355', 'Thành Phố đông Hà', '33', '0');
INSERT INTO `province` VALUES ('356', 'Huyện Gio Linh', '33', '0');
INSERT INTO `province` VALUES ('357', 'Huyện Hướng Hóa', '33', '0');
INSERT INTO `province` VALUES ('358', 'Thị Xã Quảng Trị', '33', '0');
INSERT INTO `province` VALUES ('359', 'Huyện Cam Lộ', '33', '0');
INSERT INTO `province` VALUES ('360', 'Huyện Đảo Cồn Cỏ', '33', '0');
INSERT INTO `province` VALUES ('361', 'Huyện Đak Rông', '33', '0');
INSERT INTO `province` VALUES ('362', 'Huyện Hải Lăng', '33', '0');
INSERT INTO `province` VALUES ('363', 'Huyện Vĩnh Linh', '33', '0');
INSERT INTO `province` VALUES ('364', 'Huyện Hương Trà', '34', '0');
INSERT INTO `province` VALUES ('365', 'Huyện Phú Vang', '34', '0');
INSERT INTO `province` VALUES ('366', 'Huyện Phú Lộc', '34', '0');
INSERT INTO `province` VALUES ('367', 'Thị Xã Hương Thủy', '34', '0');
INSERT INTO `province` VALUES ('368', 'Huyện A Lưới', '34', '0');
INSERT INTO `province` VALUES ('369', 'Huyện Phong Điền', '34', '0');
INSERT INTO `province` VALUES ('370', 'Huyện Quảng Điền', '34', '0');
INSERT INTO `province` VALUES ('371', 'Thành Phố Huế', '34', '0');
INSERT INTO `province` VALUES ('372', 'Huyện Nam đông', '34', '0');
INSERT INTO `province` VALUES ('373', 'Quận Cẩm Lệ', '35', '0');
INSERT INTO `province` VALUES ('374', 'Quận Thanh Khê', '35', '0');
INSERT INTO `province` VALUES ('375', 'Quận Ngũ Hành Sơn', '35', '0');
INSERT INTO `province` VALUES ('376', 'Quận Hải Châu', '35', '0');
INSERT INTO `province` VALUES ('377', 'Quận Sơn Trà', '35', '0');
INSERT INTO `province` VALUES ('378', 'Huyện Hòa Vang', '35', '0');
INSERT INTO `province` VALUES ('379', 'Quận Liên Chiểu', '35', '0');
INSERT INTO `province` VALUES ('380', 'Huyện Hoàng Sa', '35', '0');
INSERT INTO `province` VALUES ('381', 'Huyện Phú Ninh', '36', '0');
INSERT INTO `province` VALUES ('382', 'Huyện Phước Sơn', '36', '0');
INSERT INTO `province` VALUES ('383', 'Huyện Đại Lộc', '36', '0');
INSERT INTO `province` VALUES ('384', 'Huyện Nam Giang', '36', '0');
INSERT INTO `province` VALUES ('385', 'Huyện Thăng Bình', '36', '0');
INSERT INTO `province` VALUES ('386', 'Thành Phố Tam Kỳ', '36', '0');
INSERT INTO `province` VALUES ('387', 'Huyện Nam Trà My', '36', '0');
INSERT INTO `province` VALUES ('388', 'Huyện Đông Giang', '36', '0');
INSERT INTO `province` VALUES ('389', 'Huyện Bắc Trà My', '36', '0');
INSERT INTO `province` VALUES ('390', 'Huyện Tây Giang', '36', '0');
INSERT INTO `province` VALUES ('391', 'Thành Phố Hội An', '36', '0');
INSERT INTO `province` VALUES ('392', 'Huyện Tiên Phước', '36', '0');
INSERT INTO `province` VALUES ('393', 'Huyện Hiệp Đức', '36', '0');
INSERT INTO `province` VALUES ('394', 'Huyện Điện Bàn', '36', '0');
INSERT INTO `province` VALUES ('395', 'Huyện Duy Xuyên', '36', '0');
INSERT INTO `province` VALUES ('396', 'Huyện Quế Sơn', '36', '0');
INSERT INTO `province` VALUES ('397', 'Huyện Nông Sơn', '36', '0');
INSERT INTO `province` VALUES ('398', 'Huyện Núi Thành', '36', '0');
INSERT INTO `province` VALUES ('399', 'Huyện Nghĩa Hành', '37', '0');
INSERT INTO `province` VALUES ('400', 'Huyện Tư Nghĩa', '37', '0');
INSERT INTO `province` VALUES ('401', 'Huyện Ba Tơ', '37', '0');
INSERT INTO `province` VALUES ('402', 'Huyện Minh Long', '37', '0');
INSERT INTO `province` VALUES ('403', 'Huyện Bình Sơn', '37', '0');
INSERT INTO `province` VALUES ('404', 'Thành Phố Quảng Ngãi', '37', '0');
INSERT INTO `province` VALUES ('405', 'Huyện Mộ đức', '37', '0');
INSERT INTO `province` VALUES ('406', 'Huyện Sơn Tây', '37', '0');
INSERT INTO `province` VALUES ('407', 'Huyện Trà Bồng', '37', '0');
INSERT INTO `province` VALUES ('408', 'Huyện Tây Trà', '37', '0');
INSERT INTO `province` VALUES ('409', 'Huyện Lý Sơn', '37', '0');
INSERT INTO `province` VALUES ('410', 'Huyện Sơn Hà', '37', '0');
INSERT INTO `province` VALUES ('411', 'Huyện đức Phổ', '37', '0');
INSERT INTO `province` VALUES ('412', 'Huyện Sơn Tịnh', '37', '0');
INSERT INTO `province` VALUES ('413', 'Huyện Đắk Hà', '38', '0');
INSERT INTO `province` VALUES ('414', 'Huyện Đắk Glei', '38', '0');
INSERT INTO `province` VALUES ('415', 'Huyện Sa Thầy', '38', '0');
INSERT INTO `province` VALUES ('416', 'Huyện Tu Mơ Rông', '38', '0');
INSERT INTO `province` VALUES ('417', 'Huyện Kon Plông', '38', '0');
INSERT INTO `province` VALUES ('418', 'Thành Phố Kon Tum', '38', '0');
INSERT INTO `province` VALUES ('419', 'Huyện Đắk Tô', '38', '0');
INSERT INTO `province` VALUES ('420', 'Huyện Ngọc Hồi', '38', '0');
INSERT INTO `province` VALUES ('421', 'Huyện Kon Rẫy', '38', '0');
INSERT INTO `province` VALUES ('422', 'Huyên Tây Sơn', '39', '0');
INSERT INTO `province` VALUES ('423', 'Huyện HoàI ân', '39', '0');
INSERT INTO `province` VALUES ('424', 'Huyện Vân Canh', '39', '0');
INSERT INTO `province` VALUES ('425', 'Huyện An Nhơn', '39', '0');
INSERT INTO `province` VALUES ('426', 'Huyện HoàI Nhơn', '39', '0');
INSERT INTO `province` VALUES ('427', 'Huyện Phù Cát', '39', '0');
INSERT INTO `province` VALUES ('429', 'Huyện Vĩnh Thạnh', '39', '0');
INSERT INTO `province` VALUES ('430', 'Thành Phố Quy Nhơn', '39', '0');
INSERT INTO `province` VALUES ('431', 'Huyện Tuy Phước', '39', '0');
INSERT INTO `province` VALUES ('432', 'Huyện Phù Mỹ', '39', '0');
INSERT INTO `province` VALUES ('433', 'Huyện Chư Prông', '40', '0');
INSERT INTO `province` VALUES ('434', 'Huyện Krông Pa', '40', '0');
INSERT INTO `province` VALUES ('435', 'Huyện Phú Thiện', '40', '0');
INSERT INTO `province` VALUES ('436', 'Thành Phố Pleiku', '40', '0');
INSERT INTO `province` VALUES ('437', 'Huyện Đăk Đoa', '40', '0');
INSERT INTO `province` VALUES ('438', 'Huyện Đăk Pơ', '40', '0');
INSERT INTO `province` VALUES ('439', 'Huyện Ia Grai', '40', '0');
INSERT INTO `province` VALUES ('440', 'Huyện Đức Cơ', '40', '0');
INSERT INTO `province` VALUES ('441', 'Huyện Chư Sê', '40', '0');
INSERT INTO `province` VALUES ('442', 'Huyện Kbang', '40', '0');
INSERT INTO `province` VALUES ('443', 'Huyện Kông Chro', '40', '0');
INSERT INTO `province` VALUES ('444', 'Huyện Mang Yang', '40', '0');
INSERT INTO `province` VALUES ('445', 'Huyện Chư Păh', '40', '0');
INSERT INTO `province` VALUES ('446', 'Huyện Ia Pa', '40', '0');
INSERT INTO `province` VALUES ('447', 'Huyện Chư Pưh', '40', '0');
INSERT INTO `province` VALUES ('448', 'Thị Xã An Khê', '40', '0');
INSERT INTO `province` VALUES ('449', 'Thị Xã Ayun Pa', '40', '0');
INSERT INTO `province` VALUES ('450', 'Huyện Krông Búk', '42', '0');
INSERT INTO `province` VALUES ('451', 'Huyện Krông Năng', '42', '0');
INSERT INTO `province` VALUES ('452', 'Thị Xã Buôn Hồ', '42', '0');
INSERT INTO `province` VALUES ('453', 'Huyện Cư Kuin', '42', '0');
INSERT INTO `province` VALUES ('454', 'Huyện Ea Kar', '42', '0');
INSERT INTO `province` VALUES ('455', 'Thành Phố Buôn Ma Thuột', '42', '0');
INSERT INTO `province` VALUES ('456', 'Huyện Krông A Na', '42', '0');
INSERT INTO `province` VALUES ('457', 'Huyện Krông Pắk', '42', '0');
INSERT INTO `province` VALUES ('458', 'Huyện Lắk', '42', '0');
INSERT INTO `province` VALUES ('459', 'Huyện Cư M\'gar', '42', '0');
INSERT INTO `province` VALUES ('460', 'Huyện Buôn đôn', '42', '0');
INSERT INTO `province` VALUES ('461', 'Huyện Ea Súp', '42', '0');
INSERT INTO `province` VALUES ('462', 'Huyện Krông Bông', '42', '0');
INSERT INTO `province` VALUES ('463', 'Huyện M\'Đrắk', '42', '0');
INSERT INTO `province` VALUES ('464', 'Huyện Ea H\'leo', '42', '0');
INSERT INTO `province` VALUES ('465', 'Thành Phố Nha Trang', '43', '0');
INSERT INTO `province` VALUES ('466', 'Huyện Ninh Hòa', '43', '0');
INSERT INTO `province` VALUES ('467', 'Huyện Khánh Sơn', '43', '0');
INSERT INTO `province` VALUES ('468', 'Thành Phố Cam Ranh', '43', '0');
INSERT INTO `province` VALUES ('469', 'Huyện Diên Khánh', '43', '0');
INSERT INTO `province` VALUES ('470', 'Huyện Khánh Vĩnh', '43', '0');
INSERT INTO `province` VALUES ('471', 'Huyện Vạn Ninh', '43', '0');
INSERT INTO `province` VALUES ('472', 'Huyện Cam Lâm', '43', '0');
INSERT INTO `province` VALUES ('473', 'Huyện Đảo Trường Sa', '43', '0');
INSERT INTO `province` VALUES ('474', 'Huyện Đắk Glong', '44', '0');
INSERT INTO `province` VALUES ('475', 'Huyện Tuy đức', '44', '0');
INSERT INTO `province` VALUES ('476', 'Huyện Đăk R\'lấp', '44', '0');
INSERT INTO `province` VALUES ('477', 'Thị Xã Gia Nghĩa', '44', '0');
INSERT INTO `province` VALUES ('478', 'Huyện Cư Jút', '44', '0');
INSERT INTO `province` VALUES ('479', 'Huyện Krông Nô', '44', '0');
INSERT INTO `province` VALUES ('480', 'Huyện Đắk Song', '44', '0');
INSERT INTO `province` VALUES ('481', 'Huyện Đắk Mil', '44', '0');
INSERT INTO `province` VALUES ('482', 'Huyện Bù đốp', '45', '0');
INSERT INTO `province` VALUES ('483', 'Huyện Lộc Ninh', '45', '0');
INSERT INTO `province` VALUES ('484', 'Thị Xã Phước Long', '45', '0');
INSERT INTO `province` VALUES ('485', 'Thị Xã Đồng Xoài', '45', '0');
INSERT INTO `province` VALUES ('486', 'Huyện Đồng Phú', '45', '0');
INSERT INTO `province` VALUES ('487', 'Huyện Bù Gia Mập', '45', '0');
INSERT INTO `province` VALUES ('488', 'Huyện Hớn Quản', '45', '0');
INSERT INTO `province` VALUES ('489', 'Thị Xã Bình Long', '45', '0');
INSERT INTO `province` VALUES ('490', 'Huyện Chơn Thành', '45', '0');
INSERT INTO `province` VALUES ('491', 'Huyện Bù đăng', '45', '0');
INSERT INTO `province` VALUES ('492', 'Huyện Đức Trọng', '46', '0');
INSERT INTO `province` VALUES ('493', 'Huyện Lạc Dương', '46', '0');
INSERT INTO `province` VALUES ('494', 'Huyện Bảo Lâm', '46', '0');
INSERT INTO `province` VALUES ('495', 'Huyện Cát Tiên', '46', '0');
INSERT INTO `province` VALUES ('496', 'Huyện Di Linh', '46', '0');
INSERT INTO `province` VALUES ('497', 'Huyện Đạ Huoai', '46', '0');
INSERT INTO `province` VALUES ('498', 'Huyện Lâm Hà', '46', '0');
INSERT INTO `province` VALUES ('499', 'Thành Phố Đà Lạt', '46', '0');
INSERT INTO `province` VALUES ('500', 'Huyện Đạ Tẻh', '46', '0');
INSERT INTO `province` VALUES ('501', 'Huyện Đơn Dương', '46', '0');
INSERT INTO `province` VALUES ('502', 'Huyện Đam Rông', '46', '0');
INSERT INTO `province` VALUES ('503', 'Thị Xã Bảo Lộc', '46', '0');
INSERT INTO `province` VALUES ('504', 'Huyện Bác Ái', '47', '0');
INSERT INTO `province` VALUES ('505', 'Huyện Ninh Phước', '47', '0');
INSERT INTO `province` VALUES ('506', 'Huyện Ninh Sơn', '47', '0');
INSERT INTO `province` VALUES ('507', 'Huyện Thuận Nam', '47', '0');
INSERT INTO `province` VALUES ('508', 'Huyện Ninh Hải', '47', '0');
INSERT INTO `province` VALUES ('509', 'Huyện Thuận Bắc', '47', '0');
INSERT INTO `province` VALUES ('510', 'Tp.Phan Rang - Tháp Chàm', '47', '0');
INSERT INTO `province` VALUES ('511', 'Huyện Tân Châu', '48', '0');
INSERT INTO `province` VALUES ('512', 'Huyện Châu Thành', '48', '0');
INSERT INTO `province` VALUES ('513', 'Huyện Bến Cầu', '48', '0');
INSERT INTO `province` VALUES ('514', 'Thị Xã Tây Ninh', '48', '0');
INSERT INTO `province` VALUES ('515', 'Huyện Hòa Thành', '48', '0');
INSERT INTO `province` VALUES ('516', 'Huyện Tân Biên', '48', '0');
INSERT INTO `province` VALUES ('517', 'Huyện Gò Dầu', '48', '0');
INSERT INTO `province` VALUES ('518', 'Huyện Trảng Bàng', '48', '0');
INSERT INTO `province` VALUES ('519', 'Huyện Dương Minh Châu', '48', '0');
INSERT INTO `province` VALUES ('520', 'Huyện Tân Uyên', '49', '0');
INSERT INTO `province` VALUES ('521', 'Huyện Dĩ An', '49', '0');
INSERT INTO `province` VALUES ('522', 'Huyện Bến Cát', '49', '0');
INSERT INTO `province` VALUES ('523', 'Huyện Dầu Tiếng', '49', '0');
INSERT INTO `province` VALUES ('524', 'Thị Xã Thủ Dầu Một', '49', '0');
INSERT INTO `province` VALUES ('525', 'Huyện Thuận An', '49', '0');
INSERT INTO `province` VALUES ('526', 'Huyện Phú Giáo', '49', '0');
INSERT INTO `province` VALUES ('527', 'Huyện Trảng Bom', '50', '0');
INSERT INTO `province` VALUES ('528', 'Thị Xã Long Khánh', '50', '0');
INSERT INTO `province` VALUES ('529', 'Huyện Tân Phú', '50', '0');
INSERT INTO `province` VALUES ('530', 'Huyện Thống Nhất', '50', '0');
INSERT INTO `province` VALUES ('531', 'Huyện Vĩnh Cửu', '50', '0');
INSERT INTO `province` VALUES ('532', 'Huyện Nhơn Trạch', '50', '0');
INSERT INTO `province` VALUES ('533', 'Thành Phố Biên Hòa', '50', '0');
INSERT INTO `province` VALUES ('534', 'Huyện Cẩm Mỹ', '50', '0');
INSERT INTO `province` VALUES ('535', 'Huyện Xuân Lộc', '50', '0');
INSERT INTO `province` VALUES ('536', 'Huyện Định Quán', '50', '0');
INSERT INTO `province` VALUES ('537', 'Huyện Long Thành', '50', '0');
INSERT INTO `province` VALUES ('538', 'Huyện Hàm Thuận Bắc', '51', '0');
INSERT INTO `province` VALUES ('539', 'Huyện Đảo Phú Quý', '51', '0');
INSERT INTO `province` VALUES ('540', 'Huyện Tuy Phong', '51', '0');
INSERT INTO `province` VALUES ('541', 'Huyện Tánh Linh', '51', '0');
INSERT INTO `province` VALUES ('542', 'Huyện Đức Linh', '51', '0');
INSERT INTO `province` VALUES ('543', 'Thị Xã La Gi', '51', '0');
INSERT INTO `province` VALUES ('544', 'Huyện Bắc Bình', '51', '0');
INSERT INTO `province` VALUES ('545', 'Huyện Hàm Tân', '51', '0');
INSERT INTO `province` VALUES ('546', 'Thành Phố Phan Thiết', '51', '0');
INSERT INTO `province` VALUES ('547', 'Huyện Hàm Thuận Nam', '51', '0');
INSERT INTO `province` VALUES ('548', 'Quận 6', '52', '0');
INSERT INTO `province` VALUES ('549', 'Quận 5', '52', '0');
INSERT INTO `province` VALUES ('550', 'Quận 3', '52', '0');
INSERT INTO `province` VALUES ('551', 'Quận Tân Bình', '52', '0');
INSERT INTO `province` VALUES ('552', 'Quận Tân Phú', '52', '0');
INSERT INTO `province` VALUES ('553', 'Huyện Củ Chi', '52', '0');
INSERT INTO `province` VALUES ('554', 'Huyện Nhà Bè', '52', '0');
INSERT INTO `province` VALUES ('555', 'Quận 10', '52', '0');
INSERT INTO `province` VALUES ('556', 'Quận 7', '52', '0');
INSERT INTO `province` VALUES ('557', 'Quận 12', '52', '0');
INSERT INTO `province` VALUES ('558', 'Quận 9', '52', '0');
INSERT INTO `province` VALUES ('559', 'Huyện Cần Giờ', '52', '0');
INSERT INTO `province` VALUES ('560', 'Quận 1', '52', '0');
INSERT INTO `province` VALUES ('561', 'Quận Gò Vấp', '52', '0');
INSERT INTO `province` VALUES ('562', 'Quận 11', '52', '0');
INSERT INTO `province` VALUES ('563', 'Huyện Hóc Môn', '52', '0');
INSERT INTO `province` VALUES ('564', 'Quận Bình Tân', '52', '0');
INSERT INTO `province` VALUES ('565', 'Quận 8', '52', '0');
INSERT INTO `province` VALUES ('566', 'Quận 4', '52', '0');
INSERT INTO `province` VALUES ('567', 'Huyện Bình Chánh', '52', '0');
INSERT INTO `province` VALUES ('568', 'Quận Thủ đức', '52', '0');
INSERT INTO `province` VALUES ('569', 'Quận Bình Thạnh', '52', '0');
INSERT INTO `province` VALUES ('570', 'Quận Phú Nhuận', '52', '0');
INSERT INTO `province` VALUES ('571', 'Quận 2', '52', '0');
INSERT INTO `province` VALUES ('572', 'Huyện Tân Trụ', '53', '0');
INSERT INTO `province` VALUES ('573', 'Huyện Đức Huệ', '53', '0');
INSERT INTO `province` VALUES ('574', 'Huyện Cần Guộc', '53', '0');
INSERT INTO `province` VALUES ('575', 'Huyện Cần đước', '53', '0');
INSERT INTO `province` VALUES ('576', 'Thành Phố Tân An', '53', '0');
INSERT INTO `province` VALUES ('577', 'Huyện Thủ Thừa', '53', '0');
INSERT INTO `province` VALUES ('578', 'Huyện Tân Hưng', '53', '0');
INSERT INTO `province` VALUES ('579', 'Huyện Châu Thành', '53', '0');
INSERT INTO `province` VALUES ('580', 'Huyện Bến Lức', '53', '0');
INSERT INTO `province` VALUES ('581', 'Huyện Tân Thạnh', '53', '0');
INSERT INTO `province` VALUES ('582', 'Huyện Thạnh Hóa', '53', '0');
INSERT INTO `province` VALUES ('583', 'Huyện Mộc Hóa', '53', '0');
INSERT INTO `province` VALUES ('584', 'Huyện Đức Hòa', '53', '0');
INSERT INTO `province` VALUES ('585', 'Huyện Vĩnh Hưng', '53', '0');
INSERT INTO `province` VALUES ('586', 'Thị Xã Bà Rịa', '54', '0');
INSERT INTO `province` VALUES ('587', 'Huyện Tân Thành', '54', '0');
INSERT INTO `province` VALUES ('588', 'Huyện Xuyên Mộc', '54', '0');
INSERT INTO `province` VALUES ('589', 'Huyện Côn đảo', '54', '0');
INSERT INTO `province` VALUES ('590', 'Huyện Long điền', '54', '0');
INSERT INTO `province` VALUES ('591', 'Huyện Châu đức', '54', '0');
INSERT INTO `province` VALUES ('592', 'Thành Phố Vũng Tàu', '54', '0');
INSERT INTO `province` VALUES ('593', 'Huyện Đất Đỏ', '54', '0');
INSERT INTO `province` VALUES ('594', 'Thị Xã Châu Đốc', '56', '0');
INSERT INTO `province` VALUES ('595', 'Huyện Phú Tân', '56', '0');
INSERT INTO `province` VALUES ('596', 'Huyện Thoại Sơn', '56', '0');
INSERT INTO `province` VALUES ('597', 'Thành Phố Long Xuyên', '56', '0');
INSERT INTO `province` VALUES ('598', 'Huyện An Phú', '56', '0');
INSERT INTO `province` VALUES ('599', 'Huyện Chợ Mới', '56', '0');
INSERT INTO `province` VALUES ('600', 'Huyện Châu Phú', '56', '0');
INSERT INTO `province` VALUES ('601', 'Thị Xã Tân Châu', '56', '0');
INSERT INTO `province` VALUES ('602', 'Huyện Tịnh Biên', '56', '0');
INSERT INTO `province` VALUES ('603', 'Huyện Châu Thành', '56', '0');
INSERT INTO `province` VALUES ('604', 'Huyện Tri Tôn', '56', '0');
INSERT INTO `province` VALUES ('605', 'Huyện Tân Hồng', '57', '0');
INSERT INTO `province` VALUES ('606', 'Huyện Thanh Bình', '57', '0');
INSERT INTO `province` VALUES ('607', 'Huyện Lấp Vò', '57', '0');
INSERT INTO `province` VALUES ('608', 'Huyện Tam Nông', '57', '0');
INSERT INTO `province` VALUES ('609', 'Thành Phố Cao Lãnh', '57', '0');
INSERT INTO `province` VALUES ('610', 'Huyện Tháp Mười', '57', '0');
INSERT INTO `province` VALUES ('611', 'Huyện Lai Vung', '57', '0');
INSERT INTO `province` VALUES ('612', 'Huyện Châu Thành', '57', '0');
INSERT INTO `province` VALUES ('613', 'Huyện Hồng Ngự', '57', '0');
INSERT INTO `province` VALUES ('614', 'Huyện Cao Lãnh', '57', '0');
INSERT INTO `province` VALUES ('615', 'Thị Xã Sa Đéc', '57', '0');
INSERT INTO `province` VALUES ('616', 'Thị Xã Gò Công', '58', '0');
INSERT INTO `province` VALUES ('617', 'Huyện Tân Phú Đông', '58', '0');
INSERT INTO `province` VALUES ('618', 'Huyện Chợ Gạo', '58', '0');
INSERT INTO `province` VALUES ('619', 'Thành Phố Mỹ Tho', '58', '0');
INSERT INTO `province` VALUES ('620', 'Huyện Cai Lậy', '58', '0');
INSERT INTO `province` VALUES ('621', 'Huyện Gò Công Tây', '58', '0');
INSERT INTO `province` VALUES ('622', 'Huyện Cái Bè', '58', '0');
INSERT INTO `province` VALUES ('623', 'Huyện Gò Công Đông', '58', '0');
INSERT INTO `province` VALUES ('624', 'Huyện Châu Thành', '58', '0');
INSERT INTO `province` VALUES ('625', 'Huyện Tân Phước', '58', '0');
INSERT INTO `province` VALUES ('626', 'Quận Ô Môn', '59', '0');
INSERT INTO `province` VALUES ('627', 'Huyện Thới Lai', '59', '0');
INSERT INTO `province` VALUES ('628', 'Quận Ninh Kiều', '59', '0');
INSERT INTO `province` VALUES ('629', 'Quận Thốt Nốt', '59', '0');
INSERT INTO `province` VALUES ('630', 'Quận Bình Thủy', '59', '0');
INSERT INTO `province` VALUES ('631', 'Huyện Phụng Hiệp', '59', '0');
INSERT INTO `province` VALUES ('632', 'Huyện Vĩnh Thạnh', '59', '0');
INSERT INTO `province` VALUES ('633', 'Huyện Châu Thành A', '59', '0');
INSERT INTO `province` VALUES ('634', 'Huyện Phong điền', '59', '0');
INSERT INTO `province` VALUES ('635', 'Thị Xã Ngã Bảy', '59', '0');
INSERT INTO `province` VALUES ('636', 'Quận Cái Răng', '59', '0');
INSERT INTO `province` VALUES ('637', 'Huyện Cờ Đỏ', '59', '0');
INSERT INTO `province` VALUES ('638', 'Huyện Ba Tri', '60', '0');
INSERT INTO `province` VALUES ('639', 'Huyện Châu Thành', '60', '0');
INSERT INTO `province` VALUES ('640', 'Huyện Chợ Lách', '60', '0');
INSERT INTO `province` VALUES ('641', 'Huyện Bình Đại', '60', '0');
INSERT INTO `province` VALUES ('642', 'Huyện Mỏ Cày Nam', '60', '0');
INSERT INTO `province` VALUES ('643', 'Huyện Mỏ Cày Bắc', '60', '0');
INSERT INTO `province` VALUES ('644', 'Thành Phố Bến Tre', '60', '0');
INSERT INTO `province` VALUES ('645', 'Huyện Thạnh Phú', '60', '0');
INSERT INTO `province` VALUES ('646', 'Huyện Giồng Trôm', '60', '0');
INSERT INTO `province` VALUES ('647', 'Huyện Trà Ôn', '61', '0');
INSERT INTO `province` VALUES ('648', 'Thành Phố Vĩnh Long', '61', '0');
INSERT INTO `province` VALUES ('649', 'Huyện Bình Minh', '61', '0');
INSERT INTO `province` VALUES ('650', 'Huyện Tam Bình', '61', '0');
INSERT INTO `province` VALUES ('651', 'Huyện Long Hồ', '61', '0');
INSERT INTO `province` VALUES ('652', 'Huyện Bình Tân', '61', '0');
INSERT INTO `province` VALUES ('653', 'Huyện Vũng Liêm', '61', '0');
INSERT INTO `province` VALUES ('654', 'Huyện Mang Thít', '61', '0');
INSERT INTO `province` VALUES ('655', 'Huyện Gò Quao', '62', '0');
INSERT INTO `province` VALUES ('656', 'Huyện An Biên', '62', '0');
INSERT INTO `province` VALUES ('657', 'Huyện Giồng Riềng', '62', '0');
INSERT INTO `province` VALUES ('658', 'Huyện U Minh Thượng', '62', '0');
INSERT INTO `province` VALUES ('659', 'Huyện An Minh', '62', '0');
INSERT INTO `province` VALUES ('660', 'Huyện Kiên Lương', '62', '0');
INSERT INTO `province` VALUES ('661', 'Huyện Châu Thành', '62', '0');
INSERT INTO `province` VALUES ('662', 'Huyện Hòn Đất', '62', '0');
INSERT INTO `province` VALUES ('663', 'Huyên Giang Thành', '62', '0');
INSERT INTO `province` VALUES ('664', 'Huyện Vĩnh Thuận', '62', '0');
INSERT INTO `province` VALUES ('665', 'Thị Xã Hà Tiên', '62', '0');
INSERT INTO `province` VALUES ('666', 'Thành Phố Rạch Giá', '62', '0');
INSERT INTO `province` VALUES ('667', 'Huyện Tân Hiệp', '62', '0');
INSERT INTO `province` VALUES ('668', 'Huyện Kiên Hải', '62', '0');
INSERT INTO `province` VALUES ('669', 'Huyện Đảo Phú Quốc', '62', '0');
INSERT INTO `province` VALUES ('670', 'Thành Phố Vị Thanh', '63', '0');
INSERT INTO `province` VALUES ('671', 'Huyện Châu Thành A', '63', '0');
INSERT INTO `province` VALUES ('672', 'Huyện Long Mỹ', '63', '0');
INSERT INTO `province` VALUES ('673', 'Huyện Châu Thành ', '63', '0');
INSERT INTO `province` VALUES ('674', 'Huyện Vị Thủy', '63', '0');
INSERT INTO `province` VALUES ('675', 'Thị Xã Ngã Bảy', '63', '0');
INSERT INTO `province` VALUES ('676', 'Huyện Phụng Hiệp', '63', '0');
INSERT INTO `province` VALUES ('677', 'Huyện Trà Cú', '64', '0');
INSERT INTO `province` VALUES ('678', 'Huyện Duyên Hải', '64', '0');
INSERT INTO `province` VALUES ('679', 'Huyện Cầu Kè', '64', '0');
INSERT INTO `province` VALUES ('680', 'Huyện Càng Long', '64', '0');
INSERT INTO `province` VALUES ('681', 'Huyện Châu Thành', '64', '0');
INSERT INTO `province` VALUES ('682', 'Huyện Cầu Ngang', '64', '0');
INSERT INTO `province` VALUES ('683', 'Thành Phố Trà Vinh', '64', '0');
INSERT INTO `province` VALUES ('684', 'Huyện Tiểu Cần', '64', '0');
INSERT INTO `province` VALUES ('685', 'Huyện Phước Long', '65', '0');
INSERT INTO `province` VALUES ('686', 'Huyện Hòa Bình', '65', '0');
INSERT INTO `province` VALUES ('687', 'Huyện Đông Hải', '65', '0');
INSERT INTO `province` VALUES ('688', 'Thị Xã Bạc Liêu', '65', '0');
INSERT INTO `province` VALUES ('689', 'Huyện Giá Rai', '65', '0');
INSERT INTO `province` VALUES ('690', 'Huyện Vĩnh Lợi', '65', '0');
INSERT INTO `province` VALUES ('691', 'Huyện Hồng Dân', '65', '0');
INSERT INTO `province` VALUES ('692', 'Huyện Cái Nước', '68', '0');
INSERT INTO `province` VALUES ('693', 'Huyện Năm Căn', '68', '0');
INSERT INTO `province` VALUES ('694', 'Huyện Đầm Dơi', '68', '0');
INSERT INTO `province` VALUES ('695', 'Huyện Ngọc Hiển', '68', '0');
INSERT INTO `province` VALUES ('696', 'Huyện Thới Bình', '68', '0');
INSERT INTO `province` VALUES ('697', 'Huyện Phú Tân', '68', '0');
INSERT INTO `province` VALUES ('698', 'Thành Phố Cà Mau', '68', '0');
INSERT INTO `province` VALUES ('699', 'Huyện U Minh', '68', '0');
INSERT INTO `province` VALUES ('700', 'Huyện Trần Văn Thời', '68', '0');

-- ----------------------------
-- Table structure for pro_image
-- ----------------------------
DROP TABLE IF EXISTS `pro_image`;
CREATE TABLE `pro_image` (
  `pro_id` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  PRIMARY KEY (`pro_id`,`img`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pro_image
-- ----------------------------
INSERT INTO `pro_image` VALUES ('3', 'dodungmevabebobandoichohocsinhcap12-201510470.jpg');
INSERT INTO `pro_image` VALUES ('4', 'xedayembe-201510778.jpg');
INSERT INTO `pro_image` VALUES ('4', 'xedayembe2-201510963.jpg');
INSERT INTO `pro_image` VALUES ('5', 'xedayembe-201510778.jpg');
INSERT INTO `pro_image` VALUES ('5', 'xedayembe2-201510963.jpg');
INSERT INTO `pro_image` VALUES ('6', 'quanaoaorotvai2518852794-201510438.jpg');
INSERT INTO `pro_image` VALUES ('7', 'quanaosominamhieunextmangozara2545574526-201510380.jpg');
INSERT INTO `pro_image` VALUES ('7', 'sominamhieunextmangozara2599590261-201510613.jpg');
INSERT INTO `pro_image` VALUES ('8', 'quanaoquanbonamsize2829-201510678.jpg');
INSERT INTO `pro_image` VALUES ('9', 'giaydeptuixachphukiendonghodoiburberry2921990233-201510992.jpg');
INSERT INTO `pro_image` VALUES ('10', '20131101091145-201510321.jpg');
INSERT INTO `pro_image` VALUES ('11', 'quanaoquanleggingnihmthai2976723636-201510920.jpg');
INSERT INTO `pro_image` VALUES ('12', 'giaydeptuixachphukiendonghonammasom5182973222951-201510624.jpg');
INSERT INTO `pro_image` VALUES ('13', 'quanaoaolongkhoac2952126037-201510233.jpg');
INSERT INTO `pro_image` VALUES ('14', 'quanaoquanjoger2945020523-201510779.jpg');
INSERT INTO `pro_image` VALUES ('15', 'quanaovayxeply2962009419-201510525.jpg');
INSERT INTO `pro_image` VALUES ('16', 'quanaoquanao2934223567-201510283.jpg');
INSERT INTO `pro_image` VALUES ('17', 'giaydeptuixachphukiendaychuyenkhactenvanhanbac2947352944-201510251.jpg');
INSERT INTO `pro_image` VALUES ('18', 'quanaoaoda2925301203-201510493.jpg');
INSERT INTO `pro_image` VALUES ('19', 'dodungmevabeset3chitietdanhchobetrai2929549469-201510726.jpg');
INSERT INTO `pro_image` VALUES ('20', 'quanaoquanaochonam1436404334-201510850.jpg');
INSERT INTO `pro_image` VALUES ('21', 'aodamoto2918810255-201510572.jpg');
INSERT INTO `pro_image` VALUES ('22', 'quanaosetlenngocanh2908082381-201510434.jpg');
INSERT INTO `pro_image` VALUES ('23', 'quanaoaokhoaclencotim2943338772-201510827.jpg');
INSERT INTO `pro_image` VALUES ('24', 'giaydeptuixachphukienmuparentaladvisory2932952201-201510409.jpg');
INSERT INTO `pro_image` VALUES ('25', 'aokhoaclen2903881559-201510280.jpg');
INSERT INTO `pro_image` VALUES ('26', 'quanaoquanskinny2950745378-201510242.jpg');

-- ----------------------------
-- Table structure for request_friend
-- ----------------------------
DROP TABLE IF EXISTS `request_friend`;
CREATE TABLE `request_friend` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_receive_id` int(11) NOT NULL COMMENT 'User được nhận yêu cầu kết bạn',
  `user_request_id` int(11) NOT NULL COMMENT 'User gửi yêu cầu kết bạn',
  `create_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of request_friend
-- ----------------------------

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL COMMENT 'Địa chỉ chi tiết',
  `city_id` int(11) DEFAULT NULL COMMENT 'Tỉnh/Thành phố',
  `district_id` int(11) DEFAULT NULL COMMENT 'Quận/Huyện',
  `street` varchar(255) DEFAULT NULL,
  `lat` double DEFAULT NULL COMMENT 'Vĩ độ',
  `lng` double DEFAULT NULL COMMENT 'Kinh độ',
  `password` varchar(255) NOT NULL,
  `gender` tinyint(4) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('10', 'Tạ Văn Chinh', 'Huyện Thạch Thất - Hà Nội', '18', '168', 'Chùa tây phương', '0', '0', '2570949c64339542ac0a1068840742e4', '1', 'chinh.tv91@gmail.com', '0974125516');
INSERT INTO `user` VALUES ('12', 'Tạ Văn Chinh', null, null, null, null, null, null, '25d55ad283aa400af464c76d713c07ad', '1', 'chinh.tv92@gmail.com', null);

-- ----------------------------
-- Table structure for user_notification
-- ----------------------------
DROP TABLE IF EXISTS `user_notification`;
CREATE TABLE `user_notification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `notification_id` int(11) NOT NULL,
  `checked` tinyint(4) NOT NULL DEFAULT '0',
  `create_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_notification
-- ----------------------------
INSERT INTO `user_notification` VALUES ('1', '12', '2', '0', '2015-10-17 10:35:53');
INSERT INTO `user_notification` VALUES ('2', '21', '2', '0', '2015-10-17 10:35:53');
INSERT INTO `user_notification` VALUES ('3', '12', '3', '0', '2015-10-17 10:43:35');
INSERT INTO `user_notification` VALUES ('4', '21', '3', '0', '2015-10-17 10:43:35');
INSERT INTO `user_notification` VALUES ('5', '12', '4', '0', '2015-10-17 10:49:06');
INSERT INTO `user_notification` VALUES ('6', '21', '4', '0', '2015-10-17 10:49:06');
INSERT INTO `user_notification` VALUES ('7', '12', '5', '0', '2015-10-17 10:54:10');
INSERT INTO `user_notification` VALUES ('8', '21', '5', '0', '2015-10-17 10:54:10');
INSERT INTO `user_notification` VALUES ('9', '12', '6', '0', '2015-10-21 20:34:45');
INSERT INTO `user_notification` VALUES ('10', '21', '6', '0', '2015-10-21 20:34:45');
INSERT INTO `user_notification` VALUES ('11', '12', '7', '0', '2015-10-21 20:35:55');
INSERT INTO `user_notification` VALUES ('12', '21', '7', '0', '2015-10-21 20:35:55');
INSERT INTO `user_notification` VALUES ('13', '12', '8', '0', '2015-10-21 20:38:24');
INSERT INTO `user_notification` VALUES ('14', '21', '8', '0', '2015-10-21 20:38:24');
INSERT INTO `user_notification` VALUES ('15', '12', '9', '0', '2015-10-21 20:39:13');
INSERT INTO `user_notification` VALUES ('16', '21', '9', '0', '2015-10-21 20:39:13');
INSERT INTO `user_notification` VALUES ('17', '12', '10', '0', '2015-10-21 20:40:11');
INSERT INTO `user_notification` VALUES ('18', '21', '10', '0', '2015-10-21 20:40:11');
INSERT INTO `user_notification` VALUES ('19', '12', '11', '0', '2015-10-21 20:41:09');
INSERT INTO `user_notification` VALUES ('20', '21', '11', '0', '2015-10-21 20:41:09');
INSERT INTO `user_notification` VALUES ('21', '12', '12', '0', '2015-10-21 20:41:57');
INSERT INTO `user_notification` VALUES ('22', '21', '12', '0', '2015-10-21 20:41:57');
INSERT INTO `user_notification` VALUES ('23', '12', '13', '0', '2015-10-21 20:43:26');
INSERT INTO `user_notification` VALUES ('24', '21', '13', '0', '2015-10-21 20:43:26');
INSERT INTO `user_notification` VALUES ('25', '12', '14', '0', '2015-10-21 20:44:49');
INSERT INTO `user_notification` VALUES ('26', '21', '14', '0', '2015-10-21 20:44:49');
INSERT INTO `user_notification` VALUES ('27', '12', '15', '0', '2015-10-21 20:45:45');
INSERT INTO `user_notification` VALUES ('28', '21', '15', '0', '2015-10-21 20:45:45');
INSERT INTO `user_notification` VALUES ('29', '12', '16', '0', '2015-10-21 20:47:13');
INSERT INTO `user_notification` VALUES ('30', '21', '16', '0', '2015-10-21 20:47:13');
INSERT INTO `user_notification` VALUES ('31', '12', '17', '0', '2015-10-21 20:48:26');
INSERT INTO `user_notification` VALUES ('32', '21', '17', '0', '2015-10-21 20:48:26');
INSERT INTO `user_notification` VALUES ('33', '12', '18', '0', '2015-10-21 20:49:13');
INSERT INTO `user_notification` VALUES ('34', '21', '18', '0', '2015-10-21 20:49:13');
INSERT INTO `user_notification` VALUES ('35', '12', '19', '0', '2015-10-21 20:50:38');
INSERT INTO `user_notification` VALUES ('36', '21', '19', '0', '2015-10-21 20:50:38');
INSERT INTO `user_notification` VALUES ('37', '12', '20', '0', '2015-10-21 20:52:01');
INSERT INTO `user_notification` VALUES ('38', '21', '20', '0', '2015-10-21 20:52:01');
INSERT INTO `user_notification` VALUES ('39', '12', '21', '0', '2015-10-21 20:53:11');
INSERT INTO `user_notification` VALUES ('40', '21', '21', '0', '2015-10-21 20:53:11');
INSERT INTO `user_notification` VALUES ('41', '12', '22', '0', '2015-10-21 20:54:06');
INSERT INTO `user_notification` VALUES ('42', '21', '22', '0', '2015-10-21 20:54:06');
INSERT INTO `user_notification` VALUES ('43', '12', '23', '0', '2015-10-21 20:55:01');
INSERT INTO `user_notification` VALUES ('44', '21', '23', '0', '2015-10-21 20:55:01');
INSERT INTO `user_notification` VALUES ('45', '12', '24', '0', '2015-10-21 20:55:52');
INSERT INTO `user_notification` VALUES ('46', '21', '24', '0', '2015-10-21 20:55:52');
