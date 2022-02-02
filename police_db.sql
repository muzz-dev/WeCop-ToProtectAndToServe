-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2021 at 09:04 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `police_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `fir_log`
--

CREATE TABLE `fir_log` (
  `log_id` int(11) NOT NULL,
  `fir_id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `remark` varchar(200) NOT NULL,
  `logdatetime` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fir_log`
--

INSERT INTO `fir_log` (`log_id`, `fir_id`, `status`, `remark`, `logdatetime`) VALUES
(2, 43, 'In Process', 'FIR in Process', '2021-05-18 19:17:31'),
(3, 43, 'Completed', 'File Infector Person is under Arrest.', '2021-05-19 19:17:39'),
(4, 41, 'Completed', 'fed', '2021-05-31 16:16:03'),
(5, 41, 'In Process', 'ABC', '2021-05-31 16:20:37'),
(6, 41, 'In Process', 'ABC', '2021-05-31 16:21:55'),
(7, 41, 'In Process', 'ABC', '2021-05-31 16:24:43'),
(8, 41, 'In Process', 'ABC', '2021-05-31 16:25:30'),
(9, 41, 'In Process', 'ABC', '2021-05-31 16:25:55'),
(10, 41, 'In Process', 'asd', '2021-05-31 16:26:07'),
(11, 42, 'In Process', 'yes', '2021-05-31 16:27:02'),
(12, 41, 'In Process', 'ANC', '2021-06-01 01:19:21');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_act`
--

