-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2024 at 12:04 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

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

CREATE TABLE `branches` (
  `BranchesId` int(100) NOT NULL,
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
  `BrancheWebsite` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`BranchesId`, `BrancheName`, `BrancheStreetAddress`, `BrancheStreetAddress2`, `BrancheCity`, `BrancheState`, `BranchePincode`, `BrancheContactPerson`, `BranchePhone`, `BrancheFaxNumber`, `BrancheEmailid`, `BrancheGSTNO`, `Brancheisdefault`, `BrancheCreatedAt`, `BrancheUpdatedAt`, `BrancheStatus`, `BranchCode`, `BrancheWebsite`) VALUES
(1, 'Teegan Travis', 'aGxkSXBpOTBRM1FOYkhCb20waWpjaElmNXVpZEV1L3JVWnBIeU5qbWoxTT0=', 'NzJhMjNYWXpMcGlYZHlzLzRjR3BCR3ZMRko2SUxFb1l5cEZaNWZMR2g0WT0=', 'Aspernatur quibusdam', 'Sed quisquam cumque ', 'Culpa consequatur ', 'Similique quam aut r', '+1 (575) 819-1602', '+1 (735) 965-8491', 'qynyhyci@mailinator.com', 'Autem velit labore ', 'true', '06 Dec, 2021', '', '1', 'Voluptatem omnis qua', 'https://www.zecykiqedonato.mobi'),
(2, 'Fritz Morales', 'b0NNbExDMUFDMHBiK2VxeEpDd2lMalBFUisvaE9HVExuUFhLSGVHRGxzMD0=', 'ODRwRzZEZ3NwOXB5SlFyb3pVVlhQc0o0NDJEQ2phYkJCTzcyOElUTnBoMD0=', 'A voluptatum blandit', 'Rerum libero maxime ', 'Et qui nisi perferen', 'Voluptatem Et eum q', '+1 (608) 703-5834', '+1 (413) 708-3755', 'dacupoji@mailinator.com', 'Et ex ipsum qui omni', '', '06 Dec, 2021', '', '1', 'Ullam sunt veniam a', 'https://www.mezo.com.au'),
(3, 'Emmanuel Berg', 'RW9wKzNPT1lvNGs5L3VSWDQ2RUR4SlVEaWsvUW8vYUozZXg1SkZQamNOcz0=', 'RVcvWThrR0lUM1lvZXdHWGlSRGRDSXp4WlZ3MEdWbHlVQWFNOUlrWFVyWT0=', 'Vel placeat est eos', 'Repellendus Ipsam n', 'Et voluptas inventor', 'Aute explicabo Dolo', '+1 (879) 529-1199', '+1 (619) 159-5895', 'xawi@mailinator.com', 'In eveniet quod fug', '', '06 Dec, 2021', '', '1', 'Eius adipisci sed om', 'https://www.luloqy.co');

-- --------------------------------------------------------

--
-- Table structure for table `calls`
--

