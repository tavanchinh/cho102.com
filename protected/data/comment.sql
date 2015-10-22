/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50516
Source Host           : localhost:3306
Source Database       : tintucbongda

Target Server Type    : MYSQL
Target Server Version : 50516
File Encoding         : 65001

Date: 2014-12-29 17:34:29
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for comment
-- ----------------------------
DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) NOT NULL,
  `news_id` bigint(20) DEFAULT '0',
  `page_title` varchar(512) DEFAULT NULL COMMENT 'Tiêu đề trang nhúng comment',
  `site_id` int(11) NOT NULL,
  `create_date` datetime DEFAULT NULL,
  `status` tinyint(4) DEFAULT '0' COMMENT '0 - Chưa duyệt | 1 - Đã duyệt',
  `user_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `content` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of comment
-- ----------------------------

-- ----------------------------
-- Table structure for comment_publish
-- ----------------------------
DROP TABLE IF EXISTS `comment_publish`;
CREATE TABLE `comment_publish` (
  `id` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `news_id` bigint(20) DEFAULT NULL,
  `page_title` varchar(512) DEFAULT NULL,
  `site_id` int(11) NOT NULL,
  `create_date` datetime DEFAULT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `content` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of comment_publish
-- ----------------------------
