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

insert  into `cache`(`key`,`value`,`expiration`) values 
('advertisement_management_system_cache_frontend.home','a:5:{s:13:\"featuredPosts\";O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:1:{i:0;O:18:\"App\\Models\\Content\":34:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:8:\"contents\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:8:{s:2:\"id\";i:3;s:11:\"category_id\";i:1;s:5:\"title\";s:43:\"10 Laravel Tips Every Developer Should Know\";s:4:\"slug\";s:43:\"10-laravel-tips-every-developer-should-know\";s:12:\"content_type\";s:4:\"blog\";s:7:\"excerpt\";s:323:\"Like a skyscraper, the launch of Laravel application requires solid foundations to safely build additional floors (features). Over time, the Laravel ecosystem continues to expand and become complicated; what may have been considered a solid, durable structure during the last update now contains critical areas of weakness.\";s:14:\"featured_image\";s:22:\"content_1788251293.png\";s:12:\"published_at\";s:19:\"2026-09-01 08:28:00\";}s:11:\"\0*\0original\";a:8:{s:2:\"id\";i:3;s:11:\"category_id\";i:1;s:5:\"title\";s:43:\"10 Laravel Tips Every Developer Should Know\";s:4:\"slug\";s:43:\"10-laravel-tips-every-developer-should-know\";s:12:\"content_type\";s:4:\"blog\";s:7:\"excerpt\";s:323:\"Like a skyscraper, the launch of Laravel application requires solid foundations to safely build additional floors (features). Over time, the Laravel ecosystem continues to expand and become complicated; what may have been considered a solid, durable structure during the last update now contains critical areas of weakness.\";s:14:\"featured_image\";s:22:\"content_1788251293.png\";s:12:\"published_at\";s:19:\"2026-09-01 08:28:00\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:4:{s:12:\"published_at\";s:8:\"datetime\";s:11:\"is_featured\";s:7:\"boolean\";s:11:\"views_count\";s:7:\"integer\";s:10:\"deleted_at\";s:8:\"datetime\";}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:1:{s:8:\"category\";O:19:\"App\\Models\\Category\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"categories\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:3:{s:2:\"id\";i:1;s:4:\"name\";s:10:\"Technology\";s:4:\"slug\";s:10:\"technology\";}s:11:\"\0*\0original\";a:3:{s:2:\"id\";i:1;s:4:\"name\";s:10:\"Technology\";s:4:\"slug\";s:10:\"technology\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:1:{s:6:\"status\";s:7:\"boolean\";}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:4:{i:0;s:4:\"name\";i:1;s:4:\"slug\";i:2;s:11:\"description\";i:3;s:6:\"status\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:13:{i:0;s:11:\"category_id\";i:1;s:5:\"title\";i:2;s:4:\"slug\";i:3;s:12:\"content_type\";i:4;s:7:\"excerpt\";i:5;s:7:\"content\";i:6;s:14:\"featured_image\";i:7;s:9:\"author_id\";i:8;s:12:\"quote_author\";i:9;s:6:\"status\";i:10;s:12:\"published_at\";i:11;s:11:\"is_featured\";i:12;s:11:\"views_count\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}s:16:\"\0*\0forceDeleting\";b:0;}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:11:\"recentPosts\";O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:1:{i:0;O:18:\"App\\Models\\Content\":34:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:8:\"contents\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:8:{s:2:\"id\";i:3;s:11:\"category_id\";i:1;s:5:\"title\";s:43:\"10 Laravel Tips Every Developer Should Know\";s:4:\"slug\";s:43:\"10-laravel-tips-every-developer-should-know\";s:12:\"content_type\";s:4:\"blog\";s:7:\"excerpt\";s:323:\"Like a skyscraper, the launch of Laravel application requires solid foundations to safely build additional floors (features). Over time, the Laravel ecosystem continues to expand and become complicated; what may have been considered a solid, durable structure during the last update now contains critical areas of weakness.\";s:14:\"featured_image\";s:22:\"content_1788251293.png\";s:12:\"published_at\";s:19:\"2026-09-01 08:28:00\";}s:11:\"\0*\0original\";a:8:{s:2:\"id\";i:3;s:11:\"category_id\";i:1;s:5:\"title\";s:43:\"10 Laravel Tips Every Developer Should Know\";s:4:\"slug\";s:43:\"10-laravel-tips-every-developer-should-know\";s:12:\"content_type\";s:4:\"blog\";s:7:\"excerpt\";s:323:\"Like a skyscraper, the launch of Laravel application requires solid foundations to safely build additional floors (features). Over time, the Laravel ecosystem continues to expand and become complicated; what may have been considered a solid, durable structure during the last update now contains critical areas of weakness.\";s:14:\"featured_image\";s:22:\"content_1788251293.png\";s:12:\"published_at\";s:19:\"2026-09-01 08:28:00\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:4:{s:12:\"published_at\";s:8:\"datetime\";s:11:\"is_featured\";s:7:\"boolean\";s:11:\"views_count\";s:7:\"integer\";s:10:\"deleted_at\";s:8:\"datetime\";}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:1:{s:8:\"category\";O:19:\"App\\Models\\Category\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"categories\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:3:{s:2:\"id\";i:1;s:4:\"name\";s:10:\"Technology\";s:4:\"slug\";s:10:\"technology\";}s:11:\"\0*\0original\";a:3:{s:2:\"id\";i:1;s:4:\"name\";s:10:\"Technology\";s:4:\"slug\";s:10:\"technology\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:1:{s:6:\"status\";s:7:\"boolean\";}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:4:{i:0;s:4:\"name\";i:1;s:4:\"slug\";i:2;s:11:\"description\";i:3;s:6:\"status\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:13:{i:0;s:11:\"category_id\";i:1;s:5:\"title\";i:2;s:4:\"slug\";i:3;s:12:\"content_type\";i:4;s:7:\"excerpt\";i:5;s:7:\"content\";i:6;s:14:\"featured_image\";i:7;s:9:\"author_id\";i:8;s:12:\"quote_author\";i:9;s:6:\"status\";i:10;s:12:\"published_at\";i:11;s:11:\"is_featured\";i:12;s:11:\"views_count\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}s:16:\"\0*\0forceDeleting\";b:0;}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:12:\"popularPosts\";O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:1:{i:0;O:18:\"App\\Models\\Content\":34:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:8:\"contents\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:9:{s:2:\"id\";i:3;s:11:\"category_id\";i:1;s:5:\"title\";s:43:\"10 Laravel Tips Every Developer Should Know\";s:4:\"slug\";s:43:\"10-laravel-tips-every-developer-should-know\";s:12:\"content_type\";s:4:\"blog\";s:7:\"excerpt\";s:323:\"Like a skyscraper, the launch of Laravel application requires solid foundations to safely build additional floors (features). Over time, the Laravel ecosystem continues to expand and become complicated; what may have been considered a solid, durable structure during the last update now contains critical areas of weakness.\";s:14:\"featured_image\";s:22:\"content_1788251293.png\";s:12:\"published_at\";s:19:\"2026-09-01 08:28:00\";s:11:\"views_count\";i:0;}s:11:\"\0*\0original\";a:9:{s:2:\"id\";i:3;s:11:\"category_id\";i:1;s:5:\"title\";s:43:\"10 Laravel Tips Every Developer Should Know\";s:4:\"slug\";s:43:\"10-laravel-tips-every-developer-should-know\";s:12:\"content_type\";s:4:\"blog\";s:7:\"excerpt\";s:323:\"Like a skyscraper, the launch of Laravel application requires solid foundations to safely build additional floors (features). Over time, the Laravel ecosystem continues to expand and become complicated; what may have been considered a solid, durable structure during the last update now contains critical areas of weakness.\";s:14:\"featured_image\";s:22:\"content_1788251293.png\";s:12:\"published_at\";s:19:\"2026-09-01 08:28:00\";s:11:\"views_count\";i:0;}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:4:{s:12:\"published_at\";s:8:\"datetime\";s:11:\"is_featured\";s:7:\"boolean\";s:11:\"views_count\";s:7:\"integer\";s:10:\"deleted_at\";s:8:\"datetime\";}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:1:{s:8:\"category\";O:19:\"App\\Models\\Category\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"categories\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:3:{s:2:\"id\";i:1;s:4:\"name\";s:10:\"Technology\";s:4:\"slug\";s:10:\"technology\";}s:11:\"\0*\0original\";a:3:{s:2:\"id\";i:1;s:4:\"name\";s:10:\"Technology\";s:4:\"slug\";s:10:\"technology\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:1:{s:6:\"status\";s:7:\"boolean\";}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:4:{i:0;s:4:\"name\";i:1;s:4:\"slug\";i:2;s:11:\"description\";i:3;s:6:\"status\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:13:{i:0;s:11:\"category_id\";i:1;s:5:\"title\";i:2;s:4:\"slug\";i:3;s:12:\"content_type\";i:4;s:7:\"excerpt\";i:5;s:7:\"content\";i:6;s:14:\"featured_image\";i:7;s:9:\"author_id\";i:8;s:12:\"quote_author\";i:9;s:6:\"status\";i:10;s:12:\"published_at\";i:11;s:11:\"is_featured\";i:12;s:11:\"views_count\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}s:16:\"\0*\0forceDeleting\";b:0;}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:10:\"categories\";O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:15:{i:0;O:19:\"App\\Models\\Category\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"categories\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:3:{s:2:\"id\";i:3;s:4:\"name\";s:8:\"Business\";s:4:\"slug\";s:8:\"business\";}s:11:\"\0*\0original\";a:3:{s:2:\"id\";i:3;s:4:\"name\";s:8:\"Business\";s:4:\"slug\";s:8:\"business\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:1:{s:6:\"status\";s:7:\"boolean\";}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:4:{i:0;s:4:\"name\";i:1;s:4:\"slug\";i:2;s:11:\"description\";i:3;s:6:\"status\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:1;O:19:\"App\\Models\\Category\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"categories\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:3:{s:2:\"id\";i:7;s:4:\"name\";s:6:\"Career\";s:4:\"slug\";s:6:\"career\";}s:11:\"\0*\0original\";a:3:{s:2:\"id\";i:7;s:4:\"name\";s:6:\"Career\";s:4:\"slug\";s:6:\"career\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:1:{s:6:\"status\";s:7:\"boolean\";}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:4:{i:0;s:4:\"name\";i:1;s:4:\"slug\";i:2;s:11:\"description\";i:3;s:6:\"status\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:2;O:19:\"App\\Models\\Category\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"categories\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:3:{s:2:\"id\";i:6;s:4:\"name\";s:9:\"Education\";s:4:\"slug\";s:9:\"education\";}s:11:\"\0*\0original\";a:3:{s:2:\"id\";i:6;s:4:\"name\";s:9:\"Education\";s:4:\"slug\";s:9:\"education\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:1:{s:6:\"status\";s:7:\"boolean\";}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:4:{i:0;s:4:\"name\";i:1;s:4:\"slug\";i:2;s:11:\"description\";i:3;s:6:\"status\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:3;O:19:\"App\\Models\\Category\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"categories\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:3:{s:2:\"id\";i:13;s:4:\"name\";s:13:\"Entertainment\";s:4:\"slug\";s:13:\"entertainment\";}s:11:\"\0*\0original\";a:3:{s:2:\"id\";i:13;s:4:\"name\";s:13:\"Entertainment\";s:4:\"slug\";s:13:\"entertainment\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:1:{s:6:\"status\";s:7:\"boolean\";}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:4:{i:0;s:4:\"name\";i:1;s:4:\"slug\";i:2;s:11:\"description\";i:3;s:6:\"status\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:4;O:19:\"App\\Models\\Category\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"categories\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:3:{s:2:\"id\";i:5;s:4:\"name\";s:7:\"Finance\";s:4:\"slug\";s:7:\"finance\";}s:11:\"\0*\0original\";a:3:{s:2:\"id\";i:5;s:4:\"name\";s:7:\"Finance\";s:4:\"slug\";s:7:\"finance\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:1:{s:6:\"status\";s:7:\"boolean\";}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:4:{i:0;s:4:\"name\";i:1;s:4:\"slug\";i:2;s:11:\"description\";i:3;s:6:\"status\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:5;O:19:\"App\\Models\\Category\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"categories\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:3:{s:2:\"id\";i:10;s:4:\"name\";s:7:\"Fitness\";s:4:\"slug\";s:7:\"fitness\";}s:11:\"\0*\0original\";a:3:{s:2:\"id\";i:10;s:4:\"name\";s:7:\"Fitness\";s:4:\"slug\";s:7:\"fitness\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:1:{s:6:\"status\";s:7:\"boolean\";}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:4:{i:0;s:4:\"name\";i:1;s:4:\"slug\";i:2;s:11:\"description\";i:3;s:6:\"status\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:6;O:19:\"App\\Models\\Category\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"categories\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:3:{s:2:\"id\";i:9;s:4:\"name\";s:14:\"Food & Recipes\";s:4:\"slug\";s:12:\"food-recipes\";}s:11:\"\0*\0original\";a:3:{s:2:\"id\";i:9;s:4:\"name\";s:14:\"Food & Recipes\";s:4:\"slug\";s:12:\"food-recipes\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:1:{s:6:\"status\";s:7:\"boolean\";}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:4:{i:0;s:4:\"name\";i:1;s:4:\"slug\";i:2;s:11:\"description\";i:3;s:6:\"status\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:7;O:19:\"App\\Models\\Category\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"categories\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:3:{s:2:\"id\";i:4;s:4:\"name\";s:17:\"Health & Wellness\";s:4:\"slug\";s:15:\"health-wellness\";}s:11:\"\0*\0original\";a:3:{s:2:\"id\";i:4;s:4:\"name\";s:17:\"Health & Wellness\";s:4:\"slug\";s:15:\"health-wellness\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:1:{s:6:\"status\";s:7:\"boolean\";}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:4:{i:0;s:4:\"name\";i:1;s:4:\"slug\";i:2;s:11:\"description\";i:3;s:6:\"status\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:8;O:19:\"App\\Models\\Category\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"categories\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:3:{s:2:\"id\";i:2;s:4:\"name\";s:9:\"Lifestyle\";s:4:\"slug\";s:9:\"lifestyle\";}s:11:\"\0*\0original\";a:3:{s:2:\"id\";i:2;s:4:\"name\";s:9:\"Lifestyle\";s:4:\"slug\";s:9:\"lifestyle\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:1:{s:6:\"status\";s:7:\"boolean\";}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:4:{i:0;s:4:\"name\";i:1;s:4:\"slug\";i:2;s:11:\"description\";i:3;s:6:\"status\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:9;O:19:\"App\\Models\\Category\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"categories\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:3:{s:2:\"id\";i:15;s:4:\"name\";s:10:\"Motivation\";s:4:\"slug\";s:10:\"motivation\";}s:11:\"\0*\0original\";a:3:{s:2:\"id\";i:15;s:4:\"name\";s:10:\"Motivation\";s:4:\"slug\";s:10:\"motivation\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:1:{s:6:\"status\";s:7:\"boolean\";}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:4:{i:0;s:4:\"name\";i:1;s:4:\"slug\";i:2;s:11:\"description\";i:3;s:6:\"status\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:10;O:19:\"App\\Models\\Category\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"categories\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:3:{s:2:\"id\";i:12;s:4:\"name\";s:20:\"Personal Development\";s:4:\"slug\";s:20:\"personal-development\";}s:11:\"\0*\0original\";a:3:{s:2:\"id\";i:12;s:4:\"name\";s:20:\"Personal Development\";s:4:\"slug\";s:20:\"personal-development\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:1:{s:6:\"status\";s:7:\"boolean\";}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:4:{i:0;s:4:\"name\";i:1;s:4:\"slug\";i:2;s:11:\"description\";i:3;s:6:\"status\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:11;O:19:\"App\\Models\\Category\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"categories\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:3:{s:2:\"id\";i:11;s:4:\"name\";s:13:\"Relationships\";s:4:\"slug\";s:13:\"relationships\";}s:11:\"\0*\0original\";a:3:{s:2:\"id\";i:11;s:4:\"name\";s:13:\"Relationships\";s:4:\"slug\";s:13:\"relationships\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:1:{s:6:\"status\";s:7:\"boolean\";}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:4:{i:0;s:4:\"name\";i:1;s:4:\"slug\";i:2;s:11:\"description\";i:3;s:6:\"status\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:12;O:19:\"App\\Models\\Category\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"categories\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:3:{s:2:\"id\";i:14;s:4:\"name\";s:6:\"Sports\";s:4:\"slug\";s:6:\"sports\";}s:11:\"\0*\0original\";a:3:{s:2:\"id\";i:14;s:4:\"name\";s:6:\"Sports\";s:4:\"slug\";s:6:\"sports\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:1:{s:6:\"status\";s:7:\"boolean\";}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:4:{i:0;s:4:\"name\";i:1;s:4:\"slug\";i:2;s:11:\"description\";i:3;s:6:\"status\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:13;O:19:\"App\\Models\\Category\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"categories\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:3:{s:2:\"id\";i:1;s:4:\"name\";s:10:\"Technology\";s:4:\"slug\";s:10:\"technology\";}s:11:\"\0*\0original\";a:3:{s:2:\"id\";i:1;s:4:\"name\";s:10:\"Technology\";s:4:\"slug\";s:10:\"technology\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:1:{s:6:\"status\";s:7:\"boolean\";}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:4:{i:0;s:4:\"name\";i:1;s:4:\"slug\";i:2;s:11:\"description\";i:3;s:6:\"status\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:14;O:19:\"App\\Models\\Category\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"categories\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:3:{s:2:\"id\";i:8;s:4:\"name\";s:6:\"Travel\";s:4:\"slug\";s:6:\"travel\";}s:11:\"\0*\0original\";a:3:{s:2:\"id\";i:8;s:4:\"name\";s:6:\"Travel\";s:4:\"slug\";s:6:\"travel\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:1:{s:6:\"status\";s:7:\"boolean\";}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:4:{i:0;s:4:\"name\";i:1;s:4:\"slug\";i:2;s:11:\"description\";i:3;s:6:\"status\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:16:\"categorySections\";O:29:\"Illuminate\\Support\\Collection\":2:{s:8:\"\0*\0items\";a:1:{i:0;a:2:{s:8:\"category\";r:958;s:5:\"posts\";O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:1:{i:0;O:18:\"App\\Models\\Content\":34:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:8:\"contents\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:8:{s:2:\"id\";i:3;s:11:\"category_id\";i:1;s:5:\"title\";s:43:\"10 Laravel Tips Every Developer Should Know\";s:4:\"slug\";s:43:\"10-laravel-tips-every-developer-should-know\";s:12:\"content_type\";s:4:\"blog\";s:7:\"excerpt\";s:323:\"Like a skyscraper, the launch of Laravel application requires solid foundations to safely build additional floors (features). Over time, the Laravel ecosystem continues to expand and become complicated; what may have been considered a solid, durable structure during the last update now contains critical areas of weakness.\";s:14:\"featured_image\";s:22:\"content_1788251293.png\";s:12:\"published_at\";s:19:\"2026-09-01 08:28:00\";}s:11:\"\0*\0original\";a:8:{s:2:\"id\";i:3;s:11:\"category_id\";i:1;s:5:\"title\";s:43:\"10 Laravel Tips Every Developer Should Know\";s:4:\"slug\";s:43:\"10-laravel-tips-every-developer-should-know\";s:12:\"content_type\";s:4:\"blog\";s:7:\"excerpt\";s:323:\"Like a skyscraper, the launch of Laravel application requires solid foundations to safely build additional floors (features). Over time, the Laravel ecosystem continues to expand and become complicated; what may have been considered a solid, durable structure during the last update now contains critical areas of weakness.\";s:14:\"featured_image\";s:22:\"content_1788251293.png\";s:12:\"published_at\";s:19:\"2026-09-01 08:28:00\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:4:{s:12:\"published_at\";s:8:\"datetime\";s:11:\"is_featured\";s:7:\"boolean\";s:11:\"views_count\";s:7:\"integer\";s:10:\"deleted_at\";s:8:\"datetime\";}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:1:{s:8:\"category\";O:19:\"App\\Models\\Category\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"categories\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:3:{s:2:\"id\";i:1;s:4:\"name\";s:10:\"Technology\";s:4:\"slug\";s:10:\"technology\";}s:11:\"\0*\0original\";a:3:{s:2:\"id\";i:1;s:4:\"name\";s:10:\"Technology\";s:4:\"slug\";s:10:\"technology\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:1:{s:6:\"status\";s:7:\"boolean\";}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:4:{i:0;s:4:\"name\";i:1;s:4:\"slug\";i:2;s:11:\"description\";i:3;s:6:\"status\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:13:{i:0;s:11:\"category_id\";i:1;s:5:\"title\";i:2;s:4:\"slug\";i:3;s:12:\"content_type\";i:4;s:7:\"excerpt\";i:5;s:7:\"content\";i:6;s:14:\"featured_image\";i:7;s:9:\"author_id\";i:8;s:12:\"quote_author\";i:9;s:6:\"status\";i:10;s:12:\"published_at\";i:11;s:11:\"is_featured\";i:12;s:11:\"views_count\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}s:16:\"\0*\0forceDeleting\";b:0;}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}}',1788327211);

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