CREATE TABLE `tbl_act` (
  `act_id` int(11) NOT NULL,
  `subcat_id` int(11) NOT NULL,
  `act_number` varchar(50) NOT NULL,
  `act_title` varchar(200) NOT NULL,
  `actdescription` varchar(500) NOT NULL,
  `isactive` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_act`
--

INSERT INTO `tbl_act` (`act_id`, `subcat_id`, `act_number`, `act_title`, `actdescription`, `isactive`) VALUES
(22, 9, '101', 'Adware Act 1', 'Adware Act 1', 'Yes'),
(23, 9, '102', 'Adware Act 2', 'Adware Act 2', 'Yes'),
(24, 11, '101', 'Property Crime', 'Property Crime Act 5475', 'Yes'),
(25, 10, 'File Infector 101', '101 File INfector', 'File INfector', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_login`
--

CREATE TABLE `tbl_admin_login` (
  `login_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `profilephoto` varchar(50) NOT NULL,
  `emailid` varchar(50) NOT NULL,
  `usertype` varchar(15) NOT NULL DEFAULT 'SUB',
  `isblock` varchar(3) DEFAULT NULL,
  `regi_datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `otp` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin_login`
--

INSERT INTO `tbl_admin_login` (`login_id`, `username`, `password`, `name`, `contact`, `profilephoto`, `emailid`, `usertype`, `isblock`, `regi_datetime`, `otp`) VALUES
(1, 'admin', 'admin123', 'Administrator', '7984574524', 'admin.jpg', 'muzammilaadeez@gmail.com', 'SUPER', 'No', '2021-01-20 16:53:45', 5118),
(2, 'Mitul', 'kalu123', 'Kalpesh Kumar', '54632415', '161730458437341617304584.jpg', 'meetgajera0305@gmail.com', 'SUB', 'No', '2021-04-02 00:46:24', 8195);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(50) NOT NULL,
  `cat_type` varchar(50) NOT NULL,
  `cat_description` text NOT NULL,
  `cat_image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`cat_id`, `cat_name`, `cat_type`, `cat_description`, `cat_image`) VALUES
(2, 'High-Tech Crime', 'Crime', 'A form of cybercrime, high-tech crime refers to crimes that use electronic and digitally based technology to attack computers or a computer network. Such crimes include the hacking of computers or any unauthorised use or distribution of data, denial of service attacks and distribution of computer viruses.', '161330238036791613302380.png'),
(3, 'Murder', 'Crime', 'Murder is the unlawful killing of another human without justification or plausible/moral intent, especially the unlawful killing of another human with malice aforethought.', '161330252353221613302523.png'),
(4, 'Theft', 'Crime', 'Theft is the taking of another person\'s property or services or scrap money without that person\'s permission or consent with the intent to deprive the rightful owner of it', '161330292278231613302922.png'),
(5, 'Driving Car', 'Tips', 'How to Drive Car in Fogg.', '161330327912561613303279.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_city`
--

CREATE TABLE `tbl_city` (
  `city_id` int(11) NOT NULL,
  `city_name` varchar(30) NOT NULL,
  `city_code` varchar(5) NOT NULL,
  `state_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_city`
--

INSERT INTO `tbl_city` (`city_id`, `city_name`, `city_code`, `state_id`) VALUES
(14, 'Ahmedabad', 'AMD', 13),
(15, 'Surat', 'ST', 13),
(16, 'Vadodara', 'VD', 13),
(17, 'Navsari', 'NVS', 13),
(18, 'Rajkot', 'RJT', 13),
(19, 'Anand', 'ANND', 13),
(20, 'Bharuch', 'BH', 13),
(21, 'Jamnagar', 'JAM', 13),
(22, 'Ankleshwar', 'ANK', 13),
(23, 'Jammu', 'JM', 14),
(24, 'Srinagar', 'SNG', 14),
(25, 'Mumbai', 'MMB', 15),
(26, 'Pune', 'PN', 15),
(27, 'Nashik', 'NSK', 15),
(28, 'Ranchi', 'RNC', 16),
(29, 'Ludhiana', 'LDH', 20),
(30, 'Amritsar', 'AMT', 20),
(31, 'New Delhi', 'NDL', 28),
(32, 'Gurugam', 'GGM', 28),
(33, 'Agra', 'AGR', 28),
(34, 'Jameshpur', 'JMS', 13),
(35, 'Dharamshala', 'DMS', 17),
(36, 'Manali', 'MNL', 17),
(37, 'Raipur', 'RP', 19),
(38, 'Bhilai', 'BHL', 19),
(39, 'Jaipur', 'JPR', 22),
(40, 'Ajmer', 'AJM', 22),
(41, 'Vasco Da Gama', 'VDG', 18),
(42, 'Panaji', 'PNJ', 18),
(43, 'Hydrabad', 'HYD', 23),
(44, 'Nizamabad', 'NZB', 23);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_em_number`
--

CREATE TABLE `tbl_em_number` (
  `em_id` int(11) NOT NULL,
  `em_title` varchar(50) NOT NULL,
  `em_number` varchar(50) NOT NULL,
  `isactive` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_em_number`
--

INSERT INTO `tbl_em_number` (`em_id`, `em_title`, `em_number`, `isactive`) VALUES
(1, 'Ambulance', '108', 'Yes'),
(2, 'National Emergency Number', '112', 'Yes'),
(3, 'Police', '100', 'Yes'),
(4, 'Fire', '101', 'Yes'),
(7, 'Women Helpline', '1091', 'Yes'),
(8, 'Air Ambulance', '9540161344', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `feed_id` int(11) NOT NULL,
  `fname` text NOT NULL,
  `femail` text NOT NULL,
  `feedback_text` text NOT NULL,
  `feed_datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_feedback`
--

INSERT INTO `tbl_feedback` (`feed_id`, `fname`, `femail`, `feedback_text`, `feed_datetime`, `user_id`) VALUES
(1, 'Mzammil Nagariya', 'muzz@gmail.com', 'hey there', '2021-05-23 22:48:29', 39),
(2, 'Deep', 'kansaradeep1820@gmail.com', 'Best app for security and safety', '2021-05-25 13:19:15', 39),
(3, 'abc', 'abc@gmail.com', 'abx', '2021-06-01 00:14:05', 39),
(4, 'Muzammil', 'muzammil@gmail.com', 'your application is useful', '2021-06-03 09:16:10', 39),
(5, 'Muzammil', 'muzz@gmail.com', 'abc', '2021-06-09 14:50:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fir`
--

CREATE TABLE `tbl_fir` (
  `fir_id` int(11) NOT NULL,
  `subcat_id` int(11) NOT NULL,
  `cname` text NOT NULL,
  `contact` text NOT NULL,
  `email` text NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `scrimedate` date DEFAULT NULL,
  `scrimetime` time DEFAULT NULL,
  `ecrimedate` date DEFAULT NULL,
  `ecrimetime` time DEFAULT NULL,
  `fir_type` text NOT NULL,
  `ismissing` varchar(3) DEFAULT NULL,
  `firdate` date DEFAULT NULL,
  `firtime` time DEFAULT NULL,
  `address` text NOT NULL,
  `landmark` text NOT NULL,
  `pincode` int(6) NOT NULL,
  `policestation_id` int(11) DEFAULT NULL,
  `latitude` text DEFAULT NULL,
  `longtitude` text DEFAULT NULL,
  `status` varchar(50) DEFAULT 'Pending',
  `act` text DEFAULT NULL,
  `p_userid` int(11) DEFAULT NULL,
  `imageurl1` text DEFAULT NULL,
  `imageurl2` text DEFAULT NULL,
  `added_datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_fir`
--

INSERT INTO `tbl_fir` (`fir_id`, `subcat_id`, `cname`, `contact`, `email`, `user_id`, `title`, `description`, `scrimedate`, `scrimetime`, `ecrimedate`, `ecrimetime`, `fir_type`, `ismissing`, `firdate`, `firtime`, `address`, `landmark`, `pincode`, `policestation_id`, `latitude`, `longtitude`, `status`, `act`, `p_userid`, `imageurl1`, `imageurl2`, `added_datetime`) VALUES
(41, 9, 'Muzammil', '7984574524', 'muzammil@gmail.com', 39, 'Adware Crime', 'Adware Crime', '2021-04-01', '03:15:00', '2021-04-04', '03:15:00', 'Person', NULL, '2021-04-04', '03:15:00', '104,Ankul Society', '85, Ambanagar, Surat, Gujarat 395017, India', 395009, 4, '21.17200084688076', '72.8218732009888', 'In Process', NULL, 2, '161760029329251617600293.', '161760029347591617600293.', '2021-04-05 10:54:53'),
(42, 10, 'Amit', '4455612101', 'amit@gmail.com', 39, 'Amit', 'Amit', '2021-04-01', '05:15:00', '2021-04-04', '05:06:00', 'Person', NULL, '2021-04-04', '08:08:00', 'Amit Nagar', '23/A, Udhana, Chandanvan Society, Udhna, Surat, Gujarat 394221, India', 352101, 4, '21.17436192402159', '72.83496238098148', 'Completed', '25', 2, '161760090142351617600901.', '161760090135491617600901.', '2021-04-05 11:05:01'),
(43, 10, 'MAryam', '9876543210', 'muryam@gmail.com', 39, 'File Infector Crime', 'File Infector Crime', '2021-04-01', '13:54:00', '2021-04-03', '13:54:00', 'Person', NULL, '2021-04-03', '13:54:00', 'Adajan', '407, New Opera House, Khatodra Wadi, Surat, Gujarat 395002, India', 395009, 4, '21.178643781324958', '72.82582141265873', 'In Process', NULL, 2, '161760399745571617603997.jpg', '161760399782111617603997.jpg', '2021-04-05 11:56:37'),
(44, 9, 'Anuj', '7984574522', 'muzammilaadeez@gmail.com', 39, 'Missing', 'xbsudchj', '2020-12-14', '02:14:00', '2021-01-01', '01:01:00', 'Police', NULL, '2021-04-07', '02:14:00', 'cddf', 'Citi Civic Center South Zone, S Zone Rd, Udhana Village, Udhna, Surat, Gujarat 394210, India', 123454, 4, '21.17280121623549', '72.83612109527591', 'Pending', '22', NULL, '161900824461221619008244.', '161900824433281619008244.', '2021-04-21 18:00:44'),
(45, 9, 'Muzammil Nagariya', '7984574524', 'muzammilaadeez@gmail.com', 39, 'Amazon may acquire film giant MGM for $9 billion: Report', 'Amazon may acquire film giant MGM for $9 billion: Report', '2021-06-02', '02:14:00', '2021-06-06', '02:14:00', 'Person', NULL, '2021-06-07', '04:18:00', 'Adajan', '1, Dharmaraj Society, Gopaleshwar Society, Rander, Surat, Gujarat 395005, India', 395005, 4, '21.20825323155409', '72.80114508972171', 'Pending', '23', NULL, '162306688646021623066886.png', '162306688650831623066886.', '2021-06-07 17:24:46');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_home`
--

CREATE TABLE `tbl_home` (
  `home_id` int(11) NOT NULL,
  `policestation_id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `remark` text NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `homephotourl` text DEFAULT NULL,
  `isapprove` varchar(3) DEFAULT 'P',
  `homelatitude` text NOT NULL,
  `homelongtitude` text NOT NULL,
  `homeaddressline1` text NOT NULL,
  `homeaddressline2` text DEFAULT NULL,
  `homelandmark` text NOT NULL,
  `homepincode` int(6) NOT NULL,
  `regi_datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_home`
--

INSERT INTO `tbl_home` (`home_id`, `policestation_id`, `userid`, `remark`, `start_date`, `end_date`, `homephotourl`, `isapprove`, `homelatitude`, `homelongtitude`, `homeaddressline1`, `homeaddressline2`, `homelandmark`, `homepincode`, `regi_datetime`) VALUES
(26, 4, 39, 'Going to Surat', '2021-06-01', '2021-06-08', '162256111944401622561119.jpg', 'Y', '21.221669359877776', '72.79110219329596', 'Abx', NULL, 'Adajan Patiya', 395009, '2021-06-01 20:55:20'),
(27, 4, 39, 'Going to Surat', '2021-06-09', '2021-06-15', '162256860497551622568604.jpg', 'Y', '21.20809762243988', '72.80485957860947', 'Adaham Patiya', NULL, 'Adajan Patiya', 395009, '2021-06-01 23:00:04'),
(28, 4, 39, 'abc', '2021-06-17', '2021-06-24', '162261466660571622614666.jpg', 'P', '21.21027683585364', '72.8024522960186', 'haha', NULL, 'adajan', 395009, '2021-06-02 11:47:46'),
(29, 4, 39, 'abx', '2021-06-02', '2021-06-09', '162261479843971622614798.jpg', 'P', '21.206681366530795', '72.80597805976868', 'abc', NULL, 'adajan patiya', 395009, '2021-06-02 11:49:58'),
(30, 4, 73, 'Going To Ahmedabad', '2021-06-17', '2021-06-24', '162269135977861622691359.jpg', 'Y', '21.20954980982482', '72.80383363366127', 'Asaman Patiya', NULL, 'Adajan Patiya', 395009, '2021-06-03 09:05:59'),
(31, 4, 39, 'Going to Ahmedabad for Marriage.', '2021-06-14', '2021-06-21', '162369150894901623691508.jpg', 'P', '37.41747625462405', '-122.08553742617369', '807-Hamza Apartment, Adajan Patiya, Surat', NULL, 'Adajan Patiya', 395009, '2021-06-14 22:55:08'),
(32, 4, 39, 'going to ahmd', '2021-07-14', '2021-07-22', '162459914964901624599149.jpg', 'P', '21.20769784643614', '72.8038651496172', 'adajan ', NULL, 'adajan', 395009, '2021-06-25 11:02:29'),
(33, 4, 39, 'Going to ahmd', '2021-07-08', '2021-07-15', '162460841973241624608419.jpg', 'Y', '21.208438634579064', '72.80410587787628', 'Adajan', NULL, 'Adajan', 395009, '2021-06-25 13:36:59');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_missing_person`
--

CREATE TABLE `tbl_missing_person` (
  `pid` int(11) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `mphoto` varchar(50) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `age` varchar(3) NOT NULL,
  `lastaddress1` varchar(200) NOT NULL,
  `lastaddress2` varchar(200) DEFAULT NULL,
  `landmark` text NOT NULL,
  `pincode` varchar(6) NOT NULL,
  `lastlocationtype` varchar(50) DEFAULT NULL,
  `lattitude` text DEFAULT NULL,
  `longtitude` text DEFAULT NULL,
  `contactname` varchar(50) NOT NULL,
  `contactmobilenumber` varchar(50) NOT NULL,
  `isdisplay` varchar(3) NOT NULL,
  `missingdate` date DEFAULT NULL,
  `missingtime` time DEFAULT NULL,
  `moredetails` varchar(200) NOT NULL,
  `city_id` int(11) NOT NULL,
  `fir_id` int(11) DEFAULT NULL,
  `added_datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_missing_person`
--

INSERT INTO `tbl_missing_person` (`pid`, `mname`, `mphoto`, `gender`, `age`, `lastaddress1`, `lastaddress2`, `landmark`, `pincode`, `lastlocationtype`, `lattitude`, `longtitude`, `contactname`, `contactmobilenumber`, `isdisplay`, `missingdate`, `missingtime`, `moredetails`, `city_id`, `fir_id`, `added_datetime`) VALUES
(3, 'Amrita Patel', '161501921098671615019210.jpg', 'Female', '58', '604 Siri Complex', '', 'Ramnagar', '967532', 'At School', NULL, NULL, 'Ami Patel', '9846352175', 'Yes', '2020-01-08', NULL, 'Hair color : Black', 14, NULL, '2021-03-06 13:56:50'),
(4, 'Sania Mirza', '161501935641661615019356.jpg', 'Female', '36', '1024, Royal Park, Saroli Road', '', 'Jahangirpura', '965874', 'At Home', NULL, NULL, 'Soheb Malik', '9835146275', 'Yes', '2021-02-21', NULL, 'Hobby : Tennis', 26, NULL, '2021-03-06 13:59:17'),
(5, 'Arjun Kapur', '161501957779361615019577.jpg', 'Male', '54', '53, Shabnam Park', '', 'Ankleshwar Bus Stop', '983516', 'At Shop', NULL, NULL, 'Ranbir Kapoor', '9678245312', 'Yes', '2020-03-08', NULL, 'Hair color : Black', 22, NULL, '2021-03-06 14:02:57'),
(8, 'Sania Mirza', '161501935641661615019356.jpg', 'Female', '36', '1024, Royal Park, Saroli Road', '', 'Jahangirpura', '965874', 'At Home', NULL, NULL, 'Soheb Malik', '9835146275', 'Yes', '2021-03-21', NULL, 'Hobby : Tennis', 26, NULL, '2021-03-06 13:59:17'),
(9, 'Arjun Kapur', '161501957779361615019577.jpg', 'Male', '54', '53, Shabnam Park', '', 'Ankleshwar Bus Stop', '983516', 'At Shop', NULL, NULL, 'Ranbir Kapoor', '9678245312', 'Yes', '2020-07-20', NULL, 'Hair color : Black', 22, NULL, '2021-03-06 14:02:57'),
(10, 'Akshay', '161622667648271616226676.jpg', 'Male', '20', 'ABC', 'ABC', 'Surat', '395009', 'sleeping', NULL, NULL, 'Monica', '886654421', 'Yes', '2020-08-15', NULL, 'hhh', 14, NULL, '2021-03-20 13:21:16'),
(11, 'Maryam', '161656913845151616569138.jpg', 'Male', '50', 'hgjkj', '32A, Bhatar Rd, Swami Gunatit Nagar, Sanskar Nagar, Athwa, Surat, Gujarat 395017, India', 'A-15, Piplod Main Road, Balaji Nagar Society, Balaji Nagar, Himgiri Society, Piplod, Surat, Gujarat 395007, India', '395009', 'Sleeping', '21.160435026391692', '72.7784857879639', 'Muzammil', '9856412311', 'Yes', '2020-04-01', '00:59:00', 'Nothing', 15, NULL, '2021-03-24 12:28:58'),
(12, 'Kunal', '161664840136411616648401.jpg', 'Male', '20', 'Adajan', 'Adajan', 'Aman Sunni Masjid, Aman Society, Udhna, Surat, Gujarat 395002, India', '395009', 'HOME', '21.17460203145016', '72.84101344451908', 'Kunal', '8866544213', 'Yes', '2021-03-18', '12:29:00', 'height 5.6', 15, NULL, '2021-03-25 10:30:01'),
(13, 'Ashok', '161666187523171616661875.jpg', 'Male', '85', 'Ashok Nagar', '', '32A, Bhatar Rd, Swami Gunatit Nagar, Sanskar Nagar, Athwa, Surat, Gujarat 395017, India', '352640', 'Sleeping', '21.171400567022925', '72.81573630676273', 'Anjali', '5462318790', 'Yes', '2021-03-04', '16:14:00', 'ABC', 15, NULL, '2021-03-25 14:14:35'),
(14, 'Ajay', '161684718297811616847182.jpg', 'Male', '15', 'fhgjh', '', '23, Navjivan Cir, Janta Nagar, Swaminagar Society, K N Park, Athwa, Surat, Gujarat 395017, India', '123451', 'hgjhkj', '21.167758817008806', '', 'AKshay', '9845121346', 'Yes', NULL, NULL, 'hgjklk', 26, NULL, '2021-03-27 17:43:02'),
(15, 'AJay', '161684727548781616847275.jpg', 'Male', '15', 'hjkj', '', 'P-1, Udhana Magdalla Road-hasmukhbhai Hojiwala Rd, Janta Nagar, Gokul Nagar Society, Ambanagar, Surat, Gujarat 395017, India', '894564', 'hj', '21.168919384437075', '72.82217360839847', 'Anil', '4561239894', 'Yes', '2021-03-02', '03:15:00', 'gfhjhkjnxmcs', 15, NULL, '2021-03-27 17:44:35'),
(18, 'Baby', '161740031442571617400314.', 'Male', '24', 'Rander', 'Rander', 'PLOT NO 15 AMBIKA IND. SOC, Bhatar Rd, near PUNJAB NATIONAL BANK, Ambika Industrial Society 1, Gandhi Kutir, Surat, Gujarat 395017, India', '789465', 'Eating', '21.164597225081586', '72.8174958358765', 'jhbn', '7894561230', 'Yes', '2021-02-05', '03:15:00', 'rider', 15, NULL, '2021-04-03 03:21:54'),
(19, 'mariyam', '161760478357111617604783.jpg', 'Female', '21', 'rander', 'surat', '134-1, Laxmi Nagar, Pandesara GIDC, Udhna, Surat, Gujarat 394221, India', '426267', 'udana', '21.14234411105898', '72.83796645507816', 'monika', '9876574728', 'Yes', '2021-04-01', '05:06:00', 'height-5', 15, NULL, '2021-04-05 12:09:43'),
(20, 'Muzammil', '161769850998061617698509.jpg', 'Male', '20', 'Rander', '', 'Sosyo Circle, Laxmi Nagar, Udhna, Surat, Gujarat 395017, India', '365214', 'Sleeping', '21.170920341382892', '72.82642222747806', 'Atif', '7894561230', 'Yes', '2020-12-14', '03:15:00', 'ABC', 14, NULL, '2021-04-06 14:11:49'),
(21, 'Muzammil', '161769852842171617698528.jpg', 'Male', '20', 'Rander', '', 'Sosyo Circle, Laxmi Nagar, Udhna, Surat, Gujarat 395017, India', '365214', 'Sleeping', '21.170920341382892', '72.82642222747806', 'Atif', '7894561230', 'Yes', '2020-12-14', '03:15:00', 'ABC', 14, NULL, '2021-04-06 14:12:08'),
(22, 'Muzammil', '161769857768881617698577.jpg', 'Male', '20', 'Rander', '', 'Sosyo Circle, Laxmi Nagar, Udhna, Surat, Gujarat 395017, India', '365214', 'Sleeping', '21.170920341382892', '72.82642222747806', 'Atif', '7894561230', 'Yes', '2020-12-14', '03:15:00', 'ABC', 14, NULL, '2021-04-06 14:12:57'),
(23, 'Muzammil', '161769860528141617698605.jpg', 'Male', '20', 'Rander', '', 'Sosyo Circle, Laxmi Nagar, Udhna, Surat, Gujarat 395017, India', '365214', 'Sleeping', '21.170920341382892', '72.82642222747806', 'Atif', '7894561230', 'Yes', '2020-12-14', '03:15:00', 'ABC', 14, NULL, '2021-04-06 14:13:25'),
(24, 'Amrita SIngh', '161770000162941617700001.jpg', 'Female', '20', 'Rander', '', '70/1, Udhana Magdalla Road,, Near Shantinath Silk Mills, Surat â€“ 395017, Gandhi Kutir, Surat, Gujarat 395017, India', '123456', 'Sleeping', '21.166838360506684', '72.82161570892337', 'Amit SIngh', '9876543210', 'Yes', '2021-04-01', '01:01:00', 'asfdgh', 14, NULL, '2021-04-06 14:36:41'),
(25, 'Maryam', '161786292094801617862920.jpg', 'Female', '50', 'Missing From Home', '', 'Plot No.227, Rustam Bagh Rd, besides National Service Centre, near Maruti Nagar Circle, Limbayat, Udhna, Surat, Gujarat 394210, India', '321654', 'Sleeping', '21.174802120676222', '72.85714961395267', 'Laiba', '7894651230', 'No', '2021-04-06', '03:15:00', 'ABC', 23, NULL, '2021-04-08 11:52:00'),
(30, 'Deep Kansara', '162453550915531624535509.jpg', 'Male', '21', 'test', 'test', 'B-220, Miranagar Society B, Meeranagar Society, Udhana Village, Udhna, Surat, Gujarat 394210, India', '394210', 'test', '21.170600190090173', '72.83830977783207', 'Muzammil Nagariya', '7984574524', 'Yes', '2021-05-12', '01:01:00', 'test', 15, NULL, '2021-05-18 21:37:25');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_news`
--

CREATE TABLE `tbl_news` (
  `news_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `newsdescription` text NOT NULL,
  `newsimage` varchar(50) NOT NULL,
  `startdate` date DEFAULT NULL,
  `enddate` date DEFAULT NULL,
  `isactive` varchar(3) NOT NULL,
  `news_datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_news`
--

INSERT INTO `tbl_news` (`news_id`, `title`, `newsdescription`, `newsimage`, `startdate`, `enddate`, `isactive`, `news_datetime`) VALUES
(6, 'PM Modi holds meeting with field officials from states, districts on Covid-19 management', 'PM Modi holds meeting with field officials from states, districts on Covid-19 management', '162133403189651621334031.jpg', '2021-05-18', '2022-05-20', 'Yes', NULL),
(7, 'No South Africa return for De Villiers as retirement decision final', 'De Villiers had been in talks with head coach ', '162135189937951621351899.jpg', '2021-05-18', '2022-05-25', 'Yes', NULL),
(15, 'Investors richer by over Rs 5.78L cr in two sessions of massive market rally', 'Over the past two sessions, the BSE gauge Sensex has gained ', '162135344612481621353446.jpg', '2020-03-01', '2021-03-01', 'Yes', NULL),
(16, 'Amazon may acquire film giant MGM for $9 billion: Report', 'GM owns a major film library, with interests in the long running James Bond franchise as well as other well-known titles such as Rocky and Pink Panther.', '162135372783941621353727.jpg', '2020-02-01', '2021-02-01', 'Yes', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notification`
--

CREATE TABLE `tbl_notification` (
  `notification_id` int(11) NOT NULL,
  `notification_title` text NOT NULL,
  `notification_desc` text NOT NULL,
  `notification_page` text NOT NULL,
  `notification_pageid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_notification`
--

INSERT INTO `tbl_notification` (`notification_id`, `notification_title`, `notification_desc`, `notification_page`, `notification_pageid`) VALUES
(2, 'New Missing Person Added !!!', 'Amrita SIngh', 'MissingPerson', 24),
(3, 'New Missing Person Added !!!', 'Maryam', 'MissingPerson', 25),
(4, 'New Vehicle Added !!!', 'GJ-05-KK-9174', 'Vehicle', 6),
(5, 'New FIR Added !!!', 'Missing', 'FIR', 44),
(6, 'New FIR Added !!!', 'Missing', 'FIR', 45),
(7, 'New FIR Added !!!', 'cs', 'FIR', 46),
(8, 'New FIR Added !!!', 'cs', 'FIR', 47),
(9, 'New FIR Added !!!', 'nxshdckj', 'FIR', 48),
(10, 'New Missing Person Added !!!', 'test', 'MissingPerson', 26),
(11, 'New Missing Person Added !!!', 'test', 'MissingPerson', 27),
(12, 'New Missing Person Added !!!', 'test', 'MissingPerson', 28),
(13, 'New Missing Person Added !!!', 'test', 'MissingPerson', 29),
(14, 'New Missing Person Added !!!', 'Deep Kansara', 'MissingPerson', 30),
(15, 'New FIR Added !!!', 'Amazon may acquire film giant MGM for $9 billion: Report', 'FIR', 45);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_policestation`
--

CREATE TABLE `tbl_policestation` (
  `policestation_id` int(11) NOT NULL,
  `policestation_name` varchar(50) NOT NULL,
  `zone_id` int(11) NOT NULL,
  `addressline1` varchar(100) NOT NULL,
  `addressline2` varchar(100) NOT NULL,
  `landmark` text NOT NULL,
  `pincode` int(6) NOT NULL,
  `latitude` text DEFAULT NULL,
  `longitude` text DEFAULT NULL,
  `isactive` varchar(3) NOT NULL,
  `regi_datetime` datetime DEFAULT current_timestamp(),
  `photo_url` varchar(50) DEFAULT NULL,
  `contactnumber` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `policename` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `emailid` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_policestation`
--

INSERT INTO `tbl_policestation` (`policestation_id`, `policestation_name`, `zone_id`, `addressline1`, `addressline2`, `landmark`, `pincode`, `latitude`, `longitude`, `isactive`, `regi_datetime`, `photo_url`, `contactnumber`, `username`, `password`, `policename`, `contact`, `gender`, `emailid`) VALUES
(1, 'Srinagar', 12, 'Srinagar', 'Srinagar', 'Srinagar', 999999, NULL, NULL, 'No', NULL, '161336837250361613368372.jpg', '8975462141', 'srinagar', 'srinagar123', 'Rajesh Chandra', '8888888555', 'Female', 'rajesh@gmail.com'),
(3, 'Varachha Police Station', 10, 'Surat - Kamrej Hwy, Sadhna Society', '', ' Laxman Nagar', 395006, '', NULL, 'Yes', NULL, '161460373252171614603732.jpg', '2612454496', 'varachhapolicestation', 'varachha@admin', 'Niriksha Vekariya', '9865175426', 'Female', 'niriksha@gmail.com'),
(4, 'Rander Police Station', 10, 'Plot-103, Nr Alnoor Residency, Morabhagal', '', 'Rander', 395005, '21.20875526567684', '72.8041099011898', 'Yes', NULL, '162352887935361623528879.jpg', '8866522144', 'randerpolicestation', 'randeradmin', 'Rakesh Kumar', '9825647562', 'Male', 'rakesh@gmail.com'),
(5, 'Adajan Police Station', 10, 'Plot-203, Nr Adajan Depo', '', 'Adajan Patiya', 395005, '', NULL, 'Yes', NULL, '161501355550891615013555.jpg', '6353469575', 'adajanpolicestation', 'adajanadmin', 'Monali Sharma', '9568731422', 'Female', 'monali@gmail.com'),
(8, 'Manipur Police Station', 21, 'Manipur Railway Station', '', '55, Rita Park Society, Girdhar Nagar, Ahmedabad, Gujarat 380004, India', 395005, '23.0505469726402', '72.59764052734378', 'Yes', '2021-04-02 00:11:42', '161730250231551617302502.jpg', '7984563214', 'manipurpolicestation', 'manipuradmin', 'Arijit SIngh', '6535142548', 'Male', 'arijit@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_policestation_subuser`
--

CREATE TABLE `tbl_policestation_subuser` (
  `p_userid` int(11) NOT NULL,
  `policestation_id` int(11) NOT NULL,
  `pname` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `profilephoto` varchar(50) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `isblock` varchar(3) NOT NULL,
  `regi_datetime` datetime DEFAULT current_timestamp(),
  `isverify` varchar(3) DEFAULT 'N',
  `token` text DEFAULT NULL,
  `otp` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_policestation_subuser`
--

INSERT INTO `tbl_policestation_subuser` (`p_userid`, `policestation_id`, `pname`, `contact`, `email`, `profilephoto`, `gender`, `username`, `password`, `isblock`, `regi_datetime`, `isverify`, `token`, `otp`) VALUES
(1, 4, 'Raju', '888', 'muzammilaadeez@gmail.com', '161336907048681613369070.jpg', 'Female', 'raju', '8888', 'No', '2021-02-15 11:34:30', 'Y', 'dTE5vRmlTj2aetOUNjvCK2:APA91bHamHoxlAYlJk1_JgzusCG9jNoj2MdOkgQUgOMi-QUEe6emUL1myAVQkipqOQ1wkdiubRppjz6TKkDIN0DSIkvtLHSSN1oJc9Zf140GEGtryqIwo0Bft91SqzgB8rHi6cgkqPpz', 8681),
(2, 4, 'Muzammil Nagariya', '7984574524', 'muzammilaadeez@gmail.com', '161461482734631614614827.jpg', 'Male', 'muzz1925', '1234', 'No', '2021-03-01 21:37:07', 'Y', 'c4rGd903RPeyTikIlFqqCc:APA91bEnnYEFhYf-6e1cDFs9ZeApOCo7ORd2c7zn1xz8jIeS-nFgCRlYJgpgILVu1odwi7F8SeFCaUb0_y_GBHMTM_0MkR0NHQUH_MnsTjKpcd4T3ylC0NQEO4P3a09OAxuZSVKrBZqB', 1321),
(3, 4, 'Ankul Sharma', '9865413254', 'ankul@gmail.com', '161639824176721616398241.jpg', 'Male', 'ankulsharma', 'ankuladmin', 'Yes', '2021-03-22 13:00:41', 'N', NULL, NULL),
(6, 8, 'Monali Sharma', '6598485', 'monali@gmail.com', '161730396331881617303963.jpg', 'Male', 'monaliadmin', 'monali1234', 'Yes', '2021-04-02 00:36:03', 'N', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_state`
--

CREATE TABLE `tbl_state` (
  `state_id` int(11) NOT NULL,
  `state_name` varchar(30) NOT NULL,
  `state_code` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_state`
--

INSERT INTO `tbl_state` (`state_id`, `state_name`, `state_code`) VALUES
(13, 'Gujarat', 'GJ'),
(14, 'Jammu and Kashmir', 'JK'),
(15, 'Maharashtra', 'MH'),
(16, 'Jharkhand', 'JH'),
(17, 'Himachal Pradesh', 'HP'),
(18, 'Goa', 'GA'),
(19, 'Chattisgarh', 'CG'),
(20, 'Punjab', 'PB'),
(21, 'Pondicherry', 'PY'),
(22, 'Rajasthan', 'RJ'),
(23, 'Telangana', 'TS'),
(24, 'Manipur', 'MN'),
(25, 'Madhya Pradesh', 'MP'),
(27, 'Kerala', 'KL'),
(28, 'Delhi', 'DL'),
(29, 'Arunachal Pradesh', 'AR'),
(30, 'Gujarat', 'ha');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subcategory`
--

CREATE TABLE `tbl_subcategory` (
  `subcat_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `subcat_name` varchar(50) NOT NULL,
  `subcat_description` varchar(200) NOT NULL,
  `subcat_image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_subcategory`
--

INSERT INTO `tbl_subcategory` (`subcat_id`, `cat_id`, `subcat_name`, `subcat_description`, `subcat_image`) VALUES
(9, 2, 'Adware', 'Adware, often called advertising-supported software by its developers, is software that generates revenue for its developer by automatically generating online adverti', '161753849330071617538493.png'),
(10, 2, 'File Infector', 'A file infector virus is a type of virus that typically attaches to executable code, such as computer games and word processors. Once the virus has infected a file,', '161760093785481617600937.png'),
(11, 4, 'Property Crime', 'these two crimes are now incorporated within the broader crime of larceny and the term â€œtheft crimeâ€ is used to represent different types of property crimes', '161701045474921617010454.svg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tips`
--

CREATE TABLE `tbl_tips` (
  `tip_id` int(11) NOT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `ttitle` varchar(50) NOT NULL,
  `tdescription` varchar(200) NOT NULL,
  `tvideo` varchar(200) DEFAULT NULL,
  `timage1` varchar(50) NOT NULL,
  `timage2` varchar(50) NOT NULL,
  `timage3` varchar(50) NOT NULL,
  `isdisplay` varchar(3) NOT NULL,
  `tips_datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `userid` int(11) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `contact` varchar(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  `otp` varchar(50) DEFAULT NULL,
  `isverify` varchar(3) DEFAULT 'N',
  `isblock` varchar(3) DEFAULT 'N',
  `regi_datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `token` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`userid`, `uname`, `contact`, `email`, `password`, `otp`, `isverify`, `isblock`, `regi_datetime`, `token`) VALUES
(22, 'ghj', '123', 'sjdj', '12345', '2079', 'Y', 'Y', '2021-03-02 13:26:45', 'c5QFeel7Sx6sddwVga5657:APA91bEYF3id3u-aGA3NQOuGBnpFyZFOaSQBOrcwODjWsJM1JoZHklNfpDB4VGH3vsTzdXU1FxPVEYAXqXn9eo8Bt1lkkRhE0bd6PY2PvDaK61KkNyF5uNx5BS832pvGUvhmIKE3lBL0'),
(39, 'Muzammil', '7984574524', 'muzammilaadeez@gmail.com', '1234', '1112', 'Y', 'N', '2021-03-25 10:45:40', ''),
(69, 'Anuj', '8000368694', 'nmuzammil07@gmail.com', '123', '1936', 'Y', 'Y', '2021-06-02 00:57:23', ''),
(73, 'Vivekanand', '7622930027', 'nmuzammil07@gmail.com', 'vvk123', '9189', 'Y', 'N', '2021-06-02 12:08:35', ''),
(74, 'Anmol', '9825186323', 'nmuzammil07@gmail.com', 'ba', '8546', 'Y', 'N', '2021-06-09 13:40:08', NULL),
(75, 'Elon Musk', '8866681279', 'nmuzammil07@gmail.com', 'elonmusk', '8205', 'Y', 'N', '2021-06-14 23:02:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vehicles`
--

CREATE TABLE `tbl_vehicles` (
  `vid` int(11) NOT NULL,
  `policestation_id` int(11) NOT NULL,
  `vnumber` varchar(50) NOT NULL,
  `chassisnumber` varchar(50) NOT NULL,
  `vphoto1` varchar(50) DEFAULT NULL,
  `vphoto2` varchar(50) DEFAULT NULL,
  `added_datetime` datetime DEFAULT current_timestamp(),
  `fir_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_vehicles`
--

INSERT INTO `tbl_vehicles` (`vid`, `policestation_id`, `vnumber`, `chassisnumber`, `vphoto1`, `vphoto2`, `added_datetime`, `fir_id`) VALUES
(1, 4, 'GJ-05-KL-9174', 'dfgfhjkl', '161336961924341613369619.jpg', '161336961939011613369619.jpg', '2021-02-15 11:43:39', NULL),
(2, 5, 'GJ-05-OP-6644', '78AA56C3321', '161521886887001615218868.jpg', '161521886825211615218868.', '2021-03-08 21:24:28', NULL),
(3, 3, 'GJ-05-TT-9639', 'PLRT8050HJ', '161521892443861615218924.jpg', '161521892438011615218924.', '2021-03-08 21:25:24', NULL),
(5, 4, 'GJ-15-KK-9565', 'ghjnkmlxcvfb', '161739282077991617392820.', '161739282017511617392820.', '2021-04-03 01:17:00', NULL),
(6, 8, 'GJ-05-KK-9174', 'KKAJSLZMAMCND', '161831590395991618315903.jpg', '161831590381261618315903.', '2021-04-13 17:41:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wanted`
--

CREATE TABLE `tbl_wanted` (
  `wid` int(11) NOT NULL,
  `wname` varchar(50) NOT NULL,
  `wphoto` varchar(50) NOT NULL,
  `isactive` varchar(3) NOT NULL,
  `about` varchar(200) NOT NULL,
  `added_datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `policestation_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_wanted`
--

INSERT INTO `tbl_wanted` (`wid`, `wname`, `wphoto`, `isactive`, `about`, `added_datetime`, `policestation_id`) VALUES
(1, 'nancy', '161336956611261613369566.jpg', 'Yes', 'Height 5.6', '2021-02-15 11:42:46', 0),
(2, 'Ashish', '161527415949781615274159.jpg', 'Yes', 'Youtuber', '2021-03-09 12:45:59', NULL),
(3, 'Bhuvan', '161527420266541615274202.jpg', 'Yes', 'Hair Color : Brown', '2021-03-09 12:46:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_zone`
--

CREATE TABLE `tbl_zone` (
  `zone_id` int(11) NOT NULL,
  `zone_name` varchar(30) NOT NULL,
  `zone_code` varchar(50) NOT NULL,
  `city_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_zone`
--

INSERT INTO `tbl_zone` (`zone_id`, `zone_name`, `zone_code`, `city_id`) VALUES
(10, 'ST-WestZone', 'STWZ', 15),
(11, 'ST-NorthZone', 'STNZ', 15),
(12, 'SNG-NorthZone', 'SNGNZ', 24),
(13, 'SNG-WestZone', 'SNGWZ', 24),
(14, 'JM-NorthZone', 'JMNZ', 23),
(15, 'MMB-NorthZone', 'MMBNZ', 25),
(16, 'PN-East Zone', 'PNEZ', 26),
(17, 'RNC-East Zone', 'RNCEZ', 28),
(18, 'RNC-West Zone', 'RNCWZ', 28),
(19, 'AMD-WestZone', 'AMDWZ', 14),
(20, 'AMD-NorthZone', 'AMDNZ', 14),
(21, 'AMD-EastZone', 'AMDEZ', 14),
(22, 'AMD-SouthZone', 'AMDSZ', 14),
(23, 'JM-SouthZone', 'JMSZ', 23),
(24, 'JM-WestZone', 'JMWZ', 23),
(25, 'MMB-EastZone', 'MMBEZ', 25),
(26, 'MMB-WestZone', 'MMBWZ', 25),
(27, 'PN-WestZone', 'PNWZ', 26),
(28, 'PN-South Zone', 'PNSZ', 26),
(29, 'DMS-NorthZone', 'DMSNZ', 35),
(30, 'HP-NorthZone', 'HPNZ', 35),
(31, 'HP-SouthZone', 'HPSZ', 35),
(32, 'MNL-SouthZone', 'MNLSZ', 36),
(33, 'HP-WestZone', 'HPWZ', 36);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fir_log`
--
ALTER TABLE `fir_log`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `fir_id` (`fir_id`);

--
-- Indexes for table `tbl_act`
--
ALTER TABLE `tbl_act`
  ADD PRIMARY KEY (`act_id`),
  ADD KEY `subcat_id` (`subcat_id`);

--
-- Indexes for table `tbl_admin_login`
--
ALTER TABLE `tbl_admin_login`
  ADD PRIMARY KEY (`login_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `contact` (`contact`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `tbl_city`
--
ALTER TABLE `tbl_city`
  ADD PRIMARY KEY (`city_id`),
  ADD KEY `state_id` (`state_id`);

--
-- Indexes for table `tbl_em_number`
--
ALTER TABLE `tbl_em_number`
  ADD PRIMARY KEY (`em_id`);

--
-- Indexes for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD PRIMARY KEY (`feed_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_fir`
--
ALTER TABLE `tbl_fir`
  ADD PRIMARY KEY (`fir_id`),
  ADD KEY `subcat_id` (`subcat_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `subcat_id_2` (`subcat_id`),
  ADD KEY `p_userid` (`p_userid`),
  ADD KEY `policestation_id_2` (`policestation_id`);

--
-- Indexes for table `tbl_home`
--
ALTER TABLE `tbl_home`
  ADD PRIMARY KEY (`home_id`),
  ADD KEY `policestation_id` (`policestation_id`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `tbl_missing_person`
--
ALTER TABLE `tbl_missing_person`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `city_id` (`city_id`),
  ADD KEY `fir_id` (`fir_id`);

--
-- Indexes for table `tbl_news`
--
ALTER TABLE `tbl_news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `tbl_notification`
--
ALTER TABLE `tbl_notification`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `tbl_policestation`
--
ALTER TABLE `tbl_policestation`
  ADD PRIMARY KEY (`policestation_id`),
  ADD KEY `zone_id` (`zone_id`);

--
-- Indexes for table `tbl_policestation_subuser`
--
ALTER TABLE `tbl_policestation_subuser`
  ADD PRIMARY KEY (`p_userid`),
  ADD KEY `policestation_id` (`policestation_id`);

--
-- Indexes for table `tbl_state`
--
ALTER TABLE `tbl_state`
  ADD PRIMARY KEY (`state_id`);

--
-- Indexes for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  ADD PRIMARY KEY (`subcat_id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `tbl_tips`
--
ALTER TABLE `tbl_tips`
  ADD PRIMARY KEY (`tip_id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `contact` (`contact`);

--
-- Indexes for table `tbl_vehicles`
--
ALTER TABLE `tbl_vehicles`
  ADD PRIMARY KEY (`vid`),
  ADD KEY `policestation_id` (`policestation_id`),
  ADD KEY `fir_id` (`fir_id`);

--
-- Indexes for table `tbl_wanted`
--
ALTER TABLE `tbl_wanted`
  ADD PRIMARY KEY (`wid`);

--
-- Indexes for table `tbl_zone`
--
ALTER TABLE `tbl_zone`
  ADD PRIMARY KEY (`zone_id`),
  ADD KEY `city_id` (`city_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fir_log`
--
ALTER TABLE `fir_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_act`
--
ALTER TABLE `tbl_act`
  MODIFY `act_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_admin_login`
--
ALTER TABLE `tbl_admin_login`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_city`
--
ALTER TABLE `tbl_city`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `tbl_em_number`
--
ALTER TABLE `tbl_em_number`
  MODIFY `em_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `feed_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_fir`
--
ALTER TABLE `tbl_fir`
  MODIFY `fir_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `tbl_home`
--
ALTER TABLE `tbl_home`
  MODIFY `home_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tbl_missing_person`
--
ALTER TABLE `tbl_missing_person`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_news`
--
ALTER TABLE `tbl_news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_notification`
--
ALTER TABLE `tbl_notification`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_policestation`
--
ALTER TABLE `tbl_policestation`
  MODIFY `policestation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_policestation_subuser`
--
ALTER TABLE `tbl_policestation_subuser`
  MODIFY `p_userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_state`
--
ALTER TABLE `tbl_state`
  MODIFY `state_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  MODIFY `subcat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_tips`
--
ALTER TABLE `tbl_tips`
  MODIFY `tip_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `tbl_vehicles`
--
ALTER TABLE `tbl_vehicles`
  MODIFY `vid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_wanted`
--
ALTER TABLE `tbl_wanted`
  MODIFY `wid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_zone`
--
ALTER TABLE `tbl_zone`
  MODIFY `zone_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fir_log`
--
ALTER TABLE `fir_log`
  ADD CONSTRAINT `fir_log_ibfk_1` FOREIGN KEY (`fir_id`) REFERENCES `tbl_fir` (`fir_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_act`
--
ALTER TABLE `tbl_act`
  ADD CONSTRAINT `tbl_act_ibfk_1` FOREIGN KEY (`subcat_id`) REFERENCES `tbl_subcategory` (`subcat_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_city`
--
ALTER TABLE `tbl_city`
  ADD CONSTRAINT `tbl_city_ibfk_1` FOREIGN KEY (`state_id`) REFERENCES `tbl_state` (`state_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD CONSTRAINT `tbl_feedback_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_fir`
--
ALTER TABLE `tbl_fir`
  ADD CONSTRAINT `tbl_fir_ibfk_1` FOREIGN KEY (`subcat_id`) REFERENCES `tbl_subcategory` (`subcat_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_fir_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_fir_ibfk_4` FOREIGN KEY (`p_userid`) REFERENCES `tbl_policestation_subuser` (`p_userid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_fir_ibfk_5` FOREIGN KEY (`policestation_id`) REFERENCES `tbl_policestation` (`policestation_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_home`
--
ALTER TABLE `tbl_home`
  ADD CONSTRAINT `tbl_home_ibfk_1` FOREIGN KEY (`policestation_id`) REFERENCES `tbl_policestation` (`policestation_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_home_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `tbl_user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_missing_person`
--
ALTER TABLE `tbl_missing_person`
  ADD CONSTRAINT `tbl_missing_person_ibfk_1` FOREIGN KEY (`city_id`) REFERENCES `tbl_city` (`city_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_missing_person_ibfk_2` FOREIGN KEY (`fir_id`) REFERENCES `tbl_fir` (`fir_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_policestation`
--
ALTER TABLE `tbl_policestation`
  ADD CONSTRAINT `tbl_policestation_ibfk_1` FOREIGN KEY (`zone_id`) REFERENCES `tbl_zone` (`zone_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_policestation_subuser`
--
ALTER TABLE `tbl_policestation_subuser`
  ADD CONSTRAINT `tbl_policestation_subuser_ibfk_1` FOREIGN KEY (`policestation_id`) REFERENCES `tbl_policestation` (`policestation_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  ADD CONSTRAINT `tbl_subcategory_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `tbl_category` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_tips`
--
ALTER TABLE `tbl_tips`
  ADD CONSTRAINT `tbl_tips_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `tbl_category` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_vehicles`
--
ALTER TABLE `tbl_vehicles`
  ADD CONSTRAINT `tbl_vehicles_ibfk_1` FOREIGN KEY (`policestation_id`) REFERENCES `tbl_policestation` (`policestation_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_vehicles_ibfk_2` FOREIGN KEY (`fir_id`) REFERENCES `tbl_fir` (`fir_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_zone`
--
ALTER TABLE `tbl_zone`
  ADD CONSTRAINT `tbl_zone_ibfk_1` FOREIGN KEY (`city_id`) REFERENCES `tbl_city` (`city_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
