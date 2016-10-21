-- phpMyAdmin SQL Dump
-- version 4.2.0
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 21, 2016 at 12:21 PM
-- Server version: 5.6.17
-- PHP Version: 5.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `newgen_shopping`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_post`
--

CREATE TABLE IF NOT EXISTS `admin_post` (
`id` int(11) NOT NULL,
  `post_name` varchar(100) NOT NULL,
  `admin` varchar(100) NOT NULL,
  `products` varchar(100) NOT NULL,
  `orders` int(11) NOT NULL,
  `coupons` int(11) NOT NULL,
  `cms` int(11) NOT NULL,
  `masters` int(11) NOT NULL,
  `user_details` int(11) NOT NULL,
  `reports` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `CB` int(100) NOT NULL,
  `UB` int(100) NOT NULL,
  `DOC` date NOT NULL,
  `DOU` date NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `admin_post`
--

INSERT INTO `admin_post` (`id`, `post_name`, `admin`, `products`, `orders`, `coupons`, `cms`, `masters`, `user_details`, `reports`, `status`, `CB`, `UB`, `DOC`, `DOU`) VALUES
(1, 'admin', '1', '1', 1, 1, 1, 1, 0, 1, 1, 4, 4, '2016-05-25', '2016-05-25'),
(2, 'user', '0', '0', 0, 0, 0, 0, 1, 0, 1, 4, 0, '2016-05-25', '0000-00-00'),
(3, 'Taskin', '1', '1', 1, 1, 1, 1, 1, 1, 1, 11, 0, '2016-10-04', '0000-00-00'),
(4, 'Tamanna', '1', '1', 1, 1, 1, 1, 1, 1, 1, 11, 0, '2016-10-13', '0000-00-00'),
(5, 'pari', '1', '1', 1, 1, 1, 1, 1, 1, 1, 11, 0, '2016-10-15', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE IF NOT EXISTS `admin_user` (
`id` int(11) NOT NULL,
  `admin_post_id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `cb` int(100) NOT NULL,
  `UB` int(100) NOT NULL,
  `DOC` date NOT NULL,
  `DOU` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`id`, `admin_post_id`, `username`, `password`, `name`, `email`, `phone`, `cb`, `UB`, `DOC`, `DOU`) VALUES
(10, 1, 'admin', 'admin', 'Aathira', 'aathira@intersmart.in', '1234567891', 0, 1, '2016-07-14', '2016-09-23 06:41:17'),
(11, 1, 'newgenshop', 'newgenshop', 'Shiju', 'spc079@gmail.com', '918050819131', 10, 0, '2016-10-03', '2016-10-03 06:08:20'),
(12, 1, 'taskin', '123456', 'taskin', 'taskin655@gmail.com', '7411096828', 11, 0, '2016-10-04', '2016-10-04 04:42:55'),
(13, 3, 'tamanna', '123456', 'Tamanna', 'tamanna_gudiya@yahoo.com', '8747873609', 11, 0, '2016-10-15', '2016-10-15 09:24:09');

-- --------------------------------------------------------

--
-- Table structure for table `ad_payment`
--

CREATE TABLE IF NOT EXISTS `ad_payment` (
`id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `position` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `vendor_name` int(11) NOT NULL,
  `sort_order` int(11) NOT NULL,
  `display_from` date NOT NULL,
  `display_to` date NOT NULL,
  `payment_status` int(11) NOT NULL COMMENT '0=Not Paid,1=Paid',
  `cb` int(11) NOT NULL,
  `ub` int(11) NOT NULL,
  `dou` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `doc` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `link` varchar(1000) NOT NULL,
  `admin_approve` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `ad_payment`
--

INSERT INTO `ad_payment` (`id`, `title`, `position`, `image`, `vendor_name`, `sort_order`, `display_from`, `display_to`, `payment_status`, `cb`, `ub`, `dou`, `doc`, `link`, `admin_approve`, `status`) VALUES
(1, 'aa', 4, 'jpg', 1, 0, '2016-09-20', '2016-09-23', 0, 10, 0, '2016-09-21 01:27:41', '2016-09-21 01:27:41', '', 1, 1),
(2, 'topleft', 5, 'jpg', 1, 0, '2016-09-20', '2016-09-29', 0, 10, 10, '2016-09-21 01:29:49', '2016-09-21 03:05:04', 'www.apple.com', 1, 1),
(3, 'BB', 7, 'png', 1, 0, '2016-09-20', '2016-09-29', 0, 0, 0, '2016-09-21 05:07:24', '2016-09-21 00:37:24', 'www.apple.com', 1, 1),
(7, 'InterSmart', 3, 'jpg', 1, 0, '2016-09-19', '2016-09-30', 0, 10, 0, '2016-09-19 07:43:35', '2016-09-19 07:43:35', '', 1, 1),
(8, 'shop now', 4, 'jpg', 2, 0, '2016-10-20', '2016-10-29', 0, 11, 0, '2016-10-04 07:21:15', '2016-10-04 11:51:15', 'http://www.amazon.in/dp/B01LZH3DZ7/ref=br_isw_strs-2?pf_rd_m=A1VBAL9TL5WCBF&pf_rd_s=desktop-1&pf_rd_r=0ZGR4FAS6S19A6NRHN4C&pf_rd_t=36701&pf_rd_p=a3e77621-0616-4562-9243-da547873fd47&pf_rd_i=desktop', 1, 1),
(9, 'debit card', 5, '', 4, 0, '2016-10-22', '2016-10-30', 0, 11, 0, '2016-10-13 11:13:58', '2016-10-13 15:43:58', '', 1, 1),
(10, 'shop red me 3s mobile .', 4, 'jpg', 5, 0, '2016-10-17', '2016-10-30', 0, 11, 0, '2016-10-17 06:16:54', '2016-10-17 10:46:54', 'https://flapt.flipkart.net/click?bid=L7EAI8B3VM&cid=W2DXFLYT&sid=15427713&t=aHR0cHM6Ly93d3cuZmxpcGthcnQuY29tL3JlZG1pLTNz&reqid=TLACGYTYAAKCWWACK&dc=in&cls=c1&clk_visit=1&ptp=otracker%3Dhp_banner_widget_0', 1, 1),
(11, 'womens clothing', 9, 'jpg', 5, 0, '2016-10-17', '2016-10-30', 0, 11, 0, '2016-10-17 06:22:03', '2016-10-17 10:52:03', 'https://flapt.flipkart.net/click?bid=EV3QHG8DV5&cid=9A05347E&sid=15427713&t=aHR0cHM6Ly93d3cuZmxpcGthcnQuY29tL3NvbWV0aGluZy9-bWluaW11bS01MC9wcj9zaWQ9Mm9xLGMxcg&reqid=ULACGYTYAAKCWWACL&dc=in&cls=c1&clk_visit=1&ptp=otracker%3Dhp_banner_widget_1', 1, 1),
(12, 'large furniture', 4, '', 5, 0, '2016-10-17', '2016-10-30', 0, 11, 0, '2016-10-17 06:24:04', '2016-10-17 10:54:04', 'https://flapt.flipkart.net/click?bid=WWVUPDNJIY&cid=P7UE5808&sid=15427713&t=aHR0cHM6Ly93d3cuZmxpcGthcnQuY29tL2Z1cm5pdHVyZS9-bGFyZ2UtZnVybml0dXJlLWJlc3RzZWxsZXJzL3ByP3NpZD1hbng&reqid=WLACGYTYAAKCWWACN&dc=in&cls=c1&clk_visit=1&ptp=otracker%3Dhp_banner_widget_3', 1, 1),
(13, 'test', 10, 'png', 1, 0, '2016-10-20', '2016-10-31', 0, 0, 0, '2016-10-20 09:52:07', '2016-10-20 09:52:07', '', 0, 1),
(14, 'test123', 10, 'png', 1, 0, '2016-10-19', '2016-10-31', 0, 0, 0, '2016-10-20 09:55:02', '2016-10-20 09:55:02', '', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `banking_details`
--

CREATE TABLE IF NOT EXISTS `banking_details` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `account_type` int(11) NOT NULL COMMENT '1-paypal, 2-bank',
  `account_holder_name` varchar(100) NOT NULL,
  `account_number` varchar(100) NOT NULL,
  `bank_name` varchar(100) NOT NULL,
  `ifsc` varchar(11) NOT NULL,
  `paypal_id` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `DOC` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `DOU` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `banking_details`
--

INSERT INTO `banking_details` (`id`, `user_id`, `account_type`, `account_holder_name`, `account_number`, `bank_name`, `ifsc`, `paypal_id`, `email`, `DOC`, `DOU`) VALUES
(4, 1, 1, '', '0', '', '', 'dgtfchbfg', 'fdhggvfj@sdgfjke.com', '2016-09-07 09:28:26', '2016-09-07 09:28:26'),
(5, 1, 2, 'Aathira', '2147483647', 'SBI', 'SBI123', '', '', '2016-09-07 09:31:05', '2016-09-07 09:31:05'),
(6, 1, 1, '', '0', '', '', 'drfhfgyuvjt', 'dfgfh@dfhxth.com', '2016-09-07 09:34:03', '2016-09-07 09:34:03'),
(7, 1, 1, '', '0', '', '', 'dfgfch', 'dfhggjy@com.com', '2016-09-07 09:37:09', '2016-09-07 09:37:09'),
(8, 1, 1, '', '0', '', '', 'test123paypal', 'aathira@paypal.in', '2016-09-23 05:54:11', '2016-09-23 05:54:11'),
(9, 15, 1, '', '0', '', '', 'ffx', 'gokul@intersmart.in', '2016-10-13 05:19:15', '2016-10-13 05:19:15'),
(10, 15, 2, 'rg', '2147483647', 'grg', 'rgreg', '', '', '2016-10-13 05:20:22', '2016-10-13 05:20:22'),
(11, 17, 1, '', '0', '', '', 'dfcf', 'fdfdf@email.com', '2016-10-13 08:43:19', '2016-10-13 08:43:19'),
(12, 17, 2, 'testbb', '2147483647', 'vfgfsd', 'gfdgfd', '', '', '2016-10-13 08:45:22', '2016-10-13 08:45:22'),
(13, 1, 2, 'aatjira', '1111111', 'sbi', '12345', '', '', '2016-10-19 09:44:15', '2016-10-19 09:44:15');

-- --------------------------------------------------------

--
-- Table structure for table `buyer_details`
--

CREATE TABLE IF NOT EXISTS `buyer_details` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(50) NOT NULL,
  `phone_no_2` varchar(100) NOT NULL,
  `newsletter` int(11) NOT NULL,
  `wallet_amt` decimal(10,0) NOT NULL,
  `CB` int(11) NOT NULL,
  `UB` int(11) NOT NULL,
  `DOC` datetime NOT NULL,
  `DOU` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `field2` int(11) DEFAULT NULL,
  `field3` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `buyer_details`
--

INSERT INTO `buyer_details` (`id`, `user_id`, `first_name`, `last_name`, `dob`, `gender`, `phone_no_2`, `newsletter`, `wallet_amt`, `CB`, `UB`, `DOC`, `DOU`, `field2`, `field3`) VALUES
(3, 4, 'Aathira', 'Buyer', '2016-08-13', '', '123456', 1, '0', 0, 0, '2016-08-12 00:00:00', '2016-08-19 18:30:00', NULL, NULL),
(6, 7, 'AAthira', 'Binish', '1992-02-13', 'Female', '', 1, '0', 0, 0, '2016-08-17 00:00:00', '2016-08-17 04:54:05', NULL, NULL),
(7, 8, 'Aathira', 'Binish', '1992-02-13', 'Female', '', 1, '0', 0, 0, '2016-08-17 00:00:00', '2016-08-17 04:56:33', NULL, NULL),
(8, 10, 'Ashik', 'Ali', '1991-12-27', 'Male', '09037187848', 1, '0', 0, 0, '2016-09-30 00:00:00', '2016-09-30 05:46:59', NULL, NULL),
(9, 11, 'Taskin', 'yarnal', '1993-06-09', '', 'taskin655@gmail.com', 0, '0', 0, 0, '2016-10-03 00:00:00', '2016-10-02 23:00:00', NULL, NULL),
(10, 12, 'shamanth', 'buyer', '1992-05-21', 'Male', '', 1, '0', 11, 11, '2016-10-04 00:00:00', '2016-10-19 05:57:23', NULL, NULL),
(11, 13, 'Gokul', 'G Unnithan', '1992-09-27', 'Male', 'fefef', 0, '0', 0, 0, '2016-10-12 00:00:00', '2016-10-19 05:57:58', NULL, NULL),
(12, 14, 'Lujo', 'Joseph', '2016-10-19', 'Male', '', 1, '0', 0, 0, '2016-10-12 00:00:00', '2016-10-12 11:13:01', NULL, NULL),
(13, 16, 'shamanth', 's', '1992-05-21', 'Male', '', 1, '45', 11, 11, '2016-10-13 00:00:00', '2016-10-19 05:58:17', NULL, NULL),
(14, 18, 'pari.', 'shaik.', '1994-10-10', 'Female', '', 1, '0', 0, 0, '2016-10-14 00:00:00', '2016-10-19 05:58:36', NULL, NULL),
(15, 20, 'Binish', 'Kumar', '1986-04-04', '', '', 0, '0', 0, 0, '2016-10-18 00:00:00', '2016-10-17 18:30:00', NULL, NULL),
(16, 21, 'Rony', 'Antony', '1990-10-08', 'Male', '1234567890', 0, '0', 0, 0, '2016-10-19 00:00:00', '2016-10-19 06:10:19', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `session_id` varchar(225) DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `options` int(11) NOT NULL COMMENT 'combo',
  `date` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `session_id`, `product_id`, `quantity`, `options`, `date`) VALUES
(1, 4, NULL, 46, 5, 0, '2016-10-21');

-- --------------------------------------------------------

--
-- Table structure for table `contact_details`
--

CREATE TABLE IF NOT EXISTS `contact_details` (
`id` int(11) NOT NULL,
  `company_name` varchar(200) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `mobile1` varchar(15) NOT NULL,
  `mobile2` varchar(15) NOT NULL,
  `fax` varchar(200) NOT NULL,
  `email1` varchar(200) NOT NULL,
  `email2` varchar(200) NOT NULL,
  `map_link` varchar(500) NOT NULL,
  `doc` date NOT NULL,
  `dou` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `contact_details`
--

INSERT INTO `contact_details` (`id`, `company_name`, `telephone`, `mobile1`, `mobile2`, `fax`, `email1`, `email2`, `map_link`, `doc`, `dou`, `status`) VALUES
(1, 'The Company Name Inc. 9870', '+1 800 603 6035', '', '', '+1 800 889 9898', 'mail@demolink.org', '', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d62871.24482347028!2d76.29922780198503!3d9.979404659830088!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3b080d08f976f3a9%3A0xe9cdb444f06ed454!2sErnakulam%2C+Kerala+682011!5e0!3m2!1sen!2sin!4v1470136600874', '0000-00-00', '2016-09-27 22:13:01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE IF NOT EXISTS `contact_us` (
`id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `contact_number` int(11) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `contact_number`, `subject`, `message`, `date`) VALUES
(1, 'Aathira', 'avpin1992@gmail.com', 123456, 'test', 'test message', '2016-08-30 10:47:28'),
(2, 'Aathira', 'avpin1992@gmail.com', 123456, 'test', 'test message', '2016-08-30 10:49:25'),
(3, 'Aathira', 'avpin1992@gmail.com', 123456, 'test', 'test message', '2016-08-30 10:54:22'),
(4, 'Aathira', 'avpin1992@gmail.com', 123456, 'test', 'afteygh rdym rtu rfd nytkity t jjhk k', '2016-08-30 10:54:50'),
(5, 'Aathira', 'avpin1992@gmail.com', 123456, 'test', 'afteygh rdym rtu rfd nytkity t jjhk k', '2016-08-30 10:57:23'),
(6, 'taskin', 'tamanna_gudiya@yahoo.com', 2147483647, 'query', 'i want to know about newgen shop', '2016-10-14 11:37:28'),
(7, 'e33232', 'e3e3@email.com', 228252887, 'ee3e3', 'e3e3e3', '2016-10-14 15:44:43'),
(8, 'sASA', 'trvtgrt@email.com', 2147483647, 'saAs', 'dsdsd', '2016-10-17 12:18:58');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
`id` int(11) NOT NULL,
  `country_name` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=247 ;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_name`) VALUES
(1, 'Afghanistan'),
(2, 'Albania'),
(3, 'Algeria'),
(4, 'American Samoa'),
(5, 'Andorra'),
(6, 'Angola'),
(7, 'Anguilla'),
(8, 'Antarctica'),
(9, 'Antigua and Barbuda'),
(10, 'Argentina'),
(11, 'Armenia'),
(12, 'Aruba'),
(13, 'Australia'),
(14, 'Austria'),
(15, 'Azerbaijan'),
(16, 'Bahamas'),
(17, 'Bahrain'),
(18, 'Bangladesh'),
(19, 'Barbados'),
(20, 'Belarus'),
(21, 'Belgium'),
(22, 'Belize'),
(23, 'Benin'),
(24, 'Bermuda'),
(25, 'Bhutan'),
(26, 'Bolivia'),
(27, 'Bosnia and Herzegovina'),
(28, 'Botswana'),
(29, 'Bouvet Island'),
(30, 'Brazil'),
(31, 'British Indian Ocean Territory'),
(32, 'Brunei Darussalam'),
(33, 'Bulgaria'),
(34, 'Burkina Faso'),
(35, 'Burundi'),
(36, 'Cambodia'),
(37, 'Cameroon'),
(38, 'Canada'),
(39, 'Cape Verde'),
(40, 'Cayman Islands'),
(41, 'Central African Republic'),
(42, 'Chad'),
(43, 'Chile'),
(44, 'China'),
(45, 'Christmas Island'),
(46, 'Cocos (Keeling) Islands'),
(47, 'Colombia'),
(48, 'Comoros'),
(49, 'Congo'),
(50, 'Cook Islands'),
(51, 'Costa Rica'),
(52, 'Croatia (Hrvatska)'),
(53, 'Cuba'),
(54, 'Cyprus'),
(55, 'Czech Republic'),
(56, 'Denmark'),
(57, 'Djibouti'),
(58, 'Dominica'),
(59, 'Dominican Republic'),
(60, 'East Timor'),
(61, 'Ecuador'),
(62, 'Egypt'),
(63, 'El Salvador'),
(64, 'Equatorial Guinea'),
(65, 'Eritrea'),
(66, 'Estonia'),
(67, 'Ethiopia'),
(68, 'Falkland Islands (Malvinas)'),
(69, 'Faroe Islands'),
(70, 'Fiji'),
(71, 'Finland'),
(72, 'France'),
(73, 'France, Metropolitan'),
(74, 'French Guiana'),
(75, 'French Polynesia'),
(76, 'French Southern Territories'),
(77, 'Gabon'),
(78, 'Gambia'),
(79, 'Georgia'),
(80, 'Germany'),
(81, 'Ghana'),
(82, 'Gibraltar'),
(83, 'Guernsey'),
(84, 'Greece'),
(85, 'Greenland'),
(86, 'Grenada'),
(87, 'Guadeloupe'),
(88, 'Guam'),
(89, 'Guatemala'),
(90, 'Guinea'),
(91, 'Guinea-Bissau'),
(93, 'Haiti'),
(94, 'Heard and Mc Donald Islands'),
(95, 'Honduras'),
(96, 'Hong Kong'),
(97, 'Hungary'),
(98, 'Iceland'),
(99, 'India'),
(100, 'Isle of Man'),
(101, 'Indonesia'),
(102, 'Iran (Islamic Republic of)'),
(103, 'Iraq'),
(104, 'Ireland'),
(105, 'Israel'),
(106, 'Italy'),
(107, 'Ivory Coast'),
(108, 'Jersey'),
(109, 'Jamaica'),
(110, 'Japan'),
(111, 'Jordan'),
(112, 'Kazakhstan'),
(113, 'Kenya'),
(114, 'Kiribati'),
(115, 'Korea, Democratic People''s Republic of'),
(116, 'Korea, Republic of'),
(117, 'Kosovo'),
(118, 'Kuwait'),
(119, 'Kyrgyzstan'),
(120, 'Lao People''s Democratic Republic'),
(121, 'Latvia'),
(122, 'Lebanon'),
(123, 'Lesotho'),
(124, 'Liberia'),
(125, 'Libyan Arab Jamahiriya'),
(126, 'Liechtenstein'),
(127, 'Lithuania'),
(128, 'Luxembourg'),
(129, 'Macau'),
(130, 'Macedonia'),
(131, 'Madagascar'),
(132, 'Malawi'),
(133, 'Malaysia'),
(134, 'Maldives'),
(135, 'Mali'),
(136, 'Malta'),
(137, 'Marshall Islands'),
(138, 'Martinique'),
(139, 'Mauritania'),
(140, 'Mauritius'),
(141, 'Mayotte'),
(142, 'Mexico'),
(143, 'Micronesia, Federated States of'),
(144, 'Moldova, Republic of'),
(145, 'Monaco'),
(146, 'Mongolia'),
(147, 'Montenegro'),
(148, 'Montserrat'),
(149, 'Morocco'),
(150, 'Mozambique'),
(151, 'Myanmar'),
(152, 'Namibia'),
(153, 'Nauru'),
(154, 'Nepal'),
(155, 'Netherlands'),
(156, 'Netherlands Antilles'),
(157, 'New Caledonia'),
(158, 'New Zealand'),
(159, 'Nicaragua'),
(160, 'Niger'),
(161, 'Nigeria'),
(162, 'Niue'),
(163, 'Norfolk Island'),
(164, 'Northern Mariana Islands'),
(165, 'Norway'),
(166, 'Oman'),
(167, 'Pakistan'),
(168, 'Palau'),
(169, 'Palestine'),
(170, 'Panama'),
(171, 'Papua New Guinea'),
(172, 'Paraguay'),
(173, 'Peru'),
(174, 'Philippines'),
(175, 'Pitcairn'),
(176, 'Poland'),
(177, 'Portugal'),
(178, 'Puerto Rico'),
(179, 'Qatar'),
(180, 'Reunion'),
(181, 'Romania'),
(182, 'Russian Federation'),
(183, 'Rwanda'),
(184, 'Saint Kitts and Nevis'),
(185, 'Saint Lucia'),
(186, 'Saint Vincent and the Grenadines'),
(187, 'Samoa'),
(188, 'San Marino'),
(189, 'Sao Tome and Principe'),
(190, 'Saudi Arabia'),
(191, 'Senegal'),
(192, 'Serbia'),
(193, 'Seychelles'),
(194, 'Sierra Leone'),
(195, 'Singapore'),
(196, 'Slovakia'),
(197, 'Slovenia'),
(198, 'Solomon Islands'),
(199, 'Somalia'),
(200, 'South Africa'),
(201, 'South Georgia South Sandwich Islands'),
(202, 'Spain'),
(203, 'Sri Lanka'),
(204, 'St. Helena'),
(205, 'St. Pierre and Miquelon'),
(206, 'Sudan'),
(207, 'Suriname'),
(208, 'Svalbard and Jan Mayen Islands'),
(209, 'Swaziland'),
(210, 'Sweden'),
(211, 'Switzerland'),
(212, 'Syrian Arab Republic'),
(213, 'Taiwan'),
(214, 'Tajikistan'),
(215, 'Tanzania, United Republic of'),
(216, 'Thailand'),
(217, 'Togo'),
(218, 'Tokelau'),
(219, 'Tonga'),
(220, 'Trinidad and Tobago'),
(221, 'Tunisia'),
(222, 'Turkey'),
(223, 'Turkmenistan'),
(224, 'Turks and Caicos Islands'),
(225, 'Tuvalu'),
(226, 'Uganda'),
(227, 'Ukraine'),
(228, 'United Arab Emirates'),
(229, 'United Kingdom'),
(230, 'United States'),
(231, 'United States minor outlying islands'),
(232, 'Uruguay'),
(233, 'Uzbekistan'),
(234, 'Vanuatu'),
(235, 'Vatican City State'),
(236, 'Venezuela'),
(237, 'Vietnam'),
(238, 'Virgin Islands (British)'),
(239, 'Virgin Islands (U.S.)'),
(240, 'Wallis and Futuna Islands'),
(241, 'Western Sahara'),
(242, 'Yemen'),
(243, 'Yugoslavia'),
(244, 'Zaire'),
(245, 'Zambia'),
(246, 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE IF NOT EXISTS `coupons` (
`id` int(11) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `cash_limit` int(11) NOT NULL,
  `gift_card_amount` int(100) NOT NULL,
  `code` varchar(50) NOT NULL,
  `gift_card_id` varchar(100) NOT NULL,
  `starting_date` date NOT NULL,
  `expiry_date` date NOT NULL,
  `discount` int(11) NOT NULL,
  `discount_type` varchar(50) NOT NULL,
  `unique` int(11) NOT NULL,
  `type` int(11) NOT NULL COMMENT '0=>coupon,1=>voucher,2=>card',
  `status` int(11) NOT NULL COMMENT '1=ready to use, 2 =applayed, 3= used',
  `DOC` date NOT NULL,
  `DOU` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `session_id` double NOT NULL,
  `product_id` varchar(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `user_id`, `cash_limit`, `gift_card_amount`, `code`, `gift_card_id`, `starting_date`, `expiry_date`, `discount`, `discount_type`, `unique`, `type`, `status`, `DOC`, `DOU`, `session_id`, `product_id`) VALUES
(10, '', 1000, 3000, '1234', '76cb88b554', '1970-01-01', '1970-01-01', 500, '', 0, 2, 1, '0000-00-00', '2016-08-31 06:00:19', 0, ''),
(19, '', 3000, 0, 'aaaa', '', '0000-00-00', '0000-00-00', 1000, '', 0, 0, 1, '0000-00-00', '2016-09-22 02:32:11', 0, ''),
(20, '', 0, 0, 'klkl', '', '2016-08-11', '2016-08-27', 400, '', 0, 0, 1, '0000-00-00', '2016-09-22 01:44:23', 0, '12,35'),
(21, '', 2000, 0, '143', '', '2016-10-07', '2016-10-20', 40, '', 0, 0, 1, '0000-00-00', '2016-10-04 05:25:14', 0, ''),
(22, '', 800, 0, 'taskin93', '', '2016-10-16', '2016-10-31', 50, '', 0, 0, 1, '0000-00-00', '2016-10-15 10:07:00', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `coupon_history`
--

CREATE TABLE IF NOT EXISTS `coupon_history` (
`id` int(11) NOT NULL,
  `coupon_id` varchar(225) NOT NULL COMMENT 'coupon id/card id/voucher id',
  `order_id` int(11) NOT NULL,
  `total_amount` int(11) NOT NULL,
  `session_id` double NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0= waiting, 1= success 2=failed'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE IF NOT EXISTS `currency` (
`id` int(11) NOT NULL,
  `country` varchar(50) NOT NULL,
  `currency` varchar(50) NOT NULL,
  `currency_code` varchar(50) NOT NULL,
  `symbol` varchar(225) NOT NULL,
  `rate` float NOT NULL,
  `image` varchar(225) NOT NULL,
  `cb` int(11) NOT NULL,
  `ub` int(11) NOT NULL,
  `doc` date NOT NULL,
  `dou` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`id`, `country`, `currency`, `currency_code`, `symbol`, `rate`, `image`, `cb`, `ub`, `doc`, `dou`) VALUES
(3, 'India', 'Rupee', 'INR', 'fa-inr', 1, 'jpg', 0, 0, '0000-00-00', '2016-10-20 10:00:06'),
(5, 'united states', 'dollar', 'USD', 'fa-usd', 0.014983, 'png', 0, 0, '0000-00-00', '2016-10-20 10:11:49');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE IF NOT EXISTS `districts` (
`Id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `district_name` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`Id`, `country_id`, `state_id`, `district_name`) VALUES
(1, 99, 18, 'Alappuzha'),
(2, 99, 18, 'Ernakulam'),
(3, 99, 18, 'Idukki'),
(4, 99, 18, 'Kannur'),
(5, 99, 18, 'Kasaragod'),
(6, 99, 18, 'Kollam'),
(7, 99, 18, 'Kottayam'),
(8, 99, 18, 'Kozhikode'),
(9, 99, 18, 'Malappuram'),
(10, 99, 18, 'Palakkad'),
(11, 99, 18, 'Pathanamthitta'),
(12, 99, 18, 'Thiruvananthapuram'),
(13, 99, 18, 'Thrissur'),
(14, 99, 18, 'Wayanad'),
(15, 99, 17, 'Bagalkot'),
(16, 99, 17, 'tumkur'),
(17, 99, 17, 'vijaypur'),
(18, 99, 17, 'dharwad'),
(19, 99, 17, 'belgum'),
(20, 99, 17, 'mandya'),
(21, 99, 17, 'bidar'),
(22, 99, 17, 'gulbarga'),
(23, 99, 17, 'banglore'),
(24, 99, 17, 'kolar'),
(25, 99, 17, 'mysore'),
(26, 99, 17, 'davangere'),
(27, 99, 17, 'chitradurga'),
(28, 99, 36, 'banglore');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE IF NOT EXISTS `faq` (
`id` int(11) NOT NULL,
  `question` varchar(500) NOT NULL,
  `answer` text NOT NULL,
  `cb` int(11) NOT NULL,
  `ub` int(11) NOT NULL,
  `doc` date NOT NULL,
  `dou` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `question`, `answer`, `cb`, `ub`, `doc`, `dou`, `status`) VALUES
