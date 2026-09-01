/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 10.4.32-MariaDB : Database - advertisement_management_system
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`advertisement_management_system` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `advertisement_management_system`;

/*Table structure for table `cache` */

DROP TABLE IF EXISTS `cache`;

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `cache` */

/*Table structure for table `cache_locks` */

DROP TABLE IF EXISTS `cache_locks`;

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `cache_locks` */

/*Table structure for table `categories` */

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_slug_unique` (`slug`),
  KEY `categories_status_index` (`status`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `categories` */

insert  into `categories`(`id`,`name`,`slug`,`description`,`status`,`created_at`,`updated_at`) values 
(1,'Technology','technology',NULL,1,'2026-08-30 16:46:20','2026-08-31 16:53:32'),
(2,'Lifestyle','lifestyle','testing Lifestyle',1,'2026-08-31 16:56:01','2026-08-31 16:56:01'),
(3,'Business','business',NULL,1,'2026-08-31 16:56:36','2026-08-31 18:46:43'),
(4,'Health & Wellness','health-wellness',NULL,1,'2026-09-01 09:28:13','2026-09-01 09:28:13'),
(5,'Finance','finance',NULL,1,'2026-09-01 09:28:41','2026-09-01 09:28:41'),
(6,'Education','education',NULL,1,'2026-09-01 09:28:52','2026-09-01 09:28:52'),
(7,'Career','career',NULL,1,'2026-09-01 09:29:00','2026-09-01 09:29:00'),
(8,'Travel','travel',NULL,1,'2026-09-01 09:29:11','2026-09-01 09:29:11'),
(9,'Food & Recipes','food-recipes',NULL,1,'2026-09-01 09:29:20','2026-09-01 09:29:20'),
(10,'Fitness','fitness',NULL,1,'2026-09-01 09:29:28','2026-09-01 09:29:28'),
(11,'Relationships','relationships',NULL,1,'2026-09-01 09:29:36','2026-09-01 09:29:36'),
(12,'Personal Development','personal-development',NULL,1,'2026-09-01 09:29:49','2026-09-01 09:29:49'),
(13,'Entertainment','entertainment',NULL,1,'2026-09-01 09:29:58','2026-09-01 09:29:58'),
(14,'Sports','sports',NULL,1,'2026-09-01 09:30:06','2026-09-01 09:30:06'),
(15,'Motivation','motivation',NULL,1,'2026-09-01 09:30:14','2026-09-01 09:30:14');

/*Table structure for table `content_tag` */

DROP TABLE IF EXISTS `content_tag`;

CREATE TABLE `content_tag` (
  `content_id` int(20) DEFAULT NULL,
  `tag_id` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `content_tag` */

/*Table structure for table `contents` */

DROP TABLE IF EXISTS `contents`;

CREATE TABLE `contents` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` bigint(20) unsigned DEFAULT NULL,
  `author_id` bigint(20) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `content_type` varchar(255) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `excerpt` text DEFAULT NULL,
  `content` longtext NOT NULL,
  `featured_image` varchar(255) DEFAULT NULL,
  `quote_author` varchar(255) DEFAULT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'draft',
  `published_at` timestamp NULL DEFAULT NULL,
  `views_count` bigint(20) unsigned NOT NULL DEFAULT 0,
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `contents_slug_unique` (`slug`),
  KEY `contents_category_id_index` (`category_id`),
  KEY `contents_author_id_index` (`author_id`),
  KEY `contents_status_index` (`status`),
  KEY `contents_published_at_index` (`published_at`),
  KEY `contents_is_featured_index` (`is_featured`),
  CONSTRAINT `contents_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `contents_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `contents` */

