/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : chat

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-07-04 23:40:54
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `msg`
-- ----------------------------
DROP TABLE IF EXISTS `msg`;
CREATE TABLE `msg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `chat_user_id` int(11) DEFAULT NULL,
  `chat_msg` varchar(255) DEFAULT NULL,
  `chat_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of msg
-- ----------------------------
INSERT INTO `msg` VALUES ('1', '0', '123', '2017-07-04 14:33:30');
INSERT INTO `msg` VALUES ('2', '0', '234', '2017-07-04 14:33:35');
INSERT INTO `msg` VALUES ('3', '0', '1234', '2017-07-04 14:37:03');
INSERT INTO `msg` VALUES ('4', '0', '12341241234123', '2017-07-04 14:37:06');
INSERT INTO `msg` VALUES ('5', '0', '123123123', '2017-07-04 14:37:08');
INSERT INTO `msg` VALUES ('6', '0', '12312', '2017-07-04 14:37:11');
INSERT INTO `msg` VALUES ('7', '0', '123', '2017-07-04 14:37:13');
INSERT INTO `msg` VALUES ('8', '2', '456', '2017-07-04 14:38:07');
INSERT INTO `msg` VALUES ('9', '2', '23532', '2017-07-04 14:38:10');
INSERT INTO `msg` VALUES ('10', '1', '1234', '2017-07-04 14:52:46');
INSERT INTO `msg` VALUES ('11', '1', '456', '2017-07-04 14:54:39');
INSERT INTO `msg` VALUES ('12', '1', 'niihao', '2017-07-04 15:00:14');
INSERT INTO `msg` VALUES ('13', '1', '123', '2017-07-04 15:01:25');
INSERT INTO `msg` VALUES ('14', '1', '123', '2017-07-04 15:01:59');
INSERT INTO `msg` VALUES ('15', '1', '123', '2017-07-04 15:03:39');
INSERT INTO `msg` VALUES ('16', '1', '123122222222222222222222222222222222222222', '2017-07-04 15:05:02');
INSERT INTO `msg` VALUES ('17', '2', 'uuuuuu', '2017-07-04 15:08:32');
INSERT INTO `msg` VALUES ('18', '2', 'iop[asas', '2017-07-04 15:08:38');
INSERT INTO `msg` VALUES ('19', '1', '123', '2017-07-04 15:15:19');
INSERT INTO `msg` VALUES ('20', '1', '123', '2017-07-04 15:15:22');
INSERT INTO `msg` VALUES ('21', '1', '12312', '2017-07-04 15:15:25');
INSERT INTO `msg` VALUES ('22', '1', '12312222222222222222222222', '2017-07-04 15:15:28');
INSERT INTO `msg` VALUES ('23', '1', '122222222222222', '2017-07-04 15:15:32');
INSERT INTO `msg` VALUES ('24', '1', '123', '2017-07-04 15:31:07');
INSERT INTO `msg` VALUES ('25', '1', '123', '2017-07-04 15:31:10');
INSERT INTO `msg` VALUES ('26', '1', '123', '2017-07-04 15:31:13');
INSERT INTO `msg` VALUES ('27', '1', '123', '2017-07-04 15:31:16');
INSERT INTO `msg` VALUES ('28', '1', '123', '2017-07-04 15:37:07');
INSERT INTO `msg` VALUES ('29', '1', '12', '2017-07-04 15:37:13');
INSERT INTO `msg` VALUES ('30', '1', '123', '2017-07-04 15:37:15');

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) DEFAULT NULL,
  `user_avatar` varchar(512) DEFAULT NULL,
  `user_password` varchar(255) DEFAULT NULL,
  `user_login_time` datetime DEFAULT NULL,
  `user_active_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'wangjun', null, 'sklcc', '2017-07-04 14:59:26', '2017-07-04 15:37:15');
INSERT INTO `user` VALUES ('2', 'test', null, 'sklcc', '2017-07-04 15:08:28', '2017-07-04 15:08:38');
