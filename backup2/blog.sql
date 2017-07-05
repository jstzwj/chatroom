/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : xmblog

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-05-19 20:48:44
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for blog
-- ----------------------------
DROP TABLE IF EXISTS `blog`;
CREATE TABLE `blog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `blog_title` varchar(255) NOT NULL,
  `blog_content` longtext,
  `blog_category_id` int(11) NOT NULL,
  `blog_tags` varchar(255) DEFAULT NULL,
  `blog_view_count` int(11) DEFAULT NULL,
  `blog_thumbs_up_count` int(11) DEFAULT '0',
  `blog_view_password` varchar(20) DEFAULT NULL,
  `blog_is_public` smallint(1) DEFAULT NULL,
  `blog_create_time` datetime NOT NULL,
  `blog_update_time` datetime DEFAULT NULL,
  `blog_publish_time` datetime DEFAULT NULL,
  `blog_allow_comment` smallint(1) DEFAULT NULL,
  `blog_undo_time` datetime DEFAULT NULL,
  `blog_summary` varchar(600) DEFAULT NULL,
  `blog_category_top` smallint(1) DEFAULT NULL,
  `blog_index_top` smallint(1) DEFAULT NULL,
  `blog_delete_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_blog_category_1` (`blog_category_id`),
  CONSTRAINT `fk_blog_category_1` FOREIGN KEY (`blog_category_id`) REFERENCES `category` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for blog_view
-- ----------------------------
DROP TABLE IF EXISTS `blog_view`;
CREATE TABLE `blog_view` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `blog_view_blog_id` int(11) DEFAULT NULL,
  `blog_view_user_id` int(11) DEFAULT NULL,
  `blog_view_create_time` datetime DEFAULT NULL,
  `blog_view_create_ip` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `blog_view_blog_id` (`blog_view_blog_id`),
  KEY `blog_view_user_id` (`blog_view_user_id`),
  CONSTRAINT `blog_view_ibfk_1` FOREIGN KEY (`blog_view_blog_id`) REFERENCES `blog` (`id`),
  CONSTRAINT `blog_view_ibfk_2` FOREIGN KEY (`blog_view_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for category
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_user_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `category_desc` varchar(255) DEFAULT NULL,
  `category_create_time` datetime NOT NULL,
  `category_update_time` datetime DEFAULT NULL,
  `category_delete_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `category_user_unique` (`category_user_id`,`category_name`,`category_delete_time`) USING BTREE,
  CONSTRAINT `fk_category_user_1` FOREIGN KEY (`category_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for chat
