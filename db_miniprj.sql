-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2022 at 01:20 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_miniprj`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_password` varchar(50) NOT NULL,
  `admin_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_email`, `admin_password`, `admin_name`) VALUES
(1, 'mechfinder@gmail.com', '9633867457', 'Mech Finder');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking`
--

CREATE TABLE `tbl_booking` (
  `booking_id` int(11) NOT NULL,
  `booking_date` date NOT NULL,
  `booking_status` int(11) NOT NULL DEFAULT 0,
  `booking_amount` int(11) NOT NULL,
  `mechanic_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_booking`
--

INSERT INTO `tbl_booking` (`booking_id`, `booking_date`, `booking_status`, `booking_amount`, `mechanic_id`) VALUES
(18, '2022-11-11', 2, 122760, 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`brand_id`, `brand_name`) VALUES
(1, 'Bosch'),
(2, 'Motul'),
(3, 'Castrol'),
(4, 'Gulf Oil'),
(5, 'Servo'),
(6, 'Mobil'),
(7, 'Shell'),
(8, 'Valvoline'),
(9, 'Amaron'),
(10, 'Exide'),
(11, 'SF Sonic'),
(12, 'Prestone');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cart_id` int(11) NOT NULL,
  `cart_qty` int(11) NOT NULL DEFAULT 1,
  `cart_status` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`cart_id`, `cart_qty`, `cart_status`, `product_id`, `booking_id`) VALUES
(81, 34, 1, 3, 18),
(82, 116, 1, 4, 18),
(83, 35, 1, 6, 18);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`) VALUES
(9, 'BODY PARTS'),
(10, 'BRAKE SYSTEM'),
(11, 'OIL & FLUIDS'),
(12, 'CLUTCH SYSTEM'),
(13, 'ENGINE PARTS'),
(14, 'STEERING'),
(15, 'WHEELS & TYPE'),
(16, 'TRANSMISSION'),
(17, 'FILTERS'),
(18, 'CAR ACCESSORIES'),
(19, 'BIKE ACCESSORIES'),
(20, 'FUEL SYSTEM');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complaint`
--

