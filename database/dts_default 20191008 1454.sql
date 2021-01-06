-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.7.26


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema dts
--

CREATE DATABASE IF NOT EXISTS dts;
USE dts;

--
-- Definition of table `calendar`
--

DROP TABLE IF EXISTS `calendar`;
CREATE TABLE `calendar` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `start` text COLLATE utf8_unicode_ci NOT NULL,
  `backgroundColor` text COLLATE utf8_unicode_ci NOT NULL,
  `borderColor` text COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `calendar`
--

/*!40000 ALTER TABLE `calendar` DISABLE KEYS */;
INSERT INTO `calendar` (`id`,`title`,`start`,`backgroundColor`,`borderColor`,`remember_token`,`created_at`,`updated_at`) VALUES 
 (1,'Weekend','2017-01-14','rgb(221, 75, 57)','rgb(221, 75, 57)',NULL,'2017-01-11 13:10:51','2017-01-11 13:10:51'),
 (2,'HSDS: TRAINING OF COACHES (TOC) Module 2','02/13/2018','be2faf','c96b89',NULL,'2018-01-11 14:02:40','2018-01-11 14:02:40');
/*!40000 ALTER TABLE `calendar` ENABLE KEYS */;


--
-- Definition of table `designation`
--

DROP TABLE IF EXISTS `designation`;
CREATE TABLE `designation` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=209 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `designation`
--

