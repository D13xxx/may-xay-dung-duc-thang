/*
 Navicat Premium Data Transfer

 Source Server         : 127.0.0.1
 Source Server Type    : MySQL
 Source Server Version : 100316
 Source Host           : localhost:3306
 Source Schema         : bao-hiem

 Target Server Type    : MySQL
 Target Server Version : 100316
 File Encoding         : 65001

 Date: 04/09/2019 17:48:11
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for auth_assignment
-- ----------------------------
DROP TABLE IF EXISTS `auth_assignment`;
CREATE TABLE `auth_assignment`  (
  `item_name` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`item_name`, `user_id`) USING BTREE,
  INDEX `idx-auth_assignment-user_id`(`user_id`) USING BTREE,
  CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of auth_assignment
-- ----------------------------
INSERT INTO `auth_assignment` VALUES ('Admin', '1', 1567591654);

-- ----------------------------
-- Table structure for auth_item
-- ----------------------------
DROP TABLE IF EXISTS `auth_item`;
CREATE TABLE `auth_item`  (
  `name` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `rule_name` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `data` blob NULL,
  `created_at` int(11) NULL DEFAULT NULL,
  `updated_at` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`name`) USING BTREE,
  INDEX `rule_name`(`rule_name`) USING BTREE,
  INDEX `idx-auth_item-type`(`type`) USING BTREE,
  CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of auth_item
-- ----------------------------
INSERT INTO `auth_item` VALUES ('/*', 2, NULL, NULL, NULL, 1567591584, 1567591584);
INSERT INTO `auth_item` VALUES ('/debug/*', 2, NULL, NULL, NULL, 1567591584, 1567591584);
INSERT INTO `auth_item` VALUES ('/debug/default/*', 2, NULL, NULL, NULL, 1567591584, 1567591584);
INSERT INTO `auth_item` VALUES ('/debug/default/db-explain', 2, NULL, NULL, NULL, 1567591584, 1567591584);
INSERT INTO `auth_item` VALUES ('/debug/default/download-mail', 2, NULL, NULL, NULL, 1567591584, 1567591584);
INSERT INTO `auth_item` VALUES ('/debug/default/index', 2, NULL, NULL, NULL, 1567591584, 1567591584);
INSERT INTO `auth_item` VALUES ('/debug/default/toolbar', 2, NULL, NULL, NULL, 1567591584, 1567591584);
INSERT INTO `auth_item` VALUES ('/debug/default/view', 2, NULL, NULL, NULL, 1567591584, 1567591584);
INSERT INTO `auth_item` VALUES ('/debug/user/*', 2, NULL, NULL, NULL, 1567591584, 1567591584);
INSERT INTO `auth_item` VALUES ('/debug/user/reset-identity', 2, NULL, NULL, NULL, 1567591584, 1567591584);
INSERT INTO `auth_item` VALUES ('/debug/user/set-identity', 2, NULL, NULL, NULL, 1567591584, 1567591584);
INSERT INTO `auth_item` VALUES ('/gii/*', 2, NULL, NULL, NULL, 1567591584, 1567591584);
INSERT INTO `auth_item` VALUES ('/gii/default/*', 2, NULL, NULL, NULL, 1567591584, 1567591584);
INSERT INTO `auth_item` VALUES ('/gii/default/action', 2, NULL, NULL, NULL, 1567591584, 1567591584);
INSERT INTO `auth_item` VALUES ('/gii/default/diff', 2, NULL, NULL, NULL, 1567591584, 1567591584);
INSERT INTO `auth_item` VALUES ('/gii/default/index', 2, NULL, NULL, NULL, 1567591584, 1567591584);
INSERT INTO `auth_item` VALUES ('/gii/default/preview', 2, NULL, NULL, NULL, 1567591584, 1567591584);
INSERT INTO `auth_item` VALUES ('/gii/default/view', 2, NULL, NULL, NULL, 1567591584, 1567591584);
INSERT INTO `auth_item` VALUES ('/info-profile/*', 2, NULL, NULL, NULL, 1567591584, 1567591584);
INSERT INTO `auth_item` VALUES ('/info-profile/update', 2, NULL, NULL, NULL, 1567591584, 1567591584);
INSERT INTO `auth_item` VALUES ('/rbac/*', 2, NULL, NULL, NULL, 1567591584, 1567591584);
INSERT INTO `auth_item` VALUES ('/rbac/assignment/*', 2, NULL, NULL, NULL, 1567591577, 1567591577);
INSERT INTO `auth_item` VALUES ('/rbac/assignment/assign', 2, NULL, NULL, NULL, 1567591577, 1567591577);
INSERT INTO `auth_item` VALUES ('/rbac/assignment/index', 2, NULL, NULL, NULL, 1567591583, 1567591583);
INSERT INTO `auth_item` VALUES ('/rbac/assignment/remove', 2, NULL, NULL, NULL, 1567591577, 1567591577);
INSERT INTO `auth_item` VALUES ('/rbac/assignment/view', 2, NULL, NULL, NULL, 1567591577, 1567591577);
INSERT INTO `auth_item` VALUES ('/rbac/permission/*', 2, NULL, NULL, NULL, 1567591583, 1567591583);
INSERT INTO `auth_item` VALUES ('/rbac/permission/assign', 2, NULL, NULL, NULL, 1567591583, 1567591583);
INSERT INTO `auth_item` VALUES ('/rbac/permission/create', 2, NULL, NULL, NULL, 1567591577, 1567591577);
INSERT INTO `auth_item` VALUES ('/rbac/permission/delete', 2, NULL, NULL, NULL, 1567591583, 1567591583);
INSERT INTO `auth_item` VALUES ('/rbac/permission/index', 2, NULL, NULL, NULL, 1567591577, 1567591577);
INSERT INTO `auth_item` VALUES ('/rbac/permission/remove', 2, NULL, NULL, NULL, 1567591583, 1567591583);
INSERT INTO `auth_item` VALUES ('/rbac/permission/update', 2, NULL, NULL, NULL, 1567591583, 1567591583);
INSERT INTO `auth_item` VALUES ('/rbac/permission/view', 2, NULL, NULL, NULL, 1567591577, 1567591577);
INSERT INTO `auth_item` VALUES ('/rbac/role/*', 2, NULL, NULL, NULL, 1567591583, 1567591583);
INSERT INTO `auth_item` VALUES ('/rbac/role/assign', 2, NULL, NULL, NULL, 1567591583, 1567591583);
INSERT INTO `auth_item` VALUES ('/rbac/role/create', 2, NULL, NULL, NULL, 1567591583, 1567591583);
INSERT INTO `auth_item` VALUES ('/rbac/role/delete', 2, NULL, NULL, NULL, 1567591583, 1567591583);
INSERT INTO `auth_item` VALUES ('/rbac/role/index', 2, NULL, NULL, NULL, 1567591583, 1567591583);
INSERT INTO `auth_item` VALUES ('/rbac/role/remove', 2, NULL, NULL, NULL, 1567591583, 1567591583);
INSERT INTO `auth_item` VALUES ('/rbac/role/update', 2, NULL, NULL, NULL, 1567591583, 1567591583);
INSERT INTO `auth_item` VALUES ('/rbac/role/view', 2, NULL, NULL, NULL, 1567591583, 1567591583);
INSERT INTO `auth_item` VALUES ('/rbac/route/*', 2, NULL, NULL, NULL, 1567591583, 1567591583);
INSERT INTO `auth_item` VALUES ('/rbac/route/assign', 2, NULL, NULL, NULL, 1567591583, 1567591583);
INSERT INTO `auth_item` VALUES ('/rbac/route/index', 2, NULL, NULL, NULL, 1567591583, 1567591583);
INSERT INTO `auth_item` VALUES ('/rbac/route/refresh', 2, NULL, NULL, NULL, 1567591583, 1567591583);
INSERT INTO `auth_item` VALUES ('/rbac/route/remove', 2, NULL, NULL, NULL, 1567591583, 1567591583);
INSERT INTO `auth_item` VALUES ('/rbac/rule/*', 2, NULL, NULL, NULL, 1567591584, 1567591584);
INSERT INTO `auth_item` VALUES ('/rbac/rule/create', 2, NULL, NULL, NULL, 1567591583, 1567591583);
INSERT INTO `auth_item` VALUES ('/rbac/rule/delete', 2, NULL, NULL, NULL, 1567591584, 1567591584);
INSERT INTO `auth_item` VALUES ('/rbac/rule/index', 2, NULL, NULL, NULL, 1567591583, 1567591583);
INSERT INTO `auth_item` VALUES ('/rbac/rule/update', 2, NULL, NULL, NULL, 1567591584, 1567591584);
INSERT INTO `auth_item` VALUES ('/rbac/rule/view', 2, NULL, NULL, NULL, 1567591583, 1567591583);
INSERT INTO `auth_item` VALUES ('/site/*', 2, NULL, NULL, NULL, 1567591584, 1567591584);
INSERT INTO `auth_item` VALUES ('/site/error', 2, NULL, NULL, NULL, 1567591584, 1567591584);
INSERT INTO `auth_item` VALUES ('/site/index', 2, NULL, NULL, NULL, 1567591584, 1567591584);
INSERT INTO `auth_item` VALUES ('/site/login', 2, NULL, NULL, NULL, 1567591584, 1567591584);
INSERT INTO `auth_item` VALUES ('/site/logout', 2, NULL, NULL, NULL, 1567591584, 1567591584);
INSERT INTO `auth_item` VALUES ('/site/signup', 2, NULL, NULL, NULL, 1567591584, 1567591584);
INSERT INTO `auth_item` VALUES ('Admin', 2, NULL, NULL, NULL, 1567591633, 1567591633);

-- ----------------------------
-- Table structure for auth_item_child
-- ----------------------------
DROP TABLE IF EXISTS `auth_item_child`;
CREATE TABLE `auth_item_child`  (
  `parent` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`, `child`) USING BTREE,
  INDEX `child`(`child`) USING BTREE,
  CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of auth_item_child
-- ----------------------------
INSERT INTO `auth_item_child` VALUES ('Admin', '/*');
INSERT INTO `auth_item_child` VALUES ('Admin', '/debug/*');
INSERT INTO `auth_item_child` VALUES ('Admin', '/debug/default/*');
INSERT INTO `auth_item_child` VALUES ('Admin', '/debug/default/db-explain');
INSERT INTO `auth_item_child` VALUES ('Admin', '/debug/default/download-mail');
INSERT INTO `auth_item_child` VALUES ('Admin', '/debug/default/index');
INSERT INTO `auth_item_child` VALUES ('Admin', '/debug/default/toolbar');
INSERT INTO `auth_item_child` VALUES ('Admin', '/debug/default/view');
INSERT INTO `auth_item_child` VALUES ('Admin', '/debug/user/*');
INSERT INTO `auth_item_child` VALUES ('Admin', '/debug/user/reset-identity');
INSERT INTO `auth_item_child` VALUES ('Admin', '/debug/user/set-identity');
INSERT INTO `auth_item_child` VALUES ('Admin', '/gii/*');
INSERT INTO `auth_item_child` VALUES ('Admin', '/gii/default/*');
INSERT INTO `auth_item_child` VALUES ('Admin', '/gii/default/action');
INSERT INTO `auth_item_child` VALUES ('Admin', '/gii/default/diff');
INSERT INTO `auth_item_child` VALUES ('Admin', '/gii/default/index');
INSERT INTO `auth_item_child` VALUES ('Admin', '/gii/default/preview');
INSERT INTO `auth_item_child` VALUES ('Admin', '/gii/default/view');
INSERT INTO `auth_item_child` VALUES ('Admin', '/info-profile/*');
INSERT INTO `auth_item_child` VALUES ('Admin', '/info-profile/update');
INSERT INTO `auth_item_child` VALUES ('Admin', '/rbac/*');
INSERT INTO `auth_item_child` VALUES ('Admin', '/rbac/assignment/*');
INSERT INTO `auth_item_child` VALUES ('Admin', '/rbac/assignment/assign');
INSERT INTO `auth_item_child` VALUES ('Admin', '/rbac/assignment/index');
INSERT INTO `auth_item_child` VALUES ('Admin', '/rbac/assignment/remove');
INSERT INTO `auth_item_child` VALUES ('Admin', '/rbac/assignment/view');
INSERT INTO `auth_item_child` VALUES ('Admin', '/rbac/permission/*');
INSERT INTO `auth_item_child` VALUES ('Admin', '/rbac/permission/assign');
INSERT INTO `auth_item_child` VALUES ('Admin', '/rbac/permission/create');
INSERT INTO `auth_item_child` VALUES ('Admin', '/rbac/permission/delete');
INSERT INTO `auth_item_child` VALUES ('Admin', '/rbac/permission/index');
INSERT INTO `auth_item_child` VALUES ('Admin', '/rbac/permission/remove');
INSERT INTO `auth_item_child` VALUES ('Admin', '/rbac/permission/update');
INSERT INTO `auth_item_child` VALUES ('Admin', '/rbac/permission/view');
INSERT INTO `auth_item_child` VALUES ('Admin', '/rbac/role/*');
INSERT INTO `auth_item_child` VALUES ('Admin', '/rbac/role/assign');
INSERT INTO `auth_item_child` VALUES ('Admin', '/rbac/role/create');
INSERT INTO `auth_item_child` VALUES ('Admin', '/rbac/role/delete');
INSERT INTO `auth_item_child` VALUES ('Admin', '/rbac/role/index');
INSERT INTO `auth_item_child` VALUES ('Admin', '/rbac/role/remove');
INSERT INTO `auth_item_child` VALUES ('Admin', '/rbac/role/update');
INSERT INTO `auth_item_child` VALUES ('Admin', '/rbac/role/view');
INSERT INTO `auth_item_child` VALUES ('Admin', '/rbac/route/*');
INSERT INTO `auth_item_child` VALUES ('Admin', '/rbac/route/assign');
INSERT INTO `auth_item_child` VALUES ('Admin', '/rbac/route/index');
INSERT INTO `auth_item_child` VALUES ('Admin', '/rbac/route/refresh');
INSERT INTO `auth_item_child` VALUES ('Admin', '/rbac/route/remove');
INSERT INTO `auth_item_child` VALUES ('Admin', '/rbac/rule/*');
INSERT INTO `auth_item_child` VALUES ('Admin', '/rbac/rule/create');
INSERT INTO `auth_item_child` VALUES ('Admin', '/rbac/rule/delete');
INSERT INTO `auth_item_child` VALUES ('Admin', '/rbac/rule/index');
INSERT INTO `auth_item_child` VALUES ('Admin', '/rbac/rule/update');
INSERT INTO `auth_item_child` VALUES ('Admin', '/rbac/rule/view');
INSERT INTO `auth_item_child` VALUES ('Admin', '/site/*');
INSERT INTO `auth_item_child` VALUES ('Admin', '/site/error');
INSERT INTO `auth_item_child` VALUES ('Admin', '/site/index');
INSERT INTO `auth_item_child` VALUES ('Admin', '/site/login');
INSERT INTO `auth_item_child` VALUES ('Admin', '/site/logout');
INSERT INTO `auth_item_child` VALUES ('Admin', '/site/signup');

-- ----------------------------
-- Table structure for auth_rule
-- ----------------------------
DROP TABLE IF EXISTS `auth_rule`;
CREATE TABLE `auth_rule`  (
  `name` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `data` blob NULL,
  `created_at` int(11) NULL DEFAULT NULL,
  `updated_at` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`name`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for info_profile
-- ----------------------------
DROP TABLE IF EXISTS `info_profile`;
CREATE TABLE `info_profile`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `birth_day` int(11) NULL DEFAULT NULL,
  `cell_phone` int(10) NULL DEFAULT NULL,
  `city` int(11) NULL DEFAULT NULL,
  `district` int(11) NULL DEFAULT NULL,
  `ward` int(11) NULL DEFAULT NULL,
  `avatar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `gender` int(11) NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of info_profile
-- ----------------------------
INSERT INTO `info_profile` VALUES (1, 'Ngô Văn Điệp', 0, 987001396, 0, 0, 0, '', 1, 1);
INSERT INTO `info_profile` VALUES (5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6);
INSERT INTO `info_profile` VALUES (8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 9);

-- ----------------------------
-- Table structure for info_profile_fe
-- ----------------------------
DROP TABLE IF EXISTS `info_profile_fe`;
CREATE TABLE `info_profile_fe`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `birth_day` int(11) NULL DEFAULT NULL,
  `cell_phone` int(10) NULL DEFAULT NULL,
  `city` int(11) NULL DEFAULT NULL,
  `district` int(11) NULL DEFAULT NULL,
  `ward` int(11) NULL DEFAULT NULL,
  `avatar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `gender` int(11) NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for migration
-- ----------------------------
DROP TABLE IF EXISTS `migration`;
CREATE TABLE `migration`  (
  `version` varchar(180) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `apply_time` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`version`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migration
-- ----------------------------
INSERT INTO `migration` VALUES ('m000000_000000_base', 1567562899);
INSERT INTO `migration` VALUES ('m130524_201442_init', 1567562901);
INSERT INTO `migration` VALUES ('m140506_102106_rbac_init', 1567585375);
INSERT INTO `migration` VALUES ('m170907_052038_rbac_add_index_on_auth_assignment_user_id', 1567585375);
INSERT INTO `migration` VALUES ('m180523_151638_rbac_updates_indexes_without_prefix', 1567585376);
INSERT INTO `migration` VALUES ('m190124_110200_add_verification_token_column_to_user_table', 1567562901);

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `username`(`username`) USING BTREE,
  UNIQUE INDEX `email`(`email`) USING BTREE,
  UNIQUE INDEX `password_reset_token`(`password_reset_token`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 'admin', 'VjCmZH8pvkNzZ64LHxH6QS_l2yL55vzW', '$2y$13$h0F7AHA7hIb0nBwEyooFjeyCwTz6ZAaIULjTZG4MJcPWpkqR2wih2', NULL, 'nvdiepse@gmail.com', 10, 1567563706, 1567563706, 'Efw9XlaSpN0hRZ-NQIeiYoP0yiW18H3b_1567563706');
INSERT INTO `user` VALUES (6, 'admin2', 'IFkS3WD2hnuZcv7WUsvJoBdwl-deuHli', '$2y$13$TLpZwhuF5a1em/3QkoQ/GO0c0SkmpHp6yzhytypE7JIaik.Eml726', NULL, 'admin2@gmail.com', 10, 1567580150, 1567580150, 'wDmfMXLOasbDTWZqGzxr9b1uBSWr69iU_1567580150');
INSERT INTO `user` VALUES (9, 'test2', 'cl1yScLT2w0ACW6s2EOzH0HsLA75KCqY', '$2y$13$TrC1h/I1l6D/QqD9F7ehx.2ZZM9k6AsdheqcCtust/VRM2jMGZjQW', NULL, 'testname2@gmail.com', 10, 1567580747, 1567580747, 'QShnbQGKHzXCm-YaOoDX0p7ywL-Alik2_1567580747');

-- ----------------------------
-- Table structure for user_fe
-- ----------------------------
DROP TABLE IF EXISTS `user_fe`;
CREATE TABLE `user_fe`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user_fe
-- ----------------------------
INSERT INTO `user_fe` VALUES (3, 'ngogiadiep', 's0FUARxfImSXBplW4WI-tYefY2tOekN1', '$2y$13$Kbze1vb/ILDYN7rG9Pjk1.ymti4vBszifgR8qk8.29thw0HDhDBge', 'zhdRdUYL_UH8Op_ZKLDv2APTCat26Aoc_1567584644', 'ngogiadiepit@gmail.com', 10, 1567584621, 1567584644, 'MpJ22RQf87pnGMJBDV82F3e4Qcw3q931_1567584621');
INSERT INTO `user_fe` VALUES (4, 'nvdiepse', 'hr8TRutmYuMrnyX8wdqnPTk7hGlQ1mQ3', '$2y$13$xGdOPcp93/49aPWZwiqHOuR.JFg1RQpYtWquSZPjc6PDkl3q.R4Jy', NULL, 'diepnv@hellomedia.vn', 9, 1567589946, 1567589946, 'yPSDI6X3P7Hd0o7EV4TG1vgjf2i_BJIg_1567589946');
INSERT INTO `user_fe` VALUES (5, 'nvdiepse', '3Wh6oE8eIgvRVpZk8_3PRkI4tG8mktN7', '$2y$13$U8fkuftli7gE2ZgGo16pfuJFHEbhl7LpivxRdBQWao1urQcTXGvVu', NULL, 'diepnv@hellomedia.vn', 9, 1567589994, 1567589994, 'z1ZU179rAMPZ-_kf7YHxouw4-uegtOD8_1567589994');
INSERT INTO `user_fe` VALUES (6, 'nvdiepse', 'jYasJXPYO5NtbkKWEYM-dbK4_XpJ_QQq', '$2y$13$/qC4OPRIkJejdG1uc8dOyu8Q0aPXNieg5gm8GRG64E9UsemiUkvTC', NULL, 'diepnv@hellomedia.vn', 9, 1567590048, 1567590048, 'Td12cFtGc_x9zTXMd6kxOizsG4K7OqX4_1567590048');
INSERT INTO `user_fe` VALUES (7, 'nvdiepse', 'oWjk5pPHcOC0ZOUOeTu1uQJHA3a_r_gb', '$2y$13$nQV/IfFbE7PlyreEHlrig.ZOgmZ3g/yt5Y/d0gGBFL3y6CnmFnSZa', NULL, 'diepnv@hellomedia.vn', 9, 1567590135, 1567590135, '0twTh2kTXvbdCohGJ639KFcgruxiD9it_1567590135');
INSERT INTO `user_fe` VALUES (8, 'nvdiepse', 'XlT_xWZOwWAm4Cn-AT2nJxhVjBS00TMj', '$2y$13$EyR9isjn/er1arOtPv2y4uR8tWgQ9.sSqeryLUmF5q5XYiEOo4WJi', NULL, 'diepnv@hellomedia.vn', 9, 1567590252, 1567590252, '0E-05QC7H5yW7piLepDMzVb6q5w3febF_1567590252');
INSERT INTO `user_fe` VALUES (9, 'nvdiepse', 'HgLE-UF4CoU-qF3pealGfkzeJkbkg--u', '$2y$13$dLx2gp6npkRDQrSlmALg9.jw8f2WgYbKqtJk2q8AY5Te22Ne2S0Qa', NULL, 'diepnv@hellomedia.vn', 9, 1567590271, 1567590271, 'az25Do5xcYqjoTzICREVCU1_EjkAc_QF_1567590271');
INSERT INTO `user_fe` VALUES (10, 'nvdiepse', '1H20Iry9INVcpmUqrRja1FFJ3X2kaZ1y', '$2y$13$ZHJv0nGyeTROeo4Z0RvdeO9oLRqT9UrH0D8poh..cONM2L83BDrW6', NULL, 'diepnv@hellomedia.vn', 9, 1567590308, 1567590308, '-05p4aL71AAuT_DVAKOUbV2bB8qhcC27_1567590308');
INSERT INTO `user_fe` VALUES (11, 'nvdiepse', 'v-YX1oKADnbe1Jjpofp00N4H5R5HT39h', '$2y$13$WJIdVTlt7R/Q37JADXBeTO91E7KQY3hgstmBBL5b.gk5C4FrMS4Jy', NULL, 'diepnv@hellomedia.vn', 9, 1567590530, 1567590530, 'isKTl6wd1Y3nLPmAhFZLEAHROxsGXvOV_1567590530');
INSERT INTO `user_fe` VALUES (12, 'nvdiepse', 'N3R-w2KtYJ3MnCSw6j-tST5vW9a1LeJH', '$2y$13$IF1LYrsyKwFEyG7rkYne8OqnavU4csAXS3Ef5UsMdwCbqhqCbFq4m', NULL, 'diepnv@hellomedia.vn', 9, 1567590682, 1567590682, 'j2NpXY3qiX5GPO5LO6nkbjHEyvddrJZw_1567590682');
INSERT INTO `user_fe` VALUES (13, 'nvdiepse', '6Y5hPHgK_U6u5TBQr4fjMjVHVsuCiZzc', '$2y$13$TncPeqz3rgWjq.fah0d89.zVujQa0GUq2SMr9QZGERgCZU8/Gf1B.', NULL, 'diepnv@hellomedia.vn', 9, 1567590712, 1567590712, 'F42QZTYfmOUT03XW7biHva8xBEAQkkwX_1567590712');
INSERT INTO `user_fe` VALUES (14, 'nvdiepse', 'mUI4pI_NK__xRx9bETMiNJY7Gu4ueOr7', '$2y$13$G1bEt0uKbf1NkaKjhdd5Ku5HgvJMNFOgfzg3nqycMmfhk3mN14BsW', NULL, 'diepnv@hellomedia.vn', 9, 1567590809, 1567590809, 'ngVFzFwTosNBx4xFC5i2Vmn2-KBPMN6w_1567590809');
INSERT INTO `user_fe` VALUES (15, 'nvdiepse', 'PZ-1VBXrtlVoGVdaJYYv5RJKKU-DJWQn', '$2y$13$qm2xgRyV7f8JqneszOJOEeBgVPwHJlnfLeSS2PKlNNUQREve38aFm', NULL, 'diepnv@hellomedia.vn', 9, 1567590835, 1567590835, '4MNUpAvruSNMkD_gewzWemawyuttnVgv_1567590835');

SET FOREIGN_KEY_CHECKS = 1;
