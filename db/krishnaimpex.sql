-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2022 at 12:14 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `krishnaimpex`
--

-- --------------------------------------------------------

--
-- Table structure for table `adcode`
--

CREATE TABLE `adcode` (
  `id` int(255) NOT NULL,
  `iec` bigint(10) NOT NULL,
  `branch` varchar(50) NOT NULL,
  `bankcode` bigint(14) NOT NULL,
  `acno` varchar(20) NOT NULL,
  `bankname` varchar(25) NOT NULL,
  `add1` varchar(25) NOT NULL,
  `add2` varchar(25) NOT NULL,
  `pincode` int(6) NOT NULL,
  `city` varchar(25) NOT NULL,
  `state` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adcode`
--

INSERT INTO `adcode` (`id`, `iec`, `branch`, `bankcode`, `acno`, `bankname`, `add1`, `add2`, `pincode`, `city`, `state`) VALUES
(1, 12345678, '01', 123456, '82388397971234', 'HDFC Bank', '122', 'Jubilee Circle', 370001, 'Bhuj', 'Gujarat'),
(2, 95748214, '02', 654321, '74157496857415', 'DCB BANK', '12,', 'Jubilee Circle', 370001, 'Bhuj', 'Gujarat');

-- --------------------------------------------------------

--
-- Table structure for table `ann1`
--

CREATE TABLE `ann1` (
  `jobno` int(255) NOT NULL,
  `sealtype` varchar(9) NOT NULL,
  `factorys` varchar(5) NOT NULL,
  `naturec` varchar(15) NOT NULL,
  `totalpac` bigint(255) NOT NULL,
  `loosepac` bigint(15) NOT NULL,
  `contano` bigint(255) NOT NULL,
  `grosswei` varchar(255) NOT NULL,
  `netwei` varchar(255) NOT NULL,
  `unit` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ann1`
--

INSERT INTO `ann1` (`jobno`, `sealtype`, `factorys`, `naturec`, `totalpac`, `loosepac`, `contano`, `grosswei`, `netwei`, `unit`) VALUES
(1, 'Warehouse', 'N', 'C Containerized', 100, 0, 1, '18000', '17000', 'KGS'),
(2, 'Warehouse', 'N', 'C Containerized', 100, 0, 1, '18000', '17500', 'KGS');

-- --------------------------------------------------------

--
-- Table structure for table `ann2`
--

CREATE TABLE `ann2` (
  `jobno` int(255) NOT NULL,
  `contno` varchar(11) NOT NULL,
  `size` int(50) NOT NULL,
  `type` varchar(5) NOT NULL,
  `sealno` varchar(20) NOT NULL,
  `sealdate` date NOT NULL,
  `sealindi` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ann2`
--

INSERT INTO `ann2` (`jobno`, `contno`, `size`, `type`, `sealno`, `sealdate`, `sealindi`) VALUES
(1, 'MSKU123456', 20, 'G', '234', '2022-03-24', 'RFID'),
(2, 'MSKU123456', 20, 'G', '12365', '2022-03-24', 'RFID');

-- --------------------------------------------------------

--
-- Table structure for table `ann3`
--

CREATE TABLE `ann3` (
  `jobno` int(255) NOT NULL,
  `grp` varchar(100) NOT NULL,
  `from1` varchar(100) NOT NULL,
  `to1` varchar(100) NOT NULL,
  `unit` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ann3`
--

INSERT INTO `ann3` (`jobno`, `grp`, `from1`, `to1`, `unit`) VALUES
(1, '1', '1', '100', 'BGS'),
(2, '1', '1', '100', 'BGS');

-- --------------------------------------------------------

--
-- Table structure for table `consignee`
--

CREATE TABLE `consignee` (
  `id` int(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `add1` varchar(25) NOT NULL,
  `city` varchar(50) NOT NULL,
  `email` varchar(25) NOT NULL,
  `country` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `consignee`
--

INSERT INTO `consignee` (`id`, `name`, `phone`, `add1`, `city`, `email`, `country`) VALUES
(1, 'Canada Impex', 12345, 'Famous Street', 'Toronto', 'canadaimpex@gmail.com', 'Canada');

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `id` int(255) NOT NULL,
  `currencyname` varchar(25) NOT NULL,
  `currencycode` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`id`, `currencyname`, `currencycode`) VALUES
(1, 'US Dollar', 'USD'),
(2, 'EUR', 'EURO'),
(3, 'USDT', 'USDT');

-- --------------------------------------------------------

--
-- Table structure for table `exchange`
--

CREATE TABLE `exchange` (
  `id` int(255) NOT NULL,
  `currencycode` varchar(25) NOT NULL,
  `unitinrs` double NOT NULL,
  `rate` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exchange`
--

INSERT INTO `exchange` (`id`, `currencycode`, `unitinrs`, `rate`) VALUES
(1, 'USD', 78, 70),
(2, 'EUR', 83, 80),
(4, 'Dollar', 78, 80);

-- --------------------------------------------------------

--
-- Table structure for table `exporter`
--

CREATE TABLE `exporter` (
  `id` int(255) NOT NULL,
  `iec` bigint(10) NOT NULL,
  `branch` varchar(50) NOT NULL,
  `gstn` varchar(15) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `add1` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `city` varchar(30) NOT NULL,
  `state` varchar(30) NOT NULL,
  `pincode` int(6) NOT NULL,
  `phone` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exporter`
--

INSERT INTO `exporter` (`id`, `iec`, `branch`, `gstn`, `company_name`, `add1`, `email`, `city`, `state`, `pincode`, `phone`) VALUES
(1, 12345678, '02', '12ABCDW54785212', 'Bharat Export', 'RTO Relocation', 'bharat@gmail.com', 'Bhuj', 'Gujarat', 370001, 9898514560),
(2, 95748214, '02', '74AWERF94721485', 'Vikas Impex', '38, Mirjapar Road', 'vikas007@gmail.com', 'Bhuj', 'Gujarat', 370001, 8474585967),
(3, 74968125, '01', '22QRCVO74258105', 'Ambika Impex', '06, New Station Road', 'ambika371@gmail.com', 'Bhuj', 'Gujarat', 370001, 8471458789),
(22, 12365498, '12', 'AWREQ1234565498', 'ABC', 'asd1', 'abc@gmail.com', 'asd', 'ads', 121212, 1234567890);

-- --------------------------------------------------------

--
-- Table structure for table `igm1`
--

CREATE TABLE `igm1` (
  `jobno` bigint(255) NOT NULL,
  `igmno` varchar(30) NOT NULL,
  `igmdate` date NOT NULL,
  `mblno` varchar(30) NOT NULL,
  `mbldate` date NOT NULL,
  `hblno` varchar(30) NOT NULL,
  `hbldate` date NOT NULL,
  `totalpac` varchar(255) NOT NULL,
  `packcode` varchar(50) NOT NULL,
  `grossweight` varchar(255) NOT NULL,
  `unit` varchar(50) NOT NULL,
  `marksnos` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `igm1`
--

INSERT INTO `igm1` (`jobno`, `igmno`, `igmdate`, `mblno`, `mbldate`, `hblno`, `hbldate`, `totalpac`, `packcode`, `grossweight`, `unit`, `marksnos`) VALUES
(1, '12345678', '2022-03-22', '32165498', '2022-03-22', '12378965', '2022-03-22', '1000', 'BGS', '18000', 'KGS', 'As per Inv.');

-- --------------------------------------------------------

--
-- Table structure for table `igm2`
--

CREATE TABLE `igm2` (
  `jobno` bigint(255) NOT NULL,
  `igmvalue` bigint(15) NOT NULL,
  `igmc` varchar(10) NOT NULL,
  `freight` bigint(15) NOT NULL,
  `frec` varchar(10) NOT NULL,
  `insuar` bigint(15) NOT NULL,
  `insuarc` varchar(10) NOT NULL,
  `totalv` bigint(15) NOT NULL,
  `totalc` varchar(15) NOT NULL,
  `contno` varchar(11) NOT NULL,
  `sealno` varchar(20) NOT NULL,
  `fl` varchar(10) NOT NULL,
  `type` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `igm2`
--

INSERT INTO `igm2` (`jobno`, `igmvalue`, `igmc`, `freight`, `frec`, `insuar`, `insuarc`, `totalv`, `totalc`, `contno`, `sealno`, `fl`, `type`) VALUES
(1, 50000, 'USD', 0, 'USD', 0, 'USD', 0, 'USD', 'MSCU123456', '41785', 'FCL', '20');

-- --------------------------------------------------------

--
-- Table structure for table `igm3`
--

CREATE TABLE `igm3` (
  `jobno` bigint(255) NOT NULL,
  `invno` varchar(25) NOT NULL,
  `invdate` date NOT NULL,
  `naturet` varchar(50) NOT NULL,
  `currency` varchar(20) NOT NULL,
  `exrate` varchar(20) NOT NULL,
  `invvalue` bigint(15) NOT NULL,
  `terms` varchar(15) NOT NULL,
  `conditionatt` varchar(50) NOT NULL,
  `valuemethod` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `igm3`
--

INSERT INTO `igm3` (`jobno`, `invno`, `invdate`, `naturet`, `currency`, `exrate`, `invvalue`, `terms`, `conditionatt`, `valuemethod`) VALUES
(1, 'AD01', '2022-03-22', 'M Manafacture', 'USD', '70', 50000, 'FOB', 'As Per Packing List', 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `igm4`
--

CREATE TABLE `igm4` (
  `jobno` bigint(255) NOT NULL,
  `ritccode` int(8) NOT NULL,
  `productname` varchar(25) NOT NULL,
  `currency` varchar(25) NOT NULL,
  `unit` varchar(25) NOT NULL,
  `rate` varchar(25) NOT NULL,
  `per` int(25) NOT NULL,
  `qty` bigint(100) NOT NULL,
  `totalv` bigint(100) NOT NULL,
  `enduse` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `igm4`
--

INSERT INTO `igm4` (`jobno`, `ritccode`, `productname`, `currency`, `unit`, `rate`, `per`, `qty`, `totalv`, `enduse`) VALUES
(1, 31013105, 'Fertilisers', 'US Dollar', 'KGS', '70', 1, 5000, 50000, '-GNX 200 FOr Manufacturer/Actual use');

-- --------------------------------------------------------

--
-- Table structure for table `impnewdoc1`
--

CREATE TABLE `impnewdoc1` (
  `jobno` bigint(255) NOT NULL,
  `fileref` varchar(20) NOT NULL,
  `docdate` date NOT NULL,
  `ieccode` int(10) NOT NULL,
  `branchh` varchar(20) NOT NULL,
  `adcode` int(14) NOT NULL,
  `gstnno` varchar(15) NOT NULL,
  `importer` varchar(100) NOT NULL,
  `iadd1` varchar(100) NOT NULL,
  `icity` varchar(50) NOT NULL,
  `istate` varchar(50) NOT NULL,
  `supplier` varchar(100) NOT NULL,
  `sadd1` varchar(100) NOT NULL,
  `scity` varchar(50) NOT NULL,
  `scountry` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `impnewdoc1`
--

INSERT INTO `impnewdoc1` (`jobno`, `fileref`, `docdate`, `ieccode`, `branchh`, `adcode`, `gstnno`, `importer`, `iadd1`, `icity`, `istate`, `supplier`, `sadd1`, `scity`, `scountry`) VALUES
(1, '01', '2022-03-22', 98765412, '01', 123456, 'asd45', 'ads import', '14 gokuldham', 'bhuj', 'gujarat', 'Abc', '12 street', 'torronto', 'canada');

-- --------------------------------------------------------

--
-- Table structure for table `impnewdoc2`
--

CREATE TABLE `impnewdoc2` (
  `jobno` bigint(255) NOT NULL,
  `disportname` varchar(50) NOT NULL,
  `disportcode` varchar(50) NOT NULL,
  `loadport` varchar(50) NOT NULL,
  `loadcountry` varchar(50) NOT NULL,
  `hwx` varchar(5) NOT NULL,
  `gp` varchar(5) NOT NULL,
  `npa` varchar(5) NOT NULL,
  `greenchannel` varchar(5) NOT NULL,
  `firstcheck` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `impnewdoc2`
--

INSERT INTO `impnewdoc2` (`jobno`, `disportname`, `disportcode`, `loadport`, `loadcountry`, `hwx`, `gp`, `npa`, `greenchannel`, `firstcheck`) VALUES
(1, 'Mundra', 'INMUN1', 'Torronto', 'canada', 'W', 'P', 'N', 'N', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `importer`
--

CREATE TABLE `importer` (
  `id` int(255) NOT NULL,
  `iec` bigint(10) NOT NULL,
  `branch` varchar(50) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `add1` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `state` varchar(30) NOT NULL,
  `pincode` int(6) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `gstn` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `importer`
--

INSERT INTO `importer` (`id`, `iec`, `branch`, `company_name`, `add1`, `city`, `state`, `pincode`, `phone`, `gstn`, `email`) VALUES
(1, 98765412, '03', 'ads import', '14 gokuldham', 'bhuj', 'gujarat', 370001, '8238897979', 'asd45', 'aer@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `irtccode`
--

CREATE TABLE `irtccode` (
  `id` int(255) NOT NULL,
  `irtccode` int(8) NOT NULL,
  `name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `irtccode`
--

INSERT INTO `irtccode` (`id`, `irtccode`, `name`) VALUES
(1, 31013105, 'Fertilisers');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`) VALUES
('logisticwebsite21@gmail.com', '$2y$10$Raw2p26hoNAqYrBoGycTQ.MTWw2oe5I11QcjwSDwIyhXIaq4jxSMG');

-- --------------------------------------------------------

--
-- Table structure for table `newdoc1`
--

CREATE TABLE `newdoc1` (
  `jobno` bigint(255) NOT NULL,
  `fileref` varchar(20) NOT NULL,
  `docdate` date NOT NULL,
  `ieccode` int(10) NOT NULL,
  `branchh` varchar(20) NOT NULL,
  `adcode` int(14) NOT NULL,
  `gstnno` varchar(15) NOT NULL,
  `exporter` varchar(100) NOT NULL,
  `eadd1` varchar(100) NOT NULL,
  `ecity` varchar(50) NOT NULL,
  `estate` varchar(50) NOT NULL,
  `importer` varchar(100) NOT NULL,
  `iadd1` varchar(100) NOT NULL,
  `icity` varchar(50) NOT NULL,
  `icountry` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `newdoc1`
--

INSERT INTO `newdoc1` (`jobno`, `fileref`, `docdate`, `ieccode`, `branchh`, `adcode`, `gstnno`, `exporter`, `eadd1`, `ecity`, `estate`, `importer`, `iadd1`, `icity`, `icountry`) VALUES
(1, '01', '2022-03-21', 95748214, '02', 654321, '74AWERF94721485', 'Vikas Impex', '38, Mirjapar Road', 'Bhuj', 'Gujarat', 'Canada Impex', 'Famous Street', 'Toronto', 'Canada'),
(2, '02', '2022-03-24', 74968125, '01', 123456, '12ABCDW54785212', 'Bharat Export', 'RTO Relocation', 'Bhuj', 'Gujarat', 'Canada Impex', 'Famous Street', 'Toronto', 'Canada');

-- --------------------------------------------------------

--
-- Table structure for table `newdoc2`
--

CREATE TABLE `newdoc2` (
  `jobno` bigint(255) NOT NULL,
  `etype` varchar(15) NOT NULL,
  `mm` varchar(15) NOT NULL,
  `loadport` varchar(50) NOT NULL,
  `disport` varchar(50) NOT NULL,
  `finalport` varchar(50) NOT NULL,
  `finalcon` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `newdoc2`
--

INSERT INTO `newdoc2` (`jobno`, `etype`, `mm`, `loadport`, `disport`, `finalport`, `finalcon`, `description`) VALUES
(1, 'Private', 'Manufacture', 'Mundra', 'Torronto', 'Torronto', 'Canada', 'as per invoice'),
(2, 'Private', 'Manufacture', 'Mundra', 'Torronto', 'Torronto', 'Canada', 'AS PER INVOICE');

-- --------------------------------------------------------

--
-- Table structure for table `newdoc3`
--

CREATE TABLE `newdoc3` (
  `jobno` bigint(255) NOT NULL,
  `invno` varchar(25) NOT NULL,
  `invdate` date NOT NULL,
  `invcur` varchar(15) NOT NULL,
  `exrate` int(10) NOT NULL,
  `payment` varchar(10) NOT NULL,
  `periodof` varchar(10) NOT NULL,
  `contract` varchar(10) NOT NULL,
  `invvalue` bigint(15) NOT NULL,
  `invc` varchar(10) NOT NULL,
  `freight` bigint(15) NOT NULL,
  `frec` varchar(10) NOT NULL,
  `insuar` bigint(15) NOT NULL,
  `insuarc` varchar(10) NOT NULL,
  `totalv` bigint(15) NOT NULL,
  `totalc` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `newdoc3`
--

INSERT INTO `newdoc3` (`jobno`, `invno`, `invdate`, `invcur`, `exrate`, `payment`, `periodof`, `contract`, `invvalue`, `invc`, `freight`, `frec`, `insuar`, `insuarc`, `totalv`, `totalc`) VALUES
(1, '01', '2022-03-24', 'US Dollar', 70, 'LC', '90', 'FOB', 5000, 'USD', 0, 'USD', 0, 'USD', 5000, 'USD'),
(2, 'A02', '2022-03-24', 'US Dollar', 70, 'LC', '90', 'FOB', 1000, 'USD', 0, 'USD', 0, 'USD', 0, 'USD');

-- --------------------------------------------------------

--
-- Table structure for table `newdoc4`
--

CREATE TABLE `newdoc4` (
  `jobno` bigint(255) NOT NULL,
  `scode` varchar(255) NOT NULL,
  `ritccode` bigint(10) NOT NULL,
  `proname` varchar(25) NOT NULL,
  `unit` varchar(15) NOT NULL,
  `rate` bigint(100) NOT NULL,
  `per` bigint(150) NOT NULL,
  `qty` bigint(150) NOT NULL,
  `totalval` bigint(150) NOT NULL,
  `enduse` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `newdoc4`
--

INSERT INTO `newdoc4` (`jobno`, `scode`, `ritccode`, `proname`, `unit`, `rate`, `per`, `qty`, `totalval`, `enduse`) VALUES
(1, 'OO--Free Shipping Bill', 31013105, 'Fertilisers', 'Bags', 70, 1, 100, 5000, '-GNX 200 FOr Manufacturer/Actual use'),
(2, 'OO--Free Shipping Bill', 31013105, 'Fertilisers', 'KGS', 70, 1, 1000, 1000, '-GNX 200 FOr Manufacturer/Actual use');

-- --------------------------------------------------------

--
-- Table structure for table `port`
--

CREATE TABLE `port` (
  `id` int(255) NOT NULL,
  `portname` varchar(20) NOT NULL,
  `portcode` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `port`
--

INSERT INTO `port` (`id`, `portname`, `portcode`) VALUES
(1, 'Mundra', 'INMUN1'),
(2, 'Torronto', 'CATOR'),
(5, 'Kandla', 'KAN05');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(255) NOT NULL,
  `name` varchar(30) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `add1` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `country` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `name`, `phone`, `add1`, `city`, `email`, `country`) VALUES
(1, 'Abc', 98745, '12 street', 'torronto', 'tr@gmail.com', 'canada');

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `id` int(255) NOT NULL,
  `unit` varchar(25) NOT NULL,
  `unitcode` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`id`, `unit`, `unitcode`) VALUES
(1, 'Bags', 'BGS'),
(2, 'KGS', 'KGS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adcode`
--
ALTER TABLE `adcode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `consignee`
--
ALTER TABLE `consignee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exchange`
--
ALTER TABLE `exchange`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exporter`
--
ALTER TABLE `exporter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `igm1`
--
ALTER TABLE `igm1`
  ADD PRIMARY KEY (`jobno`);

--
-- Indexes for table `igm2`
--
ALTER TABLE `igm2`
  ADD PRIMARY KEY (`jobno`);

--
-- Indexes for table `igm3`
--
ALTER TABLE `igm3`
  ADD PRIMARY KEY (`jobno`);

--
-- Indexes for table `igm4`
--
ALTER TABLE `igm4`
  ADD PRIMARY KEY (`jobno`);

--
-- Indexes for table `impnewdoc1`
--
ALTER TABLE `impnewdoc1`
  ADD PRIMARY KEY (`jobno`);

--
-- Indexes for table `impnewdoc2`
--
ALTER TABLE `impnewdoc2`
  ADD PRIMARY KEY (`jobno`);

--
-- Indexes for table `importer`
--
ALTER TABLE `importer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `irtccode`
--
ALTER TABLE `irtccode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newdoc1`
--
ALTER TABLE `newdoc1`
  ADD PRIMARY KEY (`jobno`);

--
-- Indexes for table `newdoc2`
--
ALTER TABLE `newdoc2`
  ADD PRIMARY KEY (`jobno`);

--
-- Indexes for table `newdoc3`
--
ALTER TABLE `newdoc3`
  ADD PRIMARY KEY (`jobno`);

--
-- Indexes for table `newdoc4`
--
ALTER TABLE `newdoc4`
  ADD PRIMARY KEY (`jobno`);

--
-- Indexes for table `port`
--
ALTER TABLE `port`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adcode`
--
ALTER TABLE `adcode`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `consignee`
--
ALTER TABLE `consignee`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `exchange`
--
ALTER TABLE `exchange`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `exporter`
--
ALTER TABLE `exporter`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `igm1`
--
ALTER TABLE `igm1`
  MODIFY `jobno` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `igm2`
--
ALTER TABLE `igm2`
  MODIFY `jobno` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `igm3`
--
ALTER TABLE `igm3`
  MODIFY `jobno` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `igm4`
--
ALTER TABLE `igm4`
  MODIFY `jobno` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `impnewdoc1`
--
ALTER TABLE `impnewdoc1`
  MODIFY `jobno` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `impnewdoc2`
--
ALTER TABLE `impnewdoc2`
  MODIFY `jobno` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `importer`
--
ALTER TABLE `importer`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `irtccode`
--
ALTER TABLE `irtccode`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `newdoc1`
--
ALTER TABLE `newdoc1`
  MODIFY `jobno` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `newdoc2`
--
ALTER TABLE `newdoc2`
  MODIFY `jobno` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `newdoc3`
--
ALTER TABLE `newdoc3`
  MODIFY `jobno` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `newdoc4`
--
ALTER TABLE `newdoc4`
  MODIFY `jobno` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `port`
--
ALTER TABLE `port`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
