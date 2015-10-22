/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50516
Source Host           : localhost:3306
Source Database       : cloudkpro

Target Server Type    : MYSQL
Target Server Version : 50516
File Encoding         : 65001

Date: 2014-12-04 00:11:51
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_parent_id` int(11) DEFAULT NULL,
  `cat_name` varchar(512) NOT NULL,
  `cat_type_id` int(11) NOT NULL,
  `cat_description` varchar(512) DEFAULT NULL,
  `cat_code` varchar(256) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `show_in_home` tinyint(4) DEFAULT '0',
  `order_number` int(11) NOT NULL,
  `image_url` varchar(512) DEFAULT NULL,
  `create_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `modify_date` timestamp NULL DEFAULT NULL,
  `create_user_id` int(11) DEFAULT NULL,
  `modify_user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `catTypeID` (`cat_type_id`),
  KEY `createUserID` (`create_user_id`,`modify_user_id`),
  KEY `createUserID_2` (`create_user_id`),
  KEY `modifyUserID` (`modify_user_id`),
  CONSTRAINT `categories_ibfk_1` FOREIGN KEY (`cat_type_id`) REFERENCES `category_types` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES ('1', '0', 'Kênh Truyền Hình', '1', 'Các kênh truyền hình của các đài truyền hình, hãng truyền hình', 'tv', '1', '1', '0', null, '2014-10-13 01:57:40', '2014-10-20 23:47:29', null, null);
INSERT INTO `categories` VALUES ('2', '1', 'Kênh VTV', '1', 'Các kênh truyền hình của đài VTV', 'tv_vtv', '1', '0', '0', null, '2014-10-13 01:57:45', '2014-10-14 00:50:16', null, null);
INSERT INTO `categories` VALUES ('3', '1', 'Kênh VTC', '1', 'Các kênh truyền hình của đài VTC', 'tv_vtc', '1', '0', '0', null, '2014-10-13 01:58:57', '2014-10-14 00:50:17', null, null);
INSERT INTO `categories` VALUES ('4', '1', 'Kênh Truyền Hình An Viên', '1', 'Các kênh truyền hình của đài An Viên', 'tv_avg', '1', '0', '0', null, '2014-10-13 02:01:58', '2014-10-20 23:47:28', null, null);
INSERT INTO `categories` VALUES ('5', '0', 'Thể thao', '2', 'Các chương trình về thể thao', 'vod_sport', '1', '1', '0', null, '2014-10-13 21:39:51', '2014-10-20 23:46:14', null, null);
INSERT INTO `categories` VALUES ('6', '5', 'Tin nhanh thể thao', '2', 'Các chương trình về tin vắn thể thao', 'vod_sport_quick_new', '1', '0', '0', null, '2014-10-13 23:38:40', '2014-10-14 00:50:25', null, null);
INSERT INTO `categories` VALUES ('7', '5', 'Clip bóng đá', '2', 'Các clip hot nhất về bóng đá', 'vod_sport_foot_ball', '1', '0', '0', null, '2014-10-13 23:40:10', '2014-10-14 00:50:28', null, null);
INSERT INTO `categories` VALUES ('8', '5', 'Clip đua xe', '2', 'Các clip hot nhất về các đường đua', 'vod_sport_racing', '1', '0', '0', null, '2014-10-13 23:41:04', '2014-10-14 00:50:30', null, null);
INSERT INTO `categories` VALUES ('9', '5', 'Thể thao toàn cảnh', '2', 'Các clip  tổng hợp hay nhất về các môn thể thao', 'vod_sport_all', '1', '0', '0', null, '2014-10-13 23:43:58', '2014-10-14 00:50:32', null, null);
INSERT INTO `categories` VALUES ('10', '0', 'Hài Hước', '2', 'Các chương trình hài hước', 'vod_fun', '1', '1', '0', null, '2014-10-13 23:44:46', '2014-10-15 03:44:53', null, null);
INSERT INTO `categories` VALUES ('11', '10', 'Clip Hài', '2', 'Các clip hài ngước ngắn', 'vod_fun_clip', '1', '0', '0', null, '2014-10-13 23:48:00', '2014-10-14 00:50:37', null, null);
INSERT INTO `categories` VALUES ('12', '10', 'Just For Laughs Gags', '2', 'Các chương trình hài nổi tiếng thế giới', 'vod_fun_just_for_laugh', '1', '0', '0', null, '2014-10-13 23:52:04', '2014-10-14 00:50:39', null, null);
INSERT INTO `categories` VALUES ('13', '0', 'Sức khỏe', '2', 'Các chương trình về chuyên đề sức khỏe', 'vod_health', '1', '1', '0', null, '2014-10-13 23:52:45', '2014-10-15 03:44:57', null, null);
INSERT INTO `categories` VALUES ('14', '13', 'Gym', '2', 'Các chương trình hướng dẫn tập gym tại nhà', 'vod_health_gym', '1', '0', '0', null, '2014-10-13 23:53:34', '2014-10-14 00:50:43', null, null);
INSERT INTO `categories` VALUES ('15', '13', 'Mẹo vặt', '2', 'Các chương trình hướng dẫn chăm sóc sức khỏe tại nhà bằng các mẹo vặt dân gian	', 'vod_health_tips', '1', '0', '0', null, '2014-10-13 23:55:15', '2014-10-14 00:50:45', null, null);
INSERT INTO `categories` VALUES ('16', '0', 'An Ninh', '2', 'Các chương trình về chuyên về An Ninh', 'vod_security', '1', '1', '0', null, '2014-10-13 23:57:15', '2014-10-15 03:44:58', null, null);
INSERT INTO `categories` VALUES ('17', '16', 'An Ninh trực tiếp	', '2', 'Gói truyền hình thực tế, truyền hình trực tiếp các vụ đánh án, các vụ vây bắt tội phạm nguy hiểm.', 'vod_security_live', '1', '0', '0', null, '2014-10-13 23:58:04', '2014-10-14 00:50:50', null, null);
INSERT INTO `categories` VALUES ('18', '16', 'Nhật ký An Ninh', '2', 'Cập nhất nhất những thông tin liên quan đến tình hình an ninh trật tự hàng ngày, mới nhất, kịp thời nhất.', 'vod_security_logs', '1', '0', '0', null, '2014-10-14 00:00:04', '2014-10-14 00:50:52', null, null);
INSERT INTO `categories` VALUES ('19', '16', 'Hồ Sơ An Ninh', '2', 'Các gói VOD tư vấn phòng tránh các loại tội phạm xã hội, các loại vụ án nổi tiếng trong nước và thế giới, các hồ sơ mật bây giờ mới được tiết lộ.', 'vod_security_results', '1', '0', '0', null, '2014-10-14 00:00:56', '2014-10-14 00:51:06', null, null);

-- ----------------------------
-- Table structure for category_types
-- ----------------------------
DROP TABLE IF EXISTS `category_types`;
CREATE TABLE `category_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_type_name` varchar(512) NOT NULL,
  `cat_type_code` varchar(256) DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of category_types
-- ----------------------------
INSERT INTO `category_types` VALUES ('1', 'Channel', '0', '1');
INSERT INTO `category_types` VALUES ('2', 'VOD', '1', '1');
INSERT INTO `category_types` VALUES ('3', 'News', '2', '1');

-- ----------------------------
-- Table structure for customers
-- ----------------------------
DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `device_token` varchar(512) NOT NULL,
  `udid` varchar(256) NOT NULL,
  `platform_id` int(11) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `expire_date` datetime DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `package_id` int(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `platformID` (`platform_id`) USING BTREE,
  KEY `package_id` (`package_id`),
  CONSTRAINT `customers_ibfk_2` FOREIGN KEY (`platform_id`) REFERENCES `platforms` (`id`),
  CONSTRAINT `customers_ibfk_3` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of customers
-- ----------------------------
INSERT INTO `customers` VALUES ('6', 'APA91bFQGOuW-I8jV254bc2upB5EjG45A6mGqppT2JxzA2OLmmosFWckZp27FUpZXjRfPbHzJGbM5c2xsj5eSG9WjNSyJgx9zFGVF-URptLEHgWKZ7_LyHJBm9K0szskEML3yqy3b9YxeLEId9riGy__Y6TW6UjKKhPu9q-UIPpN4mgGmZOy1Qk', '331', '1', '2014-11-23 15:56:33', null, 'Ta Van Chinh', 'chinh.tv91@gmail.com', '1', '1');
INSERT INTO `customers` VALUES ('7', 'APA91bFQGOuW-I8jV254bc2upB5EjG45A6mGqppT2JxzA2OLmmosFWckZp27FUpZXjRfPbHzJGbM5c2xsj5eSG9WjNSyJgx9zFGVF-URptLEHgWKZ7_LyHJBm9K0szskEML3yqy3b9YxeLEId9riGy__Y6TW6UjKKhPu9q-UIPpN4mgGmZOy1Qk', 'f9584e42-5b8a-3cf4-9183-377801ed36cf', '1', '2014-11-23 15:56:43', null, '', '', '1', '2');

-- ----------------------------
-- Table structure for devices
-- ----------------------------
DROP TABLE IF EXISTS `devices`;
CREATE TABLE `devices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `device_token` varchar(512) NOT NULL,
  `udid` varchar(256) NOT NULL,
  `platform_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `platformID` (`platform_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of devices
