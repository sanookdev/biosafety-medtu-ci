/*
SQLyog Community v13.1.9 (64 bit)
MySQL - 5.7.33 : Database - biosafety-ci
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`biosafety-ci` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `biosafety-ci`;

/*Table structure for table `certextendeddate` */

DROP TABLE IF EXISTS `certextendeddate`;

CREATE TABLE `certextendeddate` (
  `certExtendedDateId` int(11) NOT NULL AUTO_INCREMENT,
  `certExtendedDate` date NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `projectId` int(11) NOT NULL,
  PRIMARY KEY (`certExtendedDateId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `certextendeddate` */

/*Table structure for table `certextendeddateend` */

DROP TABLE IF EXISTS `certextendeddateend`;

CREATE TABLE `certextendeddateend` (
  `certExtendedDateEndId` int(11) NOT NULL AUTO_INCREMENT,
  `certExtendedDate` date NOT NULL,
  `projectId` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`certExtendedDateEndId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `certextendeddateend` */

/*Table structure for table `documenttype` */

DROP TABLE IF EXISTS `documenttype`;

CREATE TABLE `documenttype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) NOT NULL,
  `keyid` varchar(255) NOT NULL,
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

/*Data for the table `documenttype` */

insert  into `documenttype`(`id`,`name`,`keyid`,`created`) values 
(1,'แบบบันทึกปะหน้าการขอรับการประเมินความปลอดภัยทางชีวภาพของโครงการวิจัย TU-IBC_Cover letter','document-a','2022-05-05 16:20:20'),
(2,'แบบประเมินประเภทของงานวิจัยเพื่อขอรับรองความปลอดภัยทางชีวภาพ (Biosafety Application Form) TU-IBC_A','document-b-a','2022-05-05 16:20:34'),
(3,'แบบขอยกเว้นการประเมินความปลอดภัยทางชีวภาพ (Biosafety Exemption Registration Form) TU-IBC_B ','document-b-b','2022-05-10 14:34:36'),
(4,'แบบประเมินความปลอดภัยทางชีวภาพของโครงการและห้องปฏิบัติการด้วยตนเอง (Biosafety Self Inspection Checklist) TU-IBC_C','document-c','2022-05-10 14:31:36'),
(5,'ข้อเสนอโครงการวิจัย (Proposal)ที่เกี่ยวข้องกับสิ่งมีชีวิตหรือตัวอย่างชีวภาพ หรือ เค้าโครงวิทยานิพนธ์ / โครงร่างการวิจัย (ในกรณีที่นักศึกษาเป็นหัวหน้าโครงการ)','document-d','2022-05-10 14:31:59'),
(6,'เอกสารข้อมูลความปลอดภัยทางชีวภาพของสิ่งมีชีวิตหรือตัวอย่างชีวภาพที่ใช้ในการวิจัย เช่น Fact Sheet หรือ Pathogen Safety Data Sheet (PSDS) หรือ Biological Agent Reference Sheet (BARS) หรือ MSDS ของเชื้อ / Cell Line / Toxin จากบริษัท','document-e','2022-05-10 14:32:12'),
(7,'หนังสือรับรองอนุมัติให้ใช้สถานที่ / หน่วยงานในการดำเนินการวิจัย (ในกรณีที่มีการดำเนินงานวิจัยในห้องปฏิบัติการนอกหน่วยงานของผู้วิจัยหรือผู้ร่วมวิจัย)','document-f','2022-05-10 14:33:38'),
(8,'ประกาศนียบัตรการอบรมด้านความปลอดภัยทางชีวภาพ ที่มีอายุไม่เกิน 3 ปี ของหัวหน้าโครงการ ผู้ร่วมวิจัยที่ปฏิบัติงาน และอาจารย์ที่ปรึกษา (ในกรณีที่นักศึกษาเป็นหัวหน้าโครงการวิจัย)','document-g','2022-05-05 16:21:27'),
(9,'เอกสารอื่น ๆ เพื่อประกอบการพิจารณา','document-h','2022-05-10 14:44:04');

/*Table structure for table `emailqueue` */

DROP TABLE IF EXISTS `emailqueue`;

CREATE TABLE `emailqueue` (
  `emailqueueId` int(11) NOT NULL AUTO_INCREMENT,
  `emailSender` varchar(255) NOT NULL,
  `emailReceiver` varchar(255) NOT NULL,
  `emailCreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `emailTitle` varchar(255) NOT NULL,
  `emailDetails` varchar(255) NOT NULL,
  `projects_projectId` int(11) NOT NULL,
  PRIMARY KEY (`emailqueueId`),
  KEY `projects_projectId` (`projects_projectId`),
  CONSTRAINT `emailqueue_ibfk_1` FOREIGN KEY (`projects_projectId`) REFERENCES `projects` (`projectId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `emailqueue` */

/*Table structure for table `import` */

DROP TABLE IF EXISTS `import`;

CREATE TABLE `import` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
  `first_name` varchar(100) NOT NULL COMMENT 'First Name',
  `last_name` varchar(100) NOT NULL COMMENT 'Last Name',
  `email` varchar(255) NOT NULL COMMENT 'Email Address',
  `contact_no` varchar(50) NOT NULL COMMENT 'Contact No',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='datatable demo table';

/*Data for the table `import` */

/*Table structure for table `progressreport` */

DROP TABLE IF EXISTS `progressreport`;

CREATE TABLE `progressreport` (
  `progressReportId` int(11) NOT NULL AUTO_INCREMENT,
  `progressReportDate` date NOT NULL,
  `projectId` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`progressReportId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `progressreport` */

/*Table structure for table `projectdocuments` */

DROP TABLE IF EXISTS `projectdocuments`;

CREATE TABLE `projectdocuments` (
  `documentId` int(11) NOT NULL AUTO_INCREMENT,
  `documentNameFile` varchar(255) NOT NULL,
  `documentType` int(1) NOT NULL,
  `documentUpdated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `projects_projectId` int(11) DEFAULT NULL,
  PRIMARY KEY (`documentId`),
  KEY `projects_projectId` (`projects_projectId`),
  CONSTRAINT `projectdocuments_ibfk_1` FOREIGN KEY (`projects_projectId`) REFERENCES `projects` (`projectId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `projectdocuments` */

insert  into `projectdocuments`(`documentId`,`documentNameFile`,`documentType`,`documentUpdated`,`projects_projectId`) values 
(1,'63c76189440a5_310454101_2031096053752319_2772397055937221379_n.jpg',1,'2023-01-18 10:03:37',1);

/*Table structure for table `projectparticipants` */

DROP TABLE IF EXISTS `projectparticipants`;

CREATE TABLE `projectparticipants` (
  `participantsId` int(11) NOT NULL AUTO_INCREMENT,
  `projectCode` varchar(255) NOT NULL,
  `projectAdvisor` varchar(255) DEFAULT NULL,
  `position` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `department` varchar(255) DEFAULT NULL,
  `faculty` varchar(255) DEFAULT NULL,
  `university` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  `projects_projectId` int(11) NOT NULL,
  PRIMARY KEY (`participantsId`),
  KEY `projects_projectId` (`projects_projectId`),
  CONSTRAINT `projectparticipants_ibfk_1` FOREIGN KEY (`projects_projectId`) REFERENCES `projects` (`projectId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `projectparticipants` */

/*Table structure for table `projects` */

DROP TABLE IF EXISTS `projects`;

CREATE TABLE `projects` (
  `projectId` int(11) NOT NULL AUTO_INCREMENT,
  `projectCode` varchar(100) NOT NULL COMMENT 'รหัสโครงการ',
  `projectCertificateNo` varchar(100) NOT NULL COMMENT 'หนังสือรับรองเลขที่',
  `projectNameTH` varchar(255) NOT NULL,
  `projectNameEN` varchar(255) NOT NULL,
  `projectPosition` varchar(100) NOT NULL COMMENT 'ตำแหน่งหัวหน้าโครงการ',
  `projectLeader` varchar(255) NOT NULL COMMENT 'หัวหน้าโครงการ',
  `projectDepartment` varchar(255) NOT NULL COMMENT 'แผนก / ภาค',
  `projectFaculty` varchar(255) DEFAULT NULL COMMENT 'คณะ',
  `projectMobile` varchar(100) DEFAULT NULL,
  `projectEmail` varchar(100) DEFAULT NULL,
  `projectType` int(1) DEFAULT NULL COMMENT 'ประเภทโครงการ',
  `projectSecurityLabLevel` varchar(100) DEFAULT NULL COMMENT 'ระดับความปลอดภัยของห้อง Lab',
  `projectRoom` varchar(255) DEFAULT NULL COMMENT 'ห้องที่ใช้งาน',
  `projectRequestDate` date DEFAULT NULL COMMENT 'วันที่ยื่นขออนุมัติ',
  `projectPresentCeoDate` date DEFAULT NULL COMMENT 'วันที่เสนอผู้บริหาร',
  `projectPassToUniversityDate` date DEFAULT NULL COMMENT 'วันที่ส่งเอกสารเฉพาะส่วนลงนามเข้ามหาวิทยาลัย',
  `projectApprovalDate` date DEFAULT NULL COMMENT 'วันที่อนุมัติ',
  `projectProcessDate` date NOT NULL COMMENT 'วันที่กำหนดรายงานความก้าวหน้า',
  `projectCertificateExpireDate` date NOT NULL COMMENT 'วันที่สิ้นสุดการรับรอง',
  `projectDateClose` date DEFAULT NULL COMMENT 'วันที่ปิดโครงการ',
  `projectComment` longtext,
  `projectStatus` int(1) NOT NULL DEFAULT '0' COMMENT 'สถานะโครงการ  0 = รออนุมัติ , 1 = อนุมัติ , 2 = ปิดโครงการ',
  `projectCreated` datetime DEFAULT CURRENT_TIMESTAMP,
  `medcode` varchar(255) NOT NULL COMMENT 'เจ้าของโปรเจ็ค',
  PRIMARY KEY (`projectId`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

/*Data for the table `projects` */

insert  into `projects`(`projectId`,`projectCode`,`projectCertificateNo`,`projectNameTH`,`projectNameEN`,`projectPosition`,`projectLeader`,`projectDepartment`,`projectFaculty`,`projectMobile`,`projectEmail`,`projectType`,`projectSecurityLabLevel`,`projectRoom`,`projectRequestDate`,`projectPresentCeoDate`,`projectPassToUniversityDate`,`projectApprovalDate`,`projectProcessDate`,`projectCertificateExpireDate`,`projectDateClose`,`projectComment`,`projectStatus`,`projectCreated`,`medcode`) values 
(1,'027eee/2565','022/2565','การศึกษาเปรียบเทียบรีคอมบิแนนท์เอนไซม์ไซโคลเดกซ์ทรินไกลโคซิลทรานสเฟอเรส และเอนไซม์แอมิโลมอลเทสสำหรับการใช้ผลิตแป้งทนย่อย','A comparative study of the recombinant cyclodextrin glycosyltransferase and amylomaltase for use in resistant starch production','รศ. ดร.','จารุณี ควรพิบูลย์','พรีคลินิก (ชีวคมี)','แพทยศาสตร์','+66653523666','nuk.warat@gmail.com',2,'1','4201','2023-01-22','2023-02-22','2023-03-22','2023-03-22','2023-05-21','2023-10-21','2023-11-21','หมายเหตุเทส',1,'2023-01-18 10:02:13','BET0047'),
(2,'027eee/2566','022/2566','การศึกษาเปรียบเทียบรีคอมบิแนนท์เอนไซม์ไซโคลเดกซ์ทรินไกลโคซิลทรานสเฟอเรส และเอนไซม์แอมิโลมอลเทสสำหรับการใช้ผลิตแป้งทนย่อย','A comparative study of the recombinant cyclodextrin glycosyltransferase and amylomaltase for use in resistant starch production','รศ. ดร.','จารุณี ควรพิบูลย์','พรีคลินิก (ชีวคมี)','แพทยศาสตร์','+66653523666','nuk.warat@gmail.com',2,'1','4201','2023-01-22','2023-02-22','2023-03-22','2023-03-22','2023-05-21','2023-10-21','2023-11-21','หมายเหตุเทส',0,'2023-01-18 10:02:13','BET0048'),
(3,'027eee/2567','022/2567','การศึกษาเปรียบเทียบรีคอมบิแนนท์เอนไซม์ไซโคลเดกซ์ทรินไกลโคซิลทรานสเฟอเรส และเอนไซม์แอมิโลมอลเทสสำหรับการใช้ผลิตแป้งทนย่อย','A comparative study of the recombinant cyclodextrin glycosyltransferase and amylomaltase for use in resistant starch production','รศ. ดร.','จารุณี ควรพิบูลย์','พรีคลินิก (ชีวคมี)','แพทยศาสตร์','+66653523666','nuk.warat@gmail.com',2,'1','4201','2023-01-22','2023-02-22','2023-03-22','2023-03-22','2023-05-21','2023-10-21','2023-11-21','หมายเหตุเทส',0,'2023-01-18 10:02:13','BET0049'),
(4,'027eee/2568','022/2568','การศึกษาเปรียบเทียบรีคอมบิแนนท์เอนไซม์ไซโคลเดกซ์ทรินไกลโคซิลทรานสเฟอเรส และเอนไซม์แอมิโลมอลเทสสำหรับการใช้ผลิตแป้งทนย่อย','A comparative study of the recombinant cyclodextrin glycosyltransferase and amylomaltase for use in resistant starch production','รศ. ดร.','จารุณี ควรพิบูลย์','พรีคลินิก (ชีวคมี)','แพทยศาสตร์','+66653523666','nuk.warat@gmail.com',2,'1','4201','2023-01-22','2023-02-22','2023-03-22','2023-03-22','2023-05-21','2023-10-21','2023-11-21','หมายเหตุเทส',0,'2023-01-18 10:02:13','BET0050'),
(5,'027eee/2569','022/2569','การศึกษาเปรียบเทียบรีคอมบิแนนท์เอนไซม์ไซโคลเดกซ์ทรินไกลโคซิลทรานสเฟอเรส และเอนไซม์แอมิโลมอลเทสสำหรับการใช้ผลิตแป้งทนย่อย','A comparative study of the recombinant cyclodextrin glycosyltransferase and amylomaltase for use in resistant starch production','รศ. ดร.','จารุณี ควรพิบูลย์','พรีคลินิก (ชีวคมี)','แพทยศาสตร์','+66653523666','nuk.warat@gmail.com',2,'1','4201','2023-01-22','2023-02-22','2023-03-22','2023-03-22','2023-05-21','2023-10-21','2023-11-21','หมายเหตุเทส',0,'2023-01-18 10:02:13','BET0051'),
(6,'027eee/2570','022/2570','การศึกษาเปรียบเทียบรีคอมบิแนนท์เอนไซม์ไซโคลเดกซ์ทรินไกลโคซิลทรานสเฟอเรส และเอนไซม์แอมิโลมอลเทสสำหรับการใช้ผลิตแป้งทนย่อย','A comparative study of the recombinant cyclodextrin glycosyltransferase and amylomaltase for use in resistant starch production','รศ. ดร.','จารุณี ควรพิบูลย์','พรีคลินิก (ชีวคมี)','แพทยศาสตร์','+66653523666','nuk.warat@gmail.com',2,'1','4201','2023-01-22','2023-02-22','2023-03-22','2023-03-22','2023-05-21','2023-10-21','2023-11-21','หมายเหตุเทส',0,'2023-01-18 10:02:13','BET0052'),
(7,'027eee/2571','022/2571','การศึกษาเปรียบเทียบรีคอมบิแนนท์เอนไซม์ไซโคลเดกซ์ทรินไกลโคซิลทรานสเฟอเรส และเอนไซม์แอมิโลมอลเทสสำหรับการใช้ผลิตแป้งทนย่อย','A comparative study of the recombinant cyclodextrin glycosyltransferase and amylomaltase for use in resistant starch production','รศ. ดร.','จารุณี ควรพิบูลย์','พรีคลินิก (ชีวคมี)','แพทยศาสตร์','+66653523666','nuk.warat@gmail.com',2,'1','4201','2023-01-22','2023-02-22','2023-03-22','2023-03-22','2023-05-21','2023-10-21','2023-11-21','หมายเหตุเทส',0,'2023-01-18 10:02:13','BET0053'),
(8,'027eee/2572','022/2572','การศึกษาเปรียบเทียบรีคอมบิแนนท์เอนไซม์ไซโคลเดกซ์ทรินไกลโคซิลทรานสเฟอเรส และเอนไซม์แอมิโลมอลเทสสำหรับการใช้ผลิตแป้งทนย่อย','A comparative study of the recombinant cyclodextrin glycosyltransferase and amylomaltase for use in resistant starch production','รศ. ดร.','จารุณี ควรพิบูลย์','พรีคลินิก (ชีวคมี)','แพทยศาสตร์','+66653523666','nuk.warat@gmail.com',2,'1','4201','2023-01-22','2023-02-22','2023-03-22','2023-03-22','2023-05-21','2023-10-21','2023-11-21','หมายเหตุเทส',0,'2023-01-18 10:02:13','ASU0020');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(255) NOT NULL,
  `userPassword` varchar(255) NOT NULL,
  `userCreated` datetime DEFAULT CURRENT_TIMESTAMP,
  `userRole` int(1) DEFAULT '3' COMMENT '1 = superadmin , 2 = admin , 3 = user',
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

/*Data for the table `users` */

insert  into `users`(`userId`,`userName`,`userPassword`,`userCreated`,`userRole`) values 
(2,'ADMIN','9d4e1e23bd5b727046a9e3b4b7db57bd8d6ee684','2022-09-12 09:49:02',1),
(3,'USER','d033e22ae348aeb5660fc2140aec35850c4da997','2022-09-12 16:00:12',3),
(4,'STREETNUK','7C4A8D09CA3762AF61E59520943DC26494F8941B','2022-09-13 13:42:47',3),
(14,'ADDDD','01464E1616E3FDD5C60C0CC5516C1D1454CC4185','2022-09-13 13:54:44',3),
(15,'SSSSS','C455582F41F589213A7D34CCB3954C67476077DA','2022-09-13 13:55:24',3),
(16,'TEST','A94A8FE5CCB19BA61C4C0873D391E987982FBBD3','2022-09-13 13:59:58',3),
(17,'TETE','3105221C1C15399D170EF540E974EF4F37F84E93','2022-09-13 14:00:05',3),
(18,'SSEDQWEWQE','AB89ABAF755B3FDE63FF26CFDD573009B494C037','2022-09-13 14:01:50',3);

/*Table structure for table `users_log` */

DROP TABLE IF EXISTS `users_log`;

CREATE TABLE `users_log` (
  `logId` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(255) NOT NULL,
  `status` int(1) DEFAULT NULL COMMENT '1 = login , 0 = logout',
  `logCreated` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`logId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `users_log` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
