-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2022 at 12:49 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `314`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `account_status` varchar(25) NOT NULL,
  `name` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `pname` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`username`, `password`, `account_status`, `name`, `email`, `pname`) VALUES
('user1', 'p1', 'Active', 'Jerron1', 'email1', 'Admin'),
('user10', 'p10', 'Active', 'Jerron10', 'email10', 'Author'),
('user100', 'p100', 'Active', 'Wei Hao5', 'email100', 'Conference Chair'),
('user11', 'p11', 'Active', 'Jerron11', 'email11', 'Author'),
('user12', 'p12', 'Active', 'Jerron12', 'email12', 'Author'),
('user13', 'p13', 'Active', 'Jerron13', 'email13', 'Author'),
('user14', 'p14', 'Active', 'Jerron14', 'email14', 'Author'),
('user15', 'p15', 'Active', 'Jerron15', 'email15', 'Author'),
('user16', 'p16', 'Active', 'Ava1', 'email16', 'Conference Chair'),
('user17', 'p17', 'Active', 'Ava2', 'email17', 'Conference Chair'),
('user18', 'p18', 'Active', 'Ava3', 'email18', 'Conference Chair'),
('user19', 'p19', 'Active', 'Ava4', 'email19', 'Conference Chair'),
('user2', 'p2', 'Active', 'Jerron2', 'email2', 'Author'),
('user20', 'p20', 'Active', 'Ava5', 'email20', 'Conference Chair'),
('user21', 'p21', 'Active', 'Ava6', 'email21', 'Reviewer'),
('user22', 'p22', 'Active', 'Ava7', 'email22', 'Reviewer'),
('user23', 'p23', 'Active', 'Ava8', 'email23', 'Reviewer'),
('user24', 'p24', 'Active', 'Ava9', 'email24', 'Reviewer'),
('user25', 'p25', 'Active', 'Ava10', 'email25', 'Reviewer'),
('user26', 'p26', 'Active', 'Ava11', 'email26', 'Author'),
('user27', 'p27', 'Active', 'Ava12', 'email27', 'Author'),
('user28', 'p28', 'Active', 'Ava13', 'email28', 'Author'),
('user29', 'p29', 'Active', 'Ava14', 'email29', 'Author'),
('user3', 'p3', 'Active', 'Jerron3', 'email3', 'Conference Chair'),
('user30', 'p30', 'Active', 'Ava15', 'email30', 'Author'),
('user31', 'p31', 'Active', 'Yin1', 'email31', 'Author'),
('user32', 'p32', 'Active', 'Yin2', 'email32', 'Author'),
('user33', 'p33', 'Active', 'Yin3', 'email33', 'Author'),
('user34', 'p34', 'Active', 'Yin4', 'email34', 'Author'),
('user35', 'p35', 'Active', 'Yin5', 'email35', 'Author'),
('user36', 'p36', 'Active', 'Yin6', 'email36', 'Reviewer'),
('user37', 'p37', 'Active', 'Yin7', 'email37', 'Reviewer'),
('user38', 'p38', 'Active', 'Yin8', 'email38', 'Reviewer'),
('user39', 'p39', 'Active', 'Yin9', 'email39', 'Reviewer'),
('user4', 'p4', 'Active', 'Jerron4', 'email4', 'Reviewer'),
('user40', 'p40', 'Active', 'Yin10', 'email40', 'Reviewer'),
('user41', 'p41', 'Active', 'Yin11', 'email41', 'Conference Chair'),
('user42', 'p42', 'Active', 'Yin12', 'email42', 'Conference Chair'),
('user43', 'p43', 'Active', 'Yin13', 'email43', 'Conference Chair'),
('user44', 'p44', 'Active', 'Yin14', 'email44', 'Conference Chair'),
('user45', 'p45', 'Active', 'Yin15', 'email45', 'Conference Chair'),
('user46', 'p46', 'Active', 'John1', 'email46', 'Conference Chair'),
('user47', 'p47', 'Active', 'John2', 'email47', 'Conference Chair'),
('user48', 'p48', 'Active', 'John3', 'email48', 'Conference Chair'),
('user49', 'p49', 'Active', 'John4', 'email49', 'Conference Chair'),
('user5', 'p5', 'Active', 'Jerron5', 'email5', 'Reviewer'),
('user50', 'p50', 'Active', 'John5', 'email50', 'Conference Chair'),
('user51', 'p51', 'Active', 'John6', 'email51', 'Reviewer'),
('user52', 'p52', 'Active', 'John7', 'email52', 'Reviewer'),
('user53', 'p53', 'Active', 'John8', 'email53', 'Reviewer'),
('user54', 'p54', 'Active', 'John9', 'email54', 'Reviewer'),
('user55', 'p55', 'Active', 'John6', 'email55', 'Author'),
('user56', 'p56', 'Active', 'John7', 'email56', 'Author'),
('user57', 'p57', 'Active', 'John8', 'email57', 'Author'),
('user58', 'p58', 'Active', 'John9', 'email58', 'Author'),
('user59', 'p59', 'Active', 'John10', 'email59', 'Author'),
('user6', 'p6', 'Active', 'Jerron6', 'email6', 'Admin'),
('user60', 'p60', 'Active', 'John11', 'email60', 'Reviewer'),
('user61', 'p61', 'Active', 'John12', 'email61', 'Reviewer'),
('user62', 'p62', 'Active', 'John13', 'email62', 'Reviewer'),
('user63', 'p63', 'Active', 'John14', 'email63', 'Reviewer'),
('user64', 'p64', 'Active', 'John15', 'email64', 'Reviewer'),
('user65', 'p65', 'Active', 'Jerron16', 'email65', 'Admin'),
('user66', 'p66', 'Active', 'Jerron17', 'email66', 'Admin'),
('user67', 'p67', 'Active', 'Jerron18', 'email67', 'Admin'),
('user68', 'p68', 'Active', 'Jerron19', 'email68', 'Admin'),
('user69', 'p69', 'Active', 'Jerron20', 'email69', 'Admin'),
('user7', 'p7', 'Active', 'Jerron7', 'email7', 'Author'),
('user70', 'p70', 'Active', 'Raymond1', 'email70', 'Reviewer'),
('user71', 'p71', 'Active', 'Raymond2', 'email71', 'Reviewer'),
('user72', 'p72', 'Active', 'Raymond3', 'email72', 'Reviewer'),
('user73', 'p73', 'Active', 'Raymond4', 'email73', 'Reviewer'),
('user74', 'p74', 'Active', 'Raymond5', 'email74', 'Reviewer'),
('user75', 'p75', 'Active', 'Raymond6', 'email75', 'Author'),
('user76', 'p76', 'Active', 'Raymond7', 'email76', 'Author'),
('user77', 'p77', 'Active', 'Raymond8', 'email77', 'Author'),
('user78', 'p78', 'Active', 'Raymond9', 'email78', 'Author'),
('user79', 'p79', 'Active', 'Raymond10', 'email79', 'Author'),
('user8', 'p8', 'Active', 'Jerron8', 'email8', 'Conference Chair'),
('user80', 'p80', 'Active', 'Raymond11', 'email80', 'Conference Chair'),
('user81', 'p81', 'Active', 'Raymond12', 'email81', 'Conference Chair'),
('user82', 'p82', 'Active', 'Raymond13', 'email82', 'Conference Chair'),
('user83', 'p83', 'Active', 'Raymond14', 'email83', 'Conference Chair'),
('user84', 'p84', 'Active', 'Raymond15', 'email84', 'Conference Chair'),
('user85', 'p85', 'Active', 'Raymond16', 'email85', 'Author'),
('user86', 'p86', 'Active', 'Raymond17', 'email86', 'Author'),
('user87', 'p87', 'Active', 'Raymond18', 'email87', 'Author'),
('user88', 'p88', 'Active', 'Raymond19', 'email88', 'Author'),
('user89', 'p89', 'Active', 'Raymond20', 'email89', 'Author'),
('user9', 'p9', 'Active', 'Jerron9', 'email9', 'Conference Chair'),
('user90', 'p90', 'Active', 'Raymond21', 'email90', 'Author'),
('user91', 'p91', 'Active', 'Zi Hao1', 'email91', 'Conference Chair'),
('user92', 'p92', 'Active', 'Zi Hao2', 'email92', 'Conference Chair'),
('user93', 'p93', 'Active', 'Zi Hao3', 'email93', 'Conference Chair'),
('user94', 'p94', 'Active', 'Zi Hao4', 'email94', 'Conference Chair'),
('user95', 'p95', 'Active', 'Zi Hao5', 'email95', 'Conference Chair'),
('user96', 'p96', 'Active', 'Wei Hao1', 'email96', 'Conference Chair'),
('user97', 'p97', 'Active', 'Wei Hao2', 'email97', 'Conference Chair'),
('user98', 'p98', 'Active', 'Wei Hao3', 'email98', 'Conference Chair'),
('user99', 'p99', 'Active', 'Wei Hao4', 'email99', 'Conference Chair');

