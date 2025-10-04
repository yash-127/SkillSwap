-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2025 at 09:42 PM
-- Server version: 5.5.27-log
-- PHP Version: 5.4.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `skillswap`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` int(10) NOT NULL,
  `address` varchar(350) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`name`, `email`, `password`, `phone`, `address`) VALUES
('Soham Pareek', 'soham098@gmail.com', '123', 1234567891, 'Ram Vihar, Bikaner'),
('Yash Joshi', 'yash098@gmail.com', '123', 2147483647, 'Radhe Kunj , Bikaner'),
('Jyoti Soni', 'jyoti098@gmail.com', '123', 2147483647, 'Shree Villa , Churu'),
('Ishanvi Pandey', 'ishanvi@gmail.com', '123', 1234567895, 'BTU Hostle , Churu'),
('Vishnu Daave', 'vishnu@gmail.com', '123', 2147483647, 'Nain Marg , Kota'),
('Ram Suthar', 'ram098@gmail.com', '123', 2147483647, 'Pareek Chowk , Kota'),
('Vikas Purohit', 'vikas@gmail.com', '123', 2147483647, 'Purohit Dhani , Jaipur'),
('Susmita Sharma', 'susmita@gmail.com', '123', 2147483647, 'Jheel Nagar , Shobhasar '),
('Devanand Vyas', 'devanand@gmail.com', '123', 876876836, 'Kushraj road , Mukta Prashad');

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE IF NOT EXISTS `details` (
  `req_offer` varchar(30) NOT NULL,
  `sn` int(11) NOT NULL,
  `code` varchar(100) NOT NULL,
  `category` varchar(80) NOT NULL,
  `topic` varchar(100) NOT NULL,
  `user` varchar(80) NOT NULL,
  `description` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`req_offer`, `sn`, `code`, `category`, `topic`, `user`, `description`) VALUES
('offer', 1, 'yuoFHMx_1', 'music', 'Basic Guitar Lesson', 'soham098@gmail.com', 'Learn chords and basic songs. Absolute beginners welcome !'),
('offer', 2, 'UwAj7S4_2', 'art', 'Mehandi Designing Tips', 'jyoti098@gmail.com', 'Learn Various mehandi designing tips and tricks. Learn about all forms of Mehandi.'),
('offer', 3, '3p7ECis_3', 'tech', 'Fullstack Web Developnment', 'yash098@gmail.com', 'I can Help you to learn fronthand + backhand using CSS, HTML ,JS and JSP.'),
('request', 4, 'Nd3wB5l_4', 'music', 'I want to learn Dance ', 'ishanvi@gmail.com', 'Does there is anyone who have great experience in Dance and can teach me Dance. There is wedding in my family so my family members want to learn dance .'),
('request', 6, 'Q9ohuMk_6', 'home', 'I want to Swim', 'vikas@gmail.com', 'Does Anyone can teach me the basics of Swimming . I want to learn swimming in deep oceans as i have this dream .\r\n'),
('offer', 7, 'CAw1GWE_7', 'home', 'Body Building Pro Tips', 'vikas@gmail.com', 'I have experience of 8 years in this healthy stream . I also worked as a Gym Trainer in Marudhar Gym for 6 years . I can help you to gain masculine body with constant practice and a good diet plan .'),
('request', 8, 'WIoKHPY_8', 'home', 'How to make Pizza At Home', 'susmita@gmail.com', 'How can i make pizza at home ? what are the ingredients required for it ? Is there anyone who can help me to prepare it ? help me to make my family happy ?'),
('offer', 9, '6STZUA3_9', 'home', 'Diwali Rangoli Classes', 'devanand@gmail.com', 'I will teach you all shades of Rangoli . We will learn 15 types of Special pattern including Rajasthani and bengoli designs . This Diwali make your house more beautiful and colorful .');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