CREATE TABLE `calls` (
  `CallsId` int(100) NOT NULL,
  `CallsRelatedTo` varchar(100) NOT NULL,
  `CallingDate` varchar(100) NOT NULL,
  `CallingTime` varchar(100) NOT NULL,
  `CallingType` varchar(100) NOT NULL,
  `CallingNotes` varchar(100) NOT NULL,
  `CallingCreatedBy` varchar(100) NOT NULL,
  `CallingCreatedAt` varchar(100) NOT NULL,
  `CallUpdatedAt` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `configs_rates`
--

CREATE TABLE `configs_rates` (
  `RateConfigId` int(100) NOT NULL,
  `RateConfigCurrentId` varchar(100) NOT NULL,
  `RateConfigType` varchar(100) NOT NULL,
  `RateConfigDate` varchar(100) NOT NULL,
  `RateConfigValue` varchar(100) NOT NULL,
  `RateConfigCreatedAt` varchar(100) NOT NULL,
  `RateConfigCreatedBy` varchar(100) NOT NULL,
  `RateConfigStatus` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `configurations`
--

CREATE TABLE `configurations` (
  `configurationsid` int(100) NOT NULL,
  `configurationname` varchar(50) NOT NULL,
  `configurationvalue` varchar(9999) NOT NULL,
  `configurationtype` varchar(30) NOT NULL DEFAULT 'text',
  `configurationsupportivetext` varchar(1000) NOT NULL DEFAULT 'null'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `configurations`
--

INSERT INTO `configurations` (`configurationsid`, `configurationname`, `configurationvalue`, `configurationtype`, `configurationsupportivetext`) VALUES
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
(36, 'CONTROL_NOTIFICATION_SOUND', 'false', 'boolean', 'true, false'),
(37, 'FINANCIAL_YEAR', 'November - October', 'text', 'null'),
(38, 'GST_NO', '07ABHFA1163C1ZZ', 'text', 'null'),
(39, 'COMPANY_TYPE', 'PUBLISHING', 'text', 'null'),
(40, 'LOGIN_BG_IMAGE', 'AVAGS Leads_Logo_25_Jan_2022_01_01_01.jpg', 'text', 'null'),
(41, 'PRIMARY_AREA', 'M3RKYjIyemJJcnFXZ2xLdzZINzdMNVNqRVJFbkY2ZnpTQ1BmNFdQcUgrMD0=', 'text', 'null'),
(42, 'PRIMARY_CITY', 'Q1o2a0w2NEpQOEFLTHA3ZHdNYjh4UT09', 'text', 'null'),
(43, 'PRIMARY_STATE', 'Rm9nUDlDRTVkV20zWm8wMmEvMEpPZz09', 'text', 'null'),
(44, 'PRIMARY_COUNTRY', 'MmtSc3hhcXA1OU1mNjFaYUJ6VVhIZz09', 'text', 'null'),
(45, 'PRIMARY_PINCODE', 'RjV6emhnOUxVeC9ic29tQ25BV211QT09', 'text', 'null'),
(46, 'TAX_NO', 'DELA61323D1', 'text', 'null'),
(47, 'GOC_CONFIG_DATE', '12', 'day', '1');

-- --------------------------------------------------------

--
-- Table structure for table `config_invoices`
--

CREATE TABLE `config_invoices` (
  `ConfigInvoiceId` int(100) NOT NULL,
  `InvoiceConfigName` varchar(1000) NOT NULL,
  `InvoiceConfigValue` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `config_invoices`
--

INSERT INTO `config_invoices` (`ConfigInvoiceId`, `InvoiceConfigName`, `InvoiceConfigValue`) VALUES
(1, 'PERFORM_INVOICE_PRE_FEILDS', 'NGhTMncyMTJuendhd3RPVTlEdUUwZGJjOUZXcklLTU54NEU0OUFUbFpUND0='),
(2, 'PERFORMA_INV_PAYMENT_OPTION_DETAILS', 'N3VJMGVVb0d0QkhOSkkvd3BUb2xOQT09'),
(3, 'PERFORMA_INV_FOOTER_TNC', 'Qlp1anRoRnJnK0RHMmk4dTBFWUR2QmZQOEZtaXhtUzVQdWF0eXpucXY3dnpkaDFmd1VxakhJUWJRbXMyN3R5UQ=='),
(4, 'INVOICE_HEADER_PRE_TEXT', 'c1B1OWErOExuR0pZUlFlalF4aXNZWHJvV3YybkUvT1lrS3F4c2RpYmhNVT0='),
(5, 'INVOICE_PAYMENT_OPTION_FIELDS', 'UmN5VERrRzQwa0F1WlRVWDc4V3EwMnlOK1o4ZjQxWVQ5ZVo5NnRYaFNiMEV4b2Y5WUw3NVhoZ1FnK0N3OWpKL0xvaDdBejdtaVcxaFlIMkwxRWkxdDE0Qy8rRVZUZ2pNV0FCQ3lGbE9nWlk9'),
(6, 'INVOICE_FOOTER_TNC', 'eVZsYnI3ZUNpajZ4RUNnTFNmd3RIUzhneWUxVHNMOWZYZnN0SWkzQzFBVGhsWno4d3pUTTViUnI5emg0UmJzRQ==');

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `currenciesid` int(100) NOT NULL,
  `currencycode` varchar(100) NOT NULL,
  `currencysymbole` varchar(100) NOT NULL,
  `currencyname` varchar(100) NOT NULL,
  `currenciedecimalplaces` varchar(100) NOT NULL,
  `currencyformates` varchar(100) NOT NULL,
  `currencydefault` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`currenciesid`, `currencycode`, `currencysymbole`, `currencyname`, `currenciedecimalplaces`, `currencyformates`, `currencydefault`) VALUES
(1, 'Exercitationem animi', 'Voluptatem assumend', 'Ursa Rosario', '3', '0, 000, 000.00', '');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `CustomerId` int(100) NOT NULL,
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
  `CustomerOtherEmail` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`CustomerId`, `CustomerType`, `CustomerSalutation`, `CustomerFirstname`, `Customerlastname`, `CompanyName`, `CustomerDisplayName`, `CustomerWorkPhone`, `CustomerMobilePhone`, `CustomerEmailId`, `CustomerWebsite`, `CustomerCreatedBy`, `CustomerProfileImage`, `CustomerCreatedAt`, `CustomerUpdatedAt`, `CustomerRemarks`, `CustomerSecondaryEmail`, `CustomerOtherEmail`) VALUES
(1, 'Company', 'Mr.', 'Gaurav', 'Singh', 'NAVIX', 'NAVIX', '987656789', '765456789', 'navix365@gmail.com', '', '1', 'user.png', '2022-08-09 13:09:43', '2022-09-10 09:38:44', 'MUxURkNBKzFHSXJHMDZMMkZDaFByQT09', '', ''),
(2, 'Company', 'Mr.', 'Vikash', 'Arya', 'NAVIX CONSULTANCY SERVICES', 'NAVIX CONSULTANCY SERVICES', '9599492328', '', 'development@navix.in', '', '1', 'user.png', '2022-09-10 10:06:46', '', 'MUxURkNBKzFHSXJHMDZMMkZDaFByQT09', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `customer_billing_address`
--

CREATE TABLE `customer_billing_address` (
  `CustomerBillingAddress` int(100) NOT NULL,
  `CustomerId` varchar(100) NOT NULL,
  `CustomerStreetAddress` varchar(1000) NOT NULL,
  `CustomerCity` varchar(100) NOT NULL,
  `CustomerState` varchar(100) NOT NULL,
  `CustomerCountry` varchar(100) NOT NULL,
  `CustomerPincode` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_billing_address`
--

INSERT INTO `customer_billing_address` (`CustomerBillingAddress`, `CustomerId`, `CustomerStreetAddress`, `CustomerCity`, `CustomerState`, `CustomerCountry`, `CustomerPincode`) VALUES
(1, '1', 'WEwwcVJ2OEpMMlNHYjlYUG9zRnNVUzJCaG9mUlllaVdjc0hQSkpLcEluYz0=', 'Faridabad', 'Haryana', 'India', '121004'),
(2, '2', 'SWRUOVVQUlJYODdOWjlCNERueHJHQT09', 'kknkj', 'nk', 'nk', 'nkj'),
(3, '3', 'amxjUjV1MHE1VjBlbFZRdnZsRUlyVStuY3RVZHFHaDZqR2hoQzBlNGZ0cz0=', 'Magnam voluptas quis', 'Cupiditate aut est ', 'Quia distinctio Ape', 'Eu blanditiis ab rep'),
(4, '4', 'RUhKSnlNS1hiOTA1dGhuS1B5UkFBTlREYlZBemZzakRFTmFQT3hpdW15cz0=', 'Voluptate aut quis e', 'Vel nihil blanditiis', 'Commodo magni aut qu', 'Dolor ut explicabo '),
(5, '5', 'bjEzZWF3R2xoRXRwOEw1M2dRd2JrZXlrNXd3REZqN3NvOU9EU1FGaUt4az0=', 'Mollit sapiente corr', 'Sint tempore adipis', 'Debitis tempora sapi', 'Assumenda proident '),
(6, '', 'OTljSlYzR3MwSmNwcGszdzZ3YTZ3cGhqaWJsNTdVZzFuVENsZk1UblRhOD0=', 'Ex earum necessitati', 'Sit voluptatibus la', 'Vel et nihil harum p', 'Lorem esse Nam imped'),
(7, '6', 'aFhYaVBIUGNJS0FwZjlxWDROR2ZLQT09', 'kbckjsdbk', 'bkjdcb', 'kbkjcbk', 'bjkqcbk'),
(8, '7', 'MUxURkNBKzFHSXJHMDZMMkZDaFByQT09', 'Faridabad', 'Haryana', 'India', '121004'),
(10, '2', 'S0xhVFBJQU1VOUR3SWVpOTZ0dFJKUT09', 'NOIDA', 'Uttar Pradesh', 'INDIA', '201301');

-- --------------------------------------------------------

--
-- Table structure for table `customer_contact_person`
--

CREATE TABLE `customer_contact_person` (
  `CustomerContactPersons` int(100) NOT NULL,
  `CustomerId` varchar(100) NOT NULL,
  `CustomerContactPersonName` varchar(100) NOT NULL,
  `CustomerContactPersonPhone` varchar(100) NOT NULL,
  `CustomerContactPersonEmailId` varchar(100) NOT NULL,
  `CustomerContactPersonDesignation` varchar(100) NOT NULL,
  `CustomerContactPersonDepartment` varchar(9999) NOT NULL,
  `CustomerContactPersonWorkEmailId` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_contact_person`
--

INSERT INTO `customer_contact_person` (`CustomerContactPersons`, `CustomerId`, `CustomerContactPersonName`, `CustomerContactPersonPhone`, `CustomerContactPersonEmailId`, `CustomerContactPersonDesignation`, `CustomerContactPersonDepartment`, `CustomerContactPersonWorkEmailId`) VALUES
(2, '2', '', '', '', '', '', ''),
(3, '3', 'Geraldine Roach', '+1 (524) 173-7558', 'lyxiqopud@mailinator.com', 'Labore architecto qu', 'Id veniam possimus', 'judoda@mailinator.com'),
(4, '4', 'Angela Sweet', '+1 (662) 187-4874', 'cegesazuf@mailinator.com', 'Dolore aut autem qui', 'Architecto pariatur', 'lenofequ@mailinator.com'),
(5, '5', 'Erich Salinas', '+1 (189) 772-8942', 'nizilehequ@mailinator.com', 'Aut minima ut at et ', 'Vel sequi cumque tot', 'qugigygego@mailinator.com'),
(6, '', 'Clarke Santiago', '+1 (786) 412-9356', 'dyjyfu@mailinator.com', 'Eos ipsum doloremqu', 'Irure incidunt minu', 'qemiwa@mailinator.com'),
(7, '7', '', '', '', '', '', ''),
(9, '2', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `customer_shipping_address`
--

CREATE TABLE `customer_shipping_address` (
  `CustomerShippingAddress` int(100) NOT NULL,
  `CustomerId` int(100) NOT NULL,
  `CustomerStreetAddress1` varchar(1000) NOT NULL,
  `CustomerCity1` varchar(100) NOT NULL,
  `CustomerState1` varchar(100) NOT NULL,
  `CustomerCountry1` varchar(100) NOT NULL,
  `CustomerPincode1` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_shipping_address`
--

INSERT INTO `customer_shipping_address` (`CustomerShippingAddress`, `CustomerId`, `CustomerStreetAddress1`, `CustomerCity1`, `CustomerState1`, `CustomerCountry1`, `CustomerPincode1`) VALUES
(1, 1, 'WEwwcVJ2OEpMMlNHYjlYUG9zRnNVUzJCaG9mUlllaVdjc0hQSkpLcEluYz0=', 'Faridabad', 'Haryana', 'India', '121004'),
(2, 2, 'SWRUOVVQUlJYODdOWjlCNERueHJHQT09', 'kknkj', 'nk', 'nk', 'nkj'),
(3, 3, 'bS9DV0ZvUjB4U1JHRXJHaCtCbys3SFpiVUJlc1FBR2RNV1o3cG5tc1EzVT0=', 'Magna lorem ipsum i', 'Cillum est accusamu', 'Iure sed ea enim nih', 'Ut saepe similique e'),
(4, 4, 'N1VqazBCNWRwMVhKMGxYdmxVaUlBN09mV3pnUWZDQzdCUVFKRDJPOU9VVT0=', 'Qui doloremque dolor', 'Molestias voluptate ', 'Ut qui adipisicing u', 'Distinctio Voluptat'),
(5, 5, 'WHpuY1dkeDFLOG5iaVp6VW5HajdxRmJHbk5yMnBGMW94WThzNEZaU2pQQT0=', 'Facere magni laboris', 'Consequatur quaerat', 'Ipsam sunt dolor qui', 'Mollitia aut cum qui'),
(6, 0, 'aUE5MlBPaDlyUjFFZ0NabGtnb1M2VXd6WTR3Y2h1QXVVeUo4MEhzWmNXMD0=', 'Consectetur impedit', 'Cum fugit reprehend', 'Quos voluptatem ape', 'At sequi ex est ut o'),
(7, 6, 'dzBpNkNmRjJsK2RjVGJ0K09yNDZzWmYrQS9FczZsbUV4N3BybEloaFpxbz0=', 'Dolore do quisquam n', 'Omnis consectetur e', 'Autem quis sit assu', 'Cumque duis dolores '),
(8, 7, 'MUxURkNBKzFHSXJHMDZMMkZDaFByQT09', 'Faridabad', 'Haryana', 'India', '121004'),
(10, 2, 'S0xhVFBJQU1VOUR3SWVpOTZ0dFJKUT09', 'NOIDA', 'Uttar Pradesh', 'INDIA', '201301');

-- --------------------------------------------------------

--
-- Table structure for table `deals`
--

CREATE TABLE `deals` (
  `DealsId` int(100) NOT NULL,
  `DealsName` varchar(1000) NOT NULL,
  `DealCustomerId` varchar(1000) NOT NULL,
  `DealCustomerCompanyName` varchar(1000) NOT NULL,
  `DealsStage` varchar(1000) NOT NULL,
  `DealAmount` varchar(1000) NOT NULL,
  `DealClosingDate` varchar(100) NOT NULL,
  `DealDescriptions` varchar(10000) NOT NULL,
  `DealCreatedAt` varchar(100) NOT NULL DEFAULT 'current_timestamp(6)',
  `DealUpdatedAt` varchar(100) NOT NULL,
  `DealCreatedBy` varchar(100) NOT NULL,
  `DealPrintType` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `deals`
--

INSERT INTO `deals` (`DealsId`, `DealsName`, `DealCustomerId`, `DealCustomerCompanyName`, `DealsStage`, `DealAmount`, `DealClosingDate`, `DealDescriptions`, `DealCreatedAt`, `DealUpdatedAt`, `DealCreatedBy`, `DealPrintType`) VALUES
(1, 'NVlTMDdFVnhYL3dVRHVHNVZxbk0rZz09', '2', 'NAVIX CONSULTANCY SERVICES', 'a0NDTVpkV3YwS0V2MXFzd2hpYmJHQT09', '1541', '2022-09-10', 'SmpkQXhXMTNVV1BhZXpZRTNaOXNFd1RLcHpaYmY5QTZ2bWlONFZqM0FrOD0=', '2022-09-10 10:15:27', '2022-09-10', '1', 'bWdlN0hYM25iZWU2RDNtQm9FMGkzUT09');

-- --------------------------------------------------------

--
-- Table structure for table `dealstages`
--

CREATE TABLE `dealstages` (
  `DealStageId` int(100) NOT NULL,
  `DealStageName` varchar(1000) NOT NULL,
  `DealStageCreatedAt` varchar(100) NOT NULL,
  `DealStageUpdatedAt` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dealstages`
--

INSERT INTO `dealstages` (`DealStageId`, `DealStageName`, `DealStageCreatedAt`, `DealStageUpdatedAt`) VALUES
(1, 'Qualifications', '', ''),
(2, 'Need Analysis', '', ''),
(3, 'Proposal and Price Quote', '', ''),
(4, 'Negotiation and Review', '', ''),
(5, 'Closed Won', '', ''),
(6, 'Closed Lost', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `deal_activities`
--

CREATE TABLE `deal_activities` (
  `deal_activity_id` int(100) NOT NULL,
  `deal_deal_id` varchar(100) NOT NULL,
  `deal_stage_details` varchar(100) NOT NULL,
  `deal_stage_notes` varchar(1000) NOT NULL,
  `deal_activity_created_at` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `deal_products`
--

CREATE TABLE `deal_products` (
  `DealProductid` int(100) NOT NULL,
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
  `ProductAddedBy` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `deal_products`
--

INSERT INTO `deal_products` (`DealProductid`, `DealDealId`, `DealProductProductId`, `DealProductMrp`, `DealProductSalePrice`, `DealProductQuantity`, `DealProductTotalPrice`, `DealProductChargeName`, `DealProductChargeType`, `DealProductChargeAmount`, `DealProductDiscountName`, `DealProductDiscountType`, `DealProductDiscountAmount`, `DealProductNetTotalAmount`, `DealProductAddedDate`, `DealProductUpdatedDate`, `DealProductStatus`, `DealProductRemovalReason`, `DealProductDescriptions`, `DealProductName`, `ProductRefernceCode`, `ProductAddedBy`) VALUES
(2, 2, '2', '', '120', '2', '240', 'Taxes', '0', '0', '', '', '', '240', '2022-05-18 12:27:25', '', '1', '', '&lt;br /&gt;&lt;b&gt;Warning&lt;/b&gt;:  Undefined variable $ProSubCategoryName in &lt;b&gt;C:xampphtdocsprojectsavgsadmindealsselect-products.php&lt;/b&gt; on line &lt;b&gt;185&lt;/b&gt;&lt;br /&gt;VlZnaUsxNTE4WmttTzZRZ1FaVWdCakxVU2h4NFRRL29sUmJzMzJoK0drQjRqSlJJWmIvZURSKytsbFhDRDdPTHBhbTZxZ3NSdG1lelVGbkhzSjNvMkY1MnVTRVdVcXdGMzEwRDU3ei96SU09', 'Product One', '0797998798', '1'),
(3, 3, '2', '', '120', '10', '1200', 'Taxes', '0', '0', '', '', '', '1200', '2022-05-18 12:53:41', '', '1', '', '&lt;br /&gt;&lt;b&gt;Warning&lt;/b&gt;:  Undefined variable $ProSubCategoryName in &lt;b&gt;C:xampphtdocsprojectsavgsadmindealsselect-products.php&lt;/b&gt; on line &lt;b&gt;185&lt;/b&gt;&lt;br /&gt;VlZnaUsxNTE4WmttTzZRZ1FaVWdCakxVU2h4NFRRL29sUmJzMzJoK0drQjRqSlJJWmIvZURSKytsbFhDRDdPTHBhbTZxZ3NSdG1lelVGbkhzSjNvMkY1MnVTRVdVcXdGMzEwRDU3ei96SU09', 'Product One', '0797998798', '1'),
(4, 4, '2', '', '120', '1', '120', 'Taxes', '0', '0', '', '', '', '120', '2022-05-21 13:43:50', '', '1', '', '&lt;br /&gt;&lt;b&gt;Warning&lt;/b&gt;:  Undefined variable $ProSubCategoryName in &lt;b&gt;C:xampphtdocsprojectsavgsadmindealsselect-products.php&lt;/b&gt; on line &lt;b&gt;185&lt;/b&gt;&lt;br /&gt;VlZnaUsxNTE4WmttTzZRZ1FaVWdCakxVU2h4NFRRL29sUmJzMzJoK0drQjRqSlJJWmIvZURSKytsbFhDRDdPTHBhbTZxZ3NSdG1lelVGbkhzSjNvMkY1MnVTRVdVcXdGMzEwRDU3ei96SU09', 'Product One', '0797998798', '1'),
(5, 1, '1', '', '670', '2', '1340', 'Taxes', '15', '201', '', '', '', '1541', '2022-09-10 10:15:27', '', '1', '', '&lt;br /&gt;&lt;b&gt;Warning&lt;/b&gt;:  Undefined variable $ProSubCategoryName in &lt;b&gt;C:xampphtdocsprojectsavgsadmindealsselect-products.php&lt;/b&gt; on line &lt;b&gt;185&lt;/b&gt;&lt;br /&gt;VlZnaUsxNTE4WmttTzZRZ1FaVWdCakxVU2h4NFRRL29sUmJzMzJoK0drQjRqSlJJWmIvZURSKytsbFhDRDdPTHBhbTZxZ3NSdG1lelVGbkhzSjNvMkY1MnVTRVdVcXdGMzEwRDU3ei96SU09', 'E-BOOK', 'HSN123456', '1');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `EventsId` int(100) NOT NULL,
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
  `EventCreatedBy` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `invoicesid` int(100) NOT NULL,
  `quotationquotoid` varchar(1000) NOT NULL,
  `InvoiceDate` varchar(1000) NOT NULL,
  `InvoiceUpdateDate` varchar(100) NOT NULL,
  `InvoiceNumber` varchar(1000) NOT NULL,
  `InvoiceStatus` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `PaymentId` int(100) NOT NULL,
  `PaidCustomerId` int(100) NOT NULL,
  `PaidAmount` int(100) NOT NULL,
  `PaidDate` varchar(100) NOT NULL,
  `PaymentMode` varchar(100) NOT NULL,
  `PaymentDescriptions` varchar(1000) NOT NULL,
  `PaidInvoiceId` varchar(1000) NOT NULL,
  `PaymentRefnumber` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ProductId` int(100) NOT NULL,
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
  `ProductConversionRateValue` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ProductId`, `ProductName`, `ProductImage`, `ProductCategoryId`, `ProductSubCategoryId`, `ProductBrandId`, `ProductRefernceCode`, `ProductSellPrice`, `ProductMrpPrice`, `ProductNetPrice`, `ProductDescriptions`, `ProductWeight`, `ProductType`, `ProductTaxOptions`, `ProductTaxPercentage`, `ProducPublisherPrice`, `ProductConversionRate`, `ProductStatus`, `ProductCreatedAt`, `ProductUpdatedAt`, `ProductCreatedBy`, `ProductConversionRateValue`) VALUES
(1, 'E-BOOK', 'E-BOOK_HSN123456_10_Sep_2022_10_09_57.png', 1, 0, '1', 'HSN123456', '670', '', '', 'c2p4RzUzTGhjeXZtNEEyZjhRQlozN2NYZWx6cDlSQzlkR1YwN0VVLzI0az0=', '', 'Services', 'Taxable', '15', '450', 'GOC Rate', '1', '10-09-2022 10:09 AM', '', '1', '34'),
(2, 'PRINTABBLE BOOK', 'default.png', 6, 0, '4', 'HGFY765789', '780', '', '', 'WUx2RkV2dmJrK1N0MU5NbklyT0t4NGJ0ZCtXakZ2RkMyVzNLSDBIeXZRaz0=', '', 'Services', 'Taxable', '28', '430', '', '1', '12-09-2022 04:09 PM', '2022-09-12 16:17:55', '1', '');

-- --------------------------------------------------------

--
-- Table structure for table `product_packages`
--

CREATE TABLE `product_packages` (
  `ProductPackageId` int(100) NOT NULL,
  `ProductProId` int(100) NOT NULL,
  `ProductPackageName` varchar(500) NOT NULL,
  `ProductPackageDetails` varchar(500) NOT NULL,
  `ProductPackageSellPrice` varchar(100) NOT NULL,
  `ProductPackageMrp` varchar(100) NOT NULL,
  `ProductPackageRefNumber` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_specifications_groups`
--

CREATE TABLE `product_specifications_groups` (
  `product_specifications_id` int(100) NOT NULL,
  `product_specification_group_name` varchar(1000) NOT NULL,
  `product_specification_created_at` varchar(100) NOT NULL,
  `product_specification_updatedat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_specification_categories`
--

CREATE TABLE `product_specification_categories` (
  `product_specification_category_id` int(100) NOT NULL,
  `product_specification_group_id` varchar(100) NOT NULL,
  `product_specification_category_name` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_specification_values`
--

CREATE TABLE `product_specification_values` (
  `product_specification_value_id` int(100) NOT NULL,
  `product_specification_group_id` int(100) NOT NULL,
  `product_specification_product_id` varchar(100) NOT NULL,
  `product_specification_value` varchar(1000) NOT NULL,
  `product_specification_value_status` varchar(100) NOT NULL,
  `product_specification_value_created_at` varchar(100) NOT NULL,
  `product_specification_value_updated_at` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pro_brands`
--

CREATE TABLE `pro_brands` (
  `ProBrandId` int(100) NOT NULL,
  `ProBrandName` varchar(1000) NOT NULL,
  `ProBrandStatus` varchar(1000) NOT NULL,
  `ProBrandCreatedAt` varchar(100) NOT NULL,
  `ProBrandUpdatedAt` varchar(100) NOT NULL,
  `ProBrandImage` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pro_brands`
--

INSERT INTO `pro_brands` (`ProBrandId`, `ProBrandName`, `ProBrandStatus`, `ProBrandCreatedAt`, `ProBrandUpdatedAt`, `ProBrandImage`) VALUES
(1, 'Test Braand', '1', '24 Jan, 2022', '', 'brands_Test Braand_24_Jan_2022_09_01_05.jpg'),
(2, 'mbnmbnmbnm', '1', '11 May, 2022', '', 'default.png'),
(3, 'mnb nmbnm', '1', '11 May, 2022', '', 'default.png'),
(4, 'NAVIX', '1', '12-09-2022 04:09 PM', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `pro_categories`
--

CREATE TABLE `pro_categories` (
  `ProCategoriesId` int(100) NOT NULL,
  `ProCategoryName` varchar(100) NOT NULL,
  `ProCategoryImage` varchar(1000) NOT NULL,
  `ProCategoryStatus` varchar(100) NOT NULL,
  `ProCategoryCreatedAt` varchar(100) NOT NULL,
  `ProCategoryUpdatedAt` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pro_categories`
--

INSERT INTO `pro_categories` (`ProCategoriesId`, `ProCategoryName`, `ProCategoryImage`, `ProCategoryStatus`, `ProCategoryCreatedAt`, `ProCategoryUpdatedAt`) VALUES
(1, 'Test Chalu', 'Category__Test Chalu_24_Jan_2022_09_01_07.jpg', '1', '24 Jan, 2022', '11 May, 2022'),
(6, 'PRINTS', '', '1', '2022-09-12 16:17:05', '');

-- --------------------------------------------------------

--
-- Table structure for table `pro_images`
--

CREATE TABLE `pro_images` (
  `ProImagesId` int(100) NOT NULL,
  `ProImageProductId` varchar(100) NOT NULL,
  `ProImageName` varchar(500) NOT NULL,
  `ProImageStatus` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quotations`
--

CREATE TABLE `quotations` (
  `QuotationId` int(100) NOT NULL,
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
  `dealid` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quotation_products`
--

CREATE TABLE `quotation_products` (
  `QuotationProductsId` int(100) NOT NULL,
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
  `QuotationProductName` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `systemlogs`
--

CREATE TABLE `systemlogs` (
  `LogsId` int(100) NOT NULL,
  `logTitle` varchar(200) NOT NULL,
  `logdesc` varchar(1000) NOT NULL,
  `created_at` varchar(100) NOT NULL,
  `systeminfo` varchar(1000) NOT NULL,
  `logtype` varchar(100) NOT NULL,
  `logenv` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `systemlogs`
--

INSERT INTO `systemlogs` (`LogsId`, `logTitle`, `logdesc`, `created_at`, `systeminfo`, `logtype`, `logenv`) VALUES
(1, 'YUVKYnZmdHd4Vjg3Z1o3dzVhYUo2QT09', 'czVHYWJOeGVBSjkyN0Qwazg2TEhPekt0MjE0UCtIalRhSzlUZDE0aWtsdDZFaVFrUmVMUGltMnVvbUluYmg1Y2VRWWtLOUVrbnp3SUlXcDVhNVVzUVE9PQ==', '2022-04-05 08:52:28', 'YWpRVE95SXN0VXZUMHkvb1pISXNqaFJCN1BLNFh6Z0J4YVVCWmxZd1pIWkJNb0VtOG9DQVFqRHlkazRtUWJrLzF3L3dIZ0lLY2lWOWxVMlJWL1lCa2gyQnRvd0pzamdGN3FacXRWb0N2Um9rbnhVUTFGaG56bGFoVXM5d1pCRUIwcjRBK3NXVVZRdE8vR0Q1TEZFb3pXOXBDb1lWa2wxSVU2ZWh3cGZYVm4wa2IzaVppRVhSTW5pcEd3dzB0SHFqcll2TC81NmlEVUk5RU83SXQ0dzg0Mm5iekFQMWp3MjdESFVaMkdlVXdtK0xHa2Vnczd5QUFTd0N2cm5QRTJxZ1dybE9Fa1hydk1qcDJOcXlSOHF2aEczZm96S3hwdngwdVZWOGNVMW9hU3dBLzJ2bm9DQnByeTRnUGlVTC96Z2Z4RTdNdWY5NEU0QnFHTUQ3b1ZzUnF6V2N4SjM1U2RsS1JyR1QzMWE1dXdMZG9JSEhYeVFYeEYvUnJCZEk0SVlvaXFxUElwYVllOXR0ZzExTElFeHV3YzhaVFdyVG9vUTFPaGw0MlZNdWRvd1UvM1kyUGRWUkdETFNkbll3WFl6L0NWMDV0LzNWUThwdlo1TVVPOUluR0t3OEtlMzV2N1JEZVNlNytXT25zK2ZpdTRMQ0dQMzgzM2JiaUVrNmFmYmJCUFd5VEE3aW91ZmIzK2N2S1NRVVVtM3FLeUpUb1RPQ1FnZERPMTY0Q2ZUSWtraEN2elpvMjg3ZmhYa2pKazVMSVJPNlNnZ1kvZ3NXTDNzZEl6ZjlVQWd2bE4rUjNodmZyL0tzNWk2QjUyTzA2WEthZkk2bm1HdDc0cUxIdGxyK25tdWZTYnJ5Zm8xamFUNDByWkdPdE1qUVBPdm5CMHlPK01TVThOVzd3b1FRNXc2djZGTFhrNzRnU0paNktIRnhrcW0rcWVGZHE1TW5VbXk2OXJ5bG1RPT0=', 'LOGIN', 'DEV'),
(2, 'YUVKYnZmdHd4Vjg3Z1o3dzVhYUo2QT09', 'czVHYWJOeGVBSjkyN0Qwazg2TEhPekt0MjE0UCtIalRhSzlUZDE0aWtsdDZFaVFrUmVMUGltMnVvbUluYmg1Y2VRWWtLOUVrbnp3SUlXcDVhNVVzUVE9PQ==', '2022-04-16 17:02:38', 'YWpRVE95SXN0VXZUMHkvb1pISXNqZ1A3WDZ0eFMrZDJaeHlPMWZVcEhXNlpKRmtjRCtDNE5qbWJGc1piTFZFWjZJS2o5bm84T2dHTk0zbCtFeEFuZ0NoaVZNTW5LTnVtdUFEdjZHM3ErZlFXK2c4STVSQ3lFV3lVWjk4K3hzNFJTMitvSzJYemF4a0NMamlhQWNLL1FnNk1pTjRZbVh0Vmd6QWJzajZMUkZndGZMcmw2T01ySmdramxUaThYNkgxOXJScVdldnlsM3psTlpudzRaSTdJR0tzR0FiV2dlcmNWalBBT1l6bDdTOW5zbHhIRmN4cVllRkpHelRyMExiR0hHdVBSUnZQTjF6eHoweStHVEdPQ2pxZGhXNWJybmU2MDl6ZlE2NFV0SWFBYTJ3bzU3blZQMHMwUHhLTVBoSFhrSDVrdC8wOGJyV0JCbFdaa0lEaUlMU05UZFZDYlpnbFpGd0tROWJXd0kweHNBcU5XNEltY0JIR1dUS09tSWt6ak02UWw5emd4Tk9Na1RNUWJXTTBOR3Z1NDR3dVZacTdNVlZqcXlnWTkrd3RyTCtQY3laZlZTRFpFRk1yVHFWK3lvU3ZDcWNuNS9YTU1UdzNWbkNrWHpNak5nUG1IV045TVpHMUYzbWg3RXVnd21xdURBU3V3WDJhL1doUXhGaXBJNG1CeS95YktOa0ZXeFl4MWhHb3FyVGFib0hXTHBTMkM3U21SMndZTjJLZkptamR1R3ZXd0RSeHluU01wODNvUjFNQzZvUDVteE1NVGJTUlhTSk8zNDBzM0JzRmlYNFoyaG55WERlWXB6Q3VDUnpNUTNiSmo5WDdKVlI4bU5ScmVIYXIrVVVLRFNXa2ltMTBQRys1SzczZjkwSkVoVWNvcEZ1bndTczlRNnQ0em9yci9TcWtVL1VyR2JoeEtwZ0Z4Ui96UGpBeU13MTQ3R1ZUbG5Ucm1RPT0=', 'LOGIN', 'DEV'),
(3, 'YUVKYnZmdHd4Vjg3Z1o3dzVhYUo2QT09', 'czVHYWJOeGVBSjkyN0Qwazg2TEhPekt0MjE0UCtIalRhSzlUZDE0aWtsdDZFaVFrUmVMUGltMnVvbUluYmg1Y2VRWWtLOUVrbnp3SUlXcDVhNVVzUVE9PQ==', '2022-04-19 10:53:11', 'YWpRVE95SXN0VXZUMHkvb1pISXNqdFJaK3NlYWMrekZrRFBoamo2Q1lNWXI5L1ZudHB6a0djMjdxTDJjN1Fwd0xBL3ZTb1I1TUEvdlZML1Y3bmFxZEhGNmNBREE1ZTZRQkZ6a09ybTNuVGpFRXNLVWY0WXk3WCtzZFB2UTNiUGdmT1Myb0xKeTl1VE5BVDMrZUQySGNDbGZSOTN6b2dIbGpOTEEzZVhXc3NwRUpNMXUvb0NzWmNjeDhjY1V2Q0FFaWlDZHFHVXVKR1NiN0VRdzZxYUdUMWtyQVBSa1RnTWsvYTdmMm84QS9SRVFUaG44Umtkam5La3lPSTV4c1ljQUhCN2JvNFdubExnVUNPZlo3TXoweHpUbmV3dUw1bDd3MWdGT2xQL1VnTDQxWWNWK2J5VGNIZVMxZzZZNEt3ZzNxUkNRVkl6T1hrRXRuSSttL0d4VzQwTmd2Q0dranJ0R0xMcDg1ZEttTzltMDh2Zkw1QVRZTVFDZ1czNjN2NUlEY3U2aE41eVlnOXhlcG81L3NoS0hvOTByK1F5VmJKWGhjVGpPcXpqZytRQkxWY2IxcnZIWjVxbGp2ZmlVVTBYUnI2L2M3K1hSNzhIaUNOZXdhOUNud1V3TlQvZDZoUFgrYVQ4amV2V3JnOEF6RHBmRlk3MHZzWHF2T2FTdXcva2R0UGdMUzJVU1h1dlV5WXdJZ3JIcEVmZ2dyaXE5WWxxSElIRkZvL0liT2FLWVNybUlBS1FTSXgrdjR5MFNaOWpJWDdBWFluWVQ4ZkZ6dmVnY0U4M2pYMHpIZXJoRDJxeTRUTkdzbEkrdm1EWXAyaU1nUHMwZ0MrRGc2bVhZeWtmaU5NUm50V2JrWlJSWkg5eWZDUVliaWxGLzd2RFl1cjlpZXloZUlVaXJGUEJkclpDWUdLYTViYlFGcG15MjduU2U4bGtPdGhxakFjKzB3bDFtVG1IbC9nPT0=', 'LOGIN', 'DEV'),
(4, 'YUVKYnZmdHd4Vjg3Z1o3dzVhYUo2QT09', 'czVHYWJOeGVBSjkyN0Qwazg2TEhPekt0MjE0UCtIalRhSzlUZDE0aWtsdDZFaVFrUmVMUGltMnVvbUluYmg1Y2VRWWtLOUVrbnp3SUlXcDVhNVVzUVE9PQ==', '2022-05-04 10:18:39', 'YWpRVE95SXN0VXZUMHkvb1pISXNqc3FHbU9aN3dhYWxwYzRkMVJ3VUZYK2Z1b1RFNVQwczQ0c0YvZ2xUY1lsTVNWRWcxN0xhS25XeVJvdHhOQ2dYTDhlVVI1SmVUMkhjSzJWMVdaWUNmTzk2aEJHM05FZ1NKU3N1UjhBUU9hRzF1MmE5Zk5iNkc1VDdJNVRMeEFwSlE4RWxNZWwwL3Z2M294a0JydXdabzhSU0hDc2FHYWZqODBxZ3JLdG5PU3d3N0hzbnYrUlRJYk5BcHZRQWx4VkV5cUkvUHEzMHVmY0JxOHMrUlJZZm9LbFRQaHhlZ29JTFpicjdWNDRUVjk5Z2ozOXVuTnlsZGF3a05oZ3JGb2NZQytENW8xcGVVeWFOTDFqbWM4bTVYSW8zTDUyQ1E0TzZkOERrK1U4NG1SWWF5N3pZN2J2dGtuTDVQRll1b2E0VWQ4MElNcTl4VE50ekRBM3Q1RElqZzc3QnlLRlVPakwzN1BiMWtoZlBXNmZBRWJuZXpvNk1Sbk91QjZKTWwvYmZrb3pOdGo5VHdVV0dNVmFFenVueFFTQjQzc291bzlDNERHK1VJZHhlNjFrUzdSRjZUMC85L0d1Z1NTeHNIa00ycElEb0dldVB2SldjRlZnSVJNTENkbXNYSm1JUlRHYXllWXJ4ZHZkN2FQeUNRQnNwandlM0F3NVlteVl3V0dHc0ZMT1dBTmNsenNRWFkyNWMybXhaQnlxelRsbHUzdWpEU21KSkM3ek9JdE83Mnh1QjdkcW9xWml0dkNUQy9idDA2eDF3VVpnVVFVVmg1SnJDL29CQzh5d3dwbVNDSExLZHdNbncvS3hXMnNrZWNMV2JWaE9LNEdoMldLeXJ5ZGhISHpWUDEycUhna2NCTGhtTk5JeStqTGRmMXpUR3NpY3l6cmoxMERSQXlsTWNnaWRRYzdoblB4RU4xeUZkT28rc0dnPT0=', 'LOGIN', 'DEV'),
(5, 'YUVKYnZmdHd4Vjg3Z1o3dzVhYUo2QT09', 'czVHYWJOeGVBSjkyN0Qwazg2TEhPekt0MjE0UCtIalRhSzlUZDE0aWtsdDZFaVFrUmVMUGltMnVvbUluYmg1Y2VRWWtLOUVrbnp3SUlXcDVhNVVzUVE9PQ==', '2022-05-09 12:51:05', 'YWpRVE95SXN0VXZUMHkvb1pISXNqbHY2YnJCSlhCVHpNMXBhUlFYemdHMnNKMno0Nnl4a28vcUcwczZ3bjU0cURSZHhsRnYvNW1keDByc21USTdueDR3NzB0UHJ2S2tzN0lRU1RtY1RLUUR3N1g4MXpLd2hhSmNMeVl3ejY3WitHNHY5YWlBWG1QaUVwSEJNZTBLZ1FaOXFqanBzT0VDNTh6ZUVBM1Y3WWlNWWcvZFZMczFVZlViUzdRZExtM2crQk0rdFdibno3cUIzVVJCZ0o4M2cwNTk5V3c5cGJBZjZMRlAxd3JldkwzdXpaVGoxU0Y4bFowaGt1SWp2MExlendMVjZSMS96bzluMFVsSm1DbUpVN1dhUDVyazV5dHRsUkJyaTQwaWYwbENtUUVyYk9OcW9NM3B2K2p5blJzSW1NSFBxZHU1U0tlOEJyZkNYZHhvQVN6eTREY2RKOVVNT2dVRlNDWFhqTHNVZVdSUjExVlA1VjZkK0Q4aFVHWEErMHU0TWxNOFg5MmVIK2Q4YnRDblpiYmVLazdZVDN2eEJpWG5pbWs4ZWpMRUltUU10THE4N1h3ZVF5L0orb2ZoeTZEQUp5Q3JRRjF2c3NzVTBHME83cTBPNC8wZkppVC9tVXp0MHRxRlhibkdMRTFQWnhxWjlTMUVmbGdtcHZxckNaMEhoZG5HOHBKdUpOYll5WGFHak85NFEydUpURzlIN0NBaU5kUjNFOGZGNk5QWWNEdXM3REtaaGUvNURMVHdvOUVIeHh4RFcyWWVzRCs3UUV5SS9TajhVWHVsaUowNUg5RjE0RzN0VXV6clU5ZjRZeGNsQVlUVkhxbzhBRGswNHA0WENZVmh4czRkb2Z0NDVpdDloSDAwZkMyYVJybEM5dGpuTHlZUlg1ZTF6L0dDQmdaL2xncGlDZFpLOFA4eTVHYWU1QzJBM1BIc25YeS93bnhlTFZnPT0=', 'LOGIN', 'DEV'),
(6, 'U3JLUHhEVVV1dGU4OGhqMlFHOWk5dz09', 'czVHYWJOeGVBSjkyN0Qwazg2TEhPekt0MjE0UCtIalRhSzlUZDE0aWtsdDZFaVFrUmVMUGltMnVvbUluYmg1Y2VRWWtLOUVrbnp3SUlXcDVhNVVzUVE9PQ==', '2022-05-10 14:59:23', 'YWpRVE95SXN0VXZUMHkvb1pISXNqb2IxTUN6UDYzWmdiK3F2WisxRlkvNlFoUDdIbTM1SG9EcTk4NGw2SVVOYnZDWDR4T0dzOXp1K3FTQUgzZ0xlOVpUSXBibGE5N2MyVmt6YVUvVTRBem5rcVhhU3NjZExBbENmakpIczNCS3VNbHhJSmVIbzNOZEJvbzNxYW94N2JraG5wQmhRdWhjdjFyVlhLWWprMmpTb0t3cFBMR2NVYlEzbHFRaXU0Nk9yNjI3dm9FbkYzcnZOQTM0MTJoOTZscy8wTkJJNDd1TGQwMTRIUXJFVDNRMjRxT0N1Mzgxc0dKM1dLbndyanlRS3J5cHVDdVptcEM2VG1hRFBvdUZBOWJOTy9GOVY3ZzV0NW1sNmF3Qmgza09wekk4cXBBLzA2SWVmN2V0OXdXUFFyck5oS2wwdVFOeEw1RnZoTGRSNGYwZE5RMG9tajFFekxHZ29DUkM0bVhicE1WMTBpNXhNZGhxYjd3STNPYVJwWGwweXpjNTBrK1duWC9CaWlQMzVjVXZnalEvb3hwNGlETFFOTCswUFBsZ3ppSjhYMldCYXptc241ZkFlVW4rS25zZ0RPTThYWHpRYkZrbXlpYWk1dUdQT0VyY2l1ME41SkZNZDVRZ3AyYjVkTDdZZXl1eklTTmJrcGI2ZTE2a1dwYlR1OHVkTUxBb3JHaFlZRktVWkRvaHVGckZXVnM1S0F4T2F1SDhpRHN2QkYwTUtRdWNwMzRkRG5PcXF3dmdUSDFYMy9LaWpGRm5DcURFWWFMN2w2MEM5OGNNRysvMm5qbGRzUlZRN0RsaURNOU5TT0hGMkUxRFVoU2VBdS9DNlB5OXAyRWRVQ3ZGMjdRaE1wY3g2MjRkdU1LdmhrckR2ZTd6NXB5a2JvdHg5U0NuUW1pbEFYNnVuRG9oRFVqU2k0T3QvOTlqd1VCcHBaT0pPN2FzTDdRPT0=', 'LOGIN', 'DEV'),
(7, 'YUVKYnZmdHd4Vjg3Z1o3dzVhYUo2QT09', 'czVHYWJOeGVBSjkyN0Qwazg2TEhPekt0MjE0UCtIalRhSzlUZDE0aWtsdDZFaVFrUmVMUGltMnVvbUluYmg1Y2VRWWtLOUVrbnp3SUlXcDVhNVVzUVE9PQ==', '2022-05-10 14:59:31', 'YWpRVE95SXN0VXZUMHkvb1pISXNqb2IxTUN6UDYzWmdiK3F2WisxRlkvNzhnVWlUUEVISnZjZlI2VHlYOHljSkd4aDhTRWpKM0tSbXFCSWhzaFFzN2VsMnpScFBveVdVZ1EraXYyWjZkeHBoaExzaVRyZDhpQmFiK01VL1gzSU1UdFJZOFZlSHZoZVh0UGxHanNXMTFEWU9reXk1NWtmT3EwVFVsZnREQzBNTWp1VkNmeW0xNGxiYnN2azBlci82Yk5VTHNRZ29uekhtSE9pN3NQWmJRaHQxUTQ4OUduUGpYTnpvZUloYW9ORTF2b0tuNnpSUFNCVWNadEltdTF0dUI5ZVFHNGl5cjVDOTc3dVljT1QwRzlvQ2VOM3FjcVoxU0ZZS1NEaHg2QkJkNlBKRms5RUVQWFVUVFFZK2NDUitYOW94VjBpVG04NS90dGdqdm9DYUFsdjkybVpZaitTVHpTNk81TnFNQzFJak8xWnFKeFkyMm5OY2ZNTHFta2xjM1VnWnA5R0ZIMnpEczZRZkRPSDJmb3ZHUGgyVTNjMHhtQVdnRzl3RVhBZUM0ZHFqenVtaU5naXpjUFVCdVZwdlV6L0ZjZjE0SytYZUlDUHJsUngySEhIYllmclZnMXA3Z3NXUld1blM3UDF5RVVDUkMwVUFpK3VkbDhrYUlSU1JoSXZlZ2p6eEJHTHh4d0ZEeUJBTmdnWmszR1YwaFdnU1kyMk1KSFBWQ2c0QlV2dkEwWnlaTWt4dU55VWpyb2JxdDNCRitTYUVvSjFHMWp0RVJlb1E0WUdKMGxRdCtocFNUVjZsV3BtU3JtY28vM01nc2pQOS9MS2hPeHJ3d1cyMVk5bTc5RnFOSGVIVlF3T0RrSDQ5UlFpbW43SzZGbFkwVDllMUU0a2VqREJlVy81ZURDSWJvd3Q4bGFZM0Nzbm40WVZFeld0M21kcGxWS0ZDWUJFUlpBPT0=', 'LOGIN', 'DEV'),
(8, 'NnhGUG5wbW9aTUE2Vmxxb0hYY3E0dz09', 'd05BVFhobFkxeVpLOEpaOTVUeU5UNi9XempxU2hVcjdkMjhpTjlYamdGODJ2T2kyM2w5ZmtBZUM0WGxNWHhySmxuZ0k0VDRHY0ZNdXJ5cDdXNFRhSWc9PQ==', '2022-05-11 15:47:10', 'YWpRVE95SXN0VXZUMHkvb1pISXNqcWtvMkd5ampzMUpsWGtNNERrbWZpR21UejVTZ1labzdmM0tmV2NjVnpYRThIcFN2d1NoQ28wOExSZ282R1BCS3hGWVhuQ0RLUWNFM0ZmNERkSG5IVGs1OENHeDVTZjJPOEdWUEJmN2V6QkJiYWV4ZnZ4MStDcS9YZlV2QkxjQWtHaExmdVJCTTg4NFdkQmQxdkpyMTdBNjgra2VNQmx1aGc4MEJsN0xWeVQxbkE2USt1SjIvTnVvMGJDUVhTMldPWjAvQU1FTFFXTWM2Nk9pZFFTRy9yL0N1RmsxZmdMRW91bFlJNzBwVEF3cWp3bUZINnRQLzlpZ0tqaG5Lc2xGalNHMjFFNXB1MzgwcE0xVWxpQnBaRzVDdGpoU3Y2cmFocGdXVjNJWlhndmNDYmZJNXdORlk0ODJ0L0V6M0pONSsrcHRnTnJNM2dCdk5ZUXBNNEdxOVdFdHMyUjdyVmdENFN2YmQydTk1dEVzd2dGaVUweWlLaDI5aHZnMG9uNjRpT1NPRlB0VDdDR0sxNVdPWU83MXcxbVRET2h5d3R2Yk9xUmhVbEpWS25tY1J3VDBHU2VxMUxVcTB0alR2WnJTelUxOURqRHc2TTFHMVhkUjJCMDVYaWZTbjIwWGd6ejVPQzVtOVVMKzlPRy8xcUs3dzgzekU0NUFXVkhmbzIxR1gveTQzV0doQ3J3QXV6UGUxb2Q3Tm5FZGc0bXpkaFo2V0s0N1VqUDRReFdzeWFUZzRubzVMRW5KK0liYmY4ODdYTktXcmhVOWdkRHVMbXQzaVZoT0k4UHdBd0pZMXBXL1JQZmFjeGVHblB0RTl4Uy9XbTdNSUJTUnBBV2szVGFkS2QvQTFxVFN2Q3gyNFVPUzFUZnZ4ZlFwS3ozUXRFUXR4SkpRME9ETk9Nd0tTalo0blNxY0xDZ0lLNHM5Mzl1TEV3PT0=', 'FEATURE_UPDATED', 'DEV'),
(9, 'U3JLUHhEVVV1dGU4OGhqMlFHOWk5dz09', 'czVHYWJOeGVBSjkyN0Qwazg2TEhPNWt6MTZTSTNGQWJITFdIM3c4WTM4UGx6d05ZQUhaMitqQXprejZxUGNkeE9CNm9sMENRajlnK1hUQ2pSL0xNT0E9PQ==', '2022-05-18 11:21:32', 'YWpRVE95SXN0VXZUMHkvb1pISXNqaVpVWkxZaTlYSms3eW5HOS9kbG5jN1N2cHM4cnh5SU04cVRJcHpVMEhuUVVxaTY1Y285UklSL0pNM3YvOW83d2prQ0JzYmI5R3hTMmk0SVlFdDdQcGdFY1VsL1ZXYnVRNVltLzRObGNLQjc0aW45WGh6VmRCMkJSNzZSc1NMbVBJdjVCWHdhbkVGc2d4dFQ4aDBqb2t4TUxNTWpPZDRtOUJBWE40S1ovN01YNTBpSVcrT0RjT24vcEhvOXRFVHZibWQ1aWFvZjFQaDZ6OVAzUEU1aURpQkkxWkR2c0lDTloxc0d0Z2phUUM1UGFtZXVUZzhZQTZvUU9RMytNS0lLcFYySERCM0Nsb042RVBudVI2QmJUZjVRY2NvMDA1eEgxWjVySFU0UmY1NlNhRE03K2Q0MTEvMTFDWkN0bENGQXloampSbDZQZUZORWxoNHY1Y0t6ckJ4TjNxeDB4T1QxTmlzNUVjQVQvaStXUDlXQkpUb0ZBOEtqUmF5NTNnZzRzWXluNmJoOGw5MllkM1QzOUxpRVNDbVBJMDMwSFlvZzREVC9DOGd1RjVCR2N6VlVqcWFwQmdhYTNGWWJ5WFFiY0pCOUFta1ZFWS9WTmpyZExXc3lBZjh0OFc5dmhqYmo4eUsxU2R3dU9XVEdKVE5nUTh4T0JtZzlQNTVmVGttN2QxV2l4eUllamJxWllKRXJpQVkzLzhVR0l2am5ja2Yrb1hMSko4bnZWMEUxUmpXSnNSQ0QzZ2UrQy9CK1pwQlQ2TWpyWTNxdGZ2UHluQ2hXdzdYeVhXZlRTbEtleDlQaXNRczlXUWZkcUswd1ZwaWRYaHUvKzc4c2tRSmxhSDhHSTg3eDZsVEIyNUFKbWJnK3pUdkp4WEt4NWo0bmtPbVdGa1VwTVZuSTBpWDhtenVpbW44bzRzR3A3dG9BaTQ5bTZnPT0=', 'LOGIN', 'DEV'),
(10, 'YUVKYnZmdHd4Vjg3Z1o3dzVhYUo2QT09', 'czVHYWJOeGVBSjkyN0Qwazg2TEhPekt0MjE0UCtIalRhSzlUZDE0aWtsdDZFaVFrUmVMUGltMnVvbUluYmg1Y2VRWWtLOUVrbnp3SUlXcDVhNVVzUVE9PQ==', '2022-05-18 11:21:46', 'YWpRVE95SXN0VXZUMHkvb1pISXNqaVpVWkxZaTlYSms3eW5HOS9kbG5jNlp3N2FRVStycDJ3SzVVUXlVVWJoUHcyUi9PclFwT1VTRFFHczljWUluS1pXNWg2anN3UzdjcTM0TVZoRFkxeDdqQnhxcS9hZVE5NTRmUzVacEJZRUg2WUtmTXVHSG55bXAzMjdnK2JnNVdacmxORzR1VFNkRW1kTjRtVGRUQ1ZiWUNtRzNVSGczcXFNOXEzR3lJMHMvUHpwZ2ZxOU1aMTBNOUFKeVRXYURBOUliY2c3ZjFXS0JtQWFEN2swdjdpSWdCSENybE8zcE5nYzFUOUQwVXJkSS94Tk1lR1RuUHNCRFlhRDBsdkVZTmcyeUg1MnNqM0JLWU9SakRKWllNaG9pNytXSTRERituSzBCb0NZQXQxYmF3K3o4RmdZaXVNNlVjMVlieDhuVXQzcGg4aHhPYXJaVzZ2L21aWmk2T3d0UHhXVURZUUdISE5FR2psb0lZRG9JdFdmR0Z0OXI1SXVlVi9NRGlJMm9JYU5xUmtzTWp4RFp6dllzMmFCYWZOL3BXMnRtcTBsUWxBL09tdGZVbVZkNkFxS3NwY1pMdHF4QTFjcVpiNXh0bVhENmdJelo2ZTh4WXIvMjJBQUdReEtiSS9xMnU1MXN2bzRPTXAxeFVwL0xQeU40N2hGVUY2T3NjUUthemVMWExZWGFWQ1hvdmxZUUt4cVVuWHd4cXFCN0kvTTVzTVZDNHIrMTVMTVA2NmJFZVkxZ0ZnNUpMVWwyOExHdnN4Ry8rMUtTbU1EQlUzNmxGOGhWVzdHaU9EVFZDVkFvRE1HSmc1OTJZaHE2ZFREcWtoMUFzcUVheW5JSG5FMVZjRE1XUmQ1N1VpZzY2ckF4WTNkb09QdkRNNHN3bFJXOUkvZk5XTUltYXhwaHE4cHdQODVNWDhZMHpXZitkVGRMQzFPRnNBPT0=', 'LOGIN', 'DEV'),
(11, 'YUVKYnZmdHd4Vjg3Z1o3dzVhYUo2QT09', 'czVHYWJOeGVBSjkyN0Qwazg2TEhPekt0MjE0UCtIalRhSzlUZDE0aWtsdDZFaVFrUmVMUGltMnVvbUluYmg1Y2VRWWtLOUVrbnp3SUlXcDVhNVVzUVE9PQ==', '2022-05-19 10:11:03', 'YWpRVE95SXN0VXZUMHkvb1pISXNqaU5pYi9wdUJUSTNhR09JTFZUZUFITzJCZE9BdlUzUFpsU3ZUTWRqdFpscTZCaEpDUEZqZE5FdmpzSEQxOGx0TkhIbVRFNkpTNzlvNkdzOU9CREhBbnJpUVRQa3FMTHE3WHc4N2tJNWRUYjJkUUcvT2xrSy9ZMWVHN04xb24wUkZLRGpPQ2NoWkQyTHFDR0I1UzZabXFpalNiRVZTMnNZNFhzZjM3TGhaZkI4SGxjd3hrMmdWN1YxL01pSlVTMXpQcy9zeTJodGdGVjZhR3BCWUJ6d1VCd1FkWEJhcUhFcyt0akF4YW0wY3VWQ1lndkplUnhlb3YzU3l3TkJpdFczbVRWaWIyVlhDdUlaMTgrQ0h0K01VY1VPVm84ZmlhU3hZc2ovSGhrZnpWV1F1bWtFb0MyR0VVOXo3aVp6UUVUWjFQSGhwQTROYTFNcHo1NGVpZ3Z3a3BzNmQ5blJBNWVwMWh0eEFSK3pOdFpQbWhSclZQcHFKMVVCUGFPTHdJdSs3N0tDWVRUdThoRkw5TmhUcmRaTzFOTEhYTjRsNEFrSExnL3U2ZWRsZHJ5UDdPSmpWUXZ3QzNzZDhzRnR2WlRYUWtmYVl6UUVRV1dudUwrSzRpUmFES0VVYVhCYlIwK1hBaVdhN0Rmbm9ldlpsK2pXSEEzZ1JNYmcxYUhmTHJzNXVLaUhnc0h5QW1QdHRrVU9PM3ZaRGNSRVpacFkvdTczSkpzWDJXMWlrQzJscElwSkZQeHNsejZtbVRiTm9ZMzI1QWlxSDVWMkFsSlJiNUltcHNSVndTK2VINUhqTVpRbDJDK0pzNmtjNGJERjVSZVhrTkd1Vkh0bmxlUnA4K1FuNzc1QkE2T1o2blhpdkFXQ3VHSThQT201UUkydjJCNGMzbHZ2d2owaFFGdGo5dkpUYXFXUmM5N092Z0pJb2RsbmhnPT0=', 'LOGIN', 'DEV'),
(12, 'U3JLUHhEVVV1dGU4OGhqMlFHOWk5dz09', 'czVHYWJOeGVBSjkyN0Qwazg2TEhPNWt6MTZTSTNGQWJITFdIM3c4WTM4UGx6d05ZQUhaMitqQXprejZxUGNkeE9CNm9sMENRajlnK1hUQ2pSL0xNT0E9PQ==', '2022-05-23 13:15:07', 'YWpRVE95SXN0VXZUMHkvb1pISXNqbHlQdEp1SThzK3lzQXFxNWFCcE5KQVluYTlFVms2TytWZERsKys0T0FKbllQa25jVkQwMVhPa1JjTDRLaXUwZnlWUDJEd1h0aTU2VkUvNm0yZFJiNVpkcG51dkwrTjdzME9OMVJTNFlrNmJxZXdER016UDQ4MEs1SFIralpXbGs3dTZWb0NhMWJyYjdIMnlGVndFVTQwY1Z3VzM3Tit4V3pGNkxzREZrS3YwRXNVYjZIcGZCckhwQ3FSQU01VVJwYlZvcXpVTDA2bUVjTVcyTkFaWG9RMFcvSys5Rk5aa0J1cmpPVHRLK3RUUHZ1SW9xOFlnZUo4S1A2V3oyWGhPOHEzRmhVQVJqdDUyZTlweHpjdWRTN01YUVZBWC9hdFhYWDAwTS9ucVUxRVFYeDN2VFh4aGg1SUlrWEJDN3FpUjVqQ0sxaGhnTXRMRFhqQTBPdE0wclk2ZW9DcC91M1ZxRDVHckorWWJKUkEwS2tVbXFUc2hVTmlwOWw3MnR4Z21BMHJKS2lTMXRSZkNLMkkrcDkvaU1BQmdUNXlTNE10djZQeitYZlduclZoM3RKL1hLV0FFZ2dBSkxSUG9idEdpZ3V0cFpiR2p3cUZUSlFDdXplc3hzNWJheERJWXVBV3o5Z1BXVG1qZWoxVTRGNDJLU0VxMTdNUVVlREZ3WVNEYUZEbG5kSmdpY2I5M1JUM0N1eVpxUXc5UGtQOHhyQWhsOGJydUQ2cjdGemYwZDJqeDRCekM1S3poY3czaXlhVDRoaXZGN1lMcUduaGZsaXhJZ0FFblMrdmdlTkRvRDZma3VqbEJPczBUb1l3NTg5VDhTY1JhZ0hpVFZqL3M5RUdWOWR3dUtkK21YeG5oYXlEZVNpZE5xN1h0R2tFS05LV2d4RGx3Um8yVStqZlN2WjZ6UjF3MDlkREl4Q0xOZjlTNUp3PT0=', 'LOGIN', 'DEV'),
(13, 'YUVKYnZmdHd4Vjg3Z1o3dzVhYUo2QT09', 'czVHYWJOeGVBSjkyN0Qwazg2TEhPekt0MjE0UCtIalRhSzlUZDE0aWtsdDZFaVFrUmVMUGltMnVvbUluYmg1Y2VRWWtLOUVrbnp3SUlXcDVhNVVzUVE9PQ==', '2022-05-23 13:15:20', 'YWpRVE95SXN0VXZUMHkvb1pISXNqbHlQdEp1SThzK3lzQXFxNWFCcE5KQVdpVEF3c0dIZVcxTUNBVjZ6Y0tzckpqa3JvUHdScitFZ1JEcFRwYkNhSkFGRitQbXpLanZBVWJsVkRZcDV0REZyYU5RQTdYWS9TeFhpUkJDbHRKRXF5T1ZscTRkVnR1SGRVREx2ZkcweU9ZYmlyd3RPNTRGRG1zcytFbHFFMmZJRVdEWTY5a21wdjZZQ1FLdFdLWW5BY2tZMEVRMjM0WmpnMXhvUFFUa2JxYklaVzY1Wjk4NGJwa25TNkxaVXlsOG15V0d6QWhxclg3eWpRb3NGYUlFZ1pjcEhFSFhscndWRUwxSFAxdEFlc0ZESEQxSDNUQWdWWW13NWJtRTB0NW01ZDlQYmcyNmoyUkZYUHA3T3dEaDFpVmpqYVMrQm5udFRJWE5xSGNXUFlLMncxSVBDMUVEeVd5Uy9iUmtYL3UvbXZ1R1JwWFl5QmJscFlEQXlycHQ5eVdHVWplc0RpbS9wck5Uck1YcDBrRWpoTW1KaklWQnMrN2sreGQ3NUNzcmlKWk5nZk9aRFNJZ1ZWSlNWTTJnODR2M0J4VmVKdXFUbmZIdG05S1pxN2djS2EydEtjVDV6UFVzelJaY1lnVU1CZjREREFMWTBRaG92cGlveUhDdHpDeERvUk1xbS9YQndLK1BDVWlmR3VGU2libVlId3JXWkFoeW5KdytjaFJMSnpmK3FoajNRcFdRcmFmcnIrT0Q3ZmJPcmxIanREeGFyMnA2T1NZOTArQm91T3ptMUN3YWtSalBtTjBERVNOS0VpRGxJd01IL0svSmtYdkU2c1JzaUwzNFN2SzFaOHZXZTdnbFh6T2UxaWk3cy8zQkgzODN2a2pnNVovZ0kvd25SdWgxWHI2b2Z3Y25YcllBWjJjOUMrcWhJcXRJNkpGTkljQ1JIbFJEd2tRPT0=', 'LOGIN', 'DEV'),
(14, 'YUVKYnZmdHd4Vjg3Z1o3dzVhYUo2QT09', 'czVHYWJOeGVBSjkyN0Qwazg2TEhPekt0MjE0UCtIalRhSzlUZDE0aWtsdDZFaVFrUmVMUGltMnVvbUluYmg1Y2VRWWtLOUVrbnp3SUlXcDVhNVVzUVE9PQ==', '2022-06-08 11:08:06', 'YWpRVE95SXN0VXZUMHkvb1pISXNqdGNZNi9zbHgvMGQ3emtHaTZBNGNmTjIvMHlNYjM3a2tlT3ZhUDNnaDNaSllQVlAwT1REM2NnRnpJNitwTnZRYmZIcVhnZmMrM084bGk0WHRTT3NYVHNJZitqZUlkUjdtZzZDR2FCbnZmdzJmaXRvdk9ZMHZOc2UwTzllU2liOE1ncUZ2cDlvRlowVEFkYUZ2L1I3NmtpNUhVbkF3NDYxQi8rUVpTWURkVjdNczQyblJ5RnpTUWxwZ2dkTENJY3Z0RXlpeDBPWUhmck1uMi9DelIxdG0wdmJxNm5lTVRpVEJtdENjMk9pL1dXL3BNUjNjb1Y1WWtRc0RZRTRpYkplNVM4WlRMM3Z2MjAyK0lRK3hxeDZQUk9Dc1hNcnB2S2JTOStCRmFGNzB6NTJkYXRGOTZhR1Vsd280Tjc4L21pSithTmtWc0RvVXNzdE1TZFVpcWFpWk0vRVU2OVZEUXFHVkY2aEpJMzA5N1NOWEJkdmtINEFQVVBSUFFTNlMxWC9OL1FHWUVzNWloZEcvTEpwc3llV2NWMVAyeHVoUXJjam1seUgrenIyZ0dydG11UEdPK09DaHNUQ2g5aFJTOExscTBTWjgzSVBJblU0NnUySXEycEh0THFjdVR3RnovMlVlMEJBSFdWckhnczlROThicWEwcm40d0Q1djluc1crbUJCaWV5L0hvYWxBbktRbW94bVJsVTZLUk9idS9ESXpBeEJMejVJR2EwZms1NDdpWXRqR25hK09nYXE3ODVyQzFiMnNIMmlzQXJFeWp5cE0zdmNDa1RVTmp1a0djY1dnc0g2UVFCV2FicXFkSmtZMSt6VmtnbVo2ZFNrQmxOVlJQZ1FPL09DZXFaQmJhdy9HMk5kTWgyYThyUUhjVHIrbXpucXZqOTNZaHIrQW5KNlZLbG8vNUN1T1RkeHFVNWFORmx3PT0=', 'LOGIN', 'DEV'),
(15, 'YUVKYnZmdHd4Vjg3Z1o3dzVhYUo2QT09', 'czVHYWJOeGVBSjkyN0Qwazg2TEhPekt0MjE0UCtIalRhSzlUZDE0aWtsdDZFaVFrUmVMUGltMnVvbUluYmg1Y2VRWWtLOUVrbnp3SUlXcDVhNVVzUVE9PQ==', '2022-06-09 10:27:40', 'YWpRVE95SXN0VXZUMHkvb1pISXNqckpReXJ4NlhCWTF1bjVoTUZnS2pEWE1OR21IR2hMVjVFWjQ2YnQzQ1hJSm02K01IL1hScjA5cm9iRUFOUTR6UXJ1WVliQUJEb0dmZlBGdVFPRTZoRUVianhXSVRUamc2TFJGOWFnbzVYVnVBbzlhbWMyc201SG8ya2swOStPeHBDZFNaYVkwY3ZLVVM5a3Ryb2pFaEozSGE4d3BYYzdEaWRYckNJZExhQThzNE5IMkEwdEgrdlNDK0VpejlQZnloSHZIdjQzNTBXZ3N1b2R4WGgzaHVid0w5Qy94N2owUGVESUVkaWV1MVpEVW04UkRKMjZxbFZxTUdCNnRnbkRYVUR4SFRBKytjVzJKMlVNZndKZEpTVExaYU04MXdvaURQdFNxNGlmY3lnSHQ3ZzZEVG1ZYkNvZGRwVW9uZi9XR253Szh6dWYwc1VFV3h1R0xIbE56MzVCaUV0a05nWm5qYlZmMTVnZ21TYnlNZElKd0lHM2xUQk9PK3ZyZU02VnUwQjFuRlJDYTRSdzN5UWJ6NlhCWTlxY2NDaFBoYVFyVVMvSUFLekpNTDg1QVBZb0RpTXJnTkFvdEw0RWxMQno3ZTFpRG9XQmdHMGora29QZkQ2SVZiUmZpc09WNkJwWFdndGlQdTQ0VFdodEcwNHNybGsxUTBpc0xrbjdDb1A0bytsWXhzNDBscG80WXNpV1o3NVR4SVZZVTJ6OHkwV1pLemc4b2NkcjJkVGZvMFhFTWZmdjlzTk5VVnYzN0pUd1ZweWhmSHV6UFRSNTBhSmdsQWFSU3ZjcXByUXl4ZnYwdmdSeFJ2ZHVEcnlXRXB5QWZsUFhaZStMcEdRU2tpbXBBenZDaTVVN2xGTWhJN2d0bXl5REhlR3EwMHNrOFM3cFY4S2R3ZWZwRFdpeGk5R1dRRFBaR3gxS3hSTFVzc3VoVEhBPT0=', 'LOGIN', 'DEV'),
(16, 'YUVKYnZmdHd4Vjg3Z1o3dzVhYUo2QT09', 'czVHYWJOeGVBSjkyN0Qwazg2TEhPekt0MjE0UCtIalRhSzlUZDE0aWtsdDZFaVFrUmVMUGltMnVvbUluYmg1Y2VRWWtLOUVrbnp3SUlXcDVhNVVzUVE9PQ==', '2022-08-09 13:08:18', 'YWpRVE95SXN0VXZUMHkvb1pISXNqcU9UVXNPWllUSWNqSlhFTGoyNFpkcGJJMHNJT0hNMkJLRWlIVzV4R3IzTkhBMjBZejlmejlVT3I0ZXUzd2x4MWhqdXgxdjg2ditTU1NNSk11cWsvVUtqaGIzaHNtU0FrMW1zdFZKTmNkVWZZelVaUXdhOVhJMzMxN2V4V0h5Tzd0R2p3VUg0V3VNWkhyZUJ5dlIvZnJTL2ltSjkvSnU5VUd1VzlWajNyUm1VZllRYnJjZ2plSGltclJ1Z2tvS1JSMGRsR2RYMENPcFZJUk13aUNHemtwMkFIbWFhd3JQZU5EUFM1aVZ5R2p5SjE3N1B6V3huVVYrenRHbWljaGF0S3ROMEZnMEcwQzBISGxnQ1hPeFhQVjU4eld0cC8xQ01oWWFqV3o1WHF2aWR2cWlQWnB5dUlsTHJIZ0Ryd09NVitBSnYwK1NPaUdvTStHY0tFYUZnbStic0txdXVmcnVsTmNGb3NpcU0ranBGOWVXajZTemNtcEd6ODFFRHRMT2w2RGxEd2ZIWjJKWFc4WklPeGM3enppbEFnMm1GWUVaYlBxdzdRNEh2cGFoNVAwWHU2anFpVXluOHJ6VWtiNUk0YXNzdkR0bGUzK1VGc1RUdk91Mk1rYThmSEhIOUZyMnpVZ2lJc1hPenExM2RDVmFncmJ1YUNmWnpDcFd4UjQzejBTMTdhb1pMenJ5WGRRaWxrcGpaRENNZGFkb0kzNFZJYXplTXRmRUlDdFI0VDhENklMRlFLNG1DR2RndEZTbnNkQ1d4NmZpSEJpdTIxYlVsVllVOXJPRUN1TEZYSnhvdmhFVXZBdHZSQ0dETU9vZ3FCcUFCMlBtZ3NLcUNaYVA1cDVKcWx1WkwrYUwrWXp4WWRDUjRhV1NWNGpXVkNIS0M2dXE5WGNQdGZvaFpDWmdETXhHTkNEVXdUR1QvNU54ci9uSkM1c1d3V2ptM1pKNGxSaDl3K3B3PQ==', 'LOGIN', 'DEV'),
(17, 'YUVKYnZmdHd4Vjg3Z1o3dzVhYUo2QT09', 'czVHYWJOeGVBSjkyN0Qwazg2TEhPekt0MjE0UCtIalRhSzlUZDE0aWtsdDZFaVFrUmVMUGltMnVvbUluYmg1Y2VRWWtLOUVrbnp3SUlXcDVhNVVzUVE9PQ==', '2022-09-10 09:33:11', 'YWpRVE95SXN0VXZUMHkvb1pISXNqb0w1TjNuMHVXOGdXZW1nalZoSFc0bmRweXU5R0dsb1c3UWtKNVZCcTcrcjY4cC8xbnl3NUQzN2J5Si9qK1l3clhKTTdNSjZSRWhmRzdUdEFRZUc4cjRGME5MblhRbWdOb29xNjFwbWM2R2JlMkZyMEZEVW9pK0o4SWhDeXduRUJFUlZYMVFnYnlSdVRyLzJnMGJ4OUMwK09rV3VXZXVhK0hKM3B1K3AzNUxvazY0djl3NjA1L0h0THhjNktZVVZuQ2xBOWdxeDdRNENSakRQTk9ESEdjWHBjc2hCdUd4dStoQkN6eE5TRUtPQVBvbk1OU1RTcjNOcDhIZWgyZ2tSNERHWml4WnZIeG91VEMxb3VZY3FvU2IrNkRCeTRLOVBQV2lPdmpTRkNvOEdMeSs3MnAyME5CZDdMSVZNSW0rMUxVcThDTHBWbkl1QnIzZkVrRWVPQk5oYlRYaWRMYVp6Z3Nhd3hzV1FsL2NTYi9Qdnk3azQ4RGpPRHNiQ0VUcUhRSVQ5cWFHSDlrZDVCK2N5L1o2SVhMTHNTMzBuR2w4S2hRZnFjQmN5K0IrcFN4NjEwT3dNc3ljaW5aNHF4enRUQkFuMkZQVTlRRTEreXRDS0duR3hsYnU1ZXVkZFI1cUNudTJ4VnlRQ0JtbDNEYis0aWxwQmliVi85THlONUUxNGg3blU4RXJHYVpZWWVDemh2bjVuS1EwVmg4aWk4WGdDb2pmZzdzTG01NDFjeHQzdWk5U2l6aG56WDEzRzUxZVVSbkVoais0NHp6QW9pblZJaDlBL0ZvN0lMOVh2QWdKU0R0d25iZEhxVTgxZTdNeDM1TmY2NTZzNG5GU3R2WG1CQ2hJWjFFRzdlNEZqWUkxNldtMDErcHI5VmdsWWtlQy9NU3I4UXlEZWlrOHU1Vk1wL1NOSHFJdmhzWkdudGlVL2tRTDVMSllYSUtPVTRIZnpoV0dBRFpzPQ==', 'LOGIN', 'DEV'),
(18, 'YUVKYnZmdHd4Vjg3Z1o3dzVhYUo2QT09', 'czVHYWJOeGVBSjkyN0Qwazg2TEhPekt0MjE0UCtIalRhSzlUZDE0aWtsdDZFaVFrUmVMUGltMnVvbUluYmg1Y2VRWWtLOUVrbnp3SUlXcDVhNVVzUVE9PQ==', '2022-09-10 12:57:12', 'YWpRVE95SXN0VXZUMHkvb1pISXNqb0w1TjNuMHVXOGdXZW1nalZoSFc0bG5peW8ydVlmNWIyRG5RV2ZtTnlEZVU1Y1RUZHdGYjFWZkowMHpPQzlkRG0xUXRPQ09yTzFPeFdDK2VEWUxoMEdZOXBubnNqZUFxUnlMdTRmalozRzdhNFdhVyt0U0pjWENPVmh4SElVcEFOWXhvc0hid0d1V21aZUxjem13K3hWWVBBVHRYb3JwNWFKOHFnVkFYYzhXQnNnYlowalJwOWJjaWo2V1VuWVZnSGdIdGdkenZGMGQ4Tkp6M3Vxd05MNjRuT3pJd1dHMmI2b0ZLNGovU3pYVEZUNTdZN2lpZzdHbi9XbWlpRld2NlhWQUk5TkhXcTJQbTVseVp4VmNldGF6VmsxUzh4U2FQNXU3VFZ6aXRuOEUwU090RzFxNW5Ra0R2eHFvUit6NTVZNEJkWlZXYktpS1VjSmZSUnI1U1NaVDJXcVdEYlVqOXdMeWtWODRoczh3b3A5NlpqRzhTKzFPV3JTM3NsZkp6QzZpRG53aVgvRU1XeXpkV0lrWmNUQ2NHaUVYeUdBQ2E1MkVtMGJmYjdaS0ExaytGMlBZNzZUR0NpU21vdW9uVDVkcitNNHN5QVZ3eDNHUjB5NEM3SDVIL3l5Y1BNMGhoVmVwZHh4VXJSWm02b0c2NHBuSXJqeE5DcDk3SjJ0cS9DQ3Y2K3QrWVBMRFdkYWJYejJxVlhzN2dEWmlucDdEbWM4TFVwRkNvSk1tWE1VeEwwM1hQeHBsRG9TZnVCb0tTaERwZUMyYU83R3Jpc3NLNUYwc2JIc3BWa2FkZG82OXdtWXMzdUl4T004amd4ZGZobmZsMUlLY1BHMC9kOWFseW9qdFR0TUFkWERYQzRHYjN5eHBMcGo3TDYxbUtNZ3dyTnpBUjQ0MWpCRmd6QjFlbm0xb3JDMGl5MHA5VnZaZnR3b08rMzNFT3RKZmxZd3VJNld6TmNjPQ==', 'LOGIN', 'DEV'),
(19, 'YUVKYnZmdHd4Vjg3Z1o3dzVhYUo2QT09', 'czVHYWJOeGVBSjkyN0Qwazg2TEhPekt0MjE0UCtIalRhSzlUZDE0aWtsdDZFaVFrUmVMUGltMnVvbUluYmg1Y2VRWWtLOUVrbnp3SUlXcDVhNVVzUVE9PQ==', '2022-09-11 11:11:25', 'YWpRVE95SXN0VXZUMHkvb1pISXNqaWcrVkJQYUF3aTZua29UaUhVdWZCUEJQUEdvZTZKaWtodlpKZXh2RVVMUFBXcmxXaEpleUdrVmIyaXQxZUYwS01EeU5hUFMzMHgvQWF0bTIvUGhlZVlDTU9RTEM4cERlUzlHU0gzMlBtOFVaM3N3ODl4aktFVVI4NW1yYWJVWG5KQ3A0RGhvODBYcHJ4L0V3WlJ1RC9yMFhEeDhyaEQyckFwRXhYQU5zekllaHBZdkRjdVplQmtFZy9COC9WUjZqRmlVNlp3bWVJbzE0L2ZZVGtpSkV4MG1JMTRaUWFKWUNaT1o2ZTZGN0krcTRrZ0FMdjNaaGJDNDFGSys2YkY1bHk3cTVpRnhzTzFjU3FCOVg1ZTVEUS9hcS9LMnloZnNXY2k0ZGNES1hWWEd0d3EvLzRFWlc3K0dPL2VhZ21QRmdLVUQ2NmRNa1FLelF6NzFsQlRodTNwMEJXS201VFV5RGZXbUxUL2VmNFMyZ3J1S0lqOWlrVGhlbC85NDlhM3hwK3B5eWxtVW0xeFBsMTVtdXF6VjllTktMSG9DTUlqNjVQdk84U0I5QXZZQmw3anUybmI2elFROFpTd1NlTk01bVErMkVHRGw0YlFUSm5ObFFqR1JuRDA4Qmp0dXVURjljK2FOSEVwUUZCaFQrMGhwbm1EcUR0YnBWR081VlFIV0t2MFpqaUVEM0RMRHZ5djk1eVJYUkVBakRkb0t4cy9zbUsxd0lMZE1FZGREVWhvRUJSeC9pT1NERjFsNGVXZ1BhWHE3NGZVc09EdUUvVHBZSm50RU50SnBhdGdYSTlmbHE1VEdVVWgrOXFpSk9KSk1uUHlMZ3BFTjY2UXFIYUxqZHJ3YUJmbDZGekYwVW5MQ083K0kzOFNGV1FkWWc2NlowTUduNkI0SUZHN1V4VFRETVg4MWtZWWJxQVNyWnE4aDdzRTB3aXFVUWdENG9PNm1TTHlUMWJRPQ==', 'LOGIN', 'DEV'),
(20, 'YUVKYnZmdHd4Vjg3Z1o3dzVhYUo2QT09', 'czVHYWJOeGVBSjkyN0Qwazg2TEhPekt0MjE0UCtIalRhSzlUZDE0aWtsdDZFaVFrUmVMUGltMnVvbUluYmg1Y2VRWWtLOUVrbnp3SUlXcDVhNVVzUVE9PQ==', '2022-09-12 09:21:37', 'YWpRVE95SXN0VXZUMHkvb1pISXNqc2lnY0l6cXY3aUloYVBIazlTUi9USThUa1BUWk9FemJ3clNpcUlNRGRKMDdrNG03R3NUbmVvTGR4NWQ1VzFaYXNLSkRkZHM0QXBYK0NnditRYk1NT0Zvb3dVYVpiQ2p1cERYVkFMckNiMnFoRVl0RWMvRlNIY0dJQVJiVldGMnVxV2JUVzBNVWNHSFFveEJjdURrTmFrWWJUVGZUQUgzdTg1Z2tUTnppTjNXV1VxWnUxditzMkdjaWRxczhKeG1VeStvby9CQlFqc2pLU2V2KzhEMDJhWGN2Zkh5REpoL29RMzhNVUR0RnZwdzFyUzFBS2JJYTZlN0ZSR09PQ0V1aS8wdXJJWkNoa1FZQ3J1Y244T1F3ME9EQmg4NjA3WmFxenlMNjMrVzNITXhWdEw5MGd5bFdOSFVzdkRlaXNsbnFDUFpvM1BrQnlSOXBOUzdwekY3YkhmdFpOajZrZStGYkVmTUFhRGMzUGp4aUJRMndqKzlPWHNwTExDbWQ2cENVR3ZSRkJDWEVCQnFHTVlwR1duN3p5Qlo1SzZLVEJORkx0K0EvY2JlVVM0TllxU053eVR3QUNvaUVsUDJmLy81OGFESVB5eEt0TzdPU1NoMkhPWXNXN0NBSnF3L1BHWUsrQnFueldDNURYUkpDK1VSTlE4UlhheDQydHhZTkthV1JnbEJzVzVtQmUxNDFYR1orMUc2NEdIT2FNNC8ySDJrT2FkSGNYUWgvOHlGSTF1YzNiN1RFbWhTNy9zbURoZkVzakxSN3NBcEFJRnN3VmVPWDFWaDBVNTRrSjczUVp2T2UvRnlvcHZjaU5XZVlPb2UvWitGb1FjVHNXY0xaMHVxL0lwMkZLazRKWXhvZzFaRkJLQ1J1VjB1a3hiZkgyd2ptd0FjVm1PWU1PTDg1dEIrZVYzNjBDUUJHSTVCT2hXSTU3T0JlUTVOMWVhUlRCckFweHhDeUJvPQ==', 'LOGIN', 'DEV'),
(21, 'YUVKYnZmdHd4Vjg3Z1o3dzVhYUo2QT09', 'czVHYWJOeGVBSjkyN0Qwazg2TEhPekt0MjE0UCtIalRhSzlUZDE0aWtsdDZFaVFrUmVMUGltMnVvbUluYmg1Y2VRWWtLOUVrbnp3SUlXcDVhNVVzUVE9PQ==', '2022-09-12 14:07:00', 'YWpRVE95SXN0VXZUMHkvb1pISXNqc2lnY0l6cXY3aUloYVBIazlTUi9USzdSM3dnQzIrVkNqKzREeURFakMxUUsvclMxMG1WNjhLYWdicGxxYUx6MnYzVWMxbVNXdVh3S3VkMC9EdjBUaGl6Z01BaDl6aVFBTXVyU1YvWE5mODN6a0FSa0RNcE5SYXBISWNtYzhvV0M0eDlyREViMStNNXlmbDVGcmtOKzBSK3l2dkc0dU0wTTBZOWhWZC93R3AyaUNsUldsU0FlcEszY0RzSExXNW5QNmIzdVU5YXhzWXY5SnBOZlNSUTNVQzZFdzdNVE5VZzRGelJweUZPa09WaHFnQVVlSlBENDJjL1BqeTVzK0RXd1ZZdElOc1dvbjAxcmdrQXRXcVJMU1BDMkRaL1pLV0RpamlpREw4WEZ5dEU4TkJiS0hneVNYS3UvL3FPRmtGUDV4cFcwYk8wNjBxMHgvbEpXZGUxRzByRFlTUGNnY3l0Rks3czBSWHhyZURQUWtGMVRybmdIeEJzQzJQYmZ0VlAxemNsa3FUejlGem1BSnVJMjZ2MjI3d0ppUTg2MDN1eXlpV0hVUEdSWHk1R09DOWxDa090K1JkeXNBZFQ5UDdGVy9RdTV6c2pCOFBmMVFZSUpQU3RRb005S1FCamYxU1NBeXJrT0VvSGY2ekNlZnlPRlNNOVZhdUJrVVQwYnQyNWpyMEhiRjVLQzcxcWZuZ1JhdTRRUkloc1JWNldZbXdQZzgxNHJWOEFqWXgyNis1MzNHbW5Ga3VKUzNUR3RnMncvaUNHWm1MVzAzck1COGVSZHkxZWxjZXRIOUZuRUFidXpqNm9UWU1oenl1TzVDTVZja3o0TnAzeVpNQ3ZTQmVlanlXSmV3YS9kekFaMzRIN2FGRG5xRzYrT29waHlEa2JxdzhUSHZYUExsL0RONGRaaHU0UUFkNHFyT0xPekxyNE80QlB2WHh4OE5pSG1lUkwxT3ZzTTVVPQ==', 'LOGIN', 'DEV'),
(22, 'YUVKYnZmdHd4Vjg3Z1o3dzVhYUo2QT09', 'czVHYWJOeGVBSjkyN0Qwazg2TEhPekt0MjE0UCtIalRhSzlUZDE0aWtsdDZFaVFrUmVMUGltMnVvbUluYmg1Y2VRWWtLOUVrbnp3SUlXcDVhNVVzUVE9PQ==', '2022-09-12 15:46:29', 'YWpRVE95SXN0VXZUMHkvb1pISXNqc2lnY0l6cXY3aUloYVBIazlTUi9UTDZOVEsvUDkyd2RQbzlDcFJacTkrSGZUancySFhmV2p5dzkwS3ZSUlFTQWFmbEliaG1YK21RZWVzUVovZ2NMTXh6Szlad1pXSVR6dkNELzV0NGRhdFdmbTFhUlU2NXE4dHROb2x1TUtqaC9QTVhsdzhObFNBQ3ZsRWVYTjVFb0VBb0VUOTQ1aFdpWGxEUFZKc1ZnZGorZ1U0OXV6ejVMUDZ2TndRMllVdkVuRm5PdE91ZEpkL2tGM3B4ZitxTEdJRHlFcXc3bm56NWptYWpjUkwyUFZNbGNGTW1pejdaYjJFdWR2VGRrT1V4dkd0cHhZZE1QYjZvUFJrRkpqUEtwWnVmOFdIeEdMdEd1cWdtdis0aGxKaFh4blVBRGU5NDJ5L3JuTlJ2bHlsb0JmdEJNb2JTcWNMMTlHYU5TNnFMblpET003RXBpalR6YUlwWlIwZkFSZEdjQWtLMjJ5blU0ZVVKNVc3MFBBcW5ibXYvWnRqT0JhQ2tIb1Jvc1hlUklUMXdUL0xRZTBwaGUwM3JBSjRYeUZGeVZsSlBBRFRYU3Jya1BUZmx4cmNSWE5qVG9TT3hmRFJadi9EbzE1ck1hRWp2ZWRnSTMrMDNvbC9mVngxZHZSRHNHOU1nWmlSeDUrV2ZIU3VpSkVZSG0wY2o0M1lQWE1QK0F4QXNrRytYYjJZOVJDaTdzMEJydy83RTNkRUc1czdscU55SVo1RXdOSi90T1JPVGZwb2xSRXBRRXRGNWdOQTlkRmFpU2paeFQ5d2VNWGZsWDlwbTVjZmN2MG5CN0swcUxDL0VaNzdHYzRFUjE1akxpZWhvZzlUQ3BzUjNzNk8zbmJHeTRHR0FNcHdYV2xrdE5HbFJucEo5S0szSCtTOVcrTkxXYTV3MVN3NEZGVDYxdTZjQ1lkMjZtR0svNWdyNThCeGdKeXFueis4PQ==', 'LOGIN', 'DEV'),
(23, 'V1VSMklNT3VuWThWTDRuSFAvVDgweFo0ZVo4WDZQMUJGaWx5TTdVM250ST0=', 'emJ5emVlc2JieUpCZm9Uc0ZDR0tXQktGTGdEZnNtOENMT3piTURCRStFQT0=', '2022-09-12 15:53:17', 'YWpRVE95SXN0VXZUMHkvb1pISXNqc2lnY0l6cXY3aUloYVBIazlTUi9USngvcmZ0NFY4Sk96dEh2alJHbUR1OHpvd0RQU0xGRVN1bW4xVHNwRGMrZzNQaVhQTWI5WXJmb3FHemxUdDUwWEJkd2UvaUV0c05nS2ZXZ21Gd2lMSzNGMDNxOFRIWEZ3MWYydGc2MEFGTnh5aWpSekNmZGJaZk42Mlh1ZkEvcmNHWUhlR0MwYUg2OHo4QU1nMlpWclVSNUoweWljVXNLbVFxZlhvUmJZQjBUZWNxR1NYcDk1TFVlNmtmUHVaSFkzdHNZeEtUdFJWY0pXOWZoQWo0ZTVFOFZ2SXVjUzkzdFVpTTJONmx4Umg2VmxsR0RoM2hVMHpJZ0VmUGE1ajNpWHpMMm5OcGlyWjJtRTM4V0k1VWZxeWFXVlVYa1dvZi8zV0dmQytpVnk0ZmdONDNDRVpXd1RKMGFXUnI0clVxS1R2WHFRbDdXQlhhV0VDYm5CeWNCR2c4NXN5ejBYZngxblRCcUhYdzdsNk5NK3ArS25NVlNEcVVtSS94bEV4RjZsbjFTdDExb1JsckV3UitkVFY4cUJoTStJQjNiWXRPYkNjMHl6YUtUeUgwQVFnaVBsZERjWTFKSHI0OWV3TldidnhBenBjY0EzZ0dRZ0VJQXVodU9LUUxYU0swajVHUHJ4ZSt0WklZQUkvSmlXZ3hXUEJDa3dOUTUyRGhFenoyUk9xS0RQZE5jREdxcC9ZU3NNTlJFcjFRNTg1NXdHSFJoTi9OZGE0Uk5paVFRUjRRNGhaMERvZjBpTTgweGJybXUzS3ViOVVSckViS0pNallLL2pZZTI1NTBhYjR3WlE1d0FEQmlYZzh3UDdQTDJ2ejFVTGk1NUx2UDZXNnhQcFlRNHV4NXNZR2hxS0lBYlNDSEltK0JVN3d1bm5pZXVRcHpBUnE0NWJmVm83V1N2VExpTm5qNjlyMHBTc0FhNUJZeks0PQ==', 'UPDATE', 'DEV'),
(24, 'V1VSMklNT3VuWThWTDRuSFAvVDgweFo0ZVo4WDZQMUJGaWx5TTdVM250ST0=', 'emJ5emVlc2JieUpCZm9Uc0ZDR0tXQktGTGdEZnNtOENMT3piTURCRStFQT0=', '2022-09-12 15:53:23', 'YWpRVE95SXN0VXZUMHkvb1pISXNqc2lnY0l6cXY3aUloYVBIazlTUi9US3p3akVLdXM0Z09ZMnZsbXdRN2VLVUNRbUVFN1NoVE9XNWo4YnYrUmpkVjR6NlQ3Vk9sUFlIalgzWWxtRENabkdqVk1IWFlMa2h4NHNjTUcyY3pHbCszVW1nbnN2OStpc1NycDBORUNwZkxqWWxLWEdiTUdHbXQvajVVUkRrbDBVenNjNklLd214aFBIRHIvR1RHOFBKdE9WTTc0dG5ZSE94cVdlSUUvYVc2M25zR3ZpQWduTklJODNBbHB0YlRZMmMrUmorL0tHam1oZ2piZFQ4ZC8ram9NU0Fsd2dSNldjdFVWVnVjdUR5d0ZpT1ZOZkZXUkZTUlZYNmZIdk1oWnUyVTduU1VxdkpFdm1semw5OUZNQytoVnlrNjRQNU1nQXNRQi9pSVdaRWIwQmRFTktRNEVuNEFzWkc4M0VXV0t0WUtrRkhxbXJzRkxmY245ZVdnK0pZR3lEalZrUmw5b2xsOHByOXZwY1RFQ1p4ZlJKaXNaRC95Q3JlMHVDRElwV3pFWG1kMTR5SFo2NnVJYTRsd213S3hmdnFtMmt1ZGs1cUIvdFh1OUpTTWRWZ0VjK0pQb1VDZWhnTmFUUlgyK1VMcG12QmFkWExJY2NEa2hoenRwYVBnQlhLS3VuWlZkZVN0cmVDbU1tcG02bitwd2xGZFQzbUpCOHNQdW5FelRUNEVJSDNBZUYrUjZRQ0U3a3RYSjRaSDlGbWpDUDJBY291a0xWRHBkNjF0RVlyY1ZNL0hPd09uYS9rbkZvZWtabm5LOS9KV0hQK3kxOGNMMWNBaFBZRjZhbGNOdURBM2Y1V3loYWgzamkvSVJyRy96bkVqSzlKVlZkL3l1MXU2Q1kxR3lRb0I4TmJmVlpiOU5MQmRJN1ZHU0VPdXRGY3o0N0xXRWw2QmljakEwZVcwOE1ZWnZTSFNPUkdlazF3S21vPQ==', 'UPDATE', 'DEV'),
(25, 'YUVKYnZmdHd4Vjg3Z1o3dzVhYUo2QT09', 'czVHYWJOeGVBSjkyN0Qwazg2TEhPekt0MjE0UCtIalRhSzlUZDE0aWtsdDZFaVFrUmVMUGltMnVvbUluYmg1Y2VRWWtLOUVrbnp3SUlXcDVhNVVzUVE9PQ==', '2022-09-12 15:58:16', 'YWpRVE95SXN0VXZUMHkvb1pISXNqc2lnY0l6cXY3aUloYVBIazlTUi9US2l0MTNsNGIrVzhCVVJBc0oxSVBCb09mRXVHMkJyK2orMnozQ3hYL1NRRW9oTjFSTGg1Nm83ajJyTVpMb1IyYkZadHRCMDlQY3dUS29TelIzNks5WEUzTTgyaVMvZmxCOEJuR1ozWFFUc1lPVWxoWGR1alFCOVFEek5jdktNa01VNmNONS9FV3dBMDhkRno5RnlZSXV0ei9EYlpCS2lGQUs0ZDdWMGlkbk5uS05XY1ZRbTdaTHBIdm1TSmZ1bm5MYU1ucUxVLytVODVUSGpUQ1ZGS3VPemlZVUN2a0Nodk9HK0FQWXJUWWFRd1FYdk1PWGVTN0MwLzNEUlN3aHZBNUdvUVhWazlvVzF1TkhOazBpOURpRzBBMlBzd2VyU3ZGQUxUWUs2dklFZjcySTdsNDNXZitzdno2cFo3dTBWZEZEWURkeUsrNk5Ec2ZSQ0dyUmJ2a3cxeE5IeW5vd1VQU2F1YWc1NFpaUG83NmhYaVNLYmFqeVpTSmdaNWl3aGxSb3M3OGNJK1pINWFiazZnTFpYQll4SnBXWnpweG9taFIraFJpWStoOEplLzhtLzJCN0V5eHIxcjU3VC9YQUorSUYvL2hBdWJmUDZFSEg4RDA1dER2dGlBaS9XWXNENGt0bVF4bHdWY3ROMUZaOGo3T0VrL09CQXNmeWEyT2NBUXhtUXFseHpXTk8rU2Z1U2lQbTZwL2VYSFdibXc1a29KZk8rMVlkRXZyNVNlcmJkbEcrT1VBemQ0bUlBd0pTTEpQd1c5RDMrc3ZUaUpJNnJSNExpYWErYmtjeThqN2NKbjhOSDFsMDFCK3NJNCtTaEV4OXhBWk9SODJYK1dIQlFwWVIzTnNHRStXd1JBQVQzSUtqbVlSYmIvcWNFOGZEL1pwaTVUY1l4ZWtqSjBtaGhBVUJ0dVhqSGs0OVRmcXMwV1Y0PQ==', 'LOGIN', 'DEV'),
(26, 'YUVKYnZmdHd4Vjg3Z1o3dzVhYUo2QT09', 'czVHYWJOeGVBSjkyN0Qwazg2TEhPekt0MjE0UCtIalRhSzlUZDE0aWtsdDZFaVFrUmVMUGltMnVvbUluYmg1Y2VRWWtLOUVrbnp3SUlXcDVhNVVzUVE9PQ==', '2022-09-12 16:29:53', 'YWpRVE95SXN0VXZUMHkvb1pISXNqc2lnY0l6cXY3aUloYVBIazlTUi9UTEpQeGJDQlpRaE1odGtrNEtKZ3BpUmx0U0xDeFpyYUNnY1JsVHpyVThEbnUzU2xPT2hMQmZDZkZ3cURZdUgxblh3cFNSckZBTFRwRlNjMzNHaU9RUEFXRHR1V0Z6R2ZhTGgzWFVzc1lHeGE4UEl5UCtEaWhzYW5wZ3FkdHZhaVBSNTl1YXFyNVd4aU9PTndROTRJOEJobXVQcWVqTmxPdDhrVEFGYkdrZWFORVIxMTZIanYwQXZOZFRycU9NKy9IQk1GcHFadWoyZWlvemErR21GR21MNkJTNVZqbmpneWJoem14bmIyb0ZHUFlKNURzeENBTi9NWnc3K3Q4cUw1ZnBYSjZobk8wYlE0L0xZMndBTmE4aWdtMzBPTWtBck5uMGdjVDZkZzJaZzNpRHFUWGNwWmRhSkNjQ2Vpc0wyREVVaGUzR3FJZEJndXlHYzhwNHN6VGdMYUVHcTZka2lsdW15VENJSWJlSkZpTzNzaCtKTjVwOHVMNE9NazIrTXlJZ3lPRlRkQnpEdHdrQnlQckw0UTVpV21RL3U3NzlReWM5alhZU1cyQ0N2QnZvZnFMSmV5Vk1FSTBGYkhzeVFtbTh6VW1kWWJ3cEJva21QNmVwNkNnMkxaS1Z0a0kzazdZQXNJR2hPazFIbktoSGsxanBBcGJJNFZNRUsyeGtMMmNKeDJFMFlsd2tzdkk3b1luV3hzUlBmU0tIWDNKNkl0anZVTTZ6SkVHay8wQWZMeXFwb3VEOWVxRGZncDI3VVl4ZHA3OXJqUXBLTTF5OU9nZ3ZhZUthMUdxRUtMZy80MFFra1NnVnJ2ZFJIa0ZnempCTW9DRFB0V3FnVmw5UFhnUlBkVThNeXd6dGxyQjZtWVBTcWpwQmxndWlhWHN3bWg1ajFEVnkyYnozRjArWG9EK0FHaWhpUFNwUURWMVdWczZVPQ==', 'LOGIN', 'DEV'),
(27, 'U3JLUHhEVVV1dGU4OGhqMlFHOWk5dz09', 'czVHYWJOeGVBSjkyN0Qwazg2TEhPOGYzSkZldDZ1VEdXamxiSUpmcUhlV01hTHVXbEdLU0pYRE83SkUyT0dlNnQwSUtHN25TYy9SUFpwM0J5S25ER3c9PQ==', '2022-12-03 14:52:29', 'YWpRVE95SXN0VXZUMHkvb1pISXNqaFkzaGNyekYrTFM0TXZNb25qWEhwSGNFWkVlczNpa3Z1TlZaa0o2RlpoeUZJa1MzS1RQN1RqL2VoR2pIUVJObElldHZiM1dGMFZMZEFTSUN0dHNETldOTnZUc1BoU3doTnlEMkR3dUgybEcwSFJsemZJdHorbkZtck5XNjdFQk5QYzJoakxPSDlTa2RHZnVTNk5vRHYrODNZdGZzVlpJNmhrYnhTN3NXUkhhTE9RV2g3elhaZmUyTCt3YkpCNXpZNE05YTRCN0Z0cEJCYUxlcGRJZDljQUM2QkY0R3d3MnBld2ZxM1ZPZDE1ak5rOVlVL3JHUmNIbVRENEh4T3ZuSUtUUW1pMGlYY0pYcnVCOHVidVNqSXYrcWkxZG04QlR2d241cDF5UjF6Snc4K1BQcXN0R2VEVzcyU3kyQkRGRTF5VkhBbGZuMVVNT0R6aWY4TXh0SlMxSENvdXFvOXBKVFlCMGNmcnk0QWRiOGp0UHJzWjd1QWRLeFVrME5leFhJMmpmN2JTSFFlUXdVejhrMU9GMTk3YkVxUEF0SVlvRmdIb0w2Z2FsYWU5UVlCL0kwVjR1cGIzejdWQUo5Tk1rNWJPOGtVUHhqT1cva3VZN0hLMVp1ZGRVVkwxd2VGNHZRS3ZWekVvdVhqYXd5bTRwbXVtZHQ5dWE4U0Vrb3hGNG12ckFzbHNXMitmcytkWlRHbUZGRDFOcTNQTGpwcGQxb0xiL1A5aVcySmdqTjNwOTdDM2MwREdPVDdGQUxSeVI2WnBJcTNHTlMvZnJ4SUxWTC9qUVRCSTM2T2phUUkxcmlBVklWSk42eHY2SXdWaVBQRG1UYm5CQTQ3MzRzRDNQVFY2SjhUanRWUGRZZnVUV25oQ1FmWDc4WFU3d0FPRDVjaHNYTlQreUMxeFIydmlOeks2eVZ5aldqRnRMUEFNeEt3PT0=', 'LOGIN', 'DEV'),
(28, 'YUVKYnZmdHd4Vjg3Z1o3dzVhYUo2QT09', 'czVHYWJOeGVBSjkyN0Qwazg2TEhPekt0MjE0UCtIalRhSzlUZDE0aWtsdDZFaVFrUmVMUGltMnVvbUluYmg1Y2VRWWtLOUVrbnp3SUlXcDVhNVVzUVE9PQ==', '2022-12-03 14:52:34', 'YWpRVE95SXN0VXZUMHkvb1pISXNqaFkzaGNyekYrTFM0TXZNb25qWEhwRVBCajYrOWIwN1VyZWZKN1ZrZXp5cUNZWWxodDlCTEZEajhLUmhWcUhsanhJYjI0aXZiMVFYRVhnR1pET0E1d3c4eGh5dVdhTVNwOGRqa0dwSDZGemZhdkFwWXppVGx2R09jbmJSQ1UyRnZrU0hxOC9jSWlOQnVQM3kxSnpoakdoK3AvWFdYemxYcFpwcFhJbFhJZmV6QThSNTRKaThZMFJPQXJwUzZqaDRBd3NveEZPdEM1Y2cyZWxWY3lzN1pxQ2Z3emhrMGdZTTlWZ21GdW1yc29YaWVldWVWZFRudFA0dTN3S0txNCtzMU1yZTh2eDFMa2RHOGxpOVlhMEFodTNtb0ZESUlIL0FPc3YrZzlQbWQvSDZDS0ZqNlg2SWs3UERyWE10SktDT0ZRWUJEUVRONDRldzNRVENRREZBeWxQZ1R0WmZyT1JTd2RvTDl5NlJBOWpEWjI4RkhaRDBWY3RJbmFJLzViY1JzWnAxVEF0RHF1QXJLT2FpbVp2VnlCRjBZV1BzKzRYT2g1TlpXcjNxak1PMnV0bjhVNW1jYmppanZLZ3hraHp0MGhCb0pQSHRqemxSVWs1YjB0VlZ3YkladGJwbEdnOVpERElwQmhsbytJUEtleXhWbGRBSHllcERQUXZYa1JBSys2NWdtYWV5R3ZHQ1RyMkwxdDJSdlZPZEJMa0prSnpsb1ZDN0d0a2FvNXNqcnlmbXJHM1BuY1dCREsveUZ0dXFuSE02VURaS2dpU1hTOGdjNWRJd1NMUll5enNTcjJUVkpjTk4yRHFHSXJaUU0yMG45U1BNdThoQ0Mrczl5Z1A4ejJMc1ZueE1ZaUtOVEhLajl6MlBPS2szYk1xdHRJTlFNaFpRdnl6ckpCOTFhYlg4WWUwSnpZbmJMU1RGT3dkejNBPT0=', 'LOGIN', 'DEV');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `TasksId` int(100) NOT NULL,
  `TasksName` varchar(1000) NOT NULL,
  `TaskDueDate` varchar(100) NOT NULL,
  `TaskRelatedTo` varchar(100) NOT NULL,
  `TaskDescriptions` varchar(1000) NOT NULL,
  `TaskPriority` varchar(100) NOT NULL,
  `TaskCreatedAt` varchar(100) NOT NULL,
  `TaskUpdatedAt` varchar(100) NOT NULL,
  `TaskCreatedBy` varchar(100) NOT NULL,
  `TaskCreatedFor` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserId` int(100) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `UserEmailId` varchar(100) NOT NULL,
  `UserPhone` varchar(100) NOT NULL,
  `UserPassword` varchar(100) NOT NULL,
  `UserRoles` varchar(100) NOT NULL,
  `UserStatus` varchar(100) NOT NULL,
  `UserProfileImage` varchar(100) NOT NULL DEFAULT 'user.png',
  `UserCreatedAt` varchar(100) NOT NULL,
  `UserUpdatedAt` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserId`, `UserName`, `UserEmailId`, `UserPhone`, `UserPassword`, `UserRoles`, `UserStatus`, `UserProfileImage`, `UserCreatedAt`, `UserUpdatedAt`) VALUES
(1, 'Administrator', 'navix365@gmail.com', '9876543210', '9810', 'Admin', '1', 'Administrator_UID_1_Profile__06_Dec_2021_01_12_42.png', '1 October, 2021', '05 Feb, 2022'),
(3, 'Test User', 'gauravsinghigc@navix.in', '981076567556', '779444', 'Marketing', '1', 'user.png', '2022-06-01 18:29:54', '2022-09-10 10:17:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`BranchesId`);

--
-- Indexes for table `calls`
--
ALTER TABLE `calls`
  ADD PRIMARY KEY (`CallsId`);

--
-- Indexes for table `configs_rates`
--
ALTER TABLE `configs_rates`
  ADD PRIMARY KEY (`RateConfigId`);

--
-- Indexes for table `configurations`
--
ALTER TABLE `configurations`
  ADD PRIMARY KEY (`configurationsid`);

--
-- Indexes for table `config_invoices`
--
ALTER TABLE `config_invoices`
  ADD PRIMARY KEY (`ConfigInvoiceId`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`currenciesid`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`CustomerId`);

--
-- Indexes for table `customer_billing_address`
--
ALTER TABLE `customer_billing_address`
  ADD PRIMARY KEY (`CustomerBillingAddress`);

--
-- Indexes for table `customer_contact_person`
--
ALTER TABLE `customer_contact_person`
  ADD PRIMARY KEY (`CustomerContactPersons`);

--
-- Indexes for table `customer_shipping_address`
--
ALTER TABLE `customer_shipping_address`
  ADD PRIMARY KEY (`CustomerShippingAddress`);

--
-- Indexes for table `deals`
--
ALTER TABLE `deals`
  ADD PRIMARY KEY (`DealsId`);

--
-- Indexes for table `dealstages`
--
ALTER TABLE `dealstages`
  ADD PRIMARY KEY (`DealStageId`);

--
-- Indexes for table `deal_activities`
--
ALTER TABLE `deal_activities`
  ADD PRIMARY KEY (`deal_activity_id`);

--
-- Indexes for table `deal_products`
--
ALTER TABLE `deal_products`
  ADD PRIMARY KEY (`DealProductid`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`EventsId`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`invoicesid`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`PaymentId`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ProductId`);

--
-- Indexes for table `product_packages`
--
ALTER TABLE `product_packages`
  ADD PRIMARY KEY (`ProductPackageId`);

--
-- Indexes for table `product_specifications_groups`
--
ALTER TABLE `product_specifications_groups`
  ADD PRIMARY KEY (`product_specifications_id`);

--
-- Indexes for table `product_specification_categories`
--
ALTER TABLE `product_specification_categories`
  ADD PRIMARY KEY (`product_specification_category_id`);

--
-- Indexes for table `product_specification_values`
--
ALTER TABLE `product_specification_values`
  ADD PRIMARY KEY (`product_specification_value_id`);

--
-- Indexes for table `pro_brands`
--
ALTER TABLE `pro_brands`
  ADD PRIMARY KEY (`ProBrandId`);

--
-- Indexes for table `pro_categories`
--
ALTER TABLE `pro_categories`
  ADD PRIMARY KEY (`ProCategoriesId`);

--
-- Indexes for table `pro_images`
--
ALTER TABLE `pro_images`
  ADD PRIMARY KEY (`ProImagesId`);

--
-- Indexes for table `quotations`
--
ALTER TABLE `quotations`
  ADD PRIMARY KEY (`QuotationId`);

--
-- Indexes for table `quotation_products`
--
ALTER TABLE `quotation_products`
  ADD PRIMARY KEY (`QuotationProductsId`);

--
-- Indexes for table `systemlogs`
--
ALTER TABLE `systemlogs`
  ADD PRIMARY KEY (`LogsId`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`TasksId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `BranchesId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `calls`
--
ALTER TABLE `calls`
  MODIFY `CallsId` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `configs_rates`
--
ALTER TABLE `configs_rates`
  MODIFY `RateConfigId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `configurations`
--
ALTER TABLE `configurations`
  MODIFY `configurationsid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `config_invoices`
--
ALTER TABLE `config_invoices`
  MODIFY `ConfigInvoiceId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `currenciesid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `CustomerId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer_billing_address`
--
ALTER TABLE `customer_billing_address`
  MODIFY `CustomerBillingAddress` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `customer_contact_person`
--
ALTER TABLE `customer_contact_person`
  MODIFY `CustomerContactPersons` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `customer_shipping_address`
--
ALTER TABLE `customer_shipping_address`
  MODIFY `CustomerShippingAddress` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `deals`
--
ALTER TABLE `deals`
  MODIFY `DealsId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dealstages`
--
ALTER TABLE `dealstages`
  MODIFY `DealStageId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `deal_activities`
--
ALTER TABLE `deal_activities`
  MODIFY `deal_activity_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deal_products`
--
ALTER TABLE `deal_products`
  MODIFY `DealProductid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `EventsId` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `invoicesid` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `PaymentId` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ProductId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_packages`
--
ALTER TABLE `product_packages`
  MODIFY `ProductPackageId` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_specifications_groups`
--
ALTER TABLE `product_specifications_groups`
  MODIFY `product_specifications_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_specification_categories`
--
ALTER TABLE `product_specification_categories`
  MODIFY `product_specification_category_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_specification_values`
--
ALTER TABLE `product_specification_values`
  MODIFY `product_specification_value_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pro_brands`
--
ALTER TABLE `pro_brands`
  MODIFY `ProBrandId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pro_categories`
--
ALTER TABLE `pro_categories`
  MODIFY `ProCategoriesId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pro_images`
--
ALTER TABLE `pro_images`
  MODIFY `ProImagesId` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quotations`
--
ALTER TABLE `quotations`
  MODIFY `QuotationId` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quotation_products`
--
ALTER TABLE `quotation_products`
  MODIFY `QuotationProductsId` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `systemlogs`
--
ALTER TABLE `systemlogs`
  MODIFY `LogsId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `TasksId` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
