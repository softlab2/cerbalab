-- MySQL dump 10.13  Distrib 5.7.24, for Linux (x86_64)
--
-- Host: localhost    Database: cerbalab
-- ------------------------------------------------------
-- Server version	5.7.24-0ubuntu0.18.04.1

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
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(4096) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Выявление генетической предрасположенности к заболеваниям',NULL,NULL,NULL,NULL,0,'2018-11-25 08:30:08','2018-11-25 08:30:08'),(2,'Онкология',1,'files/uploads/923fd8412e49c9e72c954163d06f452e.pdf',NULL,NULL,2,'2018-11-25 08:31:44','2018-11-25 09:09:10'),(3,'Терапевтические заболевания',1,'files/uploads/045431227e4bb8045c410e6b588885b5.pdf',NULL,NULL,0,'2018-11-25 08:32:12','2018-11-25 08:32:12'),(4,'Акушерско-гинекологические заболевания',1,'files/uploads/d2b98989e3ec1e612177483f70e3d553.pdf',NULL,NULL,1,'2018-11-25 08:32:33','2018-11-25 09:09:10'),(5,'Установление отцовства',NULL,'files/uploads/15cb4ce8ff5a53b8d0f18ca561e390d2.pdf',NULL,NULL,1,'2018-11-25 08:32:59','2018-11-25 09:09:10'),(6,'Фармакогенетика',NULL,'files/uploads/aa2439e24fd6e12230d5be44f2f44d26.pdf',NULL,'Анализ доз лекарственных препаратов при лечении различных заболеваний, в том числе:',3,'2018-11-25 08:33:21','2018-11-25 09:14:17'),(7,'Онкологических заболеваний;',6,NULL,NULL,'Анализ доз лекарственных препаратов при лечении различных заболеваний, в том числе:',0,'2018-11-25 08:33:40','2018-11-25 08:33:40'),(10,'Исследование генов на биочипах',NULL,'files/uploads/8e3eccb2aaacaa560ea665544d1729e0.pdf',NULL,NULL,2,'2018-11-25 08:54:52','2018-11-25 09:14:17'),(11,'ПГТ',NULL,'files/uploads/df476139951a05686662b1e02211b65d.pdf',NULL,'Преимплантационное генетическое тестирование методами NGS и CGH',4,'2018-11-25 08:55:33','2018-11-25 09:16:07'),(12,'Секвенирование NGS',NULL,'files/uploads/e9910f40a0e61764d28541f8e75ea265.pdf',NULL,'Преимплантационное генетическое тестирование методами NGS и CGH',6,'2018-11-25 08:56:04','2018-11-25 09:09:11'),(13,'Генетические маркеры коррекции образа жизни',NULL,'files/uploads/f0e3e0fa3546c78aa2a0b866fc9883af.pdf',NULL,'Анализ генов определяющих устойчивость к ВИЧ-инфекции, влияющих на формирование зависимости к алкоголю и наркотикам',7,'2018-11-25 08:58:37','2018-11-25 09:09:11'),(14,'Диагностика тяжелых врожденных патологий',NULL,'files/uploads/87e07aa376f6ede318a927c4d7faab6e.pdf',NULL,NULL,8,'2018-11-25 08:59:13','2018-11-25 09:09:11'),(15,'Неинвазивная пренатальная диагностика (NIPT)',NULL,NULL,'http://nipt.su/','Тест разработан компанией ООО «НИПТ» совместно с НИИ АГиР им. Д.О. Отта. Осуществляется по уникальному протоколу, победившему в конкурсе инновационных проектов в сфере науки и высшего образования Санкт-Петербурга в 2018 году.',9,'2018-11-25 09:01:00','2018-11-25 09:09:11'),(16,'Генетика красоты и здоровья',NULL,NULL,NULL,NULL,10,'2018-11-25 09:03:15','2018-11-25 09:09:11'),(17,'Панели \"Эстетика\"',16,'files/uploads/39a2723f7ca1b02a4a815af402c4b488.pdf',NULL,NULL,1,'2018-11-25 09:07:15','2018-11-25 09:09:11'),(18,'Панели \"Спорт\"',16,'files/uploads/9847502612a5e3e5a176451a13715803.pdf',NULL,NULL,0,'2018-11-25 09:07:39','2018-11-25 09:07:39'),(19,'Генетические паспорта',16,'files/uploads/4a6741c56bbebe3bb450e9fd8b1f4bdc.pdf',NULL,NULL,2,'2018-11-25 09:07:59','2018-11-25 09:09:11'),(20,'Вспомогательные услуги',NULL,'files/uploads/c65e0a638e52be29e9e6796bbde5da09.pdf',NULL,NULL,11,'2018-11-25 09:08:50','2018-11-25 09:09:12'),(21,'Кариотипирование',NULL,'files/uploads/dc396e44751f5e8270e52fa05127e6e9.pdf',NULL,NULL,5,'2018-11-25 09:13:09','2018-11-25 09:16:07');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2018_11_24_125114_add_categories_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','admin@serbalab.ru',NULL,'$2y$10$02YKFWMB9ciQpTJUVlAfqeRGBNhNTAAgYxFmtEDzXRi6G./nbcr1i',NULL,'2018-11-25 08:27:47','2018-11-25 08:27:47');
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

-- Dump completed on 2018-11-25 10:16:59
