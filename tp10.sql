/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50547
Source Host           : localhost:3306
Source Database       : tp10

Target Server Type    : MYSQL
Target Server Version : 50547
File Encoding         : 65001

Date: 2016-06-25 12:39:41
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for auth_group
-- ----------------------------
DROP TABLE IF EXISTS `auth_group`;
CREATE TABLE `auth_group` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(100) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `rules` char(80) NOT NULL DEFAULT '',
  `description` text COMMENT '描述',
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of auth_group
-- ----------------------------
INSERT INTO `auth_group` VALUES ('1', '管理员', '1', '6,11,1,2,13,15,14,16,3,12,8,7,9,4,5,10', '', '0', '1466780039');
INSERT INTO `auth_group` VALUES ('5', '初级管理员', '1', '11,6,1', '', '1466778569', '1466778618');

-- ----------------------------
-- Table structure for auth_group_access
-- ----------------------------
DROP TABLE IF EXISTS `auth_group_access`;
CREATE TABLE `auth_group_access` (
  `uid` mediumint(8) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  UNIQUE KEY `uid_group_id` (`uid`,`group_id`),
  KEY `uid` (`uid`),
  KEY `group_id` (`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of auth_group_access
-- ----------------------------
INSERT INTO `auth_group_access` VALUES ('1', '1');

-- ----------------------------
-- Table structure for auth_rule
-- ----------------------------
DROP TABLE IF EXISTS `auth_rule`;
CREATE TABLE `auth_rule` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(80) NOT NULL DEFAULT '',
  `title` char(20) NOT NULL DEFAULT '',
  `type` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `condition` char(100) NOT NULL DEFAULT '',
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `pid` mediumint(8) unsigned NOT NULL,
  `path` varchar(100) NOT NULL,
  `sort` int(11) unsigned NOT NULL,
  `is_show` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否显示',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of auth_rule
-- ----------------------------
INSERT INTO `auth_rule` VALUES ('1', 'admin/main/index', '控制面板', '1', '1', '', '0', '0', '0', '0', '1', '1');
INSERT INTO `auth_rule` VALUES ('2', '', '系统', '1', '1', '', '0', '0', '0', '0', '2', '1');
INSERT INTO `auth_rule` VALUES ('3', 'admin/auth_group/index', '角色管理', '1', '1', '', '0', '0', '2', '0-2', '1', '1');
INSERT INTO `auth_rule` VALUES ('4', 'admin/auth_rule/index', '权限列表', '1', '1', '', '0', '1466746258', '2', '0-2', '2', '1');
INSERT INTO `auth_rule` VALUES ('5', 'admin/auth_rule/add', '添加权限', '1', '1', '', '0', '1466686168', '4', '0-2-4', '1', '0');
INSERT INTO `auth_rule` VALUES ('6', 'admin/user/logout', '退出登录', '1', '1', '', '0', '0', '0', '0', '0', '0');
INSERT INTO `auth_rule` VALUES ('7', 'admin/auth_group/add', '添加角色', '1', '1', '', '0', '0', '3', '0-2-3', '0', '0');
INSERT INTO `auth_rule` VALUES ('8', 'admin/auth_group/edit', '编辑角色', '1', '1', '', '0', '0', '3', '0-2-3', '0', '0');
INSERT INTO `auth_rule` VALUES ('9', 'admin/auth_group/del', '删除角色', '1', '1', '', '0', '0', '3', '0-2-3', '0', '0');
INSERT INTO `auth_rule` VALUES ('10', 'admin/auth_rule/edit', '编辑权限', '1', '1', '', '0', '1466686416', '4', '0-2-4', '2', '0');
INSERT INTO `auth_rule` VALUES ('11', 'admin/user/changePwd', '修改密码', '1', '1', '', '1466688085', '1466688085', '0', '0', '0', '0');
INSERT INTO `auth_rule` VALUES ('12', 'admin/auth_group/resource', '资源管理', '1', '1', '', '1466688887', '1466688887', '3', '0-2-3', '0', '0');
INSERT INTO `auth_rule` VALUES ('13', 'admin/user/index', '用户管理', '1', '1', '', '1466778713', '1466778747', '2', '0-2', '0', '1');
INSERT INTO `auth_rule` VALUES ('14', 'admin/user/edit', '编辑用户', '1', '1', '', '1466779374', '1466779374', '13', '0-2-13', '0', '0');
INSERT INTO `auth_rule` VALUES ('15', 'admin/user/del', '删除用户', '1', '1', '', '1466779400', '1466779400', '13', '0-2-13', '0', '0');
INSERT INTO `auth_rule` VALUES ('16', 'admin/user/add', '添加用户', '1', '1', '', '1466780028', '1466780028', '13', '0-2-13', '0', '0');

-- ----------------------------
-- Table structure for ucenter_member
-- ----------------------------
DROP TABLE IF EXISTS `ucenter_member`;
CREATE TABLE `ucenter_member` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户ID',
  `username` char(16) NOT NULL COMMENT '用户名',
  `password` char(32) NOT NULL COMMENT '密码',
  `email` char(32) NOT NULL COMMENT '用户邮箱',
  `mobile` char(15) NOT NULL DEFAULT '' COMMENT '用户手机',
  `reg_ip` varchar(20) NOT NULL DEFAULT '0' COMMENT '注册IP',
  `last_login_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '最后登录时间',
  `last_login_ip` varchar(20) NOT NULL DEFAULT '0' COMMENT '最后登录IP',
  `status` tinyint(4) DEFAULT '0' COMMENT '用户状态',
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  KEY `status` (`status`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='用户表';

-- ----------------------------
-- Records of ucenter_member
-- ----------------------------
INSERT INTO `ucenter_member` VALUES ('1', 'admin', '8068cd602f9955a42e168bdce84d55e3', '296720094@qq.com', '18053449656', '0', '1466782283', '2130706433', '1', '0', '1466782283');
INSERT INTO `ucenter_member` VALUES ('2', 'test', '779d005fa526b871d424fcab8140582f', '', '', '127.0.0.1', '0', '0', '1', '1466780641', '1466782238');
