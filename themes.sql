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
  `keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `template` mediumtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `left_col_count` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `themes`
--

LOCK TABLES `themes` WRITE;
/*!40000 ALTER TABLE `themes` DISABLE KEYS */;
INSERT INTO `themes` VALUES (1,'Сербалаб','Услуги генетической лаборатории CERBALAB','Услуги генетической лаборатории <strong>CERBALAB</strong>','Услуги генетической лаборатории CERBALAB','Услуги генетической лаборатории CERBALAB','images/uploads/82dec06cbc74d89c68696337f43e55d7.png','images/uploads/96d95e9f9592cb6f538b9264daf61497.png','+7 (812) 602-93-38','Большой проспект В.О., дом 90, корпус 2','info@cerbalab.ru',1,'<!DOCTYPE html>\r\n<html lang=\"ru\">\r\n  <head>\r\n    <meta charset=\"utf-8\">\r\n    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">\r\n    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">\r\n    <meta name=\"description\" content=\"{{$theme->description}}\">\r\n    <meta name=\"author\" content=\"\">\r\n    <link rel=\"shortcut icon\" href=\"{{$theme->icon}}\">\r\n\r\n    <title>{{$theme->title}}</title>\r\n\r\n    <!-- Bootstrap core CSS -->\r\n    <link href=\"/css/bootstrap.css\" rel=\"stylesheet\">\r\n\r\n    <!-- Custom styles for this template -->\r\n    <link href=\"/css/custom.css\" rel=\"stylesheet\">\r\n\r\n    <!-- Just for debugging purposes. Don\'t actually copy this line! -->\r\n    <!--[if lt IE 9]><script src=\"../../assets/js/ie8-responsive-file-warning.js\"></script><![endif]-->\r\n\r\n    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->\r\n    <!--[if lt IE 9]>\r\n      <script src=\"https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js\"></script>\r\n      <script src=\"https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js\"></script>\r\n    <![endif]-->\r\n  </head>\r\n\r\n  <body>\r\n\r\n    <div class=\"navbar navbar-inverse navbar-fixed-top\" role=\"navigation\">\r\n      <div class=\"container\">\r\n        <div class=\"navbar-header\">\r\n          <button type=\"button\" class=\"navbar-toggle\" data-toggle=\"collapse\" data-target=\".navbar-collapse\">\r\n            <span class=\"sr-only\">Toggle navigation</span>\r\n            <span class=\"icon-bar\"></span>\r\n            <span class=\"icon-bar\"></span>\r\n            <span class=\"icon-bar\"></span>\r\n          </button>\r\n        </div>\r\n        <div class=\"navbar-collapse collapse\">\r\n        </div><!--/.navbar-collapse -->\r\n      </div>\r\n    </div>\r\n\r\n    <div class=\"container\">\r\n      <!-- Example row of columns -->\r\n      <div class=\"row\">\r\n        <div class=\"col-md-12 \">\r\n          <img src=\"images/logo.png\" class=\"logo center-block\"/>\r\n        </div>\r\n      </div>\r\n      <div class=\"row\">\r\n        <div class=\"col-md-6\">\r\n          <h2>О нас</h2>\r\n          <p>Лаборатория CERBALAB специализируется на оказании услуг по генетической диагностике.</p>\r\n          <p>Команда лаборатории - это врачи-генетики, неврологи, акушеры-гинекологии, онкологи, биоинформатики и лабораторные специалисты.</p>\r\n          <p>Мы предлагаем различные генетические исследования, основанные на самых современных технологиях.</p>\r\n        </div>\r\n        <div class=\"col-md-6\">\r\n          <h2>Технологии</h2>\r\n          <p>Лаборатория располагает новейшим оборудованием для проведения высокоточных исследований.</p>\r\n          <p>Наши возможности позволяют нам проводить диагностику любыми необходимыми методами - от цитогенетических и иммуногистохимических до микроматричного анализа и секвенирования NGS.</p>\r\n       </div>\r\n      </div>\r\n    </div>\r\n    <div class=\"container container-full \">\r\n        <div class=\"content row\">\r\n            <div class=\"col-md-12 \">\r\n              <h1>{{$theme->h1}}</h1>\r\n            </div>\r\n            <div class=\"container container-full \">\r\n              <div class=\"container\">\r\n                @yield(\'content\')\r\n            </div>\r\n        </div>\r\n    </div>\r\n    <div class=\"container\">\r\n        <div class=\"col-md-5\">\r\n            <h2>Как с нами связаться?</h2>\r\n            <p>Телефон: {{$theme->phone}}</p>\r\n            <p>E-mail: {{$theme->email}}</p>\r\n            <h2>Как нас найти?</h2>\r\n            <p>Генетическая лаборатория CERBALAB находится по адресу:</p>\r\n            <strong>{{$theme->address}}</strong>\r\n        </div>\r\n        <div class=\"col-md-7\">\r\n            <a href=\"https://yandex.ru/maps/?um=constructor%3A94a0d514d63a0324deef3e4b8753c50f57b8efe7db1e620fea316a182223f778&source=constructorStatic\" target=\"_blank\"><img src=\"https://api-maps.yandex.ru/services/constructor/1.0/static/?um=constructor%3A94a0d514d63a0324deef3e4b8753c50f57b8efe7db1e620fea316a182223f778&width=550&height=350&lang=ru_RU\" alt=\"\" style=\"border: 0;\" /></a>\r\n        </div>\r\n    </div>\r\n  </body>\r\n</html>','2018-11-27 21:18:07','2018-11-27 21:57:18',7);
/*!40000 ALTER TABLE `themes` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-11-27 22:00:54
