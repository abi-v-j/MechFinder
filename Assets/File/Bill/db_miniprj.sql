-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2022 at 04:56 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

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
  `admin_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_email`, `admin_password`) VALUES
(1, 'sasi@123', 'njanorupottan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complaint`
--

CREATE TABLE `tbl_complaint` (
  `complaint_id` int(11) NOT NULL,
  `complainttype_id` int(11) NOT NULL,
  `complaint_content` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `workshop_id` int(11) NOT NULL,
  `mechanic_id` int(11) NOT NULL,
  `complaint_status` varchar(50) NOT NULL DEFAULT '0',
  `complaint_reply` varchar(50) NOT NULL,
  `complaint_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(8, 'engine failure'),
(9, 'break down'),
(10, 'missing');

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
(26, 'Alappuzha'),
(27, 'Pathanamthitta'),
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
-- Table structure for table `tbl_employee`
--

CREATE TABLE `tbl_employee` (
  `emp_id` int(11) NOT NULL,
  `emp_name` varchar(30) NOT NULL,
  `emp_gender` varchar(10) NOT NULL,
  `emp_dept` varchar(20) NOT NULL,
  `emp_salary` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_employee`
--

INSERT INTO `tbl_employee` (`emp_id`, `emp_name`, `emp_gender`, `emp_dept`, `emp_salary`) VALUES
(1, 'Sasi', 'Male', 'BCA', 10000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `feedback_id` int(11) NOT NULL,
  `feedback_content` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `workshop_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 'vazhapilly', 23, '', ''),
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
(2, 'wewr', '65465465', 'aaa', 'fdgdfg', 'images.jpeg', 0, '123', '2022-07-23'),
(3, 'Xavier', '2147483647', 'xavier@gmail.com', 'kattuparambil(H)pattikkadu', 'images (2).jpeg', 0, '123', '2022-07-23'),
(4, 'David m', '9656445307', 'david@gmail.com', 'plaprambil(H)irrutty', 'Koala.jpg', 0, '1234', '2022-07-24'),
(5, 'Vasu M', '9632587410', 'vasu@gmail.com', 'dgfgvghjfg', 'images.jpeg', 0, '1245', '2022-07-24'),
(6, 'Jose', '9632014562', 'jose@gmail.com', 'qwertyhvcv', 'download.jpeg', 0, '999', '2022-08-10');

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
(102, 30, 'Muvattupuzha');

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
  `mechanic_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_request`
--

INSERT INTO `tbl_request` (`request_id`, `workshop_id`, `request_details`, `user_id`, `request_date`, `request_status`, `payment_status`, `mechanic_id`) VALUES
(23, 21, 'ki9ju', 10, '2022-08-19', '0', '0', 0);

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
(4, 'Manoj', '4533234567', 'manoj1@gmail.com', 'gflfiighie', 'images (6).jpeg', 'IMG_20220804_095719.jpg', '1234', '2022-08-09', 1, 1),
(5, 'asfesw', '7646775675', 'weee', 'gfdhrthy', 'images (6).jpeg', 'download.jpeg', '123', '2022-08-09', 2, 2),
(6, 'Raman', '8129345630', 'raman@gmail.com', 'ramanilayam', 'images (11).jpeg', 'images (3).png', '1234', '2022-08-09', 2, 1),
(7, 'JK Motors', '9541756204', 'jkm@gmail.com', 'jk choondy', 'images (5).jpeg', 'IMG_20220804_095705.png', '1111', '2022-08-10', 10, 1),
(8, 'Parts Land', '9568741288', 'parts@gmail.com', 'Parts Land Angamaly', 'IMG_20220804_095824.jpg', 'download.jpeg', '0000', '2022-08-12', 12, 2),
(9, 'MS Parts', '8890998467', 'ms@gmail.com', 'MS Attingal', 'images (12).jpeg', 'download.jpeg', '111', '2022-08-18', 23, 1),
(10, 'Automotive Spares', '8755012400', 'automotive@gmail.com', 'Automotive Kattakada', 'images (13).jpeg', 'images (3).png', '222', '2022-08-18', 24, 1),
(11, 'Spare Hub', '7758367979', 'sh@gmail.com', 'Spare Hub Thoppumpady', 'IMG_20220804_095824.jpg', 'IMG_20220804_095705.png', '666', '2022-08-18', 13, 1);

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
(5, 'Vasu  R', '2147483647', 'vasu@gmail.com', 'Male', 'Rocky(H),Ernakulam', '1999-07-20', 23, 'Koala.jpg', '123', '2022-07-23'),
(6, 'Robert Philp', '2147483647', 'robert@gmail.com', 'Male', 'immanuel(H)kottayam', '1996-01-16', 23, 'Koala.jpg', '1234', '2022-07-23'),
(7, 'Bhaskaran KV', '951247863', 'bhaskaran@gmail.com', 'Male', 'Bhasi Hub', '1990-01-01', 18, 'Koala.jpg', '145', '2022-07-24'),
(8, 'eetee', '5356655444', 'aaaa', 'Male', 'reeteetre', '1999-05-12', 29, 'images (3).jpeg', '1234', '2022-07-24'),
(9, 'Rajan', '8521463792', 'rajan@gmail.com', 'Male', 'Rajbhavan', '1985-10-18', 62, 'images (3).png', '1234', '2022-08-10'),
(10, 'Thankan', '9998887770', 'thankan@gmail.com', 'Male', 'Thanku Hub', '1981-04-01', 64, 'images (17).jpeg', '999', '2022-08-18');

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
(12, 'manu', '12345654', 'aaaa', 'qwwert', 'images (3).jpeg', 'images (1).jpeg', '123', 20220723, 0, 2, 1),
(13, 'manu', '2147483647', 'manu@gmail.com', 'qwerr', 'images (1).jpeg', 'images (3).jpeg', '123', 20220723, 9, 2, 2),
(14, 'JK Motors', '9876543210', 'jkmotors@gmail.com', 'jk parambil', 'images.jpeg', 'images (4).jpeg', '369', 20220730, 10, 1, 0),
(15, 'Carz Tech', '7496238541', 'carzt@gmail.com', 'carztech nellikuzhy', 'images (13).jpeg', 'images (4).png', '009', 20220810, 12, 17, 1),
(17, 'Jawan Automobiles', '7565768893', 'ja@gmail.com', 'qwertfc', 'images (13).jpeg', 'images (22).jpeg', '888', 20220812, 14, 10, 1),
(18, 'Car Service', '9800543092', 'cs@gmail.com', 'CS Attingal', 'IMG_20220804_095805.jpg', 'images (22).jpeg', '333', 20220818, 12, 23, 1),
(19, 'Moto Workz', '7566357575', 'mw@gmail.com', 'Moto Workz Nedumangad', 'images (11).jpeg', 'images (20).jpeg', '444', 20220818, 13, 26, 1),
(20, 'MECH', '9499357822', 'mech@gmail.com', 'Mech Thoppumpady', 'IMG_20220804_095753.jpg', 'IMG_20220804_095719.jpg', '555', 20220818, 10, 13, 1),
(21, 'Repair', '9856325874', 'repair@gmail.com', 'qwertyujhgfdcvbnm', 'images (6).jpeg', 'images (21).jpeg', '000', 20220819, 10, 23, 1);

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
(10, 'All'),
(12, 'Car'),
(13, 'Bike'),
(14, 'Transporters');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

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
-- Indexes for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD PRIMARY KEY (`feedback_id`);

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
-- AUTO_INCREMENT for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  MODIFY `complaint_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_complainttype`
--
ALTER TABLE `tbl_complainttype`
  MODIFY `complainttype_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_district`
--
ALTER TABLE `tbl_district`
  MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_location`
--
ALTER TABLE `tbl_location`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_mechanic`
--
ALTER TABLE `tbl_mechanic`
  MODIFY `mechanic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_place`
--
ALTER TABLE `tbl_place`
  MODIFY `place_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `tbl_request`
--
ALTER TABLE `tbl_request`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_shop`
--
ALTER TABLE `tbl_shop`
  MODIFY `shop_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_workshop`
--
ALTER TABLE `tbl_workshop`
  MODIFY `workshop_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_workshoptype`
--
ALTER TABLE `tbl_workshoptype`
  MODIFY `workshoptype_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
