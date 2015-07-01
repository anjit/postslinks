-- phpMyAdmin SQL Dump
-- version 4.0.8
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2014 at 09:24 AM
-- Server version: 5.5.25-log
-- PHP Version: 5.5.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `live`
--

-- --------------------------------------------------------

--
-- Table structure for table `agent_log`
--

CREATE TABLE IF NOT EXISTS `agent_log` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `timestamp` int(11) NOT NULL,
  `ticketid` int(11) NOT NULL,
  `IP` varchar(500) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `userid` int(11) NOT NULL,
  `timestamp` int(11) NOT NULL,
  `catid` int(11) NOT NULL,
  `total_votes` int(11) NOT NULL,
  `useful_votes` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `article_categories`
--

CREATE TABLE IF NOT EXISTS `article_categories` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `article_count` int(11) NOT NULL,
  `article_desc` varchar(500) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `article_categories`
--

INSERT INTO `article_categories` (`ID`, `name`, `article_count`, `article_desc`) VALUES
(1, 'Default', 0, 'The Default Category');

-- --------------------------------------------------------

--
-- Table structure for table `article_votes`
--

CREATE TABLE IF NOT EXISTS `article_votes` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `articleid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `canned_responses`
--

CREATE TABLE IF NOT EXISTS `canned_responses` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(500) NOT NULL,
  `response` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ip_block`
--

CREATE TABLE IF NOT EXISTS `ip_block` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `IP` varchar(600) NOT NULL,
  `reason` varchar(600) NOT NULL,
  `timestamp` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset`
--

CREATE TABLE IF NOT EXISTS `password_reset` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `timestamp` int(11) NOT NULL,
  `IP` varchar(500) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `reset_log`
--

CREATE TABLE IF NOT EXISTS `reset_log` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `IP` varchar(500) NOT NULL,
  `timestamp` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

CREATE TABLE IF NOT EXISTS `site_settings` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `site_name` varchar(500) NOT NULL,
  `site_desc` varchar(700) NOT NULL,
  `site_logo` varchar(500) NOT NULL,
  `upload_path` varchar(2000) NOT NULL,
  `envato_api_key` varchar(500) NOT NULL,
  `envato_api_username` varchar(500) NOT NULL,
  `upload_path_relative` varchar(1000) NOT NULL,
  `support_email` varchar(500) NOT NULL,
  `guest_enable` int(11) NOT NULL,
  `file_enable` int(11) NOT NULL,
  `twitter_name` varchar(255) NOT NULL,
  `twitter_display_limit` int(11) NOT NULL DEFAULT '4',
  `twitter_consumer_key` varchar(255) NOT NULL,
  `twitter_consumer_secret` varchar(255) NOT NULL,
  `twitter_access_token` varchar(255) NOT NULL,
  `twitter_access_secret` varchar(255) NOT NULL,
  `article_voting` int(11) NOT NULL,
  `ticket_rating` int(11) NOT NULL,
  `custom_css` text NOT NULL,
  `alert_support_staff` int(11) DEFAULT NULL,
  `register` int(11) NOT NULL,
  `kb_login` int(11) NOT NULL,
  `update_tweets` int(11) NOT NULL DEFAULT '3600',
  `twitter_update` int(11) NOT NULL,
  `disable_captcha` int(11) NOT NULL,
  `disable_seo` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`ID`, `site_name`, `site_desc`, `site_logo`, `upload_path`, `envato_api_key`, `envato_api_username`, `upload_path_relative`, `support_email`, `guest_enable`, `file_enable`, `twitter_name`, `twitter_display_limit`, `twitter_consumer_key`, `twitter_consumer_secret`, `twitter_access_token`, `twitter_access_secret`, `article_voting`, `ticket_rating`, `custom_css`, `alert_support_staff`, `register`, `kb_login`, `update_tweets`, `twitter_update`, `disable_captcha`, `disable_seo`) VALUES
(1, 'Support Centre', 'Welcome to the Support Centre.', '', '/home/www/public_html/uploads', '', '', 'uploads', 'test@test.com', 1, 1, '', 3, '', '', '', '', 1, 1, '', 0, 0, 0, 3600, 1410945377, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE IF NOT EXISTS `tickets` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `timestamp` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `category` int(11) NOT NULL,
  `priority` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  `last_reply_userid` int(11) NOT NULL,
  `IP` varchar(500) NOT NULL,
  `replies` int(11) NOT NULL DEFAULT '1',
  `last_reply_timestamp` int(11) NOT NULL,
  `close_user` int(11) NOT NULL,
  `custom_fields` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `notes` text NOT NULL,
  `assigned` varchar(2000) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_categories`
--

CREATE TABLE IF NOT EXISTS `ticket_categories` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `ticket_categories`
--

INSERT INTO `ticket_categories` (`ID`, `name`) VALUES
(1, 'General Enquires'),
(2, 'Product Support'),
(3, 'Bugs & Issues'),
(4, 'Feedback');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_custom_fields`
--

CREATE TABLE IF NOT EXISTS `ticket_custom_fields` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `placeholder` varchar(255) NOT NULL,
  `required` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `selectoptions` varchar(2500) NOT NULL,
  `subtext` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_file_uploads`
--

CREATE TABLE IF NOT EXISTS `ticket_file_uploads` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `full_path` varchar(500) NOT NULL,
  `file_name` varchar(500) NOT NULL,
  `file_ext` varchar(6) NOT NULL,
  `IP` varchar(500) NOT NULL,
  `timestamp` int(11) NOT NULL,
  `replyid` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_ratings`
--

CREATE TABLE IF NOT EXISTS `ticket_ratings` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ticketid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `IP` varchar(500) NOT NULL,
  `rating` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_replies`
--

CREATE TABLE IF NOT EXISTS `ticket_replies` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `message` text NOT NULL,
  `timestamp` int(11) NOT NULL,
  `ticketid` int(11) NOT NULL,
  `staff` int(11) NOT NULL,
  `attachments` int(11) NOT NULL,
  `IP` varchar(500) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tweets`
--

CREATE TABLE IF NOT EXISTS `tweets` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(500) NOT NULL,
  `name` varchar(500) NOT NULL,
  `tweet` varchar(300) NOT NULL,
  `timestamp` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `password` varchar(100) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `dob` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `token` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `name` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `access_level` int(11) NOT NULL DEFAULT '0',
  `email_notification` int(11) NOT NULL DEFAULT '1',
  `ticket_responses` int(11) NOT NULL DEFAULT '0',
  `IP` varchar(500) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `bio_pic` varchar(700) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `default_ticket_category` int(11) NOT NULL DEFAULT '0',
  `locked_category` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
