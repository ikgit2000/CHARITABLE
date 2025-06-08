-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2025 at 07:39 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `charitable`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `lastname` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `firstname`, `lastname`, `email`, `password`) VALUES
(2, 'roshana', 'fernando', 'roshana@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `admin_details`
--

CREATE TABLE `admin_details` (
  `A_ID` int(11) NOT NULL,
  `A_Name` varchar(255) NOT NULL,
  `A_Email` varchar(255) NOT NULL,
  `A_Password` varchar(255) NOT NULL,
  `A_Profile-img` varchar(255) DEFAULT NULL,
  `A_DateAssigned` date NOT NULL,
  `A_Phone` varchar(20) NOT NULL,
  `User_Id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_details`
--

INSERT INTO `admin_details` (`A_ID`, `A_Name`, `A_Email`, `A_Password`, `A_Profile-img`, `A_DateAssigned`, `A_Phone`, `User_Id`) VALUES
(9, 'nishan', 'nishan@gmail.com', '$2y$10$Px0bdscEXAqsQlYqLR1k.uxV3rE0UsDyVntn6fm9b8TJMR5zTlZCy', NULL, '2023-02-03', '0772094501', 56),
(10, 'Kavishka Fernando', 'kavishkafernando64@gmail.com', '$2y$10$eGhGcJiHOqJP6EXGiXFDt.xL7F0hkaAXVokdB4ilJqg7/g4xNqaYO', NULL, '2023-02-11', '0772094501', 44),
(11, 'Nishan Madhushaka', 'nishanmadhushanka821@gmail.com', '$2y$10$A4yabgvCqweuRJ.J3yofbeWIzxlnHZA7pip1NgWgSI3kol8joSetq', NULL, '2023-05-16', '0412356987', 70),
(12, 'Anushka Rajapaksha', 'anushka@gmail.com', '$2y$10$C8ImkLM4nrPbixWclMEIPOg1hQhY6NCrS97i7Ohdx30nkKi4a.952', NULL, '2023-05-17', '0412356987', 94);

-- --------------------------------------------------------

--
-- Table structure for table `beneficiary_details`
--

CREATE TABLE `beneficiary_details` (
  `B_Id` int(11) NOT NULL,
  `B_Name` varchar(255) NOT NULL,
  `B_Address` varchar(255) NOT NULL,
  `B_Tpno` varchar(20) NOT NULL,
  `B_Description` mediumtext DEFAULT NULL,
  `B_Password` varchar(100) NOT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `B_Members` int(100) DEFAULT NULL,
  `document` varchar(255) DEFAULT NULL,
  `B_Email` text NOT NULL,
  `B_Type` enum('Elder Home','Children Home','Disabled Institute','Other') NOT NULL DEFAULT 'Other',
  `latitude` varchar(100) DEFAULT NULL,
  `longitude` varchar(100) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 0,
  `otp` int(100) DEFAULT NULL,
  `User_Id` int(11) NOT NULL DEFAULT 1,
  `status_2` varchar(50) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `beneficiary_details`
--

INSERT INTO `beneficiary_details` (`B_Id`, `B_Name`, `B_Address`, `B_Tpno`, `B_Description`, `B_Password`, `profile_image`, `B_Members`, `document`, `B_Email`, `B_Type`, `latitude`, `longitude`, `status`, `otp`, `User_Id`, `status_2`) VALUES
(12, 'Colombo Haven', '388/9E kularathna mawatha, Kimbulapitiya road, Colombo', '0772094501', 'Colombo Haven: A compassionate refuge in the heart of Colombo, providing shelter, education, and love to vulnerable children. With dedicated staff, nutritious meals, and engaging activities, we create a safe haven for children facing adversity. Rebuilding lives, fostering resilience, and empowering them for a brighter future.', '$2y$10$ma/MLanMBFDlgxxSvRorjOk.UuZUS8t3NFLemRXgwo33nPqqHNEeC', NULL, 400, NULL, 'kavishkafernando64@gmail.com', 'Other', '6.9497\r\n', '80.7891\r\n', 1, 0, 44, 'approved'),
(20, 'nishan', '388/9E kularathna mawatha, Kimbulapitiya road, Negombo', '0772094501', NULL, '$2y$10$HZnYcwA.VqDRCwz6KzhN8uKI/vm3fr94H.G.8tCIpH/jBqGVrY9Re', NULL, 200, NULL, 'nishanmadhushanka821@gmail.com', 'Other', '7.872555793171608', '80.00848546142578', 0, 562551, 70, 'approved'),
(21, 'dinith', '388/9E kularathna mawatha, Kimbulapitiya road, Negombo', '0772094501', NULL, '$2y$10$5avmLrSPdxNYNjre13fGTO00WWmKdsLfH.0Jd1GduCMNQ5t7eWBlu', NULL, 150, NULL, 'dinithwalpitagama@gmail.com', 'Other', '6.948230157681926', '80.07268681640625', 0, 396483, 71, 'approved'),
(22, 'UOC', '388/9E kularathna mawatha, Kimbulapitiya road, Negombo', '0772094501', NULL, '$2y$10$C32nAr7Bz4CG.BCX3iBREuGw9EM4F7W56M48e9GEHxqgVtcZmaDEm', NULL, 100, NULL, 'kavishkafernando6114@gmail.com', 'Other', '6.92539591373196', '79.88454594726562', 0, 912789, 75, 'pending'),
(23, 'Sunshine Haven', '45/882/hans road', '0774550849', 'Sunshine Haven: Located in the heart of Colombo, Sunshine Haven is a beacon of hope for vulnerable children. Our dedicated team creates a warm and supportive environment, offering shelter, education, and opportunities for growth. With love and care, we empower these children to rise above their circumstances and embrace a brighter future filled with sunshine.', '$2y$10$gM3wzXdHKhmhVAAyIaHEWuN09QyUFnPy0FAx5N/Pjhs6F55RX/j0S', NULL, 90, NULL, 'rashminalasith@gmail.com', 'Other', '6.933200045828811', '79.84203561658859', 4, 524999, 76, 'approved'),
(24, 'induwara', 'dsajhkjdsajkhsadkj', '0778955642', NULL, '$2y$10$V/vVZ1JuY6XZhY3HB2VwU.blq6IrwiSVYU50R.j1y8VLL5XStiq8a', NULL, 300, NULL, 'rdinduwara19158@gmail.com', 'Other', '6.932797993732777', '79.8416949760437', 0, 803069, 77, 'approved'),
(27, 'Little Hearts Home:', '388/9E kularathna mawatha, Kimbulapitiya road, Negombo', '0772094500', 'Little Hearts Home: Nestled in Colombo, Little Hearts Home is a haven for children in need. Our nurturing environment, caring staff, and comprehensive support provide safety, education, and emotional healing. With a focus on empowerment and holistic development, we guide these little hearts towards a brighter and promising tomorrow.', '$2y$10$h6oPZi91c6b/ikdMv3CI/e/czaiUFmMlD0jvFyoskxLvCiqxSrlMa', '1683641936_4-94.png', 80, '1683641936_Untitled design (3).png', 'luqmanfz2000@gmail.com', 'Disabled Institute', '6.868816763738726', '79.87553372497558', 0, 260297, 87, 'approved'),
(29, 'Pamankada children home', '388/9E kularathna mawatha, Kimbulapitiya road, Negombo', '0772094501', NULL, '$2y$10$aMefyrV3v4K4wpVpl8ooX.DvL38ppKmFJvClqZF96mwXONMy/8e7y', NULL, 80, NULL, 'kavishkafernando64+children@gmail.com', 'Other', '6.947186353451346', '79.86948274609375', 0, 700508, 90, 'approved'),
(30, 'Little hearts', '9/10 A, Parakum Mw, Dehiwala', '0112232323', NULL, '$2y$10$Hjij.pn0v5HXeEQHuiX8tONifdJ50jOsMOo5desKEhNhCoSY7vA7W', NULL, NULL, NULL, 'littlehearts@gmail.com', 'Other', '', '', 0, 719433, 97, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`) VALUES
(4, 'T-shirt'),
(5, 'Shorts'),
(6, 'Bags'),
(10, 'Tents'),
(11, 'water bottles'),
(12, 'Floor mats'),
(13, 'Torch');

-- --------------------------------------------------------

--
-- Table structure for table `comschedule_table`
--

CREATE TABLE `comschedule_table` (
  `S_ID` int(11) NOT NULL,
  `Total_Quantity` int(225) NOT NULL,
  `B_Id` int(11) NOT NULL,
  `D_Date` date NOT NULL,
  `Time` enum('Breakfast','Lunch','Dinner','') NOT NULL,
  `Reserved_Quantity` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `comschedule_table`
--

INSERT INTO `comschedule_table` (`S_ID`, `Total_Quantity`, `B_Id`, `D_Date`, `Time`, `Reserved_Quantity`) VALUES
(7, 53, 12, '2023-05-11', 'Breakfast', 23),
(9, 30, 23, '2023-05-08', 'Breakfast', 0),
(10, 60, 22, '2023-05-04', 'Lunch', 0),
(11, 90, 23, '2023-05-11', 'Lunch', 90),
(12, 80, 27, '2023-05-21', 'Dinner', 0),
(13, 40, 27, '2023-05-11', 'Dinner', 0),
(14, 58, 24, '2023-05-10', 'Breakfast', 0),
(15, 80, 27, '2023-05-30', 'Dinner', 0),
(16, 100, 24, '2023-05-19', 'Dinner', 0),
(17, 100, 12, '2023-05-05', 'Breakfast', 0),
(18, 40, 12, '2023-05-04', 'Lunch', 0);

-- --------------------------------------------------------

--
-- Table structure for table `donation_table`
--

CREATE TABLE `donation_table` (
  `Donation_ID` int(50) NOT NULL,
  `Donation_Description` varchar(250) DEFAULT NULL,
  `Donation_Type` enum('Dry Rations','Education','Clothes','Medicine','Sanitary items','Others') DEFAULT NULL,
  `Donation_Quantity` int(11) DEFAULT NULL,
  `Donation_Priority` enum('High','Normal') DEFAULT NULL,
  `Donation_Time` timestamp NULL DEFAULT current_timestamp(),
  `Accepted` tinyint(1) DEFAULT 0,
  `B_Id` int(11) NOT NULL,
  `Completed` tinyint(1) DEFAULT 0,
  `D_Id` int(10) DEFAULT NULL,
  `Donation_Details` mediumtext NOT NULL,
  `Accepted_Time` timestamp(2) NULL DEFAULT NULL,
  `Completed_Time` timestamp(4) NULL DEFAULT NULL,
  `Remaining_Quantity` int(11) DEFAULT NULL,
  `Expiry` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donation_table`
--

INSERT INTO `donation_table` (`Donation_ID`, `Donation_Description`, `Donation_Type`, `Donation_Quantity`, `Donation_Priority`, `Donation_Time`, `Accepted`, `B_Id`, `Completed`, `D_Id`, `Donation_Details`, `Accepted_Time`, `Completed_Time`, `Remaining_Quantity`, `Expiry`) VALUES
(4, 'shorts', 'Clothes', 3, 'High', '2023-02-05 09:05:31', 1, 12, 1, 19, '', NULL, '0000-00-00 00:00:00.0000', 0, 1),
(12, 'pens', 'Others', 10, 'Normal', '2023-04-20 23:57:49', 1, 12, 1, NULL, 'atlas', NULL, '2023-05-02 15:22:35.0000', 0, 1),
(13, 'pencils', 'Others', 10, 'Normal', '2023-04-21 00:05:51', 1, 12, 1, 19, '', NULL, '0000-00-00 00:00:00.0000', 0, 1),
(14, 'erasers', 'Others', 5, 'High', '2023-04-21 00:06:13', 1, 12, 0, NULL, '', NULL, '0000-00-00 00:00:00.0000', 0, 1),
(15, 'Bata slippers', 'Others', 4, 'Normal', '2023-04-29 06:49:52', 1, 12, 1, 19, 'size 8 bata slippers', NULL, '0000-00-00 00:00:00.0000', 0, 1),
(42, 'School shoes', 'Others', 10, 'Normal', '2023-05-14 14:51:23', 1, 12, 1, 19, 'I need school shoes of size 7  to students in my area', '2023-05-14 15:35:22.00', NULL, 0, 0),
(43, 'First aid kits', 'Medicine', 10, 'High', '2023-05-15 20:57:10', 1, 12, 1, NULL, 'I need First aid kits immediately which contains surgical spirit plasters and gauss', NULL, '2023-05-16 01:42:31.0000', 0, 0),
(45, 'CR books', 'Others', 20, 'High', '2023-05-16 04:36:42', 0, 12, 0, NULL, 'I need CR books for 20 people', NULL, NULL, 10, 0),
(46, 'CR books', 'Others', 20, 'High', '2023-05-16 04:37:13', 0, 12, 0, NULL, 'I need CR books for 20 people', NULL, NULL, 20, 0),
(48, 'code check', 'Others', 10, 'Normal', '2023-05-16 06:13:55', 0, 12, 0, NULL, 'code check', NULL, NULL, 10, 0),
(49, 'codecheck', 'Sanitary items', 22, 'High', '2023-05-16 07:47:34', 0, 12, 0, NULL, 'codecheck', NULL, NULL, 22, 0),
(50, 'School shirts', 'Clothes', 22, 'High', '2023-10-02 05:31:47', 0, 12, 0, NULL, 'small shirts', NULL, NULL, 22, 0),
(51, 'ad', 'Dry Rations', 3, 'High', '2025-06-07 01:17:29', 0, 12, 0, NULL, 'ad', NULL, NULL, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `donor_details`
--

CREATE TABLE `donor_details` (
  `D_Id` int(11) NOT NULL,
  `D_Name` varchar(255) NOT NULL,
  `D_Address` varchar(255) NOT NULL,
  `D_Password` varchar(100) NOT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `D_Tel_No` int(10) DEFAULT NULL,
  `D_Email` varchar(100) NOT NULL,
  `User_Id` int(10) NOT NULL,
  `otp` int(100) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `latitude` varchar(100) DEFAULT NULL,
  `longitude` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donor_details`
--

INSERT INTO `donor_details` (`D_Id`, `D_Name`, `D_Address`, `D_Password`, `profile_image`, `D_Tel_No`, `D_Email`, `User_Id`, `otp`, `status`, `latitude`, `longitude`) VALUES
(16, 'Kavishka Fernando', '388/9E kularathna mawatha, Kimbulapitiya road, Negombo', '$2y$10$pe9g.AXwkwmTdDAisAPOuudORwQgaSy137Wco9Dn9oG7C7osWSQK.', NULL, 772094501, 'kavishkafernando84@gmail.com', 43, NULL, NULL, NULL, NULL),
(17, 'Kavishka Fernando', '388/9E kularathna mawatha, Kimbulapitiya road, Negombo', '$2y$10$iGENHfgvwOtxRzcKeqxZ1e3MLjL1tdZPlksApG9IOPqJMNAnMcHsG', NULL, 772094501, 'kavishkafernando96@gmail.com', 45, NULL, NULL, NULL, NULL),
(18, 'Kavishka Fernando', '388/9E kularathna mawatha, Kimbulapitiya road, Negombo', '$2y$10$izqfBbLPtgIxoBkMT3ynnOkxzUcdnu.SObyqfosnjuCzCTcGtHomi', NULL, 772094501, 'kavishkafernando000@gmail.com', 65, 206115, NULL, NULL, NULL),
(19, 'amasha', 'ssssssssssssss', '$2y$10$Pk8M.VdQEDz2Rhd4oJ2aXef.EUcc8DgtAo0JCk9oFeIro4j42pEru', NULL, 1111111111, 'amashawijesinghe1999@gmail.com', 73, 102210, NULL, '6.9000\r\n', '\r\n79.8588'),
(20, 'induwara', '388/9E kularathna mawatha, Kimbulapitiya road, Negombo', '$2y$10$zjrnlIZK9f0xrZaulKZiU.b1lKgTTdx2bj0CeARlp16nrWHdbbqBe', '1683399809_', 774566456, 'rdinduwara1942@gmail.com', 78, 172589, NULL, '6.933522219777508', '79.84210267181396'),
(21, 'induwara', '388/9E kularathna mawatha, Kimbulapitiya road, Negombo', '$2y$10$r8bNrA6GtcYvMwQktLXCxOAEFbPXewkrfgEE9JIW9H37mn1gHxt/2', '1683399851_', 774566456, 'rdinduwara1942@gmail.com', 78, 170965, NULL, '', ''),
(22, 'Dinith kumudika', '388/9E kularathna mawatha, Kimbulapitiya road, Negombo', '$2y$10$Fk0YQd.C0pzC60FsQH0KQuXQ1GxCil6NeSzLtM8UEG3g.Df0uQj9W', NULL, 772094501, '2020is038@stu.ucsc.cmb.ac.lk', 95, 856412, NULL, '6.904189338733364', '79.86456662828671'),
(23, 'Isurika Kaushani', '14/2/B, Galpoththa Road,', '$2y$10$G7KWUBJdwJvam40D29LXQesHo78TEm6YObn8a/g1hXJf4Iz.7K.Fa', NULL, 7149121, 'Isurika.kaushani@gmail.com', 96, 396879, NULL, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `feedback_full`
--

CREATE TABLE `feedback_full` (
  `Id` int(11) NOT NULL,
  `D_Id` int(11) NOT NULL,
  `Feedback` varchar(255) NOT NULL,
  `Satisfaction` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `feedback_full`
--

INSERT INTO `feedback_full` (`Id`, `D_Id`, `Feedback`, `Satisfaction`) VALUES
(2, 15, 'very good', 'satisfied'),
(3, 42, 'This is good', 'satisfied'),
(4, 4, 'bad product', 'dissatisfied');

-- --------------------------------------------------------

--
-- Table structure for table `feedback_partial`
--

CREATE TABLE `feedback_partial` (
  `Id` int(11) NOT NULL,
  `Partial_Id` int(11) NOT NULL,
  `D_Id` int(11) NOT NULL,
  `Feedback` varchar(255) DEFAULT NULL,
  `Satisfaction` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `feedback_partial`
--

INSERT INTO `feedback_partial` (`Id`, `Partial_Id`, `D_Id`, `Feedback`, `Satisfaction`) VALUES
(6, 3, 14, 'This is good delivery', 'satisfied'),
(7, 4, 25, 'this is a good delivery', 'satisfied'),
(8, 10, 43, 'good', 'satisfied'),
(9, 1, 12, 'bad product', 'dissatisfied');

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

CREATE TABLE `forum` (
  `P_Id` int(11) NOT NULL,
  `P_Date` date DEFAULT NULL,
  `P_Image` varchar(256) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `NotificationId` int(2) NOT NULL,
  `NotificationMsg` varchar(100) NOT NULL,
  `Receptient` int(2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`NotificationId`, `NotificationMsg`, `Receptient`) VALUES
(1, 'Accept Request', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `partial_donations`
--

CREATE TABLE `partial_donations` (
  `Id` int(11) NOT NULL,
  `Donor_Id` int(11) NOT NULL,
  `Req_Id` int(11) NOT NULL,
  `Accepted` tinyint(1) DEFAULT NULL,
  `Completed` tinyint(1) DEFAULT NULL,
  `Accepted_Time` timestamp(2) NULL DEFAULT NULL,
  `Completed_Time` timestamp(2) NULL DEFAULT NULL,
  `Donation_Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `partial_donations`
--

INSERT INTO `partial_donations` (`Id`, `Donor_Id`, `Req_Id`, `Accepted`, `Completed`, `Accepted_Time`, `Completed_Time`, `Donation_Quantity`) VALUES
(1, 19, 12, 1, 1, NULL, '2023-05-02 15:22:35.00', 5),
(2, 19, 12, 1, 1, NULL, '2023-05-02 12:41:51.00', 5),
(3, 19, 14, 1, NULL, NULL, NULL, 2),
(4, 19, 25, 1, 1, NULL, '2023-05-12 21:15:12.00', 10),
(5, 19, 40, 1, NULL, NULL, NULL, 20),
(6, 19, 41, 1, 1, NULL, '2023-05-14 15:32:36.00', 20),
(7, 19, 25, 1, NULL, NULL, NULL, 10),
(8, 19, 25, 1, NULL, NULL, NULL, 14),
(9, 19, 14, 1, NULL, NULL, NULL, 1),
(10, 19, 43, 1, 1, NULL, '2023-05-16 01:42:29.00', 5),
(11, 19, 43, 1, 1, NULL, '2023-05-16 01:42:31.00', 5),
(12, 19, 14, 1, NULL, NULL, NULL, 2),
(13, 19, 45, 1, NULL, NULL, NULL, 10);

--
-- Triggers `partial_donations`
--
DELIMITER $$
CREATE TRIGGER `update_donation_completed` AFTER UPDATE ON `partial_donations` FOR EACH ROW BEGIN
    IF (SELECT COUNT(*) FROM partial_donations WHERE Req_Id = NEW.Req_Id AND completed = TRUE) >= 2 THEN
        UPDATE donation_table
        SET completed = TRUE,
         Completed_Time = NOW()
        WHERE Donation_ID = NEW.Req_Id;
    ELSE
        UPDATE donation_table
        SET completed = FALSE
        WHERE Donation_ID = NEW.Req_Id;
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `registered_users`
--

CREATE TABLE `registered_users` (
  `User_Id` int(11) NOT NULL,
  `User_Email` varchar(100) NOT NULL,
  `User_Password` varchar(100) NOT NULL,
  `User_Role` varchar(11) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `registered_users`
--

INSERT INTO `registered_users` (`User_Id`, `User_Email`, `User_Password`, `User_Role`, `status`) VALUES
(43, 'kavishkafernando84@gmail.com', '$2y$10$pe9g.AXwkwmTdDAisAPOuudORwQgaSy137Wco9Dn9oG7C7osWSQK.', '2', 'pending'),
(44, 'kavishkafernando64@gmail.com', '$2y$10$ma/MLanMBFDlgxxSvRorjOk.UuZUS8t3NFLemRXgwo33nPqqHNEeC', '1', 'pending'),
(45, 'kavishkafernando96@gmail.com', '$2y$10$iGENHfgvwOtxRzcKeqxZ1e3MLjL1tdZPlksApG9IOPqJMNAnMcHsG', '2', 'pending'),
(54, 'kavishkafernand864@gmail.com', '$2y$10$p5NZ0y7fOBC9M6taVWQZfevZd48mWhf/WRSM687EGMEz7toA2vN2C', '3', 'pending'),
(55, 'kavishkafernando90@gmail.com', '$2y$10$YoLZ850tfyx/he3Aws6m2eStc.SyJlvI8we7KJmAKDsKL9nkrvqL2', '3', 'pending'),
(56, 'nishan@gmail.com', '$2y$10$wtMyBrsSKoWGAC3aFK7.4.tGo70QFn1G5R6ajZ1HNRwY80Jdmmy4.', '4', 'pending'),
(57, 'nishan@gmail.com', '$2y$10$WeGVUGsXXv52YX50FpJjv.7BIUWiEsyMnpk2QbCKRpz6TT2KGjMpq', '4', 'pending'),
(58, 'kushantha018@gmail.com', '$2y$10$tivt7Bvd2g3xB6hzPCwtL.8eL7nviO6ZEVnn/XvJLW4HwYcpP9iaK', '1', 'pending'),
(60, 'kavishkafernando784@gmail.com', '$2y$10$LGBh.Ojnl2SH3HUB5CJI6u5KPEXxYUISp2jfx1OpA2z2/SKWRoIwC', '3', 'pending'),
(61, 'kavishka064@gmail.com', '$2y$10$wD3Q.G4FFdB8beeSQaWLZuUHIa54uIklkWp/7GKO1Nl6JekmiDEJm', '3', 'pending'),
(63, 'kavishkaferna@gmail.com', '$2y$10$LgCang6S4C2neTo6EqdChO/Ix8taJWtjln0T/t5zyM41fn5C8WKVS', '3', 'pending'),
(65, 'kavishkafernando000@gmail.com', '$2y$10$izqfBbLPtgIxoBkMT3ynnOkxzUcdnu.SObyqfosnjuCzCTcGtHomi', '2', 'pending'),
(70, 'nishanmadhushanka821@gmail.com', '$2y$10$HZnYcwA.VqDRCwz6KzhN8uKI/vm3fr94H.G.8tCIpH/jBqGVrY9Re', '1', 'pending'),
(71, 'dinithwalpitagama@gmail.com', '$2y$10$5avmLrSPdxNYNjre13fGTO00WWmKdsLfH.0Jd1GduCMNQ5t7eWBlu', '1', 'pending'),
(72, 'kavishkafernando100@gmail.com', '$2y$10$JRbpnYImQsPMkWCMwiG.fOzGB6OSn4X9PDarIF3exNq70yG5deZO2', '3', 'pending'),
(73, 'amashawijesinghe1999@gmail.com', '$2y$10$Pk8M.VdQEDz2Rhd4oJ2aXef.EUcc8DgtAo0JCk9oFeIro4j42pEru', '2', 'pending'),
(74, 'kavishkafernando1114@gmail.com', '$2y$10$ax/eZCUa7PT54/oiLDR3aOnWcMZtipu64Y5QxicsfxkbMChSAIofu', '3', 'pending'),
(75, 'kavishkafernando6114@gmail.com', '$2y$10$C32nAr7Bz4CG.BCX3iBREuGw9EM4F7W56M48e9GEHxqgVtcZmaDEm', '1', 'pending'),
(76, 'rashminalasith@gmail.com', '$2y$10$gM3wzXdHKhmhVAAyIaHEWuN09QyUFnPy0FAx5N/Pjhs6F55RX/j0S', '4', 'accepted'),
(77, 'rdinduwara19158@gmail.com', '$2y$10$V/vVZ1JuY6XZhY3HB2VwU.blq6IrwiSVYU50R.j1y8VLL5XStiq8a', '1', 'pending'),
(78, 'rdinduwara1942@gmail.com', '$2y$10$zjrnlIZK9f0xrZaulKZiU.b1lKgTTdx2bj0CeARlp16nrWHdbbqBe', '2', 'pending'),
(79, 'rdinduwara1942@gmail.com', '$2y$10$r8bNrA6GtcYvMwQktLXCxOAEFbPXewkrfgEE9JIW9H37mn1gHxt/2', '2', 'pending'),
(82, 'kavishkafernando64@gmail.com', '$2y$10$/lsLPLIq3OzFVCdurh8rKuVxCbPRjQUIKrOCW18QXN9emtzHw31JW', '1', 'pending'),
(83, 'kavishkafernando64@gmail.com', '$2y$10$h.J2FI81DUhRtkM5PfXdmecFyeShi5CPFMB2TMMacNIKVYOz9HlpG', '1', 'pending'),
(84, 'kavishkafernando64@gmail.com', '$2y$10$YP9o2Vy4yqqDhqjJKUrXleFlMIPREEZDbRWen1XJrok7u5s35WwKC', '1', 'pending'),
(85, 'kavishkafernando64@gmail.com', '$2y$10$N97fTeTbgSVh5or4/GnDKOViXmexpWKPKB815VhoB7fzIkwr69U6e', '1', 'pending'),
(86, 'kavishkafernando64@gmail.com', '$2y$10$HGgajToTQxTeicCr42fkTOIXKXDbWslbZK3oEY8KHnVWf7Ye4b/ZW', '1', 'pending'),
(87, 'luqmanfz2000@gmail.com', '$2y$10$nZilpa0CVWKFsNR9Kl3l3O3ooovE1eJ29IHHDSB9jJCj0OjVqrMVC', '1', 'pending'),
(88, 'luqmanfz2000@gmail.com', '$2y$10$h6oPZi91c6b/ikdMv3CI/e/czaiUFmMlD0jvFyoskxLvCiqxSrlMa', '1', 'pending'),
(89, 'kavishkafernando64test+@gmail.com', '$2y$10$R5aFNSq.CIkWArAQvETZaemK.Z5nAydbLIdAPeQutpfCVkjOPnrai', '1', 'pending'),
(90, 'kavishkafernando64+children@gmail.com', '$2y$10$aMefyrV3v4K4wpVpl8ooX.DvL38ppKmFJvClqZF96mwXONMy/8e7y', '1', 'pending'),
(91, 'leoathugalpura@gmail.com', '$2y$10$8O.Tcqg4N9fVyq2oMp7xzugtFhtdJ5RUFjirEPrLYLLwUggHY9MRu', '3', 'pending'),
(92, 'rot@gmail.com', '$2y$10$yrmfHCA.liDKxVTtTmj2TuV9/K.VtWmh6FpTLKmhn32OaPpPbSCt.', '3', 'pending'),
(93, 'nishanmadhushanka821@gmail.com', '$2y$10$A4yabgvCqweuRJ.J3yofbeWIzxlnHZA7pip1NgWgSI3kol8joSetq', '4', 'pending'),
(94, 'anushka@gmail.com', '$2y$10$C8ImkLM4nrPbixWclMEIPOg1hQhY6NCrS97i7Ohdx30nkKi4a.952', '4', 'pending'),
(95, '2020is038@stu.ucsc.cmb.ac.lk', '$2y$10$Fk0YQd.C0pzC60FsQH0KQuXQ1GxCil6NeSzLtM8UEG3g.Df0uQj9W', '2', 'pending'),
(96, 'Isurika.kaushani@gmail.com', '$2y$10$G7KWUBJdwJvam40D29LXQesHo78TEm6YObn8a/g1hXJf4Iz.7K.Fa', '2', 'pending'),
(97, 'littlehearts@gmail.com', '$2y$10$Hjij.pn0v5HXeEQHuiX8tONifdJ50jOsMOo5desKEhNhCoSY7vA7W', '1', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `review` text NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shedule_request_table`
--

CREATE TABLE `shedule_request_table` (
  `B_Req_ID` int(11) NOT NULL,
  `Time` enum('Breakfast','Lunch','Dinner') NOT NULL,
  `Donation_Quantity` int(11) DEFAULT NULL,
  `D_Date` date DEFAULT NULL,
  `Food_Type` varchar(100) NOT NULL,
  `accepted` tinyint(1) DEFAULT 0,
  `completed` tinyint(1) DEFAULT 0,
  `D_Id` int(11) NOT NULL,
  `B_Id` int(11) NOT NULL,
  `S_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shedule_request_table`
--

INSERT INTO `shedule_request_table` (`B_Req_ID`, `Time`, `Donation_Quantity`, `D_Date`, `Food_Type`, `accepted`, `completed`, `D_Id`, `B_Id`, `S_Id`) VALUES
(7, 'Breakfast', 23, '2023-05-11', 'noodles', 1, 0, 19, 12, 7),
(9, 'Breakfast', 30, '2023-05-08', 'milk rice', 0, 0, 19, 23, 9),
(10, 'Lunch', 60, '2023-05-04', 'koththu', 0, 0, 19, 22, 10),
(11, 'Lunch', 90, '2023-05-11', 'rice and curry', 1, 0, 19, 23, 11),
(12, 'Dinner', 80, '2023-05-21', 'noodles', 0, 0, 19, 27, 12),
(13, 'Dinner', 40, '2023-05-11', 'bread', 0, 0, 19, 27, 13),
(14, 'Breakfast', 58, '2023-05-10', 'rice and curry', 0, 0, 19, 24, 14),
(15, 'Dinner', 80, '2023-05-30', 'noodles', 0, 0, 19, 27, 15),
(16, 'Dinner', 100, '2023-05-19', 'hoppers', 0, 0, 19, 24, 16),
(17, 'Breakfast', 100, '2023-05-05', 'bread', 0, 0, 19, 12, 17),
(18, 'Breakfast', 30, '2023-05-11', 'rice and curr', 0, 0, 19, 12, 7),
(19, 'Lunch', 40, '2023-05-04', 'rice', 0, 0, 19, 12, 18);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_details`
--
ALTER TABLE `admin_details`
  ADD PRIMARY KEY (`A_ID`),
  ADD KEY `admin_details_ibfk_1` (`User_Id`);

--
-- Indexes for table `beneficiary_details`
--
ALTER TABLE `beneficiary_details`
  ADD PRIMARY KEY (`B_Id`),
  ADD KEY `User_Id` (`User_Id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comschedule_table`
--
ALTER TABLE `comschedule_table`
  ADD PRIMARY KEY (`S_ID`);

--
-- Indexes for table `donation_table`
--
ALTER TABLE `donation_table`
  ADD PRIMARY KEY (`Donation_ID`),
  ADD KEY `benificiary_Id` (`B_Id`),
  ADD KEY `D_Id` (`D_Id`);

--
-- Indexes for table `donor_details`
--
ALTER TABLE `donor_details`
  ADD PRIMARY KEY (`D_Id`),
  ADD KEY `U_Id` (`User_Id`);

--
-- Indexes for table `feedback_full`
--
ALTER TABLE `feedback_full`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `donationId` (`D_Id`);

--
-- Indexes for table `feedback_partial`
--
ALTER TABLE `feedback_partial`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Partial Id` (`Partial_Id`),
  ADD KEY `Donation Id` (`D_Id`);

--
-- Indexes for table `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`P_Id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`NotificationId`);

--
-- Indexes for table `partial_donations`
--
ALTER TABLE `partial_donations`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `DonorId` (`Donor_Id`),
  ADD KEY `RequestId` (`Req_Id`);

--
-- Indexes for table `registered_users`
--
ALTER TABLE `registered_users`
  ADD PRIMARY KEY (`User_Id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shedule_request_table`
--
ALTER TABLE `shedule_request_table`
  ADD PRIMARY KEY (`B_Req_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin_details`
--
ALTER TABLE `admin_details`
  MODIFY `A_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `beneficiary_details`
--
ALTER TABLE `beneficiary_details`
  MODIFY `B_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `comschedule_table`
--
ALTER TABLE `comschedule_table`
  MODIFY `S_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `donation_table`
--
ALTER TABLE `donation_table`
  MODIFY `Donation_ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `donor_details`
--
ALTER TABLE `donor_details`
  MODIFY `D_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `feedback_full`
--
ALTER TABLE `feedback_full`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `feedback_partial`
--
ALTER TABLE `feedback_partial`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `forum`
--
ALTER TABLE `forum`
  MODIFY `P_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `NotificationId` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `partial_donations`
--
ALTER TABLE `partial_donations`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `registered_users`
--
ALTER TABLE `registered_users`
  MODIFY `User_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shedule_request_table`
--
ALTER TABLE `shedule_request_table`
  MODIFY `B_Req_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `beneficiary_details`
--
ALTER TABLE `beneficiary_details`
  ADD CONSTRAINT `User_Id` FOREIGN KEY (`User_Id`) REFERENCES `registered_users` (`User_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `donation_table`
--
ALTER TABLE `donation_table`
  ADD CONSTRAINT `D_Id` FOREIGN KEY (`D_Id`) REFERENCES `donor_details` (`D_Id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `donation_table_ibfk_1` FOREIGN KEY (`B_Id`) REFERENCES `beneficiary_details` (`B_Id`);

--
-- Constraints for table `donor_details`
--
ALTER TABLE `donor_details`
  ADD CONSTRAINT `U_Id` FOREIGN KEY (`User_Id`) REFERENCES `registered_users` (`User_Id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