-- ----------------------------
INSERT INTO `devices` VALUES ('6', 'APA91bFQGOuW-I8jV254bc2upB5EjG45A6mGqppT2JxzA2OLmmosFWckZp27FUpZXjRfPbHzJGbM5c2xsj5eSG9WjNSyJgx9zFGVF-URptLEHgWKZ7_LyHJBm9K0szskEML3yqy3b9YxeLEId9riGy__Y6TW6UjKKhPu9q-UIPpN4mgGmZOy1Qk', '331', '1');
INSERT INTO `devices` VALUES ('7', 'APA91bFQGOuW-I8jV254bc2upB5EjG45A6mGqppT2JxzA2OLmmosFWckZp27FUpZXjRfPbHzJGbM5c2xsj5eSG9WjNSyJgx9zFGVF-URptLEHgWKZ7_LyHJBm9K0szskEML3yqy3b9YxeLEId9riGy__Y6TW6UjKKhPu9q-UIPpN4mgGmZOy1Qk', 'f9584e42-5b8a-3cf4-9183-377801ed36cf', '1');

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
  `Mobile` varchar(20) DEFAULT NULL,
  `is_admin` tinyint(4) DEFAULT '0' COMMENT 'Xac dinh la user hay admin',
  `address` varchar(150) DEFAULT NULL,
  `status` bit(1) DEFAULT b'0',
  `gender` tinyint(4) DEFAULT '10',
  `birthday` date DEFAULT NULL,
  `createdate` int(11) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of member
