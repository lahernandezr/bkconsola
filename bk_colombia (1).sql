-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 26, 2024 at 10:28 PM
-- Server version: 5.7.36
-- PHP Version: 8.1.0

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

CREATE TABLE `app_ads` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `TYPE` enum('VIDEO','IMAGE','LINK') NOT NULL,
  `LINK` text NOT NULL,
  `ACTIVE` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `app_category`
--

CREATE TABLE `app_category` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `ID_TAX` int(11) NOT NULL,
  `BACKGROUND` varchar(20) DEFAULT NULL,
  `FORECOLOR` varchar(20) DEFAULT NULL,
  `IMAGE` text,
  `ORDER` int(11) DEFAULT NULL,
  `ONSALE` bit(1) NOT NULL,
  `INIT` datetime DEFAULT NULL,
  `END` datetime DEFAULT NULL,
  `IS_SHOW` bit(1) NOT NULL,
  `ACTIVE` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

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

CREATE TABLE `app_country` (
  `ID` varchar(3) NOT NULL,
  `NAME` varchar(30) NOT NULL,
  `ISO3` varchar(3) NOT NULL,
  `ACTIVE` bit(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `app_country`
--

INSERT INTO `app_country` (`ID`, `NAME`, `ISO3`, `ACTIVE`) VALUES
('COL', 'Colombia', 'COL', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `app_customer`
--

CREATE TABLE `app_customer` (
  `ID` int(11) NOT NULL,
  `USERNAME` varchar(255) NOT NULL,
  `PASSWORD` varchar(500) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `FULLNAME` varchar(255) NOT NULL,
  `PHONE` varchar(20) NOT NULL,
  `WHATSAPP` varchar(20) NOT NULL,
  `ID_COUNTRY` varchar(3) NOT NULL,
  `BIRTHDATE` varchar(10) NOT NULL,
  `ID_GENDER` varchar(2) NOT NULL,
  `TYPE_REGISTRATION` enum('EMAIL','FACEBOOK','INSTAGRAM','GOOGLE') NOT NULL,
  `ID_REGISTRATION` varchar(255) NOT NULL,
  `CREATED_AT` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `IS_OTP` bit(1) NOT NULL,
  `ACTIVE` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `app_customer`
--

INSERT INTO `app_customer` (`ID`, `USERNAME`, `PASSWORD`, `EMAIL`, `FULLNAME`, `PHONE`, `WHATSAPP`, `ID_COUNTRY`, `BIRTHDATE`, `ID_GENDER`, `TYPE_REGISTRATION`, `ID_REGISTRATION`, `CREATED_AT`, `IS_OTP`, `ACTIVE`) VALUES
(1, 'azuloro85', '', 'azuloro85@gmail.com', 'Luis Hernandez', '78325858', '78325858', 'COL', '08/05/1985', '1', 'EMAIL', '', '2023-07-19 17:26:09', b'0', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `app_customer_address`
--

CREATE TABLE `app_customer_address` (
  `ID` int(11) NOT NULL,
  `ID_USER` int(11) NOT NULL,
  `NAME` varchar(50) NOT NULL,
  `ADDRESS1` varchar(150) NOT NULL,
  `ADDRESS2` varchar(150) NOT NULL,
  `PHONE` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `app_enterprise`
--

CREATE TABLE `app_enterprise` (
  `ID` int(11) NOT NULL,
  `CODE` varchar(10) NOT NULL,
  `NAME` varchar(100) NOT NULL,
  `ADDRESS` varchar(255) NOT NULL,
  `NIT` varchar(30) NOT NULL,
  `RUT` varchar(30) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `CONTACT` varchar(100) NOT NULL,
  `PHONE` varchar(30) NOT NULL,
  `CREATED_AT` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ACTIVE` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `app_enterprise`
--

INSERT INTO `app_enterprise` (`ID`, `CODE`, `NAME`, `ADDRESS`, `NIT`, `RUT`, `EMAIL`, `CONTACT`, `PHONE`, `CREATED_AT`, `ACTIVE`) VALUES
(1, '1025', 'Arrendarora del SUR', 'Conocida', '155859969', '12559969', 'arrendadora@gmail.com', 'Jose Perez Leon', '123456789', '2024-03-26 21:56:46', 1);

-- --------------------------------------------------------

--
-- Table structure for table `app_fiscal`
--

CREATE TABLE `app_fiscal` (
  `ID` int(11) NOT NULL,
  `TYPE` enum('TICKET','CREDITO FISCAL','FACTURA','') NOT NULL,
  `AUTH_RESOLUTION` varchar(50) NOT NULL,
  `AUTH_DATE` varchar(20) NOT NULL,
  `SERIE` varchar(50) NOT NULL,
  `INIT` int(11) NOT NULL,
  `END` int(11) NOT NULL,
  `CURRENT` int(11) NOT NULL,
  `CREATED_AT` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ACTIVE` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `app_gender`
--

CREATE TABLE `app_gender` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

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

CREATE TABLE `app_global_config` (
  `ID` varchar(20) NOT NULL,
  `VALUE` varchar(255) NOT NULL,
  `DESCRIPTION` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

CREATE TABLE `app_item` (
  `ID` int(11) NOT NULL,
  `ID_PARENT` int(11) DEFAULT NULL,
  `BARCODE` varchar(255) NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `ID_TYPE_ITEM` varchar(1) NOT NULL,
  `ID_CATEGORY` int(11) NOT NULL,
  `PRICE_COST` decimal(10,4) NOT NULL,
  `PRICE_SELL` decimal(10,4) NOT NULL,
  `ID_TAX` int(11) NOT NULL,
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
  `ACTIVE` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `app_item`
--

INSERT INTO `app_item` (`ID`, `ID_PARENT`, `BARCODE`, `NAME`, `ID_TYPE_ITEM`, `ID_CATEGORY`, `PRICE_COST`, `PRICE_SELL`, `ID_TAX`, `MARGIN`, `PRICE_TAX`, `IMAGE`, `ON_SALE`, `INIT`, `END`, `DESCRIPCION`, `EXTRAS`, `IS_SHOW`, `IS_PARENT`, `ACTIVE`) VALUES
(1, 1, '10105856', 'Product New', 'P', 1, '10.0000', '14.0000', 2, '40.0000', '15.8200', '', b'0', NULL, NULL, 'Large description', '', b'1', b'0', b'1'),
(2, 2, '10000', 'Libreta', 'P', 1, '1.5000', '2.1000', 2, '0.0000', '0.0000', 'zVsRbsrse6C_nvVM5EzwsEe4Op_V-tdY.jpg', b'0', NULL, NULL, 'Libreta WWWWW', '', b'0', b'0', b'1'),
(3, 1, '123456789', 'Cartera Hugo Boss', 'P', 1, '100.0000', '1000.0000', 2, '900.0000', '0.0000', '', b'0', NULL, NULL, 'efefwefwef', '', b'1', b'0', b'1'),
(4, 1, '986635896', 'Desayuno americano', 'P', 1, '100.0000', '500.0000', 2, '0.0000', '565.0000', NULL, b'0', NULL, NULL, '', '', b'0', b'0', b'1'),
(5, 5, '15896325eee', 'BOTA 0025', 'P', 1, '100.0000', '150.0000', 2, '50.0000', '169.5000', NULL, b'0', NULL, NULL, '', '', b'1', b'0', b'1'),
(6, 5, '100000', 'BOTA 0025 TALLA 7', 'P', 1, '0.0000', '0.0000', 2, '0.0000', '0.0000', NULL, b'0', NULL, NULL, '', NULL, b'0', b'0', b'1'),
(8, 2, '100030', 'BOTA 0025 TALLA 88', 'P', 1, '0.0000', '0.0000', 2, '0.0000', '0.0000', NULL, b'0', NULL, NULL, '', NULL, b'0', b'0', b'1'),
(9, 9, '15896596', 'Test', 'P', 2, '0.0000', '0.0000', 2, '0.0000', '0.0000', NULL, b'0', NULL, NULL, '', NULL, b'1', b'0', b'1'),
(10, 10, '78966569', 'Test 2', 'P', 2, '100.0000', '150.0000', 2, '50.0000', '169.5000', NULL, b'0', NULL, NULL, '', NULL, b'1', b'0', b'1'),
(11, 1, '789456789', 'ewfwef', 'P', 1, '10.0000', '15.0000', 2, '50.0000', '16.9500', NULL, b'0', NULL, NULL, 'wefewfwef', NULL, b'1', b'0', b'1'),
(12, 1, '789965', 'dfdslkfjsdlfkj', 'P', 1, '10.0000', '15.0000', 1, '50.0000', '15.0000', NULL, b'0', NULL, NULL, '', NULL, b'1', b'0', b'1'),
(13, 1, 'efewfwef', '23432423', 'P', 1, '10.0000', '71.0000', 2, '610.0000', '80.2300', NULL, b'0', NULL, NULL, '', NULL, b'1', b'0', b'1'),
(14, 1, '89789', '789789', 'P', 1, '89.0000', '89.0000', 2, '0.0000', '100.5700', NULL, b'0', NULL, NULL, 'ewfewfewfewfewf', NULL, b'1', b'0', b'1'),
(15, 1, '34234', '234234', 'P', 1, '10.0000', '10.0000', 1, '0.0000', '10.0000', NULL, b'0', NULL, NULL, '', NULL, b'1', b'0', b'1'),
(16, 1, '4398340598304', 'TEST MODIFICADOR', 'P', 1, '10.0000', '15.0000', 2, '50.0000', '16.9500', NULL, b'0', NULL, NULL, '', NULL, b'1', b'0', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `app_log`
--

CREATE TABLE `app_log` (
  `ID` int(11) NOT NULL,
  `USER` varchar(100) NOT NULL,
  `MODULE` varchar(100) NOT NULL,
  `MODULE_FIELD` varchar(255) NOT NULL,
  `ACTIVITY` varchar(255) NOT NULL,
  `VALUE` varchar(255) NOT NULL,
  `CREATED_AT` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `app_promotion`
--

CREATE TABLE `app_promotion` (
  `ID` int(11) NOT NULL,
  `CODE` varchar(50) NOT NULL,
  `NAME` varchar(100) NOT NULL,
  `DESCRIPTION` varchar(255) NOT NULL,
  `ID_TYPE_PROMOTION` varchar(2) NOT NULL,
  `VALUE` decimal(10,4) DEFAULT NULL,
  `TYPE_DISC` enum('PERCENT','AMOUNT') DEFAULT NULL,
  `ID_ITEM` int(11) DEFAULT NULL,
  `INIT` datetime DEFAULT NULL,
  `END` datetime DEFAULT NULL,
  `IMAGE` text,
  `LINK` text NOT NULL,
  `LIMIT_EXCHANGE` int(6) DEFAULT '0',
  `LIMIT_PER_DAY` int(6) NOT NULL DEFAULT '0',
  `REDIMM` int(6) DEFAULT NULL,
  `LIMIT_PER_CUSTOMER` int(6) NOT NULL DEFAULT '0',
  `LIMIT_PER_DAY_CUSTOMER` int(6) NOT NULL DEFAULT '0',
  `ID_ENTERPRISE` int(11) NOT NULL DEFAULT '0',
  `SERIE` varchar(50) DEFAULT NULL,
  `S_INIT` int(10) DEFAULT NULL,
  `S_END` int(10) DEFAULT NULL,
  `ACTIVE` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `app_promotion`
--

INSERT INTO `app_promotion` (`ID`, `CODE`, `NAME`, `DESCRIPTION`, `ID_TYPE_PROMOTION`, `VALUE`, `TYPE_DISC`, `ID_ITEM`, `INIT`, `END`, `IMAGE`, `LINK`, `LIMIT_EXCHANGE`, `LIMIT_PER_DAY`, `REDIMM`, `LIMIT_PER_CUSTOMER`, `LIMIT_PER_DAY_CUSTOMER`, `ID_ENTERPRISE`, `SERIE`, `S_INIT`, `S_END`, `ACTIVE`) VALUES
(1, 'PBCL6L6O3JJDDG20232208341956', 'WHOPPER DOBLE', 'WHOPPER DOBLE 2023', 'PI', NULL, NULL, NULL, '2023-08-19 00:00:00', '2023-09-09 00:00:00', NULL, '', 0, 0, NULL, 0, 0, 0, '', NULL, NULL, b'1');

-- --------------------------------------------------------

--
-- Table structure for table `app_promotion_serial`
--

CREATE TABLE `app_promotion_serial` (
  `ID` int(11) NOT NULL,
  `ID_PROMOTION` int(11) NOT NULL,
  `SERIE` varchar(50) NOT NULL,
  `INITIAL` int(11) NOT NULL,
  `FINAL` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `app_rol`
--

CREATE TABLE `app_rol` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(50) NOT NULL,
  `ACTIVE` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

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

CREATE TABLE `app_sale` (
  `ID` int(11) NOT NULL,
  `ID_USER` int(11) NOT NULL,
  `ID_ADDRESS` int(11) NOT NULL,
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
  `ID_USER_CONSOLE` int(11) NOT NULL,
  `ACTIVE` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `app_sale_item`
--

CREATE TABLE `app_sale_item` (
  `ID` int(11) NOT NULL,
  `ID_SALE` int(11) NOT NULL,
  `BARCODE` varchar(50) NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `ID_CATEGORY` int(11) NOT NULL,
  `ID_ITEM` int(11) NOT NULL,
  `PRICE_COST` decimal(10,4) NOT NULL,
  `PRICE_SELL` decimal(10,4) NOT NULL,
  `QUANTITY` decimal(10,2) NOT NULL,
  `ID_TAX` int(11) NOT NULL,
  `TAXES` decimal(10,4) NOT NULL,
  `TOTAL` decimal(10,4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `app_sale_payment`
--

CREATE TABLE `app_sale_payment` (
  `ID` int(11) NOT NULL,
  `ID_SALE` int(11) NOT NULL,
  `TYPE_PAYMENT` varchar(10) NOT NULL,
  `NUMBER` varchar(50) NOT NULL,
  `AMOUNT` decimal(10,4) NOT NULL,
  `TOTAL` decimal(10,4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `app_sale_tax`
--

CREATE TABLE `app_sale_tax` (
  `ID` int(11) NOT NULL,
  `ID_SALE` int(11) NOT NULL,
  `ID_TAX` int(11) NOT NULL,
  `AMOUNT` decimal(10,4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `app_store`
--

CREATE TABLE `app_store` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `ADDRESS` varchar(255) NOT NULL,
  `IMAGE` text NOT NULL,
  `DATA_JSON` text NOT NULL,
  `ACTIVE` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `app_tax`
--

CREATE TABLE `app_tax` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `PERCENT` decimal(3,2) NOT NULL,
  `ACTIVE` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `app_tax`
--

INSERT INTO `app_tax` (`ID`, `NAME`, `PERCENT`, `ACTIVE`) VALUES
(1, 'EXEMPTO', '0.00', b'1'),
(2, 'IVA', '0.13', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `app_type_item`
--

CREATE TABLE `app_type_item` (
  `ID` varchar(1) NOT NULL,
  `NAME` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

CREATE TABLE `app_type_payment` (
  `ID` varchar(2) NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `ACTIVE` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

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

CREATE TABLE `app_type_promotion` (
  `ID` varchar(2) NOT NULL,
  `NAME` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `app_type_promotion`
--

INSERT INTO `app_type_promotion` (`ID`, `NAME`) VALUES
('PC', 'PROMOCIÓN CANJE'),
('PI', 'PROMOCIÓN IMAGEN '),
('PS', 'PROMOCIÓN DESCUENTO VENTA'),
('PT', 'PROMOCIÓN DESCUENTO ITEM\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `app_user`
--

CREATE TABLE `app_user` (
  `ID` int(11) NOT NULL,
  `FULLNAME` varchar(255) DEFAULT NULL,
  `USERNAME` varchar(255) NOT NULL,
  `AUTHKEY` varchar(32) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `password_reset_token` varchar(255) DEFAULT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `PHONE` varchar(20) NOT NULL,
  `ID_ROL` int(2) NOT NULL,
  `BITHDATE` varchar(10) DEFAULT NULL,
  `IDENTIFICATION` varchar(50) DEFAULT NULL,
  `IS_OTP` bit(1) NOT NULL,
  `ACTIVE` bit(1) NOT NULL DEFAULT b'0',
  `CREATED_AT` datetime NOT NULL,
  `LAST_ACCESS` datetime NOT NULL,
  `ACCESS_TOKEN` varchar(255) DEFAULT NULL,
  `verification_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

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

CREATE TABLE `app_user_promotion` (
  `ID` int(11) NOT NULL,
  `ID_USER` int(11) NOT NULL,
  `ID_SALE` int(11) NOT NULL,
  `ID_PROMOCION` int(11) NOT NULL,
  `CREATED_AT` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `app_ads`
--
ALTER TABLE `app_ads`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `app_category`
--
ALTER TABLE `app_category`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_TAX` (`ID_TAX`);

--
-- Indexes for table `app_country`
--
ALTER TABLE `app_country`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `app_customer`
--
ALTER TABLE `app_customer`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `USERNAME` (`USERNAME`,`EMAIL`);

--
-- Indexes for table `app_customer_address`
--
ALTER TABLE `app_customer_address`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_USER` (`ID_USER`);

--
-- Indexes for table `app_enterprise`
--
ALTER TABLE `app_enterprise`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `CODE` (`CODE`);

--
-- Indexes for table `app_fiscal`
--
ALTER TABLE `app_fiscal`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `app_gender`
--
ALTER TABLE `app_gender`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `app_global_config`
--
ALTER TABLE `app_global_config`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `app_item`
--
ALTER TABLE `app_item`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `BARCODE` (`BARCODE`),
  ADD KEY `ID_CATEGORY` (`ID_CATEGORY`),
  ADD KEY `ID_TAX` (`ID_TAX`),
  ADD KEY `ID_PARENT` (`ID_PARENT`);

--
-- Indexes for table `app_log`
--
ALTER TABLE `app_log`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `app_promotion`
--
ALTER TABLE `app_promotion`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `CODE` (`CODE`,`ID_ITEM`),
  ADD KEY `ID_TYPE_PROMOTION` (`ID_TYPE_PROMOTION`);

--
-- Indexes for table `app_promotion_serial`
--
ALTER TABLE `app_promotion_serial`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `app_rol`
--
ALTER TABLE `app_rol`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `app_sale`
--
ALTER TABLE `app_sale`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_USER` (`ID_USER`,`ID_ADDRESS`),
  ADD KEY `ID_USER_CONSOLE` (`ID_USER_CONSOLE`);

--
-- Indexes for table `app_sale_item`
--
ALTER TABLE `app_sale_item`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_CATEGORY` (`ID_CATEGORY`,`ID_ITEM`),
  ADD KEY `ID_TAX` (`ID_TAX`),
  ADD KEY `ID_SALE` (`ID_SALE`);

--
-- Indexes for table `app_sale_payment`
--
ALTER TABLE `app_sale_payment`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_SALE` (`ID_SALE`,`TYPE_PAYMENT`);

--
-- Indexes for table `app_sale_tax`
--
ALTER TABLE `app_sale_tax`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_SALE` (`ID_SALE`),
  ADD KEY `ID_TAX` (`ID_TAX`);

--
-- Indexes for table `app_store`
--
ALTER TABLE `app_store`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `app_tax`
--
ALTER TABLE `app_tax`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `app_type_item`
--
ALTER TABLE `app_type_item`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `app_type_payment`
--
ALTER TABLE `app_type_payment`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `app_type_promotion`
--
ALTER TABLE `app_type_promotion`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `app_user`
--
ALTER TABLE `app_user`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `USERNAME` (`USERNAME`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`),
  ADD KEY `ID_ROL` (`ID_ROL`);

--
-- Indexes for table `app_user_promotion`
--
ALTER TABLE `app_user_promotion`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_USER` (`ID_USER`),
  ADD KEY `ID_SALE` (`ID_SALE`),
  ADD KEY `ID_PROMOCION` (`ID_PROMOCION`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `app_ads`
--
ALTER TABLE `app_ads`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `app_category`
--
ALTER TABLE `app_category`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `app_customer`
--
ALTER TABLE `app_customer`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `app_customer_address`
--
ALTER TABLE `app_customer_address`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `app_enterprise`
--
ALTER TABLE `app_enterprise`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `app_fiscal`
--
ALTER TABLE `app_fiscal`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `app_gender`
--
ALTER TABLE `app_gender`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `app_item`
--
ALTER TABLE `app_item`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `app_log`
--
ALTER TABLE `app_log`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `app_promotion`
--
ALTER TABLE `app_promotion`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `app_promotion_serial`
--
ALTER TABLE `app_promotion_serial`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `app_sale`
--
ALTER TABLE `app_sale`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `app_sale_item`
--
ALTER TABLE `app_sale_item`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `app_sale_payment`
--
ALTER TABLE `app_sale_payment`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `app_sale_tax`
--
ALTER TABLE `app_sale_tax`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `app_store`
--
ALTER TABLE `app_store`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `app_tax`
--
ALTER TABLE `app_tax`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `app_user`
--
ALTER TABLE `app_user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `app_user_promotion`
--
ALTER TABLE `app_user_promotion`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