-- ----------------------------
DROP TABLE IF EXISTS `chat`;
CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `chat_from_user_id` int(11) NOT NULL,
  `chat_to_user_id` int(11) NOT NULL,
  `chat_content` varchar(255) NOT NULL,
  `chat_create_time` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_chat_user_1` (`chat_from_user_id`),
  KEY `fk_chat_user_2` (`chat_to_user_id`),
  CONSTRAINT `fk_chat_user_1` FOREIGN KEY (`chat_from_user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `fk_chat_user_2` FOREIGN KEY (`chat_to_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for comment
-- ----------------------------
DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comment_blog_id` int(11) NOT NULL,
  `comment_user_id` int(11) NOT NULL,
  `comment_content` longtext NOT NULL,
  `comment_report_num` int(11) DEFAULT '0',
  `comment_create_time` datetime NOT NULL,
  `comment_delete_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_comment_blog_1` (`comment_blog_id`),
  KEY `fk_comment_user_1` (`comment_user_id`),
  CONSTRAINT `fk_comment_blog_1` FOREIGN KEY (`comment_blog_id`) REFERENCES `blog` (`id`),
  CONSTRAINT `fk_comment_user_1` FOREIGN KEY (`comment_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for comment_report
-- ----------------------------
DROP TABLE IF EXISTS `comment_report`;
CREATE TABLE `comment_report` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comment_report_user_id` int(11) DEFAULT NULL,
  `comment_report_comment_id` int(11) DEFAULT NULL,
  `comment_report_create_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comment_report_user_id` (`comment_report_user_id`),
  KEY `comment_report_comment_id` (`comment_report_comment_id`),
  CONSTRAINT `comment_report_ibfk_1` FOREIGN KEY (`comment_report_user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `comment_report_ibfk_2` FOREIGN KEY (`comment_report_comment_id`) REFERENCES `comment` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for follow
-- ----------------------------
DROP TABLE IF EXISTS `follow`;
CREATE TABLE `follow` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `follow_create_user_id` int(11) NOT NULL,
  `follow_target_user_id` int(11) NOT NULL,
  `follow_create_time` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_follow_user_1` (`follow_create_user_id`),
  KEY `fk_follow_user_2` (`follow_target_user_id`),
  CONSTRAINT `fk_follow_user_1` FOREIGN KEY (`follow_create_user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `fk_follow_user_2` FOREIGN KEY (`follow_target_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for like
-- ----------------------------
DROP TABLE IF EXISTS `like`;
CREATE TABLE `like` (
  `id` int(11) NOT NULL,
  `like_create_user_id` int(11) DEFAULT NULL,
  `like_target_user_id` int(11) DEFAULT NULL,
  `like_create_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `like_create_user_id` (`like_create_user_id`),
  KEY `like_target_user_id` (`like_target_user_id`),
  CONSTRAINT `like_ibfk_1` FOREIGN KEY (`like_create_user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `like_ibfk_2` FOREIGN KEY (`like_target_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for log
-- ----------------------------
DROP TABLE IF EXISTS `log`;
CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `log_create_user_id` int(11) NOT NULL,
  `log_data` text,
  `log_type` varchar(255) NOT NULL,
  `log_target_user_id` int(11) DEFAULT NULL,
  `log_create_time` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_log_user_1` (`log_create_user_id`),
  KEY `fk_log_user_2` (`log_target_user_id`),
  CONSTRAINT `fk_log_user_1` FOREIGN KEY (`log_create_user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `fk_log_user_2` FOREIGN KEY (`log_target_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for message
-- ----------------------------
DROP TABLE IF EXISTS `message`;
CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `message_create_user_id` int(11) NOT NULL,
  `message_target_user_id` int(11) NOT NULL,
  `message_content` longtext NOT NULL,
  `message_create_time` datetime NOT NULL,
  `message_delete_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_message_user_1` (`message_create_user_id`),
  KEY `fk_message_user_2` (`message_target_user_id`),
  CONSTRAINT `fk_message_user_1` FOREIGN KEY (`message_create_user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `fk_message_user_2` FOREIGN KEY (`message_target_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(64) NOT NULL,
  `user_desc` varchar(255) DEFAULT NULL,
  `user_password` varchar(64) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_phone` varchar(20) DEFAULT NULL,
  `user_gender` smallint(1) DEFAULT NULL,
  `user_birthday` date DEFAULT NULL,
  `user_id_num` varchar(20) DEFAULT NULL,
  `user_qq` varchar(20) DEFAULT NULL,
  `user_address` varchar(255) DEFAULT NULL,
  `user_profile_view_count` int(11) DEFAULT '0',
  `user_alipay_picture_path` varchar(255) DEFAULT NULL,
  `user_weixin_picture_path` varchar(255) DEFAULT NULL,
  `user_qq_pitcure_path` varchar(255) DEFAULT NULL,
  `user_image_path` varchar(255) DEFAULT NULL,
  `user_is_activate` smallint(1) NOT NULL DEFAULT '0',
  `user_lock_time` datetime DEFAULT NULL,
  `user_create_time` datetime NOT NULL,
  `user_update_time` datetime DEFAULT NULL,
  `user_lastest_login_time` datetime DEFAULT NULL,
  `user_lastest_login_ip` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_name_unique` (`user_name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for user_view
-- ----------------------------
DROP TABLE IF EXISTS `user_view`;
CREATE TABLE `user_view` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_view_target_user_id` int(11) DEFAULT NULL,
  `user_view_create_user_id` int(11) DEFAULT NULL,
  `user_view_create_time` datetime DEFAULT NULL,
  `user_view_create_ip` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_view_target_user_id` (`user_view_target_user_id`),
  KEY `user_view_create_user_id` (`user_view_create_user_id`),
  CONSTRAINT `user_view_ibfk_1` FOREIGN KEY (`user_view_target_user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `user_view_ibfk_2` FOREIGN KEY (`user_view_create_user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
