-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2022 at 08:25 PM
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
-- Database: `gym1`
--

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `Class_ID` int(11) NOT NULL,
  `Name` varchar(128) NOT NULL,
  `Cost` int(11) NOT NULL,
  `Info` varchar(512) NOT NULL,
  `Duration_Per_Time_In_Minuts` float NOT NULL,
  `Period_In_Weeks` int(11) NOT NULL,
  `Number_Of_Sessions` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`Class_ID`, `Name`, `Cost`, `Info`, `Duration_Per_Time_In_Minuts`, `Period_In_Weeks`, `Number_Of_Sessions`) VALUES
(1, 'WEIGHT LOOSE', 2000, 'Weight loss is not the answer to every health problem, but if your doctor recommends it, there are tips to help you lose weight safely. A steady weight loss of 1 to 2 pounds per week is recommended for the most effective long-term weight management.', 30, 3, 30),
(3, 'BOXING', 4500, 'Boxing is a combat sport in which two people, usually wearing protective gloves and other protective equipment such as hand wraps and mouthguards, throw punches at each other for a predetermined amount of time in a boxing ring.', 30, 3, 30),
(4, 'Zomba', 1000, 'hjgjghyygkjh', 30, 2, 30);

-- --------------------------------------------------------

--
-- Table structure for table `classes_dates`
--