insert  into `contents`(`id`,`category_id`,`author_id`,`title`,`content_type`,`slug`,`excerpt`,`content`,`featured_image`,`quote_author`,`status`,`published_at`,`views_count`,`is_featured`,`created_at`,`updated_at`,`deleted_at`) values 
(3,1,1,'10 Laravel Tips Every Developer Should Know','blog','10-laravel-tips-every-developer-should-know','Like a skyscraper, the launch of Laravel application requires solid foundations to safely build additional floors (features). Over time, the Laravel ecosystem continues to expand and become complicated; what may have been considered a solid, durable structure during the last update now contains critical areas of weakness.','<p>Like a skyscraper, the launch of <b>Laravel </b>application requires solid foundations to safely build additional floors (features). Over time, the Laravel ecosystem continues to expand and become complicated; </p><ol><li>what may have been considered a solid, durable structure during the </li><li>last update now contains critical areas of weakness.Like a skyscraper, the launch of Laravel application requires solid foundations to safely build additional floors (features). Over time, the Laravel ecosystem continues to expand and become complicated; what may have been considered a solid, durable structure during the last update now contains critical areas of weakness.Like a skyscraper, the launch of Laravel application requires solid foundations to safely build additional floors (features). Over time, the Laravel ecosystem continues to expand and become complicated; what may have been considered a solid, durable structure during the last update now contains critical areas of weakness.Like a skyscraper, the launch of Laravel application requires solid foundations to safely build additional floors (features). Over time, the Laravel ecosystem continues to expand and become complicated; what may have been considered a solid, durable structure during the last update now contains critical areas of weakness.Like a skyscraper, the launch of Laravel application requires solid foundations to safely build additional floors (features). Over time, the Laravel ecosystem continues to expand and become complicated; what may have been considered a solid, durable structure during the last update now contains critical areas of weakness.Like a skyscraper, the launch of Laravel application requires solid foundations to safely build additional floors (features). Over time, the Laravel ecosystem continues to expand and become complicated; what may have been considered a solid, durable structure during the last update now contains critical areas of weakness.Like a skyscraper, the launch of Laravel application requires solid foundations to safely build additional floors (features). Over time, the Laravel ecosystem continues to expand and become complicated; what may have been considered a solid, durable structure during the last update now contains critical areas of weakness.\r\nLike a skyscraper, the launch of Laravel application requires solid foundations to safely build additional floors (features). Over time, the Laravel ecosystem continues to expand and become complicated; what may have been considered a solid, durable structure during the last update now contains critical areas of weakness.Like a skyscraper, the launch of Laravel application requires solid foundations to safely build additional floors (features). Over time, the Laravel ecosystem continues to expand and become complicated; what may have been considered a solid, durable structure during the last update now contains critical areas of weakness.</li></ol>','content_1788251293.png',NULL,'published','2026-09-01 08:28:00',0,1,'2026-09-01 08:28:13','2026-09-01 08:32:48',NULL),
(4,2,1,'Success Quote','quote','success-quote',NULL,'<p>Success is not final; failure is not fatal.</p>',NULL,'Winston Churchill','draft','2026-09-01 08:34:17',0,1,'2026-09-01 08:34:17','2026-09-01 09:13:17',NULL);

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `job_batches` */

DROP TABLE IF EXISTS `job_batches`;

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `job_batches` */

/*Table structure for table `jobs` */

DROP TABLE IF EXISTS `jobs`;

CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `jobs` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'0001_01_01_000000_create_users_table',1),
(2,'0001_01_01_000001_create_cache_table',1),
(3,'0001_01_01_000002_create_jobs_table',1);

/*Table structure for table `modules` */

DROP TABLE IF EXISTS `modules`;

CREATE TABLE `modules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `modules` */

insert  into `modules`(`id`,`name`,`created_at`,`updated_at`) values 
(1,'user','2024-03-11 13:13:35','2024-03-11 07:43:35'),
(3,'employee','2024-06-03 04:11:58','2024-06-03 04:11:58');

/*Table structure for table `password_reset_tokens` */

DROP TABLE IF EXISTS `password_reset_tokens`;

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_reset_tokens` */

/*Table structure for table `permission_role` */

DROP TABLE IF EXISTS `permission_role`;

CREATE TABLE `permission_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) DEFAULT NULL,
  `permission_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `permission_role` */

insert  into `permission_role`(`id`,`role_id`,`permission_id`) values 
(3,3,4);

/*Table structure for table `permissions` */