/*!40000 ALTER TABLE `designation` DISABLE KEYS */;
INSERT INTO `designation` (`id`,`description`,`remember_token`,`created_at`,`updated_at`) VALUES 
 (1,'Accountant III',NULL,NULL,NULL),
 (4,'Administrative Aide I',NULL,NULL,NULL),
 (5,'Administrative Aide III',NULL,NULL,NULL),
 (6,'Administrative Aide IV',NULL,NULL,NULL),
 (7,'Administrative Aide VI',NULL,NULL,NULL),
 (8,'Administrative Assistant II',NULL,NULL,NULL),
 (9,'Administrative Assistant III',NULL,NULL,NULL),
 (10,'Administrative Officer IV',NULL,NULL,NULL),
 (11,'Administrative Officer V',NULL,NULL,NULL),
 (13,'BnB Pharmacist',NULL,NULL,NULL),
 (15,'Bookkeeper',NULL,NULL,NULL),
 (16,'Carpenter',NULL,NULL,NULL),
 (17,'Chief, Management Support Division',NULL,NULL,'2017-02-02 11:47:56'),
 (18,'Clerical Aide',NULL,NULL,NULL),
 (20,'Computer Operator II',NULL,NULL,NULL),
 (21,'Computer Operator III',NULL,NULL,NULL),
 (22,'Director IV',NULL,NULL,NULL),
 (23,'Development Management Officer V',NULL,NULL,NULL),
 (24,'Driver I',NULL,NULL,NULL),
 (25,'Driver II',NULL,NULL,NULL),
 (26,'Engineer I',NULL,NULL,NULL),
 (27,'Engineer III',NULL,NULL,NULL),
 (28,'Engineer II',NULL,NULL,NULL),
 (29,'Food-Drug Regulation Officer IV',NULL,NULL,NULL),
 (30,'Food-Drug Regulation Officer I',NULL,NULL,NULL),
 (31,'Food-Drug Regulation Officer II',NULL,NULL,NULL),
 (32,'Food-Drug Regulation Officer III',NULL,NULL,NULL),
 (34,'Field Attendant Worker',NULL,NULL,NULL),
 (38,'Heavy Equipment Operator',NULL,NULL,NULL),
 (39,'HEPO II',NULL,NULL,NULL),
 (41,'Instrumentman',NULL,NULL,NULL),
 (42,'Laboratory Aide I',NULL,NULL,NULL),
 (43,'Laboratory Aide II',NULL,NULL,NULL),
 (44,'Librarian I',NULL,NULL,NULL),
 (45,'Licensing Officer II',NULL,NULL,NULL),
 (46,'Licensing Officer III',NULL,NULL,NULL),
 (47,'Malacologist II',NULL,NULL,NULL),
 (48,'Municipality Malaria Coordinator',NULL,NULL,NULL),
 (50,'SNBC - Medical Technologist',NULL,NULL,NULL),
 (52,'Medical Laboratory Technician II',NULL,NULL,NULL),
 (53,'Medical Equipment Technician I',NULL,NULL,NULL),
 (54,'Medical Equipment Technician II',NULL,NULL,NULL),
 (55,'Medical Equipment Technician III',NULL,NULL,NULL),
 (57,'Medical Laboratory Technician I',NULL,NULL,NULL),
 (58,'Medical Officer V',NULL,NULL,NULL),
 (59,'Medical Specialist II',NULL,NULL,NULL),
 (60,'Medical Specialist III',NULL,NULL,NULL),
 (61,'Medical Specialist IV',NULL,NULL,NULL),
 (62,'Medical Technologist I',NULL,NULL,NULL),
 (63,'Medical Technologist II',NULL,NULL,NULL),
 (64,'Medical Technologist III',NULL,NULL,NULL),
 (67,'Nurse I',NULL,NULL,NULL),
 (68,'Nurse II',NULL,NULL,NULL),
 (70,'Nurse III',NULL,NULL,NULL),
 (71,'Nurse IV',NULL,NULL,NULL),
 (72,'Nurse V',NULL,NULL,NULL),
 (73,'Nutritionist-Dietitian IV',NULL,NULL,NULL),
 (74,'Entomologist III',NULL,NULL,NULL),
 (77,'Pharmacist I',NULL,NULL,NULL),
 (78,'Pharmacist IV',NULL,NULL,NULL),
 (79,'Planning Officer III',NULL,NULL,NULL),
 (80,'Plumber',NULL,NULL,NULL),
 (82,'Regional Health Physicist Designate',NULL,NULL,NULL),
 (83,'Dentist IV',NULL,NULL,NULL),
 (85,'Rural Health Physician',NULL,NULL,NULL),
 (86,'Rural Malaria Coordinator',NULL,NULL,NULL),
 (88,'Statistician I',NULL,NULL,NULL),
 (89,'Statistician II',NULL,NULL,NULL),
 (90,'Statistician III',NULL,NULL,NULL),
 (91,'Surveillance Officer',NULL,NULL,NULL),
 (92,'Utility Worker I',NULL,NULL,NULL),
 (93,'Division Chief',NULL,NULL,NULL),
 (94,'Regional Director',NULL,NULL,NULL),
 (95,'Assistant Regional Director',NULL,NULL,NULL),
 (98,'Section Head',NULL,NULL,NULL),
 (99,'Civil Engineer',NULL,NULL,NULL),
 (100,'Director III',NULL,NULL,NULL),
 (101,'Attorney III',NULL,NULL,NULL),
 (102,'',NULL,NULL,NULL),
 (103,'Legal Assistant II',NULL,NULL,NULL),
 (104,'Supervising Administrative Officer',NULL,NULL,NULL),
 (105,'Administrative Officer III',NULL,NULL,NULL),
 (106,'Administrative Officer I',NULL,NULL,NULL),
 (107,'Administrative Assistant V',NULL,NULL,NULL),
 (108,'Administrative Assistant I',NULL,NULL,NULL),
 (109,'Dormitory Manager I',NULL,NULL,NULL),
 (110,'Dormitory Attendant',NULL,NULL,NULL),
 (111,'Computer Maintenance Technologist III',NULL,NULL,NULL),
 (112,'Accountant II',NULL,NULL,NULL),
 (113,'Planning Officer II',NULL,NULL,NULL),
 (115,'Accounting Clerk IV',NULL,NULL,NULL),
 (116,'Accounting Clerk I',NULL,NULL,NULL),
 (119,'Carpernter',NULL,NULL,NULL),
 (120,'Posting Clerk',NULL,NULL,NULL),
 (121,'Aircon Technician',NULL,NULL,NULL),
 (122,'Chief, Local Health Support Division',NULL,NULL,'2017-02-02 11:48:10'),
 (123,'Medical Officer IV',NULL,NULL,NULL),
 (124,'Medical Officer III',NULL,NULL,NULL),
 (126,'Development Management Officer IV',NULL,NULL,NULL),
 (127,'Development Management Officer III',NULL,NULL,NULL),
 (129,'Senior Health Program Officer',NULL,NULL,NULL),
 (130,'Architect II',NULL,NULL,NULL),
 (132,'HEPO III',NULL,NULL,NULL),
 (133,'Midwife VI',NULL,NULL,NULL),
 (134,'Project Assistant III',NULL,NULL,NULL),
 (135,'Project Assistant II',NULL,NULL,NULL),
 (136,'Medical Technologist IV',NULL,NULL,NULL),
 (137,'Dentist III',NULL,NULL,NULL),
 (138,'NCPAM Pharmacist',NULL,NULL,NULL),
 (140,'Health Program Researcher',NULL,NULL,NULL),
 (141,'Disease Surveillance Assistant',NULL,NULL,NULL),
 (142,'SSA Regional Technical Assistant',NULL,NULL,NULL),
 (143,'SNBC Nurse',NULL,NULL,NULL),
 (144,'SIC HIV/AIDS',NULL,NULL,NULL),
 (145,'Regional Field Officer',NULL,NULL,NULL),
 (146,'Health Aiders',NULL,NULL,NULL),
 (147,'HIV/ AIDS Nurse',NULL,NULL,NULL),
 (148,'EDPMS Helpdesk',NULL,NULL,NULL),
 (149,'Training Specialist III',NULL,NULL,NULL),
 (150,'Training Specialist II',NULL,NULL,NULL),
 (151,'Encoder II',NULL,NULL,'2018-08-22 09:34:06'),
 (153,'Licensing Division Chief',NULL,NULL,NULL),
 (154,'Licensing Officer V',NULL,NULL,NULL),
 (155,'GFTB-NFM -Team Leader',NULL,NULL,NULL),
 (156,'GFTB-NFM -Medical Technologist',NULL,NULL,NULL),
 (157,'GFTB-NFM -GeneXpert Staff',NULL,NULL,NULL),
 (158,'GFTB-NFM -Laboratory Aide',NULL,NULL,NULL),
 (159,'Computer Maintenance Technologist II',NULL,NULL,NULL),
 (160,'Project Associate',NULL,NULL,NULL),
 (161,'Dentist Deployment Project',NULL,NULL,NULL),
 (162,'Public Health Assistant',NULL,NULL,NULL),
 (163,'Public Health Associate',NULL,NULL,NULL),
 (165,'Clerical Aid - Excellent',NULL,NULL,NULL),
 (166,'Chief, Regulation & Licensing Enforcement Division',NULL,'2017-02-02 11:58:44','2018-09-05 16:57:19'),
 (167,'OIC - Assistant Regional Director',NULL,'2017-02-02 13:30:14','2017-02-02 13:30:14'),
 (168,'Head, Health Facility Development Section',NULL,'2017-03-13 14:18:09','2017-03-13 14:18:09'),
 (169,'SA II/OIC - ATL',NULL,'2017-05-16 14:51:15','2017-05-16 14:51:15'),
 (170,'Computer Programmer I',NULL,'2017-06-01 09:24:38','2017-06-01 09:24:38'),
 (171,'Computer Maintenance Technologist I',NULL,'2017-06-09 11:52:29','2017-06-09 11:52:29'),
 (172,'Data Encoder III',NULL,'2017-09-06 08:37:58','2017-09-06 08:37:58'),
 (173,'PHA',NULL,'2017-09-07 08:16:20','2017-09-07 08:16:20'),
 (174,'Engineer Assistant A',NULL,'2017-10-19 10:31:40','2017-10-19 10:31:40'),
 (175,'Engineering Aide',NULL,'2017-12-04 11:01:00','2017-12-04 11:01:00'),
 (176,'Data Encoder I',NULL,'2017-12-28 15:33:37','2017-12-28 15:33:37'),
 (177,'Universal Health Care Implementer',NULL,'2018-03-21 16:12:07','2018-03-21 16:12:07'),
 (178,'Engineering Aide A',NULL,'2018-04-12 10:03:31','2018-04-12 10:03:31'),
 (179,'Engineering Assistant A',NULL,'2018-04-12 10:04:07','2018-04-12 10:04:07'),
 (180,'Nurse 1',NULL,'2018-07-12 10:20:14','2018-07-12 10:20:14'),
 (181,'Architect 1',NULL,'2018-07-12 10:21:09','2018-07-12 10:21:09'),
 (185,'Pharmacy Assistant',NULL,'2018-07-12 10:42:53','2018-07-12 10:42:53'),
 (186,'Computer Programmer II',NULL,'2018-08-10 09:57:00','2018-08-10 09:57:00'),
 (187,'Graphic Artist',NULL,'2018-08-14 11:01:26','2018-08-14 11:01:26'),
 (188,'Regional Drug Price Monitoring Officer (RDPMO)',NULL,'2018-08-14 11:01:45','2018-08-14 11:01:45'),
 (189,'Management Specialist I',NULL,'2018-08-14 11:01:58','2018-08-14 11:01:58'),
 (190,'Encoder IV',NULL,'2018-08-14 11:02:08','2018-08-14 11:02:08'),
 (191,'Senior Administrative Assistant II',NULL,'2018-08-14 11:02:17','2018-08-14 11:02:17'),
 (192,'Mason II',NULL,'2018-08-14 11:02:27','2018-08-14 11:02:27'),
 (193,'Mechanic',NULL,'2018-08-14 11:02:38','2018-08-14 11:02:38'),
 (194,'Electrician',NULL,'2018-08-14 11:02:48','2018-08-14 11:02:48'),
 (195,'Painter II',NULL,'2018-08-14 11:03:05','2018-08-14 11:03:05'),
 (196,'Encoder IV',NULL,'2018-08-22 09:34:31','2018-08-22 09:34:31'),
 (197,'Accountant I',NULL,'2018-08-22 13:23:51','2018-08-22 13:23:51'),
 (198,'Architect III',NULL,'2018-08-22 13:29:31','2018-08-22 13:29:31'),
 (199,'Physical Therapist',NULL,'2018-09-04 14:31:47','2018-09-04 14:31:47'),
 (200,'Senior Draftsman',NULL,'2018-09-13 14:25:40','2018-09-13 14:25:40'),
 (201,'Welder I',NULL,'2018-09-13 14:40:52','2018-09-13 14:40:52'),
 (202,'Health Education and Promotion Officer I',NULL,'2019-01-15 14:01:48','2019-01-15 14:01:48'),
 (203,'Data Encoder',NULL,'2019-01-15 14:02:04','2019-01-15 14:02:04'),
 (204,'Artist Illustrator III',NULL,'2019-01-15 14:02:19','2019-01-15 14:02:19'),
 (205,'Accounting Clerk III',NULL,'2019-01-15 14:03:18','2019-01-15 14:03:18'),
 (206,'Accounting Machine Operator ',NULL,'2019-01-15 14:03:36','2019-01-15 14:03:36'),
 (207,'Accounting Analyst',NULL,'2019-01-15 15:01:23','2019-01-15 15:01:23'),
 (208,'Senior Accounting Processor B',NULL,'2019-01-15 15:02:14','2019-01-15 15:02:14');
