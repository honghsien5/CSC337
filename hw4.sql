-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2014 at 08:50 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hw4`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE IF NOT EXISTS `blog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(64) NOT NULL,
  `blog` varchar(2056) NOT NULL,
  `post_date` date NOT NULL,
  `image` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title`, `blog`, `post_date`, `image`) VALUES
(1, 'Welcome', '<p> Gundam Model Kit is now officially open!</p>\r\n		<p> Send us any suggestion to improve our site through the email provided</p>\r\n<p> Enjoy shopping!</p>', '2014-01-26', 'welcome.jpg'),
(2, 'MG-Sinanju', '<p>There is a new addition to the line up for Sinanju</p>\r\n<p>One of the highest rated model ever Master Grade Sinanju is now available!</p>', '2014-02-14', 'sinanju.jpg'),
(3, 'MG-Sazabi', '<p> A brand new master grade model for  the antagonist of the Gundam series: Char''s counterattack is now released!</p>', '2014-03-14', 'sazabi.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `blog_comment`
--

CREATE TABLE IF NOT EXISTS `blog_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `blog_id` int(11) NOT NULL,
  `comment` varchar(1024) NOT NULL,
  `post_date` date NOT NULL,
  `email` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `blog_comment`
--

INSERT INTO `blog_comment` (`id`, `blog_id`, `comment`, `post_date`, `email`) VALUES
(11, 1, 'fwejoifej', '2014-04-23', 'fewf@gmail.com'),
(17, 2, 'ewf', '2014-04-23', 'fef'),
(18, 2, 'fweffe', '2014-04-23', 'fewf'),
(19, 2, 'wef', '2014-04-23', 'fedewdwf@fefw'),
(20, 2, 'wef', '2014-04-23', 'fedewdwf@fefw'),
(22, 1, 'fwef', '2014-04-23', 'fwef'),
(24, 1, 'dwd', '2014-04-23', 'fwefoij@gjoij.com'),
(25, 1, 'fef', '2014-04-23', 'foiewjf@gmai.com'),
(26, 0, 'fefwf', '2014-04-23', 'dwad@mgi.com'),
(27, 2, 'wef', '2014-04-23', 'wefef@gmail.com'),
(28, 1, 'fwef13', '2014-04-23', 'wef143@rt3weoirj.com');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `address` varchar(64) NOT NULL,
  `city` varchar(64) NOT NULL,
  `state` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `phone` varchar(64) NOT NULL,
  `shipping` varchar(64) NOT NULL,
  `order_time` datetime NOT NULL,
  `completed` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE IF NOT EXISTS `order_product` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`order_id`, `product_id`, `quantity`) VALUES
(1, 0, 15),
(1, 1, 15),
(1, 2, 3),
(1, 3, 123),
(1, 0, 15),
(1, 1, 15),
(1, 2, 3),
(1, 3, 123),
(1, 0, 15),
(1, 1, 15),
(1, 2, 3),
(1, 3, 123);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `description` varchar(2056) NOT NULL,
  `image` varchar(64) NOT NULL,
  `price` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `image`, `price`) VALUES
(1, 'High-Grade-Strike-Freedom', '<p> The moulding was improved and HG (High Grade) level kits were introduced in 1990. These kits at either 1:144 or 1:100 scale, provide for better range of motion and greater poseability. It is important to note that the SEED and SEED DESTINY 1:100 scale models do not have HG listed anywhere on the box or manual, but they are considered HG in terms of quality.</p>', 'HGSF.jpg', 14.99),
(3, 'Real-Grade-Strike-Freedom', '<p>Product introduction "Strike Freedom Gundam" comes from "Mobile Suit Gundam SEED DESTINY" The first 14 bullet RG. Mobile weapon wing which can be called the biggest characteristic of Strike Freedom Gundam, reproduced rich detailing. Development and storage of gimmick wing also designed on the basis of the actual investigation. I reproduce the molding frame golden characteristic of Strike Freedom Gundam in the Advanced MS joint of gold to be RG first. [Accessories] beam rifle, beam saber, beam Jytte, shield, moving hand, hand grip, action-only parts, figure, realistic decal, assembly instructions. </p>', 'RGSF.jpg', 29.99),
(4, 'Master-Grade-Strike-Freedom', '<p>Strike Freedom Gundam, arguably the most popular mobile suit from the Gundam Seed Destiny anime series, finally gets the Master Grade treatment! This MG kit of Strike Freedom Gundam comes with the same fantastic detail, high quality, and super posability that MG builders would come to expect from Bandai. Strike Freedom Gundam comes armed with its trademark weaponry including the high energy beam rifles, Super Lacerta beam sabers, beam shield, Xiphias rail guns, and its most distinct and powerful weapon of all, the Super Dragoon mobile weapon wings that can extend and detach from the main wing frames. As usual, stickers and custom decal markings are provided along with a custom display base.</p>', 'MGSF.jpg', 49.99),
(5, 'Perfect-Grade-Strike-Freedom', '<p>The newest Perfect Grade kit is none other than the Strike Freedom Gundam! The Strike Freedom, with its expandable Super Dragoons, is the largest PG kit ever released. Completely new molds were used in the production of this kit and Bandai has outdone themselves when it comes to engineering something made of so many small (and not so small) parts, particularly in the joints and armor where the gold frame parts are viewable. Bandai has designed new, sturdier joints to hold this hefty kit once it is completed, and it includes weapons and accessories such as the Beam Shield, two Beam Rifles, two Railguns, eight Super Dragoons, a display base, and an LED unit for the head!  Plus Katoki Hajime''s notorious plethora of markings! Are you game?</p>', 'PGSF.jpg', 249.99);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