DROP TABLE IF EXISTS `permissions`;

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `module_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `permissions` */

insert  into `permissions`(`id`,`name`,`description`,`module_id`,`created_at`,`updated_at`) values 
(1,'management',NULL,1,'2024-03-11 13:14:32','2024-03-11 07:44:32'),
(4,'management',NULL,3,'2024-06-03 04:12:16','2024-06-03 04:12:16');

/*Table structure for table `role_user` */

DROP TABLE IF EXISTS `role_user`;

CREATE TABLE `role_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `role_user` */

insert  into `role_user`(`id`,`user_id`,`role_id`) values 
(3,4,3),
(7,2,3);

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `roles` */

insert  into `roles`(`id`,`name`,`description`,`created_at`,`updated_at`) values 
(1,'admin',NULL,'2024-03-11 07:41:11','2024-03-11 07:41:11'),
(3,'employee',NULL,'2024-05-10 15:46:24','2024-03-11 07:47:02');

/*Table structure for table `seo_metadata` */

DROP TABLE IF EXISTS `seo_metadata`;

CREATE TABLE `seo_metadata` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `content_id` bigint(20) unsigned NOT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keywords` text DEFAULT NULL,
  `robots` varchar(100) DEFAULT 'index, follow',
  `schema_type` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `seo_meta_seoable_unique` (`content_id`),
  KEY `seo_meta_seoable_index` (`content_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `seo_metadata` */

insert  into `seo_metadata`(`id`,`content_id`,`meta_title`,`meta_description`,`meta_keywords`,`robots`,`schema_type`,`created_at`,`updated_at`) values 
(2,3,'10 Laravel Tips Every Developer Should Know','10 Laravel Tips Every Developer Should Know10 Laravel Tips Every Developer Should Know10 Laravel Tips Every Developer Should Know10 Laravel Tips Every Developer Should Know10 Laravel Tips Every Developer Should Know10 Laravel Tips Every Developer Should Know10 Laravel Tips Every Developer Should Know','laravel, php, laravel 12','index,follow',NULL,'2026-09-01 08:28:13','2026-09-01 08:28:13'),
(3,4,NULL,NULL,NULL,'index,follow',NULL,'2026-09-01 08:34:17','2026-09-01 08:34:17');

/*Table structure for table `sessions` */

DROP TABLE IF EXISTS `sessions`;

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `sessions` */