/*!40000 ALTER TABLE `designation` ENABLE KEYS */;


--
-- Definition of table `division`
--

DROP TABLE IF EXISTS `division`;
CREATE TABLE `division` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `head` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `description` (`description`,`head`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `division`
--

/*!40000 ALTER TABLE `division` DISABLE KEYS */;
INSERT INTO `division` (`id`,`description`,`head`,`remember_token`,`created_at`,`updated_at`) VALUES 
 (3,'Office of the RD / ARD ',910458,NULL,NULL,'2019-01-15 13:14:31'),
 (4,'LHSD - Local Health Support Division',72,NULL,NULL,'2017-01-11 09:23:12'),
 (5,'RLED - Regulatory and Licensing Enforcement Division',612,NULL,NULL,'2018-09-05 16:50:17'),
 (6,'MSD - Management Support Division',36,NULL,NULL,'2017-01-11 09:22:24');
/*!40000 ALTER TABLE `division` ENABLE KEYS */;


--
-- Definition of table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
CREATE TABLE `feedback` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `userid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telno` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `stat_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_read` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `feedback`
--

/*!40000 ALTER TABLE `feedback` DISABLE KEYS */;
/*!40000 ALTER TABLE `feedback` ENABLE KEYS */;


--
-- Definition of table `feedback_status`
--

DROP TABLE IF EXISTS `feedback_status`;
CREATE TABLE `feedback_status` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `action` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `feedback_status`
--

/*!40000 ALTER TABLE `feedback_status` DISABLE KEYS */;
/*!40000 ALTER TABLE `feedback_status` ENABLE KEYS */;


--
-- Definition of table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`migration`,`batch`) VALUES 
 ('2014_10_12_000000_create_users_table',1),
 ('2014_10_12_100000_create_password_resets_table',1),
 ('2016_11_08_022242_create_designation_table',1),
 ('2016_11_08_022258_create_division_table',1),
 ('2016_11_08_022308_create_section_table',1),
 ('2016_11_10_082902_create_tracking_master',1),
 ('2016_11_11_154533_create_tracking_filter',1),
 ('2016_11_14_140646_create_tracking_details',1),
 ('2016_12_27_164105_create_purchase_request',1),
 ('2016_12_29_105509_just_letter_doc',1),
 ('2016_12_29_110605_just_letter_header',1),
 ('2017_01_04_163321_create_calendar',1),
 ('2017_01_10_102048_feedback',2),
 ('2017_01_11_094859_feedback_status',3),
 ('2017_01_12_160530_SystemLogs',3),
 ('2017_01_19_141614_create_sessions_table',4),
 ('2017_01_12_163500_prr_supply_logs',5),
 ('2017_01_18_082236_prr_supply',5),
 ('2017_01_19_111148_prr_meal',5),
 ('2017_01_19_112555_prr_meal_logs',5),
 ('2017_01_20_165902_tracking_release',5),
 ('2017_01_23_161041_prr_meal_category',5),
 ('2017_09_25_160845_add_code_alert_column',6),
 ('2017_09_27_100635_tracking_report',6),
 ('2018_11_14_142539_create_tracking_releasev2',6);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;


