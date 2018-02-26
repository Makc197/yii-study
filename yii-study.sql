/*
Navicat MySQL Data Transfer

Source Server         : MySQL
Source Server Version : 50631
Source Host           : 127.0.0.1:3306
Source Database       : yii-study

Target Server Type    : MYSQL
Target Server Version : 50631
File Encoding         : 65001

Date: 2018-02-26 20:07:53
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for auth_assignment
-- ----------------------------
DROP TABLE IF EXISTS `auth_assignment`;
CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of auth_assignment
-- ----------------------------
INSERT INTO `auth_assignment` VALUES ('admin', '2', '1518708118');
INSERT INTO `auth_assignment` VALUES ('author', '4', '1518708118');
INSERT INTO `auth_assignment` VALUES ('book_manager', '7', '1519301697');
INSERT INTO `auth_assignment` VALUES ('book_operator', '6', '1519301679');
INSERT INTO `auth_assignment` VALUES ('book_reader', '3', '1518708118');
INSERT INTO `auth_assignment` VALUES ('editor', '5', '1518708118');
INSERT INTO `auth_assignment` VALUES ('reader', '1', '1519145913');

-- ----------------------------
-- Table structure for auth_item
-- ----------------------------
DROP TABLE IF EXISTS `auth_item`;
CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`),
  CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of auth_item
-- ----------------------------
INSERT INTO `auth_item` VALUES ('/*', '2', null, null, null, '1519225335', '1519225335');
INSERT INTO `auth_item` VALUES ('/api/*', '2', null, null, null, '1519225335', '1519225335');
INSERT INTO `auth_item` VALUES ('/api/book/*', '2', null, null, null, '1519225335', '1519225335');
INSERT INTO `auth_item` VALUES ('/api/book/create', '2', null, null, null, '1519225335', '1519225335');
INSERT INTO `auth_item` VALUES ('/api/book/delete', '2', null, null, null, '1519225335', '1519225335');
INSERT INTO `auth_item` VALUES ('/api/book/index', '2', null, null, null, '1519225335', '1519225335');
INSERT INTO `auth_item` VALUES ('/api/book/options', '2', null, null, null, '1519225335', '1519225335');
INSERT INTO `auth_item` VALUES ('/api/book/update', '2', null, null, null, '1519225335', '1519225335');
INSERT INTO `auth_item` VALUES ('/api/book/view', '2', null, null, null, '1519225335', '1519225335');
INSERT INTO `auth_item` VALUES ('/api/cd/*', '2', null, null, null, '1519225335', '1519225335');
INSERT INTO `auth_item` VALUES ('/api/cd/create', '2', null, null, null, '1519225335', '1519225335');
INSERT INTO `auth_item` VALUES ('/api/cd/delete', '2', null, null, null, '1519225335', '1519225335');
INSERT INTO `auth_item` VALUES ('/api/cd/index', '2', null, null, null, '1519225335', '1519225335');
INSERT INTO `auth_item` VALUES ('/api/cd/options', '2', null, null, null, '1519225335', '1519225335');
INSERT INTO `auth_item` VALUES ('/api/cd/update', '2', null, null, null, '1519225335', '1519225335');
INSERT INTO `auth_item` VALUES ('/api/cd/view', '2', null, null, null, '1519225335', '1519225335');
INSERT INTO `auth_item` VALUES ('/api/product/*', '2', null, null, null, '1519225335', '1519225335');
INSERT INTO `auth_item` VALUES ('/api/product/create', '2', null, null, null, '1519225335', '1519225335');
INSERT INTO `auth_item` VALUES ('/api/product/delete', '2', null, null, null, '1519225335', '1519225335');
INSERT INTO `auth_item` VALUES ('/api/product/index', '2', null, null, null, '1519225335', '1519225335');
INSERT INTO `auth_item` VALUES ('/api/product/options', '2', null, null, null, '1519225335', '1519225335');
INSERT INTO `auth_item` VALUES ('/api/product/update', '2', null, null, null, '1519225335', '1519225335');
INSERT INTO `auth_item` VALUES ('/api/product/view', '2', null, null, null, '1519225335', '1519225335');
INSERT INTO `auth_item` VALUES ('/book/*', '2', null, null, null, '1519657754', '1519657754');
INSERT INTO `auth_item` VALUES ('/book/create', '2', null, null, null, '1519657754', '1519657754');
INSERT INTO `auth_item` VALUES ('/book/delete', '2', null, null, null, '1519657754', '1519657754');
INSERT INTO `auth_item` VALUES ('/book/index', '2', null, null, null, '1519657754', '1519657754');
INSERT INTO `auth_item` VALUES ('/book/update', '2', null, null, null, '1519657754', '1519657754');
INSERT INTO `auth_item` VALUES ('/book/view', '2', null, null, null, '1519657754', '1519657754');
INSERT INTO `auth_item` VALUES ('/cd/*', '2', null, null, null, '1519657754', '1519657754');
INSERT INTO `auth_item` VALUES ('/cd/create', '2', null, null, null, '1519657754', '1519657754');
INSERT INTO `auth_item` VALUES ('/cd/delete', '2', null, null, null, '1519657754', '1519657754');
INSERT INTO `auth_item` VALUES ('/cd/index', '2', null, null, null, '1519657754', '1519657754');
INSERT INTO `auth_item` VALUES ('/cd/update', '2', null, null, null, '1519657754', '1519657754');
INSERT INTO `auth_item` VALUES ('/cd/view', '2', null, null, null, '1519657754', '1519657754');
INSERT INTO `auth_item` VALUES ('/debug/*', '2', null, null, null, '1519225335', '1519225335');
INSERT INTO `auth_item` VALUES ('/debug/default/*', '2', null, null, null, '1519225335', '1519225335');
INSERT INTO `auth_item` VALUES ('/debug/default/db-explain', '2', null, null, null, '1519225335', '1519225335');
INSERT INTO `auth_item` VALUES ('/debug/default/download-mail', '2', null, null, null, '1519225335', '1519225335');
INSERT INTO `auth_item` VALUES ('/debug/default/index', '2', null, null, null, '1519225335', '1519225335');
INSERT INTO `auth_item` VALUES ('/debug/default/toolbar', '2', null, null, null, '1519225335', '1519225335');
INSERT INTO `auth_item` VALUES ('/debug/default/view', '2', null, null, null, '1519225335', '1519225335');
INSERT INTO `auth_item` VALUES ('/debug/user/*', '2', null, null, null, '1519225335', '1519225335');
INSERT INTO `auth_item` VALUES ('/debug/user/reset-identity', '2', null, null, null, '1519225335', '1519225335');
INSERT INTO `auth_item` VALUES ('/debug/user/set-identity', '2', null, null, null, '1519225335', '1519225335');
INSERT INTO `auth_item` VALUES ('/gii/*', '2', null, null, null, '1519225335', '1519225335');
INSERT INTO `auth_item` VALUES ('/gii/default/*', '2', null, null, null, '1519225335', '1519225335');
INSERT INTO `auth_item` VALUES ('/gii/default/action', '2', null, null, null, '1519225335', '1519225335');
INSERT INTO `auth_item` VALUES ('/gii/default/diff', '2', null, null, null, '1519225335', '1519225335');
INSERT INTO `auth_item` VALUES ('/gii/default/index', '2', null, null, null, '1519225335', '1519225335');
INSERT INTO `auth_item` VALUES ('/gii/default/preview', '2', null, null, null, '1519225335', '1519225335');
INSERT INTO `auth_item` VALUES ('/gii/default/view', '2', null, null, null, '1519225335', '1519225335');
INSERT INTO `auth_item` VALUES ('/product/*', '2', null, null, null, '1519660676', '1519660676');
INSERT INTO `auth_item` VALUES ('/product/create', '2', null, null, null, '1519659924', '1519659924');
INSERT INTO `auth_item` VALUES ('/product/delete', '2', null, null, null, '1519659980', '1519659980');
INSERT INTO `auth_item` VALUES ('/product/index', '2', null, null, null, '1519659992', '1519659992');
INSERT INTO `auth_item` VALUES ('/product/update', '2', null, null, null, '1519660005', '1519660005');
INSERT INTO `auth_item` VALUES ('/product/view', '2', null, null, null, '1519660014', '1519660014');
INSERT INTO `auth_item` VALUES ('/rbacadmin/*', '2', null, null, null, '1519225335', '1519225335');
INSERT INTO `auth_item` VALUES ('/rbacadmin/assignment/*', '2', null, null, null, '1519225335', '1519225335');
INSERT INTO `auth_item` VALUES ('/rbacadmin/assignment/assign', '2', null, null, null, '1519225335', '1519225335');
INSERT INTO `auth_item` VALUES ('/rbacadmin/assignment/index', '2', null, null, null, '1519225335', '1519225335');
INSERT INTO `auth_item` VALUES ('/rbacadmin/assignment/revoke', '2', null, null, null, '1519225335', '1519225335');
INSERT INTO `auth_item` VALUES ('/rbacadmin/assignment/view', '2', null, null, null, '1519225335', '1519225335');
INSERT INTO `auth_item` VALUES ('/rbacadmin/default/*', '2', null, null, null, '1519225335', '1519225335');
INSERT INTO `auth_item` VALUES ('/rbacadmin/default/index', '2', null, null, null, '1519225335', '1519225335');
INSERT INTO `auth_item` VALUES ('/rbacadmin/menu/*', '2', null, null, null, '1519225335', '1519225335');
INSERT INTO `auth_item` VALUES ('/rbacadmin/menu/create', '2', null, null, null, '1519225335', '1519225335');
INSERT INTO `auth_item` VALUES ('/rbacadmin/menu/delete', '2', null, null, null, '1519225335', '1519225335');
INSERT INTO `auth_item` VALUES ('/rbacadmin/menu/index', '2', null, null, null, '1519225335', '1519225335');
INSERT INTO `auth_item` VALUES ('/rbacadmin/menu/update', '2', null, null, null, '1519225335', '1519225335');
INSERT INTO `auth_item` VALUES ('/rbacadmin/menu/view', '2', null, null, null, '1519225335', '1519225335');
INSERT INTO `auth_item` VALUES ('/rbacadmin/permission/*', '2', null, null, null, '1519225335', '1519225335');
INSERT INTO `auth_item` VALUES ('/rbacadmin/permission/assign', '2', null, null, null, '1519225335', '1519225335');
INSERT INTO `auth_item` VALUES ('/rbacadmin/permission/create', '2', null, null, null, '1519225335', '1519225335');
INSERT INTO `auth_item` VALUES ('/rbacadmin/permission/delete', '2', null, null, null, '1519225335', '1519225335');
INSERT INTO `auth_item` VALUES ('/rbacadmin/permission/index', '2', null, null, null, '1519225335', '1519225335');
INSERT INTO `auth_item` VALUES ('/rbacadmin/permission/remove', '2', null, null, null, '1519225335', '1519225335');
INSERT INTO `auth_item` VALUES ('/rbacadmin/permission/update', '2', null, null, null, '1519225335', '1519225335');
INSERT INTO `auth_item` VALUES ('/rbacadmin/permission/view', '2', null, null, null, '1519225335', '1519225335');
INSERT INTO `auth_item` VALUES ('/rbacadmin/role/*', '2', null, null, null, '1519225335', '1519225335');
INSERT INTO `auth_item` VALUES ('/rbacadmin/role/assign', '2', null, null, null, '1519225335', '1519225335');
INSERT INTO `auth_item` VALUES ('/rbacadmin/role/create', '2', null, null, null, '1519225335', '1519225335');
INSERT INTO `auth_item` VALUES ('/rbacadmin/role/delete', '2', null, null, null, '1519225335', '1519225335');
INSERT INTO `auth_item` VALUES ('/rbacadmin/role/index', '2', null, null, null, '1519224963', '1519224963');
INSERT INTO `auth_item` VALUES ('/rbacadmin/role/remove', '2', null, null, null, '1519225335', '1519225335');
INSERT INTO `auth_item` VALUES ('/rbacadmin/role/update', '2', null, null, null, '1519225335', '1519225335');
INSERT INTO `auth_item` VALUES ('/rbacadmin/role/view', '2', null, null, null, '1519225335', '1519225335');
INSERT INTO `auth_item` VALUES ('/rbacadmin/route/*', '2', null, null, null, '1519225335', '1519225335');
INSERT INTO `auth_item` VALUES ('/rbacadmin/route/assign', '2', null, null, null, '1519225335', '1519225335');
INSERT INTO `auth_item` VALUES ('/rbacadmin/route/create', '2', null, null, null, '1519225335', '1519225335');
INSERT INTO `auth_item` VALUES ('/rbacadmin/route/index', '2', null, null, null, '1519225335', '1519225335');
INSERT INTO `auth_item` VALUES ('/rbacadmin/route/refresh', '2', null, null, null, '1519225335', '1519225335');
INSERT INTO `auth_item` VALUES ('/rbacadmin/route/remove', '2', null, null, null, '1519225335', '1519225335');
INSERT INTO `auth_item` VALUES ('/rbacadmin/rule/*', '2', null, null, null, '1519225335', '1519225335');
INSERT INTO `auth_item` VALUES ('/rbacadmin/rule/create', '2', null, null, null, '1519225335', '1519225335');
INSERT INTO `auth_item` VALUES ('/rbacadmin/rule/delete', '2', null, null, null, '1519225335', '1519225335');
INSERT INTO `auth_item` VALUES ('/rbacadmin/rule/index', '2', null, null, null, '1519225335', '1519225335');
INSERT INTO `auth_item` VALUES ('/rbacadmin/rule/update', '2', null, null, null, '1519225335', '1519225335');
INSERT INTO `auth_item` VALUES ('/rbacadmin/rule/view', '2', null, null, null, '1519225335', '1519225335');
INSERT INTO `auth_item` VALUES ('/rbacadmin/user/*', '2', null, null, null, '1519225335', '1519225335');
INSERT INTO `auth_item` VALUES ('/rbacadmin/user/activate', '2', null, null, null, '1519225335', '1519225335');
INSERT INTO `auth_item` VALUES ('/rbacadmin/user/change-password', '2', null, null, null, '1519225335', '1519225335');
INSERT INTO `auth_item` VALUES ('/rbacadmin/user/delete', '2', null, null, null, '1519225335', '1519225335');
INSERT INTO `auth_item` VALUES ('/rbacadmin/user/index', '2', null, null, null, '1519225335', '1519225335');
INSERT INTO `auth_item` VALUES ('/rbacadmin/user/login', '2', null, null, null, '1519225335', '1519225335');
INSERT INTO `auth_item` VALUES ('/rbacadmin/user/logout', '2', null, null, null, '1519225335', '1519225335');
INSERT INTO `auth_item` VALUES ('/rbacadmin/user/request-password-reset', '2', null, null, null, '1519225335', '1519225335');
INSERT INTO `auth_item` VALUES ('/rbacadmin/user/reset-password', '2', null, null, null, '1519225335', '1519225335');
INSERT INTO `auth_item` VALUES ('/rbacadmin/user/signup', '2', null, null, null, '1519225335', '1519225335');
INSERT INTO `auth_item` VALUES ('/rbacadmin/user/view', '2', null, null, null, '1519225335', '1519225335');
INSERT INTO `auth_item` VALUES ('admin', '1', 'Пользователи с этой ролью могут всё', null, null, '1518708117', '1519648442');
INSERT INTO `auth_item` VALUES ('author', '1', 'Пользователи с этой ролью могут: \r\nВидеть записи всех категорий (Permission view_all );\r\nCоздавать новые записи во всех категориях (Permission create_all); \r\nРедактировать только свои записи (Permission own_update );\r\nУдалять только свои записи (Permission own_delete);', null, null, '1518708117', '1519661110');
INSERT INTO `auth_item` VALUES ('book_manager', '1', 'Пользователи с этой ролью могут:\r\nПросматривать записи в категории Книги;\r\nСоздавать и редактировать записи в категории Книги\r\n(т.е. все что у book_operator);\r\nУдалять записи в категории  Книги (Permission delete_book)', null, null, '1519299925', '1519661481');
INSERT INTO `auth_item` VALUES ('book_operator', '1', 'Пользователи с этой ролью могут:\r\nПросматривать записи в категории Книги (т.е. все что у book_reader);\r\nСоздавать и редактировать записи в категории Книги (Permission create_update_book)', null, null, '1519299805', '1519661596');
INSERT INTO `auth_item` VALUES ('book_reader', '1', 'Пользователи с этой ролью могут: \r\nЧитать записи из категории Книги (Permission view_book)', null, null, '1518708117', '1519661523');
INSERT INTO `auth_item` VALUES ('create_all', '2', 'Разрешено создавать записи товаров во всех категориях', null, null, '1519314418', '1519657846');
INSERT INTO `auth_item` VALUES ('create_update_book', '2', 'Разрешено создавать и редактировать записи в категории Книги', null, null, '1518708118', '1519660830');
INSERT INTO `auth_item` VALUES ('create_update_cd', '2', 'Разрешено создавать и редактировать записи в категории Компакт диски', null, null, '1519228290', '1519660852');
INSERT INTO `auth_item` VALUES ('create_update_product', '2', 'Разрешено создавать и редактировать записи в категории Прочие товары', null, null, '1519228360', '1519660883');
INSERT INTO `auth_item` VALUES ('delete_all', '2', 'Разрешено удалять записи товаров во всех категориях', null, null, '1519296451', '1519660267');
INSERT INTO `auth_item` VALUES ('delete_book', '2', 'Разрешено удалять записи в категории Книги', null, null, '1518708118', '1519660905');
INSERT INTO `auth_item` VALUES ('delete_cd', '2', 'Разрешено удалять записи в категории Компакт диски', null, null, '1519294289', '1519660927');
INSERT INTO `auth_item` VALUES ('delete_product', '2', 'Разрешено удалять записи в категории Прочие товары', null, null, '1519295693', '1519660956');
INSERT INTO `auth_item` VALUES ('editor', '1', 'Пользователи с этой ролью могут: \r\nПросматривать записи во всех категориях (Permission view_all);\r\nСоздавать записи во всех категориях (Permission create_all);\r\nРедактировать записи во всех категориях (Permission update_all);', null, null, '1518708117', '1519662018');
INSERT INTO `auth_item` VALUES ('own_delete', '2', 'Разрешено удалять только свои записи', 'AuthorRule', null, '1518708118', '1519660253');
INSERT INTO `auth_item` VALUES ('own_update', '2', 'Разрешено редактировать только свои записи', 'AuthorRule', null, '1518708118', '1519660292');
INSERT INTO `auth_item` VALUES ('reader', '1', 'Пользователи с этой ролью могут: Просматривать записи во всех категориях (Permission view_all)', null, null, '1518708117', '1519661866');
INSERT INTO `auth_item` VALUES ('update_all', '2', 'Разрешено редактировать записи о товарах во всех категориях', null, null, '1518708118', '1519660352');
INSERT INTO `auth_item` VALUES ('view_all', '2', 'Разрешено просматривать записи во всех категориях', null, null, '1519297170', '1519660478');
INSERT INTO `auth_item` VALUES ('view_book', '2', 'Разрешено просматривать записи в категории Книги', null, null, '1518708118', '1519660996');
INSERT INTO `auth_item` VALUES ('view_cd', '2', 'Разрешено просматривать записи в категории Компакт диски', null, null, '1519296808', '1519661022');
INSERT INTO `auth_item` VALUES ('view_product', '2', 'Разрешено просматривать записи в категории Прочие товары', null, null, '1519296888', '1519661060');

-- ----------------------------
-- Table structure for auth_item_child
-- ----------------------------
DROP TABLE IF EXISTS `auth_item_child`;
CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of auth_item_child
-- ----------------------------
INSERT INTO `auth_item_child` VALUES ('admin', '/*');
INSERT INTO `auth_item_child` VALUES ('create_all', '/book/create');
INSERT INTO `auth_item_child` VALUES ('create_update_book', '/book/create');
INSERT INTO `auth_item_child` VALUES ('delete_all', '/book/delete');
INSERT INTO `auth_item_child` VALUES ('delete_book', '/book/delete');
INSERT INTO `auth_item_child` VALUES ('create_update_book', '/book/index');
INSERT INTO `auth_item_child` VALUES ('view_all', '/book/index');
INSERT INTO `auth_item_child` VALUES ('view_book', '/book/index');
INSERT INTO `auth_item_child` VALUES ('create_update_book', '/book/update');
INSERT INTO `auth_item_child` VALUES ('update_all', '/book/update');
INSERT INTO `auth_item_child` VALUES ('create_update_book', '/book/view');
INSERT INTO `auth_item_child` VALUES ('view_all', '/book/view');
INSERT INTO `auth_item_child` VALUES ('view_book', '/book/view');
INSERT INTO `auth_item_child` VALUES ('create_all', '/cd/create');
INSERT INTO `auth_item_child` VALUES ('create_update_cd', '/cd/create');
INSERT INTO `auth_item_child` VALUES ('delete_all', '/cd/delete');
INSERT INTO `auth_item_child` VALUES ('delete_cd', '/cd/delete');
INSERT INTO `auth_item_child` VALUES ('create_update_cd', '/cd/index');
INSERT INTO `auth_item_child` VALUES ('view_all', '/cd/index');
INSERT INTO `auth_item_child` VALUES ('view_cd', '/cd/index');
INSERT INTO `auth_item_child` VALUES ('create_update_cd', '/cd/update');
INSERT INTO `auth_item_child` VALUES ('update_all', '/cd/update');
INSERT INTO `auth_item_child` VALUES ('create_update_cd', '/cd/view');
INSERT INTO `auth_item_child` VALUES ('view_all', '/cd/view');
INSERT INTO `auth_item_child` VALUES ('view_cd', '/cd/view');
INSERT INTO `auth_item_child` VALUES ('create_update_product', '/product/create');
INSERT INTO `auth_item_child` VALUES ('delete_all', '/product/delete');
INSERT INTO `auth_item_child` VALUES ('delete_product', '/product/delete');
INSERT INTO `auth_item_child` VALUES ('create_update_product', '/product/index');
INSERT INTO `auth_item_child` VALUES ('view_all', '/product/index');
INSERT INTO `auth_item_child` VALUES ('view_product', '/product/index');
INSERT INTO `auth_item_child` VALUES ('create_update_product', '/product/update');
INSERT INTO `auth_item_child` VALUES ('update_all', '/product/update');
INSERT INTO `auth_item_child` VALUES ('view_all', '/product/view');
INSERT INTO `auth_item_child` VALUES ('view_product', '/product/view');
INSERT INTO `auth_item_child` VALUES ('book_manager', 'book_operator');
INSERT INTO `auth_item_child` VALUES ('book_operator', 'book_reader');
INSERT INTO `auth_item_child` VALUES ('author', 'create_all');
INSERT INTO `auth_item_child` VALUES ('editor', 'create_all');
INSERT INTO `auth_item_child` VALUES ('book_operator', 'create_update_book');
INSERT INTO `auth_item_child` VALUES ('own_delete', 'delete_all');
INSERT INTO `auth_item_child` VALUES ('book_manager', 'delete_book');
INSERT INTO `auth_item_child` VALUES ('author', 'own_delete');
INSERT INTO `auth_item_child` VALUES ('author', 'own_update');
INSERT INTO `auth_item_child` VALUES ('editor', 'update_all');
INSERT INTO `auth_item_child` VALUES ('own_update', 'update_all');
INSERT INTO `auth_item_child` VALUES ('author', 'view_all');
INSERT INTO `auth_item_child` VALUES ('editor', 'view_all');
INSERT INTO `auth_item_child` VALUES ('reader', 'view_all');
INSERT INTO `auth_item_child` VALUES ('book_reader', 'view_book');

-- ----------------------------
-- Table structure for auth_rule
-- ----------------------------
DROP TABLE IF EXISTS `auth_rule`;
CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of auth_rule
-- ----------------------------
INSERT INTO `auth_rule` VALUES ('AuthorRule', 0x4F3A31393A226170705C72756C655C417574686F7252756C65223A333A7B733A343A226E616D65223B733A31303A22417574686F7252756C65223B733A393A22637265617465644174223B693A313531393233303038373B733A393A22757064617465644174223B693A313531393233303130363B7D, '1519230087', '1519230106');

-- ----------------------------
-- Table structure for book
-- ----------------------------
DROP TABLE IF EXISTS `book`;
CREATE TABLE `book` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(30) NOT NULL DEFAULT 'book',
  `title` varchar(500) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `price` double NOT NULL,
  `author` varchar(200) NOT NULL,
  `numpages` decimal(30,0) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of book
-- ----------------------------
INSERT INTO `book` VALUES ('1', 'book', 'Книга №1', 'Описание книги №1', '12321444', 'Автор книги №1', '112', '4', '6');
INSERT INTO `book` VALUES ('3', 'book', 'Книга №3', 'Описание книги №2', '123210032433', 'Автор книги №2', '333444', '4', '4');
INSERT INTO `book` VALUES ('5', 'book', 'Test2', 'Test2', '450', 'Test2', '534', '5', '1');
INSERT INTO `book` VALUES ('6', 'book', 'Test3', 'Test3', '478', 'Test3', '327', '5', '5');
INSERT INTO `book` VALUES ('7', 'book', 'Test4', 'Test4', '234', 'Test4', '567', '5', '5');
INSERT INTO `book` VALUES ('8', 'book', 'Test4', 'Test4', '234', 'Test4', '567', '5', '5');
INSERT INTO `book` VALUES ('9', 'book', 'Test4', 'Test4', '234', 'Test4', '567', '5', '5');
INSERT INTO `book` VALUES ('10', 'book', 'Test5', 'Test5', '346', 'Test5', '567', '2', '2');
INSERT INTO `book` VALUES ('11', 'book', 'Test6', 'Test6', '768', 'Test6', '543', '2', '2');

-- ----------------------------
-- Table structure for cd
-- ----------------------------
DROP TABLE IF EXISTS `cd`;
CREATE TABLE `cd` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(30) NOT NULL DEFAULT 'cd',
  `title` varchar(500) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `price` double NOT NULL,
  `author` varchar(200) NOT NULL,
  `playlenght` double NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cd
-- ----------------------------
INSERT INTO `cd` VALUES ('1', 'cd', 'CD №1', 'Описание sdfs CD1', '315', 'Автор CD1', '58', '4', '2');
INSERT INTO `cd` VALUES ('3', 'cd', 'CD №2', 'Описание ', '122', 'Автор ', '64', '5', '5');
INSERT INTO `cd` VALUES ('4', 'cd', 'CD №3', 'Описание ', '234', 'Автор ', '61', '4', '4');

-- ----------------------------
-- Table structure for menu
-- ----------------------------
DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `route` varchar(255) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `data` blob,
  PRIMARY KEY (`id`),
  KEY `parent` (`parent`),
  CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `menu` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of menu
-- ----------------------------

-- ----------------------------
-- Table structure for migration
-- ----------------------------
DROP TABLE IF EXISTS `migration`;
CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of migration
-- ----------------------------
INSERT INTO `migration` VALUES ('m000000_000000_base', '1518705612');
INSERT INTO `migration` VALUES ('m140506_102106_rbac_init', '1518705622');
INSERT INTO `migration` VALUES ('m140602_111327_create_menu_table', '1519141264');
INSERT INTO `migration` VALUES ('m160312_050000_create_user', '1519143434');
INSERT INTO `migration` VALUES ('m180216_144631_blameable', '1519231991');
INSERT INTO `migration` VALUES ('m180219_092903_user', '1519036807');

-- ----------------------------
-- Table structure for m_user
-- ----------------------------
DROP TABLE IF EXISTS `m_user`;
CREATE TABLE `m_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime NOT NULL,
  `lastname` varchar(200) DEFAULT NULL,
  `firstname` varchar(200) DEFAULT NULL,
  `middlename` varchar(200) DEFAULT NULL,
  `login` varchar(200) NOT NULL,
  `passwhash` varchar(500) NOT NULL,
  `birthday` date DEFAULT NULL,
  `email` varchar(200) NOT NULL,
  `emailtoken` varchar(200) DEFAULT NULL,
  `isactive` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of m_user
-- ----------------------------
INSERT INTO `m_user` VALUES ('15', '2018-02-19 19:05:57', 'Admin', 'Admin', 'Admin', 'admin', '$2y$13$tNArf2w22ePP9GNVRuMYU.GIDUURKPZs.HVlxNzltaKhRRN8r95Gu', '1982-10-10', 'admin@aaaa.aa', '9a49f8b3f59cb73e1d1d981f7cec7b96', '1');
INSERT INTO `m_user` VALUES ('16', '2018-02-19 19:22:17', 'Reader', 'Reader', 'Reader', 'reader', '$2y$13$s1Hygr1q54SfSnCQsAnFcuunOrRFhzxfMvHp0PMrvpwbJuhO6eHOa', '1983-11-15', 'reader@aaaa.aa', null, '1');
INSERT INTO `m_user` VALUES ('17', '2018-02-20 11:48:02', 'BookReader', 'BookReader', 'BookReader', 'bookreader', '$2y$13$8bPsANp1hCQoLqhGewQ.GOO1rD2/E6PS/bq3YuXQkUnYHrUMaLIoG', '1984-10-15', 'bookreader@aaaa.aa', null, '1');
INSERT INTO `m_user` VALUES ('18', '2018-02-20 16:15:13', 'Author', 'Author', 'Author', 'author', '$2y$13$RAN1BWYJlfd4mGUSRxhCOeTr7rZzUL4E9j4IfvtszIPEXnmtsITOG', '1985-09-15', 'author@aaaa.aa', null, '1');
INSERT INTO `m_user` VALUES ('19', '2018-02-20 16:16:42', 'Editor', 'Editor', 'Editor', 'editor', '$2y$13$/jsfHd/t0ZxpcN3j6GSFk.yd9tcxRTF8OmE4SnztxwPrVS7cjCdgO', '1983-10-12', 'editor@aaaa.aa', null, '1');

-- ----------------------------
-- Table structure for product
-- ----------------------------
DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(30) NOT NULL DEFAULT 'product',
  `title` varchar(500) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `price` double NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of product
-- ----------------------------
INSERT INTO `product` VALUES ('1', 'product', 'Товар №1', 'Описание товара №1', '114', '4', '4');
INSERT INTO `product` VALUES ('21', 'product', 'Товар sdf №2', 'Описание товара ', '123', '4', '2');
INSERT INTO `product` VALUES ('22', 'product', 'Товар №3', 'Описание товара ', '123', '4', '4');
INSERT INTO `product` VALUES ('24', 'product', 'Товар №5', 'Описание товара ', '123', '5', '5');
INSERT INTO `product` VALUES ('25', 'product', 'Товар №6', 'Описание товара ', '123', '5', '5');
INSERT INTO `product` VALUES ('26', 'product', 'Товар №7', 'Описание товара ', '123', '5', '5');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'u_reader', '-stm80b5BJOHsExUkr1c7yrkPe_Cqi_T', '$2y$13$T2z3cl9dEPPyD54be/8cGuonVV0CRn1UTuUHFhGXkcIeanuRNGtb6', null, 'u_reader@aaaa.aa', '10', '1519145824', '1519145824');
INSERT INTO `user` VALUES ('2', 'u_admin', 'D9wHr5Q5VCMrm5gzTPa8mZi409mXWrxw', '$2y$13$FOyPLdFyWnT0SxkZV8DUL.OKmTKXWkeFd7c8Fk.2ynLOAG2ojfeGK', '4w53w9yT4KkVbRmGmffeJnLeibgOZ41d_1519216463', 'u_admin@aaaa.aa', '10', '1519215802', '1519216463');
INSERT INTO `user` VALUES ('3', 'u_book_reader', '5XyA1oQKmp4rqxdv33GiHCq8ySTMK8Sc', '$2y$13$TsaQqcBB5JduOi5F5zBDXOiUE7T55U50bNaPwnX5MvUA0sBaxy1b2', null, 'u_book_reader@aaaa.aa', '10', '1519225602', '1519225602');
INSERT INTO `user` VALUES ('4', 'u_author', 'hFRqn9MzJQj-UmdNfvO-EEdNRHh0P4Cw', '$2y$13$jDl.jA2Qb0zlUF5L7gvtxOu/SEJpbdaczDdT7pzkmFSf2JPYceaOi', null, 'u_author@aaaa.aa', '10', '1519226794', '1519226794');
INSERT INTO `user` VALUES ('5', 'u_editor', 'AQ6NiE0ctdSRUSX5V_qUkkcBRF-EGfJ1', '$2y$13$fRWGmme8AEIxxbnqrduKFuDTGX0E2sHZt8J4v.D41rwz.4JcZTdWK', null, 'u_editor@aaaa.aa', '10', '1519226943', '1519226943');
INSERT INTO `user` VALUES ('6', 'u_book_operator', 'sf8CbfU-9WBtdnw0mjBau0uzKKIRHd75', '$2y$13$1QWgUNjUnvyW6NkLLrcGveeE6k4MhNUayOe/ujSg2ooZR6tCTmpMa', null, 'u_book_operator@aaaa.aa', '10', '1519300759', '1519300759');
INSERT INTO `user` VALUES ('7', 'u_book_manager', 'tlqTe9txsd6-KTceC7o0BclSIknhWWbl', '$2y$13$w28DyoUa0Mk7dl2Iwd2S8.sZnecs9GFEHwT7DYR8tRGBjCZhU6/Su', null, 'u_book_manager@aaaa.aa', '10', '1519300795', '1519300795');
