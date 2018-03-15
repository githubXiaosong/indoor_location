/*
Navicat MySQL Data Transfer

Source Server         : 本地
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : indoor_location

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-03-11 21:09:49
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `terminals`
-- ----------------------------
DROP TABLE IF EXISTS `terminals`;
CREATE TABLE `terminals` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` char(255) NOT NULL,
  `name` varchar(10) DEFAULT NULL,
  `location_id` mediumint(9) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of terminals
-- ----------------------------
INSERT INTO `terminals` VALUES ('1', '100.100.100.100', '11', '1', '0');

-- ----------------------------
-- Table structure for `tr_msgs`
-- ----------------------------
DROP TABLE IF EXISTS `tr_msgs`;
CREATE TABLE `tr_msgs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `terminal_id` int(10) unsigned NOT NULL,
  `text` char(255) NOT NULL,
  `tr` tinyint(4) NOT NULL COMMENT 'T:0  R:1',
  `timestamp` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `1` (`terminal_id`),
  CONSTRAINT `1` FOREIGN KEY (`terminal_id`) REFERENCES `terminals` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tr_msgs
-- ----------------------------
INSERT INTO `tr_msgs` VALUES ('1', '1', 'www', '0', '1111111111');
INSERT INTO `tr_msgs` VALUES ('2', '1', 'qqq', '1', '1111111111');
INSERT INTO `tr_msgs` VALUES ('3', '1', 'eee', '1', '1111111111');
INSERT INTO `tr_msgs` VALUES ('4', '1', 'rrr', '0', '1111111111');

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `phone` varchar(16) DEFAULT NULL,
  `authority` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `is_ban` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'xiaosong', '13081114886', '1', '0');
