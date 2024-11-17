-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2022 at 09:54 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `avgs`
--

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE IF NOT EXISTS `branches` (
  `BranchesId` int(100) NOT NULL AUTO_INCREMENT,
  `BrancheName` varchar(100) NOT NULL,
  `BrancheStreetAddress` varchar(1000) NOT NULL,
  `BrancheStreetAddress2` varchar(1000) NOT NULL,
  `BrancheCity` varchar(100) NOT NULL,
  `BrancheState` varchar(100) NOT NULL,
  `BranchePincode` varchar(50) NOT NULL,
  `BrancheContactPerson` varchar(100) NOT NULL,
  `BranchePhone` varchar(100) NOT NULL,
  `BrancheFaxNumber` varchar(100) NOT NULL,
  `BrancheEmailid` varchar(500) NOT NULL,
  `BrancheGSTNO` varchar(100) NOT NULL,
  `Brancheisdefault` varchar(100) NOT NULL,
  `BrancheCreatedAt` varchar(100) NOT NULL,
  `BrancheUpdatedAt` varchar(100) NOT NULL,
  `BrancheStatus` varchar(100) NOT NULL,
  `BranchCode` varchar(100) NOT NULL,
  `BrancheWebsite` varchar(1000) NOT NULL,
  PRIMARY KEY (`BranchesId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `branches`
--

INSERT IGNORE INTO `branches` (`BranchesId`, `BrancheName`, `BrancheStreetAddress`, `BrancheStreetAddress2`, `BrancheCity`, `BrancheState`, `BranchePincode`, `BrancheContactPerson`, `BranchePhone`, `BrancheFaxNumber`, `BrancheEmailid`, `BrancheGSTNO`, `Brancheisdefault`, `BrancheCreatedAt`, `BrancheUpdatedAt`, `BrancheStatus`, `BranchCode`, `BrancheWebsite`) VALUES
(1, 'Teegan Travis', 'aGxkSXBpOTBRM1FOYkhCb20waWpjaElmNXVpZEV1L3JVWnBIeU5qbWoxTT0=', 'NzJhMjNYWXpMcGlYZHlzLzRjR3BCR3ZMRko2SUxFb1l5cEZaNWZMR2g0WT0=', 'Aspernatur quibusdam', 'Sed quisquam cumque ', 'Culpa consequatur ', 'Similique quam aut r', '+1 (575) 819-1602', '+1 (735) 965-8491', 'qynyhyci@mailinator.com', 'Autem velit labore ', 'true', '06 Dec, 2021', '', '1', 'Voluptatem omnis qua', 'https://www.zecykiqedonato.mobi'),
(2, 'Fritz Morales', 'b0NNbExDMUFDMHBiK2VxeEpDd2lMalBFUisvaE9HVExuUFhLSGVHRGxzMD0=', 'ODRwRzZEZ3NwOXB5SlFyb3pVVlhQc0o0NDJEQ2phYkJCTzcyOElUTnBoMD0=', 'A voluptatum blandit', 'Rerum libero maxime ', 'Et qui nisi perferen', 'Voluptatem Et eum q', '+1 (608) 703-5834', '+1 (413) 708-3755', 'dacupoji@mailinator.com', 'Et ex ipsum qui omni', '', '06 Dec, 2021', '', '1', 'Ullam sunt veniam a', 'https://www.mezo.com.au'),
(3, 'Emmanuel Berg', 'RW9wKzNPT1lvNGs5L3VSWDQ2RUR4SlVEaWsvUW8vYUozZXg1SkZQamNOcz0=', 'RVcvWThrR0lUM1lvZXdHWGlSRGRDSXp4WlZ3MEdWbHlVQWFNOUlrWFVyWT0=', 'Vel placeat est eos', 'Repellendus Ipsam n', 'Et voluptas inventor', 'Aute explicabo Dolo', '+1 (879) 529-1199', '+1 (619) 159-5895', 'xawi@mailinator.com', 'In eveniet quod fug', '', '06 Dec, 2021', '', '1', 'Eius adipisci sed om', 'https://www.luloqy.co');

-- --------------------------------------------------------

--
-- Table structure for table `calls`
--

CREATE TABLE IF NOT EXISTS `calls` (
  `CallsId` int(100) NOT NULL AUTO_INCREMENT,
  `CallsRelatedTo` varchar(100) NOT NULL,
  `CallingDate` varchar(100) NOT NULL,
  `CallingTime` varchar(100) NOT NULL,
  `CallingType` varchar(100) NOT NULL,
  `CallingNotes` varchar(100) NOT NULL,
  `CallingCreatedBy` varchar(100) NOT NULL,
  `CallingCreatedAt` varchar(100) NOT NULL,
  `CallUpdatedAt` varchar(100) NOT NULL,
  PRIMARY KEY (`CallsId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `configurations`
--

CREATE TABLE IF NOT EXISTS `configurations` (
  `configurationsid` int(100) NOT NULL AUTO_INCREMENT,
  `configurationname` varchar(50) NOT NULL,
  `configurationvalue` varchar(9999) NOT NULL,
  `configurationtype` varchar(30) NOT NULL DEFAULT 'text',
  `configurationsupportivetext` varchar(1000) NOT NULL DEFAULT 'null',
  PRIMARY KEY (`configurationsid`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `configurations`
--

INSERT IGNORE INTO `configurations` (`configurationsid`, `configurationname`, `configurationvalue`, `configurationtype`, `configurationsupportivetext`) VALUES
(1, 'APP_NAME', 'Avags Information Systems', 'TEXT', 'null'),
(2, 'TAGLINE', 'Lead Management', 'text', 'null'),
(3, 'OWNER_NAME', 'Navix Consultancy Services', 'text', 'null'),
(4, 'PRIMARY_PHONE', '+91 9899861071', 'phone', 'null'),
(5, 'PRIMARY_EMAIL', 'info@avags.in', 'email', 'null'),
(6, 'SHORT_DESCRIPTION', 'TUE2RDRLeUxhMVl6cTY4K0l1NzhLc3J2SklaTEMvdkdMa21BTDArUFIyST0=', 'text', 'null'),
(7, 'PRIMARY_ADDRESS', 'dWJVVHlsaEZES2FiNjVpRWZjNXRxOHIxSVdJcXFsUGJPWk1aQ0JiN1p5N3JKY0EzOXlyd09mdVR5QURRMCt5SQ==', 'address', 'null'),
(8, 'PRIMARY_MAP_LOCATION_LINK', 'M3N6cEE1V0syMjBKWE9JamJ0d2dERVk0aGNLSGw4cW5SUjYyKzY1NWNvQzVtcmZuc1JkVS81dTRsbFZCaGFuU0ZTVDZ2N1hMNDVuVzNoV3ROaEErZGJRa2hzV2FJbDVjREpGZFo2OUZ0R0pKbnlkNUtuZzFVLzRqdmwycWhnYlZWd0ZGUThnMHA5VE9TdnYwYnpSblZSenlDbUJjNVdFc0xaZEd2Mng5NVBqVnlTYThjZitzaE5ZL04vdU4wdTZnQk1rS3FORnJhYVo5QVBTbzJHczhIaEJTcVgzMStoOHpDM1prRURkV0Z0UFJPMkcyalQ4Mit1Uk5tRWJYUzYrK091R1BkSVR1N3R4ZVpGUTJTSStoM0xCN2xJeko0NXVNMit4Ni9sdyt0M0t2TU45RG5GSXh4U0tmbjRqdzkxcUczNHFlNkhZZHV1SFZTZG9Yc2cwNEpSb0pnbFA5bmlkRk91aHJ2L2NxT0dWUGpTU1A4dEI1MWVOTDVnc05pZlhSYVlQbFdGbVZiQnlQOWk3UE54SFptYjlmUkQ2eEt4SFJhY1gwY1FKd0lXWT0=', 'map', 'null'),
(9, 'SENDER_MAIL_ID', 'not-reply@avags.com', 'email', 'null'),
(10, 'RECEIVER_MAIL', 'info@avags.com', 'email', 'null'),
(11, 'REPLY_TO', 'not available', 'email', 'null'),
(12, 'SUPPORT_MAIL', 'supports@avags.com', 'email', 'null'),
(13, 'ENQUIRY_MAIL', 'enquiry@avags.com', 'email', 'null'),
(14, 'ADMIN_MAIL', 'admin@avags.com', 'text', 'null'),
(15, 'SMS_API_KEY', 'null', 'text', 'null'),
(16, 'DOWNLOAD_ANDROID_APP_LINK', 'not available', 'link', 'null'),
(17, 'DOWNLOAD_IOS_APP_LINK', 'DOMAIN', 'link', 'null'),
(18, 'DOWNLOAD_BROCHER_LINK', 'DOMAIN\r\n', 'link', 'null'),
(20, 'CONTROL_WORK_ENV', 'DEV', 'boolean', 'dev, prod'),
(21, 'CONTROL_SMS', 'false', 'boolean', 'true, false'),
(23, 'CONTROL_MAILS', 'true', 'boolean', 'true, false'),
(24, 'CONTROL_NOTIFICATION', 'true', 'boolean', 'true, false'),
(25, 'CONTROL_MSG_DISPLAY_TIME', '2000', 'number', '1000, 10000'),
(26, 'CONTROL_APP_LOGS', 'true', 'boolean', 'true, false'),
(27, 'APP_LOGO', 'AVAGS%20Leads_Logo__15_Nov_2021_02_11_10.jpg', 'img', 'null'),
(28, 'SMS_OTP_TEMP_ID', 'null', 'text', 'null'),
(29, 'PASS_RESET_OTP_TEMP', 'null', 'text', 'null'),
(30, 'SMS_SENDER_ID', 'null', 'text', 'null'),
(31, 'PG_PROVIDER', 'RAZORAPAY', 'text', 'null'),
(32, 'PG_MODE', 'TEST', 'text', 'null'),
(33, 'MERCHENT_ID', 'null', 'text', 'null'),
(34, 'MERCHANT_KEY', 'null', 'text', 'null'),
(35, 'ONLINE_PAYMENT_OPTION', 'false', 'boolean', 'true, false'),
(36, 'CONTROL_NOTIFICATION_SOUND', 'true', 'boolean', 'true, false'),
(37, 'FINANCIAL_YEAR', 'September - August', 'text', 'null'),
(38, 'GST_NO', '07ABHFA1163C1ZZ', 'text', 'null'),
(39, 'COMPANY_TYPE', 'PUBLISHING', 'text', 'null'),
(40, 'LOGIN_BG_IMAGE', 'AVAGS Leads_Logo_25_Jan_2022_01_01_01.jpg', 'text', 'null'),
(41, 'PRIMARY_AREA', 'M3RKYjIyemJJcnFXZ2xLdzZINzdMNVNqRVJFbkY2ZnpTQ1BmNFdQcUgrMD0=', 'text', 'null'),
(42, 'PRIMARY_CITY', 'Q1o2a0w2NEpQOEFLTHA3ZHdNYjh4UT09', 'text', 'null'),
(43, 'PRIMARY_STATE', 'Rm9nUDlDRTVkV20zWm8wMmEvMEpPZz09', 'text', 'null'),
(44, 'PRIMARY_COUNTRY', 'MmtSc3hhcXA1OU1mNjFaYUJ6VVhIZz09', 'text', 'null'),
(45, 'PRIMARY_PINCODE', 'RjV6emhnOUxVeC9ic29tQ25BV211QT09', 'text', 'null'),
(46, 'TAX_NO', 'DELA61323D1', 'text', 'null');

-- --------------------------------------------------------

--
-- Table structure for table `config_invoices`
--

CREATE TABLE IF NOT EXISTS `config_invoices` (
  `ConfigInvoiceId` int(100) NOT NULL AUTO_INCREMENT,
  `InvoiceConfigName` varchar(1000) NOT NULL,
  `InvoiceConfigValue` varchar(10000) NOT NULL,
  PRIMARY KEY (`ConfigInvoiceId`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `config_invoices`
--

INSERT IGNORE INTO `config_invoices` (`ConfigInvoiceId`, `InvoiceConfigName`, `InvoiceConfigValue`) VALUES
(1, 'PERFORM_INVOICE_PRE_FEILDS', 'aU1kWTlteHcyTGVnOVZlNWx4VjNwMU51YWZBMTdUZ1Q2RThMaXF2bTcwND0='),
(2, 'PERFORMA_INV_PAYMENT_OPTION_DETAILS', 'N3VJMGVVb0d0QkhOSkkvd3BUb2xOQT09'),
(3, 'PERFORMA_INV_FOOTER_TNC', 'Qlp1anRoRnJnK0RHMmk4dTBFWUR2QmZQOEZtaXhtUzVQdWF0eXpucXY3dnpkaDFmd1VxakhJUWJRbXMyN3R5UQ=='),
(4, 'INVOICE_HEADER_PRE_TEXT', 'c1B1OWErOExuR0pZUlFlalF4aXNZWHJvV3YybkUvT1lrS3F4c2RpYmhNVT0='),
(5, 'INVOICE_PAYMENT_OPTION_FIELDS', 'UmN5VERrRzQwa0F1WlRVWDc4V3EwMnlOK1o4ZjQxWVQ5ZVo5NnRYaFNiMEV4b2Y5WUw3NVhoZ1FnK0N3OWpKL0xvaDdBejdtaVcxaFlIMkwxRWkxdDE0Qy8rRVZUZ2pNV0FCQ3lGbE9nWlk9'),
(6, 'INVOICE_FOOTER_TNC', 'eVZsYnI3ZUNpajZ4RUNnTFNmd3RIUzhneWUxVHNMOWZYZnN0SWkzQzFBVGhsWno4d3pUTTViUnI5emg0UmJzRQ==');

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE IF NOT EXISTS `currencies` (
  `currenciesid` int(100) NOT NULL AUTO_INCREMENT,
  `currencycode` varchar(100) NOT NULL,
  `currencysymbole` varchar(100) NOT NULL,
  `currencyname` varchar(100) NOT NULL,
  `currenciedecimalplaces` varchar(100) NOT NULL,
  `currencyformates` varchar(100) NOT NULL,
  `currencydefault` varchar(100) NOT NULL,
  PRIMARY KEY (`currenciesid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `currencies`
--

INSERT IGNORE INTO `currencies` (`currenciesid`, `currencycode`, `currencysymbole`, `currencyname`, `currenciedecimalplaces`, `currencyformates`, `currencydefault`) VALUES
(1, 'Exercitationem animi', 'Voluptatem assumend', 'Ursa Rosario', '3', '0, 000, 000.00', '');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `CustomerId` int(100) NOT NULL AUTO_INCREMENT,
  `CustomerType` varchar(100) NOT NULL,
  `CustomerSalutation` varchar(1000) NOT NULL,
  `CustomerFirstname` varchar(100) NOT NULL,
  `Customerlastname` varchar(100) NOT NULL,
  `CompanyName` varchar(100) NOT NULL,
  `CustomerDisplayName` varchar(100) NOT NULL,
  `CustomerWorkPhone` varchar(100) NOT NULL,
  `CustomerMobilePhone` varchar(100) NOT NULL,
  `CustomerEmailId` varchar(100) NOT NULL,
  `CustomerWebsite` varchar(100) NOT NULL,
  `CustomerCreatedBy` varchar(100) NOT NULL,
  `CustomerProfileImage` varchar(100) NOT NULL DEFAULT 'user.png',
  `CustomerCreatedAt` varchar(100) NOT NULL,
  `CustomerUpdatedAt` varchar(100) NOT NULL,
  `CustomerRemarks` varchar(1000) NOT NULL,
  `CustomerSecondaryEmail` varchar(100) NOT NULL,
  `CustomerOtherEmail` varchar(100) NOT NULL,
  PRIMARY KEY (`CustomerId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customer_billing_address`
--

CREATE TABLE IF NOT EXISTS `customer_billing_address` (
  `CustomerBillingAddress` int(100) NOT NULL AUTO_INCREMENT,
  `CustomerId` varchar(100) NOT NULL,
  `CustomerStreetAddress` varchar(1000) NOT NULL,
  `CustomerCity` varchar(100) NOT NULL,
  `CustomerState` varchar(100) NOT NULL,
  `CustomerCountry` varchar(100) NOT NULL,
  `CustomerPincode` varchar(100) NOT NULL,
  PRIMARY KEY (`CustomerBillingAddress`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customer_contact_person`
--

CREATE TABLE IF NOT EXISTS `customer_contact_person` (
  `CustomerContactPersons` int(100) NOT NULL AUTO_INCREMENT,
  `CustomerId` varchar(100) NOT NULL,
  `CustomerContactPersonName` varchar(100) NOT NULL,
  `CustomerContactPersonPhone` varchar(100) NOT NULL,
  `CustomerContactPersonEmailId` varchar(100) NOT NULL,
  `CustomerContactPersonDesignation` varchar(100) NOT NULL,
  `CustomerContactPersonDepartment` varchar(9999) NOT NULL,
  `CustomerContactPersonWorkEmailId` varchar(200) NOT NULL,
  PRIMARY KEY (`CustomerContactPersons`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customer_shipping_address`
--

CREATE TABLE IF NOT EXISTS `customer_shipping_address` (
  `CustomerShippingAddress` int(100) NOT NULL AUTO_INCREMENT,
  `CustomerId` int(100) NOT NULL,
  `CustomerStreetAddress1` varchar(1000) NOT NULL,
  `CustomerCity1` varchar(100) NOT NULL,
  `CustomerState1` varchar(100) NOT NULL,
  `CustomerCountry1` varchar(100) NOT NULL,
  `CustomerPincode1` varchar(100) NOT NULL,
  PRIMARY KEY (`CustomerShippingAddress`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `deals`
--

CREATE TABLE IF NOT EXISTS `deals` (
  `DealsId` int(100) NOT NULL AUTO_INCREMENT,
  `DealsName` varchar(1000) NOT NULL,
  `DealCustomerId` varchar(1000) NOT NULL,
  `DealCustomerCompanyName` varchar(1000) NOT NULL,
  `DealsStage` varchar(1000) NOT NULL,
  `DealAmount` varchar(1000) NOT NULL,
  `DealClosingDate` varchar(100) NOT NULL,
  `DealDescriptions` varchar(10000) NOT NULL,
  `DealCreatedAt` varchar(100) NOT NULL,
  `DealUpdatedAt` varchar(100) NOT NULL,
  `DealCreatedBy` varchar(100) NOT NULL,
  `DealPrintType` varchar(100) NOT NULL,
  PRIMARY KEY (`DealsId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `dealstages`
--

CREATE TABLE IF NOT EXISTS `dealstages` (
  `DealStageId` int(100) NOT NULL AUTO_INCREMENT,
  `DealStageName` varchar(1000) NOT NULL,
  `DealStageCreatedAt` varchar(100) NOT NULL,
  `DealStageUpdatedAt` varchar(100) NOT NULL,
  PRIMARY KEY (`DealStageId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `deal_activities`
--

CREATE TABLE IF NOT EXISTS `deal_activities` (
  `deal_activity_id` int(100) NOT NULL AUTO_INCREMENT,
  `deal_deal_id` varchar(100) NOT NULL,
  `deal_stage_details` varchar(100) NOT NULL,
  `deal_stage_notes` varchar(1000) NOT NULL,
  `deal_activity_created_at` varchar(1000) NOT NULL,
  PRIMARY KEY (`deal_activity_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `deal_products`
--

CREATE TABLE IF NOT EXISTS `deal_products` (
  `DealProductid` int(100) NOT NULL AUTO_INCREMENT,
  `DealDealId` int(100) NOT NULL,
  `DealProductProductId` varchar(100) NOT NULL,
  `DealProductMrp` varchar(100) NOT NULL,
  `DealProductSalePrice` varchar(100) NOT NULL,
  `DealProductQuantity` varchar(100) NOT NULL,
  `DealProductTotalPrice` varchar(100) NOT NULL,
  `DealProductChargeName` varchar(100) NOT NULL,
  `DealProductChargeType` varchar(100) NOT NULL,
  `DealProductChargeAmount` varchar(100) NOT NULL,
  `DealProductDiscountName` varchar(100) NOT NULL,
  `DealProductDiscountType` varchar(100) NOT NULL,
  `DealProductDiscountAmount` varchar(100) NOT NULL,
  `DealProductNetTotalAmount` varchar(100) NOT NULL,
  `DealProductAddedDate` varchar(100) NOT NULL,
  `DealProductUpdatedDate` varchar(100) NOT NULL,
  `DealProductStatus` varchar(100) NOT NULL,
  `DealProductRemovalReason` varchar(1000) NOT NULL,
  `DealProductDescriptions` varchar(1000) NOT NULL,
  `DealProductName` varchar(1000) NOT NULL,
  `ProductRefernceCode` varchar(100) NOT NULL,
  `ProductAddedBy` varchar(100) NOT NULL,
  PRIMARY KEY (`DealProductid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `EventsId` int(100) NOT NULL AUTO_INCREMENT,
  `EventsName` varchar(100) NOT NULL,
  `EventsDateFrom` varchar(100) NOT NULL,
  `EventsTimeFrom` varchar(100) NOT NULL,
  `EventsDateTo` varchar(100) NOT NULL,
  `EventsTimeTo` varchar(100) NOT NULL,
  `EventsLocations` varchar(1000) NOT NULL,
  `EventRelatedTo` varchar(100) NOT NULL,
  `EventsDescriptions` varchar(1000) NOT NULL,
  `EventCreatedAt` varchar(100) NOT NULL,
  `EventUpdatdAt` varchar(100) NOT NULL,
  `EventCreatedBy` varchar(1000) NOT NULL,
  PRIMARY KEY (`EventsId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE IF NOT EXISTS `invoices` (
  `invoicesid` int(100) NOT NULL AUTO_INCREMENT,
  `quotationquotoid` varchar(1000) NOT NULL,
  `InvoiceDate` varchar(1000) NOT NULL,
  `InvoiceUpdateDate` varchar(100) NOT NULL,
  `InvoiceNumber` varchar(1000) NOT NULL,
  `InvoiceStatus` varchar(100) NOT NULL,
  PRIMARY KEY (`invoicesid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE IF NOT EXISTS `payments` (
  `PaymentId` int(100) NOT NULL AUTO_INCREMENT,
  `PaidCustomerId` int(100) NOT NULL,
  `PaidAmount` int(100) NOT NULL,
  `PaidDate` varchar(100) NOT NULL,
  `PaymentMode` varchar(100) NOT NULL,
  `PaymentDescriptions` varchar(1000) NOT NULL,
  `PaidInvoiceId` varchar(100) NOT NULL,
  `PaymentRefnumber` varchar(1000) NOT NULL,
  PRIMARY KEY (`PaymentId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `ProductId` int(100) NOT NULL AUTO_INCREMENT,
  `ProductName` varchar(200) NOT NULL,
  `ProductImage` varchar(1000) NOT NULL,
  `ProductCategoryId` int(100) NOT NULL,
  `ProductSubCategoryId` int(100) NOT NULL,
  `ProductBrandId` varchar(100) NOT NULL,
  `ProductRefernceCode` varchar(200) NOT NULL,
  `ProductSellPrice` varchar(100) NOT NULL,
  `ProductMrpPrice` varchar(100) NOT NULL,
  `ProductNetPrice` varchar(100) NOT NULL,
  `ProductDescriptions` varchar(1000) NOT NULL,
  `ProductWeight` varchar(100) NOT NULL,
  `ProductType` varchar(100) NOT NULL,
  `ProductTaxOptions` varchar(100) NOT NULL DEFAULT 'Taxable',
  `ProductTaxPercentage` varchar(100) NOT NULL,
  `ProducPublisherPrice` varchar(100) NOT NULL,
  `ProductConversionRate` varchar(100) NOT NULL,
  `ProductStatus` varchar(100) NOT NULL,
  `ProductCreatedAt` varchar(100) NOT NULL,
  `ProductUpdatedAt` varchar(100) NOT NULL,
  `ProductCreatedBy` varchar(100) NOT NULL,
  PRIMARY KEY (`ProductId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product_packages`
--

CREATE TABLE IF NOT EXISTS `product_packages` (
  `ProductPackageId` int(100) NOT NULL AUTO_INCREMENT,
  `ProductProId` int(100) NOT NULL,
  `ProductPackageName` varchar(500) NOT NULL,
  `ProductPackageDetails` varchar(500) NOT NULL,
  `ProductPackageSellPrice` varchar(100) NOT NULL,
  `ProductPackageMrp` varchar(100) NOT NULL,
  `ProductPackageRefNumber` varchar(500) NOT NULL,
  PRIMARY KEY (`ProductPackageId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product_specifications_groups`
--

CREATE TABLE IF NOT EXISTS `product_specifications_groups` (
  `product_specifications_id` int(100) NOT NULL AUTO_INCREMENT,
  `product_specification_group_name` varchar(1000) NOT NULL,
  `product_specification_created_at` varchar(100) NOT NULL,
  `product_specification_updatedat` varchar(100) NOT NULL,
  PRIMARY KEY (`product_specifications_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product_specification_categories`
--

CREATE TABLE IF NOT EXISTS `product_specification_categories` (
  `product_specification_category_id` int(100) NOT NULL AUTO_INCREMENT,
  `product_specification_group_id` varchar(100) NOT NULL,
  `product_specification_category_name` varchar(1000) NOT NULL,
  PRIMARY KEY (`product_specification_category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product_specification_values`
--

CREATE TABLE IF NOT EXISTS `product_specification_values` (
  `product_specification_value_id` int(100) NOT NULL AUTO_INCREMENT,
  `product_specification_group_id` int(100) NOT NULL,
  `product_specification_product_id` varchar(100) NOT NULL,
  `product_specification_value` varchar(1000) NOT NULL,
  `product_specification_value_status` varchar(100) NOT NULL,
  `product_specification_value_created_at` varchar(100) NOT NULL,
  `product_specification_value_updated_at` varchar(100) NOT NULL,
  PRIMARY KEY (`product_specification_value_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pro_brands`
--

CREATE TABLE IF NOT EXISTS `pro_brands` (
  `ProBrandId` int(100) NOT NULL AUTO_INCREMENT,
  `ProBrandName` varchar(1000) NOT NULL,
  `ProBrandStatus` varchar(1000) NOT NULL,
  `ProBrandCreatedAt` varchar(100) NOT NULL,
  `ProBrandUpdatedAt` varchar(100) NOT NULL,
  `ProBrandImage` varchar(100) NOT NULL,
  PRIMARY KEY (`ProBrandId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pro_brands`
--

INSERT IGNORE INTO `pro_brands` (`ProBrandId`, `ProBrandName`, `ProBrandStatus`, `ProBrandCreatedAt`, `ProBrandUpdatedAt`, `ProBrandImage`) VALUES
(1, 'Test Braand', '1', '24 Jan, 2022', '', 'brands_Test Braand_24_Jan_2022_09_01_05.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pro_categories`
--

CREATE TABLE IF NOT EXISTS `pro_categories` (
  `ProCategoriesId` int(100) NOT NULL AUTO_INCREMENT,
  `ProCategoryName` varchar(100) NOT NULL,
  `ProCategoryImage` varchar(1000) NOT NULL,
  `ProCategoryStatus` varchar(100) NOT NULL,
  `ProCategoryCreatedAt` varchar(100) NOT NULL,
  `ProCategoryUpdatedAt` varchar(100) NOT NULL,
  PRIMARY KEY (`ProCategoriesId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pro_categories`
--

INSERT IGNORE INTO `pro_categories` (`ProCategoriesId`, `ProCategoryName`, `ProCategoryImage`, `ProCategoryStatus`, `ProCategoryCreatedAt`, `ProCategoryUpdatedAt`) VALUES
(1, 'Test Chalu', 'Category__Test Chalu_24_Jan_2022_09_01_07.jpg', '1', '24 Jan, 2022', '');

-- --------------------------------------------------------

--
-- Table structure for table `pro_images`
--

CREATE TABLE IF NOT EXISTS `pro_images` (
  `ProImagesId` int(100) NOT NULL AUTO_INCREMENT,
  `ProImageProductId` varchar(100) NOT NULL,
  `ProImageName` varchar(500) NOT NULL,
  `ProImageStatus` varchar(100) NOT NULL,
  PRIMARY KEY (`ProImagesId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pro_sub_categories`
--

CREATE TABLE IF NOT EXISTS `pro_sub_categories` (
  `ProSubCategoriesId` int(100) NOT NULL AUTO_INCREMENT,
  `ProSubCategoryName` varchar(1000) NOT NULL,
  `ProSubCategoryId` varchar(100) NOT NULL,
  `ProSubCategoryImage` varchar(100) NOT NULL,
  `ProSubCategoryStatus` varchar(100) NOT NULL,
  `ProSubCategoryCreatedAt` varchar(100) NOT NULL,
  `ProSubCategoryUpdatedAt` varchar(100) NOT NULL,
  PRIMARY KEY (`ProSubCategoriesId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pro_sub_categories`
--

INSERT IGNORE INTO `pro_sub_categories` (`ProSubCategoriesId`, `ProSubCategoryName`, `ProSubCategoryId`, `ProSubCategoryImage`, `ProSubCategoryStatus`, `ProSubCategoryCreatedAt`, `ProSubCategoryUpdatedAt`) VALUES
(1, 'Test Chalu 2', '1', 'subcategory_Test Chalu 2_24_Jan_2022_09_01_36.jpg', '1', '24 Jan, 2022', '');

-- --------------------------------------------------------

--
-- Table structure for table `quotations`
--

CREATE TABLE IF NOT EXISTS `quotations` (
  `QuotationId` int(100) NOT NULL AUTO_INCREMENT,
  `QuotationNo` varchar(100) NOT NULL,
  `QuotationDate` varchar(100) NOT NULL,
  `QuotationSender` varchar(100) NOT NULL,
  `QuotationReceiver` varchar(100) NOT NULL,
  `QuotationTerms` longtext NOT NULL,
  `QuotationCreatedAt` varchar(100) NOT NULL,
  `QuotationCreatedBy` varchar(100) NOT NULL,
  `QuotationStatus` varchar(100) NOT NULL,
  `QuotationName` varchar(1000) NOT NULL,
  `QuotationAmount` varchar(1000) NOT NULL,
  `QuotationType` varchar(1000) NOT NULL,
  `QuotationDetails` varchar(1000) NOT NULL,
  `QuotationBillingAddress` varchar(2000) NOT NULL,
  `QuotationShippingAddress` varchar(2000) NOT NULL,
  PRIMARY KEY (`QuotationId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `quotation_products`
--

CREATE TABLE IF NOT EXISTS `quotation_products` (
  `QuotationProductsId` int(100) NOT NULL AUTO_INCREMENT,
  `QuotationId` varchar(100) NOT NULL,
  `QuotationProId` varchar(100) NOT NULL,
  `QuotationProQty` varchar(100) NOT NULL,
  `QuotationProMrp` varchar(100) NOT NULL,
  `QuotationProPrice` varchar(100) NOT NULL,
  `QuotationProTotalPrice` varchar(100) NOT NULL,
  `QuotationProNotes` longtext NOT NULL,
  `QuotationProTaxName` longtext NOT NULL,
  `QuotationProTaxValue` longtext NOT NULL,
  `QuotationProPricewithTaxation` varchar(100) NOT NULL,
  `QuotationProductName` varchar(1000) NOT NULL,
  PRIMARY KEY (`QuotationProductsId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `systemlogs`
--

CREATE TABLE IF NOT EXISTS `systemlogs` (
  `LogsId` int(100) NOT NULL AUTO_INCREMENT,
  `logTitle` varchar(200) NOT NULL,
  `logdesc` varchar(1000) NOT NULL,
  `created_at` varchar(100) NOT NULL,
  `systeminfo` varchar(1000) NOT NULL,
  `logtype` varchar(100) NOT NULL,
  `logenv` varchar(100) NOT NULL,
  PRIMARY KEY (`LogsId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE IF NOT EXISTS `tasks` (
  `TasksId` int(100) NOT NULL AUTO_INCREMENT,
  `TasksName` varchar(1000) NOT NULL,
  `TaskDueDate` varchar(100) NOT NULL,
  `TaskRelatedTo` varchar(100) NOT NULL,
  `TaskDescriptions` varchar(1000) NOT NULL,
  `TaskPriority` varchar(100) NOT NULL,
  `TaskCreatedAt` varchar(100) NOT NULL,
  `TaskUpdatedAt` varchar(100) NOT NULL,
  `TaskCreatedBy` varchar(100) NOT NULL,
  `TaskCreatedFor` varchar(100) NOT NULL,
  PRIMARY KEY (`TasksId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `UserId` int(100) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(100) NOT NULL,
  `UserEmailId` varchar(100) NOT NULL,
  `UserPhone` varchar(100) NOT NULL,
  `UserPassword` varchar(100) NOT NULL,
  `UserRoles` varchar(100) NOT NULL,
  `UserStatus` varchar(100) NOT NULL,
  `UserProfileImage` varchar(100) NOT NULL DEFAULT 'user.png',
  `UserCreatedAt` varchar(100) NOT NULL,
  `UserUpdatedAt` varchar(100) NOT NULL,
  PRIMARY KEY (`UserId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT IGNORE INTO `users` (`UserId`, `UserName`, `UserEmailId`, `UserPhone`, `UserPassword`, `UserRoles`, `UserStatus`, `UserProfileImage`, `UserCreatedAt`, `UserUpdatedAt`) VALUES
(1, 'Administrator', 'navix365@gmail.com', '9876543210', '9810', 'Admin', '1', 'Administrator_UID_1_Profile__06_Dec_2021_01_12_42.png', '1 October, 2021', '05 Feb, 2022');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