CREATE TABLE `classes_dates` (
  `Class_Date_ID` int(11) NOT NULL,
  `Day` enum('Saturday','Sunday','Monday','Tuesday','Wednesday','Thursday','Friday') NOT NULL,
  `Start_Time` time NOT NULL,
  `Room` int(11) DEFAULT NULL,
  `Round` int(11) NOT NULL,
  `End_Time` time NOT NULL,
  `Class_ID` int(11) NOT NULL,
  `Trainer_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `classes_dates`
--

INSERT INTO `classes_dates` (`Class_Date_ID`, `Day`, `Start_Time`, `Room`, `Round`, `End_Time`, `Class_ID`, `Trainer_ID`) VALUES
(1, 'Sunday', '03:42:53', 120, 1, '03:42:53', 1, 3),
(2, 'Tuesday', '17:00:00', 200, 2, '19:00:00', 1, 3),
(5, 'Tuesday', '04:40:15', 50, 2, '10:00:00', 1, 3),
(6, 'Saturday', '15:00:00', 3, 1, '15:30:00', 4, 4),
(7, 'Tuesday', '15:00:00', 3, 1, '15:30:00', 4, 4),
(8, 'Sunday', '14:00:00', 1, 2, '14:30:00', 4, 3),
(9, 'Wednesday', '14:00:00', 1, 2, '14:30:00', 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `Employee_ID` int(11) NOT NULL,
  `Email` varchar(256) NOT NULL,
  `Password` varchar(32) NOT NULL,
  `Full_Name` varchar(256) NOT NULL,
  `Personal_Image` varchar(64) DEFAULT 'default.jpg',
  `National_ID_Image` varchar(64) DEFAULT NULL,
  `Address` varchar(256) NOT NULL,
  `Phone_Number` varchar(16) NOT NULL,
  `Phone_Number2` varchar(16) DEFAULT NULL,
  `Gender` enum('Male','Female') NOT NULL,
  `Birthdate` date DEFAULT NULL,
  `Type` enum('Trainer','Receptionist') NOT NULL,
  `Hiring_Date` date DEFAULT NULL,
  `Periodic_Salary` int(11) DEFAULT NULL,
  `Periodic_Working_Hours` int(11) DEFAULT NULL,
  `Period` varchar(8) DEFAULT NULL,
  `Certificates` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`Employee_ID`, `Email`, `Password`, `Full_Name`, `Personal_Image`, `National_ID_Image`, `Address`, `Phone_Number`, `Phone_Number2`, `Gender`, `Birthdate`, `Type`, `Hiring_Date`, `Periodic_Salary`, `Periodic_Working_Hours`, `Period`, `Certificates`) VALUES
(1, 'mohamed@gmail.com', 'Mohamed@123456', 'Mohamed Ahmed', 'mo.jpg', NULL, '6th of october', '01055577169', NULL, 'Male', NULL, 'Receptionist', NULL, NULL, NULL, NULL, NULL),
(3, 'omar@gmail.com', 'Omar@123456', 'Omar Ahmed', 'm.png', NULL, 'shikh-zaid', '01055777169', NULL, 'Male', NULL, 'Trainer', NULL, NULL, NULL, NULL, NULL),
(4, 'moh@gmail.com', 'Nur@123456', 'hazem', 'default.jpg', NULL, '6th of october', '01055777167', NULL, 'Male', NULL, 'Trainer', NULL, NULL, NULL, NULL, NULL),
(7, 'mahmoudd@gmail.com', 'Maha@123456', 'mahmoud', '625cbfa477350.png', '625cbfa477af2.png', '6th of oct', '010999778542', NULL, 'Male', '2022-04-01', 'Receptionist', '2022-04-01', 5000, 8, '3', 'hello'),
(8, 'mahmoud_d@gmail.com', 'Mahmoud@123456', 'mahmoud1', '625cc0d177178.png', '625cc0d178c87.png', '6th of oct', '01033355647', NULL, 'Male', '2016-01-01', 'Receptionist', '2022-04-01', 8000, 8, '3', 'hello');

-- --------------------------------------------------------

--
-- Table structure for table `employees_attendance`
--

CREATE TABLE `employees_attendance` (
  `Attendance_ID` int(11) NOT NULL,
  `Date` date NOT NULL DEFAULT current_timestamp(),
  `Attending` time NOT NULL,
  `Leaving` time DEFAULT NULL,
  `Employee_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employees_attendance`
--

INSERT INTO `employees_attendance` (`Attendance_ID`, `Date`, `Attending`, `Leaving`, `Employee_ID`) VALUES
(1, '2022-04-13', '04:15:12', '05:01:12', 3),
(2, '2022-04-25', '10:02:28', '04:02:28', 3),
(3, '2022-04-16', '00:57:48', '00:57:48', 1),
(5, '2022-04-17', '00:58:03', '06:58:30', 1),
(6, '2022-04-06', '03:01:00', '09:01:00', 4),
(7, '2022-04-16', '03:20:00', '21:20:00', 3),
(8, '2022-04-09', '19:30:00', '22:30:00', 7),
(9, '2022-04-15', '19:00:00', '22:00:00', 1),
(10, '2022-04-27', '06:52:34', '07:18:03', 4),
(13, '2022-05-06', '22:12:40', '22:12:43', 4),
(17, '2022-05-06', '22:15:00', '22:15:03', 3),
(18, '2022-05-06', '22:36:35', '22:36:46', 4);

-- --------------------------------------------------------

--
-- Table structure for table `equipments`
--

CREATE TABLE `equipments` (
  `Equipment_ID` int(11) NOT NULL,
  `Price` int(11) NOT NULL,
  `Name` varchar(128) NOT NULL,
  `ArrivalDate` date NOT NULL,
  `Subblier_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `equipments`
--

INSERT INTO `equipments` (`Equipment_ID`, `Price`, `Name`, `ArrivalDate`, `Subblier_ID`) VALUES
(0, 7000, 'Bench press machine', '2022-04-01', 2),
(1, 3000, 'Multifunction Treadmill', '2022-04-20', 2),
(2, 2300, 'WHOLESALE', '2022-04-03', 1);

-- --------------------------------------------------------

--
-- Table structure for table `foods_systems`
--

CREATE TABLE `foods_systems` (
  `Food_System_ID` int(11) NOT NULL,
  `Data` varchar(1024) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp(),
  `Trainer_ID` int(11) NOT NULL,
  `Member_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `foods_systems`
--

INSERT INTO `foods_systems` (`Food_System_ID`, `Data`, `Date`, `Trainer_ID`, `Member_ID`) VALUES
(46, 'fdhfdguishbhfudhudsfhufh', '2022-04-08 03:29:14', 3, 11),
(47, 'trainer', '2022-04-30 03:40:49', 3, 78),
(48, 'dhgfhjjjhhjfggfg', '2022-04-30 03:40:58', 3, 78),
(49, 'trainer', '2022-04-30 03:42:51', 3, 78),
(50, 'fvbfijsifjdfdaddhhdffvdfgdffdbj sgdijihghuwheughurhguhren gsduohsoruhuhfu djsojgirjeiageadhri fgksl;gfsgjie', '2022-04-30 03:44:53', 3, 78);

-- --------------------------------------------------------

--
-- Table structure for table `maintenance_record`
--

CREATE TABLE `maintenance_record` (
  `Maintenance_ID` int(11) NOT NULL,
  `Date` date NOT NULL DEFAULT current_timestamp(),
  `info` varchar(512) DEFAULT NULL,
  `Equipment_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `maintenance_record`
--

INSERT INTO `maintenance_record` (`Maintenance_ID`, `Date`, `info`, `Equipment_ID`) VALUES
(2, '2022-04-21', 'sdghgfuayfgydgfysgx', 1),
(3, '2022-04-20', 'etdgdgseaf', 1),
(4, '2022-04-15', 'hello', 1),
(5, '2022-04-09', 'rgaergeregsgeae', 2),
(6, '2022-04-07', 'Equipment malfunction', 1),
(7, '2022-04-26', 'Equipment malfunction', 0);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `Member_ID` int(11) NOT NULL,
  `Full_Name` varchar(256) NOT NULL,
  `Email` varchar(256) NOT NULL,
  `Password` varchar(256) NOT NULL,
  `Phone_Number` varchar(16) NOT NULL,
  `Gender` enum('Male','Female') NOT NULL,
  `Phone_Number2` varchar(16) DEFAULT NULL,
  `Birthdate` date DEFAULT NULL,
  `Weight` float DEFAULT NULL,
  `Height` float DEFAULT NULL,
  `Health_Statue` varchar(512) DEFAULT NULL,
  `Statue` int(11) DEFAULT 0,
  `Parent_ID` int(11) DEFAULT NULL,
  `Parent_Member_ID` int(11) DEFAULT NULL,
  `code` mediumint(5) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`Member_ID`, `Full_Name`, `Email`, `Password`, `Phone_Number`, `Gender`, `Phone_Number2`, `Birthdate`, `Weight`, `Height`, `Health_Statue`, `Statue`, `Parent_ID`, `Parent_Member_ID`, `code`, `email_verified_at`, `created_at`, `updated_at`) VALUES
(9, '  em', 'emmo902@gmail.com', '', '', 'Female', NULL, '2012-05-10', 0, 0, '', 1, 1, NULL, 69663, '2022-04-06 00:20:22', '2022-04-06 00:19:58', '2022-05-08 22:44:35'),
(11, 'mohamed', 'mo@gmail.com', 'ce64e9998e9613db77c61fb1fda31c9385ea5ee7', '01066655142', 'Male', NULL, '0000-00-00', NULL, NULL, NULL, 1, NULL, NULL, 79393, '2022-04-06 00:33:31', '2022-04-06 00:32:59', '2022-04-14 19:55:03'),
(12, 'Maher mohamed', 'melsh@gmail.com', 'ce64e9998e9613db77c61fb1fda31c9385ea5ee7', '01066655124', 'Male', NULL, '2022-05-02', NULL, NULL, NULL, 1, NULL, NULL, 28009, '2022-04-09 15:28:30', '2022-04-09 15:28:03', '2022-05-06 22:42:21'),
(14, ' maha elshawardy ', 'moha.elshawardy@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '01077788149', 'Female', NULL, '1998-03-12', 100, 0, 'bad', 1, NULL, NULL, 78503, '2022-04-24 18:59:28', '2022-04-14 20:02:48', '2022-05-08 23:08:34'),
(46, 'maha elshawardy', 'nurq@gmail.com', 'ce64e9998e9613db77c61fb1fda31c9385ea5ee7', '01088877954', 'Female', NULL, '2022-03-16', 100, 180, 'bad', 0, 1, 12, 45361, NULL, '2022-04-16 23:47:44', '2022-04-17 00:48:51'),
(60, 'eman elshawardy', 'go@gmail.com', 'e61b2d33a8ba58c72b67c221910517732923fea1', '01088977546', 'Female', '', '2022-04-01', 100, 190, 'bad', 0, NULL, NULL, 16890, NULL, '2022-04-17 01:00:10', '2022-04-17 01:00:10'),
(62, 'maha', 'nu@gmail.com', 'ce64e9998e9613db77c61fb1fda31c9385ea5ee7', '01099988789', 'Female', NULL, '2022-04-13', 100, 190, 'bad', 0, NULL, NULL, 56367, NULL, '2022-04-17 01:06:36', '2022-04-17 01:06:36'),
(63, 'maha ahmed', 'nue@gmail.com', 'ce64e9998e9613db77c61fb1fda31c9385ea5ee7', '01099988787', 'Female', NULL, '2022-04-13', 100, 190, 'bad', 0, NULL, NULL, 21595, NULL, '2022-04-17 01:07:06', '2022-04-17 01:07:06'),
(71, 'maha elshawardy', 'gh@gmail.com', 'ce64e9998e9613db77c61fb1fda31c9385ea5ee7', '01088977541', 'Female', NULL, '2022-04-02', 110, 180, 'bad', 0, 1, 46, 32777, NULL, '2022-04-17 01:32:52', '2022-04-17 01:32:52'),
(73, 'mahmoud', 'mahmoud@gmail.com', 'ce64e9998e9613db77c61fb1fda31c9385ea5ee7', '01088977231', 'Male', NULL, '2022-01-06', 100, 190, 'bad', 1, 1, 9, 35782, NULL, '2022-04-17 01:36:34', '2022-05-08 21:04:14'),
(75, 'maha elshawardy', 'mohhawardy@gmail.com', 'ce64e9998e9613db77c61fb1fda31c9385ea5ee7', '01088899556', 'Female', NULL, '2022-04-01', 100, 180, 'good', 0, NULL, NULL, 57306, NULL, '2022-04-17 07:01:57', '2022-04-17 07:01:57'),
(76, 'nur usama', 'nurrr@gmail.com', 'b899f19cd562dac262d8196a512a977d4c761512', '01069977142', 'Male', NULL, '1998-03-12', 68, 190, 'bad', 1, NULL, NULL, 40065, NULL, '2022-04-17 18:39:22', '2022-04-17 18:46:46'),
(77, 'nur', 'nurrrr@gmail.com', '7683a90c16ebdfd689e8107419e57e4f9333cde3', '01066455789', 'Male', NULL, '2022-04-01', 110, 159, 'good', 1, NULL, NULL, 60474, NULL, '2022-04-17 18:44:49', '2022-04-17 18:49:13'),
(78, '  Nur Usama', 'nur.usama.q@gmail.com', '370194ff6e0f93a7432e16cc9badd9427e8b4e13', '01280461081', 'Male', '01044577894', '2021-09-01', 60, 170, '', 1, NULL, 79, 63915, '2022-04-18 02:58:31', '2022-04-18 02:57:11', '2022-05-08 23:00:11'),
(79, 'Mohamed Ahmed', 'bodyantar3@gmail.com', 'c9b2097675e98c8761df15f4cb461f45737b42b2', '01055566789', 'Male', NULL, '2022-04-02', 0, 0, '', 1, NULL, NULL, 99514, '2022-04-21 14:58:37', '2022-04-21 14:57:00', '2022-04-21 14:58:37'),
(80, 'khaled magdy', 'khaledmagdy871@gmail.com', '1ebceef8183b50ef6dc84c8fa5fffc54ecf8d452', '01044477895', 'Male', NULL, '2022-05-11', 0, 0, '', 1, NULL, NULL, 77933, '2022-05-06 19:35:34', '2022-05-06 19:34:47', '2022-05-06 20:21:17'),
(84, 'trending', 'trendingneweg@gmail.com', 'c129b324aee662b04eccf68babba85851346dff9', '01033388792', 'Male', NULL, '2022-05-03', NULL, NULL, NULL, 0, NULL, NULL, 15980, NULL, '2022-05-27 14:22:44', '2022-05-27 14:22:44'),
(88, 'trending', 'trendingneweqg@gmail.com', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '01044488903', 'Male', NULL, '2022-05-02', NULL, NULL, NULL, 0, NULL, NULL, 28366, NULL, '2022-05-27 14:39:24', '2022-05-27 14:39:24'),
(89, 'mazen', 'melshawardy@gmail.com', 'ce64e9998e9613db77c61fb1fda31c9385ea5ee7', '01044877362', 'Male', NULL, '2022-05-11', NULL, NULL, NULL, 1, NULL, NULL, 82321, '2022-05-30 18:12:27', '2022-05-30 18:11:57', '2022-05-30 18:12:27');

-- --------------------------------------------------------

--
-- Table structure for table `memberships_subscription`
--

CREATE TABLE `memberships_subscription` (
  `Membership_Subscription_ID` int(11) NOT NULL,
  `Membership_ID` int(11) NOT NULL,
  `Member_ID` int(11) NOT NULL,
  `Start_Date` date DEFAULT NULL,
  `End_Date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `memberships_subscription`
--

INSERT INTO `memberships_subscription` (`Membership_Subscription_ID`, `Membership_ID`, `Member_ID`, `Start_Date`, `End_Date`) VALUES
(1, 1, 78, '2022-05-08', '2022-06-08'),
(21, 1, 78, NULL, NULL),
(22, 2, 11, NULL, NULL),
(23, 2, 89, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `members_attendance`
--

CREATE TABLE `members_attendance` (
  `Attendance_ID` int(11) NOT NULL,
  `Date` date NOT NULL DEFAULT current_timestamp(),
  `Attending` time NOT NULL,
  `Leaving` time DEFAULT NULL,
  `Member_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `members_attendance`
--

INSERT INTO `members_attendance` (`Attendance_ID`, `Date`, `Attending`, `Leaving`, `Member_ID`) VALUES
(1, '2022-04-08', '00:00:00', '05:00:00', 14),
(4, '0000-00-00', '00:00:00', NULL, 14),
(7, '2022-04-26', '03:43:30', '04:55:28', 9),
(8, '2022-04-26', '04:00:16', NULL, 78),
(9, '2022-04-26', '04:16:25', NULL, 71),
(10, '2022-04-26', '04:19:49', NULL, 12),
(11, '2022-04-26', '04:20:01', NULL, 12),
(12, '2022-04-26', '04:20:44', NULL, 12),
(13, '2022-04-26', '04:21:53', NULL, 75),
(14, '2022-04-26', '04:23:12', NULL, 14),
(15, '2022-04-26', '04:24:53', '02:00:00', 12),
(16, '2022-04-26', '04:26:13', NULL, 63),
(20, '2022-04-27', '05:01:33', '05:01:47', 9),
(21, '2022-04-28', '01:38:18', '01:38:53', 9),
(22, '2022-05-06', '22:11:00', '22:11:04', 9),
(23, '2022-05-06', '22:36:11', NULL, 60);

-- --------------------------------------------------------

--
-- Table structure for table `members_classes`
--

CREATE TABLE `members_classes` (
  `Member_Class_ID` int(11) NOT NULL,
  `Statue` int(11) NOT NULL,
  `Start_Date` int(11) NOT NULL,
  `Round` int(11) NOT NULL,
  `Member_ID` int(11) NOT NULL,
  `Class_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `members_classes`
--

INSERT INTO `members_classes` (`Member_Class_ID`, `Statue`, `Start_Date`, `Round`, `Member_ID`, `Class_ID`) VALUES
(1, 1, 0, 1, 78, 1),
(5, 0, 0, 1, 80, 1),
(6, 0, 0, 2, 11, 4);

-- --------------------------------------------------------

--
-- Table structure for table `memperships`
--

CREATE TABLE `memperships` (
  `Mempership_ID` int(11) NOT NULL,
  `Category` varchar(256) NOT NULL,
  `Price` int(11) NOT NULL,
  `Period` varchar(8) DEFAULT NULL,
  `Discount_Percentage` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `memperships`
--

INSERT INTO `memperships` (`Mempership_ID`, `Category`, `Price`, `Period`, `Discount_Percentage`) VALUES
(1, 'vip', 12000, 'Monthly', 30),
(2, 'classic', 2000, 'Monthly', 20);

-- --------------------------------------------------------

--
-- Table structure for table `not_member_parent`
--

CREATE TABLE `not_member_parent` (
  `Parent_ID` int(11) NOT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Phone_Number` varchar(16) NOT NULL,
  `Phone_Nmber2` varchar(16) DEFAULT NULL,
  `Full_Name` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `not_member_parent`
--

INSERT INTO `not_member_parent` (`Parent_ID`, `Email`, `Phone_Number`, `Phone_Nmber2`, `Full_Name`) VALUES
(1, 'ahmed@gmail.com', '01055777167', NULL, 'Ahmed Mohamed'),
(2, 'nur@gmail.com', '01063377894', NULL, 'Nur Osman');

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE `partners` (
  `Partner_ID` int(11) NOT NULL,
  `Name` varchar(256) NOT NULL,
  `Founded_Date` date NOT NULL,
  `Certifcations` varchar(256) NOT NULL,
  `Website` varchar(256) DEFAULT NULL,
  `Government_Record` varchar(256) NOT NULL,
  `Address` varchar(256) DEFAULT NULL,
  `Phone_Number` varchar(16) NOT NULL,
  `Phone_Number2` varchar(16) DEFAULT NULL,
  `Other_Contacts` varchar(128) DEFAULT NULL,
  `Email` varchar(256) NOT NULL,
  `Password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `partners`
--

INSERT INTO `partners` (`Partner_ID`, `Name`, `Founded_Date`, `Certifcations`, `Website`, `Government_Record`, `Address`, `Phone_Number`, `Phone_Number2`, `Other_Contacts`, `Email`, `Password`) VALUES
(13, 'mohamed', '2022-04-01', '626cbe6fe39bb.png', NULL, 'defult.png', NULL, '01055767327', NULL, NULL, 'mohame2w1d@gmail.com', 'Mohamed4@123456'),
(15, 'nur', '2022-05-03', '62758b7abbbfb.png', '', '62758b7abc9db.png', '6th of oct', '01099988754', NULL, '', 'nnnn@gmail.com', 'b899f19cd562dac262d8196a512a977d4c761512'),
(16, 'mahmoud', '2022-04-05', '626cbe6fe59bb.png', NULL, 'defult.png', NULL, '01055577169', NULL, NULL, 'mahmoud@gmail.com', 'Mohamed@123456'),
(17, 'mahamed', '2022-04-05', '626cbdhdb2a6b.png', NULL, 'defult.png', NULL, '01055517169', NULL, NULL, 'mahamed@gmail.com', 'Mohammed@123456');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `Review_ID` int(11) NOT NULL,
  `Stars` enum('0','1','2','3','4','5') DEFAULT NULL,
  `Comment` varchar(512) DEFAULT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Member_ID` int(11) NOT NULL,
  `Trainer_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`Review_ID`, `Stars`, `Comment`, `Date`, `Member_ID`, `Trainer_ID`) VALUES
(1, '2', 'good', '2022-04-14 13:41:47', 12, 3),
(2, '5', 'profisiional', '2022-04-14 13:44:44', 9, 3),
(3, NULL, 'come late', '2022-04-25 01:10:43', 11, 3),
(4, NULL, 'come late', '2022-04-25 01:09:51', 14, 3),
(5, NULL, 'come late', '2022-04-25 01:11:51', 14, 3),
(6, NULL, '', '2022-04-25 01:14:15', 14, 3),
(7, NULL, '', '2022-04-25 01:14:27', 14, 3),
(8, NULL, 'good trainer', '2022-04-25 18:09:02', 78, 3),
(9, NULL, 'good trainer', '2022-04-25 18:09:06', 78, 3),
(10, NULL, 'good trainer', '2022-04-25 18:10:48', 78, 3),
(11, NULL, 'good trainer', '2022-04-25 18:18:07', 78, 4),
(12, NULL, 'good trainer', '2022-04-25 18:18:26', 78, 4),
(13, NULL, 'good trainer', '2022-04-25 18:18:32', 78, 4),
(14, NULL, 'good trainer', '2022-04-25 18:18:35', 78, 4),
(15, NULL, 'good trainer', '2022-04-25 18:22:28', 78, 4),
(16, NULL, '', '2022-04-25 18:36:33', 78, 4),
(17, NULL, 'bad', '2022-04-25 18:41:26', 78, 4),
(18, NULL, 'bad', '2022-04-25 18:41:40', 78, 4),
(19, NULL, 'bad', '2022-04-25 18:41:48', 78, 4),
(20, NULL, 'hazem is bad', '2022-04-25 18:42:29', 78, 4),
(21, NULL, 'hazem is bad', '2022-04-25 18:42:35', 78, 4),
(22, NULL, 'hazem is bad', '2022-04-25 18:46:03', 78, 4),
(23, NULL, 'hazem is good\r\n\r\n', '2022-04-25 18:54:55', 78, 4),
(24, NULL, 'hazem is good\r\n\r\n', '2022-04-25 18:55:16', 78, 4),
(25, NULL, 'sggdsgds', '2022-04-25 18:57:47', 78, 4),
(26, NULL, 'hazem is good\r\n\r\n', '2022-04-25 18:59:57', 78, 4),
(27, NULL, '???', '2022-05-06 20:17:15', 78, 4),
(28, NULL, '??', '2022-05-06 20:17:55', 80, 3),
(30, NULL, '???\r\n', '2022-05-06 20:29:57', 80, 3);

-- --------------------------------------------------------

--
-- Table structure for table `subbliers`
--

CREATE TABLE `subbliers` (
  `Subblier_ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Address` varchar(20) DEFAULT NULL,
  `Website` varchar(20) DEFAULT NULL,
  `Phone_Number` varchar(11) NOT NULL,
  `phone_Number2` varchar(11) DEFAULT NULL,
  `Other_Contacts` varchar(50) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subbliers`
--

INSERT INTO `subbliers` (`Subblier_ID`, `Name`, `Address`, `Website`, `Phone_Number`, `phone_Number2`, `Other_Contacts`, `Email`) VALUES
(1, 'mohamed ahmed', 'giza', NULL, '01055007169', NULL, NULL, 'mohd@gmail.com'),
(2, 'nur osama', 'giza', NULL, '01055777167', NULL, NULL, 'nur@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`Class_ID`);

--
-- Indexes for table `classes_dates`
--
ALTER TABLE `classes_dates`
  ADD PRIMARY KEY (`Class_Date_ID`),
  ADD KEY `classes_dates_ibfk_1` (`Class_ID`),
  ADD KEY `classes_dates_ibfk_2` (`Trainer_ID`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`Employee_ID`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `Phone_Number` (`Phone_Number`),
  ADD UNIQUE KEY `Phone_Number2` (`Phone_Number2`);

--
-- Indexes for table `employees_attendance`
--
ALTER TABLE `employees_attendance`
  ADD PRIMARY KEY (`Attendance_ID`),
  ADD KEY `employees_attendance_ibfk_1` (`Employee_ID`);

--
-- Indexes for table `equipments`
--
ALTER TABLE `equipments`
  ADD PRIMARY KEY (`Equipment_ID`),
  ADD KEY `equipments_users_fk` (`Subblier_ID`);

--
-- Indexes for table `foods_systems`
--
ALTER TABLE `foods_systems`
  ADD PRIMARY KEY (`Food_System_ID`),
  ADD KEY `foods_systems_ibfk_1` (`Trainer_ID`),
  ADD KEY `foods_systems_ibfk_2` (`Member_ID`);

--
-- Indexes for table `maintenance_record`
--
ALTER TABLE `maintenance_record`
  ADD PRIMARY KEY (`Maintenance_ID`),
  ADD KEY `maintenance_record_ibfk_1` (`Equipment_ID`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`Member_ID`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `Phone_Number` (`Phone_Number`),
  ADD UNIQUE KEY `Phone_Number2` (`Phone_Number2`),
  ADD KEY `members_ibfk_2` (`Parent_ID`),
  ADD KEY `members_ibfk_3` (`Parent_Member_ID`);

--
-- Indexes for table `memberships_subscription`
--
ALTER TABLE `memberships_subscription`
  ADD PRIMARY KEY (`Membership_Subscription_ID`),
  ADD KEY `Membership_ID` (`Membership_ID`),
  ADD KEY `Member_ID` (`Member_ID`);

--
-- Indexes for table `members_attendance`
--
ALTER TABLE `members_attendance`
  ADD PRIMARY KEY (`Attendance_ID`),
  ADD KEY `members_attendance_ibfk_1` (`Member_ID`);

--
-- Indexes for table `members_classes`
--
ALTER TABLE `members_classes`
  ADD PRIMARY KEY (`Member_Class_ID`),
  ADD KEY `members_classes_ibfk_1` (`Member_ID`),
  ADD KEY `members_classes_ibfk_2` (`Class_ID`);

--
-- Indexes for table `memperships`
--
ALTER TABLE `memperships`
  ADD PRIMARY KEY (`Mempership_ID`);

--
-- Indexes for table `not_member_parent`
--
ALTER TABLE `not_member_parent`
  ADD PRIMARY KEY (`Parent_ID`),
  ADD UNIQUE KEY `Phone_Number` (`Phone_Number`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `Phone_Nmber2` (`Phone_Nmber2`);

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`Partner_ID`),
  ADD UNIQUE KEY `Phone_Number` (`Phone_Number`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`Review_ID`),
  ADD KEY `reviews_ibfk_1` (`Member_ID`),
  ADD KEY `reviews_ibfk_2` (`Trainer_ID`);

--
-- Indexes for table `subbliers`
--
ALTER TABLE `subbliers`
  ADD PRIMARY KEY (`Subblier_ID`),
  ADD UNIQUE KEY `Phone_Number` (`Phone_Number`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `Class_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `classes_dates`
--
ALTER TABLE `classes_dates`
  MODIFY `Class_Date_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `Employee_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `employees_attendance`
--
ALTER TABLE `employees_attendance`
  MODIFY `Attendance_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `foods_systems`
--
ALTER TABLE `foods_systems`
  MODIFY `Food_System_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `maintenance_record`
--
ALTER TABLE `maintenance_record`
  MODIFY `Maintenance_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `Member_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `memberships_subscription`
--
ALTER TABLE `memberships_subscription`
  MODIFY `Membership_Subscription_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `members_attendance`
--
ALTER TABLE `members_attendance`
  MODIFY `Attendance_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `members_classes`
--
ALTER TABLE `members_classes`
  MODIFY `Member_Class_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `memperships`
--
ALTER TABLE `memperships`
  MODIFY `Mempership_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `not_member_parent`
--
ALTER TABLE `not_member_parent`
  MODIFY `Parent_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `Partner_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `Review_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `subbliers`
--
ALTER TABLE `subbliers`
  MODIFY `Subblier_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `classes_dates`
--
ALTER TABLE `classes_dates`
  ADD CONSTRAINT `classes_dates_ibfk_1` FOREIGN KEY (`Class_ID`) REFERENCES `classes` (`Class_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `classes_dates_ibfk_2` FOREIGN KEY (`Trainer_ID`) REFERENCES `employees` (`Employee_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employees_attendance`
--
ALTER TABLE `employees_attendance`
  ADD CONSTRAINT `employees_attendance_ibfk_1` FOREIGN KEY (`Employee_ID`) REFERENCES `employees` (`Employee_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `equipments`
--
ALTER TABLE `equipments`
  ADD CONSTRAINT `equipments_users_fk` FOREIGN KEY (`Subblier_ID`) REFERENCES `subbliers` (`Subblier_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `foods_systems`
--
ALTER TABLE `foods_systems`
  ADD CONSTRAINT `foods_systems_ibfk_1` FOREIGN KEY (`Trainer_ID`) REFERENCES `employees` (`Employee_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `foods_systems_ibfk_2` FOREIGN KEY (`Member_ID`) REFERENCES `members` (`Member_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `maintenance_record`
--
ALTER TABLE `maintenance_record`
  ADD CONSTRAINT `maintenance_record_ibfk_1` FOREIGN KEY (`Equipment_ID`) REFERENCES `equipments` (`Equipment_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `members_ibfk_2` FOREIGN KEY (`Parent_ID`) REFERENCES `not_member_parent` (`Parent_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `members_ibfk_3` FOREIGN KEY (`Parent_Member_ID`) REFERENCES `members` (`Member_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `memberships_subscription`
--
ALTER TABLE `memberships_subscription`
  ADD CONSTRAINT `memberships_subscription_ibfk_1` FOREIGN KEY (`Membership_ID`) REFERENCES `memperships` (`Mempership_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `memberships_subscription_ibfk_2` FOREIGN KEY (`Member_ID`) REFERENCES `members` (`Member_ID`) ON DELETE CASCADE;

--
-- Constraints for table `members_attendance`
--
ALTER TABLE `members_attendance`
  ADD CONSTRAINT `members_attendance_ibfk_1` FOREIGN KEY (`Member_ID`) REFERENCES `members` (`Member_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `members_classes`
--
ALTER TABLE `members_classes`
  ADD CONSTRAINT `members_classes_ibfk_1` FOREIGN KEY (`Member_ID`) REFERENCES `members` (`Member_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `members_classes_ibfk_2` FOREIGN KEY (`Class_ID`) REFERENCES `classes` (`Class_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`Member_ID`) REFERENCES `members` (`Member_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`Trainer_ID`) REFERENCES `employees` (`Employee_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
