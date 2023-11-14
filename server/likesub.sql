/*
 Navicat Premium Data Transfer

 Source Server         : LOCALHOST
 Source Server Type    : MySQL
 Source Server Version : 50733
 Source Host           : localhost:3306
 Source Schema         : likesub

 Target Server Type    : MySQL
 Target Server Version : 50733
 File Encoding         : 65001

 Date: 14/11/2023 07:44:42
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for account_banks
-- ----------------------------
DROP TABLE IF EXISTS `account_banks`;
CREATE TABLE `account_banks`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `account_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `bank_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `logo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `min_bank` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `notice` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `token` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of account_banks
-- ----------------------------
INSERT INTO `account_banks` VALUES (1, 'apigiare', 'adminquocduy', 'PHAM QUOC DUY', '0334713016', '110204', 'momo', 'https://upload.wikimedia.org/wikipedia/vi/f/fe/MoMo_Logo.png', '10000', 'Nạp tối thiểu 10k nạp dưới mất tiền', '.', '2022-07-15 16:30:52', '2022-07-16 22:21:00');

-- ----------------------------
-- Table structure for account_fbs
-- ----------------------------
DROP TABLE IF EXISTS `account_fbs`;
CREATE TABLE `account_fbs`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `acc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `notice` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of account_fbs
-- ----------------------------

-- ----------------------------
-- Table structure for account_histories
-- ----------------------------
DROP TABLE IF EXISTS `account_histories`;
CREATE TABLE `account_histories`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of account_histories
-- ----------------------------
INSERT INTO `account_histories` VALUES (1, 'hoangthuank55', 'Bạn đã order sub vip với số lượng 5000 tổng tiền 3400', NULL, '2022-07-17 08:27:05', '2022-07-17 08:27:05');
INSERT INTO `account_histories` VALUES (2, 'Thanhbinhdz', 'Bạn đã order like sale với số lượng 1000 tổng tiền 3000', NULL, '2022-07-17 19:21:57', '2022-07-17 19:21:57');
INSERT INTO `account_histories` VALUES (3, 'Thanhbinhdz', 'Bạn đã order like speed với số lượng 1000 tổng tiền 2500', NULL, '2022-07-18 17:18:53', '2022-07-18 17:18:53');
INSERT INTO `account_histories` VALUES (4, 'adminquocduy', 'Bạn đã order sub vip với số lượng 1000 tổng tiền 3000', NULL, '2022-07-19 01:14:00', '2022-07-19 01:14:00');
INSERT INTO `account_histories` VALUES (5, 'Thanhbinhdz', 'Bạn đã order sub vip với số lượng 18000 tổng tiền 12240', NULL, '2022-07-19 02:54:13', '2022-07-19 02:54:13');

-- ----------------------------
-- Table structure for block_ips
-- ----------------------------
DROP TABLE IF EXISTS `block_ips`;
CREATE TABLE `block_ips`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `reason` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of block_ips
-- ----------------------------

-- ----------------------------
-- Table structure for client_orders
-- ----------------------------
DROP TABLE IF EXISTS `client_orders`;
CREATE TABLE `client_orders`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `amount` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_order` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `total_money` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_order` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `server_order` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `interactive` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `type_order` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `startWith` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `buff` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_order` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `id_order` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ghichu` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_service` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of client_orders
-- ----------------------------
INSERT INTO `client_orders` VALUES (1, 'hoangthuank55', 'sub-vip', '5000', '1657981625', '3400', '0.68', '100037615146718', 'sv4', NULL, NULL, NULL, NULL, 'Active', 'FbSubVip_EGL5SOXITS33', 'k0hE7OJPLC9Tz0Q', 'H', '47821377a5fbb5c49bc4727b075dc861', '2022-07-17 08:27:05', '2022-07-17 08:27:05');
INSERT INTO `client_orders` VALUES (2, 'Thanhbinhdz', 'like-post-sale', '1000', '1658020917', '3000', '3', 'https://m.facebook.com/story.php?story_fbid=pfbid0sYj6vfbDGSnRnzxTouJpPNmuyoZu7ExvFhtRRhGD39vR1iDWf3sjSpgUhfXA7t55l&id=100008439316067', 'sv9', NULL, NULL, NULL, NULL, 'Active', 'FbLikePostSale_83X0RDYRTYCD', 'yNYEPwIixWGL7zS', '', '47821377a5fbb5c49bc4727b075dc861', '2022-07-17 19:21:57', '2022-07-17 19:21:57');
INSERT INTO `client_orders` VALUES (3, 'Thanhbinhdz', 'like-post-speed', '1000', '1658099933', '2500', '2.5', 'https://m.facebook.com/story.php?story_fbid=pfbid02vvDHYgwqJAjWhmAd8ujzMtqjQ6qLdJ6Y3WdxQEY5C6LemBmCoeC64QXMGaCjCWobl&id=100008439316067', 'sv10', NULL, 'slow', NULL, NULL, 'Active', 'FbLikePostSpeed_B90DSPURMXPI', 'AK1Uw3iTQDfggIA', '', '47821377a5fbb5c49bc4727b075dc861', '2022-07-18 17:18:53', '2022-07-18 17:18:53');
INSERT INTO `client_orders` VALUES (4, 'adminquocduy', 'sub-vip', '1000', '1658128440', '3000', '3', '100072618015043', 'sv5', NULL, NULL, NULL, NULL, 'Active', 'FbSubVip_KTI0DZ56N6GV', 'HZyKSDDxolo5yih', '', '47821377a5fbb5c49bc4727b075dc861', '2022-07-19 01:14:00', '2022-07-19 01:14:00');
INSERT INTO `client_orders` VALUES (5, 'Thanhbinhdz', 'sub-vip', '18000', '1658134453', '12240', '0.68', '100013753779884', 'sv4', NULL, NULL, NULL, NULL, 'Active', 'FbSubVip_FMPT21NFEUSB', 'hvZvER9YswTS5EO', '', '47821377a5fbb5c49bc4727b075dc861', '2022-07-19 02:54:13', '2022-07-19 02:54:13');

-- ----------------------------
-- Table structure for history_banks
-- ----------------------------
DROP TABLE IF EXISTS `history_banks`;
CREATE TABLE `history_banks`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `card_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `card_price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `serial` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `thucnhan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `transid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `taskid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of history_banks
-- ----------------------------

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2019_12_14_000001_create_personal_access_tokens_table', 1);
INSERT INTO `migrations` VALUES (3, '2022_05_20_015109_create_site_configs_table', 1);
INSERT INTO `migrations` VALUES (4, '2022_05_21_143956_create_notices_table', 1);
INSERT INTO `migrations` VALUES (5, '2022_05_21_172506_create_service_servers_table', 1);
INSERT INTO `migrations` VALUES (6, '2022_05_24_112428_create_client_orders_table', 1);
INSERT INTO `migrations` VALUES (7, '2022_06_01_012203_create_history_banks_table', 1);
INSERT INTO `migrations` VALUES (8, '2022_06_01_095742_create_account_histories_table', 1);
INSERT INTO `migrations` VALUES (9, '2022_06_04_163752_create_sub_webs_table', 1);
INSERT INTO `migrations` VALUES (10, '2022_06_08_213505_create_account_banks_table', 1);
INSERT INTO `migrations` VALUES (11, '2022_06_11_163556_create_block_ips_table', 1);
INSERT INTO `migrations` VALUES (12, '2022_06_12_181928_create_account_fbs_table', 1);
INSERT INTO `migrations` VALUES (13, '2022_06_12_183513_create_user_buy_accounts_table', 1);
INSERT INTO `migrations` VALUES (14, '2022_06_12_232932_create_notice_accfbs_table', 1);

-- ----------------------------
-- Table structure for notice_accfbs
-- ----------------------------
DROP TABLE IF EXISTS `notice_accfbs`;
CREATE TABLE `notice_accfbs`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of notice_accfbs
-- ----------------------------
INSERT INTO `notice_accfbs` VALUES (1, 'clone', 'Clone nuôi 15-30 ngày chuyên spam ( veri mail )', '8', NULL, '2022-07-15 08:32:57');
INSERT INTO `notice_accfbs` VALUES (2, 'via', 'Via trâu chuyên spam đã nuôi trên 2 tháng', '25', NULL, '2022-07-15 08:33:32');
INSERT INTO `notice_accfbs` VALUES (3, 'tds', '1M xu traodoisub ( Bảo Hành 7 Ngày )', '15', NULL, '2022-07-15 08:34:11');

-- ----------------------------
-- Table structure for notices
-- ----------------------------
DROP TABLE IF EXISTS `notices`;
CREATE TABLE `notices`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of notices
-- ----------------------------

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `personal_access_tokens_token_unique`(`token`) USING BTREE,
  INDEX `personal_access_tokens_tokenable_type_tokenable_id_index`(`tokenable_type`, `tokenable_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for service_servers
-- ----------------------------
DROP TABLE IF EXISTS `service_servers`;
CREATE TABLE `service_servers`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `code_server` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_server` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `server_service` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `rate_server` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_server` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_server` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `status_server` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `reaction` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `api_server` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 39 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of service_servers
-- ----------------------------
INSERT INTO `service_servers` VALUES (1, 'facebook', 'like-post-sale', NULL, 'sv9', '3', 'Sv1 (Like clone nuôi, max 1m5 like (nên dùng ổn định)', '- Tốc độ ổn 1k -> 3k/ngày, không hỗ trợ bài viết chia sẻ video, bài viết trong nhóm, bài viết hoặc video', 'on', NULL, 'subgiare', '2022-07-15 08:15:16', '2022-07-15 08:15:16');
INSERT INTO `service_servers` VALUES (2, 'facebook', 'like-post-sale', NULL, 'sv10', '6.5', 'Sv2 (Like clone nuôi, max 1m5 like (nên dùng ổn định)', '- Tốc độ ổn 2k -> 10k/ngày, không hỗ trợ bài viết chia sẻ video, bài viết trong nhóm, bài viết hoặc video đang chạy ads.', 'on', NULL, 'subgiare', '2022-07-15 22:02:28', '2022-07-15 22:02:28');
INSERT INTO `service_servers` VALUES (3, 'facebook', 'like-post-speed', NULL, 'sv3', '4.5', 'Sv1 (Like người dùng chéo, tài khoản tên Việt, có Avatar)', '- Tốc độ lên nhanh, max 10k like, không bảo hành', 'on', NULL, 'subgiare', '2022-07-15 22:03:13', '2022-07-15 22:03:13');
INSERT INTO `service_servers` VALUES (4, 'facebook', 'like-post-speed', NULL, 'sv7', '6', 'Sv2 (Like via chất lượng tốc độ ổn)', '- Tốc độ lên ổn ngày 3k -> 10k, max 100k like, bảo hành 7 ngày', 'on', NULL, 'subgiare', '2022-07-15 22:04:02', '2022-07-15 22:04:02');
INSERT INTO `service_servers` VALUES (5, 'facebook', 'like-post-speed', NULL, 'sv8', '4', 'Sv3 (Like người dùng chéo, tài khoản tên Việt, có Avatar', '- Tốc độ lên ổn, max 20k like, không bảo hành', 'on', NULL, 'subgiare', '2022-07-15 22:04:48', '2022-07-15 22:04:48');
INSERT INTO `service_servers` VALUES (6, 'facebook', 'like-post-speed', NULL, 'sv9', '2', 'Sv4 (Like clone giá rẻ)', '- Tốc độ chậm 1k - 2k/ngày, max 10k like, không bảo hành (có thể lên thiếu)', 'on', NULL, 'subgiare', '2022-07-15 22:05:21', '2022-07-15 22:05:21');
INSERT INTO `service_servers` VALUES (7, 'facebook', 'like-post-speed', NULL, 'sv10', '2.5', 'Sv5 (Like clone giá rẻ)', '- Tốc độ nhanh 1k/ngày, max 1k like, không bảo hành (có thể lên thiếu)', 'on', NULL, 'subgiare', '2022-07-15 22:06:00', '2022-07-15 22:06:00');
INSERT INTO `service_servers` VALUES (8, 'facebook', 'like-post-speed', NULL, 'sv11', '2.5', 'Sv7 (Like clone giá rẻ)', '- Tốc độ nhanh 1k/ngày, mỗi ngày mua được 1k - max 3k like, không bảo hành (có thể lên thiếu)', 'on', NULL, 'subgiare', '2022-07-15 22:07:19', '2022-07-15 22:07:19');
INSERT INTO `service_servers` VALUES (9, 'facebook', 'sub-vip', NULL, 'sv1', '2.5', 'Sv1 (Sub ảo, không hỗ trợ pro5, bảo hành 15 ngày)', '- Tốc độ cực nhanh, gần như lên ngay sau 5s - 1h, max không giới hạn, không chạy cho pro5, (đến đơn 100k chỉ trong 5p - 20p xong).', 'on', NULL, 'subgiare', '2022-07-15 22:08:37', '2022-07-15 22:08:37');
INSERT INTO `service_servers` VALUES (10, 'facebook', 'sub-vip', NULL, 'sv2', '2.5', 'Sv2 (Sub dạng mới, cực bá, không hỗ trợ pro5, bảo hành 7 ngày,độc quyền toàn thế giới (Hỗ trợ đơn to)', '- Tốc độ cực nhanh, gần như lên ngay sau 5s - 1h max không giới hạn, không chạy cho pro5, (đến đơn 100k chỉ trong 5p - 20p xong). SỐ LƯỢNG', 'on', NULL, 'subgiare', '2022-07-15 22:09:16', '2022-07-15 22:09:16');
INSERT INTO `service_servers` VALUES (11, 'facebook', 'sub-vip', NULL, 'sv3', '1.5', 'Sv3 (Sub ảo , không hỗ trợ pro5, độc quyền)', '- Tốc độ cực nhanh, gần như lên ngay sau 5s - 1h, max 3m / 1 ID Facebook, không chạy cho pro5.', 'on', NULL, 'subgiare', '2022-07-15 22:10:15', '2022-07-15 22:10:15');
INSERT INTO `service_servers` VALUES (12, 'facebook', 'sub-vip', NULL, 'sv4', '0.68', 'Sv4 (Sub dạng mới, cực bá, không hỗ trợ pro5, độc quyền toàn thế giới (Sale))', '- Tốc độ cực nhanh, gần như lên ngay sau 5s - 1h, max 1m / 1 ID Facebook, mỗi ngày mua được 10 đơn, không chạy cho pro5.', 'on', NULL, 'subgiare', '2022-07-15 22:10:59', '2022-07-15 22:10:59');
INSERT INTO `service_servers` VALUES (13, 'facebook', 'sub-quality', NULL, 'sv3', '9', 'Sv1 (Sub via, có thể có kết bạn)', '- Tốc độ lên ổn ngày 3k -> 5k, sub via nên gần như không tụt, loại sub này max 100k (bảo hành 1 tháng).', 'on', NULL, 'subgiare', '2022-07-15 22:12:16', '2022-07-15 22:12:16');
INSERT INTO `service_servers` VALUES (14, 'facebook', 'sub-quality', NULL, 'sv30', '65', 'Sv2 Sub người dùng thật (Cực Vip)', '- Tốc độ 500-3k/ngày Sub người đung thật có tương tác ( Cân các web khác )', 'on', NULL, 'subgiare', '2022-07-15 22:14:37', '2022-07-15 22:14:37');
INSERT INTO `service_servers` VALUES (15, 'facebook', 'sub-sale', NULL, 'sv6', '8', 'Sv1 (Clone nuôi, max 3m sub, bảo hành 30 ngày', '- Tốc độ ổn 1k -> 3k/ngày, không bảo hành (Clone đang hoạt động 99%)', 'on', NULL, 'subgiare', '2022-07-15 22:16:17', '2022-07-15 22:16:17');
INSERT INTO `service_servers` VALUES (16, 'facebook', 'sub-sale', NULL, 'sv5', '0.1', 'Sv2 (Clone nuôi, max 100k sub, sub khuyến mại)', '- Đang bảo trì', 'on', NULL, 'subgiare', '2022-07-15 22:17:43', '2022-07-15 22:17:43');
INSERT INTO `service_servers` VALUES (17, 'facebook', 'sub-speed', NULL, 'sv1', '8', 'Sv1 (Sub người dùng chéo, có kết bạn)', '- Sub via tốc độ 1k-3k/ngày không bảo hành ( hầu như không tụt )', 'on', NULL, 'subgiare', '2022-07-15 22:19:26', '2022-07-15 22:19:26');
INSERT INTO `service_servers` VALUES (18, 'facebook', 'like-page-quality', NULL, 'sv4', '9', 'Sv1 (Like via, cực kì chất lượng nhất)', '- Tốc độ lên ổn ngày 1k -> 3k, like via nên gần như không tụt, loại like này max 100k (bảo hành 1 tháng).', 'on', NULL, 'subgiare', '2022-07-15 22:20:39', '2022-07-15 22:20:39');
INSERT INTO `service_servers` VALUES (19, 'facebook', 'like-page-quality', NULL, 'sv3', '12', 'Sv2 (Like via, cực kì chất lượng nhất)', 'Tốc độ lên ổn ngày 3k -> 5k, like via nên gần như không tụt, loại like này max 100k (bảo hành 2 tháng).', 'on', NULL, 'subgiare', '2022-07-15 22:21:31', '2022-07-15 22:21:31');
INSERT INTO `service_servers` VALUES (20, 'facebook', 'like-page-sale', NULL, 'sv5', '8', 'Sv1 (Like clone nuôi, max 1m5 like, bảo hành 7 ngày, nếu chạy cho page pro5 thì sang mục sub sale cài nhé', '- Tốc độ ổn 1k -> 3k/ngày, không bảo hành.', 'on', NULL, 'subgiare', '2022-07-15 22:23:11', '2022-07-15 22:23:11');
INSERT INTO `service_servers` VALUES (21, 'facebook', 'like-page-speed', NULL, 'sv3', '20', 'Sv2 (Sub page, không có like, độc quyền cực VIP', '- Tốc độ cực nhanh, gần như lên ngay sau 5s - 1h max không giới hạn, (đến đơn 100k chỉ trong 5p - 20p xong), không bảo hành (hiện tại k tụt), gói này chuyên chạy cho ad break - bao xanh B1 trong studio, chỉ nhận page thường ko nhận pro5.', 'on', NULL, 'subgiare', '2022-07-15 22:24:20', '2022-07-15 22:24:20');
INSERT INTO `service_servers` VALUES (22, 'facebook', 'mat-live', NULL, 'sv5', '2', 'Sv1 (Giá rẻ - ổn định)', '- Hệ thống sẽ tăng từ 80% - 120% số mắt đã cài (Máy chủ thường).', 'on', NULL, 'subgiare', '2022-07-15 22:25:50', '2022-07-15 22:27:52');
INSERT INTO `service_servers` VALUES (23, 'facebook', 'mat-live', NULL, 'sv4', '1.5', 'Sv2 (Cực rẽ)', '- Hệ thống sẽ tăng từ 60% - 120% số mắt đã cài (Máy chủ cực rẻ).', 'on', NULL, 'subgiare', '2022-07-15 22:26:52', '2022-07-15 22:26:52');
INSERT INTO `service_servers` VALUES (24, 'facebook', 'view-video', NULL, 'sv2', '12', 'Sv1 (Vip, ngon nhất)', '- Tốc độ lên ổn', 'on', NULL, 'subgiare', '2022-07-15 22:28:45', '2022-07-15 22:28:45');
INSERT INTO `service_servers` VALUES (25, 'facebook', 'vip-like', NULL, 'sv4', '26', 'Sv1 (Like clone có avt)', '- Tốc độ lên từ từ như người thật, 5 bài 1 ngày.', 'on', NULL, 'subgiare', '2022-07-16 16:48:38', '2022-07-16 16:48:38');
INSERT INTO `service_servers` VALUES (27, 'facebook', 'vip-like', NULL, 'sv1', '32', 'Sv2 (Like Via có avt', '- Tốc độ nhanh, 5 bài 1 ngày.', 'on', NULL, 'subgiare', '2022-07-16 16:50:30', '2022-07-16 16:50:30');
INSERT INTO `service_servers` VALUES (28, 'facebook', 'vip-like', NULL, 'sv6', '22', 'Sv3 Like clone nuôi giá rẽ', '- Tốc độ ổn , 5-7 bài/ngày (Liên hệ Admin)', 'on', NULL, 'subgiare', '2022-07-16 16:52:06', '2022-07-16 16:52:06');
INSERT INTO `service_servers` VALUES (29, 'instagram', 'like-instagram', NULL, 'sv2', '2', 'Sv1 (Like tây, giá cực rẻ)', '- Tốc độ nhanh, không bảo hành, max 200k like, không bảo hành.', 'on', NULL, 'subgiare', '2022-07-16 16:53:28', '2022-07-16 16:53:28');
INSERT INTO `service_servers` VALUES (30, 'instagram', 'like-instagram', NULL, 'sv3', '13', 'Sv2 (Like người dùng chéo, tài khoản tên Việt, có Avatar)', '- Tốc độ 1k -> 20k/ ngày, không bảo hành, max 200k like.', 'on', NULL, 'subgiare', '2022-07-16 16:54:24', '2022-07-16 16:54:24');
INSERT INTO `service_servers` VALUES (31, 'instagram', 'sub-instagram', NULL, 'sv2', '11', 'Sv1 (Sub tây, giá cực rẽ)', '- Tốc độ ổn, không bảo hành, max 300k sub (có thể lên thiếu).', 'on', NULL, 'subgiare', '2022-07-16 16:55:38', '2022-07-16 16:55:38');
INSERT INTO `service_servers` VALUES (32, 'instagram', 'sub-instagram', NULL, 'sv8', '19', 'Sv2 (Sub người dùng chéo, tài khoản tên Việt, có Avatar)', '- Tốc độ ổn, không bảo hành, max 100k sub.', 'on', NULL, 'subgiare', '2022-07-16 16:56:37', '2022-07-16 16:56:37');
INSERT INTO `service_servers` VALUES (33, 'tiktok', 'tym-tiktok', NULL, 'sv7', '28', 'Sv1 (Like việt, người dùng thật)', '- Tốc độ 500 - 3k like / ngày, tài nguyên max không giới hạn ,không bảo hành', 'on', NULL, 'subgiare', '2022-07-16 16:58:36', '2022-07-16 16:58:36');
INSERT INTO `service_servers` VALUES (34, 'tiktok', 'comment-tiktok', NULL, 'sv1', '220', 'Sv1 (Comment via việt)', '- Tốc độ ổn, tài nguyên max 7k bình luận.', 'on', NULL, 'subgiare', '2022-07-16 16:59:59', '2022-07-16 16:59:59');
INSERT INTO `service_servers` VALUES (35, 'tiktok', 'share-tiktok', NULL, 'sv1', '22', 'Sv1 (Share tây giá rẻ)', '- Tốc độ lên ổn, tài nguyên max 500k share, không bảo hành, có thể lên thiếu hoặc bị tụt trong quá trình tăng.', 'on', NULL, 'subgiare', '2022-07-16 17:00:53', '2022-07-16 17:00:53');
INSERT INTO `service_servers` VALUES (36, 'tiktok', 'share-tiktok', NULL, 'sv2', '0.1', 'Sv2 (Share ảo giá rẻ)', '- Tốc độ cực nhanh, tài nguyên max không giới hạn, không bảo hành.', 'off', NULL, 'subgiare', '2022-07-16 17:01:26', '2022-07-16 17:01:36');
INSERT INTO `service_servers` VALUES (37, 'facebook', 'sub-vip', NULL, 'sv5', '3', 'Sv5 Sub ảo (Cực VIP)', '- Tốc độ 100k trong 5-20p , max không giới hạn', 'on', NULL, 'subgiare', '2022-07-19 01:13:23', '2022-07-19 01:13:23');
INSERT INTO `service_servers` VALUES (38, 'facebook', 'like-gia-re', '123', 'sv2', '123', '123', '123', 'on', NULL, 'baostar', '2023-11-06 22:38:54', '2023-11-06 22:38:54');

-- ----------------------------
-- Table structure for site_configs
-- ----------------------------
DROP TABLE IF EXISTS `site_configs`;
CREATE TABLE `site_configs`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 29 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of site_configs
-- ----------------------------
INSERT INTO `site_configs` VALUES (1, 'domain', 'TANGFB.COM');
INSERT INTO `site_configs` VALUES (2, 'logoWeb', 'https://i.imgur.com/dYNUAAT.png');
INSERT INTO `site_configs` VALUES (3, 'favicon', 'https://i.imgur.com/8GJrJe4.png');
INSERT INTO `site_configs` VALUES (4, 'transfer_code', 'tangfb');
INSERT INTO `site_configs` VALUES (5, 'card_type', 'thesieure');
INSERT INTO `site_configs` VALUES (6, 'parther_id', '5288087561');
INSERT INTO `site_configs` VALUES (7, 'parther_key', '0e5e49521bc46cf3a28b41ab265472d8');
INSERT INTO `site_configs` VALUES (8, 'thongbao', 'Cần Sub người thật có tương tác liên hệ Admin Zalo 08282.555.01');
INSERT INTO `site_configs` VALUES (9, 'token_facebook', 'null');
INSERT INTO `site_configs` VALUES (10, 'api_tele', '1');
INSERT INTO `site_configs` VALUES (11, 'id_chat_tele', '1');
INSERT INTO `site_configs` VALUES (12, 'charge_level_TV', '10');
INSERT INTO `site_configs` VALUES (13, 'charge_level_CTV', '100000');
INSERT INTO `site_configs` VALUES (14, 'charge_level_DL', '500000');
INSERT INTO `site_configs` VALUES (15, 'charge_level_NPP', '1000000');
INSERT INTO `site_configs` VALUES (16, 'discount_TV', '0.5');
INSERT INTO `site_configs` VALUES (17, 'discount_CTV', '1');
INSERT INTO `site_configs` VALUES (18, 'discount_DL', '1');
INSERT INTO `site_configs` VALUES (19, 'discount_NPP', '1');
INSERT INTO `site_configs` VALUES (20, 'card_discount', '1');
INSERT INTO `site_configs` VALUES (21, 'admin_name', 'Phạm Quốc Duy');
INSERT INTO `site_configs` VALUES (22, 'facebook_admin', 'https://www.facebook.com/quocduy2202');
INSERT INTO `site_configs` VALUES (23, 'zalo_admin', 'https://zalo.me/0828255501');
INSERT INTO `site_configs` VALUES (24, 'subgiare', 'show');
INSERT INTO `site_configs` VALUES (25, 'baostar', 'show');
INSERT INTO `site_configs` VALUES (26, 'logo', 'https://i.imgur.com/8GJrJe4.png');
INSERT INTO `site_configs` VALUES (27, 'token_subgiare', 'eyJpdiI6IkhiR3NaOGxCUWNkNTFXUEhsbnhNV2c9PSIsInZhbHVlIjoid1FBaVp6cVl2aVFycW5PdHNUL3pRd25rYkRaeEFvVjhlbjhvNjRCcXBnWThmS0NoVm5BUTFYQS92STQ1MXZjdHJrWm9qNkVYWkZyWVVZQTFvMHRjYmE4aDNXTHdaYlJweGM2TWQveVdua0V6Q0ZBMk43OHhnMlN2VWZYK28xYzhYdnNnN0Y0TnpLeHZJbDVKVk9tcGxBPT0iLCJtYWMiOiI4NmNjZTk3YzUxMWU2ZGMyZjVmZTY4M2E1NWJiNjRmNjcxZWU5ODg3MWUwMzlkZjNhZThjOGU2NWRjYjAyMjFiIiwidGFnIjoiIn0');
INSERT INTO `site_configs` VALUES (28, 'token_baostar', 'null');

-- ----------------------------
-- Table structure for sub_webs
-- ----------------------------
DROP TABLE IF EXISTS `sub_webs`;
CREATE TABLE `sub_webs`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `api_token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `domain` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sub_webs
-- ----------------------------

-- ----------------------------
-- Table structure for user_buy_accounts
-- ----------------------------
DROP TABLE IF EXISTS `user_buy_accounts`;
CREATE TABLE `user_buy_accounts`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `acc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `notice` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user_buy_accounts
-- ----------------------------
INSERT INTO `user_buy_accounts` VALUES (1, 'clone', 'admin', NULL, 'Thông tin', '2022-07-27 21:47:14', '2022-07-27 21:47:14');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `money` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_charge` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_minus` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `banned` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `time_banned` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `api_token` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_username_unique`(`username`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 36 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'adminquocduy', 'adminquocduy', 'admin@admin.com', '$2a$12$ZBHiDHLqNJXry5fvBfrA0OwjpXTSH0LZnNx1RVA6XNfPpiGT9vEhq', 'admin', '9997000', '0', '3000', '0', NULL, '103.199.56.190', 'QQUikK2yttu55VSLzuY8ZM1MdfmhEneKKCuFGeTrisuwEgGrHsirhphqM41C', NULL, '2022-07-15 08:10:30', '2022-07-19 01:14:00');
INSERT INTO `users` VALUES (2, 'Đoan Minh Quân', 'admin', 'acskid7@yahoo.com', '$2y$10$Gydd1TXAeZbpAvtb2AFGhOZXW6XONAzR.Noq6W.yTfSBg1xxtX.lK', 'member', '9999998', '9999999', '3000', '0', NULL, '113.168.50.181', 'FuLiI05jMMER85gaPVWNieRrriRNFAatdQ79TURWDqzdEEWRhP9vOQtVlOZf', NULL, '2022-07-15 18:15:04', '2022-07-27 21:47:14');
INSERT INTO `users` VALUES (3, 'gg gg', 'viet176', 'nichosydne946499@gmail.com', '$2y$10$MLfHKwJ05N514i/fqCm5kuVSBYrkzuEczpH3iH2I/YwF0fwWGP2ta', 'member', '0', '0', '0', '0', NULL, '1.52.248.27', 'C43bJN4Z5qVqXeC6shAqFUUgED48wpKRnLQvkj1yHwebOXNvXZeXCnULBvSc', NULL, '2022-07-15 18:21:30', '2022-07-15 18:21:30');
INSERT INTO `users` VALUES (4, 'toanstar', 'toanstarvn', 'thuydieu1234501@gmail.com', '$2y$10$yxLuw1vVY7k1MsSRO0kzlOqTeHgzf1yc/4S6Zsj/LS8cioLL/pJYi', 'member', '0', '0', '0', '0', NULL, '14.237.173.10', 'ONzMGFX7FmjJ8BYVL2hj98DvB5EzHkKX0ALEklyCFVzlXbQLbb0NVdkMhS1y', NULL, '2022-07-15 19:41:04', '2022-07-15 19:41:04');
INSERT INTO `users` VALUES (5, 'Trần Đức Khải', 'kduc2022', 'kduc2022@gmail.com', '$2y$10$p82qoQ/26gtQdqs9iyot7eCumMvi.6ewAZymH8z9CEgJ.U20w7FSa', 'member', '0', '0', '0', '0', NULL, '14.166.220.129', 'cyLAVqPiKLUDzEvaelLbvmyRowckJmuVBMN4c3RTMs10AeQfpLKT2Chr78Ts', NULL, '2022-07-15 20:01:57', '2022-07-15 20:01:57');
INSERT INTO `users` VALUES (6, 'NGUYEN HUU DANG', 'Dannguyen123', 'doyoulovemev17.net@gmail.com', '$2y$10$AVLNRI4B9zORLpQo7ahkE.QK6xZi5/gCwDAeWXnyAruFomTyfZdw2', 'member', '0', '0', '0', '0', NULL, '125.235.189.6', 'dN0R0u0pUThDw3dPRtCqh88zMVA6FtHXrTSnml9cBt05AfIM8anC6JA3iN5X', NULL, '2022-07-15 23:39:36', '2022-07-15 23:39:36');
INSERT INTO `users` VALUES (7, 'ffffrrtttttrr', 'ffffrrtttttrr', 'ffffrrtttttrr@t.t', '$2y$10$ctq8gPcOUV.zFL74.3RjPOHxiUuQaHBN2uZnSIH1wsdsaVcSNrtkq', 'member', '0', '0', '0', '0', NULL, '113.168.202.92', '9pgvFYDLuCwrUp8SMX9LyqyJeQPToCZrmlcXzEY7XWiJDyQZKamjyvf1UmxE', NULL, '2022-07-16 00:07:42', '2022-07-16 00:07:42');
INSERT INTO `users` VALUES (8, 'Nznznmzmzms', 'Nznznmzmzms', 'Nznznmzmzms@ha', '$2y$10$BDOfnLv6gnfcxdortSj.eOCFRmcXm77xT2jtBS5DS9qAExyjJC0K.', 'member', '0', '0', '0', '0', NULL, '171.249.2.188', 'x3DCLRcZ3ds6AtkdCyiHw8z6eKKuQGi2XThV2nL9XmbW3nvEbbWWQKaCo6FH', NULL, '2022-07-16 01:12:46', '2022-07-16 01:12:46');
INSERT INTO `users` VALUES (9, 'DỦ ĐZ', 'tandu05', 'tandulehuynh@gmail.com', '$2y$10$7r7SMm7RYPOdLf.CWuCjZ.qn.djrpJeJX4Shy8AOJKdiplk6b9Kwu', 'member', '0', '0', '0', '0', NULL, '113.185.73.181', '5VpIwN2djGyWuMnk9axhhuzgn9BWwkIeveK6zgNMSmUjQ1igu7Plib0Ug7iu', NULL, '2022-07-16 17:53:01', '2022-07-16 17:53:01');
INSERT INTO `users` VALUES (10, 'Hoàng Hải Long', 'Hoanghailong04', 'hoanglongedit@gmail.com', '$2y$10$Y9V3aM.xeufyCaJQERzI8.6txYis891CoJfoqqjFrezlm8HZZAOKy', 'member', '0', '0', '0', '0', NULL, '27.67.39.16', 'LCrWm5mWxUipoVE8Gk2Ykdalcckfn8ImQhyl4Fu66Q0bWHvO0jJ5hxpBcrth', NULL, '2022-07-16 18:08:17', '2022-07-16 18:08:17');
INSERT INTO `users` VALUES (12, 'Hoàng Thuận', 'hoangthuank55', 'duchau.student@gmail.com', '$2y$10$tLqILggtAlPFv5/f7p.s..VsjLHCIXmOanF0HzKCMtOTMHWls/ecK', 'member', '9600', '0', '3400', '0', NULL, '14.188.207.68', 'IBhkPXLwfpfI3bIyQHQEtRLf3nnUlhpwm6HxQYigRDuBy5fDDjP6KfXFOvF2', NULL, '2022-07-16 21:58:33', '2022-07-17 08:27:05');
INSERT INTO `users` VALUES (13, 'Le duc hoang phuc', 'Phucok', 'checkmmo.net@gmail.com', '$2y$10$31.Igoc3uU3DaG/NhmNRfOBwEhnFG/AMh6xv8GXo83fsHvSwx8yc2', 'member', '0', '0', '0', '0', NULL, '14.236.152.56', 'qmN3mPj0LFmy1pd1O8O2EdOkPOCQ6oqYMZK2rYP6qHSBfsoZCkZikzPqC4N9', NULL, '2022-07-16 22:09:08', '2022-07-16 22:09:08');
INSERT INTO `users` VALUES (14, 'Nguyễn Văn Hoà', 'vhoa203', 'vhoa203.info@gmail.com', '$2y$10$F9SnW4NxwU/D1n/DPF7iEOsKsZB2eAzGEfqw8IruJ3yKyheDWFYvu', 'member', '0', '0', '0', '0', NULL, '27.67.141.155', 'rrKS7kZ7bysjM4V6LMbKe79eDCGyLE3t9aSz2etYbzC0Yr1vl74mpvi1qpxT', NULL, '2022-07-16 23:29:30', '2022-07-16 23:29:30');
INSERT INTO `users` VALUES (15, 'ng duy hieu', 'hieu1209', 'hieulo20072@gmail.com', '$2y$10$8O7pmGdzXDEFfoOTwSl7g.MnTkesbOHGAmWIklcX9YBL8dQBFV0xq', 'member', '0', '0', '0', '0', NULL, '1.55.51.35', 'SRgQA8ookx12TwryGt0pI7g0OiDAaIyeM8nqyE2bc2tpf1vvBWpzMNsblHBI', NULL, '2022-07-17 01:04:01', '2022-07-17 01:04:01');
INSERT INTO `users` VALUES (16, 'MoMo', 'smsmk365', 'dupnoz@smsmk365.com', '$2y$10$61P9rMwxridWyRm8oAH0A.l5LJj/sRVya8e7ihdsoeUGzRELRijmO', 'member', '0', '0', '0', '0', NULL, '27.75.187.51', 'RKRes4VA0HwtMBLTKklesOigvDmsCHOJ8HinEzHEidCgEwTUHFqpdIcM4xJP', NULL, '2022-07-17 04:59:49', '2022-07-17 04:59:49');
INSERT INTO `users` VALUES (17, 'Bùi Thái hiển', 'Hienth', 'buithaihien.user@gmail.com', '$2y$10$KkGnssMVCIGKdrIacG3mnODnbdR0QlOCcVLrfIVeKZB8zgF2Zl6BC', 'member', '0', '0', '0', '0', NULL, '123.22.167.195', 'DwiT7hVjVqr9ZY7swyiVhuW6Dh1shi9ztLPq6BaJTSUCjHf6LuxVQg04z9uZ', NULL, '2022-07-17 09:40:49', '2022-07-17 09:40:49');
INSERT INTO `users` VALUES (18, 'Nguyễn văn an', 'TIiennguyenn2', 'nguyenthixuyen624@gmail.com', '$2y$10$CjkVg9TikGPF4qlc1YEs0ezwQ58tGSXyNuCyCYoxOAKqFFiQ6JSku', 'member', '0', '0', '0', '0', NULL, '58.186.130.29', 'QvCOIqDSz44SxBoKOLDfsoytcC42Rl8q0uNL5YpyfeEUBsZekCJCGPMz9Y7n', NULL, '2022-07-17 14:29:26', '2022-07-17 14:29:26');
INSERT INTO `users` VALUES (19, 'Nguyễn thanh bìnhok', 'Thanhbinhdz', 'acctiktok2ok@gmail.com', '$2y$10$0S/UBSgjxuS2adNeOHia8.lLQu0vvPfV1w91AFJwTEY36SDMc.WNe', 'member', '60260', '0', '17740', '0', NULL, '123.16.126.171', '79QUQhqQJyymSmysVT8UXdyt2DnaaSJPmPa9ObvhA9SmhwDNHv9TMfmGhKbp', NULL, '2022-07-17 19:09:53', '2022-07-21 02:00:49');
INSERT INTO `users` VALUES (20, 'Trần Văn Hoàn', 'vip001', 'deptraiphaithe27@gmail.com', '$2y$10$yIKfqhnmfg3kIdG8cmEcqeexkFEN48xPIMnfD1AtvR5eLkrnCSsKi', 'member', '0', '0', '0', '0', NULL, '14.163.24.158', 'rTT8rXblu8ECsFUXRob0hQQiMhkgan3VVMghpHJTKv9DoGXFAIrM5LYx1LKA', NULL, '2022-07-17 22:23:53', '2022-07-17 22:23:53');
INSERT INTO `users` VALUES (21, 'Snsjsj', 'Jwkekwks', 'Nsjwjsn@gmail.com', '$2y$10$.Kd9E9x3fUM2U4rkNqafu.P4f6TIPY3CAOAC4XNWCYgyVIfd6.abC', 'member', '0', '0', '0', '0', NULL, '1.53.208.157', 'LdtVcyfhLY4tC2YT4ODO3yYqemoZDqpnihejxrrrsMuQMeX1eqaxWFPsqlx7', NULL, '2022-07-18 15:21:13', '2022-07-18 15:21:13');
INSERT INTO `users` VALUES (22, 'Admin dnh', 'hieutrunggian2003', 'hieutrunggian2003@gmail.com', '$2y$10$L6mzXuv1sPckXDmxhlMzWeP/eXpKUCjlFCJmhOJGMG233.pnNWe5e', 'member', '0', '0', '0', '0', NULL, '1.53.208.157', 'V8W4o0uRBFLwmfhfFmiUBwijrp3QRizIiwYtQDz8iv8IpyExyuNoOnueYDgY', NULL, '2022-07-18 15:21:44', '2022-07-18 15:21:44');
INSERT INTO `users` VALUES (23, 'Bui Thien', 'buiphuthien1234', 'buiphuthien9h@gmail.com', '$2y$10$HrjUx/b4HLUwKkmAvUF0oufDqZqAoZrQj00RlM88pVNqqcW4nM0EK', 'member', '0', '0', '0', '0', NULL, '14.174.221.213', 'LStAorx5M40e6kNv4Zf1VpPU1D6E6Kk1mssx2Tdjy4Fyz9JadPJGl12vOjFQ', NULL, '2022-07-18 20:46:40', '2022-07-18 20:46:40');
INSERT INTO `users` VALUES (24, 'nap_atm', 'omthungom', 'eel@gmail.com', '$2y$10$kn3lsKOlFRmw54tjCKPUq.Jl9q3OEeh86GWStKOXLVZI5kxqXZYIq', 'member', '0', '0', '0', '0', NULL, '171.234.14.249', '4f19pQ4ljKwQMdSVCzo2H4pKLWTriQzyPkcQM1onHvGQzrRzCuSIkMnoUt0f', NULL, '2022-07-18 22:44:35', '2022-07-18 22:44:35');
INSERT INTO `users` VALUES (25, 'Tuấn Tuấn', 'Tuan1994', 'thaomb1994@gmail.com', '$2y$10$7lzQagvs0C6EplJ.eI2KE.dhBaFaVQvVLA106Ioa6GTNR.AF1URY.', 'member', '0', '0', '0', '0', NULL, '59.153.245.144', 'Ut27J3cl07FlbAAHl2W83Jc78O9bV4EZDzDEBB97k472wShA1hVDrxt2FFzi', NULL, '2022-07-19 02:21:28', '2022-07-19 02:21:28');
INSERT INTO `users` VALUES (26, 'TRẦN Văn KhOa', 'mathivinh1', 'ma.thi.vinh1@gmail.com', '$2y$10$YrJf3cVrMYyya8FDP0YhuuzmhVFGK98cV1JTjYKTZI3tBaJhLJwcu', 'member', '0', '0', '0', '0', NULL, '125.235.185.179', 'K5USnA1ZlI6dp2B9PG36kbAEd6gQktE9wA2515TbqY8BHUngZ1HthVmtagaI', NULL, '2022-07-19 05:10:43', '2022-07-19 05:10:43');
INSERT INTO `users` VALUES (27, 'Bùi Văn Quyết', 'quyetcoder2k3', 'quyetcongtu01@gmail.com', '$2y$10$z8fKQJfvrfKtOZHlPV25fOsSIiTA567ivbkqFYzN5.kt/kRePlePW', 'member', '0', '0', '0', '0', NULL, '171.251.237.32', 'veNgoQNjH2CdzpdVbQOivkaCsj1RdWVPRxp099E1u9t7rWgXSxI8egEXz9nk', NULL, '2022-07-19 06:59:11', '2022-07-19 06:59:11');
INSERT INTO `users` VALUES (28, 'Pham minh hieu', 'Hieumapkkk', 'Khyfbjuv@yahoo.com', '$2y$10$VlTORsdnBdUP5rtiStdYO.sgn4VXVYgd7YuQdYE3EfCRcf/0AQ5Gq', 'member', '0', '0', '0', '0', NULL, '14.237.137.209', 'kUaTEpylVn6ZGlv5X28EQK9zviH2JYd7hPGQyyKmtvrN8FA1PyQH9MqJjc1M', NULL, '2022-07-19 13:49:29', '2022-07-19 13:49:29');
INSERT INTO `users` VALUES (29, 'Kowshik Da', 'Kowshik69', 'agentfreefire2020@gmail.com', '$2y$10$aM2VTASZiFni.hj2UU90RucqWsafWWA7VYCL8hPg4O3m/qg7HXiB.', 'member', '0', '0', '0', '0', NULL, '103.153.52.13', '8Zxzjirrnidqoz9jXjtkCg7rTgqlPX9NHC7WqvaC9hAXRjipCR1G2C5oJ6lg', NULL, '2022-07-20 00:57:24', '2022-07-20 00:57:24');
INSERT INTO `users` VALUES (30, 'Shhâhhhâhhhah', 'Tttttt', 'Hhshhhhhh@hhhh.com', '$2y$10$OW4sPZZUuUJiDBc4YUaDmOh8n/t2dh/ob0LQloo9PY.Voc2yXy8Yq', 'member', '0', '0', '0', '0', NULL, '116.98.0.69', 'RA6tIVuEdaAGBBX4FrjziUTBGdiK0PSlPKhlJfxQX4nj4yh7gdksZ4cHgyIB', NULL, '2022-07-20 07:06:39', '2022-07-20 07:06:39');
INSERT INTO `users` VALUES (31, 'Nguyễn Văn Thịnh', 'bhdtbgaming12', 'bhdtbgaming12@gmail.com', '$2y$10$IXpJp2sA.5SJfJY4cqkEUOGu9uzUV1vOX50H03Msin/Y6Qn1.OrPu', 'member', '0', '0', '0', '0', NULL, '118.69.87.117', '54FgjcoI51m4QkqeKAdOkPg5i8UEr88THuPJNKbHYttnbncVVLR4T9KyU6U2', NULL, '2022-07-20 07:07:03', '2022-07-20 07:07:03');
INSERT INTO `users` VALUES (32, 'okokok', 'okokok', 'okokok@gmail.com', '$2y$10$a4rJqfZtBazhV.ct56zC.ecq39nSB6wHvYKChgr6TfzCuKY6BDW7W', 'member', '0', '0', '0', '0', NULL, '116.101.202.141', 'a0v1bs1fqshoVBQaUYrlFuTQpGnWZ6t550faWzWTJat9VsAf87a6ZupbaZzv', NULL, '2022-07-20 07:58:03', '2022-07-20 07:58:03');
INSERT INTO `users` VALUES (33, 'Nguyễn Đức Việt', 'Ducviet0511', 'nguyenducviet05113333@gmail.com', '$2y$10$x2nUXK44lz1eRLwV60SzsexPStfHP491AEI4DMUmSNODZ4TXVOh.S', 'member', '0', '0', '0', '0', NULL, '14.170.114.73', 'DbSvD683pVZ29u64svAn8aB2CC1sOya0xmsxwPDuKQIYWvUnWo09QUIqUmUN', NULL, '2022-07-20 11:57:43', '2022-07-20 11:57:43');
INSERT INTO `users` VALUES (34, 'Thanh long', 'Thanhlong1', 'Abika0809@gmail.com', '$2y$10$vZRxL8wsWAaUzA.GDBLBtOJDTt9pinqD9CG86UMgKZZ51KLNnr8hy', 'member', '0', '0', '0', '0', NULL, '42.113.252.35', 'FguLnM2mbwEa6kA2InB4lOhUmE4rmVOwjeHDyw8TeUsMrBrNLNEtREtJcyJ2', NULL, '2022-07-20 12:12:07', '2022-07-20 12:12:07');
INSERT INTO `users` VALUES (35, 'lâm văn', 'thuyen200', 'thuyendi2004@gmail.com', '$2y$10$ymkbjj7m3uqA0TUkHXctSu95jvvjdieCIS.gkpiIsInU2It31NoMq', 'member', '0', '0', '0', '0', NULL, '171.234.11.179', 'TAtSbBoxjyMxkxaoMAbNSNtbCxqR5NogJvgVgWlhWlq6sSb1dwUwJBqo0CnN', NULL, '2022-07-22 02:14:11', '2022-07-22 02:14:11');

SET FOREIGN_KEY_CHECKS = 1;