-- ----------------------------
INSERT INTO `member` VALUES ('1', 'ChinhTV', 'admin', '2570949c64339542ac0a1068840742e4', 'chinh.tv91@gmail.com', null, null, '1', null, '\0', '1', null, null, null);

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
-- Table structure for packages
-- ----------------------------
DROP TABLE IF EXISTS `packages`;
CREATE TABLE `packages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `package_name` varchar(255) NOT NULL,
  `charge_value` double(20,0) NOT NULL,
  `description` varchar(512) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of packages
-- ----------------------------
INSERT INTO `packages` VALUES ('1', 'Week package', '10', 'Gói tuần');
INSERT INTO `packages` VALUES ('2', 'Month package', '30', 'Gói tháng');

-- ----------------------------
-- Table structure for platforms
-- ----------------------------
DROP TABLE IF EXISTS `platforms`;
CREATE TABLE `platforms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `platform_name` varchar(256) NOT NULL,
  `platform_code_identifer` varchar(256) NOT NULL,
  `api_key` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of platforms
-- ----------------------------
INSERT INTO `platforms` VALUES ('1', 'Android OS', 'android', null);
INSERT INTO `platforms` VALUES ('2', 'iOS', 'ios', null);

-- ----------------------------
-- Table structure for push_notifications
-- ----------------------------
DROP TABLE IF EXISTS `push_notifications`;
CREATE TABLE `push_notifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `device_id` int(11) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `deviceID` (`device_id`),
  CONSTRAINT `push_notifications_ibfk_1` FOREIGN KEY (`device_id`) REFERENCES `customers` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of push_notifications
-- ----------------------------
