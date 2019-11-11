-- MySQL dump 10.13  Distrib 5.7.24, for Linux (x86_64)
--
-- Host: localhost    Database: lm
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
-- Table structure for table `action_products`
--

DROP TABLE IF EXISTS `action_products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `action_products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `action_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `action_products`
--

LOCK TABLES `action_products` WRITE;
/*!40000 ALTER TABLE `action_products` DISABLE KEYS */;
INSERT INTO `action_products` VALUES (1,1,1,NULL,NULL),(2,1,2,NULL,NULL);
/*!40000 ALTER TABLE `action_products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `actions`
--

DROP TABLE IF EXISTS `actions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `actions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `annotation` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `enabled` tinyint(1) DEFAULT NULL,
  `discount` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `actions`
--

LOCK TABLES `actions` WRITE;
/*!40000 ALTER TABLE `actions` DISABLE KEYS */;
INSERT INTO `actions` VALUES (1,'До Нового года действует скидка!','','<p>До Нового года действует скидка!</p>','2019-04-14 06:00:38','2019-04-14 06:55:41',NULL,'images/uploads/e2adeb93f6b30c51fc2c4bc4db9797d9.jpg',1,23),(2,'С 1 июля по 30 сентября 2017г. 20% скидка на генетический анализ Prenetix для будущих мам','<p>С 1 июля по 30 сентября 2017г. наш медико-генетический центр дает 20% скидку на генетический анализ Prenetix для будущих мам.<br />\r\n<br />\r\nОбязательные показания к проведению анализа:<br />\r\n<br />\r\n- возраст беременной старше 35 лет<br />\r\n- диагностирование хромосомной патологии в предыдущих беременностях<br />\r\n- наличие хромосомной патологии в семье<br />\r\n-выявление врожденного порока развития у плода<br />\r\n-возраст беременной женщины более 35 лет<br />\r\n-невынашивание, замершие беременности в анамнезе</p>','<p>С 1 июля по 30 сентября 2017г. наш медико-генетический центр дает 20% скидку на генетический анализ Prenetix для будущих мам.<br />\r\n<br />\r\nОбязательные показания к проведению анализа:<br />\r\n<br />\r\n- возраст беременной старше 35 лет<br />\r\n- диагностирование хромосомной патологии в предыдущих беременностях<br />\r\n- наличие хромосомной патологии в семье<br />\r\n-выявление врожденного порока развития у плода<br />\r\n-возраст беременной женщины более 35 лет<br />\r\n-невынашивание, замершие беременности в анамнезе<br />\r\n<br />\r\nПреимущества анализа:<br />\r\n<br />\r\n1.Безопасность.Без риска для женщины и ее будущего ребенка!<br />\r\n2.Высокая диагностическая точность. До 97,7%<br />\r\n3.Простота. Обычный забор венозной крови.<br />\r\n4.Раннее проведение теста. Начиная с 10 недели беременности.<br />\r\n<br />\r\nАнализ определяет следующие паталогии:<br />\r\n<br />\r\n- Синдром Дауна<br />\r\n- Синдром Эдвардса<br />\r\n- Синдром Патау<br />\r\n- Синдром Шерешевского-Тернера<br />\r\n- Синдром Клайнфельтера<br />\r\n<br />\r\nДля исследования необходимо 18 мл крови (2 пробирки) беременной женщины, срок выполнения &ndash; 12 рабочих дней<br />\r\n<br />\r\nСтоимость 35 000р. - Скидка 20% = 28 000р.<br />\r\n<br />\r\nСправки по телефону: +7 (812) 947-65-38</p>','2019-04-14 06:10:43','2019-04-14 06:10:43',NULL,'images/uploads/d17947e06483288b7d90cfa9901ceb26.jpg',1,20);
/*!40000 ALTER TABLE `actions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `h1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keywords` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(4096) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(10) DEFAULT NULL,
  `position` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `_lft` int(10) DEFAULT NULL,
  `_rgt` int(10) DEFAULT NULL,
  `enabled` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (11,'uslugi','Услуги','Услуги',NULL,NULL,NULL,NULL,1,'2019-04-13 10:08:12','2019-04-13 13:12:30',15,20,1),(12,'konsultacii-specialistov','Консультации специалистов','Консультации специалистов',NULL,NULL,NULL,11,0,'2019-04-13 10:08:34','2019-04-13 13:12:37',18,19,1),(13,'laboratornye-issledovaniya','ЛАБОРАТОРНЫЕ ИССЛЕДОВАНИЯ','ЛАБОРАТОРНЫЕ ИССЛЕДОВАНИЯ',NULL,NULL,NULL,NULL,0,'2019-04-13 10:09:01','2019-04-13 13:12:30',1,14,1),(14,'endokrinolog-dietolog','Эндокринолог-диетолог','Эндокринолог-диетолог',NULL,NULL,NULL,11,0,'2019-04-13 10:09:30','2019-04-13 13:12:37',16,17,1),(15,'zhenskoe-zdorove-planirovanie-i-vedenie-beremennosti','Женское здоровье/Планирование и ведение беременности','Женское здоровье/Планирование и ведение беременности','Женское здоровье/Планирование и ведение беременности','Женское здоровье/Планирование и ведение беременности',NULL,13,0,'2019-04-13 14:16:39','2019-04-13 14:16:39',2,7,1),(16,'nasledstvennye-zabolevaniya','Наследственные заболевания','Наследственные заболевания','Наследственные заболевания','Наследственные заболевания',NULL,13,0,'2019-04-13 14:17:20','2019-04-13 14:17:20',8,13,1),(17,'diagnostika-klassicheskimi-metodami','Диагностика классическими методами','Диагностика классическими методами','Диагностика классическими методами','Диагностика классическими методами',NULL,16,0,'2019-04-13 14:18:05','2019-04-13 14:18:05',9,10,1),(18,'diagnostika-metodom-ngs','Диагностика методом NGS','Диагностика методом NGS','Диагностика методом NGS','Диагностика методом NGS',NULL,16,0,'2019-04-13 14:18:49','2019-04-13 14:18:49',11,12,1),(19,'gistosovmestimost','Гистосовместимость','Гистосовместимость','Гистосовместимость','Гистосовместимость',NULL,15,0,'2019-04-13 14:19:27','2019-04-13 14:19:27',3,4,1),(20,'kariotipirovanie','Кариотипирование','Кариотипирование','Кариотипирование','Кариотипирование',NULL,15,0,'2019-04-13 14:20:07','2019-04-13 14:20:07',5,6,1);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `command_history`
--

DROP TABLE IF EXISTS `command_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `command_history` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `command` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `is_successful` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `command_history`
--

LOCK TABLES `command_history` WRITE;
/*!40000 ALTER TABLE `command_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `command_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contacts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `metro` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `worktime` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lng` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `enabled` tinyint(1) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contacts`
--

LOCK TABLES `contacts` WRITE;
/*!40000 ALTER TABLE `contacts` DISABLE KEYS */;
INSERT INTO `contacts` VALUES (1,'+7 921 947 65 38','Коломяжский пр., 28','Пионерская','{\"mon\":\"9-19\",\"tue\":\"9-19\",\"wed\":\"9-19\",\"thu\":\"9-19\",\"fri\":\"9-19\",\"sat\":\"9-19\",\"sun\":\"\\u0412\\u044b\\u0445\\u043e\\u0434\\u043d\\u043e\\u0439\"}','30.315635','59.938951','2019-04-14 07:45:17','2019-04-14 07:46:09','МГЦ «ЖИЗНЬ»',1,NULL),(2,'+7 812 602 93 38','Большой пр. В. О., 90, к. 2','Василеостровская, Приморская','{\"mon\":\"9-19\",\"tue\":\"9-19\",\"wed\":\"9-19\",\"thu\":\"9-19\",\"fri\":\"9-19\",\"sat\":\"10-16\",\"sun\":\"\\u0412\\u044b\\u0445\\u043e\\u0434\\u043d\\u043e\\u0439\"}','30.249312','60.008153','2019-04-14 08:06:08','2019-04-14 08:06:08','МГЦ «СЕРБАЛАБ»',1,NULL),(3,'+7 812 643 66 77','Кондратьевский пр., 23','Выборгская, Площадь Ленина','{\"mon\":\"9-18\",\"tue\":\"9-18\",\"wed\":\"9-18\",\"thu\":\"9-18\",\"fri\":\"9-18\",\"sat\":\"11-14\",\"sun\":\"\\u0412\\u044b\\u0445\\u043e\\u0434\\u043d\\u043e\\u0439\"}','30.380664','60.043804','2019-04-14 08:16:41','2019-04-14 08:16:41','МГЦ «БИОГАРМОНИЯ»',1,NULL);
/*!40000 ALTER TABLE `contacts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu_items`
--

DROP TABLE IF EXISTS `menu_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu_items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu_items`
--

LOCK TABLES `menu_items` WRITE;
/*!40000 ALTER TABLE `menu_items` DISABLE KEYS */;
/*!40000 ALTER TABLE `menu_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menus` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menus`
--

LOCK TABLES `menus` WRITE;
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;
/*!40000 ALTER TABLE `menus` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2015_08_25_172600_create_settings_table',1),(4,'2018_08_02_160837_create_verify_users_table',1),(5,'2018_08_02_161336_add_verified_field_to_users',1),(6,'2018_11_24_125114_add_categories_table',1),(7,'2018_11_27_205445_add_theme_table',1),(8,'2018_11_27_215526_add_left_col_count',1),(9,'2019_04_12_163728_create_pages_table',1),(10,'2019_04_12_163828_create_news_table',1),(11,'2019_04_12_163934_create_posts_table',1),(12,'2019_04_12_164215_create_menus_table',1),(13,'2019_04_12_164323_create_products_table',2),(14,'2019_04_12_164449_create_orders_table',2),(15,'2019_04_12_164551_create_order_items_table',2),(16,'2019_04_12_164644_create_roles_table',2),(17,'2019_04_12_165633_create_menu_items_table',2),(18,'2019_04_12_172458_create_personals_table',2),(19,'2019_04_12_172542_create_actions_table',2),(20,'2019_04_12_172640_create_contacts_table',2),(21,'2019_04_12_172722_create_receptions_table',2),(22,'2019_04_13_085349_add_product_categories_table',3),(23,'2016_03_23_125705_CreateTableCommandHistory',4),(24,'2019_04_14_051332_add_action_products_table',5),(25,'2019_04_14_075037_add_personal_contacts_table',6),(26,'2019_04_14_104206_slider',7),(27,'2019_04_14_104252_slider_items',7),(28,'2019_04_14_124201_services',8),(29,'2019_04_14_124321_product_services',8),(30,'2019_04_14_124959_types',9),(31,'2019_04_14_130709_type_tabs',10),(34,'2019_04_14_165923_type_items',11),(35,'2019_04_14_212821_payments',12),(36,'2019_04_14_220026_orders',13),(37,'2019_04_14_220111_order_items',14);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `h1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keywords` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `annotation` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_items`
--

LOCK TABLES `order_items` WRITE;
/*!40000 ALTER TABLE `order_items` DISABLE KEYS */;
/*!40000 ALTER TABLE `order_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paid` tinyint(1) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,'MAXIM BORONIN','net0@mail.ru','9219500988','5cb3b3164d0c6',0,1,0,3500,'2019-04-14 22:24:22','2019-04-14 22:24:22');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `h1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keywords` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` int(10) DEFAULT NULL,
  `parent_id` int(10) DEFAULT NULL,
  `main_menu` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pages`
--

LOCK TABLES `pages` WRITE;
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
INSERT INTO `pages` VALUES (1,'/','Лайф Медикал','Лайф Медикал','Лайф Медикал','Лайф Медикал','<div class=\"textBlock\">\r\n<h2 class=\"blockHeader base\">Портал медико-генетических центров</h2>\r\n<div class=\"blockContent base\">\r\n<p>Медико-генетический портал – это уникальный интернет-проект, собравший на своих страницах всю существующую информацию из мира медицинской генетики. Медико-генетические центры предоставляют комфортные условия для сдачи необходимых генетических анализов, результаты которых отличаются высокой точностью. Специалисты медицинских центров портала в Санкт-Петербурге выполняют главные условия планирования семьи: высокая скорость выполнения исследований, точность результатов и индивидуальный подход к каждой супружеской паре.</p>\r\n</div>\r\n</div>\r\n<div class=\"clearfix textBlock_ramka\">\r\n<h2 class=\"blockHeader base\">Консультации врачей</h2>\r\n<p class=\"base\">Кроме того, в наших центрах проводят консультации врач-эндокринолог, аллерголог (к.м.н.), врач УЗ-диагностики, оказывающие весь спектр лечебных и диагностических услуг в соответствующих областях. Специалисты по ультразвуковой диагностике проводят высококачественное обследование на новейшем оборудовании. Гинекологические клиники на высоком уровне предоставляют такую услугу, как консультация маммолога, что особенно актуально в связи с ростом доброкачественных и злокачественных заболеваний молочной железы.</p>\r\n</div>\r\n<div class=\"base\" id=\"map\" style=\"height:450px;    margin: 20px 0 40px 0;\"> </div>\r\n<script type=\"text/javascript\">\r\n  ymaps.ready(init);\r\n    var myMap;\r\n\r\n    function init(){     \r\n        myMap = new ymaps.Map (\"map\", {\r\n            center: [59.965650, 30.305995],\r\n            zoom: 11,\r\n			controls: []\r\n        },\r\n		{suppressMapOpenBlock: true}),\r\n		balloonLayout = ymaps.templateLayoutFactory.createClass(\'<div class=\"my-balloon\">$[properties.balloonContent]</div>\');\r\n\r\n\r\n		var marker1=new ymaps.Placemark([60.007182, 30.295126], {\r\n            balloonContent: \'<div class=\"my-balloon_zhizn\"><table class=\"simple\"><tbody><tr><th colspan=\"2\">МГЦ «ЖИЗНЬ»</th></tr><tr><td colspan=\"2\">тел. +7 921 947 65 38</td></tr><tr><td colspan=\"2\">Коломяжский пр., 28</td></tr><tr class=\"mHide\"><td colspan=\"2\">м. Пионерская</td></tr><tr class=\"mHide\"><td colspan=\"2\">Часы работы:</td></tr><tr class=\"mHide\"><td>пн.</td><td>9-19</td></tr><tr class=\"mHide\"><td>вт.</td><td>9-19</td></tr><tr class=\"mHide\"><td>ср.</td><td>9-19</td></tr><tr class=\"mHide\"><td>чт.</td><td>9-19</td></tr><tr class=\"mHide\"><td>пт.</td><td>9-19</td></tr><tr class=\"mHide\"><td>сб.</td><td>10-16</td></tr><tr class=\"mHide\"><td>вс.</td><td>выходной</td></tr></tbody></table></div>\',\r\n            iconContent: \'<span class=\"iconContent\"><span>МГЦ «ЖИЗНЬ»</span></span>\',\r\n//			balloonContentHeader:\"999999999999999999999999999999999999999999999999999999\"\r\n        }, {\r\n            // Зададим произвольный макет метки.\r\n			balloonLayout:balloonLayout,\r\n			// Не скрываем иконку при открытом балуне.\r\n            hideIconOnBalloonOpen: false,\r\n            // И дополнительно смещаем балун, для открытия над иконкой.\r\n            balloonOffset: [-218, -150],\r\n            iconLayout: \'default#imageWithContent\',\r\n            iconImageHref: \'/img/icon1.png\',\r\n			iconImageSize: [160, 43],\r\n			iconImageOffset: [-18, -43],\r\n//			balloonContentHeader:\"999999999999999999999999999999999999999999999999999999\"\r\n        });\r\n        myMap.geoObjects.add(marker1);\r\n		\r\n		marker1.events.add(\'mouseenter\', function (e) {\r\n\r\n			e.get(\'target\').options.set(\'iconImageHref\', \'/img/iconHover1.png\'); \r\n\r\n		});\r\n		\r\n		marker1.events.add(\'mouseleave\', function (e) {\r\n\r\n			e.get(\'target\').options.set(\'iconImageHref\', \'/img/icon1.png\'); \r\n\r\n		});\r\n		var marker2=new ymaps.Placemark([59.928807, 30.249312], {\r\n            balloonContent: \'<div class=\"my-balloon_serbalab\"><table class=\"simple\"><tbody><tr><th colspan=\"2\">МГЦ «СЕРБАЛАБ»</th></tr><tr><td colspan=\"2\">тел. +7 812 602 93 38</td></tr><tr><td colspan=\"2\">Большой пр. В. О., 90, к. 2</td></tr><tr class=\"mHide\"><td colspan=\"2\">м. Василеостровская, Приморская</td></tr><tr class=\"mHide\"><td colspan=\"2\">Часы работы:</td></tr><tr class=\"mHide\"><td>пн.</td><td>9-19</td></tr><tr class=\"mHide\"><td>вт.</td><td>9-19</td></tr><tr class=\"mHide\"><td>ср.</td><td>9-19</td></tr><tr class=\"mHide\"><td>чт.</td><td>9-19</td></tr><tr class=\"mHide\"><td>пт.</td><td>9-19</td></tr><tr class=\"mHide\"><td>сб.</td><td>10-16</td></tr><tr class=\"mHide\"><td>вс.</td><td>выходной</td></tr></tbody></table></div>\',\r\n            iconContent: \'<span class=\"iconContent\"><span>МГЦ «СЕРБАЛАБ»</span></span>\'\r\n        }, {\r\n            // Зададим произвольный макет метки.\r\n			balloonLayout:balloonLayout,\r\n			// Не скрываем иконку при открытом балуне.\r\n            hideIconOnBalloonOpen: false,\r\n            // И дополнительно смещаем балун, для открытия над иконкой.\r\n            balloonOffset: [-218, -150],\r\n            iconLayout: \'default#imageWithContent\',\r\n            iconImageHref: \'/img/icon2.png\',\r\n			iconImageSize: [180, 43],\r\n			iconImageOffset: [-18, -43],\r\n        });\r\n		myMap.geoObjects.add(marker2);\r\n		\r\n		\r\n		marker2.events.add(\'mouseenter\', function (e) {\r\n\r\n			e.get(\'target\').options.set(\'iconImageHref\', \'/img/iconHover2.png\'); \r\n\r\n		});\r\n		\r\n		marker2.events.add(\'mouseleave\', function (e) {\r\n\r\n			e.get(\'target\').options.set(\'iconImageHref\', \'/img/icon2.png\'); \r\n\r\n		});\r\n		\r\n		var marker3=new ymaps.Placemark([59.967331, 30.384041], {\r\n            balloonContent: \'<div class=\"my-balloon_biogarmonia\"><table class=\"simple\"><tbody><tr><th colspan=\"2\">МГЦ «БИОГАРМОНИЯ»</th></tr><tr><td colspan=\"2\">тел. +7 812 643 66 77</td></tr><tr><td colspan=\"2\">Кондратьевский пр., 23</td></tr><tr class=\"mHide\"><td colspan=\"2\">м. Выборгская, Площадь Ленина</td></tr><tr class=\"mHide\"><td colspan=\"2\">Часы работы:</td></tr><tr class=\"mHide\"><td>пн.</td><td>9-18</td></tr><tr class=\"mHide\"><td>вт.</td><td>9-18</td></tr><tr class=\"mHide\"><td>ср.</td><td>9-18</td></tr><tr class=\"mHide\"><td>чт.</td><td>9-18</td></tr><tr class=\"mHide\"><td>пт.</td><td>9-18</td></tr><tr class=\"mHide\"><td>сб.</td><td>11-14</td></tr><tr class=\"mHide\"><td>вс.</td><td>выходной</td></tr></tbody></table></div>\',\r\n            iconContent: \'<span class=\"iconContent\"><span>МГЦ «БИОГАРМОНИЯ»</span></span>\'\r\n        }, {\r\n            // Зададим произвольный макет метки.\r\n			balloonLayout:balloonLayout,\r\n			// Не скрываем иконку при открытом балуне.\r\n            hideIconOnBalloonOpen: false,\r\n            // И дополнительно смещаем балун, для открытия над иконкой.\r\n            balloonOffset: [18, -150],\r\n            iconLayout: \'default#imageWithContent\',\r\n            iconImageHref: \'/img/icon3.png\',\r\n			iconImageSize: [210, 43],\r\n			iconImageOffset: [-18, -43],\r\n        });\r\n		\r\n		myMap.geoObjects.add(marker3);\r\n		\r\n		marker3.events.add(\'mouseenter\', function (e) {\r\n\r\n			e.get(\'target\').options.set(\'iconImageHref\', \'/img/iconHover3.png\'); \r\n\r\n		});\r\n		\r\n		marker3.events.add(\'mouseleave\', function (e) {\r\n\r\n			e.get(\'target\').options.set(\'iconImageHref\', \'/img/icon3.png\'); \r\n\r\n		});\r\n    }\r\n</script>',1,'2019-04-13 12:02:41','2019-04-14 12:16:35','Главная',0,NULL,1),(2,'about','О нас','О нас','О нас','О нас','<article>\r\n        <h1>О нас</h1>\r\n        <p><b>Медико-генетический портал - </b>это новый специализированный интернет-проект, посвященный генетике, в том числе и спортивной.</p>\r\n<p><b>Медико-генетический портал - </b>это еще и собственная клинико-лабораторная служба, где Вы сможете пройти консультации ведущих врачей-специалистов, а также сдать огромный спектр лабораторных анализов и пройти ультразвуковую диагностику. Медицинские центры портала - это и клиника урологии и маммологический центр, а также клиники ведения беременности и др.  Все это обеспечивает точность и скорость установления диагноза и проведение новейших методов лечения заболеваний.<br />\r\n<br />\r\nСеть медико-генетических центров «Жизнь» включает в себя три медицинских центра в разных районах Санкт-Петербурга, специализирующихся на всех видах генетической диагностики. <br />\r\n<br />\r\nОсновными направлениями нашей деятельности являются:<br />\r\n• Медико-генетическое консультирование;<br />\r\n• Выявление генетической предрасположенности к онкологическим, сердечно-сосудистым, эндокринным, аутоимунным, акушерско-гинекологическим и многим другим заболеваниям;<br />\r\n• Планирование беременности, включающее диагностику носительства моногенных заболеваний и различных хромосомных и генных перестроек у будущих родителей, диагностику указанных патологий у членов семьи;<br />\r\n• Диагностика тяжелых наследственных патологий;<br />\r\n• Комплексная диагностика в случае неразвивающейся беременности и самопроизвольных выкидышей;<br />\r\n• Преимплантационная генетическая диагностика (ПГД) при ЭКО;<br />\r\n• Генетические паспорта, в том числе генетические паспорта для спортсменов. </p>\r\n<p>В основе планирования диагностики, лечения и профилактики многих заболеваний, а также планирования семьи и индивидуального образа жизни, уже более 10 лет лежит генетическая диагностика. Известно, что основой всех процессов в организме является структура генов и генома в целом. На протяжении последних десятилетий ученые и врачи всего мира занимаются усовершенствованием методик, позволяющих наиболее точно установить наличие и особенности изменений в геноме, и связать их с клинической картиной заболеваний. <br />\r\n<br />\r\nОсновная цель наших центров – обеспечение своевременного и доступного медико-генетического консультирования для пациентов и комплексного подхода в диагностике генетических патологий с использованием наиболее адекватных, в том числе самых современных методов, а также максимальное уменьшение сроков выполнения и стоимости анализов. <br />\r\n<br />\r\nУспех в реализации этих амбициозных планов обеспечивается тем, что основателями и руководителями сети медико-генетических центров «Жизнь» являются ведущие специалисты СПбГУ и РАН Олег Сергеевич Глотов, Андрей Сергеевич Глотов и Асеев Михаил Владимирович, посвятившие многие годы научной работе в различных областях общей и медицинской генетики. Являясь сотрудниками крупных научных и медицинских центров Санкт-Петербурга, таких как лаборатория генетики городской больницы №40, НИИ АГиР им. Д.О. Отта и Научный Парк СПБГУ, они лично принимают участие в руководстве современными генетическими научно-исследовательскими проектами. <br />\r\n<br />\r\nТакое объединение передовых научных направлений и прикладной медицинской диагностики позволяет нашим специалистам быть в курсе всех последних достижений в области медицинской генетики и предлагать пациентам и врачебному сообществу наиболее оптимальные пути диагностики заболеваний любыми необходимыми методами, от цитогенетических и иммуногистохимических до микроматричного анализа и секвенирования NGS. <br />\r\n<br />\r\nНами накоплен положительный опыт партнерских отношений с различными медицинскими учреждениями. Мы уже наладили систему генетического консультирования и поставки услуг генетической диагностики в целом ряде клиник, женских консультаций, больниц, оздоровительных и спортивных центров и готовы к новым партнерским отношениям. <br />\r\n<br />\r\nКомплексный подход к генетической диагностике – основа медицинской генетики XXI века. В медико-генетических центрах «Жизнь» он выражается в наличии медико-генетического консультирования до и после назначения необходимой диагностики, а также в возможности назначения любого генетического обследования, независимо от того, в какой лаборатории оно выполняется.  При наличии множества лабораторий различного профиля и огромного спектра типов исследований, существует острая необходимость координации работы этих лабораторий в отношении диагностики каждого пациента. В сети наших медицинских центров пациенты имеют уникальную возможность воспользоваться услугами любых Российских и даже зарубежных лабораторий. Разработанная нами логистическая схема, включающая собственную курьерскую службу, позволяет оперативно доставлять материал в наши центры из любой точки Санкт-Петербурга и из всех регионов России, и незамедлительно транспортировать его в лабораторию. При этом специалисты наших центров самостоятельно скоординируют сортировку, отправку материала, получение и составление единого заключения для пациента. <br />\r\n<br />\r\nМедико-генетическое консультирование – первый и наиболее важный этап в процессе выявления патологий и постановки диагноза. Именно консультация врача-генетика позволяет заподозрить генетическую природу болезни, прийти к назначению необходимой диагностики и, в конечном счете, планированию дальнейшего лечения пациента. В сети наших центров квалифицированные врачи-генетики регулярно решают подобные задачи в области генетики предрасположенностей, репродуктивного здоровья и планировании беременности, тяжелых наследственных патологий, преимплантационной генетической диагностики, а также в отношении генетических основ питания, образа жизни, спорта и фитнеса.<br />\r\n<br />\r\nНаиболее важными и востребованными диагностическими комплексами, доступными в наших центрах, являются:<br />\r\n<br />\r\nПри неразвивающейся беременности и самопроизвольных выкидышах:<br />\r\n• Цитогенетическое кариотипирование абортивного материала;<br />\r\n• Микроматричное кариотипирование абортивного материала;<br />\r\n• Иммуногистохимическое исследование абортивного материала;<br />\r\n• ПЦР-диагностика инфекций абортивного материала;<br />\r\n• Кариотипирование по лимфоцитам периферической крови обоих членов супружеской пары;<br />\r\n• Микроматричное кариотипирование членов супружеской пары;<br />\r\n• Анализ генов главного комплекса гистосовместимости;<br />\r\n• Анализ наиболее распространённых полиморфизмов как у мужчины, так и у женщины, связанных с нарушениями протекания беременности у женщины.<br />\r\n<br />\r\nПри планировании беременности:<br />\r\n• Оценка носительства моногенных заболеваний у супружеской пары;<br />\r\n• Цитогенетическое кариотипирование членов супружеской пары;<br />\r\n• Микроматричное кариотипирование членов супружеской пары;<br />\r\n• Анализ генов главного комплекса гистосовместимости;<br />\r\n• Анализ наиболее распространённых полиморфизмов как у мужчины, так и у женщины, связанных с нарушениями протекания беременности у женщины.<br />\r\n<br />\r\nПри ведении беременности:<br />\r\n• УЗИ и биохимический скрининг;<br />\r\n• Неинвазивная пренатальная диагностика хромосомных патологий плода по крови беременной;<br />\r\n• Определение Rh-фактора плода по крови беременной;<br />\r\n• Определение пола плода по крови беременной;<br />\r\n• Цитогенетическое кариотипирование биопсии клеток хориона в случае подозрения на патологию;<br />\r\n• Диагностика моногенных заболеваний плода на основании биопсии клеток хориона в случае подозрения на патологию;<br />\r\n• Диагностика моногенных заболеваний у членов семьи в случае подозрения на патологию у плода;<br />\r\n• Анализ генов главного комплекса гистосовместимости;<br />\r\n• Анализ наиболее распространённых полиморфизмов как у мужчины, так и у женщины, связанных с нарушениями протекания беременности у женщины;<br />\r\n• Установление отцовства.<br />\r\n<br />\r\nПри подозрении на тяжелое наследственное заболевание в педиатрии, а также у взрослых пациентов, включая диагностику у членов семьи:<br />\r\n• Диагностика моногенных заболеваний, поиск распространенных мутаций;<br />\r\n• Диагностика моногенных заболеваний, секвенирование NGS;<br />\r\n• Диагностика хромосомных перестроек, секвенирование NGS;<br />\r\n• Диагностика хромосомных перестроек, микроматричное кариотипирование;<br />\r\n• Диагностика хромосомных перестроек, FISH;<br />\r\n• Диагностика хромосомных перестроек, цитогенетическое кариотипирование.<br />\r\n<br />\r\nПри ЭКО:<br />\r\n• Диагностика моногенных заболеваний у пары или будущей мамы, поиск распространенных мутаций;<br />\r\n• Диагностика моногенных заболеваний у пары или будущей мамы, секвенирование NGS;<br />\r\n• Диагностика хромосомных перестроек у пары или будущей мамы, секвенирование NGS;<br />\r\n• Диагностика хромосомных перестроек у пары или будущей мамы, микроматричное кариотипирование;<br />\r\n• Диагностика хромосомных перестроек у пары или будущей мамы, FISH;<br />\r\n• Диагностика хромосомных перестроек у пары или будущей мамы, цитогенетическое кариотипирование;<br />\r\n• Диагностика моногенных заболеваний у доноров спермы и яйцеклеток, поиск распространенных мутаций;<br />\r\n• Диагностика моногенных заболеваний у доноров спермы и яйцеклеток, секвенирование NGS;<br />\r\n• Диагностика хромосомных перестроек у доноров спермы и яйцеклеток, секвенирование NGS;<br />\r\n• Диагностика хромосомных перестроек у доноров спермы и яйцеклеток, микроматричное кариотипирование;<br />\r\n• Диагностика хромосомных перестроек у доноров спермы и яйцеклеток, FISH;<br />\r\n• Диагностика хромосомных перестроек у доноров спермы и яйцеклеток, цитогенетическое кариотипирование;<br />\r\n• Преимплантационная генетическая диагностика методом NGS;<br />\r\n• Весь комплекс генетической диагностики при ведении беременности.<br />\r\n<br />\r\nПри планировании образа жизни:<br />\r\n• Общий генетический паспорт;<br />\r\n• Спортивный генетический паспорт;<br />\r\n• Диетологический генетический паспорт;<br />\r\n• Фармакогенетика;<br />\r\n• Анализ отдельных генов и полиморфизмов, связанных с развитием различных заболеваний.</p>\r\n      </article>',1,'2019-04-13 12:12:30','2019-04-13 13:01:48','О нас',1,NULL,1),(3,'akcii','Акции','Акции','Акции','Акции','<article>\r\n        <h1>Акции</h1>\r\n        <a href=\"/cat/price_med_test/polnogenomnye_issledovaniya_i/nevrologiya/demeniciya/\" target=\"_blank\" class=\"akciyaItem heightLimit\" data-heightLimit=\"300\" data-hideText=\"Скрыть\" data-showText=\"Подробнее\"><span class=\"doctorImg \"><span class=\"discount\">-23%</span><img src=\"/upload/cache/274x173_a2797f50a445340c20177706d6d5fd76.jpg\" alt=\"\" /></span><span class=\"doctorInfo\">\r\n      <span class=\"mainInfo\">\r\n        <span class=\"doctorBio\">До Нового года действует скидка!</span>\r\n      </span>\r\n    </span></a><a href=\"/cat/price_med_test/womens_health/neinvazivnaya_prenatalnaya_diagnostika/neinvazi/\" target=\"_blank\" class=\"akciyaItem heightLimit\" data-heightLimit=\"300\" data-hideText=\"Скрыть\" data-showText=\"Подробнее\"><span class=\"doctorImg \"><span class=\"discount\">-20%</span><img src=\"/upload/cache/274x173_cbf6b01edfb792e2d51c77bc012ba764.jpg\" alt=\"\" /></span><span class=\"doctorInfo\">\r\n      <span class=\"mainInfo\">\r\n        <span class=\"doctorBio\">С 1 июля по 30 сентября 2017г. наш медико-генетический центр дает 20% скидку на генетический анализ Prenetix для будущих мам.<br /><br />Обязательные показания к проведению анализа:<br /><br />- возраст беременной старше 35 лет<br />- диагностирование хромосомной патологии в предыдущих беременностях<br />- наличие хромосомной патологии в семье<br />-выявление врожденного порока развития у плода<br />-возраст беременной женщины более 35 лет<br />-невынашивание, замершие беременности в анамнезе<br /><br />Преимущества анализа:<br /><br />1.Безопасность.Без риска для женщины и ее будущего ребенка!<br />2.Высокая диагностическая точность. До 97,7%<br />3.Простота. Обычный забор венозной крови.<br />4.Раннее проведение теста. Начиная с 10 недели беременности.<br /><br />Анализ определяет следующие паталогии:<br /><br />- Синдром Дауна<br />- Синдром Эдвардса<br />- Синдром Патау<br />- Синдром Шерешевского-Тернера<br />- Синдром Клайнфельтера<br /><br />Для исследования необходимо 18 мл крови (2 пробирки) беременной женщины, срок выполнения – 12 рабочих дней<br /><br />Стоимость 35 000р. - Скидка 20% = 28 000р.<br /><br />Справки по телефону: +7 (812) 947-65-38</span>\r\n      </span>\r\n    </span></a>\r\n      </article>',1,'2019-04-13 12:13:02','2019-04-13 20:39:03','Акции',2,NULL,1),(4,'uslugi-i-ceny','Услуги и цены','Услуги и цены','Услуги и цены','Услуги и цены','<article>\r\n        <h1>Услуги и цены</h1>\r\n        <div style=\"text-align: center;\">\r\n<p style=\"font-family: Roboto-Regular, Arial, &quot;Helvetica CY&quot;, &quot;Nimbus Sans L&quot;; text-align: justify;\"><b>Уважаемые посетители!</b></p>\r\n<p style=\"text-align: justify;\"><font face=\"Roboto-Regular, Arial, Helvetica CY, Nimbus Sans L\">В данном разделе в скором времени Вы сможете найти подробное описание всех направлений нашей деятельности. Разделы будут структурированы и содержать много полезной информации как для врачей, так и для пациентов.</font></p>\r\n<p style=\"text-align: justify;\"><font face=\"Roboto-Regular, Arial, Helvetica CY, Nimbus Sans L\">Сейчас Вы можете ознакомиться с перечнем наших исследований, используя навигацию в шапке сайта, на главной странице и в левом боковом меню.</font></p>\r\n<p style=\"text-align: justify;\"><font face=\"Roboto-Regular, Arial, Helvetica CY, Nimbus Sans L\">На нашем сайте есть удобный поиск. Для нахождения интересующих анализов Вам достаточно ввести полностью или частично наименование анализа или его артикул.</font></p>\r\n</div>\r\n      </article>',1,'2019-04-13 12:43:30','2019-04-13 18:50:27','Услуги и цены',3,NULL,1),(5,'zapisatsya','Записаться','Записаться','Записаться','Записаться','<article>\r\n        <h1>Записаться на прием</h1>\r\n        <form class=\"cms_feedback_form \" action=\"/zapisatsya/\" id=\"\" method=\"post\" enctype=\"multipart/form-data\"><input type=\"hidden\" name=\"cms_form\" value=\"Y\"/><div style=\"display:none\"><input name=\"myname\" value=\"\"/></div>\r\n\r\n<div class=\"feedback_forma\">  \r\n    <div class=\"feedback_stroka\">  \r\n					<div class=\"feedback_tit\">Фамилия и имя</div>\r\n			<div class=\" feedback_pole\"><input placeholder=\"\"  class=\"\" type=\"text\" name=\"your_name\" id=\"your_name\" value=\"\"/></div>\r\n			\r\n  </div>\r\n    <div class=\"feedback_stroka\">  \r\n					<div class=\"feedback_tit\">Врач</div>\r\n			<div class=\" feedback_pole\"><div class=\"ffselect\"><select  class=\"\" name=\"vrach\" style=\"font-size: 10px; width: 200px;\"><option  value=\"Любой\">Любой</option><option  value=\"Никандрова Светлана Евгеньевна\">Никандрова Светлана Евгеньевна</option><option  value=\"Болдырева Юлия Сергеевна\">Болдырева Юлия Сергеевна</option><option  value=\"Белоног Ольга Львовна\">Белоног Ольга Львовна</option></select></div></div>\r\n			\r\n  </div>\r\n    <div class=\"feedback_stroka\">  \r\n					<div class=\"feedback_tit\">Контактный телефон</div>\r\n			<div class=\" feedback_pole\"><input placeholder=\"8 (921) 555-55-55\"  class=\"required\" type=\"text\" name=\"tel\" id=\"tel\" value=\"\"/></div>\r\n			\r\n  </div>\r\n    <div class=\"feedback_stroka\">  \r\n					<div class=\"feedback_tit\">Предпочтительное время приема</div>\r\n			<div class=\" feedback_pole\"><input placeholder=\"Вторник, утро\"  class=\"\" type=\"text\" name=\"vremya\" id=\"vremya\" value=\"\"/></div>\r\n			\r\n  </div>\r\n    <div class=\"feedback_stroka\">  \r\n					<div class=\"feedback_tit\">Сообщение</div>\r\n			<div class=\" feedback_pole\"><textarea placeholder=\"\"  class=\"\" name=\"soob\"></textarea></div>\r\n			\r\n  </div>\r\n    <div class=\"feedback_stroka\">  \r\n					<div class=\"feedback_tit\"></div>\r\n			<div class=\" feedback_pole\"><input type=\"submit\" value=\"Отправить\" class=\"button blue\" /></div>\r\n			\r\n  </div>\r\n  </div>\r\n\r\n</form>\r\n      </article>',1,'2019-04-13 12:43:51','2019-04-13 19:58:50','Записаться',4,NULL,1),(6,'nashi-specialisty','Наши специалисты','Наши специалисты','Наши специалисты','Наши специалисты','<article>\r\n        \r\n        <script src=\"/js/catalogue_paging.js\" type=\"text/javascript\"></script>\r\n<div class=\"catalogue-goods-container similar-models\">  <h1>Список докторов</h1>\r\n  <div class=\"normal-list\">    </div>     <ul class=\"catalogue-goods cmsCatalogItemList\">\r\n    \r\n        <li class=\"cms_catalog_item doctors\" data-tpl=\"listItem\">\r\n   <div class=\"doctorImg\">\r\n        <a href=\"/cat/doctor/nikandrova_svetlana_evgenevna/\" style=\"width:200px;height:100%;text-align:center;display:inline-block;border: 1px solid #dae0e7;box-sizing:border-box;\"><span style=\"display:inline-block;\">Нет фото</span><span style=\"height:100%;display:inline-block;vertical-align: middle;\"></span></a>\r\n   </div>\r\n            <div class=\"doctorInfo\">\r\n              <a class=\"doctorTitle\" href=\"/cat/doctor/nikandrova_svetlana_evgenevna/\">Никандрова Светлана Евгеньевна</a>\r\n    <ul class=\"clinics\">\r\n      \r\n     <li class=\"clinic\">МГЦ «БИОГАРМОНИЯ» <span>(Кондратьевский пр., 23)</span></li>\r\n            </ul>\r\n    <div class=\"mainInfo\">\r\n      \r\n     <div class=\"doctorBio\">Врач акушер-гинеколог, высшая квалификационная категория по специальности \"Ультразвуковая диагностика\".<br />Образование: 1980-1986 гг. -<br /> Ленинградский санитарно-гигиенический медицинский институт.</div>\r\n    </div>\r\n   </div>\r\n   <div class=\"docButtonContainer\"><a href=\"/zapisatsya/?doctor=2\" class=\"button blue\">Записаться</a></div>\r\n        </li>\r\n    \r\n        <li class=\"cms_catalog_item doctors\" data-tpl=\"listItem\">\r\n   <div class=\"doctorImg\">\r\n             <a href=\"/cat/doctor/boldyreva_yulia_sergeevna/\"><img src=\"/upload/cache/200x250_10aab67f42392231ae556577f7981588.jpg\" alt=\"\"/></a>\r\n    \r\n   </div>\r\n            <div class=\"doctorInfo\">\r\n              <a class=\"doctorTitle\" href=\"/cat/doctor/boldyreva_yulia_sergeevna/\">Болдырева Юлия Сергеевна</a>\r\n    <ul class=\"clinics\">\r\n      \r\n     <li class=\"clinic\">МГЦ «ЖИЗНЬ» <span>(Коломяжский пр., 28)</span></li>\r\n            </ul>\r\n    <div class=\"mainInfo\">\r\n      \r\n     <div class=\"doctorBio\">Врач-аллерголог-иммунолог, к.м.н., высшая квалификационная категория.<br />Образование: 1988-1995 гг. - Санкт-Петербургская педиатрическая медицинская академия.</div>\r\n    </div>\r\n   </div>\r\n   <div class=\"docButtonContainer\"><a href=\"/zapisatsya/?doctor=3\" class=\"button blue\">Записаться</a></div>\r\n        </li>\r\n    \r\n        <li class=\"cms_catalog_item doctors\" data-tpl=\"listItem\">\r\n   <div class=\"doctorImg\">\r\n             <a href=\"/cat/doctor/belonog_olga_lvovna/\"><img src=\"/upload/cache/200x250_f4c560ea0fe34fac633273b642b06318.jpg\" alt=\"\"/></a>\r\n    \r\n   </div>\r\n            <div class=\"doctorInfo\">\r\n              <a class=\"doctorTitle\" href=\"/cat/doctor/belonog_olga_lvovna/\">Белоног Ольга Львовна</a>\r\n    <ul class=\"clinics\">\r\n      \r\n     <li class=\"clinic\">МГЦ «ЖИЗНЬ» <span>(Коломяжский пр., 28)</span></li>\r\n            </ul>\r\n    <div class=\"mainInfo\">\r\n      \r\n     <div class=\"doctorBio\">Врач-генетик, высшая квалификационная категория.<br />Образование: 1996 г. - Санкт-Петербургская государственная медицинская академия, врач эпидемиолог-гигиенист.</div>\r\n    </div>\r\n   </div>\r\n   <div class=\"docButtonContainer\"><a href=\"/zapisatsya/?doctor=4\" class=\"button blue\">Записаться</a></div>\r\n        </li>\r\n    </ul>            <div class=\"normal-list\">              </div>    &nbsp;  </div>     \r\n<script>$(\"document\").ready(function(){$(\".cmsCatalogItemList\").trigger(\"catalogAfterUpdate\");});</script>\r\n      </article>',1,'2019-04-13 12:44:16','2019-04-13 20:00:11','Наши специалисты',5,NULL,1),(7,'Контакты','Контакты','Контакты','Контакты','Контакты','<article>\r\n        <h1>Контакты</h1>\r\n        <div class=\"mainMap\"><script type=\"text/javascript\" charset=\"utf-8\" async src=\"https://api-maps.yandex.ru/services/constructor/1.0/js/?sid=ZsER7WtTXyQNVXzZEKyHXr71Y6_wlyVw&amp;width=100%&amp;height=300&amp;lang=ru_RU&amp;sourceType=constructor&amp;scroll=true\"></script></div>\r\n<h2 id=\"point1\">МГЦ «ЖИЗНЬ»</h2>\r\n<div class=\"contactsMap\"><script  type=\"text/javascript\" charset=\"utf-8\" async  src=\"https://api-maps.yandex.ru/services/constructor/1.0/js/?sid=SitEKFXaNEeArloZrIV86gO8eaN_7sb5&amp;width=100%&amp;height=400&amp;lang=ru_RU&amp;sourceType=constructor&amp;scroll=true\"></script></div>\r\n <div class=\"contactsText\">\r\n   <div class=\"phone\"> +7 921 947 65 38</div>\r\n   <div class=\"address\">Коломяжский пр., 28</div>\r\n   <div class=\"underground\">м. Пионерская</div>\r\n <table class=\"worktime\">\r\n <tr><th colspan=\"2\">Часы работы:</th></tr>\r\n   <tr ><td>пн.</td><td>9-19</td></tr>\r\n   <tr><td>вт.</td><td>9-19</td></tr>\r\n   <tr ><td>ср.</td><td>9-19</td></tr>\r\n   <tr><td>чт.</td><td>9-19</td></tr>\r\n   <tr ><td>пт.</td><td>9-19</td></tr>\r\n   <tr><td>сб.</td><td>10-16</td></tr>\r\n   <tr ><td>вс.</td><td>выходной</td></tr>\r\n  </tbody></table></div>\r\n<h2 id=\"point2\">МГЦ «СЕРБАЛАБ»</h2>\r\n<div class=\"contactsMap\"><script  type=\"text/javascript\" charset=\"utf-8\" async  src=\"https://api-maps.yandex.ru/services/constructor/1.0/js/?sid=jFoMcL60DjgaNTiT2FT1bDXcG1EO9Yfe&amp;width=100%&amp;height=400&amp;lang=ru_RU&amp;sourceType=constructor&amp;scroll=true\"></script>\r\n</div>\r\n <div class=\"contactsText\">\r\n <div class=\"phone\">+7 812 602 93 38</div>\r\n <div class=\"address\">Большой пр. В. О., 90, к. 2</div>\r\n <div class=\"underground\">м. Василеостровская, Приморская</div>\r\n <table class=\"worktime\">\r\n <tr><th colspan=\"2\">Часы работы:</th></tr>\r\n   <tr ><td>пн.</td><td>9-19</td></tr>\r\n   <tr><td>вт.</td><td>9-19</td></tr>\r\n   <tr ><td>ср.</td><td>9-19</td></tr>\r\n   <tr><td>чт.</td><td>9-19</td></tr>\r\n   <tr ><td>пт.</td><td>9-19</td></tr>\r\n   <tr><td>сб.</td><td>10-16</td></tr>\r\n   <tr ><td>вс.</td><td>выходной</td></tr>\r\n  </table></div>\r\n<h2 id=\"point3\">МГЦ «БИОГАРМОНИЯ»</h2>\r\n<div class=\"contactsMap\"><script  type=\"text/javascript\" charset=\"utf-8\" async  src=\"https://api-maps.yandex.ru/services/constructor/1.0/js/?sid=8BHI1Gd7-Qi4GmTk5KgPyTtsmo-bwi96&amp;width=100%&amp;height=400&amp;lang=ru_RU&amp;sourceType=constructor&amp;scroll=true\"></script>\r\n</div>\r\n <div class=\"contactsText\">\r\n    <div class=\"phone\">+7 812 643 66 77</div>\r\n   <div class=\"address\">Кондратьевский пр., 23</div>\r\n   <div class=\"underground\">м. Выборгская, Площадь Ленина</div>\r\n <table class=\"worktime\">\r\n <tr><th colspan=\"2\">Часы работы:</th></tr>\r\n   <tr ><td>пн.</td><td>9-18</td></tr>\r\n   <tr><td>вт.</td><td>9-18</td></tr>\r\n   <tr ><td>ср.</td><td>9-18</td></tr>\r\n   <tr><td>чт.</td><td>9-18</td></tr>\r\n   <tr ><td>пт.</td><td>9-18</td></tr>\r\n   <tr><td>сб.</td><td>11-14</td></tr>\r\n   <tr ><td>вс.</td><td>выходной</td></tr>\r\n  </tbody></table></div>\r\n​\r\n      </article>',1,'2019-04-13 12:44:44','2019-04-13 20:35:45','Контакты',6,NULL,1);
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;
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
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `settings` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payments`
--

LOCK TABLES `payments` WRITE;
/*!40000 ALTER TABLE `payments` DISABLE KEYS */;
INSERT INTO `payments` VALUES (1,'В офисе наличными или банковской картой',1,'{\"psr\": null, \"url\": null, \"merchant_id\": null}','2019-04-14 21:34:37','2019-04-14 21:34:37'),(2,'Банковской картой онлайн',1,'{\"psr\": \"-----BEGIN CERTIFICATE REQUEST-----\\r\\nMIICijCCAXICAQAwRTELMAkGA1UEBhMCQVUxEzARBgNVBAgMClNvbWUtU3RhdGUx\\r\\nITAfBgNVBAoMGEludGVybmV0IFdpZGdpdHMgUHR5IEx0ZDCCASIwDQYJKoZIhvcN\\r\\nAQEBBQADggEPADCCAQoCggEBAOYv5tkDb38dGZUGLQTFI+pVR3y/6OPtednggMp7\\r\\n20II5hJRu1ovw9htM04WH2hquVj9+gxVa3ApgCBL8jIY1Bx7jhenNqAbNr0QLZ9p\\r\\n+kzPulcLeOFzQPZDR1y9EfgYtWA/fl8yoiubw/pwZhoUKq4uqKS9hzYDTGZUKlXi\\r\\n1veTGFYfZJtGi9SSAeye65Cz6MzZbaXbGD7shlBPbjItW0KgTdZ+8RET6i0XXV0h\\r\\nJM9SIobHr78pobnk0Fo/WR+o8/yxfkm8FzRSDK7V+V9vw4AD527TxCkCRtcGbVlA\\r\\nnF1zbqItshIMegAR+qm/lKFG+bt1HyuOKIBsHyBfD74tOhMCAwEAAaAAMA0GCSqG\\r\\nSIb3DQEBCwUAA4IBAQCavJyFGqvIEBLtWxKjgmnpXJRyJ8L5ar4Puq8ppBGhJAqS\\r\\n1+ARpO1LIglmZ9K9fj8zPoNDlgs6u2/4eVh622HGx+Sxba+0yxvRmFSAqH5eJXAz\\r\\nckHzn1IekFLhJFGyxuFCBMwmqfkU0JetLmPQQtuIbXoRZRVcD4isVeWZ6TAr0MfL\\r\\nurU11s1GTAGFPxOm9APj1B0Aj2+WIaOi3/eqIxfcTw5FuZoKS2EotUpAgbIILJpj\\r\\nEvEuqqKeVod1wr5iXtGHs8BB18G9bBdCPWnDXktK/n5eg++jmiNmdmiK71+/O7uO\\r\\n2bgI4hCkB2IVt9Trj2VdhdZ/ombdNI0ikZFOO33O\\r\\n-----END CERTIFICATE REQUEST-----\", \"url\": \"merchant.bspb.ru\", \"merchant_id\": \"2345435\"}','2019-04-14 21:38:05','2019-04-14 21:38:05');
/*!40000 ALTER TABLE `payments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_contacts`
--

DROP TABLE IF EXISTS `personal_contacts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal_contacts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `personal_id` int(11) NOT NULL,
  `contact_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_contacts`
--

LOCK TABLES `personal_contacts` WRITE;
/*!40000 ALTER TABLE `personal_contacts` DISABLE KEYS */;
INSERT INTO `personal_contacts` VALUES (1,1,1,NULL,NULL),(2,2,3,NULL,NULL),(3,3,1,NULL,NULL);
/*!40000 ALTER TABLE `personal_contacts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personals`
--

DROP TABLE IF EXISTS `personals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personals` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `annotation` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `enabled` tinyint(1) DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personals`
--

LOCK TABLES `personals` WRITE;
/*!40000 ALTER TABLE `personals` DISABLE KEYS */;
INSERT INTO `personals` VALUES (1,'БОЛДЫРЕВА ЮЛИЯ СЕРГЕЕВНА','<p>Врач-аллерголог-иммунолог., к.м.н., высшая квалификационная категория.</p>\r\n\r\n<p>Образование:&nbsp;<br />\r\n1988-1994 гг. - Санкт-Петербургская педиатрическая медицинская академия, диплом специалиста &quot;Педиатрия&quot;;&nbsp;<br />\r\n1994-1995 гг. - Санкт-Петербургская педиатрическая медицинская академия, интернатура по специальности &quot;Педиатрия&quot;.</p>\r\n\r\n<p>Опыт работы:&nbsp;<br />\r\n1995-1996 гг. - НИЦ клинической радиологии Всероссийского центра экстренной и радиационной медицины МЧС России им. А.М. Никифорова, младший научный сотрудник;&nbsp;<br />\r\n1996-настоящее время - Военно-медицинская академия им. С.М. Кирова, заведующая аллергологическим кабинетом клиники военно-полевой терапии.&nbsp;</p>\r\n\r\n<p>Дополнительные сведения:<br />\r\n1995 г. &ndash; первичная специализация по специальности &laquo;Аллергология и иммунология&raquo;, далее повышение квалификации каждые 5 лет, последнее &ndash; в 2014 г.,&nbsp;<br />\r\n2007 г. - присвоена высшая квалификационная категория по специальности &quot;Аллергология&quot;.</p>\r\n\r\n<p>Член российской Ассоциации аллергологов и клинических иммунологов.&nbsp;</p>\r\n\r\n<p>Имеет более 70 научных работ в области аллергологии и иммунологии.</p>',1,'2019-04-14 07:57:11','2019-04-14 08:30:35','<p>Врач-аллерголог-иммунолог, к.м.н., высшая квалификационная категория.<br />\r\nОбразование: 1988-1995 гг. - Санкт-Петербургская педиатрическая медицинская академия.</p>','images/uploads/e9ac7f9784896fc2334dd07ea06490c8.jpg',1,'boldyreva-yuliya-sergeevna'),(2,'НИКАНДРОВА СВЕТЛАНА ЕВГЕНЬЕВНА','<p>Врач акушер-гинеколог.<br />\r\n<br />\r\n<strong>Образование:</strong>&nbsp;Ленинградский санитарно-гигиенический медицинский институт (1980-1986).<br />\r\n<br />\r\n<strong>Опыт работы:</strong><br />\r\n1986-1988 гг. - Интернатура в Родильном доме №4, акушер-гинеколог;&nbsp;<br />\r\n1988-1991 гг. - 39 Женская консультация Калининского района г. Ленинграда, акушер-гинеколог;&nbsp;<br />\r\n1994-2004 - СПбГУЗ Городская поликлиника №47, врач УЗД, врач-гинеколог;&nbsp;<br />\r\n2004-2011 гг. - Александровская больница г. Санкт-Петербург, врач отделения УЗД;&nbsp;<br />\r\n2005-настоящее время - Хеликс, врач акушер-гинеколог;<br />\r\n2005-настоящее время - Клиника ДМ, врач акушер-гинеколог.</p>\r\n\r\n<p><strong>Дополнительные сведения:&nbsp;</strong><br />\r\n1991&ndash;1993 гг.- проходила подготовку в клинической ординатуре при Ленинградском санитарно-гигиеническом медицинском институте и закончила полный курс обучения по специальности &quot;Акушерство и гинекология&quot;. Прошла первичную специализацию по специальности &quot;УЗД в акушерстве и гинекологии&quot; в Ленинградском институте усовершенствования врачей им. С.М. Кирова. За период обучения в клинической ординатуре дважды находилась в длительной командировке в зоне экологической катастрофы &ndash; Чернобольской АЭС для обследования больных после воздействия повышенной радиации (патологии беременности, щитовидной железы);&nbsp;<br />\r\n1993 г. &ndash; проходила повышение квалификации, Санкт-Петербургский педиатрический медицинский институт, кафедра детской гинекологии ФУВ (акушер-гинеколог);&nbsp;<br />\r\n1994 г. &ndash; &nbsp;прошла десятимесячный курс повышения квалификации &laquo;Российскому врачу &ndash; международный диплом&raquo;, подготовительная группа (обучение на английском языке), Медицинская академия последипломного образования;&nbsp;<br />\r\n1997 г. - &nbsp;прошла двухмесячный курс повышения квалификации &laquo;Акушерство и гинекология&raquo;;&nbsp;<br />\r\n2001 г. &ndash; прошла двухмесячный курс повышения квалификации по специальности &quot;Ультразвуковая диагностика&quot; при Медицинской академии последипломного образования г. Санкт-Петербурга (сертификат с отличием № 030784 от 24.02.2002 г.);&nbsp;<br />\r\n2004 г. &ndash; присвоена первая квалификационная категория по специальности ультразвуковая диагности;&nbsp;2006 г. &ndash; курс повышения квалификации по специальности &quot;Ультразвуковая диагностика&quot; при ГОУ ВПО &laquo;СПб ГМУ им. И.П. Павлова&raquo; &nbsp;(удостоверение, рег. номер 173);&nbsp;<br />\r\n2007 г. &ndash; присвоена высшая квалификационная категория по специальности &quot;Ультразвуковая диагностика&quot;;&nbsp;<br />\r\n2010 г. &ndash; прошла курс повышения квалификации &laquo;Акушерство и гинекология&raquo;;&nbsp;<br />\r\n2010 г. &ndash; прослушала теоретический курс по теме &laquo;Медикаметозное прерывание беременности&raquo;;&nbsp;<br />\r\n2010 г. &ndash; прошла двухмесячный курс повышения квалификации по ультразвуковой диагностике;&nbsp;<br />\r\n2011 г. &ndash; повышение квалификации медицинских работников Российского университета дружбы народов, цикл &laquo;Эндокринные аспекты репродуктивного здоровья&raquo;;&nbsp;<br />\r\n2012 г. - &nbsp;лекционный курс школы практического врача &laquo;Невынашивания беременности: причины, алгоритмы диагностики и лечения&raquo;, СПбГБУЗ &laquo;Родильный дом № 1&raquo;.</p>\r\n\r\n<p>Автор статей в газете &quot;Подробно о здоровье&quot; № 14 &ndash; &laquo;РШМ: проблема решаема&raquo;, &nbsp;№ 3 &ndash; &laquo;Как сохранить женское здоровье&raquo;.</p>',1,'2019-04-14 08:20:47','2019-04-14 08:30:55','<p>Врач акушер-гинеколог, высшая квалификационная категория по специальности &quot;Ультразвуковая диагностика&quot;.<br />\r\nОбразование: 1980-1986 гг. -<br />\r\nЛенинградский санитарно-гигиенический медицинский институт.</p>',NULL,1,'nikandrova-svetlana-evgenevna'),(3,'БЕЛОНОГ ОЛЬГА ЛЬВОВНА','<p>Врач-генетик, высшая квалификационная категория.&nbsp;</p>\r\n\r\n<p>Образование:&nbsp;<br />\r\n1996 гг. - Санкт-Петербургская государственная медицинская академия, врач эпидемиолог-гигиенист.<br />\r\nОпыт работы:&nbsp;<br />\r\nСеверо-западный научный центр гигиены и общественного&nbsp;здоровья МЗ РФ, врач-профпатолог; &nbsp;<br />\r\n1998-2013 гг. - ГУЗ Восстановительный центр детской ортопедии и травматологии &laquo;Огонёк&raquo;, врач-генетик;<br />\r\n2005-2009 гг. - КДЦ на О. Дундича;&nbsp;<br />\r\n2013-настоящее время - СЗФНИМЦ МЗ РФ, врач-генетик.&nbsp;</p>\r\n\r\n<p>Специализация: Консультирует семейные пары по вопросам прегравидарной подготвки; ведёт генетический приём новорожденных; обладает навыками постановки диагноза с использованием современных диагностических методов включая кариотипирование, анализ генов предрасположенности к мультифакториальной патологии, общие клинические анализы, а так же специализированные анализы в различных клинических направлениях.</p>\r\n\r\n<p>Дополнительная информация:&nbsp;<br />\r\n2017 г. - прошла обучение по программе &laquo;Интерпретация результатов генетических&nbsp;исследований у больных с наследственными заболеваниями&raquo;.&nbsp;<br />\r\n<br />\r\nСовместно с Лабораторией пренатальной диагностики наследственных болезней им. Д. О. Отта РАМН организовала проведение поисковой работы (по генам предрасположенности к заболеваниям опорно-двигательного аппарата) с целью расширения используемых врачами-ортопедами диагностических методов и критериев, в том числе для раннего выявления тяжёлых, быстро прогрессирующих форм сколиоза.</p>\r\n\r\n<p>Принимает активное участие в работе конференций и форумов посвящённых работе врачей-генетиков.</p>\r\n\r\n<p>Автор более 30 печатных работ.</p>',1,'2019-04-14 08:21:47','2019-04-14 08:31:10','<p>Врач-генетик, высшая квалификационная категория.<br />\r\nОбразование: 1996 г. - Санкт-Петербургская государственная медицинская академия, врач эпидемиолог-гигиенист.</p>','images/uploads/2a12561c6ddcf60b9cc53217d89507fa.jpg',1,'belonog-olga-lvovna');
/*!40000 ALTER TABLE `personals` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `h1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keywords` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `annotation` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_categories`
--

DROP TABLE IF EXISTS `product_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_categories`
--

LOCK TABLES `product_categories` WRITE;
/*!40000 ALTER TABLE `product_categories` DISABLE KEYS */;
INSERT INTO `product_categories` VALUES (5,1,19,NULL,NULL);
/*!40000 ALTER TABLE `product_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_services`
--

DROP TABLE IF EXISTS `product_services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_services` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_services`
--

LOCK TABLES `product_services` WRITE;
/*!40000 ALTER TABLE `product_services` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_services` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(1024) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `h1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keywords` varchar(1024) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timelength` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(1024) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `annotation` varchar(4096) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `enabled` tinyint(1) NOT NULL,
  `price` int(10) DEFAULT NULL,
  `old_price` int(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_id` int(10) DEFAULT NULL,
  `items` longtext COLLATE utf8mb4_unicode_ci,
  `tabs` longtext COLLATE utf8mb4_unicode_ci,
  `services` longtext COLLATE utf8mb4_unicode_ci,
  `addservice` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'gistosovmestimost-predraspolozhennost-k-celiakii','Гистосовместимость, предрасположенность к целиакии','Гистосовместимость, предрасположенность к целиакии','Гистосовместимость, предрасположенность к целиакии','1-З1','от 21 до 28','Гистосовместимость, предрасположенность к целиакии','<p>Исследуемые гены 12</p>',1,3500,4500,'2019-04-13 09:05:05','2019-04-14 18:28:54','Гистосовместимость, предрасположенность к целиакии',1,'{\"srok\":\"1\",\"material\":\"2\",\"method\":\"3\",\"genes\":\"4\",\"target\":\"5\",\"a\":\"rtyert\"}','{\"example\":\"<p>222<\\/p>\",\"prepare\":\"<p>121111111<\\/p>\"}','{\"1\":\"300 \\u0440\\u0443\\u0431.\",\"2\":\"\\u0432\\u0445\\u043e\\u0434\\u0438\\u0442 \\u0432 \\u0441\\u0442\\u043e\\u0438\\u043c\\u043e\\u0441\\u0442\\u044c\",\"_1\":\"300 \\u0440\\u0443\\u0431.\",\"_2\":\"\\u0432\\u0445\\u043e\\u0434\\u0438\\u0442 \\u0432 \\u0441\\u0442\\u043e\\u0438\\u043c\\u043e\\u0441\\u0442\\u044c\",\"a\":\"rtyert\",\"a1\":\"ertwer\",\"a2\":null}','{\"1\":\"1\",\"2\":\"2\"}');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `receptions`
--

DROP TABLE IF EXISTS `receptions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `receptions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(1024) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reception_time` varchar(1024) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(1024) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `personal_id` int(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `approwed` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `receptions`
--

LOCK TABLES `receptions` WRITE;
/*!40000 ALTER TABLE `receptions` DISABLE KEYS */;
INSERT INTO `receptions` VALUES (1,'admin','9219500988','wefwe','wefwe',3,'2019-04-14 10:03:57','2019-04-14 10:03:57',NULL),(2,'MAXIM BORONIN','9219500988','wd',NULL,1,'2019-04-14 10:05:38','2019-04-14 10:05:38',NULL),(3,NULL,'9219500988',NULL,NULL,0,'2019-04-14 10:06:29','2019-04-14 10:06:29',NULL);
/*!40000 ALTER TABLE `receptions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'admin','admin',NULL,NULL);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `services` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `services`
--

LOCK TABLES `services` WRITE;
/*!40000 ALTER TABLE `services` DISABLE KEYS */;
INSERT INTO `services` VALUES (1,'Забор материала','2019-04-14 12:47:13','2019-04-14 12:47:13'),(2,'подробная письменная интерпретация','2019-04-14 12:48:27','2019-04-14 12:48:27');
/*!40000 ALTER TABLE `services` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `settings_key_index` (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `slider_items`
--

DROP TABLE IF EXISTS `slider_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `slider_items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slider_id` int(11) NOT NULL,
  `text` varchar(4096) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `enabled` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `slider_items`
--

LOCK TABLES `slider_items` WRITE;
/*!40000 ALTER TABLE `slider_items` DISABLE KEYS */;
INSERT INTO `slider_items` VALUES (1,'images/uploads/75ba99f630a2aff56cdaeac96676c679.jpg','/products/gistosovmestimost','PRENETIX','Подробнее',1,'<p>Неинвазивная диагностика синдромов Дауна, Эдвардса, Патау, Тернера по венозной крови беременной</p>',1,'2019-04-14 11:24:52','2019-04-14 11:25:42'),(2,'images/uploads/401cb702959a58994f179937a6db2ed8.jpg','/products/gistosovmestimost','Секвенирование генов клинического экзома','Подробнее',1,'<p>4800 генов за&nbsp;<big><strong>29900 р</strong></big></p>',1,'2019-04-14 11:27:20','2019-04-14 11:27:20'),(3,'images/uploads/34b99ba939a8b488afbf7e0a2c82c437.jpg','/products/gistosovmestimost','Комплексная диагностика при планировании и ведении беременности','Подробнее',1,'<p>Диагностика причин осложнений беременности, кариотипирование, моногенные заболевания, вирусы</p>',1,'2019-04-14 11:28:20','2019-04-14 11:28:20'),(4,'images/uploads/fb612abf5692cee51362ae7a53231fbf.jpg','/products/gistosovmestimost','Консультация врача генетика для всей семьи','Подробнее',1,'<p>Диагностика наследственных заболеваний у детей и взрослых</p>',1,'2019-04-14 11:29:03','2019-04-14 11:29:03');
/*!40000 ALTER TABLE `slider_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sliders`
--

DROP TABLE IF EXISTS `sliders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sliders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `height` int(11) NOT NULL,
  `width` int(11) NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sliders`
--

LOCK TABLES `sliders` WRITE;
/*!40000 ALTER TABLE `sliders` DISABLE KEYS */;
INSERT INTO `sliders` VALUES (1,'На главной','main',450,1024,1,'2019-04-14 11:00:49','2019-04-14 11:00:49');
/*!40000 ALTER TABLE `sliders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `themes`
--

DROP TABLE IF EXISTS `themes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `themes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `h1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `keywords` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `template` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `left_col_count` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `themes`
--

LOCK TABLES `themes` WRITE;
/*!40000 ALTER TABLE `themes` DISABLE KEYS */;
/*!40000 ALTER TABLE `themes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `type_items`
--

DROP TABLE IF EXISTS `type_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `type_items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type_items`
--

LOCK TABLES `type_items` WRITE;
/*!40000 ALTER TABLE `type_items` DISABLE KEYS */;
INSERT INTO `type_items` VALUES (1,'srok','Срок выполнения',1,'2019-04-14 17:31:52','2019-04-14 17:32:33',1),(2,'material','Исследуемый материал',1,'2019-04-14 17:32:13','2019-04-14 17:32:13',1),(3,'method','Метод исследования',1,'2019-04-14 17:32:56','2019-04-14 17:32:56',1),(4,'genes','Исследуемые гены',1,'2019-04-14 17:33:18','2019-04-14 17:33:18',1),(5,'target','Цель исследования и показания',1,'2019-04-14 17:33:41','2019-04-14 17:33:41',1),(6,'doctors','Исследование проводится врачами',1,'2019-04-14 17:35:19','2019-04-14 17:35:19',2);
/*!40000 ALTER TABLE `type_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `type_tabs`
--

DROP TABLE IF EXISTS `type_tabs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `type_tabs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type_tabs`
--

LOCK TABLES `type_tabs` WRITE;
/*!40000 ALTER TABLE `type_tabs` DISABLE KEYS */;
INSERT INTO `type_tabs` VALUES (1,'prepare','Подготовка к анализу',1,'2019-04-14 17:28:45','2019-04-14 17:28:45',NULL),(2,'prepare','Подготовка к анализу',1,'2019-04-14 17:30:36','2019-04-14 17:30:36',1),(3,'example','Пример интерпретации',1,'2019-04-14 17:31:12','2019-04-14 17:31:12',1);
/*!40000 ALTER TABLE `type_tabs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `types`
--

DROP TABLE IF EXISTS `types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `desc_tab_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `types`
--

LOCK TABLES `types` WRITE;
/*!40000 ALTER TABLE `types` DISABLE KEYS */;
INSERT INTO `types` VALUES (1,'Тест','2019-04-14 12:51:22','2019-04-14 17:29:01','О тесте'),(2,'Услуга','2019-04-14 12:51:36','2019-04-14 12:51:36',NULL);
/*!40000 ALTER TABLE `types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_roles`
--

DROP TABLE IF EXISTS `user_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_roles`
--

LOCK TABLES `user_roles` WRITE;
/*!40000 ALTER TABLE `user_roles` DISABLE KEYS */;
INSERT INTO `user_roles` VALUES (1,1,1,NULL,NULL);
/*!40000 ALTER TABLE `user_roles` ENABLE KEYS */;
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
  `email` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'MAXIM BORONIN','net0@mail.ru',NULL,'$2y$10$Q0yvFTSwMDaYFgBF0lN33ePg/CKEccvz1/Vw6Dm6QN.CBTTNYT5JO',NULL,'2019-04-12 19:43:24','2019-04-14 05:44:26',1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `verify_users`
--

DROP TABLE IF EXISTS `verify_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `verify_users` (
  `user_id` int(11) NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `verify_users`
--

LOCK TABLES `verify_users` WRITE;
/*!40000 ALTER TABLE `verify_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `verify_users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-04-14 22:29:09
