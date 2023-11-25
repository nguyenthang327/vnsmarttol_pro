/*
 Navicat Premium Data Transfer

 Source Server         : LOCALHOST
 Source Server Type    : MySQL
 Source Server Version : 80030 (8.0.30)
 Source Host           : localhost:3306
 Source Schema         : vnsmarttol_pro

 Target Server Type    : MySQL
 Target Server Version : 80030 (8.0.30)
 File Encoding         : 65001

 Date: 19/11/2023 15:36:53
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for banker
-- ----------------------------
DROP TABLE IF EXISTS `banker`;
CREATE TABLE `banker`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `bank_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tên ngân hàng',
  `card_holder` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Chủ thẻ',
  `account_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Số tài khoản',
  `note` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Nội dung',
  `min_bank` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT 'Số tiền chuyển tối thiểu',
  `discount` int UNSIGNED NOT NULL DEFAULT 100 COMMENT 'Tỷ giá',
  `url_image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL COMMENT 'URL ảnh',
  `user_bank` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Tài khoản ngân hàng để đăng nhập',
  `password_bank` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Mật khẩu ngân hàng để đăng nhập',
  `token` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL COMMENT 'Token đối tác vd: Web2M',
  `bank_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Mã bank',
  `identity_website` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Mã định danh website',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of banker
-- ----------------------------

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `sort` int NULL DEFAULT 0 COMMENT 'Thứ tự hiển thị',
  `icon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Class icon của fontawesome',
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Tên danh mục',
  `display_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Tên hiển thị danh mục',
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Đường dẫn danh mục',
  `content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL COMMENT 'Nội dung danh mục',
  `visible` tinyint(1) NULL DEFAULT 0 COMMENT 'Trạng thái hiển thị',
  `type_category` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Danh mục của dạng: facebook, tiktok,...',
  `identity_website` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Mã định danh website',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `categories_slug_unique`(`slug` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES (1, 0, 'fas fa-hand-point-up', 'Buff Bot', 'Facebook Bot', 'facebook-bot', NULL, 1, 'facebook', 'viplike.org', '2023-11-19 12:42:24', '2023-11-19 12:42:24');
INSERT INTO `categories` VALUES (2, 0, 'fas fa-hand-point-up', 'Buff Facebook', 'Facebook Buff', 'facebook-buff', NULL, 1, 'facebook', 'viplike.org', '2023-11-19 12:42:24', '2023-11-19 12:42:24');
INSERT INTO `categories` VALUES (3, 0, 'fas fa-hand-point-up', 'Facebook Vip', 'Facebook Vip', 'facebook-vip', NULL, 1, 'facebook', 'viplike.org', '2023-11-19 12:42:24', '2023-11-19 12:42:24');
INSERT INTO `categories` VALUES (4, 0, 'fas fa-hand-point-up', 'Facebook Ad Break', 'Facebook Ad Break', 'facebook-ad-break', NULL, 1, 'facebook', 'viplike.org', '2023-11-19 12:42:24', '2023-11-19 12:42:24');

-- ----------------------------
-- Table structure for contacts
-- ----------------------------
DROP TABLE IF EXISTS `contacts`;
CREATE TABLE `contacts`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `content` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `identity_website` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Mã định danh website',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of contacts
-- ----------------------------

-- ----------------------------
-- Table structure for discounts
-- ----------------------------
DROP TABLE IF EXISTS `discounts`;
CREATE TABLE `discounts`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `code_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount_percent` int NULL DEFAULT NULL,
  `limit_per_user` int NOT NULL,
  `enable` tinyint NULL DEFAULT 1,
  `min_order` int NULL DEFAULT NULL,
  `max_discount` int NOT NULL,
  `identity_website` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Mã định danh website',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of discounts
-- ----------------------------

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for histories
-- ----------------------------
DROP TABLE IF EXISTS `histories`;
CREATE TABLE `histories`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL COMMENT 'Mã người dùng',
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL COMMENT 'Link chạy dịch vụ của người dùng',
  `uid` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `msg` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL COMMENT 'Tên log',
  `count` int NULL DEFAULT NULL COMMENT 'Số lượng',
  `price` bigint NOT NULL COMMENT 'Giá dịch vụ hoặc số tiền cộng, trừ, hoàn',
  `price_current` bigint NOT NULL COMMENT 'Tiền hiện tại của user',
  `price_left` bigint NOT NULL COMMENT 'Số tiền sau khi sử dụng dịch vụ hoặc cộng, trừ, hoàn',
  `math` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Dấu toán tử để hiển thị ra view',
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Loại dịch vụ',
  `server` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Server dịch vụ',
  `time` timestamp NULL DEFAULT NULL,
  `site` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `original` int NULL DEFAULT NULL,
  `present` int NULL DEFAULT NULL,
  `note` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL COMMENT 'Ghi chú của khách hàng',
  `admin_note` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL COMMENT 'Ghi chú của admin',
  `status` tinyint NULL DEFAULT NULL,
  `data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL COMMENT 'Dùng cho các dịch vụ comment',
  `refund_count` int NULL DEFAULT NULL COMMENT 'Số lượng hoàn',
  `refund_subtraction` bigint NULL DEFAULT NULL COMMENT 'Số tiền giao dịch hoàn',
  `other` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `order_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `order_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `type_service` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `identity_website` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Mã định danh website',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of histories
-- ----------------------------

-- ----------------------------
-- Table structure for jobs
-- ----------------------------
DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED NULL DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `jobs_queue_index`(`queue` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of jobs
-- ----------------------------

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 89 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (8, '2023_10_31_144055_add_some_columns_to_users_table', 1);
INSERT INTO `migrations` VALUES (70, '2014_10_12_000000_create_users_table', 2);
INSERT INTO `migrations` VALUES (71, '2014_10_12_100000_create_password_resets_table', 2);
INSERT INTO `migrations` VALUES (72, '2019_08_19_000000_create_failed_jobs_table', 2);
INSERT INTO `migrations` VALUES (73, '2019_12_14_000001_create_personal_access_tokens_table', 2);
INSERT INTO `migrations` VALUES (74, '2023_10_29_030414_create_permission_tables', 2);
INSERT INTO `migrations` VALUES (75, '2023_10_29_101038_create_otps_table', 2);
INSERT INTO `migrations` VALUES (76, '2023_10_29_123037_create_jobs_table', 2);
INSERT INTO `migrations` VALUES (77, '2023_11_02_064456_create_histories_table', 2);
INSERT INTO `migrations` VALUES (78, '2023_11_02_151255_create_recharge_card_histories_table', 2);
INSERT INTO `migrations` VALUES (79, '2023_11_02_190126_create_payments_table', 2);
INSERT INTO `migrations` VALUES (80, '2023_11_03_014426_create_discounts_table', 2);
INSERT INTO `migrations` VALUES (81, '2023_11_03_015238_create_contacts_table', 2);
INSERT INTO `migrations` VALUES (82, '2023_11_03_015335_create_questions_table', 2);
INSERT INTO `migrations` VALUES (83, '2023_11_03_015541_create_notifications_table', 2);
INSERT INTO `migrations` VALUES (84, '2023_11_04_084202_create_banker_table', 2);
INSERT INTO `migrations` VALUES (85, '2023_11_05_100202_create_settings_table', 2);
INSERT INTO `migrations` VALUES (86, '2023_11_12_110106_create_categories_table', 2);
INSERT INTO `migrations` VALUES (87, '2023_11_12_111728_create_services_table', 2);
INSERT INTO `migrations` VALUES (88, '2023_11_12_184937_create_service_packs_table', 2);

-- ----------------------------
-- Table structure for model_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE `model_has_permissions`  (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`, `model_id`, `model_type`) USING BTREE,
  INDEX `model_has_permissions_model_id_model_type_index`(`model_id` ASC, `model_type` ASC) USING BTREE,
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of model_has_permissions
-- ----------------------------

-- ----------------------------
-- Table structure for model_has_roles
-- ----------------------------
DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE `model_has_roles`  (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`role_id`, `model_id`, `model_type`) USING BTREE,
  INDEX `model_has_roles_model_id_model_type_index`(`model_id` ASC, `model_type` ASC) USING BTREE,
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of model_has_roles
-- ----------------------------
INSERT INTO `model_has_roles` VALUES (1, 'App\\Models\\User', 1);
INSERT INTO `model_has_roles` VALUES (2, 'App\\Models\\User', 2);

-- ----------------------------
-- Table structure for notifications
-- ----------------------------
DROP TABLE IF EXISTS `notifications`;
CREATE TABLE `notifications`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `is_pin` tinyint(1) NULL DEFAULT NULL,
  `is_visible` tinyint(1) NULL DEFAULT NULL,
  `content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `identity_website` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Mã định danh website',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of notifications
-- ----------------------------

-- ----------------------------
-- Table structure for otps
-- ----------------------------
DROP TABLE IF EXISTS `otps`;
CREATE TABLE `otps`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expires_at` timestamp NOT NULL,
  `status` tinyint NOT NULL DEFAULT 0 COMMENT 'Trạng thái sử dụng',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of otps
-- ----------------------------

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email` ASC) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for payments
-- ----------------------------
DROP TABLE IF EXISTS `payments`;
CREATE TABLE `payments`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` timestamp NULL DEFAULT NULL,
  `note` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `user_read` tinyint(1) NULL DEFAULT NULL,
  `is_auto` tinyint(1) NULL DEFAULT NULL,
  `payment_source` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `extra` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `auto_banks_id` int NULL DEFAULT NULL,
  `identity_website` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Mã định danh website',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of payments
-- ----------------------------

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `permissions_name_guard_name_unique`(`name` ASC, `guard_name` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of permissions
-- ----------------------------

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `personal_access_tokens_token_unique`(`token` ASC) USING BTREE,
  INDEX `personal_access_tokens_tokenable_type_tokenable_id_index`(`tokenable_type` ASC, `tokenable_id` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for questions
-- ----------------------------
DROP TABLE IF EXISTS `questions`;
CREATE TABLE `questions`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `question` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `identity_website` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Mã định danh website',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of questions
-- ----------------------------

-- ----------------------------
-- Table structure for recharge_card_histories
-- ----------------------------
DROP TABLE IF EXISTS `recharge_card_histories`;
CREATE TABLE `recharge_card_histories`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL COMMENT 'Mã người dùng',
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tên tài khoản người dùng',
  `type` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Loại thẻ: Viettel, Mobifone, Vinaphone, Vietnamobile)',
  `denomination_money` bigint UNSIGNED NOT NULL COMMENT 'Mệnh giá thẻ nạp',
  `actually_received` bigint UNSIGNED NOT NULL COMMENT 'Thực nhận',
  `seri` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Số seri',
  `id_card` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Mã thẻ',
  `trans` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Mã giao dịch',
  `status` tinyint UNSIGNED NOT NULL COMMENT 'Trạng thái nạp',
  `identity_website` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Mã định danh website',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of recharge_card_histories
-- ----------------------------

-- ----------------------------
-- Table structure for role_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE `role_has_permissions`  (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`, `role_id`) USING BTREE,
  INDEX `role_has_permissions_role_id_foreign`(`role_id` ASC) USING BTREE,
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of role_has_permissions
-- ----------------------------

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `roles_name_guard_name_unique`(`name` ASC, `guard_name` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES (1, 'Admin', 'web', '2023-11-19 12:42:24', '2023-11-19 12:42:24');
INSERT INTO `roles` VALUES (2, 'Client', 'web', '2023-11-19 12:42:24', '2023-11-19 12:42:24');

-- ----------------------------
-- Table structure for service_packs
-- ----------------------------
DROP TABLE IF EXISTS `service_packs`;
CREATE TABLE `service_packs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `sort` int NULL DEFAULT 0 COMMENT 'Thứ tự hiển thị',
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Tên gói dịch vụ',
  `display_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Tên hiển thị gói dịch vụ',
  `price_stock` double(8, 2) NOT NULL COMMENT 'Giá gốc',
  `price_lv0` double(8, 2) NULL DEFAULT NULL COMMENT 'Giá thành viên',
  `price_lv1` double(8, 2) NULL DEFAULT NULL COMMENT 'Giá cộng tác viên',
  `price_lv2` double(8, 2) NULL DEFAULT NULL COMMENT 'Giá đại lý',
  `price_lv3` double(8, 2) NULL DEFAULT NULL COMMENT 'Giá nhà phân phối',
  `min_order` int NULL DEFAULT 0,
  `max_order` int NULL DEFAULT 0,
  `content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `visible` tinyint(1) NULL DEFAULT 1 COMMENT 'Trạng thái hiển thị',
  `note_admin` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `note` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `info` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `show_comment` int NULL DEFAULT NULL,
  `show_camxuc` int NULL DEFAULT NULL,
  `reaction` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `type_server` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Ví dụ: facebook, tiktok,...',
  `code_server` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Ví dụ: like_post_sale',
  `server_service` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Ví dụ: sv1, sv2,..',
  `api_service` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Server api: subgiare, baostart',
  `status_server` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT 'on' COMMENT 'Trạng thái server',
  `service_id` bigint UNSIGNED NOT NULL,
  `identity_website` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Mã định danh website',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of service_packs
-- ----------------------------
INSERT INTO `service_packs` VALUES (1, 0, 'Like clone nuôi, max 3m like', NULL, 7.00, NULL, NULL, NULL, NULL, 50, 1000, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'facebook', 'like-post-sale', 'sv9', 'subgiare', 'on', 1, NULL, '2023-11-19 12:45:42', '2023-11-19 12:45:42');
INSERT INTO `service_packs` VALUES (2, 0, 'Like clone siêu tốc', NULL, 5.00, NULL, NULL, NULL, NULL, 50, 1000, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'facebook', 'like-post-speed', 'sv6', 'subgiare', 'on', 1, NULL, '2023-11-19 12:46:27', '2023-11-19 12:46:27');
INSERT INTO `service_packs` VALUES (3, 0, 'Like người dùng chéo, tài khoản tên Việt, có Avatar', NULL, 31.00, NULL, NULL, NULL, NULL, 100, 1000, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'facebook', 'like-comment', 'sv1', 'subgiare', 'on', 1, NULL, '2023-11-19 12:47:08', '2023-11-19 12:47:08');
INSERT INTO `service_packs` VALUES (4, 0, 'Comment người dùng chéo, tài khoản tên Việt, có Avatar', NULL, 150.00, NULL, NULL, NULL, NULL, 0, 1000, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'facebook', 'comment-speed', 'sv1', 'subgiare', 'on', 1, NULL, '2023-11-19 12:48:01', '2023-11-19 12:48:01');
INSERT INTO `service_packs` VALUES (5, 0, 'Sub dạng mới chỉ chạy page pro5, bảo hành 1 tháng, độc quyền toàn thế giới', NULL, 7.00, NULL, NULL, NULL, NULL, 50, 100000, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'facebook', 'sub-vip', 'sv3', 'subgiare', 'on', 1, NULL, '2023-11-19 13:11:20', '2023-11-19 13:11:20');
INSERT INTO `service_packs` VALUES (6, 0, 'Sub clone siêu tốc', NULL, 12.00, NULL, NULL, NULL, NULL, 50, 100000, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'facebook', 'sub-sale', 'sv11', 'subgiare', 'on', 1, NULL, '2023-11-19 13:12:06', '2023-11-19 13:12:06');
INSERT INTO `service_packs` VALUES (7, 0, 'Sub beta, không có like', NULL, 19.00, NULL, NULL, NULL, NULL, 100, 100000, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'facebook', 'like-page-speed', 'sv2', 'subgiare', 'on', 1, NULL, '2023-11-19 13:13:05', '2023-11-19 13:13:05');
INSERT INTO `service_packs` VALUES (8, 0, 'Like via', NULL, 19.00, NULL, NULL, NULL, NULL, 100, 100000, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'facebook', 'sub-sale', 'sv9', 'subgiare', 'on', 1, NULL, '2023-11-19 13:13:44', '2023-11-19 13:13:44');
INSERT INTO `service_packs` VALUES (9, 0, 'Cực rẻ', NULL, 1.00, NULL, NULL, NULL, NULL, 50, 10000, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'facebook', 'eye-live', 'sv4', 'subgiare', 'on', 1, NULL, '2023-11-19 13:14:30', '2023-11-19 13:14:30');
INSERT INTO `service_packs` VALUES (10, 0, 'Tốc độ thường 5k - 20k / ngày, không hỗ trợ video Reel', NULL, 17.00, NULL, NULL, NULL, NULL, 50, 10000, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'facebook', 'view-video', 'sv4', 'subgiare', 'on', 1, NULL, '2023-11-19 13:15:18', '2023-11-19 13:15:18');
INSERT INTO `service_packs` VALUES (11, 0, 'Share người dùng chéo, tài khoản tên Việt, có Avatar', NULL, 700.00, NULL, NULL, NULL, NULL, 50, 10000, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'facebook', 'share-profile', 'sv1', 'subgiare', 'on', 1, NULL, '2023-11-19 13:16:09', '2023-11-19 13:16:09');
INSERT INTO `service_packs` VALUES (12, 0, 'Member clone siêu tốc', NULL, 13.00, NULL, NULL, NULL, NULL, 50, 10000, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'facebook', 'member-group', 'sv9', 'subgiare', 'on', 1, NULL, '2023-11-19 13:16:50', '2023-11-19 13:16:50');
INSERT INTO `service_packs` VALUES (13, 0, 'View rẻ', NULL, 5.00, NULL, NULL, NULL, NULL, 50, 10000, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'facebook', 'view-story', 'sv9', 'subgiare', 'on', 1, NULL, '2023-11-19 13:17:22', '2023-11-19 13:17:22');

-- ----------------------------
-- Table structure for services
-- ----------------------------
DROP TABLE IF EXISTS `services`;
CREATE TABLE `services`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `sort` int NULL DEFAULT 0 COMMENT 'Thứ tự hiển thị',
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Tên dịch vụ',
  `display_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Tên hiển thị dịch vụ',
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Đường dẫn dịch vụ',
  `icon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Class icon của fontawesome',
  `content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL COMMENT 'Nội dung dịch vụ',
  `instructional_video` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Video hướng dẫn',
  `visible` tinyint(1) NULL DEFAULT 0 COMMENT 'Trạng thái hiển thị',
  `category_id` bigint UNSIGNED NULL DEFAULT 1 COMMENT 'Danh mục cha',
  `identity_website` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Mã định danh website',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `services_slug_unique`(`slug` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of services
-- ----------------------------
INSERT INTO `services` VALUES (1, 0, 'Tăng like bài viết (sale)', 'Tăng like bài viết (sale)', 'like-post-sale', '', '<ul>\r\n                        <li><span style=\"color:#e74c3c\">Hd <strong>lấy link</strong></span> 1 số trường hợp mọi người hay sai.</li>\r\n                    </ul>\r\n                    <ol>\r\n                        <li>link <strong>avatar, bìa</strong>, <a href=\"https://youtu.be/2yrsL3hAjBc?si=rvkO3K_ZKlb4k9ru\">Tại Đây</a></li>\r\n                        <li>Lấy <strong>link dạng post cho video ( link nó chứa từ post)</strong>&nbsp;<strong>:&nbsp;<a href=\"https://prnt.sc/3hbTjFNcPwQz\">Tại đây</a></strong></li>\r\n                        <li>Link <strong>bài chia sẻ:&nbsp;<a href=\"https://youtu.be/ug8snDdNC6w?si=wi0Aty6xnHbFL-MG\">Tại đây</a>&nbsp;( bài share bài viết và share video )</strong></li>\r\n                    </ol>\r\n                    <ul>\r\n                        <li>1 uid có thể mua tối đa 30-60 lần tùy server. Like có thể tụt theo thời gian.</li>\r\n                        <li>Server 1,6,7 có thể chia nhỏ số lượng mua nhiều lần liên tiếp&nbsp;cho 1 uid để đẩy nhanh hết mức. Nếu <span style=\"color:#e74c3c\"><strong>video </strong></span>hãy sử dụng <span style=\"color:#e74c3c\"><strong>link post</strong></span>.&nbsp;<a href=\"https://prnt.sc/3hbTjFNcPwQz\">HD tại đây</a></li>\r\n                        <li>Nếu tăng 1 video trong <span style=\"color:#e74c3c\">1 <strong>bài viết nhiều video</strong></span> vui lòng <span style=\"color:#e74c3c\"><strong>không sử dụng</strong> sv 1-6-7</span>. Hãy test và chọn sv 3-5-10</li>\r\n                        <li>Tất cả server đều KBH like khi tụt.</li>\r\n                    </ul>\r\n                    <p><span style=\"color:#e74c3c\"><strong>Các trường hợp hủy gói và k lên like</strong></span></p>\r\n                    <ul>\r\n                        <li>bài viết là avatar , ảnh&nbsp;bìa hãy xem kỹ video và lấy link + bật nút like.</li>\r\n                        <li>Nếu like <span style=\"color:#e74c3c\">group </span>công khai ,<span style=\"color:#e74c3c\">video </span>và <span style=\"color:#e74c3c\">livestream&nbsp;</span>hãy test sl nhỏ trước, Dễ bị ẩn đơn 1 số server không chạy được.</li>\r\n                        <li>Bài viết sai link hoăc bài có tag người bị block tính năng fb sẽ ẩn.</li>\r\n                    </ul>', 'https://www.youtube.com/watch?v=_nzJ9Y1LDbQ', 1, 2, 'viplike.org', '2023-11-19 12:42:24', '2023-11-19 12:42:24');
INSERT INTO `services` VALUES (2, 0, 'Tăng like bài viết (speed)', 'Tăng like bài viết (speed)', 'like-post-speed', '', '<ul>\r\n                        <li><span style=\"color:#e74c3c\">Hd <strong>lấy link</strong></span> 1 số trường hợp mọi người hay sai.</li>\r\n                    </ul>\r\n                    <ol>\r\n                        <li>link <strong>avatar, bìa</strong>, <a href=\"https://youtu.be/2yrsL3hAjBc?si=rvkO3K_ZKlb4k9ru\">Tại Đây</a></li>\r\n                        <li>Lấy <strong>link dạng post cho video ( link nó chứa từ post)</strong>&nbsp;<strong>:&nbsp;<a href=\"https://prnt.sc/3hbTjFNcPwQz\">Tại đây</a></strong></li>\r\n                        <li>Link <strong>bài chia sẻ:&nbsp;<a href=\"https://youtu.be/ug8snDdNC6w?si=wi0Aty6xnHbFL-MG\">Tại đây</a>&nbsp;( bài share bài viết và share video )</strong></li>\r\n                    </ol>\r\n                    <ul>\r\n                        <li>1 uid có thể mua tối đa 30-60 lần tùy server. Like có thể tụt theo thời gian.</li>\r\n                        <li>Server 1,6,7 có thể chia nhỏ số lượng mua nhiều lần liên tiếp&nbsp;cho 1 uid để đẩy nhanh hết mức. Nếu <span style=\"color:#e74c3c\"><strong>video </strong></span>hãy sử dụng <span style=\"color:#e74c3c\"><strong>link post</strong></span>.&nbsp;<a href=\"https://prnt.sc/3hbTjFNcPwQz\">HD tại đây</a></li>\r\n                        <li>Nếu tăng 1 video trong <span style=\"color:#e74c3c\">1 <strong>bài viết nhiều video</strong></span> vui lòng <span style=\"color:#e74c3c\"><strong>không sử dụng</strong> sv 1-6-7</span>. Hãy test và chọn sv 3-5-10</li>\r\n                        <li>Tất cả server đều KBH like khi tụt.</li>\r\n                    </ul>\r\n                    <p><span style=\"color:#e74c3c\"><strong>Các trường hợp hủy gói và k lên like</strong></span></p>\r\n                    <ul>\r\n                        <li>bài viết là avatar , ảnh&nbsp;bìa hãy xem kỹ video và lấy link + bật nút like.</li>\r\n                        <li>Nếu like <span style=\"color:#e74c3c\">group </span>công khai ,<span style=\"color:#e74c3c\">video </span>và <span style=\"color:#e74c3c\">livestream&nbsp;</span>hãy test sl nhỏ trước, Dễ bị ẩn đơn 1 số server không chạy được.</li>\r\n                        <li>Bài viết sai link hoăc bài có tag người bị block tính năng fb sẽ ẩn.</li>\r\n                    </ul>', 'https://www.youtube.com/watch?v=_nzJ9Y1LDbQ', 1, 2, 'viplike.org', '2023-11-19 12:42:24', '2023-11-19 12:42:24');
INSERT INTO `services` VALUES (3, 0, 'Tăng like bình luận', 'Tăng like bình luận', 'like-comment', '', '<ul>\r\n                        <li><span style=\"color:#e74c3c\">Hd <strong>lấy link</strong></span> 1 số trường hợp mọi người hay sai.</li>\r\n                    </ul>\r\n                    <ol>\r\n                        <li>link <strong>avatar, bìa</strong>, <a href=\"https://youtu.be/2yrsL3hAjBc?si=rvkO3K_ZKlb4k9ru\">Tại Đây</a></li>\r\n                        <li>Lấy <strong>link dạng post cho video ( link nó chứa từ post)</strong>&nbsp;<strong>:&nbsp;<a href=\"https://prnt.sc/3hbTjFNcPwQz\">Tại đây</a></strong></li>\r\n                        <li>Link <strong>bài chia sẻ:&nbsp;<a href=\"https://youtu.be/ug8snDdNC6w?si=wi0Aty6xnHbFL-MG\">Tại đây</a>&nbsp;( bài share bài viết và share video )</strong></li>\r\n                    </ol>\r\n                    <ul>\r\n                        <li>1 uid có thể mua tối đa 30-60 lần tùy server. Like có thể tụt theo thời gian.</li>\r\n                        <li>Server 1,6,7 có thể chia nhỏ số lượng mua nhiều lần liên tiếp&nbsp;cho 1 uid để đẩy nhanh hết mức. Nếu <span style=\"color:#e74c3c\"><strong>video </strong></span>hãy sử dụng <span style=\"color:#e74c3c\"><strong>link post</strong></span>.&nbsp;<a href=\"https://prnt.sc/3hbTjFNcPwQz\">HD tại đây</a></li>\r\n                        <li>Nếu tăng 1 video trong <span style=\"color:#e74c3c\">1 <strong>bài viết nhiều video</strong></span> vui lòng <span style=\"color:#e74c3c\"><strong>không sử dụng</strong> sv 1-6-7</span>. Hãy test và chọn sv 3-5-10</li>\r\n                        <li>Tất cả server đều KBH like khi tụt.</li>\r\n                    </ul>\r\n                    <p><span style=\"color:#e74c3c\"><strong>Các trường hợp hủy gói và k lên like</strong></span></p>\r\n                    <ul>\r\n                        <li>bài viết là avatar , ảnh&nbsp;bìa hãy xem kỹ video và lấy link + bật nút like.</li>\r\n                        <li>Nếu like <span style=\"color:#e74c3c\">group </span>công khai ,<span style=\"color:#e74c3c\">video </span>và <span style=\"color:#e74c3c\">livestream&nbsp;</span>hãy test sl nhỏ trước, Dễ bị ẩn đơn 1 số server không chạy được.</li>\r\n                        <li>Bài viết sai link hoăc bài có tag người bị block tính năng fb sẽ ẩn.</li>\r\n                    </ul>', 'https://www.youtube.com/watch?v=_nzJ9Y1LDbQ', 1, 2, 'viplike.org', '2023-11-19 12:42:24', '2023-11-19 12:42:24');
INSERT INTO `services` VALUES (4, 0, 'Tăng bình luận (sale)', 'Tăng bình luận (sale)', 'comment-sale', '', '<ul>\r\n                        <li><span style=\"color:#e74c3c\">Hd <strong>lấy link</strong></span> 1 số trường hợp mọi người hay sai.</li>\r\n                    </ul>\r\n                    <ol>\r\n                        <li>link <strong>avatar, bìa</strong>, <a href=\"https://youtu.be/2yrsL3hAjBc?si=rvkO3K_ZKlb4k9ru\">Tại Đây</a></li>\r\n                        <li>Lấy <strong>link dạng post cho video ( link nó chứa từ post)</strong>&nbsp;<strong>:&nbsp;<a href=\"https://prnt.sc/3hbTjFNcPwQz\">Tại đây</a></strong></li>\r\n                        <li>Link <strong>bài chia sẻ:&nbsp;<a href=\"https://youtu.be/ug8snDdNC6w?si=wi0Aty6xnHbFL-MG\">Tại đây</a>&nbsp;( bài share bài viết và share video )</strong></li>\r\n                    </ol>\r\n                    <ul>\r\n                        <li>1 uid có thể mua tối đa 30-60 lần tùy server. Like có thể tụt theo thời gian.</li>\r\n                        <li>Server 1,6,7 có thể chia nhỏ số lượng mua nhiều lần liên tiếp&nbsp;cho 1 uid để đẩy nhanh hết mức. Nếu <span style=\"color:#e74c3c\"><strong>video </strong></span>hãy sử dụng <span style=\"color:#e74c3c\"><strong>link post</strong></span>.&nbsp;<a href=\"https://prnt.sc/3hbTjFNcPwQz\">HD tại đây</a></li>\r\n                        <li>Nếu tăng 1 video trong <span style=\"color:#e74c3c\">1 <strong>bài viết nhiều video</strong></span> vui lòng <span style=\"color:#e74c3c\"><strong>không sử dụng</strong> sv 1-6-7</span>. Hãy test và chọn sv 3-5-10</li>\r\n                        <li>Tất cả server đều KBH like khi tụt.</li>\r\n                    </ul>\r\n                    <p><span style=\"color:#e74c3c\"><strong>Các trường hợp hủy gói và k lên like</strong></span></p>\r\n                    <ul>\r\n                        <li>bài viết là avatar , ảnh&nbsp;bìa hãy xem kỹ video và lấy link + bật nút like.</li>\r\n                        <li>Nếu like <span style=\"color:#e74c3c\">group </span>công khai ,<span style=\"color:#e74c3c\">video </span>và <span style=\"color:#e74c3c\">livestream&nbsp;</span>hãy test sl nhỏ trước, Dễ bị ẩn đơn 1 số server không chạy được.</li>\r\n                        <li>Bài viết sai link hoăc bài có tag người bị block tính năng fb sẽ ẩn.</li>\r\n                    </ul>', 'https://www.youtube.com/watch?v=_nzJ9Y1LDbQ', 1, 2, 'viplike.org', '2023-11-19 12:42:24', '2023-11-19 12:42:24');
INSERT INTO `services` VALUES (5, 0, 'Tăng bình luận (speed)', 'Tăng bình luận (speed)', 'comment-speed', '', '<ul>\r\n                        <li><span style=\"color:#e74c3c\">Hd <strong>lấy link</strong></span> 1 số trường hợp mọi người hay sai.</li>\r\n                    </ul>\r\n                    <ol>\r\n                        <li>link <strong>avatar, bìa</strong>, <a href=\"https://youtu.be/2yrsL3hAjBc?si=rvkO3K_ZKlb4k9ru\">Tại Đây</a></li>\r\n                        <li>Lấy <strong>link dạng post cho video ( link nó chứa từ post)</strong>&nbsp;<strong>:&nbsp;<a href=\"https://prnt.sc/3hbTjFNcPwQz\">Tại đây</a></strong></li>\r\n                        <li>Link <strong>bài chia sẻ:&nbsp;<a href=\"https://youtu.be/ug8snDdNC6w?si=wi0Aty6xnHbFL-MG\">Tại đây</a>&nbsp;( bài share bài viết và share video )</strong></li>\r\n                    </ol>\r\n                    <ul>\r\n                        <li>1 uid có thể mua tối đa 30-60 lần tùy server. Like có thể tụt theo thời gian.</li>\r\n                        <li>Server 1,6,7 có thể chia nhỏ số lượng mua nhiều lần liên tiếp&nbsp;cho 1 uid để đẩy nhanh hết mức. Nếu <span style=\"color:#e74c3c\"><strong>video </strong></span>hãy sử dụng <span style=\"color:#e74c3c\"><strong>link post</strong></span>.&nbsp;<a href=\"https://prnt.sc/3hbTjFNcPwQz\">HD tại đây</a></li>\r\n                        <li>Nếu tăng 1 video trong <span style=\"color:#e74c3c\">1 <strong>bài viết nhiều video</strong></span> vui lòng <span style=\"color:#e74c3c\"><strong>không sử dụng</strong> sv 1-6-7</span>. Hãy test và chọn sv 3-5-10</li>\r\n                        <li>Tất cả server đều KBH like khi tụt.</li>\r\n                    </ul>\r\n                    <p><span style=\"color:#e74c3c\"><strong>Các trường hợp hủy gói và k lên like</strong></span></p>\r\n                    <ul>\r\n                        <li>bài viết là avatar , ảnh&nbsp;bìa hãy xem kỹ video và lấy link + bật nút like.</li>\r\n                        <li>Nếu like <span style=\"color:#e74c3c\">group </span>công khai ,<span style=\"color:#e74c3c\">video </span>và <span style=\"color:#e74c3c\">livestream&nbsp;</span>hãy test sl nhỏ trước, Dễ bị ẩn đơn 1 số server không chạy được.</li>\r\n                        <li>Bài viết sai link hoăc bài có tag người bị block tính năng fb sẽ ẩn.</li>\r\n                    </ul>', 'https://www.youtube.com/watch?v=_nzJ9Y1LDbQ', 1, 2, 'viplike.org', '2023-11-19 12:42:24', '2023-11-19 12:42:24');
INSERT INTO `services` VALUES (6, 0, 'Tăng sub/follow (vip)', 'Tăng sub/follow (vip)', 'sub-vip', '', '<ul>\r\n                        <li><span style=\"color:#e74c3c\">Hd <strong>lấy link</strong></span> 1 số trường hợp mọi người hay sai.</li>\r\n                    </ul>\r\n                    <ol>\r\n                        <li>link <strong>avatar, bìa</strong>, <a href=\"https://youtu.be/2yrsL3hAjBc?si=rvkO3K_ZKlb4k9ru\">Tại Đây</a></li>\r\n                        <li>Lấy <strong>link dạng post cho video ( link nó chứa từ post)</strong>&nbsp;<strong>:&nbsp;<a href=\"https://prnt.sc/3hbTjFNcPwQz\">Tại đây</a></strong></li>\r\n                        <li>Link <strong>bài chia sẻ:&nbsp;<a href=\"https://youtu.be/ug8snDdNC6w?si=wi0Aty6xnHbFL-MG\">Tại đây</a>&nbsp;( bài share bài viết và share video )</strong></li>\r\n                    </ol>\r\n                    <ul>\r\n                        <li>1 uid có thể mua tối đa 30-60 lần tùy server. Like có thể tụt theo thời gian.</li>\r\n                        <li>Server 1,6,7 có thể chia nhỏ số lượng mua nhiều lần liên tiếp&nbsp;cho 1 uid để đẩy nhanh hết mức. Nếu <span style=\"color:#e74c3c\"><strong>video </strong></span>hãy sử dụng <span style=\"color:#e74c3c\"><strong>link post</strong></span>.&nbsp;<a href=\"https://prnt.sc/3hbTjFNcPwQz\">HD tại đây</a></li>\r\n                        <li>Nếu tăng 1 video trong <span style=\"color:#e74c3c\">1 <strong>bài viết nhiều video</strong></span> vui lòng <span style=\"color:#e74c3c\"><strong>không sử dụng</strong> sv 1-6-7</span>. Hãy test và chọn sv 3-5-10</li>\r\n                        <li>Tất cả server đều KBH like khi tụt.</li>\r\n                    </ul>\r\n                    <p><span style=\"color:#e74c3c\"><strong>Các trường hợp hủy gói và k lên like</strong></span></p>\r\n                    <ul>\r\n                        <li>bài viết là avatar , ảnh&nbsp;bìa hãy xem kỹ video và lấy link + bật nút like.</li>\r\n                        <li>Nếu like <span style=\"color:#e74c3c\">group </span>công khai ,<span style=\"color:#e74c3c\">video </span>và <span style=\"color:#e74c3c\">livestream&nbsp;</span>hãy test sl nhỏ trước, Dễ bị ẩn đơn 1 số server không chạy được.</li>\r\n                        <li>Bài viết sai link hoăc bài có tag người bị block tính năng fb sẽ ẩn.</li>\r\n                    </ul>', 'https://www.youtube.com/watch?v=_nzJ9Y1LDbQ', 1, 2, 'viplike.org', '2023-11-19 12:42:24', '2023-11-19 12:42:24');
INSERT INTO `services` VALUES (7, 0, 'Tăng sub/follow (sale)', 'Tăng sub/follow (sale)', 'sub-sale', '', '<ul>\r\n                        <li><span style=\"color:#e74c3c\">Hd <strong>lấy link</strong></span> 1 số trường hợp mọi người hay sai.</li>\r\n                    </ul>\r\n                    <ol>\r\n                        <li>link <strong>avatar, bìa</strong>, <a href=\"https://youtu.be/2yrsL3hAjBc?si=rvkO3K_ZKlb4k9ru\">Tại Đây</a></li>\r\n                        <li>Lấy <strong>link dạng post cho video ( link nó chứa từ post)</strong>&nbsp;<strong>:&nbsp;<a href=\"https://prnt.sc/3hbTjFNcPwQz\">Tại đây</a></strong></li>\r\n                        <li>Link <strong>bài chia sẻ:&nbsp;<a href=\"https://youtu.be/ug8snDdNC6w?si=wi0Aty6xnHbFL-MG\">Tại đây</a>&nbsp;( bài share bài viết và share video )</strong></li>\r\n                    </ol>\r\n                    <ul>\r\n                        <li>1 uid có thể mua tối đa 30-60 lần tùy server. Like có thể tụt theo thời gian.</li>\r\n                        <li>Server 1,6,7 có thể chia nhỏ số lượng mua nhiều lần liên tiếp&nbsp;cho 1 uid để đẩy nhanh hết mức. Nếu <span style=\"color:#e74c3c\"><strong>video </strong></span>hãy sử dụng <span style=\"color:#e74c3c\"><strong>link post</strong></span>.&nbsp;<a href=\"https://prnt.sc/3hbTjFNcPwQz\">HD tại đây</a></li>\r\n                        <li>Nếu tăng 1 video trong <span style=\"color:#e74c3c\">1 <strong>bài viết nhiều video</strong></span> vui lòng <span style=\"color:#e74c3c\"><strong>không sử dụng</strong> sv 1-6-7</span>. Hãy test và chọn sv 3-5-10</li>\r\n                        <li>Tất cả server đều KBH like khi tụt.</li>\r\n                    </ul>\r\n                    <p><span style=\"color:#e74c3c\"><strong>Các trường hợp hủy gói và k lên like</strong></span></p>\r\n                    <ul>\r\n                        <li>bài viết là avatar , ảnh&nbsp;bìa hãy xem kỹ video và lấy link + bật nút like.</li>\r\n                        <li>Nếu like <span style=\"color:#e74c3c\">group </span>công khai ,<span style=\"color:#e74c3c\">video </span>và <span style=\"color:#e74c3c\">livestream&nbsp;</span>hãy test sl nhỏ trước, Dễ bị ẩn đơn 1 số server không chạy được.</li>\r\n                        <li>Bài viết sai link hoăc bài có tag người bị block tính năng fb sẽ ẩn.</li>\r\n                    </ul>', 'https://www.youtube.com/watch?v=_nzJ9Y1LDbQ', 1, 2, 'viplike.org', '2023-11-19 12:42:24', '2023-11-19 12:42:24');
INSERT INTO `services` VALUES (8, 0, 'Tăng like/follow page (speed)', 'Tăng like/follow page (speed)', 'like-page-speed', '', '<ul>\r\n                        <li><span style=\"color:#e74c3c\">Hd <strong>lấy link</strong></span> 1 số trường hợp mọi người hay sai.</li>\r\n                    </ul>\r\n                    <ol>\r\n                        <li>link <strong>avatar, bìa</strong>, <a href=\"https://youtu.be/2yrsL3hAjBc?si=rvkO3K_ZKlb4k9ru\">Tại Đây</a></li>\r\n                        <li>Lấy <strong>link dạng post cho video ( link nó chứa từ post)</strong>&nbsp;<strong>:&nbsp;<a href=\"https://prnt.sc/3hbTjFNcPwQz\">Tại đây</a></strong></li>\r\n                        <li>Link <strong>bài chia sẻ:&nbsp;<a href=\"https://youtu.be/ug8snDdNC6w?si=wi0Aty6xnHbFL-MG\">Tại đây</a>&nbsp;( bài share bài viết và share video )</strong></li>\r\n                    </ol>\r\n                    <ul>\r\n                        <li>1 uid có thể mua tối đa 30-60 lần tùy server. Like có thể tụt theo thời gian.</li>\r\n                        <li>Server 1,6,7 có thể chia nhỏ số lượng mua nhiều lần liên tiếp&nbsp;cho 1 uid để đẩy nhanh hết mức. Nếu <span style=\"color:#e74c3c\"><strong>video </strong></span>hãy sử dụng <span style=\"color:#e74c3c\"><strong>link post</strong></span>.&nbsp;<a href=\"https://prnt.sc/3hbTjFNcPwQz\">HD tại đây</a></li>\r\n                        <li>Nếu tăng 1 video trong <span style=\"color:#e74c3c\">1 <strong>bài viết nhiều video</strong></span> vui lòng <span style=\"color:#e74c3c\"><strong>không sử dụng</strong> sv 1-6-7</span>. Hãy test và chọn sv 3-5-10</li>\r\n                        <li>Tất cả server đều KBH like khi tụt.</li>\r\n                    </ul>\r\n                    <p><span style=\"color:#e74c3c\"><strong>Các trường hợp hủy gói và k lên like</strong></span></p>\r\n                    <ul>\r\n                        <li>bài viết là avatar , ảnh&nbsp;bìa hãy xem kỹ video và lấy link + bật nút like.</li>\r\n                        <li>Nếu like <span style=\"color:#e74c3c\">group </span>công khai ,<span style=\"color:#e74c3c\">video </span>và <span style=\"color:#e74c3c\">livestream&nbsp;</span>hãy test sl nhỏ trước, Dễ bị ẩn đơn 1 số server không chạy được.</li>\r\n                        <li>Bài viết sai link hoăc bài có tag người bị block tính năng fb sẽ ẩn.</li>\r\n                    </ul>', 'https://www.youtube.com/watch?v=_nzJ9Y1LDbQ', 1, 2, 'viplike.org', '2023-11-19 12:42:24', '2023-11-19 12:42:24');
INSERT INTO `services` VALUES (9, 0, 'Tăng like/follow page (sale)', 'Tăng like/follow page (sale)', 'like-page-sale', '', '<ul>\r\n                        <li><span style=\"color:#e74c3c\">Hd <strong>lấy link</strong></span> 1 số trường hợp mọi người hay sai.</li>\r\n                    </ul>\r\n                    <ol>\r\n                        <li>link <strong>avatar, bìa</strong>, <a href=\"https://youtu.be/2yrsL3hAjBc?si=rvkO3K_ZKlb4k9ru\">Tại Đây</a></li>\r\n                        <li>Lấy <strong>link dạng post cho video ( link nó chứa từ post)</strong>&nbsp;<strong>:&nbsp;<a href=\"https://prnt.sc/3hbTjFNcPwQz\">Tại đây</a></strong></li>\r\n                        <li>Link <strong>bài chia sẻ:&nbsp;<a href=\"https://youtu.be/ug8snDdNC6w?si=wi0Aty6xnHbFL-MG\">Tại đây</a>&nbsp;( bài share bài viết và share video )</strong></li>\r\n                    </ol>\r\n                    <ul>\r\n                        <li>1 uid có thể mua tối đa 30-60 lần tùy server. Like có thể tụt theo thời gian.</li>\r\n                        <li>Server 1,6,7 có thể chia nhỏ số lượng mua nhiều lần liên tiếp&nbsp;cho 1 uid để đẩy nhanh hết mức. Nếu <span style=\"color:#e74c3c\"><strong>video </strong></span>hãy sử dụng <span style=\"color:#e74c3c\"><strong>link post</strong></span>.&nbsp;<a href=\"https://prnt.sc/3hbTjFNcPwQz\">HD tại đây</a></li>\r\n                        <li>Nếu tăng 1 video trong <span style=\"color:#e74c3c\">1 <strong>bài viết nhiều video</strong></span> vui lòng <span style=\"color:#e74c3c\"><strong>không sử dụng</strong> sv 1-6-7</span>. Hãy test và chọn sv 3-5-10</li>\r\n                        <li>Tất cả server đều KBH like khi tụt.</li>\r\n                    </ul>\r\n                    <p><span style=\"color:#e74c3c\"><strong>Các trường hợp hủy gói và k lên like</strong></span></p>\r\n                    <ul>\r\n                        <li>bài viết là avatar , ảnh&nbsp;bìa hãy xem kỹ video và lấy link + bật nút like.</li>\r\n                        <li>Nếu like <span style=\"color:#e74c3c\">group </span>công khai ,<span style=\"color:#e74c3c\">video </span>và <span style=\"color:#e74c3c\">livestream&nbsp;</span>hãy test sl nhỏ trước, Dễ bị ẩn đơn 1 số server không chạy được.</li>\r\n                        <li>Bài viết sai link hoăc bài có tag người bị block tính năng fb sẽ ẩn.</li>\r\n                    </ul>', 'https://www.youtube.com/watch?v=_nzJ9Y1LDbQ', 1, 2, 'viplike.org', '2023-11-19 12:42:24', '2023-11-19 12:42:24');
INSERT INTO `services` VALUES (10, 0, 'Tăng mắt live', 'Tăng mắt live', 'eye-live', '', '<ul>\r\n                        <li><span style=\"color:#e74c3c\">Hd <strong>lấy link</strong></span> 1 số trường hợp mọi người hay sai.</li>\r\n                    </ul>\r\n                    <ol>\r\n                        <li>link <strong>avatar, bìa</strong>, <a href=\"https://youtu.be/2yrsL3hAjBc?si=rvkO3K_ZKlb4k9ru\">Tại Đây</a></li>\r\n                        <li>Lấy <strong>link dạng post cho video ( link nó chứa từ post)</strong>&nbsp;<strong>:&nbsp;<a href=\"https://prnt.sc/3hbTjFNcPwQz\">Tại đây</a></strong></li>\r\n                        <li>Link <strong>bài chia sẻ:&nbsp;<a href=\"https://youtu.be/ug8snDdNC6w?si=wi0Aty6xnHbFL-MG\">Tại đây</a>&nbsp;( bài share bài viết và share video )</strong></li>\r\n                    </ol>\r\n                    <ul>\r\n                        <li>1 uid có thể mua tối đa 30-60 lần tùy server. Like có thể tụt theo thời gian.</li>\r\n                        <li>Server 1,6,7 có thể chia nhỏ số lượng mua nhiều lần liên tiếp&nbsp;cho 1 uid để đẩy nhanh hết mức. Nếu <span style=\"color:#e74c3c\"><strong>video </strong></span>hãy sử dụng <span style=\"color:#e74c3c\"><strong>link post</strong></span>.&nbsp;<a href=\"https://prnt.sc/3hbTjFNcPwQz\">HD tại đây</a></li>\r\n                        <li>Nếu tăng 1 video trong <span style=\"color:#e74c3c\">1 <strong>bài viết nhiều video</strong></span> vui lòng <span style=\"color:#e74c3c\"><strong>không sử dụng</strong> sv 1-6-7</span>. Hãy test và chọn sv 3-5-10</li>\r\n                        <li>Tất cả server đều KBH like khi tụt.</li>\r\n                    </ul>\r\n                    <p><span style=\"color:#e74c3c\"><strong>Các trường hợp hủy gói và k lên like</strong></span></p>\r\n                    <ul>\r\n                        <li>bài viết là avatar , ảnh&nbsp;bìa hãy xem kỹ video và lấy link + bật nút like.</li>\r\n                        <li>Nếu like <span style=\"color:#e74c3c\">group </span>công khai ,<span style=\"color:#e74c3c\">video </span>và <span style=\"color:#e74c3c\">livestream&nbsp;</span>hãy test sl nhỏ trước, Dễ bị ẩn đơn 1 số server không chạy được.</li>\r\n                        <li>Bài viết sai link hoăc bài có tag người bị block tính năng fb sẽ ẩn.</li>\r\n                    </ul>', 'https://www.youtube.com/watch?v=_nzJ9Y1LDbQ', 1, 2, 'viplike.org', '2023-11-19 12:42:24', '2023-11-19 12:42:24');
INSERT INTO `services` VALUES (11, 0, 'Tăng view video', 'Tăng view video', 'view-video', '', '<ul>\r\n                        <li><span style=\"color:#e74c3c\">Hd <strong>lấy link</strong></span> 1 số trường hợp mọi người hay sai.</li>\r\n                    </ul>\r\n                    <ol>\r\n                        <li>link <strong>avatar, bìa</strong>, <a href=\"https://youtu.be/2yrsL3hAjBc?si=rvkO3K_ZKlb4k9ru\">Tại Đây</a></li>\r\n                        <li>Lấy <strong>link dạng post cho video ( link nó chứa từ post)</strong>&nbsp;<strong>:&nbsp;<a href=\"https://prnt.sc/3hbTjFNcPwQz\">Tại đây</a></strong></li>\r\n                        <li>Link <strong>bài chia sẻ:&nbsp;<a href=\"https://youtu.be/ug8snDdNC6w?si=wi0Aty6xnHbFL-MG\">Tại đây</a>&nbsp;( bài share bài viết và share video )</strong></li>\r\n                    </ol>\r\n                    <ul>\r\n                        <li>1 uid có thể mua tối đa 30-60 lần tùy server. Like có thể tụt theo thời gian.</li>\r\n                        <li>Server 1,6,7 có thể chia nhỏ số lượng mua nhiều lần liên tiếp&nbsp;cho 1 uid để đẩy nhanh hết mức. Nếu <span style=\"color:#e74c3c\"><strong>video </strong></span>hãy sử dụng <span style=\"color:#e74c3c\"><strong>link post</strong></span>.&nbsp;<a href=\"https://prnt.sc/3hbTjFNcPwQz\">HD tại đây</a></li>\r\n                        <li>Nếu tăng 1 video trong <span style=\"color:#e74c3c\">1 <strong>bài viết nhiều video</strong></span> vui lòng <span style=\"color:#e74c3c\"><strong>không sử dụng</strong> sv 1-6-7</span>. Hãy test và chọn sv 3-5-10</li>\r\n                        <li>Tất cả server đều KBH like khi tụt.</li>\r\n                    </ul>\r\n                    <p><span style=\"color:#e74c3c\"><strong>Các trường hợp hủy gói và k lên like</strong></span></p>\r\n                    <ul>\r\n                        <li>bài viết là avatar , ảnh&nbsp;bìa hãy xem kỹ video và lấy link + bật nút like.</li>\r\n                        <li>Nếu like <span style=\"color:#e74c3c\">group </span>công khai ,<span style=\"color:#e74c3c\">video </span>và <span style=\"color:#e74c3c\">livestream&nbsp;</span>hãy test sl nhỏ trước, Dễ bị ẩn đơn 1 số server không chạy được.</li>\r\n                        <li>Bài viết sai link hoăc bài có tag người bị block tính năng fb sẽ ẩn.</li>\r\n                    </ul>', 'https://www.youtube.com/watch?v=_nzJ9Y1LDbQ', 1, 2, 'viplike.org', '2023-11-19 12:42:24', '2023-11-19 12:42:24');
INSERT INTO `services` VALUES (12, 0, 'Tăng chia sẻ (profile)', 'Tăng chia sẻ (profile)', 'share-profile', '', '<ul>\r\n                        <li><span style=\"color:#e74c3c\">Hd <strong>lấy link</strong></span> 1 số trường hợp mọi người hay sai.</li>\r\n                    </ul>\r\n                    <ol>\r\n                        <li>link <strong>avatar, bìa</strong>, <a href=\"https://youtu.be/2yrsL3hAjBc?si=rvkO3K_ZKlb4k9ru\">Tại Đây</a></li>\r\n                        <li>Lấy <strong>link dạng post cho video ( link nó chứa từ post)</strong>&nbsp;<strong>:&nbsp;<a href=\"https://prnt.sc/3hbTjFNcPwQz\">Tại đây</a></strong></li>\r\n                        <li>Link <strong>bài chia sẻ:&nbsp;<a href=\"https://youtu.be/ug8snDdNC6w?si=wi0Aty6xnHbFL-MG\">Tại đây</a>&nbsp;( bài share bài viết và share video )</strong></li>\r\n                    </ol>\r\n                    <ul>\r\n                        <li>1 uid có thể mua tối đa 30-60 lần tùy server. Like có thể tụt theo thời gian.</li>\r\n                        <li>Server 1,6,7 có thể chia nhỏ số lượng mua nhiều lần liên tiếp&nbsp;cho 1 uid để đẩy nhanh hết mức. Nếu <span style=\"color:#e74c3c\"><strong>video </strong></span>hãy sử dụng <span style=\"color:#e74c3c\"><strong>link post</strong></span>.&nbsp;<a href=\"https://prnt.sc/3hbTjFNcPwQz\">HD tại đây</a></li>\r\n                        <li>Nếu tăng 1 video trong <span style=\"color:#e74c3c\">1 <strong>bài viết nhiều video</strong></span> vui lòng <span style=\"color:#e74c3c\"><strong>không sử dụng</strong> sv 1-6-7</span>. Hãy test và chọn sv 3-5-10</li>\r\n                        <li>Tất cả server đều KBH like khi tụt.</li>\r\n                    </ul>\r\n                    <p><span style=\"color:#e74c3c\"><strong>Các trường hợp hủy gói và k lên like</strong></span></p>\r\n                    <ul>\r\n                        <li>bài viết là avatar , ảnh&nbsp;bìa hãy xem kỹ video và lấy link + bật nút like.</li>\r\n                        <li>Nếu like <span style=\"color:#e74c3c\">group </span>công khai ,<span style=\"color:#e74c3c\">video </span>và <span style=\"color:#e74c3c\">livestream&nbsp;</span>hãy test sl nhỏ trước, Dễ bị ẩn đơn 1 số server không chạy được.</li>\r\n                        <li>Bài viết sai link hoăc bài có tag người bị block tính năng fb sẽ ẩn.</li>\r\n                    </ul>', 'https://www.youtube.com/watch?v=_nzJ9Y1LDbQ', 1, 2, 'viplike.org', '2023-11-19 12:42:24', '2023-11-19 12:42:24');
INSERT INTO `services` VALUES (13, 0, 'Tăng thành viên nhóm', 'Tăng thành viên nhóm', 'member-group', '', '<ul>\r\n                        <li><span style=\"color:#e74c3c\">Hd <strong>lấy link</strong></span> 1 số trường hợp mọi người hay sai.</li>\r\n                    </ul>\r\n                    <ol>\r\n                        <li>link <strong>avatar, bìa</strong>, <a href=\"https://youtu.be/2yrsL3hAjBc?si=rvkO3K_ZKlb4k9ru\">Tại Đây</a></li>\r\n                        <li>Lấy <strong>link dạng post cho video ( link nó chứa từ post)</strong>&nbsp;<strong>:&nbsp;<a href=\"https://prnt.sc/3hbTjFNcPwQz\">Tại đây</a></strong></li>\r\n                        <li>Link <strong>bài chia sẻ:&nbsp;<a href=\"https://youtu.be/ug8snDdNC6w?si=wi0Aty6xnHbFL-MG\">Tại đây</a>&nbsp;( bài share bài viết và share video )</strong></li>\r\n                    </ol>\r\n                    <ul>\r\n                        <li>1 uid có thể mua tối đa 30-60 lần tùy server. Like có thể tụt theo thời gian.</li>\r\n                        <li>Server 1,6,7 có thể chia nhỏ số lượng mua nhiều lần liên tiếp&nbsp;cho 1 uid để đẩy nhanh hết mức. Nếu <span style=\"color:#e74c3c\"><strong>video </strong></span>hãy sử dụng <span style=\"color:#e74c3c\"><strong>link post</strong></span>.&nbsp;<a href=\"https://prnt.sc/3hbTjFNcPwQz\">HD tại đây</a></li>\r\n                        <li>Nếu tăng 1 video trong <span style=\"color:#e74c3c\">1 <strong>bài viết nhiều video</strong></span> vui lòng <span style=\"color:#e74c3c\"><strong>không sử dụng</strong> sv 1-6-7</span>. Hãy test và chọn sv 3-5-10</li>\r\n                        <li>Tất cả server đều KBH like khi tụt.</li>\r\n                    </ul>\r\n                    <p><span style=\"color:#e74c3c\"><strong>Các trường hợp hủy gói và k lên like</strong></span></p>\r\n                    <ul>\r\n                        <li>bài viết là avatar , ảnh&nbsp;bìa hãy xem kỹ video và lấy link + bật nút like.</li>\r\n                        <li>Nếu like <span style=\"color:#e74c3c\">group </span>công khai ,<span style=\"color:#e74c3c\">video </span>và <span style=\"color:#e74c3c\">livestream&nbsp;</span>hãy test sl nhỏ trước, Dễ bị ẩn đơn 1 số server không chạy được.</li>\r\n                        <li>Bài viết sai link hoăc bài có tag người bị block tính năng fb sẽ ẩn.</li>\r\n                    </ul>', 'https://www.youtube.com/watch?v=_nzJ9Y1LDbQ', 1, 2, 'viplike.org', '2023-11-19 12:42:24', '2023-11-19 12:42:24');
INSERT INTO `services` VALUES (14, 0, 'Tăng view story', 'Tăng view story', 'view-story', '', '<ul>\r\n                        <li><span style=\"color:#e74c3c\">Hd <strong>lấy link</strong></span> 1 số trường hợp mọi người hay sai.</li>\r\n                    </ul>\r\n                    <ol>\r\n                        <li>link <strong>avatar, bìa</strong>, <a href=\"https://youtu.be/2yrsL3hAjBc?si=rvkO3K_ZKlb4k9ru\">Tại Đây</a></li>\r\n                        <li>Lấy <strong>link dạng post cho video ( link nó chứa từ post)</strong>&nbsp;<strong>:&nbsp;<a href=\"https://prnt.sc/3hbTjFNcPwQz\">Tại đây</a></strong></li>\r\n                        <li>Link <strong>bài chia sẻ:&nbsp;<a href=\"https://youtu.be/ug8snDdNC6w?si=wi0Aty6xnHbFL-MG\">Tại đây</a>&nbsp;( bài share bài viết và share video )</strong></li>\r\n                    </ol>\r\n                    <ul>\r\n                        <li>1 uid có thể mua tối đa 30-60 lần tùy server. Like có thể tụt theo thời gian.</li>\r\n                        <li>Server 1,6,7 có thể chia nhỏ số lượng mua nhiều lần liên tiếp&nbsp;cho 1 uid để đẩy nhanh hết mức. Nếu <span style=\"color:#e74c3c\"><strong>video </strong></span>hãy sử dụng <span style=\"color:#e74c3c\"><strong>link post</strong></span>.&nbsp;<a href=\"https://prnt.sc/3hbTjFNcPwQz\">HD tại đây</a></li>\r\n                        <li>Nếu tăng 1 video trong <span style=\"color:#e74c3c\">1 <strong>bài viết nhiều video</strong></span> vui lòng <span style=\"color:#e74c3c\"><strong>không sử dụng</strong> sv 1-6-7</span>. Hãy test và chọn sv 3-5-10</li>\r\n                        <li>Tất cả server đều KBH like khi tụt.</li>\r\n                    </ul>\r\n                    <p><span style=\"color:#e74c3c\"><strong>Các trường hợp hủy gói và k lên like</strong></span></p>\r\n                    <ul>\r\n                        <li>bài viết là avatar , ảnh&nbsp;bìa hãy xem kỹ video và lấy link + bật nút like.</li>\r\n                        <li>Nếu like <span style=\"color:#e74c3c\">group </span>công khai ,<span style=\"color:#e74c3c\">video </span>và <span style=\"color:#e74c3c\">livestream&nbsp;</span>hãy test sl nhỏ trước, Dễ bị ẩn đơn 1 số server không chạy được.</li>\r\n                        <li>Bài viết sai link hoăc bài có tag người bị block tính năng fb sẽ ẩn.</li>\r\n                    </ul>', 'https://www.youtube.com/watch?v=_nzJ9Y1LDbQ', 1, 2, 'viplike.org', '2023-11-19 12:42:24', '2023-11-19 12:42:24');

-- ----------------------------
-- Table structure for settings
-- ----------------------------
DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `logo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `favicon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `background` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `menu_header_bg` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `menu_color` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `landing_page` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `auth_widget` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `password_lv2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `og_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `og_site_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `og_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `og_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `og_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `og_keywords` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `og_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `google_site_verification` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ga_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `gtag_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `zalo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `fanpage` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `link_video_1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `link_video_2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `min_charge_lv1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `total_charge_lv1` int NULL DEFAULT NULL,
  `note_lv1` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `min_charge_lv2` int NULL DEFAULT NULL,
  `total_charge_lv2` int NULL DEFAULT NULL,
  `note_lv2` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `min_charge_lv3` int NULL DEFAULT NULL,
  `total_charge_lv3` int NULL DEFAULT NULL,
  `note_lv3` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `offer_percent` int NULL DEFAULT NULL,
  `offer_from` datetime NULL DEFAULT NULL,
  `offer_to` datetime NULL DEFAULT NULL,
  `bank_prefix` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `enable_referral` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `referral_percent` int NULL DEFAULT NULL,
  `video_referral` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `referral_note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `payment_note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `payment_popup_content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `show_header` tinyint(1) NULL DEFAULT NULL COMMENT 'Hiển thị thông báo nổi',
  `show_last_notify` tinyint(1) NULL DEFAULT NULL COMMENT 'Hiển thị popup thông báo mới nhất',
  `admin_tele_on_payment` tinyint(1) NULL DEFAULT NULL COMMENT 'Nhận thông báo về Telegram khi người dùng nạp tiền',
  `enable_card_payment` tinyint(1) NULL DEFAULT 0 COMMENT 'Cấu hình bật tắt nạp card',
  `card_partner_id` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL COMMENT 'Cấu hình partner_id nạp card',
  `card_partner_key` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL COMMENT 'Cấu hình partner_key nạp card',
  `card_discount` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Cấu hình tỷ giá nạp card. VD nap the 100 tỷ giá 75 người dùng sẽ nhận đc 75k',
  `enable_usdt_payment` tinyint(1) NULL DEFAULT 0 COMMENT 'Cấu hình bật tắt nạp USDT',
  `usdt_address_wallet` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL COMMENT 'USDT Địa chỉ ví Tron nhận tiền (không sử dụng địa chỉ tại Binance)',
  `usdt_token_wallet` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL COMMENT 'USDT Token mà hệ thống tạo ra khi thêm ví vào FPAYMENT',
  `usdt_discount` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Cấu hình tỷ giá nạp USDT',
  `notify_new_user` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL COMMENT 'Thông báo cho người dùng mới',
  `token_subgiare` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL COMMENT 'Token subgiare',
  `identity_website` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Mã định danh website',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of settings
-- ----------------------------
INSERT INTO `settings` VALUES (1, NULL, NULL, NULL, '#ffffff', 'default', 'page1', '1', 'on', 'VIPLIKE.ORG | Hệ thống Seeding hàng đầu Việt Nam', 'Hệ thống tăng like, sub, comment, view, tăng tương tác, chia sẻ livestream, dịch vụ tiktok, tăng tim instagram, theo dõi youtube, theo dõi twitter, theo dõi shopee, lượt xem tiktok', 'VIPLIKE.ORGHỆ THỐNG DỊCH VỤ MẠNG XÃ HỘI, SOCIAL MEDIA MARKETING', 'VIPLIKE.ORGHỆ THỐNG DỊCH VỤ MẠNG XÃ HỘI, SOCIAL MEDIA MARKETING', 'Hệ thống tăng like, sub, comment, view, tăng tương tác, chia sẻ livestream, dịch vụ tiktok, tăng tim instagram, theo dõi youtube, theo dõi twitter, theo dõi shopee, lượt xem tiktok', 'services', 'viplike.org', 'Hệ thống tăng like, sub, comment, view, tăng tương tác, chia sẻ livestream... Hệ thống mua like uy tín, Tăng like giá rẻ, Dịch vụ tăng like tăng sub giá rẻ, tăng view video FB, Tăng người xem Livestream, tăng theo dõi, tăng like Facebook, tuongtaccheo, traodoisub, tăng like, tăng follow facebook, tiktok, instagram, miễn phí, tương tác chéo, trao đổi sub, giá rẻ đảm bảo uy tín, chất lượng...', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://youtu.be/CutJVfDfRiE', 'https://youtu.be/Z5ToDZw8XzA', '200000', 2000000, NULL, 1000000, 5000000, NULL, 5000000, 20000000, NULL, 0, NULL, NULL, 'naptien', 'off', 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 'eyJpdiI6IkFMVGlTWEwxWEdZVXZNK0VUNjFYUFE9PSIsInZhbHVlIjoiYldCbDVXS21IMWZCWE44MjdtTGwrSTg3VDZVNy9yTlltODN0aUtqdU40bFZzV0NRQjcrQlFoaEVJa1pWdUU5eThtMjVvcFdrSmlURnBRUHl5VEV1NWtBaDNjeE1iRk8vSENmaUMzOTNMUmFyakZKUVdKaDNmcXh2dmlKM3NUOFZiMGtyalhNczF4MjdlYlMrL0hIQ3p3PT0iLCJtYWMiOiJlMGMyYjFkMGZiNTFiYjk0ZWM3NzAwOWFhNmQwY2ZmN2IwMmEyOWRjZDM4MjA2NjVjOTJlYjExZDVkMDc1MzhhIiwidGFnIjoiIn0=', 'viplike.org', '2023-11-19 12:42:24', '2023-11-19 12:42:24');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `api` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `device` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cheat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `identity_website` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `status` tinyint NULL DEFAULT 1 COMMENT 'Trạng thái',
  `spin_count` int NULL DEFAULT 0 COMMENT 'Số lượt quay',
  `full_name` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Tên',
  `price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT '0' COMMENT 'Số dư',
  `all_money` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT '0' COMMENT 'Tổng nạp',
  `avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Avatar',
  `facebook` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Facebook',
  `phone` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Phone',
  `reason` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT 'Lý do chặn',
  `ugroup` tinyint NULL DEFAULT 0 COMMENT '0 => Thành Viên, 1 => Cộng tác viên, 2 => Đại lý, 3 => Nhà phân phối',
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_username_unique`(`username` ASC) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'adminpro', 'admin@example.com', NULL, '$2y$10$VzVjX.jJldknok13UoRFr.gtzWFeSAwAtFafyjuJdKLadA0PWNMGC', 'dwTkCMoVfhtHlrO72FK0Evxb3', '27.67.95.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', 'on', 'viplike.org', 1, 0, NULL, '0', '0', NULL, NULL, NULL, NULL, 0, NULL, '2023-11-19 12:42:24', '2023-11-19 12:42:24');
INSERT INTO `users` VALUES (2, 'clientpro', 'client@example.com', NULL, '$2y$10$rbW3tgQpOShWzDUGK68KVeIjj3GM3k259bseavXG3dojMOucIWDEW', 'gG5FXlKx92yWVvMiBRY3fa70L', '27.67.95.46', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', 'on', 'viplike.org', 1, 0, NULL, '0', '0', NULL, NULL, NULL, NULL, 0, NULL, '2023-11-19 12:42:24', '2023-11-19 12:42:24');

SET FOREIGN_KEY_CHECKS = 1;
