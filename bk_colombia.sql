-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 08, 2024 at 12:26 PM
-- Server version: 8.2.0
-- PHP Version: 8.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bk_colombia`
--

-- --------------------------------------------------------

--
-- Table structure for table `app_ads`
--

DROP TABLE IF EXISTS `app_ads`;
CREATE TABLE IF NOT EXISTS `app_ads` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `NAME` varchar(255) NOT NULL,
  `TYPE` enum('VIDEO','IMAGE','LINK') NOT NULL,
  `LINK` text NOT NULL,
  `ACTIVE` bit(1) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `app_category`
--

DROP TABLE IF EXISTS `app_category`;
CREATE TABLE IF NOT EXISTS `app_category` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `NAME` varchar(255) NOT NULL,
  `ID_TAX` int NOT NULL,
  `BACKGROUND` varchar(20) DEFAULT NULL,
  `FORECOLOR` varchar(20) DEFAULT NULL,
  `IMAGE` text,
  `ORDER` int DEFAULT NULL,
  `ONSALE` bit(1) NOT NULL,
  `INIT` datetime DEFAULT NULL,
  `END` datetime DEFAULT NULL,
  `IS_SHOW` bit(1) NOT NULL,
  `ACTIVE` bit(1) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `ID_TAX` (`ID_TAX`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `app_category`
--

INSERT INTO `app_category` (`ID`, `NAME`, `ID_TAX`, `BACKGROUND`, `FORECOLOR`, `IMAGE`, `ORDER`, `ONSALE`, `INIT`, `END`, `IS_SHOW`, `ACTIVE`) VALUES
(1, 'Categoria 1', 2, '', '', 'GJdfXMAQfhttaU34GFV7mbtlrnY82Zqp.jpeg', 1, b'1', NULL, NULL, b'1', b'1'),
(2, 'Zapatos', 2, '', '', NULL, 2, b'0', NULL, NULL, b'0', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `app_country`
--

DROP TABLE IF EXISTS `app_country`;
CREATE TABLE IF NOT EXISTS `app_country` (
  `ID` varchar(3) NOT NULL,
  `NAME` varchar(30) NOT NULL,
  `ISO3` varchar(3) NOT NULL,
  `ACTIVE` bit(1) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `app_country`
--

INSERT INTO `app_country` (`ID`, `NAME`, `ISO3`, `ACTIVE`) VALUES
('COL', 'Colombia', 'COL', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `app_customer`
--

DROP TABLE IF EXISTS `app_customer`;
CREATE TABLE IF NOT EXISTS `app_customer` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `USERNAME` varchar(255) NOT NULL,
  `PASSWORD` varchar(500) DEFAULT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `FULLNAME` varchar(255) NOT NULL,
  `PHONE` varchar(20) NOT NULL,
  `WHATSAPP` varchar(20) DEFAULT NULL,
  `ID_COUNTRY` varchar(3) NOT NULL,
  `BIRTHDATE` varchar(10) NOT NULL,
  `ID_GENDER` varchar(2) NOT NULL,
  `TYPE_REGISTRATION` enum('EMAIL','FACEBOOK','INSTAGRAM','GOOGLE') NOT NULL,
  `ID_REGISTRATION` varchar(255) DEFAULT NULL,
  `CREATED_AT` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `IS_OTP` bit(1) NOT NULL,
  `ACTIVE` bit(1) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `USERNAME` (`USERNAME`,`EMAIL`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `app_customer`
--

INSERT INTO `app_customer` (`ID`, `USERNAME`, `PASSWORD`, `EMAIL`, `FULLNAME`, `PHONE`, `WHATSAPP`, `ID_COUNTRY`, `BIRTHDATE`, `ID_GENDER`, `TYPE_REGISTRATION`, `ID_REGISTRATION`, `CREATED_AT`, `IS_OTP`, `ACTIVE`) VALUES
(1, 'azuloro85', '', 'azuloro85@gmail.com', 'Luis Hernandez', '78325858', '78325858', 'COL', '08/05/1985', '1', 'EMAIL', '', '2023-07-19 17:26:09', b'0', b'1'),
(2, 'nfunes', NULL, 'nfunes@outlook.com', 'Nestor Funes', '77598777', '', 'COL', '2005-04-02', '1', 'EMAIL', NULL, '2024-04-03 22:20:33', b'0', b'1'),
(3, 'demo12', NULL, 'demo@itcomca.com', 'Cuenta Demo', '99987777', '', 'COL', '2005-04-01', '1', 'EMAIL', NULL, '2024-04-03 22:25:36', b'0', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `app_customer_address`
--

DROP TABLE IF EXISTS `app_customer_address`;
CREATE TABLE IF NOT EXISTS `app_customer_address` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `ID_USER` int NOT NULL,
  `NAME` varchar(50) NOT NULL,
  `ADDRESS1` varchar(150) NOT NULL,
  `ADDRESS2` varchar(150) NOT NULL,
  `PHONE` varchar(20) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `ID_USER` (`ID_USER`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `app_enterprise`
--

DROP TABLE IF EXISTS `app_enterprise`;
CREATE TABLE IF NOT EXISTS `app_enterprise` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `CODE` varchar(10) NOT NULL,
  `NAME` varchar(100) NOT NULL,
  `ADDRESS` varchar(255) NOT NULL,
  `NIT` varchar(30) NOT NULL,
  `RUT` varchar(30) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `CONTACT` varchar(100) NOT NULL,
  `PHONE` varchar(30) NOT NULL,
  `CREATED_AT` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ACTIVE` bit(1) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `CODE` (`CODE`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `app_enterprise`
--

INSERT INTO `app_enterprise` (`ID`, `CODE`, `NAME`, `ADDRESS`, `NIT`, `RUT`, `EMAIL`, `CONTACT`, `PHONE`, `CREATED_AT`, `ACTIVE`) VALUES
(2, '6516516', 'ITCOMCA', 'El Salvador', '987654321', '95184751', 'demo@itcom.com', 'Nestor Funes', '77598777', '2024-04-04 23:35:00', b'1'),
(3, '51651651sA', 'ITCOMCA', 'El Salvador', '46516514654', '654651616516', 'demo@itcom.com', 'Nestor Funes', '77598777', '2024-04-04 23:54:35', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `app_fiscal`
--

DROP TABLE IF EXISTS `app_fiscal`;
CREATE TABLE IF NOT EXISTS `app_fiscal` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `TYPE` enum('TICKET','CREDITO FISCAL','FACTURA','') NOT NULL,
  `AUTH_RESOLUTION` varchar(50) NOT NULL,
  `AUTH_DATE` varchar(20) NOT NULL,
  `SERIE` varchar(50) NOT NULL,
  `INIT` int NOT NULL,
  `END` int NOT NULL,
  `CURRENT` int NOT NULL,
  `CREATED_AT` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ACTIVE` bit(1) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `app_gender`
--

DROP TABLE IF EXISTS `app_gender`;
CREATE TABLE IF NOT EXISTS `app_gender` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `NAME` varchar(10) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `app_gender`
--

INSERT INTO `app_gender` (`ID`, `NAME`) VALUES
(1, 'MASCULINO'),
(2, 'FEMENINO');

-- --------------------------------------------------------

--
-- Table structure for table `app_global_config`
--

DROP TABLE IF EXISTS `app_global_config`;
CREATE TABLE IF NOT EXISTS `app_global_config` (
  `ID` varchar(20) NOT NULL,
  `VALUE` varchar(255) NOT NULL,
  `DESCRIPTION` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `app_global_config`
--

INSERT INTO `app_global_config` (`ID`, `VALUE`, `DESCRIPTION`) VALUES
('ADDRESS', 'Address', NULL),
('CURRENCY', 'COL', NULL),
('CURRENCY_NAME', 'Peso Colombiano', NULL),
('DEFAULT_TAX', '2', ''),
('ENTERPRISE', 'Burguer King Colombia', ''),
('FISCAL_DOC', '', NULL),
('FORMAT', 'YYYY/MM/DD', NULL),
('PHONE', '(000)-0000', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `app_item`
--

DROP TABLE IF EXISTS `app_item`;
CREATE TABLE IF NOT EXISTS `app_item` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `ID_PARENT` int DEFAULT NULL,
  `BARCODE` varchar(255) NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `ID_TYPE_ITEM` varchar(1) NOT NULL,
  `ID_CATEGORY` int NOT NULL,
  `PRICE_COST` decimal(10,4) NOT NULL,
  `PRICE_SELL` decimal(10,4) NOT NULL,
  `ID_TAX` int NOT NULL,
  `MARGIN` decimal(10,4) NOT NULL,
  `PRICE_TAX` decimal(10,4) NOT NULL,
  `IMAGE` text,
  `ON_SALE` bit(1) NOT NULL,
  `INIT` datetime DEFAULT NULL,
  `END` datetime DEFAULT NULL,
  `DESCRIPCION` text NOT NULL,
  `EXTRAS` text,
  `IS_SHOW` bit(1) NOT NULL,
  `IS_PARENT` bit(1) NOT NULL,
  `ACTIVE` bit(1) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `BARCODE` (`BARCODE`),
  KEY `ID_CATEGORY` (`ID_CATEGORY`),
  KEY `ID_TAX` (`ID_TAX`),
  KEY `ID_PARENT` (`ID_PARENT`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `app_item`
--

INSERT INTO `app_item` (`ID`, `ID_PARENT`, `BARCODE`, `NAME`, `ID_TYPE_ITEM`, `ID_CATEGORY`, `PRICE_COST`, `PRICE_SELL`, `ID_TAX`, `MARGIN`, `PRICE_TAX`, `IMAGE`, `ON_SALE`, `INIT`, `END`, `DESCRIPCION`, `EXTRAS`, `IS_SHOW`, `IS_PARENT`, `ACTIVE`) VALUES
(1, 1, '10105856', 'Product New', 'P', 1, 10.0000, 14.0000, 2, 40.0000, 15.8200, '', b'0', NULL, NULL, 'Large description', '', b'1', b'0', b'1'),
(2, 2, '10000', 'Libreta', 'P', 1, 1.5000, 2.1000, 2, 0.0000, 0.0000, 'zVsRbsrse6C_nvVM5EzwsEe4Op_V-tdY.jpg', b'0', NULL, NULL, 'Libreta WWWWW', '', b'0', b'0', b'1'),
(3, 1, '123456789', 'Cartera Hugo Boss', 'P', 1, 100.0000, 1000.0000, 2, 900.0000, 0.0000, '', b'0', NULL, NULL, 'efefwefwef', '', b'1', b'0', b'1'),
(4, 1, '986635896', 'Desayuno americano', 'P', 1, 100.0000, 500.0000, 2, 0.0000, 565.0000, NULL, b'0', NULL, NULL, '', '', b'0', b'0', b'1'),
(5, 5, '15896325eee', 'BOTA 0025', 'P', 1, 100.0000, 150.0000, 2, 50.0000, 169.5000, NULL, b'0', NULL, NULL, '', '', b'1', b'0', b'1'),
(6, 5, '100000', 'BOTA 0025 TALLA 7', 'P', 1, 0.0000, 0.0000, 2, 0.0000, 0.0000, NULL, b'0', NULL, NULL, '', NULL, b'0', b'0', b'1'),
(8, 2, '100030', 'BOTA 0025 TALLA 88', 'P', 1, 0.0000, 0.0000, 2, 0.0000, 0.0000, NULL, b'0', NULL, NULL, '', NULL, b'0', b'0', b'1'),
(9, 9, '15896596', 'Test', 'P', 2, 0.0000, 0.0000, 2, 0.0000, 0.0000, NULL, b'0', NULL, NULL, '', NULL, b'1', b'0', b'1'),
(10, 10, '78966569', 'Test 2', 'P', 2, 100.0000, 150.0000, 2, 50.0000, 169.5000, NULL, b'0', NULL, NULL, '', NULL, b'1', b'0', b'1'),
(11, 1, '789456789', 'ewfwef', 'P', 1, 10.0000, 15.0000, 2, 50.0000, 16.9500, NULL, b'0', NULL, NULL, 'wefewfwef', NULL, b'1', b'0', b'1'),
(12, 1, '789965', 'dfdslkfjsdlfkj', 'P', 1, 10.0000, 15.0000, 1, 50.0000, 15.0000, NULL, b'0', NULL, NULL, '', NULL, b'1', b'0', b'1'),
(13, 1, 'efewfwef', '23432423', 'P', 1, 10.0000, 71.0000, 2, 610.0000, 80.2300, NULL, b'0', NULL, NULL, '', NULL, b'1', b'0', b'1'),
(14, 1, '89789', '789789', 'P', 1, 89.0000, 89.0000, 2, 0.0000, 100.5700, NULL, b'0', NULL, NULL, 'ewfewfewfewfewf', NULL, b'1', b'0', b'1'),
(15, 1, '34234', '234234', 'P', 1, 10.0000, 10.0000, 1, 0.0000, 10.0000, NULL, b'0', NULL, NULL, '', NULL, b'1', b'0', b'1'),
(16, 1, '4398340598304', 'TEST MODIFICADOR', 'P', 1, 10.0000, 15.0000, 2, 50.0000, 16.9500, NULL, b'0', NULL, NULL, '', NULL, b'1', b'0', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `app_log`
--

DROP TABLE IF EXISTS `app_log`;
CREATE TABLE IF NOT EXISTS `app_log` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `USER` varchar(100) NOT NULL,
  `MODULE` varchar(100) NOT NULL,
  `MODULE_FIELD` varchar(255) NOT NULL,
  `ACTIVITY` varchar(255) NOT NULL,
  `VALUE` varchar(255) NOT NULL,
  `CREATED_AT` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `app_promotion`
--

DROP TABLE IF EXISTS `app_promotion`;
CREATE TABLE IF NOT EXISTS `app_promotion` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `CODE` varchar(50) NOT NULL,
  `NAME` varchar(100) NOT NULL,
  `DESCRIPTION` varchar(2000) NOT NULL,
  `ID_TYPE_PROMOTION` varchar(2) NOT NULL,
  `VALUE` decimal(10,4) DEFAULT NULL,
  `TYPE_DISC` enum('PERCENT','AMOUNT') DEFAULT NULL,
  `ID_ITEM` int DEFAULT NULL,
  `INIT` datetime DEFAULT NULL,
  `END` datetime DEFAULT NULL,
  `IMAGE` text,
  `LINK` text NOT NULL,
  `REGULAR_PRICE` decimal(10,4) NOT NULL,
  `PROMO_PRICE` decimal(10,4) NOT NULL,
  `LIMIT_EXCHANGE` int DEFAULT '0',
  `LIMIT_PER_DAY` int NOT NULL DEFAULT '0',
  `REDIMM` int DEFAULT NULL,
  `LIMIT_PER_CUSTOMER` int NOT NULL DEFAULT '0',
  `LIMIT_PER_DAY_CUSTOMER` int NOT NULL DEFAULT '0',
  `ID_ENTERPRISE` int NOT NULL DEFAULT '0',
  `SERIE` varchar(50) DEFAULT NULL,
  `S_INIT` int DEFAULT NULL,
  `S_END` int DEFAULT NULL,
  `ACTIVE` bit(1) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `CODE` (`CODE`,`ID_ITEM`),
  KEY `ID_TYPE_PROMOTION` (`ID_TYPE_PROMOTION`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `app_promotion`
--

INSERT INTO `app_promotion` (`ID`, `CODE`, `NAME`, `DESCRIPTION`, `ID_TYPE_PROMOTION`, `VALUE`, `TYPE_DISC`, `ID_ITEM`, `INIT`, `END`, `IMAGE`, `LINK`, `REGULAR_PRICE`, `PROMO_PRICE`, `LIMIT_EXCHANGE`, `LIMIT_PER_DAY`, `REDIMM`, `LIMIT_PER_CUSTOMER`, `LIMIT_PER_DAY_CUSTOMER`, `ID_ENTERPRISE`, `SERIE`, `S_INIT`, `S_END`, `ACTIVE`) VALUES
(2, 'PBCLMWWOMABT1J20242104120739', 'PROMO 2 BK JR QUESO', 'No acumulable con otras promociones o descuentos, incluye 2 hamburguesas con 1 carne de 48gr c/u. 2 gaseosa pequeña de 12 oz c/u y 2 papas pequeñas. Válido hasta el 30 de abril del 2024 o hasta agotar existencias, 10.000 unidades disponibles a nivel nacional. Aplica para domicilios por un pedido mínimo de $10.000 pesos + el recargo de domicilios. Es indispensable presentar el cupón para redimir la promoción. El precio antes de la oferta es calculado con los precios de cada uno de los productos sueltos, no se tienen en cuenta combos ni ofertas. La imagen del cupón es de referencia y puede ser diferente al producto final entregado. TM & © Burger King Corporation. Se utiliza bajo licencia. Todos los derechos reservados.', 'PC', NULL, NULL, NULL, '2024-04-08 00:00:00', '2024-04-30 00:00:00', 'E8VTjp-unuWpcQmldqXeQ8sIsSTdJahk.jpg', 'https://www.bk.com.co/cupones/?coupon=promo-2-bk-jr-queso&id=2791', 33400.0000, 23900.0000, 10000, 0, NULL, 0, 0, 0, '', NULL, NULL, b'1'),
(3, 'PBCLISUI3AEYXD20242204360755', 'BK DOBLE', 'No acumulable con otras promociones o descuentos, el combo incluye hamburguesa BK Doble de carne de 48 gr, 1 gaseosa pequeña de 12 oz y 1 papas pequeñas. Válido hasta el 30 de abril del 2024 o hasta agotar existencias, 10.000 unidades disponibles a nivel nacional. Aplica para domicilios por un pedido mínimo de $10.000 pesos + el recargo de domicilios. Es indispensable presentar el cupón para redimir la promoción. El precio antes de la oferta es calculado con los precios de cada uno de los productos sueltos, no se tienen en cuenta combos ni ofertas. La imagen del cupón es de referencia y puede ser diferente al producto final entregado. TM & © Burger King Corporation. Se utiliza bajo licencia. Todos los derechos reservados.', 'PC', NULL, NULL, NULL, '2024-04-08 00:00:00', '2024-04-30 00:00:00', 'nRLrquebvTF4qejCCzmt4lc3MkT9xzoY.jpg', 'https://www.bk.com.co/cupones/?coupon=bk-doble&id=3312', 23700.0000, 16900.0000, 10000, 0, NULL, 0, 0, 0, NULL, NULL, NULL, b'1'),
(4, 'PBCLSDVS8HSN7E20241004140840', 'WHOPPER JR+BBQ BURGER', 'No acumulable con otras promociones o descuentos, incluye 2 hamburguesas con carne de 48gr. Válido hasta el 30 de abril del 2024 o hasta agotar existencias, 10.000 unidades disponibles a nivel nacional. Aplica para domicilios por un pedido mínimo de $10.000 pesos + el recargo de domicilios. Es indispensable presentar el cupón para redimir la promoción. El precio antes de la oferta es calculado con los precios de cada uno de los productos sueltos, no se tienen en cuenta combos ni ofertas. La imagen del cupón es de referencia y puede ser diferente al producto final entregado. TM & © Burger King Corporation. Se utiliza bajo licencia. Todos los derechos reservados.', 'PC', NULL, NULL, NULL, '2024-04-08 00:00:00', '2024-04-30 00:00:00', 'AMEbAfnzWuHO6byqVRZxNe2JLNb0mXY9.jpg', 'https://www.bk.com.co/cupones/?coupon=whopper-jrbbq-burger&id=3307', 25800.0000, 16900.0000, 10000, 0, NULL, 0, 0, 0, NULL, NULL, NULL, b'1'),
(5, 'PBCL5BJIH1KW9H20241104370806', 'WHOPPER JR CON YUCAS', 'No acumulable con otras promociones o descuentos, El combo incluye Hamburguesa Whopper ® jr de carne de 48 gr y 1 yucas x 8und Válido hasta el 30 de abril del 2024 o hasta agotar existencias, 10.000 unidades disponibles a nivel nacional. Aplica para domicilios por un pedido mínimo de $10.000 pesos + el recargo de domicilios. Es indispensable presentar el cupón para redimir la promoción. El precio antes de la oferta es calculado con los precios de cada uno de los productos sueltos, no se tienen en cuenta combos ni ofertas. La imagen del cupón es de referencia y puede ser diferente al producto final entregado. TM & © Burger King Corporation. Se utiliza bajo licencia. Todos los derechos reservados.', 'PC', NULL, NULL, NULL, '2024-04-08 00:00:00', '2024-04-25 00:00:00', 'sXXjB17w2dyb9LbAQDODQInySRnjSfH4.jpg', 'https://www.bk.com.co/cupones/?coupon=whopper-jr-con-yucas&id=3309', 29700.0000, 14900.0000, 10000, 0, NULL, 0, 0, 0, NULL, NULL, NULL, b'1'),
(6, 'PBCL2R9KB2TT1D20241204150805', 'MEGASTACKER SENCILLA', 'No acumulable con otras promociones o descuentos, el combo incluye una hamburguesa con 1 carne de 113 g y 1 gaseosas pequeña de 12 oz c/u. Válido hasta el 30 de abril del 2024 o hasta agotar existencias, 10.000 unidades disponibles a nivel nacional. Aplica para domicilios por un pedido mínimo de $10.000 pesos + el recargo de domicilios. Es indispensable presentar el cupón para redimir la promoción. El precio antes de la oferta es calculado con los precios de cada uno de los productos sueltos, no se tienen en cuenta combos ni ofertas. La imagen del cupón es de referencia y puede ser diferente al producto final entregado. TM & © Burger King Corporation. Se utiliza bajo licencia. Todos los derechos reservados.', 'PC', NULL, NULL, NULL, '2024-04-08 00:00:00', '2024-04-30 00:00:00', 'fd2LsMSA1fHHjuf5FI2RM2-87HuRBAZT.jpg', 'https://www.bk.com.co/cupones/?coupon=megastacker-sencilla&id=3310', 32300.0000, 20900.0000, 10000, 0, NULL, 0, 0, 0, NULL, NULL, NULL, b'1'),
(7, 'PBCLV4TDL5O8H520241204180814', 'WHOPPER JR +BK CHICKEN', 'No acumulable con otras promociones o descuentos, el combo incluye una hamburguesa con 1 carne de 48g y una Bk Chicken con un Filete de pollo de 78g, 2 gaseosas pequeñas de 12 oz c/u y 2 papas pequeñas Válido hasta el 30 de abril del 2024 o hasta agotar existencias, 10.000 unidades disponibles a nivel nacional. Aplica para domicilios por un pedido mínimo de $10.000 pesos + el recargo de domicilios. Es indispensable presentar el cupón para redimir la promoción. El precio antes de la oferta es calculado con los precios de cada uno de los productos sueltos, no se tienen en cuenta combos ni ofertas. La imagen del cupón es de referencia y puede ser diferente al producto final entregado. TM & © Burger King Corporation. Se utiliza bajo licencia. Todos los derechos reservados.', 'PC', NULL, NULL, NULL, '2024-04-01 00:00:00', '2024-04-30 00:00:00', 'u8ARn1a7zfrgDdNzeMhIFfEoujof44jR.jpg', 'https://www.bk.com.co/cupones/?coupon=whopper-jr-bk-chicken&id=3308', 45400.0000, 25900.0000, 10000, 0, NULL, 0, 0, 0, NULL, NULL, NULL, b'1'),
(8, 'PBCLEQ6NK4J05G20241204200858', 'PROMO CONO SENCILLO', 'El cono incluye 2 vueltas y media de helado. No Aplica para domicilios solo para Restaurante. Es indispensable presentar el cupón para redimir la promoción. La imagen del cupón es de referencia y puede ser diferente al producto final entregado.', 'PC', NULL, NULL, NULL, '2024-04-01 00:00:00', '2024-04-30 00:00:00', 'msi1Sc6XZvAiTBUE6tdh7ya1ZxwhmUDR.jpg', 'https://www.bk.com.co/cupones/?coupon=promo-cono-sencillo&id=2445', 3500.0000, 2000.0000, 10000, 0, NULL, 0, 0, 0, NULL, NULL, NULL, b'1'),
(9, 'PBCL2H8I1MZ13B20241204220801', 'PROMO SUNDAE', 'No acumulable con otras promociones o descuentos, el combo incluye un sundae de cualquier sabor (frutos rojos, arequipe o chocolate, sujeto a disponibilidad) y unas papas pequeñas. Válido hasta el 30 de abril del 2024 o hasta agotar existencias, 10.000 unidades disponibles a nivel nacional. Aplica para domicilios por un pedido mínimo de $10.000 pesos + el recargo de domicilios. Es indispensable presentar el cupón para redimir la promoción. El precio antes de la oferta es calculado con los precios de cada uno de los productos sueltos, no se tienen en cuenta combos ni ofertas. La imagen del cupón es de referencia y puede ser diferente al producto final entregado. TM & © Burger King Corporation. Se utiliza bajo licencia. Todos los derechos reservados.', 'PC', NULL, NULL, NULL, '2024-04-01 00:00:00', '2024-04-30 00:00:00', '8MWWEpyzjwtHTQYK7n6YzZ3TNsN_SiSz.jpg', 'https://www.bk.com.co/cupones/?coupon=promo-sundae&id=3311', 13300.0000, 8900.0000, 10000, 0, NULL, 0, 0, 0, NULL, NULL, NULL, b'1');

-- --------------------------------------------------------

--
-- Table structure for table `app_promotion_serial`
--

DROP TABLE IF EXISTS `app_promotion_serial`;
CREATE TABLE IF NOT EXISTS `app_promotion_serial` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `ID_PROMOTION` int NOT NULL,
  `SERIE` varchar(50) NOT NULL,
  `INITIAL` int NOT NULL,
  `FINAL` int NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `app_rol`
--

DROP TABLE IF EXISTS `app_rol`;
CREATE TABLE IF NOT EXISTS `app_rol` (
  `ID` int NOT NULL,
  `NAME` varchar(50) NOT NULL,
  `ACTIVE` bit(1) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `app_rol`
--

INSERT INTO `app_rol` (`ID`, `NAME`, `ACTIVE`) VALUES
(1, 'ADMIN', b'1'),
(2, 'SUPERUSER', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `app_sale`
--

DROP TABLE IF EXISTS `app_sale`;
CREATE TABLE IF NOT EXISTS `app_sale` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `ID_USER` int NOT NULL,
  `ID_ADDRESS` int NOT NULL,
  `RESOLUTION_AUTH` varchar(50) NOT NULL,
  `SERIE_AUTH` varchar(50) NOT NULL,
  `NUMBER_AUTH` varchar(20) NOT NULL,
  `DATE_AUTH` varchar(20) NOT NULL,
  `SUBTOTAL` decimal(10,4) NOT NULL,
  `DISCOUNTS` decimal(10,4) NOT NULL,
  `TAXES` decimal(10,4) NOT NULL,
  `TOTAL` decimal(10,4) NOT NULL,
  `TENDER` decimal(10,4) NOT NULL,
  `PAYMENTS` decimal(10,4) NOT NULL,
  `CHANGED` decimal(10,4) NOT NULL,
  `NOTES` varchar(255) NOT NULL,
  `CREATED_AT` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ID_USER_CONSOLE` int NOT NULL,
  `ACTIVE` bit(1) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `ID_USER` (`ID_USER`,`ID_ADDRESS`),
  KEY `ID_USER_CONSOLE` (`ID_USER_CONSOLE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `app_sale_item`
--

DROP TABLE IF EXISTS `app_sale_item`;
CREATE TABLE IF NOT EXISTS `app_sale_item` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `ID_SALE` int NOT NULL,
  `BARCODE` varchar(50) NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `ID_CATEGORY` int NOT NULL,
  `ID_ITEM` int NOT NULL,
  `PRICE_COST` decimal(10,4) NOT NULL,
  `PRICE_SELL` decimal(10,4) NOT NULL,
  `QUANTITY` decimal(10,2) NOT NULL,
  `ID_TAX` int NOT NULL,
  `TAXES` decimal(10,4) NOT NULL,
  `TOTAL` decimal(10,4) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `ID_CATEGORY` (`ID_CATEGORY`,`ID_ITEM`),
  KEY `ID_TAX` (`ID_TAX`),
  KEY `ID_SALE` (`ID_SALE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `app_sale_payment`
--

DROP TABLE IF EXISTS `app_sale_payment`;
CREATE TABLE IF NOT EXISTS `app_sale_payment` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `ID_SALE` int NOT NULL,
  `TYPE_PAYMENT` varchar(10) NOT NULL,
  `NUMBER` varchar(50) NOT NULL,
  `AMOUNT` decimal(10,4) NOT NULL,
  `TOTAL` decimal(10,4) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `ID_SALE` (`ID_SALE`,`TYPE_PAYMENT`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `app_sale_tax`
--

DROP TABLE IF EXISTS `app_sale_tax`;
CREATE TABLE IF NOT EXISTS `app_sale_tax` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `ID_SALE` int NOT NULL,
  `ID_TAX` int NOT NULL,
  `AMOUNT` decimal(10,4) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `ID_SALE` (`ID_SALE`),
  KEY `ID_TAX` (`ID_TAX`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `app_store`
--

DROP TABLE IF EXISTS `app_store`;
CREATE TABLE IF NOT EXISTS `app_store` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `NAME` varchar(255) NOT NULL,
  `ADDRESS` varchar(255) NOT NULL,
  `IMAGE` text NOT NULL,
  `DATA_JSON` text NOT NULL,
  `ACTIVE` bit(1) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `app_tax`
--

DROP TABLE IF EXISTS `app_tax`;
CREATE TABLE IF NOT EXISTS `app_tax` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `NAME` varchar(255) NOT NULL,
  `PERCENT` decimal(3,2) NOT NULL,
  `ACTIVE` bit(1) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `app_tax`
--

INSERT INTO `app_tax` (`ID`, `NAME`, `PERCENT`, `ACTIVE`) VALUES
(1, 'EXEMPTO', 0.00, b'1'),
(2, 'IVA', 0.13, b'1');

-- --------------------------------------------------------

--
-- Table structure for table `app_type_item`
--

DROP TABLE IF EXISTS `app_type_item`;
CREATE TABLE IF NOT EXISTS `app_type_item` (
  `ID` varchar(1) NOT NULL,
  `NAME` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `app_type_item`
--

INSERT INTO `app_type_item` (`ID`, `NAME`) VALUES
('D', 'PLATILLO'),
('E', 'EXTRAS'),
('P', 'PRODUCTO'),
('S', 'SERVICIO');

-- --------------------------------------------------------

--
-- Table structure for table `app_type_payment`
--

DROP TABLE IF EXISTS `app_type_payment`;
CREATE TABLE IF NOT EXISTS `app_type_payment` (
  `ID` varchar(2) NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `ACTIVE` bit(1) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `app_type_payment`
--

INSERT INTO `app_type_payment` (`ID`, `NAME`, `ACTIVE`) VALUES
('CC', 'TARJETA CREDITO', b'1'),
('CS', 'EFECTIVO', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `app_type_promotion`
--

DROP TABLE IF EXISTS `app_type_promotion`;
CREATE TABLE IF NOT EXISTS `app_type_promotion` (
  `ID` varchar(2) NOT NULL,
  `NAME` varchar(100) NOT NULL,
  `ACTIVE` bit(1) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `app_type_promotion`
--

INSERT INTO `app_type_promotion` (`ID`, `NAME`, `ACTIVE`) VALUES
('PC', 'CUPÓN', b'1'),
('PI', 'PROMOCIÓN IMAGEN ', b'0'),
('PS', 'PROMOCIÓN DESCUENTO VENTA', b'0'),
('PT', 'PROMOCIÓN DESCUENTO ITEM\r\n', b'0');

-- --------------------------------------------------------

--
-- Table structure for table `app_user`
--

DROP TABLE IF EXISTS `app_user`;
CREATE TABLE IF NOT EXISTS `app_user` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `FULLNAME` varchar(255) DEFAULT NULL,
  `USERNAME` varchar(255) NOT NULL,
  `AUTHKEY` varchar(32) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `password_reset_token` varchar(255) DEFAULT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `PHONE` varchar(20) NOT NULL,
  `ID_ROL` int NOT NULL,
  `BITHDATE` varchar(10) DEFAULT NULL,
  `IDENTIFICATION` varchar(50) DEFAULT NULL,
  `IS_OTP` bit(1) NOT NULL,
  `ACTIVE` bit(1) NOT NULL DEFAULT b'0',
  `CREATED_AT` datetime NOT NULL,
  `LAST_ACCESS` datetime NOT NULL,
  `ACCESS_TOKEN` varchar(255) DEFAULT NULL,
  `verification_token` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `USERNAME` (`USERNAME`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`),
  KEY `ID_ROL` (`ID_ROL`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `app_user`
--

INSERT INTO `app_user` (`ID`, `FULLNAME`, `USERNAME`, `AUTHKEY`, `PASSWORD`, `password_reset_token`, `EMAIL`, `PHONE`, `ID_ROL`, `BITHDATE`, `IDENTIFICATION`, `IS_OTP`, `ACTIVE`, `CREATED_AT`, `LAST_ACCESS`, `ACCESS_TOKEN`, `verification_token`) VALUES
(1, 'Luis Hernandez', 'lahernandezr', '', '$2y$13$Y033LgHW/KQWPLu45acTCuDI1n5b2qeM/I12cUx7RpMof23tyOP6K', NULL, 'lahernandezr@outlook.com', '+50378325853', 1, '08/05/1985', '1010885', b'0', b'1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', NULL),
(2, 'Nestor Funes', 'nfunes', '', '$2y$13$Y033LgHW/KQWPLu45acTCuDI1n5b2qeM/I12cUx7RpMof23tyOP6K', NULL, 'nestor@gmail.com', '789664654', 2, '', '', b'0', b'1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', NULL),
(3, 'Jose Perez', 'jperez', '', '$2y$13$7sMzaOBi5zjJvBk9Nu1MlevBQo65rm2LKN9asd1CWd8GV2UI5zZcC', NULL, 'jose@demo.com', '12345679', 1, '1990-07-12', '585696', b'0', b'1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL),
(4, 'Juan Perez', 'juan', '', '$2y$13$I30dq6ZTMqqEqHYyLwWhpuMr91gpdVmThdos7ze.MU/.oHf3b0oq.', NULL, 'juan@demo.com', '78954623', 1, '1990-07-12', '564685', b'0', b'1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL),
(5, 'Demostracion', 'demo', '', '$2y$13$wuQIpeqmlwkZmH/SIqUUo.5KhoaRX4wPKA3YyL4/nLVZiEU0knvq.', NULL, 'demo@demo.com', '78265847698', 1, '2022-07-25', '', b'0', b'1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL),
(6, 'Luke', 'luke', '', '$2y$13$4iDMHKkIzEgiw9lB2R80FOiw7uUBVT8uo9Z051i69YmKwWGf2kUJW', NULL, 'luke@demo.com', '324234234', 1, '2022-07-25', '585696', b'0', b'1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL),
(7, 'Soy tu padre', 'Vader', '', '$2y$13$/qDtOiPQuz7u2kyenILBi.j6ZNVW2LKz3JtM1ekqh5UsEwQoK0VVa', NULL, 'vader@demo.com', '765468', 1, '', '', b'0', b'1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `app_user_promotion`
--

DROP TABLE IF EXISTS `app_user_promotion`;
CREATE TABLE IF NOT EXISTS `app_user_promotion` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `ID_USER` int NOT NULL,
  `ID_SALE` int NOT NULL,
  `ID_PROMOCION` int NOT NULL,
  `CREATED_AT` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`),
  KEY `ID_USER` (`ID_USER`),
  KEY `ID_SALE` (`ID_SALE`),
  KEY `ID_PROMOCION` (`ID_PROMOCION`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
