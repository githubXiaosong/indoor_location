/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50505
Source Host           : 127.0.0.1:3306
Source Database       : indoor_location

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-03-15 15:54:10
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `objects`
-- ----------------------------
DROP TABLE IF EXISTS `objects`;
CREATE TABLE `objects` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `y` varchar(255) NOT NULL,
  `x` varchar(255) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of objects
-- ----------------------------
INSERT INTO `objects` VALUES ('11', '110.111.112.113', 'test1', '1', '114', '38', '2018-03-15 07:04:11', '2018-03-15 03:14:44');
INSERT INTO `objects` VALUES ('12', '110.111.112.113', 'test2', '1', '38.031111', '114.481111', '2018-03-15 03:15:28', '2018-03-15 03:15:28');
INSERT INTO `objects` VALUES ('13', '110.111.112.113', 'test3', '0', '38.032222', '114.482222', '2018-03-15 03:16:04', '2018-03-15 03:16:04');

-- ----------------------------
-- Table structure for `terminals`
-- ----------------------------
DROP TABLE IF EXISTS `terminals`;
CREATE TABLE `terminals` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` char(255) NOT NULL,
  `name` varchar(10) NOT NULL,
  `location` varchar(255) NOT NULL COMMENT '{"x":11,"y":11,"z":11}',
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of terminals
-- ----------------------------
INSERT INTO `terminals` VALUES ('12', '110.111.112.113', 'xiaosong', '{\"x\":11,\"y\":22,\"z\":33}', '1', '2018-03-12 09:18:13', '2018-03-12 09:18:13');
INSERT INTO `terminals` VALUES ('14', '110.111.112.113', 'xiaosong', '{\"x\":11,\"y\":22,\"z\":33}', '1', '2018-03-15 01:23:00', '2018-03-15 01:23:00');
INSERT INTO `terminals` VALUES ('16', '110.111.112.113', 'xiaosong', '{\"x\":11,\"y\":22,\"z\":33}', '1', '2018-03-15 01:23:35', '2018-03-15 01:23:35');
INSERT INTO `terminals` VALUES ('17', '110.111.112.113', 'xiaosong', '{\"x\":11,\"y\":22,\"z\":33}', '1', '2018-03-15 01:23:44', '2018-03-15 01:23:44');
INSERT INTO `terminals` VALUES ('18', '110.111.112.113', 'xiaosong2', '{\"x\":11,\"y\":22,\"z\":33}', '1', '2018-03-15 01:24:24', '2018-03-15 01:24:24');

-- ----------------------------
-- Table structure for `terminal_msgs`
-- ----------------------------
DROP TABLE IF EXISTS `terminal_msgs`;
CREATE TABLE `terminal_msgs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `terminal_id` int(10) unsigned NOT NULL,
  `text` varchar(255) NOT NULL,
  `tr` tinyint(4) NOT NULL COMMENT '0:APP->WEB   1:WEB->APP',
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `1` (`terminal_id`),
  CONSTRAINT `1` FOREIGN KEY (`terminal_id`) REFERENCES `terminals` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of terminal_msgs
-- ----------------------------
INSERT INTO `terminal_msgs` VALUES ('1', '12', 'asdas', '1', '2018-03-15 03:45:02', '2018-03-15 03:45:02');
INSERT INTO `terminal_msgs` VALUES ('2', '12', 'aaaa', '1', '2018-03-15 03:45:51', '2018-03-15 03:45:51');
INSERT INTO `terminal_msgs` VALUES ('3', '12', 'imagefile profiles', '1', '2018-03-15 03:46:59', '2018-03-15 03:46:59');

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `location` varchar(255) NOT NULL COMMENT '{"x":11,"y":11,"z":11}',
  `authority` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `is_ban` tinyint(4) NOT NULL DEFAULT '0',
  `ip_address` varchar(255) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('10', 'xiaosong', '{\"x\":11,\"y\":22,\"z\":33}', '2', '0', '110.111.112.113', '2018-03-12 09:19:32', '2018-03-12 09:19:32');
INSERT INTO `users` VALUES ('11', 'xiaosong', '{\"x\":11,\"y\":22,\"z\":33}', '2', '0', '110.111.112.113', '2018-03-15 01:25:02', '2018-03-15 01:25:02');
INSERT INTO `users` VALUES ('12', 'xiaosong', '{\"x\":11,\"y\":22,\"z\":33}', '2', '0', '110.111.112.113', '2018-03-15 01:25:12', '2018-03-15 01:25:12');
INSERT INTO `users` VALUES ('13', 'xiaosong', '{\"x\":11,\"y\":22,\"z\":33}', '2', '0', '110.111.112.113', '2018-03-15 01:25:28', '2018-03-15 01:25:28');

-- ----------------------------
-- Table structure for `user_msgs`
-- ----------------------------
DROP TABLE IF EXISTS `user_msgs`;
CREATE TABLE `user_msgs` (
  `id` int(10) NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `text` varchar(255) NOT NULL,
  `tr` tinyint(4) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `3` (`user_id`),
  CONSTRAINT `3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user_msgs
-- ----------------------------
