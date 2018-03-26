/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : indoor_location

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-03-26 17:28:45
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for objects
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
INSERT INTO `objects` VALUES ('11', '192.168.1.131', 'test1', '1', '38.033333', '114.486666', '2018-03-15 07:04:11', '2018-03-15 03:14:44');
INSERT INTO `objects` VALUES ('12', '192.168.1.135', 'test2', '1', '38.031111', '114.481111', '2018-03-15 03:15:28', '2018-03-15 03:15:28');
INSERT INTO `objects` VALUES ('13', '192.168.1.138', 'test3', '0', '38.031111', '114.482222', '2018-03-15 03:16:04', '2018-03-15 03:16:04');

-- ----------------------------
-- Table structure for terminals
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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of terminals
-- ----------------------------
INSERT INTO `terminals` VALUES ('19', '192.168.1.12', '定位基站1', '{\"x\":1000,\"y\":2000,\"z\":3000}', '1', '2018-03-26 08:54:06', '2018-03-26 08:54:06');
INSERT INTO `terminals` VALUES ('20', '192.168.1.13', '定位基站2', '{\"x\":1000,\"y\":1500,\"z\":3000}', '1', '2018-03-26 08:54:35', '2018-03-26 08:54:35');
INSERT INTO `terminals` VALUES ('21', '192.168.1.14', '定位基站3', '{\"x\":2000,\"y\":1500,\"z\":3000}', '0', '2018-03-26 08:55:02', '2018-03-26 08:55:02');
INSERT INTO `terminals` VALUES ('22', '192.168.1.15', '定位基站4', '{\"x\":3000,\"y\":1500,\"z\":3000}', '1', '2018-03-26 08:55:31', '2018-03-26 08:55:31');

-- ----------------------------
-- Table structure for terminal_msgs
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

-- ----------------------------
-- Table structure for users
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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('14', '维护人员1', '{\"x\":0,\"y\":200,\"z\":100}', '0', '2', '192.168.1.102', '2018-03-26 09:01:46', '2018-03-26 09:01:46');
INSERT INTO `users` VALUES ('15', '维护人员2', '{\"x\":100,\"y\":200,\"z\":100}', '0', '2', '192.168.1.103', '2018-03-26 09:01:46', '2018-03-26 09:01:46');
INSERT INTO `users` VALUES ('16', '维护人员3', '{\"x\":300,\"y\":300,\"z\":98}', '0', '2', '192.168.1.112', '2018-03-26 09:01:46', '2018-03-26 09:01:46');

-- ----------------------------
-- Table structure for user_msgs
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
