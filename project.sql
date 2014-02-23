-- phpMyAdmin SQL Dump
-- version 3.3.10.4
-- http://www.phpmyadmin.net
--
-- Host: mysql.oceanofmessages.com
-- Generation Time: Dec 08, 2013 at 08:15 AM
-- Server version: 5.1.53
-- PHP Version: 5.4.11

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `oceanofmessages_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `m_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `msg` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `reply` varchar(255) NOT NULL DEFAULT 'Bottle is still drifting in the ocean...',
  `reply_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`m_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`m_id`, `msg`, `user_id`, `reply`, `reply_id`) VALUES
(1, 'Hello, world!', 6, 'Hello to you too :)', 13),
(2, 'Jocelyn is the best!', 6, 'Jocelyn is the best!', 1),
(3, 'I saw your face, in a crowded place. \r\nNow I don''t know what to do...', 7, 'You''re beautiful! You''re beautiful, it''s true (:', 1),
(4, 'I have a hard time deciphering the fine \r\nline between boredom and hunger', 7, 'me too', 2),
(5, 'Beware of the swamp monster!', 7, 'haha', 2),
(6, 'Today is a beautiful day! I hope you are \r\nhaving a good time too :)', 13, 'Today is indeed absolutely gorgeous, and I am so happy to receive your kind thoughts. Thank you. :)', 9),
(7, 'I really just need someplace to vent. No \r\none understands me, and I don''t feel \r\ncomfortable sharing my thoughts \r\nanywhere else...Thank you, Ocean of \r\nMessages, for being there for me in my \r\nhard times.', 9, 'Just know that someone is always there for you. You will be in my prayers :)', 13),
(8, 'Why does no one understand me?', 9, 'I understand you. I am here for you. Be brave, be great, be courageous, for you are not alone and never will be!', 10),
(9, 'So many happy things have happened \r\ntoday!!!! Most importantly, my daughter \r\njust had her first baby and now I can be \r\ncalled a grandmother. ', 10, 'Bottle is still drifting in the ocean...', 0),
(10, 'My grandson today just turned 1 month \r\nold!!! We just had to celebrate this 1/12th \r\nbirthday. I am so grateful to the world for \r\nthis gift in my life.', 10, 'Bottle is still drifting in the ocean...', 0),
(11, 'My baby grandson just turned 1 year old!!! I \r\nam so so happy!', 10, 'Bottle is still drifting in the ocean...', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `hash` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `hash`) VALUES
(1, 'jocelynfu', 'Eg1lFyMOfpZLA'),
(2, 'kimberleyyu', '$1$f0KFXLcW$dR7wNnX4YFKaOGP1CBFjk0'),
(4, 'vballcavalier', '$1$msVxoMeW$cnHN2.RKnEZ7lMsFr42hM/'),
(5, 'melda', '$1$6b3RgKEs$UcHhto3337vnbEvxIKX.V0'),
(6, 'ryley', '$1$mdwpBlaX$KbYSShLi9lvL.WLH8MjP40'),
(7, 'elizabethbenson', '$1$YqKkMNtU$FItBPbWDhRy2R.uWHYbj10'),
(8, 'kimberleyyu2', '$1$64WukIls$/afV.auQOFTYZbYrQQXbF.'),
(9, 'kimberleyyu3', '$1$8WP6I5B.$EGf2T69MRE.d0fiBremxN.'),
(10, 'kimberleyyu4', '$1$7jmmtWvz$PkNvU4Tf0Ikyf0B1h8bHb.'),
(11, 'kimberleyyu', '$1$YqDogBSp$Du5Quq90DozDSUvGfGsTJ/'),
(12, 'ohhai', '$1$wgoglU0Z$bu9BjmPLunltixIObx2Ku/'),
(13, 'ocean13', '$1$yapt/LW5$gsOuTdvM6EEuZa1B4oswL1');