--
-- Definition of table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `password_resets`
--

/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;


--
-- Definition of table `section`
--

DROP TABLE IF EXISTS `section`;
CREATE TABLE `section` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `division` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `head` int(11) NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `division` (`division`,`description`,`head`,`code`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `section`
--

/*!40000 ALTER TABLE `section` DISABLE KEYS */;
INSERT INTO `section` (`id`,`division`,`description`,`head`,`code`,`remember_token`,`created_at`,`updated_at`) VALUES 
 (1,3,'Regional Director',271,'A',NULL,NULL,NULL),
 (2,3,'Asst. Regional Director',51,'A',NULL,NULL,'2017-02-02 15:06:20'),
 (3,7,'Hospital Engineering Section',173,'E',NULL,NULL,NULL),
 (4,7,'Bio Medical Engineering Section',172,'E',NULL,NULL,NULL),
 (5,6,'Accounting Section',93052,'D',NULL,NULL,'2018-03-05 11:08:41'),
 (6,6,'Budget Section',38,'D',NULL,NULL,'2017-01-11 10:29:36'),
 (7,6,'Cashier Section',27,'D',NULL,NULL,'2017-01-11 10:31:02'),
 (9,6,'Personnel Section',17,'D',NULL,NULL,'2017-01-11 10:31:34'),
 (10,6,'General Services Section',114,'D',NULL,NULL,'2017-02-02 14:57:17'),
 (11,6,'Records Section',15,'D',NULL,NULL,'2017-01-11 10:32:53'),
 (12,6,'Supply Section',2,'D',NULL,NULL,NULL),
 (13,6,'Legal Section',227,'D',NULL,NULL,'2017-01-11 10:34:30'),
 (14,6,'Transport Section',114,'D',NULL,NULL,'2017-02-02 15:05:18'),
 (15,5,'Hospital Licensing Section',74,'C',NULL,NULL,NULL),
 (16,5,'FDA Section',94,'C',NULL,NULL,NULL),
 (17,4,'Health Promotion In The Work Places & School Section',69,'B3',NULL,NULL,NULL),
 (18,4,'Health Promotion In The Community Section',66,'B2',NULL,NULL,NULL),
 (21,4,'Health System Development Section',236,'B9',NULL,NULL,'2017-01-11 10:26:26'),
 (23,4,'Health Policy Planning, Research & Health Info',75,'B5',NULL,NULL,NULL),
 (24,4,'Provincial Health Team for Cebu Province',113,'B7',NULL,NULL,NULL),
 (25,4,'Provincial Health Team for Bohol Province',6,'B8',NULL,NULL,NULL),
 (26,4,'Provincial Health Team for Negros-Siquijor Province',114,'B10',NULL,NULL,NULL),
 (27,4,'Family Health Section',215,'2',NULL,NULL,'2017-01-11 09:47:47'),
 (28,4,'Non-Communicable Disease Section',234,'B6',NULL,NULL,'2017-02-02 14:48:58'),
 (29,4,'Communicable Disease Section',238,'B1',NULL,NULL,'2017-02-02 14:42:29'),
 (30,4,'Health Research and Development, Information and Promotion Section',415,'b',NULL,NULL,'2017-02-02 14:46:53'),
 (31,4,'Health Human Resource Development Unit',91,'2',NULL,NULL,'2017-02-02 14:50:03'),
 (32,4,'Health Facility Development Section',235,'2',NULL,NULL,'2017-01-11 09:53:51'),
 (36,3,'RD/ARD',155,'a',NULL,NULL,'2017-02-02 15:07:47'),
 (37,3,'HMS',15,'a',NULL,NULL,'2017-02-02 15:07:22'),
 (38,6,'Planning',243,'B',NULL,NULL,'2017-01-10 08:21:03'),
 (39,6,'MSD Chief',36,'a',NULL,NULL,'2017-02-02 14:58:55'),
 (40,4,'LHSD Chief',0,'',NULL,NULL,NULL),
 (41,4,'HEMS',71,'.',NULL,NULL,'2018-07-31 13:21:12'),
 (42,6,'Information and Communication Technology Unit',12,'a',NULL,NULL,'2017-11-15 11:13:44'),
 (43,6,'Library',15,'a',NULL,NULL,'2017-02-02 14:58:07'),
 (45,6,'Procurement Unit',16,'D',NULL,'2017-01-10 14:42:48','2017-01-10 15:15:17'),
 (46,8,'No Section',0,'0',NULL,NULL,NULL),
 (47,5,'Health Facilities Licensing Section',621,'2',NULL,'2017-01-11 10:28:21','2019-03-06 09:39:22'),
 (48,4,'PDOHO-Cebu North',46,'2',NULL,'2017-01-11 11:15:32','2017-01-11 11:15:32'),
 (49,4,'PDOHO-CEBU South',110,'2',NULL,'2017-01-11 11:16:54','2017-01-11 11:16:54'),
 (50,4,'PDOHO-BOHOL',5,'2',NULL,'2017-01-11 11:17:16','2017-01-11 11:17:16'),
 (51,4,'Reference Laboratory',72,'Reference Lab',NULL,'2017-01-25 12:03:44','2017-01-25 12:03:44'),
 (52,4,'Regional Epidemiology and Surveillance Unit',154,'RESU',NULL,'2017-01-31 11:01:07','2018-07-31 13:20:53'),
 (53,4,'Health Emergency Management Section(HEMS)',416,'a',NULL,'2017-02-01 08:28:56','2018-09-12 11:20:40'),
 (55,6,'Dormitory',20,'Dormitory',NULL,'2017-02-07 11:03:07','2017-02-07 11:03:07'),
 (56,6,'Commission on Audit',439,'COA-001',NULL,'2017-05-16 14:55:26','2017-05-16 14:55:26'),
 (57,6,'Commission on Audit',439,'COA-001',NULL,'2017-05-16 14:55:26','2017-05-16 14:55:26'),
 (58,4,'Health Sector Performance Monitoring Unit',48,'HSPMU',NULL,'2017-06-07 08:37:26','2017-06-07 08:37:26'),
 (59,5,'Health Facility and Enhancement Section - Equipment',168,'hfep001',NULL,'2017-09-07 08:22:51','2018-03-05 11:13:12'),
 (60,5,'Health Facilities Enhancement Section - Infrastructure',6,'001',NULL,'2018-03-05 11:08:06','2018-03-05 11:08:06'),
 (61,5,'Health Facility Enhancement Section',6,'003',NULL,'2018-03-13 13:54:36','2018-03-13 13:54:36'),
 (62,4,'National Nutrition Office VII',286195,'NNO',NULL,'2018-03-21 16:14:18','2018-03-21 16:14:18'),
 (64,4,'Medicine Access Service Unit',235,'MASU',NULL,'2018-08-22 13:28:49','2018-08-22 13:28:49'),
 (65,6,'Cold Chain',36,'CH001',NULL,'2019-01-17 13:08:21','2019-01-17 13:08:21');
/*!40000 ALTER TABLE `section` ENABLE KEYS */;


--
-- Definition of table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8_unicode_ci,
  `payload` text COLLATE utf8_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  UNIQUE KEY `sessions_id_unique` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sessions`
--

/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` (`id`,`user_id`,`ip_address`,`user_agent`,`payload`,`last_activity`) VALUES 
 ('bc78a753d09ad6c425c22157c4de4e71ce5b458b',NULL,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36','YTo0OntzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozNzoiaHR0cDovL2xvY2FsaG9zdC9kb2gvZHRzL3B1YmxpYy9sb2dpbiI7fXM6NToiZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo2OiJfdG9rZW4iO3M6NDA6ImUwb3BKbGNOTkZnRm5mY3U0Vll4ZjBwVWdOYnlTNVFsQjlnQ3hFcGkiO3M6OToiX3NmMl9tZXRhIjthOjM6e3M6MToidSI7aToxNTcwNTE2MDU1O3M6MToiYyI7aToxNTcwNTE0NjI4O3M6MToibCI7czoxOiIwIjt9fQ==',1570516055);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;


--
-- Definition of table `systemlogs`
--

DROP TABLE IF EXISTS `systemlogs`;
CREATE TABLE `systemlogs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `activity` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `systemlogs`
--

/*!40000 ALTER TABLE `systemlogs` DISABLE KEYS */;
INSERT INTO `systemlogs` (`id`,`user_id`,`name`,`activity`,`description`,`created_at`,`updated_at`) VALUES 
 (1,344,'Jimmy Lomocso','Logged In','','2019-09-27 18:03:55','2019-09-27 18:03:55'),
 (2,344,'Jimmy Lomocso','Created','2019-3440927180554','2019-09-27 18:05:55','2019-09-27 18:05:55'),
 (3,344,'Jimmy Lomocso','Logged Out','','2019-09-27 18:08:36','2019-09-27 18:08:36'),
 (4,344,'Jimmy Lomocso','Logged In','','2019-09-27 18:09:53','2019-09-27 18:09:53'),
 (5,344,'Jimmy Lomocso','Cancel Released','2019-3440927180554','2019-09-27 18:41:58','2019-09-27 18:41:58'),
 (6,344,'Jimmy Lomocso','Accepted','2019-3440927180554','2019-09-27 18:45:38','2019-09-27 18:45:38'),
 (7,344,'Jimmy Lomocso','Logged In','','2019-09-27 22:27:57','2019-09-27 22:27:57'),
 (8,344,'Jimmy Lomocso','Logged In','','2019-09-28 13:16:29','2019-09-28 13:16:29'),
 (9,344,'Jimmy Lomocso','Updated','2019-3440927180554','2019-09-28 13:18:36','2019-09-28 13:18:36'),
 (10,344,'Jimmy Lomocso','Logged In','','2019-09-28 15:18:50','2019-09-28 15:18:50'),
 (11,344,'Jimmy Lomocso','Logged In','','2019-09-28 18:44:38','2019-09-28 18:44:38'),
 (12,344,'Jimmy Lomocso','Logged In','','2019-09-29 14:46:37','2019-09-29 14:46:37'),
 (13,344,'Jimmy Lomocso','Logged In','','2019-10-01 08:28:54','2019-10-01 08:28:54'),
 (14,344,'Jimmy Lomocso','Logged In','','2019-10-08 14:10:23','2019-10-08 14:10:23'),
 (15,344,'Jimmy Lomocso','Logged Out','','2019-10-08 14:27:35','2019-10-08 14:27:35');
/*!40000 ALTER TABLE `systemlogs` ENABLE KEYS */;


--
-- Definition of table `tracking_details`
--

DROP TABLE IF EXISTS `tracking_details`;
CREATE TABLE `tracking_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `route_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alert` int(11) NOT NULL,
  `date_in` datetime NOT NULL,
  `received_by` int(11) NOT NULL,
  `delivered_by` int(11) NOT NULL,
  `action` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `route_no` (`route_no`,`date_in`,`received_by`,`delivered_by`,`status`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tracking_details`
--

/*!40000 ALTER TABLE `tracking_details` DISABLE KEYS */;
INSERT INTO `tracking_details` (`id`,`route_no`,`code`,`alert`,`date_in`,`received_by`,`delivered_by`,`action`,`status`,`remember_token`,`created_at`,`updated_at`) VALUES 
 (1,'2019-3440927180554','',0,'2019-09-27 18:05:54',344,344,'A sample document',1,NULL,'2019-09-27 18:05:55','2019-09-27 18:45:38'),
 (3,'2019-3440927180554','temp;60',0,'2019-09-27 18:42:16',0,344,'',1,NULL,'2019-09-27 18:42:16','2019-09-27 18:42:37'),
 (4,'2019-3440927180554','accept;42',0,'2019-09-27 18:42:37',344,0,'',1,NULL,'2019-09-27 18:42:37','2019-09-27 18:45:38'),
 (5,'2019-3440927180554','accept;42',0,'2019-09-27 18:43:10',344,344,'',1,NULL,'2019-09-27 18:43:10','2019-09-27 18:45:38'),
 (6,'2019-3440927180554','',0,'2019-09-27 18:45:38',344,344,'',0,NULL,'2019-09-27 18:45:38','2019-09-27 18:52:34'),
 (7,'2019-3440927180554','accept;42',0,'2019-09-27 18:52:52',344,344,'accepted nah',1,NULL,'2019-09-27 18:52:34','2019-10-01 08:53:16');
/*!40000 ALTER TABLE `tracking_details` ENABLE KEYS */;


--
-- Definition of table `tracking_filter`
--

DROP TABLE IF EXISTS `tracking_filter`;
CREATE TABLE `tracking_filter` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `doc_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `pr_no` int(11) NOT NULL,
  `po_no` int(11) NOT NULL,
  `purpose` int(11) NOT NULL,
  `source_fund` int(11) NOT NULL,
  `requested_by` int(11) NOT NULL,
  `route_to` int(11) NOT NULL,
  `route_from` int(11) NOT NULL,
  `supplier` int(11) NOT NULL,
  `event_date` int(11) NOT NULL,
  `event_location` int(11) NOT NULL,
  `event_participant` int(11) NOT NULL,
  `cdo_applicant` int(11) NOT NULL,
  `cdo_day` int(11) NOT NULL,
  `event_daterange` int(11) NOT NULL,
  `payee` int(11) NOT NULL,
  `item` int(11) NOT NULL,
  `dv_no` int(11) NOT NULL,
  `ors_no` int(11) NOT NULL,
  `fund_source_budget` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tracking_filter`
--

/*!40000 ALTER TABLE `tracking_filter` DISABLE KEYS */;
INSERT INTO `tracking_filter` (`id`,`doc_type`,`description`,`amount`,`pr_no`,`po_no`,`purpose`,`source_fund`,`requested_by`,`route_to`,`route_from`,`supplier`,`event_date`,`event_location`,`event_participant`,`cdo_applicant`,`cdo_day`,`event_daterange`,`payee`,`item`,`dv_no`,`ors_no`,`fund_source_budget`,`remember_token`,`created_at`,`updated_at`) VALUES 
 (1,'SAL',1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,1,0,0,1,1,1,NULL,NULL,NULL),
 (2,'TEV',1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,1,0,0,1,1,1,NULL,NULL,NULL),
 (3,'BILLS',1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1,1,1,NULL,NULL,NULL),
 (4,'SUPPLIER',1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL,NULL),
 (5,'INFRA',1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL,NULL),
 (6,'INCOMING',1,0,0,0,0,0,0,1,1,0,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL,'2017-01-12 14:13:03'),
 (7,'OUTGOING',1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL,NULL),
 (8,'SERVICE',1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL,NULL),
 (9,'SALN',1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL,NULL),
 (10,'PLANS',1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL,NULL),
 (11,'ROUTE',1,0,0,0,0,0,0,1,1,0,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL,'2017-01-12 14:14:12'),
 (12,'MEMO',1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL,NULL),
 (13,'ISO',1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL,NULL),
 (14,'APPOINTMENT',1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL,NULL),
 (15,'RESOLUTION',1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL,NULL),
 (16,'WORKSHEET',1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL,NULL),
 (17,'JUST_LETTER',1,0,0,0,0,0,0,1,1,0,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL,'2017-01-12 14:16:28'),
 (18,'CERT',1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL,NULL),
 (19,'CERT_APPEARANCE',1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL,NULL),
 (20,'CERT_EMPLOYMENT',1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL,NULL),
 (21,'CERT_CLEARANCE',1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL,NULL),
 (22,'OFFICE_ORDER',1,0,0,0,0,0,0,1,1,0,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL,'2017-01-12 14:17:16'),
 (23,'DTR',1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL,NULL),
 (24,'APP_LEAVE',1,0,0,0,0,0,0,0,0,0,0,0,0,1,1,1,0,0,0,0,0,NULL,NULL,'2017-01-12 14:18:21'),
 (25,'OT',1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL,NULL),
 (26,'TIME_OFF',1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL,NULL),
 (27,'PO',1,0,1,1,0,0,0,0,0,1,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL,'2017-01-31 11:40:16'),
 (28,'PRC',1,1,0,0,1,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL,'2017-01-30 16:23:00'),
 (29,'PRR_S',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL,'2017-02-02 13:24:12'),
 (30,'REPORT',1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL,NULL),
 (31,'GENERAL',1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL,NULL),
 (32,'PRR_M',1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,NULL,NULL);
/*!40000 ALTER TABLE `tracking_filter` ENABLE KEYS */;


--
-- Definition of table `tracking_master`
--

DROP TABLE IF EXISTS `tracking_master`;
CREATE TABLE `tracking_master` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `route_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `doc_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prepared_date` datetime NOT NULL,
  `prepared_by` int(11) NOT NULL,
  `division_head` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `amount` double(8,2) NOT NULL,
  `pr_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `po_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pr_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `purpose` text COLLATE utf8_unicode_ci NOT NULL,
  `po_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sai_no` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sai_date` date DEFAULT NULL,
  `alobs_no` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alobs_date` date DEFAULT NULL,
  `cash_advance_of` text COLLATE utf8_unicode_ci,
  `source_fund` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `requested_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `route_to` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `route_from` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `supplier` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `event_date` datetime NOT NULL,
  `event_location` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `event_participant` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cdo_applicant` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cdo_day` int(11) NOT NULL,
  `event_daterange` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payee` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `item` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dv_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ors_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fund_source_budget` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `route_no` (`route_no`,`doc_type`,`prepared_date`,`prepared_by`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tracking_master`
--

/*!40000 ALTER TABLE `tracking_master` DISABLE KEYS */;
INSERT INTO `tracking_master` (`id`,`route_no`,`doc_type`,`prepared_date`,`prepared_by`,`division_head`,`description`,`amount`,`pr_no`,`po_no`,`pr_date`,`purpose`,`po_date`,`sai_no`,`sai_date`,`alobs_no`,`alobs_date`,`cash_advance_of`,`source_fund`,`requested_by`,`route_to`,`route_from`,`supplier`,`event_date`,`event_location`,`event_participant`,`cdo_applicant`,`cdo_day`,`event_daterange`,`payee`,`item`,`dv_no`,`ors_no`,`fund_source_budget`,`remember_token`,`created_at`,`updated_at`) VALUES 
 (1,'2019-3440927180554','GENERAL','2019-09-27 18:05:54',344,0,'A sample documents',0.00,'','','1970-01-01','','1970-01-01',NULL,NULL,NULL,NULL,NULL,'','','','','','0000-00-00 00:00:00','','','',0,'','','','','','',NULL,'2019-09-27 18:05:54','2019-09-28 13:18:36');
/*!40000 ALTER TABLE `tracking_master` ENABLE KEYS */;


--
-- Definition of table `tracking_release`
--

DROP TABLE IF EXISTS `tracking_release`;
CREATE TABLE `tracking_release` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `route_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reported_by` int(11) NOT NULL,
  `division_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `date_reported` datetime NOT NULL,
  `status` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `route_no` (`route_no`,`reported_by`,`division_id`,`section_id`,`date_reported`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tracking_release`
--

/*!40000 ALTER TABLE `tracking_release` DISABLE KEYS */;
/*!40000 ALTER TABLE `tracking_release` ENABLE KEYS */;


--
-- Definition of table `tracking_releasev2`
--

DROP TABLE IF EXISTS `tracking_releasev2`;
CREATE TABLE `tracking_releasev2` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `released_by` int(11) NOT NULL,
  `released_section_to` int(11) NOT NULL,
  `released_date` datetime NOT NULL,
  `remarks` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `document_id` int(11) NOT NULL,
  `route_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tracking_releasev2`
--

/*!40000 ALTER TABLE `tracking_releasev2` DISABLE KEYS */;
INSERT INTO `tracking_releasev2` (`id`,`released_by`,`released_section_to`,`released_date`,`remarks`,`document_id`,`route_no`,`status`,`remember_token`,`created_at`,`updated_at`) VALUES 
 (2,344,60,'2019-09-27 18:42:16','',1,'2019-3440927180554','waiting',NULL,'2019-09-27 18:42:16','2019-09-27 18:42:16'),
 (3,344,42,'2019-09-27 18:52:34','please accept nmn oh',6,'2019-3440927180554','accept',NULL,'2019-09-27 18:52:34','2019-09-27 18:52:52');
/*!40000 ALTER TABLE `tracking_releasev2` ENABLE KEYS */;


--
-- Definition of table `tracking_report`
--

DROP TABLE IF EXISTS `tracking_report`;
CREATE TABLE `tracking_report` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `route_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_reported` datetime NOT NULL,
  `reported_by` int(11) NOT NULL,
  `section_reported` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tracking_report`
--

/*!40000 ALTER TABLE `tracking_report` DISABLE KEYS */;
/*!40000 ALTER TABLE `tracking_report` ENABLE KEYS */;


--
-- Definition of table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `designation` int(11) NOT NULL,
  `division` int(11) NOT NULL,
  `section` int(11) NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_priv` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  KEY `fname` (`fname`,`mname`,`lname`,`division`,`section`,`status`)
) ENGINE=InnoDB AUTO_INCREMENT=345 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`,`fname`,`mname`,`lname`,`username`,`designation`,`division`,`section`,`password`,`user_priv`,`status`,`remember_token`,`created_at`,`updated_at`) VALUES 
 (1,'DOH','.','RO7','admin',17,6,42,'$2y$10$YmkIL2p4mBRSNyaFNoynVeEC8xcMkwENH4fDDFFEA0KiRgfFpWapO',1,1,'W0ofsPIlXxr9krW4HjSUWYEOwlMaBvN0PpG1yEVcewtndaOl0vBWkq9sUf09',NULL,'2019-07-24 16:27:36'),
 (344,'Jimmy','B.','Lomocso','0208',159,6,42,'$2y$10$QGPdjpBzxHMus7p59yG1QeCfmC7iURu.bJP5dadbFouZBP7XaGWRu',1,0,'MSoXX2yt3HTPQIftVySTHcV9XDLnLi71nyOHuJq28QprmDqOLAq6k30KkYDx',NULL,'2019-10-08 14:27:35');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;


--
-- Definition of procedure `reportedDocument`
--

DROP PROCEDURE IF EXISTS `reportedDocument`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */ $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `reportedDocument`(IN `reportedYear` INT)
BEGIN
	SELECT s.id as section,count(s.id) as reported,s.description,
	(
		case 
			WHEN t.released_date LIKE concat('%',substring_index(substring_index(t.released_date,'-', 2),'-',-1),'%') 
			THEN substring_index(substring_index(t.released_date,'-', 2),'-',-1)
		END
	) as month
	FROM `tracking_releasev2` t join section s on s.id = t.released_section_to where t.status = 'report' and t.released_date like concat('%',reportedYear,'%') GROUP by
	(
		case 
			WHEN t.released_date LIKE concat('%',substring_index(substring_index(t.released_date,'-', 2),'-',-1),'%')  
			THEN substring_index(substring_index(t.released_date,'-', 2),'-',-1)
		END
	),
    s.description;
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;

--
-- Definition of procedure `sectionTracking`
--

DROP PROCEDURE IF EXISTS `sectionTracking`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */ $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sectionTracking`(IN `sectionId` INT, IN `year` INT, IN `month` INT)
BEGIN
	SELECT 
    t.id,
    t.route_no,
    concat(us.fname,' ',us.mname,' ',us.lname) as received_by,
    t.date_in,
    t.date_in as duration,
    t.action,
    sec.description as section,
    tr.document_id,
    tr.released_date,
    tr.remarks,
    s.description as released_to
    FROM `tracking_details` t 
    LEFT JOIN users us on t.received_by = us.id  
    LEFT JOIN section sec on sec.id = us.section
    LEFT JOIN tracking_releasev2 tr on t.id = tr.document_id
    LEFT JOIN section s on tr.released_section_to = s.id
    WHERE t.received_by = any(SELECT u.id from users u where u.section = sectionId) and t.date_in like concat('%',year,'-',month,'%')
    /*and tr.route_no != ''*/
    and tr.route_no != ''
    and tr.remarks != ''
    order by t.date_in desc
    limit 10
    /*limit 10*/ ;
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