insert  into `sessions`(`id`,`user_id`,`ip_address`,`user_agent`,`payload`,`last_activity`) values 
('ASViuKvRSnbRD6xdyLvIcwLtWJDdotb1VBgg9NEh',1,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiYTd2QWliY0dsZDJOTE50M1UzSU5YN3huTmxVYnlnVkxydkp2YlpObCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jbXMvdGFncy9jcmVhdGUiO3M6NToicm91dGUiO3M6MTU6ImNtcy50YWdzLmNyZWF0ZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==',1788256983);

/*Table structure for table `tags` */

DROP TABLE IF EXISTS `tags`;

CREATE TABLE `tags` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tags_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tags` */

insert  into `tags`(`id`,`name`,`slug`,`created_at`,`updated_at`) values 
(1,'Morning Habits','morning-habits','2026-09-01 09:48:48','2026-09-01 09:48:48'),
(2,'Morning Routine','morning-routine','2026-09-01 09:48:59','2026-09-01 09:48:59'),
(3,'Productivity','productivity','2026-09-01 09:49:09','2026-09-01 09:49:09'),
(4,'Daily Habits','daily-habits','2026-09-01 09:49:17','2026-09-01 09:49:17'),
(5,'Healthy Habits','healthy-habits','2026-09-01 09:49:25','2026-09-01 09:49:25'),
(6,'Work From Home','work-from-home','2026-09-01 09:49:49','2026-09-01 09:49:49'),
(7,'Time Management','time-management','2026-09-01 09:49:57','2026-09-01 09:49:57'),
(8,'Focus','focus','2026-09-01 09:50:09','2026-09-01 09:50:09'),
(9,'Remote Work','remote-work','2026-09-01 09:50:20','2026-09-01 09:50:20'),
(10,'Artificial Intelligence','artificial-intelligence','2026-09-01 09:55:55','2026-09-01 09:55:55'),
(11,'AI','ai','2026-09-01 09:56:03','2026-09-01 09:56:03'),
(12,'Automation','automation','2026-09-01 09:56:15','2026-09-01 09:56:15'),
(13,'Technology Trends','technology-trends','2026-09-01 09:56:31','2026-09-01 09:56:31'),
(14,'Self Improvement','self-improvement','2026-09-01 09:56:42','2026-09-01 09:56:42'),
(15,'Personal Growth','personal-growth','2026-09-01 09:57:00','2026-09-01 09:57:00'),
(16,'Life Lessons','life-lessons','2026-09-01 09:57:08','2026-09-01 09:57:08'),
(17,'Success','success','2026-09-01 09:57:21','2026-09-01 09:57:21'),
(18,'Consistency','consistency','2026-09-01 09:57:30','2026-09-01 09:57:30'),
(19,'Discipline','discipline','2026-09-01 09:57:40','2026-09-01 09:57:40'),
(20,'Success Mindset','success-mindset','2026-09-01 09:58:14','2026-09-01 09:58:14'),
(21,'Saving Money','saving-money','2026-09-01 09:58:31','2026-09-01 09:58:31'),
(22,'Money Management','money-management','2026-09-01 09:58:44','2026-09-01 09:58:44'),
(23,'Budgeting','budgeting','2026-09-01 09:58:56','2026-09-01 09:58:56'),
(24,'Personal Finance','personal-finance','2026-09-01 09:59:05','2026-09-01 09:59:05'),
(25,'Indian Recipes','indian-recipes','2026-09-01 09:59:15','2026-09-01 09:59:15'),
(26,'Easy Recipes','easy-recipes','2026-09-01 09:59:25','2026-09-01 09:59:25'),
(27,'Quick Recipes','quick-recipes','2026-09-01 09:59:35','2026-09-01 09:59:35'),
(28,'Dinner Recipes','dinner-recipes','2026-09-01 09:59:44','2026-09-01 09:59:44'),
(29,'Home Workout','home-workout','2026-09-01 10:00:22','2026-09-01 10:00:22'),
(30,'Beginner Workout','beginner-workout','2026-09-01 10:00:36','2026-09-01 10:00:36'),
(31,'Exercise','exercise','2026-09-01 10:00:44','2026-09-01 10:00:44'),
(32,'Fitness Tips','fitness-tips','2026-09-01 10:00:56','2026-09-01 10:00:56'),
(33,'Resume','resume','2026-09-01 10:01:06','2026-09-01 10:01:06'),
(34,'Resume Tips','resume-tips','2026-09-01 10:01:17','2026-09-01 10:01:17'),
(35,'Job Search','job-search','2026-09-01 10:01:26','2026-09-01 10:01:26'),
(36,'Career Advice','career-advice','2026-09-01 10:01:35','2026-09-01 10:01:35'),
(37,'Budget Travel','budget-travel','2026-09-01 10:01:48','2026-09-01 10:01:48'),
(38,'Travel Tips','travel-tips','2026-09-01 10:02:04','2026-09-01 10:02:04'),
(39,'Travel Destinations','travel-destinations','2026-09-01 10:02:13','2026-09-01 10:02:13'),
(40,'Vacation','vacation','2026-09-01 10:02:20','2026-09-01 10:02:20'),
(41,'Job Interview','job-interview','2026-09-01 10:02:31','2026-09-01 10:02:31'),
(42,'Interview Tips','interview-tips','2026-09-01 10:02:43','2026-09-01 10:02:43');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `super_admin` tinyint(1) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `profile_pic` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`email_verified_at`,`password`,`super_admin`,`remember_token`,`profile_pic`,`created_at`,`updated_at`) values 
(1,'admin','admin@gmail.com',NULL,'$2y$12$uQJO4Wi61NsVxy.XQgncj.0TA4D2ESoxIQZWNG9PAFrhVe/bYItYK',1,NULL,NULL,'2026-08-30 09:09:31','2026-08-30 15:06:57'),
(2,'author','author@gmail.com',NULL,'$2y$12$6F.ZZwIG9DT2yeVJN..Ab.EFGnGS08azYGf0bYcVXJhMwPJrkfBo6',NULL,NULL,'user_1788104706.png','2026-08-30 15:45:06','2026-08-30 15:45:06');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