(1, 'how cani add my product to the bag', 'you can easily add your selected products to the bag by selecting the "add product to  the bag"', 0, 0, '2016-10-04', '2016-10-04 07:06:23', 1),
(2, 'how can i select more than one product', 'yes easily you can select no.of products ...go on adding products to the ', 0, 0, '2016-10-13', '2016-10-13 11:02:33', 1),
(3, 'What is ''My Account''? How do I update my information ?', '\r\n\r\n    It is easy to update your Flipkart account and view your orders any time through ''My Account''.\r\n\r\n    ''My Account'' allows you complete control over your transactions on Flipkart\r\n\r\n        Manage/edit your personal data like address, phone numbers, email ids\r\n        Change your password\r\n        Track the status of your orders\r\n\r\n', 0, 0, '2016-10-17', '2016-10-17 06:07:37', 1),
(4, 'How do I know my order has been confirmed?', '\r\n\r\n    Once your order has been logged and payment authorization has been received, the seller confirms receipt of the order and begins processing it.\r\n\r\n    You will receive an email containing the details of your order when the seller receives it and confirms the same. In this mail you will be provided with a unique Order ID (eg. OD01202130213), a listing of the item(s) you have ordered and the expected delivery time.\r\n\r\n    You will also be notified when the seller ships the item(s) to you. Shipping details will be provided with the respective tracking number(s).\r\n', 0, 0, '2016-10-17', '2016-10-17 06:11:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `forgot_password`
--

CREATE TABLE IF NOT EXISTS `forgot_password` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `code` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `DOC` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `make_product_payment`
--

CREATE TABLE IF NOT EXISTS `make_product_payment` (
`id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `product_code` varchar(15) NOT NULL,
  `message` text NOT NULL,
  `amount_type` varchar(15) NOT NULL,
  `total_amount` varchar(25) NOT NULL,
  `payment_mode` varchar(15) NOT NULL COMMENT '1=wallet,2=gateway,3=paypal,4=wallet+netbanking ',
  `netbanking` varchar(100) NOT NULL,
  `paypal` varchar(100) NOT NULL,
  `wallet` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `status` int(15) NOT NULL COMMENT '0:notpaid, 1:paid, 2:failed',
  `transaction_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `master_ad_location`
--

CREATE TABLE IF NOT EXISTS `master_ad_location` (
`id` int(11) NOT NULL,
  `ad_location` varchar(250) NOT NULL,
  `size` varchar(250) NOT NULL,
  `status` varchar(20) NOT NULL,
  `cb` int(11) NOT NULL,
  `doc` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `master_ad_location`
--

INSERT INTO `master_ad_location` (`id`, `ad_location`, `size`, `status`, `cb`, `doc`) VALUES
(3, 'Top Main Banner', '300 x 150', '5000', 0, '2016-09-19 07:33:24'),
(4, 'Top', '1350X800', '5000', 0, '2016-09-21 00:51:35'),
(5, 'Top Left', '320X474', '2000', 0, '2016-09-21 00:53:31'),
(6, 'Top Right', '320X474', '2000', 0, '2016-09-21 00:54:23'),
(7, 'Top Left 2', '675X552', '1800', 0, '2016-09-21 01:09:10'),
(8, 'Top Right 2', '675X670', '1800', 0, '2016-09-21 01:12:25'),
(9, 'Bottom', '1349X600', '2500', 0, '2016-09-21 01:13:19'),
(10, 'middle', '300px*1500px', '5000', 0, '2016-10-04 07:13:05');

-- --------------------------------------------------------

--
-- Table structure for table `master_brands`
--

CREATE TABLE IF NOT EXISTS `master_brands` (
`id` int(11) NOT NULL,
  `brand_name` varchar(200) NOT NULL,
  `category_id` varchar(200) NOT NULL,
  `logo` varchar(50) NOT NULL,
  `CB` int(11) NOT NULL,
  `UB` int(11) NOT NULL,
  `DOC` date NOT NULL,
  `DOU` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `master_brands`
--

INSERT INTO `master_brands` (`id`, `brand_name`, `category_id`, `logo`, `CB`, `UB`, `DOC`, `DOU`) VALUES
(1, 'Casio', '28,', 'jpg', 10, 10, '2016-08-11', '2016-08-10 18:30:00'),
(2, 'Titan', '28,', 'jpg', 10, 10, '2016-08-11', '2016-08-11 06:14:01'),
(3, 'rolex', '28,', 'jpg', 11, 11, '2016-10-04', '2016-10-04 06:25:17'),
(4, 'style souk', '23,', 'jpg', 11, 11, '2016-10-15', '2016-10-15 09:56:03'),
(5, 'audi', '23,', 'jpg', 11, 11, '2016-10-15', '2016-10-15 10:55:47');

-- --------------------------------------------------------

--
-- Table structure for table `master_category_tags`
--

CREATE TABLE IF NOT EXISTS `master_category_tags` (
`id` int(11) NOT NULL,
  `category_tag` varchar(200) NOT NULL,
  `CB` int(11) NOT NULL,
  `UB` int(11) NOT NULL,
  `DOC` date NOT NULL,
  `DOU` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `master_category_tags`
--

INSERT INTO `master_category_tags` (`id`, `category_tag`, `CB`, `UB`, `DOC`, `DOU`) VALUES
(11, 'wedding', 4, 4, '2016-07-20', '2016-07-20 09:01:44'),
(12, 'gifts', 4, 4, '2016-07-20', '2016-07-20 09:02:16'),
(13, 'wedding-gifts', 4, 4, '2016-07-20', '2016-07-20 09:02:23'),
(14, 'wedding-store', 4, 4, '2016-07-20', '2016-07-20 09:02:30'),
(15, 'Wedding Favors Gifts', 4, 4, '2016-07-20', '2016-07-20 09:04:48'),
(16, 'roses', 4, 4, '2016-07-20', '2016-07-20 09:18:40'),
(17, 'dfg', 10, 10, '2016-07-25', '2016-07-25 07:33:23'),
(18, '1', 10, 10, '2016-07-25', '2016-07-25 08:23:14'),
(19, 'nm', 10, 10, '2016-07-25', '2016-07-25 08:42:57'),
(20, 'titan', 10, 10, '2016-08-11', '2016-08-11 06:59:47'),
(21, 'titan watches', 10, 10, '2016-08-11', '2016-08-11 06:59:57');

-- --------------------------------------------------------

--
-- Table structure for table `master_history_type`
--

CREATE TABLE IF NOT EXISTS `master_history_type` (
`id` int(11) NOT NULL,
  `type` varchar(200) NOT NULL,
  `credit_debit` int(11) NOT NULL COMMENT '1=>credit,2=>debit',
  `field1` varchar(200) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `master_history_type`
--

INSERT INTO `master_history_type` (`id`, `type`, `credit_debit`, `field1`) VALUES
(1, 'Registration Fees', 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `master_shipping_types`
--

CREATE TABLE IF NOT EXISTS `master_shipping_types` (
`id` int(11) NOT NULL,
  `shipping_type` varchar(100) NOT NULL,
  `shipping_rate` float NOT NULL,
  `status` int(11) NOT NULL,
  `cb` int(11) NOT NULL,
  `ub` int(11) NOT NULL,
  `doc` date NOT NULL,
  `dou` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `master_shipping_types`
--

INSERT INTO `master_shipping_types` (`id`, `shipping_type`, `shipping_rate`, `status`, `cb`, `ub`, `doc`, `dou`) VALUES
(1, 'er', 34, 1, 4, 0, '2016-07-21', '0000-00-00 00:00:00'),
(2, 'cash on delivery', 23, 1, 11, 0, '2016-10-04', '0000-00-00 00:00:00'),
(3, 'netbanking', 50, 1, 11, 0, '2016-10-15', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `master_tax_class`
--

CREATE TABLE IF NOT EXISTS `master_tax_class` (
`id` int(11) NOT NULL,
  `tax_class_name` varchar(250) NOT NULL,
  `tax_rate` varchar(250) NOT NULL,
  `doc` datetime NOT NULL,
  `dou` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `cb` int(11) NOT NULL,
  `ub` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `master_tax_class`
--

INSERT INTO `master_tax_class` (`id`, `tax_class_name`, `tax_rate`, `doc`, `dou`, `cb`, `ub`, `status`) VALUES
(13, 'Excise', '2,3', '2016-09-15 12:06:47', '2016-09-15 01:06:47', 10, 0, 1),
(14, 'GST Tax', '1,2,3', '2016-10-04 12:09:20', '2016-10-04 06:39:20', 11, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mater_tax_rates`
--

CREATE TABLE IF NOT EXISTS `mater_tax_rates` (
`id` int(11) NOT NULL,
  `tax_name` varchar(250) NOT NULL,
  `tax_rate` float(10,2) NOT NULL,
  `type` int(11) NOT NULL COMMENT '1= percentage,2=fixed amount',
  `zone` int(11) NOT NULL,
  `doc` datetime NOT NULL,
  `dou` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `cb` int(11) NOT NULL,
  `ub` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `mater_tax_rates`
--

INSERT INTO `mater_tax_rates` (`id`, `tax_name`, `tax_rate`, `type`, `zone`, `doc`, `dou`, `cb`, `ub`, `status`) VALUES
(1, 'new Tax Rate', 3.00, 1, 0, '0000-00-00 00:00:00', '2016-09-09 06:13:28', 0, 0, 1),
(4, 'service tax', 4.50, 1, 0, '0000-00-00 00:00:00', '2016-10-04 06:27:41', 0, 0, 1),
(5, 'sess tax', 1.00, 1, 0, '0000-00-00 00:00:00', '2016-10-15 10:59:26', 0, 0, 1),
(6, 'sales tax', 1.50, 1, 0, '0000-00-00 00:00:00', '2016-10-15 11:00:04', 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `merchant_account_master`
--

CREATE TABLE IF NOT EXISTS `merchant_account_master` (
`id` int(11) NOT NULL,
  `merchant_id` int(11) NOT NULL,
  `available_balance` double NOT NULL,
  `DOC` date NOT NULL,
  `DOU` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `merchant_account_master`
--

INSERT INTO `merchant_account_master` (`id`, `merchant_id`, `available_balance`, `DOC`, `DOU`) VALUES
(2, 1, 1304124, '2016-09-06', '2016-09-06 10:00:36'),
(3, 0, 1124588.4, '0000-00-00', '2016-09-21 07:46:17');

-- --------------------------------------------------------

--
-- Table structure for table `merchant_details`
--

CREATE TABLE IF NOT EXISTS `merchant_details` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `product_categories` varchar(250) NOT NULL,
  `merchant_type` int(11) NOT NULL,
  `product_count` int(11) NOT NULL,
  `shop_name` varchar(250) NOT NULL,
  `shop_logo` varchar(250) DEFAULT NULL,
  `shop_banner` varchar(250) DEFAULT NULL,
  `address` text NOT NULL,
  `pincode` int(11) NOT NULL,
  `city` varchar(100) NOT NULL,
  `locality` varchar(100) NOT NULL,
  `district` int(11) NOT NULL,
  `state` int(11) NOT NULL,
  `country` int(11) NOT NULL,
  `vat_tin` varchar(100) DEFAULT NULL,
  `CB` int(11) NOT NULL,
  `UB` int(11) NOT NULL,
  `DOC` date NOT NULL,
  `DOU` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_payment_done` int(11) NOT NULL COMMENT '1=Yes, 0=No',
  `field2` int(11) DEFAULT NULL,
  `field3` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `merchant_details`
--

INSERT INTO `merchant_details` (`id`, `user_id`, `fullname`, `product_categories`, `merchant_type`, `product_count`, `shop_name`, `shop_logo`, `shop_banner`, `address`, `pincode`, `city`, `locality`, `district`, `state`, `country`, `vat_tin`, `CB`, `UB`, `DOC`, `DOU`, `is_payment_done`, `field2`, `field3`) VALUES
(1, 1, 'Aathira', '23,28,31,', 2, 0, 'Gifts Shoppe', 'jpg', 'jpg', 'Gifts Shoppe,  Aluva', 683101, 'aLUVA', 'AluVA', 2, 18, 99, NULL, 0, 0, '2016-08-10', '2016-10-19 18:30:00', 0, NULL, NULL),
(2, 9, 'AAthira Binish', '23,', 2, 0, '', NULL, NULL, '', 0, '', '', 0, 0, 0, NULL, 0, 0, '2016-08-17', '2016-08-17 05:05:40', 0, NULL, NULL),
(3, 15, 'savan francis', '23,', 2, 0, '', NULL, NULL, '', 0, '', '', 0, 0, 0, NULL, 0, 0, '2016-10-13', '2016-10-13 04:46:03', 0, NULL, NULL),
(4, 17, 'Tina', '25,', 1, 0, 'Test retail shop', NULL, NULL, '3er', 5645654, 'kochi', 'rret', 2, 18, 99, NULL, 0, 0, '2016-10-13', '2016-10-12 23:00:00', 0, NULL, NULL),
(5, 19, 'Taskin', '23,', 2, 0, 'newgenshop', NULL, NULL, '707,5th block,61st cross,bhasham circle,rajaji nagar', 560010, 'banglore', 'indian', 28, 36, 99, NULL, 11, 11, '2016-10-15', '2016-10-15 09:40:35', 1, NULL, NULL),
(6, 22, 'binish', '30,', 2, 0, '', NULL, NULL, '', 0, '', '', 0, 0, 0, NULL, 0, 0, '2016-10-20', '2016-10-20 11:29:02', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `merchant_message`
--

CREATE TABLE IF NOT EXISTS `merchant_message` (
`id` int(11) NOT NULL,
  `message` text NOT NULL,
  `merchant_id` int(11) NOT NULL,
  `from_to` int(11) NOT NULL COMMENT '0->admin 1->merchant',
  `viewed` int(11) NOT NULL COMMENT '0->notviewd 1->viewed',
  `doc` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `merchant_message`
--

INSERT INTO `merchant_message` (`id`, `message`, `merchant_id`, `from_to`, `viewed`, `doc`, `status`) VALUES
(1, 'dsdf', 1, 1, 1, '2016-09-26 16:14:14', 1),
(2, 'hi', 1, 0, 0, '2016-09-26 16:17:41', 1),
(3, 'Test message', 15, 1, 1, '2016-10-13 11:56:21', 1),
(4, 'hiii', 15, 0, 0, '2016-10-13 11:56:46', 1);

-- --------------------------------------------------------

--
-- Table structure for table `merchant_payout_history`
--

CREATE TABLE IF NOT EXISTS `merchant_payout_history` (
`id` int(11) NOT NULL,
  `request_id` int(25) NOT NULL,
  `merchant_id` int(11) NOT NULL,
  `available_balance` double NOT NULL,
  `requested_amount` double NOT NULL,
  `payment_account` int(11) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1-requested, 2-hold, 3-processing, 4-paid, 5 -rejected',
  `transaction_reference` varchar(25) NOT NULL,
  `comment` varchar(500) NOT NULL,
  `DOC` date NOT NULL,
  `DOU` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `merchant_payout_history`
--

INSERT INTO `merchant_payout_history` (`id`, `request_id`, `merchant_id`, `available_balance`, `requested_amount`, `payment_account`, `status`, `transaction_reference`, `comment`, `DOC`, `DOU`) VALUES
(5, 5, 1, 305993.5, 56788, 4, 1, '', '', '2016-09-21', '2016-09-21 06:32:11'),
(7, 5, 1, 305993.5, 56788, 4, 2, '', '', '0000-00-00', '2016-09-21 09:33:48'),
(8, 5, 1, 305993.5, 56788, 4, 3, '', '', '0000-00-00', '2016-09-21 09:36:02'),
(10, 5, 1, 305993.5, 56788, 4, 2, '', '', '0000-00-00', '2016-09-21 09:37:11'),
(12, 5, 1, 249205.5, 56788, 4, 4, '', '', '2016-09-21', '2016-09-21 09:46:53'),
(13, 13, 1, 249205.5, 8500, 4, 1, '', '', '2016-09-21', '2016-09-21 10:03:35'),
(14, 13, 1, 249205.5, 8500, 4, 5, '', '', '2016-09-21', '2016-09-21 10:09:09'),
(15, 13, 1, 249205.5, 8500, 4, 1, '', '', '2016-09-22', '2016-09-22 04:04:51');

-- --------------------------------------------------------

--
-- Table structure for table `merchant_plans`
--

CREATE TABLE IF NOT EXISTS `merchant_plans` (
`id` int(11) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `user_id` varchar(200) NOT NULL,
  `plan_name` varchar(250) NOT NULL,
  `amount` varchar(200) NOT NULL,
  `featured` int(11) NOT NULL,
  `featured_left` int(11) NOT NULL,
  `no_of_product` varchar(200) NOT NULL,
  `no_of_product_left` varchar(200) NOT NULL,
  `no_of_ads` varchar(200) NOT NULL,
  `no_of_ads_left` varchar(200) NOT NULL,
  `no_of_days` varchar(200) NOT NULL,
  `no_of_days_left` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  `cb` int(11) NOT NULL,
  `doc` datetime NOT NULL,
  `ub` int(11) NOT NULL,
  `dou` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `merchant_plans`
--

INSERT INTO `merchant_plans` (`id`, `plan_id`, `user_id`, `plan_name`, `amount`, `featured`, `featured_left`, `no_of_product`, `no_of_product_left`, `no_of_ads`, `no_of_ads_left`, `no_of_days`, `no_of_days_left`, `status`, `cb`, `doc`, `ub`, `dou`) VALUES
(15, 4, '3', 'Gold', '10000', 3, 3, '118', '117', '60', '60', '180', '180', 1, 0, '2016-09-24 16:24:31', 0, '2016-09-24 10:54:31'),
(18, 5, '1', 'Silver', '5000', 3, 3, '160', '157', '80', '80', '240', '240', 1, 0, '2016-09-27 13:06:52', 0, '2016-09-27 07:36:52');

-- --------------------------------------------------------

--
-- Table structure for table `merchant_plans_history`
--

CREATE TABLE IF NOT EXISTS `merchant_plans_history` (
`id` int(11) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `user_id` varchar(200) NOT NULL,
  `plan_name` varchar(250) NOT NULL,
  `amount` varchar(200) NOT NULL,
  `featured` int(11) NOT NULL,
  `no_of_product` varchar(200) NOT NULL,
  `no_of_ads` varchar(200) NOT NULL,
  `no_of_days` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  `cb` int(11) NOT NULL,
  `doc` datetime NOT NULL,
  `ub` int(11) NOT NULL,
  `dou` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `merchant_plans_history`
--

INSERT INTO `merchant_plans_history` (`id`, `plan_id`, `user_id`, `plan_name`, `amount`, `featured`, `no_of_product`, `no_of_ads`, `no_of_days`, `status`, `cb`, `doc`, `ub`, `dou`) VALUES
(2, 1, '3', 'Bronz', '2000', 1, '20', '10', '30', 1, 0, '2016-09-23 16:48:19', 0, '2016-09-23 11:18:19'),
(3, 5, '3', 'Silver', '5000', 1, '40', '20', '60', 1, 0, '2016-09-23 16:50:06', 0, '2016-09-23 11:20:06'),
(4, 4, '3', 'Gold', '10000', 1, '60', '30', '90', 1, 0, '2016-09-24 16:24:31', 0, '2016-09-24 10:54:31'),
(5, 1, '1', 'Gold', '10000', 1, '60', '30', '90', 1, 0, '2016-09-27 12:12:36', 0, '2016-09-27 06:42:36'),
(6, 4, '1', 'Gold', '10000', 1, '60', '30', '90', 1, 0, '2016-09-27 13:06:40', 0, '2016-09-27 07:36:40'),
(7, 5, '1', 'Silver', '5000', 1, '40', '20', '60', 1, 0, '2016-09-27 13:06:52', 0, '2016-09-27 07:36:52');

-- --------------------------------------------------------

--
-- Table structure for table `merchant_transaction_master`
--

CREATE TABLE IF NOT EXISTS `merchant_transaction_master` (
`id` int(11) NOT NULL,
  `merchant_id` int(11) NOT NULL,
  `transaction_type` int(11) NOT NULL COMMENT '1:Deposit, 2= Withdraw, 3 - payout credit',
  `amount` double NOT NULL,
  `DOC` date NOT NULL,
  `DOU` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `merchant_transaction_master`
--

INSERT INTO `merchant_transaction_master` (`id`, `merchant_id`, `transaction_type`, `amount`, `DOC`, `DOU`) VALUES
(1, 1, 1, 86782.5, '2016-09-21', '2016-09-21 07:46:16'),
(2, 0, 1, 465468, '2016-09-21', '2016-09-21 07:46:17'),
(3, 1, 1, 45646, '2016-09-21', '2016-09-21 09:23:09'),
(4, 1, 3, 56788, '0000-00-00', '2016-09-21 09:46:53'),
(5, 1, 3, 8500, '0000-00-00', '2016-09-21 10:09:09'),
(6, 1, 3, 8500, '0000-00-00', '2016-09-22 04:04:51'),
(7, 1, 1, 694260, '2016-09-23', '2016-09-23 09:19:18'),
(8, 1, 1, 45646, '2016-09-23', '2016-09-23 09:20:46'),
(9, 0, 1, 465468, '2016-09-23', '2016-09-23 09:20:47'),
(10, 1, 1, 86782.5, '2016-09-23', '2016-09-23 09:20:47'),
(11, 0, 1, 2342, '2016-09-26', '2016-09-26 09:34:03'),
(12, 1, 1, 45646, '2016-09-26', '2016-09-26 10:35:46'),
(13, 0, 1, 2342, '2016-09-26', '2016-09-26 10:35:46'),
(14, 1, 1, 45646, '2016-09-26', '2016-09-26 10:36:49'),
(15, 1, 1, 45646, '2016-09-26', '2016-09-26 10:38:10'),
(16, 0, 2, 45646, '2016-09-29', '2016-09-29 09:51:40'),
(17, 1, 1, 45646, '2016-09-29', '2016-09-29 09:51:40'),
(18, 0, 2, 45646, '2016-09-29', '2016-09-29 10:13:43'),
(19, 1, 1, 45646, '2016-09-29', '2016-09-29 10:13:43'),
(20, 0, 1, 45646, '2016-09-29', '2016-09-29 10:53:01'),
(21, 0, 1, 45646, '2016-09-29', '2016-09-29 11:01:06'),
(22, 0, 1, 91292, '2016-09-30', '2016-09-30 05:59:45'),
(23, 0, 1, 1000.9, '2016-10-12', '2016-10-12 05:40:48'),
(24, 0, 1, 0, '2016-10-12', '2016-10-12 09:30:04'),
(25, 0, 1, 2500, '2016-10-13', '2016-10-13 06:08:23'),
(26, 0, 1, 2500, '2016-10-14', '2016-10-14 06:30:18'),
(27, 0, 1, 4893, '2016-10-20', '2016-10-20 06:31:51'),
(28, 0, 1, 86782.5, '2016-10-20', '2016-10-20 06:31:51');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE IF NOT EXISTS `newsletter` (
`id` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `date` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`id`, `email`, `status`, `date`) VALUES
(1, 'avpin1992@gmail.com', 1, '2016-10-19');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter_content`
--

CREATE TABLE IF NOT EXISTS `newsletter_content` (
`id` int(11) NOT NULL,
  `heading` varchar(250) NOT NULL,
  `subheading` varchar(250) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(250) NOT NULL,
  `link` varchar(250) NOT NULL,
  `status` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `doc` date NOT NULL,
  `cb` int(11) NOT NULL,
  `dou` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `ub` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `newsletter_content`
--

INSERT INTO `newsletter_content` (`id`, `heading`, `subheading`, `content`, `image`, `link`, `status`, `type`, `doc`, `cb`, `dou`, `ub`) VALUES
(1, 'Special offers or coupons', 'Special offers', '<p>\r\n	Like your blog and other <a href="http://writtent.com/blog/how-content-marketing-fits-into-your-buying-cycle/#comment-112" target="_blank">content marketing</a> efforts, your newsletter should generate leads. Encourage repeat purchases with valuable discounts, free trials, product demos, and other offers.</p>\r\n', 'jpg', '', 1, 0, '2016-10-04', 11, '0000-00-00 00:00:00', 0),
(2, 'information', 'details', '<p>\r\n	Thank you for&nbsp;being involved in newgen shop</p>\r\n<p>\r\n	newgen shop communicates with the members in different ways;</p>\r\n<ul>\r\n	<li>\r\n		Facebook</li>\r\n	<li>\r\n		Latest news about newgen shop and upcoming events with our e-mail service.&nbsp;An e-mail&nbsp;will be send every time the website is updated, or when there is an event all members should be aware of, such as club meetings or important matters we need our members attention</li>\r\n	<li>\r\n		Our newsletter submitted after every race.&nbsp;The newsletter will keep you up to date with all the new and fun stuff that is going on at newgen shop kart</li>\r\n	<li>\r\n		Members meetings</li>\r\n	<li>\r\n		Rules meeting once a year</li>\r\n	<li>\r\n		Our AGM in January</li>\r\n</ul>\r\n<p>\r\n	Thank you for being involved!</p>\r\n', 'jpg', '', 1, 0, '2016-10-17', 11, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `order_date` datetime NOT NULL,
  `coupon_id` int(11) NOT NULL,
  `discount_rate` decimal(10,2) NOT NULL,
  `gift_option` int(11) NOT NULL COMMENT '0=no giftpack , 1= giftpack option',
  `rate` double NOT NULL,
  `ship_address_id` int(11) NOT NULL,
  `bill_address_id` int(11) NOT NULL,
  `currency_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `payment_mode` varchar(100) NOT NULL COMMENT '1=wallet,2=gateway,3=paypal,4=wallet+netbanking ',
  `admin_comment` text NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `payment_status` int(11) NOT NULL COMMENT '0=notpay,1=success,2=failed',
  `admin_status` int(11) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0=notplaced,1=Not Delivered,2=Success,3=failed',
  `DOC` date NOT NULL,
  `netbanking` int(11) NOT NULL,
  `paypal` decimal(10,2) NOT NULL,
  `wallet` decimal(10,2) NOT NULL,
  `shipping_method` int(11) NOT NULL,
  `newgen_gift` int(11) NOT NULL COMMENT '1:gift order; 0:other'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `user_id`, `total_amount`, `order_date`, `coupon_id`, `discount_rate`, `gift_option`, `rate`, `ship_address_id`, `bill_address_id`, `currency_id`, `comment`, `payment_mode`, `admin_comment`, `transaction_id`, `payment_status`, `admin_status`, `status`, `DOC`, `netbanking`, `paypal`, `wallet`, `shipping_method`, `newgen_gift`) VALUES
(3, 4, '0.00', '2016-09-23 14:49:15', 0, '0.00', 0, 0, 3, 3, 0, '', '2', '', 0, 1, 0, 1, '2016-09-23', 0, '0.00', '0.00', 0, 0),
(4, 4, '0.00', '2016-09-23 14:50:40', 0, '0.00', 0, 0, 3, 3, 0, '', '2', '', 0, 1, 0, 1, '2016-09-23', 0, '0.00', '0.00', 0, 0),
(5, 4, '0.00', '2016-09-24 15:24:38', 0, '0.00', 0, 0, 3, 3, 0, '', '', '', 0, 0, 0, 0, '2016-09-24', 0, '0.00', '0.00', 0, 0),
(6, 4, '0.00', '2016-09-24 17:09:14', 0, '0.00', 0, 0, 3, 3, 0, '', '', '', 0, 0, 0, 0, '2016-09-24', 0, '0.00', '0.00', 0, 0),
(7, 4, '0.00', '2016-09-26 15:03:59', 0, '0.00', 0, 0, 3, 3, 0, '', '2', '', 0, 1, 0, 1, '2016-09-26', 0, '0.00', '0.00', 0, 0),
(8, 4, '0.00', '2016-09-26 15:04:59', 0, '0.00', 0, 0, 3, 3, 0, '', '', '', 0, 0, 0, 0, '2016-09-26', 0, '0.00', '0.00', 0, 0),
(9, 4, '0.00', '2016-09-26 16:04:09', 0, '0.00', 0, 0, 18, 3, 0, '', '2', '', 0, 1, 0, 1, '2016-09-26', 0, '0.00', '0.00', 0, 0),
(10, 4, '0.00', '2016-09-26 16:06:43', 0, '0.00', 0, 0, 19, 3, 0, '', '2', '', 0, 1, 0, 1, '2016-09-26', 0, '0.00', '0.00', 0, 0),
(11, 4, '0.00', '2016-09-26 16:08:06', 0, '0.00', 0, 0, 20, 3, 0, '', '2', '', 0, 1, 0, 1, '2016-09-26', 0, '0.00', '0.00', 0, 0),
(12, 4, '0.00', '2016-09-29 16:22:55', 0, '0.00', 0, 0, 3, 3, 0, '', '2', '', 0, 1, 0, 1, '2016-09-29', 0, '0.00', '0.00', 0, 0),
(13, 4, '0.00', '2016-09-29 16:28:53', 0, '0.00', 0, 0, 3, 3, 0, '', '', '', 0, 0, 0, 0, '2016-09-29', 0, '0.00', '0.00', 0, 0),
(14, 4, '45646.00', '2016-09-29 16:31:00', 0, '0.00', 0, 0, 3, 3, 0, '', '2', '', 0, 1, 0, 1, '2016-09-29', 0, '0.00', '0.00', 0, 0),
(15, 10, '91292.00', '2016-09-30 11:29:31', 0, '0.00', 0, 0, 21, 21, 0, '', '2', '', 0, 1, 0, 1, '2016-09-30', 0, '0.00', '0.00', 0, 0),
(16, 13, '917.90', '2016-10-12 11:10:28', 0, '0.00', 0, 0, 22, 22, 0, '', '2', '', 0, 1, 0, 1, '2016-10-12', 0, '0.00', '0.00', 0, 0),
(17, 13, '0.00', '2016-10-12 14:59:47', 0, '0.00', 0, 0, 22, 22, 0, '', '2', '', 0, 1, 0, 1, '2016-10-12', 0, '0.00', '0.00', 0, 0),
(18, 14, '2500.00', '2016-10-13 11:38:15', 0, '0.00', 0, 0, 25, 25, 0, '', '2', '', 0, 1, 0, 1, '2016-10-13', 0, '0.00', '0.00', 0, 0),
(19, 14, '2500.00', '2016-10-14 11:55:48', 0, '0.00', 0, 0, 26, 26, 0, '', '2', '', 0, 1, 0, 1, '2016-10-14', 0, '0.00', '0.00', 0, 0),
(20, 4, '91843.26', '2016-10-20 12:01:46', 0, '0.00', 0, 0, 3, 3, 0, '', '2', '', 0, 1, 0, 1, '2016-10-20', 0, '0.00', '0.00', 0, 0),
(21, 4, '1000.00', '2016-10-21 15:10:08', 0, '0.00', 0, 0, 3, 3, 0, '', '', '', 0, 0, 0, 0, '2016-10-21', 0, '0.00', '0.00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_history`
--

CREATE TABLE IF NOT EXISTS `order_history` (
`id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `order_products_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `merchant_id` int(11) NOT NULL,
  `order_status_comment` varchar(500) NOT NULL,
  `order_status` int(11) NOT NULL,
  `shipping_type` int(11) NOT NULL,
  `tracking_id` varchar(225) NOT NULL,
  `date` datetime NOT NULL,
  `status` int(11) NOT NULL,
  `cb` int(11) NOT NULL,
  `ub` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `order_history`
--

INSERT INTO `order_history` (`id`, `order_id`, `order_products_id`, `product_id`, `merchant_id`, `order_status_comment`, `order_status`, `shipping_type`, `tracking_id`, `date`, `status`, `cb`, `ub`) VALUES
(1, 3, 1, 17, 0, 'Test', 2, 0, '', '2016-09-24 05:06:45', 1, 0, 0),
(2, 4, 2, 14, 0, '', 3, 0, '', '2016-09-24 05:07:55', 1, 0, 0),
(3, 3, 1, 17, 0, '', 2, 0, '', '2016-09-24 05:09:16', 1, 0, 0),
(4, 3, 1, 17, 0, '', 4, 0, '', '2016-09-24 05:09:25', 1, 0, 0),
(5, 7, 7, 10, 0, 'Your Order has been Placed Successfully. Order Shipped only After Your Payment Confirmed. ', 1, 0, '', '2016-09-26 00:00:00', 1, 1, 1),
(6, 9, 10, 14, 0, 'Your Order has been Placed Successfully. Order Shipped only After Your Payment Confirmed. ', 1, 0, '', '2016-09-26 00:00:00', 1, 1, 1),
(7, 9, 11, 10, 0, 'Your Order has been Placed Successfully. Order Shipped only After Your Payment Confirmed. ', 1, 0, '', '2016-09-26 00:00:00', 1, 1, 1),
(8, 10, 12, 14, 0, 'Your Order has been Placed Successfully. Order Shipped only After Your Payment Confirmed. ', 1, 0, '', '2016-09-26 00:00:00', 1, 1, 1),
(9, 11, 13, 14, 0, 'Your Order has been Placed Successfully. Order Shipped only After Your Payment Confirmed. ', 1, 0, '', '2016-09-26 00:00:00', 1, 1, 1),
(10, 11, 13, 14, 0, '', 5, 0, '', '2016-09-29 14:26:13', 1, 0, 0),
(11, 11, 13, 14, 0, '', 1, 0, '', '2016-09-29 14:34:55', 1, 0, 0),
(12, 11, 13, 14, 0, '', 5, 0, '', '2016-09-29 14:35:12', 1, 0, 0),
(13, 11, 13, 14, 1, '', 6, 0, '', '2016-09-29 00:00:00', 0, 0, 0),
(14, 12, 14, 14, 0, 'Your Order has been Placed Successfully. Order Shipped only after your payment is confirmed. ', 1, 0, '', '2016-09-29 00:00:00', 3, 1, 1),
(15, 14, 16, 14, 0, 'Your Order has been Placed Successfully. Order Shipped only after your payment is confirmed. ', 1, 0, '', '2016-09-29 00:00:00', 3, 1, 1),
(16, 15, 17, 14, 0, 'Your Order has been Placed Successfully. Order Shipped only after your payment is confirmed. ', 1, 0, '', '2016-09-30 00:00:00', 3, 1, 1),
(17, 16, 21, 9, 0, 'Your Order has been Placed Successfully. Order Shipped only after your payment is confirmed. ', 1, 0, '', '2016-10-12 00:00:00', 3, 1, 1),
(18, 17, 22, 9, 0, 'Your Order has been Placed Successfully. Order Shipped only after your payment is confirmed. ', 1, 0, '', '2016-10-12 00:00:00', 3, 1, 1),
(19, 18, 23, 42, 0, 'Your Order has been Placed Successfully. Order Shipped only after your payment is confirmed. ', 1, 0, '', '2016-10-13 00:00:00', 3, 1, 1),
(20, 18, 23, 42, 0, 'Shipped', 4, 0, '', '2016-10-13 12:22:07', 1, 0, 0),
(22, 18, 23, 42, 0, 'Satus comment 3', 5, 0, '', '2016-10-13 12:24:29', 1, 0, 0),
(23, 19, 25, 42, 0, 'Your Order has been Placed Successfully. Order Shipped only after your payment is confirmed. ', 1, 0, '', '2016-10-14 00:00:00', 3, 1, 1),
(24, 20, 26, 44, 0, 'Your Order has been Placed Successfully. Order Shipped only after your payment is confirmed. ', 1, 0, '', '2016-10-20 00:00:00', 3, 1, 1),
(25, 20, 27, 46, 0, 'Your Order has been Placed Successfully. Order Shipped only after your payment is confirmed. ', 1, 0, '', '2016-10-20 00:00:00', 3, 1, 1),
(26, 20, 27, 46, 0, '', 2, 0, '', '2016-10-20 12:03:33', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE IF NOT EXISTS `order_products` (
`id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `merchant_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `amount` double NOT NULL,
  `DOC` date NOT NULL,
  `order_comments` varchar(250) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1-not placed, 2- payment_pending, 3- payment_done, 4 - delivered to customer, 5 - completed',
  `gift_option` int(11) NOT NULL,
  `rate` double NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`id`, `order_id`, `product_id`, `merchant_id`, `quantity`, `amount`, `DOC`, `order_comments`, `status`, `gift_option`, `rate`) VALUES
(1, 3, 17, 1, 8, 86782.5, '2016-09-23', '', 3, 0, 694260),
(2, 4, 14, 1, 1, 45646, '2016-09-23', '', 3, 0, 45646),
(3, 4, 16, 0, 1, 465468, '2016-09-23', '', 3, 0, 465468),
(4, 4, 17, 1, 1, 86782.5, '2016-09-23', '', 3, 0, 86782.5),
(5, 5, 14, 1, 1, 45646, '2016-09-24', '', 1, 0, 45646),
(6, 6, 14, 1, 1, 45646, '2016-09-24', '', 1, 0, 45646),
(7, 7, 10, 0, 1, 2342, '2016-09-26', '', 3, 0, 2342),
(8, 8, 14, 1, 1, 45646, '2016-09-26', '', 1, 0, 45646),
(9, 8, 10, 0, 1, 2342, '2016-09-26', '', 1, 0, 2342),
(10, 9, 14, 1, 1, 45646, '2016-09-26', '', 3, 0, 45646),
(11, 9, 10, 0, 1, 2342, '2016-09-26', '', 3, 0, 2342),
(12, 10, 14, 1, 1, 45646, '2016-09-26', '', 3, 0, 45646),
(13, 11, 14, 1, 1, 45646, '2016-09-26', '', 5, 0, 45646),
(14, 12, 14, 1, 1, 45646, '2016-09-29', '', 3, 0, 45646),
(15, 13, 14, 1, 1, 45646, '2016-09-29', '', 1, 0, 45646),
(16, 14, 14, 1, 1, 45646, '2016-09-29', '', 3, 0, 45646),
(17, 15, 14, 1, 2, 45646, '2016-09-30', '', 3, 0, 91292),
(21, 16, 9, 0, 1, 1000.9, '2016-10-12', '', 3, 0, 1000.9),
(22, 17, 9, 0, 0, 1000.9, '2016-10-12', '', 3, 0, 0),
(23, 18, 42, 3, 1, 2500, '2016-10-13', '', 4, 0, 2500),
(25, 19, 42, 3, 1, 2500, '2016-10-14', '', 3, 0, 2500),
(26, 20, 44, 0, 7, 699, '2016-10-20', '', 3, 0, 4893),
(27, 20, 46, 1, 1, 86782.5, '2016-10-20', '', 3, 0, 86782.5),
(28, 21, 46, 1, 10, 140, '2016-10-21', '', 1, 0, 1400);

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE IF NOT EXISTS `order_status` (
`id` int(11) NOT NULL,
  `title` varchar(225) NOT NULL,
  `description` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`id`, `title`, `description`, `status`) VALUES
(1, 'Order Placed', 'Your Order has been Placed Successfully. Order Shipped only after your payment is confirmed. ', 1),
(2, 'Payment Confirmed', 'Your Order Payment has successfully verified by the Seller', 1),
(3, 'Payment Failed', 'Your Order Payment has failed.', 1),
(4, 'Order Shipped', 'Your Product Shipped Successfully.', 1),
(5, 'Delivered', 'Your Order has successfully delivered to the given address', 1),
(6, 'Order Completed', 'Your Order Has been Completed', 0),
(7, 'order delivered', 'your order is successfully delivered.thank you for shopping', 1),
(8, 'shipped', 'your product will be delivered by wednesday,invoice will be sent to your registered email within 24 hours of delivery', 1);

-- --------------------------------------------------------

--
-- Table structure for table `plan_details`
--

CREATE TABLE IF NOT EXISTS `plan_details` (
`id` int(11) NOT NULL,
  `plan_name` varchar(250) NOT NULL,
  `amount` varchar(250) NOT NULL,
  `featured` varchar(250) NOT NULL,
  `no_of_days` varchar(250) NOT NULL,
  `no_of_products` varchar(250) NOT NULL,
  `no_of_ads` varchar(250) NOT NULL,
  `status` int(11) NOT NULL,
  `image` varchar(250) NOT NULL,
  `cb` int(11) NOT NULL,
  `doc` datetime NOT NULL,
  `ub` int(11) NOT NULL,
  `dou` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `plan_details`
--

INSERT INTO `plan_details` (`id`, `plan_name`, `amount`, `featured`, `no_of_days`, `no_of_products`, `no_of_ads`, `status`, `image`, `cb`, `doc`, `ub`, `dou`) VALUES
(4, 'Gold', '10000', '1', '90', '60', '30', 1, 'png', 10, '2016-09-06 00:00:00', 10, '2016-09-23 05:42:10'),
(5, 'Silver', '5000', '1', '60', '40', '20', 1, 'png', 10, '2016-09-06 00:00:00', 10, '2016-09-23 05:42:04'),
(6, 'Bronz', '2000', '1', '30', '20', '10', 1, 'png', 10, '2016-09-06 00:00:00', 10, '2016-09-23 05:42:14');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
`id` int(11) NOT NULL,
  `category_id` varchar(200) NOT NULL,
  `product_name` varchar(225) NOT NULL,
  `product_code` varchar(225) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `merchant_id` int(11) NOT NULL,
  `merchant_type` int(11) NOT NULL,
  `description` text NOT NULL,
  `main_image` varchar(200) NOT NULL,
  `gallery_images` varchar(200) NOT NULL,
  `hover_image` varchar(150) NOT NULL,
  `canonical_name` varchar(200) NOT NULL,
  `meta_title` varchar(225) NOT NULL,
  `meta_description` text NOT NULL,
  `meta_keywords` varchar(225) NOT NULL,
  `header_visibility` int(11) NOT NULL,
  `sort_order` int(11) NOT NULL,
  `display_category_name` int(11) NOT NULL,
  `price` float NOT NULL,
  `wholesale_price` float NOT NULL,
  `wholesale_quantity` int(11) NOT NULL,
  `is_discount_available` int(11) NOT NULL,
  `discount` float NOT NULL,
  `discount_type` varchar(225) NOT NULL,
  `discount_rate` float NOT NULL,
  `discount_from` date NOT NULL,
  `discount_to` date NOT NULL,
  `quantity` int(11) NOT NULL,
  `quantity_master` int(11) NOT NULL,
  `requires_shipping` int(11) NOT NULL,
  `enquiry_sale` int(11) NOT NULL,
  `new_from` date NOT NULL,
  `new_to` date NOT NULL,
  `sale_from` date NOT NULL,
  `sale_to` date NOT NULL,
  `special_price_from` date NOT NULL,
  `special_price` float NOT NULL COMMENT 'offer price',
  `special_price_to` date NOT NULL,
  `tax` float NOT NULL,
  `gift_option` int(11) NOT NULL,
  `stock_availability` int(11) NOT NULL,
  `video_link` varchar(225) NOT NULL,
  `video` varchar(150) NOT NULL,
  `weight` float NOT NULL,
  `weight_class` int(11) NOT NULL,
  `status` varchar(225) NOT NULL,
  `exchange` int(11) NOT NULL,
  `search_tag` varchar(225) NOT NULL,
  `related_products` varchar(225) NOT NULL,
  `is_cod_available` int(11) NOT NULL,
  `is_available` int(11) NOT NULL,
  `is_featured` int(11) NOT NULL,
  `is_admin_approved` int(11) NOT NULL,
  `CB` int(11) NOT NULL,
  `UB` int(11) NOT NULL,
  `DOC` date NOT NULL,
  `DOU` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `product_name`, `product_code`, `brand_id`, `merchant_id`, `merchant_type`, `description`, `main_image`, `gallery_images`, `hover_image`, `canonical_name`, `meta_title`, `meta_description`, `meta_keywords`, `header_visibility`, `sort_order`, `display_category_name`, `price`, `wholesale_price`, `wholesale_quantity`, `is_discount_available`, `discount`, `discount_type`, `discount_rate`, `discount_from`, `discount_to`, `quantity`, `quantity_master`, `requires_shipping`, `enquiry_sale`, `new_from`, `new_to`, `sale_from`, `sale_to`, `special_price_from`, `special_price`, `special_price_to`, `tax`, `gift_option`, `stock_availability`, `video_link`, `video`, `weight`, `weight_class`, `status`, `exchange`, `search_tag`, `related_products`, `is_cod_available`, `is_available`, `is_featured`, `is_admin_approved`, `CB`, `UB`, `DOC`, `DOU`) VALUES
(6, '23,', 'Titan 9154YM ', 'Titan1245', 0, 4, 0, '<ul>\r\n	<li>\r\n		<span style="color:#800080;">Case: Brass</span></li>\r\n	<li>\r\n		<span style="color:#800080;">Strap: Sheet Metal </span></li>\r\n	<li>\r\n		<span style="color:#800080;">Dial Color: Champagne</span></li>\r\n	<li>\r\n		<span style="color:#800080;">Functionality: Date </span></li>\r\n	<li>\r\n		<span style="color:#800080;">Water resistance: 30meters </span></li>\r\n	<li>\r\n		<span style="color:#800080;">Gender: Men</span></li>\r\n</ul>\r\n', 'jpg', '', 'jpg', 'Titan 9154YM ', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, '1', 0, '0000-00-00', '0000-00-00', 0, 0, 1, 0, '2016-07-27', '2016-07-30', '2016-07-27', '2016-07-28', '2016-07-27', 0, '2016-07-29', 0, 1, 1, '', '', 0, 0, '1', 0, '', '', 0, 1, 1, 1, 4, 4, '0000-00-00', '2016-07-26 13:00:00'),
(7, '25,', 'Roses', 'ROSE132', 0, 4, 0, '<p>\r\n	<span style="font-family: &quot;Open Sans&quot;, sans-serif; font-size: 12px; line-height: 15px;">You will fall in love with these beautiful red roses without a doubt! These roses look really warm and passionate and will delight any recipient. This pack contains twelve such roses and these have been immaculately packed in premium and expensive tissue paper. This lends a sophisticated and elegant air to the gift pack while there is a matching ribbon bow on top. This has been tied for added effect and certainly scales up the attractiveness of this gift pack. These flowers can be used as nice gifts on a variety of occasions. Product Details: 12 Red Roses, Tissue Paper with Ribbon Bow</span></p>\r\n', 'jpg', '', '', 'rd', 'rose', 'You will fall in love with these beautiful red roses without a doubt! These roses look really warm and passionate and will delight any recipient. This pack contains twelve such roses and these have been immaculately packed in', '', 0, 0, 0, 1000, 0, 0, 1, 0, '1', 0, '1970-01-01', '1970-01-01', 200, 0, 1, 0, '1970-01-01', '1970-01-01', '1970-01-01', '1970-01-01', '1970-01-01', 0, '1970-01-01', 0, 1, 1, '', '', 0, 0, '1', 0, '', '', 0, 1, 1, 1, 4, 10, '2016-07-20', '2016-08-17 05:09:20'),
(9, '25,23,', 'watch', 'wtch23564', 0, 0, 0, '<ul>\r\n	<li>\r\n		stylish watches</li>\r\n	<li>\r\n		awsome designs</li>\r\n	<li>\r\n		custom offers</li>\r\n</ul>\r\n', 'jpg', '', 'jpg', 'watch', 'watch', 'watchwatchwatchwatchwatch watch', 'watch', 0, 1, 0, 1000.9, 1, 0, 1, 83, '1', 1, '0000-00-00', '0000-00-00', 0, 0, 1, 0, '2016-07-26', '2016-07-31', '2016-07-26', '2016-10-26', '2016-07-28', 0, '2016-07-28', 1, 1, 0, '1', '1', 1, 3, '1', 1, 'wedding,gifts,wedding-store,', '7', 1, 1, 1, 1, 0, 0, '2016-07-26', '2016-07-26 05:38:28'),
(10, '23,', 'gift', 'gift', 0, 0, 0, '<p>\r\n	gift</p>\r\n', 'jpg', '', '', 'gift', 'gift', 'gift`', 'gift', 0, 124, 0, 2342, 3534, 0, 1, 23, '1', 45, '0000-00-00', '0000-00-00', 6, 0, 1, 0, '2016-07-26', '2016-07-27', '2016-07-25', '2016-07-27', '2016-07-25', 0, '2016-07-27', 67, 1, 1, '0', '89', 0, 3, '1', 1, '', '', 1, 1, 1, 1, 0, 0, '2016-07-26', '2016-07-26 05:49:23'),
(13, 'Watches,', 'Titan 123', 'tit123', 2, 0, 0, '<ul>\r\n	<li>\r\n		<span style="font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; line-height: 20px; text-align: justify; background-color: rgb(255, 255, 255);">Lorem ipsum dolor sit amet,</span></li>\r\n	<li>\r\n		<span style="font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; line-height: 20px; text-align: justify; background-color: rgb(255, 255, 255);">consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commod</span></li>\r\n	<li>\r\n		<span style="font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; line-height: 20px; text-align: justify; background-color: rgb(255, 255, 255);">o <em><strong>consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit ani</strong></em>m id est laborum</span></li>\r\n</ul>\r\n', 'jpg', '', 'jpg', 'Titan 915', 'Titan 9154YM ', 'Titan 9154YM  Titan 9154YM Titan 9154YM Titan 9154YM Titan 9154YM Titan 9154YM ', 'titan,watches', 0, 1, 0, 4500, 4000, 0, 1, 56, '1', 4400, '1970-01-01', '1970-01-01', 58, 0, 1, 0, '2016-08-11', '2016-08-20', '2016-08-11', '2016-08-31', '2016-08-20', 0, '2016-08-21', 45, 1, 1, '', '', 89, 3, '1', 1, 'titan,titan watches,', '6', 1, 1, 1, 1, 10, 10, '2016-08-11', '2016-09-08 18:30:00'),
(16, '29,', 'Mobile Admin added', 'mobil12313', 1, 0, 0, '<p>\r\n	mobile</p>\r\n', 'jpg', '', 'jpg', 'Mobile-Admin-added_', '', '', '', 0, 0, 0, 465468, 0, 0, 0, 0, '1', 0, '1970-01-01', '1970-01-01', 100, 0, 1, 0, '2016-08-26', '2016-08-31', '2016-08-26', '2016-09-30', '1970-01-01', 0, '1970-01-01', 0, 1, 1, '', '', 180, 3, '1', 1, '', '', 1, 1, 1, 1, 10, 10, '2016-08-26', '2016-08-25 18:30:00'),
(17, '28,', 'merchant Added watch', 'watcher214', 1, 1, 2, '<p>\r\n	<span style="color:#800000;"><span style="font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; line-height: 20px; text-align: justify; background-color: rgb(255, 255, 255);">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip</span></span></p>\r\n<p>\r\n	<span style="font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; line-height: 20px; text-align: justify; background-color: rgb(255, 255, 255);">ex ea commodo consequat. D</span><span style="font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; line-height: 20px; text-align: justify;"><span style="background-color:#ffa500;">uis aute irure dolor in reprehenderit in voluptate </span></span><span style="font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; line-height: 20px; text-align: justify; background-color: rgb(255, 255, 255);">velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</span></p>\r\n', 'jpg', '', 'jpg', 'merchant-Added-watch_', '', '', '', 0, 0, 0, 86782.5, 0, 0, 0, 0, '1', 0, '1970-01-01', '1970-01-01', 235, 0, 0, 0, '1970-01-01', '1970-01-01', '2016-08-26', '2016-08-31', '1970-01-01', 0, '1970-01-01', 0, 0, 0, '', '', 0, 0, '1', 0, '', '', 0, 0, 0, 1, 0, 10, '2016-08-26', '2016-09-08 18:30:00'),
(35, '25,', 'ddddd', '4565gfthy', 1, 1, 2, '<p>\r\n	<span style="font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; line-height: 20px; text-align: justify; background-color: rgb(255, 255, 255);">ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dict<strong>a sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam e</strong>st, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis aute</span></p>\r\n', 'jpg', '', 'jpg', 'ddddd_14', '', '', '', 0, 0, 0, 45646, 456457, 0, 0, 0, '1', 0, '1970-01-01', '1970-01-01', 345, 0, 1, 0, '1970-01-01', '1970-01-01', '1970-01-01', '1970-01-01', '1970-01-01', 0, '1970-01-01', 0, 1, 1, '', '', 0, 0, '1', 1, '', '', 1, 1, 1, 1, 0, 10, '2016-09-17', '2016-09-17 06:09:04'),
(37, '28,', 'merchant Added watch', 'watcher214', 1, 1, 2, '<p>\r\n	<span style="color:#800000;"><span style="font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; line-height: 20px; text-align: justify; background-color: rgb(255, 255, 255);">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip</span></span></p>\r\n<p>\r\n	<span style="font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; line-height: 20px; text-align: justify; background-color: rgb(255, 255, 255);">ex ea commodo consequat. D</span><span style="font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; line-height: 20px; text-align: justify;"><span style="background-color:#ffa500;">uis aute irure dolor in reprehenderit in voluptate </span></span><span style="font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; line-height: 20px; text-align: justify; background-color: rgb(255, 255, 255);">velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</span></p>\r\n', 'jpg', '', 'jpg', 'merchant-Added-watch_', '', '', '', 0, 0, 0, 86782.5, 0, 0, 0, 0, '1', 0, '1970-01-01', '1970-01-01', 235, 0, 0, 0, '1970-01-01', '1970-01-01', '2016-08-26', '2016-08-31', '1970-01-01', 0, '1970-01-01', 0, 0, 0, '', '', 0, 0, '1', 0, '', '', 0, 0, 0, 1, 0, 10, '2016-09-24', '2016-09-24 04:55:07'),
(38, '28,', 'merchant Added watch', 'watcher214', 1, 1, 2, '<p>\r\n	<span style="color:#800000;"><span style="font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; line-height: 20px; text-align: justify; background-color: rgb(255, 255, 255);">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip</span></span></p>\r\n<p>\r\n	<span style="font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; line-height: 20px; text-align: justify; background-color: rgb(255, 255, 255);">ex ea commodo consequat. D</span><span style="font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; line-height: 20px; text-align: justify;"><span style="background-color:#ffa500;">uis aute irure dolor in reprehenderit in voluptate </span></span><span style="font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; line-height: 20px; text-align: justify; background-color: rgb(255, 255, 255);">velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</span></p>\r\n', 'jpg', '', 'jpg', 'merchant-Added-watch_', '', '', '', 0, 0, 0, 86782.5, 0, 0, 0, 0, '1', 0, '1970-01-01', '1970-01-01', 235, 0, 0, 0, '1970-01-01', '1970-01-01', '2016-08-26', '2016-08-31', '1970-01-01', 0, '1970-01-01', 0, 0, 0, '', '', 0, 0, '1', 0, '', '', 0, 0, 0, 1, 0, 10, '2016-09-24', '2016-09-24 04:55:08'),
(39, '25,', 'ddddd', '4565gfthy', 1, 1, 2, '<p>\r\n	<span style="font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; line-height: 20px; text-align: justify; background-color: rgb(255, 255, 255);">ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dict<strong>a sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam e</strong>st, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis aute</span></p>\r\n', 'jpg', '', 'jpg', 'ddddd_14', '', '', '', 0, 0, 0, 45646, 456457, 0, 0, 0, '1', 0, '1970-01-01', '1970-01-01', 345, 0, 1, 0, '1970-01-01', '1970-01-01', '1970-01-01', '1970-01-01', '1970-01-01', 0, '1970-01-01', 0, 1, 1, '', '', 0, 0, '1', 1, '', '', 1, 1, 1, 1, 0, 10, '2016-09-24', '2016-09-24 04:55:12'),
(41, '23,', 'dress', '726hdy6', 1, 0, 0, '<p>\r\n	gifts that treasures</p>\r\n', '', '', '', 'dress', '', '', '', 0, 0, 0, 5465, 4356, 0, 0, 0, '1', 0, '0000-00-00', '0000-00-00', 0, 0, 0, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, '0000-00-00', 12, 0, 0, '', '', 0, 0, '1', 0, '', '', 0, 0, 1, 1, 11, 11, '2016-10-04', '2016-10-03 23:00:00'),
(42, '23,', 'Test casio', '1', 1, 3, 2, '<p>\r\n	<strong>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</strong></p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	<strong>dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</strong></p>\r\n<p>\r\n	&nbsp;</p>\r\n', 'jpg', '', 'jpg', 'test-casio', 'Test Meta Title', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. \r\n\r\n', 'Test Meta Keywords', 0, 0, 0, 2500, 2000, 0, 1, 0, '0', 0, '0000-00-00', '0000-00-00', 8, 10, 1, 0, '2016-10-13', '2016-10-17', '2016-10-13', '2016-10-16', '0000-00-00', 0, '0000-00-00', 0, 0, 1, '', '', 35, 4, '1', 0, '', '9,13', 0, 0, 1, 1, 0, 10, '2016-10-13', '2016-10-12 23:00:00'),
(44, '23,', ' Style Souk Women''s Regular Fit Jacket ', 'Skj09-P', 4, 0, 0, '<p>\r\n	Hit the streets in style wearing this blue denim jacket for women. Made of finest quality fabric, this piece is the perfect choice to wear for casual outings. Moreover, this jacket will surely fetch you oodles of compliments from your companions. Team it up with jeans and smart top and look fabulous.</p>\r\n', 'jpg', '', 'jpg', 'style-souk-women-s-regular-fit-jacket', '', '', '', 0, 0, 0, 699, 699, 0, 0, 0, '1', 0, '1970-01-01', '1970-01-01', 3, 10, 0, 0, '2016-10-18', '2016-10-29', '2016-10-16', '2016-10-29', '0000-00-00', 0, '0000-00-00', 14, 0, 0, '', '', 200, 4, '1', 0, '', '', 0, 0, 1, 1, 11, 10, '2016-10-15', '2016-10-18 18:30:00'),
(45, '28,', 'merchant Added watch', 'watcher214', 1, 1, 2, '<p>\r\n	<span style="color:#800000;"><span style="font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; line-height: 20px; text-align: justify; background-color: rgb(255, 255, 255);">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip</span></span></p>\r\n<p>\r\n	<span style="font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; line-height: 20px; text-align: justify; background-color: rgb(255, 255, 255);">ex ea commodo consequat. D</span><span style="font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; line-height: 20px; text-align: justify;"><span style="background-color:#ffa500;">uis aute irure dolor in reprehenderit in voluptate </span></span><span style="font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; line-height: 20px; text-align: justify; background-color: rgb(255, 255, 255);">velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</span></p>\r\n', 'jpg', '', 'jpg', 'merchant-Added-watch_', '', '', '', 0, 0, 0, 86782.5, 0, 0, 0, 0, '1', 0, '1970-01-01', '1970-01-01', 235, 0, 0, 0, '1970-01-01', '1970-01-01', '2016-08-26', '2016-08-31', '1970-01-01', 0, '1970-01-01', 0, 0, 0, '', '', 0, 0, '1', 0, '', '', 0, 0, 0, 1, 0, 10, '2016-10-20', '2016-10-20 06:24:14'),
(46, '23,', 'test', 'test123', 0, 1, 2, '<p>\r\n	test</p>\r\n', 'jpg', '', 'jpg', 'test', '', '', '', 0, 0, 0, 140, 100, 5, 0, 0, '1', 0, '1970-01-01', '1970-01-01', 50, 50, 0, 0, '2016-10-21', '2016-11-10', '2016-10-21', '2016-11-30', '0000-00-00', 0, '0000-00-00', 0, 0, 1, '', '', 50, 4, '1', 0, '', '', 0, 0, 0, 1, 0, 10, '2016-10-21', '2016-10-21 09:32:41'),
(50, '23,', 'test2', 'test12', 0, 1, 2, '<p>\r\n	test123</p>\r\n', 'jpg', '', 'jpg', 'test2', '', '', '', 0, 0, 0, 400, 0, 0, 1, 0, '1', 0, '1970-01-01', '1970-01-01', 20, 20, 0, 0, '2016-10-21', '2016-10-31', '2016-10-21', '2016-11-25', '0000-00-00', 0, '0000-00-00', 0, 0, 0, '', '', 0, 0, '1', 0, '', '', 0, 0, 0, 1, 0, 0, '2016-10-21', '2016-10-20 18:30:00'),
(51, 'Watches&gt;Gifts,', 'tesafhdgf ', 'hgfjdgfj783468787', 0, 1, 2, '<p>\r\n	&nbsp;xdhfvgj asdhfkhsd vkkdfhvbd</p>\r\n', 'jpg', '', 'jpg', 'tesafhdgf', '', '', '', 0, 0, 0, 400, 300, 0, 0, 0, '1', 0, '1970-01-01', '1970-01-01', 100, 100, 0, 0, '2016-10-21', '2016-10-25', '2016-10-21', '2016-10-30', '0000-00-00', 0, '0000-00-00', 0, 0, 0, '', '', 0, 0, '1', 0, '', '', 0, 0, 0, 1, 0, 0, '2016-10-21', '2016-10-20 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE IF NOT EXISTS `product_category` (
`id` int(11) NOT NULL,
  `parent` varchar(225) NOT NULL,
  `category_name` varchar(225) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(225) NOT NULL,
  `sort_order` int(100) NOT NULL,
  `meta_title` varchar(225) NOT NULL,
  `meta_description` text NOT NULL,
  `meta_keywords` varchar(225) NOT NULL,
  `header_visibility` int(11) NOT NULL,
  `search_tag` varchar(225) NOT NULL,
  `status` int(11) NOT NULL,
  `canonical_name` varchar(225) NOT NULL,
  `CB` int(11) NOT NULL,
  `UB` int(11) NOT NULL,
  `DOC` date NOT NULL,
  `DOU` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`id`, `parent`, `category_name`, `description`, `image`, `sort_order`, `meta_title`, `meta_description`, `meta_keywords`, `header_visibility`, `search_tag`, `status`, `canonical_name`, `CB`, `UB`, `DOC`, `DOU`) VALUES
(23, '23', 'Gifts', '<p>\r\n	Give the wedding gift they&#39;ll always remember by making it personalized. Our collection has elegant, whimsical, and joyful gifts for engagements, weddings, showers, and bridal parties. Personalized coasters, picture frames, wall art, cake cutters, champagne flutes, and tree ornaments all celebrate and commemorate the happy day and couple.</p>\r\n', 'jpg', 0, '', '', '', 1, '', 1, 'gifts', 4, 0, '2016-07-26', '2016-07-26 05:30:06'),
(25, '23', 'Gifts for him', '<p>\r\n	Standard gifts for your best ones . We are providing rare collections.</p>\r\n', 'jpg', 0, '', '', '', 1, '', 1, 'gifts-for-him', 4, 4, '2016-07-26', '2016-07-25 18:30:00'),
(27, '25', 'shoes', '<p>\r\n	sfg</p>\r\n', 'jpg', 0, '', '', '', 1, '', 1, 'edgg', 4, 10, '2016-07-26', '2016-09-15 08:36:19'),
(28, '28', 'Watches', '<p>\r\n	All branded watches</p>\r\n', 'jpg', 0, '', '', '', 1, '', 1, 'watches', 10, 10, '2016-08-11', '2016-08-10 18:30:00'),
(29, '29', 'Admin_Added_Mobiles', '<p>\r\n	Admin_Added</p>\r\n', 'jpg', 0, '', '', '', 1, '', 1, 'adminaddedmobiles', 10, 0, '2016-08-26', '2016-08-26 06:19:41'),
(30, '28', 'Gifts', '<p>\r\n	For someone very special</p>\r\n', 'jpg', 0, '', '', '', 1, 'gifts,', 1, 'gifts', 11, 0, '2016-10-04', '2016-10-04 05:16:58'),
(31, '30', 'watch', '<h1 class="a-size-large a-spacing-none" id="title">\r\n	<span style="font-size:14px;"><span class="a-size-large" id="productTitle">Titan Raga Analog Mother of Pearl Dial Women&#39;s Watch</span></span></h1>\r\n', 'jpg', 3, 'titan womens watch', '', '', 1, 'titan watches,', 1, 'watch', 11, 0, '2016-10-15', '2016-10-15 09:49:03');

-- --------------------------------------------------------

--
-- Table structure for table `product_category_path`
--

CREATE TABLE IF NOT EXISTS `product_category_path` (
`id` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `product_category_path`
--

INSERT INTO `product_category_path` (`id`, `category`, `parent`, `level`) VALUES
(1, 5, 5, 0),
(2, 6, 6, 0),
(3, 7, 7, 0),
(4, 8, 7, 1),
(5, 9, 7, 1),
(6, 10, 10, 0),
(7, 11, 8, 2),
(8, 9, 9, 0),
(9, 10, 9, 2),
(10, 11, 9, 2),
(11, 12, 11, 3),
(12, 13, 9, 2),
(13, 14, 9, 2),
(14, 15, 11, 3),
(15, 16, 9, 2),
(16, 17, 9, 2),
(17, 18, 10, 1),
(18, 19, 10, 1),
(19, 20, 11, 3),
(20, 21, 9, 2),
(21, 22, 22, 0),
(22, 23, 23, 0),
(23, 24, 23, 1),
(24, 27, 23, 1),
(25, 28, 28, 0),
(26, 29, 29, 0),
(27, 30, 28, 1),
(28, 31, 30, 2);

-- --------------------------------------------------------

--
-- Table structure for table `product_viewed`
--

CREATE TABLE IF NOT EXISTS `product_viewed` (
`id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `session_id` varchar(250) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `feild` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=54 ;

--
-- Dumping data for table `product_viewed`
--

INSERT INTO `product_viewed` (`id`, `product_id`, `session_id`, `user_id`, `date`, `feild`) VALUES
(1, 16, '1472192573.0699', 0, '2016-08-26', 0),
(2, 9, '1472192838.2731', 0, '2016-08-26', 0),
(3, 17, '1472192838.2731', 0, '2016-08-26', 0),
(4, 17, '1472212430.6511', 0, '2016-08-26', 0),
(5, 17, '1472469242.0983', 0, '2016-08-29', 0),
(6, 16, '1472895008.2239', 0, '2016-09-03', 0),
(7, 17, '1472895008.2239', 0, '2016-09-03', 0),
(8, 16, '1473327401.3703', 0, '2016-09-08', 0),
(9, 17, '1473412366.6861', 0, '2016-09-09', 0),
(10, 16, '1474439530.9026', 0, '2016-09-21', 0),
(11, 14, '1474524610.5373', 0, '2016-09-22', 0),
(12, 14, '1474711398.1206', 0, '2016-09-24', 0),
(13, 14, '1474715676.4242', 0, '2016-09-24', 0),
(14, 17, '1474869410.6346', 0, '2016-09-26', 0),
(15, 14, '1474869410.6346', 0, '2016-09-26', 0),
(16, 9, '1474869410.6346', 0, '2016-09-26', 0),
(17, 16, '1474869410.6346', 0, '2016-09-26', 0),
(18, 7, '1474869410.6346', 0, '2016-09-26', 0),
(19, 10, '1474869410.6346', 0, '2016-09-26', 0),
(20, 14, '1474882072.1572', 0, '2016-09-26', 0),
(21, 14, '1474882454.5833', 0, '2016-09-26', 0),
(22, 10, '1474882454.5833', 0, '2016-09-26', 0),
(23, 13, '1474885266.9555', 0, '2016-09-26', 0),
(24, 14, '1474885266.9555', 0, '2016-09-26', 0),
(25, 13, '1474973552.0809', 0, '2016-09-27', 0),
(26, 16, '1474882072.1572', 0, '2016-09-27', 0),
(27, 14, '1475487879.01', 0, '2016-10-03', 0),
(28, 9, '1476176992.82', 0, '2016-10-11', 0),
(29, 14, '1476176992.82', 0, '2016-10-11', 0),
(30, 14, '1476247154.62', 0, '2016-10-12', 0),
(31, 9, '1476247536.05', 0, '2016-10-12', 0),
(32, 9, '1476266895.07', 0, '2016-10-12', 0),
(33, 14, '1476266895.07', 0, '2016-10-12', 0),
(34, 14, '1476271053.86', 0, '2016-10-12', 0),
(35, 9, '1476271053.86', 0, '2016-10-12', 0),
(36, 42, '1476353339.22', 0, '2016-10-13', 0),
(37, 42, '1476358726.82', 0, '2016-10-13', 0),
(38, 42, '1476443268.09', 0, '2016-10-14', 0),
(39, 43, '1476525637.25', 0, '2016-10-15', 0),
(40, 44, '1476525637.25', 0, '2016-10-15', 0),
(41, 42, '1476763455.29', 0, '2016-10-18', 0),
(42, 9, '1476763455.29', 0, '2016-10-18', 0),
(43, 9, '1476766122.3878', 0, '2016-10-18', 0),
(44, 44, '1476766122.3878', 0, '2016-10-18', 0),
(45, 9, '1476768299.8392', 0, '2016-10-18', 0),
(46, 9, '1476768408.4154', 0, '2016-10-18', 0),
(47, 44, '1476768408.4154', 0, '2016-10-18', 0),
(48, 9, '1476768716.23', 0, '2016-10-18', 0),
(49, 44, '1476768716.23', 0, '2016-10-18', 0),
(50, 42, '1476877663.5182', 0, '2016-10-19', 0),
(51, 44, '1476951121.9878', 0, '2016-10-20', 0),
(52, 9, '1476951121.9878', 0, '2016-10-20', 0),
(53, 46, '1477031384.0103', 0, '2016-10-21', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sales_report`
--

CREATE TABLE IF NOT EXISTS `sales_report` (
`id` int(11) NOT NULL,
  `merchant_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_amount` double NOT NULL,
  `DOC` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `sales_report`
--

INSERT INTO `sales_report` (`id`, `merchant_id`, `product_id`, `order_id`, `quantity`, `total_amount`, `DOC`) VALUES
(14, 1, 17, 75, 1, 86782.5, '2016-09-06'),
(15, 1, 14, 75, 1, 45646, '2016-09-06'),
(16, 1, 17, 75, 1, 86782.5, '2016-09-07'),
(17, 1, 17, 77, 2, 86782.5, '2016-09-16');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_charges`
--

CREATE TABLE IF NOT EXISTS `shipping_charges` (
`id` int(11) NOT NULL,
  `country` int(11) NOT NULL,
  `shipping_rate` double NOT NULL,
  `doc` date NOT NULL,
  `dou` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `cb` int(11) NOT NULL,
  `ub` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `sort_order` int(11) NOT NULL,
  `zone` int(11) NOT NULL,
  `weight` float(10,2) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `shipping_charges`
--

INSERT INTO `shipping_charges` (`id`, `country`, `shipping_rate`, `doc`, `dou`, `cb`, `ub`, `status`, `sort_order`, `zone`, `weight`) VALUES
(1, 0, 56, '0000-00-00', '2016-10-04 05:55:52', 0, 0, 1, 0, 1, 20.00),
(2, 0, 50, '0000-00-00', '2016-10-15 10:36:07', 0, 0, 1, 6, 1, 45.00);

-- --------------------------------------------------------

--
-- Table structure for table `social`
--

CREATE TABLE IF NOT EXISTS `social` (
`id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `link` varchar(200) NOT NULL,
  `doc` date NOT NULL,
  `dou` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `cb` int(11) NOT NULL,
  `ub` int(11) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `social`
--

INSERT INTO `social` (`id`, `name`, `link`, `doc`, `dou`, `cb`, `ub`) VALUES
(9, 'facebook', 'https://www.facebook.com/', '2016-10-04', '2016-10-04 06:41:39', 0, 0),
(10, 'twitter', 'https://ads.twitter.com/login', '2016-10-04', '2016-10-04 06:43:57', 0, 0),
(11, 'google_plus', 'https://plus.google.com/', '2016-10-19', '2016-10-19 07:04:05', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE IF NOT EXISTS `states` (
`Id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `state_name` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`Id`, `country_id`, `state_name`) VALUES
(1, 99, 'Andaman & Nicobar Islands'),
(2, 99, 'Andhra Pradesh'),
(3, 99, 'Arunachal Pradesh'),
(4, 99, 'Assam'),
(5, 99, 'Bihar'),
(6, 99, 'Chandigarh'),
(7, 99, 'Chhatisgarh'),
(8, 99, 'Dadra & Nagar Haveli'),
(9, 99, 'Daman & Diu'),
(10, 99, 'Delhi'),
(11, 99, 'Goa'),
(12, 99, 'Gujarat'),
(13, 99, 'Haryana'),
(14, 99, 'Himachal Pradesh'),
(15, 99, 'Jammu & Kashmir'),
(16, 99, 'Jharkhand'),
(18, 99, 'Kerala'),
(19, 99, 'Lakshadweep'),
(20, 99, 'Madhya Pradesh'),
(21, 99, 'Maharashtra'),
(22, 99, 'Manipur'),
(23, 99, 'Meghalaya'),
(24, 99, 'Mizoram'),
(25, 99, 'Nagaland'),
(26, 99, 'Orissa'),
(27, 99, 'Pondicherry'),
(28, 99, 'Punjab'),
(29, 99, 'Rajasthan'),
(30, 99, 'Sikkim'),
(31, 99, 'Tamil Nadu'),
(32, 99, 'Tripura'),
(33, 99, 'Uttaranchal'),
(34, 99, 'Uttar Pradesh'),
(35, 99, 'West Bengal'),
(37, 99, 'karnataka');

-- --------------------------------------------------------

--
-- Table structure for table `static_page`
--

CREATE TABLE IF NOT EXISTS `static_page` (
`id` int(11) NOT NULL,
  `category_name` varchar(200) NOT NULL,
  `parent` int(11) NOT NULL,
  `side_menu` int(11) NOT NULL,
  `header_visibility` int(11) NOT NULL,
  `sort_order` int(11) NOT NULL,
  `has_page` int(11) NOT NULL,
  `canonical_name` varchar(200) NOT NULL,
  `link` varchar(500) NOT NULL,
  `title` varchar(200) NOT NULL,
  `heading` varchar(300) NOT NULL,
  `small_content` text NOT NULL,
  `big_content` text NOT NULL,
  `small_image` varchar(200) NOT NULL,
  `banner` varchar(200) NOT NULL,
  `big_image` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  `field_1` int(11) NOT NULL,
  `field_2` varchar(300) NOT NULL,
  `field_3` varchar(300) NOT NULL,
  `cb` int(11) NOT NULL,
  `ub` int(11) NOT NULL,
  `doc` date NOT NULL,
  `dou` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `static_page`
--

INSERT INTO `static_page` (`id`, `category_name`, `parent`, `side_menu`, `header_visibility`, `sort_order`, `has_page`, `canonical_name`, `link`, `title`, `heading`, `small_content`, `big_content`, `small_image`, `banner`, `big_image`, `status`, `field_1`, `field_2`, `field_3`, `cb`, `ub`, `doc`, `dou`) VALUES
(1, 'About Us', 0, 0, 0, 0, 1, 'about-us', '', 'LOREM IPSUM IS SIMPLY', '', '', '<p style="box-sizing: inherit; margin: 0px 0px 10px; font-size: 16px; font-family: Roboto, sans-serif; color: rgb(91, 91, 91); text-align: justify; line-height: 30px; background-color: rgb(255, 255, 255);">\r\n	Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchang.</p>\r\n<p style="box-sizing: inherit; margin: 0px 0px 10px; font-size: 16px; font-family: Roboto, sans-serif; color: rgb(91, 91, 91); text-align: justify; line-height: 30px; background-color: rgb(255, 255, 255);">\r\n	Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</p>\r\n<p style="box-sizing: inherit; margin: 0px 0px 10px; font-size: 16px; font-family: Roboto, sans-serif; color: rgb(91, 91, 91); text-align: justify; line-height: 30px; background-color: rgb(255, 255, 255);">\r\n	The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>\r\n', '', 'jpg', 'jpg', 1, 0, '', '', 0, 0, '2016-09-27', '2016-09-27 03:30:27'),
(2, 'Join Our Shop', 0, 0, 1, 0, 1, 'join-our-shop', '', 'Join Our Shop', '', '', '<p>\r\n	<span style="font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify; background-color: rgb(255, 255, 255);">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sodales consectetur ultricies. Curabitur mollis ac sapien non elementum. Vestibulum tincidunt, orci quis dapibus dignissim, justo purus vehicula tortor, sed vestibulum elit tortor at metus. Pellentesque pellentesque placerat tempus. Praesent ante magna, iaculis vitae mollis at, interdum eu odio. Nunc mattis, mauris scelerisque pharetra efficitur, felis mauris tincidunt leo, porta pharetra purus risus ut eros. Sed tincidunt eu ipsum nec sodales. Aliquam sit amet sapien rutrum, tincidunt arcu vel, facilisis tortor. Nullam tellus neque, vehicula quis nisl vel, dignissim consectetur mauris. Quisque tincidunt aliquam metus nec mollis. Quisque congue augue tellus, ut interdum tortor sollicitudin nec.</span></p>\r\n', '', '', '', 0, 0, '', '', 0, 0, '2016-10-03', '2016-10-03 05:30:17'),
(3, 'Merchant', 0, 0, 0, 0, 1, 'merchant', '', 'Merchant', '', '', '<p style="margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);">\r\n	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam finibus tellus ac neque finibus, id consectetur erat volutpat. Nam rutrum dolor quis massa venenatis, non laoreet ex finibus. Aliquam feugiat imperdiet luctus. Praesent et dignissim est. Donec condimentum sem ut commodo maximus. Nullam a arcu dignissim, ultrices eros in, consectetur mi. Nullam suscipit lacus ac massa gravida, at elementum odio dictum. Morbi non ante erat. Aliquam nec nunc at lorem interdum maximus. Pellentesque fringilla sodales tristique. Pellentesque convallis auctor dictum. Mauris at ornare metus.</p>\r\n<p style="margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);">\r\n	Integer dui felis, dictum vitae malesuada eu, eleifend at tellus. Aliquam dui purus, imperdiet non placerat id, molestie sed justo. Aenean mattis facilisis feugiat. Sed laoreet consectetur lectus malesuada rutrum. In ornare maximus purus, vitae rhoncus ante rhoncus ac. Donec pretium id ligula eu venenatis. Donec eleifend est sed auctor condimentum. Integer vehicula ex nec lacinia sodales. Sed tristique vel lectus vitae finibus. Integer sit amet hendrerit diam. Mauris feugiat erat in commodo interdum. Sed non volutpat lorem, gravida scelerisque ligula. Aliquam iaculis quis lacus sed vulputate. Integer venenatis orci nec tortor feugiat sollicitudin. Phasellus laoreet malesuada eros et rutrum.</p>\r\n', '', '', '', 0, 0, '', '', 0, 0, '2016-10-03', '2016-10-03 06:42:40'),
(4, 'Local Vendors', 0, 0, 0, 0, 1, 'local-vendors', '', 'Local Vendors', '', '', '<p style="margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);">\r\n	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam finibus tellus ac neque finibus, id consectetur erat volutpat. Nam rutrum dolor quis massa venenatis, non laoreet ex finibus. Aliquam feugiat imperdiet luctus. Praesent et dignissim est. Donec condimentum sem ut commodo maximus. Nullam a arcu dignissim, ultrices eros in, consectetur mi. Nullam suscipit lacus ac massa gravida, at elementum odio dictum. Morbi non ante erat. Aliquam nec nunc at lorem interdum maximus. Pellentesque fringilla sodales tristique. Pellentesque convallis auctor dictum. Mauris at ornare metus.</p>\r\n<p style="margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);">\r\n	Integer dui felis, dictum vitae malesuada eu, eleifend at tellus. Aliquam dui purus, imperdiet non placerat id, molestie sed justo. Aenean mattis facilisis feugiat. Sed laoreet consectetur lectus malesuada rutrum. In ornare maximus purus, vitae rhoncus ante rhoncus ac. Donec pretium id ligula eu venenatis. Donec eleifend est sed auctor condimentum. Integer vehicula ex nec lacinia sodales. Sed tristique vel lectus vitae finibus. Integer sit amet hendrerit diam. Mauris feugiat erat in commodo interdum. Sed non volutpat lorem, gravida scelerisque ligula. Aliquam iaculis quis lacus sed vulputate. Integer venenatis orci nec tortor feugiat sollicitudin. Phasellus laoreet malesuada eros et rutrum.</p>\r\n', '', '', '', 0, 0, '', '', 0, 0, '2016-10-03', '2016-10-03 06:45:03'),
(5, 'Shipping Return', 0, 0, 0, 0, 1, 'shipping-return', '', 'Shipping Return', '', '', '<p style="margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);">\r\n	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam finibus tellus ac neque finibus, id consectetur erat volutpat. Nam rutrum dolor quis massa venenatis, non laoreet ex finibus. Aliquam feugiat imperdiet luctus. Praesent et dignissim est. Donec condimentum sem ut commodo maximus. Nullam a arcu dignissim, ultrices eros in, consectetur mi. Nullam suscipit lacus ac massa gravida, at elementum odio dictum. Morbi non ante erat. Aliquam nec nunc at lorem interdum maximus. Pellentesque fringilla sodales tristique. Pellentesque convallis auctor dictum. Mauris at ornare metus.</p>\r\n<p style="margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);">\r\n	Integer dui felis, dictum vitae malesuada eu, eleifend at tellus. Aliquam dui purus, imperdiet non placerat id, molestie sed justo. Aenean mattis facilisis feugiat. Sed laoreet consectetur lectus malesuada rutrum. In ornare maximus purus, vitae rhoncus ante rhoncus ac. Donec pretium id ligula eu venenatis. Donec eleifend est sed auctor condimentum. Integer vehicula ex nec lacinia sodales. Sed tristique vel lectus vitae finibus. Integer sit amet hendrerit diam. Mauris feugiat erat in commodo interdum. Sed non volutpat lorem, gravida scelerisque ligula. Aliquam iaculis quis lacus sed vulputate. Integer venenatis orci nec tortor feugiat sollicitudin. Phasellus laoreet malesuada eros et rutrum.</p>\r\n', '', '', '', 0, 0, '', '', 0, 0, '2016-10-03', '2016-10-03 06:47:49'),
(6, 'Affiliates', 0, 0, 0, 0, 1, 'affiliates', '', 'Affiliates', '', '', '<p style="margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);">\r\n	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam finibus tellus ac neque finibus, id consectetur erat volutpat. Nam rutrum dolor quis massa venenatis, non laoreet ex finibus. Aliquam feugiat imperdiet luctus. Praesent et dignissim est. Donec condimentum sem ut commodo maximus. Nullam a arcu dignissim, ultrices eros in, consectetur mi. Nullam suscipit lacus ac massa gravida, at elementum odio dictum. Morbi non ante erat. Aliquam nec nunc at lorem interdum maximus. Pellentesque fringilla sodales tristique. Pellentesque convallis auctor dictum. Mauris at ornare metus.</p>\r\n<p style="margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);">\r\n	Integer dui felis, dictum vitae malesuada eu, eleifend at tellus. Aliquam dui purus, imperdiet non placerat id, molestie sed justo. Aenean mattis facilisis feugiat. Sed laoreet consectetur lectus malesuada rutrum. In ornare maximus purus, vitae rhoncus ante rhoncus ac. Donec pretium id ligula eu venenatis. Donec eleifend est sed auctor condimentum. Integer vehicula ex nec lacinia sodales. Sed tristique vel lectus vitae finibus. Integer sit amet hendrerit diam. Mauris feugiat erat in commodo interdum. Sed non volutpat lorem, gravida scelerisque ligula. Aliquam iaculis quis lacus sed vulputate. Integer venenatis orci nec tortor feugiat sollicitudin. Phasellus laoreet malesuada eros et rutrum.</p>\r\n', '', '', '', 0, 0, '', '', 0, 0, '2016-10-03', '2016-10-03 06:49:37'),
(7, 'Specials', 0, 0, 0, 0, 1, 'specials', '', 'Specials', '', '', '<p style="margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);">\r\n	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam finibus tellus ac neque finibus, id consectetur erat volutpat. Nam rutrum dolor quis massa venenatis, non laoreet ex finibus. Aliquam feugiat imperdiet luctus. Praesent et dignissim est. Donec condimentum sem ut commodo maximus. Nullam a arcu dignissim, ultrices eros in, consectetur mi. Nullam suscipit lacus ac massa gravida, at elementum odio dictum. Morbi non ante erat. Aliquam nec nunc at lorem interdum maximus. Pellentesque fringilla sodales tristique. Pellentesque convallis auctor dictum. Mauris at ornare metus.</p>\r\n<p style="margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);">\r\n	Integer dui felis, dictum vitae malesuada eu, eleifend at tellus. Aliquam dui purus, imperdiet non placerat id, molestie sed justo. Aenean mattis facilisis feugiat. Sed laoreet consectetur lectus malesuada rutrum. In ornare maximus purus, vitae rhoncus ante rhoncus ac. Donec pretium id ligula eu venenatis. Donec eleifend est sed auctor condimentum. Integer vehicula ex nec lacinia sodales. Sed tristique vel lectus vitae finibus. Integer sit amet hendrerit diam. Mauris feugiat erat in commodo interdum. Sed non volutpat lorem, gravida scelerisque ligula. Aliquam iaculis quis lacus sed vulputate. Integer venenatis orci nec tortor feugiat sollicitudin. Phasellus laoreet malesuada eros et rutrum.</p>\r\n', '', '', '', 0, 0, '', '', 0, 0, '2016-10-03', '2016-10-03 06:52:21'),
(8, 'Newgenshop blog', 0, 0, 1, 0, 1, 'newgen-blog', '', 'Newgen blog', '', '<p>\r\n	2</p>\r\n', '<p>\r\n	6</p>\r\n', '', '', '', 6, 0, '', '', 0, 0, '2016-10-04', '2016-10-04 04:50:19'),
(9, 'newgenshop team', 0, 0, 1, 0, 1, 'newgenshop-team', '', 'newgenshop team', '', '', '', '', 'jpg', 'jpg', 0, 0, '', '', 0, 0, '2016-10-13', '2016-10-13 07:09:49'),
(10, 'Privacy', 0, 0, 1, 0, 1, 'privacy-policy', '', 'Privacy Policy', '', '<p>\r\n	Privacy Policy</p>\r\n', '<p>\r\n	<strong style="margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify; background-color: rgb(255, 255, 255);">Lorem Ipsum</strong><span style="font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify; background-color: rgb(255, 255, 255);">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>\r\n', '', '', '', 0, 0, '', '', 0, 0, '2016-10-19', '2016-10-19 11:52:32'),
(11, 'Terms', 0, 0, 0, 0, 1, 'terms', '', 'Terms And Conditions', '', '<p>\r\n	Terms and conditions</p>\r\n', '<p>\r\n	<strong style="margin: 0px; padding: 0px; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify; background-color: rgb(255, 255, 255);">Lorem Ipsum</strong><span style="font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify; background-color: rgb(255, 255, 255);">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>\r\n', '', '', '', 0, 0, '', '', 0, 0, '2016-10-19', '2016-10-19 11:53:11'),
(12, 'Site Map', 0, 0, 0, 0, 1, 'site-map', '', 'Site Map', '', '<p>\r\n	site map</p>\r\n', '<p>\r\n	<span style="font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify; background-color: rgb(255, 255, 255);"><b>lorem ipsium&nbsp;</b>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>\r\n', '', '', '', 0, 0, '', '', 0, 0, '2016-10-19', '2016-10-19 11:53:51');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `user_type` int(11) NOT NULL COMMENT '1= buyer , 2= merchant, 3 = BuyerToMerchant , 4 = MerchantToBuyer',
  `email` varchar(320) NOT NULL,
  `phone_number` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `activation_link` varchar(250) NOT NULL COMMENT 'for email verification',
  `verification_code` int(10) NOT NULL COMMENT 'for mobile verification',
  `user_status` int(11) NOT NULL COMMENT '1 = activation pending, 2 = payment pending, 3 = enabled, 4 = disabled',
  `bad_attempts` int(11) NOT NULL,
  `last_login` datetime NOT NULL,
  `DOC` date NOT NULL,
  `DOU` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `CB` int(11) NOT NULL,
  `UB` int(11) NOT NULL,
  `field1` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_type`, `email`, `phone_number`, `password`, `activation_link`, `verification_code`, `user_status`, `bad_attempts`, `last_login`, `DOC`, `DOU`, `CB`, `UB`, `field1`) VALUES
(1, 2, 'aathira@intersmart.in', '2147483647', 'f5349ef1cdfdb6ddced98d1a7377f269', '382811470808354', 0, 3, 0, '2016-10-21 15:03:48', '2016-08-10', '2016-10-19 18:30:00', 0, 0, 0),
(4, 1, 'avptest1992@gmail.com', '123456', 'e10adc3949ba59abbe56e057f20f883e', '999811470994969', 0, 3, 0, '2016-10-21 15:07:04', '2016-08-12', '2016-10-12 07:04:14', 0, 0, 0),
(7, 1, 'aatthira@intersmart.inn', '123456789', 'e10adc3949ba59abbe56e057f20f883e', '302251471409645', 0, 1, 0, '0000-00-00 00:00:00', '2016-08-17', '2016-10-12 07:04:18', 0, 0, 0),
(8, 1, 'aathira@intersmart.inn', '13214', 'e10adc3949ba59abbe56e057f20f883e', '268281471409793', 0, 3, 0, '2016-09-08 13:20:49', '2016-08-17', '2016-10-12 07:04:22', 0, 0, 0),
(9, 2, 'aathira@intersmart.in', '123456777', 'e10adc3949ba59abbe56e057f20f883e', '436211471410340', 0, 2, 0, '2016-09-08 13:21:09', '2016-08-17', '2016-10-12 07:04:25', 0, 0, 0),
(10, 1, 'ashiq@intersmart.in', '2147483647', '6e45f53a6c9d74e44c4ebfb278a3820e', '769871475214419', 0, 3, 0, '2016-09-30 11:17:41', '2016-09-30', '2016-10-12 07:05:51', 0, 0, 0),
(11, 1, 'taskin655@gmail.com', '2147483647', 'dPgSyaOp3', '601681475494542', 0, 3, 0, '2016-10-03 17:07:27', '2016-10-03', '2016-10-12 07:06:11', 0, 0, 0),
(12, 1, 'shamanths92@gmail.com', '2147483647', 'e10adc3949ba59abbe56e057f20f883e', '', 0, 3, 0, '0000-00-00 00:00:00', '2016-10-04', '2016-10-12 07:04:33', 11, 11, 0),
(13, 1, 'gokul@intersmart.in', '2147483647', 'NzCDRjJ57', '370881476247534', 0, 3, 0, '2016-10-12 15:50:14', '2016-10-12', '2016-10-12 07:04:37', 0, 0, 0),
(14, 1, 'lujo@intersmart.in', '1212121212', 'e10adc3949ba59abbe56e057f20f883e', '118851476270781', 0, 3, 0, '2016-10-17 17:15:33', '2016-10-12', '2016-10-12 11:13:01', 0, 0, 0),
(15, 2, 'savan@intersmart.in', '2147483647', 'e10adc3949ba59abbe56e057f20f883e', '592001476333963', 0, 2, 0, '2016-10-17 16:48:11', '2016-10-13', '2016-10-13 04:46:03', 0, 0, 0),
(16, 1, 'shamanths92@outlook.com', '991630009', '123456', '', 0, 3, 0, '0000-00-00 00:00:00', '2016-10-13', '2016-10-13 07:26:19', 11, 11, 0),
(17, 2, 'tina@intersmart.in', '756343534', 'e10adc3949ba59abbe56e057f20f883e', '346401476347479', 0, 2, 0, '2016-10-13 14:02:03', '2016-10-13', '2016-10-12 23:00:00', 0, 0, 0),
(18, 1, 'tamanna_gudiya@yahoo.com', '2147483647', 'e10adc3949ba59abbe56e057f20f883e', '673721476423149', 0, 3, 0, '2016-10-14 16:41:07', '2016-10-14', '2016-10-13 23:00:00', 0, 0, 0),
(19, 2, 'parveenyarnal@yahoo.com', '2147483647', '123456', '', 0, 3, 0, '0000-00-00 00:00:00', '2016-10-15', '2016-10-15 09:40:35', 11, 11, 0),
(20, 1, 'binishkumarp@gmail.com', '8089885802', 'e10adc3949ba59abbe56e057f20f883e', '561961476765246', 0, 3, 0, '2016-10-20 16:58:16', '2016-10-18', '2016-10-17 18:30:00', 0, 0, 0),
(21, 1, 'ronyssss@gmail.com', '1234567890', 'e10adc3949ba59abbe56e057f20f883e', '430711476857419', 0, 3, 0, '2016-10-19 11:56:20', '2016-10-19', '2016-10-19 06:10:19', 0, 0, 0),
(22, 2, 'binishkumar@gmail.com', '87687867', 'e10adc3949ba59abbe56e057f20f883e', '647471476962942', 0, 3, 0, '2016-10-21 10:08:49', '2016-10-20', '2016-10-20 11:30:13', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_address`
--

CREATE TABLE IF NOT EXISTS `user_address` (
`id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `company` varchar(100) NOT NULL,
  `contact_number` varchar(100) NOT NULL,
  `address_1` text NOT NULL,
  `address_2` text NOT NULL,
  `city` varchar(100) NOT NULL,
  `district` int(11) NOT NULL,
  `postcode` varchar(111) NOT NULL,
  `country` int(11) NOT NULL,
  `state` int(11) NOT NULL,
  `default_billing_address` varchar(111) NOT NULL,
  `default_shipping_address` varchar(111) NOT NULL,
  `CB` int(11) NOT NULL,
  `UB` int(11) NOT NULL,
  `DOC` date NOT NULL,
  `DOU` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `user_address`
--

INSERT INTO `user_address` (`id`, `userid`, `first_name`, `last_name`, `company`, `contact_number`, `address_1`, `address_2`, `city`, `district`, `postcode`, `country`, `state`, `default_billing_address`, `default_shipping_address`, `CB`, `UB`, `DOC`, `DOU`) VALUES
(2, 4, 'Shana', 'S S', 'ISS', '4567878978', 'Shanan home, padivattom', 'ISS family, Palarivattom', 'Cochin', 2, '789456', 99, 18, '0', '0', 0, 0, '2016-08-22', '2016-08-30 10:07:03'),
(3, 4, 'Aathira', 'V p', 'ISS', '123456', 'Aluva', 'Palarivattom', 'Cochin', 2, '683101', 99, 18, '1', '1', 0, 0, '2016-08-30', '2016-08-30 10:07:03'),
(5, 4, 'Aathira', 'Buyer', '', '123456', 'testq', 'test', 'test', 2, '5565+6', 99, 18, '', '', 4, 0, '2016-09-01', '2016-09-01 04:58:18'),
(6, 4, 'Aathira', 'Buyer', '', '123456', 'testq', 'test', 'test', 2, '5565+6', 99, 18, '', '', 4, 0, '2016-09-01', '2016-09-01 04:58:44'),
(7, 4, 'Aathira', 'Buyer', '', '123456', 'testq', 'test', 'test', 2, '345', 99, 18, '', '', 4, 0, '2016-09-01', '2016-09-01 04:59:02'),
(10, 4, 'Aathira', 'Buyer', '', '123456', 'testq', 'test', 'test', 2, '5565+6', 99, 18, '', '', 4, 0, '2016-09-01', '2016-09-01 05:49:49'),
(11, 4, 'Aathira', 'Buyer', '', '123456', 'testq', 'test', 'test', 2, '5565+6', 99, 18, '', '', 4, 0, '2016-09-01', '2016-09-01 05:51:27'),
(12, 4, 'Aathira', 'Buyer', '', '123456', 'testq', 'test', 'ghukuh', 2, '45676', 99, 18, '', '', 4, 0, '2016-09-01', '2016-09-01 05:52:54'),
(13, 4, 'Aathira', 'Buyer', '', '123456', 'qqqqqqqqqq', 'test', 'test', 2, '5565+6', 99, 18, '', '', 4, 0, '2016-09-01', '2016-09-01 05:53:45'),
(14, 4, 'Aathira', 'Buyer', '', '123456', 'qqqqqqqqqq', 'test', 'test', 2, '5565+6', 99, 18, '', '', 4, 0, '2016-09-01', '2016-09-01 05:56:03'),
(15, 4, 'Aathira', 'Buyer', '', '123456', 'r5rrrrrrrrrrrrrrrr', 'test', 'test', 2, '5565+6', 99, 18, '', '', 4, 0, '2016-09-01', '2016-09-01 05:56:21'),
(16, 4, 'Aathira', 'Buyer', '', '123456', 'r5rrrrrrrrrrrrrrrr', 'test', 'test', 2, '5565+6', 99, 18, '', '', 4, 0, '2016-09-01', '2016-09-01 05:59:47'),
(17, 4, 'Aathira', 'Buyer', '', '123456', 'r5rrrrrrrrrrrrrrrr', 'test', 'test', 2, '5565+6', 99, 18, '', '', 4, 0, '2016-09-01', '2016-09-01 06:00:16'),
(21, 10, 'Ashik', 'Ali', '', '2147483647', 'dsfsfsd', '', 'dfdfdfg', 13, '682025', 99, 18, '', '', 10, 0, '2016-09-30', '2016-09-30 05:59:31'),
(22, 13, 'Gokul', 'G', '', '9809493246', 'Palarivattom', '', 'Kochi', 2, '682025', 99, 18, '0', '0', 13, 0, '2016-10-12', '2016-10-12 09:26:25'),
(25, 14, 'Lujo ', 'Joseph', '', '1212121212', 'palarivattom', '', 'Kochi', 2, '682025', 99, 18, '', '', 14, 0, '2016-10-13', '2016-10-13 06:08:15'),
(26, 14, 'Lujo', 'Joseph', '', '1212121212', 'palarivattom', '', 'kochi', 2, '682025', 99, 18, '', '', 14, 0, '2016-10-14', '2016-10-14 06:25:48');

-- --------------------------------------------------------

--
-- Table structure for table `user_reviews`
--

CREATE TABLE IF NOT EXISTS `user_reviews` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `author` varchar(225) NOT NULL,
  `user_image` varchar(225) NOT NULL,
  `product_id` int(11) NOT NULL,
  `review` text NOT NULL,
  `approvel` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `user_reviews`
--

INSERT INTO `user_reviews` (`id`, `user_id`, `email`, `author`, `user_image`, `product_id`, `review`, `approvel`, `date`, `rating`) VALUES
(2, 4, 'avptest1992@gmail.com', 'Aathira Buyer', '', 17, 'Sample ratung', 0, '2016-09-09 07:04:36', 1),
(3, 0, 'siyad123@gmail.com', 'Siyad', '', 17, 'Sample contend Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip', 0, '2016-09-09 09:15:32', 5),
(4, 0, 'sadiq@gmail.com', 'Sadiq', '', 17, 'test content test content test content ', 0, '2016-09-09 09:16:42', 3),
(5, 0, 'sunanina', 'sunanina', '', 17, 'sunaninasunanina sunanina', 0, '2016-09-09 09:17:29', 4),
(6, 0, 'sunaninasunanina', 'sunanina', '', 17, 'sunaninasunanina sunaninasunaninasunaninasunanina', 0, '2016-09-09 09:18:17', 2),
(7, 0, 'aliquip', 'aliquip', '', 17, 't nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 0, '2016-09-09 09:18:35', 3),
(8, 0, 'avp1229@gmail.com', 'aathira', '', 44, 'test test review', 0, '2016-10-20 08:58:55', 4),
(9, 0, 'fghj,kl', 'sdfgh', '', 44, '', 0, '2016-10-20 09:00:16', 5),
(10, 0, 'fathima', 'fathima', '', 44, '', 0, '2016-10-20 09:00:46', 3);

-- --------------------------------------------------------

--
-- Table structure for table `wallet_history`
--

CREATE TABLE IF NOT EXISTS `wallet_history` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `entry_date` datetime NOT NULL,
  `credit_debit` int(11) NOT NULL COMMENT '1=>credit, 2=>debit',
  `balance_amt` decimal(10,2) NOT NULL,
  `ids` int(11) NOT NULL COMMENT 'eg:purchase_id',
  `field1` varchar(200) NOT NULL COMMENT 'comment',
  `field2` int(11) NOT NULL COMMENT 'status',
  `payment_method` int(11) NOT NULL COMMENT '1=>admin,2=>credit/debit/netbanking,3=>paypal',
  `transaction_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `weight_class`
--

CREATE TABLE IF NOT EXISTS `weight_class` (
`id` int(11) NOT NULL,
  `title` varchar(225) NOT NULL,
  `unit` varchar(100) NOT NULL,
  `CB` int(11) NOT NULL,
  `UB` int(11) NOT NULL,
  `DOC` date NOT NULL,
  `DOU` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `weight_class`
--

INSERT INTO `weight_class` (`id`, `title`, `unit`, `CB`, `UB`, `DOC`, `DOU`) VALUES
(3, 'kilograms', 'kg', 10, 0, '2016-07-21', '2016-07-20 18:30:00'),
(4, 'Grams', 'g', 11, 0, '2016-10-04', '2016-10-03 23:00:00'),
(5, 'mili grams', 'mg', 11, 0, '2016-10-15', '0000-00-00 00:00:00'),
(6, 'pounds', 'pound', 11, 0, '2016-10-15', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE IF NOT EXISTS `wishlist` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `DOC` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `user_id`, `product_id`, `DOC`) VALUES
(4, 4, 7, '2016-09-06'),
(5, 4, 14, '2016-09-06'),
(6, 4, 13, '2016-09-06'),
(7, 4, 10, '2016-09-06'),
(9, 1, 16, '2016-09-08'),
(10, 0, 17, '2016-09-09'),
(11, 4, 17, '2016-09-16'),
(12, 13, 9, '2016-10-12'),
(14, 18, 42, '2016-10-14'),
(15, 4, 9, '2016-10-20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_post`
--
ALTER TABLE `admin_post`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_user`
--
ALTER TABLE `admin_user`
 ADD PRIMARY KEY (`id`), ADD KEY `admin_post_id` (`admin_post_id`);

--
-- Indexes for table `ad_payment`
--
ALTER TABLE `ad_payment`
 ADD PRIMARY KEY (`id`), ADD KEY `position` (`position`), ADD KEY `vendor_name` (`vendor_name`), ADD KEY `vendor_name_2` (`vendor_name`);

--
-- Indexes for table `banking_details`
--
ALTER TABLE `banking_details`
 ADD PRIMARY KEY (`id`), ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `buyer_details`
--
ALTER TABLE `buyer_details`
 ADD PRIMARY KEY (`id`), ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
 ADD PRIMARY KEY (`id`), ADD KEY `product_id` (`product_id`), ADD KEY `user_id` (`user_id`), ADD KEY `user_id_2` (`user_id`), ADD KEY `user_id_3` (`user_id`), ADD KEY `product_id_2` (`product_id`), ADD KEY `product_id_3` (`product_id`), ADD KEY `product_id_4` (`product_id`);

--
-- Indexes for table `contact_details`
--
ALTER TABLE `contact_details`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupon_history`
--
ALTER TABLE `coupon_history`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
 ADD PRIMARY KEY (`Id`), ADD KEY `country_id` (`country_id`), ADD KEY `state_id` (`state_id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forgot_password`
--
ALTER TABLE `forgot_password`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `make_product_payment`
--
ALTER TABLE `make_product_payment`
 ADD PRIMARY KEY (`id`), ADD KEY `userid` (`userid`), ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `master_ad_location`
--
ALTER TABLE `master_ad_location`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_brands`
--
ALTER TABLE `master_brands`
 ADD PRIMARY KEY (`id`), ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `master_category_tags`
--
ALTER TABLE `master_category_tags`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_history_type`
--
ALTER TABLE `master_history_type`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_shipping_types`
--
ALTER TABLE `master_shipping_types`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_tax_class`
--
ALTER TABLE `master_tax_class`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mater_tax_rates`
--
ALTER TABLE `mater_tax_rates`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `merchant_account_master`
--
ALTER TABLE `merchant_account_master`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `merchant_details`
--
ALTER TABLE `merchant_details`
 ADD PRIMARY KEY (`id`), ADD KEY `user_id` (`user_id`), ADD KEY `district` (`district`,`state`,`country`), ADD KEY `district_2` (`district`), ADD KEY `state` (`state`), ADD KEY `country` (`country`);

--
-- Indexes for table `merchant_message`
--
ALTER TABLE `merchant_message`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `merchant_payout_history`
--
ALTER TABLE `merchant_payout_history`
 ADD PRIMARY KEY (`id`), ADD KEY `merchant_id` (`merchant_id`);

--
-- Indexes for table `merchant_plans`
--
ALTER TABLE `merchant_plans`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `merchant_plans_history`
--
ALTER TABLE `merchant_plans_history`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `merchant_transaction_master`
--
ALTER TABLE `merchant_transaction_master`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletter_content`
--
ALTER TABLE `newsletter_content`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
 ADD PRIMARY KEY (`id`), ADD KEY `user_id` (`user_id`), ADD KEY `address_book_id` (`ship_address_id`), ADD KEY `admin_status` (`admin_status`), ADD KEY `user_id_2` (`user_id`), ADD KEY `coupon_id` (`coupon_id`), ADD KEY `ship_address_id` (`ship_address_id`), ADD KEY `bill_address_id` (`bill_address_id`), ADD KEY `transaction_id` (`transaction_id`), ADD KEY `user_id_3` (`user_id`), ADD KEY `user_id_4` (`user_id`);

--
-- Indexes for table `order_history`
--
ALTER TABLE `order_history`
 ADD PRIMARY KEY (`id`), ADD KEY `order_id` (`order_id`), ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
 ADD PRIMARY KEY (`id`), ADD KEY `order_id` (`order_id`), ADD KEY `product_id` (`product_id`), ADD KEY `order_id_2` (`order_id`), ADD KEY `product_id_2` (`product_id`), ADD KEY `order_id_3` (`order_id`), ADD KEY `product_id_3` (`product_id`), ADD KEY `order_id_4` (`order_id`), ADD KEY `product_id_4` (`product_id`), ADD KEY `merchant_id` (`merchant_id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plan_details`
--
ALTER TABLE `plan_details`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
 ADD PRIMARY KEY (`id`), ADD KEY `merchant_id` (`merchant_id`,`merchant_type`), ADD KEY `merchant_type` (`merchant_type`), ADD KEY `merchant_id_2` (`merchant_id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_category_path`
--
ALTER TABLE `product_category_path`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_viewed`
--
ALTER TABLE `product_viewed`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_report`
--
ALTER TABLE `sales_report`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_charges`
--
ALTER TABLE `shipping_charges`
 ADD PRIMARY KEY (`id`), ADD KEY `country` (`country`);

--
-- Indexes for table `social`
--
ALTER TABLE `social`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
 ADD PRIMARY KEY (`Id`), ADD KEY `country_id` (`country_id`), ADD KEY `country_id_2` (`country_id`), ADD KEY `country_id_3` (`country_id`);

--
-- Indexes for table `static_page`
--
ALTER TABLE `static_page`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_address`
--
ALTER TABLE `user_address`
 ADD PRIMARY KEY (`id`), ADD KEY `country` (`country`), ADD KEY `state` (`state`), ADD KEY `state_2` (`state`), ADD KEY `country_2` (`country`), ADD KEY `country_3` (`country`), ADD KEY `default_billing_address` (`default_billing_address`), ADD KEY `country_4` (`country`), ADD KEY `district` (`district`), ADD KEY `userid` (`userid`), ADD KEY `district_2` (`district`), ADD KEY `country_5` (`country`), ADD KEY `state_3` (`state`);

--
-- Indexes for table `user_reviews`
--
ALTER TABLE `user_reviews`
 ADD PRIMARY KEY (`id`), ADD KEY `user_id` (`user_id`), ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `wallet_history`
--
ALTER TABLE `wallet_history`
 ADD PRIMARY KEY (`id`), ADD KEY `type_id` (`type_id`), ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `weight_class`
--
ALTER TABLE `weight_class`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
 ADD PRIMARY KEY (`id`), ADD KEY `user_id` (`user_id`,`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_post`
--
ALTER TABLE `admin_post`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `admin_user`
--
ALTER TABLE `admin_user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `ad_payment`
--
ALTER TABLE `ad_payment`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `banking_details`
--
ALTER TABLE `banking_details`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `buyer_details`
--
ALTER TABLE `buyer_details`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `contact_details`
--
ALTER TABLE `contact_details`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=247;
--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `coupon_history`
--
ALTER TABLE `coupon_history`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `forgot_password`
--
ALTER TABLE `forgot_password`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `make_product_payment`
--
ALTER TABLE `make_product_payment`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `master_ad_location`
--
ALTER TABLE `master_ad_location`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `master_brands`
--
ALTER TABLE `master_brands`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `master_category_tags`
--
ALTER TABLE `master_category_tags`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `master_history_type`
--
ALTER TABLE `master_history_type`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `master_shipping_types`
--
ALTER TABLE `master_shipping_types`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `master_tax_class`
--
ALTER TABLE `master_tax_class`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `mater_tax_rates`
--
ALTER TABLE `mater_tax_rates`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `merchant_account_master`
--
ALTER TABLE `merchant_account_master`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `merchant_details`
--
ALTER TABLE `merchant_details`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `merchant_message`
--
ALTER TABLE `merchant_message`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `merchant_payout_history`
--
ALTER TABLE `merchant_payout_history`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `merchant_plans`
--
ALTER TABLE `merchant_plans`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `merchant_plans_history`
--
ALTER TABLE `merchant_plans_history`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `merchant_transaction_master`
--
ALTER TABLE `merchant_transaction_master`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `newsletter_content`
--
ALTER TABLE `newsletter_content`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `order_history`
--
ALTER TABLE `order_history`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `plan_details`
--
ALTER TABLE `plan_details`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `product_category_path`
--
ALTER TABLE `product_category_path`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `product_viewed`
--
ALTER TABLE `product_viewed`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `sales_report`
--
ALTER TABLE `sales_report`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `shipping_charges`
--
ALTER TABLE `shipping_charges`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `social`
--
ALTER TABLE `social`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `static_page`
--
ALTER TABLE `static_page`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `user_address`
--
ALTER TABLE `user_address`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `user_reviews`
--
ALTER TABLE `user_reviews`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `wallet_history`
--
ALTER TABLE `wallet_history`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `weight_class`
--
ALTER TABLE `weight_class`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `ad_payment`
--
ALTER TABLE `ad_payment`
ADD CONSTRAINT `ad_payment_ibfk_1` FOREIGN KEY (`vendor_name`) REFERENCES `merchant_details` (`id`),
ADD CONSTRAINT `ad_payment_ibfk_2` FOREIGN KEY (`position`) REFERENCES `master_ad_location` (`id`);

--
-- Constraints for table `buyer_details`
--
ALTER TABLE `buyer_details`
ADD CONSTRAINT `buyer_details_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `make_product_payment`
--
ALTER TABLE `make_product_payment`
ADD CONSTRAINT `make_product_payment_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`id`),
ADD CONSTRAINT `make_product_payment_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `merchant_details`
--
ALTER TABLE `merchant_details`
ADD CONSTRAINT `merchant_details_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `merchant_payout_history`
--
ALTER TABLE `merchant_payout_history`
ADD CONSTRAINT `merchant_payout_history_ibfk_1` FOREIGN KEY (`merchant_id`) REFERENCES `merchant_details` (`id`);

--
-- Constraints for table `states`
--
ALTER TABLE `states`
ADD CONSTRAINT `states_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`);

--
-- Constraints for table `user_address`
--
ALTER TABLE `user_address`
ADD CONSTRAINT `user_address_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`id`),
ADD CONSTRAINT `user_address_ibfk_2` FOREIGN KEY (`district`) REFERENCES `districts` (`Id`),
ADD CONSTRAINT `user_address_ibfk_3` FOREIGN KEY (`country`) REFERENCES `countries` (`id`),
ADD CONSTRAINT `user_address_ibfk_4` FOREIGN KEY (`state`) REFERENCES `states` (`Id`);

--
-- Constraints for table `wallet_history`
--
ALTER TABLE `wallet_history`
ADD CONSTRAINT `wallet_history_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
