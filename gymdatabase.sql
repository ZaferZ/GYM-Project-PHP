-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 07, 2024 at 06:26 AM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gymdatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

DROP TABLE IF EXISTS `accounts`;
CREATE TABLE IF NOT EXISTS `accounts` (
  `Account_ID` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL COMMENT 'Име',
  `Username` varchar(200) NOT NULL COMMENT 'Потребителско име',
  `Password` varchar(200) NOT NULL COMMENT 'Парола',
  `Person_Type` int NOT NULL COMMENT 'Тип на акаунта',
  PRIMARY KEY (`Account_ID`)
) ;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`Account_ID`, `Name`, `Username`, `Password`, `Person_Type`) VALUES
(1, 'Zafer', 'admin', 'admin', 1),
(2, 'Denis', 'user', 'user', 0);

-- --------------------------------------------------------

--
-- Table structure for table `exercise_type`
--

DROP TABLE IF EXISTS `exercise_type`;
CREATE TABLE IF NOT EXISTS `exercise_type` (
  `Ex_type_ID` int NOT NULL AUTO_INCREMENT COMMENT 'ПК',
  `Name` varchar(100) NOT NULL COMMENT 'Вид на упражнение',
  `Description` varchar(500) NOT NULL COMMENT 'Описание',
  PRIMARY KEY (`Ex_type_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `exercise_type`
--

INSERT INTO `exercise_type` (`Ex_type_ID`, `Name`, `Description`) VALUES
(1, 'Biceps', 'Some exercises that will hit your biceps'),
(2, 'Back', 'If you want that V shaped back try these excercises'),
(3, 'Forearm', 'Get the pump in your forearm with these exercises'),
(4, 'Triceps', 'Make your arm look bigger training your triceps'),
(5, 'Legs', 'Get the leg pump with these exercises'),
(6, 'Chest', 'Make your chest bigger!');

-- --------------------------------------------------------

--
-- Table structure for table `myworkouts`
--

DROP TABLE IF EXISTS `myworkouts`;
CREATE TABLE IF NOT EXISTS `myworkouts` (
  `Account_ID` int NOT NULL COMMENT 'ВК потребител',
  `Workout_ID` int NOT NULL COMMENT 'ВК Упражнение',
  KEY `Account_ID` (`Account_ID`),
  KEY `Workout_ID` (`Workout_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `myworkouts`
--

INSERT INTO `myworkouts` (`Account_ID`, `Workout_ID`) VALUES
(1, 1),
(2, 5),
(1, 3),
(2, 3),
(1, 2),
(1, 4),
(2, 2),
(2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `workouts`
--

DROP TABLE IF EXISTS `workouts`;
CREATE TABLE IF NOT EXISTS `workouts` (
  `Workout_ID` int NOT NULL AUTO_INCREMENT COMMENT 'ПК',
  `Name` varchar(100) NOT NULL COMMENT 'Наимонование на упражнение',
  `Image_Url` varchar(255) NOT NULL COMMENT 'Път към изображение',
  `Description` varchar(500) NOT NULL COMMENT 'Описание на упражнение',
  `Type_ID` int DEFAULT NULL COMMENT 'Вид на упражнение',
  PRIMARY KEY (`Workout_ID`),
  KEY `Type_ID` (`Type_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `workouts`
--

INSERT INTO `workouts` (`Workout_ID`, `Name`, `Image_Url`, `Description`, `Type_ID`) VALUES
(1, 'Biceps curls', 'biceps1.jpg', 'Lift the dumbels to your chest using only your biceps then lower your arm.', 1),
(4, 'Squad', 'squat-800.jpg', 'Pick up the bar and sqad down then up.', 5),
(5, 'Incline Dumbell Press', 'incline-dumbbell-bench-press-800.jpg', 'Press the dumbels up at shoulder width and then lover them.', 6),
(6, 'Triceps Extentions', 'seated-dumbbell-tricep-extension-800.jpg', 'Pick up a proper weight and push it behind your back with both arms.', 4),
(2, 'Bench Press', 'bench-press-800.jpg', 'Pick up the bar around shoulder width and lover it till it touches your chest and push.', 6),
(3, 'Lat Pulldown', 'lat-pulldown-800.jpg', 'Pull a long bar attached to the cable, towards your chest, and then slowly extend your arms back to starting position.', 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
