-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: asm2_200312
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

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
-- Table structure for table `account`
--

DROP TABLE IF EXISTS `account`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `account` (
  `Acc_Name` varchar(50) NOT NULL,
  `Address` varchar(300) NOT NULL,
  `Email` varchar(150) NOT NULL,
  `Fullname` varchar(50) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `State` int(11) NOT NULL,
  PRIMARY KEY (`Acc_Name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `account`
--

LOCK TABLES `account` WRITE;
/*!40000 ALTER TABLE `account` DISABLE KEYS */;
INSERT INTO `account` VALUES ('abc','Can Tho','Abc@gmail.com','Nguyen Nhat Chinh','Male','12345678',0),('Admin','Dong Thap','Admin@gmail.com','Nguyen Nhat Chinh','Male','admin123456',1),('Kimthanh','Dong Thap','thanh@gmail.com','Dinh Thi  Kim Thanh','Female','12345678',0),('test','Dong Thap','Admin@gmail.com','Nguyen Van A','Female','123123',0);
/*!40000 ALTER TABLE `account` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `Cate_Description` varchar(300) NOT NULL,
  `Cate_ID` varchar(10) NOT NULL,
  `Cate_Name` varchar(50) NOT NULL,
  PRIMARY KEY (`Cate_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES ('thi la v do','ADIDAS','ADIDAS'),('chat luong cao','DIS01','DISCOVERY'),('nay toan do gia','FAKE','FAKE'),('nay la nike','NIKE','NIKE');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_detail`
--

DROP TABLE IF EXISTS `order_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_detail` (
  `Order_ID` int(10) NOT NULL AUTO_INCREMENT,
  `Shoe_ID` varchar(10) NOT NULL,
  `Price` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  PRIMARY KEY (`Order_ID`,`Shoe_ID`),
  KEY `FK1` (`Shoe_ID`,`Order_ID`) USING BTREE,
  CONSTRAINT `FK1` FOREIGN KEY (`Shoe_ID`) REFERENCES `shoe` (`Shoe_ID`),
  CONSTRAINT `Fk2` FOREIGN KEY (`Order_ID`) REFERENCES `orders` (`Order_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_detail`
--

LOCK TABLES `order_detail` WRITE;
/*!40000 ALTER TABLE `order_detail` DISABLE KEYS */;
INSERT INTO `order_detail` VALUES (7,'PR01',30,2),(10,'PR01',30,1),(10,'PR06',75,1),(11,'PR02',50,2);
/*!40000 ALTER TABLE `order_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `Acc_Name` varchar(50) NOT NULL,
  `Receiver_Name` varchar(100) NOT NULL,
  `Phone` varchar(10) NOT NULL,
  `Order_Date` datetime NOT NULL,
  `Delivery_Address` varchar(300) NOT NULL,
  `Total_Price` int(11) NOT NULL,
  `Order_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Status` int(2) NOT NULL,
  PRIMARY KEY (`Order_ID`),
  KEY `FK3` (`Acc_Name`),
  CONSTRAINT `FK3` FOREIGN KEY (`Acc_Name`) REFERENCES `account` (`Acc_Name`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES ('Admin','Chinh','0123456789','2022-05-12 00:00:00','Ca Mau',60,7,3),('Admin','Chinh','0321456987','2022-05-12 00:00:00','Vinh Long',105,10,0),('Kimthanh','Kimthanh','0987123345','2022-05-12 00:00:00','Can Tho',100,11,1);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shoe`
--

DROP TABLE IF EXISTS `shoe`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shoe` (
  `Shoe_Name` varchar(50) NOT NULL,
  `Shoe_ID` varchar(10) NOT NULL,
  `Cate_ID` varchar(10) NOT NULL,
  `Shoe_Price` int(11) NOT NULL,
  `Shoe_Quantity` int(11) NOT NULL,
  `Shoe_Picture` varchar(500) NOT NULL,
  `Shoe_Discription` varchar(300) NOT NULL,
  PRIMARY KEY (`Shoe_ID`),
  KEY `FK` (`Cate_ID`),
  CONSTRAINT `FK` FOREIGN KEY (`Cate_ID`) REFERENCES `category` (`Cate_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shoe`
--

LOCK TABLES `shoe` WRITE;
/*!40000 ALTER TABLE `shoe` DISABLE KEYS */;
INSERT INTO `shoe` VALUES ('DEN THUI','PR01','ADIDAS',30,50,'ac3f58970a53247b481bab2c546fb446.jpg','PLAPLAPLAP'),('GIAY HIEU','PR02','DIS01',50,100,'dep.jpg','12345689789'),('DEN THUI CHAM COM','PR03','FAKE',10,80,'giayden.jpg','den thui thui lui'),('ROUKER','PR05','FAKE',60,35,'gt-ap0156001a-(2).jpg','cau mong may man'),('DISTINTION','PR06','ADIDAS',75,60,'giay real.jpg','xampp oi la xampp'),('PASS','PR08','NIKE',90,45,'boston.jpg','ROT MON');
/*!40000 ALTER TABLE `shoe` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-05-13 12:47:17
