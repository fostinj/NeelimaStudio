-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2019 at 09:17 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mainproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bank`
--

CREATE TABLE `tbl_bank` (
  `bank_id` int(11) NOT NULL,
  `bank_name` varchar(50) NOT NULL,
  `card_type` varchar(50) NOT NULL,
  `account_no` varchar(20) NOT NULL,
  `card_no` varchar(16) NOT NULL,
  `card_name` varchar(50) NOT NULL,
  `month` varchar(20) NOT NULL,
  `year` year(4) NOT NULL,
  `cvv` int(11) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_bank`
--

INSERT INTO `tbl_bank` (`bank_id`, `bank_name`, `card_type`, `account_no`, `card_no`, `card_name`, `month`, `year`, `cvv`, `amount`) VALUES
(1, 'UNION BANK', 'VISA', '8281610409', '2345678909876543', 'Fostin Jacob', 'Feb', 2022, 501, 920000),
(3, 'ICICI', 'MASTER', '9947103148', '9876543212345678', 'Jens Jacob', 'Nov', 2025, 707, 930000),
(4, 'CANARA', 'RUPAY', '9961749019', '9090909090909090', 'Jack Jacob', 'May', 2022, 999, 40000),
(5, 'SBI', 'VISA', '9990008888', '4545454545454545', 'Neelima Studio', 'Jan', 2028, 111, 80000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking`
--

CREATE TABLE `tbl_booking` (
  `booking_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `login_id` int(11) NOT NULL,
  `event` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `location` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `approve` tinyint(4) NOT NULL DEFAULT '0',
  `booked_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_booking`
--

INSERT INTO `tbl_booking` (`booking_id`, `package_id`, `login_id`, `event`, `date`, `location`, `status`, `approve`, `booked_at`) VALUES
(1, 5, 17, 'Wedding', '2019-05-24', 'Kottayam', 1, 0, '2019-05-16 09:05:03'),
(2, 5, 17, 'Engagement', '2019-05-21', 'Ponkunnam', 1, 0, '2019-05-16 09:05:03'),
(3, 5, 17, 'Pre Wedding', '2019-05-17', 'Kottayam', 1, 0, '2019-05-16 09:05:47'),
(4, 5, 17, 'Wedding', '2019-05-23', 'Pala', 1, 0, '2019-05-16 09:05:47'),
(5, 5, 17, 'Wedding', '2019-05-31', 'Pala', 1, 1, '2019-05-16 09:05:47');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking2`
--

CREATE TABLE `tbl_booking2` (
  `booking_id` int(11) NOT NULL,
  `login_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `date1` date NOT NULL,
  `time1` time NOT NULL,
  `location1` varchar(30) NOT NULL,
  `message1` varchar(100) DEFAULT NULL,
  `event2` varchar(100) DEFAULT NULL,
  `date2` date DEFAULT NULL,
  `time2` time DEFAULT NULL,
  `location2` varchar(100) DEFAULT NULL,
  `message2` varchar(100) DEFAULT NULL,
  `event3` varchar(3) DEFAULT NULL,
  `date3` date DEFAULT NULL,
  `time3` time DEFAULT NULL,
  `location3` varchar(100) DEFAULT NULL,
  `message3` varchar(100) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `approve` tinyint(4) NOT NULL DEFAULT '0',
  `booked_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_booking2`
--

INSERT INTO `tbl_booking2` (`booking_id`, `login_id`, `package_id`, `category_id`, `date1`, `time1`, `location1`, `message1`, `event2`, `date2`, `time2`, `location2`, `message2`, `event3`, `date3`, `time3`, `location3`, `message3`, `status`, `approve`, `booked_at`) VALUES
(1, 17, 7, 2, '2019-05-10', '10:00:00', 'Ponkunnam', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2019-05-09 04:22:01'),
(2, 17, 9, 2, '2019-05-09', '10:44:00', 'p', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-05-09 08:35:34');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_calendar`
--

CREATE TABLE `tbl_calendar` (
  `calendar_id` int(11) NOT NULL,
  `event` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(20) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`, `status`) VALUES
(1, 'Christian Wedding', 1),
(2, 'Hindu Wedding', 1),
(3, 'Muslim Wedding', 1),
(4, 'Kids', 1),
(5, 'Modeling', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_designation`
--

CREATE TABLE `tbl_designation` (
  `designation_id` int(11) NOT NULL,
  `designation_name` varchar(20) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_designation`
--

INSERT INTO `tbl_designation` (`designation_id`, `designation_name`, `status`) VALUES
(1, 'Photographer', 1),
(2, 'Videographer', 1),
(3, 'Editor (FCP)', 1),
(4, 'Editor (Premiere)', 1),
(5, 'Designer', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

CREATE TABLE `tbl_district` (
  `district_id` int(11) NOT NULL,
  `district_name` varchar(30) NOT NULL,
  `state_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_district`
--

INSERT INTO `tbl_district` (`district_id`, `district_name`, `state_id`, `status`) VALUES
(1, 'Thiruvananthapuram', 13, 1),
(2, 'Kollam', 13, 1),
(3, 'Alappuzha', 13, 1),
(4, 'Pathanamthitta', 13, 1),
(5, 'Kottayam', 13, 1),
(6, 'Idukki', 13, 1),
(7, 'Ernakulam', 13, 1),
(8, 'Thrissur', 13, 1),
(9, 'Palakkad', 13, 1),
(10, 'Malappuram', 13, 1),
(11, 'Kozhikode', 13, 1),
(12, 'Wayanad', 13, 1),
(13, 'Kannur', 13, 1),
(14, 'Kasaragod', 13, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gallery`
--

CREATE TABLE `tbl_gallery` (
  `gallery_id` int(11) NOT NULL,
  `image_name` varchar(500) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_gallery`
--

INSERT INTO `tbl_gallery` (`gallery_id`, `image_name`, `created_at`, `status`) VALUES
(1, '12512463_1046935092032950_7276965856082103342_n.jpg', '2019-05-12 11:48:07', 1),
(2, '14358742_1186088071450984_1077463630050216307_n.jpg', '2019-05-12 11:48:07', 1),
(3, '40613863_1957499294309854_8649645830099173376_n.jpg', '2019-05-15 03:33:06', 1),
(4, '40840062_1957499700976480_637852782904213504_n.jpg', '2019-05-15 03:33:06', 1),
(5, '45054119_2025797770813339_1211950667539677184_n.jpg', '2019-05-15 03:33:06', 1),
(6, '45828278_2049446118448504_6238915192621629440_n.jpg', '2019-05-15 03:33:06', 1),
(7, '46104894_2049445951781854_4271437949029056512_n.jpg', '2019-05-15 03:33:06', 1),
(8, '46446953_2054540491272400_1517345055856132096_n.jpg', '2019-05-15 03:33:06', 1),
(9, '16939172_1355010934558696_8810424960199399693_n.jpg', '2019-05-15 03:34:43', 1),
(10, '18403264_1438576399535482_1470422211812621051_n.jpg', '2019-05-15 03:34:43', 1),
(11, '22090021_1575839422475845_5842360736310618978_n.jpg', '2019-05-15 03:34:43', 1),
(12, '24129786_1628614033865050_3880515434061004847_n.jpg', '2019-05-15 03:34:43', 1),
(13, '32508359_1796646640395121_4071956363310268416_n.jpg', '2019-05-15 03:34:43', 1),
(14, '32590559_1797152987011153_1197653928297103360_n.jpg', '2019-05-15 03:34:43', 1),
(15, '32640612_1796646070395178_7864293570918744064_n.jpg', '2019-05-15 03:34:43', 1),
(16, '35294500_1844479915611793_6310114699438456832_n.jpg', '2019-05-15 03:34:43', 1),
(17, '35416427_1829733413753110_7937760189107666944_n.jpg', '2019-05-15 03:34:43', 1),
(18, '36965863_1872019759524475_8585003509982691328_n.jpg', '2019-05-15 03:34:43', 1),
(19, '37091475_1875098829216568_5035421848263720960_n.jpg', '2019-05-15 03:34:43', 1),
(20, '37224045_1879183618808089_8705527933055270912_n.jpg', '2019-05-15 03:34:43', 1),
(21, '37913766_1898662410193543_8595236192256000000_n.jpg', '2019-05-15 03:34:43', 1),
(22, '35834406_1834699836589801_7862006883085713408_n.jpg', '2019-05-15 03:35:39', 1),
(23, '37926357_1898662723526845_4313163010848849920_n.jpg', '2019-05-15 03:35:39', 1),
(24, '38071386_1903566316369819_2122538005498429440_n.jpg', '2019-05-15 03:35:39', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jobapplicants`
--

CREATE TABLE `tbl_jobapplicants` (
  `applicants_id` int(11) NOT NULL,
  `login_id` int(11) NOT NULL,
  `vacancy_id` int(11) NOT NULL,
  `experience_proof` varchar(1000) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `approve` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jobapplicants`
--

INSERT INTO `tbl_jobapplicants` (`applicants_id`, `login_id`, `vacancy_id`, `experience_proof`, `status`, `approve`, `created_at`) VALUES
(1, 17, 4, 'Timin Resume.pdf', 1, 0, '2019-05-16 09:22:56');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE `tbl_login` (
  `login_id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`login_id`, `email`, `password`, `user_id`, `status`) VALUES
(1, 'neelimapodimattom@gmail.com', '43f3e876a09ad48e47abdd110d38be6ad9c911df', 1, 1),
(13, 'akashpsuresh@gmail.com', 'e4cf979cf717fd295f4e4edc427ee1aee78fa7dc', 2, 1),
(15, 'anandhus@gmail.com', 'ababe7c469d6d93b540f3cde5db997d02ee496fb', 2, 0),
(16, 'ajilsunny@gmail.com', '240c4a715bd5ebdaf05f09a58efaf366626a849b', 2, 1),
(17, 'sanjay@gmail.com', '25ecbcb559d14a98e4665d6830ac5c99991d7c25', 2, 1),
(18, 'photofastkply@gmail.com', '31c982fd8687bbef9c3aea3d93eec9f2fdd3412b', 4, 1),
(21, 'fostinj@gmail.com', '797d645b44729936f034cc3868c02fffdd9a0ad8', 3, 1),
(22, 'nikhilpjose@gmail.com', '6ceeb954b0717be82f626e3b37fbbd7941171b3b', 2, 0),
(23, 'alan@gmail.com', '93a6742abd1bcf98fcbad51928ab772702fb0998', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lreg`
--

CREATE TABLE `tbl_lreg` (
  `lreg_id` int(11) NOT NULL,
  `lab_name` varchar(30) NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `image` varchar(1000) NOT NULL,
  `login_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_lreg`
--

INSERT INTO `tbl_lreg` (`lreg_id`, `lab_name`, `mobile`, `image`, `login_id`, `created_at`) VALUES
(1, 'Photofast', 9878767850, 'slide01.jpg', 18, '2019-04-29 09:33:46');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notification`
--

CREATE TABLE `tbl_notification` (
  `notification_id` int(11) NOT NULL,
  `notification_subject` varchar(100) NOT NULL,
  `notification_text` varchar(500) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_notification`
--

INSERT INTO `tbl_notification` (`notification_id`, `notification_subject`, `notification_text`, `status`) VALUES
(1, 'test', 'test', 1),
(2, 'test2', 'noti', 1),
(3, 'hello', 'sbdjs', 1),
(4, 'akash', 'wer', 1),
(5, 'ghgf', 'fvvf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_package`
--

CREATE TABLE `tbl_package` (
  `package_id` int(11) NOT NULL,
  `package_name` varchar(100) NOT NULL,
  `category_id` int(11) NOT NULL,
  `type_id` int(11) DEFAULT NULL,
  `event` varchar(100) NOT NULL,
  `photography` varchar(50) NOT NULL,
  `videography` varchar(50) NOT NULL,
  `services` varchar(100) NOT NULL,
  `album_output` varchar(500) NOT NULL,
  `video_output` varchar(500) NOT NULL,
  `package_rate` int(11) NOT NULL,
  `package_details` varchar(500) NOT NULL,
  `payment_details` varchar(500) NOT NULL,
  `image` varchar(1000) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_package`
--

INSERT INTO `tbl_package` (`package_id`, `package_name`, `category_id`, `type_id`, `event`, `photography`, `videography`, `services`, `album_output`, `video_output`, `package_rate`, `package_details`, `payment_details`, `image`, `status`) VALUES
(5, 'Basic', 1, 1, 'Engagement + Wedding', '2', '2', 'Photography + Videography', '60leaf/120pages album (12\"x15\") using premium material', 'Full HD video + Highlights', 60000, 'Few photos for social media usage within 48hrs.', '10000', '14264095_1184416544951470_6591101263638252356_n.jpg', 1),
(6, 'Single Side Bride', 1, 1, 'Engagement + Wedding', '3', '2', 'Photography + Videography + Candid Photography', '60leaf/120pages (12\"x15\") album in premium quality', 'Full HD video + Highlights', 65000, 'Few photos will be given for social media usage within 48hrs', '10000', '18892910_1464478616945260_3494791797317501517_n.jpg', 1),
(7, 'Premium', 2, 1, 'Engagement + Wedding', '3', '3', 'Photography + Videography + Candid Photography + Candid Videography', '60 leaf/120 pages (12\"x15\") album in premium quality', 'Full HD video + Highlights', 90000, 'Includes mini album + calander', '10000', '12301715_993460684047058_8510007162439545405_n.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_package2`
--

CREATE TABLE `tbl_package2` (
  `package_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `services_id` int(11) NOT NULL,
  `package_name` varchar(20) NOT NULL,
  `image` varchar(1000) NOT NULL,
  `package_rate` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_package2`
--

INSERT INTO `tbl_package2` (`package_id`, `category_id`, `subcategory_id`, `services_id`, `package_name`, `image`, `package_rate`, `status`) VALUES
(7, 0, 0, 0, 'Premium', 'Amal.jpg', 100000, 1),
(9, 0, 0, 0, 'Basic', '18892910_1464478616945260_3494791797317501517_n.jpg', 45000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pincode`
--

CREATE TABLE `tbl_pincode` (
  `pincode_id` int(11) NOT NULL,
  `pincode` bigint(20) NOT NULL,
  `district_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE `tbl_products` (
  `product_id` int(11) NOT NULL,
  `producttype_id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_description` varchar(500) NOT NULL,
  `product_rate` int(11) NOT NULL,
  `product_code` varchar(20) NOT NULL,
  `product_image` varchar(1000) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`product_id`, `producttype_id`, `product_name`, `product_description`, `product_rate`, `product_code`, `product_image`, `status`) VALUES
(1, 1, 'Canon 5D Mark IV', '2014 model', 100000, '', 'index.jpg', 1),
(2, 2, 'Canon 85mm', '1.4', 50000, '', 'canon_ef_85mm_f_1_4l_is_1354803.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_producttypes`
--

CREATE TABLE `tbl_producttypes` (
  `producttype_id` int(11) NOT NULL,
  `producttype_name` varchar(50) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_producttypes`
--

INSERT INTO `tbl_producttypes` (`producttype_id`, `producttype_name`, `status`) VALUES
(1, 'Camera', 1),
(2, 'Lens', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rating`
--

CREATE TABLE `tbl_rating` (
  `rating_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `login_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_rating`
--

INSERT INTO `tbl_rating` (`rating_id`, `package_id`, `login_id`, `rating`) VALUES
(1, 5, 17, 5),
(2, 6, 17, 5),
(3, 7, 17, 5),
(4, 5, 23, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_religion`
--

CREATE TABLE `tbl_religion` (
  `religion_id` int(11) NOT NULL,
  `religion_name` varchar(20) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_religion`
--

INSERT INTO `tbl_religion` (`religion_id`, `religion_name`, `status`) VALUES
(1, 'Christian', 1),
(2, 'Hindu', 1),
(3, 'Muslim', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_remainder`
--

CREATE TABLE `tbl_remainder` (
  `remainder_id` int(11) NOT NULL,
  `event` varchar(100) NOT NULL,
  `details` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_remainder2`
--

CREATE TABLE `tbl_remainder2` (
  `remainder_id` int(11) NOT NULL,
  `event` varchar(100) NOT NULL,
  `event_date` date NOT NULL,
  `booked_photographer` varchar(100) NOT NULL,
  `photographer_mobile` bigint(10) NOT NULL,
  `booked_videographer` varchar(100) NOT NULL,
  `videographer_mobile` bigint(10) NOT NULL,
  `status` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_remainder2`
--

INSERT INTO `tbl_remainder2` (`remainder_id`, `event`, `event_date`, `booked_photographer`, `photographer_mobile`, `booked_videographer`, `videographer_mobile`, `status`) VALUES
(1, 'Wedding', '2019-05-09', 'Fostin', 8281610409, 'Jobin', 9898786765, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role`
--

CREATE TABLE `tbl_role` (
  `roleid` int(11) NOT NULL,
  `role_type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_role`
--

INSERT INTO `tbl_role` (`roleid`, `role_type`) VALUES
(1, 'admin'),
(2, 'user'),
(3, 'staff'),
(4, 'lab');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_services`
--

CREATE TABLE `tbl_services` (
  `services_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `services_name` varchar(100) NOT NULL,
  `services_rate` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_services`
--

INSERT INTO `tbl_services` (`services_id`, `category_id`, `subcategory_id`, `services_name`, `services_rate`, `status`) VALUES
(1, 1, 1, 'Photography', 6000, 1),
(2, 1, 1, 'Videography', 8000, 1),
(3, 1, 2, 'Photography', 8000, 1),
(4, 1, 2, 'Videography', 8000, 1),
(5, 1, 2, 'Candid Photography', 10000, 1),
(6, 1, 2, 'Candid Photography', 10000, 1),
(7, 1, 2, 'Helicam', 8000, 1),
(8, 1, 5, 'Photography', 6000, 1),
(9, 1, 6, 'Photography', 6000, 1),
(10, 1, 8, 'Photography', 8000, 1),
(11, 1, 8, 'Candid Photography', 10000, 1),
(12, 1, 8, 'Videography', 8000, 1),
(13, 1, 8, 'Candid Videography', 10000, 1),
(14, 1, 8, 'Helicam', 8000, 1),
(15, 1, 9, 'Photography', 6000, 1),
(16, 1, 9, 'Videography', 8000, 1),
(17, 2, 10, 'Photography', 8000, 1),
(18, 2, 10, 'Videography', 8000, 1),
(19, 2, 10, 'Candid Photography', 10000, 1),
(20, 2, 10, 'Candid Videography', 10000, 1),
(21, 2, 10, 'Helicam', 8000, 1),
(22, 2, 11, 'Photography', 6000, 1),
(23, 2, 11, 'Videography', 7000, 1),
(24, 2, 12, 'Photography', 8000, 1),
(26, 2, 12, 'Candid Photography', 10000, 1),
(27, 2, 12, 'Candid Photography', 10000, 1),
(28, 2, 12, 'Candid Videography', 10000, 1),
(29, 2, 13, 'Photography', 6000, 1),
(30, 2, 13, 'Videography', 8000, 1),
(31, 2, 14, 'Photography', 6000, 1),
(32, 2, 14, 'Videography', 8000, 1),
(33, 1, 1, 'Photography', 6000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_servicesbooking`
--

CREATE TABLE `tbl_servicesbooking` (
  `servicesbooking_id` int(11) NOT NULL,
  `login_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `services_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `location` varchar(100) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `approve` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_servicesbooking`
--

INSERT INTO `tbl_servicesbooking` (`servicesbooking_id`, `login_id`, `category_id`, `subcategory_id`, `services_id`, `date`, `location`, `added_on`, `status`, `approve`) VALUES
(1, 13, 1, 1, 2, '2019-05-17', 'Ponkunnam', '2019-05-16 08:37:46', 1, 0),
(2, 13, 1, 2, 2, '2019-05-17', 'Ponkunnam', '2019-05-16 08:37:46', 1, 0),
(3, 17, 1, 1, 1, '2019-05-22', 'Ponku', '2019-05-16 09:19:45', 1, 0),
(4, 17, 1, 1, 1, '2019-05-29', 'Pl', '2019-05-16 09:19:46', 1, 0),
(5, 17, 1, 1, 2, '2019-05-22', 'Ponku', '2019-05-16 09:19:46', 1, 0),
(6, 17, 1, 1, 2, '2019-05-29', 'Pl', '2019-05-16 09:19:46', 1, 0),
(7, 17, 1, 6, 1, '2019-05-22', 'Ponku', '2019-05-16 09:19:46', 1, 0),
(8, 17, 1, 6, 1, '2019-05-29', 'Pl', '2019-05-16 09:19:46', 1, 0),
(9, 17, 1, 6, 2, '2019-05-22', 'Ponku', '2019-05-16 09:19:46', 1, 0),
(10, 17, 1, 6, 2, '2019-05-29', 'Pl', '2019-05-16 09:19:46', 1, 0),
(11, 17, 1, 8, 1, '2019-05-22', 'Ponku', '2019-05-16 09:19:46', 1, 0),
(12, 17, 1, 8, 1, '2019-05-29', 'Pl', '2019-05-16 09:19:46', 1, 0),
(13, 17, 1, 8, 2, '2019-05-22', 'Ponku', '2019-05-16 09:19:46', 1, 0),
(14, 17, 1, 8, 2, '2019-05-29', 'Pl', '2019-05-16 09:19:46', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sreg`
--

CREATE TABLE `tbl_sreg` (
  `sreg_id` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `image` varchar(1000) NOT NULL,
  `designation_id` int(11) NOT NULL,
  `login_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sreg`
--

INSERT INTO `tbl_sreg` (`sreg_id`, `first_name`, `last_name`, `mobile`, `image`, `designation_id`, `login_id`, `created_at`) VALUES
(1, 'Fostin', 'J Thoomkuzhy', 8281610409, 'pp.jpg', 1, 21, '2019-04-29 13:46:39');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_state`
--

CREATE TABLE `tbl_state` (
  `state_id` int(11) NOT NULL,
  `state_name` varchar(30) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_state`
--

INSERT INTO `tbl_state` (`state_id`, `state_name`, `status`) VALUES
(1, 'Andhra Pradesh', 1),
(2, 'Arunachal Pradesh', 1),
(3, 'Assam', 1),
(4, 'Bihar', 1),
(5, 'Chhattisgarh', 1),
(6, 'Goa', 1),
(7, 'Gujarat', 1),
(8, 'Haryana', 1),
(9, 'Himachal Pradesh', 1),
(10, 'Jammu and Kashmir', 1),
(11, 'Jharkhand', 1),
(12, 'Karnataka', 1),
(13, 'Kerala', 1),
(14, 'Madhya Pradesh', 1),
(15, 'Maharashtra', 1),
(16, 'Manipur', 1),
(17, 'Meghalaya', 1),
(18, 'Mizoram', 1),
(19, 'Nagaland', 1),
(20, 'Odisha', 1),
(21, 'Punjab', 1),
(22, 'Rajasthan', 1),
(23, 'Sikkim', 1),
(24, 'Tamil Nadu', 1),
(25, 'Telangana', 1),
(26, 'Tripura', 1),
(27, 'Uttar Pradesh', 1),
(28, 'Uttarakhand', 1),
(29, 'West Bengal', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subcategory`
--

CREATE TABLE `tbl_subcategory` (
  `subcategory_id` int(11) NOT NULL,
  `subcategory_name` varchar(100) NOT NULL,
  `category_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_subcategory`
--

INSERT INTO `tbl_subcategory` (`subcategory_id`, `subcategory_name`, `category_id`, `status`) VALUES
(1, 'Pre Wedding Shoot', 1, 1),
(2, 'Engagement Shoot', 1, 1),
(5, 'Engagement Eve', 1, 1),
(6, 'Wedding Eve', 1, 1),
(8, 'Wedding Shoot', 1, 1),
(9, 'Post Wedding Shoot', 1, 1),
(10, 'Engagement Shoot', 2, 1),
(11, 'Mylanchi', 2, 1),
(12, 'Wedding Shoot', 2, 1),
(13, 'Pre Wedding Shoot', 2, 1),
(14, 'Post Wedding Shoot', 2, 1),
(15, 'Pre Wedding Shoot', 3, 1),
(16, 'Engagement Shoot', 3, 1),
(17, 'Mylanchi', 3, 1),
(18, 'Wedding Shoot', 3, 1),
(19, 'Post wedding Shoot', 3, 1),
(20, 'Baptism', 4, 1),
(21, 'Kids Shoot', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_type`
--

CREATE TABLE `tbl_type` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(20) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_type`
--

INSERT INTO `tbl_type` (`type_id`, `type_name`, `status`) VALUES
(1, 'Single Side Bride', 1),
(2, 'Single Side Groom', 1),
(3, 'Bride and Groom', 1),
(4, 'Other', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ureg`
--

CREATE TABLE `tbl_ureg` (
  `ureg_id` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `image` varchar(1000) NOT NULL,
  `login_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ureg`
--

INSERT INTO `tbl_ureg` (`ureg_id`, `first_name`, `last_name`, `mobile`, `image`, `login_id`, `created_at`) VALUES
(8, 'Akash', 'P Suresh', 8987890987, 'ÿØÿà\0JFIF\0\0`\0`\0\0ÿá1Exif\0\0MM\0*\0\0\0\0\0\0\0\0\0\0\01\0\0\0\0\0\0V‡i\0\0\0\0\0\0bˆ%\0\0\0\0\0\0 Úê\0\0\0\0\0\0J\0\0\0\0ê\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 13, '2019-04-26 14:33:28'),
(9, 'Anandhu', 'Subash', 8987678765, 'WIN_20181026_15_05_04_Pro.jpg', 15, '2019-04-28 14:03:02'),
(10, 'Ajil', 'Sunny', 9878987678, 'WIN_20181026_15_04_33_Pro.jpg', 16, '2019-04-29 06:32:14'),
(11, 'Sanjay', 'E S', 9898787678, 'sampath reddy.jpg', 17, '2019-04-29 06:42:30'),
(12, 'Nikhil', 'P Jose', 9995557590, 'download links.rtf', 22, '2019-04-30 01:15:04'),
(13, 'Alan martin', 'jose', 9876543213, 'Screenshot (8).png', 23, '2019-05-16 04:21:08');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vacancy`
--

CREATE TABLE `tbl_vacancy` (
  `vacancy_id` int(11) NOT NULL,
  `designation_id` int(11) NOT NULL,
  `vacancy_number` int(11) NOT NULL,
  `experience` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_vacancy`
--

INSERT INTO `tbl_vacancy` (`vacancy_id`, `designation_id`, `vacancy_number`, `experience`, `description`, `status`) VALUES
(1, 3, 1, 'More than 3 years', 'for working in studio', 0),
(2, 3, 1, 'More than 3 years', 'for working in studio', 0),
(3, 4, 1, 'More than 3 years', 'For working in studio. Salary will be given based on the number of works.', 1),
(4, 5, 1, 'Well experienced', 'Need to know Lightroom as well', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_bank`
--
ALTER TABLE `tbl_bank`
  ADD PRIMARY KEY (`bank_id`);

--
-- Indexes for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `login_id` (`login_id`),
  ADD KEY `package_id` (`package_id`);

--
-- Indexes for table `tbl_booking2`
--
ALTER TABLE `tbl_booking2`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `login_id` (`login_id`),
  ADD KEY `package_id` (`package_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `tbl_calendar`
--
ALTER TABLE `tbl_calendar`
  ADD PRIMARY KEY (`calendar_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_designation`
--
ALTER TABLE `tbl_designation`
  ADD PRIMARY KEY (`designation_id`);

--
-- Indexes for table `tbl_district`
--
ALTER TABLE `tbl_district`
  ADD PRIMARY KEY (`district_id`),
  ADD KEY `state_id` (`state_id`);

--
-- Indexes for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  ADD PRIMARY KEY (`gallery_id`);

--
-- Indexes for table `tbl_jobapplicants`
--
ALTER TABLE `tbl_jobapplicants`
  ADD PRIMARY KEY (`applicants_id`),
  ADD KEY `login_id` (`login_id`),
  ADD KEY `vacancy_id` (`vacancy_id`);

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `tbl_lreg`
--
ALTER TABLE `tbl_lreg`
  ADD PRIMARY KEY (`lreg_id`),
  ADD KEY `login_id` (`login_id`);

--
-- Indexes for table `tbl_notification`
--
ALTER TABLE `tbl_notification`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `tbl_package`
--
ALTER TABLE `tbl_package`
  ADD PRIMARY KEY (`package_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `type_id` (`type_id`);

--
-- Indexes for table `tbl_package2`
--
ALTER TABLE `tbl_package2`
  ADD PRIMARY KEY (`package_id`);

--
-- Indexes for table `tbl_pincode`
--
ALTER TABLE `tbl_pincode`
  ADD PRIMARY KEY (`pincode_id`),
  ADD KEY `district_id` (`district_id`);

--
-- Indexes for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `producttype_id` (`producttype_id`);

--
-- Indexes for table `tbl_producttypes`
--
ALTER TABLE `tbl_producttypes`
  ADD PRIMARY KEY (`producttype_id`);

--
-- Indexes for table `tbl_rating`
--
ALTER TABLE `tbl_rating`
  ADD PRIMARY KEY (`rating_id`),
  ADD KEY `package_id` (`package_id`),
  ADD KEY `login_id` (`login_id`);

--
-- Indexes for table `tbl_religion`
--
ALTER TABLE `tbl_religion`
  ADD PRIMARY KEY (`religion_id`);

--
-- Indexes for table `tbl_remainder2`
--
ALTER TABLE `tbl_remainder2`
  ADD PRIMARY KEY (`remainder_id`);

--
-- Indexes for table `tbl_role`
--
ALTER TABLE `tbl_role`
  ADD PRIMARY KEY (`roleid`);

--
-- Indexes for table `tbl_services`
--
ALTER TABLE `tbl_services`
  ADD PRIMARY KEY (`services_id`),
  ADD KEY `subcategory_id` (`subcategory_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `tbl_servicesbooking`
--
ALTER TABLE `tbl_servicesbooking`
  ADD PRIMARY KEY (`servicesbooking_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `subcategory_id` (`subcategory_id`),
  ADD KEY `services_id` (`services_id`),
  ADD KEY `login_id` (`login_id`);

--
-- Indexes for table `tbl_sreg`
--
ALTER TABLE `tbl_sreg`
  ADD PRIMARY KEY (`sreg_id`),
  ADD KEY `login_id` (`login_id`),
  ADD KEY `designation_id` (`designation_id`);

--
-- Indexes for table `tbl_state`
--
ALTER TABLE `tbl_state`
  ADD PRIMARY KEY (`state_id`);

--
-- Indexes for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  ADD PRIMARY KEY (`subcategory_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `tbl_type`
--
ALTER TABLE `tbl_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `tbl_ureg`
--
ALTER TABLE `tbl_ureg`
  ADD PRIMARY KEY (`ureg_id`),
  ADD KEY `login_id` (`login_id`);

--
-- Indexes for table `tbl_vacancy`
--
ALTER TABLE `tbl_vacancy`
  ADD PRIMARY KEY (`vacancy_id`),
  ADD KEY `designation_id` (`designation_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_bank`
--
ALTER TABLE `tbl_bank`
  MODIFY `bank_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_booking2`
--
ALTER TABLE `tbl_booking2`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_calendar`
--
ALTER TABLE `tbl_calendar`
  MODIFY `calendar_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_designation`
--
ALTER TABLE `tbl_designation`
  MODIFY `designation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_district`
--
ALTER TABLE `tbl_district`
  MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  MODIFY `gallery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_jobapplicants`
--
ALTER TABLE `tbl_jobapplicants`
  MODIFY `applicants_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_lreg`
--
ALTER TABLE `tbl_lreg`
  MODIFY `lreg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_notification`
--
ALTER TABLE `tbl_notification`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_package`
--
ALTER TABLE `tbl_package`
  MODIFY `package_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_package2`
--
ALTER TABLE `tbl_package2`
  MODIFY `package_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_pincode`
--
ALTER TABLE `tbl_pincode`
  MODIFY `pincode_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_producttypes`
--
ALTER TABLE `tbl_producttypes`
  MODIFY `producttype_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_rating`
--
ALTER TABLE `tbl_rating`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_religion`
--
ALTER TABLE `tbl_religion`
  MODIFY `religion_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_remainder2`
--
ALTER TABLE `tbl_remainder2`
  MODIFY `remainder_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_role`
--
ALTER TABLE `tbl_role`
  MODIFY `roleid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_services`
--
ALTER TABLE `tbl_services`
  MODIFY `services_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tbl_servicesbooking`
--
ALTER TABLE `tbl_servicesbooking`
  MODIFY `servicesbooking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_sreg`
--
ALTER TABLE `tbl_sreg`
  MODIFY `sreg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_state`
--
ALTER TABLE `tbl_state`
  MODIFY `state_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  MODIFY `subcategory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_type`
--
ALTER TABLE `tbl_type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_ureg`
--
ALTER TABLE `tbl_ureg`
  MODIFY `ureg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_vacancy`
--
ALTER TABLE `tbl_vacancy`
  MODIFY `vacancy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD CONSTRAINT `tbl_booking_ibfk_1` FOREIGN KEY (`login_id`) REFERENCES `tbl_login` (`login_id`),
  ADD CONSTRAINT `tbl_booking_ibfk_2` FOREIGN KEY (`package_id`) REFERENCES `tbl_package` (`package_id`);

--
-- Constraints for table `tbl_booking2`
--
ALTER TABLE `tbl_booking2`
  ADD CONSTRAINT `tbl_booking2_ibfk_1` FOREIGN KEY (`login_id`) REFERENCES `tbl_login` (`login_id`),
  ADD CONSTRAINT `tbl_booking2_ibfk_2` FOREIGN KEY (`package_id`) REFERENCES `tbl_package2` (`package_id`);

--
-- Constraints for table `tbl_district`
--
ALTER TABLE `tbl_district`
  ADD CONSTRAINT `tbl_district_ibfk_1` FOREIGN KEY (`state_id`) REFERENCES `tbl_state` (`state_id`);

--
-- Constraints for table `tbl_jobapplicants`
--
ALTER TABLE `tbl_jobapplicants`
  ADD CONSTRAINT `tbl_jobapplicants_ibfk_1` FOREIGN KEY (`login_id`) REFERENCES `tbl_login` (`login_id`),
  ADD CONSTRAINT `tbl_jobapplicants_ibfk_2` FOREIGN KEY (`vacancy_id`) REFERENCES `tbl_vacancy` (`vacancy_id`);

--
-- Constraints for table `tbl_lreg`
--
ALTER TABLE `tbl_lreg`
  ADD CONSTRAINT `tbl_lreg_ibfk_1` FOREIGN KEY (`login_id`) REFERENCES `tbl_login` (`login_id`);

--
-- Constraints for table `tbl_package`
--
ALTER TABLE `tbl_package`
  ADD CONSTRAINT `tbl_package_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `tbl_category` (`category_id`),
  ADD CONSTRAINT `tbl_package_ibfk_4` FOREIGN KEY (`type_id`) REFERENCES `tbl_type` (`type_id`);

--
-- Constraints for table `tbl_pincode`
--
ALTER TABLE `tbl_pincode`
  ADD CONSTRAINT `tbl_pincode_ibfk_1` FOREIGN KEY (`district_id`) REFERENCES `tbl_district` (`district_id`);

--
-- Constraints for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD CONSTRAINT `tbl_products_ibfk_1` FOREIGN KEY (`producttype_id`) REFERENCES `tbl_producttypes` (`producttype_id`);

--
-- Constraints for table `tbl_rating`
--
ALTER TABLE `tbl_rating`
  ADD CONSTRAINT `tbl_rating_ibfk_1` FOREIGN KEY (`package_id`) REFERENCES `tbl_package` (`package_id`),
  ADD CONSTRAINT `tbl_rating_ibfk_2` FOREIGN KEY (`login_id`) REFERENCES `tbl_login` (`login_id`);

--
-- Constraints for table `tbl_services`
--
ALTER TABLE `tbl_services`
  ADD CONSTRAINT `tbl_services_ibfk_1` FOREIGN KEY (`subcategory_id`) REFERENCES `tbl_subcategory` (`subcategory_id`),
  ADD CONSTRAINT `tbl_services_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `tbl_category` (`category_id`);

--
-- Constraints for table `tbl_servicesbooking`
--
ALTER TABLE `tbl_servicesbooking`
  ADD CONSTRAINT `tbl_servicesbooking_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `tbl_category` (`category_id`),
  ADD CONSTRAINT `tbl_servicesbooking_ibfk_2` FOREIGN KEY (`subcategory_id`) REFERENCES `tbl_subcategory` (`subcategory_id`),
  ADD CONSTRAINT `tbl_servicesbooking_ibfk_3` FOREIGN KEY (`services_id`) REFERENCES `tbl_services` (`services_id`),
  ADD CONSTRAINT `tbl_servicesbooking_ibfk_4` FOREIGN KEY (`login_id`) REFERENCES `tbl_login` (`login_id`);

--
-- Constraints for table `tbl_sreg`
--
ALTER TABLE `tbl_sreg`
  ADD CONSTRAINT `tbl_sreg_ibfk_1` FOREIGN KEY (`login_id`) REFERENCES `tbl_login` (`login_id`),
  ADD CONSTRAINT `tbl_sreg_ibfk_2` FOREIGN KEY (`designation_id`) REFERENCES `tbl_designation` (`designation_id`);

--
-- Constraints for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  ADD CONSTRAINT `tbl_subcategory_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `tbl_category` (`category_id`);

--
-- Constraints for table `tbl_ureg`
--
ALTER TABLE `tbl_ureg`
  ADD CONSTRAINT `tbl_ureg_ibfk_1` FOREIGN KEY (`login_id`) REFERENCES `tbl_login` (`login_id`);

--
-- Constraints for table `tbl_vacancy`
--
ALTER TABLE `tbl_vacancy`
  ADD CONSTRAINT `tbl_vacancy_ibfk_1` FOREIGN KEY (`designation_id`) REFERENCES `tbl_designation` (`designation_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
