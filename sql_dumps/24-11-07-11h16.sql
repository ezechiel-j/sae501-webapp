-- MySQL dump 10.13  Distrib 5.7.42, for Linux (x86_64)
--
-- Host: localhost    Database: sae501_webapp
-- ------------------------------------------------------
-- Server version	5.7.42-0ubuntu0.18.04.1-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `animals`
--

DROP TABLE IF EXISTS `animals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `animals` (
  `animal_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `animal_common_name` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `animal_scientific_name` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `animal_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `animal_image_src` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`animal_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `animals`
--

LOCK TABLES `animals` WRITE;
/*!40000 ALTER TABLE `animals` DISABLE KEYS */;
/*!40000 ALTER TABLE `animals` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `animals_family`
--

DROP TABLE IF EXISTS `animals_family`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `animals_family` (
  `animal_family_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `animal_family_name` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `animal_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`animal_family_id`),
  KEY `animals_family_animal_id_foreign` (`animal_id`),
  CONSTRAINT `animals_family_animal_id_foreign` FOREIGN KEY (`animal_id`) REFERENCES `animals` (`animal_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `animals_family`
--

LOCK TABLES `animals_family` WRITE;
/*!40000 ALTER TABLE `animals_family` DISABLE KEYS */;
/*!40000 ALTER TABLE `animals_family` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `animals_species`
--

DROP TABLE IF EXISTS `animals_species`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `animals_species` (
  `animal_species_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `animal_species_name` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `animal_family_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`animal_species_id`),
  KEY `animals_species_animal_family_id_foreign` (`animal_family_id`),
  CONSTRAINT `animals_species_animal_family_id_foreign` FOREIGN KEY (`animal_family_id`) REFERENCES `animals_family` (`animal_family_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `animals_species`
--

LOCK TABLES `animals_species` WRITE;
/*!40000 ALTER TABLE `animals_species` DISABLE KEYS */;
/*!40000 ALTER TABLE `animals_species` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `discover_animals`
--

DROP TABLE IF EXISTS `discover_animals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `discover_animals` (
  `discover_animal_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `animal_id` bigint(20) unsigned NOT NULL,
  `hike_id` bigint(20) unsigned NOT NULL,
  `discoverd_animal_favoured` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`discover_animal_id`),
  KEY `discover_animals_user_id_foreign` (`user_id`),
  KEY `discover_animals_animal_id_foreign` (`animal_id`),
  KEY `discover_animals_hike_id_foreign` (`hike_id`),
  CONSTRAINT `discover_animals_animal_id_foreign` FOREIGN KEY (`animal_id`) REFERENCES `animals` (`animal_id`),
  CONSTRAINT `discover_animals_hike_id_foreign` FOREIGN KEY (`hike_id`) REFERENCES `hikes` (`hike_id`),
  CONSTRAINT `discover_animals_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `discover_animals`
--

LOCK TABLES `discover_animals` WRITE;
/*!40000 ALTER TABLE `discover_animals` DISABLE KEYS */;
/*!40000 ALTER TABLE `discover_animals` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `discover_plants`
--

DROP TABLE IF EXISTS `discover_plants`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `discover_plants` (
  `discover_plant_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `plant_id` bigint(20) unsigned NOT NULL,
  `hike_id` bigint(20) unsigned NOT NULL,
  `discoverd_plant_favoured` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`discover_plant_id`),
  KEY `discover_plants_user_id_foreign` (`user_id`),
  KEY `discover_plants_plant_id_foreign` (`plant_id`),
  KEY `discover_plants_hike_id_foreign` (`hike_id`),
  CONSTRAINT `discover_plants_hike_id_foreign` FOREIGN KEY (`hike_id`) REFERENCES `hikes` (`hike_id`),
  CONSTRAINT `discover_plants_plant_id_foreign` FOREIGN KEY (`plant_id`) REFERENCES `plants` (`plant_id`),
  CONSTRAINT `discover_plants_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `discover_plants`
--

LOCK TABLES `discover_plants` WRITE;
/*!40000 ALTER TABLE `discover_plants` DISABLE KEYS */;
/*!40000 ALTER TABLE `discover_plants` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hike_hosted_animals`
--

DROP TABLE IF EXISTS `hike_hosted_animals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hike_hosted_animals` (
  `hike_hosted_animal_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `hike_id` bigint(20) unsigned NOT NULL,
  `animal_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`hike_hosted_animal_id`),
  KEY `hike_hosted_animals_hike_id_foreign` (`hike_id`),
  KEY `hike_hosted_animals_animal_id_foreign` (`animal_id`),
  CONSTRAINT `hike_hosted_animals_animal_id_foreign` FOREIGN KEY (`animal_id`) REFERENCES `animals` (`animal_id`),
  CONSTRAINT `hike_hosted_animals_hike_id_foreign` FOREIGN KEY (`hike_id`) REFERENCES `hikes` (`hike_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hike_hosted_animals`
--

LOCK TABLES `hike_hosted_animals` WRITE;
/*!40000 ALTER TABLE `hike_hosted_animals` DISABLE KEYS */;
/*!40000 ALTER TABLE `hike_hosted_animals` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hike_hosted_plants`
--

DROP TABLE IF EXISTS `hike_hosted_plants`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hike_hosted_plants` (
  `hike_hosted_plant_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `hike_id` bigint(20) unsigned NOT NULL,
  `plant_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`hike_hosted_plant_id`),
  KEY `hike_hosted_plants_hike_id_foreign` (`hike_id`),
  KEY `hike_hosted_plants_plant_id_foreign` (`plant_id`),
  CONSTRAINT `hike_hosted_plants_hike_id_foreign` FOREIGN KEY (`hike_id`) REFERENCES `hikes` (`hike_id`),
  CONSTRAINT `hike_hosted_plants_plant_id_foreign` FOREIGN KEY (`plant_id`) REFERENCES `plants` (`plant_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hike_hosted_plants`
--

LOCK TABLES `hike_hosted_plants` WRITE;
/*!40000 ALTER TABLE `hike_hosted_plants` DISABLE KEYS */;
/*!40000 ALTER TABLE `hike_hosted_plants` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hikes`
--

DROP TABLE IF EXISTS `hikes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hikes` (
  `hike_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `hike_name` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `hike_distance` int(11) NOT NULL,
  `hike_average_duration` int(11) NOT NULL,
  `hike_difficulty` enum('Facile','Moyen','Difficile') COLLATE utf8mb4_unicode_ci NOT NULL,
  `hike_start_point_return` tinyint(1) NOT NULL,
  `hike_ascendant` int(11) NOT NULL,
  `hike_descendant` int(11) NOT NULL,
  `hike_top_point` int(11) NOT NULL,
  `hike_bottom_point` int(11) NOT NULL,
  `hike_favoured` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`hike_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hikes`
--

LOCK TABLES `hikes` WRITE;
/*!40000 ALTER TABLE `hikes` DISABLE KEYS */;
/*!40000 ALTER TABLE `hikes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hiking`
--

DROP TABLE IF EXISTS `hiking`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hiking` (
  `hiking_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `hike_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `hiking_start_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `hiking_end_date` timestamp NULL DEFAULT NULL,
  `hiking_status` enum('En cours','Terminé') COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`hiking_id`),
  KEY `hiking_hike_id_foreign` (`hike_id`),
  KEY `hiking_user_id_foreign` (`user_id`),
  CONSTRAINT `hiking_hike_id_foreign` FOREIGN KEY (`hike_id`) REFERENCES `hikes` (`hike_id`),
  CONSTRAINT `hiking_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hiking`
--

LOCK TABLES `hiking` WRITE;
/*!40000 ALTER TABLE `hiking` DISABLE KEYS */;
/*!40000 ALTER TABLE `hiking` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (43,'0001_01_01_000000_create_users_table',1),(44,'0001_01_01_000001_create_cache_table',1),(45,'0001_01_01_000002_create_jobs_table',1),(46,'2024_10_17_071252_create_hikes_table',1),(47,'2024_10_17_072524_update_users_table',1),(48,'2024_10_17_073438_create_plants_table',1),(49,'2024_10_17_073932_create_plants_family_table',1),(50,'2024_10_17_074656_create_plants_species_table',1),(51,'2024_10_17_074959_create_animals_table',1),(52,'2024_10_17_075145_create_animals_family_table',1),(53,'2024_10_17_075415_create_animals_species_table',1),(54,'2024_10_17_075648_create_hiking_table',1),(55,'2024_10_17_081350_create_hike_hosted_animals_table',1),(56,'2024_10_17_081532_create_hike_hosted_plants_table',1),(57,'2024_10_17_081726_create_discover_plants_table',1),(58,'2024_10_17_082055_create_discover_animals_table',1),(59,'2024_11_04_134512_add_image_url_to_plants',1),(60,'2024_11_04_135303_rename_image_src_to_plants_image_src_in_plants',1),(61,'2024_11_04_140036_rename_plants_image_src_to_plant_image_src_in_plants',1),(62,'2024_11_04_140428_add_animal_image_src_to_animals',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `plants`
--

DROP TABLE IF EXISTS `plants`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `plants` (
  `plant_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `plant_common_name` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `plant_scientific_name` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `plant_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `plant_image_src` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`plant_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `plants`
--

LOCK TABLES `plants` WRITE;
/*!40000 ALTER TABLE `plants` DISABLE KEYS */;
/*!40000 ALTER TABLE `plants` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `plants_family`
--

DROP TABLE IF EXISTS `plants_family`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `plants_family` (
  `plant_family_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `plants_family_name` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `plant_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`plant_family_id`),
  KEY `plants_family_plant_id_foreign` (`plant_id`),
  CONSTRAINT `plants_family_plant_id_foreign` FOREIGN KEY (`plant_id`) REFERENCES `plants` (`plant_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `plants_family`
--

LOCK TABLES `plants_family` WRITE;
/*!40000 ALTER TABLE `plants_family` DISABLE KEYS */;
/*!40000 ALTER TABLE `plants_family` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `plants_species`
--

DROP TABLE IF EXISTS `plants_species`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `plants_species` (
  `plant_species_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `plant_species_name` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `plant_family_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`plant_species_id`),
  KEY `plants_species_plant_family_id_foreign` (`plant_family_id`),
  CONSTRAINT `plants_species_plant_family_id_foreign` FOREIGN KEY (`plant_family_id`) REFERENCES `plants_family` (`plant_family_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `plants_species`
--

LOCK TABLES `plants_species` WRITE;
/*!40000 ALTER TABLE `plants_species` DISABLE KEYS */;
/*!40000 ALTER TABLE `plants_species` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('ZfXRwWAq2e9ZGnyLUHU7Pe4bVCqDdDofSv1IfLqX',NULL,'172.17.0.6','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoic3E0cXI0TWNrOU9hNjkwTjRIb1Y1U3BuRjhBQ3FUZVoyRUxVWEliRCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHBzOi8vc2FlNTAxLXdlYmFwcC5kZGV2LnNpdGUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1730974400);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
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

-- Dump completed on 2024-11-07 10:16:52