insert  into `content_tag`(`content_id`,`tag_id`) values 
(5,11),
(5,10),
(5,36),
(5,43),
(5,8),
(5,14);

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `contents` */

insert  into `contents`(`id`,`category_id`,`author_id`,`title`,`content_type`,`slug`,`excerpt`,`content`,`featured_image`,`quote_author`,`status`,`published_at`,`views_count`,`is_featured`,`created_at`,`updated_at`,`deleted_at`) values 
(3,1,1,'10 Laravel Tips Every Developer Should Know','blog','10-laravel-tips-every-developer-should-know','Like a skyscraper, the launch of Laravel application requires solid foundations to safely build additional floors (features). Over time, the Laravel ecosystem continues to expand and become complicated; what may have been considered a solid, durable structure during the last update now contains critical areas of weakness.','<p>Like a skyscraper, the launch of <b>Laravel </b>application requires solid foundations to safely build additional floors (features). Over time, the Laravel ecosystem continues to expand and become complicated; </p><ol><li>what may have been considered a solid, durable structure during the </li><li>last update now contains critical areas of weakness.Like a skyscraper, the launch of Laravel application requires solid foundations to safely build additional floors (features). Over time, the Laravel ecosystem continues to expand and become complicated; what may have been considered a solid, durable structure during the last update now contains critical areas of weakness.Like a skyscraper, the launch of Laravel application requires solid foundations to safely build additional floors (features). Over time, the Laravel ecosystem continues to expand and become complicated; what may have been considered a solid, durable structure during the last update now contains critical areas of weakness.Like a skyscraper, the launch of Laravel application requires solid foundations to safely build additional floors (features). Over time, the Laravel ecosystem continues to expand and become complicated; what may have been considered a solid, durable structure during the last update now contains critical areas of weakness.Like a skyscraper, the launch of Laravel application requires solid foundations to safely build additional floors (features). Over time, the Laravel ecosystem continues to expand and become complicated; what may have been considered a solid, durable structure during the last update now contains critical areas of weakness.Like a skyscraper, the launch of Laravel application requires solid foundations to safely build additional floors (features). Over time, the Laravel ecosystem continues to expand and become complicated; what may have been considered a solid, durable structure during the last update now contains critical areas of weakness.Like a skyscraper, the launch of Laravel application requires solid foundations to safely build additional floors (features). Over time, the Laravel ecosystem continues to expand and become complicated; what may have been considered a solid, durable structure during the last update now contains critical areas of weakness.\r\nLike a skyscraper, the launch of Laravel application requires solid foundations to safely build additional floors (features). Over time, the Laravel ecosystem continues to expand and become complicated; what may have been considered a solid, durable structure during the last update now contains critical areas of weakness.Like a skyscraper, the launch of Laravel application requires solid foundations to safely build additional floors (features). Over time, the Laravel ecosystem continues to expand and become complicated; what may have been considered a solid, durable structure during the last update now contains critical areas of weakness.</li></ol>','content_1788251293.png',NULL,'published','2026-09-01 08:28:00',0,1,'2026-09-01 08:28:13','2026-09-01 08:32:48',NULL),
(4,2,1,'Success Quote','quote','success-quote',NULL,'<p>Success is not final; failure is not fatal.</p>',NULL,'Winston Churchill','published','2026-09-02 05:41:44',0,1,'2026-09-01 08:34:17','2026-09-02 05:41:44',NULL),
(5,1,1,'Top Coding Mistakes Beginners. How to Avoid Them','blog','top-coding-mistakes-beginners-how-to-avoid-them',NULL,'<p>Learning to code for the first time can be exciting and confusing at the same time. One day you write a program and feel really proud of yourself. The day one small error keeps you stuck for an hour. This is very normal. Every student goes through this stage. The good thing is that most&nbsp; coding mistakes beginners make&nbsp; can be fixed with practice and a calm mindset.</p><p>Many students think that coding is about typing commands.. Coding is more about thinking clearly. You learn how to break a problem into steps, test your idea and improve it. When beginners understand this they stop feeling scared of errors. In this blog we will discuss&nbsp; beginner coding mistakes, common programming mistakes&nbsp; and simple ways to avoid them.</p><p><br></p><h3 class=\"\">&nbsp;1. Skipping the Basics Too</h3><p>One of the biggest&nbsp; coding mistakes beginners make&nbsp; is skipping the basics. Many students want to build websites, apps, games or AI projects. This excitement is good. Jumping too fast can create confusion later.</p><p>Before building projects you must understand&nbsp; programming basics&nbsp; like variables, loops, conditions, functions and data types. These topics may look simple. They are used everywhere. Even advanced projects depend on these concepts.</p><p>For example if you do not understand loops properly you may struggle while working with lists, tables, forms or repeated tasks. If functions are not clear your code may become messy and hard to manage. This is why beginners should give time to basic topics.</p><p>A better approach is to&nbsp; learn coding step by step . Start with programs. Write code to add two numbers, check even numbers, print patterns or make a simple calculator. These small exercises build confidence. They also reduce&nbsp; beginner coding mistakes&nbsp; in the future.</p><p><br></p><h3 class=\"\">&nbsp;2. Copying Code Without Understanding</h3><p>Copying code is one of the&nbsp; common programming mistakes&nbsp; among beginners. A student watches a tutorial, copies the code, runs it and feels happy when the output comes.. When the same student has to write similar code alone they get stuck.</p><p>There is nothing with learning from examples. In fact, examples are helpful. The problem starts when you copy without understanding. Coding is not about memorizing lines. It is about knowing why each line is written.</p><p>Whenever you copy code, ask yourself simple questions. What is this line doing? Why is this condition used? What will happen if I change this value? Can I write this code in my way? These questions help you understand the logic.</p><p>To avoid&nbsp; programming mistakes, rewrite the same code after watching the tutorial. Change names. Try inputs. Remove one line. See what happens. This small habit can make your learning much stronger.</p><p><br></p><h3 class=\"\">&nbsp;3. Not Practicing</h3><p>Many beginners spend more time watching videos than writing code. This is another one of the major&nbsp; coding mistakes beginners make . Watching tutorials feels easy because the teacher is doing the work.. Real learning starts when you write the code yourself.</p><p>Coding is like driving. You cannot learn it by watching someone drive. You have to sit in the driver’s seat and practice. In this way you have to type code, make errors, fix them and try again.</p><p>If you are serious about&nbsp; coding for beginners, make a practice habit. 30 To 45 minutes a day can help a lot. After learning one topic, write at least five small programs based on it. If you learn loops, practice loop questions. If you learn functions, create your functions.</p><p>This regular practice helps you avoid&nbsp; &nbsp;beginner coding mistakes . It also builds confidence because you start solving problems on your own.</p><p><br></p><h3 class=\"\">&nbsp;4. Getting Scared of Errors</h3><p>Errors are not a sign that you\'re bad at coding. Errors are part of coding. Experienced developers get errors. The difference is that they do not panic. They read the error. Try to understand it.</p><p>One of the&nbsp; common programming mistakes&nbsp; is ignoring the error message. Beginners often see text and immediately feel nervous. Some start changing lines of code without knowing the actual problem. This usually creates confusion.</p><p>The better way is to slow down. Read the error carefully. Check the line number. Look at the spelling, brackets, commas and indentation. Many errors happen because of mistakes.</p><p>For example a missing colon, wrong variable name or extra bracket can stop the program. So when you see an error do not feel bad. Think of it as a clue. Every error teaches you something.</p><p>This is one of the useful&nbsp; beginner programmer tips : learn to read errors instead of running away from them.</p><p><br></p><h3 class=\"\">&nbsp;5. Writing Messy Code</h3><p>In the beginning many students only care about output. If the program works they feel the job is done.. Writing clean code is also important. Messy code is one of those&nbsp; beginner coding mistakes&nbsp; that may not hurt you today. It will trouble you later.</p><p>Messy code usually has names, poor spacing, no proper structure and too many lines written together. After a day even the same student may not understand what they wrote.</p><p>Clean code is easy to read. Use variable names. For example instead of writing `x` and `y` everywhere, use names like `total_marks` `student_name` or `final_price`. These names make your code easier to understand.</p><p>Also keep your code arranged. Use spaces where needed. Follow indentation rules. Add comments only when the logic is not clear. Clean code makes debugging easier. Reduces&nbsp; programming mistakes .</p><p><br></p><h3 class=\"\">&nbsp;6. Trying to Learn Many Languages</h3><p>Another common issue is learning too many programming languages at once. A beginner starts with Python then moves to JavaScript then watches videos on Java, C++ and web development. After some time everything feels mixed.</p><p>This is one of the&nbsp; coding mistakes beginners make&nbsp; because they feel they must learn everything quickly.. Learning coding is not a race. It is better to understand one language than to touch five languages without confidence.</p><p>Choose one language. Focus on it for some time. Python is often good for beginners because the syntax is simple. JavaScript is useful for web development.. The best choice depends on your goal.</p><p>If you are joining&nbsp; coding classes in Jalandhar&nbsp; or learning from home, ask your trainer which language suits your starting level. A good path can save you time. Reduce confusion.</p><p><br></p><h3 class=\"\">&nbsp;7. Not Building Small Projects</h3><p>Only learning theory is not enough. Many students complete topics. Never create anything. This is one of the&nbsp; common programming mistakes . You may know loops, functions and conditions. If you do not apply them you may forget them quickly.</p><p>Small projects help you understand how coding works in life. You do not need to start with a project. Start with ideas. Make a calculator, quiz app to-do list, student marks program or number guessing game.</p><p>When you build projects you face problems. You learn how to connect concepts. You also learn how to fix errors. This is where actual growth happens.</p><p>Students who join&nbsp; programming classes in Jalandhar&nbsp; or any practical training should always ask for project-based learning. Projects make coding more interesting and useful.</p><p><br></p><h3 class=\"\">&nbsp;8. Ignoring Logic Building</h3><p>Many beginners focus on syntax. Syntax means the rules of a programming language.. Coding is not just about syntax. Logic is the heart of coding. If your logic is weak you will struggle even if you know the language.</p><p>Ignoring logic building is one of the&nbsp; beginner coding mistakes . A student may know how to write an `if` statement. They may not know where to use it. They may know loops. They may not understand how to solve a problem using loops.</p><p>To improve logic practice questions. Find the number. Count vowels in a word. Reverse a string. Check numbers. Print multiplication tables. These exercises look basic. They train your brain.</p><p>A good&nbsp; coding course in Jalandhar&nbsp; should not teach syntax. It should also focus on logic, practice and real examples.</p><p><br></p><h3 class=\"\">&nbsp;9. Comparing Yourself With Others</h3><p>Comparison can damage your confidence. Many students look at others. Think, \"They are learning faster than me.\" This is one of the emotional&nbsp; coding mistakes beginners make . It may not be a code error. It affects your learning.</p><p>Everyone has a speed. Some students may already know computers well. Some may practice hours. Some may have started earlier. You cannot compare your chapter with someone else’s tenth chapter.</p><p>Of comparing track your own progress. Can you solve a problem that you could not solve this week? Do you understand errors better now? Can you write programs without help? If yes, you are improving.</p><p>Coding needs patience. Small progress every day is better than giving up because someone else looks faster.</p><p><br></p><h3 class=\"\">&nbsp;10. Not Asking for Help</h3><p>Not asking for help is one of the&nbsp; common programming mistakes. Many students feel shy. I think they should know everything.. Asking for help is a sign of strength, not weakness.</p><p>When you are stuck, ask your teacher, friend or online community for help. They can give you a perspective or a simple solution. Do not be afraid to ask. This is how you learn and grow.</p><p>In conclusion, coding mistakes beginners make&nbsp; can be avoided with the mindset and practice. Focus on&nbsp; beginner coding mistakes . Try to learn from them. With time and patience you will become a coder and avoid many&nbsp; common programming mistakes .</p><p>Some people who are new to programming feel shy when they have to ask questions. They think their question is too simple. This is another one of the&nbsp; common programming mistakes&nbsp; that people make. If you do not ask about something you do not understand it can become a problem later on.</p><p>It is an idea to try to figure things out by yourself first. But if you get stuck and can not figure it out you should ask for help. A teacher or a friend or someone who knows about programming can explain things to you in a way that\'s easy to understand.</p><p>When you ask for help you should not just say \"my code is not working\". You should explain what you tried to do, what you thought would happen and what actually happened. This helps the person you are asking for help understand what is going on and give you advice.</p><p>Asking for help does not mean you are not smart. It means you want to make sure you understand things properly.</p><p><br></p><h3 class=\"\">Conclusion</h3><p>The truth is that&nbsp; common programming mistakes&nbsp; are a part of learning to code. Every person who learns to code makes mistakes. The goal is not to never make a mistake. The goal is to learn from your mistakes and get better at coding step by step.</p><p>Most&nbsp; coding mistakes beginners make&nbsp; happen because they try to go fast, they do not learn the basics, they copy code from other people, they do not practice enough or they get upset when they make a mistake. You can change these habits if you are patient and keep trying.</p><p>If you want to avoid&nbsp; beginner coding mistakes&nbsp; you should focus on learning the basics, practice coding every day, start with projects, read the error messages carefully and ask for help when you need it. Do not try to find shortcuts. Coding gets easier if you give it time.</p><p>Remember, every good programmer started out as a beginner. They made&nbsp; common programming mistakes&nbsp; too. But they kept learning and they kept fixing their mistakes. They kept moving forward.</p><div><br></div><h6 class=\"\"></h6>','content_1788327701.png',NULL,'published','2026-09-02 05:41:41',0,0,'2026-09-02 05:41:41','2026-09-02 05:41:41',NULL),
(6,NULL,1,'The Power of Action','quote','the-power-of-action',NULL,'<p>The path to success is to take massive, determined action</p>',NULL,'Tony Robbins','published','2026-09-02 05:44:08',0,0,'2026-09-02 05:44:08','2026-09-02 05:44:08',NULL),
(7,NULL,1,'Never Give Up','quote','never-give-up',NULL,'<p>Success is not final, failure is not fatal: it is the courage to continue that counts.</p>',NULL,'Winston Churchill','published','2026-09-02 05:45:31',0,0,'2026-09-02 05:45:31','2026-09-02 05:45:31',NULL),
(8,NULL,1,'Dream Big','quote','dream-big',NULL,'<p>The future belongs to those who believe in the beauty of their dreams.</p>',NULL,'Eleanor RooseveltEleanor Roosevelt','published','2026-09-02 05:47:12',0,0,'2026-09-02 05:47:12','2026-09-02 05:47:12',NULL),
(9,NULL,1,'Keep Moving Forward','quote','keep-moving-forward',NULL,'<p>The way to get started is to quit talking and begin doing</p>',NULL,'Walt Disney','published','2026-09-02 05:48:36',0,0,'2026-09-02 05:48:36','2026-09-02 05:48:36',NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `seo_metadata` */

insert  into `seo_metadata`(`id`,`content_id`,`meta_title`,`meta_description`,`meta_keywords`,`robots`,`schema_type`,`created_at`,`updated_at`) values 
(2,3,'10 Laravel Tips Every Developer Should Know','10 Laravel Tips Every Developer Should Know10 Laravel Tips Every Developer Should Know10 Laravel Tips Every Developer Should Know10 Laravel Tips Every Developer Should Know10 Laravel Tips Every Developer Should Know10 Laravel Tips Every Developer Should Know10 Laravel Tips Every Developer Should Know','laravel, php, laravel 12','index,follow',NULL,'2026-09-01 08:28:13','2026-09-01 08:28:13'),
(3,4,NULL,NULL,NULL,'index,follow',NULL,'2026-09-01 08:34:17','2026-09-01 08:34:17'),
(4,5,'Top Coding Mistakes Beginners. How to Avoid Them','Learning to code for the first time can be exciting and confusing at the same time. One day you write a program and feel really proud of yourself. The day one small error keeps you stuck for an hour. This is very normal. Every student goes through this stage. The good thing is that most  coding mistakes beginners make  can be fixed with practice and a calm mindset.','coding, mistake in coding, laravel, ai','index,follow',NULL,'2026-09-02 05:41:41','2026-09-02 05:41:41'),
(5,6,'The Power of Action','The path to success is to take massive, determined action','quote, motivation, success, action','index,follow',NULL,'2026-09-02 05:44:08','2026-09-02 05:44:08'),
(6,7,'Never Give Up','Success is not final, failure is not fatal: it is the courage to continue that counts.','success, failure','index,follow',NULL,'2026-09-02 05:45:31','2026-09-02 05:45:31'),
(7,8,'Dream Big','The future belongs to those who believe in the beauty of their dreams.','Dream Big, future , dreams, believe','index,follow',NULL,'2026-09-02 05:47:12','2026-09-02 05:47:12'),
(8,9,'Keep Moving Forward','The way to get started is to quit talking and begin doing','quit talking, motivation, Moving Forward','index,follow',NULL,'2026-09-02 05:48:36','2026-09-02 05:48:36');

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
('SW4C6IssRlXIWdJnt66F330UVaeTqRyhN8BwmIpl',1,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoid2pTU09IT0xWNVNYYkkzZjlvREgzNDZ2Wm44TE5uZjZLMVBkZW5UVCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jbXMvY29udGVudC9jcmVhdGUiO3M6NToicm91dGUiO3M6MTg6ImNtcy5jb250ZW50LmNyZWF0ZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==',1788329344);

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
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(42,'Interview Tips','interview-tips','2026-09-01 10:02:43','2026-09-01 10:02:43'),
(43,'Coding','coding','2026-09-02 05:25:22','2026-09-02 05:25:22'),
(44,'Python','python','2026-09-02 06:00:37','2026-09-02 06:00:37'),
(45,'Students','students','2026-09-02 06:00:55','2026-09-02 06:00:55'),
(46,'Data Science','data-science','2026-09-02 06:01:12','2026-09-02 06:01:12'),
(47,'Machine Learning','machine-learning','2026-09-02 06:01:25','2026-09-02 06:01:25'),
(48,'Career Opportunities','career-opportunities','2026-09-02 06:01:42','2026-09-02 06:01:42'),
(49,'Problem Solving','problem-solving','2026-09-02 06:01:59','2026-09-02 06:01:59');

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