CREATE TABLE `tbl_complaint` (
  `complaint_id` int(11) NOT NULL,
  `complainttype_id` int(11) NOT NULL,
  `complaint_content` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `workshop_id` int(11) NOT NULL DEFAULT 0,
  `complaint_status` varchar(50) NOT NULL DEFAULT '0',
  `complaint_reply` varchar(50) NOT NULL DEFAULT 'Not Yet Replyed',
  `complaint_date` date NOT NULL,
  `shop_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_complaint`
--

INSERT INTO `tbl_complaint` (`complaint_id`, `complainttype_id`, `complaint_content`, `user_id`, `workshop_id`, `complaint_status`, `complaint_reply`, `complaint_date`, `shop_id`) VALUES
(2, 1, 'not working', 0, 0, '0', 'Not Yet Replyed', '2022-10-28', 1),
(3, 2, 'regterdsg', 0, 0, '0', 'Not Yet Replyed', '2022-10-28', 1),
(4, 1, 'grdg', 0, 0, '0', 'Not Yet Replyed', '2022-10-28', 1),
(5, 3, 'not reach', 2, 0, '1', 'we are looking', '2022-11-04', 0),
(6, 3, 'fgddf', 1, 0, '0', 'Not Yet Replyed', '2022-11-09', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complainttype`
--

CREATE TABLE `tbl_complainttype` (
  `complainttype_id` int(11) NOT NULL,
  `complainttype_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_complainttype`
--

INSERT INTO `tbl_complainttype` (`complainttype_id`, `complainttype_name`) VALUES
(1, 'manu'),
(3, 'network');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

CREATE TABLE `tbl_district` (
  `district_id` int(11) NOT NULL,
  `district_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_district`
--

INSERT INTO `tbl_district` (`district_id`, `district_name`) VALUES
(24, 'Thiruvananthapuram'),
(25, 'Kollam'),
(26, 'Pathanamthitta'),
(27, 'Alappuzha'),
(28, 'Kottayam'),
(29, 'Idukki'),
(30, 'Ernakulam'),
(31, 'Thrissur'),
(32, 'Palakkad'),
(33, 'Malapuram'),
(34, 'Kozhikode'),
(35, 'Wayanad'),
(36, 'Kannur'),
(37, 'Kasargod');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_location`
--

CREATE TABLE `tbl_location` (
  `location_id` int(11) NOT NULL,
  `location_name` varchar(30) NOT NULL,
  `place_id` int(11) NOT NULL,
  `location_langitude` varchar(50) NOT NULL,
  `location_latitude` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_location`
--

INSERT INTO `tbl_location` (`location_id`, `location_name`, `place_id`, `location_langitude`, `location_latitude`) VALUES
(1, 'vazhapilly', 102, '', ''),
(2, 'Pezhakkapilly', 23, '', ''),
(3, 'Kuttipilly', 27, '', ''),
(4, 'Allapra', 28, '', ''),
(5, 'Kilikulam', 27, '', ''),
(6, 'Kandanthara', 28, '', ''),
(7, 'Kummanode', 17, '', ''),
(8, 'Chengara', 17, '', ''),
(9, 'Ashokapuram', 62, '', ''),
(10, 'Choondy', 62, '', ''),
(11, 'Manjapra', 63, '', ''),
(12, 'Kavaraparambu', 63, '', ''),
(13, 'Thoppumpady', 64, '', ''),
(14, 'Palluruthy', 64, '', ''),
(15, 'Vathuruthy', 64, '', ''),
(16, 'Fort Kochi', 64, '', ''),
(17, 'Nellikuzhy', 65, '', ''),
(18, 'Nellimattom', 65, '', ''),
(19, 'Chelad', 65, '', ''),
(20, 'Thuruthiply', 66, '', ''),
(21, 'Vattakattupady', 28, '', ''),
(22, 'Kuttipadam', 66, '', ''),
(23, 'Kizhakkupuram', 32, '', ''),
(24, 'Kulathummal', 33, '', ''),
(25, 'Puthiyakavu', 34, '', ''),
(26, 'Melamcode', 35, '', ''),
(27, 'Cherukunnam', 36, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mechanic`
--

CREATE TABLE `tbl_mechanic` (
  `mechanic_id` int(11) NOT NULL,
  `mechanic_name` varchar(30) NOT NULL,
  `mechanic_contact` varchar(10) NOT NULL,
  `mechanic_email` varchar(50) NOT NULL,
  `mechanic_address` varchar(100) NOT NULL,
  `mechanic_photo` varchar(20) NOT NULL,
  `workshop_id` int(11) NOT NULL,
  `mechanic_password` varchar(30) NOT NULL,
  `mechanic_doj` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_mechanic`
--

INSERT INTO `tbl_mechanic` (`mechanic_id`, `mechanic_name`, `mechanic_contact`, `mechanic_email`, `mechanic_address`, `mechanic_photo`, `workshop_id`, `mechanic_password`, `mechanic_doj`) VALUES
(1, 'Soman P', '9947652340', 'sp@gmail.com', 'Panayanchery (H),Choondy', 'images (18).jpeg', 1, '999', '2022-09-10'),
(2, 'Prabhakaran', '8765924106', 'prabha@gmail.com', 'Pattiparambil (H),Choondy', 'IMG_20220804_095719.', 1, '888', '2022-09-10'),
(3, 'Mani K', '9857451254', 'mk@gmail.com', 'Parambil (H),Manjapra', 'images (21).jpeg', 2, '777', '2022-09-10'),
(4, 'Manoj M', '9856745895', 'mm@gmail.com', 'Madaparambil (H),Manjapra', 'images (3).png', 2, '888', '2022-09-10'),
(5, 'Alexander K', '9541028745', 'ak@gmail.com', 'Pilappilly (H),Manjapra', 'images (3).png', 2, '999', '2022-09-10'),
(6, 'Gopinathan K V', '8765456789', 'gopi@gmail.com', 'vazhathottathil (H) Pattimattom', 'download14.png', 3, '123456789', '2022-11-11');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_place`
--

CREATE TABLE `tbl_place` (
  `place_id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  `place_name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_place`
--

INSERT INTO `tbl_place` (`place_id`, `district_id`, `place_name`) VALUES
(32, 24, 'Attingal'),
(33, 24, 'Kattakada'),
(34, 24, 'Kilimanoor'),
(35, 24, 'Nedumangad'),
(36, 24, 'Varkala'),
(37, 25, 'Ayoor'),
(38, 25, 'Chathannoor'),
(39, 25, 'Karunagappalli'),
(40, 25, 'Kottarakkara'),
(41, 25, 'Punalur'),
(42, 26, 'Ambalappuzha'),
(43, 26, 'Arookutty'),
(44, 26, 'Cherthala'),
(45, 26, 'Haripad'),
(46, 26, 'Kayamkulam'),
(47, 27, 'Adoor'),
(48, 27, 'Konni'),
(49, 27, 'Pandalam'),
(50, 27, 'Ranni'),
(51, 27, 'Thiruvalla'),
(52, 28, 'Erattupetta'),
(53, 28, 'Ettumanoor'),
(54, 28, 'Pala'),
(55, 28, 'Pampady'),
(56, 28, 'Vaikom'),
(57, 29, 'Adimali'),
(58, 29, 'Cheruthoni'),
(59, 29, 'Kattapana'),
(60, 29, 'Kumily'),
(61, 29, 'Painavu'),
(62, 30, 'Aluva'),
(63, 30, 'Angamaly'),
(64, 30, 'Kochi'),
(65, 30, 'Kothamangalam'),
(66, 30, 'Allapra'),
(67, 31, 'Annamanada'),
(68, 31, 'Chalakudy'),
(69, 31, 'Guruvayur'),
(70, 31, 'Iringalakuda'),
(71, 31, 'Koratty'),
(72, 32, 'Manissery'),
(73, 32, 'Mannarkkad'),
(74, 32, 'Pattambi'),
(75, 32, 'Shoranur'),
(76, 32, 'Vadakkanchery'),
(77, 33, 'Chungathara'),
(78, 33, 'Edakkara'),
(79, 33, 'Kadampuzha'),
(80, 33, 'Kottakal'),
(81, 33, 'Nilambur'),
(82, 34, 'Kinassery'),
(83, 34, 'Koyilandy'),
(84, 34, 'Perambra'),
(85, 34, 'Thamarassery'),
(86, 34, 'Vatakara'),
(87, 35, 'Kalpetta'),
(88, 35, 'Mananthavady'),
(89, 35, 'Sulthan Batheri'),
(90, 35, 'Pulpally'),
(91, 35, 'Meenangadi'),
(92, 36, 'Azhikode'),
(93, 36, 'Iritty'),
(94, 36, 'Kadachira'),
(95, 36, 'Payyanur'),
(96, 36, 'Thalassery'),
(97, 37, 'Cheruvathur'),
(98, 37, 'Kanhangad'),
(99, 37, 'Manjeshwar'),
(100, 37, 'Puthur'),
(101, 37, 'Uppala'),
(102, 30, 'Muvattupuzha'),
(103, 30, 'Pattimattom');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_details` varchar(50) NOT NULL,
  `product_photo` varchar(50) NOT NULL,
  `product_price` varchar(20) NOT NULL,
  `shop_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_name`, `product_details`, `product_photo`, `product_price`, `shop_id`, `subcategory_id`, `type_id`, `brand_id`) VALUES
(1, 'Super 1000', '15W', 'images.jpg', '1200', 1, 7, 1, 6),
(2, '4T Plus', '20W40', 'download.jpg', '500', 1, 7, 2, 2),
(3, 'Super 1000', '15W', 'images.jpg', '1300', 2, 7, 1, 6),
(4, '4T Plus', '20W40', 'download.jpg', '600', 2, 7, 2, 2),
(5, 'Magnatec', '5W-30', 'download (2).jpg', '3460', 2, 7, 1, 3),
(6, 'Dot 3', '12 FL 0Z(1 QT)46mL', 'download (2).jpg', '256', 2, 7, 4, 12);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_request`
--

CREATE TABLE `tbl_request` (
  `request_id` int(11) NOT NULL,
  `workshop_id` int(11) NOT NULL,
  `request_details` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `request_date` date NOT NULL,
  `request_status` varchar(20) NOT NULL DEFAULT '0',
  `payment_status` varchar(20) NOT NULL DEFAULT '0',
  `mechanic_id` int(11) NOT NULL,
  `request_bill` varchar(100) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_request`
--

INSERT INTO `tbl_request` (`request_id`, `workshop_id`, `request_details`, `user_id`, `request_date`, `request_status`, `payment_status`, `mechanic_id`, `request_bill`) VALUES
(1, 1, 'Engine Damaged', 1, '2022-09-10', '5', '0', 1, '360_F_259920605_ycPNoVA9HqnNDnAFLDuHms7sVyzQXD3L.jpg'),
(2, 1, 'Break down\r\n', 1, '2022-09-10', '6', '0', 2, 'db_miniprj.sql'),
(3, 1, 'vandi engine out completly', 3, '2022-09-13', '5', '0', 1, '360_F_259920605_ycPNoVA9HqnNDnAFLDuHms7sVyzQXD3L.jpg'),
(4, 1, 'gfgsdf', 4, '2022-09-16', '0', '0', 0, ''),
(5, 1, 'tyre punchure', 4, '2022-10-07', '5', '0', 1, '360_F_259920605_ycPNoVA9HqnNDnAFLDuHms7sVyzQXD3L.jpg'),
(6, 5, 'tyre punchure', 4, '2022-10-07', '0', '0', 0, ''),
(7, 2, 'Oil Leakage', 4, '2022-10-11', '5', '0', 3, 'download.jpg'),
(8, 2, 'hello help', 1, '2022-10-11', '6', '0', 3, 'download.jpg'),
(9, 2, 'on road assistance', 2, '2022-10-11', '4', '0', 4, ''),
(10, 1, 'fesres', 2, '2022-10-18', '5', '0', 1, '360_F_259920605_ycPNoVA9HqnNDnAFLDuHms7sVyzQXD3L.jpg'),
(11, 3, 'my car break down', 2, '2022-11-10', '0', '0', 0, ''),
(12, 3, 'my car battery down', 4, '2022-11-11', '4', '0', 6, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shop`
--

CREATE TABLE `tbl_shop` (
  `shop_id` int(11) NOT NULL,
  `shop_name` varchar(50) NOT NULL,
  `shop_contact` varchar(10) NOT NULL,
  `shop_email` varchar(50) NOT NULL,
  `shop_address` varchar(50) NOT NULL,
  `shop_logo` varchar(50) NOT NULL,
  `shop_proof` varchar(50) NOT NULL,
  `shop_password` varchar(40) NOT NULL,
  `shop_doj` date NOT NULL,
  `shop_location` int(11) NOT NULL,
  `shop_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_shop`
--

INSERT INTO `tbl_shop` (`shop_id`, `shop_name`, `shop_contact`, `shop_email`, `shop_address`, `shop_logo`, `shop_proof`, `shop_password`, `shop_doj`, `shop_location`, `shop_status`) VALUES
(1, 'C4 Car Accessories', '9845325678', 'c4@gmail.com', 'C4 Car Accessories Choondy Aluva', 'IMG_20220804_095805.jpg', 'download.jpeg', '1111', '2022-09-10', 10, 1),
(2, 'Taj Automobiles', '9865347524', 'taj@gmail.com', 'Taj Automobiles Manjapra Angamaly', 'images (13).jpeg', 'images (3).png', '2222', '2022-09-10', 11, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stock`
--

CREATE TABLE `tbl_stock` (
  `stock_id` int(11) NOT NULL,
  `stock_date` date NOT NULL,
  `stock_qty` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_stock`
--

INSERT INTO `tbl_stock` (`stock_id`, `stock_date`, `stock_qty`, `product_id`) VALUES
(1, '2022-09-10', 18, 1),
(2, '2022-09-10', 56, 2),
(3, '2022-09-10', 34, 3),
(4, '2022-09-10', 60, 4),
(5, '2022-09-13', 56, 4),
(7, '2022-09-13', 10, 5),
(8, '2022-09-16', 35, 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subcategory`
--

CREATE TABLE `tbl_subcategory` (
  `subcategory_id` int(11) NOT NULL,
  `subcategory_name` varchar(50) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_subcategory`
--

INSERT INTO `tbl_subcategory` (`subcategory_id`, `subcategory_name`, `category_id`) VALUES
(5, 'Engine Oil', 11),
(6, 'Coolant', 11),
(7, 'Brake Fluid', 11),
(8, 'Transmission Oil', 11),
(9, 'Steering Oil', 11),
(10, 'Oil Filter', 17),
(11, 'Air Filter', 17),
(12, 'Cabin Filter', 17),
(13, 'Fuel Filter', 17),
(14, 'Fuel Pump Filter', 17);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_type`
--

CREATE TABLE `tbl_type` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_type`
--

INSERT INTO `tbl_type` (`type_id`, `type_name`) VALUES
(1, 'Car'),
(2, 'Bike'),
(3, 'Heavy'),
(4, 'All');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `user_contact` varchar(10) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_gender` varchar(10) NOT NULL,
  `user_address` varchar(100) NOT NULL,
  `user_dob` date NOT NULL,
  `place_id` int(11) NOT NULL,
  `user_photo` varchar(30) NOT NULL,
  `user_password` varchar(20) NOT NULL,
  `user_doj` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `user_contact`, `user_email`, `user_gender`, `user_address`, `user_dob`, `place_id`, `user_photo`, `user_password`, `user_doj`) VALUES
(1, 'David Paul', '9854235687', 'davidp@gmail.com', 'Male', 'Madathiparambil (H),Aluva', '1993-04-01', 62, 'images (20).jpeg', '3333', '2022-09-10'),
(2, 'Mariya Joy', '9998885472', 'mj@gmail.com', 'Female', 'Vettukattil (H),Angamaly', '1999-06-04', 63, 'images (24).jpeg', '4444', '2022-09-10'),
(4, 'Rajan ', '8769544356', 'rajan@gmail.com', 'Male', 'Madathiparambil (H),Allapra', '1975-12-30', 66, 'download.jpeg', '999', '2022-09-16');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_workshop`
--

CREATE TABLE `tbl_workshop` (
  `workshop_id` int(11) NOT NULL,
  `workshop_name` varchar(30) NOT NULL,
  `workshop_contact` varchar(10) NOT NULL,
  `workshop_email` varchar(50) NOT NULL,
  `workshop_address` varchar(50) NOT NULL,
  `workshop_logo` varchar(100) NOT NULL,
  `workshop_proof` varchar(50) NOT NULL,
  `workshop_password` varchar(30) NOT NULL,
  `workshop_doj` int(11) NOT NULL,
  `workshoptype_id` int(11) NOT NULL,
  `workshop_location` int(11) NOT NULL,
  `workshop_status` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_workshop`
--

INSERT INTO `tbl_workshop` (`workshop_id`, `workshop_name`, `workshop_contact`, `workshop_email`, `workshop_address`, `workshop_logo`, `workshop_proof`, `workshop_password`, `workshop_doj`, `workshoptype_id`, `workshop_location`, `workshop_status`) VALUES
(1, 'MS Motors', '7598426851', 'ms@gmail.com', 'MS Motors,Choondy,Aluva', 'images (12).jpeg', 'images (22).jpeg', '5555', 20220910, 2, 10, 1),
(2, 'MotorWorks', '9588420426', 'mw@gmail.com', 'MotorWorks,Manjapra,Angamaly', 'images (11).jpeg', 'images (3).png', '6666', 20220910, 4, 11, 1),
(3, 'Lal Auto Workshop', '9447205882', 'lalaw@gmail.com', 'Lal Auto Workshop,Kilimanoor P.O,Puthiyakavu', 'images (9).jpeg', 'download.jpeg', 'lalan999', 20221007, 3, 25, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_workshoptype`
--

CREATE TABLE `tbl_workshoptype` (
  `workshoptype_id` int(11) NOT NULL,
  `workshoptype_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_workshoptype`
--

INSERT INTO `tbl_workshoptype` (`workshoptype_id`, `workshoptype_name`) VALUES
(2, '2 Wheeler'),
(3, '4 Wheeler'),
(4, 'Heavy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  ADD PRIMARY KEY (`complaint_id`);

--
-- Indexes for table `tbl_complainttype`
--
ALTER TABLE `tbl_complainttype`
  ADD PRIMARY KEY (`complainttype_id`);

--
-- Indexes for table `tbl_district`
--
ALTER TABLE `tbl_district`
  ADD PRIMARY KEY (`district_id`);

--
-- Indexes for table `tbl_location`
--
ALTER TABLE `tbl_location`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `tbl_mechanic`
--
ALTER TABLE `tbl_mechanic`
  ADD PRIMARY KEY (`mechanic_id`);

--
-- Indexes for table `tbl_place`
--
ALTER TABLE `tbl_place`
  ADD PRIMARY KEY (`place_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_request`
--
ALTER TABLE `tbl_request`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `tbl_shop`
--
ALTER TABLE `tbl_shop`
  ADD PRIMARY KEY (`shop_id`);

--
-- Indexes for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  ADD PRIMARY KEY (`stock_id`);

--
-- Indexes for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  ADD PRIMARY KEY (`subcategory_id`);

--
-- Indexes for table `tbl_type`
--
ALTER TABLE `tbl_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_workshop`
--
ALTER TABLE `tbl_workshop`
  ADD PRIMARY KEY (`workshop_id`);

--
-- Indexes for table `tbl_workshoptype`
--
ALTER TABLE `tbl_workshoptype`
  ADD PRIMARY KEY (`workshoptype_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  MODIFY `complaint_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_complainttype`
--
ALTER TABLE `tbl_complainttype`
  MODIFY `complainttype_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_district`
--
ALTER TABLE `tbl_district`
  MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tbl_location`
--
ALTER TABLE `tbl_location`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_mechanic`
--
ALTER TABLE `tbl_mechanic`
  MODIFY `mechanic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_place`
--
ALTER TABLE `tbl_place`
  MODIFY `place_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_request`
--
ALTER TABLE `tbl_request`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_shop`
--
ALTER TABLE `tbl_shop`
  MODIFY `shop_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  MODIFY `subcategory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_type`
--
ALTER TABLE `tbl_type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_workshop`
--
ALTER TABLE `tbl_workshop`
  MODIFY `workshop_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_workshoptype`
--
ALTER TABLE `tbl_workshoptype`
  MODIFY `workshoptype_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
