# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.20)
# Database: erp
# Generation Time: 2019-05-17 08:32:03 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table erp_brand
# ------------------------------------------------------------

DROP TABLE IF EXISTS `erp_brand`;

CREATE TABLE `erp_brand` (
  `brand_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '品牌ID',
  `brand_name` varchar(255) NOT NULL COMMENT '品牌名称',
  `brand_code` varchar(100) NOT NULL DEFAULT '' COMMENT '品牌简称',
  `brand_website` varchar(255) NOT NULL COMMENT '品牌官网',
  `brand_sort` int(11) NOT NULL DEFAULT '0' COMMENT '品牌排序',
  `brand_desc` text NOT NULL COMMENT '品牌描述',
  `brand_remark` varchar(255) NOT NULL COMMENT '品牌备注',
  `brand_logo` varchar(255) NOT NULL COMMENT '品牌LOGO URL',
  `brand_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '品牌状态：-1：已删除；0：未启用；1：启用中',
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `create_userid` int(11) NOT NULL,
  `update_userid` int(11) NOT NULL,
  PRIMARY KEY (`brand_id`),
  UNIQUE KEY `brand_name_UNIQUE` (`brand_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='品牌列表';

LOCK TABLES `erp_brand` WRITE;
/*!40000 ALTER TABLE `erp_brand` DISABLE KEYS */;

INSERT INTO `erp_brand` (`brand_id`, `brand_name`, `brand_code`, `brand_website`, `brand_sort`, `brand_desc`, `brand_remark`, `brand_logo`, `brand_status`, `create_time`, `update_time`, `create_userid`, `update_userid`)
VALUES
	(1,'Joyetech','Joyetech','',0,'Joyetech','Joyetech','',0,1421498969,1421498969,0,0),
	(2,'DSE','DSE','',0,'DSE','DSE','',0,1421498987,1421498987,0,0),
	(3,'KangerTech','KangerTech','',0,'KangerTech','KangerTech','',0,1421498997,1421498997,0,0),
	(4,'Dekang','Dekang','',0,'Dekang','Dekang','',0,1421499003,1421499003,0,0),
	(5,'RUYAN','RUYAN','',0,'RUYAN','RUYAN','',0,1421499016,1421499016,0,0),
	(6,'HG','HG','',0,'HG','HG','',0,1421499036,1421499036,0,0),
	(7,'M series','M series','',0,'M series','M series','',0,1421499043,1421499043,0,0),
	(8,'Boge','Boge','',0,'Boge','Boge','',0,1421499051,1421499051,0,0),
	(9,'RN','RN','',0,'RN','RN','',0,1421499058,1421499058,0,0),
	(10,'Greensound','Greensound','',0,'Greensound','Greensound','',0,1421499064,1421499064,0,0),
	(11,'Vision','Vision','',0,'Vision','Vision','',0,1421499072,1421499072,0,0),
	(12,'Innokin','Innokin','',0,'Innokin','Innokin','',0,1421499082,1421499082,0,0),
	(13,'VapeOnly','VapeOnly','',0,'VapeOnly','VapeOnly','',0,1421499091,1421499091,0,0),
	(14,'Hangsen','Hangsen','',0,'Hangsen','Hangsen','',0,1421499097,1421499097,0,0),
	(15,'Neutral Brand','Neutral Brand','',0,'Neutral Brand','Neutral Brand','',0,1421499104,1421499104,0,0),
	(16,'Nitecore','Nitecore','',0,'Nitecore','Nitecore','',0,1421499111,1421499111,0,0),
	(17,'SANYO','SANYO','',0,'SANYO','SANYO','',0,1421499118,1421499118,0,0),
	(18,'SAMSUNG','SAMSUNG','',0,'SAMSUNG','SAMSUNG','',0,1421499124,1421499124,0,0),
	(19,'Panasonic','Panasonic','',0,'Panasonic','Panasonic','',0,1421499131,1421499131,0,0),
	(20,'ismoka','ismoka','',0,'ismoka','ismoka','',0,1421499140,1421499140,0,0),
	(21,'Aspire','Aspire','',0,'Aspire','Aspire','',0,1421499145,1421499145,0,0),
	(22,'Heypower','Heypower','',0,'Heypower','Heypower','',0,1421499153,1421499153,0,0),
	(23,'Eleaf','Eleaf','',0,'Eleaf','Eleaf','',0,1421499159,1421499159,0,0),
	(24,'SMOK','SMOK','',0,'SMOK','SMOK','',0,1421499165,1421499165,0,0),
	(25,'SMY','SMY','',0,'SMY','SMY','',0,1425278160,1425278160,1,1),
	(26,'SONY','SONY','',0,'SONY','SONY','',0,1425278171,1425278171,1,1),
	(27,'Heatvape','Heatvape','',0,'Heatvape','Heatvape','',0,1425278184,1425278184,1,1),
	(28,'Green Leaf','Green Leaf','',0,'Green Leaf','Green Leaf','',0,1425278199,1425278199,1,1),
	(29,'IJOY','IJOY','',0,'IJOY','IJOY','',0,1429267216,1429267216,22,22),
	(30,'SENSE','SENSE','',0,'SENSE','SENSE','',0,1429530455,1429530455,22,22),
	(31,'WISMEC','WISMEC','',0,'WISMEC','WISMEC','',0,1431001870,1431001870,23,23),
	(32,'UD','UD','',0,'UD','UD','',0,1431948495,1431948495,24,24),
	(33,'Freemax','Freemax','',0,'Freemax','Freemax','',0,1432175227,1432175227,26,26),
	(34,'Ehpro','Ehpro','',0,'Ehpro','Ehpro','',0,1432196827,1432196827,22,22),
	(35,'Sigelei','Sigelei','',0,'Sigelei','Sigelei','',0,1432609034,1432609034,22,22),
	(37,'LG','LG','',0,'LG','LG','',0,1433146560,1433146560,22,22),
	(38,'CiVAP','CiVAP','',0,'CiVAP','CiVAP','',0,1435910002,1435910002,22,22),
	(39,'ENCOM','ENCOM','http://www.encomcig.com/',0,'ENCOM','ENCOM','',0,1435993667,1435993667,23,23),
	(40,'Kangxin','Kangxin','www.kangxinecigarette.com',0,'Kangxin','Kangxin','',0,1436787602,1436787602,45,45),
	(41,'ESIGE','ESIGE','',0,'ESIGE','ESIGE','',0,1440984515,1440984515,22,22),
	(42,'ETERNAL ','ETERNAL ','',0,'ETERNAL ','ETERNAL ','',0,1441531994,1441531994,23,23),
	(43,'Koopor','Koopor','',0,'Koopor','Koopor','',0,1441611704,1441611704,48,48),
	(44,'CARRYS','CARRYS','',0,'CARRYS','CARRYS','',0,1443511958,1443511958,23,23),
	(45,'Vanguard','Vanguard','',0,'Vanguard','Vanguard','',0,1444457124,1444457124,23,23),
	(46,'Vaporesso','Vaporesso','www.vaporesso.com',0,'Vaporesso','Vaporesso','',0,1445410211,1445410211,23,23),
	(47,'Vpark','Vpark','',0,'Vpark','Vpark','',0,1445846939,1445846939,23,23),
	(48,'GeekVape','GeekVape','',0,'GeekVape','GeekVape','',0,1447059036,1447059036,22,22),
	(49,'Arctic Dolphin','Arctic Dolphin','',0,'Arctic Dolphin','Arctic Dolphin','',0,1447924938,1447924938,23,23),
	(50,'Vaptio','Vaptio','http://www.vaptio.com/',0,'Vaptio','Vaptio','',0,1448000017,1448000017,26,26),
	(51,'ATOM','ATOM','',0,'ATOM','ATOM','',0,1448259931,1448259931,23,23),
	(52,'Totally Wicked','Totally Wicked','',0,'Totally Wicked','Totally Wicked','',0,1448351658,1448351658,23,23),
	(53,'Xiaomi','Xiaomi','',0,'Xiaomi','Xiaomi','',0,1449563026,1449563026,23,23),
	(54,'PLAYBOY','PLAYBOY','http://playboyvapor.com/',0,'PLAYBOY','PLAYBOY','',0,1451037102,1451037102,26,26),
	(55,'Horizon','Horizon','',0,'Horizon','Horizon','',0,1458113625,1458113625,23,23),
	(56,'KIMSUN','KIMSUN','',0,'KIMSUN','KIMSUN','',0,1458709244,1458709244,23,23),
	(57,'WOTOFO','WOTOFO','http://www.wotofotech.com/',0,'WOTOFO','WOTOFO','',0,1459394349,1459394349,23,23),
	(58,'OUMIER','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(59,'OBS','OBS','www.obsnsmoke.com ',0,'OBS','OBS','',0,1460449635,1460449635,16,16),
	(60,'OUMIER1','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(62,'OUMIER1519228064','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(63,'OUMIER1519228065','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(66,'OUMIER1519228069','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(67,'OUMIER1519228072','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(68,'OUMIER1519228074','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(70,'OUMIER1519228077','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(71,'OUMIER1519228079','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(73,'OUMIER0.7918369991628798','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(74,'OUMIER0.04202010858992125','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(75,'OUMIER0.29220321801696275','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(79,'OUMIER0.5423863237187139','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(80,'OUMIER0.7925694331457553','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(82,'OUMIER0.7940343085620872','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(84,'OUMIER0.044217417989128656','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(85,'OUMIER0.07134442317424754','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(87,'OUMIER0.38226382190572455','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(88,'OUMIER0.6931832318130724','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(90,'OUMIER0.3171559379595853','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(91,'OUMIER0.5539224981832528','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(92,'OUMIER0.8181447077711529','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(93,'OUMIER0.42895607503965133','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(94,'OUMIER0.6903462826184428','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(95,'OUMIER0.16486321870690512','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(96,'OUMIER0.7532772764128421','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(97,'OUMIER0.27179675667714026','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(98,'OUMIER0.0991519848808199','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(99,'OUMIER0.6803696851063238','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(100,'OUMIER0.10439250162280397','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(101,'OUMIER0.48085348352869367','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(102,'OUMIER0.09108994350870135','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(103,'OUMIER0.012889297691070752','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(104,'OUMIER0.7911766886628947','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(105,'OUMIER0.9172155809749063','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(106,'OUMIER0.21254786961949232','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(107,'OUMIER0.3110926359063877','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(108,'OUMIER0.9178196014071066','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(109,'OUMIER0.6558201300500148','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(110,'OUMIER0.5256418767623994','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(111,'OUMIER0.6607490243955972','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(112,'OUMIER0.7268195224244329','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(113,'OUMIER0.6518505696690181','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(114,'OUMIER0.07879431180543668','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(115,'OUMIER0.4384198807537741','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(116,'OUMIER0.9557164990862054','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(117,'OUMIER0.46332288390334964','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(118,'OUMIER0.4494649529917771','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(119,'OUMIER0.8573561439824814','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(120,'OUMIER0.9383858916707205','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(121,'OUMIER0.1198610571398037','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(122,'OUMIER0.7841476414205019','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(123,'OUMIER0.5611550664167433','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(124,'OUMIER0.4533324385558557','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(125,'OUMIER0.5831970242626937','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(126,'OUMIER0.5559878363795465','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(127,'OUMIER0.03034813984329639','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(128,'OUMIER0.4837772208114874','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(129,'OUMIER0.3278417152611927','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(130,'OUMIER0.18787694460514648','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(131,'OUMIER0.9558596079757993','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(132,'OUMIER0.21566723679720168','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(133,'OUMIER0.21075739079225567','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(134,'OUMIER0.40678527430331823','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(135,'OUMIER0.4016542298734693','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(136,'OUMIER0.7879153571910368','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(137,'OUMIER0.734614127068421','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(138,'OUMIER0.3093245945026396','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(139,'OUMIER0.34278062204157994','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(140,'OUMIER0.7859293574336258','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(141,'OUMIER0.9013049517770344','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(142,'OUMIER0.14873671731793947','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(143,'OUMIER0.03976876199223917','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(144,'OUMIER0.7526336887410224','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(145,'OUMIER0.6438621884620397','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(146,'OUMIER0.9614099068207759','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(147,'OUMIER0.8754629994514054','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(148,'OUMIER0.4930853075283443','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(149,'OUMIER0.8390375700211502','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(150,'OUMIER0.7159319582543634','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(151,'OUMIER0.06254711194201104','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(152,'OUMIER0.1649397156806101','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(153,'OUMIER0.6370572733106625','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(154,'OUMIER0.6904672502451271','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(155,'OUMIER0.5411644620272932','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(156,'OUMIER0.6344205901347293','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(157,'OUMIER0.5486095953254119','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(158,'OUMIER0.8397862369565166','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(159,'OUMIER0.5531024295399919','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(160,'OUMIER0.2461534675640552','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(161,'OUMIER0.5714600799339452','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(162,'OUMIER0.1188400277112052','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(163,'OUMIER0.8798199294878355','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(164,'OUMIER0.042579595039207115','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(165,'OUMIER0.5734382174661738','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(166,'OUMIER0.7394523329468932','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(167,'OUMIER0.976947043069589','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(168,'OUMIER0.6663782472409105','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(169,'OUMIER0.4010501377294307','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(170,'OUMIER0.006115977658066878','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(171,'OUMIER0.8274295058356873','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(172,'OUMIER0.11879962693788076','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(173,'OUMIER0.11170964791598698','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(174,'OUMIER0.20214938949993755','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(175,'OUMIER0.6756180344853718','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(176,'OUMIER0.7716420346606915','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(177,'OUMIER0.8313561005809866','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(178,'OUMIER0.8418544296565041','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(179,'OUMIER0.7152038772732056','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(180,'OUMIER0.05045612813016039','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(181,'OUMIER0.10666903956483029','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(182,'OUMIER0.38197684416731525','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(183,'OUMIER0.5898771328757304','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(184,'OUMIER0.8034551626103512','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(185,'OUMIER0.24764444515821007','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(186,'OUMIER0.8278567686936416','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(187,'OUMIER0.39635053872722253','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(188,'OUMIER0.4981824182888329','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(189,'OUMIER0.30186050599614206','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(190,'OUMIER0.014755305847856502','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(191,'OUMIER0.16819504198450133','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(192,'OUMIER0.7967093231125821','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(193,'OUMIER0.4789615203430518','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(194,'OUMIER0.0046796631111574016','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(195,'OUMIER0.5865137852602766','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(196,'OUMIER0.9185299677015561','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(197,'OUMIER0.8331085134605957','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(198,'OUMIER0.4099526949319548','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(199,'OUMIER0.550437965011632','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(200,'OUMIER0.5223317709959407','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(201,'OUMIER0.9603449906784529','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(202,'OUMIER0.234729671138087','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(203,'OUMIER0.29261341438872124','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(204,'OUMIER0.7588780892629904','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(205,'OUMIER0.9165502338824331','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(206,'OUMIER0.306116932356839','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(207,'OUMIER0.7809339908705409','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(208,'OUMIER0.9863191880158327','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(209,'OUMIER0.5887939982011858','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(210,'OUMIER0.9850124576920759','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(211,'OUMIER0.15868032459046721','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(212,'OUMIER0.8383642806097532','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(213,'OUMIER0.7157804600110096','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(214,'OUMIER0.06380948895943303','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(215,'OUMIER0.1717060954977815','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(216,'OUMIER0.6671020413442534','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(217,'OUMIER0.8203919509615674','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(218,'OUMIER0.10065366150872192','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(219,'OUMIER0.04209248539255232','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(220,'OUMIER0.9085014731702409','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(221,'OUMIER0.4162299404071923','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(222,'OUMIER0.3556453132588838','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16),
	(223,'OUMIER0.5295367758064873','OUMIER','',0,'OUMIER','OUMIER','',0,1460087440,1460087440,16,16);

/*!40000 ALTER TABLE `erp_brand` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table erp_brand_series
# ------------------------------------------------------------

DROP TABLE IF EXISTS `erp_brand_series`;

CREATE TABLE `erp_brand_series` (
  `series_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '系列ID',
  `brand_id` int(11) NOT NULL COMMENT '品牌ID',
  `series_name` varchar(255) NOT NULL COMMENT '系列名称',
  `series_code` varchar(20) NOT NULL COMMENT '系列编号',
  `series_desc` text NOT NULL COMMENT '系列描述',
  `series_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '系列状态：-1：已删除；0：未启用；1：启用中',
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `create_userid` int(11) NOT NULL,
  `update_userid` int(11) NOT NULL,
  PRIMARY KEY (`series_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='品牌系列列表';



# Dump of table erp_category
# ------------------------------------------------------------

DROP TABLE IF EXISTS `erp_category`;

CREATE TABLE `erp_category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '分类ID',
  `category_fid` int(11) NOT NULL DEFAULT '0' COMMENT '分类父ID',
  `category_code` varchar(20) NOT NULL COMMENT '分类编码',
  `category_name` varchar(45) NOT NULL COMMENT '分类名称',
  `category_sort` int(11) NOT NULL DEFAULT '0' COMMENT '分类排序',
  `category_left` int(11) NOT NULL DEFAULT '0',
  `category_right` int(11) NOT NULL DEFAULT '0',
  `category_level` tinyint(2) NOT NULL COMMENT '分类层级，顶级为0,第二级为1，第三级为2，最高三级',
  `category_desc` varchar(255) NOT NULL COMMENT '分类描述',
  `category_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '分类状态：-1：已删除；0：未启用；1：启用中',
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `create_userid` int(11) NOT NULL,
  `update_userid` int(11) NOT NULL,
  PRIMARY KEY (`category_id`),
  UNIQUE KEY `category_name_UNIQUE` (`category_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='分类列表';

LOCK TABLES `erp_category` WRITE;
/*!40000 ALTER TABLE `erp_category` DISABLE KEYS */;

INSERT INTO `erp_category` (`category_id`, `category_fid`, `category_code`, `category_name`, `category_sort`, `category_left`, `category_right`, `category_level`, `category_desc`, `category_status`, `create_time`, `update_time`, `create_userid`, `update_userid`)
VALUES
	(1,2,'11','111',1,1,1,1,'电子烟及核心配件；核心配件指：雾化器、MOD、发热丝等',1,1425278652,1519223681,1,1),
	(2,0,'12','Battery/MOD',0,1,1,0,'电池相关产品， 包含：锂电池，内置锂电池，MOD, 电池配件（含电池管）',1,1425278663,1519223681,1,1),
	(3,0,'13','Cartomizer',20,1,1,0,'雾化器+除发热丝以外的雾化器配件, 包含：雾化器，玻璃管，其他雾化器配件（coil除外）',1,1425278689,1519223681,1,1),
	(4,1,'14','Coil',3,1,1,1,'发热丝, 包含：成品雾化芯，线圈，RBA deck',0,1425278702,1519223681,1,1),
	(5,1,'15','E-liquid',3,1,1,1,'食品级食用香精',0,1425278720,1519223681,1,1),
	(6,5,'16','Accessories',4,1,1,2,'电子烟的非核心配件, 包含：Lanyard/ Case/ sticker/ Base',0,1425278733,1519223681,1,1),
	(7,0,'17','E-cigarette Related Products',2,1,1,0,'电子烟周边及次要配件：硅胶套、转接头、烟嘴等',1,1429175250,1519223681,26,1),
	(8,4,'18','Kit',4,1,1,2,'电子烟套装, 包含：full kit，start kit, express kit',0,1430220749,1519223681,26,1),
	(9,6,'19','Charger',5,1,1,3,'充电器，包含：充电器，USB charger, USB cable',0,1471223865,1519223681,26,1),
	(10,11,'20','Adapter',7,1,1,5,'充电连接工具， 包含： AC Adapter',0,1471223897,1519223681,26,1),
	(11,9,'21','Mouthpiece',6,1,1,4,'烟嘴',0,1471223928,1519223681,26,1),
	(12,10,'22','Drip Well',8,1,1,6,'烟液注入工具，包含：空瓶子，注射器',0,1471224046,1519223681,26,1),
	(13,12,'23','Drip Tip',9,1,1,7,'滴嘴',0,1471227280,1519223681,26,1),
	(14,13,'24','Filler Material',10,1,1,8,'DIY发热丝填充物，包含：Wick / cotton',0,1471235415,1519223681,26,1),
	(15,0,'25','Packing & Posting',4,1,1,0,'包装材料；包装纸；气泡信封',1,1471341491,1519223681,63,1),
	(16,0,'26','Electronics',6,1,1,0,'其他电子产品; 3C产品',1,1472113249,1519223681,63,1),
	(17,18,'27','Computer Accessories',9,1,1,1,'',1,1472113264,1519223681,63,1),
	(18,0,'28','Headset',8,1,1,0,'',1,1472113275,1519223681,63,1),
	(19,14,'29','DIY Tool',11,1,1,9,'DIY电子烟用到的小工具，包含：工具套装、小钳子，镊子，扳手等',0,1472812405,1519223681,59,1),
	(20,0,'11','Microphone',7,1,1,0,'Microphone',1,1479177104,1519223681,63,1),
	(21,0,'27','Toys & Hobbies',11,1,1,0,'玩具类',1,1487668073,1519223681,76,1),
	(22,0,'28','Novelty Toys',14,1,1,0,'新奇玩具类',1,1487668189,1519223681,76,1),
	(23,15,'29','Classic Toys',5,1,1,1,'经典玩具类',1,1487668226,1519223681,76,1),
	(24,0,'29','Motors',12,1,1,0,'汽车类',1,1487668540,1519223681,76,1),
	(26,0,'29','Home & Garden',13,1,1,0,'家居类',1,1487668637,1519223681,76,1),
	(27,0,'21','Phone Accessories',3,1,1,0,'手机配件',1,1492406882,1519223681,76,1),
	(28,0,'30','Baby & Kids',15,1,1,0,'',1,1496387544,1519223681,76,1),
	(29,0,'31','Pet Supplies',16,1,1,0,'',1,1497425912,1519223681,76,1),
	(30,0,'32','Computer & Office',18,1,1,0,'',1,1497592061,1519223681,76,1),
	(31,0,'33','Health & Beauty',19,1,1,0,'',1,1498799336,1519223681,76,1),
	(32,29,'34','Adult Products',17,1,1,1,'',1,1498799428,1519223681,76,1),
	(33,0,'35','Speaker',10,1,1,0,'',1,1499666004,1519223681,76,1),
	(34,8,'','new node1',5,0,0,3,'',0,1519223193,1519223681,1,1);

/*!40000 ALTER TABLE `erp_category` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table erp_category_copy
# ------------------------------------------------------------

DROP TABLE IF EXISTS `erp_category_copy`;

CREATE TABLE `erp_category_copy` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '分类ID',
  `category_fid` int(11) NOT NULL DEFAULT '0' COMMENT '分类父ID',
  `category_code` varchar(20) NOT NULL COMMENT '分类编码',
  `category_name` varchar(45) NOT NULL COMMENT '分类名称',
  `category_sort` int(11) NOT NULL DEFAULT '0' COMMENT '分类排序',
  `category_left` int(11) NOT NULL DEFAULT '0',
  `category_right` int(11) NOT NULL DEFAULT '0',
  `category_level` tinyint(2) NOT NULL COMMENT '分类层级，顶级为1,第二级为2，第三级为3，最高三级',
  `category_desc` varchar(255) NOT NULL COMMENT '分类描述',
  `category_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '分类状态：-1：已删除；0：未启用；1：启用中',
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `create_userid` int(11) NOT NULL,
  `update_userid` int(11) NOT NULL,
  PRIMARY KEY (`category_id`),
  UNIQUE KEY `category_name_UNIQUE` (`category_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='分类列表';

LOCK TABLES `erp_category_copy` WRITE;
/*!40000 ALTER TABLE `erp_category_copy` DISABLE KEYS */;

INSERT INTO `erp_category_copy` (`category_id`, `category_fid`, `category_code`, `category_name`, `category_sort`, `category_left`, `category_right`, `category_level`, `category_desc`, `category_status`, `create_time`, `update_time`, `create_userid`, `update_userid`)
VALUES
	(1,0,'11','E-cigarettes & Spare Parts',0,1,1,1,'电子烟及核心配件；核心配件指：雾化器、MOD、发热丝等',1,1425278652,1501742937,1,1),
	(2,1,'12','Battery/MOD',0,1,1,2,'电池相关产品， 包含：锂电池，内置锂电池，MOD, 电池配件（含电池管）',1,1425278663,1494231254,1,1),
	(3,1,'13','Cartomizer',0,1,1,2,'雾化器+除发热丝以外的雾化器配件, 包含：雾化器，玻璃管，其他雾化器配件（coil除外）',1,1425278689,1494222414,1,1),
	(4,1,'14','Coil',0,1,1,2,'发热丝, 包含：成品雾化芯，线圈，RBA deck',1,1425278702,1494231274,1,1),
	(5,0,'15','E-liquid',0,1,1,1,'食品级食用香精',1,1425278720,1500262300,1,1),
	(6,7,'16','Accessories',0,1,1,2,'电子烟的非核心配件, 包含：Lanyard/ Case/ sticker/ Base',1,1425278733,1501740463,1,1),
	(7,0,'17','E-cigarette Related Products',0,1,1,1,'电子烟周边及次要配件：硅胶套、转接头、烟嘴等',1,1429175250,1501744146,26,26),
	(8,1,'18','Kit',0,1,1,2,'电子烟套装, 包含：full kit，start kit, express kit',1,1430220749,1494222458,26,26),
	(9,7,'19','Charger',0,1,1,2,'充电器，包含：充电器，USB charger, USB cable',1,1471223865,1501740590,26,26),
	(10,7,'20','Adapter',0,1,1,2,'充电连接工具， 包含： AC Adapter',1,1471223897,1501740519,26,26),
	(11,7,'21','Mouthpiece',0,1,1,2,'烟嘴',1,1471223928,1501740423,26,26),
	(12,7,'22','Drip Well',0,1,1,2,'烟液注入工具，包含：空瓶子，注射器',1,1471224046,1501740484,26,26),
	(13,7,'23','Drip Tip',0,1,1,2,'滴嘴',1,1471227280,1501740452,26,26),
	(14,7,'24','Filler Material',0,1,1,2,'DIY发热丝填充物，包含：Wick / cotton',1,1471235415,1501740415,26,26),
	(15,0,'25','Packing & Posting',0,1,1,1,'包装材料；包装纸；气泡信封',1,1471341491,1501742905,63,63),
	(16,0,'26','Electronics',0,1,1,1,'其他电子产品; 3C产品',1,1472113249,1501742916,63,63),
	(17,16,'27','Computer Accessories',0,1,1,2,'',1,1472113264,1501742980,63,63),
	(18,16,'28','Headset',0,1,1,2,'',1,1472113275,1501742989,63,63),
	(19,7,'29','DIY Tool',0,1,1,2,'DIY电子烟用到的小工具，包含：工具套装、小钳子，镊子，扳手等',1,1472812405,1501740404,59,59),
	(20,16,'11','Microphone',0,1,1,2,'Microphone',1,1479177104,1501742888,63,63),
	(21,0,'27','Toys & Hobbies',0,1,1,1,'玩具类',1,1487668073,1501742858,76,76),
	(22,21,'28','Novelty Toys',0,1,1,2,'新奇玩具类',1,1487668189,1501742848,76,76),
	(23,21,'29','Classic Toys',0,1,1,2,'经典玩具类',1,1487668226,1501742839,76,76),
	(24,0,'29','Motors',0,1,1,1,'汽车类',1,1487668540,1501742830,76,76),
	(26,0,'29','Home & Garden',0,1,1,1,'家居类',1,1487668637,1501742809,76,76),
	(27,16,'21','Phone Accessories',0,1,1,2,'手机配件',1,1492406882,1501740756,76,76),
	(28,0,'30','Baby & Kids',0,1,1,1,'',1,1496387544,1501740393,76,76),
	(29,0,'31','Pet Supplies',0,1,1,1,'',1,1497425912,1501740379,76,76),
	(30,0,'32','Computer & Office',0,1,1,1,'',1,1497592061,1501740363,76,76),
	(31,0,'33','Health & Beauty',0,1,1,1,'',1,1498799336,1501740338,76,76),
	(32,31,'34','Adult Products',0,1,1,2,'',1,1498799428,1501740330,76,76),
	(33,16,'35','Speaker',0,1,1,2,'',1,1499666004,1501740322,76,76);

/*!40000 ALTER TABLE `erp_category_copy` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table erp_city
# ------------------------------------------------------------

DROP TABLE IF EXISTS `erp_city`;

CREATE TABLE `erp_city` (
  `city_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '城市ID',
  `country_id` int(11) NOT NULL COMMENT '国家ID',
  `province_id` int(11) NOT NULL COMMENT '省份ID／州ID',
  `city_name` varchar(100) NOT NULL COMMENT '城市名称',
  PRIMARY KEY (`city_id`),
  UNIQUE KEY `city_id_UNIQUE` (`city_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='城市列表';



# Dump of table erp_combo_item
# ------------------------------------------------------------

DROP TABLE IF EXISTS `erp_combo_item`;

CREATE TABLE `erp_combo_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `combo_code` varchar(20) NOT NULL COMMENT '套装编码',
  `product_code` varchar(20) NOT NULL COMMENT '商品编码',
  `product_quantity` int(11) NOT NULL COMMENT '商品数量',
  `sales_price` int(11) NOT NULL COMMENT '销售单价',
  `item_status` tinyint(1) NOT NULL COMMENT '套装内商品状态：0：删除；1：使用中',
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `create_userid` int(11) NOT NULL,
  `update_userid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `combo_product` (`combo_code`,`product_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='套装货品明细列表';



# Dump of table erp_country
# ------------------------------------------------------------

DROP TABLE IF EXISTS `erp_country`;

CREATE TABLE `erp_country` (
  `country_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '国家ID',
  `country_name_cn` varchar(100) NOT NULL DEFAULT '' COMMENT '国家名称中文名',
  `country_name_en` varchar(255) NOT NULL DEFAULT '' COMMENT '国家英文名',
  `country_code` varchar(45) NOT NULL COMMENT '国家编码',
  PRIMARY KEY (`country_id`),
  UNIQUE KEY `country_code_UNIQUE` (`country_code`),
  UNIQUE KEY `country_name_UNIQUE` (`country_name_cn`),
  UNIQUE KEY `country_id_UNIQUE` (`country_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='国家列表';

LOCK TABLES `erp_country` WRITE;
/*!40000 ALTER TABLE `erp_country` DISABLE KEYS */;

INSERT INTO `erp_country` (`country_id`, `country_name_cn`, `country_name_en`, `country_code`)
VALUES
	(1,'阿富汗','Afghanistan','AF'),
	(2,'奥兰','Aland Islands','AX'),
	(3,'阿尔巴尼亚','Albania','AL'),
	(4,'阿尔及利亚','Algeria','DZ'),
	(5,'美属萨摩亚','American Samoa','AS'),
	(6,'安道尔','Andorra','AD'),
	(7,'安哥拉','Angola','AO'),
	(8,'安圭拉','Anguilla','AI'),
	(9,'南极洲','Antarctica','AQ'),
	(10,'安提瓜和巴布达','Antigua and Barbuda','AG'),
	(11,'阿根廷','Argentina','AR'),
	(12,'亚美尼亚','Armenia','AM'),
	(13,'阿鲁巴','Aruba','AW'),
	(14,'澳大利亚','Australia','AU'),
	(15,'奥地利','Austria','AT'),
	(16,'阿塞拜疆','Azerbaijan','AZ'),
	(17,'巴哈马','Bahamas','BS'),
	(18,'巴林','Bahrain','BH'),
	(19,'孟加拉国','Bangladesh','BD'),
	(20,'巴巴多斯','Barbados','BB'),
	(21,'白俄罗斯','Belarus','BY'),
	(22,'比利时','Belgium','BE'),
	(23,'伯利兹','Belize','BZ'),
	(24,'贝宁','Benin','BJ'),
	(25,'百慕大','Bermuda','BM'),
	(26,'不丹','Bhutan','BT'),
	(27,'玻利维亚','Bolivia','BO'),
	(28,'加勒比荷兰','Bonaire, Sint Eustatius and Saba','BQ'),
	(29,'波斯尼亚和黑塞哥维那','Bosnia and Herzegovina','BA'),
	(30,'博茨瓦纳','Botswana','BW'),
	(31,'布韦岛','Bouvet Island','BV'),
	(32,'巴西','Brazil','BR'),
	(33,'英属印度洋领地','British Indian Ocean Territory','IO'),
	(34,'文莱','Brunei Darussalam','BN'),
	(35,'保加利亚','Bulgaria','BG'),
	(36,'布基纳法索','Burkina Faso','BF'),
	(37,'布隆迪','Burundi','BI'),
	(38,'柬埔寨','Cambodia','KH'),
	(39,'喀麦隆','Cameroon','CM'),
	(40,'加拿大','Canada','CA'),
	(41,'加那利群岛','Canary Islands','IC'),
	(42,'佛得角','Cape Verde','CV'),
	(43,'开曼群岛','Cayman Islands','KY'),
	(44,'中非','Central African Republic','CF'),
	(45,'乍得','Chad','TD'),
	(46,'智利','Chile','CL'),
	(47,'中国','China','CN'),
	(48,'圣诞岛','Christmas Island','CX'),
	(49,'科科斯（基林）群岛','Cocos (Keeling) Islands','CC'),
	(50,'哥伦比亚','Colombia','CO'),
	(51,'科摩罗','Comoros','KM'),
	(52,'刚果（金）','Congo (K)','CD'),
	(53,'刚果（布）','Congo (B)','CG'),
	(54,'库克群岛','Cook Islands','CK'),
	(55,'哥斯达黎加','Costa Rica','CR'),
	(56,'科特迪瓦','Cote D\'Ivoire','CI'),
	(57,'克罗地亚','Croatia','HR'),
	(58,'古巴','Cuba','CU'),
	(59,'库拉索','Curacao','CW'),
	(60,'塞浦路斯','Cyprus','CY'),
	(61,'捷克','Czechia','CZ'),
	(62,'丹麦','Denmark','DK'),
	(63,'吉布提','Djibouti','DJ'),
	(64,'多米尼克','Dominica','DM'),
	(65,'多米尼加','Dominican Republic','DO'),
	(66,'厄瓜多尔','Ecuador','EC'),
	(67,'埃及','Egypt','EG'),
	(68,'萨尔瓦多','El Salvador','SV'),
	(69,'赤道几内亚','Equatorial Guinea','GQ'),
	(70,'厄立特里亚','Eritrea','ER'),
	(71,'爱沙尼亚','Estonia','EE'),
	(72,'埃塞俄比亚','Ethiopia','ET'),
	(73,'福克兰群岛','Falkland Islands (Malvinas)','FK'),
	(74,'法罗群岛','Faroe Islands','FO'),
	(75,'斐济','Fiji','FJ'),
	(76,'芬兰','Finland','FI'),
	(77,'法国','France','FR'),
	(78,'法属圭亚那','French Guiana','GF'),
	(79,'法属波利尼西亚','French Polynesia','PF'),
	(80,'法属南部领地','French Southern Territories','TF'),
	(81,'加蓬','Gabon','GA'),
	(82,'冈比亚','Gambia','GM'),
	(83,'格鲁吉亚','Georgia','GE'),
	(84,'德国','Germany','DE'),
	(85,'加纳','Ghana','GH'),
	(86,'直布罗陀','Gibraltar','GI'),
	(87,'希腊','Greece','GR'),
	(88,'格陵兰','Greenland','GL'),
	(89,'格林纳达','Grenada','GD'),
	(90,'瓜德罗普','Guadeloupe','GP'),
	(91,'关岛','Guam','GU'),
	(92,'危地马拉','Guatemala','GT'),
	(93,'根西','Guernsey','GG'),
	(94,'几内亚','Guinea','GN'),
	(95,'几内亚比绍','Guinea-Bissau','GW'),
	(96,'圭亚那','Guyana','GY'),
	(97,'海地','Haiti','HT'),
	(98,'赫德岛和麦克唐纳群岛','Heard Island and McDonald Islands','HM'),
	(99,'洪都拉斯','Honduras','HN'),
	(100,'香港','Hong Kong','HK'),
	(101,'匈牙利','Hungary','HU'),
	(102,'冰岛','Iceland','IS'),
	(103,'印度','India','IN'),
	(104,'印尼','Indonesia','ID'),
	(105,'伊朗','Iran','IR'),
	(106,'伊拉克','Iraq','IQ'),
	(107,'爱尔兰','Ireland','IE'),
	(108,'曼岛','Isle of Man','IM'),
	(109,'以色列','Israel','IL'),
	(110,'意大利','Italy','IT'),
	(111,'牙买加','Jamaica','JM'),
	(112,'日本','Japan','JP'),
	(113,'泽西','Jersey','JE'),
	(114,'约旦','Jordan','JO'),
	(115,'哈萨克斯坦','Kazakhstan','KZ'),
	(116,'肯尼亚','Kenya','KE'),
	(117,'基里巴斯','Kiribati','KI'),
	(118,'科索沃','Kosovo','XK'),
	(119,'科威特','Kuwait','KW'),
	(120,'吉尔吉斯斯坦','Kyrgyzstan','KG'),
	(121,'老挝','Laos','LA'),
	(122,'拉脱维亚','Latvia','LV'),
	(123,'黎巴嫩','Lebanon','LB'),
	(124,'莱索托','Lesotho','LS'),
	(125,'利比里亚','Liberia','LR'),
	(126,'利比亚','Libya','LY'),
	(127,'列支敦士登','Liechtenstein','LI'),
	(128,'立陶宛','Lithuania','LT'),
	(129,'卢森堡','Luxembourg','LU'),
	(130,'澳门','Macao','MO'),
	(131,'马其顿','Macedonia','MK'),
	(132,'马达加斯加','Madagascar','MG'),
	(133,'马拉维','Malawi','MW'),
	(134,'马来西亚','Malaysia','MY'),
	(135,'马尔代夫','Maldives','MV'),
	(136,'马里','Mali','ML'),
	(137,'马耳他','Malta','MT'),
	(138,'马绍尔群岛','Marshall Islands','MH'),
	(139,'马提尼克','Martinique','MQ'),
	(140,'毛里塔尼亚','Mauritania','MR'),
	(141,'毛里求斯','Mauritius','MU'),
	(142,'马约特','Mayotte','YT'),
	(143,'墨西哥','Mexico','MX'),
	(144,'密克罗尼西亚联邦','Micronesia','FM'),
	(145,'摩尔多瓦','Moldova','MD'),
	(146,'摩纳哥','Monaco','MC'),
	(147,'蒙古','Mongolia','MN'),
	(148,'黑山','Montenegro','ME'),
	(149,'蒙特塞拉特','Montserrat','MS'),
	(150,'摩洛哥','Morocco','MA'),
	(151,'莫桑比克','Mozambique','MZ'),
	(152,'缅甸','Myanmar','MM'),
	(153,'纳米比亚','Namibia','NA'),
	(154,'瑙鲁','Nauru','NR'),
	(155,'尼泊尔','Nepal','NP'),
	(156,'荷兰','Netherlands','NL'),
	(157,'新喀里多尼亚','New Caledonia','NC'),
	(158,'新西兰','New Zealand','NZ'),
	(159,'尼加拉瓜','Nicaragua','NI'),
	(160,'尼日尔','Niger','NE'),
	(161,'尼日利亚','Nigeria','NG'),
	(162,'纽埃','Niue','NU'),
	(163,'诺福克岛','Norfolk Island','NF'),
	(164,'朝鲜','North Korea','KP'),
	(165,'北马里亚纳群岛','Northern Mariana Islands','MP'),
	(166,'挪威','Norway','NO'),
	(167,'阿曼','Oman','OM'),
	(168,'巴基斯坦','Pakistan','PK'),
	(169,'帕劳','Palau','PW'),
	(170,'巴勒斯坦','Palestine','PS'),
	(171,'巴拿马','Panama','PA'),
	(172,'巴布亚新几内亚','Papua New Guinea','PG'),
	(173,'巴拉圭','Paraguay','PY'),
	(174,'秘鲁','Peru','PE'),
	(175,'菲律宾','Philippines','PH'),
	(176,'皮特凯恩群岛','Pitcairn','PN'),
	(177,'波兰','Poland','PL'),
	(178,'葡萄牙','Portugal','PT'),
	(179,'波多黎各','Puerto Rico','PR'),
	(180,'卡塔尔','Qatar','QA'),
	(181,'留尼汪','Reunion','RE'),
	(182,'罗马尼亚','Romania','RO'),
	(183,'俄罗斯','Russia','RU'),
	(184,'卢旺达','Rwanda','RW'),
	(185,'圣巴泰勒米','Saint Barthelemy','BL'),
	(186,'圣赫勒拿','Saint Helena','SH'),
	(187,'尼维斯','Saint Kitts & Nevis','KN'),
	(188,'圣卢西亚','Saint Lucia','LC'),
	(189,'法属圣马丁','Saint Martin (French)','MF'),
	(190,'圣皮埃尔和密克隆','Saint Pierre and Miquelon','PM'),
	(191,'圣文森特和格林纳丁斯','Saint Vincent and the Grenadines','VC'),
	(192,'萨摩亚','Samoa','WS'),
	(193,'圣马力诺','San Marino','SM'),
	(194,'圣多美和普林西比','Sao Tome and Principe','ST'),
	(195,'沙特阿拉伯','Saudi Arabia','SA'),
	(196,'塞内加尔','Senegal','SN'),
	(197,'塞尔维亚','Serbia','RS'),
	(198,'塞舌尔','Seychelles','SC'),
	(199,'塞拉利昂','Sierra Leone','SL'),
	(200,'新加坡','Singapore','SG'),
	(201,'荷属圣马丁','Sint Maarten (Dutch)','SX'),
	(202,'斯洛伐克','Slovakia','SK'),
	(203,'斯洛文尼亚','Slovenia','SI'),
	(204,'所罗门群岛','Solomon Islands','SB'),
	(205,'索马里','Somalia','SO'),
	(206,'南非','South Africa','ZA'),
	(207,'南乔治亚和南桑威奇群岛','South Georgia and the South Sandwich Islands','GS'),
	(208,'韩国','South Korea','KR'),
	(209,'南苏丹','South Sudan','SS'),
	(210,'西班牙','Spain','ES'),
	(211,'斯里兰卡','Sri Lanka','LK'),
	(212,'苏丹','Sudan','SD'),
	(213,'苏里南','Suriname','SR'),
	(214,'挪威 斯瓦尔巴群岛和扬马延岛','Svalbard and Jan Mayen','SJ'),
	(215,'斯威士兰','Swaziland','SZ'),
	(216,'瑞典','Sweden','SE'),
	(217,'瑞士','Switzerland','CH'),
	(218,'叙利亚','Syria','SY'),
	(219,'台湾','Taiwan','TW'),
	(220,'塔吉克斯坦','Tajikistan','TJ'),
	(221,'坦桑尼亚','Tanzania','TZ'),
	(222,'泰国','Thailand','TH'),
	(223,'东帝汶','Timor-Leste','TL'),
	(224,'多哥','Togo','TG'),
	(225,'托克劳','Tokelau','TK'),
	(226,'汤加','Tonga','TO'),
	(227,'特立尼达和多巴哥','Trinidad and Tobago','TT'),
	(228,'突尼斯','Tunisia','TN'),
	(229,'土耳其','Turkey','TR'),
	(230,'土库曼斯坦','Turkmenistan','TM'),
	(231,'特克斯和凯科斯群岛','Turks and Caicos Islands','TC'),
	(232,'图瓦卢','Tuvalu','TV'),
	(233,'乌干达','Uganda','UG'),
	(234,'乌克兰','Ukraine','UA'),
	(235,'阿联酋','United Arab Emirates','AE'),
	(236,'英国','United Kingdom','GB'),
	(237,'美国','United States','US'),
	(238,'美国本土外小岛屿','United States Minor Outlying Islands','UM'),
	(239,'乌拉圭','Uruguay','UY'),
	(240,'乌兹别克斯坦','Uzbekistan','UZ'),
	(241,'瓦努阿图','Vanuatu','VU'),
	(242,'梵蒂冈','Vatican City','VA'),
	(243,'委内瑞拉','Venezuela','VE'),
	(244,'越南','Viet Nam','VN'),
	(245,'英属维尔京群岛','Virgin Islands (U.K.)','VG'),
	(246,'美属维尔京群岛','Virgin Islands (U.S.)','VI'),
	(247,'瓦利斯和富图纳','Wallis and Futuna','WF'),
	(248,'阿拉伯撒哈拉民主共和国','Western Sahara','EH'),
	(249,'也门','Yemen','YE'),
	(250,'赞比亚','Zambia','ZM'),
	(251,'津巴布韦','Zimbabwe','ZW'),
	(252,'阿森松岛','Ascension Island','AC'),
	(254,'扎伊尔 / 萨伊','The Democratic Republic Of The Congo','ZR'),
	(255,'荷属安的列斯群岛','Netherlands Antilles','AN'),
	(256,'桑给巴尔／占吉巴','Zanzibar','EAZ');

/*!40000 ALTER TABLE `erp_country` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table erp_currency
# ------------------------------------------------------------

DROP TABLE IF EXISTS `erp_currency`;

CREATE TABLE `erp_currency` (
  `currency_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '货币ID',
  `currency_name` varchar(25) NOT NULL COMMENT '货币名称',
  `currency_code` varchar(5) NOT NULL COMMENT '货币编码',
  `currency_symbol` varchar(10) NOT NULL COMMENT '货币符号',
  `currency_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '货币状态：0：删除；1：启用中',
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `create_userid` int(11) NOT NULL,
  `update_userid` int(11) NOT NULL,
  PRIMARY KEY (`currency_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='货币列表';



# Dump of table erp_currency_exchange
# ------------------------------------------------------------

DROP TABLE IF EXISTS `erp_currency_exchange`;

CREATE TABLE `erp_currency_exchange` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '货币汇率ID',
  `exchange_from` char(3) NOT NULL DEFAULT '' COMMENT '要被兑换的货币',
  `exchange_to` char(3) NOT NULL DEFAULT '' COMMENT '兑换成什么货币',
  `exchange_remark` varchar(45) NOT NULL COMMENT '什么货币兑什么货币',
  `exchange_status` tinyint(1) NOT NULL COMMENT '汇率状态：0：已关闭；1：正常使用',
  `exchange_rate` decimal(10,8) NOT NULL COMMENT '汇率值',
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `create_userid` int(11) NOT NULL,
  `update_userid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `currency_rate` (`exchange_from`,`exchange_to`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table erp_depot_out
# ------------------------------------------------------------

DROP TABLE IF EXISTS `erp_depot_out`;

CREATE TABLE `erp_depot_out` (
  `depot_out_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '出库单ID',
  `depot_out_code` varchar(20) NOT NULL COMMENT '出库单编码',
  `depot_out_time` int(11) NOT NULL COMMENT '出库单完成时间',
  `depot_out_type` tinyint(1) NOT NULL COMMENT '出库单来源类型：1：销售出库；2：包材领用出库；3：内部申领出库；4：采购退货出库',
  `shop_id` int(11) NOT NULL COMMENT '店铺ID／站点ID',
  `from_order` json NOT NULL COMMENT '上层单据编码',
  `warehouse_id` int(11) NOT NULL COMMENT '仓库ID',
  `transport_id` int(11) NOT NULL COMMENT '物流ID',
  `tracking_number` varchar(20) NOT NULL COMMENT '物流追踪号',
  `receipt_info` json NOT NULL COMMENT '出库单收件人信息',
  `flag_lable` tinyint(1) NOT NULL COMMENT '单据旗帜',
  `order_remark` text NOT NULL COMMENT '订单备注',
  `order_status` tinyint(1) NOT NULL COMMENT '单据状态：-1:已删除；0:未处理；1：处理中；2:处理完毕',
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `create_userid` int(11) NOT NULL,
  `update_userid` int(11) NOT NULL,
  PRIMARY KEY (`depot_out_id`),
  UNIQUE KEY `do_code_UNIQUE` (`depot_out_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='出库单列表';



# Dump of table erp_depot_out_product
# ------------------------------------------------------------

DROP TABLE IF EXISTS `erp_depot_out_product`;

CREATE TABLE `erp_depot_out_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `depot_out_code` varchar(20) NOT NULL DEFAULT '' COMMENT '出库单ID',
  `product_code` int(11) NOT NULL COMMENT '商品编码',
  `out_quantity` int(11) NOT NULL COMMENT '出库数量',
  `out_price` decimal(10,4) NOT NULL COMMENT '出库商品加权平均价，举例：销售单来源的，商品售价的加权平均价',
  `cost_price` decimal(10,4) NOT NULL COMMENT '出库商品成本价',
  `gifts_number` int(11) NOT NULL COMMENT '赠品数量',
  `product_remark` varchar(255) NOT NULL COMMENT '出库商品备注',
  `product_status` tinyint(1) NOT NULL COMMENT '出库商品状态：0:已删除；1:正确；2:异常，等待上级单据人员处理',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table erp_export_log
# ------------------------------------------------------------

DROP TABLE IF EXISTS `erp_export_log`;

CREATE TABLE `erp_export_log` (
  `export_id` int(11) NOT NULL AUTO_INCREMENT,
  `export_from` varchar(255) NOT NULL COMMENT '在哪发起导出',
  `file_path` varchar(255) NOT NULL COMMENT '导出的文件相对路径',
  `export_time` int(11) NOT NULL COMMENT '导出时间',
  `export_userid` int(11) NOT NULL COMMENT '导出人ID',
  PRIMARY KEY (`export_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



# Dump of table erp_feature
# ------------------------------------------------------------

DROP TABLE IF EXISTS `erp_feature`;

CREATE TABLE `erp_feature` (
  `feature_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '规格／特性ID',
  `feature_name` varchar(45) NOT NULL COMMENT '规格名称／特性名称',
  `feature_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '-1：已删除；0：未启用；1：启用中',
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `create_userid` int(11) NOT NULL,
  `update_userid` int(11) NOT NULL,
  PRIMARY KEY (`feature_id`),
  UNIQUE KEY `feature_name_UNIQUE` (`feature_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='规格／特性列表';

LOCK TABLES `erp_feature` WRITE;
/*!40000 ALTER TABLE `erp_feature` DISABLE KEYS */;

INSERT INTO `erp_feature` (`feature_id`, `feature_name`, `feature_status`, `create_time`, `update_time`, `create_userid`, `update_userid`)
VALUES
	(1,'颜色',1,1519395847,1519397085,1,1),
	(2,'材质',1,0,1519397097,0,1),
	(3,'液体',1,0,1519397132,0,1);

/*!40000 ALTER TABLE `erp_feature` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table erp_feature_value
# ------------------------------------------------------------

DROP TABLE IF EXISTS `erp_feature_value`;

CREATE TABLE `erp_feature_value` (
  `value_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '规格值ID／特性值ID',
  `feature_id` int(11) NOT NULL COMMENT '规格ID／特性ID',
  `value_name` varchar(45) NOT NULL DEFAULT '' COMMENT '规格值／特性值',
  `value_code` varchar(45) NOT NULL DEFAULT '' COMMENT '规格编码／特性编码',
  `value_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '-1：已删除；0：未启用；1：启用中',
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `create_userid` int(11) NOT NULL,
  `update_userid` int(11) NOT NULL,
  PRIMARY KEY (`value_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='规格值／特性值列表';

LOCK TABLES `erp_feature_value` WRITE;
/*!40000 ALTER TABLE `erp_feature_value` DISABLE KEYS */;

INSERT INTO `erp_feature_value` (`value_id`, `feature_id`, `value_name`, `value_code`, `value_status`, `create_time`, `update_time`, `create_userid`, `update_userid`)
VALUES
	(1,1,'red','#@!3123',1,1519976600,0,1,0),
	(2,2,'red27','#@!3123277',1,1519976965,0,1,0);

/*!40000 ALTER TABLE `erp_feature_value` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table erp_fee_log
# ------------------------------------------------------------

DROP TABLE IF EXISTS `erp_fee_log`;

CREATE TABLE `erp_fee_log` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '费用记录ID',
  `type_id` int(11) NOT NULL COMMENT '费用记录类型',
  `from_type` varchar(45) NOT NULL DEFAULT 'sales_order' COMMENT '费用记录来源单据类型：sales_order ：销售单；',
  `from_id` int(11) NOT NULL COMMENT '来源单据ID',
  `log_value` int(11) NOT NULL COMMENT '费用数值',
  `log_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '费用记录状态：0:已删除；1:使用中',
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `create_userid` int(11) NOT NULL,
  `update_userid` int(11) NOT NULL,
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='费用记录列表';



# Dump of table erp_fee_type
# ------------------------------------------------------------

DROP TABLE IF EXISTS `erp_fee_type`;

CREATE TABLE `erp_fee_type` (
  `type_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '费用类型ID',
  `type_name` varchar(45) NOT NULL COMMENT '费用类型名称',
  `type_desc` varchar(255) NOT NULL COMMENT '费用类型描述',
  `type_status` tinyint(1) NOT NULL COMMENT '费用类型状态：0：未启用；1：启用中',
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `create_userid` int(11) NOT NULL,
  `update_userid` int(11) NOT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='费用类型列表';



# Dump of table erp_goods
# ------------------------------------------------------------

DROP TABLE IF EXISTS `erp_goods`;

CREATE TABLE `erp_goods` (
  `goods_id` int(11) NOT NULL AUTO_INCREMENT,
  `goods_name` varchar(255) NOT NULL DEFAULT '' COMMENT '货品名称',
  `goods_short_name` varchar(125) NOT NULL DEFAULT '' COMMENT '货品简称',
  `goods_code` varchar(20) NOT NULL COMMENT '货品编码',
  `goods_keyword` json NOT NULL COMMENT '货品关键词',
  `basic_price` decimal(10,4) NOT NULL DEFAULT '0.0000' COMMENT '货品基价',
  `goods_desc` text NOT NULL COMMENT '货品描述',
  `goods_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '-1：已删除；0：未启用；1：启用中',
  `brand_id` int(11) NOT NULL COMMENT '品牌ID',
  `category_ids` json NOT NULL COMMENT '货品分类ID',
  `feature_ids` json NOT NULL COMMENT '货品规格ID／特性ID',
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `create_userid` int(11) NOT NULL,
  `update_userid` int(11) NOT NULL,
  PRIMARY KEY (`goods_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='货品列表';



# Dump of table erp_inventory frozen
# ------------------------------------------------------------

DROP TABLE IF EXISTS `erp_inventory frozen`;

CREATE TABLE `erp_inventory frozen` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '冻结记录ID',
  `from_type` varchar(20) NOT NULL DEFAULT '' COMMENT '来源类型，sales_orde:销售单',
  `from_order` varchar(20) NOT NULL DEFAULT '' COMMENT '来源单据',
  `shop_id` int(11) NOT NULL COMMENT '店铺ID／站点ID',
  `product_code` varchar(20) NOT NULL DEFAULT '' COMMENT '商品编码',
  `number` varchar(45) NOT NULL DEFAULT '' COMMENT '冻结数量/占用数量',
  `create_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='库存冻结记录表';



# Dump of table erp_keyword
# ------------------------------------------------------------

DROP TABLE IF EXISTS `erp_keyword`;

CREATE TABLE `erp_keyword` (
  `key_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '关键词库ID',
  `key_name` varchar(45) NOT NULL COMMENT '关键词词库标题',
  `key_pool` json NOT NULL COMMENT '词库内容',
  `key_status` tinyint(1) NOT NULL COMMENT '关键词词库状态：0:弃用；1:启用中',
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `create_userid` int(11) NOT NULL,
  `update_userid` int(11) NOT NULL,
  PRIMARY KEY (`key_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='关键词库列表';



# Dump of table erp_parcel
# ------------------------------------------------------------

DROP TABLE IF EXISTS `erp_parcel`;

CREATE TABLE `erp_parcel` (
  `parce_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '包裹单ID',
  `parcel_code` varchar(20) NOT NULL COMMENT '包裹单编码',
  `shop_id` int(11) NOT NULL COMMENT '店铺ID／站点ID',
  `parcel_time` int(11) NOT NULL COMMENT '包裹发货时间',
  `warehouse_id` int(11) NOT NULL COMMENT '仓库ID',
  `transport_id` int(11) NOT NULL COMMENT '物流ID',
  `tracking_number` varchar(20) NOT NULL COMMENT '物流追踪号',
  `parce_remark` varchar(255) NOT NULL COMMENT '物流包裹单备注',
  `receipt_info` json NOT NULL,
  `weight_calc` int(11) NOT NULL COMMENT '内部计算重量，单位g',
  `weight_actual` int(11) NOT NULL COMMENT '实际称重，单位g',
  `parcel_status` tinyint(1) NOT NULL COMMENT '物流包裹单状体：0：已删除；1：正常状态；2：已经发货',
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `create_userid` int(11) NOT NULL,
  `update_userid` int(11) NOT NULL,
  PRIMARY KEY (`parce_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='物流包裹单';



# Dump of table erp_parcel_order
# ------------------------------------------------------------

DROP TABLE IF EXISTS `erp_parcel_order`;

CREATE TABLE `erp_parcel_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parce_code` varchar(20) NOT NULL DEFAULT '' COMMENT '物流包裹单编码',
  `depot_out_code` varchar(20) NOT NULL DEFAULT '' COMMENT '出库单编码',
  `from_order` varchar(45) NOT NULL DEFAULT '' COMMENT '终端订单ID',
  `is_main` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否是主出库单',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table erp_platform
# ------------------------------------------------------------

DROP TABLE IF EXISTS `erp_platform`;

CREATE TABLE `erp_platform` (
  `platform_id` int(11) NOT NULL COMMENT '平台ID',
  `platform_type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '平台类型：1：自营平台；2：第三方平台',
  `platform_code` varchar(20) NOT NULL COMMENT '平台编码',
  `platform_name` varchar(45) NOT NULL COMMENT '平台名称',
  `platform_sort` tinyint(1) NOT NULL COMMENT '平台排序',
  `platform_email` json NOT NULL COMMENT '平台通知接收邮箱',
  `plaform_remark` varchar(255) NOT NULL COMMENT '平台备注，请放入web地址和api地址',
  `platform_status` tinyint(1) NOT NULL COMMENT '平台状态：：-1：已删除；0：未启用；1：启用中',
  `autho_type` tinyint(1) NOT NULL COMMENT '平台授权类型：0：无需授权；1：自动授权续租；2：手动授权',
  `manager_id` int(11) NOT NULL COMMENT '平台主管',
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `create_userid` int(11) NOT NULL,
  `update_userid` int(11) NOT NULL,
  PRIMARY KEY (`platform_id`),
  UNIQUE KEY `platform_code` (`platform_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='多平台列表';



# Dump of table erp_platform_item
# ------------------------------------------------------------

DROP TABLE IF EXISTS `erp_platform_item`;

CREATE TABLE `erp_platform_item` (
  `item_id` int(11) NOT NULL,
  `list_id` int(11) NOT NULL COMMENT 'listing的内部ID',
  `item_sku` varchar(45) NOT NULL DEFAULT '' COMMENT 'ItemSKU',
  `item_price` int(11) NOT NULL COMMENT 'Item售卖单价',
  `item_quantity` int(11) NOT NULL COMMENT 'item在线数量',
  `item_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '刊登状态：-1:异常状态；0:正常下线／到期下线；1:在线售卖中',
  `create_time` int(11) NOT NULL COMMENT '刊登时间',
  `update_time` int(11) NOT NULL,
  `create_userid` int(11) NOT NULL,
  `update_userid` int(11) NOT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='多平台线上商品列表';



# Dump of table erp_platform_listing
# ------------------------------------------------------------

DROP TABLE IF EXISTS `erp_platform_listing`;

CREATE TABLE `erp_platform_listing` (
  `list_id` int(11) NOT NULL COMMENT '多平台产品ID',
  `shop_id` int(11) NOT NULL COMMENT '店铺ID／站点ID',
  `listing_id` varchar(45) NOT NULL COMMENT '刊登的产品ID',
  `listing_title` varchar(255) NOT NULL COMMENT '刊登标题',
  `listing_url` varchar(255) NOT NULL COMMENT '刊登地址',
  `listing_desc` text NOT NULL COMMENT '刊登内容',
  `listing_status` tinyint(1) NOT NULL COMMENT '刊登状态：-1:异常状态；0:正常下线／到期下线；1:在线售卖中',
  `create_time` int(11) NOT NULL COMMENT '刊登时间',
  `update_time` int(11) NOT NULL,
  `create_userid` int(11) NOT NULL,
  `update_userid` int(11) NOT NULL,
  PRIMARY KEY (`list_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='多平台线上产品列表';



# Dump of table erp_platform_order
# ------------------------------------------------------------

DROP TABLE IF EXISTS `erp_platform_order`;

CREATE TABLE `erp_platform_order` (
  `id` int(11) NOT NULL COMMENT '订单内部ID',
  `shop_id` int(11) NOT NULL COMMENT '店铺ID／站点ID',
  `order_id` varchar(50) NOT NULL COMMENT '订单外部ID',
  `buyer_id` varchar(125) NOT NULL COMMENT '买家登录ID',
  `buyer_name` varchar(255) NOT NULL COMMENT '买家登录名',
  `buyer_email` varchar(255) NOT NULL COMMENT '买家邮箱',
  `receipt_country_code` varchar(5) NOT NULL COMMENT '收件人国家编码',
  `receipt_province` varchar(255) NOT NULL COMMENT '收件人省份／州',
  `receipt_city` varchar(255) NOT NULL COMMENT '收件人城市',
  `receipt_area` varchar(255) NOT NULL COMMENT '收件人地区',
  `receipt_address` varchar(255) NOT NULL COMMENT '收件人街道地址',
  `receipt_zipcode` varchar(45) NOT NULL COMMENT '收件人邮政编码',
  `receipt_name` varchar(255) NOT NULL DEFAULT '' COMMENT '收件人名称',
  `receipt_phone` varchar(45) NOT NULL DEFAULT '' COMMENT '收件人联系方式',
  `order_amount` int(11) NOT NULL DEFAULT '0' COMMENT '订单总金额，除删减项目外',
  `goods_amount` int(11) NOT NULL DEFAULT '0' COMMENT '货品总额',
  `freight_amount` int(11) NOT NULL DEFAULT '0' COMMENT '运费总金额',
  `discount_amount` int(11) NOT NULL DEFAULT '0' COMMENT '折扣总金额，等于订单总金额-实际支付金额',
  `payment_amount` int(11) NOT NULL DEFAULT '0' COMMENT '实际支付金额',
  `payment_type` varchar(45) NOT NULL DEFAULT '0' COMMENT '支付方式',
  `payment_currency` varchar(45) NOT NULL COMMENT '支付币种',
  `receipt_country_name` varchar(45) NOT NULL COMMENT '收件人国家全称',
  `payment_status` varchar(45) NOT NULL COMMENT '支付状态',
  `shipment_method` json NOT NULL COMMENT '物流方式',
  `shipment_status` tinyint(1) NOT NULL COMMENT '发货方式',
  `order_status` varchar(45) NOT NULL COMMENT '订单状态',
  `order_memo` text NOT NULL COMMENT '订单留言',
  `order_remark` varchar(255) NOT NULL COMMENT '订单备注',
  `order_step` tinyint(1) NOT NULL DEFAULT '0' COMMENT '订单当前步骤\n0多平台订单\n1销售单\n2出库单\n3物流包裹单',
  `step_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '步骤状态：-1：已关闭；0：未处理；1：启用中；2：处理完成等待进入一下单据',
  `order_time` int(11) NOT NULL COMMENT '下单时间',
  `payment_time` int(11) NOT NULL COMMENT '订单付款时间',
  `modified_time` int(11) NOT NULL COMMENT '订单最后更新时间',
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `create_userid` int(11) NOT NULL,
  `update_userid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `order_mark` (`shop_id`,`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='平台订单列表';



# Dump of table erp_platform_order_item
# ------------------------------------------------------------

DROP TABLE IF EXISTS `erp_platform_order_item`;

CREATE TABLE `erp_platform_order_item` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `po_id` int(11) NOT NULL COMMENT '多平台订单ID',
  `listing_id` varchar(45) NOT NULL COMMENT '平台货品listing id',
  `item_sku` varchar(45) NOT NULL COMMENT '平台商品SKU',
  `order_quantity` int(11) NOT NULL COMMENT '购买数量',
  `gifts_quantity` int(11) NOT NULL DEFAULT '0' COMMENT '赠送数量',
  `freight_amount` decimal(10,4) NOT NULL DEFAULT '0.0000' COMMENT '运费总金额',
  `sales_price` decimal(10,4) NOT NULL DEFAULT '0.0000' COMMENT '售卖单价',
  `deal_price` decimal(10,4) NOT NULL DEFAULT '0.0000' COMMENT '成交单价',
  `item_memo` varchar(255) NOT NULL COMMENT '买家商品备注',
  `item_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '-1:异常；0:',
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table erp_platform_shop
# ------------------------------------------------------------

DROP TABLE IF EXISTS `erp_platform_shop`;

CREATE TABLE `erp_platform_shop` (
  `shop_id` int(11) NOT NULL COMMENT '店铺ID／站点ID',
  `platform_id` int(11) NOT NULL COMMENT '平台ID',
  `shop_code` varchar(45) NOT NULL COMMENT '店铺编码',
  `shop_name` varchar(45) NOT NULL COMMENT '店铺名称',
  `currency_id` int(11) NOT NULL COMMENT '主币种',
  `shop_url` varchar(255) NOT NULL COMMENT '店铺地址／站点地址',
  `shop_config` json NOT NULL COMMENT '店铺接口配置／站点接口配置',
  `shop_remark` varchar(45) NOT NULL COMMENT '店铺备注／站点备注',
  `shop_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '店铺状态／站点状态：-1：已删除；0：未启用；1：启用中',
  `api_status` tinyint(1) NOT NULL COMMENT '接口状态：未启用；1：启用中',
  `warehouse_id` int(11) NOT NULL COMMENT '默认仓库',
  `manager_id` json NOT NULL COMMENT '运营ID',
  PRIMARY KEY (`shop_id`),
  UNIQUE KEY `shop_code_UNIQUE` (`shop_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='平台店铺／站点列表';



# Dump of table erp_platform_sync
# ------------------------------------------------------------

DROP TABLE IF EXISTS `erp_platform_sync`;

CREATE TABLE `erp_platform_sync` (
  `sync_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '同步记录ID',
  `shop_id` int(11) NOT NULL COMMENT '店铺ID／站点ID',
  `order_id` varchar(50) NOT NULL COMMENT '外部订单ID',
  `transport_id` int(11) NOT NULL COMMENT '物流ID',
  `tracking_number` varchar(45) NOT NULL COMMENT '物流追踪号',
  `shipment_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '发货情况：1：全部发货；2：部分发货',
  `sync_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '同步状态：0：未开始同步，1:同步中',
  `done_status` tinyint(1) NOT NULL COMMENT '-1:处理失败；0:未处理；1:处理成功：2:手动强制处理',
  `callback` text NOT NULL COMMENT '接口数据',
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `create_userid` int(11) NOT NULL,
  `update_userid` int(11) NOT NULL,
  PRIMARY KEY (`sync_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='多平台订单同步列表';



# Dump of table erp_poi
# ------------------------------------------------------------

DROP TABLE IF EXISTS `erp_poi`;

CREATE TABLE `erp_poi` (
  `poi_id` int(11) NOT NULL AUTO_INCREMENT,
  `platform_id` int(11) NOT NULL COMMENT '多平台ID',
  `buyer_id` varchar(125) NOT NULL COMMENT '买家ID',
  `buyer_name` varchar(255) NOT NULL COMMENT '买家登录名',
  `buyer_email` varchar(255) NOT NULL COMMENT '买家邮箱',
  `receipt_country_code` varchar(5) NOT NULL COMMENT '收件人国家代码',
  `receipt_province` varchar(255) NOT NULL DEFAULT '' COMMENT '收件人省份／州',
  `receipt_city` varchar(255) NOT NULL DEFAULT '' COMMENT '收件人城市',
  `receipt_area` varchar(255) NOT NULL DEFAULT '' COMMENT '收件人地区',
  `receipt_address` varchar(255) NOT NULL DEFAULT '' COMMENT '收件人街道地址',
  `receipt_name` varchar(255) NOT NULL DEFAULT '',
  `receipt_phone` varchar(45) NOT NULL,
  `poi_level` tinyint(1) NOT NULL DEFAULT '1' COMMENT '黑名单等级：1：疑似诈骗；2:确认诈骗',
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `create_userid` int(11) NOT NULL,
  `update_userid` int(11) NOT NULL,
  `poi_status` tinyint(1) NOT NULL,
  PRIMARY KEY (`poi_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='POI黑名单列表';



# Dump of table erp_post_log
# ------------------------------------------------------------

DROP TABLE IF EXISTS `erp_post_log`;

CREATE TABLE `erp_post_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `refer_ip` int(11) NOT NULL COMMENT 'ip地址',
  `route` varchar(100) NOT NULL COMMENT '路由地址',
  `server_info` json DEFAULT NULL,
  `post_info` json DEFAULT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `create_userid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table erp_product
# ------------------------------------------------------------

DROP TABLE IF EXISTS `erp_product`;

CREATE TABLE `erp_product` (
  `product_id` int(11) NOT NULL COMMENT '商品ID',
  `goods_id` int(11) NOT NULL COMMENT '货品ID',
  `product_code` varchar(20) NOT NULL DEFAULT '' COMMENT '商品编码',
  `product_name` varchar(255) NOT NULL DEFAULT '' COMMENT '商品名称',
  `product_short_name` varchar(125) NOT NULL DEFAULT '' COMMENT '商品简称',
  `product_keyword` json NOT NULL COMMENT '商品关键字',
  `product_desc` json NOT NULL COMMENT '商品描述',
  `cost_price` decimal(10,4) NOT NULL DEFAULT '0.0000' COMMENT '商品成本价',
  `feature_value_ids` json NOT NULL COMMENT '规格值／特性值',
  `product_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '-1：已删除；0：未启用；1：启用中',
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `create_userid` int(11) NOT NULL,
  `update_userid` int(11) NOT NULL,
  PRIMARY KEY (`product_id`),
  UNIQUE KEY `product_code_UNIQUE` (`product_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='商品列表';



# Dump of table erp_product_log
# ------------------------------------------------------------

DROP TABLE IF EXISTS `erp_product_log`;

CREATE TABLE `erp_product_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `refer_ip` int(11) NOT NULL COMMENT 'IP地址',
  `product_id` int(11) NOT NULL COMMENT '商品ID',
  `summary` varchar(1000) NOT NULL COMMENT '修改摘要',
  `detail` json DEFAULT NULL COMMENT '商品旧数据',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `create_userid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table erp_province
# ------------------------------------------------------------

DROP TABLE IF EXISTS `erp_province`;

CREATE TABLE `erp_province` (
  `province_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '省份ID／州ID',
  `country_id` int(11) NOT NULL COMMENT '国家ID',
  `province_name` varchar(100) NOT NULL COMMENT '省份名称／州名称',
  PRIMARY KEY (`province_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table erp_sales_order
# ------------------------------------------------------------

DROP TABLE IF EXISTS `erp_sales_order`;

CREATE TABLE `erp_sales_order` (
  `sales_order_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '销售单ID',
  `sales_order_code` varchar(20) NOT NULL DEFAULT '' COMMENT '销售单编码',
  `sales_order_time` int(11) NOT NULL COMMENT '销售时间',
  `warehouse_id` int(11) NOT NULL COMMENT '销售默认仓库',
  `transport_id` int(11) NOT NULL COMMENT '物流ID',
  `tracking_number` json NOT NULL COMMENT '物流追踪号',
  `shop_id` int(11) NOT NULL COMMENT '店铺ID',
  `from_order` varchar(50) NOT NULL DEFAULT '' COMMENT '店铺订单ID',
  `buyer_id` varchar(125) NOT NULL COMMENT '买家登录ID',
  `buyer_name` varchar(255) NOT NULL COMMENT '买家登录名',
  `buyer_email` varchar(255) NOT NULL COMMENT '买家邮箱',
  `receipt_country_code` varchar(5) NOT NULL COMMENT '收件人国家编码',
  `receipt_country_name` varchar(45) NOT NULL COMMENT '收件人国家全称',
  `receipt_province` varchar(255) NOT NULL COMMENT '收件人省份／州',
  `receipt_city` varchar(255) NOT NULL COMMENT '收件人城市',
  `receipt_area` varchar(255) NOT NULL COMMENT '收件人地区',
  `receipt_address` varchar(255) NOT NULL COMMENT '收件人街道地址',
  `receipt_zipcode` varchar(45) NOT NULL COMMENT '收件人邮政编码',
  `receipt_name` varchar(255) NOT NULL DEFAULT '' COMMENT '收件人名称',
  `receipt_phone` varchar(45) NOT NULL DEFAULT '' COMMENT '收件人联系方式',
  `order_amount` int(11) NOT NULL DEFAULT '0' COMMENT '订单总金额，除删减项目外',
  `goods_amount` int(11) NOT NULL DEFAULT '0' COMMENT '货品总额',
  `freight_amount` int(11) NOT NULL DEFAULT '0' COMMENT '运费总金额',
  `discount_amount` int(11) NOT NULL DEFAULT '0' COMMENT '折扣总金额，等于订单总金额-实际支付金额',
  `payment_amount` int(11) NOT NULL DEFAULT '0' COMMENT '实际支付金额',
  `payment_type` varchar(45) NOT NULL DEFAULT '0' COMMENT '支付方式',
  `payment_currency` varchar(45) NOT NULL COMMENT '支付币种',
  `shipment_method` json NOT NULL COMMENT '物流方式',
  `order_status` varchar(45) NOT NULL COMMENT '订单状态',
  `order_memo` text NOT NULL COMMENT '订单留言',
  `order_remark` varchar(255) NOT NULL COMMENT '订单备注',
  `step_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '步骤状态：-1：已关闭；0：未处理；1：启用中；2：处理完成等待进入一下单据',
  `order_step` tinyint(1) NOT NULL DEFAULT '1' COMMENT '订单当前步骤\n1销售单\n2出库单\n3物流包裹单',
  `order_time` int(11) NOT NULL COMMENT '下单时间',
  `payment_time` int(11) NOT NULL COMMENT '订单付款时间',
  `modified_time` int(11) NOT NULL COMMENT '订单最后更新时间',
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `create_userid` int(11) NOT NULL,
  `update_userid` int(11) NOT NULL,
  PRIMARY KEY (`sales_order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='销售订单';



# Dump of table erp_sales_order_product
# ------------------------------------------------------------

DROP TABLE IF EXISTS `erp_sales_order_product`;

CREATE TABLE `erp_sales_order_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sales_order_code` varchar(20) NOT NULL DEFAULT '' COMMENT '销售单ID',
  `product_code` varchar(20) NOT NULL COMMENT '商品编码',
  `order_quantity` int(11) NOT NULL COMMENT '购买数量',
  `sended_quantity` int(11) NOT NULL DEFAULT '0' COMMENT '当前已发货数量',
  `gifs_number` int(11) NOT NULL COMMENT '赠送数量',
  `cut_number` int(11) NOT NULL DEFAULT '0' COMMENT '删减数量',
  `sales_price` decimal(10,4) NOT NULL COMMENT '售卖单价',
  `deal_price` decimal(10,4) NOT NULL COMMENT '成交单价',
  `cost_price` decimal(10,4) NOT NULL COMMENT '成本单价',
  `product_remark` varchar(255) NOT NULL COMMENT '商品备注',
  `product_status` tinyint(1) NOT NULL,
  `freight_amount` decimal(10,4) NOT NULL COMMENT '商品总运费',
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `create_userid` int(11) NOT NULL,
  `update_userid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table erp_shipping_cart
# ------------------------------------------------------------

DROP TABLE IF EXISTS `erp_shipping_cart`;

CREATE TABLE `erp_shipping_cart` (
  `cart_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '购物车记录ID',
  `product_code` varchar(20) NOT NULL COMMENT '商品编码',
  `supplier_id` int(11) NOT NULL COMMENT '供应商ID',
  `number` int(11) NOT NULL COMMENT '预采购数量',
  `create_time` int(11) NOT NULL,
  `create_userid` int(11) NOT NULL,
  PRIMARY KEY (`cart_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table erp_supplier
# ------------------------------------------------------------

DROP TABLE IF EXISTS `erp_supplier`;

CREATE TABLE `erp_supplier` (
  `supplier_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '供应商ID',
  `supplier_name` varchar(255) NOT NULL COMMENT '供应商名称',
  `contact_name` varchar(45) NOT NULL COMMENT '供应商联系人',
  `contact_phone` varchar(45) NOT NULL COMMENT '供应商联系人电话',
  `contact_email` varchar(255) NOT NULL COMMENT '供应商联系邮箱',
  `contact_qq` varchar(45) NOT NULL COMMENT '供应商联系QQ',
  `province_id` int(11) NOT NULL COMMENT '供应商省份ID',
  `city_id` int(11) NOT NULL COMMENT '供应商城市ID',
  `area_id` int(11) NOT NULL COMMENT '供应商地区县ID',
  `street_address` varchar(255) NOT NULL COMMENT '供应商街道地址',
  `website_url` varchar(255) NOT NULL COMMENT '供应商官网',
  `supplier_status` tinyint(1) NOT NULL COMMENT '供应商状态：0：已弃用；1：启用中',
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `create_userid` int(11) NOT NULL,
  `update_userid` int(11) NOT NULL,
  PRIMARY KEY (`supplier_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='供应商列表';



# Dump of table erp_supplier_product
# ------------------------------------------------------------

DROP TABLE IF EXISTS `erp_supplier_product`;

CREATE TABLE `erp_supplier_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_id` int(11) NOT NULL COMMENT '供应商ID',
  `goods_code` varchar(20) NOT NULL COMMENT '货品编码',
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `create_userid` int(11) NOT NULL,
  `update_userid` int(11) NOT NULL,
  `relation_status` tinyint(1) NOT NULL COMMENT '供应商货品状态：0：已下架；1:扔有售',
  `supply_price` json NOT NULL COMMENT '供应价格',
  PRIMARY KEY (`id`),
  UNIQUE KEY `supplier_goods` (`supplier_id`,`goods_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='供应商货品关系';



# Dump of table erp_transport
# ------------------------------------------------------------

DROP TABLE IF EXISTS `erp_transport`;

CREATE TABLE `erp_transport` (
  `transport_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '物流ID',
  `provider_id` int(11) NOT NULL COMMENT '物流服务商ID',
  `transport_code` varchar(20) NOT NULL DEFAULT '' COMMENT '物流编码',
  `transport_name` varchar(45) NOT NULL COMMENT '物流名称',
  `transport_desc` varchar(255) NOT NULL COMMENT '物流简述',
  `transport_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '-1：已删除；0：未启用；1：启用中',
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `create_userid` int(11) NOT NULL,
  `update_userid` int(11) NOT NULL,
  PRIMARY KEY (`transport_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='物流列表';

LOCK TABLES `erp_transport` WRITE;
/*!40000 ALTER TABLE `erp_transport` DISABLE KEYS */;

INSERT INTO `erp_transport` (`transport_id`, `provider_id`, `transport_code`, `transport_name`, `transport_desc`, `transport_status`, `create_time`, `update_time`, `create_userid`, `update_userid`)
VALUES
	(1,8,'SHDHL-Large','SHDHL-Large','内置电：YES\r\n锂电池：混发，比例不超过1:5,每箱电池最多不得超过100PCS\r\n液体：NO\r\n限重：20 ~ 300KGS\r\n其他：不能发纯锂电池，可以一票多件。\r\n以下国家不能走：伊拉克、卡塔尔、阿联酋、泰国、俄罗斯、巴西、印尼、马来西亚、巴林、约旦、科威特、新西兰、澳大利亚、新加坡',0,1425377734,1517965615,1,1),
	(2,4,'SHDHL-SP','SHDHL-SP','内置电：YES\r\n锂电池：混发，比例不超过1:5\r\n液体：NO\r\n限重：20 ~ 300KGS\r\n其他：不能发纯锂电池，\r\n仅限太平洋岛国及非洲等偏远国家',1,1425377761,1506076331,1,1),
	(3,4,'SHDHL-Small','SHDHL-Small','内置电：YES\r\n锂电池：混发，比例不超过1:5\r\n液体：NO\r\n限重：0 ~ 3KGS\r\n其他：不能纯锂电池，\r\n以下国家不能走：伊拉克、卡塔尔、阿联酋、泰国、俄罗斯、巴西、印尼、马来西亚、巴林、约旦、科威特、新西兰、澳大利亚、新加坡',1,1425377848,1550928604,1,1),
	(4,0,'FedEx Small','FedEx Small','',0,1425377879,1468483837,0,0),
	(5,5,'CN E-Packet','CN E-Packet','',1,1425377905,1509689240,0,0),
	(6,7,'HK Register Airmail','HK Register Airmail','电池：NO\r\n液体：NO\r\n限重：0 ~ 2KGS\r\n其他：N/A',1,1425377940,1500019369,0,0),
	(7,5,'CN Register Airmail','CN Register Airmail','',1,1425377970,1488431731,0,0),
	(8,0,'RU Express','RU Express','',0,1425377993,1443415611,0,0),
	(9,5,'EMS Express','EMS Express','',1,1425378029,1488431758,0,0),
	(10,0,'SAL to Russia','SAL to Russia','',0,1425378066,1443415606,0,0),
	(11,0,'UK Airmail','UK Airmail','',0,1425378090,1443415599,0,0),
	(12,6,'ETS to Russia','ETS to Russia','',1,1428978170,1494998407,0,0),
	(13,17,'优速','优速','仅限上海、深圳两仓之间调拨及国内发货使用',1,1429061380,1505980273,0,0),
	(14,6,'深圳','深圳','',1,1429073060,1488431957,0,0),
	(15,12,'Netherlands Airmail','Netherlands Airmail','',1,1429085267,1494998122,0,0),
	(16,8,'汇通·入库','汇通·入库','限制：国内厂家发货到上海仓使用',1,1429166228,1500020136,0,0),
	(17,9,'UPS Express Saver','UPS Express Saver','',1,1429241145,1503473408,1,1),
	(18,10,'鸿速fedex','鸿速fedex','',1,1429871570,1503473542,1,1),
	(19,0,'顺丰(delete)','顺丰(delete)','',0,1431585846,1432551637,0,0),
	(20,6,'远成物流','远成物流','',1,1432113676,1488432062,0,0),
	(21,4,'DHL Express C','DHL Express C','',1,1432454005,1503473325,1,1),
	(23,0,'TNT ','TNT ','',0,1432531297,1432601192,0,0),
	(24,0,'HKTNT','HKTNT','',0,1432705645,1468483880,0,0),
	(25,8,'汇通','汇通','仅限国内批量货物发货使用',1,1432788817,1500020208,0,0),
	(26,0,'顺丰陆运(delete)','顺丰陆运(delete)','',0,1433462048,1443329383,0,0),
	(27,0,'华南小包','华南小包','',0,1433463501,1443329390,0,0),
	(28,11,'台湾专线','台湾专线','',1,1433736323,1503473576,1,1),
	(29,18,'顺丰空运','顺丰空运','次晨',1,1433774283,1505980346,0,0),
	(30,11,'Comone Express','Comone Express','',1,1433809754,1503473586,1,1),
	(31,6,'Pick Up','Pick Up','',1,1434499717,1492744718,0,0),
	(32,6,'上海仓','上海仓','',1,1435970142,1488432128,0,0),
	(33,0,'菲律宾专线','菲律宾专线','',0,1436234041,1443329404,0,0),
	(34,4,'鸿速DHL','鸿速DHL','限制：上海仓只发空瓶子时使用',1,1437961095,1506076445,1,1),
	(35,0,'CiVAP E-liquid','CiVAP E-liquid','',0,1438573095,1441596514,0,0),
	(36,0,'兴源荷兰小包','兴源荷兰小包','',0,1438840428,1443329367,0,0),
	(37,0,'合鸿DHL','合鸿DHL','',0,1439519057,1468483909,0,0),
	(38,4,'AUJOO DHL','AUJOO DHL','',1,1439521120,1503473335,0,0),
	(39,9,'AUJOO UPS','AUJOO UPS','',1,1439521150,1506414498,1,1),
	(40,4,'SNLTO DHL','SNLTO DHL','',1,1439521182,1503473341,1,1),
	(41,9,'SNLTO UPS','SNLTO UPS','',1,1439521216,1503473419,1,1),
	(42,10,'FedEx For Li-lion Ba','FedEx For Li-lion Battery','',1,1439525370,1508121471,1,1),
	(43,4,'HK DHL Express','HK DHL Express','',1,1440578000,1504260899,1,1),
	(44,9,'HK UPS Express','HK UPS Express','',1,1440578030,1503473425,1,1),
	(45,0,'Only CiVAP E-liquid','Only CiVAP E-liquid','',0,1441596474,1470790702,0,0),
	(46,0,'物乐流UPS','物乐流UPS','',0,1441950308,1468483898,0,0),
	(47,0,'等上海','等上海','',0,1443177806,1443178147,0,0),
	(48,0,'等深圳','等深圳','',0,1443177842,1443178152,0,0),
	(49,0,'2仓合并','2仓合并','',0,1443178856,1468483921,0,0),
	(50,0,'2仓合并-等深圳','2仓合并-等深圳','',0,1443247752,1443247836,0,0),
	(51,5,'上海仓e邮宝','上海仓e邮宝','',0,1444618014,1477991935,0,0),
	(52,0,'中通(delete)','中通(delete)','',0,1444960230,1448008879,0,0),
	(53,0,'申通(delete)','申通(delete)','',0,1444960255,1448008886,0,0),
	(54,0,'圆通(delete)','圆通(delete)','',0,1444960323,1448008890,0,0),
	(55,0,'天猫优速','天猫优速','',0,1448008494,1450681986,0,0),
	(56,18,'顺丰陆运','顺丰陆运','次日\r\n次日达：\r\n不可以发液态、电池、内电、含电、含磁',1,1448008554,1506322713,0,0),
	(57,6,'中通','中通','',1,1448008581,1500437089,0,0),
	(58,6,'申通','申通','国内电商平台使用',1,1448008602,1500437102,0,0),
	(59,6,'圆通','圆通','',1,1448008627,1500437113,0,0),
	(60,0,'邮政快递','邮政快递','',0,1448008684,1455781591,0,0),
	(61,5,'EMS','EMS','',0,1448241754,1498036459,0,0),
	(62,4,'SHDHL-Eliquid','SHDHL-Eliquid','内置电：NO\r\n锂电池：NO\r\n液体：YES\r\n限重：0 ~ 100KGS\r\n其他：只发烟液，可以一票多件。申报价值不得超过等值5000元人民币\r\n\r\n以下国家不能走：伊拉克、卡塔尔、阿联酋、泰国、俄罗斯、巴西、印尼、马来西亚、巴林、约旦、科威特、新西兰、澳大利亚、新加坡',1,1449810547,1506306292,1,1),
	(63,11,'Aramex','Aramex','',1,1451295620,1503473592,1,1),
	(64,0,'EURO Airmail','EURO Airmail','',0,1452496435,1468483965,0,0),
	(65,0,'EURO Express','EURO Express','',0,1452496481,1468483972,0,0),
	(66,13,'Singapore Airmail','Singapore Airmail','電池：YES\r\n液体：NO\r\n限重：0 ~ 2KGS\r\n其他：以下國家不走帶電貨 ( 英國 , 意大利, 德國 , 老挝 , 榖埃及) ,如走也是沖貨.',1,1452496517,1500018818,0,0),
	(67,13,'US Express','US Express','電池：YES\r\n液体：NO\r\n限重：0 ~ 2KGS\r\n其他：只限走美國, 可走帶電貨.但掉失件不賠償',1,1452496550,1500018853,0,0),
	(68,5,'邮政快包','邮政快包','',1,1458633799,1488432336,0,0),
	(69,6,'线上Russian Air','线上Russian Air','',1,1459819248,1507535215,0,0),
	(70,4,'HOSTO DHL','HOSTO DHL','',1,1461640968,1503473358,1,1),
	(71,9,'HOSTO UPS','HOSTO UPS','',1,1463976552,1503473430,1,1),
	(72,0,'ehuanyun','ehuanyun','',0,1464684304,1468483992,0,0),
	(73,0,'深圳邮政小包','深圳邮政小包','',0,1464759983,1470790874,0,0),
	(74,6,'博世凯','博世凯','',1,1465374489,1488432373,0,0),
	(75,19,'跨越速运（隔日达）','跨越速运（隔日达）','',1,1467354759,1488432378,0,0),
	(76,6,'线上CN E-Packet','线上CN E-Packet','',1,1467364002,1494998191,0,0),
	(77,6,'线上CN-Register Airmai','线上CN-Register Airmail','',1,1467382842,1494998198,0,0),
	(78,6,'线上AliExpress Standar','线上AliExpress Standard Shipping','电池：YES\r\n液体：NO\r\n限重：0 ~ 2KGS\r\n其他：N/A',1,1467969349,1507534108,0,0),
	(79,4,'YXWL DHL','YXWL DHL','',1,1468482902,1503473365,1,1),
	(80,9,'YXWL UPS','YXWL UPS','',1,1468484065,1503473436,1,1),
	(81,11,'CDEK Express','CDEK Express','',1,1470729943,1503473598,1,1),
	(82,6,'线上AliExpress Saver S','线上AliExpress Saver Shipping','',1,1470793819,1506389144,0,0),
	(83,6,'德邦物流','德邦物流','',1,1473228010,1488432442,0,0),
	(84,19,'跨越速运（次日达）','跨越速运（次日达）','',1,1473643216,1488432448,0,0),
	(85,9,'BSK UPS Express','BSK UPS Express','',1,1473644063,1507074006,1,1),
	(86,18,'HK SF Express','HK SF Express','',1,1473651993,1506048550,0,0),
	(87,6,'AZ Register Airmail','AZ Register Airmail','',1,1474639972,1494998422,0,0),
	(88,9,'KW UPS','KW UPS','',1,1475123548,1503473447,1,1),
	(89,10,'Fedex IP','Fedex IP','',1,1477102696,1503473558,1,1),
	(90,4,'TM DHL','TM DHL','',1,1477279937,1503473370,1,1),
	(91,6,'SCD','SCD','',1,1478489741,1488432571,0,0),
	(92,6,'其他','其他','',1,1478739535,1482891883,0,0),
	(93,9,'UPS for Li-lion Batt','UPS for Li-lion Battery','',1,1478739753,1508121514,1,1),
	(94,4,'SHDHL-MID','SHDHL-MID','内置电：YES\r\n锂电池：混发，比例不超过1:5,每箱电池最多不得超过100PCS\r\n液体：NO\r\n限重：3 ~ 20KGS\r\n其他：不能发纯锂电池，可以一票多件。\r\n以下国家不能走：伊拉克、卡塔尔、阿联酋、泰国、俄罗斯、巴西、印尼、马来西亚、巴林、约旦、科威特、新西兰、澳大利亚、新加坡',1,1478740406,1506420656,1,1),
	(95,4,'SHDHL-SM','SHDHL-SM','内置电：YES\r\n锂电池：混发，比例不超过1:5,每箱电池最多不得超过100PCS\r\n液体：NO\r\n限重：3 ~ 20KGS\r\n其他：不能发纯锂电池，可以一票多件。\r\n以下国家不能走：伊拉克、卡塔尔、阿联酋、泰国、俄罗斯、巴西、印尼、马来西亚、巴林、约旦、科威特、新西兰、澳大利亚、新加坡',1,1478740451,1506076652,1,1),
	(96,14,'HK TNT Express','HK TNT Express','',1,1478740472,1513141907,1,1),
	(97,6,'DXB Register Airmail','DXB Register Airmail','',1,1480585782,1494998431,0,0),
	(98,4,'EWORLDSENSE DHL','EWORLDSENSE DHL','',1,1483001580,1503473390,1,1),
	(99,9,'EWORLDSENSE UPS','EWORLDSENSE UPS','',1,1483001595,1503473458,1,1),
	(100,9,'SCDEX UPS','SCDEX UPS','',1,1484016907,1503473465,1,1),
	(101,6,'良程吉运','良程吉运','',1,1484791551,1484791551,0,0),
	(102,11,'SPSR Express','SPSR Express','',1,1487142706,1503473604,1,1),
	(103,9,'BF UPS','BF UPS','',1,1487658304,1503473470,1,1),
	(104,9,'TCD Express','TCD Express','',1,1487988102,1503473475,1,1),
	(105,4,'BF DHL','BF DHL','',1,1489566493,1503473395,1,1),
	(106,15,'Russia Airmail','Russia Airmail','',1,1489986708,1494998615,0,0),
	(107,5,'France Airmail','France Airmail','',1,1489986726,1489986726,0,0),
	(108,16,'eDS易递宝-线上中邮小包','eDS易递宝-线上中邮小包','',1,1490168343,1490168343,0,0),
	(109,16,'eDS易递宝-香港平邮','eDS易递宝-香港平邮','',1,1490168399,1490168399,0,0),
	(110,6,'Procargo Logistics','Procargo Logistics','',1,1490868177,1490868177,0,0),
	(111,6,'AU Express','AU Express','',1,1490925450,1503624225,0,0),
	(112,6,'NZ Express','NZ Express','',1,1490925466,1503624262,0,0),
	(113,5,'Aprche CN E-Packet','Aprche CN E-Packet','电池：NO\r\n液体：NO\r\n限重：0 ~ 2KGS\r\n其他：只走美國 , 加拿大, 挪威，澳大利亞，德國，法國，法特阿拉伯，英國，以色列，俄羅斯，烏克蘭-11個國家',1,1491012510,1509590547,0,0),
	(114,10,'FedEx for Eliquid','FedEx for Eliquid','',1,1491819033,1505903940,1,1),
	(115,22,'IML Express','IML Express','',1,1492744941,1510622485,0,0),
	(116,6,'天罗货运','天罗货运','',1,1493005956,1493005956,0,0),
	(117,11,'Vietnam Express','Vietnam Express','',1,1493027588,1503473609,1,1),
	(118,11,'Indonesia Express fo','Indonesia Express for battery','',1,1493027602,1503473614,1,1),
	(119,11,'Indonesia Express','Indonesia Express','',1,1493027614,1503473619,1,1),
	(120,9,'BSK UPS for Li-lion ','BSK UPS for Li-lion Battery','电池：YES\r\n液体：NO\r\n限重：0 ~ 1000+KGS\r\n其他：只可走 安道爾，奧地利，比利時，加拿大，捷克，丹麥，多明尼加，芬蘭，法國，徳國，希臘，匈牙利，愛爾蘭，意大利，日本，列支敦斯登，盧森堡，馬來西亞，摩洛哥，荷蘭，挪威，菲律賓，波蘭，葡萄牙，波多黎各，聖馬力諾，新加坡，韓國，西班牙，瑞士，瑞典，，台灣，英國，美國，梵蒂岡城',1,1493260606,1508121423,1,1),
	(121,11,'EU Express for Li-li','EU Express for Li-lion Battery','',1,1494320780,1508121411,1,1),
	(122,11,'AU Express for Li-li','AU Express for Li-lion Battery','',1,1494320830,1508121395,1,1),
	(123,11,'UAE Express for Li-l','UAE Express for Li-lion Battery','',1,1494320841,1508121382,1,1),
	(124,11,'Thailand Express for','Thailand Express for Li-lion Battery','',1,1494320856,1508121372,1,1),
	(125,21,'BE Packet','BE Packet','电池：YES\r\n液体：NO\r\n限重：0 ~ 2KGS\r\n其他：不可走 比利時(BE), 圣丁(MF),危地馬拉出(GT) , 洪都拉斯(HN)',1,1495529948,1500949745,0,0),
	(126,20,'Wish平邮','Wish平邮','订单金额<=5',1,1496734448,1507534297,0,0),
	(127,20,'Wish挂号','Wish挂号','订单金额<=10\r\n不可发英国和美国',1,1496734621,1507534306,0,0),
	(128,20,'Wish达','Wish达','Wish平台提供的线上物流，可发英国和美国。订单金额<=10',1,1496735277,1507534317,0,0),
	(129,12,'Netherlands Airmail ','Netherlands Airmail - Eliquid & Battery','内置电：YES\r\n锂电池：YES\r\n液体：YES\r\n限重：0~ 2KGS\r\n其他：可以混发，但是只能发欧洲13个国家,且国外无退件服务，只能弃件。',1,1500004626,1500949667,0,0),
	(130,6,'香港仓','香港仓','',1,1500364335,1510207011,0,0),
	(131,6,'TR Register Airmail','TR Register Airmail','',1,1501147367,1501147415,0,0),
	(132,11,'ZA Express for Li-li','ZA Express for Li-lion Battery','',1,1501580132,1508121358,1,1),
	(133,11,'Russia Express','Russia Express','俄罗斯报关',1,1501809579,1503473655,1,1),
	(134,11,'JPN Express for Li-l','JPN Express for Li-lion Battery','',1,1505112770,1508121346,1,1),
	(135,13,'Singapore Airmail (S','Singapore Airmail (SH)','包裹外包装不能用含中邮或者外邮，或者印有快递类字样的包装袋、纸箱来打包，\r\n否则包裹将会被邮局退回',1,1505876558,1506076768,0,0),
	(136,12,'Netherlands Airmail ','Netherlands Airmail (SH)','渠道只能发内置电池， 不可以发充电宝 和 配套电池',1,1505876766,1506412706,0,0),
	(137,11,'奥捷欧洲专线','奥捷欧洲专线','',1,1507625748,1507625748,0,0),
	(138,11,'奥捷日本专线','奥捷日本专线','',1,1507625774,1507625774,0,0),
	(139,6,'Amazon Fulfillment N','Amazon Fulfillment Network','',1,1510118483,1514342825,0,0),
	(140,6,'HG Fulfillment Netwo','HG Fulfillment Network','由HG配送上门',1,1510206295,1510206295,0,0),
	(141,4,'SCDEX DHL','SCDEX DHL','顺驰达运输方式',1,1511855265,1511855292,1,1),
	(142,11,'Elite Dubai Express','Elite Dubai Express','亿俐缇专线',1,1512558929,1512558929,1,1),
	(143,4,'111','11','1222',0,1517900376,1517904062,1,1);

/*!40000 ALTER TABLE `erp_transport` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table erp_transport_provider
# ------------------------------------------------------------

DROP TABLE IF EXISTS `erp_transport_provider`;

CREATE TABLE `erp_transport_provider` (
  `provider_id` int(11) NOT NULL AUTO_INCREMENT,
  `provider_name` varchar(125) NOT NULL COMMENT '物流服务商名称',
  `provider_website` varchar(255) NOT NULL COMMENT '物流服务商网址',
  `provider_contact` varchar(45) NOT NULL COMMENT '物流服务商联系人',
  `provider_address` varchar(255) NOT NULL COMMENT '物流服务商地址',
  `provider_country` int(11) NOT NULL COMMENT '物流服务国家ID',
  `provider_province` int(11) NOT NULL COMMENT '物流服务商州／省ID',
  `provider_city` int(11) NOT NULL COMMENT '物流服务商城市ID',
  `provider_area` int(11) NOT NULL COMMENT '物流服务商区域ID',
  `provider_zipcode` varchar(45) NOT NULL COMMENT '物流服务商所在地区的邮政编码',
  `provider_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '-1：已删除；0：未启用；1：启用中',
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `create_userid` int(11) NOT NULL,
  `update_userid` int(11) NOT NULL,
  PRIMARY KEY (`provider_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='物流服务商列表';

LOCK TABLES `erp_transport_provider` WRITE;
/*!40000 ALTER TABLE `erp_transport_provider` DISABLE KEYS */;

INSERT INTO `erp_transport_provider` (`provider_id`, `provider_name`, `provider_website`, `provider_contact`, `provider_address`, `provider_country`, `provider_province`, `provider_city`, `provider_area`, `provider_zipcode`, `provider_status`, `create_time`, `update_time`, `create_userid`, `update_userid`)
VALUES
	(4,'DHL','http://www.dhl.com/en.html','','',1,889,890,0,'200333',1,1470789809,1494983934,1,1),
	(5,'China Post','http://www.17track.net/en','','',1,889,890,0,'200333',1,1470789986,1494998393,1,1),
	(6,'Other','http://www.17track.net/en','','',1,889,890,0,'200333',1,1470790060,1503986508,1,1),
	(7,'HongKong Post','http://www.17track.net/en','','',1,889,890,0,'200333',1,1470790184,1494998272,1,1),
	(8,'汇通','','','',1,889,890,0,'200333',1,1470790245,1482482451,1,1),
	(9,'UPS','https://www.ups.com/tracking/tracking.html','','',1,889,890,0,'200333',1,1470790385,1494984189,1,1),
	(10,'FedEx','http://www.fedex.com/','','',1,889,890,0,'200333',1,1470790429,1494984234,1,1),
	(11,'Int Express','','','',1,889,890,0,'200333',1,1470791103,1494998498,1,1),
	(12,'Netherlands Post','http://www.17track.net/en','','',1,889,890,0,'200333',1,1470791300,1494998287,1,1),
	(13,'Singapore Post','http://www.17track.net/en','','',1,2197,2225,0,'1',1,1473228102,1500023791,1,1),
	(14,'TNT','https://www.tnt.com/express/en_us/site/home/applications/tracking.html?source=public_menu','','',1,2197,2225,0,'N/A',1,1482463567,1494998718,1,1),
	(15,'Russia Post','http://www.17track.net/en','','',1,2197,2225,0,'N/A',1,1482480620,1494998602,1,1),
	(16,'Winit','','','',1,2197,2225,0,'N/A',1,1482480875,1490168322,1,1),
	(17,'优速','','','',1,2197,2225,0,'N/A',1,1482481821,1482481821,1,1),
	(18,'顺丰','','','',1,2197,2225,0,'N/A',1,1482481893,1482481893,1,1),
	(19,'跨越','','','',1,2197,2225,0,'N/A',1,1482482001,1482482001,1,1),
	(20,'Wish邮','','','',1,2197,2225,0,'N/A',1,1482482721,1496735221,1,1),
	(21,'BPost','http://www.17track.net/en','','',1,889,890,0,'N/A',1,1496745389,1496745389,1,1),
	(22,'IML','http://www.iml.ru/status','','',1,889,890,0,'N/A',1,1497499730,1497499730,1,1);

/*!40000 ALTER TABLE `erp_transport_provider` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table erp_transport_transfer
# ------------------------------------------------------------

DROP TABLE IF EXISTS `erp_transport_transfer`;

CREATE TABLE `erp_transport_transfer` (
  `transfer_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '转换ID',
  `plaform_id` int(11) NOT NULL COMMENT '平台ID',
  `transport_id` int(11) NOT NULL COMMENT '物流ID',
  `transfer_in` varchar(45) NOT NULL COMMENT '转入时的标识符',
  `transfer_out` varchar(45) NOT NULL COMMENT '转出时的标识符',
  `transfer_status` tinyint(1) NOT NULL COMMENT '状态：0：已弃用；1：使用中',
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `create_userid` int(11) NOT NULL,
  `update_userid` int(11) NOT NULL,
  PRIMARY KEY (`transfer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='物流转入转出配置';



# Dump of table erp_upload_log
# ------------------------------------------------------------

DROP TABLE IF EXISTS `erp_upload_log`;

CREATE TABLE `erp_upload_log` (
  `upload_id` int(11) NOT NULL AUTO_INCREMENT,
  `upload_to` varchar(255) NOT NULL DEFAULT '' COMMENT '上传地址',
  `client_name` varchar(255) NOT NULL DEFAULT '' COMMENT '原生文件名',
  `file_name` varchar(255) NOT NULL DEFAULT '' COMMENT '上传后文件名',
  `file_path` varchar(255) NOT NULL DEFAULT '' COMMENT '文件的绝对路径',
  `upload_time` int(11) NOT NULL,
  `upload_userid` int(11) NOT NULL,
  PRIMARY KEY (`upload_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `erp_upload_log` WRITE;
/*!40000 ALTER TABLE `erp_upload_log` DISABLE KEYS */;

INSERT INTO `erp_upload_log` (`upload_id`, `upload_to`, `client_name`, `file_name`, `file_path`, `upload_time`, `upload_userid`)
VALUES
	(3,'erp/wm/warehouse_location/import','import_location.xlsx','import_location_20180202105307_1.xlsx','import_location.xlsx',1517539987,1),
	(1,'erp/wm/warehouse_location/import','import_location.xlsx','import_location_20180202105429_1.xlsx','import_location.xlsx',1517540069,1),
	(2,'erp/wm/warehouse_location/import','import_location.xlsx','import_location_20180202105448_1.xlsx','import_location.xlsx',1517540088,1),
	(4,'erp/wm/warehouse_location/import','import_location.xlsx','import_location_20180202110605_1.xlsx','import_location.xlsx',1517540765,1),
	(5,'erp/wm/warehouse_location/import','import_location.xlsx','import_location1.xlsx','assets/upload/excel/import_location1.xlsx',1517552676,1),
	(6,'erp/wm/warehouse_location/import','import_location(1).xlsx','import_location_20180202070722_1.xlsx','assets/upload/excel/201802/import_location_20180202070722_1.xlsx',1517555242,1),
	(7,'erp/wm/warehouse_location/import','import_location(1).xlsx','import_location_20180202070807_1.xlsx','assets/upload/excel/201802/import_location_20180202070807_1.xlsx',1517555287,1),
	(8,'erp/wm/warehouse_location/import','import_location(1).xlsx','import_location_20180202070836_1.xlsx','assets/upload/excel/201802/import_location_20180202070836_1.xlsx',1517555316,1),
	(9,'erp/wm/warehouse_location/import','import_location(1).xlsx','import_location_20180202071757_1.xlsx','assets/upload/excel/201802/import_location_20180202071757_1.xlsx',1517555877,1),
	(10,'erp/wm/warehouse_location/import','import_location(1).xlsx','import_location_20180202073047_1.xlsx','assets/upload/excel/201802/import_location_20180202073047_1.xlsx',1517556647,1),
	(11,'erp/wm/warehouse_location/import','import_location(1).xlsx','import_location_20180202074339_1.xlsx','assets/upload/excel/201802/import_location_20180202074339_1.xlsx',1517557419,1),
	(12,'erp/wm/warehouse_location/import','import_location(1).xlsx','import_location_20180202075329_1.xlsx','assets/upload/excel/201802/import_location_20180202075329_1.xlsx',1517558009,1),
	(13,'erp/wm/warehouse_location/import','import_location(1).xlsx','import_location_20180202075546_1.xlsx','assets/upload/excel/201802/import_location_20180202075546_1.xlsx',1517558146,1),
	(14,'erp/wm/Warehouse_location/import','import_location.xlsx','import_location_20180206054246_1.xlsx','assets/upload/excel/201802/import_location_20180206054246_1.xlsx',1517895766,1);

/*!40000 ALTER TABLE `erp_upload_log` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table erp_warehouse
# ------------------------------------------------------------

DROP TABLE IF EXISTS `erp_warehouse`;

CREATE TABLE `erp_warehouse` (
  `warehouse_id` int(11) NOT NULL AUTO_INCREMENT,
  `warehouse_code` varchar(45) NOT NULL COMMENT '仓库编码',
  `warehouse_name` varchar(45) NOT NULL,
  `warehouse_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '仓库状态：0：未启用；1：启用中',
  `warehouse_type` tinyint(1) NOT NULL COMMENT '仓库类型:自建仓库、海外仓、虚拟仓',
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `create_userid` int(11) NOT NULL,
  `update_userid` int(11) NOT NULL,
  PRIMARY KEY (`warehouse_id`),
  UNIQUE KEY `warehouse_code` (`warehouse_code`),
  UNIQUE KEY `warehouse_name` (`warehouse_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='仓库列表';

LOCK TABLES `erp_warehouse` WRITE;
/*!40000 ALTER TABLE `erp_warehouse` DISABLE KEYS */;

INSERT INTO `erp_warehouse` (`warehouse_id`, `warehouse_code`, `warehouse_name`, `warehouse_status`, `warehouse_type`, `create_time`, `update_time`, `create_userid`, `update_userid`)
VALUES
	(5,'SZ001','深圳仓库',1,2,1420910101,1502677559,0,1),
	(11,'SHOLD','上海老仓库',1,1,1420909902,1443082190,0,1),
	(13,'SH001','上海新仓库',1,1,1442722394,1514266449,19,1),
	(14,'HK001','香港仓库',1,1,1464573286,1510729842,19,1),
	(15,'俄罗斯仓(IML)','俄罗斯仓(IML)',1,2,1491811577,1509509128,26,26),
	(17,'FBA日本仓 - 亚1','FBA日本仓 - 亚1',1,3,1504249256,1512703602,26,26),
	(18,'FBA英国仓 - 亚2','FBA英国仓 - 亚2',1,3,1508291067,1512036424,26,26),
	(19,'FBA日本仓 - 亚2','FBA日本仓 - 亚2',1,3,1508291168,1512703626,26,26),
	(20,'俄罗斯2仓(IML)','俄罗斯2仓(IML)',1,2,1509509069,1509509115,26,26),
	(21,'FBA美国仓 - 亚1','FBA美国仓 - 亚1',1,3,1509939370,1512636346,26,26);

/*!40000 ALTER TABLE `erp_warehouse` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table erp_warehouse_address
# ------------------------------------------------------------

DROP TABLE IF EXISTS `erp_warehouse_address`;

CREATE TABLE `erp_warehouse_address` (
  `address_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '仓库地址ID',
  `warehouse_code` varchar(10) NOT NULL COMMENT '仓库编码',
  `lang` varchar(10) NOT NULL COMMENT '语言',
  `warehouse_name` varchar(100) NOT NULL COMMENT '仓库名称',
  `country_code` char(3) NOT NULL COMMENT '国家编码',
  `country_name` varchar(100) NOT NULL COMMENT '国家名称',
  `province_name` varchar(100) NOT NULL COMMENT '省份名称',
  `city_name` varchar(100) NOT NULL COMMENT '城市名称',
  `area_name` varchar(100) NOT NULL COMMENT '区域名称',
  `address_line_one` varchar(255) NOT NULL COMMENT '地址1',
  `address_line_two` varchar(255) NOT NULL COMMENT '地址2',
  `zipcode` varchar(45) NOT NULL COMMENT '邮政编码',
  `contact_name` varchar(45) NOT NULL COMMENT '联系人',
  `contact_phone` varchar(45) NOT NULL COMMENT '联系电话',
  `address_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '地址状态：-1：已删除；0:默认状态；1:启用中',
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `create_userid` int(11) NOT NULL,
  `update_userid` int(11) NOT NULL,
  PRIMARY KEY (`address_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='仓库地址列表';



# Dump of table erp_warehouse_location
# ------------------------------------------------------------

DROP TABLE IF EXISTS `erp_warehouse_location`;

CREATE TABLE `erp_warehouse_location` (
  `location_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '库位ID',
  `warehouse_id` int(11) NOT NULL COMMENT '仓库ID',
  `section_id` int(11) NOT NULL COMMENT '仓库区域ID',
  `location_code` varchar(45) NOT NULL COMMENT '库位编码',
  `location_sort` int(11) NOT NULL COMMENT '库位排序',
  `location_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '-1：已删除；0：未启用；1：启用中',
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `create_userid` int(11) NOT NULL,
  `update_userid` int(11) NOT NULL,
  PRIMARY KEY (`location_id`),
  UNIQUE KEY `location_mark` (`section_id`,`location_code`) COMMENT '区域+库位确定唯一'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='库位列表';

LOCK TABLES `erp_warehouse_location` WRITE;
/*!40000 ALTER TABLE `erp_warehouse_location` DISABLE KEYS */;

INSERT INTO `erp_warehouse_location` (`location_id`, `warehouse_id`, `section_id`, `location_code`, `location_sort`, `location_status`, `create_time`, `update_time`, `create_userid`, `update_userid`)
VALUES
	(1,13,4,'1',0,1,1517887332,1517887340,1,1),
	(142,13,4,'AA-0001',1,1,1517895766,1517895817,1,1),
	(143,13,5,'AA-0002',0,1,1517895766,1517895766,1,1),
	(144,13,5,'AA-0003',0,1,1517895766,1517895766,1,1),
	(145,13,5,'AA-0004',0,1,1517895766,1517895766,1,1),
	(146,13,5,'AA-0005',0,1,1517895766,1517895766,1,1),
	(147,13,5,'AA-0006',0,1,1517895766,1517895766,1,1),
	(148,13,5,'AA-0007',0,1,1517895766,1517895766,1,1),
	(149,13,5,'AA-0008',0,1,1517895766,1517895766,1,1),
	(150,13,5,'AA-0009',0,1,1517895766,1517895766,1,1),
	(151,13,5,'AA-0010',0,1,1517895766,1517895766,1,1),
	(152,13,5,'AA-0011',0,1,1517895766,1517895766,1,1),
	(153,13,5,'AA-0012',0,1,1517895766,1517895766,1,1),
	(154,13,5,'AA-0013',0,1,1517895766,1517895766,1,1),
	(155,13,5,'AA-0014',0,1,1517895766,1517895766,1,1),
	(156,13,5,'AA-0015',0,1,1517895766,1517895766,1,1),
	(157,13,5,'AA-0016',0,1,1517895766,1517895766,1,1),
	(158,13,5,'AA-0017',0,1,1517895766,1517895766,1,1),
	(159,13,5,'AA-0018',0,1,1517895766,1517895766,1,1),
	(160,13,5,'AA-0019',0,1,1517895766,1517895766,1,1),
	(161,13,5,'AA-0020',0,1,1517895766,1517895766,1,1),
	(162,13,5,'AA-0021',0,1,1517895766,1517895766,1,1),
	(163,13,5,'AA-0022',0,1,1517895766,1517895766,1,1),
	(164,13,5,'AA-0023',0,1,1517895766,1517895766,1,1),
	(165,13,5,'AA-0024',0,1,1517895766,1517895766,1,1),
	(166,13,5,'AA-0025',0,1,1517895766,1517895766,1,1),
	(167,13,5,'AA-0026',0,1,1517895766,1517895766,1,1),
	(168,13,5,'AA-0027',0,1,1517895766,1517895766,1,1),
	(169,13,5,'AA-0028',0,1,1517895766,1517895766,1,1),
	(170,13,5,'AA-0029',0,1,1517895766,1517895766,1,1),
	(171,13,5,'AA-0030',0,1,1517895766,1517895766,1,1),
	(172,13,5,'AA-0031',0,1,1517895766,1517895766,1,1),
	(173,13,5,'AA-0032',0,1,1517895766,1517895766,1,1),
	(174,13,5,'AA-0033',0,1,1517895766,1517895766,1,1),
	(175,13,5,'AA-0034',0,1,1517895766,1517895766,1,1),
	(176,13,5,'AA-0035',0,1,1517895766,1517895766,1,1),
	(177,13,5,'AA-0036',0,1,1517895766,1517895766,1,1),
	(178,13,5,'AA-0037',0,1,1517895766,1517895766,1,1),
	(179,13,5,'AA-0038',0,1,1517895766,1517895766,1,1),
	(180,13,5,'AA-0039',0,1,1517895766,1517895766,1,1),
	(181,13,5,'AA-0040',0,1,1517895766,1517895766,1,1),
	(182,13,5,'AA-0041',0,1,1517895766,1517895766,1,1),
	(183,13,5,'AA-0042',0,1,1517895766,1517895766,1,1),
	(184,13,5,'AA-0043',0,1,1517895766,1517895766,1,1),
	(185,13,5,'AA-0044',0,1,1517895766,1517895766,1,1),
	(186,13,5,'AA-0045',0,1,1517895766,1517895766,1,1),
	(187,13,5,'AA-0046',0,1,1517895766,1517895766,1,1),
	(188,13,5,'AA-0047',0,1,1517895766,1517895766,1,1),
	(189,13,5,'AA-0048',0,1,1517895766,1517895766,1,1),
	(190,13,5,'AA-0049',0,1,1517895766,1517895766,1,1),
	(191,13,5,'AA-0050',0,1,1517895766,1517895766,1,1),
	(192,13,5,'AA-0051',0,1,1517895766,1517895766,1,1),
	(193,13,5,'AA-0052',0,1,1517895766,1517895766,1,1),
	(194,13,5,'AA-0053',0,1,1517895766,1517895766,1,1),
	(195,13,5,'AA-0054',0,1,1517895766,1517895766,1,1),
	(196,13,5,'AA-0055',0,1,1517895766,1517895766,1,1),
	(197,13,5,'AA-0056',0,1,1517895766,1517895766,1,1),
	(198,13,5,'AA-0057',0,1,1517895766,1517895766,1,1),
	(199,13,5,'AA-0058',0,1,1517895766,1517895766,1,1),
	(200,13,5,'AA-0059',0,1,1517895766,1517895766,1,1),
	(201,13,5,'AA-0060',0,1,1517895766,1517895766,1,1),
	(202,13,5,'AA-0061',0,1,1517895766,1517895766,1,1),
	(203,13,5,'AA-0062',0,1,1517895766,1517895766,1,1),
	(204,13,5,'AA-0063',0,1,1517895766,1517895766,1,1),
	(205,13,5,'AA-0064',0,1,1517895766,1517895766,1,1),
	(206,13,5,'AA-0065',0,1,1517895766,1517895766,1,1),
	(207,13,5,'AA-0066',0,1,1517895766,1517895766,1,1),
	(208,13,5,'AA-0067',0,1,1517895766,1517895766,1,1),
	(209,13,5,'AA-0068',0,1,1517895766,1517895766,1,1),
	(210,13,5,'AA-0069',0,1,1517895766,1517895766,1,1),
	(211,13,5,'AA-0070',0,1,1517895766,1517895766,1,1);

/*!40000 ALTER TABLE `erp_warehouse_location` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table erp_warehouse_section
# ------------------------------------------------------------

DROP TABLE IF EXISTS `erp_warehouse_section`;

CREATE TABLE `erp_warehouse_section` (
  `section_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '区域ID',
  `warehouse_id` int(11) NOT NULL COMMENT '仓库ID',
  `section_name` varchar(45) NOT NULL DEFAULT '' COMMENT '区域名称',
  `section_code` varchar(20) NOT NULL DEFAULT '' COMMENT '区域编码',
  `section_status` varchar(45) NOT NULL DEFAULT '0' COMMENT '-1：已删除；0：未启用；1：启用中',
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `create_userid` int(11) NOT NULL,
  `update_userid` int(11) NOT NULL,
  PRIMARY KEY (`section_id`),
  UNIQUE KEY `section_mark` (`warehouse_id`,`section_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='仓库区域列表';

LOCK TABLES `erp_warehouse_section` WRITE;
/*!40000 ALTER TABLE `erp_warehouse_section` DISABLE KEYS */;

INSERT INTO `erp_warehouse_section` (`section_id`, `warehouse_id`, `section_name`, `section_code`, `section_status`, `create_time`, `update_time`, `create_userid`, `update_userid`)
VALUES
	(1,11,'dangji122','DANGJI122','0',1517377717,1517388659,1,1),
	(2,11,'套装001','COM001','1',1517381172,1517893735,1,1),
	(3,11,'滞销品','ZHI001','1',1517450583,1517885172,1,1),
	(4,13,'当季热卖','HOT002','1',1517887213,1517887242,1,1),
	(5,13,'新品','NEW001','1',1517893787,1517893787,1,1);

/*!40000 ALTER TABLE `erp_warehouse_section` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table sys_announce
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sys_announce`;

CREATE TABLE `sys_announce` (
  `announce_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '公告ID',
  `announce_title` varchar(255) NOT NULL COMMENT '公告标题，控制在50字以内',
  `announce_content` tinytext NOT NULL COMMENT '公告内容',
  `publish_time` int(11) NOT NULL COMMENT '公告预发布时间\n设置定时发布',
  `publish_status` tinyint(1) NOT NULL COMMENT '公告状态：\n0：取消发布\n1：可以发布\n2：编辑状态',
  `create_userid` int(11) NOT NULL COMMENT '公告创建用户ID',
  `create_time` int(11) NOT NULL,
  PRIMARY KEY (`announce_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='系统公告';



# Dump of table sys_department
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sys_department`;

CREATE TABLE `sys_department` (
  `department_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '部门ID',
  `department_name` varchar(45) NOT NULL COMMENT '部门名称',
  `manager_id` int(11) NOT NULL COMMENT '负责人ID',
  `department_status` int(11) NOT NULL DEFAULT '1' COMMENT '部门状态：0：已关闭；1:正常',
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `create_userid` int(11) NOT NULL,
  `update_userid` int(11) NOT NULL,
  PRIMARY KEY (`department_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='部门列表';



# Dump of table sys_menu
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sys_menu`;

CREATE TABLE `sys_menu` (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '菜单ID',
  `menu_fid` int(11) NOT NULL DEFAULT '0' COMMENT '菜单父级ID',
  `menu_left` int(11) NOT NULL COMMENT '菜单左支点ID',
  `menu_right` int(11) NOT NULL COMMENT '菜单右支点ID',
  `menu_name` varchar(30) NOT NULL DEFAULT '' COMMENT '菜单名称',
  `menu_status` tinyint(1) NOT NULL,
  `menu_uri` varchar(100) NOT NULL COMMENT '菜单资源指向',
  `menu_uri_short` varchar(30) NOT NULL DEFAULT '' COMMENT '自定义段地址',
  `menu_icon` varchar(30) NOT NULL DEFAULT '' COMMENT '菜单ICON样式',
  `menu_sort` int(11) NOT NULL,
  `menu_type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '只支持到二级菜单\n菜单类型：\n1、顶部导航菜单\n2、左侧菜单列表\n3、左侧菜单子列表',
  `create_time` int(11) NOT NULL COMMENT '	',
  `update_time` int(11) NOT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='系统菜单';

LOCK TABLES `sys_menu` WRITE;
/*!40000 ALTER TABLE `sys_menu` DISABLE KEYS */;

INSERT INTO `sys_menu` (`menu_id`, `menu_fid`, `menu_left`, `menu_right`, `menu_name`, `menu_status`, `menu_uri`, `menu_uri_short`, `menu_icon`, `menu_sort`, `menu_type`, `create_time`, `update_time`)
VALUES
	(1,0,0,35,'系统设置',1,'','','fa-cubes',1,2,0,1516604181),
	(2,0,74,99,'仓库管理',1,'','','fa-cubes',4,2,1513741752,1513741752),
	(3,1,17,34,'菜单设置',1,'sys/Menu/index','','&#xe63c;',5,3,1513748089,1513748089),
	(4,0,38,73,'产品管理',1,'','','fa-cubes',3,2,0,1518077042),
	(5,0,38,39,'平台店铺',0,'','','fa-cubes',3,2,1513760066,1513760066),
	(6,1,15,16,'版本控制',1,'sys/Version/index','','&#xe614;',4,3,1513762181,1513762181),
	(7,0,40,41,'类目管理',0,'','','fa-cubes',4,2,1513762344,1513762344),
	(11,0,38,39,'客户管理',0,'','','fa-cubes',3,2,1513910031,1513910031),
	(12,0,36,37,'单据管理',0,'','','fa-cubes',2,2,1513910091,1513910091),
	(13,0,36,37,'报表管理',0,'','','fa-cubes',2,2,0,1516609380),
	(14,0,36,37,'个人中心',0,'','','fa-cubes',2,2,1513910394,1513910394),
	(15,0,36,37,'文档中心',0,'','','fa-cubes',2,2,1513927376,1513927376),
	(16,3,32,33,'新增菜单',1,'sys/Menu/add','','&#xe857;',13,4,1513927663,1513927663),
	(17,3,30,31,'清除菜单缓存',1,'sys/Menu/clean_cache','','&#xe857;',12,4,1513927702,1513927702),
	(18,3,28,29,'禁用菜单',1,'sys/Menu/disable','','&#xe857;',11,4,1513927722,1513927722),
	(19,3,26,27,'更新菜单',1,'sys/Menu/update','','&#xe857;',10,4,1513927743,1513927743),
	(20,3,24,25,'菜单详情',1,'sys/Menu/view','','&#xe857;',9,4,1513927772,1513927772),
	(21,3,22,23,'获取菜单树,未使用',1,'sys/Menu/get_module_tree','','&#xe857;',8,4,1513927790,1513927790),
	(22,3,20,21,'获取菜单树，已经使用了的',1,'sys/Menu/get_module_tree_used','','&#xe857;',7,4,1513927817,1513927817),
	(23,3,18,19,'获取菜单列表',1,'sys/Menu/getList','','&#xe857;',6,4,1513927883,1513927883),
	(24,1,9,14,'角色列表',1,'sys/Role/index','','&#xe614;',3,3,1514971647,1514971647),
	(25,24,10,11,'新增角色',1,'sys/Role/create','','&#xe614;',4,4,1514971724,1514971724),
	(26,24,12,13,'更新角色',1,'sys/Role/update','','&#xe614;',5,4,1514971884,1514971884),
	(27,1,1,8,'用户列表',1,'sys/User/index','','&#xe614;',2,3,1514972417,1514972417),
	(28,27,6,7,'新增用户',1,'sys/User/create','','&#xe614;',5,4,1514972615,1514972615),
	(29,27,4,5,'更新用户',1,'sys/User/update','','&#xe614;',4,4,1514972628,1514972628),
	(30,27,2,3,'控制访问',1,'sys/User/access','','&#xe614;',3,4,1514972795,1514972795),
	(31,0,0,0,'销售管理',0,'','','',9,2,0,1516604997),
	(33,32,50,51,'新增仓库',1,'erp/warehouse/Wlist/create','','&#xe614;',10,4,1516604088,1516604088),
	(34,2,75,84,'仓库列表',1,'erp/wm/warehouse/index','','',5,3,0,1517969723),
	(35,2,95,96,'仓库区域列表',1,'erp/wm/Warehouse_section/index','','',8,3,0,1517969774),
	(36,2,97,98,'库位列表',1,'erp/wm/Warehouse_location/index','','&#xe614;',9,3,1517302911,1517302911),
	(37,34,82,83,'新增仓库',1,'erp/wm/Warehouse/create','','&#xe614;',9,4,1517304039,1517304039),
	(38,34,80,81,'更新仓库',1,'erp/wm/Warehouse/update','','&#xe614;',8,4,1517304095,1517304095),
	(39,34,78,79,'禁用仓库',1,'erp/wm/Warehouse/disable','','&#xe614;',7,4,1517304134,1517304134),
	(40,34,76,77,'启用仓库',1,'erp/wm/Warehouse/enable','','&#xe614;',6,4,1517304299,1517304299),
	(41,2,93,94,'物流列表',1,'erp/wm/Transport/index','','',7,3,0,1517969700),
	(42,2,85,92,'物流服务商',1,'erp/wm/Transport_provider/index','','',6,3,0,1517969749),
	(43,42,90,91,'新增物流服务商',1,'erp/wm/Transport_provider/create','','&#xe614;',9,4,1517969571,1517969571),
	(44,42,88,89,'更新物流服务商',1,'erp/wm/Transport_provider/update','','&#xe614;',8,4,1517969592,1517969592),
	(45,42,86,87,'变更物流服务商状态',1,'erp/wm/Transport_provider/change_status','','&#xe614;',7,4,1517969605,1517969605),
	(46,4,61,66,'货品列表',1,'erp/pm/Goods/index','','',9,3,0,1518163499),
	(47,46,64,65,'更新货品',1,'erp/pm/Goods/update','','&#xe614;',11,4,1518077121,1518077121),
	(48,46,62,63,'新增货品',1,'erp/pm/Goods/create','','&#xe614;',10,4,1518077137,1518077137),
	(49,4,67,72,'商品列表',1,'erp/pm/Product/index','','&#xe614;',10,3,1518077182,1518077182),
	(50,49,70,71,'新增商品',1,'erp/pm/Product/create','','&#xe614;',12,4,1518078037,1518078037),
	(51,49,68,69,'更新商品',1,'erp/pm/Product/update','','&#xe614;',11,4,1518078053,1518078053),
	(52,4,55,60,'关键词列表',1,'erp/pm/Keyword/index','','&#xe614;',8,3,1518225371,1518225371),
	(53,52,58,59,'新增关键词',1,'erp/pm/Keyword/create','','&#xe614;',10,4,1518225388,1518225388),
	(54,52,56,57,'更新关键词',1,'erp/pm/Keyword/update','','&#xe614;',9,4,1518225401,1518225401),
	(55,4,49,54,'分类列表',1,'erp/pm/Category/index','','&#xe614;',7,3,1518245827,1518245827),
	(56,55,52,53,'新增分类',1,'erp/pm/Category/create','','&#xe614;',9,4,1518245845,1518245845),
	(57,55,50,51,'更新分类',1,'erp/pm/Category/update','','&#xe614;',8,4,1518245859,1518245859),
	(58,4,47,48,'规格列表',1,'erp/pm/Feature/index','','&#xe614;',6,3,1519394569,1519394569),
	(59,4,45,46,'规格值列表',1,'erp/pm/Feature_value/index','','&#xe614;',5,3,1519397650,1519397650),
	(60,4,39,44,'品牌列表',1,'erp/pm/Brand/index','','&#xe614;',4,3,1526030625,1526030625),
	(61,60,42,43,'新增品牌',1,'erp/pm/Brand/create','','&#xe614;',6,4,1526030643,1526030643),
	(62,60,40,41,'更新品牌',1,'erp/pm/Brand/update','','&#xe614;',5,4,1526030663,1526030663),
	(63,0,36,37,'这是一个测试',1,'','','&#xe613;',2,2,0,1554281467);

/*!40000 ALTER TABLE `sys_menu` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table sys_role
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sys_role`;

CREATE TABLE `sys_role` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(45) NOT NULL COMMENT '角色名称',
  `role_desc` varchar(255) NOT NULL COMMENT '角色描述',
  `role_status` tinyint(1) NOT NULL COMMENT '角色状态\n1：可用\n0：禁用',
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `create_userid` int(11) NOT NULL,
  `update_userid` int(11) NOT NULL,
  PRIMARY KEY (`role_id`),
  UNIQUE KEY `role_name` (`role_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='系统角色管理';

LOCK TABLES `sys_role` WRITE;
/*!40000 ALTER TABLE `sys_role` DISABLE KEYS */;

INSERT INTO `sys_role` (`role_id`, `role_name`, `role_desc`, `role_status`, `create_time`, `update_time`, `create_userid`, `update_userid`)
VALUES
	(1,'系统管理员','系统管理员',0,0,1555038430,0,1),
	(2,'仓库管理员','仓库管理员',0,0,1554281272,1,1),
	(3,'平台运营','平台运营',0,0,1554281262,1,1),
	(4,'销售人员','销售人员',1,0,0,1,1),
	(5,'开发组人员','开发组人员',1,0,0,1,1),
	(6,'采购人员','采购人员',1,0,0,1,1),
	(7,'财务人员','财务人员',0,0,1554281292,1,1);

/*!40000 ALTER TABLE `sys_role` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table sys_role_menu
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sys_role_menu`;

CREATE TABLE `sys_role_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL COMMENT '角色ID',
  `menu_id` int(11) NOT NULL COMMENT '菜单ID',
  `access_status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '访问权限',
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `create_userid` int(11) NOT NULL,
  `update_userid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `role_menu` (`role_id`,`menu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='系统角色菜单';

LOCK TABLES `sys_role_menu` WRITE;
/*!40000 ALTER TABLE `sys_role_menu` DISABLE KEYS */;

INSERT INTO `sys_role_menu` (`id`, `role_id`, `menu_id`, `access_status`, `create_time`, `update_time`, `create_userid`, `update_userid`)
VALUES
	(1,1,1,1,1515563575,1554713143,1,1),
	(2,1,27,1,1515563575,1554713143,1,1),
	(3,1,30,1,1515563575,1554713143,1,1),
	(4,1,29,0,1515563575,1554713143,1,1),
	(5,1,28,0,1515563575,1554713143,1,1),
	(6,1,24,1,1515563575,1554713143,1,1),
	(7,1,25,1,1515563575,1554713143,1,1),
	(8,1,26,1,1515563575,1554713143,1,1),
	(9,1,6,1,1515563575,1554713143,1,1),
	(10,1,3,1,1515563575,1554713143,1,1),
	(11,1,23,1,1515563575,1554713143,1,1),
	(12,1,22,1,1515563575,1554713143,1,1),
	(13,1,21,1,1515563575,1554713143,1,1),
	(14,1,20,1,1515563575,1554713143,1,1),
	(15,1,19,1,1515563575,1554713143,1,1),
	(16,1,18,1,1515563575,1554713143,1,1),
	(17,1,17,1,1515563575,1554713143,1,1),
	(18,1,16,1,1515563575,1554713143,1,1),
	(19,1,0,0,1516001336,1554713143,1,1),
	(20,7,0,0,1516001369,1518311399,1,1),
	(21,1,31,0,1516006233,1554713143,1,1),
	(22,7,1,1,1518311388,1518311399,1,1),
	(23,7,27,1,1518311388,1518311399,1,1),
	(24,7,30,1,1518311388,1518311399,1,1),
	(25,7,29,1,1518311388,1518311399,1,1),
	(26,7,28,1,1518311388,1518311399,1,1),
	(27,7,24,1,1518311388,1518311399,1,1),
	(28,7,25,1,1518311388,1518311399,1,1),
	(29,7,26,1,1518311388,1518311399,1,1),
	(30,7,6,1,1518311388,1518311399,1,1),
	(31,7,3,1,1518311388,1518311399,1,1),
	(32,7,23,0,1518311388,1518311399,1,1),
	(33,7,22,1,1518311388,1518311399,1,1),
	(34,7,21,1,1518311388,1518311399,1,1),
	(35,7,20,1,1518311388,1518311399,1,1),
	(36,7,19,1,1518311388,1518311399,1,1),
	(37,7,18,1,1518311388,1518311399,1,1),
	(38,7,17,1,1518311388,1518311399,1,1),
	(39,7,16,1,1518311388,1518311399,1,1),
	(40,2,1,1,1552457383,1552457383,1,1),
	(41,2,24,1,1552457383,1552457383,1,1),
	(42,2,25,1,1552457383,1552457383,1,1),
	(43,2,26,1,1552457383,1552457383,1,1),
	(44,1,2,1,1554281326,1554713143,1,1),
	(45,1,42,1,1554281326,1554713143,1,1),
	(46,1,45,1,1554281326,1554713143,1,1),
	(47,1,44,1,1554281326,1554713143,1,1),
	(48,1,43,1,1554281326,1554713143,1,1),
	(49,1,41,1,1554281326,1554713143,1,1),
	(50,1,35,1,1554281326,1554713143,1,1),
	(51,1,36,1,1554281326,1554713143,1,1);

/*!40000 ALTER TABLE `sys_role_menu` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table sys_user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sys_user`;

CREATE TABLE `sys_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(45) NOT NULL COMMENT '用户登录名，合法的中文+数字',
  `user_email` varchar(100) NOT NULL DEFAULT '' COMMENT '用户邮箱地址',
  `display_name` varchar(45) NOT NULL DEFAULT '' COMMENT '用户登录后展示的名称',
  `user_pass` varchar(255) NOT NULL DEFAULT '' COMMENT '用户登录密码',
  `user_pic` varchar(45) NOT NULL COMMENT '用户头像',
  `user_level` tinyint(1) NOT NULL DEFAULT '1' COMMENT '用户等级',
  `user_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '用户状态',
  `last_ip` int(11) NOT NULL COMMENT '最后登录IP地址',
  `last_login` int(11) NOT NULL COMMENT '最后登录时间',
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_name` (`user_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='系统用户表';

LOCK TABLES `sys_user` WRITE;
/*!40000 ALTER TABLE `sys_user` DISABLE KEYS */;

INSERT INTO `sys_user` (`user_id`, `user_name`, `user_email`, `display_name`, `user_pass`, `user_pic`, `user_level`, `user_status`, `last_ip`, `last_login`, `create_time`, `update_time`)
VALUES
	(1,'kendo','455019825@qq.com','test11','$2y$10$VJ75e2c87I1iCEQn7508cumwD43rN94RTmrWNPAHZQJMi81Nu8/pG','',1,1,2032362768,1555474206,0,0),
	(2,'kendo2','455019825@qq.com','test22','$2y$10$VJ75e2c87I1iCEQn7508cumwD43rN94RTmrWNPAHZQJMi81Nu8/pG','',1,1,2130706433,1517367265,0,0),
	(3,'kendo23','123213@qq.com','13123','$2y$10$6SwRNK3t/PtrRPzyAOVTOOkhMMG6vm/7OHbkd.eDRMbvZHoXgqFK6','',1,1,0,0,0,0);

/*!40000 ALTER TABLE `sys_user` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table sys_user_log
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sys_user_log`;

CREATE TABLE `sys_user_log` (
  `log_id` int(11) NOT NULL COMMENT '登录日志ID',
  `user_id` int(11) DEFAULT NULL COMMENT '用户ID',
  `login_ip` int(11) DEFAULT NULL COMMENT '登录IP',
  `login_time` int(11) DEFAULT NULL COMMENT '登录时间',
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户登录日志';



# Dump of table sys_user_role
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sys_user_role`;

CREATE TABLE `sys_user_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL COMMENT '用户ID',
  `role_id` int(11) NOT NULL COMMENT '角色ID',
  `user_role_status` tinyint(1) NOT NULL DEFAULT '1',
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `create_userid` int(11) NOT NULL,
  `update_userid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_role` (`user_id`,`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='系统用户-角色关联表';

LOCK TABLES `sys_user_role` WRITE;
/*!40000 ALTER TABLE `sys_user_role` DISABLE KEYS */;

INSERT INTO `sys_user_role` (`id`, `user_id`, `role_id`, `user_role_status`, `create_time`, `update_time`, `create_userid`, `update_userid`)
VALUES
	(3,1,1,1,1515726625,1555474217,1,1),
	(4,1,2,0,0,1555474217,1,1),
	(5,1,4,0,1517366309,1555474217,1,1),
	(6,1,6,0,1517366801,1555474217,1,1),
	(7,2,7,1,1517368174,1517368174,1,1),
	(8,3,2,1,1517383113,1517383293,1,1);

/*!40000 ALTER TABLE `sys_user_role` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table sys_version
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sys_version`;

CREATE TABLE `sys_version` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `version` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='系统资源版本';

LOCK TABLES `sys_version` WRITE;
/*!40000 ALTER TABLE `sys_version` DISABLE KEYS */;

INSERT INTO `sys_version` (`id`, `name`, `version`)
VALUES
	(1,'css','1552451646'),
	(2,'js','1552451646');

/*!40000 ALTER TABLE `sys_version` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table sys_worker
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sys_worker`;

CREATE TABLE `sys_worker` (
  `worker_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '员工ID',
  `worker_name_cn` varchar(20) NOT NULL COMMENT '员工中文名',
  `worker_name_en` varchar(20) NOT NULL COMMENT '员工英文名',
  `worker_code` varchar(45) NOT NULL COMMENT '员工编号',
  `entry_time` int(11) NOT NULL COMMENT '入职时间',
  `resign time` int(11) NOT NULL COMMENT '离职时间',
  `worker_status` tinyint(1) NOT NULL DEFAULT '3' COMMENT '员工状态：0：离职；1：离职中；2：转正上岗中；3:上岗实习中',
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `create_userid` int(11) NOT NULL,
  `update_userid` int(11) NOT NULL,
  `worker_phone` varchar(45) NOT NULL COMMENT '员工手机',
  `worker_sex` tinyint(1) NOT NULL DEFAULT '0' COMMENT '员工性别：0男1女',
  `worker_birthday` date NOT NULL COMMENT '员工生日',
  `worker_dept` int(11) NOT NULL COMMENT '员工所属部门ID',
  `worker_email` varchar(255) DEFAULT NULL COMMENT '员工邮箱',
  PRIMARY KEY (`worker_id`),
  UNIQUE KEY `worker_code_UNIQUE` (`worker_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='员工列表';




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
