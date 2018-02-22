/*
MySQL Data Transfer

Source Server         : MySQL
Source Server Version : 50631
Source Host           : 127.0.0.1:3306
Source Database       : yii-study

Target Server Type    : MYSQL
Target Server Version : 50631
File Encoding         : 65001

Date: 2018-02-22 19:21:10
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
INSERT INTO `auth_assignment` VALUES ('book_reader', '3', '1518708118');
INSERT INTO `auth_assignment` VALUES ('books_operator', '6', '1519301679');
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
INSERT INTO `auth_item` VALUES ('/books/*', '2', null, null, null, '1519225335', '1519225335');
INSERT INTO `auth_item` VALUES ('/books/create', '2', null, null, null, '1519225335', '1519225335');
INSERT INTO `auth_item` VALUES ('/books/delete', '2', null, null, null, '1519225335', '1519225335');
INSERT INTO `auth_item` VALUES ('/books/index', '2', null, null, null, '1519225335', '1519225335');
INSERT INTO `auth_item` VALUES ('/books/update', '2', null, null, null, '1519225335', '1519225335');
INSERT INTO `auth_item` VALUES ('/books/view', '2', null, null, null, '1519225335', '1519225335');
INSERT INTO `auth_item` VALUES ('/cds/*', '2', null, null, null, '1519225335', '1519225335');
INSERT INTO `auth_item` VALUES ('/cds/create', '2', null, null, null, '1519225335', '1519225335');
INSERT INTO `auth_item` VALUES ('/cds/delete', '2', null, null, null, '1519225335', '1519225335');
INSERT INTO `auth_item` VALUES ('/cds/index', '2', null, null, null, '1519225335', '1519225335');
INSERT INTO `auth_item` VALUES ('/cds/update', '2', null, null, null, '1519225335', '1519225335');
INSERT INTO `auth_item` VALUES ('/cds/view', '2', null, null, null, '1519225335', '1519225335');
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
INSERT INTO `auth_item` VALUES ('/products/create', '2', null, null, null, '1519228507', '1519228507');
INSERT INTO `auth_item` VALUES ('/products/delete', '2', null, null, null, '1519295444', '1519295444');
INSERT INTO `auth_item` VALUES ('/products/index', '2', null, null, null, '1519295414', '1519295414');
INSERT INTO `auth_item` VALUES ('/products/update', '2', null, null, null, '1519295401', '1519295401');
INSERT INTO `auth_item` VALUES ('/products/view', '2', null, null, null, '1519295432', '1519295432');
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
INSERT INTO `auth_item` VALUES ('admin', '1', 'Пользователи с этой ролью могут всё', null, null, '1518708117', '1519307554');
INSERT INTO `auth_item` VALUES ('author', '1', 'Пользователи с этой ролью могут: \r\nВидеть записи всех категорий (Permission view_all );\r\nCоздавать новые записи во всех категориях (Permission create_all); \r\nРедактировать только свои записи (Permission own_update );\r\nУдалять только свои записи (Permission own_delete);', null, null, '1518708117', '1519314632');
INSERT INTO `auth_item` VALUES ('book_manager', '1', 'Пользователи с этой ролью могут: просматривать записи в категории Books + создавать и редактировать записи в категории Books (т.е. все что у book_operator) + удалять записи в категории  Books ', null, null, '1519299925', '1519300398');
INSERT INTO `auth_item` VALUES ('book_reader', '1', 'Пользователи с этой ролью могут: читать записи из категории Книги', null, null, '1518708117', '1519300430');
INSERT INTO `auth_item` VALUES ('books_operator', '1', 'Пользователи с этой ролью могут просматривать записи в категории Books (т.е. все что у book_reader) + создавать и редактировать записи в категории Books', null, null, '1519299805', '1519314711');
INSERT INTO `auth_item` VALUES ('create_all', '2', 'Разрешено создавать записи товаров во всех категориях', null, null, '1519314418', '1519314418');
INSERT INTO `auth_item` VALUES ('create_update_books', '2', 'Разрешено создавать и редактировать записи в категории Книги', null, null, '1518708118', '1519299062');
INSERT INTO `auth_item` VALUES ('create_update_cds', '2', 'Разрешено создавать и редактировать записи в категории CDs', null, null, '1519228290', '1519297072');
INSERT INTO `auth_item` VALUES ('create_update_products', '2', 'Разрешено создавать и редактировать записи в категории Products', null, null, '1519228360', '1519307604');
INSERT INTO `auth_item` VALUES ('delete_all', '2', 'Разрешено удалять записи товаров во всех категориях', null, null, '1519296451', '1519314557');
INSERT INTO `auth_item` VALUES ('delete_books', '2', 'Разрешено удалять записи в категории Книги', null, null, '1518708118', '1519298985');
INSERT INTO `auth_item` VALUES ('delete_cds', '2', 'Разрешено удалять записи в категории CDs', null, null, '1519294289', '1519296995');
INSERT INTO `auth_item` VALUES ('delete_products', '2', 'Разрешено удалять записи в категории Products', null, null, '1519295693', '1519302325');
INSERT INTO `auth_item` VALUES ('editor', '1', 'Пользователи с этой ролью могут: создавать и редактировать записи во всех категориях', null, null, '1518708117', '1519305486');
INSERT INTO `auth_item` VALUES ('own_delete', '2', 'Разрешено удалять только свои записи', 'AuthorRule', null, '1518708118', '1519314518');
INSERT INTO `auth_item` VALUES ('own_update', '2', 'Разрешено редактировать только свои записи', 'AuthorRule', null, '1518708118', '1519314496');
INSERT INTO `auth_item` VALUES ('own_view', '2', 'Разрешено просматривать только свои записи', null, null, '1518708118', '1519307965');
INSERT INTO `auth_item` VALUES ('reader', '1', 'Пользователи с этой ролью могут: просматривать записи во всех категориях', null, null, '1518708117', '1519302862');
INSERT INTO `auth_item` VALUES ('update_all', '2', 'Разрешено редактировать записи о товарах во всех категориях', null, null, '1518708118', '1519314350');
INSERT INTO `auth_item` VALUES ('view_all', '2', 'Разрешено просматривать записи во всех категориях', null, null, '1519297170', '1519307687');
INSERT INTO `auth_item` VALUES ('view_books', '2', 'Разрешено просматривать записи в категории Книги', null, null, '1518708118', '1519302106');
INSERT INTO `auth_item` VALUES ('view_cds', '2', 'Разрешено просматривать записи в категории CDs', null, null, '1519296808', '1519302085');
INSERT INTO `auth_item` VALUES ('view_products', '2', 'Разрешено просматривать записи в категории Products', null, null, '1519296888', '1519297115');

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
INSERT INTO `auth_item_child` VALUES ('create_all', '/books/create');
INSERT INTO `auth_item_child` VALUES ('create_update_books', '/books/create');
INSERT INTO `auth_item_child` VALUES ('delete_all', '/books/delete');
INSERT INTO `auth_item_child` VALUES ('delete_books', '/books/delete');
INSERT INTO `auth_item_child` VALUES ('create_update_books', '/books/index');
INSERT INTO `auth_item_child` VALUES ('view_all', '/books/index');
INSERT INTO `auth_item_child` VALUES ('view_books', '/books/index');
INSERT INTO `auth_item_child` VALUES ('create_update_books', '/books/update');
INSERT INTO `auth_item_child` VALUES ('update_all', '/books/update');
INSERT INTO `auth_item_child` VALUES ('create_update_books', '/books/view');
INSERT INTO `auth_item_child` VALUES ('view_all', '/books/view');
INSERT INTO `auth_item_child` VALUES ('view_books', '/books/view');
INSERT INTO `auth_item_child` VALUES ('create_all', '/cds/create');
INSERT INTO `auth_item_child` VALUES ('create_update_cds', '/cds/create');
INSERT INTO `auth_item_child` VALUES ('delete_all', '/cds/delete');
INSERT INTO `auth_item_child` VALUES ('delete_cds', '/cds/delete');
INSERT INTO `auth_item_child` VALUES ('create_update_cds', '/cds/index');
INSERT INTO `auth_item_child` VALUES ('view_all', '/cds/index');
INSERT INTO `auth_item_child` VALUES ('view_cds', '/cds/index');
INSERT INTO `auth_item_child` VALUES ('create_update_cds', '/cds/update');
INSERT INTO `auth_item_child` VALUES ('update_all', '/cds/update');
INSERT INTO `auth_item_child` VALUES ('create_update_cds', '/cds/view');
INSERT INTO `auth_item_child` VALUES ('view_all', '/cds/view');
INSERT INTO `auth_item_child` VALUES ('view_cds', '/cds/view');
INSERT INTO `auth_item_child` VALUES ('create_all', '/products/create');
INSERT INTO `auth_item_child` VALUES ('create_update_products', '/products/create');
INSERT INTO `auth_item_child` VALUES ('delete_all', '/products/delete');
INSERT INTO `auth_item_child` VALUES ('delete_products', '/products/delete');
INSERT INTO `auth_item_child` VALUES ('create_update_products', '/products/index');
INSERT INTO `auth_item_child` VALUES ('view_all', '/products/index');
INSERT INTO `auth_item_child` VALUES ('view_products', '/products/index');
INSERT INTO `auth_item_child` VALUES ('create_update_products', '/products/update');
INSERT INTO `auth_item_child` VALUES ('update_all', '/products/update');
INSERT INTO `auth_item_child` VALUES ('view_all', '/products/view');
INSERT INTO `auth_item_child` VALUES ('view_products', '/products/view');
INSERT INTO `auth_item_child` VALUES ('books_operator', 'book_reader');
INSERT INTO `auth_item_child` VALUES ('book_manager', 'books_operator');
INSERT INTO `auth_item_child` VALUES ('author', 'create_all');
INSERT INTO `auth_item_child` VALUES ('books_operator', 'create_update_books');
INSERT INTO `auth_item_child` VALUES ('own_delete', 'delete_all');
INSERT INTO `auth_item_child` VALUES ('book_manager', 'delete_books');
INSERT INTO `auth_item_child` VALUES ('author', 'own_delete');
INSERT INTO `auth_item_child` VALUES ('author', 'own_update');
INSERT INTO `auth_item_child` VALUES ('editor', 'update_all');
INSERT INTO `auth_item_child` VALUES ('own_update', 'update_all');
INSERT INTO `auth_item_child` VALUES ('author', 'view_all');
INSERT INTO `auth_item_child` VALUES ('own_view', 'view_all');
INSERT INTO `auth_item_child` VALUES ('reader', 'view_all');
INSERT INTO `auth_item_child` VALUES ('book_reader', 'view_books');

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
-- Table structure for books
-- ----------------------------
DROP TABLE IF EXISTS `books`;
CREATE TABLE `books` (
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of books
-- ----------------------------
INSERT INTO `books` VALUES ('1', 'book', 'Книга №1', 'Описание книги №1', '123210032433', 'Автор книги №1', '112', '4', '4');
INSERT INTO `books` VALUES ('2', 'book', 'Книга №2', 'Описание книги №2', '123210032433', 'Автор книги №2', '222', '4', '4');
INSERT INTO `books` VALUES ('3', 'book', 'Книга №3', 'Описание книги №2', '123210032433', 'Автор книги №2', '333444', '4', '4');
INSERT INTO `books` VALUES ('5', 'book', 'Test2', 'Test2', '450', 'Test2', '534', '5', '1');
INSERT INTO `books` VALUES ('6', 'book', 'Test3', 'Test3', '478', 'Test3', '327', '5', '5');
INSERT INTO `books` VALUES ('7', 'book', 'Test4', 'Test4', '234', 'Test4', '567', '5', '5');
INSERT INTO `books` VALUES ('8', 'book', 'Test4', 'Test4', '234', 'Test4', '567', '5', '5');
INSERT INTO `books` VALUES ('9', 'book', 'Test4', 'Test4', '234', 'Test4', '567', '5', '5');
INSERT INTO `books` VALUES ('10', 'book', 'Test5', 'Test5', '346', 'Test5', '567', '2', '2');
INSERT INTO `books` VALUES ('11', 'book', 'Test6', 'Test6', '768', 'Test6', '543', '2', '2');

-- ----------------------------
-- Table structure for cds
-- ----------------------------
DROP TABLE IF EXISTS `cds`;
CREATE TABLE `cds` (
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
-- Records of cds
-- ----------------------------
INSERT INTO `cds` VALUES ('1', 'cd', 'CD №1', 'Описание CD1', '315', 'Автор CD1', '58', '4', '4');
INSERT INTO `cds` VALUES ('3', 'cd', 'CD №2', 'Описание ', '122', 'Автор ', '64', '5', '5');
INSERT INTO `cds` VALUES ('4', 'cd', 'CD №3', 'Описание ', '234', 'Автор ', '61', '4', '4');

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
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
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
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES ('1', 'product', 'Товар №1', 'Описание товара №1', '114', '4', '4');
INSERT INTO `products` VALUES ('21', 'product', 'Товар №2', 'Описание товара ', '123', '4', '4');
INSERT INTO `products` VALUES ('22', 'product', 'Товар №3', 'Описание товара ', '123', '4', '4');
INSERT INTO `products` VALUES ('24', 'product', 'Товар №5', 'Описание товара ', '123', '5', '5');
INSERT INTO `products` VALUES ('25', 'product', 'Товар №6', 'Описание товара ', '123', '5', '5');
INSERT INTO `products` VALUES ('26', 'product', 'Товар №7', 'Описание товара ', '123', '5', '5');

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