-- --------------------------------------------------------

--
-- Table structure for table `bid`
--

CREATE TABLE `bid` (
  `paper_id` int(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `bid_status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bid`
--

INSERT INTO `bid` (`paper_id`, `username`, `bid_status`) VALUES
(1, 'user21', 'Pending'),
(1, 'user22', 'Pending'),
(1, 'user23', 'Pending'),
(1, 'user24', 'Accepted'),
(1, 'user36', 'Pending'),
(1, 'user37', 'Pending'),
(1, 'user38', 'Accepted'),
(1, 'user4', 'Accepted'),
(1, 'user5', 'Accepted'),
(1, 'user51', 'Accepted'),
(1, 'user52', 'Pending'),
(1, 'user53', 'Pending'),
(1, 'user60', 'Rejected'),
(2, 'user21', 'Accepted'),
(2, 'user22', 'Accepted'),
(2, 'user23', 'Accepted'),
(2, 'user24', 'Pending'),
(2, 'user36', 'Pending'),
(2, 'user39', 'Pending'),
(2, 'user60', 'Accepted'),
(2, 'user61', 'Pending'),
(2, 'user62', 'Pending'),
(2, 'user63', 'Accepted'),
(2, 'user64', 'Accepted'),
(4, 'user21', 'Accepted'),
(4, 'user22', 'Pending'),
(4, 'user36', 'Accepted'),
(4, 'user37', 'Accepted'),
(4, 'user38', 'Pending'),
(4, 'user4', 'Accepted'),
(4, 'user40', 'Rejected'),
(4, 'user5', 'Pending'),
(4, 'user60', 'Accepted'),
(4, 'user61', 'Rejected'),
(4, 'user62', 'Pending'),
(5, 'user4', 'Accepted'),
(6, 'user21', 'Pending'),
(6, 'user22', 'Pending'),
(6, 'user23', 'Pending'),
(6, 'user24', 'Accepted'),
(6, 'user36', 'Pending'),
(6, 'user37', 'Pending'),
(6, 'user38', 'Accepted'),
(6, 'user4', 'Pending'),
(6, 'user51', 'Accepted'),
(6, 'user52', 'Pending'),
(6, 'user53', 'Pending'),
(6, 'user60', 'Rejected'),
(7, 'user21', 'Pending'),
(7, 'user22', 'Pending'),
(7, 'user23', 'Accepted'),
(7, 'user36', 'Pending'),
(7, 'user37', 'Accepted'),
(7, 'user38', 'Pending'),
(7, 'user39', 'Pending'),
(7, 'user4', 'Accepted'),
(7, 'user5', 'Pending'),
(7, 'user53', 'Accepted'),
(7, 'user54', 'Pending'),
(8, 'user21', 'Pending'),
(8, 'user22', 'Accepted'),
(8, 'user37', 'Pending'),
(8, 'user38', 'Pending'),
(8, 'user39', 'Pending'),
(8, 'user5', 'Accepted'),
(8, 'user60', 'Pending'),
(8, 'user61', 'Pending'),
(8, 'user62', 'Accepted'),
(8, 'user63', 'Accepted'),
(8, 'user64', 'Pending'),
(9, 'user21', 'Accepted'),
(9, 'user22', 'Pending'),
(9, 'user36', 'Accepted'),
(9, 'user37', 'Accepted'),
(9, 'user38', 'Pending'),
(9, 'user4', 'Rejected'),
(9, 'user40', 'Rejected'),
(9, 'user5', 'Pending'),
(9, 'user60', 'Accepted'),
(9, 'user61', 'Rejected'),
(9, 'user62', 'Pending'),
(10, 'user21', 'Accepted'),
(10, 'user22', 'Pending'),
(10, 'user36', 'Accepted'),
(10, 'user37', 'Rejected'),
(10, 'user38', 'Pending'),
(10, 'user4', 'Rejected'),
(10, 'user40', 'Rejected'),
(10, 'user5', 'Pending'),
(10, 'user60', 'Accepted'),
(10, 'user61', 'Rejected'),
(10, 'user62', 'Pending'),
(11, 'user24', 'Accepted'),
(11, 'user25', 'Pending'),
(11, 'user36', 'Pending'),
(11, 'user37', 'Pending'),
(11, 'user38', 'Pending'),
(11, 'user39', 'Accepted'),
(11, 'user4', 'Pending'),
(11, 'user40', 'Pending'),
(11, 'user5', 'Accepted'),
(11, 'user54', 'Rejected'),
(11, 'user60', 'Pending'),
(13, 'user21', 'Pending'),
(13, 'user22', 'Pending'),
(13, 'user23', 'Pending'),
(13, 'user24', 'Accepted'),
(13, 'user36', 'Pending'),
(13, 'user37', 'Pending'),
(13, 'user38', 'Accepted'),
(13, 'user4', 'Rejected'),
(13, 'user51', 'Accepted'),
(13, 'user52', 'Pending'),
(13, 'user53', 'Pending'),
(14, 'user21', 'Accepted'),
(14, 'user22', 'Pending'),
(14, 'user36', 'Accepted'),
(14, 'user37', 'Accepted'),
(14, 'user38', 'Pending'),
(14, 'user4', 'Rejected'),
(14, 'user40', 'Rejected'),
(14, 'user5', 'Pending'),
(14, 'user60', 'Accepted'),
(14, 'user61', 'Rejected'),
(14, 'user62', 'Pending'),
(15, 'user21', 'Rejected'),
(15, 'user22', 'Accepted'),
(15, 'user37', 'Rejected'),
(15, 'user38', 'Pending'),
(15, 'user39', 'Pending'),
(15, 'user5', 'Accepted'),
(15, 'user60', 'Rejected'),
(15, 'user61', 'Pending'),
(15, 'user62', 'Accepted'),
(15, 'user63', 'Accepted'),
(15, 'user64', 'Pending'),
(18, 'user21', 'Pending'),
(18, 'user22', 'Pending'),
(18, 'user23', 'Pending'),
(18, 'user24', 'Accepted'),
(18, 'user36', 'Pending'),
(18, 'user37', 'Pending'),
(18, 'user38', 'Accepted'),
(18, 'user4', 'Pending'),
(18, 'user51', 'Accepted'),
(18, 'user52', 'Pending'),
(18, 'user53', 'Pending'),
(19, 'user21', 'Accepted'),
(19, 'user22', 'Pending'),
(19, 'user23', 'Accepted'),
(19, 'user24', 'Pending'),
(19, 'user36', 'Pending'),
(19, 'user37', 'Pending'),
(19, 'user4', 'Pending'),
(19, 'user51', 'Pending'),
(19, 'user53', 'Pending'),
(19, 'user62', 'Accepted'),
(19, 'user63', 'Pending'),
(22, 'user21', 'Accepted'),
(22, 'user22', 'Pending'),
(22, 'user23', 'Accepted'),
(22, 'user24', 'Pending'),
(22, 'user36', 'Pending'),
(22, 'user37', 'Pending'),
(22, 'user38', 'Accepted'),
(22, 'user39', 'Pending'),
(22, 'user4', 'Pending'),
(22, 'user5', 'Accepted'),
(22, 'user53', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(25) NOT NULL,
  `review_id` int(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `comment_text` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `review_id`, `username`, `comment_text`) VALUES
(1, 1, 'user4', 'I agree still'),
(2, 1, 'user21', 'I do not agree'),
(3, 1, 'user22', 'I also do not agree'),
(4, 2, 'user5', 'I do not agree'),
(5, 2, 'user36', 'I agree still'),
(6, 2, 'user37', 'I also agree'),
(7, 4, 'user51', 'I disagree'),
(8, 4, 'user40', 'I also disagree'),
(9, 4, 'user39', 'I also disagree'),
(10, 5, 'user36', 'I agree still'),
(11, 5, 'user37', 'I also agree'),
(12, 5, 'user22', 'I disagree'),
(13, 6, 'user51', 'I disagree'),
(14, 6, 'user40', 'I also disagree'),
(15, 6, 'user39', 'I also disagree'),
(16, 7, 'user36', 'I agree still'),
(17, 7, 'user37', 'I also agree'),
(18, 7, 'user60', 'I also agree'),
(19, 8, 'user36', 'I agree still'),
(20, 8, 'user37', 'I also agree'),
(21, 8, 'user61', 'I disagree'),
(22, 9, 'user23', 'I agree still'),
(23, 9, 'user25', 'I also agree'),
(24, 9, 'user64', 'I also agree'),
(25, 10, 'user51', 'I disagree'),
(26, 10, 'user40', 'I also disagree'),
(27, 10, 'user39', 'I also disagree'),
(28, 11, 'user38', 'I agree still'),
(29, 11, 'user62', 'I also agree'),
(30, 11, 'user51', 'I disagree'),
(31, 13, 'user5', 'I disagree'),
(32, 13, 'user4', 'I also disagree'),
(33, 13, 'user36', 'I also disagree'),
(34, 14, 'user36', 'I agree still'),
(35, 14, 'user54', 'I also agree'),
(36, 14, 'user22', 'I also agree'),
(37, 15, 'user52', 'I agree still'),
(38, 15, 'user54', 'I also agree'),
(39, 15, 'user39', 'I disagree'),
(40, 18, 'user21', 'I agree still'),
(41, 18, 'user51', 'I also agree'),
(42, 18, 'user40', 'I disagree'),
(43, 19, 'user39', 'I disagree'),
(44, 19, 'user25', 'I also disagree'),
(45, 19, 'user5', 'I also disagree'),
(46, 22, 'user54', 'I agree still'),
(47, 22, 'user22', 'I also agree'),
(48, 22, 'user37', 'I also agree'),
(49, 22, 'user51', 'I disagree'),
(50, 22, 'user40', 'I also disagree'),
(51, 22, 'user39', 'I also disagree'),
(52, 2, 'user36', 'I agree still'),
(53, 2, 'user37', 'I also agree'),
(54, 2, 'user37', 'I also agree'),
(55, 4, 'user51', 'I disagree'),
(56, 4, 'user40', 'I also disagree'),
(57, 4, 'user39', 'I also disagree'),
(58, 5, 'user36', 'I agree still'),
(59, 5, 'user37', 'I also agree'),
(60, 5, 'user37', 'I disagree'),
(61, 6, 'user51', 'I disagree'),
(62, 6, 'user40', 'I also disagree'),
(63, 6, 'user39', 'I also disagree'),
(64, 7, 'user36', 'I agree still'),
(65, 7, 'user37', 'I also agree'),
(66, 7, 'user37', 'I also agree'),
(67, 8, 'user36', 'I agree still'),
(68, 8, 'user37', 'I also agree'),
(69, 8, 'user37', 'I disagree'),
(70, 9, 'user23', 'I agree still'),
(71, 9, 'user25', 'I also agree'),
(72, 9, 'user64', 'I also agree'),
(73, 10, 'user51', 'I disagree'),
(74, 10, 'user40', 'I also disagree'),
(75, 10, 'user39', 'I also disagree'),
(76, 11, 'user38', 'I agree still'),
(77, 11, 'user62', 'I also agree'),
(78, 11, 'user51', 'I disagree'),
(79, 13, 'user5', 'I disagree'),
(80, 13, 'user4', 'I also disagree'),
(81, 13, 'user36', 'I also disagree'),
(82, 14, 'user36', 'I agree still'),
(83, 14, 'user54', 'I also agree'),
(84, 14, 'user22', 'I also agree'),
(85, 15, 'user52', 'I agree still'),
(86, 15, 'user54', 'I also agree'),
(87, 15, 'user39', 'I disagree'),
(88, 18, 'user21', 'I agree still'),
(89, 18, 'user51', 'I also agree'),
(90, 18, 'user40', 'I disagree'),
(91, 19, 'user39', 'I disagree'),
(92, 19, 'user25', 'I also disagree'),
(93, 19, 'user5', 'I also disagree'),
(94, 22, 'user54', 'I agree still'),
(95, 22, 'user22', 'I also agree'),
(96, 22, 'user37', 'I also agree'),
(97, 22, 'user51', 'I disagree'),
(98, 22, 'user40', 'I also disagree'),
(99, 22, 'user39', 'I also disagree'),
(100, 22, 'user51', 'I disagree'),
(101, 22, 'user40', 'I also disagree'),
(102, 22, 'user39', 'I also disagree'),
(103, 22, 'user51', 'I disagree'),
(104, 22, 'user40', 'I also disagree'),
(105, 22, 'user39', 'I also disagree'),
(106, 22, 'user51', 'I disagree'),
(107, 22, 'user40', 'I also disagree'),
(108, 22, 'user39', 'I also disagree');

-- --------------------------------------------------------

--
-- Table structure for table `co_author`
--

CREATE TABLE `co_author` (
  `paper_id` int(25) NOT NULL,
  `username` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `co_author`
--

INSERT INTO `co_author` (`paper_id`, `username`) VALUES
(3, 'user10'),
(3, 'user2'),
(5, 'user2'),
(7, 'user10'),
(7, 'user11'),
(7, 'user12'),
(9, 'user57'),
(9, 'user58'),
(10, 'user27'),
(10, 'user29'),
(12, 'user27'),
(12, 'user28'),
(12, 'user29'),
(13, 'user26'),
(13, 'user28'),
(13, 'user30'),
(14, 'user27'),
(14, 'user28'),
(14, 'user29'),
(15, 'user32'),
(15, 'user33'),
(15, 'user34'),
(18, 'user59'),
(19, 'user33'),
(19, 'user34'),
(19, 'user52'),
(20, 'user56'),
(21, 'user32'),
(21, 'user59'),
(22, 'user55'),
(22, 'user58'),
(22, 'user59'),
(23, 'user56'),
(23, 'user57'),
(23, 'user59'),
(24, 'user55'),
(24, 'user57'),
(24, 'user58'),
(25, 'user10'),
(25, 'user12'),
(25, 'user15'),
(26, 'user2'),
(26, 'user26'),
(26, 'user31'),
(27, 'user32'),
(27, 'user33'),
(27, 'user55'),
(31, 'user55'),
(31, 'user58'),
(31, 'user7'),
(34, 'user27'),
(34, 'user30'),
(34, 'user35'),
(35, 'user28'),
(35, 'user56'),
(35, 'user59'),
(39, 'user29'),
(39, 'user30'),
(39, 'user57'),
(41, 'user2'),
(41, 'user28'),
(41, 'user35'),
(43, 'user10'),
(43, 'user12'),
(43, 'user15'),
(44, 'user2'),
(44, 'user26'),
(44, 'user31'),
(50, 'user32'),
(50, 'user33'),
(50, 'user55'),
(51, 'user55'),
(51, 'user58'),
(51, 'user7'),
(52, 'user27'),
(52, 'user30'),
(52, 'user35'),
(53, 'user28'),
(53, 'user56'),
(53, 'user59'),
(54, 'user29'),
(54, 'user30'),
(54, 'user57'),
(55, 'user2'),
(55, 'user28'),
(55, 'user35'),
(56, 'user10'),
(56, 'user12'),
(56, 'user15'),
(57, 'user2'),
(57, 'user26'),
(57, 'user31'),
(58, 'user32'),
(58, 'user33'),
(58, 'user55'),
(58, 'user7'),
(59, 'user27'),
(59, 'user30'),
(59, 'user35'),
(60, 'user28'),
(60, 'user56'),
(60, 'user59'),
(61, 'user29'),
(61, 'user30'),
(61, 'user57'),
(67, 'user2'),
(67, 'user28'),
(67, 'user35');

-- --------------------------------------------------------

--
-- Table structure for table `paper`
--

CREATE TABLE `paper` (
  `paper_id` int(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `title` varchar(100) NOT NULL,
  `paper_status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paper`
--

INSERT INTO `paper` (`paper_id`, `username`, `title`, `paper_status`) VALUES
(1, 'user2', 'XAMPP documentation', 'Accepted'),
(2, 'user7', 'Guide to testing PHP code', 'Pending'),
(3, 'user12', 'UMLet for new students', 'Rejected'),
(4, 'user2', 'How to setup Github desktop', 'Accepted'),
(5, 'user10', 'PHP for intermediate users', 'Pending'),
(6, 'user11', 'Introduction to MySQL', 'Pending'),
(7, 'user13', 'Indentation in programming', 'Accepted'),
(8, 'user14', 'Programming fundamentals', 'Pending'),
(9, 'user15', 'The practice of leaving comments to explain long lines of code', 'Pending'),
(10, 'user26', 'An introduction to STAR UML', 'Accepted'),
(11, 'user27', 'Advanced UMLet diagrams', 'Pending'),
(12, 'user28', 'The correct way to set up Google docs for group cooperation\n', 'Rejected'),
(13, 'user29', 'How to construct a Gantt Chart', 'Pending'),
(14, 'user30', 'Introduction to using Taiga', 'Pending'),
(15, 'user31', 'Guide to install XAMPP', 'Pending'),
(16, 'user32', 'Guide to install Sublime text', 'Rejected'),
(17, 'user33', 'Guide to install plugins on VSC', 'Rejected'),
(18, 'user34', 'CSS for intermediate dummies', 'Pending'),
(19, 'user35', 'CSS programming for advanced dummies', 'Pending'),
(20, 'user55', 'Database performance tuning', 'Rejected'),
(21, 'user56', 'Advanced STAR UML diagrams', 'Rejected'),
(22, 'user57', 'PHP for absolute beginners', 'Accepted'),
(23, 'user58', 'Tips for beginners to programming with PHP', 'Rejected'),
(24, 'user59', 'How to setup an Apache server', 'Rejected'),
(25, 'user21', 'Introduction to Java', 'Pending'),
(26, 'user22', 'Introduction to C++', 'Pending'),
(27, 'user23', 'Introduction to C#', 'Rejected'),
(28, 'user24', 'Introduction to Python', 'Pending'),
(29, 'user25', 'Introduction to Unity', 'Pending'),
(30, 'user36', 'Introduction to Unreal Engine', 'Rejected'),
(31, 'user37', 'Intermediate level Java', 'Pending'),
(32, 'user38', 'Intermediate level C++', 'Pending'),
(33, 'user39', 'Intermediate level C#', 'Pending'),
(34, 'user4', 'Intermediate level Python', 'Rejected'),
(35, 'user40', 'Intermediate level Unity techniques', 'Pending'),
(36, 'user41', 'Intermediate level Unreal Engine techniques', 'Pending'),
(37, 'user5', 'Advanced level Java', 'Pending'),
(38, 'user51', 'Advanced level C++', 'Pending'),
(39, 'user52', 'Advanced level C#', 'Rejected'),
(40, 'user53', 'Advanced level Python', 'Pending'),
(41, 'user53', 'Advanced level Unity techniques', 'Rejected'),
(42, 'user54', 'Advanced level Unreal Engine techniques', 'Pending'),
(43, 'user60', 'Common errors new Git users encounter', 'Pending'),
(44, 'user61', 'How to setup a Github account', 'Pending'),
(45, 'user62', 'Java programming for advanced dummies', 'Rejected'),
(46, 'user63', 'C++ programming for advanced dummies', 'Pending'),
(47, 'user21', 'C# programming for advanced dummies', 'Pending'),
(48, 'user22', 'Python programming for advanced dummies', 'Rejected'),
(49, 'user23', 'Unity for advanced dummies', 'Pending'),
(50, 'user24', 'Unreal Engine for advanced dummies', 'Pending'),
(51, 'user85', 'Research paper 51', 'Pending'),
(52, 'user86', 'Research paper 52', 'Pending'),
(53, 'user87', 'Research paper 53', 'Pending'),
(54, 'user88', 'Research paper 54', 'Pending'),
(55, 'user89', 'Research paper 55', 'Rejected'),
(56, 'user90', 'Research paper 56', 'Pending'),
(57, 'user75', 'Research paper 57', 'Pending'),
(58, 'user76', 'Research paper 58', 'Pending'),
(59, 'user77', 'Research paper 59', 'Pending'),
(60, 'user78', 'Research paper 60', 'Rejected'),
(61, 'user79', 'Research paper 61', 'Pending'),
(62, 'user75', 'Research paper 62', 'Pending'),
(63, 'user85', 'Research paper 63', 'Pending'),
(64, 'user86', 'Research paper 64', 'Pending'),
(65, 'user87', 'Research paper 65', 'Rejected'),
(66, 'user88', 'Research paper 66', 'Pending'),
(67, 'user89', 'Research paper 67', 'Pending'),
(68, 'user90', 'Research paper 68', 'Pending'),
(69, 'user75', 'Research paper 69', 'Pending'),
(70, 'user77', 'Research paper 70', 'Rejected'),
(71, 'user76', 'Research paper 71', 'Pending'),
(72, 'user78', 'Research paper 72', 'Pending'),
(73, 'user79', 'Research paper 73', 'Pending'),
(74, 'user85', 'Research paper 74', 'Pending'),
(75, 'user86', 'Research paper 75', 'Rejected'),
(76, 'user87', 'Research paper 76', 'Pending'),
(77, 'user88', 'Research paper 77', 'Pending'),
(78, 'user89', 'Research paper 78', 'Pending'),
(79, 'user90', 'Research paper 79', 'Pending'),
(80, 'user85', 'Research paper 80', 'Rejected'),
(81, 'user86', 'Research paper 81', 'Pending'),
(82, 'user87', 'Research paper 82', 'Pending'),
(83, 'user88', 'Research paper 83', 'Pending'),
(84, 'user89', 'Research paper 84', 'Pending'),
(85, 'user90', 'Research paper 85', 'Rejected'),
(86, 'user75', 'Research paper 86', 'Pending'),
(87, 'user76', 'Research paper 87', 'Pending'),
(88, 'user77', 'Research paper 88', 'Pending'),
(89, 'user78', 'Research paper 89', 'Pending'),
(90, 'user79', 'Research paper 90', 'Rejected'),
(91, 'user75', 'Research paper 91', 'Pending'),
(92, 'user76', 'Research paper 92', 'Pending'),
(93, 'user77', 'Research paper 93', 'Pending'),
(94, 'user78', 'Research paper 94', 'Pending'),
(95, 'user79', 'Research paper 95', 'Rejected'),
(96, 'user85', 'Research paper 96', 'Pending'),
(97, 'user86', 'Research paper 97', 'Pending'),
(98, 'user87', 'Research paper 98', 'Pending'),
(99, 'user88', 'Research paper 99', 'Pending'),
(100, 'user89', 'Research paper 100', 'Rejected'),
(101, 'user90', 'Research paper 101', 'Pending'),
(102, 'user90', 'Research paper 102', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `pname` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`pname`) VALUES
('Admin'),
('Author'),
('Conference Chair'),
('Reviewer');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `review_id` int(25) NOT NULL,
  `paper_id` int(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `review_text` varchar(100) NOT NULL,
  `review_rating` int(25) NOT NULL,
  `author_rating` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`review_id`, `paper_id`, `username`, `review_text`, `review_rating`, `author_rating`) VALUES
(1, 1, 'user5', 'Information is not suitable to be used to introduce XAMPP to a new user', -2, 0),
(2, 1, 'user21', 'Valuable information for new users, however information does not go deep enough', 1, 3),
(3, 1, 'user4', 'An informative paper that serves to enlighten those that are finding XAMPP difficult to use', 3, 2),
(4, 1, 'user38', 'A very well written paper', 2, 0),
(5, 1, 'user63', 'Good content delivered clear and concise', 2, 1),
(6, 2, 'user4', 'Very useful information given to users', 2, 2),
(7, 2, 'user5', 'Passable paper, nothing special', 2, 0),
(8, 2, 'user24', 'Good content could have delivered its message better', 2, 1),
(9, 2, 'user40', 'Good content delivered clear and concise', 3, 2),
(10, 2, 'user51', 'A paper that barely passes mediocrity', 1, 1),
(11, 2, 'user60', 'Poorly written and confusing', -1, 1),
(12, 4, 'user51', 'Good content delivered clear and concise', 2, 0),
(13, 4, 'user52', 'Good content could have delivered its message better', 2, 1),
(14, 4, 'user37', 'Poorly written and confusing', -1, 2),
(15, 4, 'user38', 'Passable paper, nothing special', 1, -2),
(16, 4, 'user40', 'Passable paper, nothing special', 1, -2),
(17, 5, 'user36', 'Good content delivered clear and concise', 3, 2),
(18, 5, 'user37', 'Poorly written and confusing', -1, 1),
(19, 5, 'user62', 'Poorly written and confusing', -1, 1),
(20, 5, 'user53', 'Good content could have delivered its message better', 2, 1),
(21, 5, 'user54', 'Good content delivered clear and concise', 3, 2),
(22, 6, 'user63', 'Good content delivered clear and concise', 2, 0),
(23, 6, 'user62', 'Poorly written and confusing', -1, 1),
(24, 6, 'user53', 'Good content could have delivered its message better', 2, 1),
(25, 6, 'user40', 'Good content delivered clear and concise', 3, 2),
(26, 6, 'user51', 'A paper that barely passes mediocrity', 1, 1),
(27, 7, 'user24', 'Good content delivered clear and concise', 1, -1),
(28, 7, 'user21', 'Good content delivered clear and concise', 3, 2),
(29, 7, 'user22', 'A paper that barely passes mediocrity', 1, 1),
(30, 7, 'user23', 'Good content delivered clear and concise', 2, 0),
(31, 7, 'user25', 'Poorly written and confusing', -1, 1),
(32, 8, 'user51', 'Good content delivered clear and concise', 2, 0),
(33, 8, 'user52', 'Good content delivered clear and concise', 3, 2),
(34, 8, 'user38', 'Poorly written and confusing', -1, 1),
(35, 8, 'user39', 'Good content could have delivered its message better', 2, 1),
(36, 8, 'user36', 'Good content delivered clear and concise', 3, 2),
(37, 9, 'user54', 'Good content delivered clear and concise', 1, -3),
(38, 9, 'user60', 'Poorly written and confusing', -1, 1),
(39, 9, 'user61', 'Good content could have delivered its message better', 2, 1),
(40, 9, 'user24', 'Good content delivered clear and concise', 3, 2),
(41, 9, 'user21', 'A paper that barely passes mediocrity', 1, 1),
(42, 10, 'user63', 'Good content delivered clear and concise', 2, -2),
(43, 10, 'user4', 'Passable paper, nothing special', 2, 0),
(44, 10, 'user5', 'Good content could have delivered its message better', 2, 1),
(45, 10, 'user60', 'Good content delivered clear and concise', 3, 2),
(46, 10, 'user64', 'A paper that barely passes mediocrity', 1, 1),
(47, 11, 'user64', 'Good content delivered clear and concise', 2, -2),
(48, 11, 'user22', 'Passable paper, nothing special', 2, 0),
(49, 11, 'user21', 'Good content could have delivered its message better', 2, 1),
(50, 11, 'user51', 'Good content delivered clear and concise', 3, 2),
(51, 11, 'user37', 'A paper that barely passes mediocrity', 1, 1),
(52, 13, 'user51', 'Good content delivered clear and concise', 2, 0),
(53, 13, 'user52', 'Good content delivered clear and concise', 3, 2),
(54, 13, 'user38', 'Poorly written and confusing', -1, 1),
(55, 13, 'user39', 'Good content could have delivered its message better', 2, 1),
(56, 13, 'user36', 'Good content delivered clear and concise', 3, 2),
(57, 14, 'user21', 'Good content delivered clear and concise', 3, 2),
(58, 14, 'user22', 'Poorly written and confusing', -1, 1),
(59, 14, 'user23', 'Poorly written and confusing', -1, 1),
(60, 14, 'user24', 'Good content could have delivered its message better', 2, 1),
(61, 14, 'user25', 'Good content delivered clear and concise', 3, 2),
(62, 15, 'user36', 'Good content delivered clear and concise', 1, -3),
(63, 15, 'user60', 'Poorly written and confusing', -1, 1),
(64, 15, 'user61', 'Good content could have delivered its message better', 2, 1),
(65, 15, 'user62', 'Good content delivered clear and concise', 3, 2),
(66, 15, 'user64', 'A paper that barely passes mediocrity', 1, 1),
(67, 18, 'user5', 'Passable paper, nothing special', 2, 0),
(68, 18, 'user24', 'Good content could have delivered its message better', 2, 1),
(69, 18, 'user40', 'Good content delivered clear and concise', 3, 2),
(70, 18, 'user51', 'A paper that barely passes mediocrity', 1, 1),
(71, 18, 'user60', 'Poorly written and confusing', -1, 1),
(72, 19, 'user38', 'Good content delivered clear and concise', 1, -3),
(73, 19, 'user36', 'Poorly written and confusing', -1, 1),
(74, 19, 'user61', 'Good content could have delivered its message better', 2, 1),
(75, 19, 'user24', 'Good content delivered clear and concise', 3, 2),
(76, 19, 'user37', 'A paper that barely passes mediocrity', 1, 1),
(77, 22, 'user36', 'Good content delivered clear and concise', 3, 2),
(78, 22, 'user37', 'Poorly written and confusing', -1, 1),
(79, 22, 'user62', 'Poorly written and confusing', -1, 1),
(80, 22, 'user53', 'Good content could have delivered its message better', 2, 1),
(81, 22, 'user54', 'Good content delivered clear and concise', 3, 2),
(82, 22, 'user4', 'I think this was very informative', -2, 0),
(83, 25, 'user38', 'Good content delivered clear and concise', 1, -3),
(84, 25, 'user36', 'Poorly written and confusing', -1, 1),
(85, 25, 'user61', 'Good content could have delivered its message better', 2, 1),
(86, 25, 'user24', 'Good content delivered clear and concise', 3, 2),
(87, 25, 'user37', 'A paper that barely passes mediocrity', 1, 1),
(88, 25, 'user21', 'Good content delivered clear and concise', 3, 2),
(89, 26, 'user22', 'Poorly written and confusing', -1, 1),
(90, 26, 'user23', 'Poorly written and confusing', -1, 1),
(91, 26, 'user24', 'Good content could have delivered its message better', 2, 1),
(92, 26, 'user25', 'Good content delivered clear and concise', 3, 2),
(93, 26, 'user38', 'Good content delivered clear and concise', 1, -3),
(94, 28, 'user36', 'Poorly written and confusing', -1, 1),
(95, 28, 'user61', 'Good content could have delivered its message better', 2, 1),
(96, 28, 'user24', 'Good content delivered clear and concise', 3, 2),
(97, 28, 'user37', 'A paper that barely passes mediocrity', 1, 1),
(98, 28, 'user21', 'Good content delivered clear and concise', 3, 2),
(99, 31, 'user22', 'Poorly written and confusing', -1, 1),
(100, 31, 'user23', 'Poorly written and confusing', -1, 1),
(101, 31, 'user24', 'Good content could have delivered its message better', 2, 1),
(102, 31, 'user25', 'Good content delivered clear and concise', 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `workload`
--

CREATE TABLE `workload` (
  `username` varchar(25) NOT NULL,
  `current_workload` int(25) NOT NULL,
  `max_workload` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `workload`
--

INSERT INTO `workload` (`username`, `current_workload`, `max_workload`) VALUES
('user21', 2, 10),
('user22', 5, 10),
('user23', 9, 10),
('user24', 3, 10),
('user25', 6, 10),
('user36', 1, 10),
('user37', 2, 10),
('user38', 4, 10),
('user39', 6, 10),
('user4', -2, 7),
('user40', 2, 10),
('user5', 1, 10),
('user51', 9, 10),
('user52', 7, 10),
('user53', 6, 10),
('user54', 7, 10),
('user60', 5, 10),
('user61', 4, 10),
('user62', 3, 10),
('user63', 3, 10),
('user64', 3, 10),
('user70', 9, 10),
('user71', 8, 10),
('user72', 7, 10),
('user73', 6, 10),
('user74', 5, 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`username`),
  ADD KEY `accounts_ibfk_1` (`pname`);

--
-- Indexes for table `bid`
--
ALTER TABLE `bid`
  ADD PRIMARY KEY (`paper_id`,`username`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `username` (`username`),
  ADD KEY `comment_ibfk_1` (`review_id`);

--
-- Indexes for table `co_author`
--
ALTER TABLE `co_author`
  ADD PRIMARY KEY (`paper_id`,`username`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `paper`
--
ALTER TABLE `paper`
  ADD PRIMARY KEY (`paper_id`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`pname`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `paper_id` (`paper_id`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `workload`
--
ALTER TABLE `workload`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `paper`
--
ALTER TABLE `paper`
  MODIFY `paper_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accounts`
--
ALTER TABLE `accounts`
  ADD CONSTRAINT `accounts_ibfk_1` FOREIGN KEY (`pname`) REFERENCES `profiles` (`pname`) ON UPDATE CASCADE;

--
-- Constraints for table `bid`
--
ALTER TABLE `bid`
  ADD CONSTRAINT `bid_ibfk_1` FOREIGN KEY (`paper_id`) REFERENCES `paper` (`paper_id`),
  ADD CONSTRAINT `bid_ibfk_2` FOREIGN KEY (`username`) REFERENCES `accounts` (`username`);

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`review_id`) REFERENCES `review` (`review_id`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`username`) REFERENCES `accounts` (`username`);

--
-- Constraints for table `co_author`
--
ALTER TABLE `co_author`
  ADD CONSTRAINT `co_author_ibfk_1` FOREIGN KEY (`paper_id`) REFERENCES `paper` (`paper_id`),
  ADD CONSTRAINT `co_author_ibfk_2` FOREIGN KEY (`username`) REFERENCES `accounts` (`username`);

--
-- Constraints for table `paper`
--
ALTER TABLE `paper`
  ADD CONSTRAINT `paper_ibfk_1` FOREIGN KEY (`username`) REFERENCES `accounts` (`username`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`paper_id`) REFERENCES `paper` (`paper_id`),
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`username`) REFERENCES `accounts` (`username`);

--
-- Constraints for table `workload`
--
ALTER TABLE `workload`
  ADD CONSTRAINT `workload_ibfk_1` FOREIGN KEY (`username`) REFERENCES `accounts` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
