-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2014 年 02 月 22 日 04:37
-- 服务器版本: 5.5.16
-- PHP 版本: 5.4.0beta2-dev

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `company`
--

-- --------------------------------------------------------

--
-- 表的结构 `c_admin`
--

CREATE TABLE IF NOT EXISTS `c_admin` (
  `a_id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `a_name` varchar(11) NOT NULL,
  `a_password` varchar(21) NOT NULL,
  `a_regTime` datetime NOT NULL COMMENT '注册时间',
  `a_logTime` datetime NOT NULL COMMENT '最后登录时间',
  `a_lastIP` varchar(13) NOT NULL COMMENT '最后登录IP',
  PRIMARY KEY (`a_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `c_admin`
--

INSERT INTO `c_admin` (`a_id`, `a_name`, `a_password`, `a_regTime`, `a_logTime`, `a_lastIP`) VALUES
(1, 'admin', '123456', '2014-02-19 00:00:00', '2014-02-22 11:45:58', '127.0.0.1');

-- --------------------------------------------------------

--
-- 表的结构 `c_company`
--

CREATE TABLE IF NOT EXISTS `c_company` (
  `c_id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `c_name` varchar(30) NOT NULL,
  `c_info` text NOT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `c_company`
--

INSERT INTO `c_company` (`c_id`, `c_name`, `c_info`) VALUES
(2, 'betterlink', '公司简介');

-- --------------------------------------------------------

--
-- 表的结构 `c_imageshow`
--

CREATE TABLE IF NOT EXISTS `c_imageshow` (
  `i_id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `i_picture` varchar(40) NOT NULL,
  `p_id` int(8) NOT NULL,
  PRIMARY KEY (`i_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `c_message`
--

CREATE TABLE IF NOT EXISTS `c_message` (
  `m_id` int(8) NOT NULL AUTO_INCREMENT,
  `m_title` varchar(30) NOT NULL,
  `m_content` text NOT NULL,
  `m_time` varchar(11) NOT NULL,
  `m_audit` int(1) NOT NULL DEFAULT '1',
  `u_id` int(11) NOT NULL,
  PRIMARY KEY (`m_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `c_news`
--

CREATE TABLE IF NOT EXISTS `c_news` (
  `n_id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `n_title` varchar(35) NOT NULL,
  `n_content` text NOT NULL,
  `n_time` datetime NOT NULL,
  PRIMARY KEY (`n_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `c_news`
--

INSERT INTO `c_news` (`n_id`, `n_title`, `n_content`, `n_time`) VALUES
(1, '新闻1', '新闻信息1', '2014-02-19 16:42:37'),
(2, '新闻2', '新闻信息2', '2014-02-19 16:44:17'),
(3, '新闻3', '新闻信息3', '2014-02-19 23:29:48'),
(4, '新闻4', '新闻信息4', '2014-02-21 17:55:40'),
(5, '新闻5', '新闻信息5', '2014-02-21 17:58:50');

-- --------------------------------------------------------

--
-- 表的结构 `c_product`
--

CREATE TABLE IF NOT EXISTS `c_product` (
  `p_id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `p_name` varchar(20) NOT NULL,
  `p_content` text NOT NULL,
  `p_classify` int(11) NOT NULL,
  `p_picture` varchar(40) NOT NULL,
  `p_time` varchar(11) NOT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `c_recruit`
--

CREATE TABLE IF NOT EXISTS `c_recruit` (
  `r_id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `r_title` varchar(30) NOT NULL,
  `r_content` text NOT NULL,
  `r_time` varchar(11) NOT NULL,
  PRIMARY KEY (`r_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `c_solution`
--

CREATE TABLE IF NOT EXISTS `c_solution` (
  `s_id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `s_content` text NOT NULL,
  `s_time` varchar(11) NOT NULL,
  PRIMARY KEY (`s_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `c_user`
--

CREATE TABLE IF NOT EXISTS `c_user` (
  `u_id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `u_name` varchar(8) NOT NULL,
  `u_named` varchar(12) NOT NULL,
  `u_password` varchar(21) NOT NULL,
  `u_company` varchar(30) NOT NULL,
  `u_telephone` int(12) unsigned NOT NULL,
  `u_audit` int(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `c_user`
--

INSERT INTO `c_user` (`u_id`, `u_name`, `u_named`, `u_password`, `u_company`, `u_telephone`, `u_audit`) VALUES
(1, 'betterli', 'admin', '123456', 'betterlink', 123, 4);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
