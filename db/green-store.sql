/*
 Navicat Premium Data Transfer

 Source Server         : 213
 Source Server Type    : MySQL
 Source Server Version : 100418
 Source Host           : localhost:3306
 Source Schema         : greenstore

 Target Server Type    : MySQL
 Target Server Version : 100418
 File Encoding         : 65001

 Date: 24/05/2021 22:16:28
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admins
-- ----------------------------
DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `avatar` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `active` bit(1) NULL DEFAULT NULL COMMENT '0-hide 1-active',
  `created_at` datetime(6) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(6),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of admins
-- ----------------------------
INSERT INTO `admins` VALUES (1, 'Phan Trần Thế Lĩnh', 'admin@gmail.com', '123456', NULL, b'1', '2021-05-04 22:50:47.673552');

-- ----------------------------
-- Table structure for articles
-- ----------------------------
DROP TABLE IF EXISTS `articles`;
CREATE TABLE `articles`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `a_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `a_lug` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `a_description` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `a_description_seo` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `a_content` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `a_author_id` int NULL DEFAULT NULL,
  `a_active` bit(1) NULL DEFAULT NULL COMMENT '0-hide 1-active',
  `a_avatar` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created_at` datetime(6) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(6),
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `a_author_id`(`a_author_id`) USING BTREE,
  CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`a_author_id`) REFERENCES `admins` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of articles
-- ----------------------------

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `c_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `c_active` int NULL DEFAULT NULL COMMENT '0-hide 1-active',
  `c_total_product` int NULL DEFAULT NULL,
  `c_name_author` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `c_author_id` int NULL DEFAULT NULL,
  `c_images` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `c_author_id`(`c_author_id`) USING BTREE,
  CONSTRAINT `categories_ibfk_1` FOREIGN KEY (`c_author_id`) REFERENCES `admins` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 20 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES (1, 'Vans', 1, NULL, 'Phan Trần Thế Lĩnh', 1, 'vans_PNG43.png', '2021-05-05 12:17:21.527823', '2021-05-08 21:07:00');
INSERT INTO `categories` VALUES (2, 'Converse', 1, NULL, 'Phan Trần Thế Lĩnh', 1, 'CONVERSE-logo-56904D179D-seeklogo.com.png', '2021-05-05 12:17:22.517616', '2021-05-07 12:16:17');
INSERT INTO `categories` VALUES (3, 'Palladium', 1, NULL, 'Phan Trần Thế Lĩnh', 1, 'Palladium-logo-8ECB8315D7-seeklogo.com.png', '2021-05-05 12:17:23.292683', '2021-05-07 20:25:17');
INSERT INTO `categories` VALUES (4, 'Adidas', 0, NULL, 'Phan Trần Thế Lĩnh', 1, 'y-nghia-logo-adidas-3.png', '2021-05-05 12:17:24.102840', '2021-05-12 20:52:54');
INSERT INTO `categories` VALUES (5, 'New Balance', 0, NULL, 'Phan Trần Thế Lĩnh', 1, 'New_Balance-Logo.wine.png', '2021-05-05 12:17:25.062432', '2021-05-12 20:52:56');

-- ----------------------------
-- Table structure for contacts
-- ----------------------------
DROP TABLE IF EXISTS `contacts`;
CREATE TABLE `contacts`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `c_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `c_email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `c_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `c_content` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `c_status` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of contacts
-- ----------------------------

-- ----------------------------
-- Table structure for images
-- ----------------------------
DROP TABLE IF EXISTS `images`;
CREATE TABLE `images`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `im_product_id` int NULL DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `im_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created_at` datetime(6) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(6),
  `update_at` datetime(6) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(6),
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `im_product_id`(`im_product_id`) USING BTREE,
  CONSTRAINT `images_ibfk_1` FOREIGN KEY (`im_product_id`) REFERENCES `products` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 74 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of images
-- ----------------------------
INSERT INTO `images` VALUES (1, 1, 'images/1.jpg', '560250C', '2021-05-03 09:21:08.312203', '2021-05-03 09:21:08.312203');
INSERT INTO `images` VALUES (3, 1, 'images/1.1.jpg', '560250C', '2021-05-03 09:21:19.296218', '2021-05-03 09:21:19.296218');
INSERT INTO `images` VALUES (4, 1, 'images/1.2.jpg', '560250C', '2021-05-03 09:21:24.649273', '2021-05-03 09:21:24.649273');
INSERT INTO `images` VALUES (5, 1, 'images/1.3.jpg', '560250C', '2021-05-03 09:21:31.240383', '2021-05-03 09:21:31.240383');
INSERT INTO `images` VALUES (6, 2, 'images/2.jpg', '560251C', '2021-05-03 09:22:52.386504', '2021-05-03 09:22:52.386504');
INSERT INTO `images` VALUES (7, 2, 'images/2.1.jpg', '560251C', '2021-05-03 09:22:58.843298', '2021-05-03 09:22:58.843298');
INSERT INTO `images` VALUES (8, 2, 'images/2.2.jpg', '560251C', '2021-05-03 09:23:03.796487', '2021-05-03 09:23:03.796487');
INSERT INTO `images` VALUES (9, 2, 'images/2.3.jpg', '560251C', '2021-05-03 09:23:10.636139', '2021-05-03 09:23:10.636139');
INSERT INTO `images` VALUES (10, 3, 'images/3.jpg', '170367C', '2021-05-03 09:24:21.506082', '2021-05-03 09:24:21.506082');
INSERT INTO `images` VALUES (11, 3, 'images/3.1.jpg', '170367C', '2021-05-03 09:24:26.788593', '2021-05-03 09:24:26.788593');
INSERT INTO `images` VALUES (12, 3, 'images/3.2.jpg', '170367C', '2021-05-03 09:24:32.595861', '2021-05-03 09:24:32.595861');
INSERT INTO `images` VALUES (13, 3, 'images/3.3.jpg', '170367C', '2021-05-03 09:24:38.153732', '2021-05-03 09:24:38.153732');
INSERT INTO `images` VALUES (14, 4, 'images/4.jpg', '170804C', '2021-05-03 09:25:56.095924', '2021-05-03 09:25:56.095924');
INSERT INTO `images` VALUES (15, 4, 'images/4.1.jpg', '170804C', '2021-05-03 09:26:00.885371', '2021-05-03 09:26:00.885371');
INSERT INTO `images` VALUES (16, 4, 'images/4.2.jpg', '170804C', '2021-05-03 09:26:05.228951', '2021-05-03 09:26:05.228951');
INSERT INTO `images` VALUES (17, 4, 'images/4.3.jpg', '170804C', '2021-05-03 09:26:10.108220', '2021-05-03 09:26:10.108220');
INSERT INTO `images` VALUES (18, 5, 'images/5.jpg', '170251C', '2021-05-03 09:27:29.920982', '2021-05-03 09:27:29.920982');
INSERT INTO `images` VALUES (19, 5, 'images/5.1.jpg', '170251C', '2021-05-03 09:27:34.391455', '2021-05-03 09:27:34.391455');
INSERT INTO `images` VALUES (20, 5, 'images/5.2.jpg', '170251C', '2021-05-03 09:27:39.856014', '2021-05-03 09:27:39.856014');
INSERT INTO `images` VALUES (21, 5, 'images/5.3.jpg', '170251C', '2021-05-03 09:27:47.569654', '2021-05-03 09:27:47.569654');
INSERT INTO `images` VALUES (22, 6, 'images/6.jpg', 'VN0A5FCBY28', '2021-05-03 09:44:16.572265', '2021-05-03 09:44:16.572265');
INSERT INTO `images` VALUES (23, 6, 'images/6.1.jpg', 'VN0A5FCBY28', '2021-05-03 09:44:27.750337', '2021-05-03 09:44:27.750337');
INSERT INTO `images` VALUES (24, 6, 'images/6.2.jpg', 'VN0A5FCBY28', '2021-05-03 09:44:32.269103', '2021-05-03 09:44:32.269103');
INSERT INTO `images` VALUES (25, 6, 'images/6.3.jpg', 'VN0A5FCBY28', '2021-05-03 09:44:34.893452', '2021-05-03 09:44:34.893452');
INSERT INTO `images` VALUES (26, 7, 'images/7.jpg', 'VN0A38G219Z', '2021-05-03 09:44:40.312440', '2021-05-03 09:44:40.312440');
INSERT INTO `images` VALUES (27, 7, 'images/7.1.jpg', 'VN0A38G219Z', '2021-05-03 09:44:45.035519', '2021-05-03 09:44:45.035519');
INSERT INTO `images` VALUES (28, 7, 'images/7.2.jpg', 'VN0A38G219Z', '2021-05-03 09:44:49.924336', '2021-05-03 09:44:49.924336');
INSERT INTO `images` VALUES (29, 7, 'images/7.3.jpg', 'VN0A38G219Z', '2021-05-03 09:44:54.379692', '2021-05-03 09:44:54.379692');
INSERT INTO `images` VALUES (30, 8, 'images/8.jpg', 'VN0A38F7PHN', '2021-05-03 09:44:59.433306', '2021-05-03 09:44:59.433306');
INSERT INTO `images` VALUES (31, 8, 'images/8.1.jpg', 'VN0A38F7PHN', '2021-05-03 09:45:03.930244', '2021-05-03 09:45:03.930244');
INSERT INTO `images` VALUES (32, 8, 'images/8.2.jpg', 'VN0A38F7PHN', '2021-05-03 09:45:09.360323', '2021-05-03 09:45:09.360323');
INSERT INTO `images` VALUES (33, 8, 'images/8.3.jpg', 'VN0A38F7PHN', '2021-05-03 09:45:14.385035', '2021-05-03 09:45:14.385035');
INSERT INTO `images` VALUES (34, 9, 'images/9.jpg', '168513V', '2021-05-03 09:45:19.000938', '2021-05-03 09:45:19.000938');
INSERT INTO `images` VALUES (35, 9, 'images/9.1.jpg', '168513V', '2021-05-03 09:45:23.451517', '2021-05-03 09:45:23.451517');
INSERT INTO `images` VALUES (36, 9, 'images/9.2.jpg', '168513V', '2021-05-03 09:45:28.369847', '2021-05-03 09:45:28.369847');
INSERT INTO `images` VALUES (37, 9, 'images/9.3.jpg', '168513V', '2021-05-03 09:45:33.696336', '2021-05-03 09:45:33.696336');
INSERT INTO `images` VALUES (38, 10, 'images/10.jpg', '77082-116-M', '2021-05-03 09:39:31.713165', '2021-05-03 09:39:31.713165');
INSERT INTO `images` VALUES (39, 10, 'images/10.1.jpg', '77082-116-M', '2021-05-03 09:39:37.683009', '2021-05-03 09:39:37.683009');
INSERT INTO `images` VALUES (40, 10, 'images/10.2.jpg', '77082-116-M', '2021-05-03 09:39:42.017951', '2021-05-03 09:39:42.017951');
INSERT INTO `images` VALUES (41, 10, 'images/10.3.jpg', '77082-116-M', '2021-05-03 09:39:47.705935', '2021-05-03 09:39:47.705935');
INSERT INTO `images` VALUES (42, 11, 'images/11.jpg', '76881-736-M', '2021-05-03 09:34:24.731509', '2021-05-03 09:34:24.731509');
INSERT INTO `images` VALUES (43, 11, 'images/11.1.jpg', '76881-736-M', '2021-05-03 09:34:15.298082', '2021-05-03 09:34:15.298082');
INSERT INTO `images` VALUES (44, 11, 'images/11.2.jpg', '76881-736-M', '2021-05-03 09:34:17.304589', '2021-05-03 09:34:17.304589');
INSERT INTO `images` VALUES (45, 11, 'images/11.3.jpg', '76881-736-M', '2021-05-03 09:34:21.107614', '2021-05-03 09:34:21.107614');
INSERT INTO `images` VALUES (46, 12, 'images/12.jpg', '75349-101-M', '2021-05-03 09:39:54.303677', '2021-05-03 09:39:54.303677');
INSERT INTO `images` VALUES (47, 12, 'images/12.1.jpg', '75349-101-M', '2021-05-03 09:39:58.864155', '2021-05-03 09:39:58.864155');
INSERT INTO `images` VALUES (48, 12, 'images/12.2.jpg', '75349-101-M', '2021-05-03 09:40:03.428118', '2021-05-03 09:40:03.428118');
INSERT INTO `images` VALUES (49, 12, 'images/12.3.jpg', '75349-101-M', '2021-05-03 09:40:08.761673', '2021-05-03 09:40:08.761673');
INSERT INTO `images` VALUES (50, 13, 'images/13.jpg', 'VN0A2Z5I002', '2021-05-03 09:45:40.793900', '2021-05-03 09:45:40.793900');
INSERT INTO `images` VALUES (51, 13, 'images/13.1.jpg', 'VN0A2Z5I002', '2021-05-03 09:45:46.636811', '2021-05-03 09:45:46.636811');
INSERT INTO `images` VALUES (52, 13, 'images/13.2.jpg', 'VN0A2Z5I002', '2021-05-03 09:45:52.672733', '2021-05-03 09:45:52.672733');
INSERT INTO `images` VALUES (53, 13, 'images/13.3.jpg', 'VN0A2Z5I002', '2021-05-03 09:46:01.523152', '2021-05-03 09:46:01.523152');
INSERT INTO `images` VALUES (54, 14, 'images/14.jpg', 'VN0A4U38WT3', '2021-05-03 09:37:43.380089', '2021-05-03 09:37:43.380089');
INSERT INTO `images` VALUES (55, 14, 'images/14.1.jpg', 'VN0A4U38WT3', '2021-05-03 09:37:48.061761', '2021-05-03 09:37:48.061761');
INSERT INTO `images` VALUES (56, 14, 'images/14.2.jpg', 'VN0A4U38WT3', '2021-05-03 09:37:53.226139', '2021-05-03 09:37:53.226139');
INSERT INTO `images` VALUES (57, 14, 'images/14.3.jpg', 'VN0A4U38WT3', '2021-05-03 09:37:57.971233', '2021-05-03 09:37:57.971233');
INSERT INTO `images` VALUES (58, 15, 'images/15.jpg', 'VN0A4U3C2C6', '2021-05-03 09:35:44.355623', '2021-05-03 09:35:44.355623');
INSERT INTO `images` VALUES (59, 15, 'images/15.1.jpg', 'VN0A4U3C2C6', '2021-05-03 09:35:48.893426', '2021-05-03 09:35:48.893426');
INSERT INTO `images` VALUES (60, 15, 'images/15.2.jpg', 'VN0A4U3C2C6', '2021-05-03 09:36:13.340158', '2021-05-03 09:36:13.340158');
INSERT INTO `images` VALUES (61, 15, 'images/15.3.jpg', 'VN0A4U3C2C6', '2021-05-03 09:36:06.675542', '2021-05-03 09:36:06.675542');
INSERT INTO `images` VALUES (62, 16, 'images/16.jpg', 'VN0A38ENOAK', '2021-05-03 09:31:46.770992', '2021-05-03 09:31:46.770992');
INSERT INTO `images` VALUES (63, 16, 'images/16.1.jpg', 'VN0A38ENOAK', '2021-05-03 09:31:51.738438', '2021-05-03 09:31:51.738438');
INSERT INTO `images` VALUES (64, 16, 'images/16.2.jpg', 'VN0A38ENOAK', '2021-05-03 09:31:57.085434', '2021-05-03 09:31:57.085434');
INSERT INTO `images` VALUES (65, 16, 'images/16.3.jpg', 'VN0A38ENOAK', '2021-05-03 09:32:02.383787', '2021-05-03 09:32:02.383787');
INSERT INTO `images` VALUES (66, 17, 'images/17.jpg', '670171C', '2021-05-03 09:32:07.052435', '2021-05-03 09:32:07.052435');
INSERT INTO `images` VALUES (67, 17, 'images/17.1.jpg', '670171C', '2021-05-03 09:32:12.311119', '2021-05-03 09:32:12.311119');
INSERT INTO `images` VALUES (68, 17, 'images/17.2.jpg', '670171C', '2021-05-03 09:32:16.757028', '2021-05-03 09:32:16.757028');
INSERT INTO `images` VALUES (69, 17, 'images/17.3.jpg', '670171C', '2021-05-03 09:32:21.694495', '2021-05-03 09:32:21.694495');
INSERT INTO `images` VALUES (70, 18, 'images/18.jpg', '170282C', '2021-05-03 09:34:38.842590', '2021-05-03 09:34:38.842590');
INSERT INTO `images` VALUES (71, 18, 'images/18.1.jpg', '170282C', '2021-05-03 09:34:40.052506', '2021-05-03 09:34:40.052506');
INSERT INTO `images` VALUES (72, 18, 'images/18.2.jpg', '170282C', '2021-05-03 09:34:41.032966', '2021-05-03 09:34:41.032966');
INSERT INTO `images` VALUES (73, 18, 'images/18.3.jpg', '170282C', '2021-05-03 09:34:41.964217', '2021-05-03 09:34:41.964217');

-- ----------------------------
-- Table structure for order_detail
-- ----------------------------
DROP TABLE IF EXISTS `order_detail`;
CREATE TABLE `order_detail`  (
  `oder_detail_id` int NOT NULL AUTO_INCREMENT,
  `od_order_id` int NULL DEFAULT NULL,
  `od_pro_id` int NULL DEFAULT NULL,
  `od_user_id` int NULL DEFAULT NULL,
  `od_pro_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `od_pro_qty` int NULL DEFAULT NULL,
  `od_pro_price` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `od_created_at` timestamp(6) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(6),
  PRIMARY KEY (`oder_detail_id`) USING BTREE,
  INDEX `or_id`(`od_order_id`) USING BTREE,
  INDEX `od_pro_id`(`od_pro_id`) USING BTREE,
  INDEX `od_user_id`(`od_user_id`) USING BTREE,
  CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`od_pro_id`) REFERENCES `products` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `order_detail_ibfk_2` FOREIGN KEY (`od_order_id`) REFERENCES `orders` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `order_detail_ibfk_3` FOREIGN KEY (`od_user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `order_detail_ibfk_4` FOREIGN KEY (`od_user_id`) REFERENCES `transactions` (`tr_user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of order_detail
-- ----------------------------
INSERT INTO `order_detail` VALUES (11, 14, 1, 1, 'Converse Chuck Taylor All Star Gamer Low-Top - 670171C', 2, '1000000', NULL);

-- ----------------------------
-- Table structure for orders
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `or_transaction_id` int NULL DEFAULT NULL,
  `or_product_id` int NULL DEFAULT NULL,
  `or_payment_id` int NULL DEFAULT NULL,
  `or_user_id` int NULL DEFAULT NULL,
  `or_status` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `or_total` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `created_at` datetime(6) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(6),
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `or_payment_id`(`or_payment_id`) USING BTREE,
  INDEX `or_user_id`(`or_user_id`) USING BTREE,
  CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`or_user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of orders
-- ----------------------------
INSERT INTO `orders` VALUES (14, 16, NULL, 17, 1, 'Đang chờ xử lý', '2,000,000.00', NULL);

-- ----------------------------
-- Table structure for payment
-- ----------------------------
DROP TABLE IF EXISTS `payment`;
CREATE TABLE `payment`  (
  `payment_id` int NOT NULL AUTO_INCREMENT,
  `payment_method` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `payment_order_id` int NULL DEFAULT NULL,
  `payment_status` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `payment_time` timestamp(6) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(6),
  PRIMARY KEY (`payment_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 18 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of payment
-- ----------------------------
INSERT INTO `payment` VALUES (15, 'Bằng tiền mặt', NULL, 'Đang chờ xử lý', NULL);
INSERT INTO `payment` VALUES (16, 'Bằng tiền mặt', NULL, 'Đang chờ xử lý', NULL);
INSERT INTO `payment` VALUES (17, 'Bằng tiền mặt', NULL, 'Đang chờ xử lý', NULL);

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `pro_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `pro_category_id` int NULL DEFAULT NULL,
  `pro_price` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `pro_author_id` int NULL DEFAULT NULL,
  `pro_sale` tinyint NULL DEFAULT NULL,
  `pro_active` int NULL DEFAULT NULL COMMENT '0-hide 1-active',
  `pro_hot` bit(1) NULL DEFAULT NULL COMMENT '1- hot ,0 normal',
  `pro_number` int NULL DEFAULT NULL,
  `pro_view` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `pro_description` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `pro_keyword` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `pro_content` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `created_at` datetime(6) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(6),
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `pro_category_id`(`pro_category_id`) USING BTREE,
  INDEX `pro_author_id`(`pro_author_id`) USING BTREE,
  CONSTRAINT `products_ibfk_3` FOREIGN KEY (`pro_category_id`) REFERENCES `categories` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `products_ibfk_4` FOREIGN KEY (`pro_author_id`) REFERENCES `admins` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1004 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES (1, 'Converse Chuck Taylor All Star Gamer Low-Top - 670171C', 1, '1000000', 1, 0, 1, b'1', 13, 'images/1.jpg', 'SKU: 560250C\r\nChất liệu: Canvas\r\nMàu sắc: Black/White/White', '560250C', NULL, '2021-05-21 22:36:50.532203');
INSERT INTO `products` VALUES (2, 'Converse Chuck Taylor All Star Lift Canvas - 560251C', 2, '1700000', 1, 10, 1, NULL, 3, 'images/2.jpg', 'SKU: 560251C\r\nChất liệu: Canvas\r\nMàu sắc: White/Black/White', '560251C', 'Mang trở lại phiên bản đế cao trong một diện mạo tối cơ bản, Converse Platform Canvas là sự kết hợp nhuần nhuyễn và hài hòa giữa đế Platform cao su dày dặn và Canvas Upper nhẹ thoáng, bền bỉ. Với những gam màu basic và độ hack dáng không thể xem thường, bạn có thể tự tin diện item này đến những buổi gặp gỡ bạn bè trong những bộ cánh xinh tươi, rạng rỡ nhất.', '2021-05-03 09:22:42.139224');
INSERT INTO `products` VALUES (3, 'Converse Chuck Taylor All Star Renew Sock Knit - 170367C', 2, '2200000', 1, 0, 1, NULL, 4, 'images/3.jpg', 'SKU: 170367C\r\nChất liệu: 75% poly; 25% nilon spandex\r\nMàu sắc: Limestone Grey/Storm Wind/Ash Stone', '170367C', 'Converse Chuck Taylor All Star Crate Knit đã trở lại để mang sự cổ điển đến gần hơn với một tương lai không lãng phí. Kiểu dáng Chuck Taylor với phần đế cao su được làm từ Công nghệ Nike Grind kết hợp với xốp Nike và cao su tái chế. Ngoài ra, upper được làm từ chất vải Polyester với công nghệ dệt kỹ thuật tiên tiến, sợi vải được dệt từ 75% poly tái chế và 25% nilon spandex (loại sợi nhân tạo có khả năng co giãn 4 chiều). Trong quá trình dệt có thể sử dụng chính xác lượng sợi cần thiết, đồng thời giảm được tối đa vải thừa đảm bảo tiết kiệm và tránh lãng phí nguyên liệu.', '2021-05-03 09:24:04.989505');
INSERT INTO `products` VALUES (4, 'Converse Chuck Taylor All Star 1970s Archive Paint Splatter - 170804C', 2, '1900000', 1, 10, 1, b'1', 5, 'images/4.jpg', 'SKU: 170804C\r\nChất liệu: Canvas\r\nMàu sắc: Sunflower Gold/Egret/Aegean Storm', '170804C', 'Chào hè bằng những thiết kế Converse Archive Paint Splatter, thương hiệu bóng rổ đình đám đã có dịp chinh phục các bạn trẻ đang hướng đến sự mới lạ và phong cách cá tính. Ứng dụng xu hướng Paint Splatter với hình ảnh những tia sơn màu được phun một cách không cần trật tự lên bản in cho thiết kế mới, Converse mang đến item đầy sắc màu để bạn “hết mình” với style trẻ trung, năng động nhất.', '2021-05-03 09:25:49.192197');
INSERT INTO `products` VALUES (5, 'Converse All-Court Basketball - 170251C', 2, '1800000', 1, 0, 1, NULL, 1, 'images/5.jpg', 'SKU: 170251C\r\nChất liệu: Leather\r\nMàu sắc: White/University Red/Bold Citron', '170251C', 'Converse tiếp tục trình làng phiên bản All-court Basketball thuộc dòng giày thể thao mới được ra mắt. Sản phẩm được nâng cấp chức năng hỗ trợ vận động với thân giày được làm từ chất liệu da cao cấp, kết hợp với chi tiết lưỡi gà tạo nên từ vải lưới có tính đàn hồi. Ngoài ra, thiết kế lấy tông màu trắng làm chủ đạo cùng các điểm nhấn tinh tế, tạo nên một item lý tưởng để diện khi tập luyện hoặc những lúc xuống phố', '2021-05-03 09:27:21.157158');
INSERT INTO `products` VALUES (6, 'Vans MN Skate Old Skool - VN0A5FCBY28', 1, '2200000', 1, 30, 1, b'1', 2, 'images/6.jpg', 'SKU: VN0A5FCBY28\r\nChất liệu: 45.1% Leather; 54.9% Textile\r\nMàu sắc: Black/White', 'VN0A5FCBY28', 'Hình mẫu Old Skool cổ điển tái xuất trong phiên bản Vans Skate Old Skool với hàng loạt cải tiến mang tính đột phá cho dòng giày trượt ván. Tái sinh bằng một cái tên mới, mẫu giày không chỉ gây ấn tượng bởi những chi tiết nhỏ nhất được thay đổi, mà còn làm dậy sóng làng skaters với công nghệ đỉnh cao tích hợp trong miếng lót Duracap, đệm lót PopCush hay keo cao su SickStick, mang lại sự thoải mái và tiện nghi đối đa cho các skate-thủ.', '2021-05-03 09:41:40.846630');
INSERT INTO `products` VALUES (7, 'Vans UA Old Skool 36 DX Anaheim Factory Hoffman Fabrics', 1, '2200000', 1, 0, 1, b'1', 11, 'images/7.jpg', 'SKU: VN0A38G219Z\r\nChất liệu: 83.2% Textile; 16.8% Leather\r\nMàu sắc: (Anaheim Factory) Hoffman Fabrics/Floral Mix', 'VN0A38G219Z', 'Những mẫu giày Vans Anaheim Factory Hoffman Fabrics với hoa văn bắt mắt, mang đậm nét đặc trưng của xứ sở phía Nam và văn hóa lướt sóng, được làm từ chất liệu vải cao cấp Hoffman California Fabrics nhuộm thủ công cho độ tinh tế và tỉ mỉ trong từng chi tiết. Một siêu phẩm đến từ dòng Anaheim Factory sẽ mang đến cho bạn trải nghiệm tuyệt vời chưa từng có.', '2021-05-21 22:22:18.685452');
INSERT INTO `products` VALUES (8, 'Vans UA Classic Slip-On Flame - VN0A38F7PHN', 1, '1500000', 1, 0, 1, NULL, 4, 'images/8.jpg', 'SKU: VN0A38F7PHN\r\nChất liệu: Textile\r\nMàu sắc: (Flame) black/black/true white', 'VN0A38F7PHN', 'Mang đến sự hứng khởi thông qua BST Vans Flame với họa tiết “Flame” nổi như lửa trên phiên bản đặc trưng Slip-On. Ẩn mình sau hình ảnh ngọn lửa bùng cháy trên nền Upper Canvas là một hình dáng trẻ trung của kiểu dáng giày “lười\" cổ điển, với vẻ ngoài rực lửa đủ tiêu chuẩn của một đôi giày cá tính nổi bật, khó có thể làm ngơ.', '2021-05-03 09:42:42.291974');
INSERT INTO `products` VALUES (9, 'Converse Chuck Taylor All Star 1970s Midnight Clover - 168513V', 2, '1900000', 1, 0, 1, NULL, 1, 'images/9.jpg', 'SKU: 168513V\r\nChất liệu: Canvas\r\nMàu sắc: Midnight Clover/Egret/Black', '168513V', 'Converse Chuck 70S Vintage Canvas ra mắt phối màu Midnight Clover huyền bí. được nâng cấp các tính năng tiện ích bền bỉ qua thời gian. Kiểu dáng cổ thấp mang tính biểu tượng để bạn tự do với muôn vàn kiểu mix&match', '2021-05-03 09:43:32.241253');
INSERT INTO `products` VALUES (10, 'Palladium Pampa Lite Overlab Neon - 77082-116-M', 3, '2400000', 1, 0, 1, NULL, 4, 'images/10.jpg', 'SKU: 77082-116-M\r\nChất liệu: Polyester\r\nMàu sắc: Star White', '77082-116-M', 'Palladium Pampa Lite Overlab Neon dành cho những bạn trẻ năng động và ưa di chuyển, được làm từ sự kết hợp giữa hai chất liệu cao cấp polyester chống thấm nước và sợi vải lưới ballistic mesh. Ngoài ra, đi kèm với đó là phần outsole ứng dụng công nghệ Lite - Tech tiên tiến giúp trọng lượng đôi giày được giảm đi đáng kể. Màu sắc neon rực rỡ cùng với các chi tiết thương hiệu mang đến cho thiết kế một phong cách thời thượng nổi bật, với vẻ ngoài hợp thời trang và tạo sự khác biệt giữa đám đông.', '2021-05-03 09:40:31.368702');
INSERT INTO `products` VALUES (11, 'Palladium Pampa Smiley DT - 76881-736-M', 3, '2500000', 1, 0, 1, b'1', 1, 'images/11.jpg', 'SKU: 76881-736-M\r\nChất liệu: Canvas\r\nMàu sắc: Yellow/Black', '76881-736-M', 'Pampa Smiley DT Collection nổi bật với phối màu Yellow tươi mới, mang tinh thần truyền tải thông điệp và năng lượng tích cực đối với sự tự do và niềm vui hạnh phúc qua điểm nhấn “Smiley” biểu tượng mặt cười tan chảy.', '2021-05-03 09:33:43.720760');
INSERT INTO `products` VALUES (12, 'Palladium Pampa Hi Originale - 75349-101-M', 3, '2000000', 1, 0, 1, b'1', 3, 'images/12.jpg', 'SKU: 75349-101-M\r\nChất liệu: Canvas\r\nMàu sắc: WHITE', '75349-101-M', 'Palladium Pampa Hi Originale với phối màu All White cá tính kết hợp với những chiếc đế bền bỉ được áp dụng công nghiệp chế tạo bánh xe máy bay để bạn dễ dàng kết hợp nhiều loại trang phục', '2021-05-03 09:40:21.844554');
INSERT INTO `products` VALUES (13, 'Vans UA Authentic National Geographic - VN0A2Z5I002', 1, '2100000', 1, 0, 1, b'1', 4, 'images/13.jpg', 'SKU: VN0A2Z5I002\r\nChất liệu: Textile\r\nMàu sắc: (National Geographic) ocean/true blue', 'VN0A2Z5I002', 'Vans x National Geographic Authentic có thiết kế độc đáo với hình ảnh đại dương xanh “mướt mắt” được in bao phủ trên toàn bộ upper. Công nghệ in cao cấp của Vans cho ra hình ảnh họa tiết cực sắc nét và sống động. Ngoài ra, bạn hãy thử tìm kiếm tọa độ được in trên viền đế của đôi giày, chắc chắn bạn sẽ thấy điều rất thú vị!', '2021-05-03 09:44:03.773140');
INSERT INTO `products` VALUES (14, 'Vans UA Classic Slip-On National Geographic - VN0A4U38WT3', 1, '2100000', 1, 50, 1, b'1', 3, 'images/14.jpg', 'SKU: VN0A4U38WT3\r\nChất liệu: Textile\r\nMàu sắc: (National Geographic) Then/Now glacier', 'VN0A4U38WT3', 'Những tín đồ của Slip-On chắc chắn sẽ “mê đắm” đôi Vans x National Geographic Slip-On này! Họa tiết được sử dụng trên upper là hình ảnh của dòng sông băng Đảo Thông đang trong quá trình tan chảy. Ngoài ra phần viền mỗi chiếc giày sẽ có dòng chữ THEN và NOW biểu thị cho đúng tốc độ và số lượng băng tan trên mỗi chiếc.', '2021-05-03 09:37:34.514062');
INSERT INTO `products` VALUES (15, 'Vans UA SK8-Hi Racer Edge - VN0A4U3C2C6', 1, '1900000', 1, 0, 1, NULL, 2, 'images/15.jpg', 'SKU: VN0A4U3C2C6\r\nChất liệu: 54% Leather; 46% Rubber Plastic\r\nMàu sắc: (Racer Edge) black/true white', 'VN0A4U3C2C6', 'Vans SK8-Hi Racer Edge nổi bật với thiết kế những đường sọc đặc trưng, mô tả sống động biểu tượng của tốc độ bên cạnh là logo thương hiệu thu hút. Vans Racer Edge hỗ trợ cho các tay trượt ván một cách linh hoạt, mạnh mẽ.', '2021-05-03 09:36:23.142187');
INSERT INTO `products` VALUES (16, 'Vans Authentic 44 DX Anaheim Factory - VN0A38ENOAK', 1, '1900000', 1, 30, 1, NULL, 3, 'images/16.jpg', 'SKU: VN0A38ENOAK\r\nChất liệu: Canvas\r\nMàu sắc: Black/Checkerboard', 'VN0A38ENOAK', 'Đôi giày Vans Authentic Anaheim Factory với thiết kế Checkerboard huyền thoại được phủ lên toàn bộ thân giày giúp sản phẩm thêm phần cá tính và nổi bật. Phong cách cổ điển được thể hiện rõ ngay trên đế giày với màu trắng ngà có độ dày hơn, đặc biệt là được phủ bóng giúp bạn dễ dàng vệ sinh.', '2021-05-03 09:31:34.512817');
INSERT INTO `products` VALUES (17, 'Converse Chuck Taylor All Star Gamer Low-Top - 670171C', 2, '1000000', 1, 0, 1, b'1', 4, 'images/17.jpg', 'SKU: 670171C\r\nChất liệu: Canvas\r\nMàu sắc: White/Black/Bold Pink', '670171C', 'Mẫu giày Converse Kid Gamer Low Top sử dụng họa tiết đa màu sắc vui nhộn, được lấy cảm hứng từ những trò chơi điện tử ăn khách từ thập kỷ trước, được trẻ em trên khắp thế giới yêu thích. Thiết kế mang phong cách đơn giản nhưng cũng vô cùng thu hút, sẽ là một món quà đặc biệt để làm các bạn nhỏ bất ngờ.', '2021-05-07 11:44:31.414753');
INSERT INTO `products` VALUES (18, 'Converse Chuck Taylor All Star 1970s My Story - 170282C', 2, '2000000', 1, 0, 1, NULL, 5, 'images/18.jpg', 'SKU: 170282C\r\nChất liệu: Polyester Canvas\r\nMàu sắc: Egret/Amarillo/Black', '170282C', 'Converse My Story gây ấn tượng với các thiết kế độc đáo cùng họa tiết “My Story” graphics được in liền mạch đầy ấn tượng. Trên nền giày Canvas, các con chữ như nhảy múa, nối đuôi nhau một cách bất tận, mang đến phong cách mới lạ, thú vị cho người mang. Đặc biệt với phiên bản Chuck 70 cổ cao màu vàng, dòng chữ My Story như được highlight mang đến sắc thái nhấn mạnh càng làm bạn nổi bật hơn giữa đám đông.', '2021-05-03 09:29:19.167684');

-- ----------------------------
-- Table structure for size
-- ----------------------------
DROP TABLE IF EXISTS `size`;
CREATE TABLE `size`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `size_product_id` int NULL DEFAULT NULL,
  `size` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `size_products_id`(`size_product_id`) USING BTREE,
  CONSTRAINT `size_ibfk_1` FOREIGN KEY (`size_product_id`) REFERENCES `products` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 62 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of size
-- ----------------------------
INSERT INTO `size` VALUES (0, NULL, NULL);
INSERT INTO `size` VALUES (1, 1, 39);
INSERT INTO `size` VALUES (2, 1, 40);
INSERT INTO `size` VALUES (3, 1, 41);
INSERT INTO `size` VALUES (4, 1, 42);
INSERT INTO `size` VALUES (5, 1, 43);
INSERT INTO `size` VALUES (6, 1, 44);
INSERT INTO `size` VALUES (9, 2, 40);
INSERT INTO `size` VALUES (10, 2, 41);
INSERT INTO `size` VALUES (11, 2, 42);
INSERT INTO `size` VALUES (12, 3, 40);
INSERT INTO `size` VALUES (13, 3, 41);
INSERT INTO `size` VALUES (14, 4, 39);
INSERT INTO `size` VALUES (15, 4, 40);
INSERT INTO `size` VALUES (16, 4, 42);
INSERT INTO `size` VALUES (17, 5, 41);
INSERT INTO `size` VALUES (18, 5, 43);
INSERT INTO `size` VALUES (19, 5, 44);
INSERT INTO `size` VALUES (20, 6, 38);
INSERT INTO `size` VALUES (21, 6, 40);
INSERT INTO `size` VALUES (22, 6, 42);
INSERT INTO `size` VALUES (23, 7, 39);
INSERT INTO `size` VALUES (24, 7, 40);
INSERT INTO `size` VALUES (25, 7, 41);
INSERT INTO `size` VALUES (26, 8, 41);
INSERT INTO `size` VALUES (27, 8, 42);
INSERT INTO `size` VALUES (28, 8, 44);
INSERT INTO `size` VALUES (29, 9, 39);
INSERT INTO `size` VALUES (30, 9, 40);
INSERT INTO `size` VALUES (31, 9, 41);
INSERT INTO `size` VALUES (32, 9, 42);
INSERT INTO `size` VALUES (33, 9, 44);
INSERT INTO `size` VALUES (34, 10, 39);
INSERT INTO `size` VALUES (35, 10, 38);
INSERT INTO `size` VALUES (36, 10, 40);
INSERT INTO `size` VALUES (37, 11, 38);
INSERT INTO `size` VALUES (38, 11, 39);
INSERT INTO `size` VALUES (39, 11, 40);
INSERT INTO `size` VALUES (40, 12, 38);
INSERT INTO `size` VALUES (41, 12, 39);
INSERT INTO `size` VALUES (42, 12, 37);
INSERT INTO `size` VALUES (43, 13, 37);
INSERT INTO `size` VALUES (44, 13, 38);
INSERT INTO `size` VALUES (45, 13, 39);
INSERT INTO `size` VALUES (46, 13, 40);
INSERT INTO `size` VALUES (47, 14, 37);
INSERT INTO `size` VALUES (48, 14, 39);
INSERT INTO `size` VALUES (49, 14, 40);
INSERT INTO `size` VALUES (50, 15, 40);
INSERT INTO `size` VALUES (51, 15, 39);
INSERT INTO `size` VALUES (52, 15, 41);
INSERT INTO `size` VALUES (53, 16, 40);
INSERT INTO `size` VALUES (54, 16, 44);
INSERT INTO `size` VALUES (55, 16, 42);
INSERT INTO `size` VALUES (56, 17, 39);
INSERT INTO `size` VALUES (57, 17, 42);
INSERT INTO `size` VALUES (58, 17, 43);
INSERT INTO `size` VALUES (59, 18, 36);
INSERT INTO `size` VALUES (60, 18, 37);

-- ----------------------------
-- Table structure for slides
-- ----------------------------
DROP TABLE IF EXISTS `slides`;
CREATE TABLE `slides`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `content` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of slides
-- ----------------------------
INSERT INTO `slides` VALUES (1, 'images/slideshow1.jpg', '');
INSERT INTO `slides` VALUES (4, 'images/slideshow3.jpg', NULL);

-- ----------------------------
-- Table structure for transactions
-- ----------------------------
DROP TABLE IF EXISTS `transactions`;
CREATE TABLE `transactions`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `tr_user_id` int NULL DEFAULT NULL,
  `tr_email_user` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `tr_user_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `tr_total` int NULL DEFAULT NULL,
  `tr_note` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `tr_address` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `tr_phone` decimal(11, 0) NULL DEFAULT NULL,
  `tr_status` bit(1) NULL DEFAULT NULL COMMENT '0-processing 1-finish',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `tr_user_id`(`tr_user_id`) USING BTREE,
  CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`tr_user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of transactions
-- ----------------------------
INSERT INTO `transactions` VALUES (14, 1, 'user1@gmail.com', 'linhx', NULL, '555', 'Cần Thơ', 766865878, NULL);
INSERT INTO `transactions` VALUES (15, 1, 'user1@gmail.com', 'linhx', NULL, '65298', 'Cần Thơ', 766865878, NULL);
INSERT INTO `transactions` VALUES (16, 1, 'user1@gmail.com', 'linhx', NULL, '4515', 'Cần Thơ', 766865878, NULL);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `active` blob NULL COMMENT '0-hide 1-active',
  `phone` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `address` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(6),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'user1@gmail.com', 'linhx', 'e10adc3949ba59abbe56e057f20f883e', NULL, '0766865878', 'Cần Thơ', '2021-05-22 10:24:49.033497');
INSERT INTO `users` VALUES (14, 'user2@gmail.com', 'Phan Tran The Linh', 'e10adc3949ba59abbe56e057f20f883e', NULL, '0766865879', 'Cần Thơ', '2021-05-22 10:24:51.912163');

SET FOREIGN_KEY_CHECKS = 1;
