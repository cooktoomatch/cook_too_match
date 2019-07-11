-- MySQL dump 10.13  Distrib 5.7.25, for osx10.9 (x86_64)
--
-- Host: localhost    Database: cook_too_match
-- ------------------------------------------------------
-- Server version	5.7.25

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cook_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comments_cook_id_foreign` (`cook_id`),
  KEY `comments_user_id_foreign` (`user_id`),
  CONSTRAINT `comments_cook_id_foreign` FOREIGN KEY (`cook_id`) REFERENCES `cooks` (`id`) ON DELETE CASCADE,
  CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `conversations`
--

DROP TABLE IF EXISTS `conversations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `conversations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sender_user_id` int(10) unsigned NOT NULL,
  `recipient_user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `conversations_sender_user_id_recipient_user_id_unique` (`sender_user_id`,`recipient_user_id`),
  KEY `conversations_sender_user_id_index` (`sender_user_id`),
  KEY `conversations_recipient_user_id_index` (`recipient_user_id`),
  CONSTRAINT `conversations_recipient_user_id_foreign` FOREIGN KEY (`recipient_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `conversations_sender_user_id_foreign` FOREIGN KEY (`sender_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `conversations`
--

LOCK TABLES `conversations` WRITE;
/*!40000 ALTER TABLE `conversations` DISABLE KEYS */;
/*!40000 ALTER TABLE `conversations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cook_categories`
--

DROP TABLE IF EXISTS `cook_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cook_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cook_categories`
--

LOCK TABLES `cook_categories` WRITE;
/*!40000 ALTER TABLE `cook_categories` DISABLE KEYS */;
INSERT INTO `cook_categories` VALUES (1,'和食','2019-07-10 04:47:29','2019-07-10 04:47:29'),(2,'洋食','2019-07-10 04:47:29','2019-07-10 04:47:29'),(3,'中華料理','2019-07-10 04:47:29','2019-07-10 04:47:29'),(4,'インド料理','2019-07-10 04:47:29','2019-07-10 04:47:29'),(5,'タイ料理','2019-07-10 04:47:29','2019-07-10 04:47:29'),(6,'韓国料理','2019-07-10 04:47:29','2019-07-10 04:47:29'),(7,'スペイン料理','2019-07-10 04:47:29','2019-07-10 04:47:29'),(8,'寿司','2019-07-10 04:47:29','2019-07-10 04:47:29'),(9,'海鮮料理','2019-07-10 04:47:29','2019-07-10 04:47:29'),(10,'蕎麦','2019-07-10 04:47:29','2019-07-10 04:47:29'),(11,'うどん','2019-07-10 04:47:29','2019-07-10 04:47:29'),(12,'うなぎ','2019-07-10 04:47:29','2019-07-10 04:47:29'),(13,'焼き鳥','2019-07-10 04:47:29','2019-07-10 04:47:29'),(14,'とんかつ','2019-07-10 04:47:29','2019-07-10 04:47:29'),(15,'串揚げ','2019-07-10 04:47:29','2019-07-10 04:47:29'),(16,'天ぷら','2019-07-10 04:47:29','2019-07-10 04:47:29'),(17,'お好み焼き','2019-07-10 04:47:29','2019-07-10 04:47:29'),(18,'もんじゃ焼き','2019-07-10 04:47:29','2019-07-10 04:47:29'),(19,'沖縄料理','2019-07-10 04:47:29','2019-07-10 04:47:29'),(20,'フレンチ','2019-07-10 04:47:29','2019-07-10 04:47:29'),(21,'イタリアン','2019-07-10 04:47:29','2019-07-10 04:47:29'),(22,'パスタ','2019-07-10 04:47:29','2019-07-10 04:47:29'),(23,'ピザ','2019-07-10 04:47:29','2019-07-10 04:47:29'),(24,'ステーキ','2019-07-10 04:47:29','2019-07-10 04:47:29'),(25,'ハンバーグ','2019-07-10 04:47:29','2019-07-10 04:47:29'),(26,'ハンバーガー','2019-07-10 04:47:29','2019-07-10 04:47:29'),(27,'ラーメン','2019-07-10 04:47:29','2019-07-10 04:47:29'),(28,'カレー','2019-07-10 04:47:29','2019-07-10 04:47:29'),(29,'焼肉','2019-07-10 04:47:29','2019-07-10 04:47:29'),(30,'鍋','2019-07-10 04:47:29','2019-07-10 04:47:29'),(31,'パン','2019-07-10 04:47:29','2019-07-10 04:47:29'),(32,'スイーツ','2019-07-10 04:47:29','2019-07-10 04:47:29');
/*!40000 ALTER TABLE `cook_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cooks`
--

DROP TABLE IF EXISTS `cooks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cooks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `category_id` int(10) unsigned DEFAULT NULL,
  `price` int(11) NOT NULL,
  `num` int(11) NOT NULL,
  `etc` text COLLATE utf8mb4_unicode_ci,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cooks_user_id_foreign` (`user_id`),
  KEY `cooks_category_id_foreign` (`category_id`),
  CONSTRAINT `cooks_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `cook_categories` (`id`) ON DELETE SET NULL,
  CONSTRAINT `cooks_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cooks`
--

LOCK TABLES `cooks` WRITE;
/*!40000 ALTER TABLE `cooks` DISABLE KEYS */;
INSERT INTO `cooks` VALUES (1,'a','a',1,2,1000,1,NULL,'2019-07-10 23:30:00','2019-07-10 23:45:00','2019-07-10 04:48:14','2019-07-10 14:15:29'),(2,'ffff','vgfgf',1,1,1000,1,NULL,'2019-07-10 16:30:00','2019-07-10 16:45:00','2019-07-10 07:18:28','2019-07-10 07:18:28'),(3,'s','a',1,3,1000,1,NULL,'2019-07-10 17:30:00','2019-07-10 17:45:00','2019-07-10 08:16:57','2019-07-10 08:16:57'),(4,'a','d',1,4,1000,1,NULL,'2019-07-10 17:30:00','2019-07-10 17:45:00','2019-07-10 08:19:16','2019-07-10 08:19:16'),(5,'a','a',1,1,1000,1,NULL,'2019-07-10 17:30:00','2019-07-10 17:45:00','2019-07-10 08:29:55','2019-07-10 08:29:55'),(6,'aa','a',1,1,100,1,NULL,'2019-07-10 17:45:00','2019-07-10 18:00:00','2019-07-10 08:32:41','2019-07-10 08:32:41'),(7,'a','a',1,1,1000,1,NULL,'2019-07-10 17:45:00','2019-07-10 19:00:00','2019-07-10 08:34:48','2019-07-10 08:34:48'),(8,'aaa','a',1,4,1000,1,NULL,'2019-07-10 17:45:00','2019-07-10 20:00:00','2019-07-10 08:36:32','2019-07-10 08:36:32'),(9,'r','yy',1,4,1000,1,NULL,'2019-07-10 17:45:00','2019-07-10 18:00:00','2019-07-10 08:42:09','2019-07-10 08:42:09'),(10,'a','d',1,5,1000,1,NULL,'2019-07-10 18:00:00','2019-07-10 20:00:00','2019-07-10 08:46:03','2019-07-10 08:46:03'),(11,'afdf','sss',1,2,1000,1,NULL,'2019-07-10 23:30:00','2019-07-10 23:45:00','2019-07-10 14:04:06','2019-07-10 14:16:33');
/*!40000 ALTER TABLE `cooks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `goods`
--

DROP TABLE IF EXISTS `goods`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `goods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `cook_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `goods`
--

LOCK TABLES `goods` WRITE;
/*!40000 ALTER TABLE `goods` DISABLE KEYS */;
INSERT INTO `goods` VALUES (4,1,1,'2019-07-10 05:10:13','2019-07-10 05:10:13'),(5,1,2,'2019-07-10 07:22:59','2019-07-10 07:22:59');
/*!40000 ALTER TABLE `goods` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `images` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cook_id` int(10) unsigned NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `images`
--

LOCK TABLES `images` WRITE;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
INSERT INTO `images` VALUES (24,9,'geMpsEyZ4VyXNuvCtxhNBDtMAS0D5xduDIMtz7b2.jpeg','2019-07-10 08:42:09','2019-07-10 08:42:09'),(27,10,'z7sskiY3QJgHS8CAYG1KFDMY5sz5uWE7IcAUScCC.jpeg','2019-07-10 08:46:03','2019-07-10 08:46:03'),(28,11,'ttet6NTQJY5fct6ISnSfgtfjM79C4rlr0a47nGVC.jpeg','2019-07-10 14:04:06','2019-07-10 14:04:06'),(30,11,'trYl1fRqTfQpdapSpNQw59ipoWXcNEbICDOoTXjW.jpeg','2019-07-10 14:04:06','2019-07-10 14:04:06');
/*!40000 ALTER TABLE `images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `messages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `conversation_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `messages_conversation_id_foreign` (`conversation_id`),
  KEY `messages_user_id_foreign` (`user_id`),
  CONSTRAINT `messages_conversation_id_foreign` FOREIGN KEY (`conversation_id`) REFERENCES `conversations` (`id`),
  CONSTRAINT `messages_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=111 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (100,'2014_10_12_000000_create_users_table',1),(101,'2014_10_12_100000_create_password_resets_table',1),(102,'2019_07_01_014458_create_cook_categories_table',1),(103,'2019_07_01_014460_create_cooks_table',1),(104,'2019_07_01_014535_create_reviews_table',1),(105,'2019_07_01_014621_create_conversations_table',1),(106,'2019_07_01_014649_create_comments_table',1),(107,'2019_07_01_193151_add_facebook_id_to_users_table',1),(108,'2019_07_02_014555_create_messages_table',1),(109,'2019_07_08_075020_create_goods_table',1),(110,'2019_07_09_060758_create_images_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reviews` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rank` int(11) NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `cook_id` int(10) unsigned NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `reviews_user_id_cook_id_unique` (`user_id`,`cook_id`),
  KEY `reviews_cook_id_foreign` (`cook_id`),
  CONSTRAINT `reviews_cook_id_foreign` FOREIGN KEY (`cook_id`) REFERENCES `cooks` (`id`) ON DELETE CASCADE,
  CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reviews`
--

LOCK TABLES `reviews` WRITE;
/*!40000 ALTER TABLE `reviews` DISABLE KEYS */;
/*!40000 ALTER TABLE `reviews` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'default_icon.png',
  `id_picture` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pref` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `town` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `building` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` double DEFAULT NULL,
  `longitude` double DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `facebook_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'遠藤 聖也','seiya.endo0830@gmail.com','$2y$10$pl1nqJ2ODX3UO8x9/KNI8eTZrzv.g2AySVRCYdLGMU8aZTE/kkyc6','YvssT96BZdy05YyZDCCU3MsufO6Ndmn8SEOip0Ws.jpeg',NULL,NULL,0,'神奈川県川崎市麻生区白山','215-0014','14','川崎市麻生区白山',NULL,35.6177733,139.5639557,'JeF5rgv15K9a9lilgA3W8lmFfTzEFL2PAi5GoEjCHtxnM0klOuXcjPD0sU1f','2019-07-10 04:47:35','2019-07-10 07:40:26','1409251889212522');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-07-11 10:31:04
