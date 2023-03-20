-- MySQL dump 10.13  Distrib 8.0.32, for Linux (x86_64)
--
-- Host: localhost    Database: machine
-- ------------------------------------------------------
-- Server version	8.0.32-0ubuntu0.22.04.2

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `activity_log`
--

DROP TABLE IF EXISTS `activity_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `activity_log` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `log_name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `subject_type` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `subject_id` bigint unsigned DEFAULT NULL,
  `causer_type` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `causer_id` bigint unsigned DEFAULT NULL,
  `properties` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `subject` (`subject_type`,`subject_id`),
  KEY `causer` (`causer_type`,`causer_id`),
  KEY `activity_log_log_name_index` (`log_name`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activity_log`
--

LOCK TABLES `activity_log` WRITE;
/*!40000 ALTER TABLE `activity_log` DISABLE KEYS */;
INSERT INTO `activity_log` VALUES (1,'default','updated','App\\Models\\Base\\MenusTree',4,NULL,NULL,'{\"attributes\":{\"name\":\"Menu\",\"description\":\"Manage menu\",\"status\":\"1\",\"icon\":\"cil-address-book\",\"route\":\"base\\/menus\",\"parent_id\":1,\"seq_number\":1},\"old\":{\"name\":null,\"description\":null,\"status\":null,\"icon\":null,\"route\":null,\"parent_id\":1,\"seq_number\":null}}','2022-10-24 03:16:52','2022-10-24 03:16:52'),(2,'default','updated','App\\Models\\Base\\MenusTree',5,NULL,NULL,'{\"attributes\":{\"name\":\"User\",\"description\":\"Manage users\",\"status\":\"1\",\"icon\":\"cil-address-book\",\"route\":\"base\\/users\",\"parent_id\":1,\"seq_number\":2},\"old\":{\"name\":null,\"description\":null,\"status\":null,\"icon\":null,\"route\":null,\"parent_id\":1,\"seq_number\":null}}','2022-10-24 03:16:52','2022-10-24 03:16:52'),(3,'default','updated','App\\Models\\Base\\MenusTree',6,NULL,NULL,'{\"attributes\":{\"name\":\"Role\",\"description\":\"Manage role\",\"status\":\"1\",\"icon\":\"cil-address-book\",\"route\":\"base\\/roles\",\"parent_id\":1,\"seq_number\":3},\"old\":{\"name\":null,\"description\":null,\"status\":null,\"icon\":null,\"route\":null,\"parent_id\":1,\"seq_number\":null}}','2022-10-24 03:16:53','2022-10-24 03:16:53'),(4,'default','updated','App\\Models\\Base\\MenusTree',7,NULL,NULL,'{\"attributes\":{\"name\":\"Permission\",\"description\":\"Manage permissions\",\"status\":\"1\",\"icon\":\"cil-address-book\",\"route\":\"base\\/permissions\",\"parent_id\":1,\"seq_number\":1},\"old\":{\"name\":null,\"description\":null,\"status\":null,\"icon\":null,\"route\":null,\"parent_id\":1,\"seq_number\":null}}','2022-10-24 03:16:53','2022-10-24 03:16:53'),(5,'default','updated','App\\Models\\Base\\MenusTree',1,NULL,NULL,'{\"attributes\":{\"name\":\"Master Data\",\"description\":\"Header menu master\",\"status\":\"1\",\"icon\":\"cil-address-book\",\"route\":null,\"parent_id\":null,\"seq_number\":1},\"old\":{\"name\":null,\"description\":null,\"status\":null,\"icon\":null,\"route\":null,\"parent_id\":null,\"seq_number\":null}}','2022-10-24 03:16:53','2022-10-24 03:16:53'),(6,'default','updated','App\\Models\\Base\\MenusTree',2,NULL,NULL,'{\"attributes\":{\"name\":\"Accounting\",\"description\":\"Header menu accounting\",\"status\":\"1\",\"icon\":\"cil-address-book\",\"route\":null,\"parent_id\":null,\"seq_number\":2},\"old\":{\"name\":null,\"description\":null,\"status\":null,\"icon\":null,\"route\":null,\"parent_id\":null,\"seq_number\":null}}','2022-10-24 03:16:53','2022-10-24 03:16:53'),(7,'default','updated','App\\Models\\Base\\MenusTree',3,NULL,NULL,'{\"attributes\":{\"name\":\"Inventory\",\"description\":\"Header menu inventory\",\"status\":\"1\",\"icon\":\"cil-address-book\",\"route\":null,\"parent_id\":null,\"seq_number\":3},\"old\":{\"name\":null,\"description\":null,\"status\":null,\"icon\":null,\"route\":null,\"parent_id\":null,\"seq_number\":null}}','2022-10-24 03:16:53','2022-10-24 03:16:53'),(8,'default','updated','App\\Models\\Base\\Menus',2,'App\\Models\\Base\\User',1,'{\"attributes\":{\"name\":\"Manufacture\",\"description\":\"Header menu manufacture\",\"status\":\"1\",\"icon\":\"cil-building\",\"route\":null,\"parent_id\":null,\"seq_number\":2},\"old\":{\"name\":\"Accounting\",\"description\":\"Header menu accounting\",\"status\":\"1\",\"icon\":\"cil-address-book\",\"route\":null,\"parent_id\":null,\"seq_number\":2}}','2022-10-24 03:35:06','2022-10-24 03:35:06'),(9,'default','updated','App\\Models\\Base\\Menus',3,'App\\Models\\Base\\User',1,'{\"attributes\":{\"name\":\"Hasil Produksi\",\"description\":\"Hasil produksi\",\"status\":\"1\",\"icon\":\"cil-notes\",\"route\":\"manufacture\\/machineResults\",\"parent_id\":2,\"seq_number\":1},\"old\":{\"name\":\"Inventory\",\"description\":\"Header menu inventory\",\"status\":\"1\",\"icon\":\"cil-address-book\",\"route\":null,\"parent_id\":null,\"seq_number\":3}}','2022-10-24 03:39:11','2022-10-24 03:39:11'),(10,'default','created','App\\Models\\Base\\Menus',8,'App\\Models\\Base\\User',1,'{\"attributes\":{\"name\":\"Mesin Off\",\"description\":\"Pencatatan mesin off\",\"status\":\"1\",\"icon\":\"cil-airplane-mode-off\",\"route\":\"manufacture\\/machineConditions\",\"parent_id\":2,\"seq_number\":2}}','2022-10-24 03:41:07','2022-10-24 03:41:07'),(11,'default','updated','App\\Models\\Base\\MenusTree',8,'App\\Models\\Base\\User',1,'{\"attributes\":{\"name\":\"Mesin Off\",\"description\":\"Pencatatan mesin off\",\"status\":\"1\",\"icon\":\"cil-airplane-mode-off\",\"route\":\"manufacture\\/machineConditions\",\"parent_id\":2,\"seq_number\":2},\"old\":{\"name\":null,\"description\":null,\"status\":null,\"icon\":null,\"route\":null,\"parent_id\":2,\"seq_number\":null}}','2022-10-24 03:41:07','2022-10-24 03:41:07'),(12,'default','updated','App\\Models\\Base\\MenusTree',3,'App\\Models\\Base\\User',1,'{\"attributes\":{\"name\":\"Hasil Produksi\",\"description\":\"Hasil produksi\",\"status\":\"1\",\"icon\":\"cil-notes\",\"route\":\"manufacture\\/machineResults\",\"parent_id\":2,\"seq_number\":1},\"old\":{\"name\":null,\"description\":null,\"status\":null,\"icon\":null,\"route\":null,\"parent_id\":2,\"seq_number\":null}}','2022-10-24 03:41:07','2022-10-24 03:41:07'),(13,'default','updated','App\\Models\\Base\\MenusTree',2,'App\\Models\\Base\\User',1,'{\"attributes\":{\"name\":\"Manufacture\",\"description\":\"Header menu manufacture\",\"status\":\"1\",\"icon\":\"cil-building\",\"route\":null,\"parent_id\":null,\"seq_number\":2},\"old\":{\"name\":null,\"description\":null,\"status\":null,\"icon\":null,\"route\":null,\"parent_id\":null,\"seq_number\":null}}','2022-10-24 03:41:07','2022-10-24 03:41:07'),(14,'default','created','App\\Models\\Base\\Menus',9,'App\\Models\\Base\\User',1,'{\"attributes\":{\"name\":\"Produktifitas Mesin\",\"description\":\"Produktifitas Mesin\",\"status\":\"1\",\"icon\":\"cil-excerpt\",\"route\":\"manufacture\\/machineProductivities\",\"parent_id\":2,\"seq_number\":3}}','2022-10-24 03:44:26','2022-10-24 03:44:26'),(15,'default','updated','App\\Models\\Base\\MenusTree',9,'App\\Models\\Base\\User',1,'{\"attributes\":{\"name\":\"Produktifitas Mesin\",\"description\":\"Produktifitas Mesin\",\"status\":\"1\",\"icon\":\"cil-excerpt\",\"route\":\"manufacture\\/machineProductivities\",\"parent_id\":2,\"seq_number\":3},\"old\":{\"name\":null,\"description\":null,\"status\":null,\"icon\":null,\"route\":null,\"parent_id\":2,\"seq_number\":null}}','2022-10-24 03:44:26','2022-10-24 03:44:26'),(16,'default','updated','App\\Models\\Base\\MenusTree',8,'App\\Models\\Base\\User',1,'{\"attributes\":{\"name\":\"Mesin Off\",\"description\":\"Pencatatan mesin off\",\"status\":\"1\",\"icon\":\"cil-airplane-mode-off\",\"route\":\"manufacture\\/machineConditions\",\"parent_id\":2,\"seq_number\":2},\"old\":{\"name\":null,\"description\":null,\"status\":null,\"icon\":null,\"route\":null,\"parent_id\":2,\"seq_number\":null}}','2022-10-24 03:44:26','2022-10-24 03:44:26'),(17,'default','updated','App\\Models\\Base\\MenusTree',3,'App\\Models\\Base\\User',1,'{\"attributes\":{\"name\":\"Hasil Produksi\",\"description\":\"Hasil produksi\",\"status\":\"1\",\"icon\":\"cil-notes\",\"route\":\"manufacture\\/machineResults\",\"parent_id\":2,\"seq_number\":1},\"old\":{\"name\":null,\"description\":null,\"status\":null,\"icon\":null,\"route\":null,\"parent_id\":2,\"seq_number\":null}}','2022-10-24 03:44:27','2022-10-24 03:44:27'),(18,'default','updated','App\\Models\\Base\\MenusTree',2,'App\\Models\\Base\\User',1,'{\"attributes\":{\"name\":\"Manufacture\",\"description\":\"Header menu manufacture\",\"status\":\"1\",\"icon\":\"cil-building\",\"route\":null,\"parent_id\":null,\"seq_number\":2},\"old\":{\"name\":null,\"description\":null,\"status\":null,\"icon\":null,\"route\":null,\"parent_id\":null,\"seq_number\":null}}','2022-10-24 03:44:27','2022-10-24 03:44:27'),(19,'default','created','App\\Models\\Base\\Menus',10,'App\\Models\\Base\\User',1,'{\"attributes\":{\"name\":\"Unit Of Measure\",\"description\":\"master uom \\/ satuan\",\"status\":\"1\",\"icon\":\"cil-camera-control\",\"route\":\"base\\/uoms\",\"parent_id\":1,\"seq_number\":6}}','2022-10-24 03:45:24','2022-10-24 03:45:24'),(20,'default','updated','App\\Models\\Base\\MenusTree',10,'App\\Models\\Base\\User',1,'{\"attributes\":{\"name\":\"Unit Of Measure\",\"description\":\"master uom \\/ satuan\",\"status\":\"1\",\"icon\":\"cil-camera-control\",\"route\":\"base\\/uoms\",\"parent_id\":1,\"seq_number\":6},\"old\":{\"name\":null,\"description\":null,\"status\":null,\"icon\":null,\"route\":null,\"parent_id\":1,\"seq_number\":null}}','2022-10-24 03:45:25','2022-10-24 03:45:25'),(21,'default','updated','App\\Models\\Base\\MenusTree',4,'App\\Models\\Base\\User',1,'{\"attributes\":{\"name\":\"Menu\",\"description\":\"Manage menu\",\"status\":\"1\",\"icon\":\"cil-address-book\",\"route\":\"base\\/menus\",\"parent_id\":1,\"seq_number\":1},\"old\":{\"name\":null,\"description\":null,\"status\":null,\"icon\":null,\"route\":null,\"parent_id\":1,\"seq_number\":null}}','2022-10-24 03:45:25','2022-10-24 03:45:25'),(22,'default','updated','App\\Models\\Base\\MenusTree',5,'App\\Models\\Base\\User',1,'{\"attributes\":{\"name\":\"User\",\"description\":\"Manage users\",\"status\":\"1\",\"icon\":\"cil-address-book\",\"route\":\"base\\/users\",\"parent_id\":1,\"seq_number\":2},\"old\":{\"name\":null,\"description\":null,\"status\":null,\"icon\":null,\"route\":null,\"parent_id\":1,\"seq_number\":null}}','2022-10-24 03:45:25','2022-10-24 03:45:25'),(23,'default','updated','App\\Models\\Base\\MenusTree',6,'App\\Models\\Base\\User',1,'{\"attributes\":{\"name\":\"Role\",\"description\":\"Manage role\",\"status\":\"1\",\"icon\":\"cil-address-book\",\"route\":\"base\\/roles\",\"parent_id\":1,\"seq_number\":3},\"old\":{\"name\":null,\"description\":null,\"status\":null,\"icon\":null,\"route\":null,\"parent_id\":1,\"seq_number\":null}}','2022-10-24 03:45:25','2022-10-24 03:45:25'),(24,'default','updated','App\\Models\\Base\\MenusTree',7,'App\\Models\\Base\\User',1,'{\"attributes\":{\"name\":\"Permission\",\"description\":\"Manage permissions\",\"status\":\"1\",\"icon\":\"cil-address-book\",\"route\":\"base\\/permissions\",\"parent_id\":1,\"seq_number\":1},\"old\":{\"name\":null,\"description\":null,\"status\":null,\"icon\":null,\"route\":null,\"parent_id\":1,\"seq_number\":null}}','2022-10-24 03:45:25','2022-10-24 03:45:25'),(25,'default','updated','App\\Models\\Base\\MenusTree',1,'App\\Models\\Base\\User',1,'{\"attributes\":{\"name\":\"Master Data\",\"description\":\"Header menu master\",\"status\":\"1\",\"icon\":\"cil-address-book\",\"route\":null,\"parent_id\":null,\"seq_number\":1},\"old\":{\"name\":null,\"description\":null,\"status\":null,\"icon\":null,\"route\":null,\"parent_id\":null,\"seq_number\":null}}','2022-10-24 03:45:25','2022-10-24 03:45:25'),(26,'default','updated','App\\Models\\Base\\MenusTree',9,'App\\Models\\Base\\User',1,'{\"attributes\":{\"name\":\"Produktifitas Mesin\",\"description\":\"Produktifitas Mesin\",\"status\":\"1\",\"icon\":\"cil-excerpt\",\"route\":\"manufacture\\/machineProductivities\",\"parent_id\":2,\"seq_number\":3},\"old\":{\"name\":null,\"description\":null,\"status\":null,\"icon\":null,\"route\":null,\"parent_id\":2,\"seq_number\":null}}','2022-10-24 03:45:25','2022-10-24 03:45:25'),(27,'default','updated','App\\Models\\Base\\MenusTree',8,'App\\Models\\Base\\User',1,'{\"attributes\":{\"name\":\"Mesin Off\",\"description\":\"Pencatatan mesin off\",\"status\":\"1\",\"icon\":\"cil-airplane-mode-off\",\"route\":\"manufacture\\/machineConditions\",\"parent_id\":2,\"seq_number\":2},\"old\":{\"name\":null,\"description\":null,\"status\":null,\"icon\":null,\"route\":null,\"parent_id\":2,\"seq_number\":null}}','2022-10-24 03:45:26','2022-10-24 03:45:26'),(28,'default','updated','App\\Models\\Base\\MenusTree',3,'App\\Models\\Base\\User',1,'{\"attributes\":{\"name\":\"Hasil Produksi\",\"description\":\"Hasil produksi\",\"status\":\"1\",\"icon\":\"cil-notes\",\"route\":\"manufacture\\/machineResults\",\"parent_id\":2,\"seq_number\":1},\"old\":{\"name\":null,\"description\":null,\"status\":null,\"icon\":null,\"route\":null,\"parent_id\":2,\"seq_number\":null}}','2022-10-24 03:45:26','2022-10-24 03:45:26'),(29,'default','updated','App\\Models\\Base\\MenusTree',2,'App\\Models\\Base\\User',1,'{\"attributes\":{\"name\":\"Manufacture\",\"description\":\"Header menu manufacture\",\"status\":\"1\",\"icon\":\"cil-building\",\"route\":null,\"parent_id\":null,\"seq_number\":2},\"old\":{\"name\":null,\"description\":null,\"status\":null,\"icon\":null,\"route\":null,\"parent_id\":null,\"seq_number\":null}}','2022-10-24 03:45:26','2022-10-24 03:45:26'),(30,'default','created','App\\Models\\Base\\Menus',11,'App\\Models\\Base\\User',1,'{\"attributes\":{\"name\":\"Machine\",\"description\":\"master mesin\",\"status\":\"1\",\"icon\":\"cil-settings\",\"route\":\"base\\/machines\",\"parent_id\":1,\"seq_number\":7}}','2022-10-24 03:47:25','2022-10-24 03:47:25'),(31,'default','updated','App\\Models\\Base\\MenusTree',11,'App\\Models\\Base\\User',1,'{\"attributes\":{\"name\":\"Machine\",\"description\":\"master mesin\",\"status\":\"1\",\"icon\":\"cil-settings\",\"route\":\"base\\/machines\",\"parent_id\":1,\"seq_number\":7},\"old\":{\"name\":null,\"description\":null,\"status\":null,\"icon\":null,\"route\":null,\"parent_id\":1,\"seq_number\":null}}','2022-10-24 03:47:25','2022-10-24 03:47:25'),(32,'default','updated','App\\Models\\Base\\MenusTree',10,'App\\Models\\Base\\User',1,'{\"attributes\":{\"name\":\"Unit Of Measure\",\"description\":\"master uom \\/ satuan\",\"status\":\"1\",\"icon\":\"cil-camera-control\",\"route\":\"base\\/uoms\",\"parent_id\":1,\"seq_number\":6},\"old\":{\"name\":null,\"description\":null,\"status\":null,\"icon\":null,\"route\":null,\"parent_id\":1,\"seq_number\":null}}','2022-10-24 03:47:25','2022-10-24 03:47:25'),(33,'default','updated','App\\Models\\Base\\MenusTree',4,'App\\Models\\Base\\User',1,'{\"attributes\":{\"name\":\"Menu\",\"description\":\"Manage menu\",\"status\":\"1\",\"icon\":\"cil-address-book\",\"route\":\"base\\/menus\",\"parent_id\":1,\"seq_number\":1},\"old\":{\"name\":null,\"description\":null,\"status\":null,\"icon\":null,\"route\":null,\"parent_id\":1,\"seq_number\":null}}','2022-10-24 03:47:25','2022-10-24 03:47:25'),(34,'default','updated','App\\Models\\Base\\MenusTree',5,'App\\Models\\Base\\User',1,'{\"attributes\":{\"name\":\"User\",\"description\":\"Manage users\",\"status\":\"1\",\"icon\":\"cil-address-book\",\"route\":\"base\\/users\",\"parent_id\":1,\"seq_number\":2},\"old\":{\"name\":null,\"description\":null,\"status\":null,\"icon\":null,\"route\":null,\"parent_id\":1,\"seq_number\":null}}','2022-10-24 03:47:25','2022-10-24 03:47:25'),(35,'default','updated','App\\Models\\Base\\MenusTree',6,'App\\Models\\Base\\User',1,'{\"attributes\":{\"name\":\"Role\",\"description\":\"Manage role\",\"status\":\"1\",\"icon\":\"cil-address-book\",\"route\":\"base\\/roles\",\"parent_id\":1,\"seq_number\":3},\"old\":{\"name\":null,\"description\":null,\"status\":null,\"icon\":null,\"route\":null,\"parent_id\":1,\"seq_number\":null}}','2022-10-24 03:47:25','2022-10-24 03:47:25'),(36,'default','updated','App\\Models\\Base\\MenusTree',7,'App\\Models\\Base\\User',1,'{\"attributes\":{\"name\":\"Permission\",\"description\":\"Manage permissions\",\"status\":\"1\",\"icon\":\"cil-address-book\",\"route\":\"base\\/permissions\",\"parent_id\":1,\"seq_number\":1},\"old\":{\"name\":null,\"description\":null,\"status\":null,\"icon\":null,\"route\":null,\"parent_id\":1,\"seq_number\":null}}','2022-10-24 03:47:25','2022-10-24 03:47:25'),(37,'default','updated','App\\Models\\Base\\MenusTree',1,'App\\Models\\Base\\User',1,'{\"attributes\":{\"name\":\"Master Data\",\"description\":\"Header menu master\",\"status\":\"1\",\"icon\":\"cil-address-book\",\"route\":null,\"parent_id\":null,\"seq_number\":1},\"old\":{\"name\":null,\"description\":null,\"status\":null,\"icon\":null,\"route\":null,\"parent_id\":null,\"seq_number\":null}}','2022-10-24 03:47:26','2022-10-24 03:47:26'),(38,'default','updated','App\\Models\\Base\\MenusTree',9,'App\\Models\\Base\\User',1,'{\"attributes\":{\"name\":\"Produktifitas Mesin\",\"description\":\"Produktifitas Mesin\",\"status\":\"1\",\"icon\":\"cil-excerpt\",\"route\":\"manufacture\\/machineProductivities\",\"parent_id\":2,\"seq_number\":3},\"old\":{\"name\":null,\"description\":null,\"status\":null,\"icon\":null,\"route\":null,\"parent_id\":2,\"seq_number\":null}}','2022-10-24 03:47:26','2022-10-24 03:47:26'),(39,'default','updated','App\\Models\\Base\\MenusTree',8,'App\\Models\\Base\\User',1,'{\"attributes\":{\"name\":\"Mesin Off\",\"description\":\"Pencatatan mesin off\",\"status\":\"1\",\"icon\":\"cil-airplane-mode-off\",\"route\":\"manufacture\\/machineConditions\",\"parent_id\":2,\"seq_number\":2},\"old\":{\"name\":null,\"description\":null,\"status\":null,\"icon\":null,\"route\":null,\"parent_id\":2,\"seq_number\":null}}','2022-10-24 03:47:26','2022-10-24 03:47:26'),(40,'default','updated','App\\Models\\Base\\MenusTree',3,'App\\Models\\Base\\User',1,'{\"attributes\":{\"name\":\"Hasil Produksi\",\"description\":\"Hasil produksi\",\"status\":\"1\",\"icon\":\"cil-notes\",\"route\":\"manufacture\\/machineResults\",\"parent_id\":2,\"seq_number\":1},\"old\":{\"name\":null,\"description\":null,\"status\":null,\"icon\":null,\"route\":null,\"parent_id\":2,\"seq_number\":null}}','2022-10-24 03:47:26','2022-10-24 03:47:26'),(41,'default','updated','App\\Models\\Base\\MenusTree',2,'App\\Models\\Base\\User',1,'{\"attributes\":{\"name\":\"Manufacture\",\"description\":\"Header menu manufacture\",\"status\":\"1\",\"icon\":\"cil-building\",\"route\":null,\"parent_id\":null,\"seq_number\":2},\"old\":{\"name\":null,\"description\":null,\"status\":null,\"icon\":null,\"route\":null,\"parent_id\":null,\"seq_number\":null}}','2022-10-24 03:47:26','2022-10-24 03:47:26'),(42,'default','created','App\\Models\\Base\\Menus',12,'App\\Models\\Base\\User',1,'{\"attributes\":{\"name\":\"Shift\",\"description\":\"Master shift\",\"status\":\"1\",\"icon\":\"cil-shield-alt\",\"route\":\"base\\/shiftments\",\"parent_id\":1,\"seq_number\":8}}','2022-10-24 03:48:07','2022-10-24 03:48:07'),(43,'default','updated','App\\Models\\Base\\MenusTree',12,'App\\Models\\Base\\User',1,'{\"attributes\":{\"name\":\"Shift\",\"description\":\"Master shift\",\"status\":\"1\",\"icon\":\"cil-shield-alt\",\"route\":\"base\\/shiftments\",\"parent_id\":1,\"seq_number\":8},\"old\":{\"name\":null,\"description\":null,\"status\":null,\"icon\":null,\"route\":null,\"parent_id\":1,\"seq_number\":null}}','2022-10-24 03:48:07','2022-10-24 03:48:07'),(44,'default','updated','App\\Models\\Base\\MenusTree',11,'App\\Models\\Base\\User',1,'{\"attributes\":{\"name\":\"Machine\",\"description\":\"master mesin\",\"status\":\"1\",\"icon\":\"cil-settings\",\"route\":\"base\\/machines\",\"parent_id\":1,\"seq_number\":7},\"old\":{\"name\":null,\"description\":null,\"status\":null,\"icon\":null,\"route\":null,\"parent_id\":1,\"seq_number\":null}}','2022-10-24 03:48:07','2022-10-24 03:48:07'),(45,'default','updated','App\\Models\\Base\\MenusTree',10,'App\\Models\\Base\\User',1,'{\"attributes\":{\"name\":\"Unit Of Measure\",\"description\":\"master uom \\/ satuan\",\"status\":\"1\",\"icon\":\"cil-camera-control\",\"route\":\"base\\/uoms\",\"parent_id\":1,\"seq_number\":6},\"old\":{\"name\":null,\"description\":null,\"status\":null,\"icon\":null,\"route\":null,\"parent_id\":1,\"seq_number\":null}}','2022-10-24 03:48:07','2022-10-24 03:48:07'),(46,'default','updated','App\\Models\\Base\\MenusTree',4,'App\\Models\\Base\\User',1,'{\"attributes\":{\"name\":\"Menu\",\"description\":\"Manage menu\",\"status\":\"1\",\"icon\":\"cil-address-book\",\"route\":\"base\\/menus\",\"parent_id\":1,\"seq_number\":1},\"old\":{\"name\":null,\"description\":null,\"status\":null,\"icon\":null,\"route\":null,\"parent_id\":1,\"seq_number\":null}}','2022-10-24 03:48:07','2022-10-24 03:48:07'),(47,'default','updated','App\\Models\\Base\\MenusTree',5,'App\\Models\\Base\\User',1,'{\"attributes\":{\"name\":\"User\",\"description\":\"Manage users\",\"status\":\"1\",\"icon\":\"cil-address-book\",\"route\":\"base\\/users\",\"parent_id\":1,\"seq_number\":2},\"old\":{\"name\":null,\"description\":null,\"status\":null,\"icon\":null,\"route\":null,\"parent_id\":1,\"seq_number\":null}}','2022-10-24 03:48:07','2022-10-24 03:48:07'),(48,'default','updated','App\\Models\\Base\\MenusTree',6,'App\\Models\\Base\\User',1,'{\"attributes\":{\"name\":\"Role\",\"description\":\"Manage role\",\"status\":\"1\",\"icon\":\"cil-address-book\",\"route\":\"base\\/roles\",\"parent_id\":1,\"seq_number\":3},\"old\":{\"name\":null,\"description\":null,\"status\":null,\"icon\":null,\"route\":null,\"parent_id\":1,\"seq_number\":null}}','2022-10-24 03:48:07','2022-10-24 03:48:07'),(49,'default','updated','App\\Models\\Base\\MenusTree',7,'App\\Models\\Base\\User',1,'{\"attributes\":{\"name\":\"Permission\",\"description\":\"Manage permissions\",\"status\":\"1\",\"icon\":\"cil-address-book\",\"route\":\"base\\/permissions\",\"parent_id\":1,\"seq_number\":1},\"old\":{\"name\":null,\"description\":null,\"status\":null,\"icon\":null,\"route\":null,\"parent_id\":1,\"seq_number\":null}}','2022-10-24 03:48:08','2022-10-24 03:48:08'),(50,'default','updated','App\\Models\\Base\\MenusTree',1,'App\\Models\\Base\\User',1,'{\"attributes\":{\"name\":\"Master Data\",\"description\":\"Header menu master\",\"status\":\"1\",\"icon\":\"cil-address-book\",\"route\":null,\"parent_id\":null,\"seq_number\":1},\"old\":{\"name\":null,\"description\":null,\"status\":null,\"icon\":null,\"route\":null,\"parent_id\":null,\"seq_number\":null}}','2022-10-24 03:48:08','2022-10-24 03:48:08'),(51,'default','updated','App\\Models\\Base\\MenusTree',9,'App\\Models\\Base\\User',1,'{\"attributes\":{\"name\":\"Produktifitas Mesin\",\"description\":\"Produktifitas Mesin\",\"status\":\"1\",\"icon\":\"cil-excerpt\",\"route\":\"manufacture\\/machineProductivities\",\"parent_id\":2,\"seq_number\":3},\"old\":{\"name\":null,\"description\":null,\"status\":null,\"icon\":null,\"route\":null,\"parent_id\":2,\"seq_number\":null}}','2022-10-24 03:48:08','2022-10-24 03:48:08'),(52,'default','updated','App\\Models\\Base\\MenusTree',8,'App\\Models\\Base\\User',1,'{\"attributes\":{\"name\":\"Mesin Off\",\"description\":\"Pencatatan mesin off\",\"status\":\"1\",\"icon\":\"cil-airplane-mode-off\",\"route\":\"manufacture\\/machineConditions\",\"parent_id\":2,\"seq_number\":2},\"old\":{\"name\":null,\"description\":null,\"status\":null,\"icon\":null,\"route\":null,\"parent_id\":2,\"seq_number\":null}}','2022-10-24 03:48:08','2022-10-24 03:48:08'),(53,'default','updated','App\\Models\\Base\\MenusTree',3,'App\\Models\\Base\\User',1,'{\"attributes\":{\"name\":\"Hasil Produksi\",\"description\":\"Hasil produksi\",\"status\":\"1\",\"icon\":\"cil-notes\",\"route\":\"manufacture\\/machineResults\",\"parent_id\":2,\"seq_number\":1},\"old\":{\"name\":null,\"description\":null,\"status\":null,\"icon\":null,\"route\":null,\"parent_id\":2,\"seq_number\":null}}','2022-10-24 03:48:08','2022-10-24 03:48:08'),(54,'default','updated','App\\Models\\Base\\MenusTree',2,'App\\Models\\Base\\User',1,'{\"attributes\":{\"name\":\"Manufacture\",\"description\":\"Header menu manufacture\",\"status\":\"1\",\"icon\":\"cil-building\",\"route\":null,\"parent_id\":null,\"seq_number\":2},\"old\":{\"name\":null,\"description\":null,\"status\":null,\"icon\":null,\"route\":null,\"parent_id\":null,\"seq_number\":null}}','2022-10-24 03:48:08','2022-10-24 03:48:08'),(55,'default','updated','App\\Models\\Base\\Uom',8,'App\\Models\\Base\\User',1,'{\"attributes\":{\"code\":\"7HR\",\"name\":\"7 Hours\",\"category\":\"duration\",\"types\":\"bigger\",\"ratio\":\"168.000000\"},\"old\":{\"code\":\"SHIFT7\",\"name\":\"Shift 7\",\"category\":\"duration\",\"types\":\"bigger\",\"ratio\":\"168.000000\"}}','2022-10-24 04:07:58','2022-10-24 04:07:58'),(56,'default','updated','App\\Models\\Base\\Uom',9,'App\\Models\\Base\\User',1,'{\"attributes\":{\"code\":\"8HR\",\"name\":\"8 Hours\",\"category\":\"duration\",\"types\":\"bigger\",\"ratio\":\"192.000000\"},\"old\":{\"code\":\"SHIFT8\",\"name\":\"Shift 8\",\"category\":\"duration\",\"types\":\"bigger\",\"ratio\":\"192.000000\"}}','2022-10-24 04:08:47','2022-10-24 04:08:47'),(57,'default','created','App\\Models\\Base\\Machine',1,'App\\Models\\Base\\User',1,'{\"attributes\":{\"code\":\"LMT128909J\",\"name\":\"Mesin laminating 01\",\"capacity\":\"20.00\",\"capacity_uom_id\":4,\"period_uom_id\":8,\"description\":\"kondisi mesin 98% baik\"}}','2022-10-24 04:11:51','2022-10-24 04:11:51'),(58,'default','created','App\\Models\\Manufacture\\MachineCondition',1,'App\\Models\\Base\\User',1,'{\"attributes\":{\"machine_id\":1,\"shiftment_id\":1,\"work_date\":\"2022-10-23T17:00:00.000000Z\",\"start\":\"2022-10-24T02:15:00.000000Z\",\"end\":\"2022-10-24T03:15:00.000000Z\",\"amount_minutes\":\"60.00\",\"description\":\"mesin rusak\"}}','2022-10-24 04:40:53','2022-10-24 04:40:53'),(59,'default','created','App\\Models\\Manufacture\\MachineResult',4,'App\\Models\\Base\\User',1,'{\"attributes\":{\"machine_id\":1,\"shiftment_id\":3,\"work_date\":\"2022-01-20\",\"amount\":\"15,00\",\"uom_id\":4}}','2022-10-24 06:43:59','2022-10-24 06:43:59'),(60,'default','updated','App\\Models\\Manufacture\\MachineResult',3,'App\\Models\\Base\\User',1,'{\"attributes\":{\"machine_id\":1,\"shiftment_id\":3,\"work_date\":\"2024-01-20\",\"amount\":\"12,00\",\"uom_id\":4},\"old\":{\"machine_id\":1,\"shiftment_id\":3,\"work_date\":\"2022-10-23T17:00:00.000000Z\",\"amount\":\"5,00\",\"uom_id\":4}}','2022-10-24 06:48:06','2022-10-24 06:48:06');
/*!40000 ALTER TABLE `activity_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auto_numbers`
--

DROP TABLE IF EXISTS `auto_numbers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `auto_numbers` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `number` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auto_numbers`
--

LOCK TABLES `auto_numbers` WRITE;
/*!40000 ALTER TABLE `auto_numbers` DISABLE KEYS */;
/*!40000 ALTER TABLE `auto_numbers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category_offs`
--

DROP TABLE IF EXISTS `category_offs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `category_offs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `description` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint unsigned DEFAULT NULL,
  `updated_by` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `category_offs_code_unique` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category_offs`
--

LOCK TABLES `category_offs` WRITE;
/*!40000 ALTER TABLE `category_offs` DISABLE KEYS */;
INSERT INTO `category_offs` VALUES (1,'PRV','Rutin preventif maintenance','rutin preventif maintenance',NULL,'2022-10-24 08:11:49','2022-10-24 08:11:49',1,NULL),(2,'CRC','Corrective reason maintenance','corrective reason maintenance',NULL,'2022-10-24 08:12:18','2022-10-24 08:12:18',1,NULL),(3,'NOR','No order','no order',NULL,'2022-10-24 08:13:05','2022-10-24 08:13:05',1,NULL),(4,'HLD','Holiday','holiday',NULL,'2022-10-24 08:13:30','2022-10-24 08:13:30',1,NULL),(5,'TRL','Trial','trial',NULL,'2022-10-24 08:13:46','2022-10-24 08:13:46',1,NULL);
/*!40000 ALTER TABLE `category_offs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `connection` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `machine_availabilities`
--

DROP TABLE IF EXISTS `machine_availabilities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `machine_availabilities` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `machine_id` bigint unsigned NOT NULL,
  `shiftment_id` bigint unsigned NOT NULL,
  `work_date` date NOT NULL,
  `duration_target` decimal(8,2) unsigned NOT NULL COMMENT 'standart duration machine work',
  `duration_off` decimal(8,2) unsigned DEFAULT '0.00',
  `uom_id` bigint unsigned NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint unsigned DEFAULT NULL,
  `updated_by` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_machine_availabilities` (`machine_id`,`shiftment_id`,`work_date`),
  KEY `fk_machine_availabilities_2` (`shiftment_id`),
  KEY `fk_machine_availabilities_3` (`uom_id`),
  CONSTRAINT `fk_machine_availabilities_1` FOREIGN KEY (`machine_id`) REFERENCES `machines` (`id`),
  CONSTRAINT `fk_machine_availabilities_2` FOREIGN KEY (`shiftment_id`) REFERENCES `shiftments` (`id`),
  CONSTRAINT `fk_machine_availabilities_3` FOREIGN KEY (`uom_id`) REFERENCES `uoms` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=218 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `machine_availabilities`
--

LOCK TABLES `machine_availabilities` WRITE;
/*!40000 ALTER TABLE `machine_availabilities` DISABLE KEYS */;
INSERT INTO `machine_availabilities` VALUES (1,1,1,'2023-02-01',7.00,5.50,6,NULL,'2023-02-11 02:36:37','2023-03-01 03:36:15',NULL,1),(2,1,2,'2023-02-01',7.00,0.50,6,NULL,'2023-02-11 02:36:37','2023-03-01 04:04:07',NULL,1),(3,1,3,'2023-02-01',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-03-01 03:21:47',NULL,NULL),(4,1,1,'2023-02-02',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-03-01 03:21:47',NULL,NULL),(5,1,2,'2023-02-02',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-03-01 03:21:47',NULL,NULL),(6,1,3,'2023-02-02',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-03-01 03:21:47',NULL,NULL),(7,1,1,'2023-02-03',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-03-01 03:21:47',NULL,NULL),(8,1,2,'2023-02-03',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-03-01 03:21:47',NULL,NULL),(9,1,3,'2023-02-03',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-03-01 03:21:47',NULL,NULL),(10,1,1,'2023-02-04',5.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-03-01 03:21:47',NULL,NULL),(11,1,2,'2023-02-04',5.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-03-01 03:21:47',NULL,NULL),(12,1,3,'2023-02-04',5.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-03-01 03:21:47',NULL,NULL),(13,1,1,'2023-02-05',0.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-02-11 02:36:37',NULL,NULL),(14,1,2,'2023-02-05',0.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-02-11 02:36:37',NULL,NULL),(15,1,3,'2023-02-05',0.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-02-11 02:36:37',NULL,NULL),(16,1,1,'2023-02-06',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-03-01 03:23:35',NULL,NULL),(17,1,2,'2023-02-06',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-03-01 03:23:35',NULL,NULL),(18,1,3,'2023-02-06',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-03-01 03:23:35',NULL,NULL),(19,1,1,'2023-02-07',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-03-01 03:23:35',NULL,NULL),(20,1,2,'2023-02-07',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-03-01 03:23:35',NULL,NULL),(21,1,3,'2023-02-07',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-03-01 03:23:35',NULL,NULL),(22,1,1,'2023-02-08',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-03-01 03:23:35',NULL,NULL),(23,1,2,'2023-02-08',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-03-01 03:23:35',NULL,NULL),(24,1,3,'2023-02-08',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-03-01 03:23:35',NULL,NULL),(25,1,1,'2023-02-09',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-03-01 03:23:35',NULL,NULL),(26,1,2,'2023-02-09',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-03-01 03:23:35',NULL,NULL),(27,1,3,'2023-02-09',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-03-01 03:23:35',NULL,NULL),(28,1,1,'2023-02-10',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-03-01 03:23:35',NULL,NULL),(29,1,2,'2023-02-10',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-03-01 03:23:35',NULL,NULL),(30,1,3,'2023-02-10',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-03-01 03:23:35',NULL,NULL),(31,1,1,'2023-02-11',5.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-03-01 03:23:35',NULL,NULL),(32,1,2,'2023-02-11',5.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-03-01 03:23:35',NULL,NULL),(33,1,3,'2023-02-11',5.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-03-01 03:23:35',NULL,NULL),(34,1,1,'2023-02-12',0.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-02-11 02:36:37',NULL,NULL),(35,1,2,'2023-02-12',0.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-02-11 02:36:37',NULL,NULL),(36,1,3,'2023-02-12',0.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-02-11 02:36:37',NULL,NULL),(37,1,1,'2023-02-13',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-02-11 02:36:37',NULL,NULL),(38,1,2,'2023-02-13',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-02-11 02:36:37',NULL,NULL),(39,1,3,'2023-02-13',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-02-11 02:36:37',NULL,NULL),(40,1,1,'2023-02-14',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-02-11 02:36:37',NULL,NULL),(41,1,2,'2023-02-14',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-02-11 02:36:37',NULL,NULL),(42,1,3,'2023-02-14',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-02-11 02:36:37',NULL,NULL),(43,1,1,'2023-02-15',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-02-11 02:36:37',NULL,NULL),(44,1,2,'2023-02-15',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-02-11 02:36:37',NULL,NULL),(45,1,3,'2023-02-15',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-02-11 02:36:37',NULL,NULL),(46,1,1,'2023-02-16',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-02-11 02:36:37',NULL,NULL),(47,1,2,'2023-02-16',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-02-11 02:36:37',NULL,NULL),(48,1,3,'2023-02-16',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-02-11 02:36:37',NULL,NULL),(49,1,1,'2023-02-17',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-02-11 02:36:37',NULL,NULL),(50,1,2,'2023-02-17',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-02-11 02:36:37',NULL,NULL),(51,1,3,'2023-02-17',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-02-11 02:36:37',NULL,NULL),(52,1,1,'2023-02-18',5.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-02-11 02:36:37',NULL,NULL),(53,1,2,'2023-02-18',5.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-02-11 02:36:37',NULL,NULL),(54,1,3,'2023-02-18',5.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-02-11 02:36:37',NULL,NULL),(55,1,1,'2023-02-19',0.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-02-11 02:36:37',NULL,NULL),(56,1,2,'2023-02-19',0.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-02-11 02:36:37',NULL,NULL),(57,1,3,'2023-02-19',0.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-02-11 02:36:37',NULL,NULL),(58,1,1,'2023-02-20',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-02-11 02:36:37',NULL,NULL),(59,1,2,'2023-02-20',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-02-11 02:36:37',NULL,NULL),(60,1,3,'2023-02-20',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-02-11 02:36:37',NULL,NULL),(61,1,1,'2023-02-21',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-02-11 02:36:37',NULL,NULL),(62,1,2,'2023-02-21',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-02-11 02:36:37',NULL,NULL),(63,1,3,'2023-02-21',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-02-11 02:36:37',NULL,NULL),(64,1,1,'2023-02-22',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-02-11 02:36:37',NULL,NULL),(65,1,2,'2023-02-22',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-02-11 02:36:37',NULL,NULL),(66,1,3,'2023-02-22',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-02-11 02:36:37',NULL,NULL),(67,1,1,'2023-02-23',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-02-11 02:36:37',NULL,NULL),(68,1,2,'2023-02-23',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-02-11 02:36:37',NULL,NULL),(69,1,3,'2023-02-23',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-02-11 02:36:37',NULL,NULL),(70,1,1,'2023-02-24',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-02-11 02:36:37',NULL,NULL),(71,1,2,'2023-02-24',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-02-11 02:36:37',NULL,NULL),(72,1,3,'2023-02-24',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-02-11 02:36:37',NULL,NULL),(73,1,1,'2023-02-25',5.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-02-11 02:36:37',NULL,NULL),(74,1,2,'2023-02-25',5.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-02-11 02:36:37',NULL,NULL),(75,1,3,'2023-02-25',5.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-02-11 02:36:37',NULL,NULL),(76,1,1,'2023-02-26',0.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-02-11 02:36:37',NULL,NULL),(77,1,2,'2023-02-26',0.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-02-11 02:36:37',NULL,NULL),(78,1,3,'2023-02-26',0.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-02-11 02:36:37',NULL,NULL),(79,1,1,'2023-02-27',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-02-11 02:36:37',NULL,NULL),(80,1,2,'2023-02-27',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-02-11 02:36:37',NULL,NULL),(81,1,3,'2023-02-27',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-02-11 02:36:37',NULL,NULL),(82,1,1,'2023-02-28',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-02-11 02:36:37',NULL,NULL),(83,1,2,'2023-02-28',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-02-11 02:36:37',NULL,NULL),(84,1,3,'2023-02-28',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-02-11 02:36:37',NULL,NULL),(85,2,1,'2023-02-01',7.00,0.33,6,NULL,'2023-02-11 02:36:37','2023-03-01 04:03:48',NULL,1),(86,2,2,'2023-02-01',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-03-01 04:04:07',NULL,1),(87,2,3,'2023-02-01',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-03-01 03:21:47',NULL,NULL),(88,2,1,'2023-02-02',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-03-01 03:21:47',NULL,NULL),(89,2,2,'2023-02-02',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-03-01 03:21:47',NULL,NULL),(90,2,3,'2023-02-02',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-03-01 03:21:47',NULL,NULL),(91,2,1,'2023-02-03',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-03-01 03:21:47',NULL,NULL),(92,2,2,'2023-02-03',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-03-01 03:21:47',NULL,NULL),(93,2,3,'2023-02-03',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-03-01 03:21:47',NULL,NULL),(94,2,1,'2023-02-04',5.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-03-01 03:21:47',NULL,NULL),(95,2,2,'2023-02-04',5.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-03-01 03:21:47',NULL,NULL),(96,2,3,'2023-02-04',5.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-03-01 03:21:47',NULL,NULL),(97,2,1,'2023-02-05',0.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-02-11 02:36:37',NULL,NULL),(98,2,2,'2023-02-05',0.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-02-11 02:36:37',NULL,NULL),(99,2,3,'2023-02-05',0.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-02-11 02:36:37',NULL,NULL),(100,2,1,'2023-02-06',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-03-01 03:23:35',NULL,NULL),(101,2,2,'2023-02-06',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-03-01 03:23:35',NULL,NULL),(102,2,3,'2023-02-06',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-03-01 03:23:35',NULL,NULL),(103,2,1,'2023-02-07',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-03-01 03:23:35',NULL,NULL),(104,2,2,'2023-02-07',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-03-01 03:23:35',NULL,NULL),(105,2,3,'2023-02-07',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-03-01 03:23:35',NULL,NULL),(106,2,1,'2023-02-08',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-03-01 03:23:35',NULL,NULL),(107,2,2,'2023-02-08',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-03-01 03:23:35',NULL,NULL),(108,2,3,'2023-02-08',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-03-01 03:23:35',NULL,NULL),(109,2,1,'2023-02-09',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-03-01 03:23:35',NULL,NULL),(110,2,2,'2023-02-09',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-03-01 03:23:35',NULL,NULL),(111,2,3,'2023-02-09',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-03-01 03:23:35',NULL,NULL),(112,2,1,'2023-02-10',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-03-01 03:23:35',NULL,NULL),(113,2,2,'2023-02-10',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-03-01 03:23:35',NULL,NULL),(114,2,3,'2023-02-10',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-03-01 03:23:35',NULL,NULL),(115,2,1,'2023-02-11',5.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-03-01 03:23:35',NULL,NULL),(116,2,2,'2023-02-11',5.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-03-01 03:23:35',NULL,NULL),(117,2,3,'2023-02-11',5.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-03-01 03:23:35',NULL,NULL),(118,2,1,'2023-02-12',0.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-02-11 02:36:37',NULL,NULL),(119,2,2,'2023-02-12',0.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-02-11 02:36:37',NULL,NULL),(120,2,3,'2023-02-12',0.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-02-11 02:36:37',NULL,NULL),(121,2,1,'2023-02-13',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-02-11 02:36:37',NULL,NULL),(122,2,2,'2023-02-13',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-02-11 02:36:37',NULL,NULL),(123,2,3,'2023-02-13',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-02-11 02:36:37',NULL,NULL),(124,2,1,'2023-02-14',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-02-11 02:36:37',NULL,NULL),(125,2,2,'2023-02-14',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-02-11 02:36:37',NULL,NULL),(126,2,3,'2023-02-14',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-02-11 02:36:37',NULL,NULL),(127,2,1,'2023-02-15',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-02-11 02:36:37',NULL,NULL),(128,2,2,'2023-02-15',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-02-11 02:36:37',NULL,NULL),(129,2,3,'2023-02-15',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-02-11 02:36:37',NULL,NULL),(130,2,1,'2023-02-16',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-02-11 02:36:37',NULL,NULL),(131,2,2,'2023-02-16',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-02-11 02:36:37',NULL,NULL),(132,2,3,'2023-02-16',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-02-11 02:36:37',NULL,NULL),(133,2,1,'2023-02-17',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-02-11 02:36:37',NULL,NULL),(134,2,2,'2023-02-17',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-02-11 02:36:37',NULL,NULL),(135,2,3,'2023-02-17',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-02-11 02:36:37',NULL,NULL),(136,2,1,'2023-02-18',5.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-02-11 02:36:37',NULL,NULL),(137,2,2,'2023-02-18',5.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-02-11 02:36:37',NULL,NULL),(138,2,3,'2023-02-18',5.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-02-11 02:36:37',NULL,NULL),(139,2,1,'2023-02-19',0.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-02-11 02:36:37',NULL,NULL),(140,2,2,'2023-02-19',0.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-02-11 02:36:37',NULL,NULL),(141,2,3,'2023-02-19',0.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-02-11 02:36:37',NULL,NULL),(142,2,1,'2023-02-20',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-02-11 02:36:37',NULL,NULL),(143,2,2,'2023-02-20',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-02-11 02:36:37',NULL,NULL),(144,2,3,'2023-02-20',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-02-11 02:36:37',NULL,NULL),(145,2,1,'2023-02-21',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-02-11 02:36:37',NULL,NULL),(146,2,2,'2023-02-21',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-02-11 02:36:37',NULL,NULL),(147,2,3,'2023-02-21',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-02-11 02:36:37',NULL,NULL),(148,2,1,'2023-02-22',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-02-11 02:36:37',NULL,NULL),(149,2,2,'2023-02-22',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-02-11 02:36:37',NULL,NULL),(150,2,3,'2023-02-22',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-02-11 02:36:37',NULL,NULL),(151,2,1,'2023-02-23',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-02-11 02:36:37',NULL,NULL),(152,2,2,'2023-02-23',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-02-11 02:36:37',NULL,NULL),(153,2,3,'2023-02-23',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-02-11 02:36:37',NULL,NULL),(154,2,1,'2023-02-24',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-02-11 02:36:37',NULL,NULL),(155,2,2,'2023-02-24',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-02-11 02:36:37',NULL,NULL),(156,2,3,'2023-02-24',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-02-11 02:36:37',NULL,NULL),(157,2,1,'2023-02-25',5.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-02-11 02:36:37',NULL,NULL),(158,2,2,'2023-02-25',5.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-02-11 02:36:37',NULL,NULL),(159,2,3,'2023-02-25',5.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-02-11 02:36:37',NULL,NULL),(160,2,1,'2023-02-26',0.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-02-11 02:36:37',NULL,NULL),(161,2,2,'2023-02-26',0.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-02-11 02:36:37',NULL,NULL),(162,2,3,'2023-02-26',0.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-02-11 02:36:37',NULL,NULL),(163,2,1,'2023-02-27',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-02-11 02:36:37',NULL,NULL),(164,2,2,'2023-02-27',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-02-11 02:36:37',NULL,NULL),(165,2,3,'2023-02-27',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-02-11 02:36:37',NULL,NULL),(166,2,1,'2023-02-28',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-02-11 02:36:37',NULL,NULL),(167,2,2,'2023-02-28',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-02-11 02:36:37',NULL,NULL),(168,2,3,'2023-02-28',7.00,0.00,6,NULL,'2023-02-11 02:36:37','2023-02-11 02:36:37',NULL,NULL),(169,1,1,'2023-03-01',7.00,0.00,6,NULL,'2023-03-01 02:47:11','2023-03-01 02:47:11',NULL,NULL),(170,1,2,'2023-03-01',7.00,0.00,6,NULL,'2023-03-01 02:47:11','2023-03-01 02:47:11',NULL,NULL),(171,1,3,'2023-03-01',7.00,0.00,6,NULL,'2023-03-01 02:47:11','2023-03-01 02:47:11',NULL,NULL),(172,2,1,'2023-03-01',7.00,0.00,6,NULL,'2023-03-01 02:47:11','2023-03-01 02:47:11',NULL,NULL),(173,2,2,'2023-03-01',7.00,0.00,6,NULL,'2023-03-01 02:47:11','2023-03-01 02:47:11',NULL,NULL),(174,2,3,'2023-03-01',7.00,0.00,6,NULL,'2023-03-01 02:47:11','2023-03-01 02:47:11',NULL,NULL);
/*!40000 ALTER TABLE `machine_availabilities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `machine_capacities`
--

DROP TABLE IF EXISTS `machine_capacities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `machine_capacities` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `machine_id` bigint unsigned NOT NULL,
  `product_id` bigint unsigned NOT NULL,
  `capacity` decimal(15,2) unsigned NOT NULL,
  `capacity_uom_id` bigint unsigned NOT NULL,
  `period_uom_id` bigint unsigned NOT NULL COMMENT 'dalam satuan jam, hari atau lainnya',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint unsigned DEFAULT NULL,
  `updated_by` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_machine_capacities` (`product_id`,`machine_id`),
  KEY `fk_machine_capacities_1` (`capacity_uom_id`),
  KEY `fk_machine_capacities_2` (`period_uom_id`),
  CONSTRAINT `fk_machine_capacities_1` FOREIGN KEY (`capacity_uom_id`) REFERENCES `uoms` (`id`),
  CONSTRAINT `fk_machine_capacities_2` FOREIGN KEY (`period_uom_id`) REFERENCES `uoms` (`id`),
  CONSTRAINT `fk_machine_capacities_3` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `machine_capacities`
--

LOCK TABLES `machine_capacities` WRITE;
/*!40000 ALTER TABLE `machine_capacities` DISABLE KEYS */;
INSERT INTO `machine_capacities` VALUES (1,1,1,11.45,4,8,NULL,'2022-10-25 01:34:16','2022-10-25 03:23:29',1,1);
/*!40000 ALTER TABLE `machine_capacities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `machine_conditions`
--

DROP TABLE IF EXISTS `machine_conditions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `machine_conditions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `machine_id` bigint unsigned NOT NULL,
  `shiftment_id` bigint unsigned NOT NULL,
  `work_date` date NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `amount_minutes` decimal(12,2) unsigned NOT NULL,
  `description` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint unsigned DEFAULT NULL,
  `updated_by` bigint unsigned DEFAULT NULL,
  `category_off_id` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_machine_conditions_1` (`machine_id`),
  KEY `fk_machine_conditions_2` (`shiftment_id`),
  KEY `fk_machine_conditions_5` (`category_off_id`),
  CONSTRAINT `fk_machine_conditions_1` FOREIGN KEY (`machine_id`) REFERENCES `machines` (`id`),
  CONSTRAINT `fk_machine_conditions_2` FOREIGN KEY (`shiftment_id`) REFERENCES `shiftments` (`id`),
  CONSTRAINT `fk_machine_conditions_5` FOREIGN KEY (`category_off_id`) REFERENCES `category_offs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `machine_conditions`
--

LOCK TABLES `machine_conditions` WRITE;
/*!40000 ALTER TABLE `machine_conditions` DISABLE KEYS */;
INSERT INTO `machine_conditions` VALUES (1,1,1,'2022-10-24','2022-10-24 09:15:00','2022-10-24 11:15:00',120.00,'mesin rusak',NULL,'2022-10-24 04:40:52','2022-10-24 08:23:49',1,1,1),(2,1,1,'2023-02-01','2023-02-01 08:00:00','2023-02-01 13:00:00',300.00,'Trial product baru',NULL,'2023-03-01 02:29:25','2023-03-01 03:35:11',1,1,5),(3,1,2,'2023-02-01','2023-02-01 06:00:00','2023-02-01 06:30:00',30.00,'trial',NULL,'2023-03-01 03:36:15','2023-03-01 04:04:07',1,1,5);
/*!40000 ALTER TABLE `machine_conditions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `machine_productivity`
--

DROP TABLE IF EXISTS `machine_productivity`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `machine_productivity` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `machine_id` bigint unsigned NOT NULL,
  `shiftment_id` bigint unsigned NOT NULL,
  `work_date` date NOT NULL,
  `capacity` decimal(15,2) unsigned NOT NULL,
  `capacity_uom_id` bigint unsigned NOT NULL,
  `duration_target` decimal(8,2) unsigned NOT NULL COMMENT 'standart duration machine work',
  `duration_off` decimal(8,2) unsigned DEFAULT '0.00',
  `amount_target` decimal(15,2) unsigned NOT NULL,
  `amount_result` decimal(15,2) unsigned NOT NULL,
  `uom_id` bigint unsigned NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint unsigned DEFAULT NULL,
  `updated_by` bigint unsigned DEFAULT NULL,
  `product_id` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_machine_productivity_11` (`machine_id`,`shiftment_id`,`work_date`,`product_id`),
  KEY `fk_machine_productivity_1` (`uom_id`),
  KEY `fk_machine_productivity_3` (`shiftment_id`),
  KEY `fk_machine_productivity_4` (`capacity_uom_id`),
  KEY `fk_machine_productivity_5` (`product_id`),
  CONSTRAINT `fk_machine_productivity_1` FOREIGN KEY (`uom_id`) REFERENCES `uoms` (`id`),
  CONSTRAINT `fk_machine_productivity_2` FOREIGN KEY (`machine_id`) REFERENCES `machines` (`id`),
  CONSTRAINT `fk_machine_productivity_3` FOREIGN KEY (`shiftment_id`) REFERENCES `shiftments` (`id`),
  CONSTRAINT `fk_machine_productivity_4` FOREIGN KEY (`capacity_uom_id`) REFERENCES `uoms` (`id`),
  CONSTRAINT `fk_machine_productivity_5` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `machine_productivity`
--

LOCK TABLES `machine_productivity` WRITE;
/*!40000 ALTER TABLE `machine_productivity` DISABLE KEYS */;
/*!40000 ALTER TABLE `machine_productivity` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `machine_results`
--

DROP TABLE IF EXISTS `machine_results`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `machine_results` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `machine_id` bigint unsigned NOT NULL,
  `shiftment_id` bigint unsigned NOT NULL,
  `work_date` date NOT NULL,
  `amount` decimal(15,2) unsigned NOT NULL,
  `uom_id` bigint unsigned NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint unsigned DEFAULT NULL,
  `updated_by` bigint unsigned DEFAULT NULL,
  `product_id` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_machine_results_11` (`machine_id`,`shiftment_id`,`work_date`,`product_id`),
  KEY `fk_machine_results_1` (`uom_id`),
  KEY `fk_machine_results_3` (`shiftment_id`),
  KEY `fk_machine_results_4` (`product_id`),
  CONSTRAINT `fk_machine_results_1` FOREIGN KEY (`uom_id`) REFERENCES `uoms` (`id`),
  CONSTRAINT `fk_machine_results_2` FOREIGN KEY (`machine_id`) REFERENCES `machines` (`id`),
  CONSTRAINT `fk_machine_results_3` FOREIGN KEY (`shiftment_id`) REFERENCES `shiftments` (`id`),
  CONSTRAINT `fk_machine_results_4` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `machine_results`
--

LOCK TABLES `machine_results` WRITE;
/*!40000 ALTER TABLE `machine_results` DISABLE KEYS */;
INSERT INTO `machine_results` VALUES (1,1,1,'2022-10-24',6.80,4,NULL,'2022-10-24 06:15:14','2022-10-24 06:22:48',1,1,NULL),(2,1,2,'2022-10-24',5.70,4,NULL,'2022-10-24 06:18:34','2022-10-24 08:46:19',1,1,1),(3,1,3,'2022-10-24',11.00,4,NULL,'2022-10-24 06:29:53','2022-10-25 03:38:59',1,1,1),(4,1,3,'2022-01-21',12.00,4,'2022-10-25 03:38:22','2022-10-24 06:43:58','2022-10-25 03:38:22',1,1,NULL);
/*!40000 ALTER TABLE `machine_results` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `machine_roles`
--

DROP TABLE IF EXISTS `machine_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `machine_roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `role_id` bigint unsigned NOT NULL,
  `machine_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_machine_roles_1` (`role_id`),
  KEY `fk_machine_roles_2` (`machine_id`),
  CONSTRAINT `fk_machine_roles_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  CONSTRAINT `fk_machine_roles_2` FOREIGN KEY (`machine_id`) REFERENCES `machines` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `machine_roles`
--

LOCK TABLES `machine_roles` WRITE;
/*!40000 ALTER TABLE `machine_roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `machine_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `machines`
--

DROP TABLE IF EXISTS `machines`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `machines` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `description` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint unsigned DEFAULT NULL,
  `updated_by` bigint unsigned DEFAULT NULL,
  `capacity` decimal(15,2) unsigned NOT NULL,
  `capacity_uom_id` bigint unsigned DEFAULT NULL,
  `period_uom_id` bigint unsigned DEFAULT NULL COMMENT 'dalam satuan jam, hari atau lainnya',
  PRIMARY KEY (`id`),
  KEY `fk_machines_1` (`capacity_uom_id`),
  KEY `fk_machines_2` (`period_uom_id`),
  CONSTRAINT `fk_machines_1` FOREIGN KEY (`capacity_uom_id`) REFERENCES `uoms` (`id`),
  CONSTRAINT `fk_machines_2` FOREIGN KEY (`period_uom_id`) REFERENCES `uoms` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `machines`
--

LOCK TABLES `machines` WRITE;
/*!40000 ALTER TABLE `machines` DISABLE KEYS */;
INSERT INTO `machines` VALUES (1,'LMT128909J','Mesin laminating 01','kondisi mesin 98% baik',NULL,'2022-10-24 04:11:51','2022-10-24 08:43:01',1,1,20.00,4,8),(2,'LMT128909K','Mesin Laminasi 2','Tahun pembelian 2020, kondisi 98%',NULL,'2023-02-11 01:37:35','2023-02-11 01:38:11',1,1,20.00,4,8);
/*!40000 ALTER TABLE `machines` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu_permissions`
--

DROP TABLE IF EXISTS `menu_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `menu_permissions` (
  `menu_id` bigint unsigned NOT NULL,
  `permission_id` bigint unsigned NOT NULL,
  `status` char(1) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT '1',
  PRIMARY KEY (`menu_id`,`permission_id`),
  KEY `fk_menu_permission_permissions` (`permission_id`),
  CONSTRAINT `fk_menu_permission_menus` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`),
  CONSTRAINT `fk_menu_permission_permissions` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu_permissions`
--

LOCK TABLES `menu_permissions` WRITE;
/*!40000 ALTER TABLE `menu_permissions` DISABLE KEYS */;
INSERT INTO `menu_permissions` VALUES (3,29,'1'),(4,1,'1'),(5,5,'1'),(6,9,'1'),(7,13,'1'),(8,33,'1'),(9,37,'1'),(10,21,'1'),(11,17,'1'),(12,25,'1'),(13,41,'1'),(14,45,'1'),(15,53,'1');
/*!40000 ALTER TABLE `menu_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `menus` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `description` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `status` char(1) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `icon` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `route` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `parent_id` int DEFAULT NULL,
  `_lft` int unsigned DEFAULT NULL,
  `_rgt` int unsigned DEFAULT NULL,
  `seq_number` tinyint DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menus`
--

LOCK TABLES `menus` WRITE;
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;
INSERT INTO `menus` VALUES (1,'Master Data','Header menu master','1','2021-08-09 08:10:07','2022-10-24 15:09:56','cil-address-book',NULL,NULL,1,20,1),(2,'Manufacture','Header menu manufacture','1','2021-08-09 08:10:07','2023-02-11 08:29:00','cil-building',NULL,NULL,21,30,2),(3,'Hasil Produksi','Hasil produksi','1','2021-08-09 08:10:07','2023-02-11 08:29:00','cil-notes','manufacture/machineResults',2,28,29,1),(4,'Menu','Manage menu','1','2021-08-09 08:10:07','2022-10-24 15:09:56','cil-address-book','base/menus',1,12,13,1),(5,'User','Manage users','1','2021-08-09 08:10:07','2022-10-24 15:09:56','cil-address-book','base/users',1,14,15,2),(6,'Role','Manage role','1','2021-08-09 08:10:07','2022-10-24 15:09:56','cil-address-book','base/roles',1,16,17,3),(7,'Permission','Manage permissions','1','2021-08-09 08:10:07','2022-10-24 15:09:56','cil-address-book','base/permissions',1,18,19,1),(8,'Mesin Off','Pencatatan mesin off','1','2022-10-24 10:41:07','2023-02-11 08:29:00','cil-airplane-mode-off','manufacture/machineConditions',2,26,27,2),(9,'Produktifitas Mesin','Produktifitas Mesin','1','2022-10-24 10:44:26','2023-02-11 08:29:00','cil-excerpt','manufacture/machineProductivities',2,24,25,3),(10,'Unit Of Measure','master uom / satuan','1','2022-10-24 10:45:24','2022-10-24 15:09:55','cil-camera-control','base/uoms',1,10,11,6),(11,'Machine','master mesin','1','2022-10-24 10:47:25','2022-10-24 15:09:55','cil-settings','base/machines',1,8,9,7),(12,'Shift','Master shift','1','2022-10-24 10:48:07','2022-10-24 15:09:55','cil-shield-alt','base/shiftments',1,6,7,8),(13,'Product','Master product','1','2022-10-24 14:55:53','2022-10-24 15:09:55','cil-share-boxed','base/products',1,4,5,9),(14,'Off Reason Machine','Off Reason Machine','1','2022-10-24 15:09:55','2022-10-24 15:09:55','cil-toggle-off','base/categoryOffs',1,2,3,10),(15,'Machine Available','Machine Available','1','2023-02-11 08:29:00','2023-02-11 08:29:00','cil-window-restore','manufacture/machineAvailabilities',2,22,23,4);
/*!40000 ALTER TABLE `menus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (52,'2014_10_12_000000_create_users_table',1),(53,'2014_10_12_100000_create_password_resets_table',1),(54,'2017_08_03_055212_create_auto_numbers',1),(55,'2019_08_19_000000_create_failed_jobs_table',1),(56,'2019_12_14_000001_create_personal_access_tokens_table',1),(57,'2021_07_07_080836_create_permission_tables',1),(58,'2021_08_06_225424_create_menus_table',1),(59,'2021_08_06_225434_create_menu_permissions_table',1),(60,'2021_09_08_054823_create_activity_log_table',1),(61,'2021_09_09_152314_alter_user_add_deleted_at',1),(62,'2022_10_22_202736_create_shiftment',1),(63,'2022_10_22_215640_create_uoms',1),(64,'2022_10_22_215649_create_machines',1),(65,'2022_10_22_215656_create_machine_roles',1),(66,'2022_10_22_215706_create_machine_results',1),(67,'2022_10_22_215715_create_machine_conditions',1),(68,'2022_10_24_091516_create_machine_productivity',1),(70,'2022_10_24_142909_create_product',3),(71,'2022_10_24_143050_create_category_offs',3),(72,'2022_10_24_143244_create_machine_capacities',3),(74,'2022_10_24_144431_add_constraint_product_machine_capacities',4),(76,'2022_10_24_150050_create_category_offs',6),(77,'2022_10_24_150150_add_category_off_machine_conditions',7),(79,'2022_10_25_091041_add_unique_constraint_machine_result',8),(80,'2022_10_25_094835_add_product_id_machine_result',8),(82,'2023_02_11_081543_create_machine_availabilities',9);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_permissions`
--

LOCK TABLES `model_has_permissions` WRITE;
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_roles` (
  `role_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_roles`
--

LOCK TABLES `model_has_roles` WRITE;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` VALUES (1,'App\\Models\\Base\\User',1);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'menu-index','web',NULL,NULL),(2,'menu-create','web',NULL,NULL),(3,'menu-update','web',NULL,NULL),(4,'menu-delete','web',NULL,NULL),(5,'user-index','web',NULL,NULL),(6,'user-create','web',NULL,NULL),(7,'user-update','web',NULL,NULL),(8,'user-delete','web',NULL,NULL),(9,'role-index','web',NULL,NULL),(10,'role-create','web',NULL,NULL),(11,'role-update','web',NULL,NULL),(12,'role-delete','web',NULL,NULL),(13,'permission-index','web',NULL,NULL),(14,'permission-create','web',NULL,NULL),(15,'permission-update','web',NULL,NULL),(16,'permission-delete','web',NULL,NULL),(17,'machines-index','web','2022-10-24 03:18:32','2022-10-24 03:18:32'),(18,'machines-create','web','2022-10-24 03:18:32','2022-10-24 03:18:32'),(19,'machines-update','web','2022-10-24 03:18:32','2022-10-24 03:18:32'),(20,'machines-delete','web','2022-10-24 03:18:32','2022-10-24 03:18:32'),(21,'uoms-index','web','2022-10-24 03:18:35','2022-10-24 03:18:35'),(22,'uoms-create','web','2022-10-24 03:18:35','2022-10-24 03:18:35'),(23,'uoms-update','web','2022-10-24 03:18:35','2022-10-24 03:18:35'),(24,'uoms-delete','web','2022-10-24 03:18:35','2022-10-24 03:18:35'),(25,'shiftments-index','web','2022-10-24 03:18:38','2022-10-24 03:18:38'),(26,'shiftments-create','web','2022-10-24 03:18:38','2022-10-24 03:18:38'),(27,'shiftments-update','web','2022-10-24 03:18:39','2022-10-24 03:18:39'),(28,'shiftments-delete','web','2022-10-24 03:18:39','2022-10-24 03:18:39'),(29,'machine_results-index','web','2022-10-24 03:18:49','2022-10-24 03:18:49'),(30,'machine_results-create','web','2022-10-24 03:18:50','2022-10-24 03:18:50'),(31,'machine_results-update','web','2022-10-24 03:18:50','2022-10-24 03:18:50'),(32,'machine_results-delete','web','2022-10-24 03:18:50','2022-10-24 03:18:50'),(33,'machine_conditions-index','web','2022-10-24 03:18:52','2022-10-24 03:18:52'),(34,'machine_conditions-create','web','2022-10-24 03:18:52','2022-10-24 03:18:52'),(35,'machine_conditions-update','web','2022-10-24 03:18:52','2022-10-24 03:18:52'),(36,'machine_conditions-delete','web','2022-10-24 03:18:52','2022-10-24 03:18:52'),(37,'machine_productivity-index','web','2022-10-24 03:18:56','2022-10-24 03:18:56'),(38,'machine_productivity-create','web','2022-10-24 03:18:56','2022-10-24 03:18:56'),(39,'machine_productivity-update','web','2022-10-24 03:18:56','2022-10-24 03:18:56'),(40,'machine_productivity-delete','web','2022-10-24 03:18:56','2022-10-24 03:18:56'),(41,'products-index','web','2022-10-24 07:42:36','2022-10-24 07:42:36'),(42,'products-create','web','2022-10-24 07:42:39','2022-10-24 07:42:39'),(43,'products-update','web','2022-10-24 07:42:39','2022-10-24 07:42:39'),(44,'products-delete','web','2022-10-24 07:42:39','2022-10-24 07:42:39'),(45,'category_offs-index','web','2022-10-24 07:42:41','2022-10-24 07:42:41'),(46,'category_offs-create','web','2022-10-24 07:42:42','2022-10-24 07:42:42'),(47,'category_offs-update','web','2022-10-24 07:42:42','2022-10-24 07:42:42'),(48,'category_offs-delete','web','2022-10-24 07:42:42','2022-10-24 07:42:42'),(49,'machine_capacities-index','web','2022-10-24 08:51:12','2022-10-24 08:51:12'),(50,'machine_capacities-create','web','2022-10-24 08:51:13','2022-10-24 08:51:13'),(51,'machine_capacities-update','web','2022-10-24 08:51:13','2022-10-24 08:51:13'),(52,'machine_capacities-delete','web','2022-10-24 08:51:13','2022-10-24 08:51:13'),(53,'machine_availabilities-index','web','2023-02-11 01:25:59','2023-02-11 01:25:59'),(54,'machine_availabilities-create','web','2023-02-11 01:25:59','2023-02-11 01:25:59'),(55,'machine_availabilities-update','web','2023-02-11 01:25:59','2023-02-11 01:25:59'),(56,'machine_availabilities-delete','web','2023-02-11 01:25:59','2023-02-11 01:25:59');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `description` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint unsigned DEFAULT NULL,
  `updated_by` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'HDPE','HD PE Plastik','plastik',NULL,'2022-10-24 08:45:42','2022-10-24 08:45:42',1,NULL);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_has_permissions`
--

LOCK TABLES `role_has_permissions` WRITE;
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
INSERT INTO `role_has_permissions` VALUES (1,1),(2,1),(3,1),(4,1),(5,1),(6,1),(7,1),(8,1),(9,1),(10,1),(11,1),(12,1),(13,1),(14,1),(15,1),(16,1),(17,1),(18,1),(19,1),(20,1),(21,1),(22,1),(23,1),(24,1),(25,1),(26,1),(27,1),(28,1),(29,1),(30,1),(31,1),(32,1),(33,1),(34,1),(35,1),(36,1),(37,1),(38,1),(39,1),(40,1),(41,1),(42,1),(43,1),(44,1),(45,1),(46,1),(47,1),(48,1),(49,1),(50,1),(51,1),(52,1),(53,1),(54,1),(55,1),(56,1);
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'administrator','web','2021-10-26 15:21:21','2021-10-26 15:21:21');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shiftments`
--

DROP TABLE IF EXISTS `shiftments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `shiftments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `start_hour` time NOT NULL,
  `end_hour` time NOT NULL,
  `overday` tinyint unsigned DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint unsigned DEFAULT NULL,
  `updated_by` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `shiftments_code_unique` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shiftments`
--

LOCK TABLES `shiftments` WRITE;
/*!40000 ALTER TABLE `shiftments` DISABLE KEYS */;
INSERT INTO `shiftments` VALUES (1,'SHFT1','Shift 1','08:00:00','15:59:59',0,NULL,'2021-10-26 15:21:21','2021-10-26 15:21:21',1,NULL),(2,'SHFT2','Shift 2','16:00:00','23:59:59',0,NULL,'2021-10-26 15:21:21','2021-10-26 15:21:21',1,NULL),(3,'SHFT3','Shift 3','00:00:00','07:59:59',1,NULL,'2021-10-26 15:21:21','2021-10-26 15:21:21',1,NULL);
/*!40000 ALTER TABLE `shiftments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `uoms`
--

DROP TABLE IF EXISTS `uoms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `uoms` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `category` varchar(15) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'tipe uom, misalkan berat, luas, satuan dll',
  `types` enum('reference','smaller','bigger') CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `ratio` decimal(15,6) unsigned NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint unsigned DEFAULT NULL,
  `updated_by` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `category` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `uoms`
--

LOCK TABLES `uoms` WRITE;
/*!40000 ALTER TABLE `uoms` DISABLE KEYS */;
INSERT INTO `uoms` VALUES (1,'KG','Kilogram','weight','reference',1.000000,NULL,'2021-10-26 15:21:21','2021-10-26 15:21:21',1,NULL),(2,'GR','Gram','weight','smaller',0.010000,NULL,'2021-10-26 15:21:21','2021-10-26 15:21:21',1,NULL),(3,'ONS','Ons','weight','smaller',0.100000,NULL,'2021-10-26 15:21:21','2021-10-26 15:21:21',1,NULL),(4,'TON','Ton','weight','bigger',1000.000000,NULL,'2021-10-26 15:21:21','2021-10-26 15:21:21',1,NULL),(5,'KW','Kuintal','weight','bigger',100.000000,NULL,'2021-10-26 15:21:21','2021-10-26 15:21:21',1,NULL),(6,'HR','Hour','duration','reference',1.000000,NULL,'2021-10-26 15:21:21','2021-10-26 15:21:21',1,NULL),(7,'DAY','Day','duration','bigger',24.000000,NULL,'2021-10-26 15:21:21','2021-10-26 15:21:21',1,NULL),(8,'7HR','7 Hours','duration','bigger',168.000000,NULL,'2021-10-26 15:21:21','2022-10-24 04:07:58',1,1),(9,'8HR','8 Hours','duration','bigger',192.000000,NULL,'2021-10-26 15:21:21','2022-10-24 04:08:46',1,1),(10,'HHR','Half Hour','duration','smaller',0.333330,NULL,'2021-10-26 15:21:21','2021-10-26 15:21:21',1,NULL),(11,'MIN','Minutes','duration','smaller',0.016670,NULL,'2021-10-26 15:21:21','2021-10-26 15:21:21',1,NULL),(12,'SEC','Seconds','duration','smaller',0.000280,NULL,'2021-10-26 15:21:21','2021-10-26 15:21:21',1,NULL);
/*!40000 ALTER TABLE `uoms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Administrator','admin@admin.com',NULL,'$2y$10$Vi/M3mYzPevq1UG2m33ZZeO0oi8x2Vk/0Qihwd/hLBS4MrzGXe/nO',NULL,'2021-10-26 15:21:17','2021-10-26 15:21:17',NULL);
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

-- Dump completed on 2023-03-18 20:49:01
